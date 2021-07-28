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
use DataDikdas\Model\JenisLembaga;
use DataDikdas\Model\JenisPtk;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyKerjaPeer;
use DataDikdas\Model\RwyKerjaQuery;
use DataDikdas\Model\StatusKepegawaian;
use DataDikdas\Model\VldRwyKerja;

/**
 * Base class that represents a query for the 'rwy_kerja' table.
 *
 * 
 *
 * @method RwyKerjaQuery orderByRwyKerjaId($order = Criteria::ASC) Order by the rwy_kerja_id column
 * @method RwyKerjaQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method RwyKerjaQuery orderByJenisLembagaId($order = Criteria::ASC) Order by the jenis_lembaga_id column
 * @method RwyKerjaQuery orderByStatusKepegawaianId($order = Criteria::ASC) Order by the status_kepegawaian_id column
 * @method RwyKerjaQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method RwyKerjaQuery orderByJenisPtkId($order = Criteria::ASC) Order by the jenis_ptk_id column
 * @method RwyKerjaQuery orderByLembagaPengangkat($order = Criteria::ASC) Order by the lembaga_pengangkat column
 * @method RwyKerjaQuery orderByNoSkKerja($order = Criteria::ASC) Order by the no_sk_kerja column
 * @method RwyKerjaQuery orderByTglSkKerja($order = Criteria::ASC) Order by the tgl_sk_kerja column
 * @method RwyKerjaQuery orderByTmtKerja($order = Criteria::ASC) Order by the tmt_kerja column
 * @method RwyKerjaQuery orderByTstKerja($order = Criteria::ASC) Order by the tst_kerja column
 * @method RwyKerjaQuery orderByTempatKerja($order = Criteria::ASC) Order by the tempat_kerja column
 * @method RwyKerjaQuery orderByTtdSkKerja($order = Criteria::ASC) Order by the ttd_sk_kerja column
 * @method RwyKerjaQuery orderByMapelDiajarkan($order = Criteria::ASC) Order by the mapel_diajarkan column
 * @method RwyKerjaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RwyKerjaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RwyKerjaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RwyKerjaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RwyKerjaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RwyKerjaQuery groupByRwyKerjaId() Group by the rwy_kerja_id column
 * @method RwyKerjaQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method RwyKerjaQuery groupByJenisLembagaId() Group by the jenis_lembaga_id column
 * @method RwyKerjaQuery groupByStatusKepegawaianId() Group by the status_kepegawaian_id column
 * @method RwyKerjaQuery groupByPtkId() Group by the ptk_id column
 * @method RwyKerjaQuery groupByJenisPtkId() Group by the jenis_ptk_id column
 * @method RwyKerjaQuery groupByLembagaPengangkat() Group by the lembaga_pengangkat column
 * @method RwyKerjaQuery groupByNoSkKerja() Group by the no_sk_kerja column
 * @method RwyKerjaQuery groupByTglSkKerja() Group by the tgl_sk_kerja column
 * @method RwyKerjaQuery groupByTmtKerja() Group by the tmt_kerja column
 * @method RwyKerjaQuery groupByTstKerja() Group by the tst_kerja column
 * @method RwyKerjaQuery groupByTempatKerja() Group by the tempat_kerja column
 * @method RwyKerjaQuery groupByTtdSkKerja() Group by the ttd_sk_kerja column
 * @method RwyKerjaQuery groupByMapelDiajarkan() Group by the mapel_diajarkan column
 * @method RwyKerjaQuery groupByCreateDate() Group by the create_date column
 * @method RwyKerjaQuery groupByLastUpdate() Group by the last_update column
 * @method RwyKerjaQuery groupBySoftDelete() Group by the soft_delete column
 * @method RwyKerjaQuery groupByLastSync() Group by the last_sync column
 * @method RwyKerjaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RwyKerjaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RwyKerjaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RwyKerjaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RwyKerjaQuery leftJoinJenisLembaga($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisLembaga relation
 * @method RwyKerjaQuery rightJoinJenisLembaga($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisLembaga relation
 * @method RwyKerjaQuery innerJoinJenisLembaga($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisLembaga relation
 *
 * @method RwyKerjaQuery leftJoinJenisPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPtk relation
 * @method RwyKerjaQuery rightJoinJenisPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPtk relation
 * @method RwyKerjaQuery innerJoinJenisPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPtk relation
 *
 * @method RwyKerjaQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method RwyKerjaQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method RwyKerjaQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method RwyKerjaQuery leftJoinStatusKepegawaian($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKepegawaian relation
 * @method RwyKerjaQuery rightJoinStatusKepegawaian($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKepegawaian relation
 * @method RwyKerjaQuery innerJoinStatusKepegawaian($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKepegawaian relation
 *
 * @method RwyKerjaQuery leftJoinJenjangPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikan relation
 * @method RwyKerjaQuery rightJoinJenjangPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikan relation
 * @method RwyKerjaQuery innerJoinJenjangPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikan relation
 *
 * @method RwyKerjaQuery leftJoinVldRwyKerja($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyKerja relation
 * @method RwyKerjaQuery rightJoinVldRwyKerja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyKerja relation
 * @method RwyKerjaQuery innerJoinVldRwyKerja($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyKerja relation
 *
 * @method RwyKerja findOne(PropelPDO $con = null) Return the first RwyKerja matching the query
 * @method RwyKerja findOneOrCreate(PropelPDO $con = null) Return the first RwyKerja matching the query, or a new RwyKerja object populated from the query conditions when no match is found
 *
 * @method RwyKerja findOneByJenjangPendidikanId(string $jenjang_pendidikan_id) Return the first RwyKerja filtered by the jenjang_pendidikan_id column
 * @method RwyKerja findOneByJenisLembagaId(string $jenis_lembaga_id) Return the first RwyKerja filtered by the jenis_lembaga_id column
 * @method RwyKerja findOneByStatusKepegawaianId(int $status_kepegawaian_id) Return the first RwyKerja filtered by the status_kepegawaian_id column
 * @method RwyKerja findOneByPtkId(string $ptk_id) Return the first RwyKerja filtered by the ptk_id column
 * @method RwyKerja findOneByJenisPtkId(string $jenis_ptk_id) Return the first RwyKerja filtered by the jenis_ptk_id column
 * @method RwyKerja findOneByLembagaPengangkat(string $lembaga_pengangkat) Return the first RwyKerja filtered by the lembaga_pengangkat column
 * @method RwyKerja findOneByNoSkKerja(string $no_sk_kerja) Return the first RwyKerja filtered by the no_sk_kerja column
 * @method RwyKerja findOneByTglSkKerja(string $tgl_sk_kerja) Return the first RwyKerja filtered by the tgl_sk_kerja column
 * @method RwyKerja findOneByTmtKerja(string $tmt_kerja) Return the first RwyKerja filtered by the tmt_kerja column
 * @method RwyKerja findOneByTstKerja(string $tst_kerja) Return the first RwyKerja filtered by the tst_kerja column
 * @method RwyKerja findOneByTempatKerja(string $tempat_kerja) Return the first RwyKerja filtered by the tempat_kerja column
 * @method RwyKerja findOneByTtdSkKerja(string $ttd_sk_kerja) Return the first RwyKerja filtered by the ttd_sk_kerja column
 * @method RwyKerja findOneByMapelDiajarkan(string $mapel_diajarkan) Return the first RwyKerja filtered by the mapel_diajarkan column
 * @method RwyKerja findOneByCreateDate(string $create_date) Return the first RwyKerja filtered by the create_date column
 * @method RwyKerja findOneByLastUpdate(string $last_update) Return the first RwyKerja filtered by the last_update column
 * @method RwyKerja findOneBySoftDelete(string $soft_delete) Return the first RwyKerja filtered by the soft_delete column
 * @method RwyKerja findOneByLastSync(string $last_sync) Return the first RwyKerja filtered by the last_sync column
 * @method RwyKerja findOneByUpdaterId(string $updater_id) Return the first RwyKerja filtered by the updater_id column
 *
 * @method array findByRwyKerjaId(string $rwy_kerja_id) Return RwyKerja objects filtered by the rwy_kerja_id column
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return RwyKerja objects filtered by the jenjang_pendidikan_id column
 * @method array findByJenisLembagaId(string $jenis_lembaga_id) Return RwyKerja objects filtered by the jenis_lembaga_id column
 * @method array findByStatusKepegawaianId(int $status_kepegawaian_id) Return RwyKerja objects filtered by the status_kepegawaian_id column
 * @method array findByPtkId(string $ptk_id) Return RwyKerja objects filtered by the ptk_id column
 * @method array findByJenisPtkId(string $jenis_ptk_id) Return RwyKerja objects filtered by the jenis_ptk_id column
 * @method array findByLembagaPengangkat(string $lembaga_pengangkat) Return RwyKerja objects filtered by the lembaga_pengangkat column
 * @method array findByNoSkKerja(string $no_sk_kerja) Return RwyKerja objects filtered by the no_sk_kerja column
 * @method array findByTglSkKerja(string $tgl_sk_kerja) Return RwyKerja objects filtered by the tgl_sk_kerja column
 * @method array findByTmtKerja(string $tmt_kerja) Return RwyKerja objects filtered by the tmt_kerja column
 * @method array findByTstKerja(string $tst_kerja) Return RwyKerja objects filtered by the tst_kerja column
 * @method array findByTempatKerja(string $tempat_kerja) Return RwyKerja objects filtered by the tempat_kerja column
 * @method array findByTtdSkKerja(string $ttd_sk_kerja) Return RwyKerja objects filtered by the ttd_sk_kerja column
 * @method array findByMapelDiajarkan(string $mapel_diajarkan) Return RwyKerja objects filtered by the mapel_diajarkan column
 * @method array findByCreateDate(string $create_date) Return RwyKerja objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RwyKerja objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RwyKerja objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RwyKerja objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RwyKerja objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyKerjaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRwyKerjaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RwyKerja', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RwyKerjaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RwyKerjaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RwyKerjaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RwyKerjaQuery) {
            return $criteria;
        }
        $query = new RwyKerjaQuery();
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
     * @return   RwyKerja|RwyKerja[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RwyKerjaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwyKerja A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRwyKerjaId($key, $con = null)
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
     * @return                 RwyKerja A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "rwy_kerja_id", "jenjang_pendidikan_id", "jenis_lembaga_id", "status_kepegawaian_id", "ptk_id", "jenis_ptk_id", "lembaga_pengangkat", "no_sk_kerja", "tgl_sk_kerja", "tmt_kerja", "tst_kerja", "tempat_kerja", "ttd_sk_kerja", "mapel_diajarkan", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "rwy_kerja" WHERE "rwy_kerja_id" = :p0';
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
            $obj = new RwyKerja();
            $obj->hydrate($row);
            RwyKerjaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RwyKerja|RwyKerja[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RwyKerja[]|mixed the list of results, formatted by the current formatter
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
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RwyKerjaPeer::RWY_KERJA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RwyKerjaPeer::RWY_KERJA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the rwy_kerja_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRwyKerjaId('fooValue');   // WHERE rwy_kerja_id = 'fooValue'
     * $query->filterByRwyKerjaId('%fooValue%'); // WHERE rwy_kerja_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rwyKerjaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByRwyKerjaId($rwyKerjaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rwyKerjaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rwyKerjaId)) {
                $rwyKerjaId = str_replace('*', '%', $rwyKerjaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::RWY_KERJA_ID, $rwyKerjaId, $comparison);
    }

    /**
     * Filter the query on the jenjang_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPendidikanId(1234); // WHERE jenjang_pendidikan_id = 1234
     * $query->filterByJenjangPendidikanId(array(12, 34)); // WHERE jenjang_pendidikan_id IN (12, 34)
     * $query->filterByJenjangPendidikanId(array('min' => 12)); // WHERE jenjang_pendidikan_id >= 12
     * $query->filterByJenjangPendidikanId(array('max' => 12)); // WHERE jenjang_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByJenjangPendidikan()
     *
     * @param     mixed $jenjangPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
    }

    /**
     * Filter the query on the jenis_lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisLembagaId(1234); // WHERE jenis_lembaga_id = 1234
     * $query->filterByJenisLembagaId(array(12, 34)); // WHERE jenis_lembaga_id IN (12, 34)
     * $query->filterByJenisLembagaId(array('min' => 12)); // WHERE jenis_lembaga_id >= 12
     * $query->filterByJenisLembagaId(array('max' => 12)); // WHERE jenis_lembaga_id <= 12
     * </code>
     *
     * @see       filterByJenisLembaga()
     *
     * @param     mixed $jenisLembagaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByJenisLembagaId($jenisLembagaId = null, $comparison = null)
    {
        if (is_array($jenisLembagaId)) {
            $useMinMax = false;
            if (isset($jenisLembagaId['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::JENIS_LEMBAGA_ID, $jenisLembagaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisLembagaId['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::JENIS_LEMBAGA_ID, $jenisLembagaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::JENIS_LEMBAGA_ID, $jenisLembagaId, $comparison);
    }

    /**
     * Filter the query on the status_kepegawaian_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusKepegawaianId(1234); // WHERE status_kepegawaian_id = 1234
     * $query->filterByStatusKepegawaianId(array(12, 34)); // WHERE status_kepegawaian_id IN (12, 34)
     * $query->filterByStatusKepegawaianId(array('min' => 12)); // WHERE status_kepegawaian_id >= 12
     * $query->filterByStatusKepegawaianId(array('max' => 12)); // WHERE status_kepegawaian_id <= 12
     * </code>
     *
     * @see       filterByStatusKepegawaian()
     *
     * @param     mixed $statusKepegawaianId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByStatusKepegawaianId($statusKepegawaianId = null, $comparison = null)
    {
        if (is_array($statusKepegawaianId)) {
            $useMinMax = false;
            if (isset($statusKepegawaianId['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaianId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKepegawaianId['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaianId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaianId, $comparison);
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%'); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkId)) {
                $ptkId = str_replace('*', '%', $ptkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the jenis_ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPtkId(1234); // WHERE jenis_ptk_id = 1234
     * $query->filterByJenisPtkId(array(12, 34)); // WHERE jenis_ptk_id IN (12, 34)
     * $query->filterByJenisPtkId(array('min' => 12)); // WHERE jenis_ptk_id >= 12
     * $query->filterByJenisPtkId(array('max' => 12)); // WHERE jenis_ptk_id <= 12
     * </code>
     *
     * @see       filterByJenisPtk()
     *
     * @param     mixed $jenisPtkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByJenisPtkId($jenisPtkId = null, $comparison = null)
    {
        if (is_array($jenisPtkId)) {
            $useMinMax = false;
            if (isset($jenisPtkId['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::JENIS_PTK_ID, $jenisPtkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPtkId['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::JENIS_PTK_ID, $jenisPtkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::JENIS_PTK_ID, $jenisPtkId, $comparison);
    }

    /**
     * Filter the query on the lembaga_pengangkat column
     *
     * Example usage:
     * <code>
     * $query->filterByLembagaPengangkat('fooValue');   // WHERE lembaga_pengangkat = 'fooValue'
     * $query->filterByLembagaPengangkat('%fooValue%'); // WHERE lembaga_pengangkat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lembagaPengangkat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByLembagaPengangkat($lembagaPengangkat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lembagaPengangkat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lembagaPengangkat)) {
                $lembagaPengangkat = str_replace('*', '%', $lembagaPengangkat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::LEMBAGA_PENGANGKAT, $lembagaPengangkat, $comparison);
    }

    /**
     * Filter the query on the no_sk_kerja column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSkKerja('fooValue');   // WHERE no_sk_kerja = 'fooValue'
     * $query->filterByNoSkKerja('%fooValue%'); // WHERE no_sk_kerja LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSkKerja The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByNoSkKerja($noSkKerja = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSkKerja)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSkKerja)) {
                $noSkKerja = str_replace('*', '%', $noSkKerja);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::NO_SK_KERJA, $noSkKerja, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_kerja column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkKerja('2011-03-14'); // WHERE tgl_sk_kerja = '2011-03-14'
     * $query->filterByTglSkKerja('now'); // WHERE tgl_sk_kerja = '2011-03-14'
     * $query->filterByTglSkKerja(array('max' => 'yesterday')); // WHERE tgl_sk_kerja > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkKerja The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByTglSkKerja($tglSkKerja = null, $comparison = null)
    {
        if (is_array($tglSkKerja)) {
            $useMinMax = false;
            if (isset($tglSkKerja['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::TGL_SK_KERJA, $tglSkKerja['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkKerja['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::TGL_SK_KERJA, $tglSkKerja['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::TGL_SK_KERJA, $tglSkKerja, $comparison);
    }

    /**
     * Filter the query on the tmt_kerja column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtKerja('2011-03-14'); // WHERE tmt_kerja = '2011-03-14'
     * $query->filterByTmtKerja('now'); // WHERE tmt_kerja = '2011-03-14'
     * $query->filterByTmtKerja(array('max' => 'yesterday')); // WHERE tmt_kerja > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtKerja The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByTmtKerja($tmtKerja = null, $comparison = null)
    {
        if (is_array($tmtKerja)) {
            $useMinMax = false;
            if (isset($tmtKerja['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::TMT_KERJA, $tmtKerja['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtKerja['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::TMT_KERJA, $tmtKerja['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::TMT_KERJA, $tmtKerja, $comparison);
    }

    /**
     * Filter the query on the tst_kerja column
     *
     * Example usage:
     * <code>
     * $query->filterByTstKerja('2011-03-14'); // WHERE tst_kerja = '2011-03-14'
     * $query->filterByTstKerja('now'); // WHERE tst_kerja = '2011-03-14'
     * $query->filterByTstKerja(array('max' => 'yesterday')); // WHERE tst_kerja > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstKerja The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByTstKerja($tstKerja = null, $comparison = null)
    {
        if (is_array($tstKerja)) {
            $useMinMax = false;
            if (isset($tstKerja['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::TST_KERJA, $tstKerja['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstKerja['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::TST_KERJA, $tstKerja['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::TST_KERJA, $tstKerja, $comparison);
    }

    /**
     * Filter the query on the tempat_kerja column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatKerja('fooValue');   // WHERE tempat_kerja = 'fooValue'
     * $query->filterByTempatKerja('%fooValue%'); // WHERE tempat_kerja LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tempatKerja The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByTempatKerja($tempatKerja = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tempatKerja)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tempatKerja)) {
                $tempatKerja = str_replace('*', '%', $tempatKerja);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::TEMPAT_KERJA, $tempatKerja, $comparison);
    }

    /**
     * Filter the query on the ttd_sk_kerja column
     *
     * Example usage:
     * <code>
     * $query->filterByTtdSkKerja('fooValue');   // WHERE ttd_sk_kerja = 'fooValue'
     * $query->filterByTtdSkKerja('%fooValue%'); // WHERE ttd_sk_kerja LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ttdSkKerja The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByTtdSkKerja($ttdSkKerja = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ttdSkKerja)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ttdSkKerja)) {
                $ttdSkKerja = str_replace('*', '%', $ttdSkKerja);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::TTD_SK_KERJA, $ttdSkKerja, $comparison);
    }

    /**
     * Filter the query on the mapel_diajarkan column
     *
     * Example usage:
     * <code>
     * $query->filterByMapelDiajarkan('fooValue');   // WHERE mapel_diajarkan = 'fooValue'
     * $query->filterByMapelDiajarkan('%fooValue%'); // WHERE mapel_diajarkan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mapelDiajarkan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByMapelDiajarkan($mapelDiajarkan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mapelDiajarkan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mapelDiajarkan)) {
                $mapelDiajarkan = str_replace('*', '%', $mapelDiajarkan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::MAPEL_DIAJARKAN, $mapelDiajarkan, $comparison);
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
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RwyKerjaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RwyKerjaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKerjaPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RwyKerjaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyKerjaPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisLembaga object
     *
     * @param   JenisLembaga|PropelObjectCollection $jenisLembaga The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKerjaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisLembaga($jenisLembaga, $comparison = null)
    {
        if ($jenisLembaga instanceof JenisLembaga) {
            return $this
                ->addUsingAlias(RwyKerjaPeer::JENIS_LEMBAGA_ID, $jenisLembaga->getJenisLembagaId(), $comparison);
        } elseif ($jenisLembaga instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyKerjaPeer::JENIS_LEMBAGA_ID, $jenisLembaga->toKeyValue('PrimaryKey', 'JenisLembagaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisLembaga() only accepts arguments of type JenisLembaga or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisLembaga relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function joinJenisLembaga($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisLembaga');

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
            $this->addJoinObject($join, 'JenisLembaga');
        }

        return $this;
    }

    /**
     * Use the JenisLembaga relation JenisLembaga object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisLembagaQuery A secondary query class using the current class as primary query
     */
    public function useJenisLembagaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisLembaga($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisLembaga', '\DataDikdas\Model\JenisLembagaQuery');
    }

    /**
     * Filter the query by a related JenisPtk object
     *
     * @param   JenisPtk|PropelObjectCollection $jenisPtk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKerjaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPtk($jenisPtk, $comparison = null)
    {
        if ($jenisPtk instanceof JenisPtk) {
            return $this
                ->addUsingAlias(RwyKerjaPeer::JENIS_PTK_ID, $jenisPtk->getJenisPtkId(), $comparison);
        } elseif ($jenisPtk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyKerjaPeer::JENIS_PTK_ID, $jenisPtk->toKeyValue('PrimaryKey', 'JenisPtkId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPtk() only accepts arguments of type JenisPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function joinJenisPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPtk');

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
            $this->addJoinObject($join, 'JenisPtk');
        }

        return $this;
    }

    /**
     * Use the JenisPtk relation JenisPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPtkQuery A secondary query class using the current class as primary query
     */
    public function useJenisPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPtk', '\DataDikdas\Model\JenisPtkQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKerjaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(RwyKerjaPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyKerjaPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return RwyKerjaQuery The current query, for fluid interface
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
     * Filter the query by a related StatusKepegawaian object
     *
     * @param   StatusKepegawaian|PropelObjectCollection $statusKepegawaian The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKerjaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKepegawaian($statusKepegawaian, $comparison = null)
    {
        if ($statusKepegawaian instanceof StatusKepegawaian) {
            return $this
                ->addUsingAlias(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaian->getStatusKepegawaianId(), $comparison);
        } elseif ($statusKepegawaian instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaian->toKeyValue('PrimaryKey', 'StatusKepegawaianId'), $comparison);
        } else {
            throw new PropelException('filterByStatusKepegawaian() only accepts arguments of type StatusKepegawaian or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusKepegawaian relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function joinStatusKepegawaian($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusKepegawaian');

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
            $this->addJoinObject($join, 'StatusKepegawaian');
        }

        return $this;
    }

    /**
     * Use the StatusKepegawaian relation StatusKepegawaian object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StatusKepegawaianQuery A secondary query class using the current class as primary query
     */
    public function useStatusKepegawaianQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusKepegawaian($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusKepegawaian', '\DataDikdas\Model\StatusKepegawaianQuery');
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKerjaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikan($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangPendidikan() only accepts arguments of type JenjangPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangPendidikan');

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
            $this->addJoinObject($join, 'JenjangPendidikan');
        }

        return $this;
    }

    /**
     * Use the JenjangPendidikan relation JenjangPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangPendidikanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenjangPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikan', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related VldRwyKerja object
     *
     * @param   VldRwyKerja|PropelObjectCollection $vldRwyKerja  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKerjaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyKerja($vldRwyKerja, $comparison = null)
    {
        if ($vldRwyKerja instanceof VldRwyKerja) {
            return $this
                ->addUsingAlias(RwyKerjaPeer::RWY_KERJA_ID, $vldRwyKerja->getRwyKerjaId(), $comparison);
        } elseif ($vldRwyKerja instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyKerjaQuery()
                ->filterByPrimaryKeys($vldRwyKerja->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyKerja() only accepts arguments of type VldRwyKerja or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyKerja relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function joinVldRwyKerja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyKerja');

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
            $this->addJoinObject($join, 'VldRwyKerja');
        }

        return $this;
    }

    /**
     * Use the VldRwyKerja relation VldRwyKerja object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyKerjaQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyKerjaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyKerja($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyKerja', '\DataDikdas\Model\VldRwyKerjaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RwyKerja $rwyKerja Object to remove from the list of results
     *
     * @return RwyKerjaQuery The current query, for fluid interface
     */
    public function prune($rwyKerja = null)
    {
        if ($rwyKerja) {
            $this->addUsingAlias(RwyKerjaPeer::RWY_KERJA_ID, $rwyKerja->getRwyKerjaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
