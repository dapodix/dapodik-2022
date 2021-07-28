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
use DataDikdas\Model\AnggotaAktPd;
use DataDikdas\Model\AnggotaAktPdPeer;
use DataDikdas\Model\AnggotaAktPdQuery;
use DataDikdas\Model\RegistrasiPesertaDidik;

/**
 * Base class that represents a query for the 'anggota_akt_pd' table.
 *
 * 
 *
 * @method AnggotaAktPdQuery orderByIdAngAktPd($order = Criteria::ASC) Order by the id_ang_akt_pd column
 * @method AnggotaAktPdQuery orderByIdAktPd($order = Criteria::ASC) Order by the id_akt_pd column
 * @method AnggotaAktPdQuery orderByRegistrasiId($order = Criteria::ASC) Order by the registrasi_id column
 * @method AnggotaAktPdQuery orderByNmPd($order = Criteria::ASC) Order by the nm_pd column
 * @method AnggotaAktPdQuery orderByNipd($order = Criteria::ASC) Order by the nipd column
 * @method AnggotaAktPdQuery orderByJnsPeranPd($order = Criteria::ASC) Order by the jns_peran_pd column
 * @method AnggotaAktPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AnggotaAktPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AnggotaAktPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AnggotaAktPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AnggotaAktPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AnggotaAktPdQuery groupByIdAngAktPd() Group by the id_ang_akt_pd column
 * @method AnggotaAktPdQuery groupByIdAktPd() Group by the id_akt_pd column
 * @method AnggotaAktPdQuery groupByRegistrasiId() Group by the registrasi_id column
 * @method AnggotaAktPdQuery groupByNmPd() Group by the nm_pd column
 * @method AnggotaAktPdQuery groupByNipd() Group by the nipd column
 * @method AnggotaAktPdQuery groupByJnsPeranPd() Group by the jns_peran_pd column
 * @method AnggotaAktPdQuery groupByCreateDate() Group by the create_date column
 * @method AnggotaAktPdQuery groupByLastUpdate() Group by the last_update column
 * @method AnggotaAktPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method AnggotaAktPdQuery groupByLastSync() Group by the last_sync column
 * @method AnggotaAktPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AnggotaAktPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AnggotaAktPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AnggotaAktPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AnggotaAktPdQuery leftJoinAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the AktPd relation
 * @method AnggotaAktPdQuery rightJoinAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AktPd relation
 * @method AnggotaAktPdQuery innerJoinAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the AktPd relation
 *
 * @method AnggotaAktPdQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method AnggotaAktPdQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method AnggotaAktPdQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method AnggotaAktPd findOne(PropelPDO $con = null) Return the first AnggotaAktPd matching the query
 * @method AnggotaAktPd findOneOrCreate(PropelPDO $con = null) Return the first AnggotaAktPd matching the query, or a new AnggotaAktPd object populated from the query conditions when no match is found
 *
 * @method AnggotaAktPd findOneByIdAktPd(string $id_akt_pd) Return the first AnggotaAktPd filtered by the id_akt_pd column
 * @method AnggotaAktPd findOneByRegistrasiId(string $registrasi_id) Return the first AnggotaAktPd filtered by the registrasi_id column
 * @method AnggotaAktPd findOneByNmPd(string $nm_pd) Return the first AnggotaAktPd filtered by the nm_pd column
 * @method AnggotaAktPd findOneByNipd(string $nipd) Return the first AnggotaAktPd filtered by the nipd column
 * @method AnggotaAktPd findOneByJnsPeranPd(string $jns_peran_pd) Return the first AnggotaAktPd filtered by the jns_peran_pd column
 * @method AnggotaAktPd findOneByCreateDate(string $create_date) Return the first AnggotaAktPd filtered by the create_date column
 * @method AnggotaAktPd findOneByLastUpdate(string $last_update) Return the first AnggotaAktPd filtered by the last_update column
 * @method AnggotaAktPd findOneBySoftDelete(string $soft_delete) Return the first AnggotaAktPd filtered by the soft_delete column
 * @method AnggotaAktPd findOneByLastSync(string $last_sync) Return the first AnggotaAktPd filtered by the last_sync column
 * @method AnggotaAktPd findOneByUpdaterId(string $updater_id) Return the first AnggotaAktPd filtered by the updater_id column
 *
 * @method array findByIdAngAktPd(string $id_ang_akt_pd) Return AnggotaAktPd objects filtered by the id_ang_akt_pd column
 * @method array findByIdAktPd(string $id_akt_pd) Return AnggotaAktPd objects filtered by the id_akt_pd column
 * @method array findByRegistrasiId(string $registrasi_id) Return AnggotaAktPd objects filtered by the registrasi_id column
 * @method array findByNmPd(string $nm_pd) Return AnggotaAktPd objects filtered by the nm_pd column
 * @method array findByNipd(string $nipd) Return AnggotaAktPd objects filtered by the nipd column
 * @method array findByJnsPeranPd(string $jns_peran_pd) Return AnggotaAktPd objects filtered by the jns_peran_pd column
 * @method array findByCreateDate(string $create_date) Return AnggotaAktPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AnggotaAktPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AnggotaAktPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AnggotaAktPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AnggotaAktPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnggotaAktPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAnggotaAktPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AnggotaAktPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AnggotaAktPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AnggotaAktPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AnggotaAktPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AnggotaAktPdQuery) {
            return $criteria;
        }
        $query = new AnggotaAktPdQuery();
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
     * @return   AnggotaAktPd|AnggotaAktPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AnggotaAktPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AnggotaAktPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAngAktPd($key, $con = null)
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
     * @return                 AnggotaAktPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_ang_akt_pd", "id_akt_pd", "registrasi_id", "nm_pd", "nipd", "jns_peran_pd", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "anggota_akt_pd" WHERE "id_ang_akt_pd" = :p0';
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
            $obj = new AnggotaAktPd();
            $obj->hydrate($row);
            AnggotaAktPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AnggotaAktPd|AnggotaAktPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AnggotaAktPd[]|mixed the list of results, formatted by the current formatter
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
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnggotaAktPdPeer::ID_ANG_AKT_PD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnggotaAktPdPeer::ID_ANG_AKT_PD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_ang_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAngAktPd('fooValue');   // WHERE id_ang_akt_pd = 'fooValue'
     * $query->filterByIdAngAktPd('%fooValue%'); // WHERE id_ang_akt_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAngAktPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByIdAngAktPd($idAngAktPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAngAktPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAngAktPd)) {
                $idAngAktPd = str_replace('*', '%', $idAngAktPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::ID_ANG_AKT_PD, $idAngAktPd, $comparison);
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
     * @return AnggotaAktPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaAktPdPeer::ID_AKT_PD, $idAktPd, $comparison);
    }

    /**
     * Filter the query on the registrasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistrasiId('fooValue');   // WHERE registrasi_id = 'fooValue'
     * $query->filterByRegistrasiId('%fooValue%'); // WHERE registrasi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $registrasiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByRegistrasiId($registrasiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($registrasiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $registrasiId)) {
                $registrasiId = str_replace('*', '%', $registrasiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::REGISTRASI_ID, $registrasiId, $comparison);
    }

    /**
     * Filter the query on the nm_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByNmPd('fooValue');   // WHERE nm_pd = 'fooValue'
     * $query->filterByNmPd('%fooValue%'); // WHERE nm_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByNmPd($nmPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmPd)) {
                $nmPd = str_replace('*', '%', $nmPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::NM_PD, $nmPd, $comparison);
    }

    /**
     * Filter the query on the nipd column
     *
     * Example usage:
     * <code>
     * $query->filterByNipd('fooValue');   // WHERE nipd = 'fooValue'
     * $query->filterByNipd('%fooValue%'); // WHERE nipd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nipd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByNipd($nipd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nipd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nipd)) {
                $nipd = str_replace('*', '%', $nipd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::NIPD, $nipd, $comparison);
    }

    /**
     * Filter the query on the jns_peran_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByJnsPeranPd('fooValue');   // WHERE jns_peran_pd = 'fooValue'
     * $query->filterByJnsPeranPd('%fooValue%'); // WHERE jns_peran_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jnsPeranPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByJnsPeranPd($jnsPeranPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jnsPeranPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jnsPeranPd)) {
                $jnsPeranPd = str_replace('*', '%', $jnsPeranPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::JNS_PERAN_PD, $jnsPeranPd, $comparison);
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
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AnggotaAktPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaAktPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AnggotaAktPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaAktPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related AktPd object
     *
     * @param   AktPd|PropelObjectCollection $aktPd The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaAktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAktPd($aktPd, $comparison = null)
    {
        if ($aktPd instanceof AktPd) {
            return $this
                ->addUsingAlias(AnggotaAktPdPeer::ID_AKT_PD, $aktPd->getIdAktPd(), $comparison);
        } elseif ($aktPd instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaAktPdPeer::ID_AKT_PD, $aktPd->toKeyValue('PrimaryKey', 'IdAktPd'), $comparison);
        } else {
            throw new PropelException('filterByAktPd() only accepts arguments of type AktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function joinAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AktPd');

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
            $this->addJoinObject($join, 'AktPd');
        }

        return $this;
    }

    /**
     * Use the AktPd relation AktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AktPdQuery A secondary query class using the current class as primary query
     */
    public function useAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AktPd', '\DataDikdas\Model\AktPdQuery');
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaAktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(AnggotaAktPdPeer::REGISTRASI_ID, $registrasiPesertaDidik->getRegistrasiId(), $comparison);
        } elseif ($registrasiPesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaAktPdPeer::REGISTRASI_ID, $registrasiPesertaDidik->toKeyValue('PrimaryKey', 'RegistrasiId'), $comparison);
        } else {
            throw new PropelException('filterByRegistrasiPesertaDidik() only accepts arguments of type RegistrasiPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RegistrasiPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RegistrasiPesertaDidik');

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
            $this->addJoinObject($join, 'RegistrasiPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the RegistrasiPesertaDidik relation RegistrasiPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RegistrasiPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AnggotaAktPd $anggotaAktPd Object to remove from the list of results
     *
     * @return AnggotaAktPdQuery The current query, for fluid interface
     */
    public function prune($anggotaAktPd = null)
    {
        if ($anggotaAktPd) {
            $this->addUsingAlias(AnggotaAktPdPeer::ID_ANG_AKT_PD, $anggotaAktPd->getIdAngAktPd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
