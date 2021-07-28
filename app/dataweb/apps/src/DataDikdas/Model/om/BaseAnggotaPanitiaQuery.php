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
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\AnggotaPanitiaPeer;
use DataDikdas\Model\AnggotaPanitiaQuery;
use DataDikdas\Model\Kepanitiaan;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\Ptk;

/**
 * Base class that represents a query for the 'anggota_panitia' table.
 *
 * 
 *
 * @method AnggotaPanitiaQuery orderByIdAngPanitia($order = Criteria::ASC) Order by the id_ang_panitia column
 * @method AnggotaPanitiaQuery orderByIdPanitia($order = Criteria::ASC) Order by the id_panitia column
 * @method AnggotaPanitiaQuery orderByNmAng($order = Criteria::ASC) Order by the nm_ang column
 * @method AnggotaPanitiaQuery orderByNoKontak($order = Criteria::ASC) Order by the no_kontak column
 * @method AnggotaPanitiaQuery orderByPeranAng($order = Criteria::ASC) Order by the peran_ang column
 * @method AnggotaPanitiaQuery orderByUnsurAng($order = Criteria::ASC) Order by the unsur_ang column
 * @method AnggotaPanitiaQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method AnggotaPanitiaQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method AnggotaPanitiaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AnggotaPanitiaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AnggotaPanitiaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AnggotaPanitiaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AnggotaPanitiaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AnggotaPanitiaQuery groupByIdAngPanitia() Group by the id_ang_panitia column
 * @method AnggotaPanitiaQuery groupByIdPanitia() Group by the id_panitia column
 * @method AnggotaPanitiaQuery groupByNmAng() Group by the nm_ang column
 * @method AnggotaPanitiaQuery groupByNoKontak() Group by the no_kontak column
 * @method AnggotaPanitiaQuery groupByPeranAng() Group by the peran_ang column
 * @method AnggotaPanitiaQuery groupByUnsurAng() Group by the unsur_ang column
 * @method AnggotaPanitiaQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method AnggotaPanitiaQuery groupByPtkId() Group by the ptk_id column
 * @method AnggotaPanitiaQuery groupByCreateDate() Group by the create_date column
 * @method AnggotaPanitiaQuery groupByLastUpdate() Group by the last_update column
 * @method AnggotaPanitiaQuery groupBySoftDelete() Group by the soft_delete column
 * @method AnggotaPanitiaQuery groupByLastSync() Group by the last_sync column
 * @method AnggotaPanitiaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AnggotaPanitiaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AnggotaPanitiaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AnggotaPanitiaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AnggotaPanitiaQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method AnggotaPanitiaQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method AnggotaPanitiaQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method AnggotaPanitiaQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method AnggotaPanitiaQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method AnggotaPanitiaQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method AnggotaPanitiaQuery leftJoinKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kepanitiaan relation
 * @method AnggotaPanitiaQuery rightJoinKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kepanitiaan relation
 * @method AnggotaPanitiaQuery innerJoinKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Kepanitiaan relation
 *
 * @method AnggotaPanitia findOne(PropelPDO $con = null) Return the first AnggotaPanitia matching the query
 * @method AnggotaPanitia findOneOrCreate(PropelPDO $con = null) Return the first AnggotaPanitia matching the query, or a new AnggotaPanitia object populated from the query conditions when no match is found
 *
 * @method AnggotaPanitia findOneByIdPanitia(string $id_panitia) Return the first AnggotaPanitia filtered by the id_panitia column
 * @method AnggotaPanitia findOneByNmAng(string $nm_ang) Return the first AnggotaPanitia filtered by the nm_ang column
 * @method AnggotaPanitia findOneByNoKontak(string $no_kontak) Return the first AnggotaPanitia filtered by the no_kontak column
 * @method AnggotaPanitia findOneByPeranAng(string $peran_ang) Return the first AnggotaPanitia filtered by the peran_ang column
 * @method AnggotaPanitia findOneByUnsurAng(string $unsur_ang) Return the first AnggotaPanitia filtered by the unsur_ang column
 * @method AnggotaPanitia findOneByPesertaDidikId(string $peserta_didik_id) Return the first AnggotaPanitia filtered by the peserta_didik_id column
 * @method AnggotaPanitia findOneByPtkId(string $ptk_id) Return the first AnggotaPanitia filtered by the ptk_id column
 * @method AnggotaPanitia findOneByCreateDate(string $create_date) Return the first AnggotaPanitia filtered by the create_date column
 * @method AnggotaPanitia findOneByLastUpdate(string $last_update) Return the first AnggotaPanitia filtered by the last_update column
 * @method AnggotaPanitia findOneBySoftDelete(string $soft_delete) Return the first AnggotaPanitia filtered by the soft_delete column
 * @method AnggotaPanitia findOneByLastSync(string $last_sync) Return the first AnggotaPanitia filtered by the last_sync column
 * @method AnggotaPanitia findOneByUpdaterId(string $updater_id) Return the first AnggotaPanitia filtered by the updater_id column
 *
 * @method array findByIdAngPanitia(string $id_ang_panitia) Return AnggotaPanitia objects filtered by the id_ang_panitia column
 * @method array findByIdPanitia(string $id_panitia) Return AnggotaPanitia objects filtered by the id_panitia column
 * @method array findByNmAng(string $nm_ang) Return AnggotaPanitia objects filtered by the nm_ang column
 * @method array findByNoKontak(string $no_kontak) Return AnggotaPanitia objects filtered by the no_kontak column
 * @method array findByPeranAng(string $peran_ang) Return AnggotaPanitia objects filtered by the peran_ang column
 * @method array findByUnsurAng(string $unsur_ang) Return AnggotaPanitia objects filtered by the unsur_ang column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return AnggotaPanitia objects filtered by the peserta_didik_id column
 * @method array findByPtkId(string $ptk_id) Return AnggotaPanitia objects filtered by the ptk_id column
 * @method array findByCreateDate(string $create_date) Return AnggotaPanitia objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AnggotaPanitia objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AnggotaPanitia objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AnggotaPanitia objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AnggotaPanitia objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnggotaPanitiaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAnggotaPanitiaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AnggotaPanitia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AnggotaPanitiaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AnggotaPanitiaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AnggotaPanitiaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AnggotaPanitiaQuery) {
            return $criteria;
        }
        $query = new AnggotaPanitiaQuery();
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
     * @return   AnggotaPanitia|AnggotaPanitia[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AnggotaPanitiaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AnggotaPanitia A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAngPanitia($key, $con = null)
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
     * @return                 AnggotaPanitia A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_ang_panitia", "id_panitia", "nm_ang", "no_kontak", "peran_ang", "unsur_ang", "peserta_didik_id", "ptk_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "anggota_panitia" WHERE "id_ang_panitia" = :p0';
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
            $obj = new AnggotaPanitia();
            $obj->hydrate($row);
            AnggotaPanitiaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AnggotaPanitia|AnggotaPanitia[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AnggotaPanitia[]|mixed the list of results, formatted by the current formatter
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnggotaPanitiaPeer::ID_ANG_PANITIA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnggotaPanitiaPeer::ID_ANG_PANITIA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_ang_panitia column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAngPanitia('fooValue');   // WHERE id_ang_panitia = 'fooValue'
     * $query->filterByIdAngPanitia('%fooValue%'); // WHERE id_ang_panitia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAngPanitia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByIdAngPanitia($idAngPanitia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAngPanitia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAngPanitia)) {
                $idAngPanitia = str_replace('*', '%', $idAngPanitia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::ID_ANG_PANITIA, $idAngPanitia, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaPanitiaPeer::ID_PANITIA, $idPanitia, $comparison);
    }

    /**
     * Filter the query on the nm_ang column
     *
     * Example usage:
     * <code>
     * $query->filterByNmAng('fooValue');   // WHERE nm_ang = 'fooValue'
     * $query->filterByNmAng('%fooValue%'); // WHERE nm_ang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmAng The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByNmAng($nmAng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmAng)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmAng)) {
                $nmAng = str_replace('*', '%', $nmAng);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::NM_ANG, $nmAng, $comparison);
    }

    /**
     * Filter the query on the no_kontak column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKontak('fooValue');   // WHERE no_kontak = 'fooValue'
     * $query->filterByNoKontak('%fooValue%'); // WHERE no_kontak LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKontak The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByNoKontak($noKontak = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKontak)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKontak)) {
                $noKontak = str_replace('*', '%', $noKontak);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::NO_KONTAK, $noKontak, $comparison);
    }

    /**
     * Filter the query on the peran_ang column
     *
     * Example usage:
     * <code>
     * $query->filterByPeranAng('fooValue');   // WHERE peran_ang = 'fooValue'
     * $query->filterByPeranAng('%fooValue%'); // WHERE peran_ang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $peranAng The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByPeranAng($peranAng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($peranAng)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $peranAng)) {
                $peranAng = str_replace('*', '%', $peranAng);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::PERAN_ANG, $peranAng, $comparison);
    }

    /**
     * Filter the query on the unsur_ang column
     *
     * Example usage:
     * <code>
     * $query->filterByUnsurAng('fooValue');   // WHERE unsur_ang = 'fooValue'
     * $query->filterByUnsurAng('%fooValue%'); // WHERE unsur_ang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unsurAng The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByUnsurAng($unsurAng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unsurAng)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $unsurAng)) {
                $unsurAng = str_replace('*', '%', $unsurAng);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::UNSUR_ANG, $unsurAng, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaPanitiaPeer::PTK_ID, $ptkId, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AnggotaPanitiaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaPanitiaPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaPanitiaPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaPanitiaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaPanitiaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(AnggotaPanitiaPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaPanitiaPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related Kepanitiaan object
     *
     * @param   Kepanitiaan|PropelObjectCollection $kepanitiaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaPanitiaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKepanitiaan($kepanitiaan, $comparison = null)
    {
        if ($kepanitiaan instanceof Kepanitiaan) {
            return $this
                ->addUsingAlias(AnggotaPanitiaPeer::ID_PANITIA, $kepanitiaan->getIdPanitia(), $comparison);
        } elseif ($kepanitiaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaPanitiaPeer::ID_PANITIA, $kepanitiaan->toKeyValue('PrimaryKey', 'IdPanitia'), $comparison);
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
     * @return AnggotaPanitiaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   AnggotaPanitia $anggotaPanitia Object to remove from the list of results
     *
     * @return AnggotaPanitiaQuery The current query, for fluid interface
     */
    public function prune($anggotaPanitia = null)
    {
        if ($anggotaPanitia) {
            $this->addUsingAlias(AnggotaPanitiaPeer::ID_ANG_PANITIA, $anggotaPanitia->getIdAngPanitia(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
