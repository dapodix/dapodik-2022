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
use DataDikdas\Model\GroupMatpel;
use DataDikdas\Model\GroupMatpelPeer;
use DataDikdas\Model\GroupMatpelQuery;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\KurikulumQuery;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\MataPelajaranKurikulumQuery;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\TingkatPendidikanQuery;

/**
 * Base class that represents a row from the 'ref.group_matpel' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseGroupMatpel extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\GroupMatpelPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        GroupMatpelPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the gmp_id field.
     * @var        string
     */
    protected $gmp_id;

    /**
     * The value for the nama_group field.
     * @var        string
     */
    protected $nama_group;

    /**
     * The value for the jumlah_jam_maksimum field.
     * @var        string
     */
    protected $jumlah_jam_maksimum;

    /**
     * The value for the jumlah_sks_maksimum field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $jumlah_sks_maksimum;

    /**
     * The value for the kurikulum_id field.
     * @var        int
     */
    protected $kurikulum_id;

    /**
     * The value for the tingkat_pendidikan_id field.
     * @var        string
     */
    protected $tingkat_pendidikan_id;

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
     * @var        Kurikulum
     */
    protected $aKurikulum;

    /**
     * @var        TingkatPendidikan
     */
    protected $aTingkatPendidikan;

    /**
     * @var        PropelObjectCollection|MataPelajaranKurikulum[] Collection to store aggregation of MataPelajaranKurikulum objects.
     */
    protected $collMataPelajaranKurikulums;
    protected $collMataPelajaranKurikulumsPartial;

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
    protected $mataPelajaranKurikulumsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->jumlah_sks_maksimum = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseGroupMatpel object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [gmp_id] column value.
     * 
     * @return string
     */
    public function getGmpId()
    {
        return $this->gmp_id;
    }

    /**
     * Get the [nama_group] column value.
     * 
     * @return string
     */
    public function getNamaGroup()
    {
        return $this->nama_group;
    }

    /**
     * Get the [jumlah_jam_maksimum] column value.
     * 
     * @return string
     */
    public function getJumlahJamMaksimum()
    {
        return $this->jumlah_jam_maksimum;
    }

    /**
     * Get the [jumlah_sks_maksimum] column value.
     * 
     * @return string
     */
    public function getJumlahSksMaksimum()
    {
        return $this->jumlah_sks_maksimum;
    }

    /**
     * Get the [kurikulum_id] column value.
     * 
     * @return int
     */
    public function getKurikulumId()
    {
        return $this->kurikulum_id;
    }

    /**
     * Get the [tingkat_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getTingkatPendidikanId()
    {
        return $this->tingkat_pendidikan_id;
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
     * Set the value of [gmp_id] column.
     * 
     * @param string $v new value
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setGmpId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->gmp_id !== $v) {
            $this->gmp_id = $v;
            $this->modifiedColumns[] = GroupMatpelPeer::GMP_ID;
        }


        return $this;
    } // setGmpId()

    /**
     * Set the value of [nama_group] column.
     * 
     * @param string $v new value
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setNamaGroup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_group !== $v) {
            $this->nama_group = $v;
            $this->modifiedColumns[] = GroupMatpelPeer::NAMA_GROUP;
        }


        return $this;
    } // setNamaGroup()

    /**
     * Set the value of [jumlah_jam_maksimum] column.
     * 
     * @param string $v new value
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setJumlahJamMaksimum($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jumlah_jam_maksimum !== $v) {
            $this->jumlah_jam_maksimum = $v;
            $this->modifiedColumns[] = GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM;
        }


        return $this;
    } // setJumlahJamMaksimum()

    /**
     * Set the value of [jumlah_sks_maksimum] column.
     * 
     * @param string $v new value
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setJumlahSksMaksimum($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jumlah_sks_maksimum !== $v) {
            $this->jumlah_sks_maksimum = $v;
            $this->modifiedColumns[] = GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM;
        }


        return $this;
    } // setJumlahSksMaksimum()

    /**
     * Set the value of [kurikulum_id] column.
     * 
     * @param int $v new value
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setKurikulumId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kurikulum_id !== $v) {
            $this->kurikulum_id = $v;
            $this->modifiedColumns[] = GroupMatpelPeer::KURIKULUM_ID;
        }

        if ($this->aKurikulum !== null && $this->aKurikulum->getKurikulumId() !== $v) {
            $this->aKurikulum = null;
        }


        return $this;
    } // setKurikulumId()

    /**
     * Set the value of [tingkat_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setTingkatPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tingkat_pendidikan_id !== $v) {
            $this->tingkat_pendidikan_id = $v;
            $this->modifiedColumns[] = GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID;
        }

        if ($this->aTingkatPendidikan !== null && $this->aTingkatPendidikan->getTingkatPendidikanId() !== $v) {
            $this->aTingkatPendidikan = null;
        }


        return $this;
    } // setTingkatPendidikanId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = GroupMatpelPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = GroupMatpelPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = GroupMatpelPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return GroupMatpel The current object (for fluent API support)
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
                $this->modifiedColumns[] = GroupMatpelPeer::LAST_SYNC;
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
            if ($this->jumlah_sks_maksimum !== '0') {
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

            $this->gmp_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama_group = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jumlah_jam_maksimum = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jumlah_sks_maksimum = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->kurikulum_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->tingkat_pendidikan_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
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
            return $startcol + 10; // 10 = GroupMatpelPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating GroupMatpel object", $e);
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

        if ($this->aKurikulum !== null && $this->kurikulum_id !== $this->aKurikulum->getKurikulumId()) {
            $this->aKurikulum = null;
        }
        if ($this->aTingkatPendidikan !== null && $this->tingkat_pendidikan_id !== $this->aTingkatPendidikan->getTingkatPendidikanId()) {
            $this->aTingkatPendidikan = null;
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
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = GroupMatpelPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aKurikulum = null;
            $this->aTingkatPendidikan = null;
            $this->collMataPelajaranKurikulums = null;

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
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = GroupMatpelQuery::create()
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
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                GroupMatpelPeer::addInstanceToPool($this);
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

            if ($this->aKurikulum !== null) {
                if ($this->aKurikulum->isModified() || $this->aKurikulum->isNew()) {
                    $affectedRows += $this->aKurikulum->save($con);
                }
                $this->setKurikulum($this->aKurikulum);
            }

            if ($this->aTingkatPendidikan !== null) {
                if ($this->aTingkatPendidikan->isModified() || $this->aTingkatPendidikan->isNew()) {
                    $affectedRows += $this->aTingkatPendidikan->save($con);
                }
                $this->setTingkatPendidikan($this->aTingkatPendidikan);
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

            if ($this->mataPelajaranKurikulumsScheduledForDeletion !== null) {
                if (!$this->mataPelajaranKurikulumsScheduledForDeletion->isEmpty()) {
                    foreach ($this->mataPelajaranKurikulumsScheduledForDeletion as $mataPelajaranKurikulum) {
                        // need to save related object because we set the relation to null
                        $mataPelajaranKurikulum->save($con);
                    }
                    $this->mataPelajaranKurikulumsScheduledForDeletion = null;
                }
            }

            if ($this->collMataPelajaranKurikulums !== null) {
                foreach ($this->collMataPelajaranKurikulums as $referrerFK) {
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
        if ($this->isColumnModified(GroupMatpelPeer::GMP_ID)) {
            $modifiedColumns[':p' . $index++]  = '"gmp_id"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::NAMA_GROUP)) {
            $modifiedColumns[':p' . $index++]  = '"nama_group"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM)) {
            $modifiedColumns[':p' . $index++]  = '"jumlah_jam_maksimum"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM)) {
            $modifiedColumns[':p' . $index++]  = '"jumlah_sks_maksimum"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::KURIKULUM_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kurikulum_id"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tingkat_pendidikan_id"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(GroupMatpelPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."group_matpel" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"gmp_id"':						
                        $stmt->bindValue($identifier, $this->gmp_id, PDO::PARAM_STR);
                        break;
                    case '"nama_group"':						
                        $stmt->bindValue($identifier, $this->nama_group, PDO::PARAM_STR);
                        break;
                    case '"jumlah_jam_maksimum"':						
                        $stmt->bindValue($identifier, $this->jumlah_jam_maksimum, PDO::PARAM_STR);
                        break;
                    case '"jumlah_sks_maksimum"':						
                        $stmt->bindValue($identifier, $this->jumlah_sks_maksimum, PDO::PARAM_STR);
                        break;
                    case '"kurikulum_id"':						
                        $stmt->bindValue($identifier, $this->kurikulum_id, PDO::PARAM_INT);
                        break;
                    case '"tingkat_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->tingkat_pendidikan_id, PDO::PARAM_STR);
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

            if ($this->aKurikulum !== null) {
                if (!$this->aKurikulum->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKurikulum->getValidationFailures());
                }
            }

            if ($this->aTingkatPendidikan !== null) {
                if (!$this->aTingkatPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTingkatPendidikan->getValidationFailures());
                }
            }


            if (($retval = GroupMatpelPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMataPelajaranKurikulums !== null) {
                    foreach ($this->collMataPelajaranKurikulums as $referrerFK) {
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
        $pos = GroupMatpelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getGmpId();
                break;
            case 1:
                return $this->getNamaGroup();
                break;
            case 2:
                return $this->getJumlahJamMaksimum();
                break;
            case 3:
                return $this->getJumlahSksMaksimum();
                break;
            case 4:
                return $this->getKurikulumId();
                break;
            case 5:
                return $this->getTingkatPendidikanId();
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
        if (isset($alreadyDumpedObjects['GroupMatpel'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['GroupMatpel'][$this->getPrimaryKey()] = true;
        $keys = GroupMatpelPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getGmpId(),
            $keys[1] => $this->getNamaGroup(),
            $keys[2] => $this->getJumlahJamMaksimum(),
            $keys[3] => $this->getJumlahSksMaksimum(),
            $keys[4] => $this->getKurikulumId(),
            $keys[5] => $this->getTingkatPendidikanId(),
            $keys[6] => $this->getCreateDate(),
            $keys[7] => $this->getLastUpdate(),
            $keys[8] => $this->getExpiredDate(),
            $keys[9] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aKurikulum) {
                $result['Kurikulum'] = $this->aKurikulum->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTingkatPendidikan) {
                $result['TingkatPendidikan'] = $this->aTingkatPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMataPelajaranKurikulums) {
                $result['MataPelajaranKurikulums'] = $this->collMataPelajaranKurikulums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = GroupMatpelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setGmpId($value);
                break;
            case 1:
                $this->setNamaGroup($value);
                break;
            case 2:
                $this->setJumlahJamMaksimum($value);
                break;
            case 3:
                $this->setJumlahSksMaksimum($value);
                break;
            case 4:
                $this->setKurikulumId($value);
                break;
            case 5:
                $this->setTingkatPendidikanId($value);
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
        $keys = GroupMatpelPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setGmpId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNamaGroup($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJumlahJamMaksimum($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJumlahSksMaksimum($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKurikulumId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTingkatPendidikanId($arr[$keys[5]]);
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
        $criteria = new Criteria(GroupMatpelPeer::DATABASE_NAME);

        if ($this->isColumnModified(GroupMatpelPeer::GMP_ID)) $criteria->add(GroupMatpelPeer::GMP_ID, $this->gmp_id);
        if ($this->isColumnModified(GroupMatpelPeer::NAMA_GROUP)) $criteria->add(GroupMatpelPeer::NAMA_GROUP, $this->nama_group);
        if ($this->isColumnModified(GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM)) $criteria->add(GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM, $this->jumlah_jam_maksimum);
        if ($this->isColumnModified(GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM)) $criteria->add(GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM, $this->jumlah_sks_maksimum);
        if ($this->isColumnModified(GroupMatpelPeer::KURIKULUM_ID)) $criteria->add(GroupMatpelPeer::KURIKULUM_ID, $this->kurikulum_id);
        if ($this->isColumnModified(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID)) $criteria->add(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, $this->tingkat_pendidikan_id);
        if ($this->isColumnModified(GroupMatpelPeer::CREATE_DATE)) $criteria->add(GroupMatpelPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(GroupMatpelPeer::LAST_UPDATE)) $criteria->add(GroupMatpelPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(GroupMatpelPeer::EXPIRED_DATE)) $criteria->add(GroupMatpelPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(GroupMatpelPeer::LAST_SYNC)) $criteria->add(GroupMatpelPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(GroupMatpelPeer::DATABASE_NAME);
        $criteria->add(GroupMatpelPeer::GMP_ID, $this->gmp_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getGmpId();
    }

    /**
     * Generic method to set the primary key (gmp_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setGmpId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getGmpId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of GroupMatpel (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNamaGroup($this->getNamaGroup());
        $copyObj->setJumlahJamMaksimum($this->getJumlahJamMaksimum());
        $copyObj->setJumlahSksMaksimum($this->getJumlahSksMaksimum());
        $copyObj->setKurikulumId($this->getKurikulumId());
        $copyObj->setTingkatPendidikanId($this->getTingkatPendidikanId());
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

            foreach ($this->getMataPelajaranKurikulums() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMataPelajaranKurikulum($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setGmpId(NULL); // this is a auto-increment column, so set to default value
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
     * @return GroupMatpel Clone of current object.
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
     * @return GroupMatpelPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new GroupMatpelPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Kurikulum object.
     *
     * @param             Kurikulum $v
     * @return GroupMatpel The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKurikulum(Kurikulum $v = null)
    {
        if ($v === null) {
            $this->setKurikulumId(NULL);
        } else {
            $this->setKurikulumId($v->getKurikulumId());
        }

        $this->aKurikulum = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Kurikulum object, it will not be re-added.
        if ($v !== null) {
            $v->addGroupMatpel($this);
        }


        return $this;
    }


    /**
     * Get the associated Kurikulum object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Kurikulum The associated Kurikulum object.
     * @throws PropelException
     */
    public function getKurikulum(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKurikulum === null && ($this->kurikulum_id !== null) && $doQuery) {
            $this->aKurikulum = KurikulumQuery::create()->findPk($this->kurikulum_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKurikulum->addGroupMatpels($this);
             */
        }

        return $this->aKurikulum;
    }

    /**
     * Declares an association between this object and a TingkatPendidikan object.
     *
     * @param             TingkatPendidikan $v
     * @return GroupMatpel The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTingkatPendidikan(TingkatPendidikan $v = null)
    {
        if ($v === null) {
            $this->setTingkatPendidikanId(NULL);
        } else {
            $this->setTingkatPendidikanId($v->getTingkatPendidikanId());
        }

        $this->aTingkatPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TingkatPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addGroupMatpel($this);
        }


        return $this;
    }


    /**
     * Get the associated TingkatPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TingkatPendidikan The associated TingkatPendidikan object.
     * @throws PropelException
     */
    public function getTingkatPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTingkatPendidikan === null && (($this->tingkat_pendidikan_id !== "" && $this->tingkat_pendidikan_id !== null)) && $doQuery) {
            $this->aTingkatPendidikan = TingkatPendidikanQuery::create()->findPk($this->tingkat_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTingkatPendidikan->addGroupMatpels($this);
             */
        }

        return $this->aTingkatPendidikan;
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
        if ('MataPelajaranKurikulum' == $relationName) {
            $this->initMataPelajaranKurikulums();
        }
    }

    /**
     * Clears out the collMataPelajaranKurikulums collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return GroupMatpel The current object (for fluent API support)
     * @see        addMataPelajaranKurikulums()
     */
    public function clearMataPelajaranKurikulums()
    {
        $this->collMataPelajaranKurikulums = null; // important to set this to null since that means it is uninitialized
        $this->collMataPelajaranKurikulumsPartial = null;

        return $this;
    }

    /**
     * reset is the collMataPelajaranKurikulums collection loaded partially
     *
     * @return void
     */
    public function resetPartialMataPelajaranKurikulums($v = true)
    {
        $this->collMataPelajaranKurikulumsPartial = $v;
    }

    /**
     * Initializes the collMataPelajaranKurikulums collection.
     *
     * By default this just sets the collMataPelajaranKurikulums collection to an empty array (like clearcollMataPelajaranKurikulums());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMataPelajaranKurikulums($overrideExisting = true)
    {
        if (null !== $this->collMataPelajaranKurikulums && !$overrideExisting) {
            return;
        }
        $this->collMataPelajaranKurikulums = new PropelObjectCollection();
        $this->collMataPelajaranKurikulums->setModel('MataPelajaranKurikulum');
    }

    /**
     * Gets an array of MataPelajaranKurikulum objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this GroupMatpel is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     * @throws PropelException
     */
    public function getMataPelajaranKurikulums($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaranKurikulumsPartial && !$this->isNew();
        if (null === $this->collMataPelajaranKurikulums || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMataPelajaranKurikulums) {
                // return empty collection
                $this->initMataPelajaranKurikulums();
            } else {
                $collMataPelajaranKurikulums = MataPelajaranKurikulumQuery::create(null, $criteria)
                    ->filterByGroupMatpel($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMataPelajaranKurikulumsPartial && count($collMataPelajaranKurikulums)) {
                      $this->initMataPelajaranKurikulums(false);

                      foreach($collMataPelajaranKurikulums as $obj) {
                        if (false == $this->collMataPelajaranKurikulums->contains($obj)) {
                          $this->collMataPelajaranKurikulums->append($obj);
                        }
                      }

                      $this->collMataPelajaranKurikulumsPartial = true;
                    }

                    $collMataPelajaranKurikulums->getInternalIterator()->rewind();
                    return $collMataPelajaranKurikulums;
                }

                if($partial && $this->collMataPelajaranKurikulums) {
                    foreach($this->collMataPelajaranKurikulums as $obj) {
                        if($obj->isNew()) {
                            $collMataPelajaranKurikulums[] = $obj;
                        }
                    }
                }

                $this->collMataPelajaranKurikulums = $collMataPelajaranKurikulums;
                $this->collMataPelajaranKurikulumsPartial = false;
            }
        }

        return $this->collMataPelajaranKurikulums;
    }

    /**
     * Sets a collection of MataPelajaranKurikulum objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mataPelajaranKurikulums A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function setMataPelajaranKurikulums(PropelCollection $mataPelajaranKurikulums, PropelPDO $con = null)
    {
        $mataPelajaranKurikulumsToDelete = $this->getMataPelajaranKurikulums(new Criteria(), $con)->diff($mataPelajaranKurikulums);

        $this->mataPelajaranKurikulumsScheduledForDeletion = unserialize(serialize($mataPelajaranKurikulumsToDelete));

        foreach ($mataPelajaranKurikulumsToDelete as $mataPelajaranKurikulumRemoved) {
            $mataPelajaranKurikulumRemoved->setGroupMatpel(null);
        }

        $this->collMataPelajaranKurikulums = null;
        foreach ($mataPelajaranKurikulums as $mataPelajaranKurikulum) {
            $this->addMataPelajaranKurikulum($mataPelajaranKurikulum);
        }

        $this->collMataPelajaranKurikulums = $mataPelajaranKurikulums;
        $this->collMataPelajaranKurikulumsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MataPelajaranKurikulum objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MataPelajaranKurikulum objects.
     * @throws PropelException
     */
    public function countMataPelajaranKurikulums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaranKurikulumsPartial && !$this->isNew();
        if (null === $this->collMataPelajaranKurikulums || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMataPelajaranKurikulums) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMataPelajaranKurikulums());
            }
            $query = MataPelajaranKurikulumQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGroupMatpel($this)
                ->count($con);
        }

        return count($this->collMataPelajaranKurikulums);
    }

    /**
     * Method called to associate a MataPelajaranKurikulum object to this object
     * through the MataPelajaranKurikulum foreign key attribute.
     *
     * @param    MataPelajaranKurikulum $l MataPelajaranKurikulum
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function addMataPelajaranKurikulum(MataPelajaranKurikulum $l)
    {
        if ($this->collMataPelajaranKurikulums === null) {
            $this->initMataPelajaranKurikulums();
            $this->collMataPelajaranKurikulumsPartial = true;
        }
        if (!in_array($l, $this->collMataPelajaranKurikulums->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMataPelajaranKurikulum($l);
        }

        return $this;
    }

    /**
     * @param	MataPelajaranKurikulum $mataPelajaranKurikulum The mataPelajaranKurikulum object to add.
     */
    protected function doAddMataPelajaranKurikulum($mataPelajaranKurikulum)
    {
        $this->collMataPelajaranKurikulums[]= $mataPelajaranKurikulum;
        $mataPelajaranKurikulum->setGroupMatpel($this);
    }

    /**
     * @param	MataPelajaranKurikulum $mataPelajaranKurikulum The mataPelajaranKurikulum object to remove.
     * @return GroupMatpel The current object (for fluent API support)
     */
    public function removeMataPelajaranKurikulum($mataPelajaranKurikulum)
    {
        if ($this->getMataPelajaranKurikulums()->contains($mataPelajaranKurikulum)) {
            $this->collMataPelajaranKurikulums->remove($this->collMataPelajaranKurikulums->search($mataPelajaranKurikulum));
            if (null === $this->mataPelajaranKurikulumsScheduledForDeletion) {
                $this->mataPelajaranKurikulumsScheduledForDeletion = clone $this->collMataPelajaranKurikulums;
                $this->mataPelajaranKurikulumsScheduledForDeletion->clear();
            }
            $this->mataPelajaranKurikulumsScheduledForDeletion[]= $mataPelajaranKurikulum;
            $mataPelajaranKurikulum->setGroupMatpel(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this GroupMatpel is new, it will return
     * an empty collection; or if this GroupMatpel has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in GroupMatpel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this GroupMatpel is new, it will return
     * an empty collection; or if this GroupMatpel has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in GroupMatpel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this GroupMatpel is new, it will return
     * an empty collection; or if this GroupMatpel has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in GroupMatpel.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->gmp_id = null;
        $this->nama_group = null;
        $this->jumlah_jam_maksimum = null;
        $this->jumlah_sks_maksimum = null;
        $this->kurikulum_id = null;
        $this->tingkat_pendidikan_id = null;
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
            if ($this->collMataPelajaranKurikulums) {
                foreach ($this->collMataPelajaranKurikulums as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aKurikulum instanceof Persistent) {
              $this->aKurikulum->clearAllReferences($deep);
            }
            if ($this->aTingkatPendidikan instanceof Persistent) {
              $this->aTingkatPendidikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMataPelajaranKurikulums instanceof PropelCollection) {
            $this->collMataPelajaranKurikulums->clearIterator();
        }
        $this->collMataPelajaranKurikulums = null;
        $this->aKurikulum = null;
        $this->aTingkatPendidikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(GroupMatpelPeer::DEFAULT_STRING_FORMAT);
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
