<?php

namespace DataDikdas\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Biblio;
use DataDikdas\Model\BiblioQuery;
use DataDikdas\Model\Classifications;
use DataDikdas\Model\ClassificationsPeer;
use DataDikdas\Model\ClassificationsQuery;

/**
 * Base class that represents a row from the 'pustaka.classifications' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseClassifications extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\ClassificationsPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClassificationsPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_classification field.
     * @var        string
     */
    protected $id_classification;

    /**
     * The value for the id_classification_parent field.
     * @var        string
     */
    protected $id_classification_parent;

    /**
     * The value for the classification_name field.
     * @var        string
     */
    protected $classification_name;

    /**
     * The value for the parent_path field.
     * @var        string
     */
    protected $parent_path;

    /**
     * The value for the assessment_template_id field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $assessment_template_id;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $last_update;

    /**
     * The value for the expired_date field.
     * @var        string
     */
    protected $expired_date;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * @var        Classifications
     */
    protected $aClassificationsRelatedByIdClassificationParent;

    /**
     * @var        PropelObjectCollection|Biblio[] Collection to store aggregation of Biblio objects.
     */
    protected $collBiblios;
    protected $collBibliosPartial;

    /**
     * @var        PropelObjectCollection|Classifications[] Collection to store aggregation of Classifications objects.
     */
    protected $collClassificationssRelatedByIdClassification;
    protected $collClassificationssRelatedByIdClassificationPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bibliosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $classificationssRelatedByIdClassificationScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->assessment_template_id = 1;
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseClassifications object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_classification] column value.
     * 
     * @return string
     */
    public function getIdClassification()
    {
        return $this->id_classification;
    }

    /**
     * Get the [id_classification_parent] column value.
     * 
     * @return string
     */
    public function getIdClassificationParent()
    {
        return $this->id_classification_parent;
    }

    /**
     * Get the [classification_name] column value.
     * 
     * @return string
     */
    public function getClassificationName()
    {
        return $this->classification_name;
    }

    /**
     * Get the [parent_path] column value.
     * 
     * @return string
     */
    public function getParentPath()
    {
        return $this->parent_path;
    }

    /**
     * Get the [assessment_template_id] column value.
     * 
     * @return int
     */
    public function getAssessmentTemplateId()
    {
        return $this->assessment_template_id;
    }

    /**
     * Get the [optionally formatted] temporal [create_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateDate($format = 'Y-m-d H:i:s')
    {
        if ($this->create_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->create_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->create_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_update] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdate($format = 'Y-m-d H:i:s')
    {
        if ($this->last_update === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_update);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_update, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [expired_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpiredDate($format = 'Y-m-d H:i:s')
    {
        if ($this->expired_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->expired_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expired_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_sync] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastSync($format = 'Y-m-d H:i:s')
    {
        if ($this->last_sync === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_sync);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_sync, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Set the value of [id_classification] column.
     * 
     * @param string $v new value
     * @return Classifications The current object (for fluent API support)
     */
    public function setIdClassification($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_classification !== $v) {
            $this->id_classification = $v;
            $this->modifiedColumns[] = ClassificationsPeer::ID_CLASSIFICATION;
        }


        return $this;
    } // setIdClassification()

    /**
     * Set the value of [id_classification_parent] column.
     * 
     * @param string $v new value
     * @return Classifications The current object (for fluent API support)
     */
    public function setIdClassificationParent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_classification_parent !== $v) {
            $this->id_classification_parent = $v;
            $this->modifiedColumns[] = ClassificationsPeer::ID_CLASSIFICATION_PARENT;
        }

        if ($this->aClassificationsRelatedByIdClassificationParent !== null && $this->aClassificationsRelatedByIdClassificationParent->getIdClassification() !== $v) {
            $this->aClassificationsRelatedByIdClassificationParent = null;
        }


        return $this;
    } // setIdClassificationParent()

    /**
     * Set the value of [classification_name] column.
     * 
     * @param string $v new value
     * @return Classifications The current object (for fluent API support)
     */
    public function setClassificationName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->classification_name !== $v) {
            $this->classification_name = $v;
            $this->modifiedColumns[] = ClassificationsPeer::CLASSIFICATION_NAME;
        }


        return $this;
    } // setClassificationName()

    /**
     * Set the value of [parent_path] column.
     * 
     * @param string $v new value
     * @return Classifications The current object (for fluent API support)
     */
    public function setParentPath($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parent_path !== $v) {
            $this->parent_path = $v;
            $this->modifiedColumns[] = ClassificationsPeer::PARENT_PATH;
        }


        return $this;
    } // setParentPath()

    /**
     * Set the value of [assessment_template_id] column.
     * 
     * @param int $v new value
     * @return Classifications The current object (for fluent API support)
     */
    public function setAssessmentTemplateId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->assessment_template_id !== $v) {
            $this->assessment_template_id = $v;
            $this->modifiedColumns[] = ClassificationsPeer::ASSESSMENT_TEMPLATE_ID;
        }


        return $this;
    } // setAssessmentTemplateId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Classifications The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = ClassificationsPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Classifications The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = ClassificationsPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Classifications The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = ClassificationsPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Classifications The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->last_sync !== null && $tmpDt = new DateTime($this->last_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '1901-01-01 00:00:00') // or the entered value matches the default
                 ) {
                $this->last_sync = $newDateAsString;
                $this->modifiedColumns[] = ClassificationsPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->assessment_template_id !== 1) {
                return false;
            }

            if ($this->last_sync !== '1901-01-01 00:00:00') {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_classification = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->id_classification_parent = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->classification_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->parent_path = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->assessment_template_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->create_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_update = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->expired_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_sync = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = ClassificationsPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Classifications object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aClassificationsRelatedByIdClassificationParent !== null && $this->id_classification_parent !== $this->aClassificationsRelatedByIdClassificationParent->getIdClassification()) {
            $this->aClassificationsRelatedByIdClassificationParent = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ClassificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClassificationsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClassificationsRelatedByIdClassificationParent = null;
            $this->collBiblios = null;

            $this->collClassificationssRelatedByIdClassification = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ClassificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClassificationsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ClassificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ClassificationsPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aClassificationsRelatedByIdClassificationParent !== null) {
                if ($this->aClassificationsRelatedByIdClassificationParent->isModified() || $this->aClassificationsRelatedByIdClassificationParent->isNew()) {
                    $affectedRows += $this->aClassificationsRelatedByIdClassificationParent->save($con);
                }
                $this->setClassificationsRelatedByIdClassificationParent($this->aClassificationsRelatedByIdClassificationParent);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->bibliosScheduledForDeletion !== null) {
                if (!$this->bibliosScheduledForDeletion->isEmpty()) {
                    foreach ($this->bibliosScheduledForDeletion as $biblio) {
                        // need to save related object because we set the relation to null
                        $biblio->save($con);
                    }
                    $this->bibliosScheduledForDeletion = null;
                }
            }

            if ($this->collBiblios !== null) {
                foreach ($this->collBiblios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->classificationssRelatedByIdClassificationScheduledForDeletion !== null) {
                if (!$this->classificationssRelatedByIdClassificationScheduledForDeletion->isEmpty()) {
                    foreach ($this->classificationssRelatedByIdClassificationScheduledForDeletion as $classificationsRelatedByIdClassification) {
                        // need to save related object because we set the relation to null
                        $classificationsRelatedByIdClassification->save($con);
                    }
                    $this->classificationssRelatedByIdClassificationScheduledForDeletion = null;
                }
            }

            if ($this->collClassificationssRelatedByIdClassification !== null) {
                foreach ($this->collClassificationssRelatedByIdClassification as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClassificationsPeer::ID_CLASSIFICATION)) {
            $modifiedColumns[':p' . $index++]  = '"id_classification"';
        }
        if ($this->isColumnModified(ClassificationsPeer::ID_CLASSIFICATION_PARENT)) {
            $modifiedColumns[':p' . $index++]  = '"id_classification_parent"';
        }
        if ($this->isColumnModified(ClassificationsPeer::CLASSIFICATION_NAME)) {
            $modifiedColumns[':p' . $index++]  = '"classification_name"';
        }
        if ($this->isColumnModified(ClassificationsPeer::PARENT_PATH)) {
            $modifiedColumns[':p' . $index++]  = '"parent_path"';
        }
        if ($this->isColumnModified(ClassificationsPeer::ASSESSMENT_TEMPLATE_ID)) {
            $modifiedColumns[':p' . $index++]  = '"assessment_template_id"';
        }
        if ($this->isColumnModified(ClassificationsPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(ClassificationsPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(ClassificationsPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(ClassificationsPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "pustaka"."classifications" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_classification"':						
                        $stmt->bindValue($identifier, $this->id_classification, PDO::PARAM_STR);
                        break;
                    case '"id_classification_parent"':						
                        $stmt->bindValue($identifier, $this->id_classification_parent, PDO::PARAM_STR);
                        break;
                    case '"classification_name"':						
                        $stmt->bindValue($identifier, $this->classification_name, PDO::PARAM_STR);
                        break;
                    case '"parent_path"':						
                        $stmt->bindValue($identifier, $this->parent_path, PDO::PARAM_STR);
                        break;
                    case '"assessment_template_id"':						
                        $stmt->bindValue($identifier, $this->assessment_template_id, PDO::PARAM_INT);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aClassificationsRelatedByIdClassificationParent !== null) {
                if (!$this->aClassificationsRelatedByIdClassificationParent->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClassificationsRelatedByIdClassificationParent->getValidationFailures());
                }
            }


            if (($retval = ClassificationsPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBiblios !== null) {
                    foreach ($this->collBiblios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClassificationssRelatedByIdClassification !== null) {
                    foreach ($this->collClassificationssRelatedByIdClassification as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_FIELDNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = ClassificationsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdClassification();
                break;
            case 1:
                return $this->getIdClassificationParent();
                break;
            case 2:
                return $this->getClassificationName();
                break;
            case 3:
                return $this->getParentPath();
                break;
            case 4:
                return $this->getAssessmentTemplateId();
                break;
            case 5:
                return $this->getCreateDate();
                break;
            case 6:
                return $this->getLastUpdate();
                break;
            case 7:
                return $this->getExpiredDate();
                break;
            case 8:
                return $this->getLastSync();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Classifications'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Classifications'][$this->getPrimaryKey()] = true;
        $keys = ClassificationsPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdClassification(),
            $keys[1] => $this->getIdClassificationParent(),
            $keys[2] => $this->getClassificationName(),
            $keys[3] => $this->getParentPath(),
            $keys[4] => $this->getAssessmentTemplateId(),
            $keys[5] => $this->getCreateDate(),
            $keys[6] => $this->getLastUpdate(),
            $keys[7] => $this->getExpiredDate(),
            $keys[8] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aClassificationsRelatedByIdClassificationParent) {
                $result['ClassificationsRelatedByIdClassificationParent'] = $this->aClassificationsRelatedByIdClassificationParent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBiblios) {
                $result['Biblios'] = $this->collBiblios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClassificationssRelatedByIdClassification) {
                $result['ClassificationssRelatedByIdClassification'] = $this->collClassificationssRelatedByIdClassification->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_FIELDNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = ClassificationsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdClassification($value);
                break;
            case 1:
                $this->setIdClassificationParent($value);
                break;
            case 2:
                $this->setClassificationName($value);
                break;
            case 3:
                $this->setParentPath($value);
                break;
            case 4:
                $this->setAssessmentTemplateId($value);
                break;
            case 5:
                $this->setCreateDate($value);
                break;
            case 6:
                $this->setLastUpdate($value);
                break;
            case 7:
                $this->setExpiredDate($value);
                break;
            case 8:
                $this->setLastSync($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_FIELDNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = ClassificationsPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdClassification($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdClassificationParent($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setClassificationName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setParentPath($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAssessmentTemplateId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreateDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastUpdate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setExpiredDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastSync($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClassificationsPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClassificationsPeer::ID_CLASSIFICATION)) $criteria->add(ClassificationsPeer::ID_CLASSIFICATION, $this->id_classification);
        if ($this->isColumnModified(ClassificationsPeer::ID_CLASSIFICATION_PARENT)) $criteria->add(ClassificationsPeer::ID_CLASSIFICATION_PARENT, $this->id_classification_parent);
        if ($this->isColumnModified(ClassificationsPeer::CLASSIFICATION_NAME)) $criteria->add(ClassificationsPeer::CLASSIFICATION_NAME, $this->classification_name);
        if ($this->isColumnModified(ClassificationsPeer::PARENT_PATH)) $criteria->add(ClassificationsPeer::PARENT_PATH, $this->parent_path);
        if ($this->isColumnModified(ClassificationsPeer::ASSESSMENT_TEMPLATE_ID)) $criteria->add(ClassificationsPeer::ASSESSMENT_TEMPLATE_ID, $this->assessment_template_id);
        if ($this->isColumnModified(ClassificationsPeer::CREATE_DATE)) $criteria->add(ClassificationsPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(ClassificationsPeer::LAST_UPDATE)) $criteria->add(ClassificationsPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(ClassificationsPeer::EXPIRED_DATE)) $criteria->add(ClassificationsPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(ClassificationsPeer::LAST_SYNC)) $criteria->add(ClassificationsPeer::LAST_SYNC, $this->last_sync);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ClassificationsPeer::DATABASE_NAME);
        $criteria->add(ClassificationsPeer::ID_CLASSIFICATION, $this->id_classification);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdClassification();
    }

    /**
     * Generic method to set the primary key (id_classification column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdClassification($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdClassification();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Classifications (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdClassificationParent($this->getIdClassificationParent());
        $copyObj->setClassificationName($this->getClassificationName());
        $copyObj->setParentPath($this->getParentPath());
        $copyObj->setAssessmentTemplateId($this->getAssessmentTemplateId());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setLastSync($this->getLastSync());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBiblios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBiblio($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClassificationssRelatedByIdClassification() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClassificationsRelatedByIdClassification($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdClassification(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Classifications Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return ClassificationsPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClassificationsPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Classifications object.
     *
     * @param             Classifications $v
     * @return Classifications The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClassificationsRelatedByIdClassificationParent(Classifications $v = null)
    {
        if ($v === null) {
            $this->setIdClassificationParent(NULL);
        } else {
            $this->setIdClassificationParent($v->getIdClassification());
        }

        $this->aClassificationsRelatedByIdClassificationParent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Classifications object, it will not be re-added.
        if ($v !== null) {
            $v->addClassificationsRelatedByIdClassification($this);
        }


        return $this;
    }


    /**
     * Get the associated Classifications object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Classifications The associated Classifications object.
     * @throws PropelException
     */
    public function getClassificationsRelatedByIdClassificationParent(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClassificationsRelatedByIdClassificationParent === null && (($this->id_classification_parent !== "" && $this->id_classification_parent !== null)) && $doQuery) {
            $this->aClassificationsRelatedByIdClassificationParent = ClassificationsQuery::create()->findPk($this->id_classification_parent, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClassificationsRelatedByIdClassificationParent->addClassificationssRelatedByIdClassification($this);
             */
        }

        return $this->aClassificationsRelatedByIdClassificationParent;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Biblio' == $relationName) {
            $this->initBiblios();
        }
        if ('ClassificationsRelatedByIdClassification' == $relationName) {
            $this->initClassificationssRelatedByIdClassification();
        }
    }

    /**
     * Clears out the collBiblios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Classifications The current object (for fluent API support)
     * @see        addBiblios()
     */
    public function clearBiblios()
    {
        $this->collBiblios = null; // important to set this to null since that means it is uninitialized
        $this->collBibliosPartial = null;

        return $this;
    }

    /**
     * reset is the collBiblios collection loaded partially
     *
     * @return void
     */
    public function resetPartialBiblios($v = true)
    {
        $this->collBibliosPartial = $v;
    }

    /**
     * Initializes the collBiblios collection.
     *
     * By default this just sets the collBiblios collection to an empty array (like clearcollBiblios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBiblios($overrideExisting = true)
    {
        if (null !== $this->collBiblios && !$overrideExisting) {
            return;
        }
        $this->collBiblios = new PropelObjectCollection();
        $this->collBiblios->setModel('Biblio');
    }

    /**
     * Gets an array of Biblio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Classifications is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     * @throws PropelException
     */
    public function getBiblios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBibliosPartial && !$this->isNew();
        if (null === $this->collBiblios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBiblios) {
                // return empty collection
                $this->initBiblios();
            } else {
                $collBiblios = BiblioQuery::create(null, $criteria)
                    ->filterByClassifications($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBibliosPartial && count($collBiblios)) {
                      $this->initBiblios(false);

                      foreach($collBiblios as $obj) {
                        if (false == $this->collBiblios->contains($obj)) {
                          $this->collBiblios->append($obj);
                        }
                      }

                      $this->collBibliosPartial = true;
                    }

                    $collBiblios->getInternalIterator()->rewind();
                    return $collBiblios;
                }

                if($partial && $this->collBiblios) {
                    foreach($this->collBiblios as $obj) {
                        if($obj->isNew()) {
                            $collBiblios[] = $obj;
                        }
                    }
                }

                $this->collBiblios = $collBiblios;
                $this->collBibliosPartial = false;
            }
        }

        return $this->collBiblios;
    }

    /**
     * Sets a collection of Biblio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $biblios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Classifications The current object (for fluent API support)
     */
    public function setBiblios(PropelCollection $biblios, PropelPDO $con = null)
    {
        $bibliosToDelete = $this->getBiblios(new Criteria(), $con)->diff($biblios);

        $this->bibliosScheduledForDeletion = unserialize(serialize($bibliosToDelete));

        foreach ($bibliosToDelete as $biblioRemoved) {
            $biblioRemoved->setClassifications(null);
        }

        $this->collBiblios = null;
        foreach ($biblios as $biblio) {
            $this->addBiblio($biblio);
        }

        $this->collBiblios = $biblios;
        $this->collBibliosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Biblio objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Biblio objects.
     * @throws PropelException
     */
    public function countBiblios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBibliosPartial && !$this->isNew();
        if (null === $this->collBiblios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBiblios) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBiblios());
            }
            $query = BiblioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClassifications($this)
                ->count($con);
        }

        return count($this->collBiblios);
    }

    /**
     * Method called to associate a Biblio object to this object
     * through the Biblio foreign key attribute.
     *
     * @param    Biblio $l Biblio
     * @return Classifications The current object (for fluent API support)
     */
    public function addBiblio(Biblio $l)
    {
        if ($this->collBiblios === null) {
            $this->initBiblios();
            $this->collBibliosPartial = true;
        }
        if (!in_array($l, $this->collBiblios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBiblio($l);
        }

        return $this;
    }

    /**
     * @param	Biblio $biblio The biblio object to add.
     */
    protected function doAddBiblio($biblio)
    {
        $this->collBiblios[]= $biblio;
        $biblio->setClassifications($this);
    }

    /**
     * @param	Biblio $biblio The biblio object to remove.
     * @return Classifications The current object (for fluent API support)
     */
    public function removeBiblio($biblio)
    {
        if ($this->getBiblios()->contains($biblio)) {
            $this->collBiblios->remove($this->collBiblios->search($biblio));
            if (null === $this->bibliosScheduledForDeletion) {
                $this->bibliosScheduledForDeletion = clone $this->collBiblios;
                $this->bibliosScheduledForDeletion->clear();
            }
            $this->bibliosScheduledForDeletion[]= $biblio;
            $biblio->setClassifications(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Classifications is new, it will return
     * an empty collection; or if this Classifications has previously
     * been saved, it will retrieve related Biblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Classifications.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     */
    public function getBibliosJoinFrequency($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BiblioQuery::create(null, $criteria);
        $query->joinWith('Frequency', $join_behavior);

        return $this->getBiblios($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Classifications is new, it will return
     * an empty collection; or if this Classifications has previously
     * been saved, it will retrieve related Biblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Classifications.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     */
    public function getBibliosJoinGmd($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BiblioQuery::create(null, $criteria);
        $query->joinWith('Gmd', $join_behavior);

        return $this->getBiblios($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Classifications is new, it will return
     * an empty collection; or if this Classifications has previously
     * been saved, it will retrieve related Biblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Classifications.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     */
    public function getBibliosJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BiblioQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getBiblios($query, $con);
    }

    /**
     * Clears out the collClassificationssRelatedByIdClassification collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Classifications The current object (for fluent API support)
     * @see        addClassificationssRelatedByIdClassification()
     */
    public function clearClassificationssRelatedByIdClassification()
    {
        $this->collClassificationssRelatedByIdClassification = null; // important to set this to null since that means it is uninitialized
        $this->collClassificationssRelatedByIdClassificationPartial = null;

        return $this;
    }

    /**
     * reset is the collClassificationssRelatedByIdClassification collection loaded partially
     *
     * @return void
     */
    public function resetPartialClassificationssRelatedByIdClassification($v = true)
    {
        $this->collClassificationssRelatedByIdClassificationPartial = $v;
    }

    /**
     * Initializes the collClassificationssRelatedByIdClassification collection.
     *
     * By default this just sets the collClassificationssRelatedByIdClassification collection to an empty array (like clearcollClassificationssRelatedByIdClassification());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClassificationssRelatedByIdClassification($overrideExisting = true)
    {
        if (null !== $this->collClassificationssRelatedByIdClassification && !$overrideExisting) {
            return;
        }
        $this->collClassificationssRelatedByIdClassification = new PropelObjectCollection();
        $this->collClassificationssRelatedByIdClassification->setModel('Classifications');
    }

    /**
     * Gets an array of Classifications objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Classifications is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Classifications[] List of Classifications objects
     * @throws PropelException
     */
    public function getClassificationssRelatedByIdClassification($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClassificationssRelatedByIdClassificationPartial && !$this->isNew();
        if (null === $this->collClassificationssRelatedByIdClassification || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClassificationssRelatedByIdClassification) {
                // return empty collection
                $this->initClassificationssRelatedByIdClassification();
            } else {
                $collClassificationssRelatedByIdClassification = ClassificationsQuery::create(null, $criteria)
                    ->filterByClassificationsRelatedByIdClassificationParent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClassificationssRelatedByIdClassificationPartial && count($collClassificationssRelatedByIdClassification)) {
                      $this->initClassificationssRelatedByIdClassification(false);

                      foreach($collClassificationssRelatedByIdClassification as $obj) {
                        if (false == $this->collClassificationssRelatedByIdClassification->contains($obj)) {
                          $this->collClassificationssRelatedByIdClassification->append($obj);
                        }
                      }

                      $this->collClassificationssRelatedByIdClassificationPartial = true;
                    }

                    $collClassificationssRelatedByIdClassification->getInternalIterator()->rewind();
                    return $collClassificationssRelatedByIdClassification;
                }

                if($partial && $this->collClassificationssRelatedByIdClassification) {
                    foreach($this->collClassificationssRelatedByIdClassification as $obj) {
                        if($obj->isNew()) {
                            $collClassificationssRelatedByIdClassification[] = $obj;
                        }
                    }
                }

                $this->collClassificationssRelatedByIdClassification = $collClassificationssRelatedByIdClassification;
                $this->collClassificationssRelatedByIdClassificationPartial = false;
            }
        }

        return $this->collClassificationssRelatedByIdClassification;
    }

    /**
     * Sets a collection of ClassificationsRelatedByIdClassification objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $classificationssRelatedByIdClassification A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Classifications The current object (for fluent API support)
     */
    public function setClassificationssRelatedByIdClassification(PropelCollection $classificationssRelatedByIdClassification, PropelPDO $con = null)
    {
        $classificationssRelatedByIdClassificationToDelete = $this->getClassificationssRelatedByIdClassification(new Criteria(), $con)->diff($classificationssRelatedByIdClassification);

        $this->classificationssRelatedByIdClassificationScheduledForDeletion = unserialize(serialize($classificationssRelatedByIdClassificationToDelete));

        foreach ($classificationssRelatedByIdClassificationToDelete as $classificationsRelatedByIdClassificationRemoved) {
            $classificationsRelatedByIdClassificationRemoved->setClassificationsRelatedByIdClassificationParent(null);
        }

        $this->collClassificationssRelatedByIdClassification = null;
        foreach ($classificationssRelatedByIdClassification as $classificationsRelatedByIdClassification) {
            $this->addClassificationsRelatedByIdClassification($classificationsRelatedByIdClassification);
        }

        $this->collClassificationssRelatedByIdClassification = $classificationssRelatedByIdClassification;
        $this->collClassificationssRelatedByIdClassificationPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Classifications objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Classifications objects.
     * @throws PropelException
     */
    public function countClassificationssRelatedByIdClassification(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClassificationssRelatedByIdClassificationPartial && !$this->isNew();
        if (null === $this->collClassificationssRelatedByIdClassification || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClassificationssRelatedByIdClassification) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getClassificationssRelatedByIdClassification());
            }
            $query = ClassificationsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClassificationsRelatedByIdClassificationParent($this)
                ->count($con);
        }

        return count($this->collClassificationssRelatedByIdClassification);
    }

    /**
     * Method called to associate a Classifications object to this object
     * through the Classifications foreign key attribute.
     *
     * @param    Classifications $l Classifications
     * @return Classifications The current object (for fluent API support)
     */
    public function addClassificationsRelatedByIdClassification(Classifications $l)
    {
        if ($this->collClassificationssRelatedByIdClassification === null) {
            $this->initClassificationssRelatedByIdClassification();
            $this->collClassificationssRelatedByIdClassificationPartial = true;
        }
        if (!in_array($l, $this->collClassificationssRelatedByIdClassification->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClassificationsRelatedByIdClassification($l);
        }

        return $this;
    }

    /**
     * @param	ClassificationsRelatedByIdClassification $classificationsRelatedByIdClassification The classificationsRelatedByIdClassification object to add.
     */
    protected function doAddClassificationsRelatedByIdClassification($classificationsRelatedByIdClassification)
    {
        $this->collClassificationssRelatedByIdClassification[]= $classificationsRelatedByIdClassification;
        $classificationsRelatedByIdClassification->setClassificationsRelatedByIdClassificationParent($this);
    }

    /**
     * @param	ClassificationsRelatedByIdClassification $classificationsRelatedByIdClassification The classificationsRelatedByIdClassification object to remove.
     * @return Classifications The current object (for fluent API support)
     */
    public function removeClassificationsRelatedByIdClassification($classificationsRelatedByIdClassification)
    {
        if ($this->getClassificationssRelatedByIdClassification()->contains($classificationsRelatedByIdClassification)) {
            $this->collClassificationssRelatedByIdClassification->remove($this->collClassificationssRelatedByIdClassification->search($classificationsRelatedByIdClassification));
            if (null === $this->classificationssRelatedByIdClassificationScheduledForDeletion) {
                $this->classificationssRelatedByIdClassificationScheduledForDeletion = clone $this->collClassificationssRelatedByIdClassification;
                $this->classificationssRelatedByIdClassificationScheduledForDeletion->clear();
            }
            $this->classificationssRelatedByIdClassificationScheduledForDeletion[]= $classificationsRelatedByIdClassification;
            $classificationsRelatedByIdClassification->setClassificationsRelatedByIdClassificationParent(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_classification = null;
        $this->id_classification_parent = null;
        $this->classification_name = null;
        $this->parent_path = null;
        $this->assessment_template_id = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->expired_date = null;
        $this->last_sync = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collBiblios) {
                foreach ($this->collBiblios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClassificationssRelatedByIdClassification) {
                foreach ($this->collClassificationssRelatedByIdClassification as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aClassificationsRelatedByIdClassificationParent instanceof Persistent) {
              $this->aClassificationsRelatedByIdClassificationParent->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBiblios instanceof PropelCollection) {
            $this->collBiblios->clearIterator();
        }
        $this->collBiblios = null;
        if ($this->collClassificationssRelatedByIdClassification instanceof PropelCollection) {
            $this->collClassificationssRelatedByIdClassification->clearIterator();
        }
        $this->collClassificationssRelatedByIdClassification = null;
        $this->aClassificationsRelatedByIdClassificationParent = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClassificationsPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
