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
use DataDikdas\Model\Biblio;
use DataDikdas\Model\BiblioPeer;
use DataDikdas\Model\BiblioQuery;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuPelajaran;
use DataDikdas\Model\Classifications;
use DataDikdas\Model\DaftarAuthor;
use DataDikdas\Model\Frequency;
use DataDikdas\Model\Gmd;
use DataDikdas\Model\MapelBiblio;
use DataDikdas\Model\Negara;
use DataDikdas\Model\TingkatBiblio;

/**
 * Base class that represents a query for the 'pustaka.biblio' table.
 *
 * 
 *
 * @method BiblioQuery orderByIdBiblio($order = Criteria::ASC) Order by the id_biblio column
 * @method BiblioQuery orderByIdFreq($order = Criteria::ASC) Order by the id_freq column
 * @method BiblioQuery orderByIdPublisher($order = Criteria::ASC) Order by the id_publisher column
 * @method BiblioQuery orderByNegaraId($order = Criteria::ASC) Order by the negara_id column
 * @method BiblioQuery orderByIdGmd($order = Criteria::ASC) Order by the id_gmd column
 * @method BiblioQuery orderByIdClassification($order = Criteria::ASC) Order by the id_classification column
 * @method BiblioQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BiblioQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method BiblioQuery orderBySor($order = Criteria::ASC) Order by the sor column
 * @method BiblioQuery orderByEdition($order = Criteria::ASC) Order by the edition column
 * @method BiblioQuery orderByIsbnIssn($order = Criteria::ASC) Order by the isbn_issn column
 * @method BiblioQuery orderByCollations($order = Criteria::ASC) Order by the collations column
 * @method BiblioQuery orderByPublisher($order = Criteria::ASC) Order by the publisher column
 * @method BiblioQuery orderByPublishYear($order = Criteria::ASC) Order by the publish_year column
 * @method BiblioQuery orderBySeriesTitle($order = Criteria::ASC) Order by the series_title column
 * @method BiblioQuery orderByCallNumber($order = Criteria::ASC) Order by the call_number column
 * @method BiblioQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method BiblioQuery orderByPublishPlace($order = Criteria::ASC) Order by the publish_place column
 * @method BiblioQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method BiblioQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method BiblioQuery orderByFileAtt($order = Criteria::ASC) Order by the file_att column
 * @method BiblioQuery orderByOpacHide($order = Criteria::ASC) Order by the opac_hide column
 * @method BiblioQuery orderByPromoted($order = Criteria::ASC) Order by the promoted column
 * @method BiblioQuery orderByLabels($order = Criteria::ASC) Order by the labels column
 * @method BiblioQuery orderByPaperPrintingSpec($order = Criteria::ASC) Order by the paper_printing_spec column
 * @method BiblioQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BiblioQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BiblioQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 *
 * @method BiblioQuery groupByIdBiblio() Group by the id_biblio column
 * @method BiblioQuery groupByIdFreq() Group by the id_freq column
 * @method BiblioQuery groupByIdPublisher() Group by the id_publisher column
 * @method BiblioQuery groupByNegaraId() Group by the negara_id column
 * @method BiblioQuery groupByIdGmd() Group by the id_gmd column
 * @method BiblioQuery groupByIdClassification() Group by the id_classification column
 * @method BiblioQuery groupByCreateDate() Group by the create_date column
 * @method BiblioQuery groupByTitle() Group by the title column
 * @method BiblioQuery groupBySor() Group by the sor column
 * @method BiblioQuery groupByEdition() Group by the edition column
 * @method BiblioQuery groupByIsbnIssn() Group by the isbn_issn column
 * @method BiblioQuery groupByCollations() Group by the collations column
 * @method BiblioQuery groupByPublisher() Group by the publisher column
 * @method BiblioQuery groupByPublishYear() Group by the publish_year column
 * @method BiblioQuery groupBySeriesTitle() Group by the series_title column
 * @method BiblioQuery groupByCallNumber() Group by the call_number column
 * @method BiblioQuery groupBySource() Group by the source column
 * @method BiblioQuery groupByPublishPlace() Group by the publish_place column
 * @method BiblioQuery groupByNotes() Group by the notes column
 * @method BiblioQuery groupByImage() Group by the image column
 * @method BiblioQuery groupByFileAtt() Group by the file_att column
 * @method BiblioQuery groupByOpacHide() Group by the opac_hide column
 * @method BiblioQuery groupByPromoted() Group by the promoted column
 * @method BiblioQuery groupByLabels() Group by the labels column
 * @method BiblioQuery groupByPaperPrintingSpec() Group by the paper_printing_spec column
 * @method BiblioQuery groupByLastSync() Group by the last_sync column
 * @method BiblioQuery groupByLastUpdate() Group by the last_update column
 * @method BiblioQuery groupByExpiredDate() Group by the expired_date column
 *
 * @method BiblioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BiblioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BiblioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BiblioQuery leftJoinClassifications($relationAlias = null) Adds a LEFT JOIN clause to the query using the Classifications relation
 * @method BiblioQuery rightJoinClassifications($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Classifications relation
 * @method BiblioQuery innerJoinClassifications($relationAlias = null) Adds a INNER JOIN clause to the query using the Classifications relation
 *
 * @method BiblioQuery leftJoinFrequency($relationAlias = null) Adds a LEFT JOIN clause to the query using the Frequency relation
 * @method BiblioQuery rightJoinFrequency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Frequency relation
 * @method BiblioQuery innerJoinFrequency($relationAlias = null) Adds a INNER JOIN clause to the query using the Frequency relation
 *
 * @method BiblioQuery leftJoinGmd($relationAlias = null) Adds a LEFT JOIN clause to the query using the Gmd relation
 * @method BiblioQuery rightJoinGmd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Gmd relation
 * @method BiblioQuery innerJoinGmd($relationAlias = null) Adds a INNER JOIN clause to the query using the Gmd relation
 *
 * @method BiblioQuery leftJoinNegara($relationAlias = null) Adds a LEFT JOIN clause to the query using the Negara relation
 * @method BiblioQuery rightJoinNegara($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Negara relation
 * @method BiblioQuery innerJoinNegara($relationAlias = null) Adds a INNER JOIN clause to the query using the Negara relation
 *
 * @method BiblioQuery leftJoinBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buku relation
 * @method BiblioQuery rightJoinBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buku relation
 * @method BiblioQuery innerJoinBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the Buku relation
 *
 * @method BiblioQuery leftJoinBukuPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the BukuPelajaran relation
 * @method BiblioQuery rightJoinBukuPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BukuPelajaran relation
 * @method BiblioQuery innerJoinBukuPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the BukuPelajaran relation
 *
 * @method BiblioQuery leftJoinDaftarAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the DaftarAuthor relation
 * @method BiblioQuery rightJoinDaftarAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DaftarAuthor relation
 * @method BiblioQuery innerJoinDaftarAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the DaftarAuthor relation
 *
 * @method BiblioQuery leftJoinMapelBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapelBiblio relation
 * @method BiblioQuery rightJoinMapelBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapelBiblio relation
 * @method BiblioQuery innerJoinMapelBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the MapelBiblio relation
 *
 * @method BiblioQuery leftJoinTingkatBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatBiblio relation
 * @method BiblioQuery rightJoinTingkatBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatBiblio relation
 * @method BiblioQuery innerJoinTingkatBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatBiblio relation
 *
 * @method Biblio findOne(PropelPDO $con = null) Return the first Biblio matching the query
 * @method Biblio findOneOrCreate(PropelPDO $con = null) Return the first Biblio matching the query, or a new Biblio object populated from the query conditions when no match is found
 *
 * @method Biblio findOneByIdFreq(string $id_freq) Return the first Biblio filtered by the id_freq column
 * @method Biblio findOneByIdPublisher(string $id_publisher) Return the first Biblio filtered by the id_publisher column
 * @method Biblio findOneByNegaraId(string $negara_id) Return the first Biblio filtered by the negara_id column
 * @method Biblio findOneByIdGmd(string $id_gmd) Return the first Biblio filtered by the id_gmd column
 * @method Biblio findOneByIdClassification(string $id_classification) Return the first Biblio filtered by the id_classification column
 * @method Biblio findOneByCreateDate(string $create_date) Return the first Biblio filtered by the create_date column
 * @method Biblio findOneByTitle(string $title) Return the first Biblio filtered by the title column
 * @method Biblio findOneBySor(string $sor) Return the first Biblio filtered by the sor column
 * @method Biblio findOneByEdition(string $edition) Return the first Biblio filtered by the edition column
 * @method Biblio findOneByIsbnIssn(string $isbn_issn) Return the first Biblio filtered by the isbn_issn column
 * @method Biblio findOneByCollations(string $collations) Return the first Biblio filtered by the collations column
 * @method Biblio findOneByPublisher(string $publisher) Return the first Biblio filtered by the publisher column
 * @method Biblio findOneByPublishYear(string $publish_year) Return the first Biblio filtered by the publish_year column
 * @method Biblio findOneBySeriesTitle(string $series_title) Return the first Biblio filtered by the series_title column
 * @method Biblio findOneByCallNumber(string $call_number) Return the first Biblio filtered by the call_number column
 * @method Biblio findOneBySource(string $source) Return the first Biblio filtered by the source column
 * @method Biblio findOneByPublishPlace(string $publish_place) Return the first Biblio filtered by the publish_place column
 * @method Biblio findOneByNotes(string $notes) Return the first Biblio filtered by the notes column
 * @method Biblio findOneByImage(string $image) Return the first Biblio filtered by the image column
 * @method Biblio findOneByFileAtt(string $file_att) Return the first Biblio filtered by the file_att column
 * @method Biblio findOneByOpacHide(string $opac_hide) Return the first Biblio filtered by the opac_hide column
 * @method Biblio findOneByPromoted(string $promoted) Return the first Biblio filtered by the promoted column
 * @method Biblio findOneByLabels(string $labels) Return the first Biblio filtered by the labels column
 * @method Biblio findOneByPaperPrintingSpec(string $paper_printing_spec) Return the first Biblio filtered by the paper_printing_spec column
 * @method Biblio findOneByLastSync(string $last_sync) Return the first Biblio filtered by the last_sync column
 * @method Biblio findOneByLastUpdate(string $last_update) Return the first Biblio filtered by the last_update column
 * @method Biblio findOneByExpiredDate(string $expired_date) Return the first Biblio filtered by the expired_date column
 *
 * @method array findByIdBiblio(string $id_biblio) Return Biblio objects filtered by the id_biblio column
 * @method array findByIdFreq(string $id_freq) Return Biblio objects filtered by the id_freq column
 * @method array findByIdPublisher(string $id_publisher) Return Biblio objects filtered by the id_publisher column
 * @method array findByNegaraId(string $negara_id) Return Biblio objects filtered by the negara_id column
 * @method array findByIdGmd(string $id_gmd) Return Biblio objects filtered by the id_gmd column
 * @method array findByIdClassification(string $id_classification) Return Biblio objects filtered by the id_classification column
 * @method array findByCreateDate(string $create_date) Return Biblio objects filtered by the create_date column
 * @method array findByTitle(string $title) Return Biblio objects filtered by the title column
 * @method array findBySor(string $sor) Return Biblio objects filtered by the sor column
 * @method array findByEdition(string $edition) Return Biblio objects filtered by the edition column
 * @method array findByIsbnIssn(string $isbn_issn) Return Biblio objects filtered by the isbn_issn column
 * @method array findByCollations(string $collations) Return Biblio objects filtered by the collations column
 * @method array findByPublisher(string $publisher) Return Biblio objects filtered by the publisher column
 * @method array findByPublishYear(string $publish_year) Return Biblio objects filtered by the publish_year column
 * @method array findBySeriesTitle(string $series_title) Return Biblio objects filtered by the series_title column
 * @method array findByCallNumber(string $call_number) Return Biblio objects filtered by the call_number column
 * @method array findBySource(string $source) Return Biblio objects filtered by the source column
 * @method array findByPublishPlace(string $publish_place) Return Biblio objects filtered by the publish_place column
 * @method array findByNotes(string $notes) Return Biblio objects filtered by the notes column
 * @method array findByImage(string $image) Return Biblio objects filtered by the image column
 * @method array findByFileAtt(string $file_att) Return Biblio objects filtered by the file_att column
 * @method array findByOpacHide(string $opac_hide) Return Biblio objects filtered by the opac_hide column
 * @method array findByPromoted(string $promoted) Return Biblio objects filtered by the promoted column
 * @method array findByLabels(string $labels) Return Biblio objects filtered by the labels column
 * @method array findByPaperPrintingSpec(string $paper_printing_spec) Return Biblio objects filtered by the paper_printing_spec column
 * @method array findByLastSync(string $last_sync) Return Biblio objects filtered by the last_sync column
 * @method array findByLastUpdate(string $last_update) Return Biblio objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Biblio objects filtered by the expired_date column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBiblioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBiblioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Biblio', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BiblioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BiblioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BiblioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BiblioQuery) {
            return $criteria;
        }
        $query = new BiblioQuery();
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
     * @return   Biblio|Biblio[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BiblioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Biblio A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdBiblio($key, $con = null)
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
     * @return                 Biblio A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_biblio", "id_freq", "id_publisher", "negara_id", "id_gmd", "id_classification", "create_date", "title", "sor", "edition", "isbn_issn", "collations", "publisher", "publish_year", "series_title", "call_number", "source", "publish_place", "notes", "image", "file_att", "opac_hide", "promoted", "labels", "paper_printing_spec", "last_sync", "last_update", "expired_date" FROM "pustaka"."biblio" WHERE "id_biblio" = :p0';
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
            $obj = new Biblio();
            $obj->hydrate($row);
            BiblioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Biblio|Biblio[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Biblio[]|mixed the list of results, formatted by the current formatter
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
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BiblioPeer::ID_BIBLIO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BiblioPeer::ID_BIBLIO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_biblio column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBiblio('fooValue');   // WHERE id_biblio = 'fooValue'
     * $query->filterByIdBiblio('%fooValue%'); // WHERE id_biblio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBiblio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByIdBiblio($idBiblio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBiblio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBiblio)) {
                $idBiblio = str_replace('*', '%', $idBiblio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::ID_BIBLIO, $idBiblio, $comparison);
    }

    /**
     * Filter the query on the id_freq column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFreq(1234); // WHERE id_freq = 1234
     * $query->filterByIdFreq(array(12, 34)); // WHERE id_freq IN (12, 34)
     * $query->filterByIdFreq(array('min' => 12)); // WHERE id_freq >= 12
     * $query->filterByIdFreq(array('max' => 12)); // WHERE id_freq <= 12
     * </code>
     *
     * @see       filterByFrequency()
     *
     * @param     mixed $idFreq The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByIdFreq($idFreq = null, $comparison = null)
    {
        if (is_array($idFreq)) {
            $useMinMax = false;
            if (isset($idFreq['min'])) {
                $this->addUsingAlias(BiblioPeer::ID_FREQ, $idFreq['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFreq['max'])) {
                $this->addUsingAlias(BiblioPeer::ID_FREQ, $idFreq['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiblioPeer::ID_FREQ, $idFreq, $comparison);
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
     * @return BiblioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BiblioPeer::ID_PUBLISHER, $idPublisher, $comparison);
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
     * @return BiblioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BiblioPeer::NEGARA_ID, $negaraId, $comparison);
    }

    /**
     * Filter the query on the id_gmd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGmd('fooValue');   // WHERE id_gmd = 'fooValue'
     * $query->filterByIdGmd('%fooValue%'); // WHERE id_gmd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idGmd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByIdGmd($idGmd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idGmd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idGmd)) {
                $idGmd = str_replace('*', '%', $idGmd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::ID_GMD, $idGmd, $comparison);
    }

    /**
     * Filter the query on the id_classification column
     *
     * Example usage:
     * <code>
     * $query->filterByIdClassification('fooValue');   // WHERE id_classification = 'fooValue'
     * $query->filterByIdClassification('%fooValue%'); // WHERE id_classification LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idClassification The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByIdClassification($idClassification = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idClassification)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idClassification)) {
                $idClassification = str_replace('*', '%', $idClassification);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::ID_CLASSIFICATION, $idClassification, $comparison);
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
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BiblioPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BiblioPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiblioPeer::CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the sor column
     *
     * Example usage:
     * <code>
     * $query->filterBySor('fooValue');   // WHERE sor = 'fooValue'
     * $query->filterBySor('%fooValue%'); // WHERE sor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterBySor($sor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sor)) {
                $sor = str_replace('*', '%', $sor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::SOR, $sor, $comparison);
    }

    /**
     * Filter the query on the edition column
     *
     * Example usage:
     * <code>
     * $query->filterByEdition('fooValue');   // WHERE edition = 'fooValue'
     * $query->filterByEdition('%fooValue%'); // WHERE edition LIKE '%fooValue%'
     * </code>
     *
     * @param     string $edition The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByEdition($edition = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($edition)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $edition)) {
                $edition = str_replace('*', '%', $edition);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::EDITION, $edition, $comparison);
    }

    /**
     * Filter the query on the isbn_issn column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbnIssn('fooValue');   // WHERE isbn_issn = 'fooValue'
     * $query->filterByIsbnIssn('%fooValue%'); // WHERE isbn_issn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isbnIssn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByIsbnIssn($isbnIssn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isbnIssn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $isbnIssn)) {
                $isbnIssn = str_replace('*', '%', $isbnIssn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::ISBN_ISSN, $isbnIssn, $comparison);
    }

    /**
     * Filter the query on the collations column
     *
     * Example usage:
     * <code>
     * $query->filterByCollations('fooValue');   // WHERE collations = 'fooValue'
     * $query->filterByCollations('%fooValue%'); // WHERE collations LIKE '%fooValue%'
     * </code>
     *
     * @param     string $collations The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByCollations($collations = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($collations)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $collations)) {
                $collations = str_replace('*', '%', $collations);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::COLLATIONS, $collations, $comparison);
    }

    /**
     * Filter the query on the publisher column
     *
     * Example usage:
     * <code>
     * $query->filterByPublisher('fooValue');   // WHERE publisher = 'fooValue'
     * $query->filterByPublisher('%fooValue%'); // WHERE publisher LIKE '%fooValue%'
     * </code>
     *
     * @param     string $publisher The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByPublisher($publisher = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($publisher)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $publisher)) {
                $publisher = str_replace('*', '%', $publisher);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::PUBLISHER, $publisher, $comparison);
    }

    /**
     * Filter the query on the publish_year column
     *
     * Example usage:
     * <code>
     * $query->filterByPublishYear('fooValue');   // WHERE publish_year = 'fooValue'
     * $query->filterByPublishYear('%fooValue%'); // WHERE publish_year LIKE '%fooValue%'
     * </code>
     *
     * @param     string $publishYear The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByPublishYear($publishYear = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($publishYear)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $publishYear)) {
                $publishYear = str_replace('*', '%', $publishYear);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::PUBLISH_YEAR, $publishYear, $comparison);
    }

    /**
     * Filter the query on the series_title column
     *
     * Example usage:
     * <code>
     * $query->filterBySeriesTitle('fooValue');   // WHERE series_title = 'fooValue'
     * $query->filterBySeriesTitle('%fooValue%'); // WHERE series_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $seriesTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterBySeriesTitle($seriesTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($seriesTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $seriesTitle)) {
                $seriesTitle = str_replace('*', '%', $seriesTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::SERIES_TITLE, $seriesTitle, $comparison);
    }

    /**
     * Filter the query on the call_number column
     *
     * Example usage:
     * <code>
     * $query->filterByCallNumber('fooValue');   // WHERE call_number = 'fooValue'
     * $query->filterByCallNumber('%fooValue%'); // WHERE call_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $callNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByCallNumber($callNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($callNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $callNumber)) {
                $callNumber = str_replace('*', '%', $callNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::CALL_NUMBER, $callNumber, $comparison);
    }

    /**
     * Filter the query on the source column
     *
     * Example usage:
     * <code>
     * $query->filterBySource('fooValue');   // WHERE source = 'fooValue'
     * $query->filterBySource('%fooValue%'); // WHERE source LIKE '%fooValue%'
     * </code>
     *
     * @param     string $source The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterBySource($source = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($source)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $source)) {
                $source = str_replace('*', '%', $source);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::SOURCE, $source, $comparison);
    }

    /**
     * Filter the query on the publish_place column
     *
     * Example usage:
     * <code>
     * $query->filterByPublishPlace('fooValue');   // WHERE publish_place = 'fooValue'
     * $query->filterByPublishPlace('%fooValue%'); // WHERE publish_place LIKE '%fooValue%'
     * </code>
     *
     * @param     string $publishPlace The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByPublishPlace($publishPlace = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($publishPlace)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $publishPlace)) {
                $publishPlace = str_replace('*', '%', $publishPlace);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::PUBLISH_PLACE, $publishPlace, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notes)) {
                $notes = str_replace('*', '%', $notes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%'); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $image)) {
                $image = str_replace('*', '%', $image);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the file_att column
     *
     * Example usage:
     * <code>
     * $query->filterByFileAtt('fooValue');   // WHERE file_att = 'fooValue'
     * $query->filterByFileAtt('%fooValue%'); // WHERE file_att LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fileAtt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByFileAtt($fileAtt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fileAtt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fileAtt)) {
                $fileAtt = str_replace('*', '%', $fileAtt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::FILE_ATT, $fileAtt, $comparison);
    }

    /**
     * Filter the query on the opac_hide column
     *
     * Example usage:
     * <code>
     * $query->filterByOpacHide(1234); // WHERE opac_hide = 1234
     * $query->filterByOpacHide(array(12, 34)); // WHERE opac_hide IN (12, 34)
     * $query->filterByOpacHide(array('min' => 12)); // WHERE opac_hide >= 12
     * $query->filterByOpacHide(array('max' => 12)); // WHERE opac_hide <= 12
     * </code>
     *
     * @param     mixed $opacHide The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByOpacHide($opacHide = null, $comparison = null)
    {
        if (is_array($opacHide)) {
            $useMinMax = false;
            if (isset($opacHide['min'])) {
                $this->addUsingAlias(BiblioPeer::OPAC_HIDE, $opacHide['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($opacHide['max'])) {
                $this->addUsingAlias(BiblioPeer::OPAC_HIDE, $opacHide['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiblioPeer::OPAC_HIDE, $opacHide, $comparison);
    }

    /**
     * Filter the query on the promoted column
     *
     * Example usage:
     * <code>
     * $query->filterByPromoted(1234); // WHERE promoted = 1234
     * $query->filterByPromoted(array(12, 34)); // WHERE promoted IN (12, 34)
     * $query->filterByPromoted(array('min' => 12)); // WHERE promoted >= 12
     * $query->filterByPromoted(array('max' => 12)); // WHERE promoted <= 12
     * </code>
     *
     * @param     mixed $promoted The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByPromoted($promoted = null, $comparison = null)
    {
        if (is_array($promoted)) {
            $useMinMax = false;
            if (isset($promoted['min'])) {
                $this->addUsingAlias(BiblioPeer::PROMOTED, $promoted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($promoted['max'])) {
                $this->addUsingAlias(BiblioPeer::PROMOTED, $promoted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiblioPeer::PROMOTED, $promoted, $comparison);
    }

    /**
     * Filter the query on the labels column
     *
     * Example usage:
     * <code>
     * $query->filterByLabels('fooValue');   // WHERE labels = 'fooValue'
     * $query->filterByLabels('%fooValue%'); // WHERE labels LIKE '%fooValue%'
     * </code>
     *
     * @param     string $labels The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByLabels($labels = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labels)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $labels)) {
                $labels = str_replace('*', '%', $labels);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::LABELS, $labels, $comparison);
    }

    /**
     * Filter the query on the paper_printing_spec column
     *
     * Example usage:
     * <code>
     * $query->filterByPaperPrintingSpec('fooValue');   // WHERE paper_printing_spec = 'fooValue'
     * $query->filterByPaperPrintingSpec('%fooValue%'); // WHERE paper_printing_spec LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paperPrintingSpec The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByPaperPrintingSpec($paperPrintingSpec = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paperPrintingSpec)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paperPrintingSpec)) {
                $paperPrintingSpec = str_replace('*', '%', $paperPrintingSpec);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BiblioPeer::PAPER_PRINTING_SPEC, $paperPrintingSpec, $comparison);
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
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BiblioPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BiblioPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiblioPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BiblioPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BiblioPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiblioPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BiblioQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(BiblioPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(BiblioPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiblioPeer::EXPIRED_DATE, $expiredDate, $comparison);
    }

    /**
     * Filter the query by a related Classifications object
     *
     * @param   Classifications|PropelObjectCollection $classifications The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassifications($classifications, $comparison = null)
    {
        if ($classifications instanceof Classifications) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_CLASSIFICATION, $classifications->getIdClassification(), $comparison);
        } elseif ($classifications instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BiblioPeer::ID_CLASSIFICATION, $classifications->toKeyValue('PrimaryKey', 'IdClassification'), $comparison);
        } else {
            throw new PropelException('filterByClassifications() only accepts arguments of type Classifications or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Classifications relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinClassifications($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Classifications');

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
            $this->addJoinObject($join, 'Classifications');
        }

        return $this;
    }

    /**
     * Use the Classifications relation Classifications object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\ClassificationsQuery A secondary query class using the current class as primary query
     */
    public function useClassificationsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClassifications($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Classifications', '\DataDikdas\Model\ClassificationsQuery');
    }

    /**
     * Filter the query by a related Frequency object
     *
     * @param   Frequency|PropelObjectCollection $frequency The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFrequency($frequency, $comparison = null)
    {
        if ($frequency instanceof Frequency) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_FREQ, $frequency->getIdFreq(), $comparison);
        } elseif ($frequency instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BiblioPeer::ID_FREQ, $frequency->toKeyValue('PrimaryKey', 'IdFreq'), $comparison);
        } else {
            throw new PropelException('filterByFrequency() only accepts arguments of type Frequency or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Frequency relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinFrequency($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Frequency');

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
            $this->addJoinObject($join, 'Frequency');
        }

        return $this;
    }

    /**
     * Use the Frequency relation Frequency object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\FrequencyQuery A secondary query class using the current class as primary query
     */
    public function useFrequencyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFrequency($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Frequency', '\DataDikdas\Model\FrequencyQuery');
    }

    /**
     * Filter the query by a related Gmd object
     *
     * @param   Gmd|PropelObjectCollection $gmd The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGmd($gmd, $comparison = null)
    {
        if ($gmd instanceof Gmd) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_GMD, $gmd->getIdGmd(), $comparison);
        } elseif ($gmd instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BiblioPeer::ID_GMD, $gmd->toKeyValue('PrimaryKey', 'IdGmd'), $comparison);
        } else {
            throw new PropelException('filterByGmd() only accepts arguments of type Gmd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Gmd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinGmd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Gmd');

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
            $this->addJoinObject($join, 'Gmd');
        }

        return $this;
    }

    /**
     * Use the Gmd relation Gmd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\GmdQuery A secondary query class using the current class as primary query
     */
    public function useGmdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGmd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Gmd', '\DataDikdas\Model\GmdQuery');
    }

    /**
     * Filter the query by a related Negara object
     *
     * @param   Negara|PropelObjectCollection $negara The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNegara($negara, $comparison = null)
    {
        if ($negara instanceof Negara) {
            return $this
                ->addUsingAlias(BiblioPeer::NEGARA_ID, $negara->getNegaraId(), $comparison);
        } elseif ($negara instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BiblioPeer::NEGARA_ID, $negara->toKeyValue('PrimaryKey', 'NegaraId'), $comparison);
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
     * @return BiblioQuery The current query, for fluid interface
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
     * Filter the query by a related Buku object
     *
     * @param   Buku|PropelObjectCollection $buku  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBuku($buku, $comparison = null)
    {
        if ($buku instanceof Buku) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_BIBLIO, $buku->getIdBiblio(), $comparison);
        } elseif ($buku instanceof PropelObjectCollection) {
            return $this
                ->useBukuQuery()
                ->filterByPrimaryKeys($buku->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBuku() only accepts arguments of type Buku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Buku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinBuku($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Buku');

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
            $this->addJoinObject($join, 'Buku');
        }

        return $this;
    }

    /**
     * Use the Buku relation Buku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuQuery A secondary query class using the current class as primary query
     */
    public function useBukuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Buku', '\DataDikdas\Model\BukuQuery');
    }

    /**
     * Filter the query by a related BukuPelajaran object
     *
     * @param   BukuPelajaran|PropelObjectCollection $bukuPelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBukuPelajaran($bukuPelajaran, $comparison = null)
    {
        if ($bukuPelajaran instanceof BukuPelajaran) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_BIBLIO, $bukuPelajaran->getIdBiblio(), $comparison);
        } elseif ($bukuPelajaran instanceof PropelObjectCollection) {
            return $this
                ->useBukuPelajaranQuery()
                ->filterByPrimaryKeys($bukuPelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBukuPelajaran() only accepts arguments of type BukuPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BukuPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinBukuPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BukuPelajaran');

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
            $this->addJoinObject($join, 'BukuPelajaran');
        }

        return $this;
    }

    /**
     * Use the BukuPelajaran relation BukuPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useBukuPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBukuPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BukuPelajaran', '\DataDikdas\Model\BukuPelajaranQuery');
    }

    /**
     * Filter the query by a related DaftarAuthor object
     *
     * @param   DaftarAuthor|PropelObjectCollection $daftarAuthor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDaftarAuthor($daftarAuthor, $comparison = null)
    {
        if ($daftarAuthor instanceof DaftarAuthor) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_BIBLIO, $daftarAuthor->getIdBiblio(), $comparison);
        } elseif ($daftarAuthor instanceof PropelObjectCollection) {
            return $this
                ->useDaftarAuthorQuery()
                ->filterByPrimaryKeys($daftarAuthor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDaftarAuthor() only accepts arguments of type DaftarAuthor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DaftarAuthor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinDaftarAuthor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DaftarAuthor');

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
            $this->addJoinObject($join, 'DaftarAuthor');
        }

        return $this;
    }

    /**
     * Use the DaftarAuthor relation DaftarAuthor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DaftarAuthorQuery A secondary query class using the current class as primary query
     */
    public function useDaftarAuthorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDaftarAuthor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DaftarAuthor', '\DataDikdas\Model\DaftarAuthorQuery');
    }

    /**
     * Filter the query by a related MapelBiblio object
     *
     * @param   MapelBiblio|PropelObjectCollection $mapelBiblio  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMapelBiblio($mapelBiblio, $comparison = null)
    {
        if ($mapelBiblio instanceof MapelBiblio) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_BIBLIO, $mapelBiblio->getIdBiblio(), $comparison);
        } elseif ($mapelBiblio instanceof PropelObjectCollection) {
            return $this
                ->useMapelBiblioQuery()
                ->filterByPrimaryKeys($mapelBiblio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapelBiblio() only accepts arguments of type MapelBiblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapelBiblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinMapelBiblio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapelBiblio');

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
            $this->addJoinObject($join, 'MapelBiblio');
        }

        return $this;
    }

    /**
     * Use the MapelBiblio relation MapelBiblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MapelBiblioQuery A secondary query class using the current class as primary query
     */
    public function useMapelBiblioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapelBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapelBiblio', '\DataDikdas\Model\MapelBiblioQuery');
    }

    /**
     * Filter the query by a related TingkatBiblio object
     *
     * @param   TingkatBiblio|PropelObjectCollection $tingkatBiblio  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BiblioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatBiblio($tingkatBiblio, $comparison = null)
    {
        if ($tingkatBiblio instanceof TingkatBiblio) {
            return $this
                ->addUsingAlias(BiblioPeer::ID_BIBLIO, $tingkatBiblio->getIdBiblio(), $comparison);
        } elseif ($tingkatBiblio instanceof PropelObjectCollection) {
            return $this
                ->useTingkatBiblioQuery()
                ->filterByPrimaryKeys($tingkatBiblio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTingkatBiblio() only accepts arguments of type TingkatBiblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatBiblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function joinTingkatBiblio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatBiblio');

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
            $this->addJoinObject($join, 'TingkatBiblio');
        }

        return $this;
    }

    /**
     * Use the TingkatBiblio relation TingkatBiblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatBiblioQuery A secondary query class using the current class as primary query
     */
    public function useTingkatBiblioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatBiblio', '\DataDikdas\Model\TingkatBiblioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Biblio $biblio Object to remove from the list of results
     *
     * @return BiblioQuery The current query, for fluid interface
     */
    public function prune($biblio = null)
    {
        if ($biblio) {
            $this->addUsingAlias(BiblioPeer::ID_BIBLIO, $biblio->getIdBiblio(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
