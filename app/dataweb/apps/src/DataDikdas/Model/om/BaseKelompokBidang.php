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
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\KelompokBidang;
use DataDikdas\Model\KelompokBidangPeer;
use DataDikdas\Model\KelompokBidangQuery;

/**
 * Base class that represents a row from the 'ref.kelompok_bidang' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKelompokBidang extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\KelompokBidangPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        KelompokBidangPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the level_bidang_id field.
     * @var        string
     */
    protected $level_bidang_id;

    /**
     * The value for the nama_level_bidang field.
     * @var        string
     */
    protected $nama_level_bidang;

    /**
     * The value for the untuk_sma field.
     * @var        string
     */
    protected $untuk_sma;

    /**
     * The value for the untuk_smk field.
     * @var        string
     */
    protected $untuk_smk;

    /**
     * The value for the untuk_pt field.
     * @var        string
     */
    protected $untuk_pt;

    /**
     * The value for the untuk_slb field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $untuk_slb;

    /**
     * The value for the untuk_smklb field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $untuk_smklb;

    /**
     * The value for the level_bidang_induk field.
     * @var        string
     */
    protected $level_bidang_induk;

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
     * @var        KelompokBidang
     */
    protected $aKelompokBidangRelatedByLevelBidangInduk;

    /**
     * @var        PropelObjectCollection|Jurusan[] Collection to store aggregation of Jurusan objects.
     */
    protected $collJurusans;
    protected $collJurusansPartial;

    /**
     * @var        PropelObjectCollection|KelompokBidang[] Collection to store aggregation of KelompokBidang objects.
     */
    protected $collKelompokBidangsRelatedByLevelBidangId;
    protected $collKelompokBidangsRelatedByLevelBidangIdPartial;

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
    protected $jurusansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->untuk_slb = '0';
        $this->untuk_smklb = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseKelompokBidang object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [level_bidang_id] column value.
     * 
     * @return string
     */
    public function getLevelBidangId()
    {
        return $this->level_bidang_id;
    }

    /**
     * Get the [nama_level_bidang] column value.
     * 
     * @return string
     */
    public function getNamaLevelBidang()
    {
        return $this->nama_level_bidang;
    }

    /**
     * Get the [untuk_sma] column value.
     * 
     * @return string
     */
    public function getUntukSma()
    {
        return $this->untuk_sma;
    }

    /**
     * Get the [untuk_smk] column value.
     * 
     * @return string
     */
    public function getUntukSmk()
    {
        return $this->untuk_smk;
    }

    /**
     * Get the [untuk_pt] column value.
     * 
     * @return string
     */
    public function getUntukPt()
    {
        return $this->untuk_pt;
    }

    /**
     * Get the [untuk_slb] column value.
     * 
     * @return string
     */
    public function getUntukSlb()
    {
        return $this->untuk_slb;
    }

    /**
     * Get the [untuk_smklb] column value.
     * 
     * @return string
     */
    public function getUntukSmklb()
    {
        return $this->untuk_smklb;
    }

    /**
     * Get the [level_bidang_induk] column value.
     * 
     * @return string
     */
    public function getLevelBidangInduk()
    {
        return $this->level_bidang_induk;
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
     * Set the value of [level_bidang_id] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setLevelBidangId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->level_bidang_id !== $v) {
            $this->level_bidang_id = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::LEVEL_BIDANG_ID;
        }


        return $this;
    } // setLevelBidangId()

    /**
     * Set the value of [nama_level_bidang] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setNamaLevelBidang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_level_bidang !== $v) {
            $this->nama_level_bidang = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::NAMA_LEVEL_BIDANG;
        }


        return $this;
    } // setNamaLevelBidang()

    /**
     * Set the value of [untuk_sma] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setUntukSma($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_sma !== $v) {
            $this->untuk_sma = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::UNTUK_SMA;
        }


        return $this;
    } // setUntukSma()

    /**
     * Set the value of [untuk_smk] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setUntukSmk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_smk !== $v) {
            $this->untuk_smk = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::UNTUK_SMK;
        }


        return $this;
    } // setUntukSmk()

    /**
     * Set the value of [untuk_pt] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setUntukPt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_pt !== $v) {
            $this->untuk_pt = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::UNTUK_PT;
        }


        return $this;
    } // setUntukPt()

    /**
     * Set the value of [untuk_slb] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setUntukSlb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_slb !== $v) {
            $this->untuk_slb = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::UNTUK_SLB;
        }


        return $this;
    } // setUntukSlb()

    /**
     * Set the value of [untuk_smklb] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setUntukSmklb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_smklb !== $v) {
            $this->untuk_smklb = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::UNTUK_SMKLB;
        }


        return $this;
    } // setUntukSmklb()

    /**
     * Set the value of [level_bidang_induk] column.
     * 
     * @param string $v new value
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setLevelBidangInduk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->level_bidang_induk !== $v) {
            $this->level_bidang_induk = $v;
            $this->modifiedColumns[] = KelompokBidangPeer::LEVEL_BIDANG_INDUK;
        }

        if ($this->aKelompokBidangRelatedByLevelBidangInduk !== null && $this->aKelompokBidangRelatedByLevelBidangInduk->getLevelBidangId() !== $v) {
            $this->aKelompokBidangRelatedByLevelBidangInduk = null;
        }


        return $this;
    } // setLevelBidangInduk()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = KelompokBidangPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = KelompokBidangPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = KelompokBidangPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelompokBidang The current object (for fluent API support)
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
                $this->modifiedColumns[] = KelompokBidangPeer::LAST_SYNC;
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
            if ($this->untuk_slb !== '0') {
                return false;
            }

            if ($this->untuk_smklb !== '0') {
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

            $this->level_bidang_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama_level_bidang = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->untuk_sma = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->untuk_smk = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->untuk_pt = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->untuk_slb = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->untuk_smklb = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->level_bidang_induk = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
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
            return $startcol + 12; // 12 = KelompokBidangPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating KelompokBidang object", $e);
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

        if ($this->aKelompokBidangRelatedByLevelBidangInduk !== null && $this->level_bidang_induk !== $this->aKelompokBidangRelatedByLevelBidangInduk->getLevelBidangId()) {
            $this->aKelompokBidangRelatedByLevelBidangInduk = null;
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
            $con = Propel::getConnection(KelompokBidangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = KelompokBidangPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aKelompokBidangRelatedByLevelBidangInduk = null;
            $this->collJurusans = null;

            $this->collKelompokBidangsRelatedByLevelBidangId = null;

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
            $con = Propel::getConnection(KelompokBidangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = KelompokBidangQuery::create()
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
            $con = Propel::getConnection(KelompokBidangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                KelompokBidangPeer::addInstanceToPool($this);
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

            if ($this->aKelompokBidangRelatedByLevelBidangInduk !== null) {
                if ($this->aKelompokBidangRelatedByLevelBidangInduk->isModified() || $this->aKelompokBidangRelatedByLevelBidangInduk->isNew()) {
                    $affectedRows += $this->aKelompokBidangRelatedByLevelBidangInduk->save($con);
                }
                $this->setKelompokBidangRelatedByLevelBidangInduk($this->aKelompokBidangRelatedByLevelBidangInduk);
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

            if ($this->jurusansScheduledForDeletion !== null) {
                if (!$this->jurusansScheduledForDeletion->isEmpty()) {
                    JurusanQuery::create()
                        ->filterByPrimaryKeys($this->jurusansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jurusansScheduledForDeletion = null;
                }
            }

            if ($this->collJurusans !== null) {
                foreach ($this->collJurusans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion !== null) {
                if (!$this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion as $kelompokBidangRelatedByLevelBidangId) {
                        // need to save related object because we set the relation to null
                        $kelompokBidangRelatedByLevelBidangId->save($con);
                    }
                    $this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion = null;
                }
            }

            if ($this->collKelompokBidangsRelatedByLevelBidangId !== null) {
                foreach ($this->collKelompokBidangsRelatedByLevelBidangId as $referrerFK) {
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
        if ($this->isColumnModified(KelompokBidangPeer::LEVEL_BIDANG_ID)) {
            $modifiedColumns[':p' . $index++]  = '"level_bidang_id"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::NAMA_LEVEL_BIDANG)) {
            $modifiedColumns[':p' . $index++]  = '"nama_level_bidang"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SMA)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_sma"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SMK)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_smk"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_PT)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_pt"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SLB)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_slb"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SMKLB)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_smklb"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::LEVEL_BIDANG_INDUK)) {
            $modifiedColumns[':p' . $index++]  = '"level_bidang_induk"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(KelompokBidangPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."kelompok_bidang" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"level_bidang_id"':						
                        $stmt->bindValue($identifier, $this->level_bidang_id, PDO::PARAM_STR);
                        break;
                    case '"nama_level_bidang"':						
                        $stmt->bindValue($identifier, $this->nama_level_bidang, PDO::PARAM_STR);
                        break;
                    case '"untuk_sma"':						
                        $stmt->bindValue($identifier, $this->untuk_sma, PDO::PARAM_STR);
                        break;
                    case '"untuk_smk"':						
                        $stmt->bindValue($identifier, $this->untuk_smk, PDO::PARAM_STR);
                        break;
                    case '"untuk_pt"':						
                        $stmt->bindValue($identifier, $this->untuk_pt, PDO::PARAM_STR);
                        break;
                    case '"untuk_slb"':						
                        $stmt->bindValue($identifier, $this->untuk_slb, PDO::PARAM_STR);
                        break;
                    case '"untuk_smklb"':						
                        $stmt->bindValue($identifier, $this->untuk_smklb, PDO::PARAM_STR);
                        break;
                    case '"level_bidang_induk"':						
                        $stmt->bindValue($identifier, $this->level_bidang_induk, PDO::PARAM_STR);
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

            if ($this->aKelompokBidangRelatedByLevelBidangInduk !== null) {
                if (!$this->aKelompokBidangRelatedByLevelBidangInduk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKelompokBidangRelatedByLevelBidangInduk->getValidationFailures());
                }
            }


            if (($retval = KelompokBidangPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collJurusans !== null) {
                    foreach ($this->collJurusans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKelompokBidangsRelatedByLevelBidangId !== null) {
                    foreach ($this->collKelompokBidangsRelatedByLevelBidangId as $referrerFK) {
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
        $pos = KelompokBidangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getLevelBidangId();
                break;
            case 1:
                return $this->getNamaLevelBidang();
                break;
            case 2:
                return $this->getUntukSma();
                break;
            case 3:
                return $this->getUntukSmk();
                break;
            case 4:
                return $this->getUntukPt();
                break;
            case 5:
                return $this->getUntukSlb();
                break;
            case 6:
                return $this->getUntukSmklb();
                break;
            case 7:
                return $this->getLevelBidangInduk();
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
        if (isset($alreadyDumpedObjects['KelompokBidang'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['KelompokBidang'][$this->getPrimaryKey()] = true;
        $keys = KelompokBidangPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getLevelBidangId(),
            $keys[1] => $this->getNamaLevelBidang(),
            $keys[2] => $this->getUntukSma(),
            $keys[3] => $this->getUntukSmk(),
            $keys[4] => $this->getUntukPt(),
            $keys[5] => $this->getUntukSlb(),
            $keys[6] => $this->getUntukSmklb(),
            $keys[7] => $this->getLevelBidangInduk(),
            $keys[8] => $this->getCreateDate(),
            $keys[9] => $this->getLastUpdate(),
            $keys[10] => $this->getExpiredDate(),
            $keys[11] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aKelompokBidangRelatedByLevelBidangInduk) {
                $result['KelompokBidangRelatedByLevelBidangInduk'] = $this->aKelompokBidangRelatedByLevelBidangInduk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collJurusans) {
                $result['Jurusans'] = $this->collJurusans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKelompokBidangsRelatedByLevelBidangId) {
                $result['KelompokBidangsRelatedByLevelBidangId'] = $this->collKelompokBidangsRelatedByLevelBidangId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = KelompokBidangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setLevelBidangId($value);
                break;
            case 1:
                $this->setNamaLevelBidang($value);
                break;
            case 2:
                $this->setUntukSma($value);
                break;
            case 3:
                $this->setUntukSmk($value);
                break;
            case 4:
                $this->setUntukPt($value);
                break;
            case 5:
                $this->setUntukSlb($value);
                break;
            case 6:
                $this->setUntukSmklb($value);
                break;
            case 7:
                $this->setLevelBidangInduk($value);
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
        $keys = KelompokBidangPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setLevelBidangId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNamaLevelBidang($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUntukSma($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUntukSmk($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUntukPt($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUntukSlb($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setUntukSmklb($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLevelBidangInduk($arr[$keys[7]]);
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
        $criteria = new Criteria(KelompokBidangPeer::DATABASE_NAME);

        if ($this->isColumnModified(KelompokBidangPeer::LEVEL_BIDANG_ID)) $criteria->add(KelompokBidangPeer::LEVEL_BIDANG_ID, $this->level_bidang_id);
        if ($this->isColumnModified(KelompokBidangPeer::NAMA_LEVEL_BIDANG)) $criteria->add(KelompokBidangPeer::NAMA_LEVEL_BIDANG, $this->nama_level_bidang);
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SMA)) $criteria->add(KelompokBidangPeer::UNTUK_SMA, $this->untuk_sma);
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SMK)) $criteria->add(KelompokBidangPeer::UNTUK_SMK, $this->untuk_smk);
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_PT)) $criteria->add(KelompokBidangPeer::UNTUK_PT, $this->untuk_pt);
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SLB)) $criteria->add(KelompokBidangPeer::UNTUK_SLB, $this->untuk_slb);
        if ($this->isColumnModified(KelompokBidangPeer::UNTUK_SMKLB)) $criteria->add(KelompokBidangPeer::UNTUK_SMKLB, $this->untuk_smklb);
        if ($this->isColumnModified(KelompokBidangPeer::LEVEL_BIDANG_INDUK)) $criteria->add(KelompokBidangPeer::LEVEL_BIDANG_INDUK, $this->level_bidang_induk);
        if ($this->isColumnModified(KelompokBidangPeer::CREATE_DATE)) $criteria->add(KelompokBidangPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(KelompokBidangPeer::LAST_UPDATE)) $criteria->add(KelompokBidangPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(KelompokBidangPeer::EXPIRED_DATE)) $criteria->add(KelompokBidangPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(KelompokBidangPeer::LAST_SYNC)) $criteria->add(KelompokBidangPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(KelompokBidangPeer::DATABASE_NAME);
        $criteria->add(KelompokBidangPeer::LEVEL_BIDANG_ID, $this->level_bidang_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getLevelBidangId();
    }

    /**
     * Generic method to set the primary key (level_bidang_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setLevelBidangId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getLevelBidangId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of KelompokBidang (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNamaLevelBidang($this->getNamaLevelBidang());
        $copyObj->setUntukSma($this->getUntukSma());
        $copyObj->setUntukSmk($this->getUntukSmk());
        $copyObj->setUntukPt($this->getUntukPt());
        $copyObj->setUntukSlb($this->getUntukSlb());
        $copyObj->setUntukSmklb($this->getUntukSmklb());
        $copyObj->setLevelBidangInduk($this->getLevelBidangInduk());
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

            foreach ($this->getJurusans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKelompokBidangsRelatedByLevelBidangId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKelompokBidangRelatedByLevelBidangId($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setLevelBidangId(NULL); // this is a auto-increment column, so set to default value
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
     * @return KelompokBidang Clone of current object.
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
     * @return KelompokBidangPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new KelompokBidangPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a KelompokBidang object.
     *
     * @param             KelompokBidang $v
     * @return KelompokBidang The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKelompokBidangRelatedByLevelBidangInduk(KelompokBidang $v = null)
    {
        if ($v === null) {
            $this->setLevelBidangInduk(NULL);
        } else {
            $this->setLevelBidangInduk($v->getLevelBidangId());
        }

        $this->aKelompokBidangRelatedByLevelBidangInduk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KelompokBidang object, it will not be re-added.
        if ($v !== null) {
            $v->addKelompokBidangRelatedByLevelBidangId($this);
        }


        return $this;
    }


    /**
     * Get the associated KelompokBidang object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KelompokBidang The associated KelompokBidang object.
     * @throws PropelException
     */
    public function getKelompokBidangRelatedByLevelBidangInduk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKelompokBidangRelatedByLevelBidangInduk === null && (($this->level_bidang_induk !== "" && $this->level_bidang_induk !== null)) && $doQuery) {
            $this->aKelompokBidangRelatedByLevelBidangInduk = KelompokBidangQuery::create()->findPk($this->level_bidang_induk, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKelompokBidangRelatedByLevelBidangInduk->addKelompokBidangsRelatedByLevelBidangId($this);
             */
        }

        return $this->aKelompokBidangRelatedByLevelBidangInduk;
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
        if ('Jurusan' == $relationName) {
            $this->initJurusans();
        }
        if ('KelompokBidangRelatedByLevelBidangId' == $relationName) {
            $this->initKelompokBidangsRelatedByLevelBidangId();
        }
    }

    /**
     * Clears out the collJurusans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KelompokBidang The current object (for fluent API support)
     * @see        addJurusans()
     */
    public function clearJurusans()
    {
        $this->collJurusans = null; // important to set this to null since that means it is uninitialized
        $this->collJurusansPartial = null;

        return $this;
    }

    /**
     * reset is the collJurusans collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurusans($v = true)
    {
        $this->collJurusansPartial = $v;
    }

    /**
     * Initializes the collJurusans collection.
     *
     * By default this just sets the collJurusans collection to an empty array (like clearcollJurusans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurusans($overrideExisting = true)
    {
        if (null !== $this->collJurusans && !$overrideExisting) {
            return;
        }
        $this->collJurusans = new PropelObjectCollection();
        $this->collJurusans->setModel('Jurusan');
    }

    /**
     * Gets an array of Jurusan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KelompokBidang is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     * @throws PropelException
     */
    public function getJurusans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurusansPartial && !$this->isNew();
        if (null === $this->collJurusans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurusans) {
                // return empty collection
                $this->initJurusans();
            } else {
                $collJurusans = JurusanQuery::create(null, $criteria)
                    ->filterByKelompokBidang($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurusansPartial && count($collJurusans)) {
                      $this->initJurusans(false);

                      foreach($collJurusans as $obj) {
                        if (false == $this->collJurusans->contains($obj)) {
                          $this->collJurusans->append($obj);
                        }
                      }

                      $this->collJurusansPartial = true;
                    }

                    $collJurusans->getInternalIterator()->rewind();
                    return $collJurusans;
                }

                if($partial && $this->collJurusans) {
                    foreach($this->collJurusans as $obj) {
                        if($obj->isNew()) {
                            $collJurusans[] = $obj;
                        }
                    }
                }

                $this->collJurusans = $collJurusans;
                $this->collJurusansPartial = false;
            }
        }

        return $this->collJurusans;
    }

    /**
     * Sets a collection of Jurusan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurusans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setJurusans(PropelCollection $jurusans, PropelPDO $con = null)
    {
        $jurusansToDelete = $this->getJurusans(new Criteria(), $con)->diff($jurusans);

        $this->jurusansScheduledForDeletion = unserialize(serialize($jurusansToDelete));

        foreach ($jurusansToDelete as $jurusanRemoved) {
            $jurusanRemoved->setKelompokBidang(null);
        }

        $this->collJurusans = null;
        foreach ($jurusans as $jurusan) {
            $this->addJurusan($jurusan);
        }

        $this->collJurusans = $jurusans;
        $this->collJurusansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Jurusan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jurusan objects.
     * @throws PropelException
     */
    public function countJurusans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurusansPartial && !$this->isNew();
        if (null === $this->collJurusans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurusans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurusans());
            }
            $query = JurusanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKelompokBidang($this)
                ->count($con);
        }

        return count($this->collJurusans);
    }

    /**
     * Method called to associate a Jurusan object to this object
     * through the Jurusan foreign key attribute.
     *
     * @param    Jurusan $l Jurusan
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function addJurusan(Jurusan $l)
    {
        if ($this->collJurusans === null) {
            $this->initJurusans();
            $this->collJurusansPartial = true;
        }
        if (!in_array($l, $this->collJurusans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurusan($l);
        }

        return $this;
    }

    /**
     * @param	Jurusan $jurusan The jurusan object to add.
     */
    protected function doAddJurusan($jurusan)
    {
        $this->collJurusans[]= $jurusan;
        $jurusan->setKelompokBidang($this);
    }

    /**
     * @param	Jurusan $jurusan The jurusan object to remove.
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function removeJurusan($jurusan)
    {
        if ($this->getJurusans()->contains($jurusan)) {
            $this->collJurusans->remove($this->collJurusans->search($jurusan));
            if (null === $this->jurusansScheduledForDeletion) {
                $this->jurusansScheduledForDeletion = clone $this->collJurusans;
                $this->jurusansScheduledForDeletion->clear();
            }
            $this->jurusansScheduledForDeletion[]= clone $jurusan;
            $jurusan->setKelompokBidang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KelompokBidang is new, it will return
     * an empty collection; or if this KelompokBidang has previously
     * been saved, it will retrieve related Jurusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KelompokBidang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     */
    public function getJurusansJoinJurusanRelatedByJurusanInduk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanQuery::create(null, $criteria);
        $query->joinWith('JurusanRelatedByJurusanInduk', $join_behavior);

        return $this->getJurusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KelompokBidang is new, it will return
     * an empty collection; or if this KelompokBidang has previously
     * been saved, it will retrieve related Jurusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KelompokBidang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     */
    public function getJurusansJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getJurusans($query, $con);
    }

    /**
     * Clears out the collKelompokBidangsRelatedByLevelBidangId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KelompokBidang The current object (for fluent API support)
     * @see        addKelompokBidangsRelatedByLevelBidangId()
     */
    public function clearKelompokBidangsRelatedByLevelBidangId()
    {
        $this->collKelompokBidangsRelatedByLevelBidangId = null; // important to set this to null since that means it is uninitialized
        $this->collKelompokBidangsRelatedByLevelBidangIdPartial = null;

        return $this;
    }

    /**
     * reset is the collKelompokBidangsRelatedByLevelBidangId collection loaded partially
     *
     * @return void
     */
    public function resetPartialKelompokBidangsRelatedByLevelBidangId($v = true)
    {
        $this->collKelompokBidangsRelatedByLevelBidangIdPartial = $v;
    }

    /**
     * Initializes the collKelompokBidangsRelatedByLevelBidangId collection.
     *
     * By default this just sets the collKelompokBidangsRelatedByLevelBidangId collection to an empty array (like clearcollKelompokBidangsRelatedByLevelBidangId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKelompokBidangsRelatedByLevelBidangId($overrideExisting = true)
    {
        if (null !== $this->collKelompokBidangsRelatedByLevelBidangId && !$overrideExisting) {
            return;
        }
        $this->collKelompokBidangsRelatedByLevelBidangId = new PropelObjectCollection();
        $this->collKelompokBidangsRelatedByLevelBidangId->setModel('KelompokBidang');
    }

    /**
     * Gets an array of KelompokBidang objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KelompokBidang is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|KelompokBidang[] List of KelompokBidang objects
     * @throws PropelException
     */
    public function getKelompokBidangsRelatedByLevelBidangId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKelompokBidangsRelatedByLevelBidangIdPartial && !$this->isNew();
        if (null === $this->collKelompokBidangsRelatedByLevelBidangId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKelompokBidangsRelatedByLevelBidangId) {
                // return empty collection
                $this->initKelompokBidangsRelatedByLevelBidangId();
            } else {
                $collKelompokBidangsRelatedByLevelBidangId = KelompokBidangQuery::create(null, $criteria)
                    ->filterByKelompokBidangRelatedByLevelBidangInduk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKelompokBidangsRelatedByLevelBidangIdPartial && count($collKelompokBidangsRelatedByLevelBidangId)) {
                      $this->initKelompokBidangsRelatedByLevelBidangId(false);

                      foreach($collKelompokBidangsRelatedByLevelBidangId as $obj) {
                        if (false == $this->collKelompokBidangsRelatedByLevelBidangId->contains($obj)) {
                          $this->collKelompokBidangsRelatedByLevelBidangId->append($obj);
                        }
                      }

                      $this->collKelompokBidangsRelatedByLevelBidangIdPartial = true;
                    }

                    $collKelompokBidangsRelatedByLevelBidangId->getInternalIterator()->rewind();
                    return $collKelompokBidangsRelatedByLevelBidangId;
                }

                if($partial && $this->collKelompokBidangsRelatedByLevelBidangId) {
                    foreach($this->collKelompokBidangsRelatedByLevelBidangId as $obj) {
                        if($obj->isNew()) {
                            $collKelompokBidangsRelatedByLevelBidangId[] = $obj;
                        }
                    }
                }

                $this->collKelompokBidangsRelatedByLevelBidangId = $collKelompokBidangsRelatedByLevelBidangId;
                $this->collKelompokBidangsRelatedByLevelBidangIdPartial = false;
            }
        }

        return $this->collKelompokBidangsRelatedByLevelBidangId;
    }

    /**
     * Sets a collection of KelompokBidangRelatedByLevelBidangId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kelompokBidangsRelatedByLevelBidangId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function setKelompokBidangsRelatedByLevelBidangId(PropelCollection $kelompokBidangsRelatedByLevelBidangId, PropelPDO $con = null)
    {
        $kelompokBidangsRelatedByLevelBidangIdToDelete = $this->getKelompokBidangsRelatedByLevelBidangId(new Criteria(), $con)->diff($kelompokBidangsRelatedByLevelBidangId);

        $this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion = unserialize(serialize($kelompokBidangsRelatedByLevelBidangIdToDelete));

        foreach ($kelompokBidangsRelatedByLevelBidangIdToDelete as $kelompokBidangRelatedByLevelBidangIdRemoved) {
            $kelompokBidangRelatedByLevelBidangIdRemoved->setKelompokBidangRelatedByLevelBidangInduk(null);
        }

        $this->collKelompokBidangsRelatedByLevelBidangId = null;
        foreach ($kelompokBidangsRelatedByLevelBidangId as $kelompokBidangRelatedByLevelBidangId) {
            $this->addKelompokBidangRelatedByLevelBidangId($kelompokBidangRelatedByLevelBidangId);
        }

        $this->collKelompokBidangsRelatedByLevelBidangId = $kelompokBidangsRelatedByLevelBidangId;
        $this->collKelompokBidangsRelatedByLevelBidangIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related KelompokBidang objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related KelompokBidang objects.
     * @throws PropelException
     */
    public function countKelompokBidangsRelatedByLevelBidangId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKelompokBidangsRelatedByLevelBidangIdPartial && !$this->isNew();
        if (null === $this->collKelompokBidangsRelatedByLevelBidangId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKelompokBidangsRelatedByLevelBidangId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKelompokBidangsRelatedByLevelBidangId());
            }
            $query = KelompokBidangQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKelompokBidangRelatedByLevelBidangInduk($this)
                ->count($con);
        }

        return count($this->collKelompokBidangsRelatedByLevelBidangId);
    }

    /**
     * Method called to associate a KelompokBidang object to this object
     * through the KelompokBidang foreign key attribute.
     *
     * @param    KelompokBidang $l KelompokBidang
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function addKelompokBidangRelatedByLevelBidangId(KelompokBidang $l)
    {
        if ($this->collKelompokBidangsRelatedByLevelBidangId === null) {
            $this->initKelompokBidangsRelatedByLevelBidangId();
            $this->collKelompokBidangsRelatedByLevelBidangIdPartial = true;
        }
        if (!in_array($l, $this->collKelompokBidangsRelatedByLevelBidangId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKelompokBidangRelatedByLevelBidangId($l);
        }

        return $this;
    }

    /**
     * @param	KelompokBidangRelatedByLevelBidangId $kelompokBidangRelatedByLevelBidangId The kelompokBidangRelatedByLevelBidangId object to add.
     */
    protected function doAddKelompokBidangRelatedByLevelBidangId($kelompokBidangRelatedByLevelBidangId)
    {
        $this->collKelompokBidangsRelatedByLevelBidangId[]= $kelompokBidangRelatedByLevelBidangId;
        $kelompokBidangRelatedByLevelBidangId->setKelompokBidangRelatedByLevelBidangInduk($this);
    }

    /**
     * @param	KelompokBidangRelatedByLevelBidangId $kelompokBidangRelatedByLevelBidangId The kelompokBidangRelatedByLevelBidangId object to remove.
     * @return KelompokBidang The current object (for fluent API support)
     */
    public function removeKelompokBidangRelatedByLevelBidangId($kelompokBidangRelatedByLevelBidangId)
    {
        if ($this->getKelompokBidangsRelatedByLevelBidangId()->contains($kelompokBidangRelatedByLevelBidangId)) {
            $this->collKelompokBidangsRelatedByLevelBidangId->remove($this->collKelompokBidangsRelatedByLevelBidangId->search($kelompokBidangRelatedByLevelBidangId));
            if (null === $this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion) {
                $this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion = clone $this->collKelompokBidangsRelatedByLevelBidangId;
                $this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion->clear();
            }
            $this->kelompokBidangsRelatedByLevelBidangIdScheduledForDeletion[]= $kelompokBidangRelatedByLevelBidangId;
            $kelompokBidangRelatedByLevelBidangId->setKelompokBidangRelatedByLevelBidangInduk(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->level_bidang_id = null;
        $this->nama_level_bidang = null;
        $this->untuk_sma = null;
        $this->untuk_smk = null;
        $this->untuk_pt = null;
        $this->untuk_slb = null;
        $this->untuk_smklb = null;
        $this->level_bidang_induk = null;
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
            if ($this->collJurusans) {
                foreach ($this->collJurusans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKelompokBidangsRelatedByLevelBidangId) {
                foreach ($this->collKelompokBidangsRelatedByLevelBidangId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aKelompokBidangRelatedByLevelBidangInduk instanceof Persistent) {
              $this->aKelompokBidangRelatedByLevelBidangInduk->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collJurusans instanceof PropelCollection) {
            $this->collJurusans->clearIterator();
        }
        $this->collJurusans = null;
        if ($this->collKelompokBidangsRelatedByLevelBidangId instanceof PropelCollection) {
            $this->collKelompokBidangsRelatedByLevelBidangId->clearIterator();
        }
        $this->collKelompokBidangsRelatedByLevelBidangId = null;
        $this->aKelompokBidangRelatedByLevelBidangInduk = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(KelompokBidangPeer::DEFAULT_STRING_FORMAT);
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
