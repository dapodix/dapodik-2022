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
use DataDikdas\Model\Anak;
use DataDikdas\Model\AnakPeer;
use DataDikdas\Model\AnakQuery;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\StatusAnak;
use DataDikdas\Model\VldAnak;

/**
 * Base class that represents a query for the 'anak' table.
 *
 * 
 *
 * @method AnakQuery orderByAnakId($order = Criteria::ASC) Order by the anak_id column
 * @method AnakQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method AnakQuery orderByStatusAnakId($order = Criteria::ASC) Order by the status_anak_id column
 * @method AnakQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method AnakQuery orderByNik($order = Criteria::ASC) Order by the nik column
 * @method AnakQuery orderByNisn($order = Criteria::ASC) Order by the nisn column
 * @method AnakQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method AnakQuery orderByJenisKelamin($order = Criteria::ASC) Order by the jenis_kelamin column
 * @method AnakQuery orderByTempatLahir($order = Criteria::ASC) Order by the tempat_lahir column
 * @method AnakQuery orderByTanggalLahir($order = Criteria::ASC) Order by the tanggal_lahir column
 * @method AnakQuery orderByTahunMasuk($order = Criteria::ASC) Order by the tahun_masuk column
 * @method AnakQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AnakQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AnakQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AnakQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AnakQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AnakQuery groupByAnakId() Group by the anak_id column
 * @method AnakQuery groupByPtkId() Group by the ptk_id column
 * @method AnakQuery groupByStatusAnakId() Group by the status_anak_id column
 * @method AnakQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method AnakQuery groupByNik() Group by the nik column
 * @method AnakQuery groupByNisn() Group by the nisn column
 * @method AnakQuery groupByNama() Group by the nama column
 * @method AnakQuery groupByJenisKelamin() Group by the jenis_kelamin column
 * @method AnakQuery groupByTempatLahir() Group by the tempat_lahir column
 * @method AnakQuery groupByTanggalLahir() Group by the tanggal_lahir column
 * @method AnakQuery groupByTahunMasuk() Group by the tahun_masuk column
 * @method AnakQuery groupByCreateDate() Group by the create_date column
 * @method AnakQuery groupByLastUpdate() Group by the last_update column
 * @method AnakQuery groupBySoftDelete() Group by the soft_delete column
 * @method AnakQuery groupByLastSync() Group by the last_sync column
 * @method AnakQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AnakQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AnakQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AnakQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AnakQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method AnakQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method AnakQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method AnakQuery leftJoinStatusAnak($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusAnak relation
 * @method AnakQuery rightJoinStatusAnak($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusAnak relation
 * @method AnakQuery innerJoinStatusAnak($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusAnak relation
 *
 * @method AnakQuery leftJoinJenjangPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikan relation
 * @method AnakQuery rightJoinJenjangPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikan relation
 * @method AnakQuery innerJoinJenjangPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikan relation
 *
 * @method AnakQuery leftJoinVldAnak($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAnak relation
 * @method AnakQuery rightJoinVldAnak($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAnak relation
 * @method AnakQuery innerJoinVldAnak($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAnak relation
 *
 * @method Anak findOne(PropelPDO $con = null) Return the first Anak matching the query
 * @method Anak findOneOrCreate(PropelPDO $con = null) Return the first Anak matching the query, or a new Anak object populated from the query conditions when no match is found
 *
 * @method Anak findOneByPtkId(string $ptk_id) Return the first Anak filtered by the ptk_id column
 * @method Anak findOneByStatusAnakId(string $status_anak_id) Return the first Anak filtered by the status_anak_id column
 * @method Anak findOneByJenjangPendidikanId(string $jenjang_pendidikan_id) Return the first Anak filtered by the jenjang_pendidikan_id column
 * @method Anak findOneByNik(string $nik) Return the first Anak filtered by the nik column
 * @method Anak findOneByNisn(string $nisn) Return the first Anak filtered by the nisn column
 * @method Anak findOneByNama(string $nama) Return the first Anak filtered by the nama column
 * @method Anak findOneByJenisKelamin(string $jenis_kelamin) Return the first Anak filtered by the jenis_kelamin column
 * @method Anak findOneByTempatLahir(string $tempat_lahir) Return the first Anak filtered by the tempat_lahir column
 * @method Anak findOneByTanggalLahir(string $tanggal_lahir) Return the first Anak filtered by the tanggal_lahir column
 * @method Anak findOneByTahunMasuk(int $tahun_masuk) Return the first Anak filtered by the tahun_masuk column
 * @method Anak findOneByCreateDate(string $create_date) Return the first Anak filtered by the create_date column
 * @method Anak findOneByLastUpdate(string $last_update) Return the first Anak filtered by the last_update column
 * @method Anak findOneBySoftDelete(string $soft_delete) Return the first Anak filtered by the soft_delete column
 * @method Anak findOneByLastSync(string $last_sync) Return the first Anak filtered by the last_sync column
 * @method Anak findOneByUpdaterId(string $updater_id) Return the first Anak filtered by the updater_id column
 *
 * @method array findByAnakId(string $anak_id) Return Anak objects filtered by the anak_id column
 * @method array findByPtkId(string $ptk_id) Return Anak objects filtered by the ptk_id column
 * @method array findByStatusAnakId(string $status_anak_id) Return Anak objects filtered by the status_anak_id column
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return Anak objects filtered by the jenjang_pendidikan_id column
 * @method array findByNik(string $nik) Return Anak objects filtered by the nik column
 * @method array findByNisn(string $nisn) Return Anak objects filtered by the nisn column
 * @method array findByNama(string $nama) Return Anak objects filtered by the nama column
 * @method array findByJenisKelamin(string $jenis_kelamin) Return Anak objects filtered by the jenis_kelamin column
 * @method array findByTempatLahir(string $tempat_lahir) Return Anak objects filtered by the tempat_lahir column
 * @method array findByTanggalLahir(string $tanggal_lahir) Return Anak objects filtered by the tanggal_lahir column
 * @method array findByTahunMasuk(int $tahun_masuk) Return Anak objects filtered by the tahun_masuk column
 * @method array findByCreateDate(string $create_date) Return Anak objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Anak objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Anak objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Anak objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Anak objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnakQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAnakQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Anak', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AnakQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AnakQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AnakQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AnakQuery) {
            return $criteria;
        }
        $query = new AnakQuery();
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
     * @return   Anak|Anak[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AnakPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AnakPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Anak A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAnakId($key, $con = null)
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
     * @return                 Anak A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "anak_id", "ptk_id", "status_anak_id", "jenjang_pendidikan_id", "nik", "nisn", "nama", "jenis_kelamin", "tempat_lahir", "tanggal_lahir", "tahun_masuk", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "anak" WHERE "anak_id" = :p0';
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
            $obj = new Anak();
            $obj->hydrate($row);
            AnakPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Anak|Anak[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Anak[]|mixed the list of results, formatted by the current formatter
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
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnakPeer::ANAK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnakPeer::ANAK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the anak_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAnakId('fooValue');   // WHERE anak_id = 'fooValue'
     * $query->filterByAnakId('%fooValue%'); // WHERE anak_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $anakId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByAnakId($anakId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($anakId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $anakId)) {
                $anakId = str_replace('*', '%', $anakId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnakPeer::ANAK_ID, $anakId, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnakPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the status_anak_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusAnakId(1234); // WHERE status_anak_id = 1234
     * $query->filterByStatusAnakId(array(12, 34)); // WHERE status_anak_id IN (12, 34)
     * $query->filterByStatusAnakId(array('min' => 12)); // WHERE status_anak_id >= 12
     * $query->filterByStatusAnakId(array('max' => 12)); // WHERE status_anak_id <= 12
     * </code>
     *
     * @see       filterByStatusAnak()
     *
     * @param     mixed $statusAnakId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByStatusAnakId($statusAnakId = null, $comparison = null)
    {
        if (is_array($statusAnakId)) {
            $useMinMax = false;
            if (isset($statusAnakId['min'])) {
                $this->addUsingAlias(AnakPeer::STATUS_ANAK_ID, $statusAnakId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusAnakId['max'])) {
                $this->addUsingAlias(AnakPeer::STATUS_ANAK_ID, $statusAnakId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::STATUS_ANAK_ID, $statusAnakId, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(AnakPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(AnakPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
    }

    /**
     * Filter the query on the nik column
     *
     * Example usage:
     * <code>
     * $query->filterByNik('fooValue');   // WHERE nik = 'fooValue'
     * $query->filterByNik('%fooValue%'); // WHERE nik LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nik The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByNik($nik = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nik)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nik)) {
                $nik = str_replace('*', '%', $nik);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnakPeer::NIK, $nik, $comparison);
    }

    /**
     * Filter the query on the nisn column
     *
     * Example usage:
     * <code>
     * $query->filterByNisn('fooValue');   // WHERE nisn = 'fooValue'
     * $query->filterByNisn('%fooValue%'); // WHERE nisn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nisn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByNisn($nisn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nisn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nisn)) {
                $nisn = str_replace('*', '%', $nisn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnakPeer::NISN, $nisn, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnakPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the jenis_kelamin column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisKelamin('fooValue');   // WHERE jenis_kelamin = 'fooValue'
     * $query->filterByJenisKelamin('%fooValue%'); // WHERE jenis_kelamin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisKelamin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByJenisKelamin($jenisKelamin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisKelamin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisKelamin)) {
                $jenisKelamin = str_replace('*', '%', $jenisKelamin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnakPeer::JENIS_KELAMIN, $jenisKelamin, $comparison);
    }

    /**
     * Filter the query on the tempat_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatLahir('fooValue');   // WHERE tempat_lahir = 'fooValue'
     * $query->filterByTempatLahir('%fooValue%'); // WHERE tempat_lahir LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tempatLahir The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByTempatLahir($tempatLahir = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tempatLahir)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tempatLahir)) {
                $tempatLahir = str_replace('*', '%', $tempatLahir);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnakPeer::TEMPAT_LAHIR, $tempatLahir, $comparison);
    }

    /**
     * Filter the query on the tanggal_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalLahir('2011-03-14'); // WHERE tanggal_lahir = '2011-03-14'
     * $query->filterByTanggalLahir('now'); // WHERE tanggal_lahir = '2011-03-14'
     * $query->filterByTanggalLahir(array('max' => 'yesterday')); // WHERE tanggal_lahir > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalLahir The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByTanggalLahir($tanggalLahir = null, $comparison = null)
    {
        if (is_array($tanggalLahir)) {
            $useMinMax = false;
            if (isset($tanggalLahir['min'])) {
                $this->addUsingAlias(AnakPeer::TANGGAL_LAHIR, $tanggalLahir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalLahir['max'])) {
                $this->addUsingAlias(AnakPeer::TANGGAL_LAHIR, $tanggalLahir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::TANGGAL_LAHIR, $tanggalLahir, $comparison);
    }

    /**
     * Filter the query on the tahun_masuk column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunMasuk(1234); // WHERE tahun_masuk = 1234
     * $query->filterByTahunMasuk(array(12, 34)); // WHERE tahun_masuk IN (12, 34)
     * $query->filterByTahunMasuk(array('min' => 12)); // WHERE tahun_masuk >= 12
     * $query->filterByTahunMasuk(array('max' => 12)); // WHERE tahun_masuk <= 12
     * </code>
     *
     * @param     mixed $tahunMasuk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByTahunMasuk($tahunMasuk = null, $comparison = null)
    {
        if (is_array($tahunMasuk)) {
            $useMinMax = false;
            if (isset($tahunMasuk['min'])) {
                $this->addUsingAlias(AnakPeer::TAHUN_MASUK, $tahunMasuk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunMasuk['max'])) {
                $this->addUsingAlias(AnakPeer::TAHUN_MASUK, $tahunMasuk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::TAHUN_MASUK, $tahunMasuk, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AnakPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AnakPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AnakPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AnakPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AnakPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AnakPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AnakPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AnakPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnakPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AnakQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnakPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnakQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(AnakPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnakPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return AnakQuery The current query, for fluid interface
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
     * Filter the query by a related StatusAnak object
     *
     * @param   StatusAnak|PropelObjectCollection $statusAnak The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnakQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusAnak($statusAnak, $comparison = null)
    {
        if ($statusAnak instanceof StatusAnak) {
            return $this
                ->addUsingAlias(AnakPeer::STATUS_ANAK_ID, $statusAnak->getStatusAnakId(), $comparison);
        } elseif ($statusAnak instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnakPeer::STATUS_ANAK_ID, $statusAnak->toKeyValue('PrimaryKey', 'StatusAnakId'), $comparison);
        } else {
            throw new PropelException('filterByStatusAnak() only accepts arguments of type StatusAnak or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusAnak relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function joinStatusAnak($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusAnak');

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
            $this->addJoinObject($join, 'StatusAnak');
        }

        return $this;
    }

    /**
     * Use the StatusAnak relation StatusAnak object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StatusAnakQuery A secondary query class using the current class as primary query
     */
    public function useStatusAnakQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusAnak($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusAnak', '\DataDikdas\Model\StatusAnakQuery');
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnakQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikan($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(AnakPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnakPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
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
     * @return AnakQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useJenjangPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenjangPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikan', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related VldAnak object
     *
     * @param   VldAnak|PropelObjectCollection $vldAnak  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnakQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAnak($vldAnak, $comparison = null)
    {
        if ($vldAnak instanceof VldAnak) {
            return $this
                ->addUsingAlias(AnakPeer::ANAK_ID, $vldAnak->getAnakId(), $comparison);
        } elseif ($vldAnak instanceof PropelObjectCollection) {
            return $this
                ->useVldAnakQuery()
                ->filterByPrimaryKeys($vldAnak->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldAnak() only accepts arguments of type VldAnak or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldAnak relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function joinVldAnak($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldAnak');

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
            $this->addJoinObject($join, 'VldAnak');
        }

        return $this;
    }

    /**
     * Use the VldAnak relation VldAnak object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldAnakQuery A secondary query class using the current class as primary query
     */
    public function useVldAnakQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldAnak($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldAnak', '\DataDikdas\Model\VldAnakQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Anak $anak Object to remove from the list of results
     *
     * @return AnakQuery The current query, for fluid interface
     */
    public function prune($anak = null)
    {
        if ($anak) {
            $this->addUsingAlias(AnakPeer::ANAK_ID, $anak->getAnakId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
