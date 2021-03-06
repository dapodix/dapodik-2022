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
use DataDikdas\Model\JenisPtk;
use DataDikdas\Model\JenisPtkPeer;
use DataDikdas\Model\JenisPtkQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyKerjaQuery;

/**
 * Base class that represents a row from the 'ref.jenis_ptk' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisPtk extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenisPtkPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenisPtkPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenis_ptk_id field.
     * @var        string
     */
    protected $jenis_ptk_id;

    /**
     * The value for the jenis_ptk field.
     * @var        string
     */
    protected $jenis_ptk;

    /**
     * The value for the guru_kelas field.
     * @var        string
     */
    protected $guru_kelas;

    /**
     * The value for the guru_matpel field.
     * @var        string
     */
    protected $guru_matpel;

    /**
     * The value for the guru_bk field.
     * @var        string
     */
    protected $guru_bk;

    /**
     * The value for the guru_inklusi field.
     * @var        string
     */
    protected $guru_inklusi;

    /**
     * The value for the guru_pengganti field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $guru_pengganti;

    /**
     * The value for the pengawas_satdik field.
     * @var        string
     */
    protected $pengawas_satdik;

    /**
     * The value for the pengawas_plb field.
     * @var        string
     */
    protected $pengawas_plb;

    /**
     * The value for the pengawas_matpel field.
     * @var        string
     */
    protected $pengawas_matpel;

    /**
     * The value for the pengawas_bidang field.
     * @var        string
     */
    protected $pengawas_bidang;

    /**
     * The value for the tas field.
     * @var        string
     */
    protected $tas;

    /**
     * The value for the tendik_lainnya field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $tendik_lainnya;

    /**
     * The value for the formal field.
     * @var        string
     */
    protected $formal;

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
     * @var        PropelObjectCollection|Ptk[] Collection to store aggregation of Ptk objects.
     */
    protected $collPtks;
    protected $collPtksPartial;

    /**
     * @var        PropelObjectCollection|RwyKerja[] Collection to store aggregation of RwyKerja objects.
     */
    protected $collRwyKerjas;
    protected $collRwyKerjasPartial;

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
    protected $ptksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyKerjasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->guru_pengganti = '0';
        $this->tendik_lainnya = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJenisPtk object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jenis_ptk_id] column value.
     * 
     * @return string
     */
    public function getJenisPtkId()
    {
        return $this->jenis_ptk_id;
    }

    /**
     * Get the [jenis_ptk] column value.
     * 
     * @return string
     */
    public function getJenisPtk()
    {
        return $this->jenis_ptk;
    }

    /**
     * Get the [guru_kelas] column value.
     * 
     * @return string
     */
    public function getGuruKelas()
    {
        return $this->guru_kelas;
    }

    /**
     * Get the [guru_matpel] column value.
     * 
     * @return string
     */
    public function getGuruMatpel()
    {
        return $this->guru_matpel;
    }

    /**
     * Get the [guru_bk] column value.
     * 
     * @return string
     */
    public function getGuruBk()
    {
        return $this->guru_bk;
    }

    /**
     * Get the [guru_inklusi] column value.
     * 
     * @return string
     */
    public function getGuruInklusi()
    {
        return $this->guru_inklusi;
    }

    /**
     * Get the [guru_pengganti] column value.
     * 
     * @return string
     */
    public function getGuruPengganti()
    {
        return $this->guru_pengganti;
    }

    /**
     * Get the [pengawas_satdik] column value.
     * 
     * @return string
     */
    public function getPengawasSatdik()
    {
        return $this->pengawas_satdik;
    }

    /**
     * Get the [pengawas_plb] column value.
     * 
     * @return string
     */
    public function getPengawasPlb()
    {
        return $this->pengawas_plb;
    }

    /**
     * Get the [pengawas_matpel] column value.
     * 
     * @return string
     */
    public function getPengawasMatpel()
    {
        return $this->pengawas_matpel;
    }

    /**
     * Get the [pengawas_bidang] column value.
     * 
     * @return string
     */
    public function getPengawasBidang()
    {
        return $this->pengawas_bidang;
    }

    /**
     * Get the [tas] column value.
     * 
     * @return string
     */
    public function getTas()
    {
        return $this->tas;
    }

    /**
     * Get the [tendik_lainnya] column value.
     * 
     * @return string
     */
    public function getTendikLainnya()
    {
        return $this->tendik_lainnya;
    }

    /**
     * Get the [formal] column value.
     * 
     * @return string
     */
    public function getFormal()
    {
        return $this->formal;
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
     * Set the value of [jenis_ptk_id] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setJenisPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_ptk_id !== $v) {
            $this->jenis_ptk_id = $v;
            $this->modifiedColumns[] = JenisPtkPeer::JENIS_PTK_ID;
        }


        return $this;
    } // setJenisPtkId()

    /**
     * Set the value of [jenis_ptk] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setJenisPtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_ptk !== $v) {
            $this->jenis_ptk = $v;
            $this->modifiedColumns[] = JenisPtkPeer::JENIS_PTK;
        }


        return $this;
    } // setJenisPtk()

    /**
     * Set the value of [guru_kelas] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setGuruKelas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->guru_kelas !== $v) {
            $this->guru_kelas = $v;
            $this->modifiedColumns[] = JenisPtkPeer::GURU_KELAS;
        }


        return $this;
    } // setGuruKelas()

    /**
     * Set the value of [guru_matpel] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setGuruMatpel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->guru_matpel !== $v) {
            $this->guru_matpel = $v;
            $this->modifiedColumns[] = JenisPtkPeer::GURU_MATPEL;
        }


        return $this;
    } // setGuruMatpel()

    /**
     * Set the value of [guru_bk] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setGuruBk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->guru_bk !== $v) {
            $this->guru_bk = $v;
            $this->modifiedColumns[] = JenisPtkPeer::GURU_BK;
        }


        return $this;
    } // setGuruBk()

    /**
     * Set the value of [guru_inklusi] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setGuruInklusi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->guru_inklusi !== $v) {
            $this->guru_inklusi = $v;
            $this->modifiedColumns[] = JenisPtkPeer::GURU_INKLUSI;
        }


        return $this;
    } // setGuruInklusi()

    /**
     * Set the value of [guru_pengganti] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setGuruPengganti($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->guru_pengganti !== $v) {
            $this->guru_pengganti = $v;
            $this->modifiedColumns[] = JenisPtkPeer::GURU_PENGGANTI;
        }


        return $this;
    } // setGuruPengganti()

    /**
     * Set the value of [pengawas_satdik] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setPengawasSatdik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pengawas_satdik !== $v) {
            $this->pengawas_satdik = $v;
            $this->modifiedColumns[] = JenisPtkPeer::PENGAWAS_SATDIK;
        }


        return $this;
    } // setPengawasSatdik()

    /**
     * Set the value of [pengawas_plb] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setPengawasPlb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pengawas_plb !== $v) {
            $this->pengawas_plb = $v;
            $this->modifiedColumns[] = JenisPtkPeer::PENGAWAS_PLB;
        }


        return $this;
    } // setPengawasPlb()

    /**
     * Set the value of [pengawas_matpel] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setPengawasMatpel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pengawas_matpel !== $v) {
            $this->pengawas_matpel = $v;
            $this->modifiedColumns[] = JenisPtkPeer::PENGAWAS_MATPEL;
        }


        return $this;
    } // setPengawasMatpel()

    /**
     * Set the value of [pengawas_bidang] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setPengawasBidang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pengawas_bidang !== $v) {
            $this->pengawas_bidang = $v;
            $this->modifiedColumns[] = JenisPtkPeer::PENGAWAS_BIDANG;
        }


        return $this;
    } // setPengawasBidang()

    /**
     * Set the value of [tas] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setTas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tas !== $v) {
            $this->tas = $v;
            $this->modifiedColumns[] = JenisPtkPeer::TAS;
        }


        return $this;
    } // setTas()

    /**
     * Set the value of [tendik_lainnya] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setTendikLainnya($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tendik_lainnya !== $v) {
            $this->tendik_lainnya = $v;
            $this->modifiedColumns[] = JenisPtkPeer::TENDIK_LAINNYA;
        }


        return $this;
    } // setTendikLainnya()

    /**
     * Set the value of [formal] column.
     * 
     * @param string $v new value
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setFormal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->formal !== $v) {
            $this->formal = $v;
            $this->modifiedColumns[] = JenisPtkPeer::FORMAL;
        }


        return $this;
    } // setFormal()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenisPtkPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenisPtkPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenisPtkPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPtk The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenisPtkPeer::LAST_SYNC;
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
            if ($this->guru_pengganti !== '0') {
                return false;
            }

            if ($this->tendik_lainnya !== '0') {
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

            $this->jenis_ptk_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_ptk = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->guru_kelas = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->guru_matpel = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->guru_bk = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->guru_inklusi = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->guru_pengganti = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->pengawas_satdik = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->pengawas_plb = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->pengawas_matpel = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->pengawas_bidang = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->tas = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->tendik_lainnya = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->formal = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->create_date = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->last_update = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->expired_date = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->last_sync = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 18; // 18 = JenisPtkPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenisPtk object", $e);
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
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenisPtkPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPtks = null;

            $this->collRwyKerjas = null;

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
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenisPtkQuery::create()
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
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenisPtkPeer::addInstanceToPool($this);
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

            if ($this->ptksScheduledForDeletion !== null) {
                if (!$this->ptksScheduledForDeletion->isEmpty()) {
                    PtkQuery::create()
                        ->filterByPrimaryKeys($this->ptksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->rwyKerjasScheduledForDeletion !== null) {
                if (!$this->rwyKerjasScheduledForDeletion->isEmpty()) {
                    RwyKerjaQuery::create()
                        ->filterByPrimaryKeys($this->rwyKerjasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyKerjasScheduledForDeletion = null;
                }
            }

            if ($this->collRwyKerjas !== null) {
                foreach ($this->collRwyKerjas as $referrerFK) {
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
        if ($this->isColumnModified(JenisPtkPeer::JENIS_PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_ptk_id"';
        }
        if ($this->isColumnModified(JenisPtkPeer::JENIS_PTK)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_ptk"';
        }
        if ($this->isColumnModified(JenisPtkPeer::GURU_KELAS)) {
            $modifiedColumns[':p' . $index++]  = '"guru_kelas"';
        }
        if ($this->isColumnModified(JenisPtkPeer::GURU_MATPEL)) {
            $modifiedColumns[':p' . $index++]  = '"guru_matpel"';
        }
        if ($this->isColumnModified(JenisPtkPeer::GURU_BK)) {
            $modifiedColumns[':p' . $index++]  = '"guru_bk"';
        }
        if ($this->isColumnModified(JenisPtkPeer::GURU_INKLUSI)) {
            $modifiedColumns[':p' . $index++]  = '"guru_inklusi"';
        }
        if ($this->isColumnModified(JenisPtkPeer::GURU_PENGGANTI)) {
            $modifiedColumns[':p' . $index++]  = '"guru_pengganti"';
        }
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_SATDIK)) {
            $modifiedColumns[':p' . $index++]  = '"pengawas_satdik"';
        }
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_PLB)) {
            $modifiedColumns[':p' . $index++]  = '"pengawas_plb"';
        }
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_MATPEL)) {
            $modifiedColumns[':p' . $index++]  = '"pengawas_matpel"';
        }
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_BIDANG)) {
            $modifiedColumns[':p' . $index++]  = '"pengawas_bidang"';
        }
        if ($this->isColumnModified(JenisPtkPeer::TAS)) {
            $modifiedColumns[':p' . $index++]  = '"tas"';
        }
        if ($this->isColumnModified(JenisPtkPeer::TENDIK_LAINNYA)) {
            $modifiedColumns[':p' . $index++]  = '"tendik_lainnya"';
        }
        if ($this->isColumnModified(JenisPtkPeer::FORMAL)) {
            $modifiedColumns[':p' . $index++]  = '"formal"';
        }
        if ($this->isColumnModified(JenisPtkPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenisPtkPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenisPtkPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenisPtkPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenis_ptk" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenis_ptk_id"':						
                        $stmt->bindValue($identifier, $this->jenis_ptk_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_ptk"':						
                        $stmt->bindValue($identifier, $this->jenis_ptk, PDO::PARAM_STR);
                        break;
                    case '"guru_kelas"':						
                        $stmt->bindValue($identifier, $this->guru_kelas, PDO::PARAM_STR);
                        break;
                    case '"guru_matpel"':						
                        $stmt->bindValue($identifier, $this->guru_matpel, PDO::PARAM_STR);
                        break;
                    case '"guru_bk"':						
                        $stmt->bindValue($identifier, $this->guru_bk, PDO::PARAM_STR);
                        break;
                    case '"guru_inklusi"':						
                        $stmt->bindValue($identifier, $this->guru_inklusi, PDO::PARAM_STR);
                        break;
                    case '"guru_pengganti"':						
                        $stmt->bindValue($identifier, $this->guru_pengganti, PDO::PARAM_STR);
                        break;
                    case '"pengawas_satdik"':						
                        $stmt->bindValue($identifier, $this->pengawas_satdik, PDO::PARAM_STR);
                        break;
                    case '"pengawas_plb"':						
                        $stmt->bindValue($identifier, $this->pengawas_plb, PDO::PARAM_STR);
                        break;
                    case '"pengawas_matpel"':						
                        $stmt->bindValue($identifier, $this->pengawas_matpel, PDO::PARAM_STR);
                        break;
                    case '"pengawas_bidang"':						
                        $stmt->bindValue($identifier, $this->pengawas_bidang, PDO::PARAM_STR);
                        break;
                    case '"tas"':						
                        $stmt->bindValue($identifier, $this->tas, PDO::PARAM_STR);
                        break;
                    case '"tendik_lainnya"':						
                        $stmt->bindValue($identifier, $this->tendik_lainnya, PDO::PARAM_STR);
                        break;
                    case '"formal"':						
                        $stmt->bindValue($identifier, $this->formal, PDO::PARAM_STR);
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


            if (($retval = JenisPtkPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPtks !== null) {
                    foreach ($this->collPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyKerjas !== null) {
                    foreach ($this->collRwyKerjas as $referrerFK) {
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
        $pos = JenisPtkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenisPtkId();
                break;
            case 1:
                return $this->getJenisPtk();
                break;
            case 2:
                return $this->getGuruKelas();
                break;
            case 3:
                return $this->getGuruMatpel();
                break;
            case 4:
                return $this->getGuruBk();
                break;
            case 5:
                return $this->getGuruInklusi();
                break;
            case 6:
                return $this->getGuruPengganti();
                break;
            case 7:
                return $this->getPengawasSatdik();
                break;
            case 8:
                return $this->getPengawasPlb();
                break;
            case 9:
                return $this->getPengawasMatpel();
                break;
            case 10:
                return $this->getPengawasBidang();
                break;
            case 11:
                return $this->getTas();
                break;
            case 12:
                return $this->getTendikLainnya();
                break;
            case 13:
                return $this->getFormal();
                break;
            case 14:
                return $this->getCreateDate();
                break;
            case 15:
                return $this->getLastUpdate();
                break;
            case 16:
                return $this->getExpiredDate();
                break;
            case 17:
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
        if (isset($alreadyDumpedObjects['JenisPtk'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenisPtk'][$this->getPrimaryKey()] = true;
        $keys = JenisPtkPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenisPtkId(),
            $keys[1] => $this->getJenisPtk(),
            $keys[2] => $this->getGuruKelas(),
            $keys[3] => $this->getGuruMatpel(),
            $keys[4] => $this->getGuruBk(),
            $keys[5] => $this->getGuruInklusi(),
            $keys[6] => $this->getGuruPengganti(),
            $keys[7] => $this->getPengawasSatdik(),
            $keys[8] => $this->getPengawasPlb(),
            $keys[9] => $this->getPengawasMatpel(),
            $keys[10] => $this->getPengawasBidang(),
            $keys[11] => $this->getTas(),
            $keys[12] => $this->getTendikLainnya(),
            $keys[13] => $this->getFormal(),
            $keys[14] => $this->getCreateDate(),
            $keys[15] => $this->getLastUpdate(),
            $keys[16] => $this->getExpiredDate(),
            $keys[17] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPtks) {
                $result['Ptks'] = $this->collPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyKerjas) {
                $result['RwyKerjas'] = $this->collRwyKerjas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenisPtkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenisPtkId($value);
                break;
            case 1:
                $this->setJenisPtk($value);
                break;
            case 2:
                $this->setGuruKelas($value);
                break;
            case 3:
                $this->setGuruMatpel($value);
                break;
            case 4:
                $this->setGuruBk($value);
                break;
            case 5:
                $this->setGuruInklusi($value);
                break;
            case 6:
                $this->setGuruPengganti($value);
                break;
            case 7:
                $this->setPengawasSatdik($value);
                break;
            case 8:
                $this->setPengawasPlb($value);
                break;
            case 9:
                $this->setPengawasMatpel($value);
                break;
            case 10:
                $this->setPengawasBidang($value);
                break;
            case 11:
                $this->setTas($value);
                break;
            case 12:
                $this->setTendikLainnya($value);
                break;
            case 13:
                $this->setFormal($value);
                break;
            case 14:
                $this->setCreateDate($value);
                break;
            case 15:
                $this->setLastUpdate($value);
                break;
            case 16:
                $this->setExpiredDate($value);
                break;
            case 17:
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
        $keys = JenisPtkPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenisPtkId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisPtk($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setGuruKelas($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setGuruMatpel($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setGuruBk($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setGuruInklusi($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setGuruPengganti($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPengawasSatdik($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPengawasPlb($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPengawasMatpel($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setPengawasBidang($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTas($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTendikLainnya($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setFormal($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCreateDate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLastUpdate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setExpiredDate($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLastSync($arr[$keys[17]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JenisPtkPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenisPtkPeer::JENIS_PTK_ID)) $criteria->add(JenisPtkPeer::JENIS_PTK_ID, $this->jenis_ptk_id);
        if ($this->isColumnModified(JenisPtkPeer::JENIS_PTK)) $criteria->add(JenisPtkPeer::JENIS_PTK, $this->jenis_ptk);
        if ($this->isColumnModified(JenisPtkPeer::GURU_KELAS)) $criteria->add(JenisPtkPeer::GURU_KELAS, $this->guru_kelas);
        if ($this->isColumnModified(JenisPtkPeer::GURU_MATPEL)) $criteria->add(JenisPtkPeer::GURU_MATPEL, $this->guru_matpel);
        if ($this->isColumnModified(JenisPtkPeer::GURU_BK)) $criteria->add(JenisPtkPeer::GURU_BK, $this->guru_bk);
        if ($this->isColumnModified(JenisPtkPeer::GURU_INKLUSI)) $criteria->add(JenisPtkPeer::GURU_INKLUSI, $this->guru_inklusi);
        if ($this->isColumnModified(JenisPtkPeer::GURU_PENGGANTI)) $criteria->add(JenisPtkPeer::GURU_PENGGANTI, $this->guru_pengganti);
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_SATDIK)) $criteria->add(JenisPtkPeer::PENGAWAS_SATDIK, $this->pengawas_satdik);
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_PLB)) $criteria->add(JenisPtkPeer::PENGAWAS_PLB, $this->pengawas_plb);
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_MATPEL)) $criteria->add(JenisPtkPeer::PENGAWAS_MATPEL, $this->pengawas_matpel);
        if ($this->isColumnModified(JenisPtkPeer::PENGAWAS_BIDANG)) $criteria->add(JenisPtkPeer::PENGAWAS_BIDANG, $this->pengawas_bidang);
        if ($this->isColumnModified(JenisPtkPeer::TAS)) $criteria->add(JenisPtkPeer::TAS, $this->tas);
        if ($this->isColumnModified(JenisPtkPeer::TENDIK_LAINNYA)) $criteria->add(JenisPtkPeer::TENDIK_LAINNYA, $this->tendik_lainnya);
        if ($this->isColumnModified(JenisPtkPeer::FORMAL)) $criteria->add(JenisPtkPeer::FORMAL, $this->formal);
        if ($this->isColumnModified(JenisPtkPeer::CREATE_DATE)) $criteria->add(JenisPtkPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenisPtkPeer::LAST_UPDATE)) $criteria->add(JenisPtkPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenisPtkPeer::EXPIRED_DATE)) $criteria->add(JenisPtkPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenisPtkPeer::LAST_SYNC)) $criteria->add(JenisPtkPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenisPtkPeer::DATABASE_NAME);
        $criteria->add(JenisPtkPeer::JENIS_PTK_ID, $this->jenis_ptk_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJenisPtkId();
    }

    /**
     * Generic method to set the primary key (jenis_ptk_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenisPtkId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenisPtkId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenisPtk (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisPtk($this->getJenisPtk());
        $copyObj->setGuruKelas($this->getGuruKelas());
        $copyObj->setGuruMatpel($this->getGuruMatpel());
        $copyObj->setGuruBk($this->getGuruBk());
        $copyObj->setGuruInklusi($this->getGuruInklusi());
        $copyObj->setGuruPengganti($this->getGuruPengganti());
        $copyObj->setPengawasSatdik($this->getPengawasSatdik());
        $copyObj->setPengawasPlb($this->getPengawasPlb());
        $copyObj->setPengawasMatpel($this->getPengawasMatpel());
        $copyObj->setPengawasBidang($this->getPengawasBidang());
        $copyObj->setTas($this->getTas());
        $copyObj->setTendikLainnya($this->getTendikLainnya());
        $copyObj->setFormal($this->getFormal());
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

            foreach ($this->getPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyKerjas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyKerja($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenisPtkId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenisPtk Clone of current object.
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
     * @return JenisPtkPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenisPtkPeer();
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
        if ('Ptk' == $relationName) {
            $this->initPtks();
        }
        if ('RwyKerja' == $relationName) {
            $this->initRwyKerjas();
        }
    }

    /**
     * Clears out the collPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisPtk The current object (for fluent API support)
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
     * If this JenisPtk is new, it will return
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
                    ->filterByJenisPtk($this)
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
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setPtks(PropelCollection $ptks, PropelPDO $con = null)
    {
        $ptksToDelete = $this->getPtks(new Criteria(), $con)->diff($ptks);

        $this->ptksScheduledForDeletion = unserialize(serialize($ptksToDelete));

        foreach ($ptksToDelete as $ptkRemoved) {
            $ptkRemoved->setJenisPtk(null);
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
                ->filterByJenisPtk($this)
                ->count($con);
        }

        return count($this->collPtks);
    }

    /**
     * Method called to associate a Ptk object to this object
     * through the Ptk foreign key attribute.
     *
     * @param    Ptk $l Ptk
     * @return JenisPtk The current object (for fluent API support)
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
        $ptk->setJenisPtk($this);
    }

    /**
     * @param	Ptk $ptk The ptk object to remove.
     * @return JenisPtk The current object (for fluent API support)
     */
    public function removePtk($ptk)
    {
        if ($this->getPtks()->contains($ptk)) {
            $this->collPtks->remove($this->collPtks->search($ptk));
            if (null === $this->ptksScheduledForDeletion) {
                $this->ptksScheduledForDeletion = clone $this->collPtks;
                $this->ptksScheduledForDeletion->clear();
            }
            $this->ptksScheduledForDeletion[]= clone $ptk;
            $ptk->setJenisPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinPangkatGolongan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('PangkatGolongan', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
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
     * Clears out the collRwyKerjas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisPtk The current object (for fluent API support)
     * @see        addRwyKerjas()
     */
    public function clearRwyKerjas()
    {
        $this->collRwyKerjas = null; // important to set this to null since that means it is uninitialized
        $this->collRwyKerjasPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyKerjas collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyKerjas($v = true)
    {
        $this->collRwyKerjasPartial = $v;
    }

    /**
     * Initializes the collRwyKerjas collection.
     *
     * By default this just sets the collRwyKerjas collection to an empty array (like clearcollRwyKerjas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyKerjas($overrideExisting = true)
    {
        if (null !== $this->collRwyKerjas && !$overrideExisting) {
            return;
        }
        $this->collRwyKerjas = new PropelObjectCollection();
        $this->collRwyKerjas->setModel('RwyKerja');
    }

    /**
     * Gets an array of RwyKerja objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisPtk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     * @throws PropelException
     */
    public function getRwyKerjas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyKerjasPartial && !$this->isNew();
        if (null === $this->collRwyKerjas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyKerjas) {
                // return empty collection
                $this->initRwyKerjas();
            } else {
                $collRwyKerjas = RwyKerjaQuery::create(null, $criteria)
                    ->filterByJenisPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyKerjasPartial && count($collRwyKerjas)) {
                      $this->initRwyKerjas(false);

                      foreach($collRwyKerjas as $obj) {
                        if (false == $this->collRwyKerjas->contains($obj)) {
                          $this->collRwyKerjas->append($obj);
                        }
                      }

                      $this->collRwyKerjasPartial = true;
                    }

                    $collRwyKerjas->getInternalIterator()->rewind();
                    return $collRwyKerjas;
                }

                if($partial && $this->collRwyKerjas) {
                    foreach($this->collRwyKerjas as $obj) {
                        if($obj->isNew()) {
                            $collRwyKerjas[] = $obj;
                        }
                    }
                }

                $this->collRwyKerjas = $collRwyKerjas;
                $this->collRwyKerjasPartial = false;
            }
        }

        return $this->collRwyKerjas;
    }

    /**
     * Sets a collection of RwyKerja objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyKerjas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisPtk The current object (for fluent API support)
     */
    public function setRwyKerjas(PropelCollection $rwyKerjas, PropelPDO $con = null)
    {
        $rwyKerjasToDelete = $this->getRwyKerjas(new Criteria(), $con)->diff($rwyKerjas);

        $this->rwyKerjasScheduledForDeletion = unserialize(serialize($rwyKerjasToDelete));

        foreach ($rwyKerjasToDelete as $rwyKerjaRemoved) {
            $rwyKerjaRemoved->setJenisPtk(null);
        }

        $this->collRwyKerjas = null;
        foreach ($rwyKerjas as $rwyKerja) {
            $this->addRwyKerja($rwyKerja);
        }

        $this->collRwyKerjas = $rwyKerjas;
        $this->collRwyKerjasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyKerja objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyKerja objects.
     * @throws PropelException
     */
    public function countRwyKerjas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyKerjasPartial && !$this->isNew();
        if (null === $this->collRwyKerjas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyKerjas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyKerjas());
            }
            $query = RwyKerjaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisPtk($this)
                ->count($con);
        }

        return count($this->collRwyKerjas);
    }

    /**
     * Method called to associate a RwyKerja object to this object
     * through the RwyKerja foreign key attribute.
     *
     * @param    RwyKerja $l RwyKerja
     * @return JenisPtk The current object (for fluent API support)
     */
    public function addRwyKerja(RwyKerja $l)
    {
        if ($this->collRwyKerjas === null) {
            $this->initRwyKerjas();
            $this->collRwyKerjasPartial = true;
        }
        if (!in_array($l, $this->collRwyKerjas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyKerja($l);
        }

        return $this;
    }

    /**
     * @param	RwyKerja $rwyKerja The rwyKerja object to add.
     */
    protected function doAddRwyKerja($rwyKerja)
    {
        $this->collRwyKerjas[]= $rwyKerja;
        $rwyKerja->setJenisPtk($this);
    }

    /**
     * @param	RwyKerja $rwyKerja The rwyKerja object to remove.
     * @return JenisPtk The current object (for fluent API support)
     */
    public function removeRwyKerja($rwyKerja)
    {
        if ($this->getRwyKerjas()->contains($rwyKerja)) {
            $this->collRwyKerjas->remove($this->collRwyKerjas->search($rwyKerja));
            if (null === $this->rwyKerjasScheduledForDeletion) {
                $this->rwyKerjasScheduledForDeletion = clone $this->collRwyKerjas;
                $this->rwyKerjasScheduledForDeletion->clear();
            }
            $this->rwyKerjasScheduledForDeletion[]= clone $rwyKerja;
            $rwyKerja->setJenisPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinJenisLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('JenisLembaga', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinStatusKepegawaian($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('StatusKepegawaian', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPtk is new, it will return
     * an empty collection; or if this JenisPtk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenis_ptk_id = null;
        $this->jenis_ptk = null;
        $this->guru_kelas = null;
        $this->guru_matpel = null;
        $this->guru_bk = null;
        $this->guru_inklusi = null;
        $this->guru_pengganti = null;
        $this->pengawas_satdik = null;
        $this->pengawas_plb = null;
        $this->pengawas_matpel = null;
        $this->pengawas_bidang = null;
        $this->tas = null;
        $this->tendik_lainnya = null;
        $this->formal = null;
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
            if ($this->collPtks) {
                foreach ($this->collPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyKerjas) {
                foreach ($this->collRwyKerjas as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPtks instanceof PropelCollection) {
            $this->collPtks->clearIterator();
        }
        $this->collPtks = null;
        if ($this->collRwyKerjas instanceof PropelCollection) {
            $this->collRwyKerjas->clearIterator();
        }
        $this->collRwyKerjas = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenisPtkPeer::DEFAULT_STRING_FORMAT);
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
