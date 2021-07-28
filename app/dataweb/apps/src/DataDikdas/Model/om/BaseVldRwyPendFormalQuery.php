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
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\VldRwyPendFormal;
use DataDikdas\Model\VldRwyPendFormalPeer;
use DataDikdas\Model\VldRwyPendFormalQuery;

/**
 * Base class that represents a query for the 'vld_rwy_pend_formal' table.
 *
 * 
 *
 * @method VldRwyPendFormalQuery orderByLogid($order = Criteria::ASC) Order by the logid column
 * @method VldRwyPendFormalQuery orderByRiwayatPendidikanFormalId($order = Criteria::ASC) Order by the riwayat_pendidikan_formal_id column
 * @method VldRwyPendFormalQuery orderByIdtype($order = Criteria::ASC) Order by the idtype column
 * @method VldRwyPendFormalQuery orderByStatusValidasi($order = Criteria::ASC) Order by the status_validasi column
 * @method VldRwyPendFormalQuery orderByFieldError($order = Criteria::ASC) Order by the field_error column
 * @method VldRwyPendFormalQuery orderByErrorMessage($order = Criteria::ASC) Order by the error_message column
 * @method VldRwyPendFormalQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method VldRwyPendFormalQuery orderByAppUsername($order = Criteria::ASC) Order by the app_username column
 * @method VldRwyPendFormalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method VldRwyPendFormalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method VldRwyPendFormalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method VldRwyPendFormalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method VldRwyPendFormalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method VldRwyPendFormalQuery groupByLogid() Group by the logid column
 * @method VldRwyPendFormalQuery groupByRiwayatPendidikanFormalId() Group by the riwayat_pendidikan_formal_id column
 * @method VldRwyPendFormalQuery groupByIdtype() Group by the idtype column
 * @method VldRwyPendFormalQuery groupByStatusValidasi() Group by the status_validasi column
 * @method VldRwyPendFormalQuery groupByFieldError() Group by the field_error column
 * @method VldRwyPendFormalQuery groupByErrorMessage() Group by the error_message column
 * @method VldRwyPendFormalQuery groupByKeterangan() Group by the keterangan column
 * @method VldRwyPendFormalQuery groupByAppUsername() Group by the app_username column
 * @method VldRwyPendFormalQuery groupByCreateDate() Group by the create_date column
 * @method VldRwyPendFormalQuery groupByLastUpdate() Group by the last_update column
 * @method VldRwyPendFormalQuery groupBySoftDelete() Group by the soft_delete column
 * @method VldRwyPendFormalQuery groupByLastSync() Group by the last_sync column
 * @method VldRwyPendFormalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method VldRwyPendFormalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VldRwyPendFormalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VldRwyPendFormalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VldRwyPendFormalQuery leftJoinRwyPendFormal($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyPendFormal relation
 * @method VldRwyPendFormalQuery rightJoinRwyPendFormal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyPendFormal relation
 * @method VldRwyPendFormalQuery innerJoinRwyPendFormal($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyPendFormal relation
 *
 * @method VldRwyPendFormalQuery leftJoinErrortype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Errortype relation
 * @method VldRwyPendFormalQuery rightJoinErrortype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Errortype relation
 * @method VldRwyPendFormalQuery innerJoinErrortype($relationAlias = null) Adds a INNER JOIN clause to the query using the Errortype relation
 *
 * @method VldRwyPendFormal findOne(PropelPDO $con = null) Return the first VldRwyPendFormal matching the query
 * @method VldRwyPendFormal findOneOrCreate(PropelPDO $con = null) Return the first VldRwyPendFormal matching the query, or a new VldRwyPendFormal object populated from the query conditions when no match is found
 *
 * @method VldRwyPendFormal findOneByRiwayatPendidikanFormalId(string $riwayat_pendidikan_formal_id) Return the first VldRwyPendFormal filtered by the riwayat_pendidikan_formal_id column
 * @method VldRwyPendFormal findOneByIdtype(int $idtype) Return the first VldRwyPendFormal filtered by the idtype column
 * @method VldRwyPendFormal findOneByStatusValidasi(string $status_validasi) Return the first VldRwyPendFormal filtered by the status_validasi column
 * @method VldRwyPendFormal findOneByFieldError(string $field_error) Return the first VldRwyPendFormal filtered by the field_error column
 * @method VldRwyPendFormal findOneByErrorMessage(string $error_message) Return the first VldRwyPendFormal filtered by the error_message column
 * @method VldRwyPendFormal findOneByKeterangan(string $keterangan) Return the first VldRwyPendFormal filtered by the keterangan column
 * @method VldRwyPendFormal findOneByAppUsername(string $app_username) Return the first VldRwyPendFormal filtered by the app_username column
 * @method VldRwyPendFormal findOneByCreateDate(string $create_date) Return the first VldRwyPendFormal filtered by the create_date column
 * @method VldRwyPendFormal findOneByLastUpdate(string $last_update) Return the first VldRwyPendFormal filtered by the last_update column
 * @method VldRwyPendFormal findOneBySoftDelete(string $soft_delete) Return the first VldRwyPendFormal filtered by the soft_delete column
 * @method VldRwyPendFormal findOneByLastSync(string $last_sync) Return the first VldRwyPendFormal filtered by the last_sync column
 * @method VldRwyPendFormal findOneByUpdaterId(string $updater_id) Return the first VldRwyPendFormal filtered by the updater_id column
 *
 * @method array findByLogid(string $logid) Return VldRwyPendFormal objects filtered by the logid column
 * @method array findByRiwayatPendidikanFormalId(string $riwayat_pendidikan_formal_id) Return VldRwyPendFormal objects filtered by the riwayat_pendidikan_formal_id column
 * @method array findByIdtype(int $idtype) Return VldRwyPendFormal objects filtered by the idtype column
 * @method array findByStatusValidasi(string $status_validasi) Return VldRwyPendFormal objects filtered by the status_validasi column
 * @method array findByFieldError(string $field_error) Return VldRwyPendFormal objects filtered by the field_error column
 * @method array findByErrorMessage(string $error_message) Return VldRwyPendFormal objects filtered by the error_message column
 * @method array findByKeterangan(string $keterangan) Return VldRwyPendFormal objects filtered by the keterangan column
 * @method array findByAppUsername(string $app_username) Return VldRwyPendFormal objects filtered by the app_username column
 * @method array findByCreateDate(string $create_date) Return VldRwyPendFormal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return VldRwyPendFormal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return VldRwyPendFormal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return VldRwyPendFormal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return VldRwyPendFormal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseVldRwyPendFormalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVldRwyPendFormalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\VldRwyPendFormal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VldRwyPendFormalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VldRwyPendFormalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VldRwyPendFormalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VldRwyPendFormalQuery) {
            return $criteria;
        }
        $query = new VldRwyPendFormalQuery();
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
     * @return   VldRwyPendFormal|VldRwyPendFormal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VldRwyPendFormalPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VldRwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 VldRwyPendFormal A model object, or null if the key is not found
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
     * @return                 VldRwyPendFormal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "logid", "riwayat_pendidikan_formal_id", "idtype", "status_validasi", "field_error", "error_message", "keterangan", "app_username", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "vld_rwy_pend_formal" WHERE "logid" = :p0';
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
            $obj = new VldRwyPendFormal();
            $obj->hydrate($row);
            VldRwyPendFormalPeer::addInstanceToPool($obj, (string) $key);
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
     * @return VldRwyPendFormal|VldRwyPendFormal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|VldRwyPendFormal[]|mixed the list of results, formatted by the current formatter
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VldRwyPendFormalPeer::LOGID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VldRwyPendFormalPeer::LOGID, $keys, Criteria::IN);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldRwyPendFormalPeer::LOGID, $logid, $comparison);
    }

    /**
     * Filter the query on the riwayat_pendidikan_formal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRiwayatPendidikanFormalId('fooValue');   // WHERE riwayat_pendidikan_formal_id = 'fooValue'
     * $query->filterByRiwayatPendidikanFormalId('%fooValue%'); // WHERE riwayat_pendidikan_formal_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riwayatPendidikanFormalId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByRiwayatPendidikanFormalId($riwayatPendidikanFormalId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riwayatPendidikanFormalId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $riwayatPendidikanFormalId)) {
                $riwayatPendidikanFormalId = str_replace('*', '%', $riwayatPendidikanFormalId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VldRwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $riwayatPendidikanFormalId, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByIdtype($idtype = null, $comparison = null)
    {
        if (is_array($idtype)) {
            $useMinMax = false;
            if (isset($idtype['min'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::IDTYPE, $idtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtype['max'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::IDTYPE, $idtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldRwyPendFormalPeer::IDTYPE, $idtype, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByStatusValidasi($statusValidasi = null, $comparison = null)
    {
        if (is_array($statusValidasi)) {
            $useMinMax = false;
            if (isset($statusValidasi['min'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::STATUS_VALIDASI, $statusValidasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusValidasi['max'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::STATUS_VALIDASI, $statusValidasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldRwyPendFormalPeer::STATUS_VALIDASI, $statusValidasi, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldRwyPendFormalPeer::FIELD_ERROR, $fieldError, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldRwyPendFormalPeer::ERROR_MESSAGE, $errorMessage, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldRwyPendFormalPeer::KETERANGAN, $keterangan, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldRwyPendFormalPeer::APP_USERNAME, $appUsername, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldRwyPendFormalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldRwyPendFormalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldRwyPendFormalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(VldRwyPendFormalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VldRwyPendFormalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VldRwyPendFormalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related RwyPendFormal object
     *
     * @param   RwyPendFormal|PropelObjectCollection $rwyPendFormal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VldRwyPendFormalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyPendFormal($rwyPendFormal, $comparison = null)
    {
        if ($rwyPendFormal instanceof RwyPendFormal) {
            return $this
                ->addUsingAlias(VldRwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $rwyPendFormal->getRiwayatPendidikanFormalId(), $comparison);
        } elseif ($rwyPendFormal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VldRwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $rwyPendFormal->toKeyValue('PrimaryKey', 'RiwayatPendidikanFormalId'), $comparison);
        } else {
            throw new PropelException('filterByRwyPendFormal() only accepts arguments of type RwyPendFormal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyPendFormal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function joinRwyPendFormal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyPendFormal');

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
            $this->addJoinObject($join, 'RwyPendFormal');
        }

        return $this;
    }

    /**
     * Use the RwyPendFormal relation RwyPendFormal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyPendFormalQuery A secondary query class using the current class as primary query
     */
    public function useRwyPendFormalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyPendFormal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyPendFormal', '\DataDikdas\Model\RwyPendFormalQuery');
    }

    /**
     * Filter the query by a related Errortype object
     *
     * @param   Errortype|PropelObjectCollection $errortype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VldRwyPendFormalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByErrortype($errortype, $comparison = null)
    {
        if ($errortype instanceof Errortype) {
            return $this
                ->addUsingAlias(VldRwyPendFormalPeer::IDTYPE, $errortype->getIdtype(), $comparison);
        } elseif ($errortype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VldRwyPendFormalPeer::IDTYPE, $errortype->toKeyValue('PrimaryKey', 'Idtype'), $comparison);
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
     * @return VldRwyPendFormalQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   VldRwyPendFormal $vldRwyPendFormal Object to remove from the list of results
     *
     * @return VldRwyPendFormalQuery The current query, for fluid interface
     */
    public function prune($vldRwyPendFormal = null)
    {
        if ($vldRwyPendFormal) {
            $this->addUsingAlias(VldRwyPendFormalPeer::LOGID, $vldRwyPendFormal->getLogid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
