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
use DataDikdas\Model\PasporPd;
use DataDikdas\Model\PasporPdPeer;
use DataDikdas\Model\PasporPdQuery;
use DataDikdas\Model\PesertaDidik;

/**
 * Base class that represents a query for the 'paspor_pd' table.
 *
 * 
 *
 * @method PasporPdQuery orderByNoPaspor($order = Criteria::ASC) Order by the no_paspor column
 * @method PasporPdQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method PasporPdQuery orderByTempatTerbit($order = Criteria::ASC) Order by the tempat_terbit column
 * @method PasporPdQuery orderByTmtPaspor($order = Criteria::ASC) Order by the tmt_paspor column
 * @method PasporPdQuery orderByTstPaspor($order = Criteria::ASC) Order by the tst_paspor column
 * @method PasporPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PasporPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PasporPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PasporPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PasporPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PasporPdQuery groupByNoPaspor() Group by the no_paspor column
 * @method PasporPdQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method PasporPdQuery groupByTempatTerbit() Group by the tempat_terbit column
 * @method PasporPdQuery groupByTmtPaspor() Group by the tmt_paspor column
 * @method PasporPdQuery groupByTstPaspor() Group by the tst_paspor column
 * @method PasporPdQuery groupByCreateDate() Group by the create_date column
 * @method PasporPdQuery groupByLastUpdate() Group by the last_update column
 * @method PasporPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method PasporPdQuery groupByLastSync() Group by the last_sync column
 * @method PasporPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PasporPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PasporPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PasporPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PasporPdQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method PasporPdQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method PasporPdQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method PasporPd findOne(PropelPDO $con = null) Return the first PasporPd matching the query
 * @method PasporPd findOneOrCreate(PropelPDO $con = null) Return the first PasporPd matching the query, or a new PasporPd object populated from the query conditions when no match is found
 *
 * @method PasporPd findOneByPesertaDidikId(string $peserta_didik_id) Return the first PasporPd filtered by the peserta_didik_id column
 * @method PasporPd findOneByTempatTerbit(string $tempat_terbit) Return the first PasporPd filtered by the tempat_terbit column
 * @method PasporPd findOneByTmtPaspor(string $tmt_paspor) Return the first PasporPd filtered by the tmt_paspor column
 * @method PasporPd findOneByTstPaspor(string $tst_paspor) Return the first PasporPd filtered by the tst_paspor column
 * @method PasporPd findOneByCreateDate(string $create_date) Return the first PasporPd filtered by the create_date column
 * @method PasporPd findOneByLastUpdate(string $last_update) Return the first PasporPd filtered by the last_update column
 * @method PasporPd findOneBySoftDelete(string $soft_delete) Return the first PasporPd filtered by the soft_delete column
 * @method PasporPd findOneByLastSync(string $last_sync) Return the first PasporPd filtered by the last_sync column
 * @method PasporPd findOneByUpdaterId(string $updater_id) Return the first PasporPd filtered by the updater_id column
 *
 * @method array findByNoPaspor(string $no_paspor) Return PasporPd objects filtered by the no_paspor column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return PasporPd objects filtered by the peserta_didik_id column
 * @method array findByTempatTerbit(string $tempat_terbit) Return PasporPd objects filtered by the tempat_terbit column
 * @method array findByTmtPaspor(string $tmt_paspor) Return PasporPd objects filtered by the tmt_paspor column
 * @method array findByTstPaspor(string $tst_paspor) Return PasporPd objects filtered by the tst_paspor column
 * @method array findByCreateDate(string $create_date) Return PasporPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PasporPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return PasporPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return PasporPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return PasporPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePasporPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePasporPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PasporPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PasporPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PasporPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PasporPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PasporPdQuery) {
            return $criteria;
        }
        $query = new PasporPdQuery();
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
     * @return   PasporPd|PasporPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PasporPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PasporPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PasporPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByNoPaspor($key, $con = null)
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
     * @return                 PasporPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "no_paspor", "peserta_didik_id", "tempat_terbit", "tmt_paspor", "tst_paspor", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "paspor_pd" WHERE "no_paspor" = :p0';
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
            $obj = new PasporPd();
            $obj->hydrate($row);
            PasporPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PasporPd|PasporPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PasporPd[]|mixed the list of results, formatted by the current formatter
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
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PasporPdPeer::NO_PASPOR, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PasporPdPeer::NO_PASPOR, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the no_paspor column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPaspor('fooValue');   // WHERE no_paspor = 'fooValue'
     * $query->filterByNoPaspor('%fooValue%'); // WHERE no_paspor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPaspor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByNoPaspor($noPaspor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPaspor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPaspor)) {
                $noPaspor = str_replace('*', '%', $noPaspor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::NO_PASPOR, $noPaspor, $comparison);
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
     * @return PasporPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PasporPdPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
    }

    /**
     * Filter the query on the tempat_terbit column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatTerbit('fooValue');   // WHERE tempat_terbit = 'fooValue'
     * $query->filterByTempatTerbit('%fooValue%'); // WHERE tempat_terbit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tempatTerbit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByTempatTerbit($tempatTerbit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tempatTerbit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tempatTerbit)) {
                $tempatTerbit = str_replace('*', '%', $tempatTerbit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::TEMPAT_TERBIT, $tempatTerbit, $comparison);
    }

    /**
     * Filter the query on the tmt_paspor column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtPaspor('2011-03-14'); // WHERE tmt_paspor = '2011-03-14'
     * $query->filterByTmtPaspor('now'); // WHERE tmt_paspor = '2011-03-14'
     * $query->filterByTmtPaspor(array('max' => 'yesterday')); // WHERE tmt_paspor > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtPaspor The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByTmtPaspor($tmtPaspor = null, $comparison = null)
    {
        if (is_array($tmtPaspor)) {
            $useMinMax = false;
            if (isset($tmtPaspor['min'])) {
                $this->addUsingAlias(PasporPdPeer::TMT_PASPOR, $tmtPaspor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtPaspor['max'])) {
                $this->addUsingAlias(PasporPdPeer::TMT_PASPOR, $tmtPaspor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::TMT_PASPOR, $tmtPaspor, $comparison);
    }

    /**
     * Filter the query on the tst_paspor column
     *
     * Example usage:
     * <code>
     * $query->filterByTstPaspor('2011-03-14'); // WHERE tst_paspor = '2011-03-14'
     * $query->filterByTstPaspor('now'); // WHERE tst_paspor = '2011-03-14'
     * $query->filterByTstPaspor(array('max' => 'yesterday')); // WHERE tst_paspor > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstPaspor The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByTstPaspor($tstPaspor = null, $comparison = null)
    {
        if (is_array($tstPaspor)) {
            $useMinMax = false;
            if (isset($tstPaspor['min'])) {
                $this->addUsingAlias(PasporPdPeer::TST_PASPOR, $tstPaspor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstPaspor['max'])) {
                $this->addUsingAlias(PasporPdPeer::TST_PASPOR, $tstPaspor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::TST_PASPOR, $tstPaspor, $comparison);
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
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PasporPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PasporPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PasporPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PasporPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PasporPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PasporPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PasporPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PasporPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasporPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PasporPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PasporPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PasporPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PasporPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PasporPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
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
     * @return PasporPdQuery The current query, for fluid interface
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
     * @param   PasporPd $pasporPd Object to remove from the list of results
     *
     * @return PasporPdQuery The current query, for fluid interface
     */
    public function prune($pasporPd = null)
    {
        if ($pasporPd) {
            $this->addUsingAlias(PasporPdPeer::NO_PASPOR, $pasporPd->getNoPaspor(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
