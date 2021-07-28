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
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuLongitudinal;
use DataDikdas\Model\BukuLongitudinalPeer;
use DataDikdas\Model\BukuLongitudinalQuery;
use DataDikdas\Model\Semester;

/**
 * Base class that represents a query for the 'buku_longitudinal' table.
 *
 * 
 *
 * @method BukuLongitudinalQuery orderByIdBuku($order = Criteria::ASC) Order by the id_buku column
 * @method BukuLongitudinalQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method BukuLongitudinalQuery orderByJumlah($order = Criteria::ASC) Order by the jumlah column
 * @method BukuLongitudinalQuery orderByStatusKelaikan($order = Criteria::ASC) Order by the status_kelaikan column
 * @method BukuLongitudinalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BukuLongitudinalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BukuLongitudinalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BukuLongitudinalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BukuLongitudinalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BukuLongitudinalQuery groupByIdBuku() Group by the id_buku column
 * @method BukuLongitudinalQuery groupBySemesterId() Group by the semester_id column
 * @method BukuLongitudinalQuery groupByJumlah() Group by the jumlah column
 * @method BukuLongitudinalQuery groupByStatusKelaikan() Group by the status_kelaikan column
 * @method BukuLongitudinalQuery groupByCreateDate() Group by the create_date column
 * @method BukuLongitudinalQuery groupByLastUpdate() Group by the last_update column
 * @method BukuLongitudinalQuery groupBySoftDelete() Group by the soft_delete column
 * @method BukuLongitudinalQuery groupByLastSync() Group by the last_sync column
 * @method BukuLongitudinalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BukuLongitudinalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BukuLongitudinalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BukuLongitudinalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BukuLongitudinalQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method BukuLongitudinalQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method BukuLongitudinalQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method BukuLongitudinalQuery leftJoinBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buku relation
 * @method BukuLongitudinalQuery rightJoinBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buku relation
 * @method BukuLongitudinalQuery innerJoinBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the Buku relation
 *
 * @method BukuLongitudinal findOne(PropelPDO $con = null) Return the first BukuLongitudinal matching the query
 * @method BukuLongitudinal findOneOrCreate(PropelPDO $con = null) Return the first BukuLongitudinal matching the query, or a new BukuLongitudinal object populated from the query conditions when no match is found
 *
 * @method BukuLongitudinal findOneByIdBuku(string $id_buku) Return the first BukuLongitudinal filtered by the id_buku column
 * @method BukuLongitudinal findOneBySemesterId(string $semester_id) Return the first BukuLongitudinal filtered by the semester_id column
 * @method BukuLongitudinal findOneByJumlah(int $jumlah) Return the first BukuLongitudinal filtered by the jumlah column
 * @method BukuLongitudinal findOneByStatusKelaikan(string $status_kelaikan) Return the first BukuLongitudinal filtered by the status_kelaikan column
 * @method BukuLongitudinal findOneByCreateDate(string $create_date) Return the first BukuLongitudinal filtered by the create_date column
 * @method BukuLongitudinal findOneByLastUpdate(string $last_update) Return the first BukuLongitudinal filtered by the last_update column
 * @method BukuLongitudinal findOneBySoftDelete(string $soft_delete) Return the first BukuLongitudinal filtered by the soft_delete column
 * @method BukuLongitudinal findOneByLastSync(string $last_sync) Return the first BukuLongitudinal filtered by the last_sync column
 * @method BukuLongitudinal findOneByUpdaterId(string $updater_id) Return the first BukuLongitudinal filtered by the updater_id column
 *
 * @method array findByIdBuku(string $id_buku) Return BukuLongitudinal objects filtered by the id_buku column
 * @method array findBySemesterId(string $semester_id) Return BukuLongitudinal objects filtered by the semester_id column
 * @method array findByJumlah(int $jumlah) Return BukuLongitudinal objects filtered by the jumlah column
 * @method array findByStatusKelaikan(string $status_kelaikan) Return BukuLongitudinal objects filtered by the status_kelaikan column
 * @method array findByCreateDate(string $create_date) Return BukuLongitudinal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BukuLongitudinal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BukuLongitudinal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BukuLongitudinal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BukuLongitudinal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBukuLongitudinalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBukuLongitudinalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BukuLongitudinal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BukuLongitudinalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BukuLongitudinalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BukuLongitudinalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BukuLongitudinalQuery) {
            return $criteria;
        }
        $query = new BukuLongitudinalQuery();
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
                         A Primary key composition: [$id_buku, $semester_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   BukuLongitudinal|BukuLongitudinal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BukuLongitudinalPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BukuLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BukuLongitudinal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_buku", "semester_id", "jumlah", "status_kelaikan", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "buku_longitudinal" WHERE "id_buku" = :p0 AND "semester_id" = :p1';
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
            $obj = new BukuLongitudinal();
            $obj->hydrate($row);
            BukuLongitudinalPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return BukuLongitudinal|BukuLongitudinal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BukuLongitudinal[]|mixed the list of results, formatted by the current formatter
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
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BukuLongitudinalPeer::ID_BUKU, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BukuLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BukuLongitudinalPeer::ID_BUKU, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BukuLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBuku('fooValue');   // WHERE id_buku = 'fooValue'
     * $query->filterByIdBuku('%fooValue%'); // WHERE id_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByIdBuku($idBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBuku)) {
                $idBuku = str_replace('*', '%', $idBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::ID_BUKU, $idBuku, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the jumlah column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlah(1234); // WHERE jumlah = 1234
     * $query->filterByJumlah(array(12, 34)); // WHERE jumlah IN (12, 34)
     * $query->filterByJumlah(array('min' => 12)); // WHERE jumlah >= 12
     * $query->filterByJumlah(array('max' => 12)); // WHERE jumlah <= 12
     * </code>
     *
     * @param     mixed $jumlah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByJumlah($jumlah = null, $comparison = null)
    {
        if (is_array($jumlah)) {
            $useMinMax = false;
            if (isset($jumlah['min'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::JUMLAH, $jumlah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlah['max'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::JUMLAH, $jumlah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::JUMLAH, $jumlah, $comparison);
    }

    /**
     * Filter the query on the status_kelaikan column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusKelaikan(1234); // WHERE status_kelaikan = 1234
     * $query->filterByStatusKelaikan(array(12, 34)); // WHERE status_kelaikan IN (12, 34)
     * $query->filterByStatusKelaikan(array('min' => 12)); // WHERE status_kelaikan >= 12
     * $query->filterByStatusKelaikan(array('max' => 12)); // WHERE status_kelaikan <= 12
     * </code>
     *
     * @param     mixed $statusKelaikan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByStatusKelaikan($statusKelaikan = null, $comparison = null)
    {
        if (is_array($statusKelaikan)) {
            $useMinMax = false;
            if (isset($statusKelaikan['min'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::STATUS_KELAIKAN, $statusKelaikan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKelaikan['max'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::STATUS_KELAIKAN, $statusKelaikan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::STATUS_KELAIKAN, $statusKelaikan, $comparison);
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
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BukuLongitudinalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuLongitudinalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BukuLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BukuLongitudinalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(BukuLongitudinalPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuLongitudinalPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

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
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Filter the query by a related Buku object
     *
     * @param   Buku|PropelObjectCollection $buku The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBuku($buku, $comparison = null)
    {
        if ($buku instanceof Buku) {
            return $this
                ->addUsingAlias(BukuLongitudinalPeer::ID_BUKU, $buku->getIdBuku(), $comparison);
        } elseif ($buku instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuLongitudinalPeer::ID_BUKU, $buku->toKeyValue('PrimaryKey', 'IdBuku'), $comparison);
        } else {
            throw new PropelException('filterByBuku() only accepts arguments of type Buku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Buku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function joinBuku($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Buku');

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
            $this->addJoinObject($join, 'Buku');
        }

        return $this;
    }

    /**
     * Use the Buku relation Buku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuQuery A secondary query class using the current class as primary query
     */
    public function useBukuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Buku', '\DataDikdas\Model\BukuQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BukuLongitudinal $bukuLongitudinal Object to remove from the list of results
     *
     * @return BukuLongitudinalQuery The current query, for fluid interface
     */
    public function prune($bukuLongitudinal = null)
    {
        if ($bukuLongitudinal) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BukuLongitudinalPeer::ID_BUKU), $bukuLongitudinal->getIdBuku(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BukuLongitudinalPeer::SEMESTER_ID), $bukuLongitudinal->getSemesterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
