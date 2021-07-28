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
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\InstalasiPeer;
use DataDikdas\Model\InstalasiQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SyncLog;

/**
 * Base class that represents a query for the 'instalasi' table.
 *
 * 
 *
 * @method InstalasiQuery orderByIdInstalasi($order = Criteria::ASC) Order by the id_instalasi column
 * @method InstalasiQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method InstalasiQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method InstalasiQuery orderByJnsInstalasi($order = Criteria::ASC) Order by the jns_instalasi column
 * @method InstalasiQuery orderByALinkAktif($order = Criteria::ASC) Order by the a_link_aktif column
 * @method InstalasiQuery orderByKetLink($order = Criteria::ASC) Order by the ket_link column
 *
 * @method InstalasiQuery groupByIdInstalasi() Group by the id_instalasi column
 * @method InstalasiQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method InstalasiQuery groupBySekolahId() Group by the sekolah_id column
 * @method InstalasiQuery groupByJnsInstalasi() Group by the jns_instalasi column
 * @method InstalasiQuery groupByALinkAktif() Group by the a_link_aktif column
 * @method InstalasiQuery groupByKetLink() Group by the ket_link column
 *
 * @method InstalasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method InstalasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method InstalasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method InstalasiQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method InstalasiQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method InstalasiQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method InstalasiQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method InstalasiQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method InstalasiQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method InstalasiQuery leftJoinSyncLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the SyncLog relation
 * @method InstalasiQuery rightJoinSyncLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SyncLog relation
 * @method InstalasiQuery innerJoinSyncLog($relationAlias = null) Adds a INNER JOIN clause to the query using the SyncLog relation
 *
 * @method Instalasi findOne(PropelPDO $con = null) Return the first Instalasi matching the query
 * @method Instalasi findOneOrCreate(PropelPDO $con = null) Return the first Instalasi matching the query, or a new Instalasi object populated from the query conditions when no match is found
 *
 * @method Instalasi findOneByKodeWilayah(string $kode_wilayah) Return the first Instalasi filtered by the kode_wilayah column
 * @method Instalasi findOneBySekolahId(string $sekolah_id) Return the first Instalasi filtered by the sekolah_id column
 * @method Instalasi findOneByJnsInstalasi(string $jns_instalasi) Return the first Instalasi filtered by the jns_instalasi column
 * @method Instalasi findOneByALinkAktif(string $a_link_aktif) Return the first Instalasi filtered by the a_link_aktif column
 * @method Instalasi findOneByKetLink(string $ket_link) Return the first Instalasi filtered by the ket_link column
 *
 * @method array findByIdInstalasi(string $id_instalasi) Return Instalasi objects filtered by the id_instalasi column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Instalasi objects filtered by the kode_wilayah column
 * @method array findBySekolahId(string $sekolah_id) Return Instalasi objects filtered by the sekolah_id column
 * @method array findByJnsInstalasi(string $jns_instalasi) Return Instalasi objects filtered by the jns_instalasi column
 * @method array findByALinkAktif(string $a_link_aktif) Return Instalasi objects filtered by the a_link_aktif column
 * @method array findByKetLink(string $ket_link) Return Instalasi objects filtered by the ket_link column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseInstalasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseInstalasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Instalasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new InstalasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   InstalasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return InstalasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof InstalasiQuery) {
            return $criteria;
        }
        $query = new InstalasiQuery();
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
     * @return   Instalasi|Instalasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InstalasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(InstalasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Instalasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdInstalasi($key, $con = null)
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
     * @return                 Instalasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_instalasi", "kode_wilayah", "sekolah_id", "jns_instalasi", "a_link_aktif", "ket_link" FROM "instalasi" WHERE "id_instalasi" = :p0';
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
            $obj = new Instalasi();
            $obj->hydrate($row);
            InstalasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Instalasi|Instalasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Instalasi[]|mixed the list of results, formatted by the current formatter
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
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InstalasiPeer::ID_INSTALASI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InstalasiPeer::ID_INSTALASI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_instalasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdInstalasi('fooValue');   // WHERE id_instalasi = 'fooValue'
     * $query->filterByIdInstalasi('%fooValue%'); // WHERE id_instalasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idInstalasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function filterByIdInstalasi($idInstalasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idInstalasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idInstalasi)) {
                $idInstalasi = str_replace('*', '%', $idInstalasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InstalasiPeer::ID_INSTALASI, $idInstalasi, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%'); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah)) {
                $kodeWilayah = str_replace('*', '%', $kodeWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InstalasiPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return InstalasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InstalasiPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the jns_instalasi column
     *
     * Example usage:
     * <code>
     * $query->filterByJnsInstalasi('fooValue');   // WHERE jns_instalasi = 'fooValue'
     * $query->filterByJnsInstalasi('%fooValue%'); // WHERE jns_instalasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jnsInstalasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function filterByJnsInstalasi($jnsInstalasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jnsInstalasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jnsInstalasi)) {
                $jnsInstalasi = str_replace('*', '%', $jnsInstalasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InstalasiPeer::JNS_INSTALASI, $jnsInstalasi, $comparison);
    }

    /**
     * Filter the query on the a_link_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByALinkAktif(1234); // WHERE a_link_aktif = 1234
     * $query->filterByALinkAktif(array(12, 34)); // WHERE a_link_aktif IN (12, 34)
     * $query->filterByALinkAktif(array('min' => 12)); // WHERE a_link_aktif >= 12
     * $query->filterByALinkAktif(array('max' => 12)); // WHERE a_link_aktif <= 12
     * </code>
     *
     * @param     mixed $aLinkAktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function filterByALinkAktif($aLinkAktif = null, $comparison = null)
    {
        if (is_array($aLinkAktif)) {
            $useMinMax = false;
            if (isset($aLinkAktif['min'])) {
                $this->addUsingAlias(InstalasiPeer::A_LINK_AKTIF, $aLinkAktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aLinkAktif['max'])) {
                $this->addUsingAlias(InstalasiPeer::A_LINK_AKTIF, $aLinkAktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstalasiPeer::A_LINK_AKTIF, $aLinkAktif, $comparison);
    }

    /**
     * Filter the query on the ket_link column
     *
     * Example usage:
     * <code>
     * $query->filterByKetLink('fooValue');   // WHERE ket_link = 'fooValue'
     * $query->filterByKetLink('%fooValue%'); // WHERE ket_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function filterByKetLink($ketLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketLink)) {
                $ketLink = str_replace('*', '%', $ketLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InstalasiPeer::KET_LINK, $ketLink, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InstalasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(InstalasiPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InstalasiPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayah');

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
            $this->addJoinObject($join, 'MstWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InstalasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(InstalasiPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InstalasiPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related SyncLog object
     *
     * @param   SyncLog|PropelObjectCollection $syncLog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InstalasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySyncLog($syncLog, $comparison = null)
    {
        if ($syncLog instanceof SyncLog) {
            return $this
                ->addUsingAlias(InstalasiPeer::ID_INSTALASI, $syncLog->getIdInstalasi(), $comparison);
        } elseif ($syncLog instanceof PropelObjectCollection) {
            return $this
                ->useSyncLogQuery()
                ->filterByPrimaryKeys($syncLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySyncLog() only accepts arguments of type SyncLog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SyncLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function joinSyncLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SyncLog');

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
            $this->addJoinObject($join, 'SyncLog');
        }

        return $this;
    }

    /**
     * Use the SyncLog relation SyncLog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SyncLogQuery A secondary query class using the current class as primary query
     */
    public function useSyncLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSyncLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SyncLog', '\DataDikdas\Model\SyncLogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Instalasi $instalasi Object to remove from the list of results
     *
     * @return InstalasiQuery The current query, for fluid interface
     */
    public function prune($instalasi = null)
    {
        if ($instalasi) {
            $this->addUsingAlias(InstalasiPeer::ID_INSTALASI, $instalasi->getIdInstalasi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
