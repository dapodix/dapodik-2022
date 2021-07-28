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
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\PekerjaanPeer;
use DataDikdas\Model\PekerjaanQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\TracerLulusan;

/**
 * Base class that represents a query for the 'ref.pekerjaan' table.
 *
 * 
 *
 * @method PekerjaanQuery orderByPekerjaanId($order = Criteria::ASC) Order by the pekerjaan_id column
 * @method PekerjaanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PekerjaanQuery orderByAWirausaha($order = Criteria::ASC) Order by the a_wirausaha column
 * @method PekerjaanQuery orderByAPejabatPublik($order = Criteria::ASC) Order by the a_pejabat_publik column
 * @method PekerjaanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PekerjaanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PekerjaanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method PekerjaanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method PekerjaanQuery groupByPekerjaanId() Group by the pekerjaan_id column
 * @method PekerjaanQuery groupByNama() Group by the nama column
 * @method PekerjaanQuery groupByAWirausaha() Group by the a_wirausaha column
 * @method PekerjaanQuery groupByAPejabatPublik() Group by the a_pejabat_publik column
 * @method PekerjaanQuery groupByCreateDate() Group by the create_date column
 * @method PekerjaanQuery groupByLastUpdate() Group by the last_update column
 * @method PekerjaanQuery groupByExpiredDate() Group by the expired_date column
 * @method PekerjaanQuery groupByLastSync() Group by the last_sync column
 *
 * @method PekerjaanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PekerjaanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PekerjaanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PekerjaanQuery leftJoinPesertaDidikRelatedByPekerjaanId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanId relation
 * @method PekerjaanQuery rightJoinPesertaDidikRelatedByPekerjaanId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanId relation
 * @method PekerjaanQuery innerJoinPesertaDidikRelatedByPekerjaanId($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByPekerjaanId relation
 *
 * @method PekerjaanQuery leftJoinPesertaDidikRelatedByPekerjaanIdAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdAyah relation
 * @method PekerjaanQuery rightJoinPesertaDidikRelatedByPekerjaanIdAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdAyah relation
 * @method PekerjaanQuery innerJoinPesertaDidikRelatedByPekerjaanIdAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdAyah relation
 *
 * @method PekerjaanQuery leftJoinPesertaDidikRelatedByPekerjaanIdIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdIbu relation
 * @method PekerjaanQuery rightJoinPesertaDidikRelatedByPekerjaanIdIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdIbu relation
 * @method PekerjaanQuery innerJoinPesertaDidikRelatedByPekerjaanIdIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdIbu relation
 *
 * @method PekerjaanQuery leftJoinPesertaDidikRelatedByPekerjaanIdWali($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdWali relation
 * @method PekerjaanQuery rightJoinPesertaDidikRelatedByPekerjaanIdWali($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdWali relation
 * @method PekerjaanQuery innerJoinPesertaDidikRelatedByPekerjaanIdWali($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdWali relation
 *
 * @method PekerjaanQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method PekerjaanQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method PekerjaanQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method PekerjaanQuery leftJoinTracerLulusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TracerLulusan relation
 * @method PekerjaanQuery rightJoinTracerLulusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TracerLulusan relation
 * @method PekerjaanQuery innerJoinTracerLulusan($relationAlias = null) Adds a INNER JOIN clause to the query using the TracerLulusan relation
 *
 * @method Pekerjaan findOne(PropelPDO $con = null) Return the first Pekerjaan matching the query
 * @method Pekerjaan findOneOrCreate(PropelPDO $con = null) Return the first Pekerjaan matching the query, or a new Pekerjaan object populated from the query conditions when no match is found
 *
 * @method Pekerjaan findOneByNama(string $nama) Return the first Pekerjaan filtered by the nama column
 * @method Pekerjaan findOneByAWirausaha(string $a_wirausaha) Return the first Pekerjaan filtered by the a_wirausaha column
 * @method Pekerjaan findOneByAPejabatPublik(string $a_pejabat_publik) Return the first Pekerjaan filtered by the a_pejabat_publik column
 * @method Pekerjaan findOneByCreateDate(string $create_date) Return the first Pekerjaan filtered by the create_date column
 * @method Pekerjaan findOneByLastUpdate(string $last_update) Return the first Pekerjaan filtered by the last_update column
 * @method Pekerjaan findOneByExpiredDate(string $expired_date) Return the first Pekerjaan filtered by the expired_date column
 * @method Pekerjaan findOneByLastSync(string $last_sync) Return the first Pekerjaan filtered by the last_sync column
 *
 * @method array findByPekerjaanId(int $pekerjaan_id) Return Pekerjaan objects filtered by the pekerjaan_id column
 * @method array findByNama(string $nama) Return Pekerjaan objects filtered by the nama column
 * @method array findByAWirausaha(string $a_wirausaha) Return Pekerjaan objects filtered by the a_wirausaha column
 * @method array findByAPejabatPublik(string $a_pejabat_publik) Return Pekerjaan objects filtered by the a_pejabat_publik column
 * @method array findByCreateDate(string $create_date) Return Pekerjaan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Pekerjaan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Pekerjaan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Pekerjaan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePekerjaanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePekerjaanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Pekerjaan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PekerjaanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PekerjaanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PekerjaanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PekerjaanQuery) {
            return $criteria;
        }
        $query = new PekerjaanQuery();
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
     * @return   Pekerjaan|Pekerjaan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PekerjaanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PekerjaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Pekerjaan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPekerjaanId($key, $con = null)
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
     * @return                 Pekerjaan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "pekerjaan_id", "nama", "a_wirausaha", "a_pejabat_publik", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."pekerjaan" WHERE "pekerjaan_id" = :p0';
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
            $obj = new Pekerjaan();
            $obj->hydrate($row);
            PekerjaanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Pekerjaan|Pekerjaan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Pekerjaan[]|mixed the list of results, formatted by the current formatter
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
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pekerjaan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPekerjaanId(1234); // WHERE pekerjaan_id = 1234
     * $query->filterByPekerjaanId(array(12, 34)); // WHERE pekerjaan_id IN (12, 34)
     * $query->filterByPekerjaanId(array('min' => 12)); // WHERE pekerjaan_id >= 12
     * $query->filterByPekerjaanId(array('max' => 12)); // WHERE pekerjaan_id <= 12
     * </code>
     *
     * @param     mixed $pekerjaanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByPekerjaanId($pekerjaanId = null, $comparison = null)
    {
        if (is_array($pekerjaanId)) {
            $useMinMax = false;
            if (isset($pekerjaanId['min'])) {
                $this->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pekerjaanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pekerjaanId['max'])) {
                $this->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pekerjaanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pekerjaanId, $comparison);
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
     * @return PekerjaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PekerjaanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the a_wirausaha column
     *
     * Example usage:
     * <code>
     * $query->filterByAWirausaha(1234); // WHERE a_wirausaha = 1234
     * $query->filterByAWirausaha(array(12, 34)); // WHERE a_wirausaha IN (12, 34)
     * $query->filterByAWirausaha(array('min' => 12)); // WHERE a_wirausaha >= 12
     * $query->filterByAWirausaha(array('max' => 12)); // WHERE a_wirausaha <= 12
     * </code>
     *
     * @param     mixed $aWirausaha The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByAWirausaha($aWirausaha = null, $comparison = null)
    {
        if (is_array($aWirausaha)) {
            $useMinMax = false;
            if (isset($aWirausaha['min'])) {
                $this->addUsingAlias(PekerjaanPeer::A_WIRAUSAHA, $aWirausaha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aWirausaha['max'])) {
                $this->addUsingAlias(PekerjaanPeer::A_WIRAUSAHA, $aWirausaha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PekerjaanPeer::A_WIRAUSAHA, $aWirausaha, $comparison);
    }

    /**
     * Filter the query on the a_pejabat_publik column
     *
     * Example usage:
     * <code>
     * $query->filterByAPejabatPublik(1234); // WHERE a_pejabat_publik = 1234
     * $query->filterByAPejabatPublik(array(12, 34)); // WHERE a_pejabat_publik IN (12, 34)
     * $query->filterByAPejabatPublik(array('min' => 12)); // WHERE a_pejabat_publik >= 12
     * $query->filterByAPejabatPublik(array('max' => 12)); // WHERE a_pejabat_publik <= 12
     * </code>
     *
     * @param     mixed $aPejabatPublik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByAPejabatPublik($aPejabatPublik = null, $comparison = null)
    {
        if (is_array($aPejabatPublik)) {
            $useMinMax = false;
            if (isset($aPejabatPublik['min'])) {
                $this->addUsingAlias(PekerjaanPeer::A_PEJABAT_PUBLIK, $aPejabatPublik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aPejabatPublik['max'])) {
                $this->addUsingAlias(PekerjaanPeer::A_PEJABAT_PUBLIK, $aPejabatPublik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PekerjaanPeer::A_PEJABAT_PUBLIK, $aPejabatPublik, $comparison);
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
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PekerjaanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PekerjaanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PekerjaanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PekerjaanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PekerjaanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PekerjaanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(PekerjaanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(PekerjaanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PekerjaanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PekerjaanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PekerjaanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PekerjaanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PekerjaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByPekerjaanId($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pesertaDidik->getPekerjaanId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByPekerjaanIdQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByPekerjaanId() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByPekerjaanId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByPekerjaanId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByPekerjaanId');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByPekerjaanId');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByPekerjaanId relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByPekerjaanIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByPekerjaanId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByPekerjaanId', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PekerjaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByPekerjaanIdAyah($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pesertaDidik->getPekerjaanIdAyah(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByPekerjaanIdAyahQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByPekerjaanIdAyah() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByPekerjaanIdAyah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByPekerjaanIdAyah');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByPekerjaanIdAyah');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByPekerjaanIdAyah relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByPekerjaanIdAyahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByPekerjaanIdAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByPekerjaanIdAyah', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PekerjaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByPekerjaanIdIbu($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pesertaDidik->getPekerjaanIdIbu(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByPekerjaanIdIbuQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByPekerjaanIdIbu() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByPekerjaanIdIbu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByPekerjaanIdIbu');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByPekerjaanIdIbu');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByPekerjaanIdIbu relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByPekerjaanIdIbuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByPekerjaanIdIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByPekerjaanIdIbu', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PekerjaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByPekerjaanIdWali($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pesertaDidik->getPekerjaanIdWali(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByPekerjaanIdWaliQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByPekerjaanIdWali() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByPekerjaanIdWali relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByPekerjaanIdWali($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByPekerjaanIdWali');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByPekerjaanIdWali');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByPekerjaanIdWali relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByPekerjaanIdWaliQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByPekerjaanIdWali($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByPekerjaanIdWali', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PekerjaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $ptk->getPekerjaanSuamiIstri(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            return $this
                ->usePtkQuery()
                ->filterByPrimaryKeys($ptk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtk() only accepts arguments of type Ptk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ptk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ptk');

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
            $this->addJoinObject($join, 'Ptk');
        }

        return $this;
    }

    /**
     * Use the Ptk relation Ptk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkQuery A secondary query class using the current class as primary query
     */
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related TracerLulusan object
     *
     * @param   TracerLulusan|PropelObjectCollection $tracerLulusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PekerjaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracerLulusan($tracerLulusan, $comparison = null)
    {
        if ($tracerLulusan instanceof TracerLulusan) {
            return $this
                ->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $tracerLulusan->getPekerjaanId(), $comparison);
        } elseif ($tracerLulusan instanceof PropelObjectCollection) {
            return $this
                ->useTracerLulusanQuery()
                ->filterByPrimaryKeys($tracerLulusan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTracerLulusan() only accepts arguments of type TracerLulusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TracerLulusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function joinTracerLulusan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TracerLulusan');

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
            $this->addJoinObject($join, 'TracerLulusan');
        }

        return $this;
    }

    /**
     * Use the TracerLulusan relation TracerLulusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TracerLulusanQuery A secondary query class using the current class as primary query
     */
    public function useTracerLulusanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTracerLulusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TracerLulusan', '\DataDikdas\Model\TracerLulusanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Pekerjaan $pekerjaan Object to remove from the list of results
     *
     * @return PekerjaanQuery The current query, for fluid interface
     */
    public function prune($pekerjaan = null)
    {
        if ($pekerjaan) {
            $this->addUsingAlias(PekerjaanPeer::PEKERJAAN_ID, $pekerjaan->getPekerjaanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
