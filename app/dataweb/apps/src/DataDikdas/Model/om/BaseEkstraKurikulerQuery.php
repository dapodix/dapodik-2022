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
use DataDikdas\Model\EkstraKurikuler;
use DataDikdas\Model\EkstraKurikulerPeer;
use DataDikdas\Model\EkstraKurikulerQuery;
use DataDikdas\Model\KelasEkskul;

/**
 * Base class that represents a query for the 'ref.ekstra_kurikuler' table.
 *
 * 
 *
 * @method EkstraKurikulerQuery orderByIdEkskul($order = Criteria::ASC) Order by the id_ekskul column
 * @method EkstraKurikulerQuery orderByNmEkskul($order = Criteria::ASC) Order by the nm_ekskul column
 * @method EkstraKurikulerQuery orderByUSd($order = Criteria::ASC) Order by the u_sd column
 * @method EkstraKurikulerQuery orderByUSmp($order = Criteria::ASC) Order by the u_smp column
 * @method EkstraKurikulerQuery orderByUSma($order = Criteria::ASC) Order by the u_sma column
 * @method EkstraKurikulerQuery orderByUSmk($order = Criteria::ASC) Order by the u_smk column
 * @method EkstraKurikulerQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method EkstraKurikulerQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method EkstraKurikulerQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method EkstraKurikulerQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method EkstraKurikulerQuery groupByIdEkskul() Group by the id_ekskul column
 * @method EkstraKurikulerQuery groupByNmEkskul() Group by the nm_ekskul column
 * @method EkstraKurikulerQuery groupByUSd() Group by the u_sd column
 * @method EkstraKurikulerQuery groupByUSmp() Group by the u_smp column
 * @method EkstraKurikulerQuery groupByUSma() Group by the u_sma column
 * @method EkstraKurikulerQuery groupByUSmk() Group by the u_smk column
 * @method EkstraKurikulerQuery groupByCreateDate() Group by the create_date column
 * @method EkstraKurikulerQuery groupByLastUpdate() Group by the last_update column
 * @method EkstraKurikulerQuery groupByExpiredDate() Group by the expired_date column
 * @method EkstraKurikulerQuery groupByLastSync() Group by the last_sync column
 *
 * @method EkstraKurikulerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EkstraKurikulerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EkstraKurikulerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EkstraKurikulerQuery leftJoinKelasEkskul($relationAlias = null) Adds a LEFT JOIN clause to the query using the KelasEkskul relation
 * @method EkstraKurikulerQuery rightJoinKelasEkskul($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KelasEkskul relation
 * @method EkstraKurikulerQuery innerJoinKelasEkskul($relationAlias = null) Adds a INNER JOIN clause to the query using the KelasEkskul relation
 *
 * @method EkstraKurikuler findOne(PropelPDO $con = null) Return the first EkstraKurikuler matching the query
 * @method EkstraKurikuler findOneOrCreate(PropelPDO $con = null) Return the first EkstraKurikuler matching the query, or a new EkstraKurikuler object populated from the query conditions when no match is found
 *
 * @method EkstraKurikuler findOneByNmEkskul(string $nm_ekskul) Return the first EkstraKurikuler filtered by the nm_ekskul column
 * @method EkstraKurikuler findOneByUSd(string $u_sd) Return the first EkstraKurikuler filtered by the u_sd column
 * @method EkstraKurikuler findOneByUSmp(string $u_smp) Return the first EkstraKurikuler filtered by the u_smp column
 * @method EkstraKurikuler findOneByUSma(string $u_sma) Return the first EkstraKurikuler filtered by the u_sma column
 * @method EkstraKurikuler findOneByUSmk(string $u_smk) Return the first EkstraKurikuler filtered by the u_smk column
 * @method EkstraKurikuler findOneByCreateDate(string $create_date) Return the first EkstraKurikuler filtered by the create_date column
 * @method EkstraKurikuler findOneByLastUpdate(string $last_update) Return the first EkstraKurikuler filtered by the last_update column
 * @method EkstraKurikuler findOneByExpiredDate(string $expired_date) Return the first EkstraKurikuler filtered by the expired_date column
 * @method EkstraKurikuler findOneByLastSync(string $last_sync) Return the first EkstraKurikuler filtered by the last_sync column
 *
 * @method array findByIdEkskul(int $id_ekskul) Return EkstraKurikuler objects filtered by the id_ekskul column
 * @method array findByNmEkskul(string $nm_ekskul) Return EkstraKurikuler objects filtered by the nm_ekskul column
 * @method array findByUSd(string $u_sd) Return EkstraKurikuler objects filtered by the u_sd column
 * @method array findByUSmp(string $u_smp) Return EkstraKurikuler objects filtered by the u_smp column
 * @method array findByUSma(string $u_sma) Return EkstraKurikuler objects filtered by the u_sma column
 * @method array findByUSmk(string $u_smk) Return EkstraKurikuler objects filtered by the u_smk column
 * @method array findByCreateDate(string $create_date) Return EkstraKurikuler objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return EkstraKurikuler objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return EkstraKurikuler objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return EkstraKurikuler objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseEkstraKurikulerQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEkstraKurikulerQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\EkstraKurikuler', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EkstraKurikulerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EkstraKurikulerQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EkstraKurikulerQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EkstraKurikulerQuery) {
            return $criteria;
        }
        $query = new EkstraKurikulerQuery();
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
     * @return   EkstraKurikuler|EkstraKurikuler[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EkstraKurikulerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EkstraKurikulerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EkstraKurikuler A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdEkskul($key, $con = null)
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
     * @return                 EkstraKurikuler A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_ekskul", "nm_ekskul", "u_sd", "u_smp", "u_sma", "u_smk", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."ekstra_kurikuler" WHERE "id_ekskul" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new EkstraKurikuler();
            $obj->hydrate($row);
            EkstraKurikulerPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EkstraKurikuler|EkstraKurikuler[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EkstraKurikuler[]|mixed the list of results, formatted by the current formatter
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
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EkstraKurikulerPeer::ID_EKSKUL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EkstraKurikulerPeer::ID_EKSKUL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_ekskul column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEkskul(1234); // WHERE id_ekskul = 1234
     * $query->filterByIdEkskul(array(12, 34)); // WHERE id_ekskul IN (12, 34)
     * $query->filterByIdEkskul(array('min' => 12)); // WHERE id_ekskul >= 12
     * $query->filterByIdEkskul(array('max' => 12)); // WHERE id_ekskul <= 12
     * </code>
     *
     * @param     mixed $idEkskul The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByIdEkskul($idEkskul = null, $comparison = null)
    {
        if (is_array($idEkskul)) {
            $useMinMax = false;
            if (isset($idEkskul['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::ID_EKSKUL, $idEkskul['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEkskul['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::ID_EKSKUL, $idEkskul['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::ID_EKSKUL, $idEkskul, $comparison);
    }

    /**
     * Filter the query on the nm_ekskul column
     *
     * Example usage:
     * <code>
     * $query->filterByNmEkskul('fooValue');   // WHERE nm_ekskul = 'fooValue'
     * $query->filterByNmEkskul('%fooValue%'); // WHERE nm_ekskul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmEkskul The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByNmEkskul($nmEkskul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmEkskul)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmEkskul)) {
                $nmEkskul = str_replace('*', '%', $nmEkskul);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::NM_EKSKUL, $nmEkskul, $comparison);
    }

    /**
     * Filter the query on the u_sd column
     *
     * Example usage:
     * <code>
     * $query->filterByUSd(1234); // WHERE u_sd = 1234
     * $query->filterByUSd(array(12, 34)); // WHERE u_sd IN (12, 34)
     * $query->filterByUSd(array('min' => 12)); // WHERE u_sd >= 12
     * $query->filterByUSd(array('max' => 12)); // WHERE u_sd <= 12
     * </code>
     *
     * @param     mixed $uSd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByUSd($uSd = null, $comparison = null)
    {
        if (is_array($uSd)) {
            $useMinMax = false;
            if (isset($uSd['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SD, $uSd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSd['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SD, $uSd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::U_SD, $uSd, $comparison);
    }

    /**
     * Filter the query on the u_smp column
     *
     * Example usage:
     * <code>
     * $query->filterByUSmp(1234); // WHERE u_smp = 1234
     * $query->filterByUSmp(array(12, 34)); // WHERE u_smp IN (12, 34)
     * $query->filterByUSmp(array('min' => 12)); // WHERE u_smp >= 12
     * $query->filterByUSmp(array('max' => 12)); // WHERE u_smp <= 12
     * </code>
     *
     * @param     mixed $uSmp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByUSmp($uSmp = null, $comparison = null)
    {
        if (is_array($uSmp)) {
            $useMinMax = false;
            if (isset($uSmp['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SMP, $uSmp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSmp['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SMP, $uSmp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::U_SMP, $uSmp, $comparison);
    }

    /**
     * Filter the query on the u_sma column
     *
     * Example usage:
     * <code>
     * $query->filterByUSma(1234); // WHERE u_sma = 1234
     * $query->filterByUSma(array(12, 34)); // WHERE u_sma IN (12, 34)
     * $query->filterByUSma(array('min' => 12)); // WHERE u_sma >= 12
     * $query->filterByUSma(array('max' => 12)); // WHERE u_sma <= 12
     * </code>
     *
     * @param     mixed $uSma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByUSma($uSma = null, $comparison = null)
    {
        if (is_array($uSma)) {
            $useMinMax = false;
            if (isset($uSma['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SMA, $uSma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSma['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SMA, $uSma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::U_SMA, $uSma, $comparison);
    }

    /**
     * Filter the query on the u_smk column
     *
     * Example usage:
     * <code>
     * $query->filterByUSmk(1234); // WHERE u_smk = 1234
     * $query->filterByUSmk(array(12, 34)); // WHERE u_smk IN (12, 34)
     * $query->filterByUSmk(array('min' => 12)); // WHERE u_smk >= 12
     * $query->filterByUSmk(array('max' => 12)); // WHERE u_smk <= 12
     * </code>
     *
     * @param     mixed $uSmk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByUSmk($uSmk = null, $comparison = null)
    {
        if (is_array($uSmk)) {
            $useMinMax = false;
            if (isset($uSmk['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SMK, $uSmk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSmk['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::U_SMK, $uSmk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::U_SMK, $uSmk, $comparison);
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
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(EkstraKurikulerPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EkstraKurikulerPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related KelasEkskul object
     *
     * @param   KelasEkskul|PropelObjectCollection $kelasEkskul  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EkstraKurikulerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKelasEkskul($kelasEkskul, $comparison = null)
    {
        if ($kelasEkskul instanceof KelasEkskul) {
            return $this
                ->addUsingAlias(EkstraKurikulerPeer::ID_EKSKUL, $kelasEkskul->getIdEkskul(), $comparison);
        } elseif ($kelasEkskul instanceof PropelObjectCollection) {
            return $this
                ->useKelasEkskulQuery()
                ->filterByPrimaryKeys($kelasEkskul->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKelasEkskul() only accepts arguments of type KelasEkskul or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KelasEkskul relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function joinKelasEkskul($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KelasEkskul');

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
            $this->addJoinObject($join, 'KelasEkskul');
        }

        return $this;
    }

    /**
     * Use the KelasEkskul relation KelasEkskul object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KelasEkskulQuery A secondary query class using the current class as primary query
     */
    public function useKelasEkskulQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKelasEkskul($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KelasEkskul', '\DataDikdas\Model\KelasEkskulQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   EkstraKurikuler $ekstraKurikuler Object to remove from the list of results
     *
     * @return EkstraKurikulerQuery The current query, for fluid interface
     */
    public function prune($ekstraKurikuler = null)
    {
        if ($ekstraKurikuler) {
            $this->addUsingAlias(EkstraKurikulerPeer::ID_EKSKUL, $ekstraKurikuler->getIdEkskul(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
