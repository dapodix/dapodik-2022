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
use DataDikdas\Model\LembSertifikasi;
use DataDikdas\Model\LembSertifikasiQuery;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\LembagaAkreditasiQuery;
use DataDikdas\Model\LogOtorisasi;
use DataDikdas\Model\LogOtorisasiQuery;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\PenggunaQuery;
use DataDikdas\Model\Peran;
use DataDikdas\Model\PeranQuery;
use DataDikdas\Model\RolePengguna;
use DataDikdas\Model\RolePenggunaPeer;
use DataDikdas\Model\RolePenggunaQuery;

/**
 * Base class that represents a row from the 'man_akses.role_pengguna' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRolePengguna extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RolePenggunaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RolePenggunaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_role_pengguna field.
     * @var        string
     */
    protected $id_role_pengguna;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the lembaga_id field.
     * @var        string
     */
    protected $lembaga_id;

    /**
     * The value for the yayasan_id field.
     * @var        string
     */
    protected $yayasan_id;

    /**
     * The value for the la_id field.
     * @var        string
     */
    protected $la_id;

    /**
     * The value for the dudi_id field.
     * @var        string
     */
    protected $dudi_id;

    /**
     * The value for the kode_lemb_sert field.
     * @var        string
     */
    protected $kode_lemb_sert;

    /**
     * The value for the pengguna_id field.
     * @var        string
     */
    protected $pengguna_id;

    /**
     * The value for the peran_id field.
     * @var        int
     */
    protected $peran_id;

    /**
     * The value for the sk_penugasan field.
     * @var        string
     */
    protected $sk_penugasan;

    /**
     * The value for the tgl_sk_penugasan field.
     * @var        string
     */
    protected $tgl_sk_penugasan;

    /**
     * The value for the approval_peran field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $approval_peran;

    /**
     * The value for the tgl_kadaluwarsa field.
     * @var        string
     */
    protected $tgl_kadaluwarsa;

    /**
     * The value for the last_active field.
     * @var        string
     */
    protected $last_active;

    /**
     * The value for the jenis_lembaga field.
     * @var        string
     */
    protected $jenis_lembaga;

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
     * @var        Peran
     */
    protected $aPeran;

    /**
     * @var        LembSertifikasi
     */
    protected $aLembSertifikasi;

    /**
     * @var        Pengguna
     */
    protected $aPengguna;

    /**
     * @var        LembagaAkreditasi
     */
    protected $aLembagaAkreditasi;

    /**
     * @var        PropelObjectCollection|LogOtorisasi[] Collection to store aggregation of LogOtorisasi objects.
     */
    protected $collLogOtorisasis;
    protected $collLogOtorisasisPartial;

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
    protected $logOtorisasisScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->approval_peran = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseRolePengguna object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_role_pengguna] column value.
     * 
     * @return string
     */
    public function getIdRolePengguna()
    {
        return $this->id_role_pengguna;
    }

    /**
     * Get the [sekolah_id] column value.
     * 
     * @return string
     */
    public function getSekolahId()
    {
        return $this->sekolah_id;
    }

    /**
     * Get the [lembaga_id] column value.
     * 
     * @return string
     */
    public function getLembagaId()
    {
        return $this->lembaga_id;
    }

    /**
     * Get the [yayasan_id] column value.
     * 
     * @return string
     */
    public function getYayasanId()
    {
        return $this->yayasan_id;
    }

    /**
     * Get the [la_id] column value.
     * 
     * @return string
     */
    public function getLaId()
    {
        return $this->la_id;
    }

    /**
     * Get the [dudi_id] column value.
     * 
     * @return string
     */
    public function getDudiId()
    {
        return $this->dudi_id;
    }

    /**
     * Get the [kode_lemb_sert] column value.
     * 
     * @return string
     */
    public function getKodeLembSert()
    {
        return $this->kode_lemb_sert;
    }

    /**
     * Get the [pengguna_id] column value.
     * 
     * @return string
     */
    public function getPenggunaId()
    {
        return $this->pengguna_id;
    }

    /**
     * Get the [peran_id] column value.
     * 
     * @return int
     */
    public function getPeranId()
    {
        return $this->peran_id;
    }

    /**
     * Get the [sk_penugasan] column value.
     * 
     * @return string
     */
    public function getSkPenugasan()
    {
        return $this->sk_penugasan;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_sk_penugasan] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglSkPenugasan($format = '%Y-%m-%d')
    {
        if ($this->tgl_sk_penugasan === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_sk_penugasan);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_sk_penugasan, true), $x);
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
     * Get the [approval_peran] column value.
     * 
     * @return string
     */
    public function getApprovalPeran()
    {
        return $this->approval_peran;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_kadaluwarsa] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglKadaluwarsa($format = '%Y-%m-%d')
    {
        if ($this->tgl_kadaluwarsa === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_kadaluwarsa);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_kadaluwarsa, true), $x);
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
     * Get the [optionally formatted] temporal [last_active] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastActive($format = 'Y-m-d H:i:s')
    {
        if ($this->last_active === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_active);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_active, true), $x);
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
     * Get the [jenis_lembaga] column value.
     * 
     * @return string
     */
    public function getJenisLembaga()
    {
        return $this->jenis_lembaga;
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
     * Set the value of [id_role_pengguna] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setIdRolePengguna($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_role_pengguna !== $v) {
            $this->id_role_pengguna = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::ID_ROLE_PENGGUNA;
        }


        return $this;
    } // setIdRolePengguna()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::SEKOLAH_ID;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [lembaga_id] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setLembagaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lembaga_id !== $v) {
            $this->lembaga_id = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::LEMBAGA_ID;
        }


        return $this;
    } // setLembagaId()

    /**
     * Set the value of [yayasan_id] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setYayasanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->yayasan_id !== $v) {
            $this->yayasan_id = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::YAYASAN_ID;
        }


        return $this;
    } // setYayasanId()

    /**
     * Set the value of [la_id] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setLaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->la_id !== $v) {
            $this->la_id = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::LA_ID;
        }

        if ($this->aLembagaAkreditasi !== null && $this->aLembagaAkreditasi->getLaId() !== $v) {
            $this->aLembagaAkreditasi = null;
        }


        return $this;
    } // setLaId()

    /**
     * Set the value of [dudi_id] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setDudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dudi_id !== $v) {
            $this->dudi_id = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::DUDI_ID;
        }


        return $this;
    } // setDudiId()

    /**
     * Set the value of [kode_lemb_sert] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setKodeLembSert($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_lemb_sert !== $v) {
            $this->kode_lemb_sert = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::KODE_LEMB_SERT;
        }

        if ($this->aLembSertifikasi !== null && $this->aLembSertifikasi->getKodeLembSert() !== $v) {
            $this->aLembSertifikasi = null;
        }


        return $this;
    } // setKodeLembSert()

    /**
     * Set the value of [pengguna_id] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setPenggunaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pengguna_id !== $v) {
            $this->pengguna_id = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::PENGGUNA_ID;
        }

        if ($this->aPengguna !== null && $this->aPengguna->getPenggunaId() !== $v) {
            $this->aPengguna = null;
        }


        return $this;
    } // setPenggunaId()

    /**
     * Set the value of [peran_id] column.
     * 
     * @param int $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setPeranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->peran_id !== $v) {
            $this->peran_id = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::PERAN_ID;
        }

        if ($this->aPeran !== null && $this->aPeran->getPeranId() !== $v) {
            $this->aPeran = null;
        }


        return $this;
    } // setPeranId()

    /**
     * Set the value of [sk_penugasan] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setSkPenugasan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_penugasan !== $v) {
            $this->sk_penugasan = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::SK_PENUGASAN;
        }


        return $this;
    } // setSkPenugasan()

    /**
     * Sets the value of [tgl_sk_penugasan] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setTglSkPenugasan($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_sk_penugasan !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_sk_penugasan !== null && $tmpDt = new DateTime($this->tgl_sk_penugasan)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_sk_penugasan = $newDateAsString;
                $this->modifiedColumns[] = RolePenggunaPeer::TGL_SK_PENUGASAN;
            }
        } // if either are not null


        return $this;
    } // setTglSkPenugasan()

    /**
     * Set the value of [approval_peran] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setApprovalPeran($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->approval_peran !== $v) {
            $this->approval_peran = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::APPROVAL_PERAN;
        }


        return $this;
    } // setApprovalPeran()

    /**
     * Sets the value of [tgl_kadaluwarsa] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setTglKadaluwarsa($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_kadaluwarsa !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_kadaluwarsa !== null && $tmpDt = new DateTime($this->tgl_kadaluwarsa)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_kadaluwarsa = $newDateAsString;
                $this->modifiedColumns[] = RolePenggunaPeer::TGL_KADALUWARSA;
            }
        } // if either are not null


        return $this;
    } // setTglKadaluwarsa()

    /**
     * Sets the value of [last_active] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setLastActive($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_active !== null || $dt !== null) {
            $currentDateAsString = ($this->last_active !== null && $tmpDt = new DateTime($this->last_active)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_active = $newDateAsString;
                $this->modifiedColumns[] = RolePenggunaPeer::LAST_ACTIVE;
            }
        } // if either are not null


        return $this;
    } // setLastActive()

    /**
     * Set the value of [jenis_lembaga] column.
     * 
     * @param string $v new value
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setJenisLembaga($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_lembaga !== $v) {
            $this->jenis_lembaga = $v;
            $this->modifiedColumns[] = RolePenggunaPeer::JENIS_LEMBAGA;
        }


        return $this;
    } // setJenisLembaga()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RolePenggunaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RolePenggunaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = RolePenggunaPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RolePengguna The current object (for fluent API support)
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
                $this->modifiedColumns[] = RolePenggunaPeer::LAST_SYNC;
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
            if ($this->approval_peran !== '0') {
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

            $this->id_role_pengguna = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->sekolah_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->lembaga_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->yayasan_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->la_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->dudi_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kode_lemb_sert = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->pengguna_id = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->peran_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->sk_penugasan = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->tgl_sk_penugasan = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->approval_peran = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->tgl_kadaluwarsa = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_active = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->jenis_lembaga = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->create_date = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->last_update = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->expired_date = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->last_sync = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 19; // 19 = RolePenggunaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RolePengguna object", $e);
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

        if ($this->aLembagaAkreditasi !== null && $this->la_id !== $this->aLembagaAkreditasi->getLaId()) {
            $this->aLembagaAkreditasi = null;
        }
        if ($this->aLembSertifikasi !== null && $this->kode_lemb_sert !== $this->aLembSertifikasi->getKodeLembSert()) {
            $this->aLembSertifikasi = null;
        }
        if ($this->aPengguna !== null && $this->pengguna_id !== $this->aPengguna->getPenggunaId()) {
            $this->aPengguna = null;
        }
        if ($this->aPeran !== null && $this->peran_id !== $this->aPeran->getPeranId()) {
            $this->aPeran = null;
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
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RolePenggunaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPeran = null;
            $this->aLembSertifikasi = null;
            $this->aPengguna = null;
            $this->aLembagaAkreditasi = null;
            $this->collLogOtorisasis = null;

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
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RolePenggunaQuery::create()
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
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RolePenggunaPeer::addInstanceToPool($this);
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

            if ($this->aPeran !== null) {
                if ($this->aPeran->isModified() || $this->aPeran->isNew()) {
                    $affectedRows += $this->aPeran->save($con);
                }
                $this->setPeran($this->aPeran);
            }

            if ($this->aLembSertifikasi !== null) {
                if ($this->aLembSertifikasi->isModified() || $this->aLembSertifikasi->isNew()) {
                    $affectedRows += $this->aLembSertifikasi->save($con);
                }
                $this->setLembSertifikasi($this->aLembSertifikasi);
            }

            if ($this->aPengguna !== null) {
                if ($this->aPengguna->isModified() || $this->aPengguna->isNew()) {
                    $affectedRows += $this->aPengguna->save($con);
                }
                $this->setPengguna($this->aPengguna);
            }

            if ($this->aLembagaAkreditasi !== null) {
                if ($this->aLembagaAkreditasi->isModified() || $this->aLembagaAkreditasi->isNew()) {
                    $affectedRows += $this->aLembagaAkreditasi->save($con);
                }
                $this->setLembagaAkreditasi($this->aLembagaAkreditasi);
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

            if ($this->logOtorisasisScheduledForDeletion !== null) {
                if (!$this->logOtorisasisScheduledForDeletion->isEmpty()) {
                    LogOtorisasiQuery::create()
                        ->filterByPrimaryKeys($this->logOtorisasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->logOtorisasisScheduledForDeletion = null;
                }
            }

            if ($this->collLogOtorisasis !== null) {
                foreach ($this->collLogOtorisasis as $referrerFK) {
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
        if ($this->isColumnModified(RolePenggunaPeer::ID_ROLE_PENGGUNA)) {
            $modifiedColumns[':p' . $index++]  = '"id_role_pengguna"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::LEMBAGA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"lembaga_id"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::YAYASAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"yayasan_id"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::LA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"la_id"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::DUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"dudi_id"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::KODE_LEMB_SERT)) {
            $modifiedColumns[':p' . $index++]  = '"kode_lemb_sert"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::PENGGUNA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pengguna_id"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::PERAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peran_id"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::SK_PENUGASAN)) {
            $modifiedColumns[':p' . $index++]  = '"sk_penugasan"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::TGL_SK_PENUGASAN)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_sk_penugasan"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::APPROVAL_PERAN)) {
            $modifiedColumns[':p' . $index++]  = '"approval_peran"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::TGL_KADALUWARSA)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_kadaluwarsa"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::LAST_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '"last_active"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::JENIS_LEMBAGA)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_lembaga"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(RolePenggunaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "man_akses"."role_pengguna" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_role_pengguna"':						
                        $stmt->bindValue($identifier, $this->id_role_pengguna, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"lembaga_id"':						
                        $stmt->bindValue($identifier, $this->lembaga_id, PDO::PARAM_STR);
                        break;
                    case '"yayasan_id"':						
                        $stmt->bindValue($identifier, $this->yayasan_id, PDO::PARAM_STR);
                        break;
                    case '"la_id"':						
                        $stmt->bindValue($identifier, $this->la_id, PDO::PARAM_STR);
                        break;
                    case '"dudi_id"':						
                        $stmt->bindValue($identifier, $this->dudi_id, PDO::PARAM_STR);
                        break;
                    case '"kode_lemb_sert"':						
                        $stmt->bindValue($identifier, $this->kode_lemb_sert, PDO::PARAM_STR);
                        break;
                    case '"pengguna_id"':						
                        $stmt->bindValue($identifier, $this->pengguna_id, PDO::PARAM_STR);
                        break;
                    case '"peran_id"':						
                        $stmt->bindValue($identifier, $this->peran_id, PDO::PARAM_INT);
                        break;
                    case '"sk_penugasan"':						
                        $stmt->bindValue($identifier, $this->sk_penugasan, PDO::PARAM_STR);
                        break;
                    case '"tgl_sk_penugasan"':						
                        $stmt->bindValue($identifier, $this->tgl_sk_penugasan, PDO::PARAM_STR);
                        break;
                    case '"approval_peran"':						
                        $stmt->bindValue($identifier, $this->approval_peran, PDO::PARAM_STR);
                        break;
                    case '"tgl_kadaluwarsa"':						
                        $stmt->bindValue($identifier, $this->tgl_kadaluwarsa, PDO::PARAM_STR);
                        break;
                    case '"last_active"':						
                        $stmt->bindValue($identifier, $this->last_active, PDO::PARAM_STR);
                        break;
                    case '"jenis_lembaga"':						
                        $stmt->bindValue($identifier, $this->jenis_lembaga, PDO::PARAM_STR);
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

            if ($this->aPeran !== null) {
                if (!$this->aPeran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPeran->getValidationFailures());
                }
            }

            if ($this->aLembSertifikasi !== null) {
                if (!$this->aLembSertifikasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLembSertifikasi->getValidationFailures());
                }
            }

            if ($this->aPengguna !== null) {
                if (!$this->aPengguna->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPengguna->getValidationFailures());
                }
            }

            if ($this->aLembagaAkreditasi !== null) {
                if (!$this->aLembagaAkreditasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLembagaAkreditasi->getValidationFailures());
                }
            }


            if (($retval = RolePenggunaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collLogOtorisasis !== null) {
                    foreach ($this->collLogOtorisasis as $referrerFK) {
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
        $pos = RolePenggunaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdRolePengguna();
                break;
            case 1:
                return $this->getSekolahId();
                break;
            case 2:
                return $this->getLembagaId();
                break;
            case 3:
                return $this->getYayasanId();
                break;
            case 4:
                return $this->getLaId();
                break;
            case 5:
                return $this->getDudiId();
                break;
            case 6:
                return $this->getKodeLembSert();
                break;
            case 7:
                return $this->getPenggunaId();
                break;
            case 8:
                return $this->getPeranId();
                break;
            case 9:
                return $this->getSkPenugasan();
                break;
            case 10:
                return $this->getTglSkPenugasan();
                break;
            case 11:
                return $this->getApprovalPeran();
                break;
            case 12:
                return $this->getTglKadaluwarsa();
                break;
            case 13:
                return $this->getLastActive();
                break;
            case 14:
                return $this->getJenisLembaga();
                break;
            case 15:
                return $this->getCreateDate();
                break;
            case 16:
                return $this->getLastUpdate();
                break;
            case 17:
                return $this->getExpiredDate();
                break;
            case 18:
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
        if (isset($alreadyDumpedObjects['RolePengguna'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RolePengguna'][$this->getPrimaryKey()] = true;
        $keys = RolePenggunaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdRolePengguna(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getLembagaId(),
            $keys[3] => $this->getYayasanId(),
            $keys[4] => $this->getLaId(),
            $keys[5] => $this->getDudiId(),
            $keys[6] => $this->getKodeLembSert(),
            $keys[7] => $this->getPenggunaId(),
            $keys[8] => $this->getPeranId(),
            $keys[9] => $this->getSkPenugasan(),
            $keys[10] => $this->getTglSkPenugasan(),
            $keys[11] => $this->getApprovalPeran(),
            $keys[12] => $this->getTglKadaluwarsa(),
            $keys[13] => $this->getLastActive(),
            $keys[14] => $this->getJenisLembaga(),
            $keys[15] => $this->getCreateDate(),
            $keys[16] => $this->getLastUpdate(),
            $keys[17] => $this->getExpiredDate(),
            $keys[18] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPeran) {
                $result['Peran'] = $this->aPeran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLembSertifikasi) {
                $result['LembSertifikasi'] = $this->aLembSertifikasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPengguna) {
                $result['Pengguna'] = $this->aPengguna->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLembagaAkreditasi) {
                $result['LembagaAkreditasi'] = $this->aLembagaAkreditasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collLogOtorisasis) {
                $result['LogOtorisasis'] = $this->collLogOtorisasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RolePenggunaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdRolePengguna($value);
                break;
            case 1:
                $this->setSekolahId($value);
                break;
            case 2:
                $this->setLembagaId($value);
                break;
            case 3:
                $this->setYayasanId($value);
                break;
            case 4:
                $this->setLaId($value);
                break;
            case 5:
                $this->setDudiId($value);
                break;
            case 6:
                $this->setKodeLembSert($value);
                break;
            case 7:
                $this->setPenggunaId($value);
                break;
            case 8:
                $this->setPeranId($value);
                break;
            case 9:
                $this->setSkPenugasan($value);
                break;
            case 10:
                $this->setTglSkPenugasan($value);
                break;
            case 11:
                $this->setApprovalPeran($value);
                break;
            case 12:
                $this->setTglKadaluwarsa($value);
                break;
            case 13:
                $this->setLastActive($value);
                break;
            case 14:
                $this->setJenisLembaga($value);
                break;
            case 15:
                $this->setCreateDate($value);
                break;
            case 16:
                $this->setLastUpdate($value);
                break;
            case 17:
                $this->setExpiredDate($value);
                break;
            case 18:
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
        $keys = RolePenggunaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdRolePengguna($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSekolahId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLembagaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setYayasanId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLaId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDudiId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKodeLembSert($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPenggunaId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPeranId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSkPenugasan($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTglSkPenugasan($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setApprovalPeran($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTglKadaluwarsa($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastActive($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setJenisLembaga($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setCreateDate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setLastUpdate($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setExpiredDate($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setLastSync($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RolePenggunaPeer::DATABASE_NAME);

        if ($this->isColumnModified(RolePenggunaPeer::ID_ROLE_PENGGUNA)) $criteria->add(RolePenggunaPeer::ID_ROLE_PENGGUNA, $this->id_role_pengguna);
        if ($this->isColumnModified(RolePenggunaPeer::SEKOLAH_ID)) $criteria->add(RolePenggunaPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(RolePenggunaPeer::LEMBAGA_ID)) $criteria->add(RolePenggunaPeer::LEMBAGA_ID, $this->lembaga_id);
        if ($this->isColumnModified(RolePenggunaPeer::YAYASAN_ID)) $criteria->add(RolePenggunaPeer::YAYASAN_ID, $this->yayasan_id);
        if ($this->isColumnModified(RolePenggunaPeer::LA_ID)) $criteria->add(RolePenggunaPeer::LA_ID, $this->la_id);
        if ($this->isColumnModified(RolePenggunaPeer::DUDI_ID)) $criteria->add(RolePenggunaPeer::DUDI_ID, $this->dudi_id);
        if ($this->isColumnModified(RolePenggunaPeer::KODE_LEMB_SERT)) $criteria->add(RolePenggunaPeer::KODE_LEMB_SERT, $this->kode_lemb_sert);
        if ($this->isColumnModified(RolePenggunaPeer::PENGGUNA_ID)) $criteria->add(RolePenggunaPeer::PENGGUNA_ID, $this->pengguna_id);
        if ($this->isColumnModified(RolePenggunaPeer::PERAN_ID)) $criteria->add(RolePenggunaPeer::PERAN_ID, $this->peran_id);
        if ($this->isColumnModified(RolePenggunaPeer::SK_PENUGASAN)) $criteria->add(RolePenggunaPeer::SK_PENUGASAN, $this->sk_penugasan);
        if ($this->isColumnModified(RolePenggunaPeer::TGL_SK_PENUGASAN)) $criteria->add(RolePenggunaPeer::TGL_SK_PENUGASAN, $this->tgl_sk_penugasan);
        if ($this->isColumnModified(RolePenggunaPeer::APPROVAL_PERAN)) $criteria->add(RolePenggunaPeer::APPROVAL_PERAN, $this->approval_peran);
        if ($this->isColumnModified(RolePenggunaPeer::TGL_KADALUWARSA)) $criteria->add(RolePenggunaPeer::TGL_KADALUWARSA, $this->tgl_kadaluwarsa);
        if ($this->isColumnModified(RolePenggunaPeer::LAST_ACTIVE)) $criteria->add(RolePenggunaPeer::LAST_ACTIVE, $this->last_active);
        if ($this->isColumnModified(RolePenggunaPeer::JENIS_LEMBAGA)) $criteria->add(RolePenggunaPeer::JENIS_LEMBAGA, $this->jenis_lembaga);
        if ($this->isColumnModified(RolePenggunaPeer::CREATE_DATE)) $criteria->add(RolePenggunaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RolePenggunaPeer::LAST_UPDATE)) $criteria->add(RolePenggunaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RolePenggunaPeer::EXPIRED_DATE)) $criteria->add(RolePenggunaPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(RolePenggunaPeer::LAST_SYNC)) $criteria->add(RolePenggunaPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(RolePenggunaPeer::DATABASE_NAME);
        $criteria->add(RolePenggunaPeer::ID_ROLE_PENGGUNA, $this->id_role_pengguna);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdRolePengguna();
    }

    /**
     * Generic method to set the primary key (id_role_pengguna column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdRolePengguna($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdRolePengguna();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RolePengguna (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setLembagaId($this->getLembagaId());
        $copyObj->setYayasanId($this->getYayasanId());
        $copyObj->setLaId($this->getLaId());
        $copyObj->setDudiId($this->getDudiId());
        $copyObj->setKodeLembSert($this->getKodeLembSert());
        $copyObj->setPenggunaId($this->getPenggunaId());
        $copyObj->setPeranId($this->getPeranId());
        $copyObj->setSkPenugasan($this->getSkPenugasan());
        $copyObj->setTglSkPenugasan($this->getTglSkPenugasan());
        $copyObj->setApprovalPeran($this->getApprovalPeran());
        $copyObj->setTglKadaluwarsa($this->getTglKadaluwarsa());
        $copyObj->setLastActive($this->getLastActive());
        $copyObj->setJenisLembaga($this->getJenisLembaga());
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

            foreach ($this->getLogOtorisasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLogOtorisasi($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdRolePengguna(NULL); // this is a auto-increment column, so set to default value
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
     * @return RolePengguna Clone of current object.
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
     * @return RolePenggunaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RolePenggunaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Peran object.
     *
     * @param             Peran $v
     * @return RolePengguna The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPeran(Peran $v = null)
    {
        if ($v === null) {
            $this->setPeranId(NULL);
        } else {
            $this->setPeranId($v->getPeranId());
        }

        $this->aPeran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Peran object, it will not be re-added.
        if ($v !== null) {
            $v->addRolePengguna($this);
        }


        return $this;
    }


    /**
     * Get the associated Peran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Peran The associated Peran object.
     * @throws PropelException
     */
    public function getPeran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPeran === null && ($this->peran_id !== null) && $doQuery) {
            $this->aPeran = PeranQuery::create()->findPk($this->peran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPeran->addRolePenggunas($this);
             */
        }

        return $this->aPeran;
    }

    /**
     * Declares an association between this object and a LembSertifikasi object.
     *
     * @param             LembSertifikasi $v
     * @return RolePengguna The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLembSertifikasi(LembSertifikasi $v = null)
    {
        if ($v === null) {
            $this->setKodeLembSert(NULL);
        } else {
            $this->setKodeLembSert($v->getKodeLembSert());
        }

        $this->aLembSertifikasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LembSertifikasi object, it will not be re-added.
        if ($v !== null) {
            $v->addRolePengguna($this);
        }


        return $this;
    }


    /**
     * Get the associated LembSertifikasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LembSertifikasi The associated LembSertifikasi object.
     * @throws PropelException
     */
    public function getLembSertifikasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLembSertifikasi === null && (($this->kode_lemb_sert !== "" && $this->kode_lemb_sert !== null)) && $doQuery) {
            $this->aLembSertifikasi = LembSertifikasiQuery::create()->findPk($this->kode_lemb_sert, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLembSertifikasi->addRolePenggunas($this);
             */
        }

        return $this->aLembSertifikasi;
    }

    /**
     * Declares an association between this object and a Pengguna object.
     *
     * @param             Pengguna $v
     * @return RolePengguna The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPengguna(Pengguna $v = null)
    {
        if ($v === null) {
            $this->setPenggunaId(NULL);
        } else {
            $this->setPenggunaId($v->getPenggunaId());
        }

        $this->aPengguna = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pengguna object, it will not be re-added.
        if ($v !== null) {
            $v->addRolePengguna($this);
        }


        return $this;
    }


    /**
     * Get the associated Pengguna object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pengguna The associated Pengguna object.
     * @throws PropelException
     */
    public function getPengguna(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPengguna === null && (($this->pengguna_id !== "" && $this->pengguna_id !== null)) && $doQuery) {
            $this->aPengguna = PenggunaQuery::create()->findPk($this->pengguna_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPengguna->addRolePenggunas($this);
             */
        }

        return $this->aPengguna;
    }

    /**
     * Declares an association between this object and a LembagaAkreditasi object.
     *
     * @param             LembagaAkreditasi $v
     * @return RolePengguna The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLembagaAkreditasi(LembagaAkreditasi $v = null)
    {
        if ($v === null) {
            $this->setLaId(NULL);
        } else {
            $this->setLaId($v->getLaId());
        }

        $this->aLembagaAkreditasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LembagaAkreditasi object, it will not be re-added.
        if ($v !== null) {
            $v->addRolePengguna($this);
        }


        return $this;
    }


    /**
     * Get the associated LembagaAkreditasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LembagaAkreditasi The associated LembagaAkreditasi object.
     * @throws PropelException
     */
    public function getLembagaAkreditasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLembagaAkreditasi === null && (($this->la_id !== "" && $this->la_id !== null)) && $doQuery) {
            $this->aLembagaAkreditasi = LembagaAkreditasiQuery::create()->findPk($this->la_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLembagaAkreditasi->addRolePenggunas($this);
             */
        }

        return $this->aLembagaAkreditasi;
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
        if ('LogOtorisasi' == $relationName) {
            $this->initLogOtorisasis();
        }
    }

    /**
     * Clears out the collLogOtorisasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RolePengguna The current object (for fluent API support)
     * @see        addLogOtorisasis()
     */
    public function clearLogOtorisasis()
    {
        $this->collLogOtorisasis = null; // important to set this to null since that means it is uninitialized
        $this->collLogOtorisasisPartial = null;

        return $this;
    }

    /**
     * reset is the collLogOtorisasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialLogOtorisasis($v = true)
    {
        $this->collLogOtorisasisPartial = $v;
    }

    /**
     * Initializes the collLogOtorisasis collection.
     *
     * By default this just sets the collLogOtorisasis collection to an empty array (like clearcollLogOtorisasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLogOtorisasis($overrideExisting = true)
    {
        if (null !== $this->collLogOtorisasis && !$overrideExisting) {
            return;
        }
        $this->collLogOtorisasis = new PropelObjectCollection();
        $this->collLogOtorisasis->setModel('LogOtorisasi');
    }

    /**
     * Gets an array of LogOtorisasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RolePengguna is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|LogOtorisasi[] List of LogOtorisasi objects
     * @throws PropelException
     */
    public function getLogOtorisasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLogOtorisasisPartial && !$this->isNew();
        if (null === $this->collLogOtorisasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLogOtorisasis) {
                // return empty collection
                $this->initLogOtorisasis();
            } else {
                $collLogOtorisasis = LogOtorisasiQuery::create(null, $criteria)
                    ->filterByRolePengguna($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLogOtorisasisPartial && count($collLogOtorisasis)) {
                      $this->initLogOtorisasis(false);

                      foreach($collLogOtorisasis as $obj) {
                        if (false == $this->collLogOtorisasis->contains($obj)) {
                          $this->collLogOtorisasis->append($obj);
                        }
                      }

                      $this->collLogOtorisasisPartial = true;
                    }

                    $collLogOtorisasis->getInternalIterator()->rewind();
                    return $collLogOtorisasis;
                }

                if($partial && $this->collLogOtorisasis) {
                    foreach($this->collLogOtorisasis as $obj) {
                        if($obj->isNew()) {
                            $collLogOtorisasis[] = $obj;
                        }
                    }
                }

                $this->collLogOtorisasis = $collLogOtorisasis;
                $this->collLogOtorisasisPartial = false;
            }
        }

        return $this->collLogOtorisasis;
    }

    /**
     * Sets a collection of LogOtorisasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $logOtorisasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RolePengguna The current object (for fluent API support)
     */
    public function setLogOtorisasis(PropelCollection $logOtorisasis, PropelPDO $con = null)
    {
        $logOtorisasisToDelete = $this->getLogOtorisasis(new Criteria(), $con)->diff($logOtorisasis);

        $this->logOtorisasisScheduledForDeletion = unserialize(serialize($logOtorisasisToDelete));

        foreach ($logOtorisasisToDelete as $logOtorisasiRemoved) {
            $logOtorisasiRemoved->setRolePengguna(null);
        }

        $this->collLogOtorisasis = null;
        foreach ($logOtorisasis as $logOtorisasi) {
            $this->addLogOtorisasi($logOtorisasi);
        }

        $this->collLogOtorisasis = $logOtorisasis;
        $this->collLogOtorisasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related LogOtorisasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related LogOtorisasi objects.
     * @throws PropelException
     */
    public function countLogOtorisasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLogOtorisasisPartial && !$this->isNew();
        if (null === $this->collLogOtorisasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLogOtorisasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getLogOtorisasis());
            }
            $query = LogOtorisasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRolePengguna($this)
                ->count($con);
        }

        return count($this->collLogOtorisasis);
    }

    /**
     * Method called to associate a LogOtorisasi object to this object
     * through the LogOtorisasi foreign key attribute.
     *
     * @param    LogOtorisasi $l LogOtorisasi
     * @return RolePengguna The current object (for fluent API support)
     */
    public function addLogOtorisasi(LogOtorisasi $l)
    {
        if ($this->collLogOtorisasis === null) {
            $this->initLogOtorisasis();
            $this->collLogOtorisasisPartial = true;
        }
        if (!in_array($l, $this->collLogOtorisasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLogOtorisasi($l);
        }

        return $this;
    }

    /**
     * @param	LogOtorisasi $logOtorisasi The logOtorisasi object to add.
     */
    protected function doAddLogOtorisasi($logOtorisasi)
    {
        $this->collLogOtorisasis[]= $logOtorisasi;
        $logOtorisasi->setRolePengguna($this);
    }

    /**
     * @param	LogOtorisasi $logOtorisasi The logOtorisasi object to remove.
     * @return RolePengguna The current object (for fluent API support)
     */
    public function removeLogOtorisasi($logOtorisasi)
    {
        if ($this->getLogOtorisasis()->contains($logOtorisasi)) {
            $this->collLogOtorisasis->remove($this->collLogOtorisasis->search($logOtorisasi));
            if (null === $this->logOtorisasisScheduledForDeletion) {
                $this->logOtorisasisScheduledForDeletion = clone $this->collLogOtorisasis;
                $this->logOtorisasisScheduledForDeletion->clear();
            }
            $this->logOtorisasisScheduledForDeletion[]= clone $logOtorisasi;
            $logOtorisasi->setRolePengguna(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_role_pengguna = null;
        $this->sekolah_id = null;
        $this->lembaga_id = null;
        $this->yayasan_id = null;
        $this->la_id = null;
        $this->dudi_id = null;
        $this->kode_lemb_sert = null;
        $this->pengguna_id = null;
        $this->peran_id = null;
        $this->sk_penugasan = null;
        $this->tgl_sk_penugasan = null;
        $this->approval_peran = null;
        $this->tgl_kadaluwarsa = null;
        $this->last_active = null;
        $this->jenis_lembaga = null;
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
            if ($this->collLogOtorisasis) {
                foreach ($this->collLogOtorisasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPeran instanceof Persistent) {
              $this->aPeran->clearAllReferences($deep);
            }
            if ($this->aLembSertifikasi instanceof Persistent) {
              $this->aLembSertifikasi->clearAllReferences($deep);
            }
            if ($this->aPengguna instanceof Persistent) {
              $this->aPengguna->clearAllReferences($deep);
            }
            if ($this->aLembagaAkreditasi instanceof Persistent) {
              $this->aLembagaAkreditasi->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collLogOtorisasis instanceof PropelCollection) {
            $this->collLogOtorisasis->clearIterator();
        }
        $this->collLogOtorisasis = null;
        $this->aPeran = null;
        $this->aLembSertifikasi = null;
        $this->aPengguna = null;
        $this->aLembagaAkreditasi = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RolePenggunaPeer::DEFAULT_STRING_FORMAT);
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
