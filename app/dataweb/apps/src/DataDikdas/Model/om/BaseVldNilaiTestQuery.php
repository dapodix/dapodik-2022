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
use DataDikdas\Model\Errortype;
use DataDikdas\Model\NilaiTest;
use DataDikdas\Model\VldNilaiTest;
use DataDikdas\Model\VldNilaiTestPeer;
use DataDikdas\Model\VldNilaiTestQuery;

/**
 * Base class that represents a query for the 'vld_nilai_test' table.
 *
 * 
 *
 * @method VldNilaiTestQuery orderByLogid($order = Criteria::ASC) Order by the logid column
 * @method VldNilaiTestQuery orderByNilaiTestId($order = Criteria::ASC) Order by the nilai_test_id column
 * @method VldNilaiTestQuery orderByIdtype($order = Criteria::ASC) Order by the idtype column
 * @method VldNilaiTestQuery orderByStatusValidasi($order = Criteria::ASC) Order by the status_validasi column
 * @method VldNilaiTestQuery orderByFieldError($order = Criteria::ASC) Order by the field_error column
 * @method VldNilaiTestQuery orderByErrorMessage($order = Criteria::ASC) Order by the error_message column
 * @method VldNilaiTestQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method VldNilaiTestQuery orderByAppUsername($order = Criteria::ASC) Order by the app_username column
 * @method VldNilaiTestQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method VldNilaiTestQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method VldNilaiTestQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method VldNilaiTestQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method VldNilaiTestQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method VldNilaiTestQuery groupByLogid() Group by the logid column
 * @method VldNilaiTestQuery groupByNilaiTestId() Group by the nilai_test_id column
 * @method VldNilaiTestQuery groupByIdtype() Group by the idtype column
 * @method VldNilaiTestQuery groupByStatusValidasi() Group by the status_validasi column
 * @method VldNilaiTestQuery groupByFieldError() Group by the field_error column
 * @method VldNilaiTestQuery groupByErrorMessage() Group by the error_message column
 * @method VldNilaiTestQuery groupByKeterangan() Group by the keterangan column
 * @method VldNilaiTestQuery groupByAppUsername() Group by the app_username column
 * @method VldNilaiTestQuery groupByCreateDate() Group by the create_date column
 * @method VldNilaiTestQuery groupByLastUpdate() Group by the last_update column
 * @method VldNilaiTestQuery groupBySoftDelete() Group by the soft_delete column
 * @method VldNilaiTestQuery groupByLastSync() Group by the last_sync column
 * @method VldNilaiTestQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method VldNilaiTestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VldNilaiTestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VldNilaiTestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VldNilaiTestQuery leftJoinErrortype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Errortype relation
 * @method VldNilaiTestQuery rightJoinErrortype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Errortype relation
 * @method VldNilaiTestQuery innerJoinErrortype($relationAlias = null) Adds a INNER JOIN clause to the query using the Errortype relation
 *
 * @method VldNilaiTestQuery leftJoinNilaiTest($relationAlias = null) Adds a LEFT JOIN clause to the query using the NilaiTest relation
 * @method VldNilaiTestQuery rightJoinNilaiTest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NilaiTest relation
 * @method VldNilaiTestQuery innerJoinNilaiTest($relationAlias = null) Adds a INNER JOIN clause to the query using the NilaiTest relation
 *
 * @method VldNilaiTest findOne(PropelPDO $con = null) Return the first VldNilaiTest matching the query
 * @method VldNilaiTest findOneOrCreate(PropelPDO $con = null) Return the first VldNilaiTest matching the query, or a new VldNilaiTest object populated from the query conditions when no match is found
 *
 * @method VldNilaiTest findOneByNilaiTestId(string $nilai_test_id) Return the first VldNilaiTest filtered by the nilai_test_id column
 * @method VldNilaiTest findOneByIdtype(int $idtype) Return the first VldNilaiTest filtered by the idtype column
 * @method VldNilaiTest findOneByStatusValidasi(string $status_validasi) Return the first VldNilaiTest filtered by the status_validasi column
 * @method VldNilaiTest findOneByFieldError(string $field_error) Return the first VldNilaiTest filtered by the field_error column
 * @method VldNilaiTest findOneByErrorMessage(string $error_message) Return the first VldNilaiTest filtered by the error_message column
 * @method VldNilaiTest findOneByKeterangan(string $keterangan) Return the first VldNilaiTest filtered by the keterangan column
 * @method VldNilaiTest findOneByAppUsername(string $app_username) Return the first VldNilaiTest filtered by the app_username column
 * @method VldNilaiTest findOneByCreateDate(string $create_date) Return the first VldNilaiTest filtered by the create_date column
 * @method VldNilaiTest findOneByLastUpdate(string $last_update) Return the first VldNilaiTest filtered by the last_update column
 * @method VldNilaiTest findOneBySoftDelete(string $soft_delete) Return the first VldNilaiTest filtered by the soft_delete column
 * @method VldNilaiTest findOneByLastSync(string $last_sync) Return the first VldNilaiTest filtered by the last_sync column
 * @method VldNilaiTest findOneByUpdaterId(string $updater_id) Return the first VldNilaiTest filtered by the updater_id column
 *
 * @method array findByLogid(string $logid) Return VldNilaiTest objects filtered by the logid column
 * @method array findByNilaiTestId(string $nilai_test_id) Return VldNilaiTest objects filtered by the nilai_test_id column
 * @method array findByIdtype(int $idtype) Return VldNilaiTest objects filtered by the idtype column
 * @method array findByStatusValidasi(string $status_validasi) Return VldNilaiTest objects filtered by the status_validasi column
 * @method array findByFieldError(string $field_error) Return VldNilaiTest objects filtered by the field_error column
 * @method array findByErrorMessage(string $error_message) Return VldNilaiTest objects filtered by the error_message column
 * @method array findByKeterangan(string $keterangan) Return VldNilaiTest objects filtered by the keterangan column
 * @method array findByAppUsername(string $app_username) Return VldNilaiTest objects filtered by the app_username column
 * @method array findByCreateDate(string $create_date) Return VldNilaiTest objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return VldNilaiTest objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return VldNilaiTest objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return VldNilaiTest objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return VldNilaiTest objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseVldNilaiTestQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVldNilaiTestQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\VldNilaiTest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VldNilaiTestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VldNilaiTestQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VldNilaiTestQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VldNilaiTestQuery) {
            return $criteria;
        }
        $query = new VldNilaiTestQuery();
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
     * @return   VldNilaiTest|VldNilaiTest[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VldNilaiTestPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VldNilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 VldNilaiTest A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByLogid($key, $con = null)
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
     * @return                 VldNilaiTest A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "logid", "nilai_test_id", "idtype", "status_validasi", "field_error", "error_message", "keterangan", "app_username", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "vld_nilai_test" WHERE "logid" = :p0';
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
            $obj = new VldNilaiTest();
            $obj->hydrate($row);
            VldNilaiTestPeer::addInstanceToPool($obj, (string) $key);
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
     * @return VldNilaiTest|VldNilaiTest[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|VldNilaiTest[]|mixed the list of results, formatted by the current formatter
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
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VldNilaiTestPeer::LOGID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VldNilaiTestPeer::LOGID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the logid column
     *
     * Example usage:
     * <code>
     * $query->filterByLogid('fooValue');   // WHERE logid = 'fooValue'
     * $query->filterByLogid('%fooValue%'); // WHERE logid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByLogid($logid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $logid)) {
                $logid = str_replace('*', '%', $logid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::LOGID, $logid, $comparison);
    }

    /**
     * Filter the query on the nilai_test_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiTestId('fooValue');   // WHERE nilai_test_id = 'fooValue'
     * $query->filterByNilaiTestId('%fooValue%'); // WHERE nilai_test_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiTestId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByNilaiTestId($nilaiTestId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiTestId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiTestId)) {
                $nilaiTestId = str_replace('*', '%', $nilaiTestId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::NILAI_TEST_ID, $nilaiTestId, $comparison);
    }

    /**
     * Filter the query on the idtype column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtype(1234); // WHERE idtype = 1234
     * $query->filterByIdtype(array(12, 34)); // WHERE idtype IN (12, 34)
     * $query->filterByIdtype(array('min' => 12)); // WHERE idtype >= 12
     * $query->filterByIdtype(array('max' => 12)); // WHERE idtype <= 12
     * </code>
     *
     * @see       filterByErrortype()
     *
     * @param     mixed $idtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByIdtype($idtype = null, $comparison = null)
    {
        if (is_array($idtype)) {
            $useMinMax = false;
            if (isset($idtype['min'])) {
                $this->addUsingAlias(VldNilaiTestPeer::IDTYPE, $idtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtype['max'])) {
                $this->addUsingAlias(VldNilaiTestPeer::IDTYPE, $idtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::IDTYPE, $idtype, $comparison);
    }

    /**
     * Filter the query on the status_validasi column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusValidasi(1234); // WHERE status_validasi = 1234
     * $query->filterByStatusValidasi(array(12, 34)); // WHERE status_validasi IN (12, 34)
     * $query->filterByStatusValidasi(array('min' => 12)); // WHERE status_validasi >= 12
     * $query->filterByStatusValidasi(array('max' => 12)); // WHERE status_validasi <= 12
     * </code>
     *
     * @param     mixed $statusValidasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByStatusValidasi($statusValidasi = null, $comparison = null)
    {
        if (is_array($statusValidasi)) {
            $useMinMax = false;
            if (isset($statusValidasi['min'])) {
                $this->addUsingAlias(VldNilaiTestPeer::STATUS_VALIDASI, $statusValidasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusValidasi['max'])) {
                $this->addUsingAlias(VldNilaiTestPeer::STATUS_VALIDASI, $statusValidasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::STATUS_VALIDASI, $statusValidasi, $comparison);
    }

    /**
     * Filter the query on the field_error column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldError('fooValue');   // WHERE field_error = 'fooValue'
     * $query->filterByFieldError('%fooValue%'); // WHERE field_error LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldError The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByFieldError($fieldError = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldError)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fieldError)) {
                $fieldError = str_replace('*', '%', $fieldError);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::FIELD_ERROR, $fieldError, $comparison);
    }

    /**
     * Filter the query on the error_message column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorMessage('fooValue');   // WHERE error_message = 'fooValue'
     * $query->filterByErrorMessage('%fooValue%'); // WHERE error_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByErrorMessage($errorMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $errorMessage)) {
                $errorMessage = str_replace('*', '%', $errorMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::ERROR_MESSAGE, $errorMessage, $comparison);
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
     * @return VldNilaiTestQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldNilaiTestPeer::KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the app_username column
     *
     * Example usage:
     * <code>
     * $query->filterByAppUsername('fooValue');   // WHERE app_username = 'fooValue'
     * $query->filterByAppUsername('%fooValue%'); // WHERE app_username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appUsername The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByAppUsername($appUsername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appUsername)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $appUsername)) {
                $appUsername = str_replace('*', '%', $appUsername);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::APP_USERNAME, $appUsername, $comparison);
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
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(VldNilaiTestPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(VldNilaiTestPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(VldNilaiTestPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(VldNilaiTestPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(VldNilaiTestPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(VldNilaiTestPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(VldNilaiTestPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(VldNilaiTestPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldNilaiTestPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return VldNilaiTestQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldNilaiTestPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Errortype object
     *
     * @param   Errortype|PropelObjectCollection $errortype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VldNilaiTestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByErrortype($errortype, $comparison = null)
    {
        if ($errortype instanceof Errortype) {
            return $this
                ->addUsingAlias(VldNilaiTestPeer::IDTYPE, $errortype->getIdtype(), $comparison);
        } elseif ($errortype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VldNilaiTestPeer::IDTYPE, $errortype->toKeyValue('PrimaryKey', 'Idtype'), $comparison);
        } else {
            throw new PropelException('filterByErrortype() only accepts arguments of type Errortype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Errortype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function joinErrortype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Errortype');

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
            $this->addJoinObject($join, 'Errortype');
        }

        return $this;
    }

    /**
     * Use the Errortype relation Errortype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\ErrortypeQuery A secondary query class using the current class as primary query
     */
    public function useErrortypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinErrortype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Errortype', '\DataDikdas\Model\ErrortypeQuery');
    }

    /**
     * Filter the query by a related NilaiTest object
     *
     * @param   NilaiTest|PropelObjectCollection $nilaiTest The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VldNilaiTestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNilaiTest($nilaiTest, $comparison = null)
    {
        if ($nilaiTest instanceof NilaiTest) {
            return $this
                ->addUsingAlias(VldNilaiTestPeer::NILAI_TEST_ID, $nilaiTest->getNilaiTestId(), $comparison);
        } elseif ($nilaiTest instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VldNilaiTestPeer::NILAI_TEST_ID, $nilaiTest->toKeyValue('PrimaryKey', 'NilaiTestId'), $comparison);
        } else {
            throw new PropelException('filterByNilaiTest() only accepts arguments of type NilaiTest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NilaiTest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function joinNilaiTest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NilaiTest');

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
            $this->addJoinObject($join, 'NilaiTest');
        }

        return $this;
    }

    /**
     * Use the NilaiTest relation NilaiTest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\NilaiTestQuery A secondary query class using the current class as primary query
     */
    public function useNilaiTestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNilaiTest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NilaiTest', '\DataDikdas\Model\NilaiTestQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   VldNilaiTest $vldNilaiTest Object to remove from the list of results
     *
     * @return VldNilaiTestQuery The current query, for fluid interface
     */
    public function prune($vldNilaiTest = null)
    {
        if ($vldNilaiTest) {
            $this->addUsingAlias(VldNilaiTestPeer::LOGID, $vldNilaiTest->getLogid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
