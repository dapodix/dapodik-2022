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
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanLongitudinal;
use DataDikdas\Model\BangunanLongitudinalPeer;
use DataDikdas\Model\BangunanLongitudinalQuery;
use DataDikdas\Model\Semester;

/**
 * Base class that represents a query for the 'bangunan_longitudinal' table.
 *
 * 
 *
 * @method BangunanLongitudinalQuery orderByIdBangunan($order = Criteria::ASC) Order by the id_bangunan column
 * @method BangunanLongitudinalQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method BangunanLongitudinalQuery orderByRusakPondasi($order = Criteria::ASC) Order by the rusak_pondasi column
 * @method BangunanLongitudinalQuery orderByKetPondasi($order = Criteria::ASC) Order by the ket_pondasi column
 * @method BangunanLongitudinalQuery orderByRusakSloopKolomBalok($order = Criteria::ASC) Order by the rusak_sloop_kolom_balok column
 * @method BangunanLongitudinalQuery orderByKetSloopKolomBalok($order = Criteria::ASC) Order by the ket_sloop_kolom_balok column
 * @method BangunanLongitudinalQuery orderByRusakPlesterStruktur($order = Criteria::ASC) Order by the rusak_plester_struktur column
 * @method BangunanLongitudinalQuery orderByKetPlesterStruktur($order = Criteria::ASC) Order by the ket_plester_struktur column
 * @method BangunanLongitudinalQuery orderByRusakKudakudaAtap($order = Criteria::ASC) Order by the rusak_kudakuda_atap column
 * @method BangunanLongitudinalQuery orderByKetKudakudaAtap($order = Criteria::ASC) Order by the ket_kudakuda_atap column
 * @method BangunanLongitudinalQuery orderByRusakKasoAtap($order = Criteria::ASC) Order by the rusak_kaso_atap column
 * @method BangunanLongitudinalQuery orderByKetKasoAtap($order = Criteria::ASC) Order by the ket_kaso_atap column
 * @method BangunanLongitudinalQuery orderByRusakRengAtap($order = Criteria::ASC) Order by the rusak_reng_atap column
 * @method BangunanLongitudinalQuery orderByKetRengAtap($order = Criteria::ASC) Order by the ket_reng_atap column
 * @method BangunanLongitudinalQuery orderByRusakTutupAtap($order = Criteria::ASC) Order by the rusak_tutup_atap column
 * @method BangunanLongitudinalQuery orderByKetTutupAtap($order = Criteria::ASC) Order by the ket_tutup_atap column
 * @method BangunanLongitudinalQuery orderByNilaiSaatIni($order = Criteria::ASC) Order by the nilai_saat_ini column
 * @method BangunanLongitudinalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BangunanLongitudinalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BangunanLongitudinalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BangunanLongitudinalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BangunanLongitudinalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BangunanLongitudinalQuery groupByIdBangunan() Group by the id_bangunan column
 * @method BangunanLongitudinalQuery groupBySemesterId() Group by the semester_id column
 * @method BangunanLongitudinalQuery groupByRusakPondasi() Group by the rusak_pondasi column
 * @method BangunanLongitudinalQuery groupByKetPondasi() Group by the ket_pondasi column
 * @method BangunanLongitudinalQuery groupByRusakSloopKolomBalok() Group by the rusak_sloop_kolom_balok column
 * @method BangunanLongitudinalQuery groupByKetSloopKolomBalok() Group by the ket_sloop_kolom_balok column
 * @method BangunanLongitudinalQuery groupByRusakPlesterStruktur() Group by the rusak_plester_struktur column
 * @method BangunanLongitudinalQuery groupByKetPlesterStruktur() Group by the ket_plester_struktur column
 * @method BangunanLongitudinalQuery groupByRusakKudakudaAtap() Group by the rusak_kudakuda_atap column
 * @method BangunanLongitudinalQuery groupByKetKudakudaAtap() Group by the ket_kudakuda_atap column
 * @method BangunanLongitudinalQuery groupByRusakKasoAtap() Group by the rusak_kaso_atap column
 * @method BangunanLongitudinalQuery groupByKetKasoAtap() Group by the ket_kaso_atap column
 * @method BangunanLongitudinalQuery groupByRusakRengAtap() Group by the rusak_reng_atap column
 * @method BangunanLongitudinalQuery groupByKetRengAtap() Group by the ket_reng_atap column
 * @method BangunanLongitudinalQuery groupByRusakTutupAtap() Group by the rusak_tutup_atap column
 * @method BangunanLongitudinalQuery groupByKetTutupAtap() Group by the ket_tutup_atap column
 * @method BangunanLongitudinalQuery groupByNilaiSaatIni() Group by the nilai_saat_ini column
 * @method BangunanLongitudinalQuery groupByCreateDate() Group by the create_date column
 * @method BangunanLongitudinalQuery groupByLastUpdate() Group by the last_update column
 * @method BangunanLongitudinalQuery groupBySoftDelete() Group by the soft_delete column
 * @method BangunanLongitudinalQuery groupByLastSync() Group by the last_sync column
 * @method BangunanLongitudinalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BangunanLongitudinalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BangunanLongitudinalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BangunanLongitudinalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BangunanLongitudinalQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method BangunanLongitudinalQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method BangunanLongitudinalQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method BangunanLongitudinalQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method BangunanLongitudinalQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method BangunanLongitudinalQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method BangunanLongitudinal findOne(PropelPDO $con = null) Return the first BangunanLongitudinal matching the query
 * @method BangunanLongitudinal findOneOrCreate(PropelPDO $con = null) Return the first BangunanLongitudinal matching the query, or a new BangunanLongitudinal object populated from the query conditions when no match is found
 *
 * @method BangunanLongitudinal findOneByIdBangunan(string $id_bangunan) Return the first BangunanLongitudinal filtered by the id_bangunan column
 * @method BangunanLongitudinal findOneBySemesterId(string $semester_id) Return the first BangunanLongitudinal filtered by the semester_id column
 * @method BangunanLongitudinal findOneByRusakPondasi(string $rusak_pondasi) Return the first BangunanLongitudinal filtered by the rusak_pondasi column
 * @method BangunanLongitudinal findOneByKetPondasi(string $ket_pondasi) Return the first BangunanLongitudinal filtered by the ket_pondasi column
 * @method BangunanLongitudinal findOneByRusakSloopKolomBalok(string $rusak_sloop_kolom_balok) Return the first BangunanLongitudinal filtered by the rusak_sloop_kolom_balok column
 * @method BangunanLongitudinal findOneByKetSloopKolomBalok(string $ket_sloop_kolom_balok) Return the first BangunanLongitudinal filtered by the ket_sloop_kolom_balok column
 * @method BangunanLongitudinal findOneByRusakPlesterStruktur(string $rusak_plester_struktur) Return the first BangunanLongitudinal filtered by the rusak_plester_struktur column
 * @method BangunanLongitudinal findOneByKetPlesterStruktur(string $ket_plester_struktur) Return the first BangunanLongitudinal filtered by the ket_plester_struktur column
 * @method BangunanLongitudinal findOneByRusakKudakudaAtap(string $rusak_kudakuda_atap) Return the first BangunanLongitudinal filtered by the rusak_kudakuda_atap column
 * @method BangunanLongitudinal findOneByKetKudakudaAtap(string $ket_kudakuda_atap) Return the first BangunanLongitudinal filtered by the ket_kudakuda_atap column
 * @method BangunanLongitudinal findOneByRusakKasoAtap(string $rusak_kaso_atap) Return the first BangunanLongitudinal filtered by the rusak_kaso_atap column
 * @method BangunanLongitudinal findOneByKetKasoAtap(string $ket_kaso_atap) Return the first BangunanLongitudinal filtered by the ket_kaso_atap column
 * @method BangunanLongitudinal findOneByRusakRengAtap(string $rusak_reng_atap) Return the first BangunanLongitudinal filtered by the rusak_reng_atap column
 * @method BangunanLongitudinal findOneByKetRengAtap(string $ket_reng_atap) Return the first BangunanLongitudinal filtered by the ket_reng_atap column
 * @method BangunanLongitudinal findOneByRusakTutupAtap(string $rusak_tutup_atap) Return the first BangunanLongitudinal filtered by the rusak_tutup_atap column
 * @method BangunanLongitudinal findOneByKetTutupAtap(string $ket_tutup_atap) Return the first BangunanLongitudinal filtered by the ket_tutup_atap column
 * @method BangunanLongitudinal findOneByNilaiSaatIni(string $nilai_saat_ini) Return the first BangunanLongitudinal filtered by the nilai_saat_ini column
 * @method BangunanLongitudinal findOneByCreateDate(string $create_date) Return the first BangunanLongitudinal filtered by the create_date column
 * @method BangunanLongitudinal findOneByLastUpdate(string $last_update) Return the first BangunanLongitudinal filtered by the last_update column
 * @method BangunanLongitudinal findOneBySoftDelete(string $soft_delete) Return the first BangunanLongitudinal filtered by the soft_delete column
 * @method BangunanLongitudinal findOneByLastSync(string $last_sync) Return the first BangunanLongitudinal filtered by the last_sync column
 * @method BangunanLongitudinal findOneByUpdaterId(string $updater_id) Return the first BangunanLongitudinal filtered by the updater_id column
 *
 * @method array findByIdBangunan(string $id_bangunan) Return BangunanLongitudinal objects filtered by the id_bangunan column
 * @method array findBySemesterId(string $semester_id) Return BangunanLongitudinal objects filtered by the semester_id column
 * @method array findByRusakPondasi(string $rusak_pondasi) Return BangunanLongitudinal objects filtered by the rusak_pondasi column
 * @method array findByKetPondasi(string $ket_pondasi) Return BangunanLongitudinal objects filtered by the ket_pondasi column
 * @method array findByRusakSloopKolomBalok(string $rusak_sloop_kolom_balok) Return BangunanLongitudinal objects filtered by the rusak_sloop_kolom_balok column
 * @method array findByKetSloopKolomBalok(string $ket_sloop_kolom_balok) Return BangunanLongitudinal objects filtered by the ket_sloop_kolom_balok column
 * @method array findByRusakPlesterStruktur(string $rusak_plester_struktur) Return BangunanLongitudinal objects filtered by the rusak_plester_struktur column
 * @method array findByKetPlesterStruktur(string $ket_plester_struktur) Return BangunanLongitudinal objects filtered by the ket_plester_struktur column
 * @method array findByRusakKudakudaAtap(string $rusak_kudakuda_atap) Return BangunanLongitudinal objects filtered by the rusak_kudakuda_atap column
 * @method array findByKetKudakudaAtap(string $ket_kudakuda_atap) Return BangunanLongitudinal objects filtered by the ket_kudakuda_atap column
 * @method array findByRusakKasoAtap(string $rusak_kaso_atap) Return BangunanLongitudinal objects filtered by the rusak_kaso_atap column
 * @method array findByKetKasoAtap(string $ket_kaso_atap) Return BangunanLongitudinal objects filtered by the ket_kaso_atap column
 * @method array findByRusakRengAtap(string $rusak_reng_atap) Return BangunanLongitudinal objects filtered by the rusak_reng_atap column
 * @method array findByKetRengAtap(string $ket_reng_atap) Return BangunanLongitudinal objects filtered by the ket_reng_atap column
 * @method array findByRusakTutupAtap(string $rusak_tutup_atap) Return BangunanLongitudinal objects filtered by the rusak_tutup_atap column
 * @method array findByKetTutupAtap(string $ket_tutup_atap) Return BangunanLongitudinal objects filtered by the ket_tutup_atap column
 * @method array findByNilaiSaatIni(string $nilai_saat_ini) Return BangunanLongitudinal objects filtered by the nilai_saat_ini column
 * @method array findByCreateDate(string $create_date) Return BangunanLongitudinal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BangunanLongitudinal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BangunanLongitudinal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BangunanLongitudinal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BangunanLongitudinal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBangunanLongitudinalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBangunanLongitudinalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BangunanLongitudinal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BangunanLongitudinalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BangunanLongitudinalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BangunanLongitudinalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BangunanLongitudinalQuery) {
            return $criteria;
        }
        $query = new BangunanLongitudinalQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$id_bangunan, $semester_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   BangunanLongitudinal|BangunanLongitudinal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BangunanLongitudinalPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 BangunanLongitudinal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_bangunan", "semester_id", "rusak_pondasi", "ket_pondasi", "rusak_sloop_kolom_balok", "ket_sloop_kolom_balok", "rusak_plester_struktur", "ket_plester_struktur", "rusak_kudakuda_atap", "ket_kudakuda_atap", "rusak_kaso_atap", "ket_kaso_atap", "rusak_reng_atap", "ket_reng_atap", "rusak_tutup_atap", "ket_tutup_atap", "nilai_saat_ini", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "bangunan_longitudinal" WHERE "id_bangunan" = :p0 AND "semester_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new BangunanLongitudinal();
            $obj->hydrate($row);
            BangunanLongitudinalPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return BangunanLongitudinal|BangunanLongitudinal[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|BangunanLongitudinal[]|mixed the list of results, formatted by the current formatter
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BangunanLongitudinalPeer::ID_BANGUNAN, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BangunanLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BangunanLongitudinalPeer::ID_BANGUNAN, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BangunanLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_bangunan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBangunan('fooValue');   // WHERE id_bangunan = 'fooValue'
     * $query->filterByIdBangunan('%fooValue%'); // WHERE id_bangunan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBangunan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByIdBangunan($idBangunan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBangunan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBangunan)) {
                $idBangunan = str_replace('*', '%', $idBangunan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::ID_BANGUNAN, $idBangunan, $comparison);
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BangunanLongitudinalPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the rusak_pondasi column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakPondasi(1234); // WHERE rusak_pondasi = 1234
     * $query->filterByRusakPondasi(array(12, 34)); // WHERE rusak_pondasi IN (12, 34)
     * $query->filterByRusakPondasi(array('min' => 12)); // WHERE rusak_pondasi >= 12
     * $query->filterByRusakPondasi(array('max' => 12)); // WHERE rusak_pondasi <= 12
     * </code>
     *
     * @param     mixed $rusakPondasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakPondasi($rusakPondasi = null, $comparison = null)
    {
        if (is_array($rusakPondasi)) {
            $useMinMax = false;
            if (isset($rusakPondasi['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_PONDASI, $rusakPondasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakPondasi['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_PONDASI, $rusakPondasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_PONDASI, $rusakPondasi, $comparison);
    }

    /**
     * Filter the query on the ket_pondasi column
     *
     * Example usage:
     * <code>
     * $query->filterByKetPondasi('fooValue');   // WHERE ket_pondasi = 'fooValue'
     * $query->filterByKetPondasi('%fooValue%'); // WHERE ket_pondasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketPondasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetPondasi($ketPondasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketPondasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketPondasi)) {
                $ketPondasi = str_replace('*', '%', $ketPondasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::KET_PONDASI, $ketPondasi, $comparison);
    }

    /**
     * Filter the query on the rusak_sloop_kolom_balok column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakSloopKolomBalok(1234); // WHERE rusak_sloop_kolom_balok = 1234
     * $query->filterByRusakSloopKolomBalok(array(12, 34)); // WHERE rusak_sloop_kolom_balok IN (12, 34)
     * $query->filterByRusakSloopKolomBalok(array('min' => 12)); // WHERE rusak_sloop_kolom_balok >= 12
     * $query->filterByRusakSloopKolomBalok(array('max' => 12)); // WHERE rusak_sloop_kolom_balok <= 12
     * </code>
     *
     * @param     mixed $rusakSloopKolomBalok The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakSloopKolomBalok($rusakSloopKolomBalok = null, $comparison = null)
    {
        if (is_array($rusakSloopKolomBalok)) {
            $useMinMax = false;
            if (isset($rusakSloopKolomBalok['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK, $rusakSloopKolomBalok['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakSloopKolomBalok['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK, $rusakSloopKolomBalok['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK, $rusakSloopKolomBalok, $comparison);
    }

    /**
     * Filter the query on the ket_sloop_kolom_balok column
     *
     * Example usage:
     * <code>
     * $query->filterByKetSloopKolomBalok('fooValue');   // WHERE ket_sloop_kolom_balok = 'fooValue'
     * $query->filterByKetSloopKolomBalok('%fooValue%'); // WHERE ket_sloop_kolom_balok LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketSloopKolomBalok The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetSloopKolomBalok($ketSloopKolomBalok = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketSloopKolomBalok)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketSloopKolomBalok)) {
                $ketSloopKolomBalok = str_replace('*', '%', $ketSloopKolomBalok);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK, $ketSloopKolomBalok, $comparison);
    }

    /**
     * Filter the query on the rusak_plester_struktur column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakPlesterStruktur(1234); // WHERE rusak_plester_struktur = 1234
     * $query->filterByRusakPlesterStruktur(array(12, 34)); // WHERE rusak_plester_struktur IN (12, 34)
     * $query->filterByRusakPlesterStruktur(array('min' => 12)); // WHERE rusak_plester_struktur >= 12
     * $query->filterByRusakPlesterStruktur(array('max' => 12)); // WHERE rusak_plester_struktur <= 12
     * </code>
     *
     * @param     mixed $rusakPlesterStruktur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakPlesterStruktur($rusakPlesterStruktur = null, $comparison = null)
    {
        if (is_array($rusakPlesterStruktur)) {
            $useMinMax = false;
            if (isset($rusakPlesterStruktur['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR, $rusakPlesterStruktur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakPlesterStruktur['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR, $rusakPlesterStruktur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR, $rusakPlesterStruktur, $comparison);
    }

    /**
     * Filter the query on the ket_plester_struktur column
     *
     * Example usage:
     * <code>
     * $query->filterByKetPlesterStruktur('fooValue');   // WHERE ket_plester_struktur = 'fooValue'
     * $query->filterByKetPlesterStruktur('%fooValue%'); // WHERE ket_plester_struktur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketPlesterStruktur The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetPlesterStruktur($ketPlesterStruktur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketPlesterStruktur)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketPlesterStruktur)) {
                $ketPlesterStruktur = str_replace('*', '%', $ketPlesterStruktur);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR, $ketPlesterStruktur, $comparison);
    }

    /**
     * Filter the query on the rusak_kudakuda_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakKudakudaAtap(1234); // WHERE rusak_kudakuda_atap = 1234
     * $query->filterByRusakKudakudaAtap(array(12, 34)); // WHERE rusak_kudakuda_atap IN (12, 34)
     * $query->filterByRusakKudakudaAtap(array('min' => 12)); // WHERE rusak_kudakuda_atap >= 12
     * $query->filterByRusakKudakudaAtap(array('max' => 12)); // WHERE rusak_kudakuda_atap <= 12
     * </code>
     *
     * @param     mixed $rusakKudakudaAtap The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakKudakudaAtap($rusakKudakudaAtap = null, $comparison = null)
    {
        if (is_array($rusakKudakudaAtap)) {
            $useMinMax = false;
            if (isset($rusakKudakudaAtap['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP, $rusakKudakudaAtap['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakKudakudaAtap['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP, $rusakKudakudaAtap['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP, $rusakKudakudaAtap, $comparison);
    }

    /**
     * Filter the query on the ket_kudakuda_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByKetKudakudaAtap('fooValue');   // WHERE ket_kudakuda_atap = 'fooValue'
     * $query->filterByKetKudakudaAtap('%fooValue%'); // WHERE ket_kudakuda_atap LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketKudakudaAtap The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetKudakudaAtap($ketKudakudaAtap = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketKudakudaAtap)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketKudakudaAtap)) {
                $ketKudakudaAtap = str_replace('*', '%', $ketKudakudaAtap);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP, $ketKudakudaAtap, $comparison);
    }

    /**
     * Filter the query on the rusak_kaso_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakKasoAtap(1234); // WHERE rusak_kaso_atap = 1234
     * $query->filterByRusakKasoAtap(array(12, 34)); // WHERE rusak_kaso_atap IN (12, 34)
     * $query->filterByRusakKasoAtap(array('min' => 12)); // WHERE rusak_kaso_atap >= 12
     * $query->filterByRusakKasoAtap(array('max' => 12)); // WHERE rusak_kaso_atap <= 12
     * </code>
     *
     * @param     mixed $rusakKasoAtap The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakKasoAtap($rusakKasoAtap = null, $comparison = null)
    {
        if (is_array($rusakKasoAtap)) {
            $useMinMax = false;
            if (isset($rusakKasoAtap['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_KASO_ATAP, $rusakKasoAtap['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakKasoAtap['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_KASO_ATAP, $rusakKasoAtap['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_KASO_ATAP, $rusakKasoAtap, $comparison);
    }

    /**
     * Filter the query on the ket_kaso_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByKetKasoAtap('fooValue');   // WHERE ket_kaso_atap = 'fooValue'
     * $query->filterByKetKasoAtap('%fooValue%'); // WHERE ket_kaso_atap LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketKasoAtap The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetKasoAtap($ketKasoAtap = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketKasoAtap)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketKasoAtap)) {
                $ketKasoAtap = str_replace('*', '%', $ketKasoAtap);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::KET_KASO_ATAP, $ketKasoAtap, $comparison);
    }

    /**
     * Filter the query on the rusak_reng_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakRengAtap(1234); // WHERE rusak_reng_atap = 1234
     * $query->filterByRusakRengAtap(array(12, 34)); // WHERE rusak_reng_atap IN (12, 34)
     * $query->filterByRusakRengAtap(array('min' => 12)); // WHERE rusak_reng_atap >= 12
     * $query->filterByRusakRengAtap(array('max' => 12)); // WHERE rusak_reng_atap <= 12
     * </code>
     *
     * @param     mixed $rusakRengAtap The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakRengAtap($rusakRengAtap = null, $comparison = null)
    {
        if (is_array($rusakRengAtap)) {
            $useMinMax = false;
            if (isset($rusakRengAtap['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_RENG_ATAP, $rusakRengAtap['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakRengAtap['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_RENG_ATAP, $rusakRengAtap['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_RENG_ATAP, $rusakRengAtap, $comparison);
    }

    /**
     * Filter the query on the ket_reng_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByKetRengAtap('fooValue');   // WHERE ket_reng_atap = 'fooValue'
     * $query->filterByKetRengAtap('%fooValue%'); // WHERE ket_reng_atap LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketRengAtap The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetRengAtap($ketRengAtap = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketRengAtap)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketRengAtap)) {
                $ketRengAtap = str_replace('*', '%', $ketRengAtap);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::KET_RENG_ATAP, $ketRengAtap, $comparison);
    }

    /**
     * Filter the query on the rusak_tutup_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakTutupAtap(1234); // WHERE rusak_tutup_atap = 1234
     * $query->filterByRusakTutupAtap(array(12, 34)); // WHERE rusak_tutup_atap IN (12, 34)
     * $query->filterByRusakTutupAtap(array('min' => 12)); // WHERE rusak_tutup_atap >= 12
     * $query->filterByRusakTutupAtap(array('max' => 12)); // WHERE rusak_tutup_atap <= 12
     * </code>
     *
     * @param     mixed $rusakTutupAtap The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakTutupAtap($rusakTutupAtap = null, $comparison = null)
    {
        if (is_array($rusakTutupAtap)) {
            $useMinMax = false;
            if (isset($rusakTutupAtap['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP, $rusakTutupAtap['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakTutupAtap['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP, $rusakTutupAtap['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP, $rusakTutupAtap, $comparison);
    }

    /**
     * Filter the query on the ket_tutup_atap column
     *
     * Example usage:
     * <code>
     * $query->filterByKetTutupAtap('fooValue');   // WHERE ket_tutup_atap = 'fooValue'
     * $query->filterByKetTutupAtap('%fooValue%'); // WHERE ket_tutup_atap LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketTutupAtap The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetTutupAtap($ketTutupAtap = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketTutupAtap)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketTutupAtap)) {
                $ketTutupAtap = str_replace('*', '%', $ketTutupAtap);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::KET_TUTUP_ATAP, $ketTutupAtap, $comparison);
    }

    /**
     * Filter the query on the nilai_saat_ini column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiSaatIni(1234); // WHERE nilai_saat_ini = 1234
     * $query->filterByNilaiSaatIni(array(12, 34)); // WHERE nilai_saat_ini IN (12, 34)
     * $query->filterByNilaiSaatIni(array('min' => 12)); // WHERE nilai_saat_ini >= 12
     * $query->filterByNilaiSaatIni(array('max' => 12)); // WHERE nilai_saat_ini <= 12
     * </code>
     *
     * @param     mixed $nilaiSaatIni The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByNilaiSaatIni($nilaiSaatIni = null, $comparison = null)
    {
        if (is_array($nilaiSaatIni)) {
            $useMinMax = false;
            if (isset($nilaiSaatIni['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::NILAI_SAAT_INI, $nilaiSaatIni['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiSaatIni['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::NILAI_SAAT_INI, $nilaiSaatIni['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::NILAI_SAAT_INI, $nilaiSaatIni, $comparison);
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BangunanLongitudinalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanLongitudinalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BangunanLongitudinalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(BangunanLongitudinalPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanLongitudinalPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
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
     * @return BangunanLongitudinalQuery The current query, for fluid interface
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
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(BangunanLongitudinalPeer::ID_BANGUNAN, $bangunan->getIdBangunan(), $comparison);
        } elseif ($bangunan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanLongitudinalPeer::ID_BANGUNAN, $bangunan->toKeyValue('PrimaryKey', 'IdBangunan'), $comparison);
        } else {
            throw new PropelException('filterByBangunan() only accepts arguments of type Bangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bangunan');

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
            $this->addJoinObject($join, 'Bangunan');
        }

        return $this;
    }

    /**
     * Use the Bangunan relation Bangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanQuery A secondary query class using the current class as primary query
     */
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BangunanLongitudinal $bangunanLongitudinal Object to remove from the list of results
     *
     * @return BangunanLongitudinalQuery The current query, for fluid interface
     */
    public function prune($bangunanLongitudinal = null)
    {
        if ($bangunanLongitudinal) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BangunanLongitudinalPeer::ID_BANGUNAN), $bangunanLongitudinal->getIdBangunan(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BangunanLongitudinalPeer::SEMESTER_ID), $bangunanLongitudinal->getSemesterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
