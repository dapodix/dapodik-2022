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
use DataDikdas\Model\BeasiswaPesertaDidik;
use DataDikdas\Model\BeasiswaPesertaDidikQuery;
use DataDikdas\Model\BeasiswaPtk;
use DataDikdas\Model\BeasiswaPtkQuery;
use DataDikdas\Model\JenisBeasiswa;
use DataDikdas\Model\JenisBeasiswaPeer;
use DataDikdas\Model\JenisBeasiswaQuery;
use DataDikdas\Model\SumberDana;
use DataDikdas\Model\SumberDanaQuery;

/**
 * Base class that represents a row from the 'ref.jenis_beasiswa' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisBeasiswa extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenisBeasiswaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenisBeasiswaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenis_beasiswa_id field.
     * @var        int
     */
    protected $jenis_beasiswa_id;

    /**
     * The value for the sumber_dana_id field.
     * @var        string
     */
    protected $sumber_dana_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the untuk_pd field.
     * @var        string
     */
    protected $untuk_pd;

    /**
     * The value for the untuk_ptk field.
     * @var        string
     */
    protected $untuk_ptk;

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
     * @var        SumberDana
     */
    protected $aSumberDana;

    /**
     * @var        PropelObjectCollection|BeasiswaPesertaDidik[] Collection to store aggregation of BeasiswaPesertaDidik objects.
     */
    protected $collBeasiswaPesertaDidiks;
    protected $collBeasiswaPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|BeasiswaPtk[] Collection to store aggregation of BeasiswaPtk objects.
     */
    protected $collBeasiswaPtks;
    protected $collBeasiswaPtksPartial;

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
    protected $beasiswaPesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $beasiswaPtksScheduledForDeletion = null;

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
     * Initializes internal state of BaseJenisBeasiswa object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jenis_beasiswa_id] column value.
     * 
     * @return int
     */
    public function getJenisBeasiswaId()
    {
        return $this->jenis_beasiswa_id;
    }

    /**
     * Get the [sumber_dana_id] column value.
     * 
     * @return string
     */
    public function getSumberDanaId()
    {
        return $this->sumber_dana_id;
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
     * Get the [untuk_pd] column value.
     * 
     * @return string
     */
    public function getUntukPd()
    {
        return $this->untuk_pd;
    }

    /**
     * Get the [untuk_ptk] column value.
     * 
     * @return string
     */
    public function getUntukPtk()
    {
        return $this->untuk_ptk;
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
     * Set the value of [jenis_beasiswa_id] column.
     * 
     * @param int $v new value
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setJenisBeasiswaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_beasiswa_id !== $v) {
            $this->jenis_beasiswa_id = $v;
            $this->modifiedColumns[] = JenisBeasiswaPeer::JENIS_BEASISWA_ID;
        }


        return $this;
    } // setJenisBeasiswaId()

    /**
     * Set the value of [sumber_dana_id] column.
     * 
     * @param string $v new value
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setSumberDanaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_dana_id !== $v) {
            $this->sumber_dana_id = $v;
            $this->modifiedColumns[] = JenisBeasiswaPeer::SUMBER_DANA_ID;
        }

        if ($this->aSumberDana !== null && $this->aSumberDana->getSumberDanaId() !== $v) {
            $this->aSumberDana = null;
        }


        return $this;
    } // setSumberDanaId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JenisBeasiswaPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [untuk_pd] column.
     * 
     * @param string $v new value
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setUntukPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_pd !== $v) {
            $this->untuk_pd = $v;
            $this->modifiedColumns[] = JenisBeasiswaPeer::UNTUK_PD;
        }


        return $this;
    } // setUntukPd()

    /**
     * Set the value of [untuk_ptk] column.
     * 
     * @param string $v new value
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setUntukPtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_ptk !== $v) {
            $this->untuk_ptk = $v;
            $this->modifiedColumns[] = JenisBeasiswaPeer::UNTUK_PTK;
        }


        return $this;
    } // setUntukPtk()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenisBeasiswaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenisBeasiswaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenisBeasiswaPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisBeasiswa The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenisBeasiswaPeer::LAST_SYNC;
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

            $this->jenis_beasiswa_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->sumber_dana_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->untuk_pd = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->untuk_ptk = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
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
            return $startcol + 9; // 9 = JenisBeasiswaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenisBeasiswa object", $e);
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

        if ($this->aSumberDana !== null && $this->sumber_dana_id !== $this->aSumberDana->getSumberDanaId()) {
            $this->aSumberDana = null;
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
            $con = Propel::getConnection(JenisBeasiswaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenisBeasiswaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSumberDana = null;
            $this->collBeasiswaPesertaDidiks = null;

            $this->collBeasiswaPtks = null;

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
            $con = Propel::getConnection(JenisBeasiswaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenisBeasiswaQuery::create()
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
            $con = Propel::getConnection(JenisBeasiswaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenisBeasiswaPeer::addInstanceToPool($this);
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

            if ($this->aSumberDana !== null) {
                if ($this->aSumberDana->isModified() || $this->aSumberDana->isNew()) {
                    $affectedRows += $this->aSumberDana->save($con);
                }
                $this->setSumberDana($this->aSumberDana);
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

            if ($this->beasiswaPesertaDidiksScheduledForDeletion !== null) {
                if (!$this->beasiswaPesertaDidiksScheduledForDeletion->isEmpty()) {
                    BeasiswaPesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->beasiswaPesertaDidiksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->beasiswaPesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collBeasiswaPesertaDidiks !== null) {
                foreach ($this->collBeasiswaPesertaDidiks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->beasiswaPtksScheduledForDeletion !== null) {
                if (!$this->beasiswaPtksScheduledForDeletion->isEmpty()) {
                    BeasiswaPtkQuery::create()
                        ->filterByPrimaryKeys($this->beasiswaPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->beasiswaPtksScheduledForDeletion = null;
                }
            }

            if ($this->collBeasiswaPtks !== null) {
                foreach ($this->collBeasiswaPtks as $referrerFK) {
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
        if ($this->isColumnModified(JenisBeasiswaPeer::JENIS_BEASISWA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_beasiswa_id"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::SUMBER_DANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_dana_id"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::UNTUK_PD)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_pd"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::UNTUK_PTK)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_ptk"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenisBeasiswaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenis_beasiswa" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenis_beasiswa_id"':						
                        $stmt->bindValue($identifier, $this->jenis_beasiswa_id, PDO::PARAM_INT);
                        break;
                    case '"sumber_dana_id"':						
                        $stmt->bindValue($identifier, $this->sumber_dana_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"untuk_pd"':						
                        $stmt->bindValue($identifier, $this->untuk_pd, PDO::PARAM_STR);
                        break;
                    case '"untuk_ptk"':						
                        $stmt->bindValue($identifier, $this->untuk_ptk, PDO::PARAM_STR);
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

            if ($this->aSumberDana !== null) {
                if (!$this->aSumberDana->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberDana->getValidationFailures());
                }
            }


            if (($retval = JenisBeasiswaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBeasiswaPesertaDidiks !== null) {
                    foreach ($this->collBeasiswaPesertaDidiks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBeasiswaPtks !== null) {
                    foreach ($this->collBeasiswaPtks as $referrerFK) {
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
        $pos = JenisBeasiswaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenisBeasiswaId();
                break;
            case 1:
                return $this->getSumberDanaId();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getUntukPd();
                break;
            case 4:
                return $this->getUntukPtk();
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
        if (isset($alreadyDumpedObjects['JenisBeasiswa'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenisBeasiswa'][$this->getPrimaryKey()] = true;
        $keys = JenisBeasiswaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenisBeasiswaId(),
            $keys[1] => $this->getSumberDanaId(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getUntukPd(),
            $keys[4] => $this->getUntukPtk(),
            $keys[5] => $this->getCreateDate(),
            $keys[6] => $this->getLastUpdate(),
            $keys[7] => $this->getExpiredDate(),
            $keys[8] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSumberDana) {
                $result['SumberDana'] = $this->aSumberDana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBeasiswaPesertaDidiks) {
                $result['BeasiswaPesertaDidiks'] = $this->collBeasiswaPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBeasiswaPtks) {
                $result['BeasiswaPtks'] = $this->collBeasiswaPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenisBeasiswaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenisBeasiswaId($value);
                break;
            case 1:
                $this->setSumberDanaId($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setUntukPd($value);
                break;
            case 4:
                $this->setUntukPtk($value);
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
        $keys = JenisBeasiswaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenisBeasiswaId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSumberDanaId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUntukPd($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUntukPtk($arr[$keys[4]]);
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
        $criteria = new Criteria(JenisBeasiswaPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenisBeasiswaPeer::JENIS_BEASISWA_ID)) $criteria->add(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $this->jenis_beasiswa_id);
        if ($this->isColumnModified(JenisBeasiswaPeer::SUMBER_DANA_ID)) $criteria->add(JenisBeasiswaPeer::SUMBER_DANA_ID, $this->sumber_dana_id);
        if ($this->isColumnModified(JenisBeasiswaPeer::NAMA)) $criteria->add(JenisBeasiswaPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JenisBeasiswaPeer::UNTUK_PD)) $criteria->add(JenisBeasiswaPeer::UNTUK_PD, $this->untuk_pd);
        if ($this->isColumnModified(JenisBeasiswaPeer::UNTUK_PTK)) $criteria->add(JenisBeasiswaPeer::UNTUK_PTK, $this->untuk_ptk);
        if ($this->isColumnModified(JenisBeasiswaPeer::CREATE_DATE)) $criteria->add(JenisBeasiswaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenisBeasiswaPeer::LAST_UPDATE)) $criteria->add(JenisBeasiswaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenisBeasiswaPeer::EXPIRED_DATE)) $criteria->add(JenisBeasiswaPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenisBeasiswaPeer::LAST_SYNC)) $criteria->add(JenisBeasiswaPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenisBeasiswaPeer::DATABASE_NAME);
        $criteria->add(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $this->jenis_beasiswa_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getJenisBeasiswaId();
    }

    /**
     * Generic method to set the primary key (jenis_beasiswa_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenisBeasiswaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenisBeasiswaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenisBeasiswa (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSumberDanaId($this->getSumberDanaId());
        $copyObj->setNama($this->getNama());
        $copyObj->setUntukPd($this->getUntukPd());
        $copyObj->setUntukPtk($this->getUntukPtk());
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

            foreach ($this->getBeasiswaPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBeasiswaPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBeasiswaPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBeasiswaPtk($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenisBeasiswaId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenisBeasiswa Clone of current object.
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
     * @return JenisBeasiswaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenisBeasiswaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a SumberDana object.
     *
     * @param             SumberDana $v
     * @return JenisBeasiswa The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSumberDana(SumberDana $v = null)
    {
        if ($v === null) {
            $this->setSumberDanaId(NULL);
        } else {
            $this->setSumberDanaId($v->getSumberDanaId());
        }

        $this->aSumberDana = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SumberDana object, it will not be re-added.
        if ($v !== null) {
            $v->addJenisBeasiswa($this);
        }


        return $this;
    }


    /**
     * Get the associated SumberDana object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SumberDana The associated SumberDana object.
     * @throws PropelException
     */
    public function getSumberDana(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSumberDana === null && (($this->sumber_dana_id !== "" && $this->sumber_dana_id !== null)) && $doQuery) {
            $this->aSumberDana = SumberDanaQuery::create()->findPk($this->sumber_dana_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSumberDana->addJenisBeasiswas($this);
             */
        }

        return $this->aSumberDana;
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
        if ('BeasiswaPesertaDidik' == $relationName) {
            $this->initBeasiswaPesertaDidiks();
        }
        if ('BeasiswaPtk' == $relationName) {
            $this->initBeasiswaPtks();
        }
    }

    /**
     * Clears out the collBeasiswaPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisBeasiswa The current object (for fluent API support)
     * @see        addBeasiswaPesertaDidiks()
     */
    public function clearBeasiswaPesertaDidiks()
    {
        $this->collBeasiswaPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collBeasiswaPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collBeasiswaPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialBeasiswaPesertaDidiks($v = true)
    {
        $this->collBeasiswaPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collBeasiswaPesertaDidiks collection.
     *
     * By default this just sets the collBeasiswaPesertaDidiks collection to an empty array (like clearcollBeasiswaPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBeasiswaPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collBeasiswaPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collBeasiswaPesertaDidiks = new PropelObjectCollection();
        $this->collBeasiswaPesertaDidiks->setModel('BeasiswaPesertaDidik');
    }

    /**
     * Gets an array of BeasiswaPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisBeasiswa is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     * @throws PropelException
     */
    public function getBeasiswaPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiks) {
                // return empty collection
                $this->initBeasiswaPesertaDidiks();
            } else {
                $collBeasiswaPesertaDidiks = BeasiswaPesertaDidikQuery::create(null, $criteria)
                    ->filterByJenisBeasiswa($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBeasiswaPesertaDidiksPartial && count($collBeasiswaPesertaDidiks)) {
                      $this->initBeasiswaPesertaDidiks(false);

                      foreach($collBeasiswaPesertaDidiks as $obj) {
                        if (false == $this->collBeasiswaPesertaDidiks->contains($obj)) {
                          $this->collBeasiswaPesertaDidiks->append($obj);
                        }
                      }

                      $this->collBeasiswaPesertaDidiksPartial = true;
                    }

                    $collBeasiswaPesertaDidiks->getInternalIterator()->rewind();
                    return $collBeasiswaPesertaDidiks;
                }

                if($partial && $this->collBeasiswaPesertaDidiks) {
                    foreach($this->collBeasiswaPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collBeasiswaPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collBeasiswaPesertaDidiks = $collBeasiswaPesertaDidiks;
                $this->collBeasiswaPesertaDidiksPartial = false;
            }
        }

        return $this->collBeasiswaPesertaDidiks;
    }

    /**
     * Sets a collection of BeasiswaPesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $beasiswaPesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setBeasiswaPesertaDidiks(PropelCollection $beasiswaPesertaDidiks, PropelPDO $con = null)
    {
        $beasiswaPesertaDidiksToDelete = $this->getBeasiswaPesertaDidiks(new Criteria(), $con)->diff($beasiswaPesertaDidiks);

        $this->beasiswaPesertaDidiksScheduledForDeletion = unserialize(serialize($beasiswaPesertaDidiksToDelete));

        foreach ($beasiswaPesertaDidiksToDelete as $beasiswaPesertaDidikRemoved) {
            $beasiswaPesertaDidikRemoved->setJenisBeasiswa(null);
        }

        $this->collBeasiswaPesertaDidiks = null;
        foreach ($beasiswaPesertaDidiks as $beasiswaPesertaDidik) {
            $this->addBeasiswaPesertaDidik($beasiswaPesertaDidik);
        }

        $this->collBeasiswaPesertaDidiks = $beasiswaPesertaDidiks;
        $this->collBeasiswaPesertaDidiksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BeasiswaPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BeasiswaPesertaDidik objects.
     * @throws PropelException
     */
    public function countBeasiswaPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBeasiswaPesertaDidiks());
            }
            $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisBeasiswa($this)
                ->count($con);
        }

        return count($this->collBeasiswaPesertaDidiks);
    }

    /**
     * Method called to associate a BeasiswaPesertaDidik object to this object
     * through the BeasiswaPesertaDidik foreign key attribute.
     *
     * @param    BeasiswaPesertaDidik $l BeasiswaPesertaDidik
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function addBeasiswaPesertaDidik(BeasiswaPesertaDidik $l)
    {
        if ($this->collBeasiswaPesertaDidiks === null) {
            $this->initBeasiswaPesertaDidiks();
            $this->collBeasiswaPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collBeasiswaPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBeasiswaPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	BeasiswaPesertaDidik $beasiswaPesertaDidik The beasiswaPesertaDidik object to add.
     */
    protected function doAddBeasiswaPesertaDidik($beasiswaPesertaDidik)
    {
        $this->collBeasiswaPesertaDidiks[]= $beasiswaPesertaDidik;
        $beasiswaPesertaDidik->setJenisBeasiswa($this);
    }

    /**
     * @param	BeasiswaPesertaDidik $beasiswaPesertaDidik The beasiswaPesertaDidik object to remove.
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function removeBeasiswaPesertaDidik($beasiswaPesertaDidik)
    {
        if ($this->getBeasiswaPesertaDidiks()->contains($beasiswaPesertaDidik)) {
            $this->collBeasiswaPesertaDidiks->remove($this->collBeasiswaPesertaDidiks->search($beasiswaPesertaDidik));
            if (null === $this->beasiswaPesertaDidiksScheduledForDeletion) {
                $this->beasiswaPesertaDidiksScheduledForDeletion = clone $this->collBeasiswaPesertaDidiks;
                $this->beasiswaPesertaDidiksScheduledForDeletion->clear();
            }
            $this->beasiswaPesertaDidiksScheduledForDeletion[]= clone $beasiswaPesertaDidik;
            $beasiswaPesertaDidik->setJenisBeasiswa(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisBeasiswa is new, it will return
     * an empty collection; or if this JenisBeasiswa has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisBeasiswa.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getBeasiswaPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisBeasiswa is new, it will return
     * an empty collection; or if this JenisBeasiswa has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisBeasiswa.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksJoinTahunAjaranRelatedByTahunSelesai($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('TahunAjaranRelatedByTahunSelesai', $join_behavior);

        return $this->getBeasiswaPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisBeasiswa is new, it will return
     * an empty collection; or if this JenisBeasiswa has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisBeasiswa.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksJoinTahunAjaranRelatedByTahunMulai($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('TahunAjaranRelatedByTahunMulai', $join_behavior);

        return $this->getBeasiswaPesertaDidiks($query, $con);
    }

    /**
     * Clears out the collBeasiswaPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisBeasiswa The current object (for fluent API support)
     * @see        addBeasiswaPtks()
     */
    public function clearBeasiswaPtks()
    {
        $this->collBeasiswaPtks = null; // important to set this to null since that means it is uninitialized
        $this->collBeasiswaPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collBeasiswaPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialBeasiswaPtks($v = true)
    {
        $this->collBeasiswaPtksPartial = $v;
    }

    /**
     * Initializes the collBeasiswaPtks collection.
     *
     * By default this just sets the collBeasiswaPtks collection to an empty array (like clearcollBeasiswaPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBeasiswaPtks($overrideExisting = true)
    {
        if (null !== $this->collBeasiswaPtks && !$overrideExisting) {
            return;
        }
        $this->collBeasiswaPtks = new PropelObjectCollection();
        $this->collBeasiswaPtks->setModel('BeasiswaPtk');
    }

    /**
     * Gets an array of BeasiswaPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisBeasiswa is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BeasiswaPtk[] List of BeasiswaPtk objects
     * @throws PropelException
     */
    public function getBeasiswaPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPtksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPtks) {
                // return empty collection
                $this->initBeasiswaPtks();
            } else {
                $collBeasiswaPtks = BeasiswaPtkQuery::create(null, $criteria)
                    ->filterByJenisBeasiswa($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBeasiswaPtksPartial && count($collBeasiswaPtks)) {
                      $this->initBeasiswaPtks(false);

                      foreach($collBeasiswaPtks as $obj) {
                        if (false == $this->collBeasiswaPtks->contains($obj)) {
                          $this->collBeasiswaPtks->append($obj);
                        }
                      }

                      $this->collBeasiswaPtksPartial = true;
                    }

                    $collBeasiswaPtks->getInternalIterator()->rewind();
                    return $collBeasiswaPtks;
                }

                if($partial && $this->collBeasiswaPtks) {
                    foreach($this->collBeasiswaPtks as $obj) {
                        if($obj->isNew()) {
                            $collBeasiswaPtks[] = $obj;
                        }
                    }
                }

                $this->collBeasiswaPtks = $collBeasiswaPtks;
                $this->collBeasiswaPtksPartial = false;
            }
        }

        return $this->collBeasiswaPtks;
    }

    /**
     * Sets a collection of BeasiswaPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $beasiswaPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function setBeasiswaPtks(PropelCollection $beasiswaPtks, PropelPDO $con = null)
    {
        $beasiswaPtksToDelete = $this->getBeasiswaPtks(new Criteria(), $con)->diff($beasiswaPtks);

        $this->beasiswaPtksScheduledForDeletion = unserialize(serialize($beasiswaPtksToDelete));

        foreach ($beasiswaPtksToDelete as $beasiswaPtkRemoved) {
            $beasiswaPtkRemoved->setJenisBeasiswa(null);
        }

        $this->collBeasiswaPtks = null;
        foreach ($beasiswaPtks as $beasiswaPtk) {
            $this->addBeasiswaPtk($beasiswaPtk);
        }

        $this->collBeasiswaPtks = $beasiswaPtks;
        $this->collBeasiswaPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BeasiswaPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BeasiswaPtk objects.
     * @throws PropelException
     */
    public function countBeasiswaPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPtksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBeasiswaPtks());
            }
            $query = BeasiswaPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisBeasiswa($this)
                ->count($con);
        }

        return count($this->collBeasiswaPtks);
    }

    /**
     * Method called to associate a BeasiswaPtk object to this object
     * through the BeasiswaPtk foreign key attribute.
     *
     * @param    BeasiswaPtk $l BeasiswaPtk
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function addBeasiswaPtk(BeasiswaPtk $l)
    {
        if ($this->collBeasiswaPtks === null) {
            $this->initBeasiswaPtks();
            $this->collBeasiswaPtksPartial = true;
        }
        if (!in_array($l, $this->collBeasiswaPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBeasiswaPtk($l);
        }

        return $this;
    }

    /**
     * @param	BeasiswaPtk $beasiswaPtk The beasiswaPtk object to add.
     */
    protected function doAddBeasiswaPtk($beasiswaPtk)
    {
        $this->collBeasiswaPtks[]= $beasiswaPtk;
        $beasiswaPtk->setJenisBeasiswa($this);
    }

    /**
     * @param	BeasiswaPtk $beasiswaPtk The beasiswaPtk object to remove.
     * @return JenisBeasiswa The current object (for fluent API support)
     */
    public function removeBeasiswaPtk($beasiswaPtk)
    {
        if ($this->getBeasiswaPtks()->contains($beasiswaPtk)) {
            $this->collBeasiswaPtks->remove($this->collBeasiswaPtks->search($beasiswaPtk));
            if (null === $this->beasiswaPtksScheduledForDeletion) {
                $this->beasiswaPtksScheduledForDeletion = clone $this->collBeasiswaPtks;
                $this->beasiswaPtksScheduledForDeletion->clear();
            }
            $this->beasiswaPtksScheduledForDeletion[]= clone $beasiswaPtk;
            $beasiswaPtk->setJenisBeasiswa(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisBeasiswa is new, it will return
     * an empty collection; or if this JenisBeasiswa has previously
     * been saved, it will retrieve related BeasiswaPtks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisBeasiswa.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPtk[] List of BeasiswaPtk objects
     */
    public function getBeasiswaPtksJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPtkQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getBeasiswaPtks($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenis_beasiswa_id = null;
        $this->sumber_dana_id = null;
        $this->nama = null;
        $this->untuk_pd = null;
        $this->untuk_ptk = null;
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
            if ($this->collBeasiswaPesertaDidiks) {
                foreach ($this->collBeasiswaPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBeasiswaPtks) {
                foreach ($this->collBeasiswaPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSumberDana instanceof Persistent) {
              $this->aSumberDana->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBeasiswaPesertaDidiks instanceof PropelCollection) {
            $this->collBeasiswaPesertaDidiks->clearIterator();
        }
        $this->collBeasiswaPesertaDidiks = null;
        if ($this->collBeasiswaPtks instanceof PropelCollection) {
            $this->collBeasiswaPtks->clearIterator();
        }
        $this->collBeasiswaPtks = null;
        $this->aSumberDana = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenisBeasiswaPeer::DEFAULT_STRING_FORMAT);
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
