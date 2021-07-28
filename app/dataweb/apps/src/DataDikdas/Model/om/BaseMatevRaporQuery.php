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
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MatevRapor;
use DataDikdas\Model\MatevRaporPeer;
use DataDikdas\Model\MatevRaporQuery;
use DataDikdas\Model\NilaiRapor;

/**
 * Base class that represents a query for the 'nilai.matev_rapor' table.
 *
 * 
 *
 * @method MatevRaporQuery orderByIdEvaluasi($order = Criteria::ASC) Order by the id_evaluasi column
 * @method MatevRaporQuery orderByNmMataEvaluasi($order = Criteria::ASC) Order by the nm_mata_evaluasi column
 * @method MatevRaporQuery orderByADariTemplate($order = Criteria::ASC) Order by the a_dari_template column
 * @method MatevRaporQuery orderByNoUrut($order = Criteria::ASC) Order by the no_urut column
 * @method MatevRaporQuery orderByKkmKognitif($order = Criteria::ASC) Order by the kkm_kognitif column
 * @method MatevRaporQuery orderByKkmPsikomotorik($order = Criteria::ASC) Order by the kkm_psikomotorik column
 * @method MatevRaporQuery orderByRombonganBelajarId($order = Criteria::ASC) Order by the rombongan_belajar_id column
 * @method MatevRaporQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method MatevRaporQuery orderByPembelajaranId($order = Criteria::ASC) Order by the pembelajaran_id column
 * @method MatevRaporQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MatevRaporQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MatevRaporQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method MatevRaporQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method MatevRaporQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method MatevRaporQuery groupByIdEvaluasi() Group by the id_evaluasi column
 * @method MatevRaporQuery groupByNmMataEvaluasi() Group by the nm_mata_evaluasi column
 * @method MatevRaporQuery groupByADariTemplate() Group by the a_dari_template column
 * @method MatevRaporQuery groupByNoUrut() Group by the no_urut column
 * @method MatevRaporQuery groupByKkmKognitif() Group by the kkm_kognitif column
 * @method MatevRaporQuery groupByKkmPsikomotorik() Group by the kkm_psikomotorik column
 * @method MatevRaporQuery groupByRombonganBelajarId() Group by the rombongan_belajar_id column
 * @method MatevRaporQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method MatevRaporQuery groupByPembelajaranId() Group by the pembelajaran_id column
 * @method MatevRaporQuery groupByCreateDate() Group by the create_date column
 * @method MatevRaporQuery groupByLastUpdate() Group by the last_update column
 * @method MatevRaporQuery groupBySoftDelete() Group by the soft_delete column
 * @method MatevRaporQuery groupByLastSync() Group by the last_sync column
 * @method MatevRaporQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method MatevRaporQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MatevRaporQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MatevRaporQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MatevRaporQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method MatevRaporQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method MatevRaporQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method MatevRaporQuery leftJoinNilaiRapor($relationAlias = null) Adds a LEFT JOIN clause to the query using the NilaiRapor relation
 * @method MatevRaporQuery rightJoinNilaiRapor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NilaiRapor relation
 * @method MatevRaporQuery innerJoinNilaiRapor($relationAlias = null) Adds a INNER JOIN clause to the query using the NilaiRapor relation
 *
 * @method MatevRapor findOne(PropelPDO $con = null) Return the first MatevRapor matching the query
 * @method MatevRapor findOneOrCreate(PropelPDO $con = null) Return the first MatevRapor matching the query, or a new MatevRapor object populated from the query conditions when no match is found
 *
 * @method MatevRapor findOneByNmMataEvaluasi(string $nm_mata_evaluasi) Return the first MatevRapor filtered by the nm_mata_evaluasi column
 * @method MatevRapor findOneByADariTemplate(string $a_dari_template) Return the first MatevRapor filtered by the a_dari_template column
 * @method MatevRapor findOneByNoUrut(string $no_urut) Return the first MatevRapor filtered by the no_urut column
 * @method MatevRapor findOneByKkmKognitif(string $kkm_kognitif) Return the first MatevRapor filtered by the kkm_kognitif column
 * @method MatevRapor findOneByKkmPsikomotorik(string $kkm_psikomotorik) Return the first MatevRapor filtered by the kkm_psikomotorik column
 * @method MatevRapor findOneByRombonganBelajarId(string $rombongan_belajar_id) Return the first MatevRapor filtered by the rombongan_belajar_id column
 * @method MatevRapor findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first MatevRapor filtered by the mata_pelajaran_id column
 * @method MatevRapor findOneByPembelajaranId(string $pembelajaran_id) Return the first MatevRapor filtered by the pembelajaran_id column
 * @method MatevRapor findOneByCreateDate(string $create_date) Return the first MatevRapor filtered by the create_date column
 * @method MatevRapor findOneByLastUpdate(string $last_update) Return the first MatevRapor filtered by the last_update column
 * @method MatevRapor findOneBySoftDelete(string $soft_delete) Return the first MatevRapor filtered by the soft_delete column
 * @method MatevRapor findOneByLastSync(string $last_sync) Return the first MatevRapor filtered by the last_sync column
 * @method MatevRapor findOneByUpdaterId(string $updater_id) Return the first MatevRapor filtered by the updater_id column
 *
 * @method array findByIdEvaluasi(string $id_evaluasi) Return MatevRapor objects filtered by the id_evaluasi column
 * @method array findByNmMataEvaluasi(string $nm_mata_evaluasi) Return MatevRapor objects filtered by the nm_mata_evaluasi column
 * @method array findByADariTemplate(string $a_dari_template) Return MatevRapor objects filtered by the a_dari_template column
 * @method array findByNoUrut(string $no_urut) Return MatevRapor objects filtered by the no_urut column
 * @method array findByKkmKognitif(string $kkm_kognitif) Return MatevRapor objects filtered by the kkm_kognitif column
 * @method array findByKkmPsikomotorik(string $kkm_psikomotorik) Return MatevRapor objects filtered by the kkm_psikomotorik column
 * @method array findByRombonganBelajarId(string $rombongan_belajar_id) Return MatevRapor objects filtered by the rombongan_belajar_id column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return MatevRapor objects filtered by the mata_pelajaran_id column
 * @method array findByPembelajaranId(string $pembelajaran_id) Return MatevRapor objects filtered by the pembelajaran_id column
 * @method array findByCreateDate(string $create_date) Return MatevRapor objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return MatevRapor objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return MatevRapor objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return MatevRapor objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return MatevRapor objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMatevRaporQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMatevRaporQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\MatevRapor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MatevRaporQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MatevRaporQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MatevRaporQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MatevRaporQuery) {
            return $criteria;
        }
        $query = new MatevRaporQuery();
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
     * @return   MatevRapor|MatevRapor[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MatevRaporPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MatevRapor A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdEvaluasi($key, $con = null)
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
     * @return                 MatevRapor A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_evaluasi", "nm_mata_evaluasi", "a_dari_template", "no_urut", "kkm_kognitif", "kkm_psikomotorik", "rombongan_belajar_id", "mata_pelajaran_id", "pembelajaran_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "nilai"."matev_rapor" WHERE "id_evaluasi" = :p0';
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
            $obj = new MatevRapor();
            $obj->hydrate($row);
            MatevRaporPeer::addInstanceToPool($obj, (string) $key);
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
     * @return MatevRapor|MatevRapor[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MatevRapor[]|mixed the list of results, formatted by the current formatter
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
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MatevRaporPeer::ID_EVALUASI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MatevRaporPeer::ID_EVALUASI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_evaluasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEvaluasi('fooValue');   // WHERE id_evaluasi = 'fooValue'
     * $query->filterByIdEvaluasi('%fooValue%'); // WHERE id_evaluasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idEvaluasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByIdEvaluasi($idEvaluasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idEvaluasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idEvaluasi)) {
                $idEvaluasi = str_replace('*', '%', $idEvaluasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::ID_EVALUASI, $idEvaluasi, $comparison);
    }

    /**
     * Filter the query on the nm_mata_evaluasi column
     *
     * Example usage:
     * <code>
     * $query->filterByNmMataEvaluasi('fooValue');   // WHERE nm_mata_evaluasi = 'fooValue'
     * $query->filterByNmMataEvaluasi('%fooValue%'); // WHERE nm_mata_evaluasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmMataEvaluasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByNmMataEvaluasi($nmMataEvaluasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmMataEvaluasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmMataEvaluasi)) {
                $nmMataEvaluasi = str_replace('*', '%', $nmMataEvaluasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::NM_MATA_EVALUASI, $nmMataEvaluasi, $comparison);
    }

    /**
     * Filter the query on the a_dari_template column
     *
     * Example usage:
     * <code>
     * $query->filterByADariTemplate(1234); // WHERE a_dari_template = 1234
     * $query->filterByADariTemplate(array(12, 34)); // WHERE a_dari_template IN (12, 34)
     * $query->filterByADariTemplate(array('min' => 12)); // WHERE a_dari_template >= 12
     * $query->filterByADariTemplate(array('max' => 12)); // WHERE a_dari_template <= 12
     * </code>
     *
     * @param     mixed $aDariTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByADariTemplate($aDariTemplate = null, $comparison = null)
    {
        if (is_array($aDariTemplate)) {
            $useMinMax = false;
            if (isset($aDariTemplate['min'])) {
                $this->addUsingAlias(MatevRaporPeer::A_DARI_TEMPLATE, $aDariTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aDariTemplate['max'])) {
                $this->addUsingAlias(MatevRaporPeer::A_DARI_TEMPLATE, $aDariTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::A_DARI_TEMPLATE, $aDariTemplate, $comparison);
    }

    /**
     * Filter the query on the no_urut column
     *
     * Example usage:
     * <code>
     * $query->filterByNoUrut(1234); // WHERE no_urut = 1234
     * $query->filterByNoUrut(array(12, 34)); // WHERE no_urut IN (12, 34)
     * $query->filterByNoUrut(array('min' => 12)); // WHERE no_urut >= 12
     * $query->filterByNoUrut(array('max' => 12)); // WHERE no_urut <= 12
     * </code>
     *
     * @param     mixed $noUrut The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByNoUrut($noUrut = null, $comparison = null)
    {
        if (is_array($noUrut)) {
            $useMinMax = false;
            if (isset($noUrut['min'])) {
                $this->addUsingAlias(MatevRaporPeer::NO_URUT, $noUrut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($noUrut['max'])) {
                $this->addUsingAlias(MatevRaporPeer::NO_URUT, $noUrut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::NO_URUT, $noUrut, $comparison);
    }

    /**
     * Filter the query on the kkm_kognitif column
     *
     * Example usage:
     * <code>
     * $query->filterByKkmKognitif(1234); // WHERE kkm_kognitif = 1234
     * $query->filterByKkmKognitif(array(12, 34)); // WHERE kkm_kognitif IN (12, 34)
     * $query->filterByKkmKognitif(array('min' => 12)); // WHERE kkm_kognitif >= 12
     * $query->filterByKkmKognitif(array('max' => 12)); // WHERE kkm_kognitif <= 12
     * </code>
     *
     * @param     mixed $kkmKognitif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByKkmKognitif($kkmKognitif = null, $comparison = null)
    {
        if (is_array($kkmKognitif)) {
            $useMinMax = false;
            if (isset($kkmKognitif['min'])) {
                $this->addUsingAlias(MatevRaporPeer::KKM_KOGNITIF, $kkmKognitif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkmKognitif['max'])) {
                $this->addUsingAlias(MatevRaporPeer::KKM_KOGNITIF, $kkmKognitif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::KKM_KOGNITIF, $kkmKognitif, $comparison);
    }

    /**
     * Filter the query on the kkm_psikomotorik column
     *
     * Example usage:
     * <code>
     * $query->filterByKkmPsikomotorik(1234); // WHERE kkm_psikomotorik = 1234
     * $query->filterByKkmPsikomotorik(array(12, 34)); // WHERE kkm_psikomotorik IN (12, 34)
     * $query->filterByKkmPsikomotorik(array('min' => 12)); // WHERE kkm_psikomotorik >= 12
     * $query->filterByKkmPsikomotorik(array('max' => 12)); // WHERE kkm_psikomotorik <= 12
     * </code>
     *
     * @param     mixed $kkmPsikomotorik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByKkmPsikomotorik($kkmPsikomotorik = null, $comparison = null)
    {
        if (is_array($kkmPsikomotorik)) {
            $useMinMax = false;
            if (isset($kkmPsikomotorik['min'])) {
                $this->addUsingAlias(MatevRaporPeer::KKM_PSIKOMOTORIK, $kkmPsikomotorik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkmPsikomotorik['max'])) {
                $this->addUsingAlias(MatevRaporPeer::KKM_PSIKOMOTORIK, $kkmPsikomotorik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::KKM_PSIKOMOTORIK, $kkmPsikomotorik, $comparison);
    }

    /**
     * Filter the query on the rombongan_belajar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRombonganBelajarId('fooValue');   // WHERE rombongan_belajar_id = 'fooValue'
     * $query->filterByRombonganBelajarId('%fooValue%'); // WHERE rombongan_belajar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rombonganBelajarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByRombonganBelajarId($rombonganBelajarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rombonganBelajarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rombonganBelajarId)) {
                $rombonganBelajarId = str_replace('*', '%', $rombonganBelajarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajarId, $comparison);
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
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(MatevRaporPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(MatevRaporPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
    }

    /**
     * Filter the query on the pembelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPembelajaranId('fooValue');   // WHERE pembelajaran_id = 'fooValue'
     * $query->filterByPembelajaranId('%fooValue%'); // WHERE pembelajaran_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pembelajaranId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByPembelajaranId($pembelajaranId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pembelajaranId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pembelajaranId)) {
                $pembelajaranId = str_replace('*', '%', $pembelajaranId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::PEMBELAJARAN_ID, $pembelajaranId, $comparison);
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
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MatevRaporPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MatevRaporPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MatevRaporPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MatevRaporPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(MatevRaporPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(MatevRaporPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MatevRaporPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MatevRaporPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MatevRaporPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return MatevRaporQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MatevRaporPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MatevRaporQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(MatevRaporPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MatevRaporPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
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
     * @return MatevRaporQuery The current query, for fluid interface
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
     * Filter the query by a related NilaiRapor object
     *
     * @param   NilaiRapor|PropelObjectCollection $nilaiRapor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MatevRaporQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNilaiRapor($nilaiRapor, $comparison = null)
    {
        if ($nilaiRapor instanceof NilaiRapor) {
            return $this
                ->addUsingAlias(MatevRaporPeer::ID_EVALUASI, $nilaiRapor->getIdEvaluasi(), $comparison);
        } elseif ($nilaiRapor instanceof PropelObjectCollection) {
            return $this
                ->useNilaiRaporQuery()
                ->filterByPrimaryKeys($nilaiRapor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNilaiRapor() only accepts arguments of type NilaiRapor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NilaiRapor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function joinNilaiRapor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NilaiRapor');

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
            $this->addJoinObject($join, 'NilaiRapor');
        }

        return $this;
    }

    /**
     * Use the NilaiRapor relation NilaiRapor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\NilaiRaporQuery A secondary query class using the current class as primary query
     */
    public function useNilaiRaporQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNilaiRapor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NilaiRapor', '\DataDikdas\Model\NilaiRaporQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MatevRapor $matevRapor Object to remove from the list of results
     *
     * @return MatevRaporQuery The current query, for fluid interface
     */
    public function prune($matevRapor = null)
    {
        if ($matevRapor) {
            $this->addUsingAlias(MatevRaporPeer::ID_EVALUASI, $matevRapor->getIdEvaluasi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
