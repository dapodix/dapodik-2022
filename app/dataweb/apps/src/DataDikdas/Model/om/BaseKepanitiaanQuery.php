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
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\JenisKepanitiaan;
use DataDikdas\Model\Kepanitiaan;
use DataDikdas\Model\KepanitiaanPeer;
use DataDikdas\Model\KepanitiaanQuery;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'kepanitiaan' table.
 *
 * 
 *
 * @method KepanitiaanQuery orderByIdPanitia($order = Criteria::ASC) Order by the id_panitia column
 * @method KepanitiaanQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method KepanitiaanQuery orderByIdJnsPanitia($order = Criteria::ASC) Order by the id_jns_panitia column
 * @method KepanitiaanQuery orderByNmPanitia($order = Criteria::ASC) Order by the nm_panitia column
 * @method KepanitiaanQuery orderByInstansi($order = Criteria::ASC) Order by the instansi column
 * @method KepanitiaanQuery orderByTktPanitia($order = Criteria::ASC) Order by the tkt_panitia column
 * @method KepanitiaanQuery orderBySkTugas($order = Criteria::ASC) Order by the sk_tugas column
 * @method KepanitiaanQuery orderByTmtSkTugas($order = Criteria::ASC) Order by the tmt_sk_tugas column
 * @method KepanitiaanQuery orderByTstSkTugas($order = Criteria::ASC) Order by the tst_sk_tugas column
 * @method KepanitiaanQuery orderByAPasangPapan($order = Criteria::ASC) Order by the a_pasang_papan column
 * @method KepanitiaanQuery orderByAFormulir($order = Criteria::ASC) Order by the a_formulir column
 * @method KepanitiaanQuery orderByASilabus($order = Criteria::ASC) Order by the a_silabus column
 * @method KepanitiaanQuery orderByABerlakuPos($order = Criteria::ASC) Order by the a_berlaku_pos column
 * @method KepanitiaanQuery orderByASosialisasiPos($order = Criteria::ASC) Order by the a_sosialisasi_pos column
 * @method KepanitiaanQuery orderByAKsEdukatif($order = Criteria::ASC) Order by the a_ks_edukatif column
 * @method KepanitiaanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KepanitiaanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KepanitiaanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method KepanitiaanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method KepanitiaanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method KepanitiaanQuery groupByIdPanitia() Group by the id_panitia column
 * @method KepanitiaanQuery groupBySekolahId() Group by the sekolah_id column
 * @method KepanitiaanQuery groupByIdJnsPanitia() Group by the id_jns_panitia column
 * @method KepanitiaanQuery groupByNmPanitia() Group by the nm_panitia column
 * @method KepanitiaanQuery groupByInstansi() Group by the instansi column
 * @method KepanitiaanQuery groupByTktPanitia() Group by the tkt_panitia column
 * @method KepanitiaanQuery groupBySkTugas() Group by the sk_tugas column
 * @method KepanitiaanQuery groupByTmtSkTugas() Group by the tmt_sk_tugas column
 * @method KepanitiaanQuery groupByTstSkTugas() Group by the tst_sk_tugas column
 * @method KepanitiaanQuery groupByAPasangPapan() Group by the a_pasang_papan column
 * @method KepanitiaanQuery groupByAFormulir() Group by the a_formulir column
 * @method KepanitiaanQuery groupByASilabus() Group by the a_silabus column
 * @method KepanitiaanQuery groupByABerlakuPos() Group by the a_berlaku_pos column
 * @method KepanitiaanQuery groupByASosialisasiPos() Group by the a_sosialisasi_pos column
 * @method KepanitiaanQuery groupByAKsEdukatif() Group by the a_ks_edukatif column
 * @method KepanitiaanQuery groupByCreateDate() Group by the create_date column
 * @method KepanitiaanQuery groupByLastUpdate() Group by the last_update column
 * @method KepanitiaanQuery groupBySoftDelete() Group by the soft_delete column
 * @method KepanitiaanQuery groupByLastSync() Group by the last_sync column
 * @method KepanitiaanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method KepanitiaanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KepanitiaanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KepanitiaanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KepanitiaanQuery leftJoinJenisKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisKepanitiaan relation
 * @method KepanitiaanQuery rightJoinJenisKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisKepanitiaan relation
 * @method KepanitiaanQuery innerJoinJenisKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisKepanitiaan relation
 *
 * @method KepanitiaanQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method KepanitiaanQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method KepanitiaanQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method KepanitiaanQuery leftJoinAktivitasKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the AktivitasKepanitiaan relation
 * @method KepanitiaanQuery rightJoinAktivitasKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AktivitasKepanitiaan relation
 * @method KepanitiaanQuery innerJoinAktivitasKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the AktivitasKepanitiaan relation
 *
 * @method KepanitiaanQuery leftJoinAnggotaPanitia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaPanitia relation
 * @method KepanitiaanQuery rightJoinAnggotaPanitia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaPanitia relation
 * @method KepanitiaanQuery innerJoinAnggotaPanitia($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaPanitia relation
 *
 * @method Kepanitiaan findOne(PropelPDO $con = null) Return the first Kepanitiaan matching the query
 * @method Kepanitiaan findOneOrCreate(PropelPDO $con = null) Return the first Kepanitiaan matching the query, or a new Kepanitiaan object populated from the query conditions when no match is found
 *
 * @method Kepanitiaan findOneBySekolahId(string $sekolah_id) Return the first Kepanitiaan filtered by the sekolah_id column
 * @method Kepanitiaan findOneByIdJnsPanitia(int $id_jns_panitia) Return the first Kepanitiaan filtered by the id_jns_panitia column
 * @method Kepanitiaan findOneByNmPanitia(string $nm_panitia) Return the first Kepanitiaan filtered by the nm_panitia column
 * @method Kepanitiaan findOneByInstansi(string $instansi) Return the first Kepanitiaan filtered by the instansi column
 * @method Kepanitiaan findOneByTktPanitia(string $tkt_panitia) Return the first Kepanitiaan filtered by the tkt_panitia column
 * @method Kepanitiaan findOneBySkTugas(string $sk_tugas) Return the first Kepanitiaan filtered by the sk_tugas column
 * @method Kepanitiaan findOneByTmtSkTugas(string $tmt_sk_tugas) Return the first Kepanitiaan filtered by the tmt_sk_tugas column
 * @method Kepanitiaan findOneByTstSkTugas(string $tst_sk_tugas) Return the first Kepanitiaan filtered by the tst_sk_tugas column
 * @method Kepanitiaan findOneByAPasangPapan(string $a_pasang_papan) Return the first Kepanitiaan filtered by the a_pasang_papan column
 * @method Kepanitiaan findOneByAFormulir(string $a_formulir) Return the first Kepanitiaan filtered by the a_formulir column
 * @method Kepanitiaan findOneByASilabus(string $a_silabus) Return the first Kepanitiaan filtered by the a_silabus column
 * @method Kepanitiaan findOneByABerlakuPos(string $a_berlaku_pos) Return the first Kepanitiaan filtered by the a_berlaku_pos column
 * @method Kepanitiaan findOneByASosialisasiPos(string $a_sosialisasi_pos) Return the first Kepanitiaan filtered by the a_sosialisasi_pos column
 * @method Kepanitiaan findOneByAKsEdukatif(string $a_ks_edukatif) Return the first Kepanitiaan filtered by the a_ks_edukatif column
 * @method Kepanitiaan findOneByCreateDate(string $create_date) Return the first Kepanitiaan filtered by the create_date column
 * @method Kepanitiaan findOneByLastUpdate(string $last_update) Return the first Kepanitiaan filtered by the last_update column
 * @method Kepanitiaan findOneBySoftDelete(string $soft_delete) Return the first Kepanitiaan filtered by the soft_delete column
 * @method Kepanitiaan findOneByLastSync(string $last_sync) Return the first Kepanitiaan filtered by the last_sync column
 * @method Kepanitiaan findOneByUpdaterId(string $updater_id) Return the first Kepanitiaan filtered by the updater_id column
 *
 * @method array findByIdPanitia(string $id_panitia) Return Kepanitiaan objects filtered by the id_panitia column
 * @method array findBySekolahId(string $sekolah_id) Return Kepanitiaan objects filtered by the sekolah_id column
 * @method array findByIdJnsPanitia(int $id_jns_panitia) Return Kepanitiaan objects filtered by the id_jns_panitia column
 * @method array findByNmPanitia(string $nm_panitia) Return Kepanitiaan objects filtered by the nm_panitia column
 * @method array findByInstansi(string $instansi) Return Kepanitiaan objects filtered by the instansi column
 * @method array findByTktPanitia(string $tkt_panitia) Return Kepanitiaan objects filtered by the tkt_panitia column
 * @method array findBySkTugas(string $sk_tugas) Return Kepanitiaan objects filtered by the sk_tugas column
 * @method array findByTmtSkTugas(string $tmt_sk_tugas) Return Kepanitiaan objects filtered by the tmt_sk_tugas column
 * @method array findByTstSkTugas(string $tst_sk_tugas) Return Kepanitiaan objects filtered by the tst_sk_tugas column
 * @method array findByAPasangPapan(string $a_pasang_papan) Return Kepanitiaan objects filtered by the a_pasang_papan column
 * @method array findByAFormulir(string $a_formulir) Return Kepanitiaan objects filtered by the a_formulir column
 * @method array findByASilabus(string $a_silabus) Return Kepanitiaan objects filtered by the a_silabus column
 * @method array findByABerlakuPos(string $a_berlaku_pos) Return Kepanitiaan objects filtered by the a_berlaku_pos column
 * @method array findByASosialisasiPos(string $a_sosialisasi_pos) Return Kepanitiaan objects filtered by the a_sosialisasi_pos column
 * @method array findByAKsEdukatif(string $a_ks_edukatif) Return Kepanitiaan objects filtered by the a_ks_edukatif column
 * @method array findByCreateDate(string $create_date) Return Kepanitiaan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Kepanitiaan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Kepanitiaan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Kepanitiaan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Kepanitiaan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKepanitiaanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKepanitiaanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Kepanitiaan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KepanitiaanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KepanitiaanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KepanitiaanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KepanitiaanQuery) {
            return $criteria;
        }
        $query = new KepanitiaanQuery();
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
     * @return   Kepanitiaan|Kepanitiaan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KepanitiaanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Kepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPanitia($key, $con = null)
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
     * @return                 Kepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_panitia", "sekolah_id", "id_jns_panitia", "nm_panitia", "instansi", "tkt_panitia", "sk_tugas", "tmt_sk_tugas", "tst_sk_tugas", "a_pasang_papan", "a_formulir", "a_silabus", "a_berlaku_pos", "a_sosialisasi_pos", "a_ks_edukatif", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "kepanitiaan" WHERE "id_panitia" = :p0';
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
            $obj = new Kepanitiaan();
            $obj->hydrate($row);
            KepanitiaanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Kepanitiaan|Kepanitiaan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Kepanitiaan[]|mixed the list of results, formatted by the current formatter
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
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KepanitiaanPeer::ID_PANITIA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KepanitiaanPeer::ID_PANITIA, $keys, Criteria::IN);
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
     * @return KepanitiaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KepanitiaanPeer::ID_PANITIA, $idPanitia, $comparison);
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
     * @return KepanitiaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KepanitiaanPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the id_jns_panitia column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsPanitia(1234); // WHERE id_jns_panitia = 1234
     * $query->filterByIdJnsPanitia(array(12, 34)); // WHERE id_jns_panitia IN (12, 34)
     * $query->filterByIdJnsPanitia(array('min' => 12)); // WHERE id_jns_panitia >= 12
     * $query->filterByIdJnsPanitia(array('max' => 12)); // WHERE id_jns_panitia <= 12
     * </code>
     *
     * @see       filterByJenisKepanitiaan()
     *
     * @param     mixed $idJnsPanitia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByIdJnsPanitia($idJnsPanitia = null, $comparison = null)
    {
        if (is_array($idJnsPanitia)) {
            $useMinMax = false;
            if (isset($idJnsPanitia['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::ID_JNS_PANITIA, $idJnsPanitia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsPanitia['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::ID_JNS_PANITIA, $idJnsPanitia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::ID_JNS_PANITIA, $idJnsPanitia, $comparison);
    }

    /**
     * Filter the query on the nm_panitia column
     *
     * Example usage:
     * <code>
     * $query->filterByNmPanitia('fooValue');   // WHERE nm_panitia = 'fooValue'
     * $query->filterByNmPanitia('%fooValue%'); // WHERE nm_panitia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmPanitia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByNmPanitia($nmPanitia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmPanitia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmPanitia)) {
                $nmPanitia = str_replace('*', '%', $nmPanitia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::NM_PANITIA, $nmPanitia, $comparison);
    }

    /**
     * Filter the query on the instansi column
     *
     * Example usage:
     * <code>
     * $query->filterByInstansi('fooValue');   // WHERE instansi = 'fooValue'
     * $query->filterByInstansi('%fooValue%'); // WHERE instansi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instansi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByInstansi($instansi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instansi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $instansi)) {
                $instansi = str_replace('*', '%', $instansi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::INSTANSI, $instansi, $comparison);
    }

    /**
     * Filter the query on the tkt_panitia column
     *
     * Example usage:
     * <code>
     * $query->filterByTktPanitia('fooValue');   // WHERE tkt_panitia = 'fooValue'
     * $query->filterByTktPanitia('%fooValue%'); // WHERE tkt_panitia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tktPanitia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByTktPanitia($tktPanitia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tktPanitia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tktPanitia)) {
                $tktPanitia = str_replace('*', '%', $tktPanitia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::TKT_PANITIA, $tktPanitia, $comparison);
    }

    /**
     * Filter the query on the sk_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterBySkTugas('fooValue');   // WHERE sk_tugas = 'fooValue'
     * $query->filterBySkTugas('%fooValue%'); // WHERE sk_tugas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skTugas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterBySkTugas($skTugas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skTugas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skTugas)) {
                $skTugas = str_replace('*', '%', $skTugas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::SK_TUGAS, $skTugas, $comparison);
    }

    /**
     * Filter the query on the tmt_sk_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtSkTugas('2011-03-14'); // WHERE tmt_sk_tugas = '2011-03-14'
     * $query->filterByTmtSkTugas('now'); // WHERE tmt_sk_tugas = '2011-03-14'
     * $query->filterByTmtSkTugas(array('max' => 'yesterday')); // WHERE tmt_sk_tugas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtSkTugas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByTmtSkTugas($tmtSkTugas = null, $comparison = null)
    {
        if (is_array($tmtSkTugas)) {
            $useMinMax = false;
            if (isset($tmtSkTugas['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::TMT_SK_TUGAS, $tmtSkTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtSkTugas['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::TMT_SK_TUGAS, $tmtSkTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::TMT_SK_TUGAS, $tmtSkTugas, $comparison);
    }

    /**
     * Filter the query on the tst_sk_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByTstSkTugas('2011-03-14'); // WHERE tst_sk_tugas = '2011-03-14'
     * $query->filterByTstSkTugas('now'); // WHERE tst_sk_tugas = '2011-03-14'
     * $query->filterByTstSkTugas(array('max' => 'yesterday')); // WHERE tst_sk_tugas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstSkTugas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByTstSkTugas($tstSkTugas = null, $comparison = null)
    {
        if (is_array($tstSkTugas)) {
            $useMinMax = false;
            if (isset($tstSkTugas['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::TST_SK_TUGAS, $tstSkTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstSkTugas['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::TST_SK_TUGAS, $tstSkTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::TST_SK_TUGAS, $tstSkTugas, $comparison);
    }

    /**
     * Filter the query on the a_pasang_papan column
     *
     * Example usage:
     * <code>
     * $query->filterByAPasangPapan(1234); // WHERE a_pasang_papan = 1234
     * $query->filterByAPasangPapan(array(12, 34)); // WHERE a_pasang_papan IN (12, 34)
     * $query->filterByAPasangPapan(array('min' => 12)); // WHERE a_pasang_papan >= 12
     * $query->filterByAPasangPapan(array('max' => 12)); // WHERE a_pasang_papan <= 12
     * </code>
     *
     * @param     mixed $aPasangPapan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByAPasangPapan($aPasangPapan = null, $comparison = null)
    {
        if (is_array($aPasangPapan)) {
            $useMinMax = false;
            if (isset($aPasangPapan['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_PASANG_PAPAN, $aPasangPapan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aPasangPapan['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_PASANG_PAPAN, $aPasangPapan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::A_PASANG_PAPAN, $aPasangPapan, $comparison);
    }

    /**
     * Filter the query on the a_formulir column
     *
     * Example usage:
     * <code>
     * $query->filterByAFormulir(1234); // WHERE a_formulir = 1234
     * $query->filterByAFormulir(array(12, 34)); // WHERE a_formulir IN (12, 34)
     * $query->filterByAFormulir(array('min' => 12)); // WHERE a_formulir >= 12
     * $query->filterByAFormulir(array('max' => 12)); // WHERE a_formulir <= 12
     * </code>
     *
     * @param     mixed $aFormulir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByAFormulir($aFormulir = null, $comparison = null)
    {
        if (is_array($aFormulir)) {
            $useMinMax = false;
            if (isset($aFormulir['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_FORMULIR, $aFormulir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aFormulir['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_FORMULIR, $aFormulir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::A_FORMULIR, $aFormulir, $comparison);
    }

    /**
     * Filter the query on the a_silabus column
     *
     * Example usage:
     * <code>
     * $query->filterByASilabus(1234); // WHERE a_silabus = 1234
     * $query->filterByASilabus(array(12, 34)); // WHERE a_silabus IN (12, 34)
     * $query->filterByASilabus(array('min' => 12)); // WHERE a_silabus >= 12
     * $query->filterByASilabus(array('max' => 12)); // WHERE a_silabus <= 12
     * </code>
     *
     * @param     mixed $aSilabus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByASilabus($aSilabus = null, $comparison = null)
    {
        if (is_array($aSilabus)) {
            $useMinMax = false;
            if (isset($aSilabus['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_SILABUS, $aSilabus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSilabus['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_SILABUS, $aSilabus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::A_SILABUS, $aSilabus, $comparison);
    }

    /**
     * Filter the query on the a_berlaku_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByABerlakuPos(1234); // WHERE a_berlaku_pos = 1234
     * $query->filterByABerlakuPos(array(12, 34)); // WHERE a_berlaku_pos IN (12, 34)
     * $query->filterByABerlakuPos(array('min' => 12)); // WHERE a_berlaku_pos >= 12
     * $query->filterByABerlakuPos(array('max' => 12)); // WHERE a_berlaku_pos <= 12
     * </code>
     *
     * @param     mixed $aBerlakuPos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByABerlakuPos($aBerlakuPos = null, $comparison = null)
    {
        if (is_array($aBerlakuPos)) {
            $useMinMax = false;
            if (isset($aBerlakuPos['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_BERLAKU_POS, $aBerlakuPos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBerlakuPos['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_BERLAKU_POS, $aBerlakuPos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::A_BERLAKU_POS, $aBerlakuPos, $comparison);
    }

    /**
     * Filter the query on the a_sosialisasi_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByASosialisasiPos(1234); // WHERE a_sosialisasi_pos = 1234
     * $query->filterByASosialisasiPos(array(12, 34)); // WHERE a_sosialisasi_pos IN (12, 34)
     * $query->filterByASosialisasiPos(array('min' => 12)); // WHERE a_sosialisasi_pos >= 12
     * $query->filterByASosialisasiPos(array('max' => 12)); // WHERE a_sosialisasi_pos <= 12
     * </code>
     *
     * @param     mixed $aSosialisasiPos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByASosialisasiPos($aSosialisasiPos = null, $comparison = null)
    {
        if (is_array($aSosialisasiPos)) {
            $useMinMax = false;
            if (isset($aSosialisasiPos['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_SOSIALISASI_POS, $aSosialisasiPos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSosialisasiPos['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_SOSIALISASI_POS, $aSosialisasiPos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::A_SOSIALISASI_POS, $aSosialisasiPos, $comparison);
    }

    /**
     * Filter the query on the a_ks_edukatif column
     *
     * Example usage:
     * <code>
     * $query->filterByAKsEdukatif(1234); // WHERE a_ks_edukatif = 1234
     * $query->filterByAKsEdukatif(array(12, 34)); // WHERE a_ks_edukatif IN (12, 34)
     * $query->filterByAKsEdukatif(array('min' => 12)); // WHERE a_ks_edukatif >= 12
     * $query->filterByAKsEdukatif(array('max' => 12)); // WHERE a_ks_edukatif <= 12
     * </code>
     *
     * @param     mixed $aKsEdukatif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByAKsEdukatif($aKsEdukatif = null, $comparison = null)
    {
        if (is_array($aKsEdukatif)) {
            $useMinMax = false;
            if (isset($aKsEdukatif['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_KS_EDUKATIF, $aKsEdukatif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKsEdukatif['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::A_KS_EDUKATIF, $aKsEdukatif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::A_KS_EDUKATIF, $aKsEdukatif, $comparison);
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
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KepanitiaanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KepanitiaanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KepanitiaanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return KepanitiaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KepanitiaanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisKepanitiaan object
     *
     * @param   JenisKepanitiaan|PropelObjectCollection $jenisKepanitiaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisKepanitiaan($jenisKepanitiaan, $comparison = null)
    {
        if ($jenisKepanitiaan instanceof JenisKepanitiaan) {
            return $this
                ->addUsingAlias(KepanitiaanPeer::ID_JNS_PANITIA, $jenisKepanitiaan->getIdJnsPanitia(), $comparison);
        } elseif ($jenisKepanitiaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KepanitiaanPeer::ID_JNS_PANITIA, $jenisKepanitiaan->toKeyValue('PrimaryKey', 'IdJnsPanitia'), $comparison);
        } else {
            throw new PropelException('filterByJenisKepanitiaan() only accepts arguments of type JenisKepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisKepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function joinJenisKepanitiaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisKepanitiaan');

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
            $this->addJoinObject($join, 'JenisKepanitiaan');
        }

        return $this;
    }

    /**
     * Use the JenisKepanitiaan relation JenisKepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisKepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useJenisKepanitiaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisKepanitiaan', '\DataDikdas\Model\JenisKepanitiaanQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(KepanitiaanPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KepanitiaanPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return KepanitiaanQuery The current query, for fluid interface
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
     * Filter the query by a related AktivitasKepanitiaan object
     *
     * @param   AktivitasKepanitiaan|PropelObjectCollection $aktivitasKepanitiaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAktivitasKepanitiaan($aktivitasKepanitiaan, $comparison = null)
    {
        if ($aktivitasKepanitiaan instanceof AktivitasKepanitiaan) {
            return $this
                ->addUsingAlias(KepanitiaanPeer::ID_PANITIA, $aktivitasKepanitiaan->getIdPanitia(), $comparison);
        } elseif ($aktivitasKepanitiaan instanceof PropelObjectCollection) {
            return $this
                ->useAktivitasKepanitiaanQuery()
                ->filterByPrimaryKeys($aktivitasKepanitiaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAktivitasKepanitiaan() only accepts arguments of type AktivitasKepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AktivitasKepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function joinAktivitasKepanitiaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AktivitasKepanitiaan');

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
            $this->addJoinObject($join, 'AktivitasKepanitiaan');
        }

        return $this;
    }

    /**
     * Use the AktivitasKepanitiaan relation AktivitasKepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AktivitasKepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useAktivitasKepanitiaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAktivitasKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AktivitasKepanitiaan', '\DataDikdas\Model\AktivitasKepanitiaanQuery');
    }

    /**
     * Filter the query by a related AnggotaPanitia object
     *
     * @param   AnggotaPanitia|PropelObjectCollection $anggotaPanitia  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaPanitia($anggotaPanitia, $comparison = null)
    {
        if ($anggotaPanitia instanceof AnggotaPanitia) {
            return $this
                ->addUsingAlias(KepanitiaanPeer::ID_PANITIA, $anggotaPanitia->getIdPanitia(), $comparison);
        } elseif ($anggotaPanitia instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaPanitiaQuery()
                ->filterByPrimaryKeys($anggotaPanitia->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaPanitia() only accepts arguments of type AnggotaPanitia or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaPanitia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function joinAnggotaPanitia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaPanitia');

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
            $this->addJoinObject($join, 'AnggotaPanitia');
        }

        return $this;
    }

    /**
     * Use the AnggotaPanitia relation AnggotaPanitia object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaPanitiaQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaPanitiaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaPanitia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaPanitia', '\DataDikdas\Model\AnggotaPanitiaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Kepanitiaan $kepanitiaan Object to remove from the list of results
     *
     * @return KepanitiaanQuery The current query, for fluid interface
     */
    public function prune($kepanitiaan = null)
    {
        if ($kepanitiaan) {
            $this->addUsingAlias(KepanitiaanPeer::ID_PANITIA, $kepanitiaan->getIdPanitia(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
