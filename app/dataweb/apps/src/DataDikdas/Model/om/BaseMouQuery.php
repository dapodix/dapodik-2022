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
use DataDikdas\Model\AktPd;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\JenisKs;
use DataDikdas\Model\JurusanKerjasama;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MouPeer;
use DataDikdas\Model\MouQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\UnitUsahaKerjasama;
use DataDikdas\Model\VldMou;

/**
 * Base class that represents a query for the 'mou' table.
 *
 * 
 *
 * @method MouQuery orderByMouId($order = Criteria::ASC) Order by the mou_id column
 * @method MouQuery orderByIdJnsKs($order = Criteria::ASC) Order by the id_jns_ks column
 * @method MouQuery orderByDudiId($order = Criteria::ASC) Order by the dudi_id column
 * @method MouQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method MouQuery orderByNomorMou($order = Criteria::ASC) Order by the nomor_mou column
 * @method MouQuery orderByJudulMou($order = Criteria::ASC) Order by the judul_mou column
 * @method MouQuery orderByTanggalMulai($order = Criteria::ASC) Order by the tanggal_mulai column
 * @method MouQuery orderByTanggalSelesai($order = Criteria::ASC) Order by the tanggal_selesai column
 * @method MouQuery orderByNamaDudi($order = Criteria::ASC) Order by the nama_dudi column
 * @method MouQuery orderByNpwpDudi($order = Criteria::ASC) Order by the npwp_dudi column
 * @method MouQuery orderByNamaBidangUsaha($order = Criteria::ASC) Order by the nama_bidang_usaha column
 * @method MouQuery orderByTelpKantor($order = Criteria::ASC) Order by the telp_kantor column
 * @method MouQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method MouQuery orderByContactPerson($order = Criteria::ASC) Order by the contact_person column
 * @method MouQuery orderByTelpCp($order = Criteria::ASC) Order by the telp_cp column
 * @method MouQuery orderByJabatanCp($order = Criteria::ASC) Order by the jabatan_cp column
 * @method MouQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MouQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MouQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method MouQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method MouQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method MouQuery groupByMouId() Group by the mou_id column
 * @method MouQuery groupByIdJnsKs() Group by the id_jns_ks column
 * @method MouQuery groupByDudiId() Group by the dudi_id column
 * @method MouQuery groupBySekolahId() Group by the sekolah_id column
 * @method MouQuery groupByNomorMou() Group by the nomor_mou column
 * @method MouQuery groupByJudulMou() Group by the judul_mou column
 * @method MouQuery groupByTanggalMulai() Group by the tanggal_mulai column
 * @method MouQuery groupByTanggalSelesai() Group by the tanggal_selesai column
 * @method MouQuery groupByNamaDudi() Group by the nama_dudi column
 * @method MouQuery groupByNpwpDudi() Group by the npwp_dudi column
 * @method MouQuery groupByNamaBidangUsaha() Group by the nama_bidang_usaha column
 * @method MouQuery groupByTelpKantor() Group by the telp_kantor column
 * @method MouQuery groupByFax() Group by the fax column
 * @method MouQuery groupByContactPerson() Group by the contact_person column
 * @method MouQuery groupByTelpCp() Group by the telp_cp column
 * @method MouQuery groupByJabatanCp() Group by the jabatan_cp column
 * @method MouQuery groupByCreateDate() Group by the create_date column
 * @method MouQuery groupByLastUpdate() Group by the last_update column
 * @method MouQuery groupBySoftDelete() Group by the soft_delete column
 * @method MouQuery groupByLastSync() Group by the last_sync column
 * @method MouQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method MouQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MouQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MouQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MouQuery leftJoinJenisKs($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisKs relation
 * @method MouQuery rightJoinJenisKs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisKs relation
 * @method MouQuery innerJoinJenisKs($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisKs relation
 *
 * @method MouQuery leftJoinDudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dudi relation
 * @method MouQuery rightJoinDudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dudi relation
 * @method MouQuery innerJoinDudi($relationAlias = null) Adds a INNER JOIN clause to the query using the Dudi relation
 *
 * @method MouQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method MouQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method MouQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method MouQuery leftJoinAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the AktPd relation
 * @method MouQuery rightJoinAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AktPd relation
 * @method MouQuery innerJoinAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the AktPd relation
 *
 * @method MouQuery leftJoinJurusanKerjasama($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanKerjasama relation
 * @method MouQuery rightJoinJurusanKerjasama($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanKerjasama relation
 * @method MouQuery innerJoinJurusanKerjasama($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanKerjasama relation
 *
 * @method MouQuery leftJoinUnitUsahaKerjasama($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnitUsahaKerjasama relation
 * @method MouQuery rightJoinUnitUsahaKerjasama($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnitUsahaKerjasama relation
 * @method MouQuery innerJoinUnitUsahaKerjasama($relationAlias = null) Adds a INNER JOIN clause to the query using the UnitUsahaKerjasama relation
 *
 * @method MouQuery leftJoinVldMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldMou relation
 * @method MouQuery rightJoinVldMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldMou relation
 * @method MouQuery innerJoinVldMou($relationAlias = null) Adds a INNER JOIN clause to the query using the VldMou relation
 *
 * @method Mou findOne(PropelPDO $con = null) Return the first Mou matching the query
 * @method Mou findOneOrCreate(PropelPDO $con = null) Return the first Mou matching the query, or a new Mou object populated from the query conditions when no match is found
 *
 * @method Mou findOneByIdJnsKs(string $id_jns_ks) Return the first Mou filtered by the id_jns_ks column
 * @method Mou findOneByDudiId(string $dudi_id) Return the first Mou filtered by the dudi_id column
 * @method Mou findOneBySekolahId(string $sekolah_id) Return the first Mou filtered by the sekolah_id column
 * @method Mou findOneByNomorMou(string $nomor_mou) Return the first Mou filtered by the nomor_mou column
 * @method Mou findOneByJudulMou(string $judul_mou) Return the first Mou filtered by the judul_mou column
 * @method Mou findOneByTanggalMulai(string $tanggal_mulai) Return the first Mou filtered by the tanggal_mulai column
 * @method Mou findOneByTanggalSelesai(string $tanggal_selesai) Return the first Mou filtered by the tanggal_selesai column
 * @method Mou findOneByNamaDudi(string $nama_dudi) Return the first Mou filtered by the nama_dudi column
 * @method Mou findOneByNpwpDudi(string $npwp_dudi) Return the first Mou filtered by the npwp_dudi column
 * @method Mou findOneByNamaBidangUsaha(string $nama_bidang_usaha) Return the first Mou filtered by the nama_bidang_usaha column
 * @method Mou findOneByTelpKantor(string $telp_kantor) Return the first Mou filtered by the telp_kantor column
 * @method Mou findOneByFax(string $fax) Return the first Mou filtered by the fax column
 * @method Mou findOneByContactPerson(string $contact_person) Return the first Mou filtered by the contact_person column
 * @method Mou findOneByTelpCp(string $telp_cp) Return the first Mou filtered by the telp_cp column
 * @method Mou findOneByJabatanCp(string $jabatan_cp) Return the first Mou filtered by the jabatan_cp column
 * @method Mou findOneByCreateDate(string $create_date) Return the first Mou filtered by the create_date column
 * @method Mou findOneByLastUpdate(string $last_update) Return the first Mou filtered by the last_update column
 * @method Mou findOneBySoftDelete(string $soft_delete) Return the first Mou filtered by the soft_delete column
 * @method Mou findOneByLastSync(string $last_sync) Return the first Mou filtered by the last_sync column
 * @method Mou findOneByUpdaterId(string $updater_id) Return the first Mou filtered by the updater_id column
 *
 * @method array findByMouId(string $mou_id) Return Mou objects filtered by the mou_id column
 * @method array findByIdJnsKs(string $id_jns_ks) Return Mou objects filtered by the id_jns_ks column
 * @method array findByDudiId(string $dudi_id) Return Mou objects filtered by the dudi_id column
 * @method array findBySekolahId(string $sekolah_id) Return Mou objects filtered by the sekolah_id column
 * @method array findByNomorMou(string $nomor_mou) Return Mou objects filtered by the nomor_mou column
 * @method array findByJudulMou(string $judul_mou) Return Mou objects filtered by the judul_mou column
 * @method array findByTanggalMulai(string $tanggal_mulai) Return Mou objects filtered by the tanggal_mulai column
 * @method array findByTanggalSelesai(string $tanggal_selesai) Return Mou objects filtered by the tanggal_selesai column
 * @method array findByNamaDudi(string $nama_dudi) Return Mou objects filtered by the nama_dudi column
 * @method array findByNpwpDudi(string $npwp_dudi) Return Mou objects filtered by the npwp_dudi column
 * @method array findByNamaBidangUsaha(string $nama_bidang_usaha) Return Mou objects filtered by the nama_bidang_usaha column
 * @method array findByTelpKantor(string $telp_kantor) Return Mou objects filtered by the telp_kantor column
 * @method array findByFax(string $fax) Return Mou objects filtered by the fax column
 * @method array findByContactPerson(string $contact_person) Return Mou objects filtered by the contact_person column
 * @method array findByTelpCp(string $telp_cp) Return Mou objects filtered by the telp_cp column
 * @method array findByJabatanCp(string $jabatan_cp) Return Mou objects filtered by the jabatan_cp column
 * @method array findByCreateDate(string $create_date) Return Mou objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Mou objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Mou objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Mou objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Mou objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMouQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMouQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Mou', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MouQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MouQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MouQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MouQuery) {
            return $criteria;
        }
        $query = new MouQuery();
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
     * @return   Mou|Mou[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MouPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Mou A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByMouId($key, $con = null)
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
     * @return                 Mou A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "mou_id", "id_jns_ks", "dudi_id", "sekolah_id", "nomor_mou", "judul_mou", "tanggal_mulai", "tanggal_selesai", "nama_dudi", "npwp_dudi", "nama_bidang_usaha", "telp_kantor", "fax", "contact_person", "telp_cp", "jabatan_cp", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "mou" WHERE "mou_id" = :p0';
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
            $obj = new Mou();
            $obj->hydrate($row);
            MouPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Mou|Mou[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Mou[]|mixed the list of results, formatted by the current formatter
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
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MouPeer::MOU_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MouPeer::MOU_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the mou_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMouId('fooValue');   // WHERE mou_id = 'fooValue'
     * $query->filterByMouId('%fooValue%'); // WHERE mou_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mouId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByMouId($mouId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mouId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mouId)) {
                $mouId = str_replace('*', '%', $mouId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::MOU_ID, $mouId, $comparison);
    }

    /**
     * Filter the query on the id_jns_ks column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsKs(1234); // WHERE id_jns_ks = 1234
     * $query->filterByIdJnsKs(array(12, 34)); // WHERE id_jns_ks IN (12, 34)
     * $query->filterByIdJnsKs(array('min' => 12)); // WHERE id_jns_ks >= 12
     * $query->filterByIdJnsKs(array('max' => 12)); // WHERE id_jns_ks <= 12
     * </code>
     *
     * @see       filterByJenisKs()
     *
     * @param     mixed $idJnsKs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByIdJnsKs($idJnsKs = null, $comparison = null)
    {
        if (is_array($idJnsKs)) {
            $useMinMax = false;
            if (isset($idJnsKs['min'])) {
                $this->addUsingAlias(MouPeer::ID_JNS_KS, $idJnsKs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsKs['max'])) {
                $this->addUsingAlias(MouPeer::ID_JNS_KS, $idJnsKs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MouPeer::ID_JNS_KS, $idJnsKs, $comparison);
    }

    /**
     * Filter the query on the dudi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDudiId('fooValue');   // WHERE dudi_id = 'fooValue'
     * $query->filterByDudiId('%fooValue%'); // WHERE dudi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dudiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByDudiId($dudiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dudiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dudiId)) {
                $dudiId = str_replace('*', '%', $dudiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::DUDI_ID, $dudiId, $comparison);
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
     * @return MouQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MouPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the nomor_mou column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorMou('fooValue');   // WHERE nomor_mou = 'fooValue'
     * $query->filterByNomorMou('%fooValue%'); // WHERE nomor_mou LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorMou The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByNomorMou($nomorMou = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorMou)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorMou)) {
                $nomorMou = str_replace('*', '%', $nomorMou);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::NOMOR_MOU, $nomorMou, $comparison);
    }

    /**
     * Filter the query on the judul_mou column
     *
     * Example usage:
     * <code>
     * $query->filterByJudulMou('fooValue');   // WHERE judul_mou = 'fooValue'
     * $query->filterByJudulMou('%fooValue%'); // WHERE judul_mou LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judulMou The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByJudulMou($judulMou = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judulMou)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $judulMou)) {
                $judulMou = str_replace('*', '%', $judulMou);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::JUDUL_MOU, $judulMou, $comparison);
    }

    /**
     * Filter the query on the tanggal_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalMulai('2011-03-14'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai('now'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai(array('max' => 'yesterday')); // WHERE tanggal_mulai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalMulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByTanggalMulai($tanggalMulai = null, $comparison = null)
    {
        if (is_array($tanggalMulai)) {
            $useMinMax = false;
            if (isset($tanggalMulai['min'])) {
                $this->addUsingAlias(MouPeer::TANGGAL_MULAI, $tanggalMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalMulai['max'])) {
                $this->addUsingAlias(MouPeer::TANGGAL_MULAI, $tanggalMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MouPeer::TANGGAL_MULAI, $tanggalMulai, $comparison);
    }

    /**
     * Filter the query on the tanggal_selesai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSelesai('2011-03-14'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai('now'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai(array('max' => 'yesterday')); // WHERE tanggal_selesai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSelesai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByTanggalSelesai($tanggalSelesai = null, $comparison = null)
    {
        if (is_array($tanggalSelesai)) {
            $useMinMax = false;
            if (isset($tanggalSelesai['min'])) {
                $this->addUsingAlias(MouPeer::TANGGAL_SELESAI, $tanggalSelesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSelesai['max'])) {
                $this->addUsingAlias(MouPeer::TANGGAL_SELESAI, $tanggalSelesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MouPeer::TANGGAL_SELESAI, $tanggalSelesai, $comparison);
    }

    /**
     * Filter the query on the nama_dudi column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaDudi('fooValue');   // WHERE nama_dudi = 'fooValue'
     * $query->filterByNamaDudi('%fooValue%'); // WHERE nama_dudi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaDudi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByNamaDudi($namaDudi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaDudi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaDudi)) {
                $namaDudi = str_replace('*', '%', $namaDudi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::NAMA_DUDI, $namaDudi, $comparison);
    }

    /**
     * Filter the query on the npwp_dudi column
     *
     * Example usage:
     * <code>
     * $query->filterByNpwpDudi('fooValue');   // WHERE npwp_dudi = 'fooValue'
     * $query->filterByNpwpDudi('%fooValue%'); // WHERE npwp_dudi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npwpDudi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByNpwpDudi($npwpDudi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npwpDudi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $npwpDudi)) {
                $npwpDudi = str_replace('*', '%', $npwpDudi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::NPWP_DUDI, $npwpDudi, $comparison);
    }

    /**
     * Filter the query on the nama_bidang_usaha column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaBidangUsaha('fooValue');   // WHERE nama_bidang_usaha = 'fooValue'
     * $query->filterByNamaBidangUsaha('%fooValue%'); // WHERE nama_bidang_usaha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaBidangUsaha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByNamaBidangUsaha($namaBidangUsaha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaBidangUsaha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaBidangUsaha)) {
                $namaBidangUsaha = str_replace('*', '%', $namaBidangUsaha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::NAMA_BIDANG_USAHA, $namaBidangUsaha, $comparison);
    }

    /**
     * Filter the query on the telp_kantor column
     *
     * Example usage:
     * <code>
     * $query->filterByTelpKantor('fooValue');   // WHERE telp_kantor = 'fooValue'
     * $query->filterByTelpKantor('%fooValue%'); // WHERE telp_kantor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telpKantor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByTelpKantor($telpKantor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telpKantor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $telpKantor)) {
                $telpKantor = str_replace('*', '%', $telpKantor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::TELP_KANTOR, $telpKantor, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%'); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fax)) {
                $fax = str_replace('*', '%', $fax);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the contact_person column
     *
     * Example usage:
     * <code>
     * $query->filterByContactPerson('fooValue');   // WHERE contact_person = 'fooValue'
     * $query->filterByContactPerson('%fooValue%'); // WHERE contact_person LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactPerson The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByContactPerson($contactPerson = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactPerson)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactPerson)) {
                $contactPerson = str_replace('*', '%', $contactPerson);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::CONTACT_PERSON, $contactPerson, $comparison);
    }

    /**
     * Filter the query on the telp_cp column
     *
     * Example usage:
     * <code>
     * $query->filterByTelpCp('fooValue');   // WHERE telp_cp = 'fooValue'
     * $query->filterByTelpCp('%fooValue%'); // WHERE telp_cp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telpCp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByTelpCp($telpCp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telpCp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $telpCp)) {
                $telpCp = str_replace('*', '%', $telpCp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::TELP_CP, $telpCp, $comparison);
    }

    /**
     * Filter the query on the jabatan_cp column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatanCp('fooValue');   // WHERE jabatan_cp = 'fooValue'
     * $query->filterByJabatanCp('%fooValue%'); // WHERE jabatan_cp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jabatanCp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByJabatanCp($jabatanCp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jabatanCp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jabatanCp)) {
                $jabatanCp = str_replace('*', '%', $jabatanCp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MouPeer::JABATAN_CP, $jabatanCp, $comparison);
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
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MouPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MouPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MouPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MouPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MouPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MouPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return MouQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(MouPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(MouPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MouPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return MouQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MouPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MouPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MouPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return MouQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MouPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisKs object
     *
     * @param   JenisKs|PropelObjectCollection $jenisKs The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MouQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisKs($jenisKs, $comparison = null)
    {
        if ($jenisKs instanceof JenisKs) {
            return $this
                ->addUsingAlias(MouPeer::ID_JNS_KS, $jenisKs->getIdJnsKs(), $comparison);
        } elseif ($jenisKs instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MouPeer::ID_JNS_KS, $jenisKs->toKeyValue('PrimaryKey', 'IdJnsKs'), $comparison);
        } else {
            throw new PropelException('filterByJenisKs() only accepts arguments of type JenisKs or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisKs relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function joinJenisKs($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisKs');

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
            $this->addJoinObject($join, 'JenisKs');
        }

        return $this;
    }

    /**
     * Use the JenisKs relation JenisKs object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisKsQuery A secondary query class using the current class as primary query
     */
    public function useJenisKsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisKs($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisKs', '\DataDikdas\Model\JenisKsQuery');
    }

    /**
     * Filter the query by a related Dudi object
     *
     * @param   Dudi|PropelObjectCollection $dudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MouQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDudi($dudi, $comparison = null)
    {
        if ($dudi instanceof Dudi) {
            return $this
                ->addUsingAlias(MouPeer::DUDI_ID, $dudi->getDudiId(), $comparison);
        } elseif ($dudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MouPeer::DUDI_ID, $dudi->toKeyValue('PrimaryKey', 'DudiId'), $comparison);
        } else {
            throw new PropelException('filterByDudi() only accepts arguments of type Dudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function joinDudi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dudi');

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
            $this->addJoinObject($join, 'Dudi');
        }

        return $this;
    }

    /**
     * Use the Dudi relation Dudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DudiQuery A secondary query class using the current class as primary query
     */
    public function useDudiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dudi', '\DataDikdas\Model\DudiQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MouQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(MouPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MouPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return MouQuery The current query, for fluid interface
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
     * Filter the query by a related AktPd object
     *
     * @param   AktPd|PropelObjectCollection $aktPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MouQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAktPd($aktPd, $comparison = null)
    {
        if ($aktPd instanceof AktPd) {
            return $this
                ->addUsingAlias(MouPeer::MOU_ID, $aktPd->getMouId(), $comparison);
        } elseif ($aktPd instanceof PropelObjectCollection) {
            return $this
                ->useAktPdQuery()
                ->filterByPrimaryKeys($aktPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAktPd() only accepts arguments of type AktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function joinAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AktPd');

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
            $this->addJoinObject($join, 'AktPd');
        }

        return $this;
    }

    /**
     * Use the AktPd relation AktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AktPdQuery A secondary query class using the current class as primary query
     */
    public function useAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AktPd', '\DataDikdas\Model\AktPdQuery');
    }

    /**
     * Filter the query by a related JurusanKerjasama object
     *
     * @param   JurusanKerjasama|PropelObjectCollection $jurusanKerjasama  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MouQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanKerjasama($jurusanKerjasama, $comparison = null)
    {
        if ($jurusanKerjasama instanceof JurusanKerjasama) {
            return $this
                ->addUsingAlias(MouPeer::MOU_ID, $jurusanKerjasama->getMouId(), $comparison);
        } elseif ($jurusanKerjasama instanceof PropelObjectCollection) {
            return $this
                ->useJurusanKerjasamaQuery()
                ->filterByPrimaryKeys($jurusanKerjasama->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusanKerjasama() only accepts arguments of type JurusanKerjasama or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanKerjasama relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function joinJurusanKerjasama($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanKerjasama');

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
            $this->addJoinObject($join, 'JurusanKerjasama');
        }

        return $this;
    }

    /**
     * Use the JurusanKerjasama relation JurusanKerjasama object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanKerjasamaQuery A secondary query class using the current class as primary query
     */
    public function useJurusanKerjasamaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusanKerjasama($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanKerjasama', '\DataDikdas\Model\JurusanKerjasamaQuery');
    }

    /**
     * Filter the query by a related UnitUsahaKerjasama object
     *
     * @param   UnitUsahaKerjasama|PropelObjectCollection $unitUsahaKerjasama  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MouQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUnitUsahaKerjasama($unitUsahaKerjasama, $comparison = null)
    {
        if ($unitUsahaKerjasama instanceof UnitUsahaKerjasama) {
            return $this
                ->addUsingAlias(MouPeer::MOU_ID, $unitUsahaKerjasama->getMouId(), $comparison);
        } elseif ($unitUsahaKerjasama instanceof PropelObjectCollection) {
            return $this
                ->useUnitUsahaKerjasamaQuery()
                ->filterByPrimaryKeys($unitUsahaKerjasama->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUnitUsahaKerjasama() only accepts arguments of type UnitUsahaKerjasama or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnitUsahaKerjasama relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function joinUnitUsahaKerjasama($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnitUsahaKerjasama');

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
            $this->addJoinObject($join, 'UnitUsahaKerjasama');
        }

        return $this;
    }

    /**
     * Use the UnitUsahaKerjasama relation UnitUsahaKerjasama object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnitUsahaKerjasamaQuery A secondary query class using the current class as primary query
     */
    public function useUnitUsahaKerjasamaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUnitUsahaKerjasama($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnitUsahaKerjasama', '\DataDikdas\Model\UnitUsahaKerjasamaQuery');
    }

    /**
     * Filter the query by a related VldMou object
     *
     * @param   VldMou|PropelObjectCollection $vldMou  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MouQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldMou($vldMou, $comparison = null)
    {
        if ($vldMou instanceof VldMou) {
            return $this
                ->addUsingAlias(MouPeer::MOU_ID, $vldMou->getMouId(), $comparison);
        } elseif ($vldMou instanceof PropelObjectCollection) {
            return $this
                ->useVldMouQuery()
                ->filterByPrimaryKeys($vldMou->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldMou() only accepts arguments of type VldMou or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldMou relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function joinVldMou($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldMou');

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
            $this->addJoinObject($join, 'VldMou');
        }

        return $this;
    }

    /**
     * Use the VldMou relation VldMou object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldMouQuery A secondary query class using the current class as primary query
     */
    public function useVldMouQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldMou($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldMou', '\DataDikdas\Model\VldMouQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Mou $mou Object to remove from the list of results
     *
     * @return MouQuery The current query, for fluid interface
     */
    public function prune($mou = null)
    {
        if ($mou) {
            $this->addUsingAlias(MouPeer::MOU_ID, $mou->getMouId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
