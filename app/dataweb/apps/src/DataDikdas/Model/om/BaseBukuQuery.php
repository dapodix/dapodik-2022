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
use DataDikdas\Model\Biblio;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuLongitudinal;
use DataDikdas\Model\BukuPeer;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\TingkatPendidikan;

/**
 * Base class that represents a query for the 'buku' table.
 *
 * 
 *
 * @method BukuQuery orderByIdBuku($order = Criteria::ASC) Order by the id_buku column
 * @method BukuQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method BukuQuery orderByIdRuang($order = Criteria::ASC) Order by the id_ruang column
 * @method BukuQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method BukuQuery orderByIdBiblio($order = Criteria::ASC) Order by the id_biblio column
 * @method BukuQuery orderByTingkatPendidikanId($order = Criteria::ASC) Order by the tingkat_pendidikan_id column
 * @method BukuQuery orderByNmBuku($order = Criteria::ASC) Order by the nm_buku column
 * @method BukuQuery orderByIdHapusBuku($order = Criteria::ASC) Order by the id_hapus_buku column
 * @method BukuQuery orderByTglHapusBuku($order = Criteria::ASC) Order by the tgl_hapus_buku column
 * @method BukuQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method BukuQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BukuQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BukuQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BukuQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BukuQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BukuQuery groupByIdBuku() Group by the id_buku column
 * @method BukuQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method BukuQuery groupByIdRuang() Group by the id_ruang column
 * @method BukuQuery groupBySekolahId() Group by the sekolah_id column
 * @method BukuQuery groupByIdBiblio() Group by the id_biblio column
 * @method BukuQuery groupByTingkatPendidikanId() Group by the tingkat_pendidikan_id column
 * @method BukuQuery groupByNmBuku() Group by the nm_buku column
 * @method BukuQuery groupByIdHapusBuku() Group by the id_hapus_buku column
 * @method BukuQuery groupByTglHapusBuku() Group by the tgl_hapus_buku column
 * @method BukuQuery groupByAsalData() Group by the asal_data column
 * @method BukuQuery groupByCreateDate() Group by the create_date column
 * @method BukuQuery groupByLastUpdate() Group by the last_update column
 * @method BukuQuery groupBySoftDelete() Group by the soft_delete column
 * @method BukuQuery groupByLastSync() Group by the last_sync column
 * @method BukuQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BukuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BukuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BukuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BukuQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method BukuQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method BukuQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method BukuQuery leftJoinBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Biblio relation
 * @method BukuQuery rightJoinBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Biblio relation
 * @method BukuQuery innerJoinBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the Biblio relation
 *
 * @method BukuQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method BukuQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method BukuQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method BukuQuery leftJoinTingkatPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPendidikan relation
 * @method BukuQuery rightJoinTingkatPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPendidikan relation
 * @method BukuQuery innerJoinTingkatPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPendidikan relation
 *
 * @method BukuQuery leftJoinJenisHapusBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisHapusBuku relation
 * @method BukuQuery rightJoinJenisHapusBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisHapusBuku relation
 * @method BukuQuery innerJoinJenisHapusBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisHapusBuku relation
 *
 * @method BukuQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method BukuQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method BukuQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method BukuQuery leftJoinBukuLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the BukuLongitudinal relation
 * @method BukuQuery rightJoinBukuLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BukuLongitudinal relation
 * @method BukuQuery innerJoinBukuLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the BukuLongitudinal relation
 *
 * @method Buku findOne(PropelPDO $con = null) Return the first Buku matching the query
 * @method Buku findOneOrCreate(PropelPDO $con = null) Return the first Buku matching the query, or a new Buku object populated from the query conditions when no match is found
 *
 * @method Buku findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first Buku filtered by the mata_pelajaran_id column
 * @method Buku findOneByIdRuang(string $id_ruang) Return the first Buku filtered by the id_ruang column
 * @method Buku findOneBySekolahId(string $sekolah_id) Return the first Buku filtered by the sekolah_id column
 * @method Buku findOneByIdBiblio(string $id_biblio) Return the first Buku filtered by the id_biblio column
 * @method Buku findOneByTingkatPendidikanId(string $tingkat_pendidikan_id) Return the first Buku filtered by the tingkat_pendidikan_id column
 * @method Buku findOneByNmBuku(string $nm_buku) Return the first Buku filtered by the nm_buku column
 * @method Buku findOneByIdHapusBuku(string $id_hapus_buku) Return the first Buku filtered by the id_hapus_buku column
 * @method Buku findOneByTglHapusBuku(string $tgl_hapus_buku) Return the first Buku filtered by the tgl_hapus_buku column
 * @method Buku findOneByAsalData(string $asal_data) Return the first Buku filtered by the asal_data column
 * @method Buku findOneByCreateDate(string $create_date) Return the first Buku filtered by the create_date column
 * @method Buku findOneByLastUpdate(string $last_update) Return the first Buku filtered by the last_update column
 * @method Buku findOneBySoftDelete(string $soft_delete) Return the first Buku filtered by the soft_delete column
 * @method Buku findOneByLastSync(string $last_sync) Return the first Buku filtered by the last_sync column
 * @method Buku findOneByUpdaterId(string $updater_id) Return the first Buku filtered by the updater_id column
 *
 * @method array findByIdBuku(string $id_buku) Return Buku objects filtered by the id_buku column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return Buku objects filtered by the mata_pelajaran_id column
 * @method array findByIdRuang(string $id_ruang) Return Buku objects filtered by the id_ruang column
 * @method array findBySekolahId(string $sekolah_id) Return Buku objects filtered by the sekolah_id column
 * @method array findByIdBiblio(string $id_biblio) Return Buku objects filtered by the id_biblio column
 * @method array findByTingkatPendidikanId(string $tingkat_pendidikan_id) Return Buku objects filtered by the tingkat_pendidikan_id column
 * @method array findByNmBuku(string $nm_buku) Return Buku objects filtered by the nm_buku column
 * @method array findByIdHapusBuku(string $id_hapus_buku) Return Buku objects filtered by the id_hapus_buku column
 * @method array findByTglHapusBuku(string $tgl_hapus_buku) Return Buku objects filtered by the tgl_hapus_buku column
 * @method array findByAsalData(string $asal_data) Return Buku objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Buku objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Buku objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Buku objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Buku objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Buku objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBukuQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBukuQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Buku', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BukuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BukuQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BukuQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BukuQuery) {
            return $criteria;
        }
        $query = new BukuQuery();
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
     * @return   Buku|Buku[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BukuPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Buku A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdBuku($key, $con = null)
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
     * @return                 Buku A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_buku", "mata_pelajaran_id", "id_ruang", "sekolah_id", "id_biblio", "tingkat_pendidikan_id", "nm_buku", "id_hapus_buku", "tgl_hapus_buku", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "buku" WHERE "id_buku" = :p0';
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
            $obj = new Buku();
            $obj->hydrate($row);
            BukuPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Buku|Buku[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Buku[]|mixed the list of results, formatted by the current formatter
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BukuPeer::ID_BUKU, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BukuPeer::ID_BUKU, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBuku('fooValue');   // WHERE id_buku = 'fooValue'
     * $query->filterByIdBuku('%fooValue%'); // WHERE id_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByIdBuku($idBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBuku)) {
                $idBuku = str_replace('*', '%', $idBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPeer::ID_BUKU, $idBuku, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(BukuPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(BukuPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
    }

    /**
     * Filter the query on the id_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRuang('fooValue');   // WHERE id_ruang = 'fooValue'
     * $query->filterByIdRuang('%fooValue%'); // WHERE id_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByIdRuang($idRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idRuang)) {
                $idRuang = str_replace('*', '%', $idRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPeer::ID_RUANG, $idRuang, $comparison);
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the id_biblio column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBiblio('fooValue');   // WHERE id_biblio = 'fooValue'
     * $query->filterByIdBiblio('%fooValue%'); // WHERE id_biblio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBiblio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByIdBiblio($idBiblio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBiblio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBiblio)) {
                $idBiblio = str_replace('*', '%', $idBiblio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPeer::ID_BIBLIO, $idBiblio, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByTingkatPendidikanId($tingkatPendidikanId = null, $comparison = null)
    {
        if (is_array($tingkatPendidikanId)) {
            $useMinMax = false;
            if (isset($tingkatPendidikanId['min'])) {
                $this->addUsingAlias(BukuPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPendidikanId['max'])) {
                $this->addUsingAlias(BukuPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId, $comparison);
    }

    /**
     * Filter the query on the nm_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByNmBuku('fooValue');   // WHERE nm_buku = 'fooValue'
     * $query->filterByNmBuku('%fooValue%'); // WHERE nm_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByNmBuku($nmBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmBuku)) {
                $nmBuku = str_replace('*', '%', $nmBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPeer::NM_BUKU, $nmBuku, $comparison);
    }

    /**
     * Filter the query on the id_hapus_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByIdHapusBuku('fooValue');   // WHERE id_hapus_buku = 'fooValue'
     * $query->filterByIdHapusBuku('%fooValue%'); // WHERE id_hapus_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idHapusBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByIdHapusBuku($idHapusBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idHapusBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idHapusBuku)) {
                $idHapusBuku = str_replace('*', '%', $idHapusBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPeer::ID_HAPUS_BUKU, $idHapusBuku, $comparison);
    }

    /**
     * Filter the query on the tgl_hapus_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByTglHapusBuku('2011-03-14'); // WHERE tgl_hapus_buku = '2011-03-14'
     * $query->filterByTglHapusBuku('now'); // WHERE tgl_hapus_buku = '2011-03-14'
     * $query->filterByTglHapusBuku(array('max' => 'yesterday')); // WHERE tgl_hapus_buku > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglHapusBuku The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByTglHapusBuku($tglHapusBuku = null, $comparison = null)
    {
        if (is_array($tglHapusBuku)) {
            $useMinMax = false;
            if (isset($tglHapusBuku['min'])) {
                $this->addUsingAlias(BukuPeer::TGL_HAPUS_BUKU, $tglHapusBuku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglHapusBuku['max'])) {
                $this->addUsingAlias(BukuPeer::TGL_HAPUS_BUKU, $tglHapusBuku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPeer::TGL_HAPUS_BUKU, $tglHapusBuku, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BukuPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BukuPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BukuPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BukuPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BukuPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BukuPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BukuPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BukuPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BukuPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BukuQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BukuPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(BukuPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
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
     * @return BukuQuery The current query, for fluid interface
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
     * Filter the query by a related Biblio object
     *
     * @param   Biblio|PropelObjectCollection $biblio The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBiblio($biblio, $comparison = null)
    {
        if ($biblio instanceof Biblio) {
            return $this
                ->addUsingAlias(BukuPeer::ID_BIBLIO, $biblio->getIdBiblio(), $comparison);
        } elseif ($biblio instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuPeer::ID_BIBLIO, $biblio->toKeyValue('PrimaryKey', 'IdBiblio'), $comparison);
        } else {
            throw new PropelException('filterByBiblio() only accepts arguments of type Biblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Biblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function joinBiblio($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Biblio');

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
            $this->addJoinObject($join, 'Biblio');
        }

        return $this;
    }

    /**
     * Use the Biblio relation Biblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BiblioQuery A secondary query class using the current class as primary query
     */
    public function useBiblioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Biblio', '\DataDikdas\Model\BiblioQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(BukuPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type Sekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

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
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related TingkatPendidikan object
     *
     * @param   TingkatPendidikan|PropelObjectCollection $tingkatPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPendidikan($tingkatPendidikan, $comparison = null)
    {
        if ($tingkatPendidikan instanceof TingkatPendidikan) {
            return $this
                ->addUsingAlias(BukuPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->getTingkatPendidikanId(), $comparison);
        } elseif ($tingkatPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->toKeyValue('PrimaryKey', 'TingkatPendidikanId'), $comparison);
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
     * @return BukuQuery The current query, for fluid interface
     */
    public function joinTingkatPendidikan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useTingkatPendidikanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTingkatPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatPendidikan', '\DataDikdas\Model\TingkatPendidikanQuery');
    }

    /**
     * Filter the query by a related JenisHapusBuku object
     *
     * @param   JenisHapusBuku|PropelObjectCollection $jenisHapusBuku The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisHapusBuku($jenisHapusBuku, $comparison = null)
    {
        if ($jenisHapusBuku instanceof JenisHapusBuku) {
            return $this
                ->addUsingAlias(BukuPeer::ID_HAPUS_BUKU, $jenisHapusBuku->getIdHapusBuku(), $comparison);
        } elseif ($jenisHapusBuku instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuPeer::ID_HAPUS_BUKU, $jenisHapusBuku->toKeyValue('PrimaryKey', 'IdHapusBuku'), $comparison);
        } else {
            throw new PropelException('filterByJenisHapusBuku() only accepts arguments of type JenisHapusBuku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisHapusBuku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function joinJenisHapusBuku($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisHapusBuku');

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
            $this->addJoinObject($join, 'JenisHapusBuku');
        }

        return $this;
    }

    /**
     * Use the JenisHapusBuku relation JenisHapusBuku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisHapusBukuQuery A secondary query class using the current class as primary query
     */
    public function useJenisHapusBukuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenisHapusBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisHapusBuku', '\DataDikdas\Model\JenisHapusBukuQuery');
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(BukuPeer::ID_RUANG, $ruang->getIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuPeer::ID_RUANG, $ruang->toKeyValue('PrimaryKey', 'IdRuang'), $comparison);
        } else {
            throw new PropelException('filterByRuang() only accepts arguments of type Ruang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ruang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function joinRuang($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ruang');

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
            $this->addJoinObject($join, 'Ruang');
        }

        return $this;
    }

    /**
     * Use the Ruang relation Ruang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangQuery A secondary query class using the current class as primary query
     */
    public function useRuangQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ruang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related BukuLongitudinal object
     *
     * @param   BukuLongitudinal|PropelObjectCollection $bukuLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBukuLongitudinal($bukuLongitudinal, $comparison = null)
    {
        if ($bukuLongitudinal instanceof BukuLongitudinal) {
            return $this
                ->addUsingAlias(BukuPeer::ID_BUKU, $bukuLongitudinal->getIdBuku(), $comparison);
        } elseif ($bukuLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useBukuLongitudinalQuery()
                ->filterByPrimaryKeys($bukuLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBukuLongitudinal() only accepts arguments of type BukuLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BukuLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function joinBukuLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BukuLongitudinal');

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
            $this->addJoinObject($join, 'BukuLongitudinal');
        }

        return $this;
    }

    /**
     * Use the BukuLongitudinal relation BukuLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useBukuLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBukuLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BukuLongitudinal', '\DataDikdas\Model\BukuLongitudinalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Buku $buku Object to remove from the list of results
     *
     * @return BukuQuery The current query, for fluid interface
     */
    public function prune($buku = null)
    {
        if ($buku) {
            $this->addUsingAlias(BukuPeer::ID_BUKU, $buku->getIdBuku(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
