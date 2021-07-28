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
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Publisher;
use DataDikdas\Model\PublisherPeer;
use DataDikdas\Model\PublisherQuery;

/**
 * Base class that represents a query for the 'pustaka.publisher' table.
 *
 * 
 *
 * @method PublisherQuery orderByIdPublisher($order = Criteria::ASC) Order by the id_publisher column
 * @method PublisherQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method PublisherQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method PublisherQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method PublisherQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method PublisherQuery orderByHeadOffice($order = Criteria::ASC) Order by the head_office column
 * @method PublisherQuery orderByDirectorName($order = Criteria::ASC) Order by the director_name column
 * @method PublisherQuery orderByDirectorPhone($order = Criteria::ASC) Order by the director_phone column
 * @method PublisherQuery orderByDirectorEmail($order = Criteria::ASC) Order by the director_email column
 * @method PublisherQuery orderByContactPerson($order = Criteria::ASC) Order by the contact_person column
 * @method PublisherQuery orderByCpPhone($order = Criteria::ASC) Order by the cp_phone column
 * @method PublisherQuery orderByContactPerson2($order = Criteria::ASC) Order by the contact_person2 column
 * @method PublisherQuery orderByCpPhone2($order = Criteria::ASC) Order by the cp_phone2 column
 * @method PublisherQuery orderByNpwp($order = Criteria::ASC) Order by the npwp column
 * @method PublisherQuery orderBySiup($order = Criteria::ASC) Order by the siup column
 * @method PublisherQuery orderByAkta($order = Criteria::ASC) Order by the akta column
 * @method PublisherQuery orderByNoKta($order = Criteria::ASC) Order by the no_kta column
 * @method PublisherQuery orderByKta($order = Criteria::ASC) Order by the kta column
 * @method PublisherQuery orderBySurat($order = Criteria::ASC) Order by the surat column
 * @method PublisherQuery orderBySuratPernyataan($order = Criteria::ASC) Order by the surat_pernyataan column
 * @method PublisherQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method PublisherQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PublisherQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PublisherQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method PublisherQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method PublisherQuery groupByIdPublisher() Group by the id_publisher column
 * @method PublisherQuery groupByName() Group by the name column
 * @method PublisherQuery groupByAddress() Group by the address column
 * @method PublisherQuery groupByPhone() Group by the phone column
 * @method PublisherQuery groupByEmail() Group by the email column
 * @method PublisherQuery groupByHeadOffice() Group by the head_office column
 * @method PublisherQuery groupByDirectorName() Group by the director_name column
 * @method PublisherQuery groupByDirectorPhone() Group by the director_phone column
 * @method PublisherQuery groupByDirectorEmail() Group by the director_email column
 * @method PublisherQuery groupByContactPerson() Group by the contact_person column
 * @method PublisherQuery groupByCpPhone() Group by the cp_phone column
 * @method PublisherQuery groupByContactPerson2() Group by the contact_person2 column
 * @method PublisherQuery groupByCpPhone2() Group by the cp_phone2 column
 * @method PublisherQuery groupByNpwp() Group by the npwp column
 * @method PublisherQuery groupBySiup() Group by the siup column
 * @method PublisherQuery groupByAkta() Group by the akta column
 * @method PublisherQuery groupByNoKta() Group by the no_kta column
 * @method PublisherQuery groupByKta() Group by the kta column
 * @method PublisherQuery groupBySurat() Group by the surat column
 * @method PublisherQuery groupBySuratPernyataan() Group by the surat_pernyataan column
 * @method PublisherQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method PublisherQuery groupByCreateDate() Group by the create_date column
 * @method PublisherQuery groupByLastUpdate() Group by the last_update column
 * @method PublisherQuery groupByExpiredDate() Group by the expired_date column
 * @method PublisherQuery groupByLastSync() Group by the last_sync column
 *
 * @method PublisherQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PublisherQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PublisherQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PublisherQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method PublisherQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method PublisherQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method Publisher findOne(PropelPDO $con = null) Return the first Publisher matching the query
 * @method Publisher findOneOrCreate(PropelPDO $con = null) Return the first Publisher matching the query, or a new Publisher object populated from the query conditions when no match is found
 *
 * @method Publisher findOneByName(string $name) Return the first Publisher filtered by the name column
 * @method Publisher findOneByAddress(string $address) Return the first Publisher filtered by the address column
 * @method Publisher findOneByPhone(string $phone) Return the first Publisher filtered by the phone column
 * @method Publisher findOneByEmail(string $email) Return the first Publisher filtered by the email column
 * @method Publisher findOneByHeadOffice(string $head_office) Return the first Publisher filtered by the head_office column
 * @method Publisher findOneByDirectorName(string $director_name) Return the first Publisher filtered by the director_name column
 * @method Publisher findOneByDirectorPhone(string $director_phone) Return the first Publisher filtered by the director_phone column
 * @method Publisher findOneByDirectorEmail(string $director_email) Return the first Publisher filtered by the director_email column
 * @method Publisher findOneByContactPerson(string $contact_person) Return the first Publisher filtered by the contact_person column
 * @method Publisher findOneByCpPhone(string $cp_phone) Return the first Publisher filtered by the cp_phone column
 * @method Publisher findOneByContactPerson2(string $contact_person2) Return the first Publisher filtered by the contact_person2 column
 * @method Publisher findOneByCpPhone2(string $cp_phone2) Return the first Publisher filtered by the cp_phone2 column
 * @method Publisher findOneByNpwp(string $npwp) Return the first Publisher filtered by the npwp column
 * @method Publisher findOneBySiup(string $siup) Return the first Publisher filtered by the siup column
 * @method Publisher findOneByAkta(string $akta) Return the first Publisher filtered by the akta column
 * @method Publisher findOneByNoKta(string $no_kta) Return the first Publisher filtered by the no_kta column
 * @method Publisher findOneByKta(string $kta) Return the first Publisher filtered by the kta column
 * @method Publisher findOneBySurat(string $surat) Return the first Publisher filtered by the surat column
 * @method Publisher findOneBySuratPernyataan(string $surat_pernyataan) Return the first Publisher filtered by the surat_pernyataan column
 * @method Publisher findOneByKodeWilayah(string $kode_wilayah) Return the first Publisher filtered by the kode_wilayah column
 * @method Publisher findOneByCreateDate(string $create_date) Return the first Publisher filtered by the create_date column
 * @method Publisher findOneByLastUpdate(string $last_update) Return the first Publisher filtered by the last_update column
 * @method Publisher findOneByExpiredDate(string $expired_date) Return the first Publisher filtered by the expired_date column
 * @method Publisher findOneByLastSync(string $last_sync) Return the first Publisher filtered by the last_sync column
 *
 * @method array findByIdPublisher(string $id_publisher) Return Publisher objects filtered by the id_publisher column
 * @method array findByName(string $name) Return Publisher objects filtered by the name column
 * @method array findByAddress(string $address) Return Publisher objects filtered by the address column
 * @method array findByPhone(string $phone) Return Publisher objects filtered by the phone column
 * @method array findByEmail(string $email) Return Publisher objects filtered by the email column
 * @method array findByHeadOffice(string $head_office) Return Publisher objects filtered by the head_office column
 * @method array findByDirectorName(string $director_name) Return Publisher objects filtered by the director_name column
 * @method array findByDirectorPhone(string $director_phone) Return Publisher objects filtered by the director_phone column
 * @method array findByDirectorEmail(string $director_email) Return Publisher objects filtered by the director_email column
 * @method array findByContactPerson(string $contact_person) Return Publisher objects filtered by the contact_person column
 * @method array findByCpPhone(string $cp_phone) Return Publisher objects filtered by the cp_phone column
 * @method array findByContactPerson2(string $contact_person2) Return Publisher objects filtered by the contact_person2 column
 * @method array findByCpPhone2(string $cp_phone2) Return Publisher objects filtered by the cp_phone2 column
 * @method array findByNpwp(string $npwp) Return Publisher objects filtered by the npwp column
 * @method array findBySiup(string $siup) Return Publisher objects filtered by the siup column
 * @method array findByAkta(string $akta) Return Publisher objects filtered by the akta column
 * @method array findByNoKta(string $no_kta) Return Publisher objects filtered by the no_kta column
 * @method array findByKta(string $kta) Return Publisher objects filtered by the kta column
 * @method array findBySurat(string $surat) Return Publisher objects filtered by the surat column
 * @method array findBySuratPernyataan(string $surat_pernyataan) Return Publisher objects filtered by the surat_pernyataan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Publisher objects filtered by the kode_wilayah column
 * @method array findByCreateDate(string $create_date) Return Publisher objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Publisher objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Publisher objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Publisher objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePublisherQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePublisherQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Publisher', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PublisherQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PublisherQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PublisherQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PublisherQuery) {
            return $criteria;
        }
        $query = new PublisherQuery();
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
     * @return   Publisher|Publisher[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PublisherPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Publisher A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPublisher($key, $con = null)
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
     * @return                 Publisher A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_publisher", "name", "address", "phone", "email", "head_office", "director_name", "director_phone", "director_email", "contact_person", "cp_phone", "contact_person2", "cp_phone2", "npwp", "siup", "akta", "no_kta", "kta", "surat", "surat_pernyataan", "kode_wilayah", "create_date", "last_update", "expired_date", "last_sync" FROM "pustaka"."publisher" WHERE "id_publisher" = :p0';
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
            $obj = new Publisher();
            $obj->hydrate($row);
            PublisherPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Publisher|Publisher[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Publisher[]|mixed the list of results, formatted by the current formatter
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
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PublisherPeer::ID_PUBLISHER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PublisherPeer::ID_PUBLISHER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_publisher column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPublisher('fooValue');   // WHERE id_publisher = 'fooValue'
     * $query->filterByIdPublisher('%fooValue%'); // WHERE id_publisher LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idPublisher The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByIdPublisher($idPublisher = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idPublisher)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idPublisher)) {
                $idPublisher = str_replace('*', '%', $idPublisher);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::ID_PUBLISHER, $idPublisher, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the head_office column
     *
     * Example usage:
     * <code>
     * $query->filterByHeadOffice('fooValue');   // WHERE head_office = 'fooValue'
     * $query->filterByHeadOffice('%fooValue%'); // WHERE head_office LIKE '%fooValue%'
     * </code>
     *
     * @param     string $headOffice The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByHeadOffice($headOffice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($headOffice)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $headOffice)) {
                $headOffice = str_replace('*', '%', $headOffice);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::HEAD_OFFICE, $headOffice, $comparison);
    }

    /**
     * Filter the query on the director_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDirectorName('fooValue');   // WHERE director_name = 'fooValue'
     * $query->filterByDirectorName('%fooValue%'); // WHERE director_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $directorName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByDirectorName($directorName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($directorName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $directorName)) {
                $directorName = str_replace('*', '%', $directorName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::DIRECTOR_NAME, $directorName, $comparison);
    }

    /**
     * Filter the query on the director_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByDirectorPhone('fooValue');   // WHERE director_phone = 'fooValue'
     * $query->filterByDirectorPhone('%fooValue%'); // WHERE director_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $directorPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByDirectorPhone($directorPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($directorPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $directorPhone)) {
                $directorPhone = str_replace('*', '%', $directorPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::DIRECTOR_PHONE, $directorPhone, $comparison);
    }

    /**
     * Filter the query on the director_email column
     *
     * Example usage:
     * <code>
     * $query->filterByDirectorEmail('fooValue');   // WHERE director_email = 'fooValue'
     * $query->filterByDirectorEmail('%fooValue%'); // WHERE director_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $directorEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByDirectorEmail($directorEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($directorEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $directorEmail)) {
                $directorEmail = str_replace('*', '%', $directorEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::DIRECTOR_EMAIL, $directorEmail, $comparison);
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
     * @return PublisherQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PublisherPeer::CONTACT_PERSON, $contactPerson, $comparison);
    }

    /**
     * Filter the query on the cp_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByCpPhone('fooValue');   // WHERE cp_phone = 'fooValue'
     * $query->filterByCpPhone('%fooValue%'); // WHERE cp_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cpPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByCpPhone($cpPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cpPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cpPhone)) {
                $cpPhone = str_replace('*', '%', $cpPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::CP_PHONE, $cpPhone, $comparison);
    }

    /**
     * Filter the query on the contact_person2 column
     *
     * Example usage:
     * <code>
     * $query->filterByContactPerson2('fooValue');   // WHERE contact_person2 = 'fooValue'
     * $query->filterByContactPerson2('%fooValue%'); // WHERE contact_person2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactPerson2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByContactPerson2($contactPerson2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactPerson2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactPerson2)) {
                $contactPerson2 = str_replace('*', '%', $contactPerson2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::CONTACT_PERSON2, $contactPerson2, $comparison);
    }

    /**
     * Filter the query on the cp_phone2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCpPhone2('fooValue');   // WHERE cp_phone2 = 'fooValue'
     * $query->filterByCpPhone2('%fooValue%'); // WHERE cp_phone2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cpPhone2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByCpPhone2($cpPhone2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cpPhone2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cpPhone2)) {
                $cpPhone2 = str_replace('*', '%', $cpPhone2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::CP_PHONE2, $cpPhone2, $comparison);
    }

    /**
     * Filter the query on the npwp column
     *
     * Example usage:
     * <code>
     * $query->filterByNpwp('fooValue');   // WHERE npwp = 'fooValue'
     * $query->filterByNpwp('%fooValue%'); // WHERE npwp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npwp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByNpwp($npwp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npwp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $npwp)) {
                $npwp = str_replace('*', '%', $npwp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::NPWP, $npwp, $comparison);
    }

    /**
     * Filter the query on the siup column
     *
     * Example usage:
     * <code>
     * $query->filterBySiup('fooValue');   // WHERE siup = 'fooValue'
     * $query->filterBySiup('%fooValue%'); // WHERE siup LIKE '%fooValue%'
     * </code>
     *
     * @param     string $siup The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterBySiup($siup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($siup)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $siup)) {
                $siup = str_replace('*', '%', $siup);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::SIUP, $siup, $comparison);
    }

    /**
     * Filter the query on the akta column
     *
     * Example usage:
     * <code>
     * $query->filterByAkta('fooValue');   // WHERE akta = 'fooValue'
     * $query->filterByAkta('%fooValue%'); // WHERE akta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $akta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByAkta($akta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($akta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $akta)) {
                $akta = str_replace('*', '%', $akta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::AKTA, $akta, $comparison);
    }

    /**
     * Filter the query on the no_kta column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKta('fooValue');   // WHERE no_kta = 'fooValue'
     * $query->filterByNoKta('%fooValue%'); // WHERE no_kta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByNoKta($noKta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKta)) {
                $noKta = str_replace('*', '%', $noKta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::NO_KTA, $noKta, $comparison);
    }

    /**
     * Filter the query on the kta column
     *
     * Example usage:
     * <code>
     * $query->filterByKta('fooValue');   // WHERE kta = 'fooValue'
     * $query->filterByKta('%fooValue%'); // WHERE kta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByKta($kta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kta)) {
                $kta = str_replace('*', '%', $kta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::KTA, $kta, $comparison);
    }

    /**
     * Filter the query on the surat column
     *
     * Example usage:
     * <code>
     * $query->filterBySurat('fooValue');   // WHERE surat = 'fooValue'
     * $query->filterBySurat('%fooValue%'); // WHERE surat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $surat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterBySurat($surat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($surat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $surat)) {
                $surat = str_replace('*', '%', $surat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::SURAT, $surat, $comparison);
    }

    /**
     * Filter the query on the surat_pernyataan column
     *
     * Example usage:
     * <code>
     * $query->filterBySuratPernyataan('fooValue');   // WHERE surat_pernyataan = 'fooValue'
     * $query->filterBySuratPernyataan('%fooValue%'); // WHERE surat_pernyataan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $suratPernyataan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterBySuratPernyataan($suratPernyataan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($suratPernyataan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $suratPernyataan)) {
                $suratPernyataan = str_replace('*', '%', $suratPernyataan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PublisherPeer::SURAT_PERNYATAAN, $suratPernyataan, $comparison);
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
     * @return PublisherQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PublisherPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PublisherPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PublisherPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PublisherPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PublisherPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PublisherPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PublisherPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(PublisherPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(PublisherPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PublisherPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return PublisherQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PublisherPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PublisherPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PublisherPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PublisherQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(PublisherPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PublisherPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
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
     * @return PublisherQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Publisher $publisher Object to remove from the list of results
     *
     * @return PublisherQuery The current query, for fluid interface
     */
    public function prune($publisher = null)
    {
        if ($publisher) {
            $this->addUsingAlias(PublisherPeer::ID_PUBLISHER, $publisher->getIdPublisher(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
