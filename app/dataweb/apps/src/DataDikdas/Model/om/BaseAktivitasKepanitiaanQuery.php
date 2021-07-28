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
use DataDikdas\Model\AktivitasKepanitiaan;
use DataDikdas\Model\AktivitasKepanitiaanPeer;
use DataDikdas\Model\AktivitasKepanitiaanQuery;
use DataDikdas\Model\JenisAktivitasKepanitiaan;
use DataDikdas\Model\Kepanitiaan;
use DataDikdas\Model\Semester;

/**
 * Base class that represents a query for the 'aktivitas_kepanitiaan' table.
 *
 * 
 *
 * @method AktivitasKepanitiaanQuery orderByIdAktPan($order = Criteria::ASC) Order by the id_akt_pan column
 * @method AktivitasKepanitiaanQuery orderByIdPanitia($order = Criteria::ASC) Order by the id_panitia column
 * @method AktivitasKepanitiaanQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method AktivitasKepanitiaanQuery orderByIdJnsAktPan($order = Criteria::ASC) Order by the id_jns_akt_pan column
 * @method AktivitasKepanitiaanQuery orderByFrekAktPan($order = Criteria::ASC) Order by the frek_akt_pan column
 * @method AktivitasKepanitiaanQuery orderByKetAktPan($order = Criteria::ASC) Order by the ket_akt_pan column
 * @method AktivitasKepanitiaanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AktivitasKepanitiaanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AktivitasKepanitiaanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AktivitasKepanitiaanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AktivitasKepanitiaanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AktivitasKepanitiaanQuery groupByIdAktPan() Group by the id_akt_pan column
 * @method AktivitasKepanitiaanQuery groupByIdPanitia() Group by the id_panitia column
 * @method AktivitasKepanitiaanQuery groupBySemesterId() Group by the semester_id column
 * @method AktivitasKepanitiaanQuery groupByIdJnsAktPan() Group by the id_jns_akt_pan column
 * @method AktivitasKepanitiaanQuery groupByFrekAktPan() Group by the frek_akt_pan column
 * @method AktivitasKepanitiaanQuery groupByKetAktPan() Group by the ket_akt_pan column
 * @method AktivitasKepanitiaanQuery groupByCreateDate() Group by the create_date column
 * @method AktivitasKepanitiaanQuery groupByLastUpdate() Group by the last_update column
 * @method AktivitasKepanitiaanQuery groupBySoftDelete() Group by the soft_delete column
 * @method AktivitasKepanitiaanQuery groupByLastSync() Group by the last_sync column
 * @method AktivitasKepanitiaanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AktivitasKepanitiaanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AktivitasKepanitiaanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AktivitasKepanitiaanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AktivitasKepanitiaanQuery leftJoinJenisAktivitasKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisAktivitasKepanitiaan relation
 * @method AktivitasKepanitiaanQuery rightJoinJenisAktivitasKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisAktivitasKepanitiaan relation
 * @method AktivitasKepanitiaanQuery innerJoinJenisAktivitasKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisAktivitasKepanitiaan relation
 *
 * @method AktivitasKepanitiaanQuery leftJoinKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kepanitiaan relation
 * @method AktivitasKepanitiaanQuery rightJoinKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kepanitiaan relation
 * @method AktivitasKepanitiaanQuery innerJoinKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Kepanitiaan relation
 *
 * @method AktivitasKepanitiaanQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method AktivitasKepanitiaanQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method AktivitasKepanitiaanQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method AktivitasKepanitiaan findOne(PropelPDO $con = null) Return the first AktivitasKepanitiaan matching the query
 * @method AktivitasKepanitiaan findOneOrCreate(PropelPDO $con = null) Return the first AktivitasKepanitiaan matching the query, or a new AktivitasKepanitiaan object populated from the query conditions when no match is found
 *
 * @method AktivitasKepanitiaan findOneByIdPanitia(string $id_panitia) Return the first AktivitasKepanitiaan filtered by the id_panitia column
 * @method AktivitasKepanitiaan findOneBySemesterId(string $semester_id) Return the first AktivitasKepanitiaan filtered by the semester_id column
 * @method AktivitasKepanitiaan findOneByIdJnsAktPan(string $id_jns_akt_pan) Return the first AktivitasKepanitiaan filtered by the id_jns_akt_pan column
 * @method AktivitasKepanitiaan findOneByFrekAktPan(string $frek_akt_pan) Return the first AktivitasKepanitiaan filtered by the frek_akt_pan column
 * @method AktivitasKepanitiaan findOneByKetAktPan(string $ket_akt_pan) Return the first AktivitasKepanitiaan filtered by the ket_akt_pan column
 * @method AktivitasKepanitiaan findOneByCreateDate(string $create_date) Return the first AktivitasKepanitiaan filtered by the create_date column
 * @method AktivitasKepanitiaan findOneByLastUpdate(string $last_update) Return the first AktivitasKepanitiaan filtered by the last_update column
 * @method AktivitasKepanitiaan findOneBySoftDelete(string $soft_delete) Return the first AktivitasKepanitiaan filtered by the soft_delete column
 * @method AktivitasKepanitiaan findOneByLastSync(string $last_sync) Return the first AktivitasKepanitiaan filtered by the last_sync column
 * @method AktivitasKepanitiaan findOneByUpdaterId(string $updater_id) Return the first AktivitasKepanitiaan filtered by the updater_id column
 *
 * @method array findByIdAktPan(string $id_akt_pan) Return AktivitasKepanitiaan objects filtered by the id_akt_pan column
 * @method array findByIdPanitia(string $id_panitia) Return AktivitasKepanitiaan objects filtered by the id_panitia column
 * @method array findBySemesterId(string $semester_id) Return AktivitasKepanitiaan objects filtered by the semester_id column
 * @method array findByIdJnsAktPan(string $id_jns_akt_pan) Return AktivitasKepanitiaan objects filtered by the id_jns_akt_pan column
 * @method array findByFrekAktPan(string $frek_akt_pan) Return AktivitasKepanitiaan objects filtered by the frek_akt_pan column
 * @method array findByKetAktPan(string $ket_akt_pan) Return AktivitasKepanitiaan objects filtered by the ket_akt_pan column
 * @method array findByCreateDate(string $create_date) Return AktivitasKepanitiaan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AktivitasKepanitiaan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AktivitasKepanitiaan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AktivitasKepanitiaan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AktivitasKepanitiaan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAktivitasKepanitiaanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAktivitasKepanitiaanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AktivitasKepanitiaan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AktivitasKepanitiaanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AktivitasKepanitiaanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AktivitasKepanitiaanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AktivitasKepanitiaanQuery) {
            return $criteria;
        }
        $query = new AktivitasKepanitiaanQuery();
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
     * @return   AktivitasKepanitiaan|AktivitasKepanitiaan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AktivitasKepanitiaanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AktivitasKepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AktivitasKepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAktPan($key, $con = null)
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
     * @return                 AktivitasKepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_akt_pan", "id_panitia", "semester_id", "id_jns_akt_pan", "frek_akt_pan", "ket_akt_pan", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "aktivitas_kepanitiaan" WHERE "id_akt_pan" = :p0';
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
            $obj = new AktivitasKepanitiaan();
            $obj->hydrate($row);
            AktivitasKepanitiaanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AktivitasKepanitiaan|AktivitasKepanitiaan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AktivitasKepanitiaan[]|mixed the list of results, formatted by the current formatter
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
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_AKT_PAN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_AKT_PAN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_akt_pan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAktPan('fooValue');   // WHERE id_akt_pan = 'fooValue'
     * $query->filterByIdAktPan('%fooValue%'); // WHERE id_akt_pan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAktPan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByIdAktPan($idAktPan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAktPan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAktPan)) {
                $idAktPan = str_replace('*', '%', $idAktPan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_AKT_PAN, $idAktPan, $comparison);
    }

    /**
     * Filter the query on the id_panitia column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPanitia('fooValue');   // WHERE id_panitia = 'fooValue'
     * $query->filterByIdPanitia('%fooValue%'); // WHERE id_panitia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idPanitia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByIdPanitia($idPanitia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idPanitia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idPanitia)) {
                $idPanitia = str_replace('*', '%', $idPanitia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_PANITIA, $idPanitia, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the id_jns_akt_pan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsAktPan(1234); // WHERE id_jns_akt_pan = 1234
     * $query->filterByIdJnsAktPan(array(12, 34)); // WHERE id_jns_akt_pan IN (12, 34)
     * $query->filterByIdJnsAktPan(array('min' => 12)); // WHERE id_jns_akt_pan >= 12
     * $query->filterByIdJnsAktPan(array('max' => 12)); // WHERE id_jns_akt_pan <= 12
     * </code>
     *
     * @see       filterByJenisAktivitasKepanitiaan()
     *
     * @param     mixed $idJnsAktPan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByIdJnsAktPan($idJnsAktPan = null, $comparison = null)
    {
        if (is_array($idJnsAktPan)) {
            $useMinMax = false;
            if (isset($idJnsAktPan['min'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $idJnsAktPan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsAktPan['max'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $idJnsAktPan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $idJnsAktPan, $comparison);
    }

    /**
     * Filter the query on the frek_akt_pan column
     *
     * Example usage:
     * <code>
     * $query->filterByFrekAktPan(1234); // WHERE frek_akt_pan = 1234
     * $query->filterByFrekAktPan(array(12, 34)); // WHERE frek_akt_pan IN (12, 34)
     * $query->filterByFrekAktPan(array('min' => 12)); // WHERE frek_akt_pan >= 12
     * $query->filterByFrekAktPan(array('max' => 12)); // WHERE frek_akt_pan <= 12
     * </code>
     *
     * @param     mixed $frekAktPan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByFrekAktPan($frekAktPan = null, $comparison = null)
    {
        if (is_array($frekAktPan)) {
            $useMinMax = false;
            if (isset($frekAktPan['min'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::FREK_AKT_PAN, $frekAktPan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($frekAktPan['max'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::FREK_AKT_PAN, $frekAktPan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::FREK_AKT_PAN, $frekAktPan, $comparison);
    }

    /**
     * Filter the query on the ket_akt_pan column
     *
     * Example usage:
     * <code>
     * $query->filterByKetAktPan('fooValue');   // WHERE ket_akt_pan = 'fooValue'
     * $query->filterByKetAktPan('%fooValue%'); // WHERE ket_akt_pan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketAktPan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByKetAktPan($ketAktPan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketAktPan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketAktPan)) {
                $ketAktPan = str_replace('*', '%', $ketAktPan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::KET_AKT_PAN, $ketAktPan, $comparison);
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
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AktivitasKepanitiaanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AktivitasKepanitiaanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisAktivitasKepanitiaan object
     *
     * @param   JenisAktivitasKepanitiaan|PropelObjectCollection $jenisAktivitasKepanitiaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktivitasKepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisAktivitasKepanitiaan($jenisAktivitasKepanitiaan, $comparison = null)
    {
        if ($jenisAktivitasKepanitiaan instanceof JenisAktivitasKepanitiaan) {
            return $this
                ->addUsingAlias(AktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $jenisAktivitasKepanitiaan->getIdJnsAktPan(), $comparison);
        } elseif ($jenisAktivitasKepanitiaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $jenisAktivitasKepanitiaan->toKeyValue('PrimaryKey', 'IdJnsAktPan'), $comparison);
        } else {
            throw new PropelException('filterByJenisAktivitasKepanitiaan() only accepts arguments of type JenisAktivitasKepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisAktivitasKepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function joinJenisAktivitasKepanitiaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisAktivitasKepanitiaan');

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
            $this->addJoinObject($join, 'JenisAktivitasKepanitiaan');
        }

        return $this;
    }

    /**
     * Use the JenisAktivitasKepanitiaan relation JenisAktivitasKepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisAktivitasKepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useJenisAktivitasKepanitiaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisAktivitasKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisAktivitasKepanitiaan', '\DataDikdas\Model\JenisAktivitasKepanitiaanQuery');
    }

    /**
     * Filter the query by a related Kepanitiaan object
     *
     * @param   Kepanitiaan|PropelObjectCollection $kepanitiaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktivitasKepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKepanitiaan($kepanitiaan, $comparison = null)
    {
        if ($kepanitiaan instanceof Kepanitiaan) {
            return $this
                ->addUsingAlias(AktivitasKepanitiaanPeer::ID_PANITIA, $kepanitiaan->getIdPanitia(), $comparison);
        } elseif ($kepanitiaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AktivitasKepanitiaanPeer::ID_PANITIA, $kepanitiaan->toKeyValue('PrimaryKey', 'IdPanitia'), $comparison);
        } else {
            throw new PropelException('filterByKepanitiaan() only accepts arguments of type Kepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function joinKepanitiaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kepanitiaan');

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
            $this->addJoinObject($join, 'Kepanitiaan');
        }

        return $this;
    }

    /**
     * Use the Kepanitiaan relation Kepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useKepanitiaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kepanitiaan', '\DataDikdas\Model\KepanitiaanQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AktivitasKepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(AktivitasKepanitiaanPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AktivitasKepanitiaanPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

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
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AktivitasKepanitiaan $aktivitasKepanitiaan Object to remove from the list of results
     *
     * @return AktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function prune($aktivitasKepanitiaan = null)
    {
        if ($aktivitasKepanitiaan) {
            $this->addUsingAlias(AktivitasKepanitiaanPeer::ID_AKT_PAN, $aktivitasKepanitiaan->getIdAktPan(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
