<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Author;
use DataDikdas\Model\AuthorPeer;
use DataDikdas\Model\AuthorQuery;

/**
 * Base class that represents a query for the 'author' table.
 *
 * 
 *
 * @method AuthorQuery orderByIdAuthor($order = Criteria::ASC) Order by the id_author column
 * @method AuthorQuery orderByNmAuhor($order = Criteria::ASC) Order by the nm_auhor column
 * @method AuthorQuery orderByNmAlias1($order = Criteria::ASC) Order by the nm_alias1 column
 * @method AuthorQuery orderByNmAlias2($order = Criteria::ASC) Order by the nm_alias2 column
 * @method AuthorQuery orderByNmAlias3($order = Criteria::ASC) Order by the nm_alias3 column
 * @method AuthorQuery orderByNikAuthor($order = Criteria::ASC) Order by the nik_author column
 * @method AuthorQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AuthorQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AuthorQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method AuthorQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method AuthorQuery groupByIdAuthor() Group by the id_author column
 * @method AuthorQuery groupByNmAuhor() Group by the nm_auhor column
 * @method AuthorQuery groupByNmAlias1() Group by the nm_alias1 column
 * @method AuthorQuery groupByNmAlias2() Group by the nm_alias2 column
 * @method AuthorQuery groupByNmAlias3() Group by the nm_alias3 column
 * @method AuthorQuery groupByNikAuthor() Group by the nik_author column
 * @method AuthorQuery groupByCreateDate() Group by the create_date column
 * @method AuthorQuery groupByLastUpdate() Group by the last_update column
 * @method AuthorQuery groupByExpiredDate() Group by the expired_date column
 * @method AuthorQuery groupByLastSync() Group by the last_sync column
 *
 * @method AuthorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AuthorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AuthorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Author findOne(PropelPDO $con = null) Return the first Author matching the query
 * @method Author findOneOrCreate(PropelPDO $con = null) Return the first Author matching the query, or a new Author object populated from the query conditions when no match is found
 *
 * @method Author findOneByNmAuhor(string $nm_auhor) Return the first Author filtered by the nm_auhor column
 * @method Author findOneByNmAlias1(string $nm_alias1) Return the first Author filtered by the nm_alias1 column
 * @method Author findOneByNmAlias2(string $nm_alias2) Return the first Author filtered by the nm_alias2 column
 * @method Author findOneByNmAlias3(string $nm_alias3) Return the first Author filtered by the nm_alias3 column
 * @method Author findOneByNikAuthor(string $nik_author) Return the first Author filtered by the nik_author column
 * @method Author findOneByCreateDate(string $create_date) Return the first Author filtered by the create_date column
 * @method Author findOneByLastUpdate(string $last_update) Return the first Author filtered by the last_update column
 * @method Author findOneByExpiredDate(string $expired_date) Return the first Author filtered by the expired_date column
 * @method Author findOneByLastSync(string $last_sync) Return the first Author filtered by the last_sync column
 *
 * @method array findByIdAuthor(string $id_author) Return Author objects filtered by the id_author column
 * @method array findByNmAuhor(string $nm_auhor) Return Author objects filtered by the nm_auhor column
 * @method array findByNmAlias1(string $nm_alias1) Return Author objects filtered by the nm_alias1 column
 * @method array findByNmAlias2(string $nm_alias2) Return Author objects filtered by the nm_alias2 column
 * @method array findByNmAlias3(string $nm_alias3) Return Author objects filtered by the nm_alias3 column
 * @method array findByNikAuthor(string $nik_author) Return Author objects filtered by the nik_author column
 * @method array findByCreateDate(string $create_date) Return Author objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Author objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Author objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Author objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAuthorQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAuthorQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Author', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AuthorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AuthorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AuthorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AuthorQuery) {
            return $criteria;
        }
        $query = new AuthorQuery();
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
     * @return   Author|Author[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AuthorPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AuthorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Author A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAuthor($key, $con = null)
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
     * @return                 Author A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_author", "nm_auhor", "nm_alias1", "nm_alias2", "nm_alias3", "nik_author", "create_date", "last_update", "expired_date", "last_sync" FROM "author" WHERE "id_author" = :p0';
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
            $obj = new Author();
            $obj->hydrate($row);
            AuthorPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Author|Author[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Author[]|mixed the list of results, formatted by the current formatter
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
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AuthorPeer::ID_AUTHOR, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AuthorPeer::ID_AUTHOR, $keys, Criteria::IN);
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
     * @return AuthorQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AuthorPeer::ID_AUTHOR, $idAuthor, $comparison);
    }

    /**
     * Filter the query on the nm_auhor column
     *
     * Example usage:
     * <code>
     * $query->filterByNmAuhor('fooValue');   // WHERE nm_auhor = 'fooValue'
     * $query->filterByNmAuhor('%fooValue%'); // WHERE nm_auhor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmAuhor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByNmAuhor($nmAuhor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmAuhor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmAuhor)) {
                $nmAuhor = str_replace('*', '%', $nmAuhor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AuthorPeer::NM_AUHOR, $nmAuhor, $comparison);
    }

    /**
     * Filter the query on the nm_alias1 column
     *
     * Example usage:
     * <code>
     * $query->filterByNmAlias1('fooValue');   // WHERE nm_alias1 = 'fooValue'
     * $query->filterByNmAlias1('%fooValue%'); // WHERE nm_alias1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmAlias1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByNmAlias1($nmAlias1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmAlias1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmAlias1)) {
                $nmAlias1 = str_replace('*', '%', $nmAlias1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AuthorPeer::NM_ALIAS1, $nmAlias1, $comparison);
    }

    /**
     * Filter the query on the nm_alias2 column
     *
     * Example usage:
     * <code>
     * $query->filterByNmAlias2('fooValue');   // WHERE nm_alias2 = 'fooValue'
     * $query->filterByNmAlias2('%fooValue%'); // WHERE nm_alias2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmAlias2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByNmAlias2($nmAlias2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmAlias2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmAlias2)) {
                $nmAlias2 = str_replace('*', '%', $nmAlias2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AuthorPeer::NM_ALIAS2, $nmAlias2, $comparison);
    }

    /**
     * Filter the query on the nm_alias3 column
     *
     * Example usage:
     * <code>
     * $query->filterByNmAlias3('fooValue');   // WHERE nm_alias3 = 'fooValue'
     * $query->filterByNmAlias3('%fooValue%'); // WHERE nm_alias3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmAlias3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByNmAlias3($nmAlias3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmAlias3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmAlias3)) {
                $nmAlias3 = str_replace('*', '%', $nmAlias3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AuthorPeer::NM_ALIAS3, $nmAlias3, $comparison);
    }

    /**
     * Filter the query on the nik_author column
     *
     * Example usage:
     * <code>
     * $query->filterByNikAuthor('fooValue');   // WHERE nik_author = 'fooValue'
     * $query->filterByNikAuthor('%fooValue%'); // WHERE nik_author LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nikAuthor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByNikAuthor($nikAuthor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nikAuthor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nikAuthor)) {
                $nikAuthor = str_replace('*', '%', $nikAuthor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AuthorPeer::NIK_AUTHOR, $nikAuthor, $comparison);
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
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AuthorPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AuthorPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AuthorPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AuthorPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AuthorPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AuthorPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(AuthorPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(AuthorPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AuthorPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return AuthorQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AuthorPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AuthorPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AuthorPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Author $author Object to remove from the list of results
     *
     * @return AuthorQuery The current query, for fluid interface
     */
    public function prune($author = null)
    {
        if ($author) {
            $this->addUsingAlias(AuthorPeer::ID_AUTHOR, $author->getIdAuthor(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
