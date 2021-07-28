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
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatLongitudinal;
use DataDikdas\Model\AlatLongitudinalPeer;
use DataDikdas\Model\AlatLongitudinalQuery;
use DataDikdas\Model\Semester;

/**
 * Base class that represents a query for the 'alat_longitudinal' table.
 *
 * 
 *
 * @method AlatLongitudinalQuery orderByIdAlat($order = Criteria::ASC) Order by the id_alat column
 * @method AlatLongitudinalQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method AlatLongitudinalQuery orderByJumlah($order = Criteria::ASC) Order by the jumlah column
 * @method AlatLongitudinalQuery orderByJumlahLaik($order = Criteria::ASC) Order by the jumlah_laik column
 * @method AlatLongitudinalQuery orderByStatusKelaikan($order = Criteria::ASC) Order by the status_kelaikan column
 * @method AlatLongitudinalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AlatLongitudinalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AlatLongitudinalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AlatLongitudinalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AlatLongitudinalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AlatLongitudinalQuery groupByIdAlat() Group by the id_alat column
 * @method AlatLongitudinalQuery groupBySemesterId() Group by the semester_id column
 * @method AlatLongitudinalQuery groupByJumlah() Group by the jumlah column
 * @method AlatLongitudinalQuery groupByJumlahLaik() Group by the jumlah_laik column
 * @method AlatLongitudinalQuery groupByStatusKelaikan() Group by the status_kelaikan column
 * @method AlatLongitudinalQuery groupByCreateDate() Group by the create_date column
 * @method AlatLongitudinalQuery groupByLastUpdate() Group by the last_update column
 * @method AlatLongitudinalQuery groupBySoftDelete() Group by the soft_delete column
 * @method AlatLongitudinalQuery groupByLastSync() Group by the last_sync column
 * @method AlatLongitudinalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AlatLongitudinalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AlatLongitudinalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AlatLongitudinalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AlatLongitudinalQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method AlatLongitudinalQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method AlatLongitudinalQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method AlatLongitudinalQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method AlatLongitudinalQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method AlatLongitudinalQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method AlatLongitudinal findOne(PropelPDO $con = null) Return the first AlatLongitudinal matching the query
 * @method AlatLongitudinal findOneOrCreate(PropelPDO $con = null) Return the first AlatLongitudinal matching the query, or a new AlatLongitudinal object populated from the query conditions when no match is found
 *
 * @method AlatLongitudinal findOneByIdAlat(string $id_alat) Return the first AlatLongitudinal filtered by the id_alat column
 * @method AlatLongitudinal findOneBySemesterId(string $semester_id) Return the first AlatLongitudinal filtered by the semester_id column
 * @method AlatLongitudinal findOneByJumlah(int $jumlah) Return the first AlatLongitudinal filtered by the jumlah column
 * @method AlatLongitudinal findOneByJumlahLaik(int $jumlah_laik) Return the first AlatLongitudinal filtered by the jumlah_laik column
 * @method AlatLongitudinal findOneByStatusKelaikan(string $status_kelaikan) Return the first AlatLongitudinal filtered by the status_kelaikan column
 * @method AlatLongitudinal findOneByCreateDate(string $create_date) Return the first AlatLongitudinal filtered by the create_date column
 * @method AlatLongitudinal findOneByLastUpdate(string $last_update) Return the first AlatLongitudinal filtered by the last_update column
 * @method AlatLongitudinal findOneBySoftDelete(string $soft_delete) Return the first AlatLongitudinal filtered by the soft_delete column
 * @method AlatLongitudinal findOneByLastSync(string $last_sync) Return the first AlatLongitudinal filtered by the last_sync column
 * @method AlatLongitudinal findOneByUpdaterId(string $updater_id) Return the first AlatLongitudinal filtered by the updater_id column
 *
 * @method array findByIdAlat(string $id_alat) Return AlatLongitudinal objects filtered by the id_alat column
 * @method array findBySemesterId(string $semester_id) Return AlatLongitudinal objects filtered by the semester_id column
 * @method array findByJumlah(int $jumlah) Return AlatLongitudinal objects filtered by the jumlah column
 * @method array findByJumlahLaik(int $jumlah_laik) Return AlatLongitudinal objects filtered by the jumlah_laik column
 * @method array findByStatusKelaikan(string $status_kelaikan) Return AlatLongitudinal objects filtered by the status_kelaikan column
 * @method array findByCreateDate(string $create_date) Return AlatLongitudinal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AlatLongitudinal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AlatLongitudinal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AlatLongitudinal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AlatLongitudinal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAlatLongitudinalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAlatLongitudinalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AlatLongitudinal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AlatLongitudinalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AlatLongitudinalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AlatLongitudinalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AlatLongitudinalQuery) {
            return $criteria;
        }
        $query = new AlatLongitudinalQuery();
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
                         A Primary key composition: [$id_alat, $semester_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   AlatLongitudinal|AlatLongitudinal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AlatLongitudinalPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AlatLongitudinal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_alat", "semester_id", "jumlah", "jumlah_laik", "status_kelaikan", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "alat_longitudinal" WHERE "id_alat" = :p0 AND "semester_id" = :p1';
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
            $obj = new AlatLongitudinal();
            $obj->hydrate($row);
            AlatLongitudinalPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return AlatLongitudinal|AlatLongitudinal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AlatLongitudinal[]|mixed the list of results, formatted by the current formatter
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AlatLongitudinalPeer::ID_ALAT, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AlatLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AlatLongitudinalPeer::ID_ALAT, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AlatLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_alat column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAlat('fooValue');   // WHERE id_alat = 'fooValue'
     * $query->filterByIdAlat('%fooValue%'); // WHERE id_alat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAlat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByIdAlat($idAlat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAlat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAlat)) {
                $idAlat = str_replace('*', '%', $idAlat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::ID_ALAT, $idAlat, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatLongitudinalPeer::SEMESTER_ID, $semesterId, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByJumlah($jumlah = null, $comparison = null)
    {
        if (is_array($jumlah)) {
            $useMinMax = false;
            if (isset($jumlah['min'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::JUMLAH, $jumlah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlah['max'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::JUMLAH, $jumlah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::JUMLAH, $jumlah, $comparison);
    }

    /**
     * Filter the query on the jumlah_laik column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahLaik(1234); // WHERE jumlah_laik = 1234
     * $query->filterByJumlahLaik(array(12, 34)); // WHERE jumlah_laik IN (12, 34)
     * $query->filterByJumlahLaik(array('min' => 12)); // WHERE jumlah_laik >= 12
     * $query->filterByJumlahLaik(array('max' => 12)); // WHERE jumlah_laik <= 12
     * </code>
     *
     * @param     mixed $jumlahLaik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByJumlahLaik($jumlahLaik = null, $comparison = null)
    {
        if (is_array($jumlahLaik)) {
            $useMinMax = false;
            if (isset($jumlahLaik['min'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::JUMLAH_LAIK, $jumlahLaik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahLaik['max'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::JUMLAH_LAIK, $jumlahLaik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::JUMLAH_LAIK, $jumlahLaik, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByStatusKelaikan($statusKelaikan = null, $comparison = null)
    {
        if (is_array($statusKelaikan)) {
            $useMinMax = false;
            if (isset($statusKelaikan['min'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::STATUS_KELAIKAN, $statusKelaikan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKelaikan['max'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::STATUS_KELAIKAN, $statusKelaikan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::STATUS_KELAIKAN, $statusKelaikan, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AlatLongitudinalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatLongitudinalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatLongitudinalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(AlatLongitudinalPeer::ID_ALAT, $alat->getIdAlat(), $comparison);
        } elseif ($alat instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatLongitudinalPeer::ID_ALAT, $alat->toKeyValue('PrimaryKey', 'IdAlat'), $comparison);
        } else {
            throw new PropelException('filterByAlat() only accepts arguments of type Alat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alat');

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
            $this->addJoinObject($join, 'Alat');
        }

        return $this;
    }

    /**
     * Use the Alat relation Alat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatQuery A secondary query class using the current class as primary query
     */
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alat', '\DataDikdas\Model\AlatQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(AlatLongitudinalPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatLongitudinalPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
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
     * @return AlatLongitudinalQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   AlatLongitudinal $alatLongitudinal Object to remove from the list of results
     *
     * @return AlatLongitudinalQuery The current query, for fluid interface
     */
    public function prune($alatLongitudinal = null)
    {
        if ($alatLongitudinal) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AlatLongitudinalPeer::ID_ALAT), $alatLongitudinal->getIdAlat(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AlatLongitudinalPeer::SEMESTER_ID), $alatLongitudinal->getSemesterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
