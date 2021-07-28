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
use DataDikdas\Model\JenisTunjangan;
use DataDikdas\Model\JenisTunjanganQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\Tunjangan;
use DataDikdas\Model\TunjanganPeer;
use DataDikdas\Model\TunjanganQuery;
use DataDikdas\Model\VldTunjangan;
use DataDikdas\Model\VldTunjanganQuery;

/**
 * Base class that represents a row from the 'tunjangan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTunjangan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TunjanganPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TunjanganPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the tunjangan_id field.
     * @var        string
     */
    protected $tunjangan_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the jenis_tunjangan_id field.
     * @var        int
     */
    protected $jenis_tunjangan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the instansi field.
     * @var        string
     */
    protected $instansi;

    /**
     * The value for the sk_tunjangan field.
     * @var        string
     */
    protected $sk_tunjangan;

    /**
     * The value for the tgl_sk_tunjangan field.
     * @var        string
     */
    protected $tgl_sk_tunjangan;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

    /**
     * The value for the sumber_dana field.
     * @var        string
     */
    protected $sumber_dana;

    /**
     * The value for the dari_tahun field.
     * @var        string
     */
    protected $dari_tahun;

    /**
     * The value for the sampai_tahun field.
     * @var        string
     */
    protected $sampai_tahun;

    /**
     * The value for the nominal field.
     * @var        string
     */
    protected $nominal;

    /**
     * The value for the status field.
     * @var        int
     */
    protected $status;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

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
     * The value for the soft_delete field.
     * @var        string
     */
    protected $soft_delete;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * The value for the updater_id field.
     * @var        string
     */
    protected $updater_id;

    /**
     * @var        Semester
     */
    protected $aSemester;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        JenisTunjangan
     */
    protected $aJenisTunjangan;

    /**
     * @var        PropelObjectCollection|VldTunjangan[] Collection to store aggregation of VldTunjangan objects.
     */
    protected $collVldTunjangans;
    protected $collVldTunjangansPartial;

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
    protected $vldTunjangansScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->asal_data = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseTunjangan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [tunjangan_id] column value.
     * 
     * @return string
     */
    public function getTunjanganId()
    {
        return $this->tunjangan_id;
    }

    /**
     * Get the [ptk_id] column value.
     * 
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
    }

    /**
     * Get the [jenis_tunjangan_id] column value.
     * 
     * @return int
     */
    public function getJenisTunjanganId()
    {
        return $this->jenis_tunjangan_id;
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
     * Get the [instansi] column value.
     * 
     * @return string
     */
    public function getInstansi()
    {
        return $this->instansi;
    }

    /**
     * Get the [sk_tunjangan] column value.
     * 
     * @return string
     */
    public function getSkTunjangan()
    {
        return $this->sk_tunjangan;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_sk_tunjangan] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglSkTunjangan($format = '%Y-%m-%d')
    {
        if ($this->tgl_sk_tunjangan === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_sk_tunjangan);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_sk_tunjangan, true), $x);
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
     * Get the [semester_id] column value.
     * 
     * @return string
     */
    public function getSemesterId()
    {
        return $this->semester_id;
    }

    /**
     * Get the [sumber_dana] column value.
     * 
     * @return string
     */
    public function getSumberDana()
    {
        return $this->sumber_dana;
    }

    /**
     * Get the [dari_tahun] column value.
     * 
     * @return string
     */
    public function getDariTahun()
    {
        return $this->dari_tahun;
    }

    /**
     * Get the [sampai_tahun] column value.
     * 
     * @return string
     */
    public function getSampaiTahun()
    {
        return $this->sampai_tahun;
    }

    /**
     * Get the [nominal] column value.
     * 
     * @return string
     */
    public function getNominal()
    {
        return $this->nominal;
    }

    /**
     * Get the [status] column value.
     * 
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [asal_data] column value.
     * 
     * @return string
     */
    public function getAsalData()
    {
        return $this->asal_data;
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
     * Get the [soft_delete] column value.
     * 
     * @return string
     */
    public function getSoftDelete()
    {
        return $this->soft_delete;
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
     * Get the [updater_id] column value.
     * 
     * @return string
     */
    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    /**
     * Set the value of [tunjangan_id] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setTunjanganId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tunjangan_id !== $v) {
            $this->tunjangan_id = $v;
            $this->modifiedColumns[] = TunjanganPeer::TUNJANGAN_ID;
        }


        return $this;
    } // setTunjanganId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = TunjanganPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [jenis_tunjangan_id] column.
     * 
     * @param int $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setJenisTunjanganId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_tunjangan_id !== $v) {
            $this->jenis_tunjangan_id = $v;
            $this->modifiedColumns[] = TunjanganPeer::JENIS_TUNJANGAN_ID;
        }

        if ($this->aJenisTunjangan !== null && $this->aJenisTunjangan->getJenisTunjanganId() !== $v) {
            $this->aJenisTunjangan = null;
        }


        return $this;
    } // setJenisTunjanganId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = TunjanganPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [instansi] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setInstansi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->instansi !== $v) {
            $this->instansi = $v;
            $this->modifiedColumns[] = TunjanganPeer::INSTANSI;
        }


        return $this;
    } // setInstansi()

    /**
     * Set the value of [sk_tunjangan] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setSkTunjangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_tunjangan !== $v) {
            $this->sk_tunjangan = $v;
            $this->modifiedColumns[] = TunjanganPeer::SK_TUNJANGAN;
        }


        return $this;
    } // setSkTunjangan()

    /**
     * Sets the value of [tgl_sk_tunjangan] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setTglSkTunjangan($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_sk_tunjangan !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_sk_tunjangan !== null && $tmpDt = new DateTime($this->tgl_sk_tunjangan)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_sk_tunjangan = $newDateAsString;
                $this->modifiedColumns[] = TunjanganPeer::TGL_SK_TUNJANGAN;
            }
        } // if either are not null


        return $this;
    } // setTglSkTunjangan()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = TunjanganPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [sumber_dana] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setSumberDana($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_dana !== $v) {
            $this->sumber_dana = $v;
            $this->modifiedColumns[] = TunjanganPeer::SUMBER_DANA;
        }


        return $this;
    } // setSumberDana()

    /**
     * Set the value of [dari_tahun] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setDariTahun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dari_tahun !== $v) {
            $this->dari_tahun = $v;
            $this->modifiedColumns[] = TunjanganPeer::DARI_TAHUN;
        }


        return $this;
    } // setDariTahun()

    /**
     * Set the value of [sampai_tahun] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setSampaiTahun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sampai_tahun !== $v) {
            $this->sampai_tahun = $v;
            $this->modifiedColumns[] = TunjanganPeer::SAMPAI_TAHUN;
        }


        return $this;
    } // setSampaiTahun()

    /**
     * Set the value of [nominal] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setNominal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nominal !== $v) {
            $this->nominal = $v;
            $this->modifiedColumns[] = TunjanganPeer::NOMINAL;
        }


        return $this;
    } // setNominal()

    /**
     * Set the value of [status] column.
     * 
     * @param int $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = TunjanganPeer::STATUS;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = TunjanganPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = TunjanganPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = TunjanganPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = TunjanganPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tunjangan The current object (for fluent API support)
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
                $this->modifiedColumns[] = TunjanganPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = TunjanganPeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

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
            if ($this->asal_data !== '1') {
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

            $this->tunjangan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->ptk_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jenis_tunjangan_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->nama = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->instansi = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->sk_tunjangan = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tgl_sk_tunjangan = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->semester_id = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->sumber_dana = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->dari_tahun = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->sampai_tahun = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->nominal = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->status = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->asal_data = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->create_date = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->last_update = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->soft_delete = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->last_sync = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->updater_id = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 19; // 19 = TunjanganPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Tunjangan object", $e);
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

        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aJenisTunjangan !== null && $this->jenis_tunjangan_id !== $this->aJenisTunjangan->getJenisTunjanganId()) {
            $this->aJenisTunjangan = null;
        }
        if ($this->aSemester !== null && $this->semester_id !== $this->aSemester->getSemesterId()) {
            $this->aSemester = null;
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
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TunjanganPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSemester = null;
            $this->aPtk = null;
            $this->aJenisTunjangan = null;
            $this->collVldTunjangans = null;

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
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TunjanganQuery::create()
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
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TunjanganPeer::addInstanceToPool($this);
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

            if ($this->aSemester !== null) {
                if ($this->aSemester->isModified() || $this->aSemester->isNew()) {
                    $affectedRows += $this->aSemester->save($con);
                }
                $this->setSemester($this->aSemester);
            }

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aJenisTunjangan !== null) {
                if ($this->aJenisTunjangan->isModified() || $this->aJenisTunjangan->isNew()) {
                    $affectedRows += $this->aJenisTunjangan->save($con);
                }
                $this->setJenisTunjangan($this->aJenisTunjangan);
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

            if ($this->vldTunjangansScheduledForDeletion !== null) {
                if (!$this->vldTunjangansScheduledForDeletion->isEmpty()) {
                    VldTunjanganQuery::create()
                        ->filterByPrimaryKeys($this->vldTunjangansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldTunjangansScheduledForDeletion = null;
                }
            }

            if ($this->collVldTunjangans !== null) {
                foreach ($this->collVldTunjangans as $referrerFK) {
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
        if ($this->isColumnModified(TunjanganPeer::TUNJANGAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tunjangan_id"';
        }
        if ($this->isColumnModified(TunjanganPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(TunjanganPeer::JENIS_TUNJANGAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_tunjangan_id"';
        }
        if ($this->isColumnModified(TunjanganPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(TunjanganPeer::INSTANSI)) {
            $modifiedColumns[':p' . $index++]  = '"instansi"';
        }
        if ($this->isColumnModified(TunjanganPeer::SK_TUNJANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"sk_tunjangan"';
        }
        if ($this->isColumnModified(TunjanganPeer::TGL_SK_TUNJANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_sk_tunjangan"';
        }
        if ($this->isColumnModified(TunjanganPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(TunjanganPeer::SUMBER_DANA)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_dana"';
        }
        if ($this->isColumnModified(TunjanganPeer::DARI_TAHUN)) {
            $modifiedColumns[':p' . $index++]  = '"dari_tahun"';
        }
        if ($this->isColumnModified(TunjanganPeer::SAMPAI_TAHUN)) {
            $modifiedColumns[':p' . $index++]  = '"sampai_tahun"';
        }
        if ($this->isColumnModified(TunjanganPeer::NOMINAL)) {
            $modifiedColumns[':p' . $index++]  = '"nominal"';
        }
        if ($this->isColumnModified(TunjanganPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '"status"';
        }
        if ($this->isColumnModified(TunjanganPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(TunjanganPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(TunjanganPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(TunjanganPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(TunjanganPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(TunjanganPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "tunjangan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"tunjangan_id"':						
                        $stmt->bindValue($identifier, $this->tunjangan_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_tunjangan_id"':						
                        $stmt->bindValue($identifier, $this->jenis_tunjangan_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"instansi"':						
                        $stmt->bindValue($identifier, $this->instansi, PDO::PARAM_STR);
                        break;
                    case '"sk_tunjangan"':						
                        $stmt->bindValue($identifier, $this->sk_tunjangan, PDO::PARAM_STR);
                        break;
                    case '"tgl_sk_tunjangan"':						
                        $stmt->bindValue($identifier, $this->tgl_sk_tunjangan, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"sumber_dana"':						
                        $stmt->bindValue($identifier, $this->sumber_dana, PDO::PARAM_STR);
                        break;
                    case '"dari_tahun"':						
                        $stmt->bindValue($identifier, $this->dari_tahun, PDO::PARAM_STR);
                        break;
                    case '"sampai_tahun"':						
                        $stmt->bindValue($identifier, $this->sampai_tahun, PDO::PARAM_STR);
                        break;
                    case '"nominal"':						
                        $stmt->bindValue($identifier, $this->nominal, PDO::PARAM_STR);
                        break;
                    case '"status"':						
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"soft_delete"':						
                        $stmt->bindValue($identifier, $this->soft_delete, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                    case '"updater_id"':						
                        $stmt->bindValue($identifier, $this->updater_id, PDO::PARAM_STR);
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

            if ($this->aSemester !== null) {
                if (!$this->aSemester->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSemester->getValidationFailures());
                }
            }

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aJenisTunjangan !== null) {
                if (!$this->aJenisTunjangan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisTunjangan->getValidationFailures());
                }
            }


            if (($retval = TunjanganPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldTunjangans !== null) {
                    foreach ($this->collVldTunjangans as $referrerFK) {
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
        $pos = TunjanganPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTunjanganId();
                break;
            case 1:
                return $this->getPtkId();
                break;
            case 2:
                return $this->getJenisTunjanganId();
                break;
            case 3:
                return $this->getNama();
                break;
            case 4:
                return $this->getInstansi();
                break;
            case 5:
                return $this->getSkTunjangan();
                break;
            case 6:
                return $this->getTglSkTunjangan();
                break;
            case 7:
                return $this->getSemesterId();
                break;
            case 8:
                return $this->getSumberDana();
                break;
            case 9:
                return $this->getDariTahun();
                break;
            case 10:
                return $this->getSampaiTahun();
                break;
            case 11:
                return $this->getNominal();
                break;
            case 12:
                return $this->getStatus();
                break;
            case 13:
                return $this->getAsalData();
                break;
            case 14:
                return $this->getCreateDate();
                break;
            case 15:
                return $this->getLastUpdate();
                break;
            case 16:
                return $this->getSoftDelete();
                break;
            case 17:
                return $this->getLastSync();
                break;
            case 18:
                return $this->getUpdaterId();
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
        if (isset($alreadyDumpedObjects['Tunjangan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tunjangan'][$this->getPrimaryKey()] = true;
        $keys = TunjanganPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTunjanganId(),
            $keys[1] => $this->getPtkId(),
            $keys[2] => $this->getJenisTunjanganId(),
            $keys[3] => $this->getNama(),
            $keys[4] => $this->getInstansi(),
            $keys[5] => $this->getSkTunjangan(),
            $keys[6] => $this->getTglSkTunjangan(),
            $keys[7] => $this->getSemesterId(),
            $keys[8] => $this->getSumberDana(),
            $keys[9] => $this->getDariTahun(),
            $keys[10] => $this->getSampaiTahun(),
            $keys[11] => $this->getNominal(),
            $keys[12] => $this->getStatus(),
            $keys[13] => $this->getAsalData(),
            $keys[14] => $this->getCreateDate(),
            $keys[15] => $this->getLastUpdate(),
            $keys[16] => $this->getSoftDelete(),
            $keys[17] => $this->getLastSync(),
            $keys[18] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisTunjangan) {
                $result['JenisTunjangan'] = $this->aJenisTunjangan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldTunjangans) {
                $result['VldTunjangans'] = $this->collVldTunjangans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TunjanganPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTunjanganId($value);
                break;
            case 1:
                $this->setPtkId($value);
                break;
            case 2:
                $this->setJenisTunjanganId($value);
                break;
            case 3:
                $this->setNama($value);
                break;
            case 4:
                $this->setInstansi($value);
                break;
            case 5:
                $this->setSkTunjangan($value);
                break;
            case 6:
                $this->setTglSkTunjangan($value);
                break;
            case 7:
                $this->setSemesterId($value);
                break;
            case 8:
                $this->setSumberDana($value);
                break;
            case 9:
                $this->setDariTahun($value);
                break;
            case 10:
                $this->setSampaiTahun($value);
                break;
            case 11:
                $this->setNominal($value);
                break;
            case 12:
                $this->setStatus($value);
                break;
            case 13:
                $this->setAsalData($value);
                break;
            case 14:
                $this->setCreateDate($value);
                break;
            case 15:
                $this->setLastUpdate($value);
                break;
            case 16:
                $this->setSoftDelete($value);
                break;
            case 17:
                $this->setLastSync($value);
                break;
            case 18:
                $this->setUpdaterId($value);
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
        $keys = TunjanganPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTunjanganId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPtkId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenisTunjanganId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNama($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setInstansi($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSkTunjangan($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTglSkTunjangan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setSemesterId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSumberDana($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDariTahun($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSampaiTahun($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNominal($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setStatus($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAsalData($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCreateDate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLastUpdate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSoftDelete($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLastSync($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setUpdaterId($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TunjanganPeer::DATABASE_NAME);

        if ($this->isColumnModified(TunjanganPeer::TUNJANGAN_ID)) $criteria->add(TunjanganPeer::TUNJANGAN_ID, $this->tunjangan_id);
        if ($this->isColumnModified(TunjanganPeer::PTK_ID)) $criteria->add(TunjanganPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(TunjanganPeer::JENIS_TUNJANGAN_ID)) $criteria->add(TunjanganPeer::JENIS_TUNJANGAN_ID, $this->jenis_tunjangan_id);
        if ($this->isColumnModified(TunjanganPeer::NAMA)) $criteria->add(TunjanganPeer::NAMA, $this->nama);
        if ($this->isColumnModified(TunjanganPeer::INSTANSI)) $criteria->add(TunjanganPeer::INSTANSI, $this->instansi);
        if ($this->isColumnModified(TunjanganPeer::SK_TUNJANGAN)) $criteria->add(TunjanganPeer::SK_TUNJANGAN, $this->sk_tunjangan);
        if ($this->isColumnModified(TunjanganPeer::TGL_SK_TUNJANGAN)) $criteria->add(TunjanganPeer::TGL_SK_TUNJANGAN, $this->tgl_sk_tunjangan);
        if ($this->isColumnModified(TunjanganPeer::SEMESTER_ID)) $criteria->add(TunjanganPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(TunjanganPeer::SUMBER_DANA)) $criteria->add(TunjanganPeer::SUMBER_DANA, $this->sumber_dana);
        if ($this->isColumnModified(TunjanganPeer::DARI_TAHUN)) $criteria->add(TunjanganPeer::DARI_TAHUN, $this->dari_tahun);
        if ($this->isColumnModified(TunjanganPeer::SAMPAI_TAHUN)) $criteria->add(TunjanganPeer::SAMPAI_TAHUN, $this->sampai_tahun);
        if ($this->isColumnModified(TunjanganPeer::NOMINAL)) $criteria->add(TunjanganPeer::NOMINAL, $this->nominal);
        if ($this->isColumnModified(TunjanganPeer::STATUS)) $criteria->add(TunjanganPeer::STATUS, $this->status);
        if ($this->isColumnModified(TunjanganPeer::ASAL_DATA)) $criteria->add(TunjanganPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(TunjanganPeer::CREATE_DATE)) $criteria->add(TunjanganPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(TunjanganPeer::LAST_UPDATE)) $criteria->add(TunjanganPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(TunjanganPeer::SOFT_DELETE)) $criteria->add(TunjanganPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(TunjanganPeer::LAST_SYNC)) $criteria->add(TunjanganPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(TunjanganPeer::UPDATER_ID)) $criteria->add(TunjanganPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(TunjanganPeer::DATABASE_NAME);
        $criteria->add(TunjanganPeer::TUNJANGAN_ID, $this->tunjangan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getTunjanganId();
    }

    /**
     * Generic method to set the primary key (tunjangan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTunjanganId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTunjanganId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Tunjangan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setJenisTunjanganId($this->getJenisTunjanganId());
        $copyObj->setNama($this->getNama());
        $copyObj->setInstansi($this->getInstansi());
        $copyObj->setSkTunjangan($this->getSkTunjangan());
        $copyObj->setTglSkTunjangan($this->getTglSkTunjangan());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setSumberDana($this->getSumberDana());
        $copyObj->setDariTahun($this->getDariTahun());
        $copyObj->setSampaiTahun($this->getSampaiTahun());
        $copyObj->setNominal($this->getNominal());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getVldTunjangans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldTunjangan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTunjanganId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Tunjangan Clone of current object.
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
     * @return TunjanganPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TunjanganPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return Tunjangan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSemester(Semester $v = null)
    {
        if ($v === null) {
            $this->setSemesterId(NULL);
        } else {
            $this->setSemesterId($v->getSemesterId());
        }

        $this->aSemester = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Semester object, it will not be re-added.
        if ($v !== null) {
            $v->addTunjangan($this);
        }


        return $this;
    }


    /**
     * Get the associated Semester object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Semester The associated Semester object.
     * @throws PropelException
     */
    public function getSemester(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSemester === null && (($this->semester_id !== "" && $this->semester_id !== null)) && $doQuery) {
            $this->aSemester = SemesterQuery::create()->findPk($this->semester_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSemester->addTunjangans($this);
             */
        }

        return $this->aSemester;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return Tunjangan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPtk(Ptk $v = null)
    {
        if ($v === null) {
            $this->setPtkId(NULL);
        } else {
            $this->setPtkId($v->getPtkId());
        }

        $this->aPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ptk object, it will not be re-added.
        if ($v !== null) {
            $v->addTunjangan($this);
        }


        return $this;
    }


    /**
     * Get the associated Ptk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ptk The associated Ptk object.
     * @throws PropelException
     */
    public function getPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPtk === null && (($this->ptk_id !== "" && $this->ptk_id !== null)) && $doQuery) {
            $this->aPtk = PtkQuery::create()->findPk($this->ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPtk->addTunjangans($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a JenisTunjangan object.
     *
     * @param             JenisTunjangan $v
     * @return Tunjangan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisTunjangan(JenisTunjangan $v = null)
    {
        if ($v === null) {
            $this->setJenisTunjanganId(NULL);
        } else {
            $this->setJenisTunjanganId($v->getJenisTunjanganId());
        }

        $this->aJenisTunjangan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisTunjangan object, it will not be re-added.
        if ($v !== null) {
            $v->addTunjangan($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisTunjangan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisTunjangan The associated JenisTunjangan object.
     * @throws PropelException
     */
    public function getJenisTunjangan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisTunjangan === null && ($this->jenis_tunjangan_id !== null) && $doQuery) {
            $this->aJenisTunjangan = JenisTunjanganQuery::create()->findPk($this->jenis_tunjangan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisTunjangan->addTunjangans($this);
             */
        }

        return $this->aJenisTunjangan;
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
        if ('VldTunjangan' == $relationName) {
            $this->initVldTunjangans();
        }
    }

    /**
     * Clears out the collVldTunjangans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Tunjangan The current object (for fluent API support)
     * @see        addVldTunjangans()
     */
    public function clearVldTunjangans()
    {
        $this->collVldTunjangans = null; // important to set this to null since that means it is uninitialized
        $this->collVldTunjangansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldTunjangans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldTunjangans($v = true)
    {
        $this->collVldTunjangansPartial = $v;
    }

    /**
     * Initializes the collVldTunjangans collection.
     *
     * By default this just sets the collVldTunjangans collection to an empty array (like clearcollVldTunjangans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldTunjangans($overrideExisting = true)
    {
        if (null !== $this->collVldTunjangans && !$overrideExisting) {
            return;
        }
        $this->collVldTunjangans = new PropelObjectCollection();
        $this->collVldTunjangans->setModel('VldTunjangan');
    }

    /**
     * Gets an array of VldTunjangan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tunjangan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldTunjangan[] List of VldTunjangan objects
     * @throws PropelException
     */
    public function getVldTunjangans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldTunjangansPartial && !$this->isNew();
        if (null === $this->collVldTunjangans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldTunjangans) {
                // return empty collection
                $this->initVldTunjangans();
            } else {
                $collVldTunjangans = VldTunjanganQuery::create(null, $criteria)
                    ->filterByTunjangan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldTunjangansPartial && count($collVldTunjangans)) {
                      $this->initVldTunjangans(false);

                      foreach($collVldTunjangans as $obj) {
                        if (false == $this->collVldTunjangans->contains($obj)) {
                          $this->collVldTunjangans->append($obj);
                        }
                      }

                      $this->collVldTunjangansPartial = true;
                    }

                    $collVldTunjangans->getInternalIterator()->rewind();
                    return $collVldTunjangans;
                }

                if($partial && $this->collVldTunjangans) {
                    foreach($this->collVldTunjangans as $obj) {
                        if($obj->isNew()) {
                            $collVldTunjangans[] = $obj;
                        }
                    }
                }

                $this->collVldTunjangans = $collVldTunjangans;
                $this->collVldTunjangansPartial = false;
            }
        }

        return $this->collVldTunjangans;
    }

    /**
     * Sets a collection of VldTunjangan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldTunjangans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Tunjangan The current object (for fluent API support)
     */
    public function setVldTunjangans(PropelCollection $vldTunjangans, PropelPDO $con = null)
    {
        $vldTunjangansToDelete = $this->getVldTunjangans(new Criteria(), $con)->diff($vldTunjangans);

        $this->vldTunjangansScheduledForDeletion = unserialize(serialize($vldTunjangansToDelete));

        foreach ($vldTunjangansToDelete as $vldTunjanganRemoved) {
            $vldTunjanganRemoved->setTunjangan(null);
        }

        $this->collVldTunjangans = null;
        foreach ($vldTunjangans as $vldTunjangan) {
            $this->addVldTunjangan($vldTunjangan);
        }

        $this->collVldTunjangans = $vldTunjangans;
        $this->collVldTunjangansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldTunjangan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldTunjangan objects.
     * @throws PropelException
     */
    public function countVldTunjangans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldTunjangansPartial && !$this->isNew();
        if (null === $this->collVldTunjangans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldTunjangans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldTunjangans());
            }
            $query = VldTunjanganQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTunjangan($this)
                ->count($con);
        }

        return count($this->collVldTunjangans);
    }

    /**
     * Method called to associate a VldTunjangan object to this object
     * through the VldTunjangan foreign key attribute.
     *
     * @param    VldTunjangan $l VldTunjangan
     * @return Tunjangan The current object (for fluent API support)
     */
    public function addVldTunjangan(VldTunjangan $l)
    {
        if ($this->collVldTunjangans === null) {
            $this->initVldTunjangans();
            $this->collVldTunjangansPartial = true;
        }
        if (!in_array($l, $this->collVldTunjangans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldTunjangan($l);
        }

        return $this;
    }

    /**
     * @param	VldTunjangan $vldTunjangan The vldTunjangan object to add.
     */
    protected function doAddVldTunjangan($vldTunjangan)
    {
        $this->collVldTunjangans[]= $vldTunjangan;
        $vldTunjangan->setTunjangan($this);
    }

    /**
     * @param	VldTunjangan $vldTunjangan The vldTunjangan object to remove.
     * @return Tunjangan The current object (for fluent API support)
     */
    public function removeVldTunjangan($vldTunjangan)
    {
        if ($this->getVldTunjangans()->contains($vldTunjangan)) {
            $this->collVldTunjangans->remove($this->collVldTunjangans->search($vldTunjangan));
            if (null === $this->vldTunjangansScheduledForDeletion) {
                $this->vldTunjangansScheduledForDeletion = clone $this->collVldTunjangans;
                $this->vldTunjangansScheduledForDeletion->clear();
            }
            $this->vldTunjangansScheduledForDeletion[]= clone $vldTunjangan;
            $vldTunjangan->setTunjangan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tunjangan is new, it will return
     * an empty collection; or if this Tunjangan has previously
     * been saved, it will retrieve related VldTunjangans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tunjangan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldTunjangan[] List of VldTunjangan objects
     */
    public function getVldTunjangansJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldTunjanganQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldTunjangans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->tunjangan_id = null;
        $this->ptk_id = null;
        $this->jenis_tunjangan_id = null;
        $this->nama = null;
        $this->instansi = null;
        $this->sk_tunjangan = null;
        $this->tgl_sk_tunjangan = null;
        $this->semester_id = null;
        $this->sumber_dana = null;
        $this->dari_tahun = null;
        $this->sampai_tahun = null;
        $this->nominal = null;
        $this->status = null;
        $this->asal_data = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->soft_delete = null;
        $this->last_sync = null;
        $this->updater_id = null;
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
            if ($this->collVldTunjangans) {
                foreach ($this->collVldTunjangans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aJenisTunjangan instanceof Persistent) {
              $this->aJenisTunjangan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldTunjangans instanceof PropelCollection) {
            $this->collVldTunjangans->clearIterator();
        }
        $this->collVldTunjangans = null;
        $this->aSemester = null;
        $this->aPtk = null;
        $this->aJenisTunjangan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TunjanganPeer::DEFAULT_STRING_FORMAT);
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
