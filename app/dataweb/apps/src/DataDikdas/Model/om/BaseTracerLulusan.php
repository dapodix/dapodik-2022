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
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BidangUsaha;
use DataDikdas\Model\BidangUsahaQuery;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\DudiQuery;
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\PekerjaanQuery;
use DataDikdas\Model\Penghasilan;
use DataDikdas\Model\PenghasilanQuery;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidikQuery;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\TracerLulusanPeer;
use DataDikdas\Model\TracerLulusanQuery;

/**
 * Base class that represents a row from the 'tracer_lulusan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTracerLulusan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TracerLulusanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TracerLulusanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_tracer field.
     * @var        string
     */
    protected $id_tracer;

    /**
     * The value for the penghasilan_id field.
     * @var        int
     */
    protected $penghasilan_id;

    /**
     * The value for the registrasi_id field.
     * @var        string
     */
    protected $registrasi_id;

    /**
     * The value for the tgl_entry field.
     * @var        string
     */
    protected $tgl_entry;

    /**
     * The value for the akt_setelah_lulus field.
     * @var        string
     */
    protected $akt_setelah_lulus;

    /**
     * The value for the nm_inst_perusahaan field.
     * @var        string
     */
    protected $nm_inst_perusahaan;

    /**
     * The value for the nm_sp field.
     * @var        string
     */
    protected $nm_sp;

    /**
     * The value for the nm_prodi field.
     * @var        string
     */
    protected $nm_prodi;

    /**
     * The value for the ket_tracer field.
     * @var        string
     */
    protected $ket_tracer;

    /**
     * The value for the pekerjaan_id field.
     * @var        int
     */
    protected $pekerjaan_id;

    /**
     * The value for the dudi_id field.
     * @var        string
     */
    protected $dudi_id;

    /**
     * The value for the bidang_usaha_id field.
     * @var        string
     */
    protected $bidang_usaha_id;

    /**
     * The value for the id_prodi field.
     * @var        string
     */
    protected $id_prodi;

    /**
     * The value for the stat_tracer field.
     * @var        string
     */
    protected $stat_tracer;

    /**
     * The value for the ikatan_kerja field.
     * Note: this column has a database default value of: '*'
     * @var        string
     */
    protected $ikatan_kerja;

    /**
     * The value for the a_sesuai_kompetensi field.
     * @var        string
     */
    protected $a_sesuai_kompetensi;

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
     * @var        Penghasilan
     */
    protected $aPenghasilan;

    /**
     * @var        BidangUsaha
     */
    protected $aBidangUsaha;

    /**
     * @var        Dudi
     */
    protected $aDudi;

    /**
     * @var        Pekerjaan
     */
    protected $aPekerjaan;

    /**
     * @var        RegistrasiPesertaDidik
     */
    protected $aRegistrasiPesertaDidik;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->ikatan_kerja = '*';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseTracerLulusan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_tracer] column value.
     * 
     * @return string
     */
    public function getIdTracer()
    {
        return $this->id_tracer;
    }

    /**
     * Get the [penghasilan_id] column value.
     * 
     * @return int
     */
    public function getPenghasilanId()
    {
        return $this->penghasilan_id;
    }

    /**
     * Get the [registrasi_id] column value.
     * 
     * @return string
     */
    public function getRegistrasiId()
    {
        return $this->registrasi_id;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_entry] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglEntry($format = '%Y-%m-%d')
    {
        if ($this->tgl_entry === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_entry);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_entry, true), $x);
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
     * Get the [akt_setelah_lulus] column value.
     * 
     * @return string
     */
    public function getAktSetelahLulus()
    {
        return $this->akt_setelah_lulus;
    }

    /**
     * Get the [nm_inst_perusahaan] column value.
     * 
     * @return string
     */
    public function getNmInstPerusahaan()
    {
        return $this->nm_inst_perusahaan;
    }

    /**
     * Get the [nm_sp] column value.
     * 
     * @return string
     */
    public function getNmSp()
    {
        return $this->nm_sp;
    }

    /**
     * Get the [nm_prodi] column value.
     * 
     * @return string
     */
    public function getNmProdi()
    {
        return $this->nm_prodi;
    }

    /**
     * Get the [ket_tracer] column value.
     * 
     * @return string
     */
    public function getKetTracer()
    {
        return $this->ket_tracer;
    }

    /**
     * Get the [pekerjaan_id] column value.
     * 
     * @return int
     */
    public function getPekerjaanId()
    {
        return $this->pekerjaan_id;
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
     * Get the [bidang_usaha_id] column value.
     * 
     * @return string
     */
    public function getBidangUsahaId()
    {
        return $this->bidang_usaha_id;
    }

    /**
     * Get the [id_prodi] column value.
     * 
     * @return string
     */
    public function getIdProdi()
    {
        return $this->id_prodi;
    }

    /**
     * Get the [stat_tracer] column value.
     * 
     * @return string
     */
    public function getStatTracer()
    {
        return $this->stat_tracer;
    }

    /**
     * Get the [ikatan_kerja] column value.
     * 
     * @return string
     */
    public function getIkatanKerja()
    {
        return $this->ikatan_kerja;
    }

    /**
     * Get the [a_sesuai_kompetensi] column value.
     * 
     * @return string
     */
    public function getASesuaiKompetensi()
    {
        return $this->a_sesuai_kompetensi;
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
     * Set the value of [id_tracer] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setIdTracer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_tracer !== $v) {
            $this->id_tracer = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::ID_TRACER;
        }


        return $this;
    } // setIdTracer()

    /**
     * Set the value of [penghasilan_id] column.
     * 
     * @param int $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setPenghasilanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->penghasilan_id !== $v) {
            $this->penghasilan_id = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::PENGHASILAN_ID;
        }

        if ($this->aPenghasilan !== null && $this->aPenghasilan->getPenghasilanId() !== $v) {
            $this->aPenghasilan = null;
        }


        return $this;
    } // setPenghasilanId()

    /**
     * Set the value of [registrasi_id] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setRegistrasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->registrasi_id !== $v) {
            $this->registrasi_id = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::REGISTRASI_ID;
        }

        if ($this->aRegistrasiPesertaDidik !== null && $this->aRegistrasiPesertaDidik->getRegistrasiId() !== $v) {
            $this->aRegistrasiPesertaDidik = null;
        }


        return $this;
    } // setRegistrasiId()

    /**
     * Sets the value of [tgl_entry] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setTglEntry($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_entry !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_entry !== null && $tmpDt = new DateTime($this->tgl_entry)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_entry = $newDateAsString;
                $this->modifiedColumns[] = TracerLulusanPeer::TGL_ENTRY;
            }
        } // if either are not null


        return $this;
    } // setTglEntry()

    /**
     * Set the value of [akt_setelah_lulus] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setAktSetelahLulus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->akt_setelah_lulus !== $v) {
            $this->akt_setelah_lulus = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::AKT_SETELAH_LULUS;
        }


        return $this;
    } // setAktSetelahLulus()

    /**
     * Set the value of [nm_inst_perusahaan] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setNmInstPerusahaan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_inst_perusahaan !== $v) {
            $this->nm_inst_perusahaan = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::NM_INST_PERUSAHAAN;
        }


        return $this;
    } // setNmInstPerusahaan()

    /**
     * Set the value of [nm_sp] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setNmSp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_sp !== $v) {
            $this->nm_sp = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::NM_SP;
        }


        return $this;
    } // setNmSp()

    /**
     * Set the value of [nm_prodi] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setNmProdi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_prodi !== $v) {
            $this->nm_prodi = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::NM_PRODI;
        }


        return $this;
    } // setNmProdi()

    /**
     * Set the value of [ket_tracer] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setKetTracer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_tracer !== $v) {
            $this->ket_tracer = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::KET_TRACER;
        }


        return $this;
    } // setKetTracer()

    /**
     * Set the value of [pekerjaan_id] column.
     * 
     * @param int $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setPekerjaanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pekerjaan_id !== $v) {
            $this->pekerjaan_id = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::PEKERJAAN_ID;
        }

        if ($this->aPekerjaan !== null && $this->aPekerjaan->getPekerjaanId() !== $v) {
            $this->aPekerjaan = null;
        }


        return $this;
    } // setPekerjaanId()

    /**
     * Set the value of [dudi_id] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setDudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dudi_id !== $v) {
            $this->dudi_id = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::DUDI_ID;
        }

        if ($this->aDudi !== null && $this->aDudi->getDudiId() !== $v) {
            $this->aDudi = null;
        }


        return $this;
    } // setDudiId()

    /**
     * Set the value of [bidang_usaha_id] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setBidangUsahaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bidang_usaha_id !== $v) {
            $this->bidang_usaha_id = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::BIDANG_USAHA_ID;
        }

        if ($this->aBidangUsaha !== null && $this->aBidangUsaha->getBidangUsahaId() !== $v) {
            $this->aBidangUsaha = null;
        }


        return $this;
    } // setBidangUsahaId()

    /**
     * Set the value of [id_prodi] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setIdProdi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_prodi !== $v) {
            $this->id_prodi = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::ID_PRODI;
        }


        return $this;
    } // setIdProdi()

    /**
     * Set the value of [stat_tracer] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setStatTracer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->stat_tracer !== $v) {
            $this->stat_tracer = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::STAT_TRACER;
        }


        return $this;
    } // setStatTracer()

    /**
     * Set the value of [ikatan_kerja] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setIkatanKerja($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ikatan_kerja !== $v) {
            $this->ikatan_kerja = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::IKATAN_KERJA;
        }


        return $this;
    } // setIkatanKerja()

    /**
     * Set the value of [a_sesuai_kompetensi] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setASesuaiKompetensi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_sesuai_kompetensi !== $v) {
            $this->a_sesuai_kompetensi = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::A_SESUAI_KOMPETENSI;
        }


        return $this;
    } // setASesuaiKompetensi()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = TracerLulusanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = TracerLulusanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TracerLulusan The current object (for fluent API support)
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
                $this->modifiedColumns[] = TracerLulusanPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return TracerLulusan The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = TracerLulusanPeer::UPDATER_ID;
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
            if ($this->ikatan_kerja !== '*') {
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

            $this->id_tracer = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->penghasilan_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->registrasi_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->tgl_entry = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->akt_setelah_lulus = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->nm_inst_perusahaan = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->nm_sp = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->nm_prodi = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->ket_tracer = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->pekerjaan_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->dudi_id = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->bidang_usaha_id = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->id_prodi = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->stat_tracer = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->ikatan_kerja = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->a_sesuai_kompetensi = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->create_date = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->last_update = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->soft_delete = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->last_sync = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->updater_id = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 21; // 21 = TracerLulusanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TracerLulusan object", $e);
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

        if ($this->aPenghasilan !== null && $this->penghasilan_id !== $this->aPenghasilan->getPenghasilanId()) {
            $this->aPenghasilan = null;
        }
        if ($this->aRegistrasiPesertaDidik !== null && $this->registrasi_id !== $this->aRegistrasiPesertaDidik->getRegistrasiId()) {
            $this->aRegistrasiPesertaDidik = null;
        }
        if ($this->aPekerjaan !== null && $this->pekerjaan_id !== $this->aPekerjaan->getPekerjaanId()) {
            $this->aPekerjaan = null;
        }
        if ($this->aDudi !== null && $this->dudi_id !== $this->aDudi->getDudiId()) {
            $this->aDudi = null;
        }
        if ($this->aBidangUsaha !== null && $this->bidang_usaha_id !== $this->aBidangUsaha->getBidangUsahaId()) {
            $this->aBidangUsaha = null;
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
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TracerLulusanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPenghasilan = null;
            $this->aBidangUsaha = null;
            $this->aDudi = null;
            $this->aPekerjaan = null;
            $this->aRegistrasiPesertaDidik = null;
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
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TracerLulusanQuery::create()
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
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TracerLulusanPeer::addInstanceToPool($this);
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

            if ($this->aPenghasilan !== null) {
                if ($this->aPenghasilan->isModified() || $this->aPenghasilan->isNew()) {
                    $affectedRows += $this->aPenghasilan->save($con);
                }
                $this->setPenghasilan($this->aPenghasilan);
            }

            if ($this->aBidangUsaha !== null) {
                if ($this->aBidangUsaha->isModified() || $this->aBidangUsaha->isNew()) {
                    $affectedRows += $this->aBidangUsaha->save($con);
                }
                $this->setBidangUsaha($this->aBidangUsaha);
            }

            if ($this->aDudi !== null) {
                if ($this->aDudi->isModified() || $this->aDudi->isNew()) {
                    $affectedRows += $this->aDudi->save($con);
                }
                $this->setDudi($this->aDudi);
            }

            if ($this->aPekerjaan !== null) {
                if ($this->aPekerjaan->isModified() || $this->aPekerjaan->isNew()) {
                    $affectedRows += $this->aPekerjaan->save($con);
                }
                $this->setPekerjaan($this->aPekerjaan);
            }

            if ($this->aRegistrasiPesertaDidik !== null) {
                if ($this->aRegistrasiPesertaDidik->isModified() || $this->aRegistrasiPesertaDidik->isNew()) {
                    $affectedRows += $this->aRegistrasiPesertaDidik->save($con);
                }
                $this->setRegistrasiPesertaDidik($this->aRegistrasiPesertaDidik);
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
        if ($this->isColumnModified(TracerLulusanPeer::ID_TRACER)) {
            $modifiedColumns[':p' . $index++]  = '"id_tracer"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::PENGHASILAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"penghasilan_id"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::REGISTRASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"registrasi_id"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::TGL_ENTRY)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_entry"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::AKT_SETELAH_LULUS)) {
            $modifiedColumns[':p' . $index++]  = '"akt_setelah_lulus"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::NM_INST_PERUSAHAAN)) {
            $modifiedColumns[':p' . $index++]  = '"nm_inst_perusahaan"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::NM_SP)) {
            $modifiedColumns[':p' . $index++]  = '"nm_sp"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::NM_PRODI)) {
            $modifiedColumns[':p' . $index++]  = '"nm_prodi"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::KET_TRACER)) {
            $modifiedColumns[':p' . $index++]  = '"ket_tracer"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::PEKERJAAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pekerjaan_id"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::DUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"dudi_id"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::BIDANG_USAHA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bidang_usaha_id"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::ID_PRODI)) {
            $modifiedColumns[':p' . $index++]  = '"id_prodi"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::STAT_TRACER)) {
            $modifiedColumns[':p' . $index++]  = '"stat_tracer"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::IKATAN_KERJA)) {
            $modifiedColumns[':p' . $index++]  = '"ikatan_kerja"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::A_SESUAI_KOMPETENSI)) {
            $modifiedColumns[':p' . $index++]  = '"a_sesuai_kompetensi"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(TracerLulusanPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "tracer_lulusan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_tracer"':						
                        $stmt->bindValue($identifier, $this->id_tracer, PDO::PARAM_STR);
                        break;
                    case '"penghasilan_id"':						
                        $stmt->bindValue($identifier, $this->penghasilan_id, PDO::PARAM_INT);
                        break;
                    case '"registrasi_id"':						
                        $stmt->bindValue($identifier, $this->registrasi_id, PDO::PARAM_STR);
                        break;
                    case '"tgl_entry"':						
                        $stmt->bindValue($identifier, $this->tgl_entry, PDO::PARAM_STR);
                        break;
                    case '"akt_setelah_lulus"':						
                        $stmt->bindValue($identifier, $this->akt_setelah_lulus, PDO::PARAM_STR);
                        break;
                    case '"nm_inst_perusahaan"':						
                        $stmt->bindValue($identifier, $this->nm_inst_perusahaan, PDO::PARAM_STR);
                        break;
                    case '"nm_sp"':						
                        $stmt->bindValue($identifier, $this->nm_sp, PDO::PARAM_STR);
                        break;
                    case '"nm_prodi"':						
                        $stmt->bindValue($identifier, $this->nm_prodi, PDO::PARAM_STR);
                        break;
                    case '"ket_tracer"':						
                        $stmt->bindValue($identifier, $this->ket_tracer, PDO::PARAM_STR);
                        break;
                    case '"pekerjaan_id"':						
                        $stmt->bindValue($identifier, $this->pekerjaan_id, PDO::PARAM_INT);
                        break;
                    case '"dudi_id"':						
                        $stmt->bindValue($identifier, $this->dudi_id, PDO::PARAM_STR);
                        break;
                    case '"bidang_usaha_id"':						
                        $stmt->bindValue($identifier, $this->bidang_usaha_id, PDO::PARAM_STR);
                        break;
                    case '"id_prodi"':						
                        $stmt->bindValue($identifier, $this->id_prodi, PDO::PARAM_STR);
                        break;
                    case '"stat_tracer"':						
                        $stmt->bindValue($identifier, $this->stat_tracer, PDO::PARAM_STR);
                        break;
                    case '"ikatan_kerja"':						
                        $stmt->bindValue($identifier, $this->ikatan_kerja, PDO::PARAM_STR);
                        break;
                    case '"a_sesuai_kompetensi"':						
                        $stmt->bindValue($identifier, $this->a_sesuai_kompetensi, PDO::PARAM_STR);
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

            if ($this->aPenghasilan !== null) {
                if (!$this->aPenghasilan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPenghasilan->getValidationFailures());
                }
            }

            if ($this->aBidangUsaha !== null) {
                if (!$this->aBidangUsaha->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBidangUsaha->getValidationFailures());
                }
            }

            if ($this->aDudi !== null) {
                if (!$this->aDudi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDudi->getValidationFailures());
                }
            }

            if ($this->aPekerjaan !== null) {
                if (!$this->aPekerjaan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPekerjaan->getValidationFailures());
                }
            }

            if ($this->aRegistrasiPesertaDidik !== null) {
                if (!$this->aRegistrasiPesertaDidik->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRegistrasiPesertaDidik->getValidationFailures());
                }
            }


            if (($retval = TracerLulusanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = TracerLulusanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdTracer();
                break;
            case 1:
                return $this->getPenghasilanId();
                break;
            case 2:
                return $this->getRegistrasiId();
                break;
            case 3:
                return $this->getTglEntry();
                break;
            case 4:
                return $this->getAktSetelahLulus();
                break;
            case 5:
                return $this->getNmInstPerusahaan();
                break;
            case 6:
                return $this->getNmSp();
                break;
            case 7:
                return $this->getNmProdi();
                break;
            case 8:
                return $this->getKetTracer();
                break;
            case 9:
                return $this->getPekerjaanId();
                break;
            case 10:
                return $this->getDudiId();
                break;
            case 11:
                return $this->getBidangUsahaId();
                break;
            case 12:
                return $this->getIdProdi();
                break;
            case 13:
                return $this->getStatTracer();
                break;
            case 14:
                return $this->getIkatanKerja();
                break;
            case 15:
                return $this->getASesuaiKompetensi();
                break;
            case 16:
                return $this->getCreateDate();
                break;
            case 17:
                return $this->getLastUpdate();
                break;
            case 18:
                return $this->getSoftDelete();
                break;
            case 19:
                return $this->getLastSync();
                break;
            case 20:
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
        if (isset($alreadyDumpedObjects['TracerLulusan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TracerLulusan'][$this->getPrimaryKey()] = true;
        $keys = TracerLulusanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdTracer(),
            $keys[1] => $this->getPenghasilanId(),
            $keys[2] => $this->getRegistrasiId(),
            $keys[3] => $this->getTglEntry(),
            $keys[4] => $this->getAktSetelahLulus(),
            $keys[5] => $this->getNmInstPerusahaan(),
            $keys[6] => $this->getNmSp(),
            $keys[7] => $this->getNmProdi(),
            $keys[8] => $this->getKetTracer(),
            $keys[9] => $this->getPekerjaanId(),
            $keys[10] => $this->getDudiId(),
            $keys[11] => $this->getBidangUsahaId(),
            $keys[12] => $this->getIdProdi(),
            $keys[13] => $this->getStatTracer(),
            $keys[14] => $this->getIkatanKerja(),
            $keys[15] => $this->getASesuaiKompetensi(),
            $keys[16] => $this->getCreateDate(),
            $keys[17] => $this->getLastUpdate(),
            $keys[18] => $this->getSoftDelete(),
            $keys[19] => $this->getLastSync(),
            $keys[20] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPenghasilan) {
                $result['Penghasilan'] = $this->aPenghasilan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBidangUsaha) {
                $result['BidangUsaha'] = $this->aBidangUsaha->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDudi) {
                $result['Dudi'] = $this->aDudi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPekerjaan) {
                $result['Pekerjaan'] = $this->aPekerjaan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRegistrasiPesertaDidik) {
                $result['RegistrasiPesertaDidik'] = $this->aRegistrasiPesertaDidik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = TracerLulusanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdTracer($value);
                break;
            case 1:
                $this->setPenghasilanId($value);
                break;
            case 2:
                $this->setRegistrasiId($value);
                break;
            case 3:
                $this->setTglEntry($value);
                break;
            case 4:
                $this->setAktSetelahLulus($value);
                break;
            case 5:
                $this->setNmInstPerusahaan($value);
                break;
            case 6:
                $this->setNmSp($value);
                break;
            case 7:
                $this->setNmProdi($value);
                break;
            case 8:
                $this->setKetTracer($value);
                break;
            case 9:
                $this->setPekerjaanId($value);
                break;
            case 10:
                $this->setDudiId($value);
                break;
            case 11:
                $this->setBidangUsahaId($value);
                break;
            case 12:
                $this->setIdProdi($value);
                break;
            case 13:
                $this->setStatTracer($value);
                break;
            case 14:
                $this->setIkatanKerja($value);
                break;
            case 15:
                $this->setASesuaiKompetensi($value);
                break;
            case 16:
                $this->setCreateDate($value);
                break;
            case 17:
                $this->setLastUpdate($value);
                break;
            case 18:
                $this->setSoftDelete($value);
                break;
            case 19:
                $this->setLastSync($value);
                break;
            case 20:
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
        $keys = TracerLulusanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdTracer($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPenghasilanId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setRegistrasiId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTglEntry($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAktSetelahLulus($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNmInstPerusahaan($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNmSp($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setNmProdi($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKetTracer($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPekerjaanId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setDudiId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setBidangUsahaId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setIdProdi($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setStatTracer($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setIkatanKerja($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setASesuaiKompetensi($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setCreateDate($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLastUpdate($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setSoftDelete($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setLastSync($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setUpdaterId($arr[$keys[20]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TracerLulusanPeer::DATABASE_NAME);

        if ($this->isColumnModified(TracerLulusanPeer::ID_TRACER)) $criteria->add(TracerLulusanPeer::ID_TRACER, $this->id_tracer);
        if ($this->isColumnModified(TracerLulusanPeer::PENGHASILAN_ID)) $criteria->add(TracerLulusanPeer::PENGHASILAN_ID, $this->penghasilan_id);
        if ($this->isColumnModified(TracerLulusanPeer::REGISTRASI_ID)) $criteria->add(TracerLulusanPeer::REGISTRASI_ID, $this->registrasi_id);
        if ($this->isColumnModified(TracerLulusanPeer::TGL_ENTRY)) $criteria->add(TracerLulusanPeer::TGL_ENTRY, $this->tgl_entry);
        if ($this->isColumnModified(TracerLulusanPeer::AKT_SETELAH_LULUS)) $criteria->add(TracerLulusanPeer::AKT_SETELAH_LULUS, $this->akt_setelah_lulus);
        if ($this->isColumnModified(TracerLulusanPeer::NM_INST_PERUSAHAAN)) $criteria->add(TracerLulusanPeer::NM_INST_PERUSAHAAN, $this->nm_inst_perusahaan);
        if ($this->isColumnModified(TracerLulusanPeer::NM_SP)) $criteria->add(TracerLulusanPeer::NM_SP, $this->nm_sp);
        if ($this->isColumnModified(TracerLulusanPeer::NM_PRODI)) $criteria->add(TracerLulusanPeer::NM_PRODI, $this->nm_prodi);
        if ($this->isColumnModified(TracerLulusanPeer::KET_TRACER)) $criteria->add(TracerLulusanPeer::KET_TRACER, $this->ket_tracer);
        if ($this->isColumnModified(TracerLulusanPeer::PEKERJAAN_ID)) $criteria->add(TracerLulusanPeer::PEKERJAAN_ID, $this->pekerjaan_id);
        if ($this->isColumnModified(TracerLulusanPeer::DUDI_ID)) $criteria->add(TracerLulusanPeer::DUDI_ID, $this->dudi_id);
        if ($this->isColumnModified(TracerLulusanPeer::BIDANG_USAHA_ID)) $criteria->add(TracerLulusanPeer::BIDANG_USAHA_ID, $this->bidang_usaha_id);
        if ($this->isColumnModified(TracerLulusanPeer::ID_PRODI)) $criteria->add(TracerLulusanPeer::ID_PRODI, $this->id_prodi);
        if ($this->isColumnModified(TracerLulusanPeer::STAT_TRACER)) $criteria->add(TracerLulusanPeer::STAT_TRACER, $this->stat_tracer);
        if ($this->isColumnModified(TracerLulusanPeer::IKATAN_KERJA)) $criteria->add(TracerLulusanPeer::IKATAN_KERJA, $this->ikatan_kerja);
        if ($this->isColumnModified(TracerLulusanPeer::A_SESUAI_KOMPETENSI)) $criteria->add(TracerLulusanPeer::A_SESUAI_KOMPETENSI, $this->a_sesuai_kompetensi);
        if ($this->isColumnModified(TracerLulusanPeer::CREATE_DATE)) $criteria->add(TracerLulusanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(TracerLulusanPeer::LAST_UPDATE)) $criteria->add(TracerLulusanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(TracerLulusanPeer::SOFT_DELETE)) $criteria->add(TracerLulusanPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(TracerLulusanPeer::LAST_SYNC)) $criteria->add(TracerLulusanPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(TracerLulusanPeer::UPDATER_ID)) $criteria->add(TracerLulusanPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(TracerLulusanPeer::DATABASE_NAME);
        $criteria->add(TracerLulusanPeer::ID_TRACER, $this->id_tracer);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdTracer();
    }

    /**
     * Generic method to set the primary key (id_tracer column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdTracer($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdTracer();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of TracerLulusan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPenghasilanId($this->getPenghasilanId());
        $copyObj->setRegistrasiId($this->getRegistrasiId());
        $copyObj->setTglEntry($this->getTglEntry());
        $copyObj->setAktSetelahLulus($this->getAktSetelahLulus());
        $copyObj->setNmInstPerusahaan($this->getNmInstPerusahaan());
        $copyObj->setNmSp($this->getNmSp());
        $copyObj->setNmProdi($this->getNmProdi());
        $copyObj->setKetTracer($this->getKetTracer());
        $copyObj->setPekerjaanId($this->getPekerjaanId());
        $copyObj->setDudiId($this->getDudiId());
        $copyObj->setBidangUsahaId($this->getBidangUsahaId());
        $copyObj->setIdProdi($this->getIdProdi());
        $copyObj->setStatTracer($this->getStatTracer());
        $copyObj->setIkatanKerja($this->getIkatanKerja());
        $copyObj->setASesuaiKompetensi($this->getASesuaiKompetensi());
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

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdTracer(NULL); // this is a auto-increment column, so set to default value
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
     * @return TracerLulusan Clone of current object.
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
     * @return TracerLulusanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TracerLulusanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Penghasilan object.
     *
     * @param             Penghasilan $v
     * @return TracerLulusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPenghasilan(Penghasilan $v = null)
    {
        if ($v === null) {
            $this->setPenghasilanId(NULL);
        } else {
            $this->setPenghasilanId($v->getPenghasilanId());
        }

        $this->aPenghasilan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Penghasilan object, it will not be re-added.
        if ($v !== null) {
            $v->addTracerLulusan($this);
        }


        return $this;
    }


    /**
     * Get the associated Penghasilan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Penghasilan The associated Penghasilan object.
     * @throws PropelException
     */
    public function getPenghasilan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPenghasilan === null && ($this->penghasilan_id !== null) && $doQuery) {
            $this->aPenghasilan = PenghasilanQuery::create()->findPk($this->penghasilan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPenghasilan->addTracerLulusans($this);
             */
        }

        return $this->aPenghasilan;
    }

    /**
     * Declares an association between this object and a BidangUsaha object.
     *
     * @param             BidangUsaha $v
     * @return TracerLulusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBidangUsaha(BidangUsaha $v = null)
    {
        if ($v === null) {
            $this->setBidangUsahaId(NULL);
        } else {
            $this->setBidangUsahaId($v->getBidangUsahaId());
        }

        $this->aBidangUsaha = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BidangUsaha object, it will not be re-added.
        if ($v !== null) {
            $v->addTracerLulusan($this);
        }


        return $this;
    }


    /**
     * Get the associated BidangUsaha object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return BidangUsaha The associated BidangUsaha object.
     * @throws PropelException
     */
    public function getBidangUsaha(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBidangUsaha === null && (($this->bidang_usaha_id !== "" && $this->bidang_usaha_id !== null)) && $doQuery) {
            $this->aBidangUsaha = BidangUsahaQuery::create()->findPk($this->bidang_usaha_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBidangUsaha->addTracerLulusans($this);
             */
        }

        return $this->aBidangUsaha;
    }

    /**
     * Declares an association between this object and a Dudi object.
     *
     * @param             Dudi $v
     * @return TracerLulusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDudi(Dudi $v = null)
    {
        if ($v === null) {
            $this->setDudiId(NULL);
        } else {
            $this->setDudiId($v->getDudiId());
        }

        $this->aDudi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Dudi object, it will not be re-added.
        if ($v !== null) {
            $v->addTracerLulusan($this);
        }


        return $this;
    }


    /**
     * Get the associated Dudi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Dudi The associated Dudi object.
     * @throws PropelException
     */
    public function getDudi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDudi === null && (($this->dudi_id !== "" && $this->dudi_id !== null)) && $doQuery) {
            $this->aDudi = DudiQuery::create()->findPk($this->dudi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDudi->addTracerLulusans($this);
             */
        }

        return $this->aDudi;
    }

    /**
     * Declares an association between this object and a Pekerjaan object.
     *
     * @param             Pekerjaan $v
     * @return TracerLulusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPekerjaan(Pekerjaan $v = null)
    {
        if ($v === null) {
            $this->setPekerjaanId(NULL);
        } else {
            $this->setPekerjaanId($v->getPekerjaanId());
        }

        $this->aPekerjaan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pekerjaan object, it will not be re-added.
        if ($v !== null) {
            $v->addTracerLulusan($this);
        }


        return $this;
    }


    /**
     * Get the associated Pekerjaan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pekerjaan The associated Pekerjaan object.
     * @throws PropelException
     */
    public function getPekerjaan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPekerjaan === null && ($this->pekerjaan_id !== null) && $doQuery) {
            $this->aPekerjaan = PekerjaanQuery::create()->findPk($this->pekerjaan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPekerjaan->addTracerLulusans($this);
             */
        }

        return $this->aPekerjaan;
    }

    /**
     * Declares an association between this object and a RegistrasiPesertaDidik object.
     *
     * @param             RegistrasiPesertaDidik $v
     * @return TracerLulusan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRegistrasiPesertaDidik(RegistrasiPesertaDidik $v = null)
    {
        if ($v === null) {
            $this->setRegistrasiId(NULL);
        } else {
            $this->setRegistrasiId($v->getRegistrasiId());
        }

        $this->aRegistrasiPesertaDidik = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the RegistrasiPesertaDidik object, it will not be re-added.
        if ($v !== null) {
            $v->addTracerLulusan($this);
        }


        return $this;
    }


    /**
     * Get the associated RegistrasiPesertaDidik object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return RegistrasiPesertaDidik The associated RegistrasiPesertaDidik object.
     * @throws PropelException
     */
    public function getRegistrasiPesertaDidik(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRegistrasiPesertaDidik === null && (($this->registrasi_id !== "" && $this->registrasi_id !== null)) && $doQuery) {
            $this->aRegistrasiPesertaDidik = RegistrasiPesertaDidikQuery::create()->findPk($this->registrasi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRegistrasiPesertaDidik->addTracerLulusans($this);
             */
        }

        return $this->aRegistrasiPesertaDidik;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_tracer = null;
        $this->penghasilan_id = null;
        $this->registrasi_id = null;
        $this->tgl_entry = null;
        $this->akt_setelah_lulus = null;
        $this->nm_inst_perusahaan = null;
        $this->nm_sp = null;
        $this->nm_prodi = null;
        $this->ket_tracer = null;
        $this->pekerjaan_id = null;
        $this->dudi_id = null;
        $this->bidang_usaha_id = null;
        $this->id_prodi = null;
        $this->stat_tracer = null;
        $this->ikatan_kerja = null;
        $this->a_sesuai_kompetensi = null;
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
            if ($this->aPenghasilan instanceof Persistent) {
              $this->aPenghasilan->clearAllReferences($deep);
            }
            if ($this->aBidangUsaha instanceof Persistent) {
              $this->aBidangUsaha->clearAllReferences($deep);
            }
            if ($this->aDudi instanceof Persistent) {
              $this->aDudi->clearAllReferences($deep);
            }
            if ($this->aPekerjaan instanceof Persistent) {
              $this->aPekerjaan->clearAllReferences($deep);
            }
            if ($this->aRegistrasiPesertaDidik instanceof Persistent) {
              $this->aRegistrasiPesertaDidik->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPenghasilan = null;
        $this->aBidangUsaha = null;
        $this->aDudi = null;
        $this->aPekerjaan = null;
        $this->aRegistrasiPesertaDidik = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TracerLulusanPeer::DEFAULT_STRING_FORMAT);
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
