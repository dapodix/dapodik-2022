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
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanPeer;
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\KelompokBidang;
use DataDikdas\Model\KelompokBidangQuery;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\KurikulumQuery;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\PemakaiPrasarana;
use DataDikdas\Model\PemakaiPrasaranaQuery;
use DataDikdas\Model\PemakaiSarana;
use DataDikdas\Model\PemakaiSaranaQuery;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\StandarSaranaQuery;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TemplateUnQuery;

/**
 * Base class that represents a row from the 'ref.jurusan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JurusanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JurusanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jurusan_id field.
     * @var        string
     */
    protected $jurusan_id;

    /**
     * The value for the nama_jurusan field.
     * @var        string
     */
    protected $nama_jurusan;

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
     * The value for the jenjang_pendidikan_id field.
     * @var        string
     */
    protected $jenjang_pendidikan_id;

    /**
     * The value for the jurusan_induk field.
     * @var        string
     */
    protected $jurusan_induk;

    /**
     * The value for the level_bidang_id field.
     * @var        string
     */
    protected $level_bidang_id;

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
     * @var        Jurusan
     */
    protected $aJurusanRelatedByJurusanInduk;

    /**
     * @var        KelompokBidang
     */
    protected $aKelompokBidang;

    /**
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikan;

    /**
     * @var        PropelObjectCollection|Jurusan[] Collection to store aggregation of Jurusan objects.
     */
    protected $collJurusansRelatedByJurusanId;
    protected $collJurusansRelatedByJurusanIdPartial;

    /**
     * @var        PropelObjectCollection|JurusanSp[] Collection to store aggregation of JurusanSp objects.
     */
    protected $collJurusanSps;
    protected $collJurusanSpsPartial;

    /**
     * @var        PropelObjectCollection|Kurikulum[] Collection to store aggregation of Kurikulum objects.
     */
    protected $collKurikulums;
    protected $collKurikulumsPartial;

    /**
     * @var        PropelObjectCollection|MataPelajaran[] Collection to store aggregation of MataPelajaran objects.
     */
    protected $collMataPelajarans;
    protected $collMataPelajaransPartial;

    /**
     * @var        PropelObjectCollection|PemakaiPrasarana[] Collection to store aggregation of PemakaiPrasarana objects.
     */
    protected $collPemakaiPrasaranas;
    protected $collPemakaiPrasaranasPartial;

    /**
     * @var        PropelObjectCollection|PemakaiSarana[] Collection to store aggregation of PemakaiSarana objects.
     */
    protected $collPemakaiSaranas;
    protected $collPemakaiSaranasPartial;

    /**
     * @var        PropelObjectCollection|StandarSarana[] Collection to store aggregation of StandarSarana objects.
     */
    protected $collStandarSaranas;
    protected $collStandarSaranasPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUns;
    protected $collTemplateUnsPartial;

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
    protected $jurusansRelatedByJurusanIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurusanSpsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kurikulumsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mataPelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pemakaiPrasaranasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pemakaiSaranasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $standarSaranasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsScheduledForDeletion = null;

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
     * Initializes internal state of BaseJurusan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jurusan_id] column value.
     * 
     * @return string
     */
    public function getJurusanId()
    {
        return $this->jurusan_id;
    }

    /**
     * Get the [nama_jurusan] column value.
     * 
     * @return string
     */
    public function getNamaJurusan()
    {
        return $this->nama_jurusan;
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
     * Get the [jenjang_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanId()
    {
        return $this->jenjang_pendidikan_id;
    }

    /**
     * Get the [jurusan_induk] column value.
     * 
     * @return string
     */
    public function getJurusanInduk()
    {
        return $this->jurusan_induk;
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
     * Set the value of [jurusan_id] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setJurusanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_id !== $v) {
            $this->jurusan_id = $v;
            $this->modifiedColumns[] = JurusanPeer::JURUSAN_ID;
        }


        return $this;
    } // setJurusanId()

    /**
     * Set the value of [nama_jurusan] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setNamaJurusan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_jurusan !== $v) {
            $this->nama_jurusan = $v;
            $this->modifiedColumns[] = JurusanPeer::NAMA_JURUSAN;
        }


        return $this;
    } // setNamaJurusan()

    /**
     * Set the value of [untuk_sma] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setUntukSma($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_sma !== $v) {
            $this->untuk_sma = $v;
            $this->modifiedColumns[] = JurusanPeer::UNTUK_SMA;
        }


        return $this;
    } // setUntukSma()

    /**
     * Set the value of [untuk_smk] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setUntukSmk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_smk !== $v) {
            $this->untuk_smk = $v;
            $this->modifiedColumns[] = JurusanPeer::UNTUK_SMK;
        }


        return $this;
    } // setUntukSmk()

    /**
     * Set the value of [untuk_pt] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setUntukPt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_pt !== $v) {
            $this->untuk_pt = $v;
            $this->modifiedColumns[] = JurusanPeer::UNTUK_PT;
        }


        return $this;
    } // setUntukPt()

    /**
     * Set the value of [untuk_slb] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setUntukSlb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_slb !== $v) {
            $this->untuk_slb = $v;
            $this->modifiedColumns[] = JurusanPeer::UNTUK_SLB;
        }


        return $this;
    } // setUntukSlb()

    /**
     * Set the value of [untuk_smklb] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setUntukSmklb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_smklb !== $v) {
            $this->untuk_smklb = $v;
            $this->modifiedColumns[] = JurusanPeer::UNTUK_SMKLB;
        }


        return $this;
    } // setUntukSmklb()

    /**
     * Set the value of [jenjang_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setJenjangPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_id !== $v) {
            $this->jenjang_pendidikan_id = $v;
            $this->modifiedColumns[] = JurusanPeer::JENJANG_PENDIDIKAN_ID;
        }

        if ($this->aJenjangPendidikan !== null && $this->aJenjangPendidikan->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikan = null;
        }


        return $this;
    } // setJenjangPendidikanId()

    /**
     * Set the value of [jurusan_induk] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setJurusanInduk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_induk !== $v) {
            $this->jurusan_induk = $v;
            $this->modifiedColumns[] = JurusanPeer::JURUSAN_INDUK;
        }

        if ($this->aJurusanRelatedByJurusanInduk !== null && $this->aJurusanRelatedByJurusanInduk->getJurusanId() !== $v) {
            $this->aJurusanRelatedByJurusanInduk = null;
        }


        return $this;
    } // setJurusanInduk()

    /**
     * Set the value of [level_bidang_id] column.
     * 
     * @param string $v new value
     * @return Jurusan The current object (for fluent API support)
     */
    public function setLevelBidangId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->level_bidang_id !== $v) {
            $this->level_bidang_id = $v;
            $this->modifiedColumns[] = JurusanPeer::LEVEL_BIDANG_ID;
        }

        if ($this->aKelompokBidang !== null && $this->aKelompokBidang->getLevelBidangId() !== $v) {
            $this->aKelompokBidang = null;
        }


        return $this;
    } // setLevelBidangId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Jurusan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JurusanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Jurusan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JurusanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Jurusan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JurusanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Jurusan The current object (for fluent API support)
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
                $this->modifiedColumns[] = JurusanPeer::LAST_SYNC;
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

            $this->jurusan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama_jurusan = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->untuk_sma = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->untuk_smk = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->untuk_pt = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->untuk_slb = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->untuk_smklb = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jenjang_pendidikan_id = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->jurusan_induk = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->level_bidang_id = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->create_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_update = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->expired_date = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_sync = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 14; // 14 = JurusanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Jurusan object", $e);
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

        if ($this->aJenjangPendidikan !== null && $this->jenjang_pendidikan_id !== $this->aJenjangPendidikan->getJenjangPendidikanId()) {
            $this->aJenjangPendidikan = null;
        }
        if ($this->aJurusanRelatedByJurusanInduk !== null && $this->jurusan_induk !== $this->aJurusanRelatedByJurusanInduk->getJurusanId()) {
            $this->aJurusanRelatedByJurusanInduk = null;
        }
        if ($this->aKelompokBidang !== null && $this->level_bidang_id !== $this->aKelompokBidang->getLevelBidangId()) {
            $this->aKelompokBidang = null;
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
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JurusanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJurusanRelatedByJurusanInduk = null;
            $this->aKelompokBidang = null;
            $this->aJenjangPendidikan = null;
            $this->collJurusansRelatedByJurusanId = null;

            $this->collJurusanSps = null;

            $this->collKurikulums = null;

            $this->collMataPelajarans = null;

            $this->collPemakaiPrasaranas = null;

            $this->collPemakaiSaranas = null;

            $this->collStandarSaranas = null;

            $this->collTemplateUns = null;

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
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JurusanQuery::create()
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
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JurusanPeer::addInstanceToPool($this);
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

            if ($this->aJurusanRelatedByJurusanInduk !== null) {
                if ($this->aJurusanRelatedByJurusanInduk->isModified() || $this->aJurusanRelatedByJurusanInduk->isNew()) {
                    $affectedRows += $this->aJurusanRelatedByJurusanInduk->save($con);
                }
                $this->setJurusanRelatedByJurusanInduk($this->aJurusanRelatedByJurusanInduk);
            }

            if ($this->aKelompokBidang !== null) {
                if ($this->aKelompokBidang->isModified() || $this->aKelompokBidang->isNew()) {
                    $affectedRows += $this->aKelompokBidang->save($con);
                }
                $this->setKelompokBidang($this->aKelompokBidang);
            }

            if ($this->aJenjangPendidikan !== null) {
                if ($this->aJenjangPendidikan->isModified() || $this->aJenjangPendidikan->isNew()) {
                    $affectedRows += $this->aJenjangPendidikan->save($con);
                }
                $this->setJenjangPendidikan($this->aJenjangPendidikan);
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

            if ($this->jurusansRelatedByJurusanIdScheduledForDeletion !== null) {
                if (!$this->jurusansRelatedByJurusanIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->jurusansRelatedByJurusanIdScheduledForDeletion as $jurusanRelatedByJurusanId) {
                        // need to save related object because we set the relation to null
                        $jurusanRelatedByJurusanId->save($con);
                    }
                    $this->jurusansRelatedByJurusanIdScheduledForDeletion = null;
                }
            }

            if ($this->collJurusansRelatedByJurusanId !== null) {
                foreach ($this->collJurusansRelatedByJurusanId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jurusanSpsScheduledForDeletion !== null) {
                if (!$this->jurusanSpsScheduledForDeletion->isEmpty()) {
                    JurusanSpQuery::create()
                        ->filterByPrimaryKeys($this->jurusanSpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jurusanSpsScheduledForDeletion = null;
                }
            }

            if ($this->collJurusanSps !== null) {
                foreach ($this->collJurusanSps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kurikulumsScheduledForDeletion !== null) {
                if (!$this->kurikulumsScheduledForDeletion->isEmpty()) {
                    foreach ($this->kurikulumsScheduledForDeletion as $kurikulum) {
                        // need to save related object because we set the relation to null
                        $kurikulum->save($con);
                    }
                    $this->kurikulumsScheduledForDeletion = null;
                }
            }

            if ($this->collKurikulums !== null) {
                foreach ($this->collKurikulums as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mataPelajaransScheduledForDeletion !== null) {
                if (!$this->mataPelajaransScheduledForDeletion->isEmpty()) {
                    foreach ($this->mataPelajaransScheduledForDeletion as $mataPelajaran) {
                        // need to save related object because we set the relation to null
                        $mataPelajaran->save($con);
                    }
                    $this->mataPelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collMataPelajarans !== null) {
                foreach ($this->collMataPelajarans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pemakaiPrasaranasScheduledForDeletion !== null) {
                if (!$this->pemakaiPrasaranasScheduledForDeletion->isEmpty()) {
                    PemakaiPrasaranaQuery::create()
                        ->filterByPrimaryKeys($this->pemakaiPrasaranasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pemakaiPrasaranasScheduledForDeletion = null;
                }
            }

            if ($this->collPemakaiPrasaranas !== null) {
                foreach ($this->collPemakaiPrasaranas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pemakaiSaranasScheduledForDeletion !== null) {
                if (!$this->pemakaiSaranasScheduledForDeletion->isEmpty()) {
                    PemakaiSaranaQuery::create()
                        ->filterByPrimaryKeys($this->pemakaiSaranasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pemakaiSaranasScheduledForDeletion = null;
                }
            }

            if ($this->collPemakaiSaranas !== null) {
                foreach ($this->collPemakaiSaranas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->standarSaranasScheduledForDeletion !== null) {
                if (!$this->standarSaranasScheduledForDeletion->isEmpty()) {
                    foreach ($this->standarSaranasScheduledForDeletion as $standarSarana) {
                        // need to save related object because we set the relation to null
                        $standarSarana->save($con);
                    }
                    $this->standarSaranasScheduledForDeletion = null;
                }
            }

            if ($this->collStandarSaranas !== null) {
                foreach ($this->collStandarSaranas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsScheduledForDeletion !== null) {
                if (!$this->templateUnsScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsScheduledForDeletion as $templateUn) {
                        // need to save related object because we set the relation to null
                        $templateUn->save($con);
                    }
                    $this->templateUnsScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUns !== null) {
                foreach ($this->collTemplateUns as $referrerFK) {
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
        if ($this->isColumnModified(JurusanPeer::JURUSAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_id"';
        }
        if ($this->isColumnModified(JurusanPeer::NAMA_JURUSAN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_jurusan"';
        }
        if ($this->isColumnModified(JurusanPeer::UNTUK_SMA)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_sma"';
        }
        if ($this->isColumnModified(JurusanPeer::UNTUK_SMK)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_smk"';
        }
        if ($this->isColumnModified(JurusanPeer::UNTUK_PT)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_pt"';
        }
        if ($this->isColumnModified(JurusanPeer::UNTUK_SLB)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_slb"';
        }
        if ($this->isColumnModified(JurusanPeer::UNTUK_SMKLB)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_smklb"';
        }
        if ($this->isColumnModified(JurusanPeer::JENJANG_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_id"';
        }
        if ($this->isColumnModified(JurusanPeer::JURUSAN_INDUK)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_induk"';
        }
        if ($this->isColumnModified(JurusanPeer::LEVEL_BIDANG_ID)) {
            $modifiedColumns[':p' . $index++]  = '"level_bidang_id"';
        }
        if ($this->isColumnModified(JurusanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JurusanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JurusanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JurusanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jurusan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jurusan_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_id, PDO::PARAM_STR);
                        break;
                    case '"nama_jurusan"':						
                        $stmt->bindValue($identifier, $this->nama_jurusan, PDO::PARAM_STR);
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
                    case '"jenjang_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"jurusan_induk"':						
                        $stmt->bindValue($identifier, $this->jurusan_induk, PDO::PARAM_STR);
                        break;
                    case '"level_bidang_id"':						
                        $stmt->bindValue($identifier, $this->level_bidang_id, PDO::PARAM_STR);
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

            if ($this->aJurusanRelatedByJurusanInduk !== null) {
                if (!$this->aJurusanRelatedByJurusanInduk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJurusanRelatedByJurusanInduk->getValidationFailures());
                }
            }

            if ($this->aKelompokBidang !== null) {
                if (!$this->aKelompokBidang->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKelompokBidang->getValidationFailures());
                }
            }

            if ($this->aJenjangPendidikan !== null) {
                if (!$this->aJenjangPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikan->getValidationFailures());
                }
            }


            if (($retval = JurusanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collJurusansRelatedByJurusanId !== null) {
                    foreach ($this->collJurusansRelatedByJurusanId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJurusanSps !== null) {
                    foreach ($this->collJurusanSps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKurikulums !== null) {
                    foreach ($this->collKurikulums as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMataPelajarans !== null) {
                    foreach ($this->collMataPelajarans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPemakaiPrasaranas !== null) {
                    foreach ($this->collPemakaiPrasaranas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPemakaiSaranas !== null) {
                    foreach ($this->collPemakaiSaranas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStandarSaranas !== null) {
                    foreach ($this->collStandarSaranas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUns !== null) {
                    foreach ($this->collTemplateUns as $referrerFK) {
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
        $pos = JurusanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJurusanId();
                break;
            case 1:
                return $this->getNamaJurusan();
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
                return $this->getJenjangPendidikanId();
                break;
            case 8:
                return $this->getJurusanInduk();
                break;
            case 9:
                return $this->getLevelBidangId();
                break;
            case 10:
                return $this->getCreateDate();
                break;
            case 11:
                return $this->getLastUpdate();
                break;
            case 12:
                return $this->getExpiredDate();
                break;
            case 13:
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
        if (isset($alreadyDumpedObjects['Jurusan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Jurusan'][$this->getPrimaryKey()] = true;
        $keys = JurusanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJurusanId(),
            $keys[1] => $this->getNamaJurusan(),
            $keys[2] => $this->getUntukSma(),
            $keys[3] => $this->getUntukSmk(),
            $keys[4] => $this->getUntukPt(),
            $keys[5] => $this->getUntukSlb(),
            $keys[6] => $this->getUntukSmklb(),
            $keys[7] => $this->getJenjangPendidikanId(),
            $keys[8] => $this->getJurusanInduk(),
            $keys[9] => $this->getLevelBidangId(),
            $keys[10] => $this->getCreateDate(),
            $keys[11] => $this->getLastUpdate(),
            $keys[12] => $this->getExpiredDate(),
            $keys[13] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJurusanRelatedByJurusanInduk) {
                $result['JurusanRelatedByJurusanInduk'] = $this->aJurusanRelatedByJurusanInduk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKelompokBidang) {
                $result['KelompokBidang'] = $this->aKelompokBidang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenjangPendidikan) {
                $result['JenjangPendidikan'] = $this->aJenjangPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collJurusansRelatedByJurusanId) {
                $result['JurusansRelatedByJurusanId'] = $this->collJurusansRelatedByJurusanId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurusanSps) {
                $result['JurusanSps'] = $this->collJurusanSps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKurikulums) {
                $result['Kurikulums'] = $this->collKurikulums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMataPelajarans) {
                $result['MataPelajarans'] = $this->collMataPelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPemakaiPrasaranas) {
                $result['PemakaiPrasaranas'] = $this->collPemakaiPrasaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPemakaiSaranas) {
                $result['PemakaiSaranas'] = $this->collPemakaiSaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStandarSaranas) {
                $result['StandarSaranas'] = $this->collStandarSaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUns) {
                $result['TemplateUns'] = $this->collTemplateUns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JurusanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJurusanId($value);
                break;
            case 1:
                $this->setNamaJurusan($value);
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
                $this->setJenjangPendidikanId($value);
                break;
            case 8:
                $this->setJurusanInduk($value);
                break;
            case 9:
                $this->setLevelBidangId($value);
                break;
            case 10:
                $this->setCreateDate($value);
                break;
            case 11:
                $this->setLastUpdate($value);
                break;
            case 12:
                $this->setExpiredDate($value);
                break;
            case 13:
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
        $keys = JurusanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJurusanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNamaJurusan($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUntukSma($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUntukSmk($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUntukPt($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUntukSlb($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setUntukSmklb($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJenjangPendidikanId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setJurusanInduk($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLevelBidangId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreateDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastUpdate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setExpiredDate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastSync($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JurusanPeer::DATABASE_NAME);

        if ($this->isColumnModified(JurusanPeer::JURUSAN_ID)) $criteria->add(JurusanPeer::JURUSAN_ID, $this->jurusan_id);
        if ($this->isColumnModified(JurusanPeer::NAMA_JURUSAN)) $criteria->add(JurusanPeer::NAMA_JURUSAN, $this->nama_jurusan);
        if ($this->isColumnModified(JurusanPeer::UNTUK_SMA)) $criteria->add(JurusanPeer::UNTUK_SMA, $this->untuk_sma);
        if ($this->isColumnModified(JurusanPeer::UNTUK_SMK)) $criteria->add(JurusanPeer::UNTUK_SMK, $this->untuk_smk);
        if ($this->isColumnModified(JurusanPeer::UNTUK_PT)) $criteria->add(JurusanPeer::UNTUK_PT, $this->untuk_pt);
        if ($this->isColumnModified(JurusanPeer::UNTUK_SLB)) $criteria->add(JurusanPeer::UNTUK_SLB, $this->untuk_slb);
        if ($this->isColumnModified(JurusanPeer::UNTUK_SMKLB)) $criteria->add(JurusanPeer::UNTUK_SMKLB, $this->untuk_smklb);
        if ($this->isColumnModified(JurusanPeer::JENJANG_PENDIDIKAN_ID)) $criteria->add(JurusanPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);
        if ($this->isColumnModified(JurusanPeer::JURUSAN_INDUK)) $criteria->add(JurusanPeer::JURUSAN_INDUK, $this->jurusan_induk);
        if ($this->isColumnModified(JurusanPeer::LEVEL_BIDANG_ID)) $criteria->add(JurusanPeer::LEVEL_BIDANG_ID, $this->level_bidang_id);
        if ($this->isColumnModified(JurusanPeer::CREATE_DATE)) $criteria->add(JurusanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JurusanPeer::LAST_UPDATE)) $criteria->add(JurusanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JurusanPeer::EXPIRED_DATE)) $criteria->add(JurusanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JurusanPeer::LAST_SYNC)) $criteria->add(JurusanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JurusanPeer::DATABASE_NAME);
        $criteria->add(JurusanPeer::JURUSAN_ID, $this->jurusan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJurusanId();
    }

    /**
     * Generic method to set the primary key (jurusan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJurusanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJurusanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Jurusan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNamaJurusan($this->getNamaJurusan());
        $copyObj->setUntukSma($this->getUntukSma());
        $copyObj->setUntukSmk($this->getUntukSmk());
        $copyObj->setUntukPt($this->getUntukPt());
        $copyObj->setUntukSlb($this->getUntukSlb());
        $copyObj->setUntukSmklb($this->getUntukSmklb());
        $copyObj->setJenjangPendidikanId($this->getJenjangPendidikanId());
        $copyObj->setJurusanInduk($this->getJurusanInduk());
        $copyObj->setLevelBidangId($this->getLevelBidangId());
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

            foreach ($this->getJurusansRelatedByJurusanId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusanRelatedByJurusanId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurusanSps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusanSp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKurikulums() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKurikulum($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMataPelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMataPelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPemakaiPrasaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPemakaiPrasarana($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPemakaiSaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPemakaiSarana($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStandarSaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStandarSarana($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUn($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJurusanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Jurusan Clone of current object.
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
     * @return JurusanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JurusanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Jurusan object.
     *
     * @param             Jurusan $v
     * @return Jurusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJurusanRelatedByJurusanInduk(Jurusan $v = null)
    {
        if ($v === null) {
            $this->setJurusanInduk(NULL);
        } else {
            $this->setJurusanInduk($v->getJurusanId());
        }

        $this->aJurusanRelatedByJurusanInduk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Jurusan object, it will not be re-added.
        if ($v !== null) {
            $v->addJurusanRelatedByJurusanId($this);
        }


        return $this;
    }


    /**
     * Get the associated Jurusan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Jurusan The associated Jurusan object.
     * @throws PropelException
     */
    public function getJurusanRelatedByJurusanInduk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJurusanRelatedByJurusanInduk === null && (($this->jurusan_induk !== "" && $this->jurusan_induk !== null)) && $doQuery) {
            $this->aJurusanRelatedByJurusanInduk = JurusanQuery::create()->findPk($this->jurusan_induk, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJurusanRelatedByJurusanInduk->addJurusansRelatedByJurusanId($this);
             */
        }

        return $this->aJurusanRelatedByJurusanInduk;
    }

    /**
     * Declares an association between this object and a KelompokBidang object.
     *
     * @param             KelompokBidang $v
     * @return Jurusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKelompokBidang(KelompokBidang $v = null)
    {
        if ($v === null) {
            $this->setLevelBidangId(NULL);
        } else {
            $this->setLevelBidangId($v->getLevelBidangId());
        }

        $this->aKelompokBidang = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KelompokBidang object, it will not be re-added.
        if ($v !== null) {
            $v->addJurusan($this);
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
    public function getKelompokBidang(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKelompokBidang === null && (($this->level_bidang_id !== "" && $this->level_bidang_id !== null)) && $doQuery) {
            $this->aKelompokBidang = KelompokBidangQuery::create()->findPk($this->level_bidang_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKelompokBidang->addJurusans($this);
             */
        }

        return $this->aKelompokBidang;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return Jurusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenjangPendidikan(JenjangPendidikan $v = null)
    {
        if ($v === null) {
            $this->setJenjangPendidikanId(NULL);
        } else {
            $this->setJenjangPendidikanId($v->getJenjangPendidikanId());
        }

        $this->aJenjangPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenjangPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addJurusan($this);
        }


        return $this;
    }


    /**
     * Get the associated JenjangPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenjangPendidikan The associated JenjangPendidikan object.
     * @throws PropelException
     */
    public function getJenjangPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenjangPendidikan === null && (($this->jenjang_pendidikan_id !== "" && $this->jenjang_pendidikan_id !== null)) && $doQuery) {
            $this->aJenjangPendidikan = JenjangPendidikanQuery::create()->findPk($this->jenjang_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenjangPendidikan->addJurusans($this);
             */
        }

        return $this->aJenjangPendidikan;
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
        if ('JurusanRelatedByJurusanId' == $relationName) {
            $this->initJurusansRelatedByJurusanId();
        }
        if ('JurusanSp' == $relationName) {
            $this->initJurusanSps();
        }
        if ('Kurikulum' == $relationName) {
            $this->initKurikulums();
        }
        if ('MataPelajaran' == $relationName) {
            $this->initMataPelajarans();
        }
        if ('PemakaiPrasarana' == $relationName) {
            $this->initPemakaiPrasaranas();
        }
        if ('PemakaiSarana' == $relationName) {
            $this->initPemakaiSaranas();
        }
        if ('StandarSarana' == $relationName) {
            $this->initStandarSaranas();
        }
        if ('TemplateUn' == $relationName) {
            $this->initTemplateUns();
        }
    }

    /**
     * Clears out the collJurusansRelatedByJurusanId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addJurusansRelatedByJurusanId()
     */
    public function clearJurusansRelatedByJurusanId()
    {
        $this->collJurusansRelatedByJurusanId = null; // important to set this to null since that means it is uninitialized
        $this->collJurusansRelatedByJurusanIdPartial = null;

        return $this;
    }

    /**
     * reset is the collJurusansRelatedByJurusanId collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurusansRelatedByJurusanId($v = true)
    {
        $this->collJurusansRelatedByJurusanIdPartial = $v;
    }

    /**
     * Initializes the collJurusansRelatedByJurusanId collection.
     *
     * By default this just sets the collJurusansRelatedByJurusanId collection to an empty array (like clearcollJurusansRelatedByJurusanId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurusansRelatedByJurusanId($overrideExisting = true)
    {
        if (null !== $this->collJurusansRelatedByJurusanId && !$overrideExisting) {
            return;
        }
        $this->collJurusansRelatedByJurusanId = new PropelObjectCollection();
        $this->collJurusansRelatedByJurusanId->setModel('Jurusan');
    }

    /**
     * Gets an array of Jurusan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     * @throws PropelException
     */
    public function getJurusansRelatedByJurusanId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurusansRelatedByJurusanIdPartial && !$this->isNew();
        if (null === $this->collJurusansRelatedByJurusanId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurusansRelatedByJurusanId) {
                // return empty collection
                $this->initJurusansRelatedByJurusanId();
            } else {
                $collJurusansRelatedByJurusanId = JurusanQuery::create(null, $criteria)
                    ->filterByJurusanRelatedByJurusanInduk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurusansRelatedByJurusanIdPartial && count($collJurusansRelatedByJurusanId)) {
                      $this->initJurusansRelatedByJurusanId(false);

                      foreach($collJurusansRelatedByJurusanId as $obj) {
                        if (false == $this->collJurusansRelatedByJurusanId->contains($obj)) {
                          $this->collJurusansRelatedByJurusanId->append($obj);
                        }
                      }

                      $this->collJurusansRelatedByJurusanIdPartial = true;
                    }

                    $collJurusansRelatedByJurusanId->getInternalIterator()->rewind();
                    return $collJurusansRelatedByJurusanId;
                }

                if($partial && $this->collJurusansRelatedByJurusanId) {
                    foreach($this->collJurusansRelatedByJurusanId as $obj) {
                        if($obj->isNew()) {
                            $collJurusansRelatedByJurusanId[] = $obj;
                        }
                    }
                }

                $this->collJurusansRelatedByJurusanId = $collJurusansRelatedByJurusanId;
                $this->collJurusansRelatedByJurusanIdPartial = false;
            }
        }

        return $this->collJurusansRelatedByJurusanId;
    }

    /**
     * Sets a collection of JurusanRelatedByJurusanId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurusansRelatedByJurusanId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setJurusansRelatedByJurusanId(PropelCollection $jurusansRelatedByJurusanId, PropelPDO $con = null)
    {
        $jurusansRelatedByJurusanIdToDelete = $this->getJurusansRelatedByJurusanId(new Criteria(), $con)->diff($jurusansRelatedByJurusanId);

        $this->jurusansRelatedByJurusanIdScheduledForDeletion = unserialize(serialize($jurusansRelatedByJurusanIdToDelete));

        foreach ($jurusansRelatedByJurusanIdToDelete as $jurusanRelatedByJurusanIdRemoved) {
            $jurusanRelatedByJurusanIdRemoved->setJurusanRelatedByJurusanInduk(null);
        }

        $this->collJurusansRelatedByJurusanId = null;
        foreach ($jurusansRelatedByJurusanId as $jurusanRelatedByJurusanId) {
            $this->addJurusanRelatedByJurusanId($jurusanRelatedByJurusanId);
        }

        $this->collJurusansRelatedByJurusanId = $jurusansRelatedByJurusanId;
        $this->collJurusansRelatedByJurusanIdPartial = false;

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
    public function countJurusansRelatedByJurusanId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurusansRelatedByJurusanIdPartial && !$this->isNew();
        if (null === $this->collJurusansRelatedByJurusanId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurusansRelatedByJurusanId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurusansRelatedByJurusanId());
            }
            $query = JurusanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusanRelatedByJurusanInduk($this)
                ->count($con);
        }

        return count($this->collJurusansRelatedByJurusanId);
    }

    /**
     * Method called to associate a Jurusan object to this object
     * through the Jurusan foreign key attribute.
     *
     * @param    Jurusan $l Jurusan
     * @return Jurusan The current object (for fluent API support)
     */
    public function addJurusanRelatedByJurusanId(Jurusan $l)
    {
        if ($this->collJurusansRelatedByJurusanId === null) {
            $this->initJurusansRelatedByJurusanId();
            $this->collJurusansRelatedByJurusanIdPartial = true;
        }
        if (!in_array($l, $this->collJurusansRelatedByJurusanId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurusanRelatedByJurusanId($l);
        }

        return $this;
    }

    /**
     * @param	JurusanRelatedByJurusanId $jurusanRelatedByJurusanId The jurusanRelatedByJurusanId object to add.
     */
    protected function doAddJurusanRelatedByJurusanId($jurusanRelatedByJurusanId)
    {
        $this->collJurusansRelatedByJurusanId[]= $jurusanRelatedByJurusanId;
        $jurusanRelatedByJurusanId->setJurusanRelatedByJurusanInduk($this);
    }

    /**
     * @param	JurusanRelatedByJurusanId $jurusanRelatedByJurusanId The jurusanRelatedByJurusanId object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removeJurusanRelatedByJurusanId($jurusanRelatedByJurusanId)
    {
        if ($this->getJurusansRelatedByJurusanId()->contains($jurusanRelatedByJurusanId)) {
            $this->collJurusansRelatedByJurusanId->remove($this->collJurusansRelatedByJurusanId->search($jurusanRelatedByJurusanId));
            if (null === $this->jurusansRelatedByJurusanIdScheduledForDeletion) {
                $this->jurusansRelatedByJurusanIdScheduledForDeletion = clone $this->collJurusansRelatedByJurusanId;
                $this->jurusansRelatedByJurusanIdScheduledForDeletion->clear();
            }
            $this->jurusansRelatedByJurusanIdScheduledForDeletion[]= $jurusanRelatedByJurusanId;
            $jurusanRelatedByJurusanId->setJurusanRelatedByJurusanInduk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related JurusansRelatedByJurusanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     */
    public function getJurusansRelatedByJurusanIdJoinKelompokBidang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanQuery::create(null, $criteria);
        $query->joinWith('KelompokBidang', $join_behavior);

        return $this->getJurusansRelatedByJurusanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related JurusansRelatedByJurusanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     */
    public function getJurusansRelatedByJurusanIdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getJurusansRelatedByJurusanId($query, $con);
    }

    /**
     * Clears out the collJurusanSps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addJurusanSps()
     */
    public function clearJurusanSps()
    {
        $this->collJurusanSps = null; // important to set this to null since that means it is uninitialized
        $this->collJurusanSpsPartial = null;

        return $this;
    }

    /**
     * reset is the collJurusanSps collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurusanSps($v = true)
    {
        $this->collJurusanSpsPartial = $v;
    }

    /**
     * Initializes the collJurusanSps collection.
     *
     * By default this just sets the collJurusanSps collection to an empty array (like clearcollJurusanSps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurusanSps($overrideExisting = true)
    {
        if (null !== $this->collJurusanSps && !$overrideExisting) {
            return;
        }
        $this->collJurusanSps = new PropelObjectCollection();
        $this->collJurusanSps->setModel('JurusanSp');
    }

    /**
     * Gets an array of JurusanSp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     * @throws PropelException
     */
    public function getJurusanSps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurusanSpsPartial && !$this->isNew();
        if (null === $this->collJurusanSps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurusanSps) {
                // return empty collection
                $this->initJurusanSps();
            } else {
                $collJurusanSps = JurusanSpQuery::create(null, $criteria)
                    ->filterByJurusan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurusanSpsPartial && count($collJurusanSps)) {
                      $this->initJurusanSps(false);

                      foreach($collJurusanSps as $obj) {
                        if (false == $this->collJurusanSps->contains($obj)) {
                          $this->collJurusanSps->append($obj);
                        }
                      }

                      $this->collJurusanSpsPartial = true;
                    }

                    $collJurusanSps->getInternalIterator()->rewind();
                    return $collJurusanSps;
                }

                if($partial && $this->collJurusanSps) {
                    foreach($this->collJurusanSps as $obj) {
                        if($obj->isNew()) {
                            $collJurusanSps[] = $obj;
                        }
                    }
                }

                $this->collJurusanSps = $collJurusanSps;
                $this->collJurusanSpsPartial = false;
            }
        }

        return $this->collJurusanSps;
    }

    /**
     * Sets a collection of JurusanSp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurusanSps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setJurusanSps(PropelCollection $jurusanSps, PropelPDO $con = null)
    {
        $jurusanSpsToDelete = $this->getJurusanSps(new Criteria(), $con)->diff($jurusanSps);

        $this->jurusanSpsScheduledForDeletion = unserialize(serialize($jurusanSpsToDelete));

        foreach ($jurusanSpsToDelete as $jurusanSpRemoved) {
            $jurusanSpRemoved->setJurusan(null);
        }

        $this->collJurusanSps = null;
        foreach ($jurusanSps as $jurusanSp) {
            $this->addJurusanSp($jurusanSp);
        }

        $this->collJurusanSps = $jurusanSps;
        $this->collJurusanSpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related JurusanSp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related JurusanSp objects.
     * @throws PropelException
     */
    public function countJurusanSps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurusanSpsPartial && !$this->isNew();
        if (null === $this->collJurusanSps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurusanSps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurusanSps());
            }
            $query = JurusanSpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusan($this)
                ->count($con);
        }

        return count($this->collJurusanSps);
    }

    /**
     * Method called to associate a JurusanSp object to this object
     * through the JurusanSp foreign key attribute.
     *
     * @param    JurusanSp $l JurusanSp
     * @return Jurusan The current object (for fluent API support)
     */
    public function addJurusanSp(JurusanSp $l)
    {
        if ($this->collJurusanSps === null) {
            $this->initJurusanSps();
            $this->collJurusanSpsPartial = true;
        }
        if (!in_array($l, $this->collJurusanSps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurusanSp($l);
        }

        return $this;
    }

    /**
     * @param	JurusanSp $jurusanSp The jurusanSp object to add.
     */
    protected function doAddJurusanSp($jurusanSp)
    {
        $this->collJurusanSps[]= $jurusanSp;
        $jurusanSp->setJurusan($this);
    }

    /**
     * @param	JurusanSp $jurusanSp The jurusanSp object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removeJurusanSp($jurusanSp)
    {
        if ($this->getJurusanSps()->contains($jurusanSp)) {
            $this->collJurusanSps->remove($this->collJurusanSps->search($jurusanSp));
            if (null === $this->jurusanSpsScheduledForDeletion) {
                $this->jurusanSpsScheduledForDeletion = clone $this->collJurusanSps;
                $this->jurusanSpsScheduledForDeletion->clear();
            }
            $this->jurusanSpsScheduledForDeletion[]= clone $jurusanSp;
            $jurusanSp->setJurusan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related JurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     */
    public function getJurusanSpsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanSpQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getJurusanSps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related JurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     */
    public function getJurusanSpsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanSpQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getJurusanSps($query, $con);
    }

    /**
     * Clears out the collKurikulums collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addKurikulums()
     */
    public function clearKurikulums()
    {
        $this->collKurikulums = null; // important to set this to null since that means it is uninitialized
        $this->collKurikulumsPartial = null;

        return $this;
    }

    /**
     * reset is the collKurikulums collection loaded partially
     *
     * @return void
     */
    public function resetPartialKurikulums($v = true)
    {
        $this->collKurikulumsPartial = $v;
    }

    /**
     * Initializes the collKurikulums collection.
     *
     * By default this just sets the collKurikulums collection to an empty array (like clearcollKurikulums());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKurikulums($overrideExisting = true)
    {
        if (null !== $this->collKurikulums && !$overrideExisting) {
            return;
        }
        $this->collKurikulums = new PropelObjectCollection();
        $this->collKurikulums->setModel('Kurikulum');
    }

    /**
     * Gets an array of Kurikulum objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kurikulum[] List of Kurikulum objects
     * @throws PropelException
     */
    public function getKurikulums($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKurikulumsPartial && !$this->isNew();
        if (null === $this->collKurikulums || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKurikulums) {
                // return empty collection
                $this->initKurikulums();
            } else {
                $collKurikulums = KurikulumQuery::create(null, $criteria)
                    ->filterByJurusan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKurikulumsPartial && count($collKurikulums)) {
                      $this->initKurikulums(false);

                      foreach($collKurikulums as $obj) {
                        if (false == $this->collKurikulums->contains($obj)) {
                          $this->collKurikulums->append($obj);
                        }
                      }

                      $this->collKurikulumsPartial = true;
                    }

                    $collKurikulums->getInternalIterator()->rewind();
                    return $collKurikulums;
                }

                if($partial && $this->collKurikulums) {
                    foreach($this->collKurikulums as $obj) {
                        if($obj->isNew()) {
                            $collKurikulums[] = $obj;
                        }
                    }
                }

                $this->collKurikulums = $collKurikulums;
                $this->collKurikulumsPartial = false;
            }
        }

        return $this->collKurikulums;
    }

    /**
     * Sets a collection of Kurikulum objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kurikulums A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setKurikulums(PropelCollection $kurikulums, PropelPDO $con = null)
    {
        $kurikulumsToDelete = $this->getKurikulums(new Criteria(), $con)->diff($kurikulums);

        $this->kurikulumsScheduledForDeletion = unserialize(serialize($kurikulumsToDelete));

        foreach ($kurikulumsToDelete as $kurikulumRemoved) {
            $kurikulumRemoved->setJurusan(null);
        }

        $this->collKurikulums = null;
        foreach ($kurikulums as $kurikulum) {
            $this->addKurikulum($kurikulum);
        }

        $this->collKurikulums = $kurikulums;
        $this->collKurikulumsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Kurikulum objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Kurikulum objects.
     * @throws PropelException
     */
    public function countKurikulums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKurikulumsPartial && !$this->isNew();
        if (null === $this->collKurikulums || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKurikulums) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKurikulums());
            }
            $query = KurikulumQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusan($this)
                ->count($con);
        }

        return count($this->collKurikulums);
    }

    /**
     * Method called to associate a Kurikulum object to this object
     * through the Kurikulum foreign key attribute.
     *
     * @param    Kurikulum $l Kurikulum
     * @return Jurusan The current object (for fluent API support)
     */
    public function addKurikulum(Kurikulum $l)
    {
        if ($this->collKurikulums === null) {
            $this->initKurikulums();
            $this->collKurikulumsPartial = true;
        }
        if (!in_array($l, $this->collKurikulums->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKurikulum($l);
        }

        return $this;
    }

    /**
     * @param	Kurikulum $kurikulum The kurikulum object to add.
     */
    protected function doAddKurikulum($kurikulum)
    {
        $this->collKurikulums[]= $kurikulum;
        $kurikulum->setJurusan($this);
    }

    /**
     * @param	Kurikulum $kurikulum The kurikulum object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removeKurikulum($kurikulum)
    {
        if ($this->getKurikulums()->contains($kurikulum)) {
            $this->collKurikulums->remove($this->collKurikulums->search($kurikulum));
            if (null === $this->kurikulumsScheduledForDeletion) {
                $this->kurikulumsScheduledForDeletion = clone $this->collKurikulums;
                $this->kurikulumsScheduledForDeletion->clear();
            }
            $this->kurikulumsScheduledForDeletion[]= $kurikulum;
            $kurikulum->setJurusan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related Kurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kurikulum[] List of Kurikulum objects
     */
    public function getKurikulumsJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KurikulumQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getKurikulums($query, $con);
    }

    /**
     * Clears out the collMataPelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addMataPelajarans()
     */
    public function clearMataPelajarans()
    {
        $this->collMataPelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collMataPelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collMataPelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialMataPelajarans($v = true)
    {
        $this->collMataPelajaransPartial = $v;
    }

    /**
     * Initializes the collMataPelajarans collection.
     *
     * By default this just sets the collMataPelajarans collection to an empty array (like clearcollMataPelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMataPelajarans($overrideExisting = true)
    {
        if (null !== $this->collMataPelajarans && !$overrideExisting) {
            return;
        }
        $this->collMataPelajarans = new PropelObjectCollection();
        $this->collMataPelajarans->setModel('MataPelajaran');
    }

    /**
     * Gets an array of MataPelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MataPelajaran[] List of MataPelajaran objects
     * @throws PropelException
     */
    public function getMataPelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaransPartial && !$this->isNew();
        if (null === $this->collMataPelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMataPelajarans) {
                // return empty collection
                $this->initMataPelajarans();
            } else {
                $collMataPelajarans = MataPelajaranQuery::create(null, $criteria)
                    ->filterByJurusan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMataPelajaransPartial && count($collMataPelajarans)) {
                      $this->initMataPelajarans(false);

                      foreach($collMataPelajarans as $obj) {
                        if (false == $this->collMataPelajarans->contains($obj)) {
                          $this->collMataPelajarans->append($obj);
                        }
                      }

                      $this->collMataPelajaransPartial = true;
                    }

                    $collMataPelajarans->getInternalIterator()->rewind();
                    return $collMataPelajarans;
                }

                if($partial && $this->collMataPelajarans) {
                    foreach($this->collMataPelajarans as $obj) {
                        if($obj->isNew()) {
                            $collMataPelajarans[] = $obj;
                        }
                    }
                }

                $this->collMataPelajarans = $collMataPelajarans;
                $this->collMataPelajaransPartial = false;
            }
        }

        return $this->collMataPelajarans;
    }

    /**
     * Sets a collection of MataPelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mataPelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setMataPelajarans(PropelCollection $mataPelajarans, PropelPDO $con = null)
    {
        $mataPelajaransToDelete = $this->getMataPelajarans(new Criteria(), $con)->diff($mataPelajarans);

        $this->mataPelajaransScheduledForDeletion = unserialize(serialize($mataPelajaransToDelete));

        foreach ($mataPelajaransToDelete as $mataPelajaranRemoved) {
            $mataPelajaranRemoved->setJurusan(null);
        }

        $this->collMataPelajarans = null;
        foreach ($mataPelajarans as $mataPelajaran) {
            $this->addMataPelajaran($mataPelajaran);
        }

        $this->collMataPelajarans = $mataPelajarans;
        $this->collMataPelajaransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MataPelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MataPelajaran objects.
     * @throws PropelException
     */
    public function countMataPelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaransPartial && !$this->isNew();
        if (null === $this->collMataPelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMataPelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMataPelajarans());
            }
            $query = MataPelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusan($this)
                ->count($con);
        }

        return count($this->collMataPelajarans);
    }

    /**
     * Method called to associate a MataPelajaran object to this object
     * through the MataPelajaran foreign key attribute.
     *
     * @param    MataPelajaran $l MataPelajaran
     * @return Jurusan The current object (for fluent API support)
     */
    public function addMataPelajaran(MataPelajaran $l)
    {
        if ($this->collMataPelajarans === null) {
            $this->initMataPelajarans();
            $this->collMataPelajaransPartial = true;
        }
        if (!in_array($l, $this->collMataPelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMataPelajaran($l);
        }

        return $this;
    }

    /**
     * @param	MataPelajaran $mataPelajaran The mataPelajaran object to add.
     */
    protected function doAddMataPelajaran($mataPelajaran)
    {
        $this->collMataPelajarans[]= $mataPelajaran;
        $mataPelajaran->setJurusan($this);
    }

    /**
     * @param	MataPelajaran $mataPelajaran The mataPelajaran object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removeMataPelajaran($mataPelajaran)
    {
        if ($this->getMataPelajarans()->contains($mataPelajaran)) {
            $this->collMataPelajarans->remove($this->collMataPelajarans->search($mataPelajaran));
            if (null === $this->mataPelajaransScheduledForDeletion) {
                $this->mataPelajaransScheduledForDeletion = clone $this->collMataPelajarans;
                $this->mataPelajaransScheduledForDeletion->clear();
            }
            $this->mataPelajaransScheduledForDeletion[]= $mataPelajaran;
            $mataPelajaran->setJurusan(null);
        }

        return $this;
    }

    /**
     * Clears out the collPemakaiPrasaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addPemakaiPrasaranas()
     */
    public function clearPemakaiPrasaranas()
    {
        $this->collPemakaiPrasaranas = null; // important to set this to null since that means it is uninitialized
        $this->collPemakaiPrasaranasPartial = null;

        return $this;
    }

    /**
     * reset is the collPemakaiPrasaranas collection loaded partially
     *
     * @return void
     */
    public function resetPartialPemakaiPrasaranas($v = true)
    {
        $this->collPemakaiPrasaranasPartial = $v;
    }

    /**
     * Initializes the collPemakaiPrasaranas collection.
     *
     * By default this just sets the collPemakaiPrasaranas collection to an empty array (like clearcollPemakaiPrasaranas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPemakaiPrasaranas($overrideExisting = true)
    {
        if (null !== $this->collPemakaiPrasaranas && !$overrideExisting) {
            return;
        }
        $this->collPemakaiPrasaranas = new PropelObjectCollection();
        $this->collPemakaiPrasaranas->setModel('PemakaiPrasarana');
    }

    /**
     * Gets an array of PemakaiPrasarana objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PemakaiPrasarana[] List of PemakaiPrasarana objects
     * @throws PropelException
     */
    public function getPemakaiPrasaranas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiPrasaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiPrasaranas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPemakaiPrasaranas) {
                // return empty collection
                $this->initPemakaiPrasaranas();
            } else {
                $collPemakaiPrasaranas = PemakaiPrasaranaQuery::create(null, $criteria)
                    ->filterByJurusan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPemakaiPrasaranasPartial && count($collPemakaiPrasaranas)) {
                      $this->initPemakaiPrasaranas(false);

                      foreach($collPemakaiPrasaranas as $obj) {
                        if (false == $this->collPemakaiPrasaranas->contains($obj)) {
                          $this->collPemakaiPrasaranas->append($obj);
                        }
                      }

                      $this->collPemakaiPrasaranasPartial = true;
                    }

                    $collPemakaiPrasaranas->getInternalIterator()->rewind();
                    return $collPemakaiPrasaranas;
                }

                if($partial && $this->collPemakaiPrasaranas) {
                    foreach($this->collPemakaiPrasaranas as $obj) {
                        if($obj->isNew()) {
                            $collPemakaiPrasaranas[] = $obj;
                        }
                    }
                }

                $this->collPemakaiPrasaranas = $collPemakaiPrasaranas;
                $this->collPemakaiPrasaranasPartial = false;
            }
        }

        return $this->collPemakaiPrasaranas;
    }

    /**
     * Sets a collection of PemakaiPrasarana objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pemakaiPrasaranas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setPemakaiPrasaranas(PropelCollection $pemakaiPrasaranas, PropelPDO $con = null)
    {
        $pemakaiPrasaranasToDelete = $this->getPemakaiPrasaranas(new Criteria(), $con)->diff($pemakaiPrasaranas);

        $this->pemakaiPrasaranasScheduledForDeletion = unserialize(serialize($pemakaiPrasaranasToDelete));

        foreach ($pemakaiPrasaranasToDelete as $pemakaiPrasaranaRemoved) {
            $pemakaiPrasaranaRemoved->setJurusan(null);
        }

        $this->collPemakaiPrasaranas = null;
        foreach ($pemakaiPrasaranas as $pemakaiPrasarana) {
            $this->addPemakaiPrasarana($pemakaiPrasarana);
        }

        $this->collPemakaiPrasaranas = $pemakaiPrasaranas;
        $this->collPemakaiPrasaranasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PemakaiPrasarana objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PemakaiPrasarana objects.
     * @throws PropelException
     */
    public function countPemakaiPrasaranas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiPrasaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiPrasaranas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPemakaiPrasaranas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPemakaiPrasaranas());
            }
            $query = PemakaiPrasaranaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusan($this)
                ->count($con);
        }

        return count($this->collPemakaiPrasaranas);
    }

    /**
     * Method called to associate a PemakaiPrasarana object to this object
     * through the PemakaiPrasarana foreign key attribute.
     *
     * @param    PemakaiPrasarana $l PemakaiPrasarana
     * @return Jurusan The current object (for fluent API support)
     */
    public function addPemakaiPrasarana(PemakaiPrasarana $l)
    {
        if ($this->collPemakaiPrasaranas === null) {
            $this->initPemakaiPrasaranas();
            $this->collPemakaiPrasaranasPartial = true;
        }
        if (!in_array($l, $this->collPemakaiPrasaranas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPemakaiPrasarana($l);
        }

        return $this;
    }

    /**
     * @param	PemakaiPrasarana $pemakaiPrasarana The pemakaiPrasarana object to add.
     */
    protected function doAddPemakaiPrasarana($pemakaiPrasarana)
    {
        $this->collPemakaiPrasaranas[]= $pemakaiPrasarana;
        $pemakaiPrasarana->setJurusan($this);
    }

    /**
     * @param	PemakaiPrasarana $pemakaiPrasarana The pemakaiPrasarana object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removePemakaiPrasarana($pemakaiPrasarana)
    {
        if ($this->getPemakaiPrasaranas()->contains($pemakaiPrasarana)) {
            $this->collPemakaiPrasaranas->remove($this->collPemakaiPrasaranas->search($pemakaiPrasarana));
            if (null === $this->pemakaiPrasaranasScheduledForDeletion) {
                $this->pemakaiPrasaranasScheduledForDeletion = clone $this->collPemakaiPrasaranas;
                $this->pemakaiPrasaranasScheduledForDeletion->clear();
            }
            $this->pemakaiPrasaranasScheduledForDeletion[]= clone $pemakaiPrasarana;
            $pemakaiPrasarana->setJurusan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related PemakaiPrasaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PemakaiPrasarana[] List of PemakaiPrasarana objects
     */
    public function getPemakaiPrasaranasJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PemakaiPrasaranaQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getPemakaiPrasaranas($query, $con);
    }

    /**
     * Clears out the collPemakaiSaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addPemakaiSaranas()
     */
    public function clearPemakaiSaranas()
    {
        $this->collPemakaiSaranas = null; // important to set this to null since that means it is uninitialized
        $this->collPemakaiSaranasPartial = null;

        return $this;
    }

    /**
     * reset is the collPemakaiSaranas collection loaded partially
     *
     * @return void
     */
    public function resetPartialPemakaiSaranas($v = true)
    {
        $this->collPemakaiSaranasPartial = $v;
    }

    /**
     * Initializes the collPemakaiSaranas collection.
     *
     * By default this just sets the collPemakaiSaranas collection to an empty array (like clearcollPemakaiSaranas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPemakaiSaranas($overrideExisting = true)
    {
        if (null !== $this->collPemakaiSaranas && !$overrideExisting) {
            return;
        }
        $this->collPemakaiSaranas = new PropelObjectCollection();
        $this->collPemakaiSaranas->setModel('PemakaiSarana');
    }

    /**
     * Gets an array of PemakaiSarana objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PemakaiSarana[] List of PemakaiSarana objects
     * @throws PropelException
     */
    public function getPemakaiSaranas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiSaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiSaranas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPemakaiSaranas) {
                // return empty collection
                $this->initPemakaiSaranas();
            } else {
                $collPemakaiSaranas = PemakaiSaranaQuery::create(null, $criteria)
                    ->filterByJurusan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPemakaiSaranasPartial && count($collPemakaiSaranas)) {
                      $this->initPemakaiSaranas(false);

                      foreach($collPemakaiSaranas as $obj) {
                        if (false == $this->collPemakaiSaranas->contains($obj)) {
                          $this->collPemakaiSaranas->append($obj);
                        }
                      }

                      $this->collPemakaiSaranasPartial = true;
                    }

                    $collPemakaiSaranas->getInternalIterator()->rewind();
                    return $collPemakaiSaranas;
                }

                if($partial && $this->collPemakaiSaranas) {
                    foreach($this->collPemakaiSaranas as $obj) {
                        if($obj->isNew()) {
                            $collPemakaiSaranas[] = $obj;
                        }
                    }
                }

                $this->collPemakaiSaranas = $collPemakaiSaranas;
                $this->collPemakaiSaranasPartial = false;
            }
        }

        return $this->collPemakaiSaranas;
    }

    /**
     * Sets a collection of PemakaiSarana objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pemakaiSaranas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setPemakaiSaranas(PropelCollection $pemakaiSaranas, PropelPDO $con = null)
    {
        $pemakaiSaranasToDelete = $this->getPemakaiSaranas(new Criteria(), $con)->diff($pemakaiSaranas);

        $this->pemakaiSaranasScheduledForDeletion = unserialize(serialize($pemakaiSaranasToDelete));

        foreach ($pemakaiSaranasToDelete as $pemakaiSaranaRemoved) {
            $pemakaiSaranaRemoved->setJurusan(null);
        }

        $this->collPemakaiSaranas = null;
        foreach ($pemakaiSaranas as $pemakaiSarana) {
            $this->addPemakaiSarana($pemakaiSarana);
        }

        $this->collPemakaiSaranas = $pemakaiSaranas;
        $this->collPemakaiSaranasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PemakaiSarana objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PemakaiSarana objects.
     * @throws PropelException
     */
    public function countPemakaiSaranas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiSaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiSaranas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPemakaiSaranas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPemakaiSaranas());
            }
            $query = PemakaiSaranaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusan($this)
                ->count($con);
        }

        return count($this->collPemakaiSaranas);
    }

    /**
     * Method called to associate a PemakaiSarana object to this object
     * through the PemakaiSarana foreign key attribute.
     *
     * @param    PemakaiSarana $l PemakaiSarana
     * @return Jurusan The current object (for fluent API support)
     */
    public function addPemakaiSarana(PemakaiSarana $l)
    {
        if ($this->collPemakaiSaranas === null) {
            $this->initPemakaiSaranas();
            $this->collPemakaiSaranasPartial = true;
        }
        if (!in_array($l, $this->collPemakaiSaranas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPemakaiSarana($l);
        }

        return $this;
    }

    /**
     * @param	PemakaiSarana $pemakaiSarana The pemakaiSarana object to add.
     */
    protected function doAddPemakaiSarana($pemakaiSarana)
    {
        $this->collPemakaiSaranas[]= $pemakaiSarana;
        $pemakaiSarana->setJurusan($this);
    }

    /**
     * @param	PemakaiSarana $pemakaiSarana The pemakaiSarana object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removePemakaiSarana($pemakaiSarana)
    {
        if ($this->getPemakaiSaranas()->contains($pemakaiSarana)) {
            $this->collPemakaiSaranas->remove($this->collPemakaiSaranas->search($pemakaiSarana));
            if (null === $this->pemakaiSaranasScheduledForDeletion) {
                $this->pemakaiSaranasScheduledForDeletion = clone $this->collPemakaiSaranas;
                $this->pemakaiSaranasScheduledForDeletion->clear();
            }
            $this->pemakaiSaranasScheduledForDeletion[]= clone $pemakaiSarana;
            $pemakaiSarana->setJurusan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related PemakaiSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PemakaiSarana[] List of PemakaiSarana objects
     */
    public function getPemakaiSaranasJoinJenisSarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PemakaiSaranaQuery::create(null, $criteria);
        $query->joinWith('JenisSarana', $join_behavior);

        return $this->getPemakaiSaranas($query, $con);
    }

    /**
     * Clears out the collStandarSaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addStandarSaranas()
     */
    public function clearStandarSaranas()
    {
        $this->collStandarSaranas = null; // important to set this to null since that means it is uninitialized
        $this->collStandarSaranasPartial = null;

        return $this;
    }

    /**
     * reset is the collStandarSaranas collection loaded partially
     *
     * @return void
     */
    public function resetPartialStandarSaranas($v = true)
    {
        $this->collStandarSaranasPartial = $v;
    }

    /**
     * Initializes the collStandarSaranas collection.
     *
     * By default this just sets the collStandarSaranas collection to an empty array (like clearcollStandarSaranas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStandarSaranas($overrideExisting = true)
    {
        if (null !== $this->collStandarSaranas && !$overrideExisting) {
            return;
        }
        $this->collStandarSaranas = new PropelObjectCollection();
        $this->collStandarSaranas->setModel('StandarSarana');
    }

    /**
     * Gets an array of StandarSarana objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     * @throws PropelException
     */
    public function getStandarSaranas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStandarSaranasPartial && !$this->isNew();
        if (null === $this->collStandarSaranas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStandarSaranas) {
                // return empty collection
                $this->initStandarSaranas();
            } else {
                $collStandarSaranas = StandarSaranaQuery::create(null, $criteria)
                    ->filterByJurusan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStandarSaranasPartial && count($collStandarSaranas)) {
                      $this->initStandarSaranas(false);

                      foreach($collStandarSaranas as $obj) {
                        if (false == $this->collStandarSaranas->contains($obj)) {
                          $this->collStandarSaranas->append($obj);
                        }
                      }

                      $this->collStandarSaranasPartial = true;
                    }

                    $collStandarSaranas->getInternalIterator()->rewind();
                    return $collStandarSaranas;
                }

                if($partial && $this->collStandarSaranas) {
                    foreach($this->collStandarSaranas as $obj) {
                        if($obj->isNew()) {
                            $collStandarSaranas[] = $obj;
                        }
                    }
                }

                $this->collStandarSaranas = $collStandarSaranas;
                $this->collStandarSaranasPartial = false;
            }
        }

        return $this->collStandarSaranas;
    }

    /**
     * Sets a collection of StandarSarana objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $standarSaranas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setStandarSaranas(PropelCollection $standarSaranas, PropelPDO $con = null)
    {
        $standarSaranasToDelete = $this->getStandarSaranas(new Criteria(), $con)->diff($standarSaranas);

        $this->standarSaranasScheduledForDeletion = unserialize(serialize($standarSaranasToDelete));

        foreach ($standarSaranasToDelete as $standarSaranaRemoved) {
            $standarSaranaRemoved->setJurusan(null);
        }

        $this->collStandarSaranas = null;
        foreach ($standarSaranas as $standarSarana) {
            $this->addStandarSarana($standarSarana);
        }

        $this->collStandarSaranas = $standarSaranas;
        $this->collStandarSaranasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StandarSarana objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StandarSarana objects.
     * @throws PropelException
     */
    public function countStandarSaranas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStandarSaranasPartial && !$this->isNew();
        if (null === $this->collStandarSaranas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStandarSaranas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStandarSaranas());
            }
            $query = StandarSaranaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusan($this)
                ->count($con);
        }

        return count($this->collStandarSaranas);
    }

    /**
     * Method called to associate a StandarSarana object to this object
     * through the StandarSarana foreign key attribute.
     *
     * @param    StandarSarana $l StandarSarana
     * @return Jurusan The current object (for fluent API support)
     */
    public function addStandarSarana(StandarSarana $l)
    {
        if ($this->collStandarSaranas === null) {
            $this->initStandarSaranas();
            $this->collStandarSaranasPartial = true;
        }
        if (!in_array($l, $this->collStandarSaranas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStandarSarana($l);
        }

        return $this;
    }

    /**
     * @param	StandarSarana $standarSarana The standarSarana object to add.
     */
    protected function doAddStandarSarana($standarSarana)
    {
        $this->collStandarSaranas[]= $standarSarana;
        $standarSarana->setJurusan($this);
    }

    /**
     * @param	StandarSarana $standarSarana The standarSarana object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removeStandarSarana($standarSarana)
    {
        if ($this->getStandarSaranas()->contains($standarSarana)) {
            $this->collStandarSaranas->remove($this->collStandarSaranas->search($standarSarana));
            if (null === $this->standarSaranasScheduledForDeletion) {
                $this->standarSaranasScheduledForDeletion = clone $this->collStandarSaranas;
                $this->standarSaranasScheduledForDeletion->clear();
            }
            $this->standarSaranasScheduledForDeletion[]= $standarSarana;
            $standarSarana->setJurusan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinJenisSarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('JenisSarana', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinBentukPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('BentukPendidikan', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }

    /**
     * Clears out the collTemplateUns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Jurusan The current object (for fluent API support)
     * @see        addTemplateUns()
     */
    public function clearTemplateUns()
    {
        $this->collTemplateUns = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUns collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUns($v = true)
    {
        $this->collTemplateUnsPartial = $v;
    }

    /**
     * Initializes the collTemplateUns collection.
     *
     * By default this just sets the collTemplateUns collection to an empty array (like clearcollTemplateUns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUns($overrideExisting = true)
    {
        if (null !== $this->collTemplateUns && !$overrideExisting) {
            return;
        }
        $this->collTemplateUns = new PropelObjectCollection();
        $this->collTemplateUns->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Jurusan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsPartial && !$this->isNew();
        if (null === $this->collTemplateUns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUns) {
                // return empty collection
                $this->initTemplateUns();
            } else {
                $collTemplateUns = TemplateUnQuery::create(null, $criteria)
                    ->filterByJurusan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsPartial && count($collTemplateUns)) {
                      $this->initTemplateUns(false);

                      foreach($collTemplateUns as $obj) {
                        if (false == $this->collTemplateUns->contains($obj)) {
                          $this->collTemplateUns->append($obj);
                        }
                      }

                      $this->collTemplateUnsPartial = true;
                    }

                    $collTemplateUns->getInternalIterator()->rewind();
                    return $collTemplateUns;
                }

                if($partial && $this->collTemplateUns) {
                    foreach($this->collTemplateUns as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUns[] = $obj;
                        }
                    }
                }

                $this->collTemplateUns = $collTemplateUns;
                $this->collTemplateUnsPartial = false;
            }
        }

        return $this->collTemplateUns;
    }

    /**
     * Sets a collection of TemplateUn objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Jurusan The current object (for fluent API support)
     */
    public function setTemplateUns(PropelCollection $templateUns, PropelPDO $con = null)
    {
        $templateUnsToDelete = $this->getTemplateUns(new Criteria(), $con)->diff($templateUns);

        $this->templateUnsScheduledForDeletion = unserialize(serialize($templateUnsToDelete));

        foreach ($templateUnsToDelete as $templateUnRemoved) {
            $templateUnRemoved->setJurusan(null);
        }

        $this->collTemplateUns = null;
        foreach ($templateUns as $templateUn) {
            $this->addTemplateUn($templateUn);
        }

        $this->collTemplateUns = $templateUns;
        $this->collTemplateUnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TemplateUn objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TemplateUn objects.
     * @throws PropelException
     */
    public function countTemplateUns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsPartial && !$this->isNew();
        if (null === $this->collTemplateUns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUns());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusan($this)
                ->count($con);
        }

        return count($this->collTemplateUns);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return Jurusan The current object (for fluent API support)
     */
    public function addTemplateUn(TemplateUn $l)
    {
        if ($this->collTemplateUns === null) {
            $this->initTemplateUns();
            $this->collTemplateUnsPartial = true;
        }
        if (!in_array($l, $this->collTemplateUns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUn($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUn $templateUn The templateUn object to add.
     */
    protected function doAddTemplateUn($templateUn)
    {
        $this->collTemplateUns[]= $templateUn;
        $templateUn->setJurusan($this);
    }

    /**
     * @param	TemplateUn $templateUn The templateUn object to remove.
     * @return Jurusan The current object (for fluent API support)
     */
    public function removeTemplateUn($templateUn)
    {
        if ($this->getTemplateUns()->contains($templateUn)) {
            $this->collTemplateUns->remove($this->collTemplateUns->search($templateUn));
            if (null === $this->templateUnsScheduledForDeletion) {
                $this->templateUnsScheduledForDeletion = clone $this->collTemplateUns;
                $this->templateUnsScheduledForDeletion->clear();
            }
            $this->templateUnsScheduledForDeletion[]= $templateUn;
            $templateUn->setJurusan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp3Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp3Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp4Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp4Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp7Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp7Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp5Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp5Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp1Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp1Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp2Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp2Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp6Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp6Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Jurusan is new, it will return
     * an empty collection; or if this Jurusan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Jurusan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jurusan_id = null;
        $this->nama_jurusan = null;
        $this->untuk_sma = null;
        $this->untuk_smk = null;
        $this->untuk_pt = null;
        $this->untuk_slb = null;
        $this->untuk_smklb = null;
        $this->jenjang_pendidikan_id = null;
        $this->jurusan_induk = null;
        $this->level_bidang_id = null;
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
            if ($this->collJurusansRelatedByJurusanId) {
                foreach ($this->collJurusansRelatedByJurusanId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurusanSps) {
                foreach ($this->collJurusanSps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKurikulums) {
                foreach ($this->collKurikulums as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMataPelajarans) {
                foreach ($this->collMataPelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPemakaiPrasaranas) {
                foreach ($this->collPemakaiPrasaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPemakaiSaranas) {
                foreach ($this->collPemakaiSaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStandarSaranas) {
                foreach ($this->collStandarSaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUns) {
                foreach ($this->collTemplateUns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJurusanRelatedByJurusanInduk instanceof Persistent) {
              $this->aJurusanRelatedByJurusanInduk->clearAllReferences($deep);
            }
            if ($this->aKelompokBidang instanceof Persistent) {
              $this->aKelompokBidang->clearAllReferences($deep);
            }
            if ($this->aJenjangPendidikan instanceof Persistent) {
              $this->aJenjangPendidikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collJurusansRelatedByJurusanId instanceof PropelCollection) {
            $this->collJurusansRelatedByJurusanId->clearIterator();
        }
        $this->collJurusansRelatedByJurusanId = null;
        if ($this->collJurusanSps instanceof PropelCollection) {
            $this->collJurusanSps->clearIterator();
        }
        $this->collJurusanSps = null;
        if ($this->collKurikulums instanceof PropelCollection) {
            $this->collKurikulums->clearIterator();
        }
        $this->collKurikulums = null;
        if ($this->collMataPelajarans instanceof PropelCollection) {
            $this->collMataPelajarans->clearIterator();
        }
        $this->collMataPelajarans = null;
        if ($this->collPemakaiPrasaranas instanceof PropelCollection) {
            $this->collPemakaiPrasaranas->clearIterator();
        }
        $this->collPemakaiPrasaranas = null;
        if ($this->collPemakaiSaranas instanceof PropelCollection) {
            $this->collPemakaiSaranas->clearIterator();
        }
        $this->collPemakaiSaranas = null;
        if ($this->collStandarSaranas instanceof PropelCollection) {
            $this->collStandarSaranas->clearIterator();
        }
        $this->collStandarSaranas = null;
        if ($this->collTemplateUns instanceof PropelCollection) {
            $this->collTemplateUns->clearIterator();
        }
        $this->collTemplateUns = null;
        $this->aJurusanRelatedByJurusanInduk = null;
        $this->aKelompokBidang = null;
        $this->aJenjangPendidikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JurusanPeer::DEFAULT_STRING_FORMAT);
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
