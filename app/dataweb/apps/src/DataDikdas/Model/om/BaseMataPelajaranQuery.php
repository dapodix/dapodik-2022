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
use DataDikdas\Model\Buku;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\MapBidangMataPelajaran;
use DataDikdas\Model\MapelBiblio;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\MatevRapor;
use DataDikdas\Model\Mulok;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\TemplateRapor;
use DataDikdas\Model\TemplateUn;

/**
 * Base class that represents a query for the 'ref.mata_pelajaran' table.
 *
 * 
 *
 * @method MataPelajaranQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method MataPelajaranQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method MataPelajaranQuery orderByPilihanSekolah($order = Criteria::ASC) Order by the pilihan_sekolah column
 * @method MataPelajaranQuery orderByPilihanBuku($order = Criteria::ASC) Order by the pilihan_buku column
 * @method MataPelajaranQuery orderByPilihanKepengawasan($order = Criteria::ASC) Order by the pilihan_kepengawasan column
 * @method MataPelajaranQuery orderByPilihanEvaluasi($order = Criteria::ASC) Order by the pilihan_evaluasi column
 * @method MataPelajaranQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method MataPelajaranQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MataPelajaranQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MataPelajaranQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method MataPelajaranQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method MataPelajaranQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method MataPelajaranQuery groupByNama() Group by the nama column
 * @method MataPelajaranQuery groupByPilihanSekolah() Group by the pilihan_sekolah column
 * @method MataPelajaranQuery groupByPilihanBuku() Group by the pilihan_buku column
 * @method MataPelajaranQuery groupByPilihanKepengawasan() Group by the pilihan_kepengawasan column
 * @method MataPelajaranQuery groupByPilihanEvaluasi() Group by the pilihan_evaluasi column
 * @method MataPelajaranQuery groupByJurusanId() Group by the jurusan_id column
 * @method MataPelajaranQuery groupByCreateDate() Group by the create_date column
 * @method MataPelajaranQuery groupByLastUpdate() Group by the last_update column
 * @method MataPelajaranQuery groupByExpiredDate() Group by the expired_date column
 * @method MataPelajaranQuery groupByLastSync() Group by the last_sync column
 *
 * @method MataPelajaranQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MataPelajaranQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MataPelajaranQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MataPelajaranQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method MataPelajaranQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method MataPelajaranQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method MataPelajaranQuery leftJoinBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buku relation
 * @method MataPelajaranQuery rightJoinBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buku relation
 * @method MataPelajaranQuery innerJoinBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the Buku relation
 *
 * @method MataPelajaranQuery leftJoinKompetensi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kompetensi relation
 * @method MataPelajaranQuery rightJoinKompetensi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kompetensi relation
 * @method MataPelajaranQuery innerJoinKompetensi($relationAlias = null) Adds a INNER JOIN clause to the query using the Kompetensi relation
 *
 * @method MataPelajaranQuery leftJoinMapBidangMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapBidangMataPelajaran relation
 * @method MataPelajaranQuery rightJoinMapBidangMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapBidangMataPelajaran relation
 * @method MataPelajaranQuery innerJoinMapBidangMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MapBidangMataPelajaran relation
 *
 * @method MataPelajaranQuery leftJoinMapelBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapelBiblio relation
 * @method MataPelajaranQuery rightJoinMapelBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapelBiblio relation
 * @method MataPelajaranQuery innerJoinMapelBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the MapelBiblio relation
 *
 * @method MataPelajaranQuery leftJoinMataPelajaranKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method MataPelajaranQuery rightJoinMataPelajaranKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method MataPelajaranQuery innerJoinMataPelajaranKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranKurikulum relation
 *
 * @method MataPelajaranQuery leftJoinMatevRapor($relationAlias = null) Adds a LEFT JOIN clause to the query using the MatevRapor relation
 * @method MataPelajaranQuery rightJoinMatevRapor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MatevRapor relation
 * @method MataPelajaranQuery innerJoinMatevRapor($relationAlias = null) Adds a INNER JOIN clause to the query using the MatevRapor relation
 *
 * @method MataPelajaranQuery leftJoinMulok($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mulok relation
 * @method MataPelajaranQuery rightJoinMulok($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mulok relation
 * @method MataPelajaranQuery innerJoinMulok($relationAlias = null) Adds a INNER JOIN clause to the query using the Mulok relation
 *
 * @method MataPelajaranQuery leftJoinPembelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pembelajaran relation
 * @method MataPelajaranQuery rightJoinPembelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pembelajaran relation
 * @method MataPelajaranQuery innerJoinPembelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the Pembelajaran relation
 *
 * @method MataPelajaranQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method MataPelajaranQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method MataPelajaranQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method MataPelajaranQuery leftJoinTemplateRapor($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateRapor relation
 * @method MataPelajaranQuery rightJoinTemplateRapor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateRapor relation
 * @method MataPelajaranQuery innerJoinTemplateRapor($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateRapor relation
 *
 * @method MataPelajaranQuery leftJoinTemplateUnRelatedByMp3Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUnRelatedByMp3Id relation
 * @method MataPelajaranQuery rightJoinTemplateUnRelatedByMp3Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUnRelatedByMp3Id relation
 * @method MataPelajaranQuery innerJoinTemplateUnRelatedByMp3Id($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUnRelatedByMp3Id relation
 *
 * @method MataPelajaranQuery leftJoinTemplateUnRelatedByMp4Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUnRelatedByMp4Id relation
 * @method MataPelajaranQuery rightJoinTemplateUnRelatedByMp4Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUnRelatedByMp4Id relation
 * @method MataPelajaranQuery innerJoinTemplateUnRelatedByMp4Id($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUnRelatedByMp4Id relation
 *
 * @method MataPelajaranQuery leftJoinTemplateUnRelatedByMp7Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUnRelatedByMp7Id relation
 * @method MataPelajaranQuery rightJoinTemplateUnRelatedByMp7Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUnRelatedByMp7Id relation
 * @method MataPelajaranQuery innerJoinTemplateUnRelatedByMp7Id($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUnRelatedByMp7Id relation
 *
 * @method MataPelajaranQuery leftJoinTemplateUnRelatedByMp5Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUnRelatedByMp5Id relation
 * @method MataPelajaranQuery rightJoinTemplateUnRelatedByMp5Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUnRelatedByMp5Id relation
 * @method MataPelajaranQuery innerJoinTemplateUnRelatedByMp5Id($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUnRelatedByMp5Id relation
 *
 * @method MataPelajaranQuery leftJoinTemplateUnRelatedByMp1Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUnRelatedByMp1Id relation
 * @method MataPelajaranQuery rightJoinTemplateUnRelatedByMp1Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUnRelatedByMp1Id relation
 * @method MataPelajaranQuery innerJoinTemplateUnRelatedByMp1Id($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUnRelatedByMp1Id relation
 *
 * @method MataPelajaranQuery leftJoinTemplateUnRelatedByMp2Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUnRelatedByMp2Id relation
 * @method MataPelajaranQuery rightJoinTemplateUnRelatedByMp2Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUnRelatedByMp2Id relation
 * @method MataPelajaranQuery innerJoinTemplateUnRelatedByMp2Id($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUnRelatedByMp2Id relation
 *
 * @method MataPelajaranQuery leftJoinTemplateUnRelatedByMp6Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUnRelatedByMp6Id relation
 * @method MataPelajaranQuery rightJoinTemplateUnRelatedByMp6Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUnRelatedByMp6Id relation
 * @method MataPelajaranQuery innerJoinTemplateUnRelatedByMp6Id($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUnRelatedByMp6Id relation
 *
 * @method MataPelajaran findOne(PropelPDO $con = null) Return the first MataPelajaran matching the query
 * @method MataPelajaran findOneOrCreate(PropelPDO $con = null) Return the first MataPelajaran matching the query, or a new MataPelajaran object populated from the query conditions when no match is found
 *
 * @method MataPelajaran findOneByNama(string $nama) Return the first MataPelajaran filtered by the nama column
 * @method MataPelajaran findOneByPilihanSekolah(string $pilihan_sekolah) Return the first MataPelajaran filtered by the pilihan_sekolah column
 * @method MataPelajaran findOneByPilihanBuku(string $pilihan_buku) Return the first MataPelajaran filtered by the pilihan_buku column
 * @method MataPelajaran findOneByPilihanKepengawasan(string $pilihan_kepengawasan) Return the first MataPelajaran filtered by the pilihan_kepengawasan column
 * @method MataPelajaran findOneByPilihanEvaluasi(string $pilihan_evaluasi) Return the first MataPelajaran filtered by the pilihan_evaluasi column
 * @method MataPelajaran findOneByJurusanId(string $jurusan_id) Return the first MataPelajaran filtered by the jurusan_id column
 * @method MataPelajaran findOneByCreateDate(string $create_date) Return the first MataPelajaran filtered by the create_date column
 * @method MataPelajaran findOneByLastUpdate(string $last_update) Return the first MataPelajaran filtered by the last_update column
 * @method MataPelajaran findOneByExpiredDate(string $expired_date) Return the first MataPelajaran filtered by the expired_date column
 * @method MataPelajaran findOneByLastSync(string $last_sync) Return the first MataPelajaran filtered by the last_sync column
 *
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return MataPelajaran objects filtered by the mata_pelajaran_id column
 * @method array findByNama(string $nama) Return MataPelajaran objects filtered by the nama column
 * @method array findByPilihanSekolah(string $pilihan_sekolah) Return MataPelajaran objects filtered by the pilihan_sekolah column
 * @method array findByPilihanBuku(string $pilihan_buku) Return MataPelajaran objects filtered by the pilihan_buku column
 * @method array findByPilihanKepengawasan(string $pilihan_kepengawasan) Return MataPelajaran objects filtered by the pilihan_kepengawasan column
 * @method array findByPilihanEvaluasi(string $pilihan_evaluasi) Return MataPelajaran objects filtered by the pilihan_evaluasi column
 * @method array findByJurusanId(string $jurusan_id) Return MataPelajaran objects filtered by the jurusan_id column
 * @method array findByCreateDate(string $create_date) Return MataPelajaran objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return MataPelajaran objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return MataPelajaran objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return MataPelajaran objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMataPelajaranQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMataPelajaranQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\MataPelajaran', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MataPelajaranQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MataPelajaranQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MataPelajaranQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MataPelajaranQuery) {
            return $criteria;
        }
        $query = new MataPelajaranQuery();
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
     * @return   MataPelajaran|MataPelajaran[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MataPelajaranPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MataPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MataPelajaran A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByMataPelajaranId($key, $con = null)
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
     * @return                 MataPelajaran A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "mata_pelajaran_id", "nama", "pilihan_sekolah", "pilihan_buku", "pilihan_kepengawasan", "pilihan_evaluasi", "jurusan_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."mata_pelajaran" WHERE "mata_pelajaran_id" = :p0';
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
            $obj = new MataPelajaran();
            $obj->hydrate($row);
            MataPelajaranPeer::addInstanceToPool($obj, (string) $key);
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
     * @return MataPelajaran|MataPelajaran[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MataPelajaran[]|mixed the list of results, formatted by the current formatter
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
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $keys, Criteria::IN);
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
     * @param     mixed $mataPelajaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
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
     * @return MataPelajaranQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MataPelajaranPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the pilihan_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByPilihanSekolah(1234); // WHERE pilihan_sekolah = 1234
     * $query->filterByPilihanSekolah(array(12, 34)); // WHERE pilihan_sekolah IN (12, 34)
     * $query->filterByPilihanSekolah(array('min' => 12)); // WHERE pilihan_sekolah >= 12
     * $query->filterByPilihanSekolah(array('max' => 12)); // WHERE pilihan_sekolah <= 12
     * </code>
     *
     * @param     mixed $pilihanSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByPilihanSekolah($pilihanSekolah = null, $comparison = null)
    {
        if (is_array($pilihanSekolah)) {
            $useMinMax = false;
            if (isset($pilihanSekolah['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_SEKOLAH, $pilihanSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pilihanSekolah['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_SEKOLAH, $pilihanSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::PILIHAN_SEKOLAH, $pilihanSekolah, $comparison);
    }

    /**
     * Filter the query on the pilihan_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByPilihanBuku(1234); // WHERE pilihan_buku = 1234
     * $query->filterByPilihanBuku(array(12, 34)); // WHERE pilihan_buku IN (12, 34)
     * $query->filterByPilihanBuku(array('min' => 12)); // WHERE pilihan_buku >= 12
     * $query->filterByPilihanBuku(array('max' => 12)); // WHERE pilihan_buku <= 12
     * </code>
     *
     * @param     mixed $pilihanBuku The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByPilihanBuku($pilihanBuku = null, $comparison = null)
    {
        if (is_array($pilihanBuku)) {
            $useMinMax = false;
            if (isset($pilihanBuku['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_BUKU, $pilihanBuku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pilihanBuku['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_BUKU, $pilihanBuku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::PILIHAN_BUKU, $pilihanBuku, $comparison);
    }

    /**
     * Filter the query on the pilihan_kepengawasan column
     *
     * Example usage:
     * <code>
     * $query->filterByPilihanKepengawasan(1234); // WHERE pilihan_kepengawasan = 1234
     * $query->filterByPilihanKepengawasan(array(12, 34)); // WHERE pilihan_kepengawasan IN (12, 34)
     * $query->filterByPilihanKepengawasan(array('min' => 12)); // WHERE pilihan_kepengawasan >= 12
     * $query->filterByPilihanKepengawasan(array('max' => 12)); // WHERE pilihan_kepengawasan <= 12
     * </code>
     *
     * @param     mixed $pilihanKepengawasan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByPilihanKepengawasan($pilihanKepengawasan = null, $comparison = null)
    {
        if (is_array($pilihanKepengawasan)) {
            $useMinMax = false;
            if (isset($pilihanKepengawasan['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_KEPENGAWASAN, $pilihanKepengawasan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pilihanKepengawasan['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_KEPENGAWASAN, $pilihanKepengawasan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::PILIHAN_KEPENGAWASAN, $pilihanKepengawasan, $comparison);
    }

    /**
     * Filter the query on the pilihan_evaluasi column
     *
     * Example usage:
     * <code>
     * $query->filterByPilihanEvaluasi(1234); // WHERE pilihan_evaluasi = 1234
     * $query->filterByPilihanEvaluasi(array(12, 34)); // WHERE pilihan_evaluasi IN (12, 34)
     * $query->filterByPilihanEvaluasi(array('min' => 12)); // WHERE pilihan_evaluasi >= 12
     * $query->filterByPilihanEvaluasi(array('max' => 12)); // WHERE pilihan_evaluasi <= 12
     * </code>
     *
     * @param     mixed $pilihanEvaluasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByPilihanEvaluasi($pilihanEvaluasi = null, $comparison = null)
    {
        if (is_array($pilihanEvaluasi)) {
            $useMinMax = false;
            if (isset($pilihanEvaluasi['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_EVALUASI, $pilihanEvaluasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pilihanEvaluasi['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::PILIHAN_EVALUASI, $pilihanEvaluasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::PILIHAN_EVALUASI, $pilihanEvaluasi, $comparison);
    }

    /**
     * Filter the query on the jurusan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanId('fooValue');   // WHERE jurusan_id = 'fooValue'
     * $query->filterByJurusanId('%fooValue%'); // WHERE jurusan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByJurusanId($jurusanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanId)) {
                $jurusanId = str_replace('*', '%', $jurusanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::JURUSAN_ID, $jurusanId, $comparison);
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
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MataPelajaranPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MataPelajaranPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::JURUSAN_ID, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MataPelajaranPeer::JURUSAN_ID, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
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
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinJurusan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useJurusanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJurusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jurusan', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related Buku object
     *
     * @param   Buku|PropelObjectCollection $buku  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBuku($buku, $comparison = null)
    {
        if ($buku instanceof Buku) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $buku->getMataPelajaranId(), $comparison);
        } elseif ($buku instanceof PropelObjectCollection) {
            return $this
                ->useBukuQuery()
                ->filterByPrimaryKeys($buku->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBuku() only accepts arguments of type Buku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Buku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinBuku($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Buku');

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
            $this->addJoinObject($join, 'Buku');
        }

        return $this;
    }

    /**
     * Use the Buku relation Buku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuQuery A secondary query class using the current class as primary query
     */
    public function useBukuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Buku', '\DataDikdas\Model\BukuQuery');
    }

    /**
     * Filter the query by a related Kompetensi object
     *
     * @param   Kompetensi|PropelObjectCollection $kompetensi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKompetensi($kompetensi, $comparison = null)
    {
        if ($kompetensi instanceof Kompetensi) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $kompetensi->getMataPelajaranId(), $comparison);
        } elseif ($kompetensi instanceof PropelObjectCollection) {
            return $this
                ->useKompetensiQuery()
                ->filterByPrimaryKeys($kompetensi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKompetensi() only accepts arguments of type Kompetensi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kompetensi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinKompetensi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kompetensi');

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
            $this->addJoinObject($join, 'Kompetensi');
        }

        return $this;
    }

    /**
     * Use the Kompetensi relation Kompetensi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KompetensiQuery A secondary query class using the current class as primary query
     */
    public function useKompetensiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKompetensi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kompetensi', '\DataDikdas\Model\KompetensiQuery');
    }

    /**
     * Filter the query by a related MapBidangMataPelajaran object
     *
     * @param   MapBidangMataPelajaran|PropelObjectCollection $mapBidangMataPelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMapBidangMataPelajaran($mapBidangMataPelajaran, $comparison = null)
    {
        if ($mapBidangMataPelajaran instanceof MapBidangMataPelajaran) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mapBidangMataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mapBidangMataPelajaran instanceof PropelObjectCollection) {
            return $this
                ->useMapBidangMataPelajaranQuery()
                ->filterByPrimaryKeys($mapBidangMataPelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapBidangMataPelajaran() only accepts arguments of type MapBidangMataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapBidangMataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinMapBidangMataPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapBidangMataPelajaran');

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
            $this->addJoinObject($join, 'MapBidangMataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MapBidangMataPelajaran relation MapBidangMataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MapBidangMataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMapBidangMataPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapBidangMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapBidangMataPelajaran', '\DataDikdas\Model\MapBidangMataPelajaranQuery');
    }

    /**
     * Filter the query by a related MapelBiblio object
     *
     * @param   MapelBiblio|PropelObjectCollection $mapelBiblio  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMapelBiblio($mapelBiblio, $comparison = null)
    {
        if ($mapelBiblio instanceof MapelBiblio) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mapelBiblio->getMataPelajaranId(), $comparison);
        } elseif ($mapelBiblio instanceof PropelObjectCollection) {
            return $this
                ->useMapelBiblioQuery()
                ->filterByPrimaryKeys($mapelBiblio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapelBiblio() only accepts arguments of type MapelBiblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapelBiblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinMapelBiblio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapelBiblio');

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
            $this->addJoinObject($join, 'MapelBiblio');
        }

        return $this;
    }

    /**
     * Use the MapelBiblio relation MapelBiblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MapelBiblioQuery A secondary query class using the current class as primary query
     */
    public function useMapelBiblioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapelBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapelBiblio', '\DataDikdas\Model\MapelBiblioQuery');
    }

    /**
     * Filter the query by a related MataPelajaranKurikulum object
     *
     * @param   MataPelajaranKurikulum|PropelObjectCollection $mataPelajaranKurikulum  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranKurikulum($mataPelajaranKurikulum, $comparison = null)
    {
        if ($mataPelajaranKurikulum instanceof MataPelajaranKurikulum) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaranKurikulum->getMataPelajaranId(), $comparison);
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
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinMataPelajaranKurikulum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useMataPelajaranKurikulumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMataPelajaranKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranKurikulum', '\DataDikdas\Model\MataPelajaranKurikulumQuery');
    }

    /**
     * Filter the query by a related MatevRapor object
     *
     * @param   MatevRapor|PropelObjectCollection $matevRapor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMatevRapor($matevRapor, $comparison = null)
    {
        if ($matevRapor instanceof MatevRapor) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $matevRapor->getMataPelajaranId(), $comparison);
        } elseif ($matevRapor instanceof PropelObjectCollection) {
            return $this
                ->useMatevRaporQuery()
                ->filterByPrimaryKeys($matevRapor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMatevRapor() only accepts arguments of type MatevRapor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MatevRapor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinMatevRapor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MatevRapor');

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
            $this->addJoinObject($join, 'MatevRapor');
        }

        return $this;
    }

    /**
     * Use the MatevRapor relation MatevRapor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MatevRaporQuery A secondary query class using the current class as primary query
     */
    public function useMatevRaporQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMatevRapor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MatevRapor', '\DataDikdas\Model\MatevRaporQuery');
    }

    /**
     * Filter the query by a related Mulok object
     *
     * @param   Mulok|PropelObjectCollection $mulok  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMulok($mulok, $comparison = null)
    {
        if ($mulok instanceof Mulok) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mulok->getMataPelajaranId(), $comparison);
        } elseif ($mulok instanceof PropelObjectCollection) {
            return $this
                ->useMulokQuery()
                ->filterByPrimaryKeys($mulok->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMulok() only accepts arguments of type Mulok or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mulok relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinMulok($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mulok');

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
            $this->addJoinObject($join, 'Mulok');
        }

        return $this;
    }

    /**
     * Use the Mulok relation Mulok object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MulokQuery A secondary query class using the current class as primary query
     */
    public function useMulokQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMulok($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mulok', '\DataDikdas\Model\MulokQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaran($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $pembelajaran->getMataPelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            return $this
                ->usePembelajaranQuery()
                ->filterByPrimaryKeys($pembelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPembelajaran() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pembelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinPembelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pembelajaran');

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
            $this->addJoinObject($join, 'Pembelajaran');
        }

        return $this;
    }

    /**
     * Use the Pembelajaran relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPembelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pembelajaran', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $pengawasTerdaftar->getMataPelajaranId(), $comparison);
        } elseif ($pengawasTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePengawasTerdaftarQuery()
                ->filterByPrimaryKeys($pengawasTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPengawasTerdaftar() only accepts arguments of type PengawasTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PengawasTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PengawasTerdaftar');

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
            $this->addJoinObject($join, 'PengawasTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PengawasTerdaftar relation PengawasTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PengawasTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Filter the query by a related TemplateRapor object
     *
     * @param   TemplateRapor|PropelObjectCollection $templateRapor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateRapor($templateRapor, $comparison = null)
    {
        if ($templateRapor instanceof TemplateRapor) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateRapor->getMataPelajaranId(), $comparison);
        } elseif ($templateRapor instanceof PropelObjectCollection) {
            return $this
                ->useTemplateRaporQuery()
                ->filterByPrimaryKeys($templateRapor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateRapor() only accepts arguments of type TemplateRapor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateRapor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateRapor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateRapor');

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
            $this->addJoinObject($join, 'TemplateRapor');
        }

        return $this;
    }

    /**
     * Use the TemplateRapor relation TemplateRapor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateRaporQuery A secondary query class using the current class as primary query
     */
    public function useTemplateRaporQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTemplateRapor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateRapor', '\DataDikdas\Model\TemplateRaporQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUnRelatedByMp3Id($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateUn->getMp3Id(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnRelatedByMp3IdQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUnRelatedByMp3Id() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUnRelatedByMp3Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateUnRelatedByMp3Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUnRelatedByMp3Id');

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
            $this->addJoinObject($join, 'TemplateUnRelatedByMp3Id');
        }

        return $this;
    }

    /**
     * Use the TemplateUnRelatedByMp3Id relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnRelatedByMp3IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUnRelatedByMp3Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUnRelatedByMp3Id', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUnRelatedByMp4Id($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateUn->getMp4Id(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnRelatedByMp4IdQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUnRelatedByMp4Id() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUnRelatedByMp4Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateUnRelatedByMp4Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUnRelatedByMp4Id');

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
            $this->addJoinObject($join, 'TemplateUnRelatedByMp4Id');
        }

        return $this;
    }

    /**
     * Use the TemplateUnRelatedByMp4Id relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnRelatedByMp4IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUnRelatedByMp4Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUnRelatedByMp4Id', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUnRelatedByMp7Id($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateUn->getMp7Id(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnRelatedByMp7IdQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUnRelatedByMp7Id() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUnRelatedByMp7Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateUnRelatedByMp7Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUnRelatedByMp7Id');

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
            $this->addJoinObject($join, 'TemplateUnRelatedByMp7Id');
        }

        return $this;
    }

    /**
     * Use the TemplateUnRelatedByMp7Id relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnRelatedByMp7IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUnRelatedByMp7Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUnRelatedByMp7Id', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUnRelatedByMp5Id($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateUn->getMp5Id(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnRelatedByMp5IdQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUnRelatedByMp5Id() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUnRelatedByMp5Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateUnRelatedByMp5Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUnRelatedByMp5Id');

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
            $this->addJoinObject($join, 'TemplateUnRelatedByMp5Id');
        }

        return $this;
    }

    /**
     * Use the TemplateUnRelatedByMp5Id relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnRelatedByMp5IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUnRelatedByMp5Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUnRelatedByMp5Id', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUnRelatedByMp1Id($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateUn->getMp1Id(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnRelatedByMp1IdQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUnRelatedByMp1Id() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUnRelatedByMp1Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateUnRelatedByMp1Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUnRelatedByMp1Id');

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
            $this->addJoinObject($join, 'TemplateUnRelatedByMp1Id');
        }

        return $this;
    }

    /**
     * Use the TemplateUnRelatedByMp1Id relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnRelatedByMp1IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUnRelatedByMp1Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUnRelatedByMp1Id', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUnRelatedByMp2Id($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateUn->getMp2Id(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnRelatedByMp2IdQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUnRelatedByMp2Id() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUnRelatedByMp2Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateUnRelatedByMp2Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUnRelatedByMp2Id');

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
            $this->addJoinObject($join, 'TemplateUnRelatedByMp2Id');
        }

        return $this;
    }

    /**
     * Use the TemplateUnRelatedByMp2Id relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnRelatedByMp2IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUnRelatedByMp2Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUnRelatedByMp2Id', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUnRelatedByMp6Id($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $templateUn->getMp6Id(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnRelatedByMp6IdQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUnRelatedByMp6Id() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUnRelatedByMp6Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function joinTemplateUnRelatedByMp6Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUnRelatedByMp6Id');

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
            $this->addJoinObject($join, 'TemplateUnRelatedByMp6Id');
        }

        return $this;
    }

    /**
     * Use the TemplateUnRelatedByMp6Id relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnRelatedByMp6IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUnRelatedByMp6Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUnRelatedByMp6Id', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MataPelajaran $mataPelajaran Object to remove from the list of results
     *
     * @return MataPelajaranQuery The current query, for fluid interface
     */
    public function prune($mataPelajaran = null)
    {
        if ($mataPelajaran) {
            $this->addUsingAlias(MataPelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
