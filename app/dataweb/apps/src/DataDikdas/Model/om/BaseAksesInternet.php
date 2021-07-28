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
use DataDikdas\Model\AksesInternet;
use DataDikdas\Model\AksesInternetPeer;
use DataDikdas\Model\AksesInternetQuery;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalQuery;

/**
 * Base class that represents a row from the 'ref.akses_internet' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAksesInternet extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\AksesInternetPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AksesInternetPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the akses_internet_id field.
     * @var        int
     */
    protected $akses_internet_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the media field.
     * @var        string
     */
    protected $media;

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
     * @var        PropelObjectCollection|SekolahLongitudinal[] Collection to store aggregation of SekolahLongitudinal objects.
     */
    protected $collSekolahLongitudinalsRelatedByAksesInternetId;
    protected $collSekolahLongitudinalsRelatedByAksesInternetIdPartial;

    /**
     * @var        PropelObjectCollection|SekolahLongitudinal[] Collection to store aggregation of SekolahLongitudinal objects.
     */
    protected $collSekolahLongitudinalsRelatedByAksesInternet2Id;
    protected $collSekolahLongitudinalsRelatedByAksesInternet2IdPartial;

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
    protected $sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseAksesInternet object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [akses_internet_id] column value.
     * 
     * @return int
     */
    public function getAksesInternetId()
    {
        return $this->akses_internet_id;
    }

    /**
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [media] column value.
     * 
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
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
     * Set the value of [akses_internet_id] column.
     * 
     * @param int $v new value
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setAksesInternetId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->akses_internet_id !== $v) {
            $this->akses_internet_id = $v;
            $this->modifiedColumns[] = AksesInternetPeer::AKSES_INTERNET_ID;
        }


        return $this;
    } // setAksesInternetId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = AksesInternetPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [media] column.
     * 
     * @param string $v new value
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setMedia($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->media !== $v) {
            $this->media = $v;
            $this->modifiedColumns[] = AksesInternetPeer::MEDIA;
        }


        return $this;
    } // setMedia()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = AksesInternetPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = AksesInternetPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = AksesInternetPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AksesInternet The current object (for fluent API support)
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
                $this->modifiedColumns[] = AksesInternetPeer::LAST_SYNC;
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

            $this->akses_internet_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->media = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->create_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->last_update = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->expired_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_sync = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = AksesInternetPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating AksesInternet object", $e);
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
            $con = Propel::getConnection(AksesInternetPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AksesInternetPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSekolahLongitudinalsRelatedByAksesInternetId = null;

            $this->collSekolahLongitudinalsRelatedByAksesInternet2Id = null;

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
            $con = Propel::getConnection(AksesInternetPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AksesInternetQuery::create()
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
            $con = Propel::getConnection(AksesInternetPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AksesInternetPeer::addInstanceToPool($this);
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

            if ($this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion !== null) {
                if (!$this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion as $sekolahLongitudinalRelatedByAksesInternetId) {
                        // need to save related object because we set the relation to null
                        $sekolahLongitudinalRelatedByAksesInternetId->save($con);
                    }
                    $this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahLongitudinalsRelatedByAksesInternetId !== null) {
                foreach ($this->collSekolahLongitudinalsRelatedByAksesInternetId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion !== null) {
                if (!$this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion->isEmpty()) {
                    SekolahLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id !== null) {
                foreach ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id as $referrerFK) {
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
        if ($this->isColumnModified(AksesInternetPeer::AKSES_INTERNET_ID)) {
            $modifiedColumns[':p' . $index++]  = '"akses_internet_id"';
        }
        if ($this->isColumnModified(AksesInternetPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(AksesInternetPeer::MEDIA)) {
            $modifiedColumns[':p' . $index++]  = '"media"';
        }
        if ($this->isColumnModified(AksesInternetPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(AksesInternetPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(AksesInternetPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(AksesInternetPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."akses_internet" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"akses_internet_id"':						
                        $stmt->bindValue($identifier, $this->akses_internet_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"media"':						
                        $stmt->bindValue($identifier, $this->media, PDO::PARAM_STR);
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


            if (($retval = AksesInternetPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSekolahLongitudinalsRelatedByAksesInternetId !== null) {
                    foreach ($this->collSekolahLongitudinalsRelatedByAksesInternetId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id !== null) {
                    foreach ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id as $referrerFK) {
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
        $pos = AksesInternetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAksesInternetId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getMedia();
                break;
            case 3:
                return $this->getCreateDate();
                break;
            case 4:
                return $this->getLastUpdate();
                break;
            case 5:
                return $this->getExpiredDate();
                break;
            case 6:
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
        if (isset($alreadyDumpedObjects['AksesInternet'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AksesInternet'][$this->getPrimaryKey()] = true;
        $keys = AksesInternetPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAksesInternetId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getMedia(),
            $keys[3] => $this->getCreateDate(),
            $keys[4] => $this->getLastUpdate(),
            $keys[5] => $this->getExpiredDate(),
            $keys[6] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collSekolahLongitudinalsRelatedByAksesInternetId) {
                $result['SekolahLongitudinalsRelatedByAksesInternetId'] = $this->collSekolahLongitudinalsRelatedByAksesInternetId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahLongitudinalsRelatedByAksesInternet2Id) {
                $result['SekolahLongitudinalsRelatedByAksesInternet2Id'] = $this->collSekolahLongitudinalsRelatedByAksesInternet2Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = AksesInternetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAksesInternetId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setMedia($value);
                break;
            case 3:
                $this->setCreateDate($value);
                break;
            case 4:
                $this->setLastUpdate($value);
                break;
            case 5:
                $this->setExpiredDate($value);
                break;
            case 6:
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
        $keys = AksesInternetPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setAksesInternetId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMedia($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCreateDate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLastUpdate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setExpiredDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastSync($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AksesInternetPeer::DATABASE_NAME);

        if ($this->isColumnModified(AksesInternetPeer::AKSES_INTERNET_ID)) $criteria->add(AksesInternetPeer::AKSES_INTERNET_ID, $this->akses_internet_id);
        if ($this->isColumnModified(AksesInternetPeer::NAMA)) $criteria->add(AksesInternetPeer::NAMA, $this->nama);
        if ($this->isColumnModified(AksesInternetPeer::MEDIA)) $criteria->add(AksesInternetPeer::MEDIA, $this->media);
        if ($this->isColumnModified(AksesInternetPeer::CREATE_DATE)) $criteria->add(AksesInternetPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(AksesInternetPeer::LAST_UPDATE)) $criteria->add(AksesInternetPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(AksesInternetPeer::EXPIRED_DATE)) $criteria->add(AksesInternetPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(AksesInternetPeer::LAST_SYNC)) $criteria->add(AksesInternetPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(AksesInternetPeer::DATABASE_NAME);
        $criteria->add(AksesInternetPeer::AKSES_INTERNET_ID, $this->akses_internet_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getAksesInternetId();
    }

    /**
     * Generic method to set the primary key (akses_internet_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAksesInternetId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAksesInternetId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of AksesInternet (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setMedia($this->getMedia());
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

            foreach ($this->getSekolahLongitudinalsRelatedByAksesInternetId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahLongitudinalRelatedByAksesInternetId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahLongitudinalsRelatedByAksesInternet2Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahLongitudinalRelatedByAksesInternet2Id($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAksesInternetId(NULL); // this is a auto-increment column, so set to default value
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
     * @return AksesInternet Clone of current object.
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
     * @return AksesInternetPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AksesInternetPeer();
        }

        return self::$peer;
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
        if ('SekolahLongitudinalRelatedByAksesInternetId' == $relationName) {
            $this->initSekolahLongitudinalsRelatedByAksesInternetId();
        }
        if ('SekolahLongitudinalRelatedByAksesInternet2Id' == $relationName) {
            $this->initSekolahLongitudinalsRelatedByAksesInternet2Id();
        }
    }

    /**
     * Clears out the collSekolahLongitudinalsRelatedByAksesInternetId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return AksesInternet The current object (for fluent API support)
     * @see        addSekolahLongitudinalsRelatedByAksesInternetId()
     */
    public function clearSekolahLongitudinalsRelatedByAksesInternetId()
    {
        $this->collSekolahLongitudinalsRelatedByAksesInternetId = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahLongitudinalsRelatedByAksesInternetId collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahLongitudinalsRelatedByAksesInternetId($v = true)
    {
        $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial = $v;
    }

    /**
     * Initializes the collSekolahLongitudinalsRelatedByAksesInternetId collection.
     *
     * By default this just sets the collSekolahLongitudinalsRelatedByAksesInternetId collection to an empty array (like clearcollSekolahLongitudinalsRelatedByAksesInternetId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahLongitudinalsRelatedByAksesInternetId($overrideExisting = true)
    {
        if (null !== $this->collSekolahLongitudinalsRelatedByAksesInternetId && !$overrideExisting) {
            return;
        }
        $this->collSekolahLongitudinalsRelatedByAksesInternetId = new PropelObjectCollection();
        $this->collSekolahLongitudinalsRelatedByAksesInternetId->setModel('SekolahLongitudinal');
    }

    /**
     * Gets an array of SekolahLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this AksesInternet is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     * @throws PropelException
     */
    public function getSekolahLongitudinalsRelatedByAksesInternetId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinalsRelatedByAksesInternetId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinalsRelatedByAksesInternetId) {
                // return empty collection
                $this->initSekolahLongitudinalsRelatedByAksesInternetId();
            } else {
                $collSekolahLongitudinalsRelatedByAksesInternetId = SekolahLongitudinalQuery::create(null, $criteria)
                    ->filterByAksesInternetRelatedByAksesInternetId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial && count($collSekolahLongitudinalsRelatedByAksesInternetId)) {
                      $this->initSekolahLongitudinalsRelatedByAksesInternetId(false);

                      foreach($collSekolahLongitudinalsRelatedByAksesInternetId as $obj) {
                        if (false == $this->collSekolahLongitudinalsRelatedByAksesInternetId->contains($obj)) {
                          $this->collSekolahLongitudinalsRelatedByAksesInternetId->append($obj);
                        }
                      }

                      $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial = true;
                    }

                    $collSekolahLongitudinalsRelatedByAksesInternetId->getInternalIterator()->rewind();
                    return $collSekolahLongitudinalsRelatedByAksesInternetId;
                }

                if($partial && $this->collSekolahLongitudinalsRelatedByAksesInternetId) {
                    foreach($this->collSekolahLongitudinalsRelatedByAksesInternetId as $obj) {
                        if($obj->isNew()) {
                            $collSekolahLongitudinalsRelatedByAksesInternetId[] = $obj;
                        }
                    }
                }

                $this->collSekolahLongitudinalsRelatedByAksesInternetId = $collSekolahLongitudinalsRelatedByAksesInternetId;
                $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial = false;
            }
        }

        return $this->collSekolahLongitudinalsRelatedByAksesInternetId;
    }

    /**
     * Sets a collection of SekolahLongitudinalRelatedByAksesInternetId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahLongitudinalsRelatedByAksesInternetId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setSekolahLongitudinalsRelatedByAksesInternetId(PropelCollection $sekolahLongitudinalsRelatedByAksesInternetId, PropelPDO $con = null)
    {
        $sekolahLongitudinalsRelatedByAksesInternetIdToDelete = $this->getSekolahLongitudinalsRelatedByAksesInternetId(new Criteria(), $con)->diff($sekolahLongitudinalsRelatedByAksesInternetId);

        $this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion = unserialize(serialize($sekolahLongitudinalsRelatedByAksesInternetIdToDelete));

        foreach ($sekolahLongitudinalsRelatedByAksesInternetIdToDelete as $sekolahLongitudinalRelatedByAksesInternetIdRemoved) {
            $sekolahLongitudinalRelatedByAksesInternetIdRemoved->setAksesInternetRelatedByAksesInternetId(null);
        }

        $this->collSekolahLongitudinalsRelatedByAksesInternetId = null;
        foreach ($sekolahLongitudinalsRelatedByAksesInternetId as $sekolahLongitudinalRelatedByAksesInternetId) {
            $this->addSekolahLongitudinalRelatedByAksesInternetId($sekolahLongitudinalRelatedByAksesInternetId);
        }

        $this->collSekolahLongitudinalsRelatedByAksesInternetId = $sekolahLongitudinalsRelatedByAksesInternetId;
        $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahLongitudinal objects.
     * @throws PropelException
     */
    public function countSekolahLongitudinalsRelatedByAksesInternetId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinalsRelatedByAksesInternetId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinalsRelatedByAksesInternetId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahLongitudinalsRelatedByAksesInternetId());
            }
            $query = SekolahLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAksesInternetRelatedByAksesInternetId($this)
                ->count($con);
        }

        return count($this->collSekolahLongitudinalsRelatedByAksesInternetId);
    }

    /**
     * Method called to associate a SekolahLongitudinal object to this object
     * through the SekolahLongitudinal foreign key attribute.
     *
     * @param    SekolahLongitudinal $l SekolahLongitudinal
     * @return AksesInternet The current object (for fluent API support)
     */
    public function addSekolahLongitudinalRelatedByAksesInternetId(SekolahLongitudinal $l)
    {
        if ($this->collSekolahLongitudinalsRelatedByAksesInternetId === null) {
            $this->initSekolahLongitudinalsRelatedByAksesInternetId();
            $this->collSekolahLongitudinalsRelatedByAksesInternetIdPartial = true;
        }
        if (!in_array($l, $this->collSekolahLongitudinalsRelatedByAksesInternetId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahLongitudinalRelatedByAksesInternetId($l);
        }

        return $this;
    }

    /**
     * @param	SekolahLongitudinalRelatedByAksesInternetId $sekolahLongitudinalRelatedByAksesInternetId The sekolahLongitudinalRelatedByAksesInternetId object to add.
     */
    protected function doAddSekolahLongitudinalRelatedByAksesInternetId($sekolahLongitudinalRelatedByAksesInternetId)
    {
        $this->collSekolahLongitudinalsRelatedByAksesInternetId[]= $sekolahLongitudinalRelatedByAksesInternetId;
        $sekolahLongitudinalRelatedByAksesInternetId->setAksesInternetRelatedByAksesInternetId($this);
    }

    /**
     * @param	SekolahLongitudinalRelatedByAksesInternetId $sekolahLongitudinalRelatedByAksesInternetId The sekolahLongitudinalRelatedByAksesInternetId object to remove.
     * @return AksesInternet The current object (for fluent API support)
     */
    public function removeSekolahLongitudinalRelatedByAksesInternetId($sekolahLongitudinalRelatedByAksesInternetId)
    {
        if ($this->getSekolahLongitudinalsRelatedByAksesInternetId()->contains($sekolahLongitudinalRelatedByAksesInternetId)) {
            $this->collSekolahLongitudinalsRelatedByAksesInternetId->remove($this->collSekolahLongitudinalsRelatedByAksesInternetId->search($sekolahLongitudinalRelatedByAksesInternetId));
            if (null === $this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion) {
                $this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion = clone $this->collSekolahLongitudinalsRelatedByAksesInternetId;
                $this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion->clear();
            }
            $this->sekolahLongitudinalsRelatedByAksesInternetIdScheduledForDeletion[]= $sekolahLongitudinalRelatedByAksesInternetId;
            $sekolahLongitudinalRelatedByAksesInternetId->setAksesInternetRelatedByAksesInternetId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternetId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternetIdJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternetId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternetId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternetIdJoinSertifikasiIso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SertifikasiIso', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternetId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternetId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternetIdJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternetId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternetId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternetIdJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternetId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternetId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternetIdJoinSumberListrik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SumberListrik', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternetId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternetId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternetIdJoinWaktuPenyelenggaraan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('WaktuPenyelenggaraan', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternetId($query, $con);
    }

    /**
     * Clears out the collSekolahLongitudinalsRelatedByAksesInternet2Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return AksesInternet The current object (for fluent API support)
     * @see        addSekolahLongitudinalsRelatedByAksesInternet2Id()
     */
    public function clearSekolahLongitudinalsRelatedByAksesInternet2Id()
    {
        $this->collSekolahLongitudinalsRelatedByAksesInternet2Id = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahLongitudinalsRelatedByAksesInternet2Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahLongitudinalsRelatedByAksesInternet2Id($v = true)
    {
        $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial = $v;
    }

    /**
     * Initializes the collSekolahLongitudinalsRelatedByAksesInternet2Id collection.
     *
     * By default this just sets the collSekolahLongitudinalsRelatedByAksesInternet2Id collection to an empty array (like clearcollSekolahLongitudinalsRelatedByAksesInternet2Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahLongitudinalsRelatedByAksesInternet2Id($overrideExisting = true)
    {
        if (null !== $this->collSekolahLongitudinalsRelatedByAksesInternet2Id && !$overrideExisting) {
            return;
        }
        $this->collSekolahLongitudinalsRelatedByAksesInternet2Id = new PropelObjectCollection();
        $this->collSekolahLongitudinalsRelatedByAksesInternet2Id->setModel('SekolahLongitudinal');
    }

    /**
     * Gets an array of SekolahLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this AksesInternet is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     * @throws PropelException
     */
    public function getSekolahLongitudinalsRelatedByAksesInternet2Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinalsRelatedByAksesInternet2Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinalsRelatedByAksesInternet2Id) {
                // return empty collection
                $this->initSekolahLongitudinalsRelatedByAksesInternet2Id();
            } else {
                $collSekolahLongitudinalsRelatedByAksesInternet2Id = SekolahLongitudinalQuery::create(null, $criteria)
                    ->filterByAksesInternetRelatedByAksesInternet2Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial && count($collSekolahLongitudinalsRelatedByAksesInternet2Id)) {
                      $this->initSekolahLongitudinalsRelatedByAksesInternet2Id(false);

                      foreach($collSekolahLongitudinalsRelatedByAksesInternet2Id as $obj) {
                        if (false == $this->collSekolahLongitudinalsRelatedByAksesInternet2Id->contains($obj)) {
                          $this->collSekolahLongitudinalsRelatedByAksesInternet2Id->append($obj);
                        }
                      }

                      $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial = true;
                    }

                    $collSekolahLongitudinalsRelatedByAksesInternet2Id->getInternalIterator()->rewind();
                    return $collSekolahLongitudinalsRelatedByAksesInternet2Id;
                }

                if($partial && $this->collSekolahLongitudinalsRelatedByAksesInternet2Id) {
                    foreach($this->collSekolahLongitudinalsRelatedByAksesInternet2Id as $obj) {
                        if($obj->isNew()) {
                            $collSekolahLongitudinalsRelatedByAksesInternet2Id[] = $obj;
                        }
                    }
                }

                $this->collSekolahLongitudinalsRelatedByAksesInternet2Id = $collSekolahLongitudinalsRelatedByAksesInternet2Id;
                $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial = false;
            }
        }

        return $this->collSekolahLongitudinalsRelatedByAksesInternet2Id;
    }

    /**
     * Sets a collection of SekolahLongitudinalRelatedByAksesInternet2Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahLongitudinalsRelatedByAksesInternet2Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return AksesInternet The current object (for fluent API support)
     */
    public function setSekolahLongitudinalsRelatedByAksesInternet2Id(PropelCollection $sekolahLongitudinalsRelatedByAksesInternet2Id, PropelPDO $con = null)
    {
        $sekolahLongitudinalsRelatedByAksesInternet2IdToDelete = $this->getSekolahLongitudinalsRelatedByAksesInternet2Id(new Criteria(), $con)->diff($sekolahLongitudinalsRelatedByAksesInternet2Id);

        $this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion = unserialize(serialize($sekolahLongitudinalsRelatedByAksesInternet2IdToDelete));

        foreach ($sekolahLongitudinalsRelatedByAksesInternet2IdToDelete as $sekolahLongitudinalRelatedByAksesInternet2IdRemoved) {
            $sekolahLongitudinalRelatedByAksesInternet2IdRemoved->setAksesInternetRelatedByAksesInternet2Id(null);
        }

        $this->collSekolahLongitudinalsRelatedByAksesInternet2Id = null;
        foreach ($sekolahLongitudinalsRelatedByAksesInternet2Id as $sekolahLongitudinalRelatedByAksesInternet2Id) {
            $this->addSekolahLongitudinalRelatedByAksesInternet2Id($sekolahLongitudinalRelatedByAksesInternet2Id);
        }

        $this->collSekolahLongitudinalsRelatedByAksesInternet2Id = $sekolahLongitudinalsRelatedByAksesInternet2Id;
        $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahLongitudinal objects.
     * @throws PropelException
     */
    public function countSekolahLongitudinalsRelatedByAksesInternet2Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinalsRelatedByAksesInternet2Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinalsRelatedByAksesInternet2Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahLongitudinalsRelatedByAksesInternet2Id());
            }
            $query = SekolahLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAksesInternetRelatedByAksesInternet2Id($this)
                ->count($con);
        }

        return count($this->collSekolahLongitudinalsRelatedByAksesInternet2Id);
    }

    /**
     * Method called to associate a SekolahLongitudinal object to this object
     * through the SekolahLongitudinal foreign key attribute.
     *
     * @param    SekolahLongitudinal $l SekolahLongitudinal
     * @return AksesInternet The current object (for fluent API support)
     */
    public function addSekolahLongitudinalRelatedByAksesInternet2Id(SekolahLongitudinal $l)
    {
        if ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id === null) {
            $this->initSekolahLongitudinalsRelatedByAksesInternet2Id();
            $this->collSekolahLongitudinalsRelatedByAksesInternet2IdPartial = true;
        }
        if (!in_array($l, $this->collSekolahLongitudinalsRelatedByAksesInternet2Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahLongitudinalRelatedByAksesInternet2Id($l);
        }

        return $this;
    }

    /**
     * @param	SekolahLongitudinalRelatedByAksesInternet2Id $sekolahLongitudinalRelatedByAksesInternet2Id The sekolahLongitudinalRelatedByAksesInternet2Id object to add.
     */
    protected function doAddSekolahLongitudinalRelatedByAksesInternet2Id($sekolahLongitudinalRelatedByAksesInternet2Id)
    {
        $this->collSekolahLongitudinalsRelatedByAksesInternet2Id[]= $sekolahLongitudinalRelatedByAksesInternet2Id;
        $sekolahLongitudinalRelatedByAksesInternet2Id->setAksesInternetRelatedByAksesInternet2Id($this);
    }

    /**
     * @param	SekolahLongitudinalRelatedByAksesInternet2Id $sekolahLongitudinalRelatedByAksesInternet2Id The sekolahLongitudinalRelatedByAksesInternet2Id object to remove.
     * @return AksesInternet The current object (for fluent API support)
     */
    public function removeSekolahLongitudinalRelatedByAksesInternet2Id($sekolahLongitudinalRelatedByAksesInternet2Id)
    {
        if ($this->getSekolahLongitudinalsRelatedByAksesInternet2Id()->contains($sekolahLongitudinalRelatedByAksesInternet2Id)) {
            $this->collSekolahLongitudinalsRelatedByAksesInternet2Id->remove($this->collSekolahLongitudinalsRelatedByAksesInternet2Id->search($sekolahLongitudinalRelatedByAksesInternet2Id));
            if (null === $this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion) {
                $this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion = clone $this->collSekolahLongitudinalsRelatedByAksesInternet2Id;
                $this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion->clear();
            }
            $this->sekolahLongitudinalsRelatedByAksesInternet2IdScheduledForDeletion[]= clone $sekolahLongitudinalRelatedByAksesInternet2Id;
            $sekolahLongitudinalRelatedByAksesInternet2Id->setAksesInternetRelatedByAksesInternet2Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternet2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternet2IdJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternet2Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternet2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternet2IdJoinSertifikasiIso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SertifikasiIso', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternet2Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternet2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternet2IdJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternet2Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternet2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternet2IdJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternet2Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternet2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternet2IdJoinSumberListrik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SumberListrik', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternet2Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AksesInternet is new, it will return
     * an empty collection; or if this AksesInternet has previously
     * been saved, it will retrieve related SekolahLongitudinalsRelatedByAksesInternet2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AksesInternet.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsRelatedByAksesInternet2IdJoinWaktuPenyelenggaraan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('WaktuPenyelenggaraan', $join_behavior);

        return $this->getSekolahLongitudinalsRelatedByAksesInternet2Id($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->akses_internet_id = null;
        $this->nama = null;
        $this->media = null;
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
            if ($this->collSekolahLongitudinalsRelatedByAksesInternetId) {
                foreach ($this->collSekolahLongitudinalsRelatedByAksesInternetId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id) {
                foreach ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSekolahLongitudinalsRelatedByAksesInternetId instanceof PropelCollection) {
            $this->collSekolahLongitudinalsRelatedByAksesInternetId->clearIterator();
        }
        $this->collSekolahLongitudinalsRelatedByAksesInternetId = null;
        if ($this->collSekolahLongitudinalsRelatedByAksesInternet2Id instanceof PropelCollection) {
            $this->collSekolahLongitudinalsRelatedByAksesInternet2Id->clearIterator();
        }
        $this->collSekolahLongitudinalsRelatedByAksesInternet2Id = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AksesInternetPeer::DEFAULT_STRING_FORMAT);
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
