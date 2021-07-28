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
use DataDikdas\Model\JenjangKepengawasan;
use DataDikdas\Model\JenjangKepengawasanPeer;
use DataDikdas\Model\JenjangKepengawasanQuery;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PengawasTerdaftarQuery;

/**
 * Base class that represents a row from the 'ref.jenjang_kepengawasan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenjangKepengawasan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenjangKepengawasanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenjangKepengawasanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenjang_kepengawasan_id field.
     * @var        string
     */
    protected $jenjang_kepengawasan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the jenjang_kepengawasan_tk field.
     * @var        string
     */
    protected $jenjang_kepengawasan_tk;

    /**
     * The value for the jenjang_kepengawasan_sd field.
     * @var        string
     */
    protected $jenjang_kepengawasan_sd;

    /**
     * The value for the jenjang_kepengawasan_smp field.
     * @var        string
     */
    protected $jenjang_kepengawasan_smp;

    /**
     * The value for the jenjang_kepengawasan_sma field.
     * @var        string
     */
    protected $jenjang_kepengawasan_sma;

    /**
     * The value for the jenjang_kepengawasan_smk field.
     * @var        string
     */
    protected $jenjang_kepengawasan_smk;

    /**
     * The value for the jenjang_kepengawasan_slb field.
     * @var        string
     */
    protected $jenjang_kepengawasan_slb;

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
     * @var        PropelObjectCollection|PengawasTerdaftar[] Collection to store aggregation of PengawasTerdaftar objects.
     */
    protected $collPengawasTerdaftars;
    protected $collPengawasTerdaftarsPartial;

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
    protected $pengawasTerdaftarsScheduledForDeletion = null;

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
     * Initializes internal state of BaseJenjangKepengawasan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jenjang_kepengawasan_id] column value.
     * 
     * @return string
     */
    public function getJenjangKepengawasanId()
    {
        return $this->jenjang_kepengawasan_id;
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
     * Get the [jenjang_kepengawasan_tk] column value.
     * 
     * @return string
     */
    public function getJenjangKepengawasanTk()
    {
        return $this->jenjang_kepengawasan_tk;
    }

    /**
     * Get the [jenjang_kepengawasan_sd] column value.
     * 
     * @return string
     */
    public function getJenjangKepengawasanSd()
    {
        return $this->jenjang_kepengawasan_sd;
    }

    /**
     * Get the [jenjang_kepengawasan_smp] column value.
     * 
     * @return string
     */
    public function getJenjangKepengawasanSmp()
    {
        return $this->jenjang_kepengawasan_smp;
    }

    /**
     * Get the [jenjang_kepengawasan_sma] column value.
     * 
     * @return string
     */
    public function getJenjangKepengawasanSma()
    {
        return $this->jenjang_kepengawasan_sma;
    }

    /**
     * Get the [jenjang_kepengawasan_smk] column value.
     * 
     * @return string
     */
    public function getJenjangKepengawasanSmk()
    {
        return $this->jenjang_kepengawasan_smk;
    }

    /**
     * Get the [jenjang_kepengawasan_slb] column value.
     * 
     * @return string
     */
    public function getJenjangKepengawasanSlb()
    {
        return $this->jenjang_kepengawasan_slb;
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
     * Set the value of [jenjang_kepengawasan_id] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setJenjangKepengawasanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_kepengawasan_id !== $v) {
            $this->jenjang_kepengawasan_id = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID;
        }


        return $this;
    } // setJenjangKepengawasanId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [jenjang_kepengawasan_tk] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setJenjangKepengawasanTk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_kepengawasan_tk !== $v) {
            $this->jenjang_kepengawasan_tk = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_TK;
        }


        return $this;
    } // setJenjangKepengawasanTk()

    /**
     * Set the value of [jenjang_kepengawasan_sd] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setJenjangKepengawasanSd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_kepengawasan_sd !== $v) {
            $this->jenjang_kepengawasan_sd = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SD;
        }


        return $this;
    } // setJenjangKepengawasanSd()

    /**
     * Set the value of [jenjang_kepengawasan_smp] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setJenjangKepengawasanSmp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_kepengawasan_smp !== $v) {
            $this->jenjang_kepengawasan_smp = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMP;
        }


        return $this;
    } // setJenjangKepengawasanSmp()

    /**
     * Set the value of [jenjang_kepengawasan_sma] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setJenjangKepengawasanSma($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_kepengawasan_sma !== $v) {
            $this->jenjang_kepengawasan_sma = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMA;
        }


        return $this;
    } // setJenjangKepengawasanSma()

    /**
     * Set the value of [jenjang_kepengawasan_smk] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setJenjangKepengawasanSmk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_kepengawasan_smk !== $v) {
            $this->jenjang_kepengawasan_smk = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMK;
        }


        return $this;
    } // setJenjangKepengawasanSmk()

    /**
     * Set the value of [jenjang_kepengawasan_slb] column.
     * 
     * @param string $v new value
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setJenjangKepengawasanSlb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_kepengawasan_slb !== $v) {
            $this->jenjang_kepengawasan_slb = $v;
            $this->modifiedColumns[] = JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SLB;
        }


        return $this;
    } // setJenjangKepengawasanSlb()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenjangKepengawasanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenjangKepengawasanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenjangKepengawasanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangKepengawasan The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenjangKepengawasanPeer::LAST_SYNC;
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

            $this->jenjang_kepengawasan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jenjang_kepengawasan_tk = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jenjang_kepengawasan_sd = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jenjang_kepengawasan_smp = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jenjang_kepengawasan_sma = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->jenjang_kepengawasan_smk = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jenjang_kepengawasan_slb = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->create_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->last_update = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->expired_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_sync = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenjangKepengawasan object", $e);
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
            $con = Propel::getConnection(JenjangKepengawasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenjangKepengawasanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPengawasTerdaftars = null;

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
            $con = Propel::getConnection(JenjangKepengawasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenjangKepengawasanQuery::create()
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
            $con = Propel::getConnection(JenjangKepengawasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenjangKepengawasanPeer::addInstanceToPool($this);
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

            if ($this->pengawasTerdaftarsScheduledForDeletion !== null) {
                if (!$this->pengawasTerdaftarsScheduledForDeletion->isEmpty()) {
                    PengawasTerdaftarQuery::create()
                        ->filterByPrimaryKeys($this->pengawasTerdaftarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pengawasTerdaftarsScheduledForDeletion = null;
                }
            }

            if ($this->collPengawasTerdaftars !== null) {
                foreach ($this->collPengawasTerdaftars as $referrerFK) {
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
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_kepengawasan_id"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_TK)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_kepengawasan_tk"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SD)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_kepengawasan_sd"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMP)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_kepengawasan_smp"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMA)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_kepengawasan_sma"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMK)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_kepengawasan_smk"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SLB)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_kepengawasan_slb"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenjangKepengawasanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenjang_kepengawasan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenjang_kepengawasan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_kepengawasan_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"jenjang_kepengawasan_tk"':						
                        $stmt->bindValue($identifier, $this->jenjang_kepengawasan_tk, PDO::PARAM_STR);
                        break;
                    case '"jenjang_kepengawasan_sd"':						
                        $stmt->bindValue($identifier, $this->jenjang_kepengawasan_sd, PDO::PARAM_STR);
                        break;
                    case '"jenjang_kepengawasan_smp"':						
                        $stmt->bindValue($identifier, $this->jenjang_kepengawasan_smp, PDO::PARAM_STR);
                        break;
                    case '"jenjang_kepengawasan_sma"':						
                        $stmt->bindValue($identifier, $this->jenjang_kepengawasan_sma, PDO::PARAM_STR);
                        break;
                    case '"jenjang_kepengawasan_smk"':						
                        $stmt->bindValue($identifier, $this->jenjang_kepengawasan_smk, PDO::PARAM_STR);
                        break;
                    case '"jenjang_kepengawasan_slb"':						
                        $stmt->bindValue($identifier, $this->jenjang_kepengawasan_slb, PDO::PARAM_STR);
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


            if (($retval = JenjangKepengawasanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPengawasTerdaftars !== null) {
                    foreach ($this->collPengawasTerdaftars as $referrerFK) {
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
        $pos = JenjangKepengawasanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenjangKepengawasanId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getJenjangKepengawasanTk();
                break;
            case 3:
                return $this->getJenjangKepengawasanSd();
                break;
            case 4:
                return $this->getJenjangKepengawasanSmp();
                break;
            case 5:
                return $this->getJenjangKepengawasanSma();
                break;
            case 6:
                return $this->getJenjangKepengawasanSmk();
                break;
            case 7:
                return $this->getJenjangKepengawasanSlb();
                break;
            case 8:
                return $this->getCreateDate();
                break;
            case 9:
                return $this->getLastUpdate();
                break;
            case 10:
                return $this->getExpiredDate();
                break;
            case 11:
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
        if (isset($alreadyDumpedObjects['JenjangKepengawasan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenjangKepengawasan'][$this->getPrimaryKey()] = true;
        $keys = JenjangKepengawasanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenjangKepengawasanId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getJenjangKepengawasanTk(),
            $keys[3] => $this->getJenjangKepengawasanSd(),
            $keys[4] => $this->getJenjangKepengawasanSmp(),
            $keys[5] => $this->getJenjangKepengawasanSma(),
            $keys[6] => $this->getJenjangKepengawasanSmk(),
            $keys[7] => $this->getJenjangKepengawasanSlb(),
            $keys[8] => $this->getCreateDate(),
            $keys[9] => $this->getLastUpdate(),
            $keys[10] => $this->getExpiredDate(),
            $keys[11] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPengawasTerdaftars) {
                $result['PengawasTerdaftars'] = $this->collPengawasTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenjangKepengawasanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenjangKepengawasanId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setJenjangKepengawasanTk($value);
                break;
            case 3:
                $this->setJenjangKepengawasanSd($value);
                break;
            case 4:
                $this->setJenjangKepengawasanSmp($value);
                break;
            case 5:
                $this->setJenjangKepengawasanSma($value);
                break;
            case 6:
                $this->setJenjangKepengawasanSmk($value);
                break;
            case 7:
                $this->setJenjangKepengawasanSlb($value);
                break;
            case 8:
                $this->setCreateDate($value);
                break;
            case 9:
                $this->setLastUpdate($value);
                break;
            case 10:
                $this->setExpiredDate($value);
                break;
            case 11:
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
        $keys = JenjangKepengawasanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenjangKepengawasanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenjangKepengawasanTk($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJenjangKepengawasanSd($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJenjangKepengawasanSmp($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJenjangKepengawasanSma($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setJenjangKepengawasanSmk($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJenjangKepengawasanSlb($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreateDate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastUpdate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setExpiredDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastSync($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JenjangKepengawasanPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID)) $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $this->jenjang_kepengawasan_id);
        if ($this->isColumnModified(JenjangKepengawasanPeer::NAMA)) $criteria->add(JenjangKepengawasanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_TK)) $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_TK, $this->jenjang_kepengawasan_tk);
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SD)) $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SD, $this->jenjang_kepengawasan_sd);
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMP)) $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMP, $this->jenjang_kepengawasan_smp);
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMA)) $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMA, $this->jenjang_kepengawasan_sma);
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMK)) $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMK, $this->jenjang_kepengawasan_smk);
        if ($this->isColumnModified(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SLB)) $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SLB, $this->jenjang_kepengawasan_slb);
        if ($this->isColumnModified(JenjangKepengawasanPeer::CREATE_DATE)) $criteria->add(JenjangKepengawasanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenjangKepengawasanPeer::LAST_UPDATE)) $criteria->add(JenjangKepengawasanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenjangKepengawasanPeer::EXPIRED_DATE)) $criteria->add(JenjangKepengawasanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenjangKepengawasanPeer::LAST_SYNC)) $criteria->add(JenjangKepengawasanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenjangKepengawasanPeer::DATABASE_NAME);
        $criteria->add(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $this->jenjang_kepengawasan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJenjangKepengawasanId();
    }

    /**
     * Generic method to set the primary key (jenjang_kepengawasan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenjangKepengawasanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenjangKepengawasanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenjangKepengawasan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setJenjangKepengawasanTk($this->getJenjangKepengawasanTk());
        $copyObj->setJenjangKepengawasanSd($this->getJenjangKepengawasanSd());
        $copyObj->setJenjangKepengawasanSmp($this->getJenjangKepengawasanSmp());
        $copyObj->setJenjangKepengawasanSma($this->getJenjangKepengawasanSma());
        $copyObj->setJenjangKepengawasanSmk($this->getJenjangKepengawasanSmk());
        $copyObj->setJenjangKepengawasanSlb($this->getJenjangKepengawasanSlb());
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

            foreach ($this->getPengawasTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengawasTerdaftar($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenjangKepengawasanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenjangKepengawasan Clone of current object.
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
     * @return JenjangKepengawasanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenjangKepengawasanPeer();
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
        if ('PengawasTerdaftar' == $relationName) {
            $this->initPengawasTerdaftars();
        }
    }

    /**
     * Clears out the collPengawasTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangKepengawasan The current object (for fluent API support)
     * @see        addPengawasTerdaftars()
     */
    public function clearPengawasTerdaftars()
    {
        $this->collPengawasTerdaftars = null; // important to set this to null since that means it is uninitialized
        $this->collPengawasTerdaftarsPartial = null;

        return $this;
    }

    /**
     * reset is the collPengawasTerdaftars collection loaded partially
     *
     * @return void
     */
    public function resetPartialPengawasTerdaftars($v = true)
    {
        $this->collPengawasTerdaftarsPartial = $v;
    }

    /**
     * Initializes the collPengawasTerdaftars collection.
     *
     * By default this just sets the collPengawasTerdaftars collection to an empty array (like clearcollPengawasTerdaftars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPengawasTerdaftars($overrideExisting = true)
    {
        if (null !== $this->collPengawasTerdaftars && !$overrideExisting) {
            return;
        }
        $this->collPengawasTerdaftars = new PropelObjectCollection();
        $this->collPengawasTerdaftars->setModel('PengawasTerdaftar');
    }

    /**
     * Gets an array of PengawasTerdaftar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangKepengawasan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     * @throws PropelException
     */
    public function getPengawasTerdaftars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPengawasTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPengawasTerdaftars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPengawasTerdaftars) {
                // return empty collection
                $this->initPengawasTerdaftars();
            } else {
                $collPengawasTerdaftars = PengawasTerdaftarQuery::create(null, $criteria)
                    ->filterByJenjangKepengawasan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPengawasTerdaftarsPartial && count($collPengawasTerdaftars)) {
                      $this->initPengawasTerdaftars(false);

                      foreach($collPengawasTerdaftars as $obj) {
                        if (false == $this->collPengawasTerdaftars->contains($obj)) {
                          $this->collPengawasTerdaftars->append($obj);
                        }
                      }

                      $this->collPengawasTerdaftarsPartial = true;
                    }

                    $collPengawasTerdaftars->getInternalIterator()->rewind();
                    return $collPengawasTerdaftars;
                }

                if($partial && $this->collPengawasTerdaftars) {
                    foreach($this->collPengawasTerdaftars as $obj) {
                        if($obj->isNew()) {
                            $collPengawasTerdaftars[] = $obj;
                        }
                    }
                }

                $this->collPengawasTerdaftars = $collPengawasTerdaftars;
                $this->collPengawasTerdaftarsPartial = false;
            }
        }

        return $this->collPengawasTerdaftars;
    }

    /**
     * Sets a collection of PengawasTerdaftar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pengawasTerdaftars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function setPengawasTerdaftars(PropelCollection $pengawasTerdaftars, PropelPDO $con = null)
    {
        $pengawasTerdaftarsToDelete = $this->getPengawasTerdaftars(new Criteria(), $con)->diff($pengawasTerdaftars);

        $this->pengawasTerdaftarsScheduledForDeletion = unserialize(serialize($pengawasTerdaftarsToDelete));

        foreach ($pengawasTerdaftarsToDelete as $pengawasTerdaftarRemoved) {
            $pengawasTerdaftarRemoved->setJenjangKepengawasan(null);
        }

        $this->collPengawasTerdaftars = null;
        foreach ($pengawasTerdaftars as $pengawasTerdaftar) {
            $this->addPengawasTerdaftar($pengawasTerdaftar);
        }

        $this->collPengawasTerdaftars = $pengawasTerdaftars;
        $this->collPengawasTerdaftarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PengawasTerdaftar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PengawasTerdaftar objects.
     * @throws PropelException
     */
    public function countPengawasTerdaftars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPengawasTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPengawasTerdaftars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPengawasTerdaftars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPengawasTerdaftars());
            }
            $query = PengawasTerdaftarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangKepengawasan($this)
                ->count($con);
        }

        return count($this->collPengawasTerdaftars);
    }

    /**
     * Method called to associate a PengawasTerdaftar object to this object
     * through the PengawasTerdaftar foreign key attribute.
     *
     * @param    PengawasTerdaftar $l PengawasTerdaftar
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function addPengawasTerdaftar(PengawasTerdaftar $l)
    {
        if ($this->collPengawasTerdaftars === null) {
            $this->initPengawasTerdaftars();
            $this->collPengawasTerdaftarsPartial = true;
        }
        if (!in_array($l, $this->collPengawasTerdaftars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPengawasTerdaftar($l);
        }

        return $this;
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to add.
     */
    protected function doAddPengawasTerdaftar($pengawasTerdaftar)
    {
        $this->collPengawasTerdaftars[]= $pengawasTerdaftar;
        $pengawasTerdaftar->setJenjangKepengawasan($this);
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to remove.
     * @return JenjangKepengawasan The current object (for fluent API support)
     */
    public function removePengawasTerdaftar($pengawasTerdaftar)
    {
        if ($this->getPengawasTerdaftars()->contains($pengawasTerdaftar)) {
            $this->collPengawasTerdaftars->remove($this->collPengawasTerdaftars->search($pengawasTerdaftar));
            if (null === $this->pengawasTerdaftarsScheduledForDeletion) {
                $this->pengawasTerdaftarsScheduledForDeletion = clone $this->collPengawasTerdaftars;
                $this->pengawasTerdaftarsScheduledForDeletion->clear();
            }
            $this->pengawasTerdaftarsScheduledForDeletion[]= clone $pengawasTerdaftar;
            $pengawasTerdaftar->setJenjangKepengawasan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangKepengawasan is new, it will return
     * an empty collection; or if this JenjangKepengawasan has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangKepengawasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangKepengawasan is new, it will return
     * an empty collection; or if this JenjangKepengawasan has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangKepengawasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinJenisKeluar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('JenisKeluar', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangKepengawasan is new, it will return
     * an empty collection; or if this JenjangKepengawasan has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangKepengawasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinLembagaNonSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('LembagaNonSekolah', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangKepengawasan is new, it will return
     * an empty collection; or if this JenjangKepengawasan has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangKepengawasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangKepengawasan is new, it will return
     * an empty collection; or if this JenjangKepengawasan has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangKepengawasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangKepengawasan is new, it will return
     * an empty collection; or if this JenjangKepengawasan has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangKepengawasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenjang_kepengawasan_id = null;
        $this->nama = null;
        $this->jenjang_kepengawasan_tk = null;
        $this->jenjang_kepengawasan_sd = null;
        $this->jenjang_kepengawasan_smp = null;
        $this->jenjang_kepengawasan_sma = null;
        $this->jenjang_kepengawasan_smk = null;
        $this->jenjang_kepengawasan_slb = null;
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
            if ($this->collPengawasTerdaftars) {
                foreach ($this->collPengawasTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPengawasTerdaftars instanceof PropelCollection) {
            $this->collPengawasTerdaftars->clearIterator();
        }
        $this->collPengawasTerdaftars = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenjangKepengawasanPeer::DEFAULT_STRING_FORMAT);
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
