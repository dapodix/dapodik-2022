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
use DataDikdas\Model\Errortype;
use DataDikdas\Model\ErrortypePeer;
use DataDikdas\Model\ErrortypeQuery;
use DataDikdas\Model\VldAktPd;
use DataDikdas\Model\VldAlat;
use DataDikdas\Model\VldAnak;
use DataDikdas\Model\VldAngkutan;
use DataDikdas\Model\VldBangunan;
use DataDikdas\Model\VldBeaPd;
use DataDikdas\Model\VldBeaPtk;
use DataDikdas\Model\VldBukuPtk;
use DataDikdas\Model\VldDemografi;
use DataDikdas\Model\VldDudi;
use DataDikdas\Model\VldInpassing;
use DataDikdas\Model\VldJurusanSp;
use DataDikdas\Model\VldKaryaTulis;
use DataDikdas\Model\VldKesejahteraan;
use DataDikdas\Model\VldMou;
use DataDikdas\Model\VldNilaiRapor;
use DataDikdas\Model\VldNilaiTest;
use DataDikdas\Model\VldNonsekolah;
use DataDikdas\Model\VldPdLong;
use DataDikdas\Model\VldPembelajaran;
use DataDikdas\Model\VldPenghargaan;
use DataDikdas\Model\VldPesertaDidik;
use DataDikdas\Model\VldPrestasi;
use DataDikdas\Model\VldPtk;
use DataDikdas\Model\VldPtkTerdaftar;
use DataDikdas\Model\VldRegPd;
use DataDikdas\Model\VldRombel;
use DataDikdas\Model\VldRwyFungsional;
use DataDikdas\Model\VldRwyKepangkatan;
use DataDikdas\Model\VldRwyKerja;
use DataDikdas\Model\VldRwyPendFormal;
use DataDikdas\Model\VldRwySertifikasi;
use DataDikdas\Model\VldRwyStruktural;
use DataDikdas\Model\VldSekolah;
use DataDikdas\Model\VldTanah;
use DataDikdas\Model\VldTugasTambahan;
use DataDikdas\Model\VldTunjangan;
use DataDikdas\Model\VldUn;
use DataDikdas\Model\VldYayasan;

