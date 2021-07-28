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
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\ProgramInklusi;
use DataDikdas\Model\ProgramInklusiPeer;
use DataDikdas\Model\ProgramInklusiQuery;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'program_inklusi' table.
 *
 * 
 *
 * @method ProgramInklusiQuery orderByIdPi($order = Criteria::ASC) Order by the id_pi column
 * @method ProgramInklusiQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method ProgramInklusiQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method ProgramInklusiQuery orderBySkPi($order = Criteria::ASC) Order by the sk_pi column
 * @method ProgramInklusiQuery orderByTglSkPi($order = Criteria::ASC) Order by the tgl_sk_pi column
 * @method ProgramInklusiQuery orderByTmtPi($order = Criteria::ASC) Order by the tmt_pi column
 * @method ProgramInklusiQuery orderByTstPi($order = Criteria::ASC) Order by the tst_pi column
 * @method ProgramInklusiQuery orderByKetPi($order = Criteria::ASC) Order by the ket_pi column
 * @method ProgramInklusiQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method ProgramInklusiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method ProgramInklusiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method ProgramInklusiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method ProgramInklusiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method ProgramInklusiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method ProgramInklusiQuery groupByIdPi() Group by the id_pi column
 * @method ProgramInklusiQuery groupBySekolahId() Group by the sekolah_id column
 * @method ProgramInklusiQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method ProgramInklusiQuery groupBySkPi() Group by the sk_pi column
 * @method ProgramInklusiQuery groupByTglSkPi() Group by the tgl_sk_pi column
 * @method ProgramInklusiQuery groupByTmtPi() Group by the tmt_pi column
 * @method ProgramInklusiQuery groupByTstPi() Group by the tst_pi column
 * @method ProgramInklusiQuery groupByKetPi() Group by the ket_pi column
 * @method ProgramInklusiQuery groupByAsalData() Group by the asal_data column
 * @method ProgramInklusiQuery groupByCreateDate() Group by the create_date column
 * @method ProgramInklusiQuery groupByLastUpdate() Group by the last_update column
 * @method ProgramInklusiQuery groupBySoftDelete() Group by the soft_delete column
 * @method ProgramInklusiQuery groupByLastSync() Group by the last_sync column
 * @method ProgramInklusiQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method ProgramInklusiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProgramInklusiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProgramInklusiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProgramInklusiQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method ProgramInklusiQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method ProgramInklusiQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method ProgramInklusiQuery leftJoinKebutuhanKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhusus relation
 * @method ProgramInklusiQuery rightJoinKebutuhanKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhusus relation
 * @method ProgramInklusiQuery innerJoinKebutuhanKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhusus relation
 *
 * @method ProgramInklusi findOne(PropelPDO $con = null) Return the first ProgramInklusi matching the query
 * @method ProgramInklusi findOneOrCreate(PropelPDO $con = null) Return the first ProgramInklusi matching the query, or a new ProgramInklusi object populated from the query conditions when no match is found
 *
 * @method ProgramInklusi findOneBySekolahId(string $sekolah_id) Return the first ProgramInklusi filtered by the sekolah_id column
 * @method ProgramInklusi findOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first ProgramInklusi filtered by the kebutuhan_khusus_id column
 * @method ProgramInklusi findOneBySkPi(string $sk_pi) Return the first ProgramInklusi filtered by the sk_pi column
 * @method ProgramInklusi findOneByTglSkPi(string $tgl_sk_pi) Return the first ProgramInklusi filtered by the tgl_sk_pi column
 * @method ProgramInklusi findOneByTmtPi(string $tmt_pi) Return the first ProgramInklusi filtered by the tmt_pi column
 * @method ProgramInklusi findOneByTstPi(string $tst_pi) Return the first ProgramInklusi filtered by the tst_pi column
 * @method ProgramInklusi findOneByKetPi(string $ket_pi) Return the first ProgramInklusi filtered by the ket_pi column
 * @method ProgramInklusi findOneByAsalData(string $asal_data) Return the first ProgramInklusi filtered by the asal_data column
 * @method ProgramInklusi findOneByCreateDate(string $create_date) Return the first ProgramInklusi filtered by the create_date column
 * @method ProgramInklusi findOneByLastUpdate(string $last_update) Return the first ProgramInklusi filtered by the last_update column
 * @method ProgramInklusi findOneBySoftDelete(string $soft_delete) Return the first ProgramInklusi filtered by the soft_delete column
 * @method ProgramInklusi findOneByLastSync(string $last_sync) Return the first ProgramInklusi filtered by the last_sync column
 * @method ProgramInklusi findOneByUpdaterId(string $updater_id) Return the first ProgramInklusi filtered by the updater_id column
 *
 * @method array findByIdPi(string $id_pi) Return ProgramInklusi objects filtered by the id_pi column
 * @method array findBySekolahId(string $sekolah_id) Return ProgramInklusi objects filtered by the sekolah_id column
 * @method array findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return ProgramInklusi objects filtered by the kebutuhan_khusus_id column
 * @method array findBySkPi(string $sk_pi) Return ProgramInklusi objects filtered by the sk_pi column
 * @method array findByTglSkPi(string $tgl_sk_pi) Return ProgramInklusi objects filtered by the tgl_sk_pi column
 * @method array findByTmtPi(string $tmt_pi) Return ProgramInklusi objects filtered by the tmt_pi column
 * @method array findByTstPi(string $tst_pi) Return ProgramInklusi objects filtered by the tst_pi column
 * @method array findByKetPi(string $ket_pi) Return ProgramInklusi objects filtered by the ket_pi column
 * @method array findByAsalData(string $asal_data) Return ProgramInklusi objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return ProgramInklusi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return ProgramInklusi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return ProgramInklusi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return ProgramInklusi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return ProgramInklusi objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseProgramInklusiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProgramInklusiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\ProgramInklusi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProgramInklusiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProgramInklusiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProgramInklusiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProgramInklusiQuery) {
            return $criteria;
        }
        $query = new ProgramInklusiQuery();
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
     * @return   ProgramInklusi|ProgramInklusi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProgramInklusiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProgramInklusiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProgramInklusi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPi($key, $con = null)
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
     * @return                 ProgramInklusi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_pi", "sekolah_id", "kebutuhan_khusus_id", "sk_pi", "tgl_sk_pi", "tmt_pi", "tst_pi", "ket_pi", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "program_inklusi" WHERE "id_pi" = :p0';
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
            $obj = new ProgramInklusi();
            $obj->hydrate($row);
            ProgramInklusiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProgramInklusi|ProgramInklusi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProgramInklusi[]|mixed the list of results, formatted by the current formatter
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
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProgramInklusiPeer::ID_PI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProgramInklusiPeer::ID_PI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_pi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPi('fooValue');   // WHERE id_pi = 'fooValue'
     * $query->filterByIdPi('%fooValue%'); // WHERE id_pi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idPi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByIdPi($idPi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idPi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idPi)) {
                $idPi = str_replace('*', '%', $idPi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::ID_PI, $idPi, $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProgramInklusiPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususId(1234); // WHERE kebutuhan_khusus_id = 1234
     * $query->filterByKebutuhanKhususId(array(12, 34)); // WHERE kebutuhan_khusus_id IN (12, 34)
     * $query->filterByKebutuhanKhususId(array('min' => 12)); // WHERE kebutuhan_khusus_id >= 12
     * $query->filterByKebutuhanKhususId(array('max' => 12)); // WHERE kebutuhan_khusus_id <= 12
     * </code>
     *
     * @see       filterByKebutuhanKhusus()
     *
     * @param     mixed $kebutuhanKhususId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
    }

    /**
     * Filter the query on the sk_pi column
     *
     * Example usage:
     * <code>
     * $query->filterBySkPi('fooValue');   // WHERE sk_pi = 'fooValue'
     * $query->filterBySkPi('%fooValue%'); // WHERE sk_pi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skPi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterBySkPi($skPi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skPi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skPi)) {
                $skPi = str_replace('*', '%', $skPi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::SK_PI, $skPi, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_pi column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkPi('2011-03-14'); // WHERE tgl_sk_pi = '2011-03-14'
     * $query->filterByTglSkPi('now'); // WHERE tgl_sk_pi = '2011-03-14'
     * $query->filterByTglSkPi(array('max' => 'yesterday')); // WHERE tgl_sk_pi > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkPi The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByTglSkPi($tglSkPi = null, $comparison = null)
    {
        if (is_array($tglSkPi)) {
            $useMinMax = false;
            if (isset($tglSkPi['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::TGL_SK_PI, $tglSkPi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkPi['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::TGL_SK_PI, $tglSkPi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::TGL_SK_PI, $tglSkPi, $comparison);
    }

    /**
     * Filter the query on the tmt_pi column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtPi('2011-03-14'); // WHERE tmt_pi = '2011-03-14'
     * $query->filterByTmtPi('now'); // WHERE tmt_pi = '2011-03-14'
     * $query->filterByTmtPi(array('max' => 'yesterday')); // WHERE tmt_pi > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtPi The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByTmtPi($tmtPi = null, $comparison = null)
    {
        if (is_array($tmtPi)) {
            $useMinMax = false;
            if (isset($tmtPi['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::TMT_PI, $tmtPi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtPi['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::TMT_PI, $tmtPi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::TMT_PI, $tmtPi, $comparison);
    }

    /**
     * Filter the query on the tst_pi column
     *
     * Example usage:
     * <code>
     * $query->filterByTstPi('2011-03-14'); // WHERE tst_pi = '2011-03-14'
     * $query->filterByTstPi('now'); // WHERE tst_pi = '2011-03-14'
     * $query->filterByTstPi(array('max' => 'yesterday')); // WHERE tst_pi > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstPi The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByTstPi($tstPi = null, $comparison = null)
    {
        if (is_array($tstPi)) {
            $useMinMax = false;
            if (isset($tstPi['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::TST_PI, $tstPi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstPi['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::TST_PI, $tstPi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::TST_PI, $tstPi, $comparison);
    }

    /**
     * Filter the query on the ket_pi column
     *
     * Example usage:
     * <code>
     * $query->filterByKetPi('fooValue');   // WHERE ket_pi = 'fooValue'
     * $query->filterByKetPi('%fooValue%'); // WHERE ket_pi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketPi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByKetPi($ketPi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketPi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketPi)) {
                $ketPi = str_replace('*', '%', $ketPi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::KET_PI, $ketPi, $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProgramInklusiPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(ProgramInklusiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(ProgramInklusiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProgramInklusiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProgramInklusiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProgramInklusiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(ProgramInklusiPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProgramInklusiPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return ProgramInklusiQuery The current query, for fluid interface
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
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProgramInklusiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhusus($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(ProgramInklusiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProgramInklusiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
        } else {
            throw new PropelException('filterByKebutuhanKhusus() only accepts arguments of type KebutuhanKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KebutuhanKhusus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function joinKebutuhanKhusus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KebutuhanKhusus');

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
            $this->addJoinObject($join, 'KebutuhanKhusus');
        }

        return $this;
    }

    /**
     * Use the KebutuhanKhusus relation KebutuhanKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KebutuhanKhususQuery A secondary query class using the current class as primary query
     */
    public function useKebutuhanKhususQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKebutuhanKhusus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KebutuhanKhusus', '\DataDikdas\Model\KebutuhanKhususQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProgramInklusi $programInklusi Object to remove from the list of results
     *
     * @return ProgramInklusiQuery The current query, for fluid interface
     */
    public function prune($programInklusi = null)
    {
        if ($programInklusi) {
            $this->addUsingAlias(ProgramInklusiPeer::ID_PI, $programInklusi->getIdPi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
