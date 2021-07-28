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
use DataDikdas\Model\Demografi;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\KategoriDesa;
use DataDikdas\Model\LembSertifikasi;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\LembagaNonSekolah;
use DataDikdas\Model\LevelWilayah;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Mulok;
use DataDikdas\Model\Negara;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\Publisher;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TetanggaKabkota;
use DataDikdas\Model\Yayasan;

/**
 * Base class that represents a query for the 'ref.mst_wilayah' table.
 *
 * 
 *
 * @method MstWilayahQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method MstWilayahQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method MstWilayahQuery orderByIdLevelWilayah($order = Criteria::ASC) Order by the id_level_wilayah column
 * @method MstWilayahQuery orderByMstKodeWilayah($order = Criteria::ASC) Order by the mst_kode_wilayah column
 * @method MstWilayahQuery orderByNegaraId($order = Criteria::ASC) Order by the negara_id column
 * @method MstWilayahQuery orderByAsalWilayah($order = Criteria::ASC) Order by the asal_wilayah column
 * @method MstWilayahQuery orderByKodeBps($order = Criteria::ASC) Order by the kode_bps column
 * @method MstWilayahQuery orderByKodeDagri($order = Criteria::ASC) Order by the kode_dagri column
 * @method MstWilayahQuery orderByKodeKeu($order = Criteria::ASC) Order by the kode_keu column
 * @method MstWilayahQuery orderByIdProv($order = Criteria::ASC) Order by the id_prov column
 * @method MstWilayahQuery orderByIdKabkota($order = Criteria::ASC) Order by the id_kabkota column
 * @method MstWilayahQuery orderByIdKec($order = Criteria::ASC) Order by the id_kec column
 * @method MstWilayahQuery orderByADesa($order = Criteria::ASC) Order by the a_desa column
 * @method MstWilayahQuery orderByAKelurahan($order = Criteria::ASC) Order by the a_kelurahan column
 * @method MstWilayahQuery orderByA35($order = Criteria::ASC) Order by the a_35 column
 * @method MstWilayahQuery orderByAUrban($order = Criteria::ASC) Order by the a_urban column
 * @method MstWilayahQuery orderByKategoriDesaId($order = Criteria::ASC) Order by the kategori_desa_id column
 * @method MstWilayahQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MstWilayahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MstWilayahQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method MstWilayahQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method MstWilayahQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method MstWilayahQuery groupByNama() Group by the nama column
 * @method MstWilayahQuery groupByIdLevelWilayah() Group by the id_level_wilayah column
 * @method MstWilayahQuery groupByMstKodeWilayah() Group by the mst_kode_wilayah column
 * @method MstWilayahQuery groupByNegaraId() Group by the negara_id column
 * @method MstWilayahQuery groupByAsalWilayah() Group by the asal_wilayah column
 * @method MstWilayahQuery groupByKodeBps() Group by the kode_bps column
 * @method MstWilayahQuery groupByKodeDagri() Group by the kode_dagri column
 * @method MstWilayahQuery groupByKodeKeu() Group by the kode_keu column
 * @method MstWilayahQuery groupByIdProv() Group by the id_prov column
 * @method MstWilayahQuery groupByIdKabkota() Group by the id_kabkota column
 * @method MstWilayahQuery groupByIdKec() Group by the id_kec column
 * @method MstWilayahQuery groupByADesa() Group by the a_desa column
 * @method MstWilayahQuery groupByAKelurahan() Group by the a_kelurahan column
 * @method MstWilayahQuery groupByA35() Group by the a_35 column
 * @method MstWilayahQuery groupByAUrban() Group by the a_urban column
 * @method MstWilayahQuery groupByKategoriDesaId() Group by the kategori_desa_id column
 * @method MstWilayahQuery groupByCreateDate() Group by the create_date column
 * @method MstWilayahQuery groupByLastUpdate() Group by the last_update column
 * @method MstWilayahQuery groupByExpiredDate() Group by the expired_date column
 * @method MstWilayahQuery groupByLastSync() Group by the last_sync column
 *
 * @method MstWilayahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MstWilayahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MstWilayahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MstWilayahQuery leftJoinKategoriDesa($relationAlias = null) Adds a LEFT JOIN clause to the query using the KategoriDesa relation
 * @method MstWilayahQuery rightJoinKategoriDesa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KategoriDesa relation
 * @method MstWilayahQuery innerJoinKategoriDesa($relationAlias = null) Adds a INNER JOIN clause to the query using the KategoriDesa relation
 *
 * @method MstWilayahQuery leftJoinLevelWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the LevelWilayah relation
 * @method MstWilayahQuery rightJoinLevelWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LevelWilayah relation
 * @method MstWilayahQuery innerJoinLevelWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the LevelWilayah relation
 *
 * @method MstWilayahQuery leftJoinMstWilayahRelatedByMstKodeWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayahRelatedByMstKodeWilayah relation
 * @method MstWilayahQuery rightJoinMstWilayahRelatedByMstKodeWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayahRelatedByMstKodeWilayah relation
 * @method MstWilayahQuery innerJoinMstWilayahRelatedByMstKodeWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayahRelatedByMstKodeWilayah relation
 *
 * @method MstWilayahQuery leftJoinNegara($relationAlias = null) Adds a LEFT JOIN clause to the query using the Negara relation
 * @method MstWilayahQuery rightJoinNegara($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Negara relation
 * @method MstWilayahQuery innerJoinNegara($relationAlias = null) Adds a INNER JOIN clause to the query using the Negara relation
 *
 * @method MstWilayahQuery leftJoinDemografi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Demografi relation
 * @method MstWilayahQuery rightJoinDemografi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Demografi relation
 * @method MstWilayahQuery innerJoinDemografi($relationAlias = null) Adds a INNER JOIN clause to the query using the Demografi relation
 *
 * @method MstWilayahQuery leftJoinDudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dudi relation
 * @method MstWilayahQuery rightJoinDudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dudi relation
 * @method MstWilayahQuery innerJoinDudi($relationAlias = null) Adds a INNER JOIN clause to the query using the Dudi relation
 *
 * @method MstWilayahQuery leftJoinInstalasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Instalasi relation
 * @method MstWilayahQuery rightJoinInstalasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Instalasi relation
 * @method MstWilayahQuery innerJoinInstalasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Instalasi relation
 *
 * @method MstWilayahQuery leftJoinLembSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembSertifikasi relation
 * @method MstWilayahQuery rightJoinLembSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembSertifikasi relation
 * @method MstWilayahQuery innerJoinLembSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembSertifikasi relation
 *
 * @method MstWilayahQuery leftJoinLembagaAkreditasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaAkreditasi relation
 * @method MstWilayahQuery rightJoinLembagaAkreditasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaAkreditasi relation
 * @method MstWilayahQuery innerJoinLembagaAkreditasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaAkreditasi relation
 *
 * @method MstWilayahQuery leftJoinLembagaNonSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaNonSekolah relation
 * @method MstWilayahQuery rightJoinLembagaNonSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaNonSekolah relation
 * @method MstWilayahQuery innerJoinLembagaNonSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaNonSekolah relation
 *
 * @method MstWilayahQuery leftJoinMstWilayahRelatedByKodeWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayahRelatedByKodeWilayah relation
 * @method MstWilayahQuery rightJoinMstWilayahRelatedByKodeWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayahRelatedByKodeWilayah relation
 * @method MstWilayahQuery innerJoinMstWilayahRelatedByKodeWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayahRelatedByKodeWilayah relation
 *
 * @method MstWilayahQuery leftJoinMulok($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mulok relation
 * @method MstWilayahQuery rightJoinMulok($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mulok relation
 * @method MstWilayahQuery innerJoinMulok($relationAlias = null) Adds a INNER JOIN clause to the query using the Mulok relation
 *
 * @method MstWilayahQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method MstWilayahQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method MstWilayahQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method MstWilayahQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method MstWilayahQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method MstWilayahQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method MstWilayahQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method MstWilayahQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method MstWilayahQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method MstWilayahQuery leftJoinPublisher($relationAlias = null) Adds a LEFT JOIN clause to the query using the Publisher relation
 * @method MstWilayahQuery rightJoinPublisher($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Publisher relation
 * @method MstWilayahQuery innerJoinPublisher($relationAlias = null) Adds a INNER JOIN clause to the query using the Publisher relation
 *
 * @method MstWilayahQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method MstWilayahQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method MstWilayahQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method MstWilayahQuery leftJoinTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tanah relation
 * @method MstWilayahQuery rightJoinTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tanah relation
 * @method MstWilayahQuery innerJoinTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the Tanah relation
 *
 * @method MstWilayahQuery leftJoinTetanggaKabkotaRelatedByKodeWilayah1($relationAlias = null) Adds a LEFT JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah1 relation
 * @method MstWilayahQuery rightJoinTetanggaKabkotaRelatedByKodeWilayah1($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah1 relation
 * @method MstWilayahQuery innerJoinTetanggaKabkotaRelatedByKodeWilayah1($relationAlias = null) Adds a INNER JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah1 relation
 *
 * @method MstWilayahQuery leftJoinTetanggaKabkotaRelatedByKodeWilayah2($relationAlias = null) Adds a LEFT JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah2 relation
 * @method MstWilayahQuery rightJoinTetanggaKabkotaRelatedByKodeWilayah2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah2 relation
 * @method MstWilayahQuery innerJoinTetanggaKabkotaRelatedByKodeWilayah2($relationAlias = null) Adds a INNER JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah2 relation
 *
 * @method MstWilayahQuery leftJoinYayasan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Yayasan relation
 * @method MstWilayahQuery rightJoinYayasan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Yayasan relation
 * @method MstWilayahQuery innerJoinYayasan($relationAlias = null) Adds a INNER JOIN clause to the query using the Yayasan relation
 *
 * @method MstWilayah findOne(PropelPDO $con = null) Return the first MstWilayah matching the query
 * @method MstWilayah findOneOrCreate(PropelPDO $con = null) Return the first MstWilayah matching the query, or a new MstWilayah object populated from the query conditions when no match is found
 *
 * @method MstWilayah findOneByNama(string $nama) Return the first MstWilayah filtered by the nama column
 * @method MstWilayah findOneByIdLevelWilayah(int $id_level_wilayah) Return the first MstWilayah filtered by the id_level_wilayah column
 * @method MstWilayah findOneByMstKodeWilayah(string $mst_kode_wilayah) Return the first MstWilayah filtered by the mst_kode_wilayah column
 * @method MstWilayah findOneByNegaraId(string $negara_id) Return the first MstWilayah filtered by the negara_id column
 * @method MstWilayah findOneByAsalWilayah(string $asal_wilayah) Return the first MstWilayah filtered by the asal_wilayah column
 * @method MstWilayah findOneByKodeBps(string $kode_bps) Return the first MstWilayah filtered by the kode_bps column
 * @method MstWilayah findOneByKodeDagri(string $kode_dagri) Return the first MstWilayah filtered by the kode_dagri column
 * @method MstWilayah findOneByKodeKeu(string $kode_keu) Return the first MstWilayah filtered by the kode_keu column
 * @method MstWilayah findOneByIdProv(string $id_prov) Return the first MstWilayah filtered by the id_prov column
 * @method MstWilayah findOneByIdKabkota(string $id_kabkota) Return the first MstWilayah filtered by the id_kabkota column
 * @method MstWilayah findOneByIdKec(string $id_kec) Return the first MstWilayah filtered by the id_kec column
 * @method MstWilayah findOneByADesa(string $a_desa) Return the first MstWilayah filtered by the a_desa column
 * @method MstWilayah findOneByAKelurahan(string $a_kelurahan) Return the first MstWilayah filtered by the a_kelurahan column
 * @method MstWilayah findOneByA35(string $a_35) Return the first MstWilayah filtered by the a_35 column
 * @method MstWilayah findOneByAUrban(string $a_urban) Return the first MstWilayah filtered by the a_urban column
 * @method MstWilayah findOneByKategoriDesaId(string $kategori_desa_id) Return the first MstWilayah filtered by the kategori_desa_id column
 * @method MstWilayah findOneByCreateDate(string $create_date) Return the first MstWilayah filtered by the create_date column
 * @method MstWilayah findOneByLastUpdate(string $last_update) Return the first MstWilayah filtered by the last_update column
 * @method MstWilayah findOneByExpiredDate(string $expired_date) Return the first MstWilayah filtered by the expired_date column
 * @method MstWilayah findOneByLastSync(string $last_sync) Return the first MstWilayah filtered by the last_sync column
 *
 * @method array findByKodeWilayah(string $kode_wilayah) Return MstWilayah objects filtered by the kode_wilayah column
 * @method array findByNama(string $nama) Return MstWilayah objects filtered by the nama column
 * @method array findByIdLevelWilayah(int $id_level_wilayah) Return MstWilayah objects filtered by the id_level_wilayah column
 * @method array findByMstKodeWilayah(string $mst_kode_wilayah) Return MstWilayah objects filtered by the mst_kode_wilayah column
 * @method array findByNegaraId(string $negara_id) Return MstWilayah objects filtered by the negara_id column
 * @method array findByAsalWilayah(string $asal_wilayah) Return MstWilayah objects filtered by the asal_wilayah column
 * @method array findByKodeBps(string $kode_bps) Return MstWilayah objects filtered by the kode_bps column
 * @method array findByKodeDagri(string $kode_dagri) Return MstWilayah objects filtered by the kode_dagri column
 * @method array findByKodeKeu(string $kode_keu) Return MstWilayah objects filtered by the kode_keu column
 * @method array findByIdProv(string $id_prov) Return MstWilayah objects filtered by the id_prov column
 * @method array findByIdKabkota(string $id_kabkota) Return MstWilayah objects filtered by the id_kabkota column
 * @method array findByIdKec(string $id_kec) Return MstWilayah objects filtered by the id_kec column
 * @method array findByADesa(string $a_desa) Return MstWilayah objects filtered by the a_desa column
 * @method array findByAKelurahan(string $a_kelurahan) Return MstWilayah objects filtered by the a_kelurahan column
 * @method array findByA35(string $a_35) Return MstWilayah objects filtered by the a_35 column
 * @method array findByAUrban(string $a_urban) Return MstWilayah objects filtered by the a_urban column
 * @method array findByKategoriDesaId(string $kategori_desa_id) Return MstWilayah objects filtered by the kategori_desa_id column
 * @method array findByCreateDate(string $create_date) Return MstWilayah objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return MstWilayah objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return MstWilayah objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return MstWilayah objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMstWilayahQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMstWilayahQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\MstWilayah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MstWilayahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MstWilayahQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MstWilayahQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MstWilayahQuery) {
            return $criteria;
        }
        $query = new MstWilayahQuery();
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
     * @return   MstWilayah|MstWilayah[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MstWilayahPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MstWilayah A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKodeWilayah($key, $con = null)
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
     * @return                 MstWilayah A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kode_wilayah", "nama", "id_level_wilayah", "mst_kode_wilayah", "negara_id", "asal_wilayah", "kode_bps", "kode_dagri", "kode_keu", "id_prov", "id_kabkota", "id_kec", "a_desa", "a_kelurahan", "a_35", "a_urban", "kategori_desa_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."mst_wilayah" WHERE "kode_wilayah" = :p0';
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
            $obj = new MstWilayah();
            $obj->hydrate($row);
            MstWilayahPeer::addInstanceToPool($obj, (string) $key);
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
     * @return MstWilayah|MstWilayah[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MstWilayah[]|mixed the list of results, formatted by the current formatter
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
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $keys, Criteria::IN);
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
     * @return MstWilayahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return MstWilayahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MstWilayahPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the id_level_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLevelWilayah(1234); // WHERE id_level_wilayah = 1234
     * $query->filterByIdLevelWilayah(array(12, 34)); // WHERE id_level_wilayah IN (12, 34)
     * $query->filterByIdLevelWilayah(array('min' => 12)); // WHERE id_level_wilayah >= 12
     * $query->filterByIdLevelWilayah(array('max' => 12)); // WHERE id_level_wilayah <= 12
     * </code>
     *
     * @see       filterByLevelWilayah()
     *
     * @param     mixed $idLevelWilayah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByIdLevelWilayah($idLevelWilayah = null, $comparison = null)
    {
        if (is_array($idLevelWilayah)) {
            $useMinMax = false;
            if (isset($idLevelWilayah['min'])) {
                $this->addUsingAlias(MstWilayahPeer::ID_LEVEL_WILAYAH, $idLevelWilayah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLevelWilayah['max'])) {
                $this->addUsingAlias(MstWilayahPeer::ID_LEVEL_WILAYAH, $idLevelWilayah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::ID_LEVEL_WILAYAH, $idLevelWilayah, $comparison);
    }

    /**
     * Filter the query on the mst_kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByMstKodeWilayah('fooValue');   // WHERE mst_kode_wilayah = 'fooValue'
     * $query->filterByMstKodeWilayah('%fooValue%'); // WHERE mst_kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mstKodeWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByMstKodeWilayah($mstKodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mstKodeWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mstKodeWilayah)) {
                $mstKodeWilayah = str_replace('*', '%', $mstKodeWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::MST_KODE_WILAYAH, $mstKodeWilayah, $comparison);
    }

    /**
     * Filter the query on the negara_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNegaraId('fooValue');   // WHERE negara_id = 'fooValue'
     * $query->filterByNegaraId('%fooValue%'); // WHERE negara_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $negaraId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByNegaraId($negaraId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($negaraId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $negaraId)) {
                $negaraId = str_replace('*', '%', $negaraId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::NEGARA_ID, $negaraId, $comparison);
    }

    /**
     * Filter the query on the asal_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalWilayah('fooValue');   // WHERE asal_wilayah = 'fooValue'
     * $query->filterByAsalWilayah('%fooValue%'); // WHERE asal_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByAsalWilayah($asalWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalWilayah)) {
                $asalWilayah = str_replace('*', '%', $asalWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::ASAL_WILAYAH, $asalWilayah, $comparison);
    }

    /**
     * Filter the query on the kode_bps column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeBps('fooValue');   // WHERE kode_bps = 'fooValue'
     * $query->filterByKodeBps('%fooValue%'); // WHERE kode_bps LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeBps The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByKodeBps($kodeBps = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeBps)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeBps)) {
                $kodeBps = str_replace('*', '%', $kodeBps);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::KODE_BPS, $kodeBps, $comparison);
    }

    /**
     * Filter the query on the kode_dagri column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeDagri('fooValue');   // WHERE kode_dagri = 'fooValue'
     * $query->filterByKodeDagri('%fooValue%'); // WHERE kode_dagri LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeDagri The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByKodeDagri($kodeDagri = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeDagri)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeDagri)) {
                $kodeDagri = str_replace('*', '%', $kodeDagri);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::KODE_DAGRI, $kodeDagri, $comparison);
    }

    /**
     * Filter the query on the kode_keu column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeKeu('fooValue');   // WHERE kode_keu = 'fooValue'
     * $query->filterByKodeKeu('%fooValue%'); // WHERE kode_keu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeKeu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByKodeKeu($kodeKeu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeKeu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeKeu)) {
                $kodeKeu = str_replace('*', '%', $kodeKeu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::KODE_KEU, $kodeKeu, $comparison);
    }

    /**
     * Filter the query on the id_prov column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProv('fooValue');   // WHERE id_prov = 'fooValue'
     * $query->filterByIdProv('%fooValue%'); // WHERE id_prov LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idProv The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByIdProv($idProv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idProv)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idProv)) {
                $idProv = str_replace('*', '%', $idProv);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::ID_PROV, $idProv, $comparison);
    }

    /**
     * Filter the query on the id_kabkota column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKabkota('fooValue');   // WHERE id_kabkota = 'fooValue'
     * $query->filterByIdKabkota('%fooValue%'); // WHERE id_kabkota LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idKabkota The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByIdKabkota($idKabkota = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idKabkota)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idKabkota)) {
                $idKabkota = str_replace('*', '%', $idKabkota);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::ID_KABKOTA, $idKabkota, $comparison);
    }

    /**
     * Filter the query on the id_kec column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKec('fooValue');   // WHERE id_kec = 'fooValue'
     * $query->filterByIdKec('%fooValue%'); // WHERE id_kec LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idKec The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByIdKec($idKec = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idKec)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idKec)) {
                $idKec = str_replace('*', '%', $idKec);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::ID_KEC, $idKec, $comparison);
    }

    /**
     * Filter the query on the a_desa column
     *
     * Example usage:
     * <code>
     * $query->filterByADesa(1234); // WHERE a_desa = 1234
     * $query->filterByADesa(array(12, 34)); // WHERE a_desa IN (12, 34)
     * $query->filterByADesa(array('min' => 12)); // WHERE a_desa >= 12
     * $query->filterByADesa(array('max' => 12)); // WHERE a_desa <= 12
     * </code>
     *
     * @param     mixed $aDesa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByADesa($aDesa = null, $comparison = null)
    {
        if (is_array($aDesa)) {
            $useMinMax = false;
            if (isset($aDesa['min'])) {
                $this->addUsingAlias(MstWilayahPeer::A_DESA, $aDesa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aDesa['max'])) {
                $this->addUsingAlias(MstWilayahPeer::A_DESA, $aDesa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::A_DESA, $aDesa, $comparison);
    }

    /**
     * Filter the query on the a_kelurahan column
     *
     * Example usage:
     * <code>
     * $query->filterByAKelurahan(1234); // WHERE a_kelurahan = 1234
     * $query->filterByAKelurahan(array(12, 34)); // WHERE a_kelurahan IN (12, 34)
     * $query->filterByAKelurahan(array('min' => 12)); // WHERE a_kelurahan >= 12
     * $query->filterByAKelurahan(array('max' => 12)); // WHERE a_kelurahan <= 12
     * </code>
     *
     * @param     mixed $aKelurahan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByAKelurahan($aKelurahan = null, $comparison = null)
    {
        if (is_array($aKelurahan)) {
            $useMinMax = false;
            if (isset($aKelurahan['min'])) {
                $this->addUsingAlias(MstWilayahPeer::A_KELURAHAN, $aKelurahan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKelurahan['max'])) {
                $this->addUsingAlias(MstWilayahPeer::A_KELURAHAN, $aKelurahan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::A_KELURAHAN, $aKelurahan, $comparison);
    }

    /**
     * Filter the query on the a_35 column
     *
     * Example usage:
     * <code>
     * $query->filterByA35(1234); // WHERE a_35 = 1234
     * $query->filterByA35(array(12, 34)); // WHERE a_35 IN (12, 34)
     * $query->filterByA35(array('min' => 12)); // WHERE a_35 >= 12
     * $query->filterByA35(array('max' => 12)); // WHERE a_35 <= 12
     * </code>
     *
     * @param     mixed $a35 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByA35($a35 = null, $comparison = null)
    {
        if (is_array($a35)) {
            $useMinMax = false;
            if (isset($a35['min'])) {
                $this->addUsingAlias(MstWilayahPeer::A_35, $a35['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($a35['max'])) {
                $this->addUsingAlias(MstWilayahPeer::A_35, $a35['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::A_35, $a35, $comparison);
    }

    /**
     * Filter the query on the a_urban column
     *
     * Example usage:
     * <code>
     * $query->filterByAUrban(1234); // WHERE a_urban = 1234
     * $query->filterByAUrban(array(12, 34)); // WHERE a_urban IN (12, 34)
     * $query->filterByAUrban(array('min' => 12)); // WHERE a_urban >= 12
     * $query->filterByAUrban(array('max' => 12)); // WHERE a_urban <= 12
     * </code>
     *
     * @param     mixed $aUrban The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByAUrban($aUrban = null, $comparison = null)
    {
        if (is_array($aUrban)) {
            $useMinMax = false;
            if (isset($aUrban['min'])) {
                $this->addUsingAlias(MstWilayahPeer::A_URBAN, $aUrban['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aUrban['max'])) {
                $this->addUsingAlias(MstWilayahPeer::A_URBAN, $aUrban['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::A_URBAN, $aUrban, $comparison);
    }

    /**
     * Filter the query on the kategori_desa_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKategoriDesaId(1234); // WHERE kategori_desa_id = 1234
     * $query->filterByKategoriDesaId(array(12, 34)); // WHERE kategori_desa_id IN (12, 34)
     * $query->filterByKategoriDesaId(array('min' => 12)); // WHERE kategori_desa_id >= 12
     * $query->filterByKategoriDesaId(array('max' => 12)); // WHERE kategori_desa_id <= 12
     * </code>
     *
     * @see       filterByKategoriDesa()
     *
     * @param     mixed $kategoriDesaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByKategoriDesaId($kategoriDesaId = null, $comparison = null)
    {
        if (is_array($kategoriDesaId)) {
            $useMinMax = false;
            if (isset($kategoriDesaId['min'])) {
                $this->addUsingAlias(MstWilayahPeer::KATEGORI_DESA_ID, $kategoriDesaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kategoriDesaId['max'])) {
                $this->addUsingAlias(MstWilayahPeer::KATEGORI_DESA_ID, $kategoriDesaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::KATEGORI_DESA_ID, $kategoriDesaId, $comparison);
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
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MstWilayahPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MstWilayahPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MstWilayahPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MstWilayahPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the expired_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiredDate('2011-03-14'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate('now'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate(array('max' => 'yesterday')); // WHERE expired_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expiredDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(MstWilayahPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(MstWilayahPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MstWilayahPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MstWilayahPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MstWilayahPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related KategoriDesa object
     *
     * @param   KategoriDesa|PropelObjectCollection $kategoriDesa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKategoriDesa($kategoriDesa, $comparison = null)
    {
        if ($kategoriDesa instanceof KategoriDesa) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KATEGORI_DESA_ID, $kategoriDesa->getKategoriDesaId(), $comparison);
        } elseif ($kategoriDesa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MstWilayahPeer::KATEGORI_DESA_ID, $kategoriDesa->toKeyValue('PrimaryKey', 'KategoriDesaId'), $comparison);
        } else {
            throw new PropelException('filterByKategoriDesa() only accepts arguments of type KategoriDesa or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KategoriDesa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinKategoriDesa($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KategoriDesa');

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
            $this->addJoinObject($join, 'KategoriDesa');
        }

        return $this;
    }

    /**
     * Use the KategoriDesa relation KategoriDesa object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KategoriDesaQuery A secondary query class using the current class as primary query
     */
    public function useKategoriDesaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKategoriDesa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KategoriDesa', '\DataDikdas\Model\KategoriDesaQuery');
    }

    /**
     * Filter the query by a related LevelWilayah object
     *
     * @param   LevelWilayah|PropelObjectCollection $levelWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLevelWilayah($levelWilayah, $comparison = null)
    {
        if ($levelWilayah instanceof LevelWilayah) {
            return $this
                ->addUsingAlias(MstWilayahPeer::ID_LEVEL_WILAYAH, $levelWilayah->getIdLevelWilayah(), $comparison);
        } elseif ($levelWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MstWilayahPeer::ID_LEVEL_WILAYAH, $levelWilayah->toKeyValue('PrimaryKey', 'IdLevelWilayah'), $comparison);
        } else {
            throw new PropelException('filterByLevelWilayah() only accepts arguments of type LevelWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LevelWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinLevelWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LevelWilayah');

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
            $this->addJoinObject($join, 'LevelWilayah');
        }

        return $this;
    }

    /**
     * Use the LevelWilayah relation LevelWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LevelWilayahQuery A secondary query class using the current class as primary query
     */
    public function useLevelWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLevelWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LevelWilayah', '\DataDikdas\Model\LevelWilayahQuery');
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayahRelatedByMstKodeWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(MstWilayahPeer::MST_KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MstWilayahPeer::MST_KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayahRelatedByMstKodeWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayahRelatedByMstKodeWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinMstWilayahRelatedByMstKodeWilayah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayahRelatedByMstKodeWilayah');

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
            $this->addJoinObject($join, 'MstWilayahRelatedByMstKodeWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayahRelatedByMstKodeWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahRelatedByMstKodeWilayahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMstWilayahRelatedByMstKodeWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayahRelatedByMstKodeWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related Negara object
     *
     * @param   Negara|PropelObjectCollection $negara The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNegara($negara, $comparison = null)
    {
        if ($negara instanceof Negara) {
            return $this
                ->addUsingAlias(MstWilayahPeer::NEGARA_ID, $negara->getNegaraId(), $comparison);
        } elseif ($negara instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MstWilayahPeer::NEGARA_ID, $negara->toKeyValue('PrimaryKey', 'NegaraId'), $comparison);
        } else {
            throw new PropelException('filterByNegara() only accepts arguments of type Negara or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Negara relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinNegara($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Negara');

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
            $this->addJoinObject($join, 'Negara');
        }

        return $this;
    }

    /**
     * Use the Negara relation Negara object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\NegaraQuery A secondary query class using the current class as primary query
     */
    public function useNegaraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNegara($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Negara', '\DataDikdas\Model\NegaraQuery');
    }

    /**
     * Filter the query by a related Demografi object
     *
     * @param   Demografi|PropelObjectCollection $demografi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDemografi($demografi, $comparison = null)
    {
        if ($demografi instanceof Demografi) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $demografi->getKodeWilayah(), $comparison);
        } elseif ($demografi instanceof PropelObjectCollection) {
            return $this
                ->useDemografiQuery()
                ->filterByPrimaryKeys($demografi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDemografi() only accepts arguments of type Demografi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Demografi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinDemografi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Demografi');

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
            $this->addJoinObject($join, 'Demografi');
        }

        return $this;
    }

    /**
     * Use the Demografi relation Demografi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DemografiQuery A secondary query class using the current class as primary query
     */
    public function useDemografiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDemografi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Demografi', '\DataDikdas\Model\DemografiQuery');
    }

    /**
     * Filter the query by a related Dudi object
     *
     * @param   Dudi|PropelObjectCollection $dudi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDudi($dudi, $comparison = null)
    {
        if ($dudi instanceof Dudi) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $dudi->getKodeWilayah(), $comparison);
        } elseif ($dudi instanceof PropelObjectCollection) {
            return $this
                ->useDudiQuery()
                ->filterByPrimaryKeys($dudi->getPrimaryKeys())
                ->endUse();
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
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinDudi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useDudiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dudi', '\DataDikdas\Model\DudiQuery');
    }

    /**
     * Filter the query by a related Instalasi object
     *
     * @param   Instalasi|PropelObjectCollection $instalasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInstalasi($instalasi, $comparison = null)
    {
        if ($instalasi instanceof Instalasi) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $instalasi->getKodeWilayah(), $comparison);
        } elseif ($instalasi instanceof PropelObjectCollection) {
            return $this
                ->useInstalasiQuery()
                ->filterByPrimaryKeys($instalasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInstalasi() only accepts arguments of type Instalasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Instalasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinInstalasi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Instalasi');

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
            $this->addJoinObject($join, 'Instalasi');
        }

        return $this;
    }

    /**
     * Use the Instalasi relation Instalasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\InstalasiQuery A secondary query class using the current class as primary query
     */
    public function useInstalasiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInstalasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Instalasi', '\DataDikdas\Model\InstalasiQuery');
    }

    /**
     * Filter the query by a related LembSertifikasi object
     *
     * @param   LembSertifikasi|PropelObjectCollection $lembSertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembSertifikasi($lembSertifikasi, $comparison = null)
    {
        if ($lembSertifikasi instanceof LembSertifikasi) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $lembSertifikasi->getKodeWilayah(), $comparison);
        } elseif ($lembSertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useLembSertifikasiQuery()
                ->filterByPrimaryKeys($lembSertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLembSertifikasi() only accepts arguments of type LembSertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembSertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinLembSertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembSertifikasi');

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
            $this->addJoinObject($join, 'LembSertifikasi');
        }

        return $this;
    }

    /**
     * Use the LembSertifikasi relation LembSertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembSertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useLembSertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembSertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembSertifikasi', '\DataDikdas\Model\LembSertifikasiQuery');
    }

    /**
     * Filter the query by a related LembagaAkreditasi object
     *
     * @param   LembagaAkreditasi|PropelObjectCollection $lembagaAkreditasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaAkreditasi($lembagaAkreditasi, $comparison = null)
    {
        if ($lembagaAkreditasi instanceof LembagaAkreditasi) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $lembagaAkreditasi->getKodeWilayah(), $comparison);
        } elseif ($lembagaAkreditasi instanceof PropelObjectCollection) {
            return $this
                ->useLembagaAkreditasiQuery()
                ->filterByPrimaryKeys($lembagaAkreditasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLembagaAkreditasi() only accepts arguments of type LembagaAkreditasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaAkreditasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinLembagaAkreditasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaAkreditasi');

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
            $this->addJoinObject($join, 'LembagaAkreditasi');
        }

        return $this;
    }

    /**
     * Use the LembagaAkreditasi relation LembagaAkreditasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaAkreditasiQuery A secondary query class using the current class as primary query
     */
    public function useLembagaAkreditasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaAkreditasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaAkreditasi', '\DataDikdas\Model\LembagaAkreditasiQuery');
    }

    /**
     * Filter the query by a related LembagaNonSekolah object
     *
     * @param   LembagaNonSekolah|PropelObjectCollection $lembagaNonSekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaNonSekolah($lembagaNonSekolah, $comparison = null)
    {
        if ($lembagaNonSekolah instanceof LembagaNonSekolah) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $lembagaNonSekolah->getKodeWilayah(), $comparison);
        } elseif ($lembagaNonSekolah instanceof PropelObjectCollection) {
            return $this
                ->useLembagaNonSekolahQuery()
                ->filterByPrimaryKeys($lembagaNonSekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLembagaNonSekolah() only accepts arguments of type LembagaNonSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaNonSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinLembagaNonSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaNonSekolah');

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
            $this->addJoinObject($join, 'LembagaNonSekolah');
        }

        return $this;
    }

    /**
     * Use the LembagaNonSekolah relation LembagaNonSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaNonSekolahQuery A secondary query class using the current class as primary query
     */
    public function useLembagaNonSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaNonSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaNonSekolah', '\DataDikdas\Model\LembagaNonSekolahQuery');
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayahRelatedByKodeWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $mstWilayah->getMstKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            return $this
                ->useMstWilayahRelatedByKodeWilayahQuery()
                ->filterByPrimaryKeys($mstWilayah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMstWilayahRelatedByKodeWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayahRelatedByKodeWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinMstWilayahRelatedByKodeWilayah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayahRelatedByKodeWilayah');

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
            $this->addJoinObject($join, 'MstWilayahRelatedByKodeWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayahRelatedByKodeWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahRelatedByKodeWilayahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMstWilayahRelatedByKodeWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayahRelatedByKodeWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related Mulok object
     *
     * @param   Mulok|PropelObjectCollection $mulok  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMulok($mulok, $comparison = null)
    {
        if ($mulok instanceof Mulok) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $mulok->getKodeWilayah(), $comparison);
        } elseif ($mulok instanceof PropelObjectCollection) {
            return $this
                ->useMulokQuery()
                ->filterByPrimaryKeys($mulok->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMulok() only accepts arguments of type Mulok or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mulok relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinMulok($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mulok');

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
            $this->addJoinObject($join, 'Mulok');
        }

        return $this;
    }

    /**
     * Use the Mulok relation Mulok object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MulokQuery A secondary query class using the current class as primary query
     */
    public function useMulokQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMulok($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mulok', '\DataDikdas\Model\MulokQuery');
    }

    /**
     * Filter the query by a related Pengguna object
     *
     * @param   Pengguna|PropelObjectCollection $pengguna  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof Pengguna) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $pengguna->getKodeWilayah(), $comparison);
        } elseif ($pengguna instanceof PropelObjectCollection) {
            return $this
                ->usePenggunaQuery()
                ->filterByPrimaryKeys($pengguna->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPengguna() only accepts arguments of type Pengguna or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pengguna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinPengguna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pengguna');

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
            $this->addJoinObject($join, 'Pengguna');
        }

        return $this;
    }

    /**
     * Use the Pengguna relation Pengguna object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenggunaQuery A secondary query class using the current class as primary query
     */
    public function usePenggunaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pengguna', '\DataDikdas\Model\PenggunaQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $pesertaDidik->getKodeWilayah(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
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
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $ptk->getKodeWilayah(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            return $this
                ->usePtkQuery()
                ->filterByPrimaryKeys($ptk->getPrimaryKeys())
                ->endUse();
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
     * @return MstWilayahQuery The current query, for fluid interface
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
     * Filter the query by a related Publisher object
     *
     * @param   Publisher|PropelObjectCollection $publisher  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPublisher($publisher, $comparison = null)
    {
        if ($publisher instanceof Publisher) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $publisher->getKodeWilayah(), $comparison);
        } elseif ($publisher instanceof PropelObjectCollection) {
            return $this
                ->usePublisherQuery()
                ->filterByPrimaryKeys($publisher->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPublisher() only accepts arguments of type Publisher or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Publisher relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinPublisher($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Publisher');

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
            $this->addJoinObject($join, 'Publisher');
        }

        return $this;
    }

    /**
     * Use the Publisher relation Publisher object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PublisherQuery A secondary query class using the current class as primary query
     */
    public function usePublisherQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPublisher($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Publisher', '\DataDikdas\Model\PublisherQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $sekolah->getKodeWilayah(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            return $this
                ->useSekolahQuery()
                ->filterByPrimaryKeys($sekolah->getPrimaryKeys())
                ->endUse();
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
     * @return MstWilayahQuery The current query, for fluid interface
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
     * Filter the query by a related Tanah object
     *
     * @param   Tanah|PropelObjectCollection $tanah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanah($tanah, $comparison = null)
    {
        if ($tanah instanceof Tanah) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $tanah->getKodeWilayah(), $comparison);
        } elseif ($tanah instanceof PropelObjectCollection) {
            return $this
                ->useTanahQuery()
                ->filterByPrimaryKeys($tanah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanah() only accepts arguments of type Tanah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tanah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinTanah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tanah');

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
            $this->addJoinObject($join, 'Tanah');
        }

        return $this;
    }

    /**
     * Use the Tanah relation Tanah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahQuery A secondary query class using the current class as primary query
     */
    public function useTanahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tanah', '\DataDikdas\Model\TanahQuery');
    }

    /**
     * Filter the query by a related TetanggaKabkota object
     *
     * @param   TetanggaKabkota|PropelObjectCollection $tetanggaKabkota  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTetanggaKabkotaRelatedByKodeWilayah1($tetanggaKabkota, $comparison = null)
    {
        if ($tetanggaKabkota instanceof TetanggaKabkota) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $tetanggaKabkota->getKodeWilayah1(), $comparison);
        } elseif ($tetanggaKabkota instanceof PropelObjectCollection) {
            return $this
                ->useTetanggaKabkotaRelatedByKodeWilayah1Query()
                ->filterByPrimaryKeys($tetanggaKabkota->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTetanggaKabkotaRelatedByKodeWilayah1() only accepts arguments of type TetanggaKabkota or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah1 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinTetanggaKabkotaRelatedByKodeWilayah1($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TetanggaKabkotaRelatedByKodeWilayah1');

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
            $this->addJoinObject($join, 'TetanggaKabkotaRelatedByKodeWilayah1');
        }

        return $this;
    }

    /**
     * Use the TetanggaKabkotaRelatedByKodeWilayah1 relation TetanggaKabkota object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TetanggaKabkotaQuery A secondary query class using the current class as primary query
     */
    public function useTetanggaKabkotaRelatedByKodeWilayah1Query($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTetanggaKabkotaRelatedByKodeWilayah1($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TetanggaKabkotaRelatedByKodeWilayah1', '\DataDikdas\Model\TetanggaKabkotaQuery');
    }

    /**
     * Filter the query by a related TetanggaKabkota object
     *
     * @param   TetanggaKabkota|PropelObjectCollection $tetanggaKabkota  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTetanggaKabkotaRelatedByKodeWilayah2($tetanggaKabkota, $comparison = null)
    {
        if ($tetanggaKabkota instanceof TetanggaKabkota) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $tetanggaKabkota->getKodeWilayah2(), $comparison);
        } elseif ($tetanggaKabkota instanceof PropelObjectCollection) {
            return $this
                ->useTetanggaKabkotaRelatedByKodeWilayah2Query()
                ->filterByPrimaryKeys($tetanggaKabkota->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTetanggaKabkotaRelatedByKodeWilayah2() only accepts arguments of type TetanggaKabkota or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TetanggaKabkotaRelatedByKodeWilayah2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinTetanggaKabkotaRelatedByKodeWilayah2($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TetanggaKabkotaRelatedByKodeWilayah2');

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
            $this->addJoinObject($join, 'TetanggaKabkotaRelatedByKodeWilayah2');
        }

        return $this;
    }

    /**
     * Use the TetanggaKabkotaRelatedByKodeWilayah2 relation TetanggaKabkota object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TetanggaKabkotaQuery A secondary query class using the current class as primary query
     */
    public function useTetanggaKabkotaRelatedByKodeWilayah2Query($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTetanggaKabkotaRelatedByKodeWilayah2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TetanggaKabkotaRelatedByKodeWilayah2', '\DataDikdas\Model\TetanggaKabkotaQuery');
    }

    /**
     * Filter the query by a related Yayasan object
     *
     * @param   Yayasan|PropelObjectCollection $yayasan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MstWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByYayasan($yayasan, $comparison = null)
    {
        if ($yayasan instanceof Yayasan) {
            return $this
                ->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $yayasan->getKodeWilayah(), $comparison);
        } elseif ($yayasan instanceof PropelObjectCollection) {
            return $this
                ->useYayasanQuery()
                ->filterByPrimaryKeys($yayasan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByYayasan() only accepts arguments of type Yayasan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Yayasan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function joinYayasan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Yayasan');

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
            $this->addJoinObject($join, 'Yayasan');
        }

        return $this;
    }

    /**
     * Use the Yayasan relation Yayasan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\YayasanQuery A secondary query class using the current class as primary query
     */
    public function useYayasanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinYayasan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Yayasan', '\DataDikdas\Model\YayasanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MstWilayah $mstWilayah Object to remove from the list of results
     *
     * @return MstWilayahQuery The current query, for fluid interface
     */
    public function prune($mstWilayah = null)
    {
        if ($mstWilayah) {
            $this->addUsingAlias(MstWilayahPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
