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
use DataDikdas\Model\AktPd;
use DataDikdas\Model\AktPdPeer;
use DataDikdas\Model\AktPdQuery;
use DataDikdas\Model\AnggotaAktPd;
use DataDikdas\Model\BimbingPd;
use DataDikdas\Model\JenisAktPd;
use DataDikdas\Model\Mou;
use DataDikdas\Model\VldAktPd;

/**
 * Base class that represents a query for the 'akt_pd' table.
 *
 * 
 *
 * @method AktPdQuery orderByIdAktPd($order = Criteria::ASC) Order by the id_akt_pd column
 * @method AktPdQuery orderByMouId($order = Criteria::ASC) Order by the mou_id column
 * @method AktPdQuery orderByIdJnsAktPd($order = Criteria::ASC) Order by the id_jns_akt_pd column
 * @method AktPdQuery orderByJudulAktPd($order = Criteria::ASC) Order by the judul_akt_pd column
 * @method AktPdQuery orderBySkTugas($order = Criteria::ASC) Order by the sk_tugas column
 * @method AktPdQuery orderByTglSkTugas($order = Criteria::ASC) Order by the tgl_sk_tugas column
 * @method AktPdQuery orderByKetAkt($order = Criteria::ASC) Order by the ket_akt column
 * @method AktPdQuery orderByAKomunal($order = Criteria::ASC) Order by the a_komunal column
 * @method AktPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AktPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AktPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AktPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AktPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AktPdQuery groupByIdAktPd() Group by the id_akt_pd column
 * @method AktPdQuery groupByMouId() Group by the mou_id column
 * @method AktPdQuery groupByIdJnsAktPd() Group by the id_jns_akt_pd column
 * @method AktPdQuery groupByJudulAktPd() Group by the judul_akt_pd column
 * @method AktPdQuery groupBySkTugas() Group by the sk_tugas column
 * @method AktPdQuery groupByTglSkTugas() Group by the tgl_sk_tugas column
 * @method AktPdQuery groupByKetAkt() Group by the ket_akt column
 * @method AktPdQuery groupByAKomunal() Group by the a_komunal column
 * @method AktPdQuery groupByCreateDate() Group by the create_date column
 * @method AktPdQuery groupByLastUpdate() Group by the last_update column
 * @method AktPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method AktPdQuery groupByLastSync() Group by the last_sync column
 * @method AktPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AktPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AktPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AktPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AktPdQuery leftJoinMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mou relation
 * @method AktPdQuery rightJoinMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mou relation
 * @method AktPdQuery innerJoinMou($relationAlias = null) Adds a INNER JOIN clause to the query using the Mou relation
 *
 * @method AktPdQuery leftJoinJenisAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisAktPd relation
 * @method AktPdQuery rightJoinJenisAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisAktPd relation
 * @method AktPdQuery innerJoinJenisAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisAktPd relation
 *
 * @method AktPdQuery leftJoinAnggotaAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaAktPd relation
 * @method AktPdQuery rightJoinAnggotaAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaAktPd relation
 * @method AktPdQuery innerJoinAnggotaAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaAktPd relation
 *
 * @method AktPdQuery leftJoinBimbingPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the BimbingPd relation
 * @method AktPdQuery rightJoinBimbingPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BimbingPd relation
 * @method AktPdQuery innerJoinBimbingPd($relationAlias = null) Adds a INNER JOIN clause to the query using the BimbingPd relation
 *
 * @method AktPdQuery leftJoinVldAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAktPd relation
 * @method AktPdQuery rightJoinVldAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAktPd relation
 * @method AktPdQuery innerJoinVldAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAktPd relation
 *
 * @method AktPd findOne(PropelPDO $con = null) Return the first AktPd matching the query
 * @method AktPd findOneOrCreate(PropelPDO $con = null) Return the first AktPd matching the query, or a new AktPd object populated from the query conditions when no match is found
 *
 * @method AktPd findOneByMouId(string $mou_id) Return the first AktPd filtered by the mou_id column
 * @method AktPd findOneByIdJnsAktPd(string $id_jns_akt_pd) Return the first AktPd filtered by the id_jns_akt_pd column
 * @method AktPd findOneByJudulAktPd(string $judul_akt_pd) Return the first AktPd filtered by the judul_akt_pd column
 * @method AktPd findOneBySkTugas(string $sk_tugas) Return the first AktPd filtered by the sk_tugas column
 * @method AktPd findOneByTglSkTugas(string $tgl_sk_tugas) Return the first AktPd filtered by the tgl_sk_tugas column
 * @method AktPd findOneByKetAkt(string $ket_akt) Return the first AktPd filtered by the ket_akt column
 * @method AktPd findOneByAKomunal(string $a_komunal) Return the first AktPd filtered by the a_komunal column
 * @method AktPd findOneByCreateDate(string $create_date) Return the first AktPd filtered by the create_date column
 * @method AktPd findOneByLastUpdate(string $last_update) Return the first AktPd filtered by the last_update column
 * @method AktPd findOneBySoftDelete(string $soft_delete) Return the first AktPd filtered by the soft_delete column
 * @method AktPd findOneByLastSync(string $last_sync) Return the first AktPd filtered by the last_sync column
 * @method AktPd findOneByUpdaterId(string $updater_id) Return the first AktPd filtered by the updater_id column
 *
 * @method array findByIdAktPd(string $id_akt_pd) Return AktPd objects filtered by the id_akt_pd column
 * @method array findByMouId(string $mou_id) Return AktPd objects filtered by the mou_id column
 * @method array findByIdJnsAktPd(string $id_jns_akt_pd) Return AktPd objects filtered by the id_jns_akt_pd column
 * @method array findByJudulAktPd(string $judul_akt_pd) Return AktPd objects filtered by the judul_akt_pd column
 * @method array findBySkTugas(string $sk_tugas) Return AktPd objects filtered by the sk_tugas column
 * @method array findByTglSkTugas(string $tgl_sk_tugas) Return AktPd objects filtered by the tgl_sk_tugas column
 * @method array findByKetAkt(string $ket_akt) Return AktPd objects filtered by the ket_akt column
 * @method array findByAKomunal(string $a_komunal) Return AktPd objects filtered by the a_komunal column
 * @method array findByCreateDate(string $create_date) Return AktPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AktPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AktPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AktPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AktPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAktPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAktPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AktPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AktPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AktPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AktPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AktPdQuery) {
            return $criteria;
        }
        $query = new AktPdQuery();
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
     * @return   AktPd|AktPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AktPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AktPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAktPd($key, $con = null)
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
     * @return                 AktPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_akt_pd", "mou_id", "id_jns_akt_pd", "judul_akt_pd", "sk_tugas", "tgl_sk_tugas", "ket_akt", "a_komunal", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "akt_pd" WHERE "id_akt_pd" = :p0';
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
            $obj = new AktPd();
            $obj->hydrate($row);
            AktPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AktPd|AktPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AktPd[]|mixed the list of results, formatted by the current formatter
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
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AktPdPeer::ID_AKT_PD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AktPdPeer::ID_AKT_PD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAktPd('fooValue');   // WHERE id_akt_pd = 'fooValue'
     * $query->filterByIdAktPd('%fooValue%'); // WHERE id_akt_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAktPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByIdAktPd($idAktPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAktPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAktPd)) {
                $idAktPd = str_replace('*', '%', $idAktPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktPdPeer::ID_AKT_PD, $idAktPd, $comparison);
    }

    /**
     * Filter the query on the mou_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMouId('fooValue');   // WHERE mou_id = 'fooValue'
     * $query->filterByMouId('%fooValue%'); // WHERE mou_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mouId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByMouId($mouId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mouId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mouId)) {
                $mouId = str_replace('*', '%', $mouId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktPdPeer::MOU_ID, $mouId, $comparison);
    }

    /**
     * Filter the query on the id_jns_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsAktPd(1234); // WHERE id_jns_akt_pd = 1234
     * $query->filterByIdJnsAktPd(array(12, 34)); // WHERE id_jns_akt_pd IN (12, 34)
     * $query->filterByIdJnsAktPd(array('min' => 12)); // WHERE id_jns_akt_pd >= 12
     * $query->filterByIdJnsAktPd(array('max' => 12)); // WHERE id_jns_akt_pd <= 12
     * </code>
     *
     * @see       filterByJenisAktPd()
     *
     * @param     mixed $idJnsAktPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByIdJnsAktPd($idJnsAktPd = null, $comparison = null)
    {
        if (is_array($idJnsAktPd)) {
            $useMinMax = false;
            if (isset($idJnsAktPd['min'])) {
                $this->addUsingAlias(AktPdPeer::ID_JNS_AKT_PD, $idJnsAktPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsAktPd['max'])) {
                $this->addUsingAlias(AktPdPeer::ID_JNS_AKT_PD, $idJnsAktPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktPdPeer::ID_JNS_AKT_PD, $idJnsAktPd, $comparison);
    }

    /**
     * Filter the query on the judul_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByJudulAktPd('fooValue');   // WHERE judul_akt_pd = 'fooValue'
     * $query->filterByJudulAktPd('%fooValue%'); // WHERE judul_akt_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judulAktPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByJudulAktPd($judulAktPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judulAktPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $judulAktPd)) {
                $judulAktPd = str_replace('*', '%', $judulAktPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktPdPeer::JUDUL_AKT_PD, $judulAktPd, $comparison);
    }

    /**
     * Filter the query on the sk_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterBySkTugas('fooValue');   // WHERE sk_tugas = 'fooValue'
     * $query->filterBySkTugas('%fooValue%'); // WHERE sk_tugas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skTugas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterBySkTugas($skTugas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skTugas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skTugas)) {
                $skTugas = str_replace('*', '%', $skTugas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktPdPeer::SK_TUGAS, $skTugas, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkTugas('2011-03-14'); // WHERE tgl_sk_tugas = '2011-03-14'
     * $query->filterByTglSkTugas('now'); // WHERE tgl_sk_tugas = '2011-03-14'
     * $query->filterByTglSkTugas(array('max' => 'yesterday')); // WHERE tgl_sk_tugas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkTugas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByTglSkTugas($tglSkTugas = null, $comparison = null)
    {
        if (is_array($tglSkTugas)) {
            $useMinMax = false;
            if (isset($tglSkTugas['min'])) {
                $this->addUsingAlias(AktPdPeer::TGL_SK_TUGAS, $tglSkTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkTugas['max'])) {
                $this->addUsingAlias(AktPdPeer::TGL_SK_TUGAS, $tglSkTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktPdPeer::TGL_SK_TUGAS, $tglSkTugas, $comparison);
    }

    /**
     * Filter the query on the ket_akt column
     *
     * Example usage:
     * <code>
     * $query->filterByKetAkt('fooValue');   // WHERE ket_akt = 'fooValue'
     * $query->filterByKetAkt('%fooValue%'); // WHERE ket_akt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketAkt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByKetAkt($ketAkt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketAkt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketAkt)) {
                $ketAkt = str_replace('*', '%', $ketAkt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktPdPeer::KET_AKT, $ketAkt, $comparison);
    }

    /**
     * Filter the query on the a_komunal column
     *
     * Example usage:
     * <code>
     * $query->filterByAKomunal(1234); // WHERE a_komunal = 1234
     * $query->filterByAKomunal(array(12, 34)); // WHERE a_komunal IN (12, 34)
     * $query->filterByAKomunal(array('min' => 12)); // WHERE a_komunal >= 12
     * $query->filterByAKomunal(array('max' => 12)); // WHERE a_komunal <= 12
     * </code>
     *
     * @param     mixed $aKomunal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByAKomunal($aKomunal = null, $comparison = null)
    {
        if (is_array($aKomunal)) {
            $useMinMax = false;
            if (isset($aKomunal['min'])) {
                $this->addUsingAlias(AktPdPeer::A_KOMUNAL, $aKomunal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKomunal['max'])) {
                $this->addUsingAlias(AktPdPeer::A_KOMUNAL, $aKomunal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktPdPeer::A_KOMUNAL, $aKomunal, $comparison);
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
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AktPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AktPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AktPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AktPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AktPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AktPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AktPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AktPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AktPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AktPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AktPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Mou object
     *
     * @param   Mou|PropelObjectCollection $mou The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMou($mou, $comparison = null)
    {
        if ($mou instanceof Mou) {
            return $this
                ->addUsingAlias(AktPdPeer::MOU_ID, $mou->getMouId(), $comparison);
        } elseif ($mou instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AktPdPeer::MOU_ID, $mou->toKeyValue('PrimaryKey', 'MouId'), $comparison);
        } else {
            throw new PropelException('filterByMou() only accepts arguments of type Mou or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mou relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function joinMou($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mou');

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
            $this->addJoinObject($join, 'Mou');
        }

        return $this;
    }

    /**
     * Use the Mou relation Mou object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MouQuery A secondary query class using the current class as primary query
     */
    public function useMouQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMou($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mou', '\DataDikdas\Model\MouQuery');
    }

    /**
     * Filter the query by a related JenisAktPd object
     *
     * @param   JenisAktPd|PropelObjectCollection $jenisAktPd The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisAktPd($jenisAktPd, $comparison = null)
    {
        if ($jenisAktPd instanceof JenisAktPd) {
            return $this
                ->addUsingAlias(AktPdPeer::ID_JNS_AKT_PD, $jenisAktPd->getIdJnsAktPd(), $comparison);
        } elseif ($jenisAktPd instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AktPdPeer::ID_JNS_AKT_PD, $jenisAktPd->toKeyValue('PrimaryKey', 'IdJnsAktPd'), $comparison);
        } else {
            throw new PropelException('filterByJenisAktPd() only accepts arguments of type JenisAktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisAktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function joinJenisAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisAktPd');

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
            $this->addJoinObject($join, 'JenisAktPd');
        }

        return $this;
    }

    /**
     * Use the JenisAktPd relation JenisAktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisAktPdQuery A secondary query class using the current class as primary query
     */
    public function useJenisAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisAktPd', '\DataDikdas\Model\JenisAktPdQuery');
    }

    /**
     * Filter the query by a related AnggotaAktPd object
     *
     * @param   AnggotaAktPd|PropelObjectCollection $anggotaAktPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaAktPd($anggotaAktPd, $comparison = null)
    {
        if ($anggotaAktPd instanceof AnggotaAktPd) {
            return $this
                ->addUsingAlias(AktPdPeer::ID_AKT_PD, $anggotaAktPd->getIdAktPd(), $comparison);
        } elseif ($anggotaAktPd instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaAktPdQuery()
                ->filterByPrimaryKeys($anggotaAktPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaAktPd() only accepts arguments of type AnggotaAktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaAktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function joinAnggotaAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaAktPd');

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
            $this->addJoinObject($join, 'AnggotaAktPd');
        }

        return $this;
    }

    /**
     * Use the AnggotaAktPd relation AnggotaAktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaAktPdQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaAktPd', '\DataDikdas\Model\AnggotaAktPdQuery');
    }

    /**
     * Filter the query by a related BimbingPd object
     *
     * @param   BimbingPd|PropelObjectCollection $bimbingPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBimbingPd($bimbingPd, $comparison = null)
    {
        if ($bimbingPd instanceof BimbingPd) {
            return $this
                ->addUsingAlias(AktPdPeer::ID_AKT_PD, $bimbingPd->getIdAktPd(), $comparison);
        } elseif ($bimbingPd instanceof PropelObjectCollection) {
            return $this
                ->useBimbingPdQuery()
                ->filterByPrimaryKeys($bimbingPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBimbingPd() only accepts arguments of type BimbingPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BimbingPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function joinBimbingPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BimbingPd');

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
            $this->addJoinObject($join, 'BimbingPd');
        }

        return $this;
    }

    /**
     * Use the BimbingPd relation BimbingPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BimbingPdQuery A secondary query class using the current class as primary query
     */
    public function useBimbingPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBimbingPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BimbingPd', '\DataDikdas\Model\BimbingPdQuery');
    }

    /**
     * Filter the query by a related VldAktPd object
     *
     * @param   VldAktPd|PropelObjectCollection $vldAktPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAktPd($vldAktPd, $comparison = null)
    {
        if ($vldAktPd instanceof VldAktPd) {
            return $this
                ->addUsingAlias(AktPdPeer::ID_AKT_PD, $vldAktPd->getIdAktPd(), $comparison);
        } elseif ($vldAktPd instanceof PropelObjectCollection) {
            return $this
                ->useVldAktPdQuery()
                ->filterByPrimaryKeys($vldAktPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldAktPd() only accepts arguments of type VldAktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldAktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function joinVldAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldAktPd');

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
            $this->addJoinObject($join, 'VldAktPd');
        }

        return $this;
    }

    /**
     * Use the VldAktPd relation VldAktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldAktPdQuery A secondary query class using the current class as primary query
     */
    public function useVldAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldAktPd', '\DataDikdas\Model\VldAktPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AktPd $aktPd Object to remove from the list of results
     *
     * @return AktPdQuery The current query, for fluid interface
     */
    public function prune($aktPd = null)
    {
        if ($aktPd) {
            $this->addUsingAlias(AktPdPeer::ID_AKT_PD, $aktPd->getIdAktPd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