/**
 * Base class that represents a query for the 'ref.errortype' table.
 *
 * 
 *
 * @method ErrortypeQuery orderByIdtype($order = Criteria::ASC) Order by the idtype column
 * @method ErrortypeQuery orderByKategoriError($order = Criteria::ASC) Order by the kategori_error column
 * @method ErrortypeQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method ErrortypeQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method ErrortypeQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method ErrortypeQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method ErrortypeQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method ErrortypeQuery groupByIdtype() Group by the idtype column
 * @method ErrortypeQuery groupByKategoriError() Group by the kategori_error column
 * @method ErrortypeQuery groupByKeterangan() Group by the keterangan column
 * @method ErrortypeQuery groupByCreateDate() Group by the create_date column
 * @method ErrortypeQuery groupByLastUpdate() Group by the last_update column
 * @method ErrortypeQuery groupByExpiredDate() Group by the expired_date column
 * @method ErrortypeQuery groupByLastSync() Group by the last_sync column
 *
 * @method ErrortypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ErrortypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ErrortypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ErrortypeQuery leftJoinVldAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAktPd relation
 * @method ErrortypeQuery rightJoinVldAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAktPd relation
 * @method ErrortypeQuery innerJoinVldAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAktPd relation
 *
 * @method ErrortypeQuery leftJoinVldAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAlat relation
 * @method ErrortypeQuery rightJoinVldAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAlat relation
 * @method ErrortypeQuery innerJoinVldAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAlat relation
 *
 * @method ErrortypeQuery leftJoinVldAnak($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAnak relation
 * @method ErrortypeQuery rightJoinVldAnak($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAnak relation
 * @method ErrortypeQuery innerJoinVldAnak($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAnak relation
 *
 * @method ErrortypeQuery leftJoinVldAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAngkutan relation
 * @method ErrortypeQuery rightJoinVldAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAngkutan relation
 * @method ErrortypeQuery innerJoinVldAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAngkutan relation
 *
 * @method ErrortypeQuery leftJoinVldBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBangunan relation
 * @method ErrortypeQuery rightJoinVldBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBangunan relation
 * @method ErrortypeQuery innerJoinVldBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBangunan relation
 *
 * @method ErrortypeQuery leftJoinVldBeaPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBeaPd relation
 * @method ErrortypeQuery rightJoinVldBeaPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBeaPd relation
 * @method ErrortypeQuery innerJoinVldBeaPd($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBeaPd relation
 *
 * @method ErrortypeQuery leftJoinVldBeaPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBeaPtk relation
 * @method ErrortypeQuery rightJoinVldBeaPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBeaPtk relation
 * @method ErrortypeQuery innerJoinVldBeaPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBeaPtk relation
 *
 * @method ErrortypeQuery leftJoinVldBukuPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBukuPtk relation
 * @method ErrortypeQuery rightJoinVldBukuPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBukuPtk relation
 * @method ErrortypeQuery innerJoinVldBukuPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBukuPtk relation
 *
 * @method ErrortypeQuery leftJoinVldDemografi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldDemografi relation
 * @method ErrortypeQuery rightJoinVldDemografi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldDemografi relation
 * @method ErrortypeQuery innerJoinVldDemografi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldDemografi relation
 *
 * @method ErrortypeQuery leftJoinVldDudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldDudi relation
 * @method ErrortypeQuery rightJoinVldDudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldDudi relation
 * @method ErrortypeQuery innerJoinVldDudi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldDudi relation
 *
 * @method ErrortypeQuery leftJoinVldInpassing($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldInpassing relation
 * @method ErrortypeQuery rightJoinVldInpassing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldInpassing relation
 * @method ErrortypeQuery innerJoinVldInpassing($relationAlias = null) Adds a INNER JOIN clause to the query using the VldInpassing relation
 *
 * @method ErrortypeQuery leftJoinVldJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldJurusanSp relation
 * @method ErrortypeQuery rightJoinVldJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldJurusanSp relation
 * @method ErrortypeQuery innerJoinVldJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the VldJurusanSp relation
 *
 * @method ErrortypeQuery leftJoinVldKaryaTulis($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldKaryaTulis relation
 * @method ErrortypeQuery rightJoinVldKaryaTulis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldKaryaTulis relation
 * @method ErrortypeQuery innerJoinVldKaryaTulis($relationAlias = null) Adds a INNER JOIN clause to the query using the VldKaryaTulis relation
 *
 * @method ErrortypeQuery leftJoinVldKesejahteraan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldKesejahteraan relation
 * @method ErrortypeQuery rightJoinVldKesejahteraan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldKesejahteraan relation
 * @method ErrortypeQuery innerJoinVldKesejahteraan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldKesejahteraan relation
 *
 * @method ErrortypeQuery leftJoinVldMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldMou relation
 * @method ErrortypeQuery rightJoinVldMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldMou relation
 * @method ErrortypeQuery innerJoinVldMou($relationAlias = null) Adds a INNER JOIN clause to the query using the VldMou relation
 *
 * @method ErrortypeQuery leftJoinVldNilaiRapor($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldNilaiRapor relation
 * @method ErrortypeQuery rightJoinVldNilaiRapor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldNilaiRapor relation
 * @method ErrortypeQuery innerJoinVldNilaiRapor($relationAlias = null) Adds a INNER JOIN clause to the query using the VldNilaiRapor relation
 *
 * @method ErrortypeQuery leftJoinVldNilaiTest($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldNilaiTest relation
 * @method ErrortypeQuery rightJoinVldNilaiTest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldNilaiTest relation
 * @method ErrortypeQuery innerJoinVldNilaiTest($relationAlias = null) Adds a INNER JOIN clause to the query using the VldNilaiTest relation
 *
 * @method ErrortypeQuery leftJoinVldNonsekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldNonsekolah relation
 * @method ErrortypeQuery rightJoinVldNonsekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldNonsekolah relation
 * @method ErrortypeQuery innerJoinVldNonsekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the VldNonsekolah relation
 *
 * @method ErrortypeQuery leftJoinVldPdLong($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPdLong relation
 * @method ErrortypeQuery rightJoinVldPdLong($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPdLong relation
 * @method ErrortypeQuery innerJoinVldPdLong($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPdLong relation
 *
 * @method ErrortypeQuery leftJoinVldPembelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPembelajaran relation
 * @method ErrortypeQuery rightJoinVldPembelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPembelajaran relation
 * @method ErrortypeQuery innerJoinVldPembelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPembelajaran relation
 *
 * @method ErrortypeQuery leftJoinVldPenghargaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPenghargaan relation
 * @method ErrortypeQuery rightJoinVldPenghargaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPenghargaan relation
 * @method ErrortypeQuery innerJoinVldPenghargaan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPenghargaan relation
 *
 * @method ErrortypeQuery leftJoinVldPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPesertaDidik relation
 * @method ErrortypeQuery rightJoinVldPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPesertaDidik relation
 * @method ErrortypeQuery innerJoinVldPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPesertaDidik relation
 *
 * @method ErrortypeQuery leftJoinVldPrestasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPrestasi relation
 * @method ErrortypeQuery rightJoinVldPrestasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPrestasi relation
 * @method ErrortypeQuery innerJoinVldPrestasi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPrestasi relation
 *
 * @method ErrortypeQuery leftJoinVldPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPtk relation
 * @method ErrortypeQuery rightJoinVldPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPtk relation
 * @method ErrortypeQuery innerJoinVldPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPtk relation
 *
 * @method ErrortypeQuery leftJoinVldPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPtkTerdaftar relation
 * @method ErrortypeQuery rightJoinVldPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPtkTerdaftar relation
 * @method ErrortypeQuery innerJoinVldPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPtkTerdaftar relation
 *
 * @method ErrortypeQuery leftJoinVldRegPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRegPd relation
 * @method ErrortypeQuery rightJoinVldRegPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRegPd relation
 * @method ErrortypeQuery innerJoinVldRegPd($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRegPd relation
 *
 * @method ErrortypeQuery leftJoinVldRombel($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRombel relation
 * @method ErrortypeQuery rightJoinVldRombel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRombel relation
 * @method ErrortypeQuery innerJoinVldRombel($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRombel relation
 *
 * @method ErrortypeQuery leftJoinVldRwyFungsional($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyFungsional relation
 * @method ErrortypeQuery rightJoinVldRwyFungsional($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyFungsional relation
 * @method ErrortypeQuery innerJoinVldRwyFungsional($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyFungsional relation
 *
 * @method ErrortypeQuery leftJoinVldRwyKepangkatan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyKepangkatan relation
 * @method ErrortypeQuery rightJoinVldRwyKepangkatan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyKepangkatan relation
 * @method ErrortypeQuery innerJoinVldRwyKepangkatan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyKepangkatan relation
 *
 * @method ErrortypeQuery leftJoinVldRwyKerja($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyKerja relation
 * @method ErrortypeQuery rightJoinVldRwyKerja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyKerja relation
 * @method ErrortypeQuery innerJoinVldRwyKerja($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyKerja relation
 *
 * @method ErrortypeQuery leftJoinVldRwyPendFormal($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyPendFormal relation
 * @method ErrortypeQuery rightJoinVldRwyPendFormal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyPendFormal relation
 * @method ErrortypeQuery innerJoinVldRwyPendFormal($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyPendFormal relation
 *
 * @method ErrortypeQuery leftJoinVldRwySertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwySertifikasi relation
 * @method ErrortypeQuery rightJoinVldRwySertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwySertifikasi relation
 * @method ErrortypeQuery innerJoinVldRwySertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwySertifikasi relation
 *
 * @method ErrortypeQuery leftJoinVldRwyStruktural($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyStruktural relation
 * @method ErrortypeQuery rightJoinVldRwyStruktural($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyStruktural relation
 * @method ErrortypeQuery innerJoinVldRwyStruktural($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyStruktural relation
 *
 * @method ErrortypeQuery leftJoinVldSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldSekolah relation
 * @method ErrortypeQuery rightJoinVldSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldSekolah relation
 * @method ErrortypeQuery innerJoinVldSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the VldSekolah relation
 *
 * @method ErrortypeQuery leftJoinVldTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldTanah relation
 * @method ErrortypeQuery rightJoinVldTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldTanah relation
 * @method ErrortypeQuery innerJoinVldTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the VldTanah relation
 *
 * @method ErrortypeQuery leftJoinVldTugasTambahan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldTugasTambahan relation
 * @method ErrortypeQuery rightJoinVldTugasTambahan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldTugasTambahan relation
 * @method ErrortypeQuery innerJoinVldTugasTambahan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldTugasTambahan relation
 *
 * @method ErrortypeQuery leftJoinVldTunjangan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldTunjangan relation
 * @method ErrortypeQuery rightJoinVldTunjangan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldTunjangan relation
 * @method ErrortypeQuery innerJoinVldTunjangan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldTunjangan relation
 *
 * @method ErrortypeQuery leftJoinVldUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldUn relation
 * @method ErrortypeQuery rightJoinVldUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldUn relation
 * @method ErrortypeQuery innerJoinVldUn($relationAlias = null) Adds a INNER JOIN clause to the query using the VldUn relation
 *
 * @method ErrortypeQuery leftJoinVldYayasan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldYayasan relation
 * @method ErrortypeQuery rightJoinVldYayasan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldYayasan relation
 * @method ErrortypeQuery innerJoinVldYayasan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldYayasan relation
 *
 * @method Errortype findOne(PropelPDO $con = null) Return the first Errortype matching the query
 * @method Errortype findOneOrCreate(PropelPDO $con = null) Return the first Errortype matching the query, or a new Errortype object populated from the query conditions when no match is found
 *
 * @method Errortype findOneByKategoriError(int $kategori_error) Return the first Errortype filtered by the kategori_error column
 * @method Errortype findOneByKeterangan(string $keterangan) Return the first Errortype filtered by the keterangan column
 * @method Errortype findOneByCreateDate(string $create_date) Return the first Errortype filtered by the create_date column
 * @method Errortype findOneByLastUpdate(string $last_update) Return the first Errortype filtered by the last_update column
 * @method Errortype findOneByExpiredDate(string $expired_date) Return the first Errortype filtered by the expired_date column
 * @method Errortype findOneByLastSync(string $last_sync) Return the first Errortype filtered by the last_sync column
 *
 * @method array findByIdtype(int $idtype) Return Errortype objects filtered by the idtype column
 * @method array findByKategoriError(int $kategori_error) Return Errortype objects filtered by the kategori_error column
 * @method array findByKeterangan(string $keterangan) Return Errortype objects filtered by the keterangan column
 * @method array findByCreateDate(string $create_date) Return Errortype objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Errortype objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Errortype objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Errortype objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseErrortypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseErrortypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Errortype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ErrortypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ErrortypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ErrortypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ErrortypeQuery) {
            return $criteria;
        }
        $query = new ErrortypeQuery();
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
     * @return   Errortype|Errortype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ErrortypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ErrortypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Errortype A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdtype($key, $con = null)
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
     * @return                 Errortype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "idtype", "kategori_error", "keterangan", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."errortype" WHERE "idtype" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Errortype();
            $obj->hydrate($row);
            ErrortypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Errortype|Errortype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Errortype[]|mixed the list of results, formatted by the current formatter
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
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ErrortypePeer::IDTYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ErrortypePeer::IDTYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idtype column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtype(1234); // WHERE idtype = 1234
     * $query->filterByIdtype(array(12, 34)); // WHERE idtype IN (12, 34)
     * $query->filterByIdtype(array('min' => 12)); // WHERE idtype >= 12
     * $query->filterByIdtype(array('max' => 12)); // WHERE idtype <= 12
     * </code>
     *
     * @param     mixed $idtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByIdtype($idtype = null, $comparison = null)
    {
        if (is_array($idtype)) {
            $useMinMax = false;
            if (isset($idtype['min'])) {
                $this->addUsingAlias(ErrortypePeer::IDTYPE, $idtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtype['max'])) {
                $this->addUsingAlias(ErrortypePeer::IDTYPE, $idtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErrortypePeer::IDTYPE, $idtype, $comparison);
    }

    /**
     * Filter the query on the kategori_error column
     *
     * Example usage:
     * <code>
     * $query->filterByKategoriError(1234); // WHERE kategori_error = 1234
     * $query->filterByKategoriError(array(12, 34)); // WHERE kategori_error IN (12, 34)
     * $query->filterByKategoriError(array('min' => 12)); // WHERE kategori_error >= 12
     * $query->filterByKategoriError(array('max' => 12)); // WHERE kategori_error <= 12
     * </code>
     *
     * @param     mixed $kategoriError The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByKategoriError($kategoriError = null, $comparison = null)
    {
        if (is_array($kategoriError)) {
            $useMinMax = false;
            if (isset($kategoriError['min'])) {
                $this->addUsingAlias(ErrortypePeer::KATEGORI_ERROR, $kategoriError['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kategoriError['max'])) {
                $this->addUsingAlias(ErrortypePeer::KATEGORI_ERROR, $kategoriError['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErrortypePeer::KATEGORI_ERROR, $kategoriError, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%'); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keterangan)) {
                $keterangan = str_replace('*', '%', $keterangan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ErrortypePeer::KETERANGAN, $keterangan, $comparison);
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
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(ErrortypePeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(ErrortypePeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErrortypePeer::CREATE_DATE, $createDate, $comparison);
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
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(ErrortypePeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(ErrortypePeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErrortypePeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(ErrortypePeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(ErrortypePeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErrortypePeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(ErrortypePeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(ErrortypePeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ErrortypePeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related VldAktPd object
     *
     * @param   VldAktPd|PropelObjectCollection $vldAktPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAktPd($vldAktPd, $comparison = null)
    {
        if ($vldAktPd instanceof VldAktPd) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldAktPd->getIdtype(), $comparison);
        } elseif ($vldAktPd instanceof PropelObjectCollection) {
            return $this
                ->useVldAktPdQuery()
                ->filterByPrimaryKeys($vldAktPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldAktPd() only accepts arguments of type VldAktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldAktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldAktPd');

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
            $this->addJoinObject($join, 'VldAktPd');
        }

        return $this;
    }

    /**
     * Use the VldAktPd relation VldAktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldAktPdQuery A secondary query class using the current class as primary query
     */
    public function useVldAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldAktPd', '\DataDikdas\Model\VldAktPdQuery');
    }

    /**
     * Filter the query by a related VldAlat object
     *
     * @param   VldAlat|PropelObjectCollection $vldAlat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAlat($vldAlat, $comparison = null)
    {
        if ($vldAlat instanceof VldAlat) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldAlat->getIdtype(), $comparison);
        } elseif ($vldAlat instanceof PropelObjectCollection) {
            return $this
                ->useVldAlatQuery()
                ->filterByPrimaryKeys($vldAlat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldAlat() only accepts arguments of type VldAlat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldAlat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldAlat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldAlat');

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
            $this->addJoinObject($join, 'VldAlat');
        }

        return $this;
    }

    /**
     * Use the VldAlat relation VldAlat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldAlatQuery A secondary query class using the current class as primary query
     */
    public function useVldAlatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldAlat', '\DataDikdas\Model\VldAlatQuery');
    }

    /**
     * Filter the query by a related VldAnak object
     *
     * @param   VldAnak|PropelObjectCollection $vldAnak  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAnak($vldAnak, $comparison = null)
    {
        if ($vldAnak instanceof VldAnak) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldAnak->getIdtype(), $comparison);
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
     * @return ErrortypeQuery The current query, for fluid interface
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
     * Filter the query by a related VldAngkutan object
     *
     * @param   VldAngkutan|PropelObjectCollection $vldAngkutan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAngkutan($vldAngkutan, $comparison = null)
    {
        if ($vldAngkutan instanceof VldAngkutan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldAngkutan->getIdtype(), $comparison);
        } elseif ($vldAngkutan instanceof PropelObjectCollection) {
            return $this
                ->useVldAngkutanQuery()
                ->filterByPrimaryKeys($vldAngkutan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldAngkutan() only accepts arguments of type VldAngkutan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldAngkutan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldAngkutan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldAngkutan');

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
            $this->addJoinObject($join, 'VldAngkutan');
        }

        return $this;
    }

    /**
     * Use the VldAngkutan relation VldAngkutan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldAngkutanQuery A secondary query class using the current class as primary query
     */
    public function useVldAngkutanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldAngkutan', '\DataDikdas\Model\VldAngkutanQuery');
    }

    /**
     * Filter the query by a related VldBangunan object
     *
     * @param   VldBangunan|PropelObjectCollection $vldBangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBangunan($vldBangunan, $comparison = null)
    {
        if ($vldBangunan instanceof VldBangunan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldBangunan->getIdtype(), $comparison);
        } elseif ($vldBangunan instanceof PropelObjectCollection) {
            return $this
                ->useVldBangunanQuery()
                ->filterByPrimaryKeys($vldBangunan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBangunan() only accepts arguments of type VldBangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldBangunan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBangunan');

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
            $this->addJoinObject($join, 'VldBangunan');
        }

        return $this;
    }

    /**
     * Use the VldBangunan relation VldBangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBangunanQuery A secondary query class using the current class as primary query
     */
    public function useVldBangunanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBangunan', '\DataDikdas\Model\VldBangunanQuery');
    }

    /**
     * Filter the query by a related VldBeaPd object
     *
     * @param   VldBeaPd|PropelObjectCollection $vldBeaPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBeaPd($vldBeaPd, $comparison = null)
    {
        if ($vldBeaPd instanceof VldBeaPd) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldBeaPd->getIdtype(), $comparison);
        } elseif ($vldBeaPd instanceof PropelObjectCollection) {
            return $this
                ->useVldBeaPdQuery()
                ->filterByPrimaryKeys($vldBeaPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBeaPd() only accepts arguments of type VldBeaPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBeaPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldBeaPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBeaPd');

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
            $this->addJoinObject($join, 'VldBeaPd');
        }

        return $this;
    }

    /**
     * Use the VldBeaPd relation VldBeaPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBeaPdQuery A secondary query class using the current class as primary query
     */
    public function useVldBeaPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBeaPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBeaPd', '\DataDikdas\Model\VldBeaPdQuery');
    }

    /**
     * Filter the query by a related VldBeaPtk object
     *
     * @param   VldBeaPtk|PropelObjectCollection $vldBeaPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBeaPtk($vldBeaPtk, $comparison = null)
    {
        if ($vldBeaPtk instanceof VldBeaPtk) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldBeaPtk->getIdtype(), $comparison);
        } elseif ($vldBeaPtk instanceof PropelObjectCollection) {
            return $this
                ->useVldBeaPtkQuery()
                ->filterByPrimaryKeys($vldBeaPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBeaPtk() only accepts arguments of type VldBeaPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBeaPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldBeaPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBeaPtk');

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
            $this->addJoinObject($join, 'VldBeaPtk');
        }

        return $this;
    }

    /**
     * Use the VldBeaPtk relation VldBeaPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBeaPtkQuery A secondary query class using the current class as primary query
     */
    public function useVldBeaPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBeaPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBeaPtk', '\DataDikdas\Model\VldBeaPtkQuery');
    }

    /**
     * Filter the query by a related VldBukuPtk object
     *
     * @param   VldBukuPtk|PropelObjectCollection $vldBukuPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBukuPtk($vldBukuPtk, $comparison = null)
    {
        if ($vldBukuPtk instanceof VldBukuPtk) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldBukuPtk->getIdtype(), $comparison);
        } elseif ($vldBukuPtk instanceof PropelObjectCollection) {
            return $this
                ->useVldBukuPtkQuery()
                ->filterByPrimaryKeys($vldBukuPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBukuPtk() only accepts arguments of type VldBukuPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBukuPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldBukuPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBukuPtk');

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
            $this->addJoinObject($join, 'VldBukuPtk');
        }

        return $this;
    }

    /**
     * Use the VldBukuPtk relation VldBukuPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBukuPtkQuery A secondary query class using the current class as primary query
     */
    public function useVldBukuPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBukuPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBukuPtk', '\DataDikdas\Model\VldBukuPtkQuery');
    }

    /**
     * Filter the query by a related VldDemografi object
     *
     * @param   VldDemografi|PropelObjectCollection $vldDemografi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldDemografi($vldDemografi, $comparison = null)
    {
        if ($vldDemografi instanceof VldDemografi) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldDemografi->getIdtype(), $comparison);
        } elseif ($vldDemografi instanceof PropelObjectCollection) {
            return $this
                ->useVldDemografiQuery()
                ->filterByPrimaryKeys($vldDemografi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldDemografi() only accepts arguments of type VldDemografi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldDemografi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldDemografi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldDemografi');

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
            $this->addJoinObject($join, 'VldDemografi');
        }

        return $this;
    }

    /**
     * Use the VldDemografi relation VldDemografi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldDemografiQuery A secondary query class using the current class as primary query
     */
    public function useVldDemografiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldDemografi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldDemografi', '\DataDikdas\Model\VldDemografiQuery');
    }

    /**
     * Filter the query by a related VldDudi object
     *
     * @param   VldDudi|PropelObjectCollection $vldDudi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldDudi($vldDudi, $comparison = null)
    {
        if ($vldDudi instanceof VldDudi) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldDudi->getIdtype(), $comparison);
        } elseif ($vldDudi instanceof PropelObjectCollection) {
            return $this
                ->useVldDudiQuery()
                ->filterByPrimaryKeys($vldDudi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldDudi() only accepts arguments of type VldDudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldDudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldDudi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldDudi');

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
            $this->addJoinObject($join, 'VldDudi');
        }

        return $this;
    }

    /**
     * Use the VldDudi relation VldDudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldDudiQuery A secondary query class using the current class as primary query
     */
    public function useVldDudiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldDudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldDudi', '\DataDikdas\Model\VldDudiQuery');
    }

    /**
     * Filter the query by a related VldInpassing object
     *
     * @param   VldInpassing|PropelObjectCollection $vldInpassing  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldInpassing($vldInpassing, $comparison = null)
    {
        if ($vldInpassing instanceof VldInpassing) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldInpassing->getIdtype(), $comparison);
        } elseif ($vldInpassing instanceof PropelObjectCollection) {
            return $this
                ->useVldInpassingQuery()
                ->filterByPrimaryKeys($vldInpassing->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldInpassing() only accepts arguments of type VldInpassing or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldInpassing relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldInpassing($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldInpassing');

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
            $this->addJoinObject($join, 'VldInpassing');
        }

        return $this;
    }

    /**
     * Use the VldInpassing relation VldInpassing object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldInpassingQuery A secondary query class using the current class as primary query
     */
    public function useVldInpassingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldInpassing($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldInpassing', '\DataDikdas\Model\VldInpassingQuery');
    }

    /**
     * Filter the query by a related VldJurusanSp object
     *
     * @param   VldJurusanSp|PropelObjectCollection $vldJurusanSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldJurusanSp($vldJurusanSp, $comparison = null)
    {
        if ($vldJurusanSp instanceof VldJurusanSp) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldJurusanSp->getIdtype(), $comparison);
        } elseif ($vldJurusanSp instanceof PropelObjectCollection) {
            return $this
                ->useVldJurusanSpQuery()
                ->filterByPrimaryKeys($vldJurusanSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldJurusanSp() only accepts arguments of type VldJurusanSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldJurusanSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldJurusanSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldJurusanSp');

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
            $this->addJoinObject($join, 'VldJurusanSp');
        }

        return $this;
    }

    /**
     * Use the VldJurusanSp relation VldJurusanSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldJurusanSpQuery A secondary query class using the current class as primary query
     */
    public function useVldJurusanSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldJurusanSp', '\DataDikdas\Model\VldJurusanSpQuery');
    }

    /**
     * Filter the query by a related VldKaryaTulis object
     *
     * @param   VldKaryaTulis|PropelObjectCollection $vldKaryaTulis  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldKaryaTulis($vldKaryaTulis, $comparison = null)
    {
        if ($vldKaryaTulis instanceof VldKaryaTulis) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldKaryaTulis->getIdtype(), $comparison);
        } elseif ($vldKaryaTulis instanceof PropelObjectCollection) {
            return $this
                ->useVldKaryaTulisQuery()
                ->filterByPrimaryKeys($vldKaryaTulis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldKaryaTulis() only accepts arguments of type VldKaryaTulis or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldKaryaTulis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldKaryaTulis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldKaryaTulis');

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
            $this->addJoinObject($join, 'VldKaryaTulis');
        }

        return $this;
    }

    /**
     * Use the VldKaryaTulis relation VldKaryaTulis object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldKaryaTulisQuery A secondary query class using the current class as primary query
     */
    public function useVldKaryaTulisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldKaryaTulis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldKaryaTulis', '\DataDikdas\Model\VldKaryaTulisQuery');
    }

    /**
     * Filter the query by a related VldKesejahteraan object
     *
     * @param   VldKesejahteraan|PropelObjectCollection $vldKesejahteraan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldKesejahteraan($vldKesejahteraan, $comparison = null)
    {
        if ($vldKesejahteraan instanceof VldKesejahteraan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldKesejahteraan->getIdtype(), $comparison);
        } elseif ($vldKesejahteraan instanceof PropelObjectCollection) {
            return $this
                ->useVldKesejahteraanQuery()
                ->filterByPrimaryKeys($vldKesejahteraan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldKesejahteraan() only accepts arguments of type VldKesejahteraan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldKesejahteraan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldKesejahteraan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldKesejahteraan');

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
            $this->addJoinObject($join, 'VldKesejahteraan');
        }

        return $this;
    }

    /**
     * Use the VldKesejahteraan relation VldKesejahteraan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldKesejahteraanQuery A secondary query class using the current class as primary query
     */
    public function useVldKesejahteraanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldKesejahteraan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldKesejahteraan', '\DataDikdas\Model\VldKesejahteraanQuery');
    }

    /**
     * Filter the query by a related VldMou object
     *
     * @param   VldMou|PropelObjectCollection $vldMou  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldMou($vldMou, $comparison = null)
    {
        if ($vldMou instanceof VldMou) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldMou->getIdtype(), $comparison);
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
     * @return ErrortypeQuery The current query, for fluid interface
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
     * Filter the query by a related VldNilaiRapor object
     *
     * @param   VldNilaiRapor|PropelObjectCollection $vldNilaiRapor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldNilaiRapor($vldNilaiRapor, $comparison = null)
    {
        if ($vldNilaiRapor instanceof VldNilaiRapor) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldNilaiRapor->getIdtype(), $comparison);
        } elseif ($vldNilaiRapor instanceof PropelObjectCollection) {
            return $this
                ->useVldNilaiRaporQuery()
                ->filterByPrimaryKeys($vldNilaiRapor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldNilaiRapor() only accepts arguments of type VldNilaiRapor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldNilaiRapor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldNilaiRapor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldNilaiRapor');

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
            $this->addJoinObject($join, 'VldNilaiRapor');
        }

        return $this;
    }

    /**
     * Use the VldNilaiRapor relation VldNilaiRapor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldNilaiRaporQuery A secondary query class using the current class as primary query
     */
    public function useVldNilaiRaporQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldNilaiRapor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldNilaiRapor', '\DataDikdas\Model\VldNilaiRaporQuery');
    }

    /**
     * Filter the query by a related VldNilaiTest object
     *
     * @param   VldNilaiTest|PropelObjectCollection $vldNilaiTest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldNilaiTest($vldNilaiTest, $comparison = null)
    {
        if ($vldNilaiTest instanceof VldNilaiTest) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldNilaiTest->getIdtype(), $comparison);
        } elseif ($vldNilaiTest instanceof PropelObjectCollection) {
            return $this
                ->useVldNilaiTestQuery()
                ->filterByPrimaryKeys($vldNilaiTest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldNilaiTest() only accepts arguments of type VldNilaiTest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldNilaiTest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldNilaiTest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldNilaiTest');

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
            $this->addJoinObject($join, 'VldNilaiTest');
        }

        return $this;
    }

    /**
     * Use the VldNilaiTest relation VldNilaiTest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldNilaiTestQuery A secondary query class using the current class as primary query
     */
    public function useVldNilaiTestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldNilaiTest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldNilaiTest', '\DataDikdas\Model\VldNilaiTestQuery');
    }

    /**
     * Filter the query by a related VldNonsekolah object
     *
     * @param   VldNonsekolah|PropelObjectCollection $vldNonsekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldNonsekolah($vldNonsekolah, $comparison = null)
    {
        if ($vldNonsekolah instanceof VldNonsekolah) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldNonsekolah->getIdtype(), $comparison);
        } elseif ($vldNonsekolah instanceof PropelObjectCollection) {
            return $this
                ->useVldNonsekolahQuery()
                ->filterByPrimaryKeys($vldNonsekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldNonsekolah() only accepts arguments of type VldNonsekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldNonsekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldNonsekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldNonsekolah');

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
            $this->addJoinObject($join, 'VldNonsekolah');
        }

        return $this;
    }

    /**
     * Use the VldNonsekolah relation VldNonsekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldNonsekolahQuery A secondary query class using the current class as primary query
     */
    public function useVldNonsekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldNonsekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldNonsekolah', '\DataDikdas\Model\VldNonsekolahQuery');
    }

    /**
     * Filter the query by a related VldPdLong object
     *
     * @param   VldPdLong|PropelObjectCollection $vldPdLong  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPdLong($vldPdLong, $comparison = null)
    {
        if ($vldPdLong instanceof VldPdLong) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldPdLong->getIdtype(), $comparison);
        } elseif ($vldPdLong instanceof PropelObjectCollection) {
            return $this
                ->useVldPdLongQuery()
                ->filterByPrimaryKeys($vldPdLong->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPdLong() only accepts arguments of type VldPdLong or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPdLong relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldPdLong($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPdLong');

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
            $this->addJoinObject($join, 'VldPdLong');
        }

        return $this;
    }

    /**
     * Use the VldPdLong relation VldPdLong object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPdLongQuery A secondary query class using the current class as primary query
     */
    public function useVldPdLongQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPdLong($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPdLong', '\DataDikdas\Model\VldPdLongQuery');
    }

    /**
     * Filter the query by a related VldPembelajaran object
     *
     * @param   VldPembelajaran|PropelObjectCollection $vldPembelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPembelajaran($vldPembelajaran, $comparison = null)
    {
        if ($vldPembelajaran instanceof VldPembelajaran) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldPembelajaran->getIdtype(), $comparison);
        } elseif ($vldPembelajaran instanceof PropelObjectCollection) {
            return $this
                ->useVldPembelajaranQuery()
                ->filterByPrimaryKeys($vldPembelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPembelajaran() only accepts arguments of type VldPembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPembelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldPembelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPembelajaran');

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
            $this->addJoinObject($join, 'VldPembelajaran');
        }

        return $this;
    }

    /**
     * Use the VldPembelajaran relation VldPembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPembelajaranQuery A secondary query class using the current class as primary query
     */
    public function useVldPembelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPembelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPembelajaran', '\DataDikdas\Model\VldPembelajaranQuery');
    }

    /**
     * Filter the query by a related VldPenghargaan object
     *
     * @param   VldPenghargaan|PropelObjectCollection $vldPenghargaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPenghargaan($vldPenghargaan, $comparison = null)
    {
        if ($vldPenghargaan instanceof VldPenghargaan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldPenghargaan->getIdtype(), $comparison);
        } elseif ($vldPenghargaan instanceof PropelObjectCollection) {
            return $this
                ->useVldPenghargaanQuery()
                ->filterByPrimaryKeys($vldPenghargaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPenghargaan() only accepts arguments of type VldPenghargaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPenghargaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldPenghargaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPenghargaan');

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
            $this->addJoinObject($join, 'VldPenghargaan');
        }

        return $this;
    }

    /**
     * Use the VldPenghargaan relation VldPenghargaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPenghargaanQuery A secondary query class using the current class as primary query
     */
    public function useVldPenghargaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPenghargaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPenghargaan', '\DataDikdas\Model\VldPenghargaanQuery');
    }

    /**
     * Filter the query by a related VldPesertaDidik object
     *
     * @param   VldPesertaDidik|PropelObjectCollection $vldPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPesertaDidik($vldPesertaDidik, $comparison = null)
    {
        if ($vldPesertaDidik instanceof VldPesertaDidik) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldPesertaDidik->getIdtype(), $comparison);
        } elseif ($vldPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useVldPesertaDidikQuery()
                ->filterByPrimaryKeys($vldPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPesertaDidik() only accepts arguments of type VldPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPesertaDidik');

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
            $this->addJoinObject($join, 'VldPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the VldPesertaDidik relation VldPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useVldPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPesertaDidik', '\DataDikdas\Model\VldPesertaDidikQuery');
    }

    /**
     * Filter the query by a related VldPrestasi object
     *
     * @param   VldPrestasi|PropelObjectCollection $vldPrestasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPrestasi($vldPrestasi, $comparison = null)
    {
        if ($vldPrestasi instanceof VldPrestasi) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldPrestasi->getIdtype(), $comparison);
        } elseif ($vldPrestasi instanceof PropelObjectCollection) {
            return $this
                ->useVldPrestasiQuery()
                ->filterByPrimaryKeys($vldPrestasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPrestasi() only accepts arguments of type VldPrestasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPrestasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldPrestasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPrestasi');

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
            $this->addJoinObject($join, 'VldPrestasi');
        }

        return $this;
    }

    /**
     * Use the VldPrestasi relation VldPrestasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPrestasiQuery A secondary query class using the current class as primary query
     */
    public function useVldPrestasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPrestasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPrestasi', '\DataDikdas\Model\VldPrestasiQuery');
    }

    /**
     * Filter the query by a related VldPtk object
     *
     * @param   VldPtk|PropelObjectCollection $vldPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPtk($vldPtk, $comparison = null)
    {
        if ($vldPtk instanceof VldPtk) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldPtk->getIdtype(), $comparison);
        } elseif ($vldPtk instanceof PropelObjectCollection) {
            return $this
                ->useVldPtkQuery()
                ->filterByPrimaryKeys($vldPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPtk() only accepts arguments of type VldPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPtk');

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
            $this->addJoinObject($join, 'VldPtk');
        }

        return $this;
    }

    /**
     * Use the VldPtk relation VldPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPtkQuery A secondary query class using the current class as primary query
     */
    public function useVldPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPtk', '\DataDikdas\Model\VldPtkQuery');
    }

    /**
     * Filter the query by a related VldPtkTerdaftar object
     *
     * @param   VldPtkTerdaftar|PropelObjectCollection $vldPtkTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPtkTerdaftar($vldPtkTerdaftar, $comparison = null)
    {
        if ($vldPtkTerdaftar instanceof VldPtkTerdaftar) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldPtkTerdaftar->getIdtype(), $comparison);
        } elseif ($vldPtkTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->useVldPtkTerdaftarQuery()
                ->filterByPrimaryKeys($vldPtkTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPtkTerdaftar() only accepts arguments of type VldPtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldPtkTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPtkTerdaftar');

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
            $this->addJoinObject($join, 'VldPtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the VldPtkTerdaftar relation VldPtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function useVldPtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPtkTerdaftar', '\DataDikdas\Model\VldPtkTerdaftarQuery');
    }

    /**
     * Filter the query by a related VldRegPd object
     *
     * @param   VldRegPd|PropelObjectCollection $vldRegPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRegPd($vldRegPd, $comparison = null)
    {
        if ($vldRegPd instanceof VldRegPd) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRegPd->getIdtype(), $comparison);
        } elseif ($vldRegPd instanceof PropelObjectCollection) {
            return $this
                ->useVldRegPdQuery()
                ->filterByPrimaryKeys($vldRegPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRegPd() only accepts arguments of type VldRegPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRegPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRegPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRegPd');

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
            $this->addJoinObject($join, 'VldRegPd');
        }

        return $this;
    }

    /**
     * Use the VldRegPd relation VldRegPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRegPdQuery A secondary query class using the current class as primary query
     */
    public function useVldRegPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRegPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRegPd', '\DataDikdas\Model\VldRegPdQuery');
    }

    /**
     * Filter the query by a related VldRombel object
     *
     * @param   VldRombel|PropelObjectCollection $vldRombel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRombel($vldRombel, $comparison = null)
    {
        if ($vldRombel instanceof VldRombel) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRombel->getIdtype(), $comparison);
        } elseif ($vldRombel instanceof PropelObjectCollection) {
            return $this
                ->useVldRombelQuery()
                ->filterByPrimaryKeys($vldRombel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRombel() only accepts arguments of type VldRombel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRombel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRombel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRombel');

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
            $this->addJoinObject($join, 'VldRombel');
        }

        return $this;
    }

    /**
     * Use the VldRombel relation VldRombel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRombelQuery A secondary query class using the current class as primary query
     */
    public function useVldRombelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRombel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRombel', '\DataDikdas\Model\VldRombelQuery');
    }

    /**
     * Filter the query by a related VldRwyFungsional object
     *
     * @param   VldRwyFungsional|PropelObjectCollection $vldRwyFungsional  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyFungsional($vldRwyFungsional, $comparison = null)
    {
        if ($vldRwyFungsional instanceof VldRwyFungsional) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRwyFungsional->getIdtype(), $comparison);
        } elseif ($vldRwyFungsional instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyFungsionalQuery()
                ->filterByPrimaryKeys($vldRwyFungsional->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyFungsional() only accepts arguments of type VldRwyFungsional or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyFungsional relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRwyFungsional($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyFungsional');

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
            $this->addJoinObject($join, 'VldRwyFungsional');
        }

        return $this;
    }

    /**
     * Use the VldRwyFungsional relation VldRwyFungsional object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyFungsionalQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyFungsionalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyFungsional($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyFungsional', '\DataDikdas\Model\VldRwyFungsionalQuery');
    }

    /**
     * Filter the query by a related VldRwyKepangkatan object
     *
     * @param   VldRwyKepangkatan|PropelObjectCollection $vldRwyKepangkatan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyKepangkatan($vldRwyKepangkatan, $comparison = null)
    {
        if ($vldRwyKepangkatan instanceof VldRwyKepangkatan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRwyKepangkatan->getIdtype(), $comparison);
        } elseif ($vldRwyKepangkatan instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyKepangkatanQuery()
                ->filterByPrimaryKeys($vldRwyKepangkatan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyKepangkatan() only accepts arguments of type VldRwyKepangkatan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyKepangkatan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRwyKepangkatan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyKepangkatan');

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
            $this->addJoinObject($join, 'VldRwyKepangkatan');
        }

        return $this;
    }

    /**
     * Use the VldRwyKepangkatan relation VldRwyKepangkatan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyKepangkatanQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyKepangkatanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyKepangkatan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyKepangkatan', '\DataDikdas\Model\VldRwyKepangkatanQuery');
    }

    /**
     * Filter the query by a related VldRwyKerja object
     *
     * @param   VldRwyKerja|PropelObjectCollection $vldRwyKerja  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyKerja($vldRwyKerja, $comparison = null)
    {
        if ($vldRwyKerja instanceof VldRwyKerja) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRwyKerja->getIdtype(), $comparison);
        } elseif ($vldRwyKerja instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyKerjaQuery()
                ->filterByPrimaryKeys($vldRwyKerja->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyKerja() only accepts arguments of type VldRwyKerja or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyKerja relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRwyKerja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyKerja');

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
            $this->addJoinObject($join, 'VldRwyKerja');
        }

        return $this;
    }

    /**
     * Use the VldRwyKerja relation VldRwyKerja object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyKerjaQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyKerjaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyKerja($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyKerja', '\DataDikdas\Model\VldRwyKerjaQuery');
    }

    /**
     * Filter the query by a related VldRwyPendFormal object
     *
     * @param   VldRwyPendFormal|PropelObjectCollection $vldRwyPendFormal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyPendFormal($vldRwyPendFormal, $comparison = null)
    {
        if ($vldRwyPendFormal instanceof VldRwyPendFormal) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRwyPendFormal->getIdtype(), $comparison);
        } elseif ($vldRwyPendFormal instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyPendFormalQuery()
                ->filterByPrimaryKeys($vldRwyPendFormal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyPendFormal() only accepts arguments of type VldRwyPendFormal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyPendFormal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRwyPendFormal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyPendFormal');

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
            $this->addJoinObject($join, 'VldRwyPendFormal');
        }

        return $this;
    }

    /**
     * Use the VldRwyPendFormal relation VldRwyPendFormal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyPendFormalQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyPendFormalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyPendFormal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyPendFormal', '\DataDikdas\Model\VldRwyPendFormalQuery');
    }

    /**
     * Filter the query by a related VldRwySertifikasi object
     *
     * @param   VldRwySertifikasi|PropelObjectCollection $vldRwySertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwySertifikasi($vldRwySertifikasi, $comparison = null)
    {
        if ($vldRwySertifikasi instanceof VldRwySertifikasi) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRwySertifikasi->getIdtype(), $comparison);
        } elseif ($vldRwySertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useVldRwySertifikasiQuery()
                ->filterByPrimaryKeys($vldRwySertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwySertifikasi() only accepts arguments of type VldRwySertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwySertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRwySertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwySertifikasi');

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
            $this->addJoinObject($join, 'VldRwySertifikasi');
        }

        return $this;
    }

    /**
     * Use the VldRwySertifikasi relation VldRwySertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwySertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useVldRwySertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwySertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwySertifikasi', '\DataDikdas\Model\VldRwySertifikasiQuery');
    }

    /**
     * Filter the query by a related VldRwyStruktural object
     *
     * @param   VldRwyStruktural|PropelObjectCollection $vldRwyStruktural  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyStruktural($vldRwyStruktural, $comparison = null)
    {
        if ($vldRwyStruktural instanceof VldRwyStruktural) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldRwyStruktural->getIdtype(), $comparison);
        } elseif ($vldRwyStruktural instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyStrukturalQuery()
                ->filterByPrimaryKeys($vldRwyStruktural->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyStruktural() only accepts arguments of type VldRwyStruktural or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyStruktural relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldRwyStruktural($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyStruktural');

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
            $this->addJoinObject($join, 'VldRwyStruktural');
        }

        return $this;
    }

    /**
     * Use the VldRwyStruktural relation VldRwyStruktural object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyStrukturalQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyStrukturalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyStruktural($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyStruktural', '\DataDikdas\Model\VldRwyStrukturalQuery');
    }

    /**
     * Filter the query by a related VldSekolah object
     *
     * @param   VldSekolah|PropelObjectCollection $vldSekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldSekolah($vldSekolah, $comparison = null)
    {
        if ($vldSekolah instanceof VldSekolah) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldSekolah->getIdtype(), $comparison);
        } elseif ($vldSekolah instanceof PropelObjectCollection) {
            return $this
                ->useVldSekolahQuery()
                ->filterByPrimaryKeys($vldSekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldSekolah() only accepts arguments of type VldSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldSekolah');

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
            $this->addJoinObject($join, 'VldSekolah');
        }

        return $this;
    }

    /**
     * Use the VldSekolah relation VldSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldSekolahQuery A secondary query class using the current class as primary query
     */
    public function useVldSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldSekolah', '\DataDikdas\Model\VldSekolahQuery');
    }

    /**
     * Filter the query by a related VldTanah object
     *
     * @param   VldTanah|PropelObjectCollection $vldTanah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldTanah($vldTanah, $comparison = null)
    {
        if ($vldTanah instanceof VldTanah) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldTanah->getIdtype(), $comparison);
        } elseif ($vldTanah instanceof PropelObjectCollection) {
            return $this
                ->useVldTanahQuery()
                ->filterByPrimaryKeys($vldTanah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldTanah() only accepts arguments of type VldTanah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldTanah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldTanah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldTanah');

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
            $this->addJoinObject($join, 'VldTanah');
        }

        return $this;
    }

    /**
     * Use the VldTanah relation VldTanah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldTanahQuery A secondary query class using the current class as primary query
     */
    public function useVldTanahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldTanah', '\DataDikdas\Model\VldTanahQuery');
    }

    /**
     * Filter the query by a related VldTugasTambahan object
     *
     * @param   VldTugasTambahan|PropelObjectCollection $vldTugasTambahan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldTugasTambahan($vldTugasTambahan, $comparison = null)
    {
        if ($vldTugasTambahan instanceof VldTugasTambahan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldTugasTambahan->getIdtype(), $comparison);
        } elseif ($vldTugasTambahan instanceof PropelObjectCollection) {
            return $this
                ->useVldTugasTambahanQuery()
                ->filterByPrimaryKeys($vldTugasTambahan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldTugasTambahan() only accepts arguments of type VldTugasTambahan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldTugasTambahan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldTugasTambahan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldTugasTambahan');

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
            $this->addJoinObject($join, 'VldTugasTambahan');
        }

        return $this;
    }

    /**
     * Use the VldTugasTambahan relation VldTugasTambahan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldTugasTambahanQuery A secondary query class using the current class as primary query
     */
    public function useVldTugasTambahanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldTugasTambahan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldTugasTambahan', '\DataDikdas\Model\VldTugasTambahanQuery');
    }

    /**
     * Filter the query by a related VldTunjangan object
     *
     * @param   VldTunjangan|PropelObjectCollection $vldTunjangan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldTunjangan($vldTunjangan, $comparison = null)
    {
        if ($vldTunjangan instanceof VldTunjangan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldTunjangan->getIdtype(), $comparison);
        } elseif ($vldTunjangan instanceof PropelObjectCollection) {
            return $this
                ->useVldTunjanganQuery()
                ->filterByPrimaryKeys($vldTunjangan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldTunjangan() only accepts arguments of type VldTunjangan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldTunjangan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldTunjangan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldTunjangan');

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
            $this->addJoinObject($join, 'VldTunjangan');
        }

        return $this;
    }

    /**
     * Use the VldTunjangan relation VldTunjangan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldTunjanganQuery A secondary query class using the current class as primary query
     */
    public function useVldTunjanganQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldTunjangan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldTunjangan', '\DataDikdas\Model\VldTunjanganQuery');
    }

    /**
     * Filter the query by a related VldUn object
     *
     * @param   VldUn|PropelObjectCollection $vldUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldUn($vldUn, $comparison = null)
    {
        if ($vldUn instanceof VldUn) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldUn->getIdtype(), $comparison);
        } elseif ($vldUn instanceof PropelObjectCollection) {
            return $this
                ->useVldUnQuery()
                ->filterByPrimaryKeys($vldUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldUn() only accepts arguments of type VldUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldUn relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldUn($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldUn');

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
            $this->addJoinObject($join, 'VldUn');
        }

        return $this;
    }

    /**
     * Use the VldUn relation VldUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldUnQuery A secondary query class using the current class as primary query
     */
    public function useVldUnQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldUn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldUn', '\DataDikdas\Model\VldUnQuery');
    }

    /**
     * Filter the query by a related VldYayasan object
     *
     * @param   VldYayasan|PropelObjectCollection $vldYayasan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ErrortypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldYayasan($vldYayasan, $comparison = null)
    {
        if ($vldYayasan instanceof VldYayasan) {
            return $this
                ->addUsingAlias(ErrortypePeer::IDTYPE, $vldYayasan->getIdtype(), $comparison);
        } elseif ($vldYayasan instanceof PropelObjectCollection) {
            return $this
                ->useVldYayasanQuery()
                ->filterByPrimaryKeys($vldYayasan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldYayasan() only accepts arguments of type VldYayasan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldYayasan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function joinVldYayasan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldYayasan');

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
            $this->addJoinObject($join, 'VldYayasan');
        }

        return $this;
    }

    /**
     * Use the VldYayasan relation VldYayasan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldYayasanQuery A secondary query class using the current class as primary query
     */
    public function useVldYayasanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldYayasan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldYayasan', '\DataDikdas\Model\VldYayasanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Errortype $errortype Object to remove from the list of results
     *
     * @return ErrortypeQuery The current query, for fluid interface
     */
    public function prune($errortype = null)
    {
        if ($errortype) {
            $this->addUsingAlias(ErrortypePeer::IDTYPE, $errortype->getIdtype(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
