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
use DataDikdas\Model\JenisPrestasi;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\Prestasi;
use DataDikdas\Model\PrestasiPeer;
use DataDikdas\Model\PrestasiQuery;
use DataDikdas\Model\TingkatPrestasi;
use DataDikdas\Model\VldPrestasi;

/**
 * Base class that represents a query for the 'prestasi' table.
 *
 * 
 *
 * @method PrestasiQuery orderByPrestasiId($order = Criteria::ASC) Order by the prestasi_id column
 * @method PrestasiQuery orderByJenisPrestasiId($order = Criteria::ASC) Order by the jenis_prestasi_id column
 * @method PrestasiQuery orderByTingkatPrestasiId($order = Criteria::ASC) Order by the tingkat_prestasi_id column
 * @method PrestasiQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method PrestasiQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PrestasiQuery orderByTahunPrestasi($order = Criteria::ASC) Order by the tahun_prestasi column
 * @method PrestasiQuery orderByPenyelenggara($order = Criteria::ASC) Order by the penyelenggara column
 * @method PrestasiQuery orderByPeringkat($order = Criteria::ASC) Order by the peringkat column
 * @method PrestasiQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method PrestasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PrestasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PrestasiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PrestasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PrestasiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PrestasiQuery groupByPrestasiId() Group by the prestasi_id column
 * @method PrestasiQuery groupByJenisPrestasiId() Group by the jenis_prestasi_id column
 * @method PrestasiQuery groupByTingkatPrestasiId() Group by the tingkat_prestasi_id column
 * @method PrestasiQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method PrestasiQuery groupByNama() Group by the nama column
 * @method PrestasiQuery groupByTahunPrestasi() Group by the tahun_prestasi column
 * @method PrestasiQuery groupByPenyelenggara() Group by the penyelenggara column
 * @method PrestasiQuery groupByPeringkat() Group by the peringkat column
 * @method PrestasiQuery groupByAsalData() Group by the asal_data column
 * @method PrestasiQuery groupByCreateDate() Group by the create_date column
 * @method PrestasiQuery groupByLastUpdate() Group by the last_update column
 * @method PrestasiQuery groupBySoftDelete() Group by the soft_delete column
 * @method PrestasiQuery groupByLastSync() Group by the last_sync column
 * @method PrestasiQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PrestasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PrestasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PrestasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PrestasiQuery leftJoinJenisPrestasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPrestasi relation
 * @method PrestasiQuery rightJoinJenisPrestasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPrestasi relation
 * @method PrestasiQuery innerJoinJenisPrestasi($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPrestasi relation
 *
 * @method PrestasiQuery leftJoinTingkatPrestasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPrestasi relation
 * @method PrestasiQuery rightJoinTingkatPrestasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPrestasi relation
 * @method PrestasiQuery innerJoinTingkatPrestasi($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPrestasi relation
 *
 * @method PrestasiQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method PrestasiQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method PrestasiQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method PrestasiQuery leftJoinVldPrestasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPrestasi relation
 * @method PrestasiQuery rightJoinVldPrestasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPrestasi relation
 * @method PrestasiQuery innerJoinVldPrestasi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPrestasi relation
 *
 * @method Prestasi findOne(PropelPDO $con = null) Return the first Prestasi matching the query
 * @method Prestasi findOneOrCreate(PropelPDO $con = null) Return the first Prestasi matching the query, or a new Prestasi object populated from the query conditions when no match is found
 *
 * @method Prestasi findOneByJenisPrestasiId(int $jenis_prestasi_id) Return the first Prestasi filtered by the jenis_prestasi_id column
 * @method Prestasi findOneByTingkatPrestasiId(int $tingkat_prestasi_id) Return the first Prestasi filtered by the tingkat_prestasi_id column
 * @method Prestasi findOneByPesertaDidikId(string $peserta_didik_id) Return the first Prestasi filtered by the peserta_didik_id column
 * @method Prestasi findOneByNama(string $nama) Return the first Prestasi filtered by the nama column
 * @method Prestasi findOneByTahunPrestasi(string $tahun_prestasi) Return the first Prestasi filtered by the tahun_prestasi column
 * @method Prestasi findOneByPenyelenggara(string $penyelenggara) Return the first Prestasi filtered by the penyelenggara column
 * @method Prestasi findOneByPeringkat(int $peringkat) Return the first Prestasi filtered by the peringkat column
 * @method Prestasi findOneByAsalData(string $asal_data) Return the first Prestasi filtered by the asal_data column
 * @method Prestasi findOneByCreateDate(string $create_date) Return the first Prestasi filtered by the create_date column
 * @method Prestasi findOneByLastUpdate(string $last_update) Return the first Prestasi filtered by the last_update column
 * @method Prestasi findOneBySoftDelete(string $soft_delete) Return the first Prestasi filtered by the soft_delete column
 * @method Prestasi findOneByLastSync(string $last_sync) Return the first Prestasi filtered by the last_sync column
 * @method Prestasi findOneByUpdaterId(string $updater_id) Return the first Prestasi filtered by the updater_id column
 *
 * @method array findByPrestasiId(string $prestasi_id) Return Prestasi objects filtered by the prestasi_id column
 * @method array findByJenisPrestasiId(int $jenis_prestasi_id) Return Prestasi objects filtered by the jenis_prestasi_id column
 * @method array findByTingkatPrestasiId(int $tingkat_prestasi_id) Return Prestasi objects filtered by the tingkat_prestasi_id column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return Prestasi objects filtered by the peserta_didik_id column
 * @method array findByNama(string $nama) Return Prestasi objects filtered by the nama column
 * @method array findByTahunPrestasi(string $tahun_prestasi) Return Prestasi objects filtered by the tahun_prestasi column
 * @method array findByPenyelenggara(string $penyelenggara) Return Prestasi objects filtered by the penyelenggara column
 * @method array findByPeringkat(int $peringkat) Return Prestasi objects filtered by the peringkat column
 * @method array findByAsalData(string $asal_data) Return Prestasi objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Prestasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Prestasi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Prestasi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Prestasi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Prestasi objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePrestasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePrestasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Prestasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PrestasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PrestasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PrestasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PrestasiQuery) {
            return $criteria;
        }
        $query = new PrestasiQuery();
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
     * @return   Prestasi|Prestasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PrestasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Prestasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPrestasiId($key, $con = null)
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
     * @return                 Prestasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "prestasi_id", "jenis_prestasi_id", "tingkat_prestasi_id", "peserta_didik_id", "nama", "tahun_prestasi", "penyelenggara", "peringkat", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "prestasi" WHERE "prestasi_id" = :p0';
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
            $obj = new Prestasi();
            $obj->hydrate($row);
            PrestasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Prestasi|Prestasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Prestasi[]|mixed the list of results, formatted by the current formatter
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
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PrestasiPeer::PRESTASI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PrestasiPeer::PRESTASI_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the prestasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPrestasiId('fooValue');   // WHERE prestasi_id = 'fooValue'
     * $query->filterByPrestasiId('%fooValue%'); // WHERE prestasi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prestasiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByPrestasiId($prestasiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prestasiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prestasiId)) {
                $prestasiId = str_replace('*', '%', $prestasiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::PRESTASI_ID, $prestasiId, $comparison);
    }

    /**
     * Filter the query on the jenis_prestasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPrestasiId(1234); // WHERE jenis_prestasi_id = 1234
     * $query->filterByJenisPrestasiId(array(12, 34)); // WHERE jenis_prestasi_id IN (12, 34)
     * $query->filterByJenisPrestasiId(array('min' => 12)); // WHERE jenis_prestasi_id >= 12
     * $query->filterByJenisPrestasiId(array('max' => 12)); // WHERE jenis_prestasi_id <= 12
     * </code>
     *
     * @see       filterByJenisPrestasi()
     *
     * @param     mixed $jenisPrestasiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByJenisPrestasiId($jenisPrestasiId = null, $comparison = null)
    {
        if (is_array($jenisPrestasiId)) {
            $useMinMax = false;
            if (isset($jenisPrestasiId['min'])) {
                $this->addUsingAlias(PrestasiPeer::JENIS_PRESTASI_ID, $jenisPrestasiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPrestasiId['max'])) {
                $this->addUsingAlias(PrestasiPeer::JENIS_PRESTASI_ID, $jenisPrestasiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::JENIS_PRESTASI_ID, $jenisPrestasiId, $comparison);
    }

    /**
     * Filter the query on the tingkat_prestasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkatPrestasiId(1234); // WHERE tingkat_prestasi_id = 1234
     * $query->filterByTingkatPrestasiId(array(12, 34)); // WHERE tingkat_prestasi_id IN (12, 34)
     * $query->filterByTingkatPrestasiId(array('min' => 12)); // WHERE tingkat_prestasi_id >= 12
     * $query->filterByTingkatPrestasiId(array('max' => 12)); // WHERE tingkat_prestasi_id <= 12
     * </code>
     *
     * @see       filterByTingkatPrestasi()
     *
     * @param     mixed $tingkatPrestasiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByTingkatPrestasiId($tingkatPrestasiId = null, $comparison = null)
    {
        if (is_array($tingkatPrestasiId)) {
            $useMinMax = false;
            if (isset($tingkatPrestasiId['min'])) {
                $this->addUsingAlias(PrestasiPeer::TINGKAT_PRESTASI_ID, $tingkatPrestasiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPrestasiId['max'])) {
                $this->addUsingAlias(PrestasiPeer::TINGKAT_PRESTASI_ID, $tingkatPrestasiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::TINGKAT_PRESTASI_ID, $tingkatPrestasiId, $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PrestasiPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PrestasiPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the tahun_prestasi column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunPrestasi(1234); // WHERE tahun_prestasi = 1234
     * $query->filterByTahunPrestasi(array(12, 34)); // WHERE tahun_prestasi IN (12, 34)
     * $query->filterByTahunPrestasi(array('min' => 12)); // WHERE tahun_prestasi >= 12
     * $query->filterByTahunPrestasi(array('max' => 12)); // WHERE tahun_prestasi <= 12
     * </code>
     *
     * @param     mixed $tahunPrestasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByTahunPrestasi($tahunPrestasi = null, $comparison = null)
    {
        if (is_array($tahunPrestasi)) {
            $useMinMax = false;
            if (isset($tahunPrestasi['min'])) {
                $this->addUsingAlias(PrestasiPeer::TAHUN_PRESTASI, $tahunPrestasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunPrestasi['max'])) {
                $this->addUsingAlias(PrestasiPeer::TAHUN_PRESTASI, $tahunPrestasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::TAHUN_PRESTASI, $tahunPrestasi, $comparison);
    }

    /**
     * Filter the query on the penyelenggara column
     *
     * Example usage:
     * <code>
     * $query->filterByPenyelenggara('fooValue');   // WHERE penyelenggara = 'fooValue'
     * $query->filterByPenyelenggara('%fooValue%'); // WHERE penyelenggara LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penyelenggara The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByPenyelenggara($penyelenggara = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penyelenggara)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penyelenggara)) {
                $penyelenggara = str_replace('*', '%', $penyelenggara);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::PENYELENGGARA, $penyelenggara, $comparison);
    }

    /**
     * Filter the query on the peringkat column
     *
     * Example usage:
     * <code>
     * $query->filterByPeringkat(1234); // WHERE peringkat = 1234
     * $query->filterByPeringkat(array(12, 34)); // WHERE peringkat IN (12, 34)
     * $query->filterByPeringkat(array('min' => 12)); // WHERE peringkat >= 12
     * $query->filterByPeringkat(array('max' => 12)); // WHERE peringkat <= 12
     * </code>
     *
     * @param     mixed $peringkat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByPeringkat($peringkat = null, $comparison = null)
    {
        if (is_array($peringkat)) {
            $useMinMax = false;
            if (isset($peringkat['min'])) {
                $this->addUsingAlias(PrestasiPeer::PERINGKAT, $peringkat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($peringkat['max'])) {
                $this->addUsingAlias(PrestasiPeer::PERINGKAT, $peringkat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::PERINGKAT, $peringkat, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData('fooValue');   // WHERE asal_data = 'fooValue'
     * $query->filterByAsalData('%fooValue%'); // WHERE asal_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalData)) {
                $asalData = str_replace('*', '%', $asalData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PrestasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PrestasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PrestasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PrestasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PrestasiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PrestasiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PrestasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PrestasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PrestasiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PrestasiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisPrestasi object
     *
     * @param   JenisPrestasi|PropelObjectCollection $jenisPrestasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PrestasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPrestasi($jenisPrestasi, $comparison = null)
    {
        if ($jenisPrestasi instanceof JenisPrestasi) {
            return $this
                ->addUsingAlias(PrestasiPeer::JENIS_PRESTASI_ID, $jenisPrestasi->getJenisPrestasiId(), $comparison);
        } elseif ($jenisPrestasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PrestasiPeer::JENIS_PRESTASI_ID, $jenisPrestasi->toKeyValue('PrimaryKey', 'JenisPrestasiId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPrestasi() only accepts arguments of type JenisPrestasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPrestasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function joinJenisPrestasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPrestasi');

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
            $this->addJoinObject($join, 'JenisPrestasi');
        }

        return $this;
    }

    /**
     * Use the JenisPrestasi relation JenisPrestasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPrestasiQuery A secondary query class using the current class as primary query
     */
    public function useJenisPrestasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPrestasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPrestasi', '\DataDikdas\Model\JenisPrestasiQuery');
    }

    /**
     * Filter the query by a related TingkatPrestasi object
     *
     * @param   TingkatPrestasi|PropelObjectCollection $tingkatPrestasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PrestasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPrestasi($tingkatPrestasi, $comparison = null)
    {
        if ($tingkatPrestasi instanceof TingkatPrestasi) {
            return $this
                ->addUsingAlias(PrestasiPeer::TINGKAT_PRESTASI_ID, $tingkatPrestasi->getTingkatPrestasiId(), $comparison);
        } elseif ($tingkatPrestasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PrestasiPeer::TINGKAT_PRESTASI_ID, $tingkatPrestasi->toKeyValue('PrimaryKey', 'TingkatPrestasiId'), $comparison);
        } else {
            throw new PropelException('filterByTingkatPrestasi() only accepts arguments of type TingkatPrestasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatPrestasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function joinTingkatPrestasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatPrestasi');

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
            $this->addJoinObject($join, 'TingkatPrestasi');
        }

        return $this;
    }

    /**
     * Use the TingkatPrestasi relation TingkatPrestasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatPrestasiQuery A secondary query class using the current class as primary query
     */
    public function useTingkatPrestasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatPrestasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatPrestasi', '\DataDikdas\Model\TingkatPrestasiQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PrestasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PrestasiPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PrestasiPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
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
     * @return PrestasiQuery The current query, for fluid interface
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
     * Filter the query by a related VldPrestasi object
     *
     * @param   VldPrestasi|PropelObjectCollection $vldPrestasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PrestasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPrestasi($vldPrestasi, $comparison = null)
    {
        if ($vldPrestasi instanceof VldPrestasi) {
            return $this
                ->addUsingAlias(PrestasiPeer::PRESTASI_ID, $vldPrestasi->getPrestasiId(), $comparison);
        } elseif ($vldPrestasi instanceof PropelObjectCollection) {
            return $this
                ->useVldPrestasiQuery()
                ->filterByPrimaryKeys($vldPrestasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPrestasi() only accepts arguments of type VldPrestasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPrestasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function joinVldPrestasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPrestasi');

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
            $this->addJoinObject($join, 'VldPrestasi');
        }

        return $this;
    }

    /**
     * Use the VldPrestasi relation VldPrestasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPrestasiQuery A secondary query class using the current class as primary query
     */
    public function useVldPrestasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPrestasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPrestasi', '\DataDikdas\Model\VldPrestasiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Prestasi $prestasi Object to remove from the list of results
     *
     * @return PrestasiQuery The current query, for fluid interface
     */
    public function prune($prestasi = null)
    {
        if ($prestasi) {
            $this->addUsingAlias(PrestasiPeer::PRESTASI_ID, $prestasi->getPrestasiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
