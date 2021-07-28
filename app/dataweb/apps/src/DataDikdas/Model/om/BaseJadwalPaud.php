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
use DataDikdas\Model\JadwalPaud;
use DataDikdas\Model\JadwalPaudPeer;
use DataDikdas\Model\JadwalPaudQuery;
use DataDikdas\Model\SekolahPaud;
use DataDikdas\Model\SekolahPaudQuery;

/**
 * Base class that represents a row from the 'ref.jadwal_paud' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJadwalPaud extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JadwalPaudPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JadwalPaudPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jadwal_id field.
     * @var        string
     */
    protected $jadwal_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the kesehatan field.
     * @var        string
     */
    protected $kesehatan;

    /**
     * The value for the pamts field.
     * @var        string
     */
    protected $pamts;

    /**
     * The value for the ddtk field.
     * @var        string
     */
    protected $ddtk;

    /**
     * The value for the freq_parenting field.
     * @var        string
     */
    protected $freq_parenting;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
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
     * @var        PropelObjectCollection|SekolahPaud[] Collection to store aggregation of SekolahPaud objects.
     */
    protected $collSekolahPaudsRelatedByFreqParenting;
    protected $collSekolahPaudsRelatedByFreqParentingPartial;

    /**
     * @var        PropelObjectCollection|SekolahPaud[] Collection to store aggregation of SekolahPaud objects.
     */
    protected $collSekolahPaudsRelatedByJadwalDdtk;
    protected $collSekolahPaudsRelatedByJadwalDdtkPartial;

    /**
     * @var        PropelObjectCollection|SekolahPaud[] Collection to store aggregation of SekolahPaud objects.
     */
    protected $collSekolahPaudsRelatedByJadwalKesehatan;
    protected $collSekolahPaudsRelatedByJadwalKesehatanPartial;

    /**
     * @var        PropelObjectCollection|SekolahPaud[] Collection to store aggregation of SekolahPaud objects.
     */
    protected $collSekolahPaudsRelatedByJadwalPmtas;
    protected $collSekolahPaudsRelatedByJadwalPmtasPartial;

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
    protected $sekolahPaudsRelatedByFreqParentingScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->create_date = '2020-04-16 09:40:03';
        $this->last_update = '2020-04-16 09:40:03';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJadwalPaud object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jadwal_id] column value.
     * 
     * @return string
     */
    public function getJadwalId()
    {
        return $this->jadwal_id;
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
     * Get the [kesehatan] column value.
     * 
     * @return string
     */
    public function getKesehatan()
    {
        return $this->kesehatan;
    }

    /**
     * Get the [pamts] column value.
     * 
     * @return string
     */
    public function getPamts()
    {
        return $this->pamts;
    }

    /**
     * Get the [ddtk] column value.
     * 
     * @return string
     */
    public function getDdtk()
    {
        return $this->ddtk;
    }

    /**
     * Get the [freq_parenting] column value.
     * 
     * @return string
     */
    public function getFreqParenting()
    {
        return $this->freq_parenting;
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
     * Set the value of [jadwal_id] column.
     * 
     * @param string $v new value
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setJadwalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jadwal_id !== $v) {
            $this->jadwal_id = $v;
            $this->modifiedColumns[] = JadwalPaudPeer::JADWAL_ID;
        }


        return $this;
    } // setJadwalId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JadwalPaudPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [kesehatan] column.
     * 
     * @param string $v new value
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setKesehatan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kesehatan !== $v) {
            $this->kesehatan = $v;
            $this->modifiedColumns[] = JadwalPaudPeer::KESEHATAN;
        }


        return $this;
    } // setKesehatan()

    /**
     * Set the value of [pamts] column.
     * 
     * @param string $v new value
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setPamts($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pamts !== $v) {
            $this->pamts = $v;
            $this->modifiedColumns[] = JadwalPaudPeer::PAMTS;
        }


        return $this;
    } // setPamts()

    /**
     * Set the value of [ddtk] column.
     * 
     * @param string $v new value
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setDdtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ddtk !== $v) {
            $this->ddtk = $v;
            $this->modifiedColumns[] = JadwalPaudPeer::DDTK;
        }


        return $this;
    } // setDdtk()

    /**
     * Set the value of [freq_parenting] column.
     * 
     * @param string $v new value
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setFreqParenting($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->freq_parenting !== $v) {
            $this->freq_parenting = $v;
            $this->modifiedColumns[] = JadwalPaudPeer::FREQ_PARENTING;
        }


        return $this;
    } // setFreqParenting()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JadwalPaudPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JadwalPaudPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JadwalPaudPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JadwalPaud The current object (for fluent API support)
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
                $this->modifiedColumns[] = JadwalPaudPeer::LAST_SYNC;
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
            if ($this->create_date !== '2020-04-16 09:40:03') {
                return false;
            }

            if ($this->last_update !== '2020-04-16 09:40:03') {
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

            $this->jadwal_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->kesehatan = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->pamts = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->ddtk = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->freq_parenting = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->create_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_update = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->expired_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->last_sync = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 10; // 10 = JadwalPaudPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JadwalPaud object", $e);
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
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JadwalPaudPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSekolahPaudsRelatedByFreqParenting = null;

            $this->collSekolahPaudsRelatedByJadwalDdtk = null;

            $this->collSekolahPaudsRelatedByJadwalKesehatan = null;

            $this->collSekolahPaudsRelatedByJadwalPmtas = null;

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
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JadwalPaudQuery::create()
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
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JadwalPaudPeer::addInstanceToPool($this);
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

            if ($this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion !== null) {
                if (!$this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion->isEmpty()) {
                    SekolahPaudQuery::create()
                        ->filterByPrimaryKeys($this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahPaudsRelatedByFreqParenting !== null) {
                foreach ($this->collSekolahPaudsRelatedByFreqParenting as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion !== null) {
                if (!$this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion->isEmpty()) {
                    SekolahPaudQuery::create()
                        ->filterByPrimaryKeys($this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahPaudsRelatedByJadwalDdtk !== null) {
                foreach ($this->collSekolahPaudsRelatedByJadwalDdtk as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion !== null) {
                if (!$this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion->isEmpty()) {
                    SekolahPaudQuery::create()
                        ->filterByPrimaryKeys($this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahPaudsRelatedByJadwalKesehatan !== null) {
                foreach ($this->collSekolahPaudsRelatedByJadwalKesehatan as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion !== null) {
                if (!$this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion->isEmpty()) {
                    SekolahPaudQuery::create()
                        ->filterByPrimaryKeys($this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahPaudsRelatedByJadwalPmtas !== null) {
                foreach ($this->collSekolahPaudsRelatedByJadwalPmtas as $referrerFK) {
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
        if ($this->isColumnModified(JadwalPaudPeer::JADWAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jadwal_id"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::KESEHATAN)) {
            $modifiedColumns[':p' . $index++]  = '"kesehatan"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::PAMTS)) {
            $modifiedColumns[':p' . $index++]  = '"pamts"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::DDTK)) {
            $modifiedColumns[':p' . $index++]  = '"ddtk"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::FREQ_PARENTING)) {
            $modifiedColumns[':p' . $index++]  = '"freq_parenting"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JadwalPaudPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jadwal_paud" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jadwal_id"':						
                        $stmt->bindValue($identifier, $this->jadwal_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"kesehatan"':						
                        $stmt->bindValue($identifier, $this->kesehatan, PDO::PARAM_STR);
                        break;
                    case '"pamts"':						
                        $stmt->bindValue($identifier, $this->pamts, PDO::PARAM_STR);
                        break;
                    case '"ddtk"':						
                        $stmt->bindValue($identifier, $this->ddtk, PDO::PARAM_STR);
                        break;
                    case '"freq_parenting"':						
                        $stmt->bindValue($identifier, $this->freq_parenting, PDO::PARAM_STR);
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


            if (($retval = JadwalPaudPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSekolahPaudsRelatedByFreqParenting !== null) {
                    foreach ($this->collSekolahPaudsRelatedByFreqParenting as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSekolahPaudsRelatedByJadwalDdtk !== null) {
                    foreach ($this->collSekolahPaudsRelatedByJadwalDdtk as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSekolahPaudsRelatedByJadwalKesehatan !== null) {
                    foreach ($this->collSekolahPaudsRelatedByJadwalKesehatan as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSekolahPaudsRelatedByJadwalPmtas !== null) {
                    foreach ($this->collSekolahPaudsRelatedByJadwalPmtas as $referrerFK) {
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
        $pos = JadwalPaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJadwalId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getKesehatan();
                break;
            case 3:
                return $this->getPamts();
                break;
            case 4:
                return $this->getDdtk();
                break;
            case 5:
                return $this->getFreqParenting();
                break;
            case 6:
                return $this->getCreateDate();
                break;
            case 7:
                return $this->getLastUpdate();
                break;
            case 8:
                return $this->getExpiredDate();
                break;
            case 9:
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
        if (isset($alreadyDumpedObjects['JadwalPaud'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JadwalPaud'][$this->getPrimaryKey()] = true;
        $keys = JadwalPaudPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJadwalId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getKesehatan(),
            $keys[3] => $this->getPamts(),
            $keys[4] => $this->getDdtk(),
            $keys[5] => $this->getFreqParenting(),
            $keys[6] => $this->getCreateDate(),
            $keys[7] => $this->getLastUpdate(),
            $keys[8] => $this->getExpiredDate(),
            $keys[9] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collSekolahPaudsRelatedByFreqParenting) {
                $result['SekolahPaudsRelatedByFreqParenting'] = $this->collSekolahPaudsRelatedByFreqParenting->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahPaudsRelatedByJadwalDdtk) {
                $result['SekolahPaudsRelatedByJadwalDdtk'] = $this->collSekolahPaudsRelatedByJadwalDdtk->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahPaudsRelatedByJadwalKesehatan) {
                $result['SekolahPaudsRelatedByJadwalKesehatan'] = $this->collSekolahPaudsRelatedByJadwalKesehatan->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahPaudsRelatedByJadwalPmtas) {
                $result['SekolahPaudsRelatedByJadwalPmtas'] = $this->collSekolahPaudsRelatedByJadwalPmtas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JadwalPaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJadwalId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setKesehatan($value);
                break;
            case 3:
                $this->setPamts($value);
                break;
            case 4:
                $this->setDdtk($value);
                break;
            case 5:
                $this->setFreqParenting($value);
                break;
            case 6:
                $this->setCreateDate($value);
                break;
            case 7:
                $this->setLastUpdate($value);
                break;
            case 8:
                $this->setExpiredDate($value);
                break;
            case 9:
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
        $keys = JadwalPaudPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJadwalId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKesehatan($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPamts($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDdtk($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFreqParenting($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreateDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastUpdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setExpiredDate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastSync($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JadwalPaudPeer::DATABASE_NAME);

        if ($this->isColumnModified(JadwalPaudPeer::JADWAL_ID)) $criteria->add(JadwalPaudPeer::JADWAL_ID, $this->jadwal_id);
        if ($this->isColumnModified(JadwalPaudPeer::NAMA)) $criteria->add(JadwalPaudPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JadwalPaudPeer::KESEHATAN)) $criteria->add(JadwalPaudPeer::KESEHATAN, $this->kesehatan);
        if ($this->isColumnModified(JadwalPaudPeer::PAMTS)) $criteria->add(JadwalPaudPeer::PAMTS, $this->pamts);
        if ($this->isColumnModified(JadwalPaudPeer::DDTK)) $criteria->add(JadwalPaudPeer::DDTK, $this->ddtk);
        if ($this->isColumnModified(JadwalPaudPeer::FREQ_PARENTING)) $criteria->add(JadwalPaudPeer::FREQ_PARENTING, $this->freq_parenting);
        if ($this->isColumnModified(JadwalPaudPeer::CREATE_DATE)) $criteria->add(JadwalPaudPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JadwalPaudPeer::LAST_UPDATE)) $criteria->add(JadwalPaudPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JadwalPaudPeer::EXPIRED_DATE)) $criteria->add(JadwalPaudPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JadwalPaudPeer::LAST_SYNC)) $criteria->add(JadwalPaudPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JadwalPaudPeer::DATABASE_NAME);
        $criteria->add(JadwalPaudPeer::JADWAL_ID, $this->jadwal_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJadwalId();
    }

    /**
     * Generic method to set the primary key (jadwal_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJadwalId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJadwalId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JadwalPaud (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setKesehatan($this->getKesehatan());
        $copyObj->setPamts($this->getPamts());
        $copyObj->setDdtk($this->getDdtk());
        $copyObj->setFreqParenting($this->getFreqParenting());
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

            foreach ($this->getSekolahPaudsRelatedByFreqParenting() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahPaudRelatedByFreqParenting($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahPaudsRelatedByJadwalDdtk() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahPaudRelatedByJadwalDdtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahPaudsRelatedByJadwalKesehatan() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahPaudRelatedByJadwalKesehatan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahPaudsRelatedByJadwalPmtas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahPaudRelatedByJadwalPmtas($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJadwalId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JadwalPaud Clone of current object.
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
     * @return JadwalPaudPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JadwalPaudPeer();
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
        if ('SekolahPaudRelatedByFreqParenting' == $relationName) {
            $this->initSekolahPaudsRelatedByFreqParenting();
        }
        if ('SekolahPaudRelatedByJadwalDdtk' == $relationName) {
            $this->initSekolahPaudsRelatedByJadwalDdtk();
        }
        if ('SekolahPaudRelatedByJadwalKesehatan' == $relationName) {
            $this->initSekolahPaudsRelatedByJadwalKesehatan();
        }
        if ('SekolahPaudRelatedByJadwalPmtas' == $relationName) {
            $this->initSekolahPaudsRelatedByJadwalPmtas();
        }
    }

    /**
     * Clears out the collSekolahPaudsRelatedByFreqParenting collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JadwalPaud The current object (for fluent API support)
     * @see        addSekolahPaudsRelatedByFreqParenting()
     */
    public function clearSekolahPaudsRelatedByFreqParenting()
    {
        $this->collSekolahPaudsRelatedByFreqParenting = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahPaudsRelatedByFreqParentingPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahPaudsRelatedByFreqParenting collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahPaudsRelatedByFreqParenting($v = true)
    {
        $this->collSekolahPaudsRelatedByFreqParentingPartial = $v;
    }

    /**
     * Initializes the collSekolahPaudsRelatedByFreqParenting collection.
     *
     * By default this just sets the collSekolahPaudsRelatedByFreqParenting collection to an empty array (like clearcollSekolahPaudsRelatedByFreqParenting());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahPaudsRelatedByFreqParenting($overrideExisting = true)
    {
        if (null !== $this->collSekolahPaudsRelatedByFreqParenting && !$overrideExisting) {
            return;
        }
        $this->collSekolahPaudsRelatedByFreqParenting = new PropelObjectCollection();
        $this->collSekolahPaudsRelatedByFreqParenting->setModel('SekolahPaud');
    }

    /**
     * Gets an array of SekolahPaud objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JadwalPaud is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     * @throws PropelException
     */
    public function getSekolahPaudsRelatedByFreqParenting($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByFreqParentingPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByFreqParenting || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByFreqParenting) {
                // return empty collection
                $this->initSekolahPaudsRelatedByFreqParenting();
            } else {
                $collSekolahPaudsRelatedByFreqParenting = SekolahPaudQuery::create(null, $criteria)
                    ->filterByJadwalPaudRelatedByFreqParenting($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahPaudsRelatedByFreqParentingPartial && count($collSekolahPaudsRelatedByFreqParenting)) {
                      $this->initSekolahPaudsRelatedByFreqParenting(false);

                      foreach($collSekolahPaudsRelatedByFreqParenting as $obj) {
                        if (false == $this->collSekolahPaudsRelatedByFreqParenting->contains($obj)) {
                          $this->collSekolahPaudsRelatedByFreqParenting->append($obj);
                        }
                      }

                      $this->collSekolahPaudsRelatedByFreqParentingPartial = true;
                    }

                    $collSekolahPaudsRelatedByFreqParenting->getInternalIterator()->rewind();
                    return $collSekolahPaudsRelatedByFreqParenting;
                }

                if($partial && $this->collSekolahPaudsRelatedByFreqParenting) {
                    foreach($this->collSekolahPaudsRelatedByFreqParenting as $obj) {
                        if($obj->isNew()) {
                            $collSekolahPaudsRelatedByFreqParenting[] = $obj;
                        }
                    }
                }

                $this->collSekolahPaudsRelatedByFreqParenting = $collSekolahPaudsRelatedByFreqParenting;
                $this->collSekolahPaudsRelatedByFreqParentingPartial = false;
            }
        }

        return $this->collSekolahPaudsRelatedByFreqParenting;
    }

    /**
     * Sets a collection of SekolahPaudRelatedByFreqParenting objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahPaudsRelatedByFreqParenting A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setSekolahPaudsRelatedByFreqParenting(PropelCollection $sekolahPaudsRelatedByFreqParenting, PropelPDO $con = null)
    {
        $sekolahPaudsRelatedByFreqParentingToDelete = $this->getSekolahPaudsRelatedByFreqParenting(new Criteria(), $con)->diff($sekolahPaudsRelatedByFreqParenting);

        $this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion = unserialize(serialize($sekolahPaudsRelatedByFreqParentingToDelete));

        foreach ($sekolahPaudsRelatedByFreqParentingToDelete as $sekolahPaudRelatedByFreqParentingRemoved) {
            $sekolahPaudRelatedByFreqParentingRemoved->setJadwalPaudRelatedByFreqParenting(null);
        }

        $this->collSekolahPaudsRelatedByFreqParenting = null;
        foreach ($sekolahPaudsRelatedByFreqParenting as $sekolahPaudRelatedByFreqParenting) {
            $this->addSekolahPaudRelatedByFreqParenting($sekolahPaudRelatedByFreqParenting);
        }

        $this->collSekolahPaudsRelatedByFreqParenting = $sekolahPaudsRelatedByFreqParenting;
        $this->collSekolahPaudsRelatedByFreqParentingPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahPaud objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahPaud objects.
     * @throws PropelException
     */
    public function countSekolahPaudsRelatedByFreqParenting(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByFreqParentingPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByFreqParenting || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByFreqParenting) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahPaudsRelatedByFreqParenting());
            }
            $query = SekolahPaudQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJadwalPaudRelatedByFreqParenting($this)
                ->count($con);
        }

        return count($this->collSekolahPaudsRelatedByFreqParenting);
    }

    /**
     * Method called to associate a SekolahPaud object to this object
     * through the SekolahPaud foreign key attribute.
     *
     * @param    SekolahPaud $l SekolahPaud
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function addSekolahPaudRelatedByFreqParenting(SekolahPaud $l)
    {
        if ($this->collSekolahPaudsRelatedByFreqParenting === null) {
            $this->initSekolahPaudsRelatedByFreqParenting();
            $this->collSekolahPaudsRelatedByFreqParentingPartial = true;
        }
        if (!in_array($l, $this->collSekolahPaudsRelatedByFreqParenting->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahPaudRelatedByFreqParenting($l);
        }

        return $this;
    }

    /**
     * @param	SekolahPaudRelatedByFreqParenting $sekolahPaudRelatedByFreqParenting The sekolahPaudRelatedByFreqParenting object to add.
     */
    protected function doAddSekolahPaudRelatedByFreqParenting($sekolahPaudRelatedByFreqParenting)
    {
        $this->collSekolahPaudsRelatedByFreqParenting[]= $sekolahPaudRelatedByFreqParenting;
        $sekolahPaudRelatedByFreqParenting->setJadwalPaudRelatedByFreqParenting($this);
    }

    /**
     * @param	SekolahPaudRelatedByFreqParenting $sekolahPaudRelatedByFreqParenting The sekolahPaudRelatedByFreqParenting object to remove.
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function removeSekolahPaudRelatedByFreqParenting($sekolahPaudRelatedByFreqParenting)
    {
        if ($this->getSekolahPaudsRelatedByFreqParenting()->contains($sekolahPaudRelatedByFreqParenting)) {
            $this->collSekolahPaudsRelatedByFreqParenting->remove($this->collSekolahPaudsRelatedByFreqParenting->search($sekolahPaudRelatedByFreqParenting));
            if (null === $this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion) {
                $this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion = clone $this->collSekolahPaudsRelatedByFreqParenting;
                $this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion->clear();
            }
            $this->sekolahPaudsRelatedByFreqParentingScheduledForDeletion[]= clone $sekolahPaudRelatedByFreqParenting;
            $sekolahPaudRelatedByFreqParenting->setJadwalPaudRelatedByFreqParenting(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByFreqParenting from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByFreqParentingJoinBentukLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('BentukLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByFreqParenting($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByFreqParenting from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByFreqParentingJoinFasilitasLayanan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('FasilitasLayanan', $join_behavior);

        return $this->getSekolahPaudsRelatedByFreqParenting($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByFreqParenting from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByFreqParentingJoinKategoriTk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KategoriTk', $join_behavior);

        return $this->getSekolahPaudsRelatedByFreqParenting($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByFreqParenting from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByFreqParentingJoinKlasifikasiLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KlasifikasiLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByFreqParenting($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByFreqParenting from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByFreqParentingJoinLembagaPengangkat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('LembagaPengangkat', $join_behavior);

        return $this->getSekolahPaudsRelatedByFreqParenting($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByFreqParenting from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByFreqParentingJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByFreqParenting($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByFreqParenting from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByFreqParentingJoinSumberDanaSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('SumberDanaSekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByFreqParenting($query, $con);
    }

    /**
     * Clears out the collSekolahPaudsRelatedByJadwalDdtk collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JadwalPaud The current object (for fluent API support)
     * @see        addSekolahPaudsRelatedByJadwalDdtk()
     */
    public function clearSekolahPaudsRelatedByJadwalDdtk()
    {
        $this->collSekolahPaudsRelatedByJadwalDdtk = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahPaudsRelatedByJadwalDdtkPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahPaudsRelatedByJadwalDdtk collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahPaudsRelatedByJadwalDdtk($v = true)
    {
        $this->collSekolahPaudsRelatedByJadwalDdtkPartial = $v;
    }

    /**
     * Initializes the collSekolahPaudsRelatedByJadwalDdtk collection.
     *
     * By default this just sets the collSekolahPaudsRelatedByJadwalDdtk collection to an empty array (like clearcollSekolahPaudsRelatedByJadwalDdtk());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahPaudsRelatedByJadwalDdtk($overrideExisting = true)
    {
        if (null !== $this->collSekolahPaudsRelatedByJadwalDdtk && !$overrideExisting) {
            return;
        }
        $this->collSekolahPaudsRelatedByJadwalDdtk = new PropelObjectCollection();
        $this->collSekolahPaudsRelatedByJadwalDdtk->setModel('SekolahPaud');
    }

    /**
     * Gets an array of SekolahPaud objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JadwalPaud is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     * @throws PropelException
     */
    public function getSekolahPaudsRelatedByJadwalDdtk($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByJadwalDdtkPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByJadwalDdtk || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByJadwalDdtk) {
                // return empty collection
                $this->initSekolahPaudsRelatedByJadwalDdtk();
            } else {
                $collSekolahPaudsRelatedByJadwalDdtk = SekolahPaudQuery::create(null, $criteria)
                    ->filterByJadwalPaudRelatedByJadwalDdtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahPaudsRelatedByJadwalDdtkPartial && count($collSekolahPaudsRelatedByJadwalDdtk)) {
                      $this->initSekolahPaudsRelatedByJadwalDdtk(false);

                      foreach($collSekolahPaudsRelatedByJadwalDdtk as $obj) {
                        if (false == $this->collSekolahPaudsRelatedByJadwalDdtk->contains($obj)) {
                          $this->collSekolahPaudsRelatedByJadwalDdtk->append($obj);
                        }
                      }

                      $this->collSekolahPaudsRelatedByJadwalDdtkPartial = true;
                    }

                    $collSekolahPaudsRelatedByJadwalDdtk->getInternalIterator()->rewind();
                    return $collSekolahPaudsRelatedByJadwalDdtk;
                }

                if($partial && $this->collSekolahPaudsRelatedByJadwalDdtk) {
                    foreach($this->collSekolahPaudsRelatedByJadwalDdtk as $obj) {
                        if($obj->isNew()) {
                            $collSekolahPaudsRelatedByJadwalDdtk[] = $obj;
                        }
                    }
                }

                $this->collSekolahPaudsRelatedByJadwalDdtk = $collSekolahPaudsRelatedByJadwalDdtk;
                $this->collSekolahPaudsRelatedByJadwalDdtkPartial = false;
            }
        }

        return $this->collSekolahPaudsRelatedByJadwalDdtk;
    }

    /**
     * Sets a collection of SekolahPaudRelatedByJadwalDdtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahPaudsRelatedByJadwalDdtk A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setSekolahPaudsRelatedByJadwalDdtk(PropelCollection $sekolahPaudsRelatedByJadwalDdtk, PropelPDO $con = null)
    {
        $sekolahPaudsRelatedByJadwalDdtkToDelete = $this->getSekolahPaudsRelatedByJadwalDdtk(new Criteria(), $con)->diff($sekolahPaudsRelatedByJadwalDdtk);

        $this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion = unserialize(serialize($sekolahPaudsRelatedByJadwalDdtkToDelete));

        foreach ($sekolahPaudsRelatedByJadwalDdtkToDelete as $sekolahPaudRelatedByJadwalDdtkRemoved) {
            $sekolahPaudRelatedByJadwalDdtkRemoved->setJadwalPaudRelatedByJadwalDdtk(null);
        }

        $this->collSekolahPaudsRelatedByJadwalDdtk = null;
        foreach ($sekolahPaudsRelatedByJadwalDdtk as $sekolahPaudRelatedByJadwalDdtk) {
            $this->addSekolahPaudRelatedByJadwalDdtk($sekolahPaudRelatedByJadwalDdtk);
        }

        $this->collSekolahPaudsRelatedByJadwalDdtk = $sekolahPaudsRelatedByJadwalDdtk;
        $this->collSekolahPaudsRelatedByJadwalDdtkPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahPaud objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahPaud objects.
     * @throws PropelException
     */
    public function countSekolahPaudsRelatedByJadwalDdtk(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByJadwalDdtkPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByJadwalDdtk || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByJadwalDdtk) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahPaudsRelatedByJadwalDdtk());
            }
            $query = SekolahPaudQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJadwalPaudRelatedByJadwalDdtk($this)
                ->count($con);
        }

        return count($this->collSekolahPaudsRelatedByJadwalDdtk);
    }

    /**
     * Method called to associate a SekolahPaud object to this object
     * through the SekolahPaud foreign key attribute.
     *
     * @param    SekolahPaud $l SekolahPaud
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function addSekolahPaudRelatedByJadwalDdtk(SekolahPaud $l)
    {
        if ($this->collSekolahPaudsRelatedByJadwalDdtk === null) {
            $this->initSekolahPaudsRelatedByJadwalDdtk();
            $this->collSekolahPaudsRelatedByJadwalDdtkPartial = true;
        }
        if (!in_array($l, $this->collSekolahPaudsRelatedByJadwalDdtk->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahPaudRelatedByJadwalDdtk($l);
        }

        return $this;
    }

    /**
     * @param	SekolahPaudRelatedByJadwalDdtk $sekolahPaudRelatedByJadwalDdtk The sekolahPaudRelatedByJadwalDdtk object to add.
     */
    protected function doAddSekolahPaudRelatedByJadwalDdtk($sekolahPaudRelatedByJadwalDdtk)
    {
        $this->collSekolahPaudsRelatedByJadwalDdtk[]= $sekolahPaudRelatedByJadwalDdtk;
        $sekolahPaudRelatedByJadwalDdtk->setJadwalPaudRelatedByJadwalDdtk($this);
    }

    /**
     * @param	SekolahPaudRelatedByJadwalDdtk $sekolahPaudRelatedByJadwalDdtk The sekolahPaudRelatedByJadwalDdtk object to remove.
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function removeSekolahPaudRelatedByJadwalDdtk($sekolahPaudRelatedByJadwalDdtk)
    {
        if ($this->getSekolahPaudsRelatedByJadwalDdtk()->contains($sekolahPaudRelatedByJadwalDdtk)) {
            $this->collSekolahPaudsRelatedByJadwalDdtk->remove($this->collSekolahPaudsRelatedByJadwalDdtk->search($sekolahPaudRelatedByJadwalDdtk));
            if (null === $this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion) {
                $this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion = clone $this->collSekolahPaudsRelatedByJadwalDdtk;
                $this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion->clear();
            }
            $this->sekolahPaudsRelatedByJadwalDdtkScheduledForDeletion[]= clone $sekolahPaudRelatedByJadwalDdtk;
            $sekolahPaudRelatedByJadwalDdtk->setJadwalPaudRelatedByJadwalDdtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalDdtk from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalDdtkJoinBentukLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('BentukLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalDdtk($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalDdtk from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalDdtkJoinFasilitasLayanan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('FasilitasLayanan', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalDdtk($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalDdtk from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalDdtkJoinKategoriTk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KategoriTk', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalDdtk($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalDdtk from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalDdtkJoinKlasifikasiLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KlasifikasiLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalDdtk($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalDdtk from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalDdtkJoinLembagaPengangkat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('LembagaPengangkat', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalDdtk($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalDdtk from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalDdtkJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalDdtk($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalDdtk from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalDdtkJoinSumberDanaSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('SumberDanaSekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalDdtk($query, $con);
    }

    /**
     * Clears out the collSekolahPaudsRelatedByJadwalKesehatan collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JadwalPaud The current object (for fluent API support)
     * @see        addSekolahPaudsRelatedByJadwalKesehatan()
     */
    public function clearSekolahPaudsRelatedByJadwalKesehatan()
    {
        $this->collSekolahPaudsRelatedByJadwalKesehatan = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahPaudsRelatedByJadwalKesehatanPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahPaudsRelatedByJadwalKesehatan collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahPaudsRelatedByJadwalKesehatan($v = true)
    {
        $this->collSekolahPaudsRelatedByJadwalKesehatanPartial = $v;
    }

    /**
     * Initializes the collSekolahPaudsRelatedByJadwalKesehatan collection.
     *
     * By default this just sets the collSekolahPaudsRelatedByJadwalKesehatan collection to an empty array (like clearcollSekolahPaudsRelatedByJadwalKesehatan());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahPaudsRelatedByJadwalKesehatan($overrideExisting = true)
    {
        if (null !== $this->collSekolahPaudsRelatedByJadwalKesehatan && !$overrideExisting) {
            return;
        }
        $this->collSekolahPaudsRelatedByJadwalKesehatan = new PropelObjectCollection();
        $this->collSekolahPaudsRelatedByJadwalKesehatan->setModel('SekolahPaud');
    }

    /**
     * Gets an array of SekolahPaud objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JadwalPaud is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     * @throws PropelException
     */
    public function getSekolahPaudsRelatedByJadwalKesehatan($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByJadwalKesehatanPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByJadwalKesehatan || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByJadwalKesehatan) {
                // return empty collection
                $this->initSekolahPaudsRelatedByJadwalKesehatan();
            } else {
                $collSekolahPaudsRelatedByJadwalKesehatan = SekolahPaudQuery::create(null, $criteria)
                    ->filterByJadwalPaudRelatedByJadwalKesehatan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahPaudsRelatedByJadwalKesehatanPartial && count($collSekolahPaudsRelatedByJadwalKesehatan)) {
                      $this->initSekolahPaudsRelatedByJadwalKesehatan(false);

                      foreach($collSekolahPaudsRelatedByJadwalKesehatan as $obj) {
                        if (false == $this->collSekolahPaudsRelatedByJadwalKesehatan->contains($obj)) {
                          $this->collSekolahPaudsRelatedByJadwalKesehatan->append($obj);
                        }
                      }

                      $this->collSekolahPaudsRelatedByJadwalKesehatanPartial = true;
                    }

                    $collSekolahPaudsRelatedByJadwalKesehatan->getInternalIterator()->rewind();
                    return $collSekolahPaudsRelatedByJadwalKesehatan;
                }

                if($partial && $this->collSekolahPaudsRelatedByJadwalKesehatan) {
                    foreach($this->collSekolahPaudsRelatedByJadwalKesehatan as $obj) {
                        if($obj->isNew()) {
                            $collSekolahPaudsRelatedByJadwalKesehatan[] = $obj;
                        }
                    }
                }

                $this->collSekolahPaudsRelatedByJadwalKesehatan = $collSekolahPaudsRelatedByJadwalKesehatan;
                $this->collSekolahPaudsRelatedByJadwalKesehatanPartial = false;
            }
        }

        return $this->collSekolahPaudsRelatedByJadwalKesehatan;
    }

    /**
     * Sets a collection of SekolahPaudRelatedByJadwalKesehatan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahPaudsRelatedByJadwalKesehatan A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setSekolahPaudsRelatedByJadwalKesehatan(PropelCollection $sekolahPaudsRelatedByJadwalKesehatan, PropelPDO $con = null)
    {
        $sekolahPaudsRelatedByJadwalKesehatanToDelete = $this->getSekolahPaudsRelatedByJadwalKesehatan(new Criteria(), $con)->diff($sekolahPaudsRelatedByJadwalKesehatan);

        $this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion = unserialize(serialize($sekolahPaudsRelatedByJadwalKesehatanToDelete));

        foreach ($sekolahPaudsRelatedByJadwalKesehatanToDelete as $sekolahPaudRelatedByJadwalKesehatanRemoved) {
            $sekolahPaudRelatedByJadwalKesehatanRemoved->setJadwalPaudRelatedByJadwalKesehatan(null);
        }

        $this->collSekolahPaudsRelatedByJadwalKesehatan = null;
        foreach ($sekolahPaudsRelatedByJadwalKesehatan as $sekolahPaudRelatedByJadwalKesehatan) {
            $this->addSekolahPaudRelatedByJadwalKesehatan($sekolahPaudRelatedByJadwalKesehatan);
        }

        $this->collSekolahPaudsRelatedByJadwalKesehatan = $sekolahPaudsRelatedByJadwalKesehatan;
        $this->collSekolahPaudsRelatedByJadwalKesehatanPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahPaud objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahPaud objects.
     * @throws PropelException
     */
    public function countSekolahPaudsRelatedByJadwalKesehatan(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByJadwalKesehatanPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByJadwalKesehatan || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByJadwalKesehatan) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahPaudsRelatedByJadwalKesehatan());
            }
            $query = SekolahPaudQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJadwalPaudRelatedByJadwalKesehatan($this)
                ->count($con);
        }

        return count($this->collSekolahPaudsRelatedByJadwalKesehatan);
    }

    /**
     * Method called to associate a SekolahPaud object to this object
     * through the SekolahPaud foreign key attribute.
     *
     * @param    SekolahPaud $l SekolahPaud
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function addSekolahPaudRelatedByJadwalKesehatan(SekolahPaud $l)
    {
        if ($this->collSekolahPaudsRelatedByJadwalKesehatan === null) {
            $this->initSekolahPaudsRelatedByJadwalKesehatan();
            $this->collSekolahPaudsRelatedByJadwalKesehatanPartial = true;
        }
        if (!in_array($l, $this->collSekolahPaudsRelatedByJadwalKesehatan->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahPaudRelatedByJadwalKesehatan($l);
        }

        return $this;
    }

    /**
     * @param	SekolahPaudRelatedByJadwalKesehatan $sekolahPaudRelatedByJadwalKesehatan The sekolahPaudRelatedByJadwalKesehatan object to add.
     */
    protected function doAddSekolahPaudRelatedByJadwalKesehatan($sekolahPaudRelatedByJadwalKesehatan)
    {
        $this->collSekolahPaudsRelatedByJadwalKesehatan[]= $sekolahPaudRelatedByJadwalKesehatan;
        $sekolahPaudRelatedByJadwalKesehatan->setJadwalPaudRelatedByJadwalKesehatan($this);
    }

    /**
     * @param	SekolahPaudRelatedByJadwalKesehatan $sekolahPaudRelatedByJadwalKesehatan The sekolahPaudRelatedByJadwalKesehatan object to remove.
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function removeSekolahPaudRelatedByJadwalKesehatan($sekolahPaudRelatedByJadwalKesehatan)
    {
        if ($this->getSekolahPaudsRelatedByJadwalKesehatan()->contains($sekolahPaudRelatedByJadwalKesehatan)) {
            $this->collSekolahPaudsRelatedByJadwalKesehatan->remove($this->collSekolahPaudsRelatedByJadwalKesehatan->search($sekolahPaudRelatedByJadwalKesehatan));
            if (null === $this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion) {
                $this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion = clone $this->collSekolahPaudsRelatedByJadwalKesehatan;
                $this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion->clear();
            }
            $this->sekolahPaudsRelatedByJadwalKesehatanScheduledForDeletion[]= clone $sekolahPaudRelatedByJadwalKesehatan;
            $sekolahPaudRelatedByJadwalKesehatan->setJadwalPaudRelatedByJadwalKesehatan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalKesehatan from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalKesehatanJoinBentukLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('BentukLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalKesehatan($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalKesehatan from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalKesehatanJoinFasilitasLayanan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('FasilitasLayanan', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalKesehatan($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalKesehatan from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalKesehatanJoinKategoriTk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KategoriTk', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalKesehatan($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalKesehatan from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalKesehatanJoinKlasifikasiLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KlasifikasiLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalKesehatan($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalKesehatan from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalKesehatanJoinLembagaPengangkat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('LembagaPengangkat', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalKesehatan($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalKesehatan from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalKesehatanJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalKesehatan($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalKesehatan from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalKesehatanJoinSumberDanaSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('SumberDanaSekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalKesehatan($query, $con);
    }

    /**
     * Clears out the collSekolahPaudsRelatedByJadwalPmtas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JadwalPaud The current object (for fluent API support)
     * @see        addSekolahPaudsRelatedByJadwalPmtas()
     */
    public function clearSekolahPaudsRelatedByJadwalPmtas()
    {
        $this->collSekolahPaudsRelatedByJadwalPmtas = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahPaudsRelatedByJadwalPmtasPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahPaudsRelatedByJadwalPmtas collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahPaudsRelatedByJadwalPmtas($v = true)
    {
        $this->collSekolahPaudsRelatedByJadwalPmtasPartial = $v;
    }

    /**
     * Initializes the collSekolahPaudsRelatedByJadwalPmtas collection.
     *
     * By default this just sets the collSekolahPaudsRelatedByJadwalPmtas collection to an empty array (like clearcollSekolahPaudsRelatedByJadwalPmtas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahPaudsRelatedByJadwalPmtas($overrideExisting = true)
    {
        if (null !== $this->collSekolahPaudsRelatedByJadwalPmtas && !$overrideExisting) {
            return;
        }
        $this->collSekolahPaudsRelatedByJadwalPmtas = new PropelObjectCollection();
        $this->collSekolahPaudsRelatedByJadwalPmtas->setModel('SekolahPaud');
    }

    /**
     * Gets an array of SekolahPaud objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JadwalPaud is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     * @throws PropelException
     */
    public function getSekolahPaudsRelatedByJadwalPmtas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByJadwalPmtasPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByJadwalPmtas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByJadwalPmtas) {
                // return empty collection
                $this->initSekolahPaudsRelatedByJadwalPmtas();
            } else {
                $collSekolahPaudsRelatedByJadwalPmtas = SekolahPaudQuery::create(null, $criteria)
                    ->filterByJadwalPaudRelatedByJadwalPmtas($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahPaudsRelatedByJadwalPmtasPartial && count($collSekolahPaudsRelatedByJadwalPmtas)) {
                      $this->initSekolahPaudsRelatedByJadwalPmtas(false);

                      foreach($collSekolahPaudsRelatedByJadwalPmtas as $obj) {
                        if (false == $this->collSekolahPaudsRelatedByJadwalPmtas->contains($obj)) {
                          $this->collSekolahPaudsRelatedByJadwalPmtas->append($obj);
                        }
                      }

                      $this->collSekolahPaudsRelatedByJadwalPmtasPartial = true;
                    }

                    $collSekolahPaudsRelatedByJadwalPmtas->getInternalIterator()->rewind();
                    return $collSekolahPaudsRelatedByJadwalPmtas;
                }

                if($partial && $this->collSekolahPaudsRelatedByJadwalPmtas) {
                    foreach($this->collSekolahPaudsRelatedByJadwalPmtas as $obj) {
                        if($obj->isNew()) {
                            $collSekolahPaudsRelatedByJadwalPmtas[] = $obj;
                        }
                    }
                }

                $this->collSekolahPaudsRelatedByJadwalPmtas = $collSekolahPaudsRelatedByJadwalPmtas;
                $this->collSekolahPaudsRelatedByJadwalPmtasPartial = false;
            }
        }

        return $this->collSekolahPaudsRelatedByJadwalPmtas;
    }

    /**
     * Sets a collection of SekolahPaudRelatedByJadwalPmtas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahPaudsRelatedByJadwalPmtas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function setSekolahPaudsRelatedByJadwalPmtas(PropelCollection $sekolahPaudsRelatedByJadwalPmtas, PropelPDO $con = null)
    {
        $sekolahPaudsRelatedByJadwalPmtasToDelete = $this->getSekolahPaudsRelatedByJadwalPmtas(new Criteria(), $con)->diff($sekolahPaudsRelatedByJadwalPmtas);

        $this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion = unserialize(serialize($sekolahPaudsRelatedByJadwalPmtasToDelete));

        foreach ($sekolahPaudsRelatedByJadwalPmtasToDelete as $sekolahPaudRelatedByJadwalPmtasRemoved) {
            $sekolahPaudRelatedByJadwalPmtasRemoved->setJadwalPaudRelatedByJadwalPmtas(null);
        }

        $this->collSekolahPaudsRelatedByJadwalPmtas = null;
        foreach ($sekolahPaudsRelatedByJadwalPmtas as $sekolahPaudRelatedByJadwalPmtas) {
            $this->addSekolahPaudRelatedByJadwalPmtas($sekolahPaudRelatedByJadwalPmtas);
        }

        $this->collSekolahPaudsRelatedByJadwalPmtas = $sekolahPaudsRelatedByJadwalPmtas;
        $this->collSekolahPaudsRelatedByJadwalPmtasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahPaud objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahPaud objects.
     * @throws PropelException
     */
    public function countSekolahPaudsRelatedByJadwalPmtas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahPaudsRelatedByJadwalPmtasPartial && !$this->isNew();
        if (null === $this->collSekolahPaudsRelatedByJadwalPmtas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahPaudsRelatedByJadwalPmtas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahPaudsRelatedByJadwalPmtas());
            }
            $query = SekolahPaudQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJadwalPaudRelatedByJadwalPmtas($this)
                ->count($con);
        }

        return count($this->collSekolahPaudsRelatedByJadwalPmtas);
    }

    /**
     * Method called to associate a SekolahPaud object to this object
     * through the SekolahPaud foreign key attribute.
     *
     * @param    SekolahPaud $l SekolahPaud
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function addSekolahPaudRelatedByJadwalPmtas(SekolahPaud $l)
    {
        if ($this->collSekolahPaudsRelatedByJadwalPmtas === null) {
            $this->initSekolahPaudsRelatedByJadwalPmtas();
            $this->collSekolahPaudsRelatedByJadwalPmtasPartial = true;
        }
        if (!in_array($l, $this->collSekolahPaudsRelatedByJadwalPmtas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahPaudRelatedByJadwalPmtas($l);
        }

        return $this;
    }

    /**
     * @param	SekolahPaudRelatedByJadwalPmtas $sekolahPaudRelatedByJadwalPmtas The sekolahPaudRelatedByJadwalPmtas object to add.
     */
    protected function doAddSekolahPaudRelatedByJadwalPmtas($sekolahPaudRelatedByJadwalPmtas)
    {
        $this->collSekolahPaudsRelatedByJadwalPmtas[]= $sekolahPaudRelatedByJadwalPmtas;
        $sekolahPaudRelatedByJadwalPmtas->setJadwalPaudRelatedByJadwalPmtas($this);
    }

    /**
     * @param	SekolahPaudRelatedByJadwalPmtas $sekolahPaudRelatedByJadwalPmtas The sekolahPaudRelatedByJadwalPmtas object to remove.
     * @return JadwalPaud The current object (for fluent API support)
     */
    public function removeSekolahPaudRelatedByJadwalPmtas($sekolahPaudRelatedByJadwalPmtas)
    {
        if ($this->getSekolahPaudsRelatedByJadwalPmtas()->contains($sekolahPaudRelatedByJadwalPmtas)) {
            $this->collSekolahPaudsRelatedByJadwalPmtas->remove($this->collSekolahPaudsRelatedByJadwalPmtas->search($sekolahPaudRelatedByJadwalPmtas));
            if (null === $this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion) {
                $this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion = clone $this->collSekolahPaudsRelatedByJadwalPmtas;
                $this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion->clear();
            }
            $this->sekolahPaudsRelatedByJadwalPmtasScheduledForDeletion[]= clone $sekolahPaudRelatedByJadwalPmtas;
            $sekolahPaudRelatedByJadwalPmtas->setJadwalPaudRelatedByJadwalPmtas(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalPmtas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalPmtasJoinBentukLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('BentukLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalPmtas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalPmtas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalPmtasJoinFasilitasLayanan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('FasilitasLayanan', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalPmtas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalPmtas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalPmtasJoinKategoriTk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KategoriTk', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalPmtas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalPmtas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalPmtasJoinKlasifikasiLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('KlasifikasiLembaga', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalPmtas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalPmtas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalPmtasJoinLembagaPengangkat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('LembagaPengangkat', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalPmtas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalPmtas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalPmtasJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalPmtas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JadwalPaud is new, it will return
     * an empty collection; or if this JadwalPaud has previously
     * been saved, it will retrieve related SekolahPaudsRelatedByJadwalPmtas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JadwalPaud.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahPaud[] List of SekolahPaud objects
     */
    public function getSekolahPaudsRelatedByJadwalPmtasJoinSumberDanaSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahPaudQuery::create(null, $criteria);
        $query->joinWith('SumberDanaSekolah', $join_behavior);

        return $this->getSekolahPaudsRelatedByJadwalPmtas($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jadwal_id = null;
        $this->nama = null;
        $this->kesehatan = null;
        $this->pamts = null;
        $this->ddtk = null;
        $this->freq_parenting = null;
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
            if ($this->collSekolahPaudsRelatedByFreqParenting) {
                foreach ($this->collSekolahPaudsRelatedByFreqParenting as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahPaudsRelatedByJadwalDdtk) {
                foreach ($this->collSekolahPaudsRelatedByJadwalDdtk as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahPaudsRelatedByJadwalKesehatan) {
                foreach ($this->collSekolahPaudsRelatedByJadwalKesehatan as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahPaudsRelatedByJadwalPmtas) {
                foreach ($this->collSekolahPaudsRelatedByJadwalPmtas as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSekolahPaudsRelatedByFreqParenting instanceof PropelCollection) {
            $this->collSekolahPaudsRelatedByFreqParenting->clearIterator();
        }
        $this->collSekolahPaudsRelatedByFreqParenting = null;
        if ($this->collSekolahPaudsRelatedByJadwalDdtk instanceof PropelCollection) {
            $this->collSekolahPaudsRelatedByJadwalDdtk->clearIterator();
        }
        $this->collSekolahPaudsRelatedByJadwalDdtk = null;
        if ($this->collSekolahPaudsRelatedByJadwalKesehatan instanceof PropelCollection) {
            $this->collSekolahPaudsRelatedByJadwalKesehatan->clearIterator();
        }
        $this->collSekolahPaudsRelatedByJadwalKesehatan = null;
        if ($this->collSekolahPaudsRelatedByJadwalPmtas instanceof PropelCollection) {
            $this->collSekolahPaudsRelatedByJadwalPmtas->clearIterator();
        }
        $this->collSekolahPaudsRelatedByJadwalPmtas = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JadwalPaudPeer::DEFAULT_STRING_FORMAT);
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
