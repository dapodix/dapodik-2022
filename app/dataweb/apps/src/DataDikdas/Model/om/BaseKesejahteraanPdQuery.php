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
use DataDikdas\Model\JenisKesejahteraan;
use DataDikdas\Model\KesejahteraanPd;
use DataDikdas\Model\KesejahteraanPdPeer;
use DataDikdas\Model\KesejahteraanPdQuery;
use DataDikdas\Model\PesertaDidik;

/**
 * Base class that represents a query for the 'kesejahteraan_pd' table.
 *
 * 
 *
 * @method KesejahteraanPdQuery orderByIdSejahteraPd($order = Criteria::ASC) Order by the id_sejahtera_pd column
 * @method KesejahteraanPdQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method KesejahteraanPdQuery orderByJenisKesejahteraanId($order = Criteria::ASC) Order by the jenis_kesejahteraan_id column
 * @method KesejahteraanPdQuery orderByNomor($order = Criteria::ASC) Order by the nomor column
 * @method KesejahteraanPdQuery orderByNmDiKartu($order = Criteria::ASC) Order by the nm_di_kartu column
 * @method KesejahteraanPdQuery orderByDariTahun($order = Criteria::ASC) Order by the dari_tahun column
 * @method KesejahteraanPdQuery orderBySampaiTahun($order = Criteria::ASC) Order by the sampai_tahun column
 * @method KesejahteraanPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KesejahteraanPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KesejahteraanPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method KesejahteraanPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method KesejahteraanPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method KesejahteraanPdQuery groupByIdSejahteraPd() Group by the id_sejahtera_pd column
 * @method KesejahteraanPdQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method KesejahteraanPdQuery groupByJenisKesejahteraanId() Group by the jenis_kesejahteraan_id column
 * @method KesejahteraanPdQuery groupByNomor() Group by the nomor column
 * @method KesejahteraanPdQuery groupByNmDiKartu() Group by the nm_di_kartu column
 * @method KesejahteraanPdQuery groupByDariTahun() Group by the dari_tahun column
 * @method KesejahteraanPdQuery groupBySampaiTahun() Group by the sampai_tahun column
 * @method KesejahteraanPdQuery groupByCreateDate() Group by the create_date column
 * @method KesejahteraanPdQuery groupByLastUpdate() Group by the last_update column
 * @method KesejahteraanPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method KesejahteraanPdQuery groupByLastSync() Group by the last_sync column
 * @method KesejahteraanPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method KesejahteraanPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KesejahteraanPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KesejahteraanPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KesejahteraanPdQuery leftJoinJenisKesejahteraan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisKesejahteraan relation
 * @method KesejahteraanPdQuery rightJoinJenisKesejahteraan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisKesejahteraan relation
 * @method KesejahteraanPdQuery innerJoinJenisKesejahteraan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisKesejahteraan relation
 *
 * @method KesejahteraanPdQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method KesejahteraanPdQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method KesejahteraanPdQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method KesejahteraanPd findOne(PropelPDO $con = null) Return the first KesejahteraanPd matching the query
 * @method KesejahteraanPd findOneOrCreate(PropelPDO $con = null) Return the first KesejahteraanPd matching the query, or a new KesejahteraanPd object populated from the query conditions when no match is found
 *
 * @method KesejahteraanPd findOneByPesertaDidikId(string $peserta_didik_id) Return the first KesejahteraanPd filtered by the peserta_didik_id column
 * @method KesejahteraanPd findOneByJenisKesejahteraanId(int $jenis_kesejahteraan_id) Return the first KesejahteraanPd filtered by the jenis_kesejahteraan_id column
 * @method KesejahteraanPd findOneByNomor(string $nomor) Return the first KesejahteraanPd filtered by the nomor column
 * @method KesejahteraanPd findOneByNmDiKartu(string $nm_di_kartu) Return the first KesejahteraanPd filtered by the nm_di_kartu column
 * @method KesejahteraanPd findOneByDariTahun(string $dari_tahun) Return the first KesejahteraanPd filtered by the dari_tahun column
 * @method KesejahteraanPd findOneBySampaiTahun(string $sampai_tahun) Return the first KesejahteraanPd filtered by the sampai_tahun column
 * @method KesejahteraanPd findOneByCreateDate(string $create_date) Return the first KesejahteraanPd filtered by the create_date column
 * @method KesejahteraanPd findOneByLastUpdate(string $last_update) Return the first KesejahteraanPd filtered by the last_update column
 * @method KesejahteraanPd findOneBySoftDelete(string $soft_delete) Return the first KesejahteraanPd filtered by the soft_delete column
 * @method KesejahteraanPd findOneByLastSync(string $last_sync) Return the first KesejahteraanPd filtered by the last_sync column
 * @method KesejahteraanPd findOneByUpdaterId(string $updater_id) Return the first KesejahteraanPd filtered by the updater_id column
 *
 * @method array findByIdSejahteraPd(string $id_sejahtera_pd) Return KesejahteraanPd objects filtered by the id_sejahtera_pd column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return KesejahteraanPd objects filtered by the peserta_didik_id column
 * @method array findByJenisKesejahteraanId(int $jenis_kesejahteraan_id) Return KesejahteraanPd objects filtered by the jenis_kesejahteraan_id column
 * @method array findByNomor(string $nomor) Return KesejahteraanPd objects filtered by the nomor column
 * @method array findByNmDiKartu(string $nm_di_kartu) Return KesejahteraanPd objects filtered by the nm_di_kartu column
 * @method array findByDariTahun(string $dari_tahun) Return KesejahteraanPd objects filtered by the dari_tahun column
 * @method array findBySampaiTahun(string $sampai_tahun) Return KesejahteraanPd objects filtered by the sampai_tahun column
 * @method array findByCreateDate(string $create_date) Return KesejahteraanPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KesejahteraanPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return KesejahteraanPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return KesejahteraanPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return KesejahteraanPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKesejahteraanPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKesejahteraanPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KesejahteraanPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KesejahteraanPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KesejahteraanPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KesejahteraanPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KesejahteraanPdQuery) {
            return $criteria;
        }
        $query = new KesejahteraanPdQuery();
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
     * @return   KesejahteraanPd|KesejahteraanPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KesejahteraanPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KesejahteraanPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSejahteraPd($key, $con = null)
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
     * @return                 KesejahteraanPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_sejahtera_pd", "peserta_didik_id", "jenis_kesejahteraan_id", "nomor", "nm_di_kartu", "dari_tahun", "sampai_tahun", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "kesejahteraan_pd" WHERE "id_sejahtera_pd" = :p0';
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
            $obj = new KesejahteraanPd();
            $obj->hydrate($row);
            KesejahteraanPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KesejahteraanPd|KesejahteraanPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KesejahteraanPd[]|mixed the list of results, formatted by the current formatter
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
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KesejahteraanPdPeer::ID_SEJAHTERA_PD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KesejahteraanPdPeer::ID_SEJAHTERA_PD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sejahtera_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSejahteraPd('fooValue');   // WHERE id_sejahtera_pd = 'fooValue'
     * $query->filterByIdSejahteraPd('%fooValue%'); // WHERE id_sejahtera_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idSejahteraPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByIdSejahteraPd($idSejahteraPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idSejahteraPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idSejahteraPd)) {
                $idSejahteraPd = str_replace('*', '%', $idSejahteraPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::ID_SEJAHTERA_PD, $idSejahteraPd, $comparison);
    }

    /**
     * Filter the query on the peserta_didik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPesertaDidikId('fooValue');   // WHERE peserta_didik_id = 'fooValue'
     * $query->filterByPesertaDidikId('%fooValue%'); // WHERE peserta_didik_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pesertaDidikId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByPesertaDidikId($pesertaDidikId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pesertaDidikId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pesertaDidikId)) {
                $pesertaDidikId = str_replace('*', '%', $pesertaDidikId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
    }

    /**
     * Filter the query on the jenis_kesejahteraan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisKesejahteraanId(1234); // WHERE jenis_kesejahteraan_id = 1234
     * $query->filterByJenisKesejahteraanId(array(12, 34)); // WHERE jenis_kesejahteraan_id IN (12, 34)
     * $query->filterByJenisKesejahteraanId(array('min' => 12)); // WHERE jenis_kesejahteraan_id >= 12
     * $query->filterByJenisKesejahteraanId(array('max' => 12)); // WHERE jenis_kesejahteraan_id <= 12
     * </code>
     *
     * @see       filterByJenisKesejahteraan()
     *
     * @param     mixed $jenisKesejahteraanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByJenisKesejahteraanId($jenisKesejahteraanId = null, $comparison = null)
    {
        if (is_array($jenisKesejahteraanId)) {
            $useMinMax = false;
            if (isset($jenisKesejahteraanId['min'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisKesejahteraanId['max'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId, $comparison);
    }

    /**
     * Filter the query on the nomor column
     *
     * Example usage:
     * <code>
     * $query->filterByNomor('fooValue');   // WHERE nomor = 'fooValue'
     * $query->filterByNomor('%fooValue%'); // WHERE nomor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByNomor($nomor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomor)) {
                $nomor = str_replace('*', '%', $nomor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::NOMOR, $nomor, $comparison);
    }

    /**
     * Filter the query on the nm_di_kartu column
     *
     * Example usage:
     * <code>
     * $query->filterByNmDiKartu('fooValue');   // WHERE nm_di_kartu = 'fooValue'
     * $query->filterByNmDiKartu('%fooValue%'); // WHERE nm_di_kartu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmDiKartu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByNmDiKartu($nmDiKartu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmDiKartu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmDiKartu)) {
                $nmDiKartu = str_replace('*', '%', $nmDiKartu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::NM_DI_KARTU, $nmDiKartu, $comparison);
    }

    /**
     * Filter the query on the dari_tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByDariTahun(1234); // WHERE dari_tahun = 1234
     * $query->filterByDariTahun(array(12, 34)); // WHERE dari_tahun IN (12, 34)
     * $query->filterByDariTahun(array('min' => 12)); // WHERE dari_tahun >= 12
     * $query->filterByDariTahun(array('max' => 12)); // WHERE dari_tahun <= 12
     * </code>
     *
     * @param     mixed $dariTahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByDariTahun($dariTahun = null, $comparison = null)
    {
        if (is_array($dariTahun)) {
            $useMinMax = false;
            if (isset($dariTahun['min'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::DARI_TAHUN, $dariTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dariTahun['max'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::DARI_TAHUN, $dariTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::DARI_TAHUN, $dariTahun, $comparison);
    }

    /**
     * Filter the query on the sampai_tahun column
     *
     * Example usage:
     * <code>
     * $query->filterBySampaiTahun(1234); // WHERE sampai_tahun = 1234
     * $query->filterBySampaiTahun(array(12, 34)); // WHERE sampai_tahun IN (12, 34)
     * $query->filterBySampaiTahun(array('min' => 12)); // WHERE sampai_tahun >= 12
     * $query->filterBySampaiTahun(array('max' => 12)); // WHERE sampai_tahun <= 12
     * </code>
     *
     * @param     mixed $sampaiTahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterBySampaiTahun($sampaiTahun = null, $comparison = null)
    {
        if (is_array($sampaiTahun)) {
            $useMinMax = false;
            if (isset($sampaiTahun['min'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::SAMPAI_TAHUN, $sampaiTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sampaiTahun['max'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::SAMPAI_TAHUN, $sampaiTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::SAMPAI_TAHUN, $sampaiTahun, $comparison);
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
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KesejahteraanPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return KesejahteraanPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KesejahteraanPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisKesejahteraan object
     *
     * @param   JenisKesejahteraan|PropelObjectCollection $jenisKesejahteraan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KesejahteraanPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisKesejahteraan($jenisKesejahteraan, $comparison = null)
    {
        if ($jenisKesejahteraan instanceof JenisKesejahteraan) {
            return $this
                ->addUsingAlias(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraan->getJenisKesejahteraanId(), $comparison);
        } elseif ($jenisKesejahteraan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraan->toKeyValue('PrimaryKey', 'JenisKesejahteraanId'), $comparison);
        } else {
            throw new PropelException('filterByJenisKesejahteraan() only accepts arguments of type JenisKesejahteraan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisKesejahteraan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function joinJenisKesejahteraan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisKesejahteraan');

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
            $this->addJoinObject($join, 'JenisKesejahteraan');
        }

        return $this;
    }

    /**
     * Use the JenisKesejahteraan relation JenisKesejahteraan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisKesejahteraanQuery A secondary query class using the current class as primary query
     */
    public function useJenisKesejahteraanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisKesejahteraan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisKesejahteraan', '\DataDikdas\Model\JenisKesejahteraanQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KesejahteraanPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(KesejahteraanPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KesejahteraanPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
        } else {
            throw new PropelException('filterByPesertaDidik() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidik');

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
            $this->addJoinObject($join, 'PesertaDidik');
        }

        return $this;
    }

    /**
     * Use the PesertaDidik relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   KesejahteraanPd $kesejahteraanPd Object to remove from the list of results
     *
     * @return KesejahteraanPdQuery The current query, for fluid interface
     */
    public function prune($kesejahteraanPd = null)
    {
        if ($kesejahteraanPd) {
            $this->addUsingAlias(KesejahteraanPdPeer::ID_SEJAHTERA_PD, $kesejahteraanPd->getIdSejahteraPd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
