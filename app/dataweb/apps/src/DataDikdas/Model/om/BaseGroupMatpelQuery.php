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
use DataDikdas\Model\GroupMatpel;
use DataDikdas\Model\GroupMatpelPeer;
use DataDikdas\Model\GroupMatpelQuery;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\TingkatPendidikan;

/**
 * Base class that represents a query for the 'ref.group_matpel' table.
 *
 * 
 *
 * @method GroupMatpelQuery orderByGmpId($order = Criteria::ASC) Order by the gmp_id column
 * @method GroupMatpelQuery orderByNamaGroup($order = Criteria::ASC) Order by the nama_group column
 * @method GroupMatpelQuery orderByJumlahJamMaksimum($order = Criteria::ASC) Order by the jumlah_jam_maksimum column
 * @method GroupMatpelQuery orderByJumlahSksMaksimum($order = Criteria::ASC) Order by the jumlah_sks_maksimum column
 * @method GroupMatpelQuery orderByKurikulumId($order = Criteria::ASC) Order by the kurikulum_id column
 * @method GroupMatpelQuery orderByTingkatPendidikanId($order = Criteria::ASC) Order by the tingkat_pendidikan_id column
 * @method GroupMatpelQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method GroupMatpelQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method GroupMatpelQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method GroupMatpelQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method GroupMatpelQuery groupByGmpId() Group by the gmp_id column
 * @method GroupMatpelQuery groupByNamaGroup() Group by the nama_group column
 * @method GroupMatpelQuery groupByJumlahJamMaksimum() Group by the jumlah_jam_maksimum column
 * @method GroupMatpelQuery groupByJumlahSksMaksimum() Group by the jumlah_sks_maksimum column
 * @method GroupMatpelQuery groupByKurikulumId() Group by the kurikulum_id column
 * @method GroupMatpelQuery groupByTingkatPendidikanId() Group by the tingkat_pendidikan_id column
 * @method GroupMatpelQuery groupByCreateDate() Group by the create_date column
 * @method GroupMatpelQuery groupByLastUpdate() Group by the last_update column
 * @method GroupMatpelQuery groupByExpiredDate() Group by the expired_date column
 * @method GroupMatpelQuery groupByLastSync() Group by the last_sync column
 *
 * @method GroupMatpelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GroupMatpelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GroupMatpelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GroupMatpelQuery leftJoinKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kurikulum relation
 * @method GroupMatpelQuery rightJoinKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kurikulum relation
 * @method GroupMatpelQuery innerJoinKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the Kurikulum relation
 *
 * @method GroupMatpelQuery leftJoinTingkatPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPendidikan relation
 * @method GroupMatpelQuery rightJoinTingkatPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPendidikan relation
 * @method GroupMatpelQuery innerJoinTingkatPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPendidikan relation
 *
 * @method GroupMatpelQuery leftJoinMataPelajaranKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method GroupMatpelQuery rightJoinMataPelajaranKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method GroupMatpelQuery innerJoinMataPelajaranKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranKurikulum relation
 *
 * @method GroupMatpel findOne(PropelPDO $con = null) Return the first GroupMatpel matching the query
 * @method GroupMatpel findOneOrCreate(PropelPDO $con = null) Return the first GroupMatpel matching the query, or a new GroupMatpel object populated from the query conditions when no match is found
 *
 * @method GroupMatpel findOneByNamaGroup(string $nama_group) Return the first GroupMatpel filtered by the nama_group column
 * @method GroupMatpel findOneByJumlahJamMaksimum(string $jumlah_jam_maksimum) Return the first GroupMatpel filtered by the jumlah_jam_maksimum column
 * @method GroupMatpel findOneByJumlahSksMaksimum(string $jumlah_sks_maksimum) Return the first GroupMatpel filtered by the jumlah_sks_maksimum column
 * @method GroupMatpel findOneByKurikulumId(int $kurikulum_id) Return the first GroupMatpel filtered by the kurikulum_id column
 * @method GroupMatpel findOneByTingkatPendidikanId(string $tingkat_pendidikan_id) Return the first GroupMatpel filtered by the tingkat_pendidikan_id column
 * @method GroupMatpel findOneByCreateDate(string $create_date) Return the first GroupMatpel filtered by the create_date column
 * @method GroupMatpel findOneByLastUpdate(string $last_update) Return the first GroupMatpel filtered by the last_update column
 * @method GroupMatpel findOneByExpiredDate(string $expired_date) Return the first GroupMatpel filtered by the expired_date column
 * @method GroupMatpel findOneByLastSync(string $last_sync) Return the first GroupMatpel filtered by the last_sync column
 *
 * @method array findByGmpId(string $gmp_id) Return GroupMatpel objects filtered by the gmp_id column
 * @method array findByNamaGroup(string $nama_group) Return GroupMatpel objects filtered by the nama_group column
 * @method array findByJumlahJamMaksimum(string $jumlah_jam_maksimum) Return GroupMatpel objects filtered by the jumlah_jam_maksimum column
 * @method array findByJumlahSksMaksimum(string $jumlah_sks_maksimum) Return GroupMatpel objects filtered by the jumlah_sks_maksimum column
 * @method array findByKurikulumId(int $kurikulum_id) Return GroupMatpel objects filtered by the kurikulum_id column
 * @method array findByTingkatPendidikanId(string $tingkat_pendidikan_id) Return GroupMatpel objects filtered by the tingkat_pendidikan_id column
 * @method array findByCreateDate(string $create_date) Return GroupMatpel objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return GroupMatpel objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return GroupMatpel objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return GroupMatpel objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseGroupMatpelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGroupMatpelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\GroupMatpel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GroupMatpelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   GroupMatpelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GroupMatpelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GroupMatpelQuery) {
            return $criteria;
        }
        $query = new GroupMatpelQuery();
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
     * @return   GroupMatpel|GroupMatpel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GroupMatpelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 GroupMatpel A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByGmpId($key, $con = null)
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
     * @return                 GroupMatpel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "gmp_id", "nama_group", "jumlah_jam_maksimum", "jumlah_sks_maksimum", "kurikulum_id", "tingkat_pendidikan_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."group_matpel" WHERE "gmp_id" = :p0';
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
            $obj = new GroupMatpel();
            $obj->hydrate($row);
            GroupMatpelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return GroupMatpel|GroupMatpel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|GroupMatpel[]|mixed the list of results, formatted by the current formatter
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
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GroupMatpelPeer::GMP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GroupMatpelPeer::GMP_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the gmp_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGmpId('fooValue');   // WHERE gmp_id = 'fooValue'
     * $query->filterByGmpId('%fooValue%'); // WHERE gmp_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gmpId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByGmpId($gmpId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gmpId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $gmpId)) {
                $gmpId = str_replace('*', '%', $gmpId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::GMP_ID, $gmpId, $comparison);
    }

    /**
     * Filter the query on the nama_group column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaGroup('fooValue');   // WHERE nama_group = 'fooValue'
     * $query->filterByNamaGroup('%fooValue%'); // WHERE nama_group LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaGroup The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByNamaGroup($namaGroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaGroup)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaGroup)) {
                $namaGroup = str_replace('*', '%', $namaGroup);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::NAMA_GROUP, $namaGroup, $comparison);
    }

    /**
     * Filter the query on the jumlah_jam_maksimum column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahJamMaksimum(1234); // WHERE jumlah_jam_maksimum = 1234
     * $query->filterByJumlahJamMaksimum(array(12, 34)); // WHERE jumlah_jam_maksimum IN (12, 34)
     * $query->filterByJumlahJamMaksimum(array('min' => 12)); // WHERE jumlah_jam_maksimum >= 12
     * $query->filterByJumlahJamMaksimum(array('max' => 12)); // WHERE jumlah_jam_maksimum <= 12
     * </code>
     *
     * @param     mixed $jumlahJamMaksimum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByJumlahJamMaksimum($jumlahJamMaksimum = null, $comparison = null)
    {
        if (is_array($jumlahJamMaksimum)) {
            $useMinMax = false;
            if (isset($jumlahJamMaksimum['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM, $jumlahJamMaksimum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahJamMaksimum['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM, $jumlahJamMaksimum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM, $jumlahJamMaksimum, $comparison);
    }

    /**
     * Filter the query on the jumlah_sks_maksimum column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahSksMaksimum(1234); // WHERE jumlah_sks_maksimum = 1234
     * $query->filterByJumlahSksMaksimum(array(12, 34)); // WHERE jumlah_sks_maksimum IN (12, 34)
     * $query->filterByJumlahSksMaksimum(array('min' => 12)); // WHERE jumlah_sks_maksimum >= 12
     * $query->filterByJumlahSksMaksimum(array('max' => 12)); // WHERE jumlah_sks_maksimum <= 12
     * </code>
     *
     * @param     mixed $jumlahSksMaksimum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByJumlahSksMaksimum($jumlahSksMaksimum = null, $comparison = null)
    {
        if (is_array($jumlahSksMaksimum)) {
            $useMinMax = false;
            if (isset($jumlahSksMaksimum['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM, $jumlahSksMaksimum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahSksMaksimum['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM, $jumlahSksMaksimum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM, $jumlahSksMaksimum, $comparison);
    }

    /**
     * Filter the query on the kurikulum_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKurikulumId(1234); // WHERE kurikulum_id = 1234
     * $query->filterByKurikulumId(array(12, 34)); // WHERE kurikulum_id IN (12, 34)
     * $query->filterByKurikulumId(array('min' => 12)); // WHERE kurikulum_id >= 12
     * $query->filterByKurikulumId(array('max' => 12)); // WHERE kurikulum_id <= 12
     * </code>
     *
     * @see       filterByKurikulum()
     *
     * @param     mixed $kurikulumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByKurikulumId($kurikulumId = null, $comparison = null)
    {
        if (is_array($kurikulumId)) {
            $useMinMax = false;
            if (isset($kurikulumId['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::KURIKULUM_ID, $kurikulumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kurikulumId['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::KURIKULUM_ID, $kurikulumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::KURIKULUM_ID, $kurikulumId, $comparison);
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
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByTingkatPendidikanId($tingkatPendidikanId = null, $comparison = null)
    {
        if (is_array($tingkatPendidikanId)) {
            $useMinMax = false;
            if (isset($tingkatPendidikanId['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPendidikanId['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId, $comparison);
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
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(GroupMatpelPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(GroupMatpelPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupMatpelPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Kurikulum object
     *
     * @param   Kurikulum|PropelObjectCollection $kurikulum The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GroupMatpelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKurikulum($kurikulum, $comparison = null)
    {
        if ($kurikulum instanceof Kurikulum) {
            return $this
                ->addUsingAlias(GroupMatpelPeer::KURIKULUM_ID, $kurikulum->getKurikulumId(), $comparison);
        } elseif ($kurikulum instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GroupMatpelPeer::KURIKULUM_ID, $kurikulum->toKeyValue('PrimaryKey', 'KurikulumId'), $comparison);
        } else {
            throw new PropelException('filterByKurikulum() only accepts arguments of type Kurikulum or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kurikulum relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function joinKurikulum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kurikulum');

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
            $this->addJoinObject($join, 'Kurikulum');
        }

        return $this;
    }

    /**
     * Use the Kurikulum relation Kurikulum object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KurikulumQuery A secondary query class using the current class as primary query
     */
    public function useKurikulumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kurikulum', '\DataDikdas\Model\KurikulumQuery');
    }

    /**
     * Filter the query by a related TingkatPendidikan object
     *
     * @param   TingkatPendidikan|PropelObjectCollection $tingkatPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GroupMatpelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPendidikan($tingkatPendidikan, $comparison = null)
    {
        if ($tingkatPendidikan instanceof TingkatPendidikan) {
            return $this
                ->addUsingAlias(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->getTingkatPendidikanId(), $comparison);
        } elseif ($tingkatPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->toKeyValue('PrimaryKey', 'TingkatPendidikanId'), $comparison);
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
     * @return GroupMatpelQuery The current query, for fluid interface
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
     * Filter the query by a related MataPelajaranKurikulum object
     *
     * @param   MataPelajaranKurikulum|PropelObjectCollection $mataPelajaranKurikulum  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GroupMatpelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranKurikulum($mataPelajaranKurikulum, $comparison = null)
    {
        if ($mataPelajaranKurikulum instanceof MataPelajaranKurikulum) {
            return $this
                ->addUsingAlias(GroupMatpelPeer::GMP_ID, $mataPelajaranKurikulum->getGmpId(), $comparison);
        } elseif ($mataPelajaranKurikulum instanceof PropelObjectCollection) {
            return $this
                ->useMataPelajaranKurikulumQuery()
                ->filterByPrimaryKeys($mataPelajaranKurikulum->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMataPelajaranKurikulum() only accepts arguments of type MataPelajaranKurikulum or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranKurikulum relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function joinMataPelajaranKurikulum($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranKurikulum');

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
            $this->addJoinObject($join, 'MataPelajaranKurikulum');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranKurikulum relation MataPelajaranKurikulum object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranKurikulumQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranKurikulumQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranKurikulum', '\DataDikdas\Model\MataPelajaranKurikulumQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   GroupMatpel $groupMatpel Object to remove from the list of results
     *
     * @return GroupMatpelQuery The current query, for fluid interface
     */
    public function prune($groupMatpel = null)
    {
        if ($groupMatpel) {
            $this->addUsingAlias(GroupMatpelPeer::GMP_ID, $groupMatpel->getGmpId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
