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
use DataDikdas\Model\Classifications;
use DataDikdas\Model\ClassificationsPeer;
use DataDikdas\Model\ClassificationsQuery;

/**
 * Base class that represents a query for the 'pustaka.classifications' table.
 *
 * 
 *
 * @method ClassificationsQuery orderByIdClassification($order = Criteria::ASC) Order by the id_classification column
 * @method ClassificationsQuery orderByIdClassificationParent($order = Criteria::ASC) Order by the id_classification_parent column
 * @method ClassificationsQuery orderByClassificationName($order = Criteria::ASC) Order by the classification_name column
 * @method ClassificationsQuery orderByParentPath($order = Criteria::ASC) Order by the parent_path column
 * @method ClassificationsQuery orderByAssessmentTemplateId($order = Criteria::ASC) Order by the assessment_template_id column
 * @method ClassificationsQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method ClassificationsQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method ClassificationsQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method ClassificationsQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method ClassificationsQuery groupByIdClassification() Group by the id_classification column
 * @method ClassificationsQuery groupByIdClassificationParent() Group by the id_classification_parent column
 * @method ClassificationsQuery groupByClassificationName() Group by the classification_name column
 * @method ClassificationsQuery groupByParentPath() Group by the parent_path column
 * @method ClassificationsQuery groupByAssessmentTemplateId() Group by the assessment_template_id column
 * @method ClassificationsQuery groupByCreateDate() Group by the create_date column
 * @method ClassificationsQuery groupByLastUpdate() Group by the last_update column
 * @method ClassificationsQuery groupByExpiredDate() Group by the expired_date column
 * @method ClassificationsQuery groupByLastSync() Group by the last_sync column
 *
 * @method ClassificationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClassificationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClassificationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClassificationsQuery leftJoinClassificationsRelatedByIdClassificationParent($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClassificationsRelatedByIdClassificationParent relation
 * @method ClassificationsQuery rightJoinClassificationsRelatedByIdClassificationParent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClassificationsRelatedByIdClassificationParent relation
 * @method ClassificationsQuery innerJoinClassificationsRelatedByIdClassificationParent($relationAlias = null) Adds a INNER JOIN clause to the query using the ClassificationsRelatedByIdClassificationParent relation
 *
 * @method ClassificationsQuery leftJoinBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Biblio relation
 * @method ClassificationsQuery rightJoinBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Biblio relation
 * @method ClassificationsQuery innerJoinBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the Biblio relation
 *
 * @method ClassificationsQuery leftJoinClassificationsRelatedByIdClassification($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClassificationsRelatedByIdClassification relation
 * @method ClassificationsQuery rightJoinClassificationsRelatedByIdClassification($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClassificationsRelatedByIdClassification relation
 * @method ClassificationsQuery innerJoinClassificationsRelatedByIdClassification($relationAlias = null) Adds a INNER JOIN clause to the query using the ClassificationsRelatedByIdClassification relation
 *
 * @method Classifications findOne(PropelPDO $con = null) Return the first Classifications matching the query
 * @method Classifications findOneOrCreate(PropelPDO $con = null) Return the first Classifications matching the query, or a new Classifications object populated from the query conditions when no match is found
 *
 * @method Classifications findOneByIdClassificationParent(string $id_classification_parent) Return the first Classifications filtered by the id_classification_parent column
 * @method Classifications findOneByClassificationName(string $classification_name) Return the first Classifications filtered by the classification_name column
 * @method Classifications findOneByParentPath(string $parent_path) Return the first Classifications filtered by the parent_path column
 * @method Classifications findOneByAssessmentTemplateId(int $assessment_template_id) Return the first Classifications filtered by the assessment_template_id column
 * @method Classifications findOneByCreateDate(string $create_date) Return the first Classifications filtered by the create_date column
 * @method Classifications findOneByLastUpdate(string $last_update) Return the first Classifications filtered by the last_update column
 * @method Classifications findOneByExpiredDate(string $expired_date) Return the first Classifications filtered by the expired_date column
 * @method Classifications findOneByLastSync(string $last_sync) Return the first Classifications filtered by the last_sync column
 *
 * @method array findByIdClassification(string $id_classification) Return Classifications objects filtered by the id_classification column
 * @method array findByIdClassificationParent(string $id_classification_parent) Return Classifications objects filtered by the id_classification_parent column
 * @method array findByClassificationName(string $classification_name) Return Classifications objects filtered by the classification_name column
 * @method array findByParentPath(string $parent_path) Return Classifications objects filtered by the parent_path column
 * @method array findByAssessmentTemplateId(int $assessment_template_id) Return Classifications objects filtered by the assessment_template_id column
 * @method array findByCreateDate(string $create_date) Return Classifications objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Classifications objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Classifications objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Classifications objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseClassificationsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClassificationsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Classifications', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClassificationsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClassificationsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClassificationsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClassificationsQuery) {
            return $criteria;
        }
        $query = new ClassificationsQuery();
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
     * @return   Classifications|Classifications[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClassificationsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClassificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Classifications A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdClassification($key, $con = null)
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
     * @return                 Classifications A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_classification", "id_classification_parent", "classification_name", "parent_path", "assessment_template_id", "create_date", "last_update", "expired_date", "last_sync" FROM "pustaka"."classifications" WHERE "id_classification" = :p0';
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
            $obj = new Classifications();
            $obj->hydrate($row);
            ClassificationsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Classifications|Classifications[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Classifications[]|mixed the list of results, formatted by the current formatter
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
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION, $keys, Criteria::IN);
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
     * @return ClassificationsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION, $idClassification, $comparison);
    }

    /**
     * Filter the query on the id_classification_parent column
     *
     * Example usage:
     * <code>
     * $query->filterByIdClassificationParent('fooValue');   // WHERE id_classification_parent = 'fooValue'
     * $query->filterByIdClassificationParent('%fooValue%'); // WHERE id_classification_parent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idClassificationParent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByIdClassificationParent($idClassificationParent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idClassificationParent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idClassificationParent)) {
                $idClassificationParent = str_replace('*', '%', $idClassificationParent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION_PARENT, $idClassificationParent, $comparison);
    }

    /**
     * Filter the query on the classification_name column
     *
     * Example usage:
     * <code>
     * $query->filterByClassificationName('fooValue');   // WHERE classification_name = 'fooValue'
     * $query->filterByClassificationName('%fooValue%'); // WHERE classification_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classificationName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByClassificationName($classificationName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classificationName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classificationName)) {
                $classificationName = str_replace('*', '%', $classificationName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::CLASSIFICATION_NAME, $classificationName, $comparison);
    }

    /**
     * Filter the query on the parent_path column
     *
     * Example usage:
     * <code>
     * $query->filterByParentPath('fooValue');   // WHERE parent_path = 'fooValue'
     * $query->filterByParentPath('%fooValue%'); // WHERE parent_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $parentPath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByParentPath($parentPath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($parentPath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $parentPath)) {
                $parentPath = str_replace('*', '%', $parentPath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::PARENT_PATH, $parentPath, $comparison);
    }

    /**
     * Filter the query on the assessment_template_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAssessmentTemplateId(1234); // WHERE assessment_template_id = 1234
     * $query->filterByAssessmentTemplateId(array(12, 34)); // WHERE assessment_template_id IN (12, 34)
     * $query->filterByAssessmentTemplateId(array('min' => 12)); // WHERE assessment_template_id >= 12
     * $query->filterByAssessmentTemplateId(array('max' => 12)); // WHERE assessment_template_id <= 12
     * </code>
     *
     * @param     mixed $assessmentTemplateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByAssessmentTemplateId($assessmentTemplateId = null, $comparison = null)
    {
        if (is_array($assessmentTemplateId)) {
            $useMinMax = false;
            if (isset($assessmentTemplateId['min'])) {
                $this->addUsingAlias(ClassificationsPeer::ASSESSMENT_TEMPLATE_ID, $assessmentTemplateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($assessmentTemplateId['max'])) {
                $this->addUsingAlias(ClassificationsPeer::ASSESSMENT_TEMPLATE_ID, $assessmentTemplateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::ASSESSMENT_TEMPLATE_ID, $assessmentTemplateId, $comparison);
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
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(ClassificationsPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(ClassificationsPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(ClassificationsPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(ClassificationsPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(ClassificationsPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(ClassificationsPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(ClassificationsPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(ClassificationsPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassificationsPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Classifications object
     *
     * @param   Classifications|PropelObjectCollection $classifications The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClassificationsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassificationsRelatedByIdClassificationParent($classifications, $comparison = null)
    {
        if ($classifications instanceof Classifications) {
            return $this
                ->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION_PARENT, $classifications->getIdClassification(), $comparison);
        } elseif ($classifications instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION_PARENT, $classifications->toKeyValue('PrimaryKey', 'IdClassification'), $comparison);
        } else {
            throw new PropelException('filterByClassificationsRelatedByIdClassificationParent() only accepts arguments of type Classifications or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClassificationsRelatedByIdClassificationParent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function joinClassificationsRelatedByIdClassificationParent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClassificationsRelatedByIdClassificationParent');

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
            $this->addJoinObject($join, 'ClassificationsRelatedByIdClassificationParent');
        }

        return $this;
    }

    /**
     * Use the ClassificationsRelatedByIdClassificationParent relation Classifications object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\ClassificationsQuery A secondary query class using the current class as primary query
     */
    public function useClassificationsRelatedByIdClassificationParentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClassificationsRelatedByIdClassificationParent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClassificationsRelatedByIdClassificationParent', '\DataDikdas\Model\ClassificationsQuery');
    }

    /**
     * Filter the query by a related Biblio object
     *
     * @param   Biblio|PropelObjectCollection $biblio  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClassificationsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBiblio($biblio, $comparison = null)
    {
        if ($biblio instanceof Biblio) {
            return $this
                ->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION, $biblio->getIdClassification(), $comparison);
        } elseif ($biblio instanceof PropelObjectCollection) {
            return $this
                ->useBiblioQuery()
                ->filterByPrimaryKeys($biblio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBiblio() only accepts arguments of type Biblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Biblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function joinBiblio($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Biblio');

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
            $this->addJoinObject($join, 'Biblio');
        }

        return $this;
    }

    /**
     * Use the Biblio relation Biblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BiblioQuery A secondary query class using the current class as primary query
     */
    public function useBiblioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Biblio', '\DataDikdas\Model\BiblioQuery');
    }

    /**
     * Filter the query by a related Classifications object
     *
     * @param   Classifications|PropelObjectCollection $classifications  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClassificationsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClassificationsRelatedByIdClassification($classifications, $comparison = null)
    {
        if ($classifications instanceof Classifications) {
            return $this
                ->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION, $classifications->getIdClassificationParent(), $comparison);
        } elseif ($classifications instanceof PropelObjectCollection) {
            return $this
                ->useClassificationsRelatedByIdClassificationQuery()
                ->filterByPrimaryKeys($classifications->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClassificationsRelatedByIdClassification() only accepts arguments of type Classifications or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClassificationsRelatedByIdClassification relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function joinClassificationsRelatedByIdClassification($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClassificationsRelatedByIdClassification');

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
            $this->addJoinObject($join, 'ClassificationsRelatedByIdClassification');
        }

        return $this;
    }

    /**
     * Use the ClassificationsRelatedByIdClassification relation Classifications object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\ClassificationsQuery A secondary query class using the current class as primary query
     */
    public function useClassificationsRelatedByIdClassificationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClassificationsRelatedByIdClassification($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClassificationsRelatedByIdClassification', '\DataDikdas\Model\ClassificationsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Classifications $classifications Object to remove from the list of results
     *
     * @return ClassificationsQuery The current query, for fluid interface
     */
    public function prune($classifications = null)
    {
        if ($classifications) {
            $this->addUsingAlias(ClassificationsPeer::ID_CLASSIFICATION, $classifications->getIdClassification(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
