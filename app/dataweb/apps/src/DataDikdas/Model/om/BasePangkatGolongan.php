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
use DataDikdas\Model\Inpassing;
use DataDikdas\Model\InpassingQuery;
use DataDikdas\Model\PangkatGolongan;
use DataDikdas\Model\PangkatGolonganPeer;
use DataDikdas\Model\PangkatGolonganQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RiwayatGajiBerkala;
use DataDikdas\Model\RiwayatGajiBerkalaQuery;
use DataDikdas\Model\RwyKepangkatan;
use DataDikdas\Model\RwyKepangkatanQuery;

/**
 * Base class that represents a row from the 'ref.pangkat_golongan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePangkatGolongan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PangkatGolonganPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PangkatGolonganPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the pangkat_golongan_id field.
     * @var        string
     */
    protected $pangkat_golongan_id;

    /**
     * The value for the kode field.
     * @var        string
     */
    protected $kode;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

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
     * @var        PropelObjectCollection|Inpassing[] Collection to store aggregation of Inpassing objects.
     */
    protected $collInpassings;
    protected $collInpassingsPartial;

    /**
     * @var        PropelObjectCollection|Ptk[] Collection to store aggregation of Ptk objects.
     */
    protected $collPtks;
    protected $collPtksPartial;

    /**
     * @var        PropelObjectCollection|RiwayatGajiBerkala[] Collection to store aggregation of RiwayatGajiBerkala objects.
     */
    protected $collRiwayatGajiBerkalas;
    protected $collRiwayatGajiBerkalasPartial;

    /**
     * @var        PropelObjectCollection|RwyKepangkatan[] Collection to store aggregation of RwyKepangkatan objects.
     */
    protected $collRwyKepangkatans;
    protected $collRwyKepangkatansPartial;

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
    protected $inpassingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $riwayatGajiBerkalasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyKepangkatansScheduledForDeletion = null;

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
     * Initializes internal state of BasePangkatGolongan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [pangkat_golongan_id] column value.
     * 
     * @return string
     */
    public function getPangkatGolonganId()
    {
        return $this->pangkat_golongan_id;
    }

    /**
     * Get the [kode] column value.
     * 
     * @return string
     */
    public function getKode()
    {
        return $this->kode;
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
     * Set the value of [pangkat_golongan_id] column.
     * 
     * @param string $v new value
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setPangkatGolonganId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pangkat_golongan_id !== $v) {
            $this->pangkat_golongan_id = $v;
            $this->modifiedColumns[] = PangkatGolonganPeer::PANGKAT_GOLONGAN_ID;
        }


        return $this;
    } // setPangkatGolonganId()

    /**
     * Set the value of [kode] column.
     * 
     * @param string $v new value
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setKode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode !== $v) {
            $this->kode = $v;
            $this->modifiedColumns[] = PangkatGolonganPeer::KODE;
        }


        return $this;
    } // setKode()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = PangkatGolonganPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PangkatGolonganPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PangkatGolonganPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = PangkatGolonganPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PangkatGolongan The current object (for fluent API support)
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
                $this->modifiedColumns[] = PangkatGolonganPeer::LAST_SYNC;
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

            $this->pangkat_golongan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->kode = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
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
            return $startcol + 7; // 7 = PangkatGolonganPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PangkatGolongan object", $e);
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
            $con = Propel::getConnection(PangkatGolonganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PangkatGolonganPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collInpassings = null;

            $this->collPtks = null;

            $this->collRiwayatGajiBerkalas = null;

            $this->collRwyKepangkatans = null;

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
            $con = Propel::getConnection(PangkatGolonganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PangkatGolonganQuery::create()
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
            $con = Propel::getConnection(PangkatGolonganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PangkatGolonganPeer::addInstanceToPool($this);
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

            if ($this->inpassingsScheduledForDeletion !== null) {
                if (!$this->inpassingsScheduledForDeletion->isEmpty()) {
                    InpassingQuery::create()
                        ->filterByPrimaryKeys($this->inpassingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->inpassingsScheduledForDeletion = null;
                }
            }

            if ($this->collInpassings !== null) {
                foreach ($this->collInpassings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ptksScheduledForDeletion !== null) {
                if (!$this->ptksScheduledForDeletion->isEmpty()) {
                    foreach ($this->ptksScheduledForDeletion as $ptk) {
                        // need to save related object because we set the relation to null
                        $ptk->save($con);
                    }
                    $this->ptksScheduledForDeletion = null;
                }
            }

            if ($this->collPtks !== null) {
                foreach ($this->collPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->riwayatGajiBerkalasScheduledForDeletion !== null) {
                if (!$this->riwayatGajiBerkalasScheduledForDeletion->isEmpty()) {
                    RiwayatGajiBerkalaQuery::create()
                        ->filterByPrimaryKeys($this->riwayatGajiBerkalasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->riwayatGajiBerkalasScheduledForDeletion = null;
                }
            }

            if ($this->collRiwayatGajiBerkalas !== null) {
                foreach ($this->collRiwayatGajiBerkalas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwyKepangkatansScheduledForDeletion !== null) {
                if (!$this->rwyKepangkatansScheduledForDeletion->isEmpty()) {
                    RwyKepangkatanQuery::create()
                        ->filterByPrimaryKeys($this->rwyKepangkatansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyKepangkatansScheduledForDeletion = null;
                }
            }

            if ($this->collRwyKepangkatans !== null) {
                foreach ($this->collRwyKepangkatans as $referrerFK) {
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
        if ($this->isColumnModified(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pangkat_golongan_id"';
        }
        if ($this->isColumnModified(PangkatGolonganPeer::KODE)) {
            $modifiedColumns[':p' . $index++]  = '"kode"';
        }
        if ($this->isColumnModified(PangkatGolonganPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(PangkatGolonganPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PangkatGolonganPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PangkatGolonganPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(PangkatGolonganPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."pangkat_golongan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"pangkat_golongan_id"':						
                        $stmt->bindValue($identifier, $this->pangkat_golongan_id, PDO::PARAM_STR);
                        break;
                    case '"kode"':						
                        $stmt->bindValue($identifier, $this->kode, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
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


            if (($retval = PangkatGolonganPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collInpassings !== null) {
                    foreach ($this->collInpassings as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPtks !== null) {
                    foreach ($this->collPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRiwayatGajiBerkalas !== null) {
                    foreach ($this->collRiwayatGajiBerkalas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyKepangkatans !== null) {
                    foreach ($this->collRwyKepangkatans as $referrerFK) {
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
        $pos = PangkatGolonganPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPangkatGolonganId();
                break;
            case 1:
                return $this->getKode();
                break;
            case 2:
                return $this->getNama();
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
        if (isset($alreadyDumpedObjects['PangkatGolongan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PangkatGolongan'][$this->getPrimaryKey()] = true;
        $keys = PangkatGolonganPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPangkatGolonganId(),
            $keys[1] => $this->getKode(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getCreateDate(),
            $keys[4] => $this->getLastUpdate(),
            $keys[5] => $this->getExpiredDate(),
            $keys[6] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collInpassings) {
                $result['Inpassings'] = $this->collInpassings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtks) {
                $result['Ptks'] = $this->collPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRiwayatGajiBerkalas) {
                $result['RiwayatGajiBerkalas'] = $this->collRiwayatGajiBerkalas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyKepangkatans) {
                $result['RwyKepangkatans'] = $this->collRwyKepangkatans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PangkatGolonganPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPangkatGolonganId($value);
                break;
            case 1:
                $this->setKode($value);
                break;
            case 2:
                $this->setNama($value);
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
        $keys = PangkatGolonganPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPangkatGolonganId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
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
        $criteria = new Criteria(PangkatGolonganPeer::DATABASE_NAME);

        if ($this->isColumnModified(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID)) $criteria->add(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $this->pangkat_golongan_id);
        if ($this->isColumnModified(PangkatGolonganPeer::KODE)) $criteria->add(PangkatGolonganPeer::KODE, $this->kode);
        if ($this->isColumnModified(PangkatGolonganPeer::NAMA)) $criteria->add(PangkatGolonganPeer::NAMA, $this->nama);
        if ($this->isColumnModified(PangkatGolonganPeer::CREATE_DATE)) $criteria->add(PangkatGolonganPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PangkatGolonganPeer::LAST_UPDATE)) $criteria->add(PangkatGolonganPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PangkatGolonganPeer::EXPIRED_DATE)) $criteria->add(PangkatGolonganPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(PangkatGolonganPeer::LAST_SYNC)) $criteria->add(PangkatGolonganPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(PangkatGolonganPeer::DATABASE_NAME);
        $criteria->add(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $this->pangkat_golongan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPangkatGolonganId();
    }

    /**
     * Generic method to set the primary key (pangkat_golongan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPangkatGolonganId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPangkatGolonganId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of PangkatGolongan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKode($this->getKode());
        $copyObj->setNama($this->getNama());
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

            foreach ($this->getInpassings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInpassing($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRiwayatGajiBerkalas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRiwayatGajiBerkala($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyKepangkatans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyKepangkatan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPangkatGolonganId(NULL); // this is a auto-increment column, so set to default value
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
     * @return PangkatGolongan Clone of current object.
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
     * @return PangkatGolonganPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PangkatGolonganPeer();
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
        if ('Inpassing' == $relationName) {
            $this->initInpassings();
        }
        if ('Ptk' == $relationName) {
            $this->initPtks();
        }
        if ('RiwayatGajiBerkala' == $relationName) {
            $this->initRiwayatGajiBerkalas();
        }
        if ('RwyKepangkatan' == $relationName) {
            $this->initRwyKepangkatans();
        }
    }

    /**
     * Clears out the collInpassings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PangkatGolongan The current object (for fluent API support)
     * @see        addInpassings()
     */
    public function clearInpassings()
    {
        $this->collInpassings = null; // important to set this to null since that means it is uninitialized
        $this->collInpassingsPartial = null;

        return $this;
    }

    /**
     * reset is the collInpassings collection loaded partially
     *
     * @return void
     */
    public function resetPartialInpassings($v = true)
    {
        $this->collInpassingsPartial = $v;
    }

    /**
     * Initializes the collInpassings collection.
     *
     * By default this just sets the collInpassings collection to an empty array (like clearcollInpassings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInpassings($overrideExisting = true)
    {
        if (null !== $this->collInpassings && !$overrideExisting) {
            return;
        }
        $this->collInpassings = new PropelObjectCollection();
        $this->collInpassings->setModel('Inpassing');
    }

    /**
     * Gets an array of Inpassing objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PangkatGolongan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Inpassing[] List of Inpassing objects
     * @throws PropelException
     */
    public function getInpassings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInpassingsPartial && !$this->isNew();
        if (null === $this->collInpassings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInpassings) {
                // return empty collection
                $this->initInpassings();
            } else {
                $collInpassings = InpassingQuery::create(null, $criteria)
                    ->filterByPangkatGolongan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInpassingsPartial && count($collInpassings)) {
                      $this->initInpassings(false);

                      foreach($collInpassings as $obj) {
                        if (false == $this->collInpassings->contains($obj)) {
                          $this->collInpassings->append($obj);
                        }
                      }

                      $this->collInpassingsPartial = true;
                    }

                    $collInpassings->getInternalIterator()->rewind();
                    return $collInpassings;
                }

                if($partial && $this->collInpassings) {
                    foreach($this->collInpassings as $obj) {
                        if($obj->isNew()) {
                            $collInpassings[] = $obj;
                        }
                    }
                }

                $this->collInpassings = $collInpassings;
                $this->collInpassingsPartial = false;
            }
        }

        return $this->collInpassings;
    }

    /**
     * Sets a collection of Inpassing objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $inpassings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setInpassings(PropelCollection $inpassings, PropelPDO $con = null)
    {
        $inpassingsToDelete = $this->getInpassings(new Criteria(), $con)->diff($inpassings);

        $this->inpassingsScheduledForDeletion = unserialize(serialize($inpassingsToDelete));

        foreach ($inpassingsToDelete as $inpassingRemoved) {
            $inpassingRemoved->setPangkatGolongan(null);
        }

        $this->collInpassings = null;
        foreach ($inpassings as $inpassing) {
            $this->addInpassing($inpassing);
        }

        $this->collInpassings = $inpassings;
        $this->collInpassingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Inpassing objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Inpassing objects.
     * @throws PropelException
     */
    public function countInpassings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInpassingsPartial && !$this->isNew();
        if (null === $this->collInpassings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInpassings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getInpassings());
            }
            $query = InpassingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPangkatGolongan($this)
                ->count($con);
        }

        return count($this->collInpassings);
    }

    /**
     * Method called to associate a Inpassing object to this object
     * through the Inpassing foreign key attribute.
     *
     * @param    Inpassing $l Inpassing
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function addInpassing(Inpassing $l)
    {
        if ($this->collInpassings === null) {
            $this->initInpassings();
            $this->collInpassingsPartial = true;
        }
        if (!in_array($l, $this->collInpassings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInpassing($l);
        }

        return $this;
    }

    /**
     * @param	Inpassing $inpassing The inpassing object to add.
     */
    protected function doAddInpassing($inpassing)
    {
        $this->collInpassings[]= $inpassing;
        $inpassing->setPangkatGolongan($this);
    }

    /**
     * @param	Inpassing $inpassing The inpassing object to remove.
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function removeInpassing($inpassing)
    {
        if ($this->getInpassings()->contains($inpassing)) {
            $this->collInpassings->remove($this->collInpassings->search($inpassing));
            if (null === $this->inpassingsScheduledForDeletion) {
                $this->inpassingsScheduledForDeletion = clone $this->collInpassings;
                $this->inpassingsScheduledForDeletion->clear();
            }
            $this->inpassingsScheduledForDeletion[]= clone $inpassing;
            $inpassing->setPangkatGolongan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Inpassings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Inpassing[] List of Inpassing objects
     */
    public function getInpassingsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = InpassingQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getInpassings($query, $con);
    }

    /**
     * Clears out the collPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PangkatGolongan The current object (for fluent API support)
     * @see        addPtks()
     */
    public function clearPtks()
    {
        $this->collPtks = null; // important to set this to null since that means it is uninitialized
        $this->collPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialPtks($v = true)
    {
        $this->collPtksPartial = $v;
    }

    /**
     * Initializes the collPtks collection.
     *
     * By default this just sets the collPtks collection to an empty array (like clearcollPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPtks($overrideExisting = true)
    {
        if (null !== $this->collPtks && !$overrideExisting) {
            return;
        }
        $this->collPtks = new PropelObjectCollection();
        $this->collPtks->setModel('Ptk');
    }

    /**
     * Gets an array of Ptk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PangkatGolongan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     * @throws PropelException
     */
    public function getPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPtksPartial && !$this->isNew();
        if (null === $this->collPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPtks) {
                // return empty collection
                $this->initPtks();
            } else {
                $collPtks = PtkQuery::create(null, $criteria)
                    ->filterByPangkatGolongan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPtksPartial && count($collPtks)) {
                      $this->initPtks(false);

                      foreach($collPtks as $obj) {
                        if (false == $this->collPtks->contains($obj)) {
                          $this->collPtks->append($obj);
                        }
                      }

                      $this->collPtksPartial = true;
                    }

                    $collPtks->getInternalIterator()->rewind();
                    return $collPtks;
                }

                if($partial && $this->collPtks) {
                    foreach($this->collPtks as $obj) {
                        if($obj->isNew()) {
                            $collPtks[] = $obj;
                        }
                    }
                }

                $this->collPtks = $collPtks;
                $this->collPtksPartial = false;
            }
        }

        return $this->collPtks;
    }

    /**
     * Sets a collection of Ptk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ptks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setPtks(PropelCollection $ptks, PropelPDO $con = null)
    {
        $ptksToDelete = $this->getPtks(new Criteria(), $con)->diff($ptks);

        $this->ptksScheduledForDeletion = unserialize(serialize($ptksToDelete));

        foreach ($ptksToDelete as $ptkRemoved) {
            $ptkRemoved->setPangkatGolongan(null);
        }

        $this->collPtks = null;
        foreach ($ptks as $ptk) {
            $this->addPtk($ptk);
        }

        $this->collPtks = $ptks;
        $this->collPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Ptk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Ptk objects.
     * @throws PropelException
     */
    public function countPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPtksPartial && !$this->isNew();
        if (null === $this->collPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPtks());
            }
            $query = PtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPangkatGolongan($this)
                ->count($con);
        }

        return count($this->collPtks);
    }

    /**
     * Method called to associate a Ptk object to this object
     * through the Ptk foreign key attribute.
     *
     * @param    Ptk $l Ptk
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function addPtk(Ptk $l)
    {
        if ($this->collPtks === null) {
            $this->initPtks();
            $this->collPtksPartial = true;
        }
        if (!in_array($l, $this->collPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPtk($l);
        }

        return $this;
    }

    /**
     * @param	Ptk $ptk The ptk object to add.
     */
    protected function doAddPtk($ptk)
    {
        $this->collPtks[]= $ptk;
        $ptk->setPangkatGolongan($this);
    }

    /**
     * @param	Ptk $ptk The ptk object to remove.
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function removePtk($ptk)
    {
        if ($this->getPtks()->contains($ptk)) {
            $this->collPtks->remove($this->collPtks->search($ptk));
            if (null === $this->ptksScheduledForDeletion) {
                $this->ptksScheduledForDeletion = clone $this->collPtks;
                $this->ptksScheduledForDeletion->clear();
            }
            $this->ptksScheduledForDeletion[]= $ptk;
            $ptk->setPangkatGolongan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinJenisPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('JenisPtk', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinLembagaPengangkat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('LembagaPengangkat', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinStatusKeaktifanPegawai($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('StatusKeaktifanPegawai', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinSumberGaji($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('SumberGaji', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinKeahlianLaboratorium($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('KeahlianLaboratorium', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinPekerjaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Pekerjaan', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinStatusKepegawaian($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('StatusKepegawaian', $join_behavior);

        return $this->getPtks($query, $con);
    }

    /**
     * Clears out the collRiwayatGajiBerkalas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PangkatGolongan The current object (for fluent API support)
     * @see        addRiwayatGajiBerkalas()
     */
    public function clearRiwayatGajiBerkalas()
    {
        $this->collRiwayatGajiBerkalas = null; // important to set this to null since that means it is uninitialized
        $this->collRiwayatGajiBerkalasPartial = null;

        return $this;
    }

    /**
     * reset is the collRiwayatGajiBerkalas collection loaded partially
     *
     * @return void
     */
    public function resetPartialRiwayatGajiBerkalas($v = true)
    {
        $this->collRiwayatGajiBerkalasPartial = $v;
    }

    /**
     * Initializes the collRiwayatGajiBerkalas collection.
     *
     * By default this just sets the collRiwayatGajiBerkalas collection to an empty array (like clearcollRiwayatGajiBerkalas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRiwayatGajiBerkalas($overrideExisting = true)
    {
        if (null !== $this->collRiwayatGajiBerkalas && !$overrideExisting) {
            return;
        }
        $this->collRiwayatGajiBerkalas = new PropelObjectCollection();
        $this->collRiwayatGajiBerkalas->setModel('RiwayatGajiBerkala');
    }

    /**
     * Gets an array of RiwayatGajiBerkala objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PangkatGolongan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RiwayatGajiBerkala[] List of RiwayatGajiBerkala objects
     * @throws PropelException
     */
    public function getRiwayatGajiBerkalas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRiwayatGajiBerkalasPartial && !$this->isNew();
        if (null === $this->collRiwayatGajiBerkalas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRiwayatGajiBerkalas) {
                // return empty collection
                $this->initRiwayatGajiBerkalas();
            } else {
                $collRiwayatGajiBerkalas = RiwayatGajiBerkalaQuery::create(null, $criteria)
                    ->filterByPangkatGolongan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRiwayatGajiBerkalasPartial && count($collRiwayatGajiBerkalas)) {
                      $this->initRiwayatGajiBerkalas(false);

                      foreach($collRiwayatGajiBerkalas as $obj) {
                        if (false == $this->collRiwayatGajiBerkalas->contains($obj)) {
                          $this->collRiwayatGajiBerkalas->append($obj);
                        }
                      }

                      $this->collRiwayatGajiBerkalasPartial = true;
                    }

                    $collRiwayatGajiBerkalas->getInternalIterator()->rewind();
                    return $collRiwayatGajiBerkalas;
                }

                if($partial && $this->collRiwayatGajiBerkalas) {
                    foreach($this->collRiwayatGajiBerkalas as $obj) {
                        if($obj->isNew()) {
                            $collRiwayatGajiBerkalas[] = $obj;
                        }
                    }
                }

                $this->collRiwayatGajiBerkalas = $collRiwayatGajiBerkalas;
                $this->collRiwayatGajiBerkalasPartial = false;
            }
        }

        return $this->collRiwayatGajiBerkalas;
    }

    /**
     * Sets a collection of RiwayatGajiBerkala objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $riwayatGajiBerkalas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setRiwayatGajiBerkalas(PropelCollection $riwayatGajiBerkalas, PropelPDO $con = null)
    {
        $riwayatGajiBerkalasToDelete = $this->getRiwayatGajiBerkalas(new Criteria(), $con)->diff($riwayatGajiBerkalas);

        $this->riwayatGajiBerkalasScheduledForDeletion = unserialize(serialize($riwayatGajiBerkalasToDelete));

        foreach ($riwayatGajiBerkalasToDelete as $riwayatGajiBerkalaRemoved) {
            $riwayatGajiBerkalaRemoved->setPangkatGolongan(null);
        }

        $this->collRiwayatGajiBerkalas = null;
        foreach ($riwayatGajiBerkalas as $riwayatGajiBerkala) {
            $this->addRiwayatGajiBerkala($riwayatGajiBerkala);
        }

        $this->collRiwayatGajiBerkalas = $riwayatGajiBerkalas;
        $this->collRiwayatGajiBerkalasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RiwayatGajiBerkala objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RiwayatGajiBerkala objects.
     * @throws PropelException
     */
    public function countRiwayatGajiBerkalas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRiwayatGajiBerkalasPartial && !$this->isNew();
        if (null === $this->collRiwayatGajiBerkalas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRiwayatGajiBerkalas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRiwayatGajiBerkalas());
            }
            $query = RiwayatGajiBerkalaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPangkatGolongan($this)
                ->count($con);
        }

        return count($this->collRiwayatGajiBerkalas);
    }

    /**
     * Method called to associate a RiwayatGajiBerkala object to this object
     * through the RiwayatGajiBerkala foreign key attribute.
     *
     * @param    RiwayatGajiBerkala $l RiwayatGajiBerkala
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function addRiwayatGajiBerkala(RiwayatGajiBerkala $l)
    {
        if ($this->collRiwayatGajiBerkalas === null) {
            $this->initRiwayatGajiBerkalas();
            $this->collRiwayatGajiBerkalasPartial = true;
        }
        if (!in_array($l, $this->collRiwayatGajiBerkalas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRiwayatGajiBerkala($l);
        }

        return $this;
    }

    /**
     * @param	RiwayatGajiBerkala $riwayatGajiBerkala The riwayatGajiBerkala object to add.
     */
    protected function doAddRiwayatGajiBerkala($riwayatGajiBerkala)
    {
        $this->collRiwayatGajiBerkalas[]= $riwayatGajiBerkala;
        $riwayatGajiBerkala->setPangkatGolongan($this);
    }

    /**
     * @param	RiwayatGajiBerkala $riwayatGajiBerkala The riwayatGajiBerkala object to remove.
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function removeRiwayatGajiBerkala($riwayatGajiBerkala)
    {
        if ($this->getRiwayatGajiBerkalas()->contains($riwayatGajiBerkala)) {
            $this->collRiwayatGajiBerkalas->remove($this->collRiwayatGajiBerkalas->search($riwayatGajiBerkala));
            if (null === $this->riwayatGajiBerkalasScheduledForDeletion) {
                $this->riwayatGajiBerkalasScheduledForDeletion = clone $this->collRiwayatGajiBerkalas;
                $this->riwayatGajiBerkalasScheduledForDeletion->clear();
            }
            $this->riwayatGajiBerkalasScheduledForDeletion[]= clone $riwayatGajiBerkala;
            $riwayatGajiBerkala->setPangkatGolongan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related RiwayatGajiBerkalas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RiwayatGajiBerkala[] List of RiwayatGajiBerkala objects
     */
    public function getRiwayatGajiBerkalasJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RiwayatGajiBerkalaQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRiwayatGajiBerkalas($query, $con);
    }

    /**
     * Clears out the collRwyKepangkatans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PangkatGolongan The current object (for fluent API support)
     * @see        addRwyKepangkatans()
     */
    public function clearRwyKepangkatans()
    {
        $this->collRwyKepangkatans = null; // important to set this to null since that means it is uninitialized
        $this->collRwyKepangkatansPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyKepangkatans collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyKepangkatans($v = true)
    {
        $this->collRwyKepangkatansPartial = $v;
    }

    /**
     * Initializes the collRwyKepangkatans collection.
     *
     * By default this just sets the collRwyKepangkatans collection to an empty array (like clearcollRwyKepangkatans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyKepangkatans($overrideExisting = true)
    {
        if (null !== $this->collRwyKepangkatans && !$overrideExisting) {
            return;
        }
        $this->collRwyKepangkatans = new PropelObjectCollection();
        $this->collRwyKepangkatans->setModel('RwyKepangkatan');
    }

    /**
     * Gets an array of RwyKepangkatan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PangkatGolongan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyKepangkatan[] List of RwyKepangkatan objects
     * @throws PropelException
     */
    public function getRwyKepangkatans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyKepangkatansPartial && !$this->isNew();
        if (null === $this->collRwyKepangkatans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyKepangkatans) {
                // return empty collection
                $this->initRwyKepangkatans();
            } else {
                $collRwyKepangkatans = RwyKepangkatanQuery::create(null, $criteria)
                    ->filterByPangkatGolongan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyKepangkatansPartial && count($collRwyKepangkatans)) {
                      $this->initRwyKepangkatans(false);

                      foreach($collRwyKepangkatans as $obj) {
                        if (false == $this->collRwyKepangkatans->contains($obj)) {
                          $this->collRwyKepangkatans->append($obj);
                        }
                      }

                      $this->collRwyKepangkatansPartial = true;
                    }

                    $collRwyKepangkatans->getInternalIterator()->rewind();
                    return $collRwyKepangkatans;
                }

                if($partial && $this->collRwyKepangkatans) {
                    foreach($this->collRwyKepangkatans as $obj) {
                        if($obj->isNew()) {
                            $collRwyKepangkatans[] = $obj;
                        }
                    }
                }

                $this->collRwyKepangkatans = $collRwyKepangkatans;
                $this->collRwyKepangkatansPartial = false;
            }
        }

        return $this->collRwyKepangkatans;
    }

    /**
     * Sets a collection of RwyKepangkatan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyKepangkatans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function setRwyKepangkatans(PropelCollection $rwyKepangkatans, PropelPDO $con = null)
    {
        $rwyKepangkatansToDelete = $this->getRwyKepangkatans(new Criteria(), $con)->diff($rwyKepangkatans);

        $this->rwyKepangkatansScheduledForDeletion = unserialize(serialize($rwyKepangkatansToDelete));

        foreach ($rwyKepangkatansToDelete as $rwyKepangkatanRemoved) {
            $rwyKepangkatanRemoved->setPangkatGolongan(null);
        }

        $this->collRwyKepangkatans = null;
        foreach ($rwyKepangkatans as $rwyKepangkatan) {
            $this->addRwyKepangkatan($rwyKepangkatan);
        }

        $this->collRwyKepangkatans = $rwyKepangkatans;
        $this->collRwyKepangkatansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyKepangkatan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyKepangkatan objects.
     * @throws PropelException
     */
    public function countRwyKepangkatans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyKepangkatansPartial && !$this->isNew();
        if (null === $this->collRwyKepangkatans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyKepangkatans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyKepangkatans());
            }
            $query = RwyKepangkatanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPangkatGolongan($this)
                ->count($con);
        }

        return count($this->collRwyKepangkatans);
    }

    /**
     * Method called to associate a RwyKepangkatan object to this object
     * through the RwyKepangkatan foreign key attribute.
     *
     * @param    RwyKepangkatan $l RwyKepangkatan
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function addRwyKepangkatan(RwyKepangkatan $l)
    {
        if ($this->collRwyKepangkatans === null) {
            $this->initRwyKepangkatans();
            $this->collRwyKepangkatansPartial = true;
        }
        if (!in_array($l, $this->collRwyKepangkatans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyKepangkatan($l);
        }

        return $this;
    }

    /**
     * @param	RwyKepangkatan $rwyKepangkatan The rwyKepangkatan object to add.
     */
    protected function doAddRwyKepangkatan($rwyKepangkatan)
    {
        $this->collRwyKepangkatans[]= $rwyKepangkatan;
        $rwyKepangkatan->setPangkatGolongan($this);
    }

    /**
     * @param	RwyKepangkatan $rwyKepangkatan The rwyKepangkatan object to remove.
     * @return PangkatGolongan The current object (for fluent API support)
     */
    public function removeRwyKepangkatan($rwyKepangkatan)
    {
        if ($this->getRwyKepangkatans()->contains($rwyKepangkatan)) {
            $this->collRwyKepangkatans->remove($this->collRwyKepangkatans->search($rwyKepangkatan));
            if (null === $this->rwyKepangkatansScheduledForDeletion) {
                $this->rwyKepangkatansScheduledForDeletion = clone $this->collRwyKepangkatans;
                $this->rwyKepangkatansScheduledForDeletion->clear();
            }
            $this->rwyKepangkatansScheduledForDeletion[]= clone $rwyKepangkatan;
            $rwyKepangkatan->setPangkatGolongan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PangkatGolongan is new, it will return
     * an empty collection; or if this PangkatGolongan has previously
     * been saved, it will retrieve related RwyKepangkatans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PangkatGolongan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKepangkatan[] List of RwyKepangkatan objects
     */
    public function getRwyKepangkatansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKepangkatanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwyKepangkatans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->pangkat_golongan_id = null;
        $this->kode = null;
        $this->nama = null;
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
            if ($this->collInpassings) {
                foreach ($this->collInpassings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtks) {
                foreach ($this->collPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRiwayatGajiBerkalas) {
                foreach ($this->collRiwayatGajiBerkalas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyKepangkatans) {
                foreach ($this->collRwyKepangkatans as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collInpassings instanceof PropelCollection) {
            $this->collInpassings->clearIterator();
        }
        $this->collInpassings = null;
        if ($this->collPtks instanceof PropelCollection) {
            $this->collPtks->clearIterator();
        }
        $this->collPtks = null;
        if ($this->collRiwayatGajiBerkalas instanceof PropelCollection) {
            $this->collRiwayatGajiBerkalas->clearIterator();
        }
        $this->collRiwayatGajiBerkalas = null;
        if ($this->collRwyKepangkatans instanceof PropelCollection) {
            $this->collRwyKepangkatans->clearIterator();
        }
        $this->collRwyKepangkatans = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PangkatGolonganPeer::DEFAULT_STRING_FORMAT);
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
