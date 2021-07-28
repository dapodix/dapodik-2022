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
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\KompetensiPeer;
use DataDikdas\Model\KompetensiQuery;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\TingkatPendidikan;

/**
 * Base class that represents a query for the 'ref.kompetensi' table.
 *
 * 
 *
 * @method KompetensiQuery orderByIdKomp($order = Criteria::ASC) Order by the id_komp column
 * @method KompetensiQuery orderByDesk($order = Criteria::ASC) Order by the desk column
 * @method KompetensiQuery orderByNmr($order = Criteria::ASC) Order by the nmr column
 * @method KompetensiQuery orderByKelompok($order = Criteria::ASC) Order by the kelompok column
 * @method KompetensiQuery orderByVersi($order = Criteria::ASC) Order by the versi column
 * @method KompetensiQuery orderByIdIntiDasar($order = Criteria::ASC) Order by the id_inti_dasar column
 * @method KompetensiQuery orderByLevelKomp($order = Criteria::ASC) Order by the level_komp column
 * @method KompetensiQuery orderByTingkatPendidikanId($order = Criteria::ASC) Order by the tingkat_pendidikan_id column
 * @method KompetensiQuery orderByKurikulumId($order = Criteria::ASC) Order by the kurikulum_id column
 * @method KompetensiQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method KompetensiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KompetensiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KompetensiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method KompetensiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method KompetensiQuery groupByIdKomp() Group by the id_komp column
 * @method KompetensiQuery groupByDesk() Group by the desk column
 * @method KompetensiQuery groupByNmr() Group by the nmr column
 * @method KompetensiQuery groupByKelompok() Group by the kelompok column
 * @method KompetensiQuery groupByVersi() Group by the versi column
 * @method KompetensiQuery groupByIdIntiDasar() Group by the id_inti_dasar column
 * @method KompetensiQuery groupByLevelKomp() Group by the level_komp column
 * @method KompetensiQuery groupByTingkatPendidikanId() Group by the tingkat_pendidikan_id column
 * @method KompetensiQuery groupByKurikulumId() Group by the kurikulum_id column
 * @method KompetensiQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method KompetensiQuery groupByCreateDate() Group by the create_date column
 * @method KompetensiQuery groupByLastUpdate() Group by the last_update column
 * @method KompetensiQuery groupByExpiredDate() Group by the expired_date column
 * @method KompetensiQuery groupByLastSync() Group by the last_sync column
 *
 * @method KompetensiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KompetensiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KompetensiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KompetensiQuery leftJoinKompetensiRelatedByIdIntiDasar($relationAlias = null) Adds a LEFT JOIN clause to the query using the KompetensiRelatedByIdIntiDasar relation
 * @method KompetensiQuery rightJoinKompetensiRelatedByIdIntiDasar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KompetensiRelatedByIdIntiDasar relation
 * @method KompetensiQuery innerJoinKompetensiRelatedByIdIntiDasar($relationAlias = null) Adds a INNER JOIN clause to the query using the KompetensiRelatedByIdIntiDasar relation
 *
 * @method KompetensiQuery leftJoinKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kurikulum relation
 * @method KompetensiQuery rightJoinKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kurikulum relation
 * @method KompetensiQuery innerJoinKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the Kurikulum relation
 *
 * @method KompetensiQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method KompetensiQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method KompetensiQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method KompetensiQuery leftJoinTingkatPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPendidikan relation
 * @method KompetensiQuery rightJoinTingkatPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPendidikan relation
 * @method KompetensiQuery innerJoinTingkatPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPendidikan relation
 *
 * @method KompetensiQuery leftJoinKompetensiRelatedByIdKomp($relationAlias = null) Adds a LEFT JOIN clause to the query using the KompetensiRelatedByIdKomp relation
 * @method KompetensiQuery rightJoinKompetensiRelatedByIdKomp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KompetensiRelatedByIdKomp relation
 * @method KompetensiQuery innerJoinKompetensiRelatedByIdKomp($relationAlias = null) Adds a INNER JOIN clause to the query using the KompetensiRelatedByIdKomp relation
 *
 * @method Kompetensi findOne(PropelPDO $con = null) Return the first Kompetensi matching the query
 * @method Kompetensi findOneOrCreate(PropelPDO $con = null) Return the first Kompetensi matching the query, or a new Kompetensi object populated from the query conditions when no match is found
 *
 * @method Kompetensi findOneByDesk(string $desk) Return the first Kompetensi filtered by the desk column
 * @method Kompetensi findOneByNmr(string $nmr) Return the first Kompetensi filtered by the nmr column
 * @method Kompetensi findOneByKelompok(string $kelompok) Return the first Kompetensi filtered by the kelompok column
 * @method Kompetensi findOneByVersi(int $versi) Return the first Kompetensi filtered by the versi column
 * @method Kompetensi findOneByIdIntiDasar(string $id_inti_dasar) Return the first Kompetensi filtered by the id_inti_dasar column
 * @method Kompetensi findOneByLevelKomp(string $level_komp) Return the first Kompetensi filtered by the level_komp column
 * @method Kompetensi findOneByTingkatPendidikanId(string $tingkat_pendidikan_id) Return the first Kompetensi filtered by the tingkat_pendidikan_id column
 * @method Kompetensi findOneByKurikulumId(int $kurikulum_id) Return the first Kompetensi filtered by the kurikulum_id column
 * @method Kompetensi findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first Kompetensi filtered by the mata_pelajaran_id column
 * @method Kompetensi findOneByCreateDate(string $create_date) Return the first Kompetensi filtered by the create_date column
 * @method Kompetensi findOneByLastUpdate(string $last_update) Return the first Kompetensi filtered by the last_update column
 * @method Kompetensi findOneByExpiredDate(string $expired_date) Return the first Kompetensi filtered by the expired_date column
 * @method Kompetensi findOneByLastSync(string $last_sync) Return the first Kompetensi filtered by the last_sync column
 *
 * @method array findByIdKomp(string $id_komp) Return Kompetensi objects filtered by the id_komp column
 * @method array findByDesk(string $desk) Return Kompetensi objects filtered by the desk column
 * @method array findByNmr(string $nmr) Return Kompetensi objects filtered by the nmr column
 * @method array findByKelompok(string $kelompok) Return Kompetensi objects filtered by the kelompok column
 * @method array findByVersi(int $versi) Return Kompetensi objects filtered by the versi column
 * @method array findByIdIntiDasar(string $id_inti_dasar) Return Kompetensi objects filtered by the id_inti_dasar column
 * @method array findByLevelKomp(string $level_komp) Return Kompetensi objects filtered by the level_komp column
 * @method array findByTingkatPendidikanId(string $tingkat_pendidikan_id) Return Kompetensi objects filtered by the tingkat_pendidikan_id column
 * @method array findByKurikulumId(int $kurikulum_id) Return Kompetensi objects filtered by the kurikulum_id column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return Kompetensi objects filtered by the mata_pelajaran_id column
 * @method array findByCreateDate(string $create_date) Return Kompetensi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Kompetensi objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Kompetensi objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Kompetensi objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKompetensiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKompetensiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Kompetensi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KompetensiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KompetensiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KompetensiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KompetensiQuery) {
            return $criteria;
        }
        $query = new KompetensiQuery();
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
     * @return   Kompetensi|Kompetensi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KompetensiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Kompetensi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdKomp($key, $con = null)
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
     * @return                 Kompetensi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_komp", "desk", "nmr", "kelompok", "versi", "id_inti_dasar", "level_komp", "tingkat_pendidikan_id", "kurikulum_id", "mata_pelajaran_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."kompetensi" WHERE "id_komp" = :p0';
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
            $obj = new Kompetensi();
            $obj->hydrate($row);
            KompetensiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Kompetensi|Kompetensi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Kompetensi[]|mixed the list of results, formatted by the current formatter
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
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KompetensiPeer::ID_KOMP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KompetensiPeer::ID_KOMP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_komp column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKomp('fooValue');   // WHERE id_komp = 'fooValue'
     * $query->filterByIdKomp('%fooValue%'); // WHERE id_komp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idKomp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByIdKomp($idKomp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idKomp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idKomp)) {
                $idKomp = str_replace('*', '%', $idKomp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::ID_KOMP, $idKomp, $comparison);
    }

    /**
     * Filter the query on the desk column
     *
     * Example usage:
     * <code>
     * $query->filterByDesk('fooValue');   // WHERE desk = 'fooValue'
     * $query->filterByDesk('%fooValue%'); // WHERE desk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByDesk($desk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $desk)) {
                $desk = str_replace('*', '%', $desk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::DESK, $desk, $comparison);
    }

    /**
     * Filter the query on the nmr column
     *
     * Example usage:
     * <code>
     * $query->filterByNmr('fooValue');   // WHERE nmr = 'fooValue'
     * $query->filterByNmr('%fooValue%'); // WHERE nmr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByNmr($nmr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmr)) {
                $nmr = str_replace('*', '%', $nmr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::NMR, $nmr, $comparison);
    }

    /**
     * Filter the query on the kelompok column
     *
     * Example usage:
     * <code>
     * $query->filterByKelompok('fooValue');   // WHERE kelompok = 'fooValue'
     * $query->filterByKelompok('%fooValue%'); // WHERE kelompok LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kelompok The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByKelompok($kelompok = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kelompok)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kelompok)) {
                $kelompok = str_replace('*', '%', $kelompok);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::KELOMPOK, $kelompok, $comparison);
    }

    /**
     * Filter the query on the versi column
     *
     * Example usage:
     * <code>
     * $query->filterByVersi(1234); // WHERE versi = 1234
     * $query->filterByVersi(array(12, 34)); // WHERE versi IN (12, 34)
     * $query->filterByVersi(array('min' => 12)); // WHERE versi >= 12
     * $query->filterByVersi(array('max' => 12)); // WHERE versi <= 12
     * </code>
     *
     * @param     mixed $versi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByVersi($versi = null, $comparison = null)
    {
        if (is_array($versi)) {
            $useMinMax = false;
            if (isset($versi['min'])) {
                $this->addUsingAlias(KompetensiPeer::VERSI, $versi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versi['max'])) {
                $this->addUsingAlias(KompetensiPeer::VERSI, $versi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::VERSI, $versi, $comparison);
    }

    /**
     * Filter the query on the id_inti_dasar column
     *
     * Example usage:
     * <code>
     * $query->filterByIdIntiDasar('fooValue');   // WHERE id_inti_dasar = 'fooValue'
     * $query->filterByIdIntiDasar('%fooValue%'); // WHERE id_inti_dasar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idIntiDasar The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByIdIntiDasar($idIntiDasar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idIntiDasar)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idIntiDasar)) {
                $idIntiDasar = str_replace('*', '%', $idIntiDasar);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::ID_INTI_DASAR, $idIntiDasar, $comparison);
    }

    /**
     * Filter the query on the level_komp column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelKomp(1234); // WHERE level_komp = 1234
     * $query->filterByLevelKomp(array(12, 34)); // WHERE level_komp IN (12, 34)
     * $query->filterByLevelKomp(array('min' => 12)); // WHERE level_komp >= 12
     * $query->filterByLevelKomp(array('max' => 12)); // WHERE level_komp <= 12
     * </code>
     *
     * @param     mixed $levelKomp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByLevelKomp($levelKomp = null, $comparison = null)
    {
        if (is_array($levelKomp)) {
            $useMinMax = false;
            if (isset($levelKomp['min'])) {
                $this->addUsingAlias(KompetensiPeer::LEVEL_KOMP, $levelKomp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($levelKomp['max'])) {
                $this->addUsingAlias(KompetensiPeer::LEVEL_KOMP, $levelKomp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::LEVEL_KOMP, $levelKomp, $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByTingkatPendidikanId($tingkatPendidikanId = null, $comparison = null)
    {
        if (is_array($tingkatPendidikanId)) {
            $useMinMax = false;
            if (isset($tingkatPendidikanId['min'])) {
                $this->addUsingAlias(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPendidikanId['max'])) {
                $this->addUsingAlias(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId, $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByKurikulumId($kurikulumId = null, $comparison = null)
    {
        if (is_array($kurikulumId)) {
            $useMinMax = false;
            if (isset($kurikulumId['min'])) {
                $this->addUsingAlias(KompetensiPeer::KURIKULUM_ID, $kurikulumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kurikulumId['max'])) {
                $this->addUsingAlias(KompetensiPeer::KURIKULUM_ID, $kurikulumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::KURIKULUM_ID, $kurikulumId, $comparison);
    }

    /**
     * Filter the query on the mata_pelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMataPelajaranId(1234); // WHERE mata_pelajaran_id = 1234
     * $query->filterByMataPelajaranId(array(12, 34)); // WHERE mata_pelajaran_id IN (12, 34)
     * $query->filterByMataPelajaranId(array('min' => 12)); // WHERE mata_pelajaran_id >= 12
     * $query->filterByMataPelajaranId(array('max' => 12)); // WHERE mata_pelajaran_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaran()
     *
     * @param     mixed $mataPelajaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(KompetensiPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(KompetensiPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KompetensiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KompetensiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KompetensiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KompetensiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(KompetensiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(KompetensiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KompetensiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KompetensiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KompetensiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Kompetensi object
     *
     * @param   Kompetensi|PropelObjectCollection $kompetensi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KompetensiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKompetensiRelatedByIdIntiDasar($kompetensi, $comparison = null)
    {
        if ($kompetensi instanceof Kompetensi) {
            return $this
                ->addUsingAlias(KompetensiPeer::ID_INTI_DASAR, $kompetensi->getIdKomp(), $comparison);
        } elseif ($kompetensi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KompetensiPeer::ID_INTI_DASAR, $kompetensi->toKeyValue('PrimaryKey', 'IdKomp'), $comparison);
        } else {
            throw new PropelException('filterByKompetensiRelatedByIdIntiDasar() only accepts arguments of type Kompetensi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KompetensiRelatedByIdIntiDasar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function joinKompetensiRelatedByIdIntiDasar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KompetensiRelatedByIdIntiDasar');

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
            $this->addJoinObject($join, 'KompetensiRelatedByIdIntiDasar');
        }

        return $this;
    }

    /**
     * Use the KompetensiRelatedByIdIntiDasar relation Kompetensi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KompetensiQuery A secondary query class using the current class as primary query
     */
    public function useKompetensiRelatedByIdIntiDasarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKompetensiRelatedByIdIntiDasar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KompetensiRelatedByIdIntiDasar', '\DataDikdas\Model\KompetensiQuery');
    }

    /**
     * Filter the query by a related Kurikulum object
     *
     * @param   Kurikulum|PropelObjectCollection $kurikulum The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KompetensiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKurikulum($kurikulum, $comparison = null)
    {
        if ($kurikulum instanceof Kurikulum) {
            return $this
                ->addUsingAlias(KompetensiPeer::KURIKULUM_ID, $kurikulum->getKurikulumId(), $comparison);
        } elseif ($kurikulum instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KompetensiPeer::KURIKULUM_ID, $kurikulum->toKeyValue('PrimaryKey', 'KurikulumId'), $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
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
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KompetensiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(KompetensiPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KompetensiPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaran() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function joinMataPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaran');

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
            $this->addJoinObject($join, 'MataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MataPelajaran relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaran', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related TingkatPendidikan object
     *
     * @param   TingkatPendidikan|PropelObjectCollection $tingkatPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KompetensiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPendidikan($tingkatPendidikan, $comparison = null)
    {
        if ($tingkatPendidikan instanceof TingkatPendidikan) {
            return $this
                ->addUsingAlias(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->getTingkatPendidikanId(), $comparison);
        } elseif ($tingkatPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->toKeyValue('PrimaryKey', 'TingkatPendidikanId'), $comparison);
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
     * @return KompetensiQuery The current query, for fluid interface
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
     * Filter the query by a related Kompetensi object
     *
     * @param   Kompetensi|PropelObjectCollection $kompetensi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KompetensiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKompetensiRelatedByIdKomp($kompetensi, $comparison = null)
    {
        if ($kompetensi instanceof Kompetensi) {
            return $this
                ->addUsingAlias(KompetensiPeer::ID_KOMP, $kompetensi->getIdIntiDasar(), $comparison);
        } elseif ($kompetensi instanceof PropelObjectCollection) {
            return $this
                ->useKompetensiRelatedByIdKompQuery()
                ->filterByPrimaryKeys($kompetensi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKompetensiRelatedByIdKomp() only accepts arguments of type Kompetensi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KompetensiRelatedByIdKomp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function joinKompetensiRelatedByIdKomp($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KompetensiRelatedByIdKomp');

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
            $this->addJoinObject($join, 'KompetensiRelatedByIdKomp');
        }

        return $this;
    }

    /**
     * Use the KompetensiRelatedByIdKomp relation Kompetensi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KompetensiQuery A secondary query class using the current class as primary query
     */
    public function useKompetensiRelatedByIdKompQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKompetensiRelatedByIdKomp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KompetensiRelatedByIdKomp', '\DataDikdas\Model\KompetensiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Kompetensi $kompetensi Object to remove from the list of results
     *
     * @return KompetensiQuery The current query, for fluid interface
     */
    public function prune($kompetensi = null)
    {
        if ($kompetensi) {
            $this->addUsingAlias(KompetensiPeer::ID_KOMP, $kompetensi->getIdKomp(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
