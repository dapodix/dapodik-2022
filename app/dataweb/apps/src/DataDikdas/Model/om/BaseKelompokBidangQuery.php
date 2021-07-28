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
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\KelompokBidang;
use DataDikdas\Model\KelompokBidangPeer;
use DataDikdas\Model\KelompokBidangQuery;

/**
 * Base class that represents a query for the 'ref.kelompok_bidang' table.
 *
 * 
 *
 * @method KelompokBidangQuery orderByLevelBidangId($order = Criteria::ASC) Order by the level_bidang_id column
 * @method KelompokBidangQuery orderByNamaLevelBidang($order = Criteria::ASC) Order by the nama_level_bidang column
 * @method KelompokBidangQuery orderByUntukSma($order = Criteria::ASC) Order by the untuk_sma column
 * @method KelompokBidangQuery orderByUntukSmk($order = Criteria::ASC) Order by the untuk_smk column
 * @method KelompokBidangQuery orderByUntukPt($order = Criteria::ASC) Order by the untuk_pt column
 * @method KelompokBidangQuery orderByUntukSlb($order = Criteria::ASC) Order by the untuk_slb column
 * @method KelompokBidangQuery orderByUntukSmklb($order = Criteria::ASC) Order by the untuk_smklb column
 * @method KelompokBidangQuery orderByLevelBidangInduk($order = Criteria::ASC) Order by the level_bidang_induk column
 * @method KelompokBidangQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KelompokBidangQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KelompokBidangQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method KelompokBidangQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method KelompokBidangQuery groupByLevelBidangId() Group by the level_bidang_id column
 * @method KelompokBidangQuery groupByNamaLevelBidang() Group by the nama_level_bidang column
 * @method KelompokBidangQuery groupByUntukSma() Group by the untuk_sma column
 * @method KelompokBidangQuery groupByUntukSmk() Group by the untuk_smk column
 * @method KelompokBidangQuery groupByUntukPt() Group by the untuk_pt column
 * @method KelompokBidangQuery groupByUntukSlb() Group by the untuk_slb column
 * @method KelompokBidangQuery groupByUntukSmklb() Group by the untuk_smklb column
 * @method KelompokBidangQuery groupByLevelBidangInduk() Group by the level_bidang_induk column
 * @method KelompokBidangQuery groupByCreateDate() Group by the create_date column
 * @method KelompokBidangQuery groupByLastUpdate() Group by the last_update column
 * @method KelompokBidangQuery groupByExpiredDate() Group by the expired_date column
 * @method KelompokBidangQuery groupByLastSync() Group by the last_sync column
 *
 * @method KelompokBidangQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KelompokBidangQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KelompokBidangQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KelompokBidangQuery leftJoinKelompokBidangRelatedByLevelBidangInduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the KelompokBidangRelatedByLevelBidangInduk relation
 * @method KelompokBidangQuery rightJoinKelompokBidangRelatedByLevelBidangInduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KelompokBidangRelatedByLevelBidangInduk relation
 * @method KelompokBidangQuery innerJoinKelompokBidangRelatedByLevelBidangInduk($relationAlias = null) Adds a INNER JOIN clause to the query using the KelompokBidangRelatedByLevelBidangInduk relation
 *
 * @method KelompokBidangQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method KelompokBidangQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method KelompokBidangQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method KelompokBidangQuery leftJoinKelompokBidangRelatedByLevelBidangId($relationAlias = null) Adds a LEFT JOIN clause to the query using the KelompokBidangRelatedByLevelBidangId relation
 * @method KelompokBidangQuery rightJoinKelompokBidangRelatedByLevelBidangId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KelompokBidangRelatedByLevelBidangId relation
 * @method KelompokBidangQuery innerJoinKelompokBidangRelatedByLevelBidangId($relationAlias = null) Adds a INNER JOIN clause to the query using the KelompokBidangRelatedByLevelBidangId relation
 *
 * @method KelompokBidang findOne(PropelPDO $con = null) Return the first KelompokBidang matching the query
 * @method KelompokBidang findOneOrCreate(PropelPDO $con = null) Return the first KelompokBidang matching the query, or a new KelompokBidang object populated from the query conditions when no match is found
 *
 * @method KelompokBidang findOneByNamaLevelBidang(string $nama_level_bidang) Return the first KelompokBidang filtered by the nama_level_bidang column
 * @method KelompokBidang findOneByUntukSma(string $untuk_sma) Return the first KelompokBidang filtered by the untuk_sma column
 * @method KelompokBidang findOneByUntukSmk(string $untuk_smk) Return the first KelompokBidang filtered by the untuk_smk column
 * @method KelompokBidang findOneByUntukPt(string $untuk_pt) Return the first KelompokBidang filtered by the untuk_pt column
 * @method KelompokBidang findOneByUntukSlb(string $untuk_slb) Return the first KelompokBidang filtered by the untuk_slb column
 * @method KelompokBidang findOneByUntukSmklb(string $untuk_smklb) Return the first KelompokBidang filtered by the untuk_smklb column
 * @method KelompokBidang findOneByLevelBidangInduk(string $level_bidang_induk) Return the first KelompokBidang filtered by the level_bidang_induk column
 * @method KelompokBidang findOneByCreateDate(string $create_date) Return the first KelompokBidang filtered by the create_date column
 * @method KelompokBidang findOneByLastUpdate(string $last_update) Return the first KelompokBidang filtered by the last_update column
 * @method KelompokBidang findOneByExpiredDate(string $expired_date) Return the first KelompokBidang filtered by the expired_date column
 * @method KelompokBidang findOneByLastSync(string $last_sync) Return the first KelompokBidang filtered by the last_sync column
 *
 * @method array findByLevelBidangId(string $level_bidang_id) Return KelompokBidang objects filtered by the level_bidang_id column
 * @method array findByNamaLevelBidang(string $nama_level_bidang) Return KelompokBidang objects filtered by the nama_level_bidang column
 * @method array findByUntukSma(string $untuk_sma) Return KelompokBidang objects filtered by the untuk_sma column
 * @method array findByUntukSmk(string $untuk_smk) Return KelompokBidang objects filtered by the untuk_smk column
 * @method array findByUntukPt(string $untuk_pt) Return KelompokBidang objects filtered by the untuk_pt column
 * @method array findByUntukSlb(string $untuk_slb) Return KelompokBidang objects filtered by the untuk_slb column
 * @method array findByUntukSmklb(string $untuk_smklb) Return KelompokBidang objects filtered by the untuk_smklb column
 * @method array findByLevelBidangInduk(string $level_bidang_induk) Return KelompokBidang objects filtered by the level_bidang_induk column
 * @method array findByCreateDate(string $create_date) Return KelompokBidang objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KelompokBidang objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return KelompokBidang objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return KelompokBidang objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKelompokBidangQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKelompokBidangQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KelompokBidang', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KelompokBidangQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KelompokBidangQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KelompokBidangQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KelompokBidangQuery) {
            return $criteria;
        }
        $query = new KelompokBidangQuery();
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
     * @return   KelompokBidang|KelompokBidang[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KelompokBidangPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KelompokBidangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KelompokBidang A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByLevelBidangId($key, $con = null)
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
     * @return                 KelompokBidang A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "level_bidang_id", "nama_level_bidang", "untuk_sma", "untuk_smk", "untuk_pt", "untuk_slb", "untuk_smklb", "level_bidang_induk", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."kelompok_bidang" WHERE "level_bidang_id" = :p0';
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
            $obj = new KelompokBidang();
            $obj->hydrate($row);
            KelompokBidangPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KelompokBidang|KelompokBidang[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KelompokBidang[]|mixed the list of results, formatted by the current formatter
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
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the level_bidang_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelBidangId('fooValue');   // WHERE level_bidang_id = 'fooValue'
     * $query->filterByLevelBidangId('%fooValue%'); // WHERE level_bidang_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $levelBidangId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByLevelBidangId($levelBidangId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($levelBidangId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $levelBidangId)) {
                $levelBidangId = str_replace('*', '%', $levelBidangId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_ID, $levelBidangId, $comparison);
    }

    /**
     * Filter the query on the nama_level_bidang column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaLevelBidang('fooValue');   // WHERE nama_level_bidang = 'fooValue'
     * $query->filterByNamaLevelBidang('%fooValue%'); // WHERE nama_level_bidang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaLevelBidang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByNamaLevelBidang($namaLevelBidang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaLevelBidang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaLevelBidang)) {
                $namaLevelBidang = str_replace('*', '%', $namaLevelBidang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::NAMA_LEVEL_BIDANG, $namaLevelBidang, $comparison);
    }

    /**
     * Filter the query on the untuk_sma column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSma(1234); // WHERE untuk_sma = 1234
     * $query->filterByUntukSma(array(12, 34)); // WHERE untuk_sma IN (12, 34)
     * $query->filterByUntukSma(array('min' => 12)); // WHERE untuk_sma >= 12
     * $query->filterByUntukSma(array('max' => 12)); // WHERE untuk_sma <= 12
     * </code>
     *
     * @param     mixed $untukSma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByUntukSma($untukSma = null, $comparison = null)
    {
        if (is_array($untukSma)) {
            $useMinMax = false;
            if (isset($untukSma['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMA, $untukSma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSma['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMA, $untukSma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMA, $untukSma, $comparison);
    }

    /**
     * Filter the query on the untuk_smk column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSmk(1234); // WHERE untuk_smk = 1234
     * $query->filterByUntukSmk(array(12, 34)); // WHERE untuk_smk IN (12, 34)
     * $query->filterByUntukSmk(array('min' => 12)); // WHERE untuk_smk >= 12
     * $query->filterByUntukSmk(array('max' => 12)); // WHERE untuk_smk <= 12
     * </code>
     *
     * @param     mixed $untukSmk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByUntukSmk($untukSmk = null, $comparison = null)
    {
        if (is_array($untukSmk)) {
            $useMinMax = false;
            if (isset($untukSmk['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMK, $untukSmk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSmk['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMK, $untukSmk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMK, $untukSmk, $comparison);
    }

    /**
     * Filter the query on the untuk_pt column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukPt(1234); // WHERE untuk_pt = 1234
     * $query->filterByUntukPt(array(12, 34)); // WHERE untuk_pt IN (12, 34)
     * $query->filterByUntukPt(array('min' => 12)); // WHERE untuk_pt >= 12
     * $query->filterByUntukPt(array('max' => 12)); // WHERE untuk_pt <= 12
     * </code>
     *
     * @param     mixed $untukPt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByUntukPt($untukPt = null, $comparison = null)
    {
        if (is_array($untukPt)) {
            $useMinMax = false;
            if (isset($untukPt['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_PT, $untukPt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukPt['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_PT, $untukPt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::UNTUK_PT, $untukPt, $comparison);
    }

    /**
     * Filter the query on the untuk_slb column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSlb(1234); // WHERE untuk_slb = 1234
     * $query->filterByUntukSlb(array(12, 34)); // WHERE untuk_slb IN (12, 34)
     * $query->filterByUntukSlb(array('min' => 12)); // WHERE untuk_slb >= 12
     * $query->filterByUntukSlb(array('max' => 12)); // WHERE untuk_slb <= 12
     * </code>
     *
     * @param     mixed $untukSlb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByUntukSlb($untukSlb = null, $comparison = null)
    {
        if (is_array($untukSlb)) {
            $useMinMax = false;
            if (isset($untukSlb['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SLB, $untukSlb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSlb['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SLB, $untukSlb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::UNTUK_SLB, $untukSlb, $comparison);
    }

    /**
     * Filter the query on the untuk_smklb column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSmklb(1234); // WHERE untuk_smklb = 1234
     * $query->filterByUntukSmklb(array(12, 34)); // WHERE untuk_smklb IN (12, 34)
     * $query->filterByUntukSmklb(array('min' => 12)); // WHERE untuk_smklb >= 12
     * $query->filterByUntukSmklb(array('max' => 12)); // WHERE untuk_smklb <= 12
     * </code>
     *
     * @param     mixed $untukSmklb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByUntukSmklb($untukSmklb = null, $comparison = null)
    {
        if (is_array($untukSmklb)) {
            $useMinMax = false;
            if (isset($untukSmklb['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMKLB, $untukSmklb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSmklb['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMKLB, $untukSmklb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::UNTUK_SMKLB, $untukSmklb, $comparison);
    }

    /**
     * Filter the query on the level_bidang_induk column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelBidangInduk('fooValue');   // WHERE level_bidang_induk = 'fooValue'
     * $query->filterByLevelBidangInduk('%fooValue%'); // WHERE level_bidang_induk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $levelBidangInduk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByLevelBidangInduk($levelBidangInduk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($levelBidangInduk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $levelBidangInduk)) {
                $levelBidangInduk = str_replace('*', '%', $levelBidangInduk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_INDUK, $levelBidangInduk, $comparison);
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
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KelompokBidangPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KelompokBidangPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokBidangPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related KelompokBidang object
     *
     * @param   KelompokBidang|PropelObjectCollection $kelompokBidang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KelompokBidangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKelompokBidangRelatedByLevelBidangInduk($kelompokBidang, $comparison = null)
    {
        if ($kelompokBidang instanceof KelompokBidang) {
            return $this
                ->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_INDUK, $kelompokBidang->getLevelBidangId(), $comparison);
        } elseif ($kelompokBidang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_INDUK, $kelompokBidang->toKeyValue('PrimaryKey', 'LevelBidangId'), $comparison);
        } else {
            throw new PropelException('filterByKelompokBidangRelatedByLevelBidangInduk() only accepts arguments of type KelompokBidang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KelompokBidangRelatedByLevelBidangInduk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function joinKelompokBidangRelatedByLevelBidangInduk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KelompokBidangRelatedByLevelBidangInduk');

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
            $this->addJoinObject($join, 'KelompokBidangRelatedByLevelBidangInduk');
        }

        return $this;
    }

    /**
     * Use the KelompokBidangRelatedByLevelBidangInduk relation KelompokBidang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KelompokBidangQuery A secondary query class using the current class as primary query
     */
    public function useKelompokBidangRelatedByLevelBidangIndukQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKelompokBidangRelatedByLevelBidangInduk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KelompokBidangRelatedByLevelBidangInduk', '\DataDikdas\Model\KelompokBidangQuery');
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KelompokBidangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_ID, $jurusan->getLevelBidangId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            return $this
                ->useJurusanQuery()
                ->filterByPrimaryKeys($jurusan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusan() only accepts arguments of type Jurusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Jurusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function joinJurusan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Jurusan');

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
            $this->addJoinObject($join, 'Jurusan');
        }

        return $this;
    }

    /**
     * Use the Jurusan relation Jurusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanQuery A secondary query class using the current class as primary query
     */
    public function useJurusanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jurusan', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related KelompokBidang object
     *
     * @param   KelompokBidang|PropelObjectCollection $kelompokBidang  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KelompokBidangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKelompokBidangRelatedByLevelBidangId($kelompokBidang, $comparison = null)
    {
        if ($kelompokBidang instanceof KelompokBidang) {
            return $this
                ->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_ID, $kelompokBidang->getLevelBidangInduk(), $comparison);
        } elseif ($kelompokBidang instanceof PropelObjectCollection) {
            return $this
                ->useKelompokBidangRelatedByLevelBidangIdQuery()
                ->filterByPrimaryKeys($kelompokBidang->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKelompokBidangRelatedByLevelBidangId() only accepts arguments of type KelompokBidang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KelompokBidangRelatedByLevelBidangId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function joinKelompokBidangRelatedByLevelBidangId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KelompokBidangRelatedByLevelBidangId');

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
            $this->addJoinObject($join, 'KelompokBidangRelatedByLevelBidangId');
        }

        return $this;
    }

    /**
     * Use the KelompokBidangRelatedByLevelBidangId relation KelompokBidang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KelompokBidangQuery A secondary query class using the current class as primary query
     */
    public function useKelompokBidangRelatedByLevelBidangIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKelompokBidangRelatedByLevelBidangId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KelompokBidangRelatedByLevelBidangId', '\DataDikdas\Model\KelompokBidangQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   KelompokBidang $kelompokBidang Object to remove from the list of results
     *
     * @return KelompokBidangQuery The current query, for fluid interface
     */
    public function prune($kelompokBidang = null)
    {
        if ($kelompokBidang) {
            $this->addUsingAlias(KelompokBidangPeer::LEVEL_BIDANG_ID, $kelompokBidang->getLevelBidangId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
