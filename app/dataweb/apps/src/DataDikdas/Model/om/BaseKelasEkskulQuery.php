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
use DataDikdas\Model\KelasEkskul;
use DataDikdas\Model\KelasEkskulPeer;
use DataDikdas\Model\KelasEkskulQuery;
use DataDikdas\Model\RombonganBelajar;

/**
 * Base class that represents a query for the 'kelas_ekskul' table.
 *
 * 
 *
 * @method KelasEkskulQuery orderByIdKelasEkskul($order = Criteria::ASC) Order by the id_kelas_ekskul column
 * @method KelasEkskulQuery orderByRombonganBelajarId($order = Criteria::ASC) Order by the rombongan_belajar_id column
 * @method KelasEkskulQuery orderByIdEkskul($order = Criteria::ASC) Order by the id_ekskul column
 * @method KelasEkskulQuery orderByNmEkskul($order = Criteria::ASC) Order by the nm_ekskul column
 * @method KelasEkskulQuery orderBySkEkskul($order = Criteria::ASC) Order by the sk_ekskul column
 * @method KelasEkskulQuery orderByTglSkEkskul($order = Criteria::ASC) Order by the tgl_sk_ekskul column
 * @method KelasEkskulQuery orderByJamKegiatanPerMinggu($order = Criteria::ASC) Order by the jam_kegiatan_per_minggu column
 * @method KelasEkskulQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KelasEkskulQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KelasEkskulQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method KelasEkskulQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method KelasEkskulQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method KelasEkskulQuery groupByIdKelasEkskul() Group by the id_kelas_ekskul column
 * @method KelasEkskulQuery groupByRombonganBelajarId() Group by the rombongan_belajar_id column
 * @method KelasEkskulQuery groupByIdEkskul() Group by the id_ekskul column
 * @method KelasEkskulQuery groupByNmEkskul() Group by the nm_ekskul column
 * @method KelasEkskulQuery groupBySkEkskul() Group by the sk_ekskul column
 * @method KelasEkskulQuery groupByTglSkEkskul() Group by the tgl_sk_ekskul column
 * @method KelasEkskulQuery groupByJamKegiatanPerMinggu() Group by the jam_kegiatan_per_minggu column
 * @method KelasEkskulQuery groupByCreateDate() Group by the create_date column
 * @method KelasEkskulQuery groupByLastUpdate() Group by the last_update column
 * @method KelasEkskulQuery groupBySoftDelete() Group by the soft_delete column
 * @method KelasEkskulQuery groupByLastSync() Group by the last_sync column
 * @method KelasEkskulQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method KelasEkskulQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KelasEkskulQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KelasEkskulQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KelasEkskulQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method KelasEkskulQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method KelasEkskulQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method KelasEkskulQuery leftJoinEkstraKurikuler($relationAlias = null) Adds a LEFT JOIN clause to the query using the EkstraKurikuler relation
 * @method KelasEkskulQuery rightJoinEkstraKurikuler($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EkstraKurikuler relation
 * @method KelasEkskulQuery innerJoinEkstraKurikuler($relationAlias = null) Adds a INNER JOIN clause to the query using the EkstraKurikuler relation
 *
 * @method KelasEkskul findOne(PropelPDO $con = null) Return the first KelasEkskul matching the query
 * @method KelasEkskul findOneOrCreate(PropelPDO $con = null) Return the first KelasEkskul matching the query, or a new KelasEkskul object populated from the query conditions when no match is found
 *
 * @method KelasEkskul findOneByRombonganBelajarId(string $rombongan_belajar_id) Return the first KelasEkskul filtered by the rombongan_belajar_id column
 * @method KelasEkskul findOneByIdEkskul(int $id_ekskul) Return the first KelasEkskul filtered by the id_ekskul column
 * @method KelasEkskul findOneByNmEkskul(string $nm_ekskul) Return the first KelasEkskul filtered by the nm_ekskul column
 * @method KelasEkskul findOneBySkEkskul(string $sk_ekskul) Return the first KelasEkskul filtered by the sk_ekskul column
 * @method KelasEkskul findOneByTglSkEkskul(string $tgl_sk_ekskul) Return the first KelasEkskul filtered by the tgl_sk_ekskul column
 * @method KelasEkskul findOneByJamKegiatanPerMinggu(string $jam_kegiatan_per_minggu) Return the first KelasEkskul filtered by the jam_kegiatan_per_minggu column
 * @method KelasEkskul findOneByCreateDate(string $create_date) Return the first KelasEkskul filtered by the create_date column
 * @method KelasEkskul findOneByLastUpdate(string $last_update) Return the first KelasEkskul filtered by the last_update column
 * @method KelasEkskul findOneBySoftDelete(string $soft_delete) Return the first KelasEkskul filtered by the soft_delete column
 * @method KelasEkskul findOneByLastSync(string $last_sync) Return the first KelasEkskul filtered by the last_sync column
 * @method KelasEkskul findOneByUpdaterId(string $updater_id) Return the first KelasEkskul filtered by the updater_id column
 *
 * @method array findByIdKelasEkskul(string $id_kelas_ekskul) Return KelasEkskul objects filtered by the id_kelas_ekskul column
 * @method array findByRombonganBelajarId(string $rombongan_belajar_id) Return KelasEkskul objects filtered by the rombongan_belajar_id column
 * @method array findByIdEkskul(int $id_ekskul) Return KelasEkskul objects filtered by the id_ekskul column
 * @method array findByNmEkskul(string $nm_ekskul) Return KelasEkskul objects filtered by the nm_ekskul column
 * @method array findBySkEkskul(string $sk_ekskul) Return KelasEkskul objects filtered by the sk_ekskul column
 * @method array findByTglSkEkskul(string $tgl_sk_ekskul) Return KelasEkskul objects filtered by the tgl_sk_ekskul column
 * @method array findByJamKegiatanPerMinggu(string $jam_kegiatan_per_minggu) Return KelasEkskul objects filtered by the jam_kegiatan_per_minggu column
 * @method array findByCreateDate(string $create_date) Return KelasEkskul objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KelasEkskul objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return KelasEkskul objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return KelasEkskul objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return KelasEkskul objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKelasEkskulQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKelasEkskulQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KelasEkskul', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KelasEkskulQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KelasEkskulQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KelasEkskulQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KelasEkskulQuery) {
            return $criteria;
        }
        $query = new KelasEkskulQuery();
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
     * @return   KelasEkskul|KelasEkskul[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KelasEkskulPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KelasEkskul A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdKelasEkskul($key, $con = null)
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
     * @return                 KelasEkskul A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_kelas_ekskul", "rombongan_belajar_id", "id_ekskul", "nm_ekskul", "sk_ekskul", "tgl_sk_ekskul", "jam_kegiatan_per_minggu", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "kelas_ekskul" WHERE "id_kelas_ekskul" = :p0';
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
            $obj = new KelasEkskul();
            $obj->hydrate($row);
            KelasEkskulPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KelasEkskul|KelasEkskul[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KelasEkskul[]|mixed the list of results, formatted by the current formatter
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
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KelasEkskulPeer::ID_KELAS_EKSKUL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KelasEkskulPeer::ID_KELAS_EKSKUL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_kelas_ekskul column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKelasEkskul('fooValue');   // WHERE id_kelas_ekskul = 'fooValue'
     * $query->filterByIdKelasEkskul('%fooValue%'); // WHERE id_kelas_ekskul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idKelasEkskul The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByIdKelasEkskul($idKelasEkskul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idKelasEkskul)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idKelasEkskul)) {
                $idKelasEkskul = str_replace('*', '%', $idKelasEkskul);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::ID_KELAS_EKSKUL, $idKelasEkskul, $comparison);
    }

    /**
     * Filter the query on the rombongan_belajar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRombonganBelajarId('fooValue');   // WHERE rombongan_belajar_id = 'fooValue'
     * $query->filterByRombonganBelajarId('%fooValue%'); // WHERE rombongan_belajar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rombonganBelajarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByRombonganBelajarId($rombonganBelajarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rombonganBelajarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rombonganBelajarId)) {
                $rombonganBelajarId = str_replace('*', '%', $rombonganBelajarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajarId, $comparison);
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
     * @see       filterByEkstraKurikuler()
     *
     * @param     mixed $idEkskul The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByIdEkskul($idEkskul = null, $comparison = null)
    {
        if (is_array($idEkskul)) {
            $useMinMax = false;
            if (isset($idEkskul['min'])) {
                $this->addUsingAlias(KelasEkskulPeer::ID_EKSKUL, $idEkskul['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEkskul['max'])) {
                $this->addUsingAlias(KelasEkskulPeer::ID_EKSKUL, $idEkskul['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::ID_EKSKUL, $idEkskul, $comparison);
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
     * @return KelasEkskulQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KelasEkskulPeer::NM_EKSKUL, $nmEkskul, $comparison);
    }

    /**
     * Filter the query on the sk_ekskul column
     *
     * Example usage:
     * <code>
     * $query->filterBySkEkskul('fooValue');   // WHERE sk_ekskul = 'fooValue'
     * $query->filterBySkEkskul('%fooValue%'); // WHERE sk_ekskul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skEkskul The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterBySkEkskul($skEkskul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skEkskul)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skEkskul)) {
                $skEkskul = str_replace('*', '%', $skEkskul);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::SK_EKSKUL, $skEkskul, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_ekskul column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkEkskul('2011-03-14'); // WHERE tgl_sk_ekskul = '2011-03-14'
     * $query->filterByTglSkEkskul('now'); // WHERE tgl_sk_ekskul = '2011-03-14'
     * $query->filterByTglSkEkskul(array('max' => 'yesterday')); // WHERE tgl_sk_ekskul > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkEkskul The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByTglSkEkskul($tglSkEkskul = null, $comparison = null)
    {
        if (is_array($tglSkEkskul)) {
            $useMinMax = false;
            if (isset($tglSkEkskul['min'])) {
                $this->addUsingAlias(KelasEkskulPeer::TGL_SK_EKSKUL, $tglSkEkskul['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkEkskul['max'])) {
                $this->addUsingAlias(KelasEkskulPeer::TGL_SK_EKSKUL, $tglSkEkskul['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::TGL_SK_EKSKUL, $tglSkEkskul, $comparison);
    }

    /**
     * Filter the query on the jam_kegiatan_per_minggu column
     *
     * Example usage:
     * <code>
     * $query->filterByJamKegiatanPerMinggu(1234); // WHERE jam_kegiatan_per_minggu = 1234
     * $query->filterByJamKegiatanPerMinggu(array(12, 34)); // WHERE jam_kegiatan_per_minggu IN (12, 34)
     * $query->filterByJamKegiatanPerMinggu(array('min' => 12)); // WHERE jam_kegiatan_per_minggu >= 12
     * $query->filterByJamKegiatanPerMinggu(array('max' => 12)); // WHERE jam_kegiatan_per_minggu <= 12
     * </code>
     *
     * @param     mixed $jamKegiatanPerMinggu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByJamKegiatanPerMinggu($jamKegiatanPerMinggu = null, $comparison = null)
    {
        if (is_array($jamKegiatanPerMinggu)) {
            $useMinMax = false;
            if (isset($jamKegiatanPerMinggu['min'])) {
                $this->addUsingAlias(KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU, $jamKegiatanPerMinggu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jamKegiatanPerMinggu['max'])) {
                $this->addUsingAlias(KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU, $jamKegiatanPerMinggu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU, $jamKegiatanPerMinggu, $comparison);
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
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KelasEkskulPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KelasEkskulPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KelasEkskulPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KelasEkskulPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(KelasEkskulPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(KelasEkskulPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KelasEkskulPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KelasEkskulPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelasEkskulPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return KelasEkskulQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KelasEkskulPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KelasEkskulQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajar->getRombonganBelajarId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajar->toKeyValue('PrimaryKey', 'RombonganBelajarId'), $comparison);
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related EkstraKurikuler object
     *
     * @param   EkstraKurikuler|PropelObjectCollection $ekstraKurikuler The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KelasEkskulQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEkstraKurikuler($ekstraKurikuler, $comparison = null)
    {
        if ($ekstraKurikuler instanceof EkstraKurikuler) {
            return $this
                ->addUsingAlias(KelasEkskulPeer::ID_EKSKUL, $ekstraKurikuler->getIdEkskul(), $comparison);
        } elseif ($ekstraKurikuler instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelasEkskulPeer::ID_EKSKUL, $ekstraKurikuler->toKeyValue('PrimaryKey', 'IdEkskul'), $comparison);
        } else {
            throw new PropelException('filterByEkstraKurikuler() only accepts arguments of type EkstraKurikuler or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EkstraKurikuler relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function joinEkstraKurikuler($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EkstraKurikuler');

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
            $this->addJoinObject($join, 'EkstraKurikuler');
        }

        return $this;
    }

    /**
     * Use the EkstraKurikuler relation EkstraKurikuler object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\EkstraKurikulerQuery A secondary query class using the current class as primary query
     */
    public function useEkstraKurikulerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEkstraKurikuler($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EkstraKurikuler', '\DataDikdas\Model\EkstraKurikulerQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   KelasEkskul $kelasEkskul Object to remove from the list of results
     *
     * @return KelasEkskulQuery The current query, for fluid interface
     */
    public function prune($kelasEkskul = null)
    {
        if ($kelasEkskul) {
            $this->addUsingAlias(KelasEkskulPeer::ID_KELAS_EKSKUL, $kelasEkskul->getIdKelasEkskul(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
