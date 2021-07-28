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
use DataDikdas\Model\DataDynamic;
use DataDikdas\Model\Variabel;
use DataDikdas\Model\VariabelPeer;
use DataDikdas\Model\VariabelQuery;
use DataDikdas\Model\VariabelValue;

/**
 * Base class that represents a query for the 'ref.variabel' table.
 *
 * 
 *
 * @method VariabelQuery orderByVariabelId($order = Criteria::ASC) Order by the variabel_id column
 * @method VariabelQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method VariabelQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method VariabelQuery orderByJenisVariabel($order = Criteria::ASC) Order by the jenis_variabel column
 * @method VariabelQuery orderByUPaud($order = Criteria::ASC) Order by the u_paud column
 * @method VariabelQuery orderByUSd($order = Criteria::ASC) Order by the u_sd column
 * @method VariabelQuery orderByUSmp($order = Criteria::ASC) Order by the u_smp column
 * @method VariabelQuery orderByUSma($order = Criteria::ASC) Order by the u_sma column
 * @method VariabelQuery orderByUSmk($order = Criteria::ASC) Order by the u_smk column
 * @method VariabelQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method VariabelQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method VariabelQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method VariabelQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method VariabelQuery groupByVariabelId() Group by the variabel_id column
 * @method VariabelQuery groupByNama() Group by the nama column
 * @method VariabelQuery groupByKeterangan() Group by the keterangan column
 * @method VariabelQuery groupByJenisVariabel() Group by the jenis_variabel column
 * @method VariabelQuery groupByUPaud() Group by the u_paud column
 * @method VariabelQuery groupByUSd() Group by the u_sd column
 * @method VariabelQuery groupByUSmp() Group by the u_smp column
 * @method VariabelQuery groupByUSma() Group by the u_sma column
 * @method VariabelQuery groupByUSmk() Group by the u_smk column
 * @method VariabelQuery groupByCreateDate() Group by the create_date column
 * @method VariabelQuery groupByLastUpdate() Group by the last_update column
 * @method VariabelQuery groupByExpiredDate() Group by the expired_date column
 * @method VariabelQuery groupByLastSync() Group by the last_sync column
 *
 * @method VariabelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VariabelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VariabelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VariabelQuery leftJoinDataDynamic($relationAlias = null) Adds a LEFT JOIN clause to the query using the DataDynamic relation
 * @method VariabelQuery rightJoinDataDynamic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DataDynamic relation
 * @method VariabelQuery innerJoinDataDynamic($relationAlias = null) Adds a INNER JOIN clause to the query using the DataDynamic relation
 *
 * @method VariabelQuery leftJoinVariabelValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the VariabelValue relation
 * @method VariabelQuery rightJoinVariabelValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VariabelValue relation
 * @method VariabelQuery innerJoinVariabelValue($relationAlias = null) Adds a INNER JOIN clause to the query using the VariabelValue relation
 *
 * @method Variabel findOne(PropelPDO $con = null) Return the first Variabel matching the query
 * @method Variabel findOneOrCreate(PropelPDO $con = null) Return the first Variabel matching the query, or a new Variabel object populated from the query conditions when no match is found
 *
 * @method Variabel findOneByNama(string $nama) Return the first Variabel filtered by the nama column
 * @method Variabel findOneByKeterangan(string $keterangan) Return the first Variabel filtered by the keterangan column
 * @method Variabel findOneByJenisVariabel(string $jenis_variabel) Return the first Variabel filtered by the jenis_variabel column
 * @method Variabel findOneByUPaud(string $u_paud) Return the first Variabel filtered by the u_paud column
 * @method Variabel findOneByUSd(string $u_sd) Return the first Variabel filtered by the u_sd column
 * @method Variabel findOneByUSmp(string $u_smp) Return the first Variabel filtered by the u_smp column
 * @method Variabel findOneByUSma(string $u_sma) Return the first Variabel filtered by the u_sma column
 * @method Variabel findOneByUSmk(string $u_smk) Return the first Variabel filtered by the u_smk column
 * @method Variabel findOneByCreateDate(string $create_date) Return the first Variabel filtered by the create_date column
 * @method Variabel findOneByLastUpdate(string $last_update) Return the first Variabel filtered by the last_update column
 * @method Variabel findOneByExpiredDate(string $expired_date) Return the first Variabel filtered by the expired_date column
 * @method Variabel findOneByLastSync(string $last_sync) Return the first Variabel filtered by the last_sync column
 *
 * @method array findByVariabelId(string $variabel_id) Return Variabel objects filtered by the variabel_id column
 * @method array findByNama(string $nama) Return Variabel objects filtered by the nama column
 * @method array findByKeterangan(string $keterangan) Return Variabel objects filtered by the keterangan column
 * @method array findByJenisVariabel(string $jenis_variabel) Return Variabel objects filtered by the jenis_variabel column
 * @method array findByUPaud(string $u_paud) Return Variabel objects filtered by the u_paud column
 * @method array findByUSd(string $u_sd) Return Variabel objects filtered by the u_sd column
 * @method array findByUSmp(string $u_smp) Return Variabel objects filtered by the u_smp column
 * @method array findByUSma(string $u_sma) Return Variabel objects filtered by the u_sma column
 * @method array findByUSmk(string $u_smk) Return Variabel objects filtered by the u_smk column
 * @method array findByCreateDate(string $create_date) Return Variabel objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Variabel objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Variabel objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Variabel objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseVariabelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVariabelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Variabel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VariabelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VariabelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VariabelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VariabelQuery) {
            return $criteria;
        }
        $query = new VariabelQuery();
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
     * @return   Variabel|Variabel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VariabelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VariabelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Variabel A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByVariabelId($key, $con = null)
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
     * @return                 Variabel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "variabel_id", "nama", "keterangan", "jenis_variabel", "u_paud", "u_sd", "u_smp", "u_sma", "u_smk", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."variabel" WHERE "variabel_id" = :p0';
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
            $obj = new Variabel();
            $obj->hydrate($row);
            VariabelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Variabel|Variabel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Variabel[]|mixed the list of results, formatted by the current formatter
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VariabelPeer::VARIABEL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VariabelPeer::VARIABEL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the variabel_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVariabelId('fooValue');   // WHERE variabel_id = 'fooValue'
     * $query->filterByVariabelId('%fooValue%'); // WHERE variabel_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $variabelId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByVariabelId($variabelId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($variabelId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $variabelId)) {
                $variabelId = str_replace('*', '%', $variabelId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariabelPeer::VARIABEL_ID, $variabelId, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%'); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nama)) {
                $nama = str_replace('*', '%', $nama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariabelPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%'); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keterangan)) {
                $keterangan = str_replace('*', '%', $keterangan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariabelPeer::KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the jenis_variabel column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisVariabel('fooValue');   // WHERE jenis_variabel = 'fooValue'
     * $query->filterByJenisVariabel('%fooValue%'); // WHERE jenis_variabel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisVariabel The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByJenisVariabel($jenisVariabel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisVariabel)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisVariabel)) {
                $jenisVariabel = str_replace('*', '%', $jenisVariabel);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariabelPeer::JENIS_VARIABEL, $jenisVariabel, $comparison);
    }

    /**
     * Filter the query on the u_paud column
     *
     * Example usage:
     * <code>
     * $query->filterByUPaud(1234); // WHERE u_paud = 1234
     * $query->filterByUPaud(array(12, 34)); // WHERE u_paud IN (12, 34)
     * $query->filterByUPaud(array('min' => 12)); // WHERE u_paud >= 12
     * $query->filterByUPaud(array('max' => 12)); // WHERE u_paud <= 12
     * </code>
     *
     * @param     mixed $uPaud The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByUPaud($uPaud = null, $comparison = null)
    {
        if (is_array($uPaud)) {
            $useMinMax = false;
            if (isset($uPaud['min'])) {
                $this->addUsingAlias(VariabelPeer::U_PAUD, $uPaud['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uPaud['max'])) {
                $this->addUsingAlias(VariabelPeer::U_PAUD, $uPaud['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::U_PAUD, $uPaud, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByUSd($uSd = null, $comparison = null)
    {
        if (is_array($uSd)) {
            $useMinMax = false;
            if (isset($uSd['min'])) {
                $this->addUsingAlias(VariabelPeer::U_SD, $uSd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSd['max'])) {
                $this->addUsingAlias(VariabelPeer::U_SD, $uSd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::U_SD, $uSd, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByUSmp($uSmp = null, $comparison = null)
    {
        if (is_array($uSmp)) {
            $useMinMax = false;
            if (isset($uSmp['min'])) {
                $this->addUsingAlias(VariabelPeer::U_SMP, $uSmp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSmp['max'])) {
                $this->addUsingAlias(VariabelPeer::U_SMP, $uSmp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::U_SMP, $uSmp, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByUSma($uSma = null, $comparison = null)
    {
        if (is_array($uSma)) {
            $useMinMax = false;
            if (isset($uSma['min'])) {
                $this->addUsingAlias(VariabelPeer::U_SMA, $uSma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSma['max'])) {
                $this->addUsingAlias(VariabelPeer::U_SMA, $uSma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::U_SMA, $uSma, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByUSmk($uSmk = null, $comparison = null)
    {
        if (is_array($uSmk)) {
            $useMinMax = false;
            if (isset($uSmk['min'])) {
                $this->addUsingAlias(VariabelPeer::U_SMK, $uSmk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSmk['max'])) {
                $this->addUsingAlias(VariabelPeer::U_SMK, $uSmk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::U_SMK, $uSmk, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(VariabelPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(VariabelPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(VariabelPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(VariabelPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(VariabelPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(VariabelPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return VariabelQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(VariabelPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(VariabelPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related DataDynamic object
     *
     * @param   DataDynamic|PropelObjectCollection $dataDynamic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VariabelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDataDynamic($dataDynamic, $comparison = null)
    {
        if ($dataDynamic instanceof DataDynamic) {
            return $this
                ->addUsingAlias(VariabelPeer::VARIABEL_ID, $dataDynamic->getVariabelId(), $comparison);
        } elseif ($dataDynamic instanceof PropelObjectCollection) {
            return $this
                ->useDataDynamicQuery()
                ->filterByPrimaryKeys($dataDynamic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDataDynamic() only accepts arguments of type DataDynamic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DataDynamic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function joinDataDynamic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DataDynamic');

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
            $this->addJoinObject($join, 'DataDynamic');
        }

        return $this;
    }

    /**
     * Use the DataDynamic relation DataDynamic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DataDynamicQuery A secondary query class using the current class as primary query
     */
    public function useDataDynamicQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDataDynamic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DataDynamic', '\DataDikdas\Model\DataDynamicQuery');
    }

    /**
     * Filter the query by a related VariabelValue object
     *
     * @param   VariabelValue|PropelObjectCollection $variabelValue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VariabelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVariabelValue($variabelValue, $comparison = null)
    {
        if ($variabelValue instanceof VariabelValue) {
            return $this
                ->addUsingAlias(VariabelPeer::VARIABEL_ID, $variabelValue->getVariabelId(), $comparison);
        } elseif ($variabelValue instanceof PropelObjectCollection) {
            return $this
                ->useVariabelValueQuery()
                ->filterByPrimaryKeys($variabelValue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVariabelValue() only accepts arguments of type VariabelValue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VariabelValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function joinVariabelValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VariabelValue');

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
            $this->addJoinObject($join, 'VariabelValue');
        }

        return $this;
    }

    /**
     * Use the VariabelValue relation VariabelValue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VariabelValueQuery A secondary query class using the current class as primary query
     */
    public function useVariabelValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVariabelValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VariabelValue', '\DataDikdas\Model\VariabelValueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Variabel $variabel Object to remove from the list of results
     *
     * @return VariabelQuery The current query, for fluid interface
     */
    public function prune($variabel = null)
    {
        if ($variabel) {
            $this->addUsingAlias(VariabelPeer::VARIABEL_ID, $variabel->getVariabelId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
