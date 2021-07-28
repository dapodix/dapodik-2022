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
use DataDikdas\Model\JenisSertifikasi;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\KebutuhanKhususQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\ProgramInklusi;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'ref.kebutuhan_khusus' table.
 *
 * 
 *
 * @method KebutuhanKhususQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method KebutuhanKhususQuery orderByKebutuhanKhusus($order = Criteria::ASC) Order by the kebutuhan_khusus column
 * @method KebutuhanKhususQuery orderByKkA($order = Criteria::ASC) Order by the kk_a column
 * @method KebutuhanKhususQuery orderByKkB($order = Criteria::ASC) Order by the kk_b column
 * @method KebutuhanKhususQuery orderByKkC($order = Criteria::ASC) Order by the kk_c column
 * @method KebutuhanKhususQuery orderByKkC1($order = Criteria::ASC) Order by the kk_c1 column
 * @method KebutuhanKhususQuery orderByKkD($order = Criteria::ASC) Order by the kk_d column
 * @method KebutuhanKhususQuery orderByKkD1($order = Criteria::ASC) Order by the kk_d1 column
 * @method KebutuhanKhususQuery orderByKkE($order = Criteria::ASC) Order by the kk_e column
 * @method KebutuhanKhususQuery orderByKkF($order = Criteria::ASC) Order by the kk_f column
 * @method KebutuhanKhususQuery orderByKkH($order = Criteria::ASC) Order by the kk_h column
 * @method KebutuhanKhususQuery orderByKkI($order = Criteria::ASC) Order by the kk_i column
 * @method KebutuhanKhususQuery orderByKkJ($order = Criteria::ASC) Order by the kk_j column
 * @method KebutuhanKhususQuery orderByKkK($order = Criteria::ASC) Order by the kk_k column
 * @method KebutuhanKhususQuery orderByKkN($order = Criteria::ASC) Order by the kk_n column
 * @method KebutuhanKhususQuery orderByKkO($order = Criteria::ASC) Order by the kk_o column
 * @method KebutuhanKhususQuery orderByKkP($order = Criteria::ASC) Order by the kk_p column
 * @method KebutuhanKhususQuery orderByKkQ($order = Criteria::ASC) Order by the kk_q column
 * @method KebutuhanKhususQuery orderByUntukLembaga($order = Criteria::ASC) Order by the untuk_lembaga column
 * @method KebutuhanKhususQuery orderByUntukPtk($order = Criteria::ASC) Order by the untuk_ptk column
 * @method KebutuhanKhususQuery orderByUntukPd($order = Criteria::ASC) Order by the untuk_pd column
 * @method KebutuhanKhususQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KebutuhanKhususQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KebutuhanKhususQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method KebutuhanKhususQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method KebutuhanKhususQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method KebutuhanKhususQuery groupByKebutuhanKhusus() Group by the kebutuhan_khusus column
 * @method KebutuhanKhususQuery groupByKkA() Group by the kk_a column
 * @method KebutuhanKhususQuery groupByKkB() Group by the kk_b column
 * @method KebutuhanKhususQuery groupByKkC() Group by the kk_c column
 * @method KebutuhanKhususQuery groupByKkC1() Group by the kk_c1 column
 * @method KebutuhanKhususQuery groupByKkD() Group by the kk_d column
 * @method KebutuhanKhususQuery groupByKkD1() Group by the kk_d1 column
 * @method KebutuhanKhususQuery groupByKkE() Group by the kk_e column
 * @method KebutuhanKhususQuery groupByKkF() Group by the kk_f column
 * @method KebutuhanKhususQuery groupByKkH() Group by the kk_h column
 * @method KebutuhanKhususQuery groupByKkI() Group by the kk_i column
 * @method KebutuhanKhususQuery groupByKkJ() Group by the kk_j column
 * @method KebutuhanKhususQuery groupByKkK() Group by the kk_k column
 * @method KebutuhanKhususQuery groupByKkN() Group by the kk_n column
 * @method KebutuhanKhususQuery groupByKkO() Group by the kk_o column
 * @method KebutuhanKhususQuery groupByKkP() Group by the kk_p column
 * @method KebutuhanKhususQuery groupByKkQ() Group by the kk_q column
 * @method KebutuhanKhususQuery groupByUntukLembaga() Group by the untuk_lembaga column
 * @method KebutuhanKhususQuery groupByUntukPtk() Group by the untuk_ptk column
 * @method KebutuhanKhususQuery groupByUntukPd() Group by the untuk_pd column
 * @method KebutuhanKhususQuery groupByCreateDate() Group by the create_date column
 * @method KebutuhanKhususQuery groupByLastUpdate() Group by the last_update column
 * @method KebutuhanKhususQuery groupByExpiredDate() Group by the expired_date column
 * @method KebutuhanKhususQuery groupByLastSync() Group by the last_sync column
 *
 * @method KebutuhanKhususQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KebutuhanKhususQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KebutuhanKhususQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KebutuhanKhususQuery leftJoinJenisSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisSertifikasi relation
 * @method KebutuhanKhususQuery rightJoinJenisSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisSertifikasi relation
 * @method KebutuhanKhususQuery innerJoinJenisSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisSertifikasi relation
 *
 * @method KebutuhanKhususQuery leftJoinJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanSp relation
 * @method KebutuhanKhususQuery rightJoinJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanSp relation
 * @method KebutuhanKhususQuery innerJoinJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanSp relation
 *
 * @method KebutuhanKhususQuery leftJoinPesertaDidikRelatedByKebutuhanKhususIdAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdAyah relation
 * @method KebutuhanKhususQuery rightJoinPesertaDidikRelatedByKebutuhanKhususIdAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdAyah relation
 * @method KebutuhanKhususQuery innerJoinPesertaDidikRelatedByKebutuhanKhususIdAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdAyah relation
 *
 * @method KebutuhanKhususQuery leftJoinPesertaDidikRelatedByKebutuhanKhususIdIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdIbu relation
 * @method KebutuhanKhususQuery rightJoinPesertaDidikRelatedByKebutuhanKhususIdIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdIbu relation
 * @method KebutuhanKhususQuery innerJoinPesertaDidikRelatedByKebutuhanKhususIdIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdIbu relation
 *
 * @method KebutuhanKhususQuery leftJoinPesertaDidikRelatedByKebutuhanKhususId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususId relation
 * @method KebutuhanKhususQuery rightJoinPesertaDidikRelatedByKebutuhanKhususId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususId relation
 * @method KebutuhanKhususQuery innerJoinPesertaDidikRelatedByKebutuhanKhususId($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususId relation
 *
 * @method KebutuhanKhususQuery leftJoinProgramInklusi($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProgramInklusi relation
 * @method KebutuhanKhususQuery rightJoinProgramInklusi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProgramInklusi relation
 * @method KebutuhanKhususQuery innerJoinProgramInklusi($relationAlias = null) Adds a INNER JOIN clause to the query using the ProgramInklusi relation
 *
 * @method KebutuhanKhususQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method KebutuhanKhususQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method KebutuhanKhususQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method KebutuhanKhususQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method KebutuhanKhususQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method KebutuhanKhususQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method KebutuhanKhususQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method KebutuhanKhususQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method KebutuhanKhususQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method KebutuhanKhusus findOne(PropelPDO $con = null) Return the first KebutuhanKhusus matching the query
 * @method KebutuhanKhusus findOneOrCreate(PropelPDO $con = null) Return the first KebutuhanKhusus matching the query, or a new KebutuhanKhusus object populated from the query conditions when no match is found
 *
 * @method KebutuhanKhusus findOneByKebutuhanKhusus(string $kebutuhan_khusus) Return the first KebutuhanKhusus filtered by the kebutuhan_khusus column
 * @method KebutuhanKhusus findOneByKkA(string $kk_a) Return the first KebutuhanKhusus filtered by the kk_a column
 * @method KebutuhanKhusus findOneByKkB(string $kk_b) Return the first KebutuhanKhusus filtered by the kk_b column
 * @method KebutuhanKhusus findOneByKkC(string $kk_c) Return the first KebutuhanKhusus filtered by the kk_c column
 * @method KebutuhanKhusus findOneByKkC1(string $kk_c1) Return the first KebutuhanKhusus filtered by the kk_c1 column
 * @method KebutuhanKhusus findOneByKkD(string $kk_d) Return the first KebutuhanKhusus filtered by the kk_d column
 * @method KebutuhanKhusus findOneByKkD1(string $kk_d1) Return the first KebutuhanKhusus filtered by the kk_d1 column
 * @method KebutuhanKhusus findOneByKkE(string $kk_e) Return the first KebutuhanKhusus filtered by the kk_e column
 * @method KebutuhanKhusus findOneByKkF(string $kk_f) Return the first KebutuhanKhusus filtered by the kk_f column
 * @method KebutuhanKhusus findOneByKkH(string $kk_h) Return the first KebutuhanKhusus filtered by the kk_h column
 * @method KebutuhanKhusus findOneByKkI(string $kk_i) Return the first KebutuhanKhusus filtered by the kk_i column
 * @method KebutuhanKhusus findOneByKkJ(string $kk_j) Return the first KebutuhanKhusus filtered by the kk_j column
 * @method KebutuhanKhusus findOneByKkK(string $kk_k) Return the first KebutuhanKhusus filtered by the kk_k column
 * @method KebutuhanKhusus findOneByKkN(string $kk_n) Return the first KebutuhanKhusus filtered by the kk_n column
 * @method KebutuhanKhusus findOneByKkO(string $kk_o) Return the first KebutuhanKhusus filtered by the kk_o column
 * @method KebutuhanKhusus findOneByKkP(string $kk_p) Return the first KebutuhanKhusus filtered by the kk_p column
 * @method KebutuhanKhusus findOneByKkQ(string $kk_q) Return the first KebutuhanKhusus filtered by the kk_q column
 * @method KebutuhanKhusus findOneByUntukLembaga(string $untuk_lembaga) Return the first KebutuhanKhusus filtered by the untuk_lembaga column
 * @method KebutuhanKhusus findOneByUntukPtk(string $untuk_ptk) Return the first KebutuhanKhusus filtered by the untuk_ptk column
 * @method KebutuhanKhusus findOneByUntukPd(string $untuk_pd) Return the first KebutuhanKhusus filtered by the untuk_pd column
 * @method KebutuhanKhusus findOneByCreateDate(string $create_date) Return the first KebutuhanKhusus filtered by the create_date column
 * @method KebutuhanKhusus findOneByLastUpdate(string $last_update) Return the first KebutuhanKhusus filtered by the last_update column
 * @method KebutuhanKhusus findOneByExpiredDate(string $expired_date) Return the first KebutuhanKhusus filtered by the expired_date column
 * @method KebutuhanKhusus findOneByLastSync(string $last_sync) Return the first KebutuhanKhusus filtered by the last_sync column
 *
 * @method array findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return KebutuhanKhusus objects filtered by the kebutuhan_khusus_id column
 * @method array findByKebutuhanKhusus(string $kebutuhan_khusus) Return KebutuhanKhusus objects filtered by the kebutuhan_khusus column
 * @method array findByKkA(string $kk_a) Return KebutuhanKhusus objects filtered by the kk_a column
 * @method array findByKkB(string $kk_b) Return KebutuhanKhusus objects filtered by the kk_b column
 * @method array findByKkC(string $kk_c) Return KebutuhanKhusus objects filtered by the kk_c column
 * @method array findByKkC1(string $kk_c1) Return KebutuhanKhusus objects filtered by the kk_c1 column
 * @method array findByKkD(string $kk_d) Return KebutuhanKhusus objects filtered by the kk_d column
 * @method array findByKkD1(string $kk_d1) Return KebutuhanKhusus objects filtered by the kk_d1 column
 * @method array findByKkE(string $kk_e) Return KebutuhanKhusus objects filtered by the kk_e column
 * @method array findByKkF(string $kk_f) Return KebutuhanKhusus objects filtered by the kk_f column
 * @method array findByKkH(string $kk_h) Return KebutuhanKhusus objects filtered by the kk_h column
 * @method array findByKkI(string $kk_i) Return KebutuhanKhusus objects filtered by the kk_i column
 * @method array findByKkJ(string $kk_j) Return KebutuhanKhusus objects filtered by the kk_j column
 * @method array findByKkK(string $kk_k) Return KebutuhanKhusus objects filtered by the kk_k column
 * @method array findByKkN(string $kk_n) Return KebutuhanKhusus objects filtered by the kk_n column
 * @method array findByKkO(string $kk_o) Return KebutuhanKhusus objects filtered by the kk_o column
 * @method array findByKkP(string $kk_p) Return KebutuhanKhusus objects filtered by the kk_p column
 * @method array findByKkQ(string $kk_q) Return KebutuhanKhusus objects filtered by the kk_q column
 * @method array findByUntukLembaga(string $untuk_lembaga) Return KebutuhanKhusus objects filtered by the untuk_lembaga column
 * @method array findByUntukPtk(string $untuk_ptk) Return KebutuhanKhusus objects filtered by the untuk_ptk column
 * @method array findByUntukPd(string $untuk_pd) Return KebutuhanKhusus objects filtered by the untuk_pd column
 * @method array findByCreateDate(string $create_date) Return KebutuhanKhusus objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KebutuhanKhusus objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return KebutuhanKhusus objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return KebutuhanKhusus objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKebutuhanKhususQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKebutuhanKhususQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KebutuhanKhusus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KebutuhanKhususQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KebutuhanKhususQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KebutuhanKhususQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KebutuhanKhususQuery) {
            return $criteria;
        }
        $query = new KebutuhanKhususQuery();
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
     * @return   KebutuhanKhusus|KebutuhanKhusus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KebutuhanKhususPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KebutuhanKhusus A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKebutuhanKhususId($key, $con = null)
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
     * @return                 KebutuhanKhusus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kebutuhan_khusus_id", "kebutuhan_khusus", "kk_a", "kk_b", "kk_c", "kk_c1", "kk_d", "kk_d1", "kk_e", "kk_f", "kk_h", "kk_i", "kk_j", "kk_k", "kk_n", "kk_o", "kk_p", "kk_q", "untuk_lembaga", "untuk_ptk", "untuk_pd", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."kebutuhan_khusus" WHERE "kebutuhan_khusus_id" = :p0';
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
            $obj = new KebutuhanKhusus();
            $obj->hydrate($row);
            KebutuhanKhususPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KebutuhanKhusus|KebutuhanKhusus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KebutuhanKhusus[]|mixed the list of results, formatted by the current formatter
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
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususId(1234); // WHERE kebutuhan_khusus_id = 1234
     * $query->filterByKebutuhanKhususId(array(12, 34)); // WHERE kebutuhan_khusus_id IN (12, 34)
     * $query->filterByKebutuhanKhususId(array('min' => 12)); // WHERE kebutuhan_khusus_id >= 12
     * $query->filterByKebutuhanKhususId(array('max' => 12)); // WHERE kebutuhan_khusus_id <= 12
     * </code>
     *
     * @param     mixed $kebutuhanKhususId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhusus('fooValue');   // WHERE kebutuhan_khusus = 'fooValue'
     * $query->filterByKebutuhanKhusus('%fooValue%'); // WHERE kebutuhan_khusus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kebutuhanKhusus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhusus($kebutuhanKhusus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kebutuhanKhusus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kebutuhanKhusus)) {
                $kebutuhanKhusus = str_replace('*', '%', $kebutuhanKhusus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS, $kebutuhanKhusus, $comparison);
    }

    /**
     * Filter the query on the kk_a column
     *
     * Example usage:
     * <code>
     * $query->filterByKkA(1234); // WHERE kk_a = 1234
     * $query->filterByKkA(array(12, 34)); // WHERE kk_a IN (12, 34)
     * $query->filterByKkA(array('min' => 12)); // WHERE kk_a >= 12
     * $query->filterByKkA(array('max' => 12)); // WHERE kk_a <= 12
     * </code>
     *
     * @param     mixed $kkA The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkA($kkA = null, $comparison = null)
    {
        if (is_array($kkA)) {
            $useMinMax = false;
            if (isset($kkA['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_A, $kkA['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkA['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_A, $kkA['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_A, $kkA, $comparison);
    }

    /**
     * Filter the query on the kk_b column
     *
     * Example usage:
     * <code>
     * $query->filterByKkB(1234); // WHERE kk_b = 1234
     * $query->filterByKkB(array(12, 34)); // WHERE kk_b IN (12, 34)
     * $query->filterByKkB(array('min' => 12)); // WHERE kk_b >= 12
     * $query->filterByKkB(array('max' => 12)); // WHERE kk_b <= 12
     * </code>
     *
     * @param     mixed $kkB The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkB($kkB = null, $comparison = null)
    {
        if (is_array($kkB)) {
            $useMinMax = false;
            if (isset($kkB['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_B, $kkB['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkB['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_B, $kkB['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_B, $kkB, $comparison);
    }

    /**
     * Filter the query on the kk_c column
     *
     * Example usage:
     * <code>
     * $query->filterByKkC(1234); // WHERE kk_c = 1234
     * $query->filterByKkC(array(12, 34)); // WHERE kk_c IN (12, 34)
     * $query->filterByKkC(array('min' => 12)); // WHERE kk_c >= 12
     * $query->filterByKkC(array('max' => 12)); // WHERE kk_c <= 12
     * </code>
     *
     * @param     mixed $kkC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkC($kkC = null, $comparison = null)
    {
        if (is_array($kkC)) {
            $useMinMax = false;
            if (isset($kkC['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_C, $kkC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkC['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_C, $kkC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_C, $kkC, $comparison);
    }

    /**
     * Filter the query on the kk_c1 column
     *
     * Example usage:
     * <code>
     * $query->filterByKkC1(1234); // WHERE kk_c1 = 1234
     * $query->filterByKkC1(array(12, 34)); // WHERE kk_c1 IN (12, 34)
     * $query->filterByKkC1(array('min' => 12)); // WHERE kk_c1 >= 12
     * $query->filterByKkC1(array('max' => 12)); // WHERE kk_c1 <= 12
     * </code>
     *
     * @param     mixed $kkC1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkC1($kkC1 = null, $comparison = null)
    {
        if (is_array($kkC1)) {
            $useMinMax = false;
            if (isset($kkC1['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_C1, $kkC1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkC1['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_C1, $kkC1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_C1, $kkC1, $comparison);
    }

    /**
     * Filter the query on the kk_d column
     *
     * Example usage:
     * <code>
     * $query->filterByKkD(1234); // WHERE kk_d = 1234
     * $query->filterByKkD(array(12, 34)); // WHERE kk_d IN (12, 34)
     * $query->filterByKkD(array('min' => 12)); // WHERE kk_d >= 12
     * $query->filterByKkD(array('max' => 12)); // WHERE kk_d <= 12
     * </code>
     *
     * @param     mixed $kkD The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkD($kkD = null, $comparison = null)
    {
        if (is_array($kkD)) {
            $useMinMax = false;
            if (isset($kkD['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_D, $kkD['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkD['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_D, $kkD['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_D, $kkD, $comparison);
    }

    /**
     * Filter the query on the kk_d1 column
     *
     * Example usage:
     * <code>
     * $query->filterByKkD1(1234); // WHERE kk_d1 = 1234
     * $query->filterByKkD1(array(12, 34)); // WHERE kk_d1 IN (12, 34)
     * $query->filterByKkD1(array('min' => 12)); // WHERE kk_d1 >= 12
     * $query->filterByKkD1(array('max' => 12)); // WHERE kk_d1 <= 12
     * </code>
     *
     * @param     mixed $kkD1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkD1($kkD1 = null, $comparison = null)
    {
        if (is_array($kkD1)) {
            $useMinMax = false;
            if (isset($kkD1['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_D1, $kkD1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkD1['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_D1, $kkD1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_D1, $kkD1, $comparison);
    }

    /**
     * Filter the query on the kk_e column
     *
     * Example usage:
     * <code>
     * $query->filterByKkE(1234); // WHERE kk_e = 1234
     * $query->filterByKkE(array(12, 34)); // WHERE kk_e IN (12, 34)
     * $query->filterByKkE(array('min' => 12)); // WHERE kk_e >= 12
     * $query->filterByKkE(array('max' => 12)); // WHERE kk_e <= 12
     * </code>
     *
     * @param     mixed $kkE The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkE($kkE = null, $comparison = null)
    {
        if (is_array($kkE)) {
            $useMinMax = false;
            if (isset($kkE['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_E, $kkE['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkE['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_E, $kkE['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_E, $kkE, $comparison);
    }

    /**
     * Filter the query on the kk_f column
     *
     * Example usage:
     * <code>
     * $query->filterByKkF(1234); // WHERE kk_f = 1234
     * $query->filterByKkF(array(12, 34)); // WHERE kk_f IN (12, 34)
     * $query->filterByKkF(array('min' => 12)); // WHERE kk_f >= 12
     * $query->filterByKkF(array('max' => 12)); // WHERE kk_f <= 12
     * </code>
     *
     * @param     mixed $kkF The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkF($kkF = null, $comparison = null)
    {
        if (is_array($kkF)) {
            $useMinMax = false;
            if (isset($kkF['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_F, $kkF['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkF['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_F, $kkF['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_F, $kkF, $comparison);
    }

    /**
     * Filter the query on the kk_h column
     *
     * Example usage:
     * <code>
     * $query->filterByKkH(1234); // WHERE kk_h = 1234
     * $query->filterByKkH(array(12, 34)); // WHERE kk_h IN (12, 34)
     * $query->filterByKkH(array('min' => 12)); // WHERE kk_h >= 12
     * $query->filterByKkH(array('max' => 12)); // WHERE kk_h <= 12
     * </code>
     *
     * @param     mixed $kkH The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkH($kkH = null, $comparison = null)
    {
        if (is_array($kkH)) {
            $useMinMax = false;
            if (isset($kkH['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_H, $kkH['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkH['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_H, $kkH['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_H, $kkH, $comparison);
    }

    /**
     * Filter the query on the kk_i column
     *
     * Example usage:
     * <code>
     * $query->filterByKkI(1234); // WHERE kk_i = 1234
     * $query->filterByKkI(array(12, 34)); // WHERE kk_i IN (12, 34)
     * $query->filterByKkI(array('min' => 12)); // WHERE kk_i >= 12
     * $query->filterByKkI(array('max' => 12)); // WHERE kk_i <= 12
     * </code>
     *
     * @param     mixed $kkI The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkI($kkI = null, $comparison = null)
    {
        if (is_array($kkI)) {
            $useMinMax = false;
            if (isset($kkI['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_I, $kkI['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkI['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_I, $kkI['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_I, $kkI, $comparison);
    }

    /**
     * Filter the query on the kk_j column
     *
     * Example usage:
     * <code>
     * $query->filterByKkJ(1234); // WHERE kk_j = 1234
     * $query->filterByKkJ(array(12, 34)); // WHERE kk_j IN (12, 34)
     * $query->filterByKkJ(array('min' => 12)); // WHERE kk_j >= 12
     * $query->filterByKkJ(array('max' => 12)); // WHERE kk_j <= 12
     * </code>
     *
     * @param     mixed $kkJ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkJ($kkJ = null, $comparison = null)
    {
        if (is_array($kkJ)) {
            $useMinMax = false;
            if (isset($kkJ['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_J, $kkJ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkJ['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_J, $kkJ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_J, $kkJ, $comparison);
    }

    /**
     * Filter the query on the kk_k column
     *
     * Example usage:
     * <code>
     * $query->filterByKkK(1234); // WHERE kk_k = 1234
     * $query->filterByKkK(array(12, 34)); // WHERE kk_k IN (12, 34)
     * $query->filterByKkK(array('min' => 12)); // WHERE kk_k >= 12
     * $query->filterByKkK(array('max' => 12)); // WHERE kk_k <= 12
     * </code>
     *
     * @param     mixed $kkK The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkK($kkK = null, $comparison = null)
    {
        if (is_array($kkK)) {
            $useMinMax = false;
            if (isset($kkK['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_K, $kkK['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkK['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_K, $kkK['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_K, $kkK, $comparison);
    }

    /**
     * Filter the query on the kk_n column
     *
     * Example usage:
     * <code>
     * $query->filterByKkN(1234); // WHERE kk_n = 1234
     * $query->filterByKkN(array(12, 34)); // WHERE kk_n IN (12, 34)
     * $query->filterByKkN(array('min' => 12)); // WHERE kk_n >= 12
     * $query->filterByKkN(array('max' => 12)); // WHERE kk_n <= 12
     * </code>
     *
     * @param     mixed $kkN The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkN($kkN = null, $comparison = null)
    {
        if (is_array($kkN)) {
            $useMinMax = false;
            if (isset($kkN['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_N, $kkN['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkN['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_N, $kkN['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_N, $kkN, $comparison);
    }

    /**
     * Filter the query on the kk_o column
     *
     * Example usage:
     * <code>
     * $query->filterByKkO(1234); // WHERE kk_o = 1234
     * $query->filterByKkO(array(12, 34)); // WHERE kk_o IN (12, 34)
     * $query->filterByKkO(array('min' => 12)); // WHERE kk_o >= 12
     * $query->filterByKkO(array('max' => 12)); // WHERE kk_o <= 12
     * </code>
     *
     * @param     mixed $kkO The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkO($kkO = null, $comparison = null)
    {
        if (is_array($kkO)) {
            $useMinMax = false;
            if (isset($kkO['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_O, $kkO['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkO['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_O, $kkO['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_O, $kkO, $comparison);
    }

    /**
     * Filter the query on the kk_p column
     *
     * Example usage:
     * <code>
     * $query->filterByKkP(1234); // WHERE kk_p = 1234
     * $query->filterByKkP(array(12, 34)); // WHERE kk_p IN (12, 34)
     * $query->filterByKkP(array('min' => 12)); // WHERE kk_p >= 12
     * $query->filterByKkP(array('max' => 12)); // WHERE kk_p <= 12
     * </code>
     *
     * @param     mixed $kkP The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkP($kkP = null, $comparison = null)
    {
        if (is_array($kkP)) {
            $useMinMax = false;
            if (isset($kkP['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_P, $kkP['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkP['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_P, $kkP['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_P, $kkP, $comparison);
    }

    /**
     * Filter the query on the kk_q column
     *
     * Example usage:
     * <code>
     * $query->filterByKkQ(1234); // WHERE kk_q = 1234
     * $query->filterByKkQ(array(12, 34)); // WHERE kk_q IN (12, 34)
     * $query->filterByKkQ(array('min' => 12)); // WHERE kk_q >= 12
     * $query->filterByKkQ(array('max' => 12)); // WHERE kk_q <= 12
     * </code>
     *
     * @param     mixed $kkQ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByKkQ($kkQ = null, $comparison = null)
    {
        if (is_array($kkQ)) {
            $useMinMax = false;
            if (isset($kkQ['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_Q, $kkQ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kkQ['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::KK_Q, $kkQ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::KK_Q, $kkQ, $comparison);
    }

    /**
     * Filter the query on the untuk_lembaga column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukLembaga(1234); // WHERE untuk_lembaga = 1234
     * $query->filterByUntukLembaga(array(12, 34)); // WHERE untuk_lembaga IN (12, 34)
     * $query->filterByUntukLembaga(array('min' => 12)); // WHERE untuk_lembaga >= 12
     * $query->filterByUntukLembaga(array('max' => 12)); // WHERE untuk_lembaga <= 12
     * </code>
     *
     * @param     mixed $untukLembaga The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByUntukLembaga($untukLembaga = null, $comparison = null)
    {
        if (is_array($untukLembaga)) {
            $useMinMax = false;
            if (isset($untukLembaga['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_LEMBAGA, $untukLembaga['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukLembaga['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_LEMBAGA, $untukLembaga['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_LEMBAGA, $untukLembaga, $comparison);
    }

    /**
     * Filter the query on the untuk_ptk column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukPtk(1234); // WHERE untuk_ptk = 1234
     * $query->filterByUntukPtk(array(12, 34)); // WHERE untuk_ptk IN (12, 34)
     * $query->filterByUntukPtk(array('min' => 12)); // WHERE untuk_ptk >= 12
     * $query->filterByUntukPtk(array('max' => 12)); // WHERE untuk_ptk <= 12
     * </code>
     *
     * @param     mixed $untukPtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByUntukPtk($untukPtk = null, $comparison = null)
    {
        if (is_array($untukPtk)) {
            $useMinMax = false;
            if (isset($untukPtk['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_PTK, $untukPtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukPtk['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_PTK, $untukPtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_PTK, $untukPtk, $comparison);
    }

    /**
     * Filter the query on the untuk_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukPd(1234); // WHERE untuk_pd = 1234
     * $query->filterByUntukPd(array(12, 34)); // WHERE untuk_pd IN (12, 34)
     * $query->filterByUntukPd(array('min' => 12)); // WHERE untuk_pd >= 12
     * $query->filterByUntukPd(array('max' => 12)); // WHERE untuk_pd <= 12
     * </code>
     *
     * @param     mixed $untukPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByUntukPd($untukPd = null, $comparison = null)
    {
        if (is_array($untukPd)) {
            $useMinMax = false;
            if (isset($untukPd['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_PD, $untukPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukPd['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_PD, $untukPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::UNTUK_PD, $untukPd, $comparison);
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
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KebutuhanKhususPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KebutuhanKhususPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related JenisSertifikasi object
     *
     * @param   JenisSertifikasi|PropelObjectCollection $jenisSertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisSertifikasi($jenisSertifikasi, $comparison = null)
    {
        if ($jenisSertifikasi instanceof JenisSertifikasi) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $jenisSertifikasi->getKebutuhanKhususId(), $comparison);
        } elseif ($jenisSertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useJenisSertifikasiQuery()
                ->filterByPrimaryKeys($jenisSertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJenisSertifikasi() only accepts arguments of type JenisSertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisSertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function joinJenisSertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisSertifikasi');

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
            $this->addJoinObject($join, 'JenisSertifikasi');
        }

        return $this;
    }

    /**
     * Use the JenisSertifikasi relation JenisSertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisSertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useJenisSertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisSertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisSertifikasi', '\DataDikdas\Model\JenisSertifikasiQuery');
    }

    /**
     * Filter the query by a related JurusanSp object
     *
     * @param   JurusanSp|PropelObjectCollection $jurusanSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanSp($jurusanSp, $comparison = null)
    {
        if ($jurusanSp instanceof JurusanSp) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $jurusanSp->getKebutuhanKhususId(), $comparison);
        } elseif ($jurusanSp instanceof PropelObjectCollection) {
            return $this
                ->useJurusanSpQuery()
                ->filterByPrimaryKeys($jurusanSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusanSp() only accepts arguments of type JurusanSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function joinJurusanSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanSp');

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
            $this->addJoinObject($join, 'JurusanSp');
        }

        return $this;
    }

    /**
     * Use the JurusanSp relation JurusanSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanSpQuery A secondary query class using the current class as primary query
     */
    public function useJurusanSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanSp', '\DataDikdas\Model\JurusanSpQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByKebutuhanKhususIdAyah($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $pesertaDidik->getKebutuhanKhususIdAyah(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByKebutuhanKhususIdAyahQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByKebutuhanKhususIdAyah() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByKebutuhanKhususIdAyah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByKebutuhanKhususIdAyah');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByKebutuhanKhususIdAyah');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByKebutuhanKhususIdAyah relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByKebutuhanKhususIdAyahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByKebutuhanKhususIdAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByKebutuhanKhususIdAyah', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByKebutuhanKhususIdIbu($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $pesertaDidik->getKebutuhanKhususIdIbu(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByKebutuhanKhususIdIbuQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByKebutuhanKhususIdIbu() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususIdIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByKebutuhanKhususIdIbu($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByKebutuhanKhususIdIbu');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByKebutuhanKhususIdIbu');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByKebutuhanKhususIdIbu relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByKebutuhanKhususIdIbuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByKebutuhanKhususIdIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByKebutuhanKhususIdIbu', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByKebutuhanKhususId($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $pesertaDidik->getKebutuhanKhususId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByKebutuhanKhususIdQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByKebutuhanKhususId() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByKebutuhanKhususId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByKebutuhanKhususId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByKebutuhanKhususId');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByKebutuhanKhususId');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByKebutuhanKhususId relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByKebutuhanKhususIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByKebutuhanKhususId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByKebutuhanKhususId', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related ProgramInklusi object
     *
     * @param   ProgramInklusi|PropelObjectCollection $programInklusi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProgramInklusi($programInklusi, $comparison = null)
    {
        if ($programInklusi instanceof ProgramInklusi) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $programInklusi->getKebutuhanKhususId(), $comparison);
        } elseif ($programInklusi instanceof PropelObjectCollection) {
            return $this
                ->useProgramInklusiQuery()
                ->filterByPrimaryKeys($programInklusi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProgramInklusi() only accepts arguments of type ProgramInklusi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProgramInklusi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function joinProgramInklusi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProgramInklusi');

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
            $this->addJoinObject($join, 'ProgramInklusi');
        }

        return $this;
    }

    /**
     * Use the ProgramInklusi relation ProgramInklusi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\ProgramInklusiQuery A secondary query class using the current class as primary query
     */
    public function useProgramInklusiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProgramInklusi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProgramInklusi', '\DataDikdas\Model\ProgramInklusiQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $ptk->getMampuHandleKk(), $comparison);
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
     * @return KebutuhanKhususQuery The current query, for fluid interface
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
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $rombonganBelajar->getKebutuhanKhususId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            return $this
                ->useRombonganBelajarQuery()
                ->filterByPrimaryKeys($rombonganBelajar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KebutuhanKhususQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $sekolah->getKebutuhanKhususId(), $comparison);
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
     * @return KebutuhanKhususQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   KebutuhanKhusus $kebutuhanKhusus Object to remove from the list of results
     *
     * @return KebutuhanKhususQuery The current query, for fluid interface
     */
    public function prune($kebutuhanKhusus = null)
    {
        if ($kebutuhanKhusus) {
            $this->addUsingAlias(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->getKebutuhanKhususId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
