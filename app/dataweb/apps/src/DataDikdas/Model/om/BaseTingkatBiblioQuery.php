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
use DataDikdas\Model\TingkatBiblio;
use DataDikdas\Model\TingkatBiblioPeer;
use DataDikdas\Model\TingkatBiblioQuery;
use DataDikdas\Model\TingkatPendidikan;

/**
 * Base class that represents a query for the 'pustaka.tingkat_biblio' table.
 *
 * 
 *
 * @method TingkatBiblioQuery orderByIdBiblio($order = Criteria::ASC) Order by the id_biblio column
 * @method TingkatBiblioQuery orderByTingkatPendidikanId($order = Criteria::ASC) Order by the tingkat_pendidikan_id column
 * @method TingkatBiblioQuery orderByBentukPendidikanId($order = Criteria::ASC) Order by the bentuk_pendidikan_id column
 * @method TingkatBiblioQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TingkatBiblioQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TingkatBiblioQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method TingkatBiblioQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method TingkatBiblioQuery groupByIdBiblio() Group by the id_biblio column
 * @method TingkatBiblioQuery groupByTingkatPendidikanId() Group by the tingkat_pendidikan_id column
 * @method TingkatBiblioQuery groupByBentukPendidikanId() Group by the bentuk_pendidikan_id column
 * @method TingkatBiblioQuery groupByCreateDate() Group by the create_date column
 * @method TingkatBiblioQuery groupByLastUpdate() Group by the last_update column
 * @method TingkatBiblioQuery groupByExpiredDate() Group by the expired_date column
 * @method TingkatBiblioQuery groupByLastSync() Group by the last_sync column
 *
 * @method TingkatBiblioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TingkatBiblioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TingkatBiblioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TingkatBiblioQuery leftJoinBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Biblio relation
 * @method TingkatBiblioQuery rightJoinBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Biblio relation
 * @method TingkatBiblioQuery innerJoinBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the Biblio relation
 *
 * @method TingkatBiblioQuery leftJoinTingkatPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPendidikan relation
 * @method TingkatBiblioQuery rightJoinTingkatPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPendidikan relation
 * @method TingkatBiblioQuery innerJoinTingkatPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPendidikan relation
 *
 * @method TingkatBiblio findOne(PropelPDO $con = null) Return the first TingkatBiblio matching the query
 * @method TingkatBiblio findOneOrCreate(PropelPDO $con = null) Return the first TingkatBiblio matching the query, or a new TingkatBiblio object populated from the query conditions when no match is found
 *
 * @method TingkatBiblio findOneByIdBiblio(string $id_biblio) Return the first TingkatBiblio filtered by the id_biblio column
 * @method TingkatBiblio findOneByTingkatPendidikanId(string $tingkat_pendidikan_id) Return the first TingkatBiblio filtered by the tingkat_pendidikan_id column
 * @method TingkatBiblio findOneByBentukPendidikanId(int $bentuk_pendidikan_id) Return the first TingkatBiblio filtered by the bentuk_pendidikan_id column
 * @method TingkatBiblio findOneByCreateDate(string $create_date) Return the first TingkatBiblio filtered by the create_date column
 * @method TingkatBiblio findOneByLastUpdate(string $last_update) Return the first TingkatBiblio filtered by the last_update column
 * @method TingkatBiblio findOneByExpiredDate(string $expired_date) Return the first TingkatBiblio filtered by the expired_date column
 * @method TingkatBiblio findOneByLastSync(string $last_sync) Return the first TingkatBiblio filtered by the last_sync column
 *
 * @method array findByIdBiblio(string $id_biblio) Return TingkatBiblio objects filtered by the id_biblio column
 * @method array findByTingkatPendidikanId(string $tingkat_pendidikan_id) Return TingkatBiblio objects filtered by the tingkat_pendidikan_id column
 * @method array findByBentukPendidikanId(int $bentuk_pendidikan_id) Return TingkatBiblio objects filtered by the bentuk_pendidikan_id column
 * @method array findByCreateDate(string $create_date) Return TingkatBiblio objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TingkatBiblio objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return TingkatBiblio objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return TingkatBiblio objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTingkatBiblioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTingkatBiblioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TingkatBiblio', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TingkatBiblioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TingkatBiblioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TingkatBiblioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TingkatBiblioQuery) {
            return $criteria;
        }
        $query = new TingkatBiblioQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$id_biblio, $tingkat_pendidikan_id, $bentuk_pendidikan_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   TingkatBiblio|TingkatBiblio[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TingkatBiblioPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TingkatBiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TingkatBiblio A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_biblio", "tingkat_pendidikan_id", "bentuk_pendidikan_id", "create_date", "last_update", "expired_date", "last_sync" FROM "pustaka"."tingkat_biblio" WHERE "id_biblio" = :p0 AND "tingkat_pendidikan_id" = :p1 AND "bentuk_pendidikan_id" = :p2';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);			
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new TingkatBiblio();
            $obj->hydrate($row);
            TingkatBiblioPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return TingkatBiblio|TingkatBiblio[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TingkatBiblio[]|mixed the list of results, formatted by the current formatter
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
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TingkatBiblioPeer::ID_BIBLIO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(TingkatBiblioPeer::BENTUK_PENDIDIKAN_ID, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TingkatBiblioPeer::ID_BIBLIO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(TingkatBiblioPeer::BENTUK_PENDIDIKAN_ID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
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
     * @return TingkatBiblioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TingkatBiblioPeer::ID_BIBLIO, $idBiblio, $comparison);
    }

    /**
     * Filter the query on the tingkat_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkatPendidikanId(1234); // WHERE tingkat_pendidikan_id = 1234
     * $query->filterByTingkatPendidikanId(array(12, 34)); // WHERE tingkat_pendidikan_id IN (12, 34)
     * $query->filterByTingkatPendidikanId(array('min' => 12)); // WHERE tingkat_pendidikan_id >= 12
     * $query->filterByTingkatPendidikanId(array('max' => 12)); // WHERE tingkat_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByTingkatPendidikan()
     *
     * @param     mixed $tingkatPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByTingkatPendidikanId($tingkatPendidikanId = null, $comparison = null)
    {
        if (is_array($tingkatPendidikanId)) {
            $useMinMax = false;
            if (isset($tingkatPendidikanId['min'])) {
                $this->addUsingAlias(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPendidikanId['max'])) {
                $this->addUsingAlias(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId, $comparison);
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
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByBentukPendidikanId($bentukPendidikanId = null, $comparison = null)
    {
        if (is_array($bentukPendidikanId)) {
            $useMinMax = false;
            if (isset($bentukPendidikanId['min'])) {
                $this->addUsingAlias(TingkatBiblioPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bentukPendidikanId['max'])) {
                $this->addUsingAlias(TingkatBiblioPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatBiblioPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId, $comparison);
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
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TingkatBiblioPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TingkatBiblioPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatBiblioPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TingkatBiblioPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TingkatBiblioPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatBiblioPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(TingkatBiblioPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(TingkatBiblioPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatBiblioPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TingkatBiblioPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TingkatBiblioPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatBiblioPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Biblio object
     *
     * @param   Biblio|PropelObjectCollection $biblio The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatBiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBiblio($biblio, $comparison = null)
    {
        if ($biblio instanceof Biblio) {
            return $this
                ->addUsingAlias(TingkatBiblioPeer::ID_BIBLIO, $biblio->getIdBiblio(), $comparison);
        } elseif ($biblio instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TingkatBiblioPeer::ID_BIBLIO, $biblio->toKeyValue('PrimaryKey', 'IdBiblio'), $comparison);
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
     * @return TingkatBiblioQuery The current query, for fluid interface
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
     * Filter the query by a related TingkatPendidikan object
     *
     * @param   TingkatPendidikan|PropelObjectCollection $tingkatPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatBiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPendidikan($tingkatPendidikan, $comparison = null)
    {
        if ($tingkatPendidikan instanceof TingkatPendidikan) {
            return $this
                ->addUsingAlias(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->getTingkatPendidikanId(), $comparison);
        } elseif ($tingkatPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->toKeyValue('PrimaryKey', 'TingkatPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByTingkatPendidikan() only accepts arguments of type TingkatPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function joinTingkatPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatPendidikan');

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
            $this->addJoinObject($join, 'TingkatPendidikan');
        }

        return $this;
    }

    /**
     * Use the TingkatPendidikan relation TingkatPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useTingkatPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatPendidikan', '\DataDikdas\Model\TingkatPendidikanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TingkatBiblio $tingkatBiblio Object to remove from the list of results
     *
     * @return TingkatBiblioQuery The current query, for fluid interface
     */
    public function prune($tingkatBiblio = null)
    {
        if ($tingkatBiblio) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TingkatBiblioPeer::ID_BIBLIO), $tingkatBiblio->getIdBiblio(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TingkatBiblioPeer::TINGKAT_PENDIDIKAN_ID), $tingkatBiblio->getTingkatPendidikanId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(TingkatBiblioPeer::BENTUK_PENDIDIKAN_ID), $tingkatBiblio->getBentukPendidikanId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
