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
use DataDikdas\Model\DaftarAuthor;
use DataDikdas\Model\DaftarAuthorPeer;
use DataDikdas\Model\DaftarAuthorQuery;

/**
 * Base class that represents a query for the 'pustaka.daftar_author' table.
 *
 * 
 *
 * @method DaftarAuthorQuery orderByIdBiblio($order = Criteria::ASC) Order by the id_biblio column
 * @method DaftarAuthorQuery orderByUrutanAuthor($order = Criteria::ASC) Order by the urutan_author column
 * @method DaftarAuthorQuery orderByIdAuthor($order = Criteria::ASC) Order by the id_author column
 * @method DaftarAuthorQuery orderByPeranBiblio($order = Criteria::ASC) Order by the peran_biblio column
 * @method DaftarAuthorQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method DaftarAuthorQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method DaftarAuthorQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method DaftarAuthorQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method DaftarAuthorQuery groupByIdBiblio() Group by the id_biblio column
 * @method DaftarAuthorQuery groupByUrutanAuthor() Group by the urutan_author column
 * @method DaftarAuthorQuery groupByIdAuthor() Group by the id_author column
 * @method DaftarAuthorQuery groupByPeranBiblio() Group by the peran_biblio column
 * @method DaftarAuthorQuery groupByCreateDate() Group by the create_date column
 * @method DaftarAuthorQuery groupByLastUpdate() Group by the last_update column
 * @method DaftarAuthorQuery groupByExpiredDate() Group by the expired_date column
 * @method DaftarAuthorQuery groupByLastSync() Group by the last_sync column
 *
 * @method DaftarAuthorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DaftarAuthorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DaftarAuthorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DaftarAuthorQuery leftJoinBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Biblio relation
 * @method DaftarAuthorQuery rightJoinBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Biblio relation
 * @method DaftarAuthorQuery innerJoinBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the Biblio relation
 *
 * @method DaftarAuthor findOne(PropelPDO $con = null) Return the first DaftarAuthor matching the query
 * @method DaftarAuthor findOneOrCreate(PropelPDO $con = null) Return the first DaftarAuthor matching the query, or a new DaftarAuthor object populated from the query conditions when no match is found
 *
 * @method DaftarAuthor findOneByIdBiblio(string $id_biblio) Return the first DaftarAuthor filtered by the id_biblio column
 * @method DaftarAuthor findOneByUrutanAuthor(string $urutan_author) Return the first DaftarAuthor filtered by the urutan_author column
 * @method DaftarAuthor findOneByIdAuthor(string $id_author) Return the first DaftarAuthor filtered by the id_author column
 * @method DaftarAuthor findOneByPeranBiblio(string $peran_biblio) Return the first DaftarAuthor filtered by the peran_biblio column
 * @method DaftarAuthor findOneByCreateDate(string $create_date) Return the first DaftarAuthor filtered by the create_date column
 * @method DaftarAuthor findOneByLastUpdate(string $last_update) Return the first DaftarAuthor filtered by the last_update column
 * @method DaftarAuthor findOneByExpiredDate(string $expired_date) Return the first DaftarAuthor filtered by the expired_date column
 * @method DaftarAuthor findOneByLastSync(string $last_sync) Return the first DaftarAuthor filtered by the last_sync column
 *
 * @method array findByIdBiblio(string $id_biblio) Return DaftarAuthor objects filtered by the id_biblio column
 * @method array findByUrutanAuthor(string $urutan_author) Return DaftarAuthor objects filtered by the urutan_author column
 * @method array findByIdAuthor(string $id_author) Return DaftarAuthor objects filtered by the id_author column
 * @method array findByPeranBiblio(string $peran_biblio) Return DaftarAuthor objects filtered by the peran_biblio column
 * @method array findByCreateDate(string $create_date) Return DaftarAuthor objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return DaftarAuthor objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return DaftarAuthor objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return DaftarAuthor objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseDaftarAuthorQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDaftarAuthorQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\DaftarAuthor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DaftarAuthorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DaftarAuthorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DaftarAuthorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DaftarAuthorQuery) {
            return $criteria;
        }
        $query = new DaftarAuthorQuery();
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
                         A Primary key composition: [$id_biblio, $urutan_author]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   DaftarAuthor|DaftarAuthor[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DaftarAuthorPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DaftarAuthorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 DaftarAuthor A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_biblio", "urutan_author", "id_author", "peran_biblio", "create_date", "last_update", "expired_date", "last_sync" FROM "pustaka"."daftar_author" WHERE "id_biblio" = :p0 AND "urutan_author" = :p1';
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
            $obj = new DaftarAuthor();
            $obj->hydrate($row);
            DaftarAuthorPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return DaftarAuthor|DaftarAuthor[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DaftarAuthor[]|mixed the list of results, formatted by the current formatter
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
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DaftarAuthorPeer::ID_BIBLIO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DaftarAuthorPeer::URUTAN_AUTHOR, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DaftarAuthorPeer::ID_BIBLIO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DaftarAuthorPeer::URUTAN_AUTHOR, $key[1], Criteria::EQUAL);
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
     * @return DaftarAuthorQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DaftarAuthorPeer::ID_BIBLIO, $idBiblio, $comparison);
    }

    /**
     * Filter the query on the urutan_author column
     *
     * Example usage:
     * <code>
     * $query->filterByUrutanAuthor(1234); // WHERE urutan_author = 1234
     * $query->filterByUrutanAuthor(array(12, 34)); // WHERE urutan_author IN (12, 34)
     * $query->filterByUrutanAuthor(array('min' => 12)); // WHERE urutan_author >= 12
     * $query->filterByUrutanAuthor(array('max' => 12)); // WHERE urutan_author <= 12
     * </code>
     *
     * @param     mixed $urutanAuthor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByUrutanAuthor($urutanAuthor = null, $comparison = null)
    {
        if (is_array($urutanAuthor)) {
            $useMinMax = false;
            if (isset($urutanAuthor['min'])) {
                $this->addUsingAlias(DaftarAuthorPeer::URUTAN_AUTHOR, $urutanAuthor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($urutanAuthor['max'])) {
                $this->addUsingAlias(DaftarAuthorPeer::URUTAN_AUTHOR, $urutanAuthor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DaftarAuthorPeer::URUTAN_AUTHOR, $urutanAuthor, $comparison);
    }

    /**
     * Filter the query on the id_author column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAuthor('fooValue');   // WHERE id_author = 'fooValue'
     * $query->filterByIdAuthor('%fooValue%'); // WHERE id_author LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAuthor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByIdAuthor($idAuthor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAuthor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAuthor)) {
                $idAuthor = str_replace('*', '%', $idAuthor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DaftarAuthorPeer::ID_AUTHOR, $idAuthor, $comparison);
    }

    /**
     * Filter the query on the peran_biblio column
     *
     * Example usage:
     * <code>
     * $query->filterByPeranBiblio(1234); // WHERE peran_biblio = 1234
     * $query->filterByPeranBiblio(array(12, 34)); // WHERE peran_biblio IN (12, 34)
     * $query->filterByPeranBiblio(array('min' => 12)); // WHERE peran_biblio >= 12
     * $query->filterByPeranBiblio(array('max' => 12)); // WHERE peran_biblio <= 12
     * </code>
     *
     * @param     mixed $peranBiblio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByPeranBiblio($peranBiblio = null, $comparison = null)
    {
        if (is_array($peranBiblio)) {
            $useMinMax = false;
            if (isset($peranBiblio['min'])) {
                $this->addUsingAlias(DaftarAuthorPeer::PERAN_BIBLIO, $peranBiblio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($peranBiblio['max'])) {
                $this->addUsingAlias(DaftarAuthorPeer::PERAN_BIBLIO, $peranBiblio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DaftarAuthorPeer::PERAN_BIBLIO, $peranBiblio, $comparison);
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
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(DaftarAuthorPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(DaftarAuthorPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DaftarAuthorPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(DaftarAuthorPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(DaftarAuthorPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DaftarAuthorPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(DaftarAuthorPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(DaftarAuthorPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DaftarAuthorPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(DaftarAuthorPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(DaftarAuthorPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DaftarAuthorPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Biblio object
     *
     * @param   Biblio|PropelObjectCollection $biblio The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DaftarAuthorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBiblio($biblio, $comparison = null)
    {
        if ($biblio instanceof Biblio) {
            return $this
                ->addUsingAlias(DaftarAuthorPeer::ID_BIBLIO, $biblio->getIdBiblio(), $comparison);
        } elseif ($biblio instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DaftarAuthorPeer::ID_BIBLIO, $biblio->toKeyValue('PrimaryKey', 'IdBiblio'), $comparison);
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
     * @return DaftarAuthorQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   DaftarAuthor $daftarAuthor Object to remove from the list of results
     *
     * @return DaftarAuthorQuery The current query, for fluid interface
     */
    public function prune($daftarAuthor = null)
    {
        if ($daftarAuthor) {
            $this->addCond('pruneCond0', $this->getAliasedColName(DaftarAuthorPeer::ID_BIBLIO), $daftarAuthor->getIdBiblio(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(DaftarAuthorPeer::URUTAN_AUTHOR), $daftarAuthor->getUrutanAuthor(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
