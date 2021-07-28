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
use DataDikdas\Model\JenisLk;
use DataDikdas\Model\LayananKhusus;
use DataDikdas\Model\LayananKhususPeer;
use DataDikdas\Model\LayananKhususQuery;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'layanan_khusus' table.
 *
 * 
 *
 * @method LayananKhususQuery orderByIdLk($order = Criteria::ASC) Order by the id_lk column
 * @method LayananKhususQuery orderByIdJenisLk($order = Criteria::ASC) Order by the id_jenis_lk column
 * @method LayananKhususQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method LayananKhususQuery orderBySkLk($order = Criteria::ASC) Order by the sk_lk column
 * @method LayananKhususQuery orderByTmtLk($order = Criteria::ASC) Order by the tmt_lk column
 * @method LayananKhususQuery orderByTstLk($order = Criteria::ASC) Order by the tst_lk column
 * @method LayananKhususQuery orderByKetLk($order = Criteria::ASC) Order by the ket_lk column
 * @method LayananKhususQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method LayananKhususQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method LayananKhususQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method LayananKhususQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method LayananKhususQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method LayananKhususQuery groupByIdLk() Group by the id_lk column
 * @method LayananKhususQuery groupByIdJenisLk() Group by the id_jenis_lk column
 * @method LayananKhususQuery groupBySekolahId() Group by the sekolah_id column
 * @method LayananKhususQuery groupBySkLk() Group by the sk_lk column
 * @method LayananKhususQuery groupByTmtLk() Group by the tmt_lk column
 * @method LayananKhususQuery groupByTstLk() Group by the tst_lk column
 * @method LayananKhususQuery groupByKetLk() Group by the ket_lk column
 * @method LayananKhususQuery groupByCreateDate() Group by the create_date column
 * @method LayananKhususQuery groupByLastUpdate() Group by the last_update column
 * @method LayananKhususQuery groupBySoftDelete() Group by the soft_delete column
 * @method LayananKhususQuery groupByLastSync() Group by the last_sync column
 * @method LayananKhususQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method LayananKhususQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LayananKhususQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LayananKhususQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LayananKhususQuery leftJoinJenisLk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisLk relation
 * @method LayananKhususQuery rightJoinJenisLk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisLk relation
 * @method LayananKhususQuery innerJoinJenisLk($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisLk relation
 *
 * @method LayananKhususQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method LayananKhususQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method LayananKhususQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method LayananKhusus findOne(PropelPDO $con = null) Return the first LayananKhusus matching the query
 * @method LayananKhusus findOneOrCreate(PropelPDO $con = null) Return the first LayananKhusus matching the query, or a new LayananKhusus object populated from the query conditions when no match is found
 *
 * @method LayananKhusus findOneByIdJenisLk(string $id_jenis_lk) Return the first LayananKhusus filtered by the id_jenis_lk column
 * @method LayananKhusus findOneBySekolahId(string $sekolah_id) Return the first LayananKhusus filtered by the sekolah_id column
 * @method LayananKhusus findOneBySkLk(string $sk_lk) Return the first LayananKhusus filtered by the sk_lk column
 * @method LayananKhusus findOneByTmtLk(string $tmt_lk) Return the first LayananKhusus filtered by the tmt_lk column
 * @method LayananKhusus findOneByTstLk(string $tst_lk) Return the first LayananKhusus filtered by the tst_lk column
 * @method LayananKhusus findOneByKetLk(string $ket_lk) Return the first LayananKhusus filtered by the ket_lk column
 * @method LayananKhusus findOneByCreateDate(string $create_date) Return the first LayananKhusus filtered by the create_date column
 * @method LayananKhusus findOneByLastUpdate(string $last_update) Return the first LayananKhusus filtered by the last_update column
 * @method LayananKhusus findOneBySoftDelete(string $soft_delete) Return the first LayananKhusus filtered by the soft_delete column
 * @method LayananKhusus findOneByLastSync(string $last_sync) Return the first LayananKhusus filtered by the last_sync column
 * @method LayananKhusus findOneByUpdaterId(string $updater_id) Return the first LayananKhusus filtered by the updater_id column
 *
 * @method array findByIdLk(string $id_lk) Return LayananKhusus objects filtered by the id_lk column
 * @method array findByIdJenisLk(string $id_jenis_lk) Return LayananKhusus objects filtered by the id_jenis_lk column
 * @method array findBySekolahId(string $sekolah_id) Return LayananKhusus objects filtered by the sekolah_id column
 * @method array findBySkLk(string $sk_lk) Return LayananKhusus objects filtered by the sk_lk column
 * @method array findByTmtLk(string $tmt_lk) Return LayananKhusus objects filtered by the tmt_lk column
 * @method array findByTstLk(string $tst_lk) Return LayananKhusus objects filtered by the tst_lk column
 * @method array findByKetLk(string $ket_lk) Return LayananKhusus objects filtered by the ket_lk column
 * @method array findByCreateDate(string $create_date) Return LayananKhusus objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return LayananKhusus objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return LayananKhusus objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return LayananKhusus objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return LayananKhusus objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseLayananKhususQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLayananKhususQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\LayananKhusus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LayananKhususQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LayananKhususQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LayananKhususQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LayananKhususQuery) {
            return $criteria;
        }
        $query = new LayananKhususQuery();
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
     * @return   LayananKhusus|LayananKhusus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LayananKhususPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LayananKhususPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LayananKhusus A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdLk($key, $con = null)
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
     * @return                 LayananKhusus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_lk", "id_jenis_lk", "sekolah_id", "sk_lk", "tmt_lk", "tst_lk", "ket_lk", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "layanan_khusus" WHERE "id_lk" = :p0';
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
            $obj = new LayananKhusus();
            $obj->hydrate($row);
            LayananKhususPeer::addInstanceToPool($obj, (string) $key);
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
     * @return LayananKhusus|LayananKhusus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|LayananKhusus[]|mixed the list of results, formatted by the current formatter
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
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LayananKhususPeer::ID_LK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LayananKhususPeer::ID_LK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLk('fooValue');   // WHERE id_lk = 'fooValue'
     * $query->filterByIdLk('%fooValue%'); // WHERE id_lk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idLk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByIdLk($idLk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idLk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idLk)) {
                $idLk = str_replace('*', '%', $idLk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::ID_LK, $idLk, $comparison);
    }

    /**
     * Filter the query on the id_jenis_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJenisLk('fooValue');   // WHERE id_jenis_lk = 'fooValue'
     * $query->filterByIdJenisLk('%fooValue%'); // WHERE id_jenis_lk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idJenisLk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByIdJenisLk($idJenisLk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idJenisLk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idJenisLk)) {
                $idJenisLk = str_replace('*', '%', $idJenisLk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::ID_JENIS_LK, $idJenisLk, $comparison);
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
     * @return LayananKhususQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LayananKhususPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the sk_lk column
     *
     * Example usage:
     * <code>
     * $query->filterBySkLk('fooValue');   // WHERE sk_lk = 'fooValue'
     * $query->filterBySkLk('%fooValue%'); // WHERE sk_lk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skLk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterBySkLk($skLk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skLk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skLk)) {
                $skLk = str_replace('*', '%', $skLk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::SK_LK, $skLk, $comparison);
    }

    /**
     * Filter the query on the tmt_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtLk('2011-03-14'); // WHERE tmt_lk = '2011-03-14'
     * $query->filterByTmtLk('now'); // WHERE tmt_lk = '2011-03-14'
     * $query->filterByTmtLk(array('max' => 'yesterday')); // WHERE tmt_lk > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtLk The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByTmtLk($tmtLk = null, $comparison = null)
    {
        if (is_array($tmtLk)) {
            $useMinMax = false;
            if (isset($tmtLk['min'])) {
                $this->addUsingAlias(LayananKhususPeer::TMT_LK, $tmtLk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtLk['max'])) {
                $this->addUsingAlias(LayananKhususPeer::TMT_LK, $tmtLk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::TMT_LK, $tmtLk, $comparison);
    }

    /**
     * Filter the query on the tst_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByTstLk('2011-03-14'); // WHERE tst_lk = '2011-03-14'
     * $query->filterByTstLk('now'); // WHERE tst_lk = '2011-03-14'
     * $query->filterByTstLk(array('max' => 'yesterday')); // WHERE tst_lk > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstLk The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByTstLk($tstLk = null, $comparison = null)
    {
        if (is_array($tstLk)) {
            $useMinMax = false;
            if (isset($tstLk['min'])) {
                $this->addUsingAlias(LayananKhususPeer::TST_LK, $tstLk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstLk['max'])) {
                $this->addUsingAlias(LayananKhususPeer::TST_LK, $tstLk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::TST_LK, $tstLk, $comparison);
    }

    /**
     * Filter the query on the ket_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByKetLk('fooValue');   // WHERE ket_lk = 'fooValue'
     * $query->filterByKetLk('%fooValue%'); // WHERE ket_lk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketLk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByKetLk($ketLk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketLk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketLk)) {
                $ketLk = str_replace('*', '%', $ketLk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::KET_LK, $ketLk, $comparison);
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
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(LayananKhususPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(LayananKhususPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(LayananKhususPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(LayananKhususPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(LayananKhususPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(LayananKhususPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(LayananKhususPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(LayananKhususPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayananKhususPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return LayananKhususQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LayananKhususPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisLk object
     *
     * @param   JenisLk|PropelObjectCollection $jenisLk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LayananKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisLk($jenisLk, $comparison = null)
    {
        if ($jenisLk instanceof JenisLk) {
            return $this
                ->addUsingAlias(LayananKhususPeer::ID_JENIS_LK, $jenisLk->getIdJenisLk(), $comparison);
        } elseif ($jenisLk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LayananKhususPeer::ID_JENIS_LK, $jenisLk->toKeyValue('PrimaryKey', 'IdJenisLk'), $comparison);
        } else {
            throw new PropelException('filterByJenisLk() only accepts arguments of type JenisLk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisLk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function joinJenisLk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisLk');

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
            $this->addJoinObject($join, 'JenisLk');
        }

        return $this;
    }

    /**
     * Use the JenisLk relation JenisLk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisLkQuery A secondary query class using the current class as primary query
     */
    public function useJenisLkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisLk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisLk', '\DataDikdas\Model\JenisLkQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LayananKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(LayananKhususPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LayananKhususPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return LayananKhususQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   LayananKhusus $layananKhusus Object to remove from the list of results
     *
     * @return LayananKhususQuery The current query, for fluid interface
     */
    public function prune($layananKhusus = null)
    {
        if ($layananKhusus) {
            $this->addUsingAlias(LayananKhususPeer::ID_LK, $layananKhusus->getIdLk(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
