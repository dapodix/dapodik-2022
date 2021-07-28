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
use DataDikdas\Model\KitasPd;
use DataDikdas\Model\KitasPdPeer;
use DataDikdas\Model\KitasPdQuery;
use DataDikdas\Model\PesertaDidik;

/**
 * Base class that represents a query for the 'kitas_pd' table.
 *
 * 
 *
 * @method KitasPdQuery orderByNoKitas($order = Criteria::ASC) Order by the no_kitas column
 * @method KitasPdQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method KitasPdQuery orderByTmtKitas($order = Criteria::ASC) Order by the tmt_kitas column
 * @method KitasPdQuery orderByTstKitas($order = Criteria::ASC) Order by the tst_kitas column
 * @method KitasPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KitasPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KitasPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method KitasPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method KitasPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method KitasPdQuery groupByNoKitas() Group by the no_kitas column
 * @method KitasPdQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method KitasPdQuery groupByTmtKitas() Group by the tmt_kitas column
 * @method KitasPdQuery groupByTstKitas() Group by the tst_kitas column
 * @method KitasPdQuery groupByCreateDate() Group by the create_date column
 * @method KitasPdQuery groupByLastUpdate() Group by the last_update column
 * @method KitasPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method KitasPdQuery groupByLastSync() Group by the last_sync column
 * @method KitasPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method KitasPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KitasPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KitasPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KitasPdQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method KitasPdQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method KitasPdQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method KitasPd findOne(PropelPDO $con = null) Return the first KitasPd matching the query
 * @method KitasPd findOneOrCreate(PropelPDO $con = null) Return the first KitasPd matching the query, or a new KitasPd object populated from the query conditions when no match is found
 *
 * @method KitasPd findOneByPesertaDidikId(string $peserta_didik_id) Return the first KitasPd filtered by the peserta_didik_id column
 * @method KitasPd findOneByTmtKitas(string $tmt_kitas) Return the first KitasPd filtered by the tmt_kitas column
 * @method KitasPd findOneByTstKitas(string $tst_kitas) Return the first KitasPd filtered by the tst_kitas column
 * @method KitasPd findOneByCreateDate(string $create_date) Return the first KitasPd filtered by the create_date column
 * @method KitasPd findOneByLastUpdate(string $last_update) Return the first KitasPd filtered by the last_update column
 * @method KitasPd findOneBySoftDelete(string $soft_delete) Return the first KitasPd filtered by the soft_delete column
 * @method KitasPd findOneByLastSync(string $last_sync) Return the first KitasPd filtered by the last_sync column
 * @method KitasPd findOneByUpdaterId(string $updater_id) Return the first KitasPd filtered by the updater_id column
 *
 * @method array findByNoKitas(string $no_kitas) Return KitasPd objects filtered by the no_kitas column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return KitasPd objects filtered by the peserta_didik_id column
 * @method array findByTmtKitas(string $tmt_kitas) Return KitasPd objects filtered by the tmt_kitas column
 * @method array findByTstKitas(string $tst_kitas) Return KitasPd objects filtered by the tst_kitas column
 * @method array findByCreateDate(string $create_date) Return KitasPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KitasPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return KitasPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return KitasPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return KitasPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKitasPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKitasPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KitasPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KitasPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KitasPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KitasPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KitasPdQuery) {
            return $criteria;
        }
        $query = new KitasPdQuery();
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
     * @return   KitasPd|KitasPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KitasPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KitasPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KitasPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByNoKitas($key, $con = null)
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
     * @return                 KitasPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "no_kitas", "peserta_didik_id", "tmt_kitas", "tst_kitas", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "kitas_pd" WHERE "no_kitas" = :p0';
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
            $obj = new KitasPd();
            $obj->hydrate($row);
            KitasPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KitasPd|KitasPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KitasPd[]|mixed the list of results, formatted by the current formatter
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
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KitasPdPeer::NO_KITAS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KitasPdPeer::NO_KITAS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the no_kitas column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKitas('fooValue');   // WHERE no_kitas = 'fooValue'
     * $query->filterByNoKitas('%fooValue%'); // WHERE no_kitas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKitas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByNoKitas($noKitas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKitas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKitas)) {
                $noKitas = str_replace('*', '%', $noKitas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::NO_KITAS, $noKitas, $comparison);
    }

    /**
     * Filter the query on the peserta_didik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPesertaDidikId('fooValue');   // WHERE peserta_didik_id = 'fooValue'
     * $query->filterByPesertaDidikId('%fooValue%'); // WHERE peserta_didik_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pesertaDidikId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByPesertaDidikId($pesertaDidikId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pesertaDidikId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pesertaDidikId)) {
                $pesertaDidikId = str_replace('*', '%', $pesertaDidikId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
    }

    /**
     * Filter the query on the tmt_kitas column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtKitas('2011-03-14'); // WHERE tmt_kitas = '2011-03-14'
     * $query->filterByTmtKitas('now'); // WHERE tmt_kitas = '2011-03-14'
     * $query->filterByTmtKitas(array('max' => 'yesterday')); // WHERE tmt_kitas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtKitas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByTmtKitas($tmtKitas = null, $comparison = null)
    {
        if (is_array($tmtKitas)) {
            $useMinMax = false;
            if (isset($tmtKitas['min'])) {
                $this->addUsingAlias(KitasPdPeer::TMT_KITAS, $tmtKitas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtKitas['max'])) {
                $this->addUsingAlias(KitasPdPeer::TMT_KITAS, $tmtKitas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::TMT_KITAS, $tmtKitas, $comparison);
    }

    /**
     * Filter the query on the tst_kitas column
     *
     * Example usage:
     * <code>
     * $query->filterByTstKitas('2011-03-14'); // WHERE tst_kitas = '2011-03-14'
     * $query->filterByTstKitas('now'); // WHERE tst_kitas = '2011-03-14'
     * $query->filterByTstKitas(array('max' => 'yesterday')); // WHERE tst_kitas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstKitas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByTstKitas($tstKitas = null, $comparison = null)
    {
        if (is_array($tstKitas)) {
            $useMinMax = false;
            if (isset($tstKitas['min'])) {
                $this->addUsingAlias(KitasPdPeer::TST_KITAS, $tstKitas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstKitas['max'])) {
                $this->addUsingAlias(KitasPdPeer::TST_KITAS, $tstKitas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::TST_KITAS, $tstKitas, $comparison);
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
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KitasPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KitasPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KitasPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KitasPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(KitasPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(KitasPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KitasPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KitasPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return KitasPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KitasPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KitasPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(KitasPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KitasPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
        } else {
            throw new PropelException('filterByPesertaDidik() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidik');

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
            $this->addJoinObject($join, 'PesertaDidik');
        }

        return $this;
    }

    /**
     * Use the PesertaDidik relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   KitasPd $kitasPd Object to remove from the list of results
     *
     * @return KitasPdQuery The current query, for fluid interface
     */
    public function prune($kitasPd = null)
    {
        if ($kitasPd) {
            $this->addUsingAlias(KitasPdPeer::NO_KITAS, $kitasPd->getNoKitas(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
