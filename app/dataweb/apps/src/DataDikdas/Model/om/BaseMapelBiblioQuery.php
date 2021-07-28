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
use DataDikdas\Model\Biblio;
use DataDikdas\Model\MapelBiblio;
use DataDikdas\Model\MapelBiblioPeer;
use DataDikdas\Model\MapelBiblioQuery;
use DataDikdas\Model\MataPelajaran;

/**
 * Base class that represents a query for the 'pustaka.mapel_biblio' table.
 *
 * 
 *
 * @method MapelBiblioQuery orderByIdBiblio($order = Criteria::ASC) Order by the id_biblio column
 * @method MapelBiblioQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method MapelBiblioQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MapelBiblioQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MapelBiblioQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method MapelBiblioQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method MapelBiblioQuery groupByIdBiblio() Group by the id_biblio column
 * @method MapelBiblioQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method MapelBiblioQuery groupByCreateDate() Group by the create_date column
 * @method MapelBiblioQuery groupByLastUpdate() Group by the last_update column
 * @method MapelBiblioQuery groupByExpiredDate() Group by the expired_date column
 * @method MapelBiblioQuery groupByLastSync() Group by the last_sync column
 *
 * @method MapelBiblioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MapelBiblioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MapelBiblioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MapelBiblioQuery leftJoinBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Biblio relation
 * @method MapelBiblioQuery rightJoinBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Biblio relation
 * @method MapelBiblioQuery innerJoinBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the Biblio relation
 *
 * @method MapelBiblioQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method MapelBiblioQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method MapelBiblioQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method MapelBiblio findOne(PropelPDO $con = null) Return the first MapelBiblio matching the query
 * @method MapelBiblio findOneOrCreate(PropelPDO $con = null) Return the first MapelBiblio matching the query, or a new MapelBiblio object populated from the query conditions when no match is found
 *
 * @method MapelBiblio findOneByIdBiblio(string $id_biblio) Return the first MapelBiblio filtered by the id_biblio column
 * @method MapelBiblio findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first MapelBiblio filtered by the mata_pelajaran_id column
 * @method MapelBiblio findOneByCreateDate(string $create_date) Return the first MapelBiblio filtered by the create_date column
 * @method MapelBiblio findOneByLastUpdate(string $last_update) Return the first MapelBiblio filtered by the last_update column
 * @method MapelBiblio findOneByExpiredDate(string $expired_date) Return the first MapelBiblio filtered by the expired_date column
 * @method MapelBiblio findOneByLastSync(string $last_sync) Return the first MapelBiblio filtered by the last_sync column
 *
 * @method array findByIdBiblio(string $id_biblio) Return MapelBiblio objects filtered by the id_biblio column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return MapelBiblio objects filtered by the mata_pelajaran_id column
 * @method array findByCreateDate(string $create_date) Return MapelBiblio objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return MapelBiblio objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return MapelBiblio objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return MapelBiblio objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMapelBiblioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMapelBiblioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\MapelBiblio', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MapelBiblioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MapelBiblioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MapelBiblioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MapelBiblioQuery) {
            return $criteria;
        }
        $query = new MapelBiblioQuery();
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
                         A Primary key composition: [$id_biblio, $mata_pelajaran_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   MapelBiblio|MapelBiblio[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MapelBiblioPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MapelBiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MapelBiblio A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_biblio", "mata_pelajaran_id", "create_date", "last_update", "expired_date", "last_sync" FROM "pustaka"."mapel_biblio" WHERE "id_biblio" = :p0 AND "mata_pelajaran_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new MapelBiblio();
            $obj->hydrate($row);
            MapelBiblioPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return MapelBiblio|MapelBiblio[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MapelBiblio[]|mixed the list of results, formatted by the current formatter
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
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MapelBiblioPeer::ID_BIBLIO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MapelBiblioPeer::MATA_PELAJARAN_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MapelBiblioPeer::ID_BIBLIO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MapelBiblioPeer::MATA_PELAJARAN_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_biblio column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBiblio('fooValue');   // WHERE id_biblio = 'fooValue'
     * $query->filterByIdBiblio('%fooValue%'); // WHERE id_biblio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBiblio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByIdBiblio($idBiblio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBiblio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBiblio)) {
                $idBiblio = str_replace('*', '%', $idBiblio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MapelBiblioPeer::ID_BIBLIO, $idBiblio, $comparison);
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
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(MapelBiblioPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(MapelBiblioPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapelBiblioPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
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
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MapelBiblioPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MapelBiblioPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapelBiblioPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MapelBiblioPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MapelBiblioPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapelBiblioPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(MapelBiblioPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(MapelBiblioPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapelBiblioPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MapelBiblioPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MapelBiblioPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MapelBiblioPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Biblio object
     *
     * @param   Biblio|PropelObjectCollection $biblio The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MapelBiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBiblio($biblio, $comparison = null)
    {
        if ($biblio instanceof Biblio) {
            return $this
                ->addUsingAlias(MapelBiblioPeer::ID_BIBLIO, $biblio->getIdBiblio(), $comparison);
        } elseif ($biblio instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapelBiblioPeer::ID_BIBLIO, $biblio->toKeyValue('PrimaryKey', 'IdBiblio'), $comparison);
        } else {
            throw new PropelException('filterByBiblio() only accepts arguments of type Biblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Biblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function joinBiblio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Biblio');

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
            $this->addJoinObject($join, 'Biblio');
        }

        return $this;
    }

    /**
     * Use the Biblio relation Biblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BiblioQuery A secondary query class using the current class as primary query
     */
    public function useBiblioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Biblio', '\DataDikdas\Model\BiblioQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MapelBiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(MapelBiblioPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MapelBiblioPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
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
     * @return MapelBiblioQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   MapelBiblio $mapelBiblio Object to remove from the list of results
     *
     * @return MapelBiblioQuery The current query, for fluid interface
     */
    public function prune($mapelBiblio = null)
    {
        if ($mapelBiblio) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MapelBiblioPeer::ID_BIBLIO), $mapelBiblio->getIdBiblio(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MapelBiblioPeer::MATA_PELAJARAN_ID), $mapelBiblio->getMataPelajaranId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
