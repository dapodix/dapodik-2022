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
use DataDikdas\Model\AnggotaAktPd;
use DataDikdas\Model\AnggotaAktPdQuery;
use DataDikdas\Model\JenisCita;
use DataDikdas\Model\JenisCitaQuery;
use DataDikdas\Model\JenisHobby;
use DataDikdas\Model\JenisHobbyQuery;
use DataDikdas\Model\JenisKeluar;
use DataDikdas\Model\JenisKeluarQuery;
use DataDikdas\Model\JenisPendaftaran;
use DataDikdas\Model\JenisPendaftaranQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidikPeer;
use DataDikdas\Model\RegistrasiPesertaDidikQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\TracerLulusanQuery;
use DataDikdas\Model\VldRegPd;
use DataDikdas\Model\VldRegPdQuery;

/**
 * Base class that represents a row from the 'registrasi_peserta_didik' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRegistrasiPesertaDidik extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RegistrasiPesertaDidikPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RegistrasiPesertaDidikPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the registrasi_id field.
     * @var        string
     */
    protected $registrasi_id;

    /**
     * The value for the jurusan_sp_id field.
     * @var        string
     */
    protected $jurusan_sp_id;

    /**
     * The value for the peserta_didik_id field.
     * @var        string
     */
    protected $peserta_didik_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the jenis_pendaftaran_id field.
     * @var        string
     */
    protected $jenis_pendaftaran_id;

    /**
     * The value for the nipd field.
     * @var        string
     */
    protected $nipd;

    /**
     * The value for the tanggal_masuk_sekolah field.
     * @var        string
     */
    protected $tanggal_masuk_sekolah;

    /**
     * The value for the jenis_keluar_id field.
     * @var        string
     */
    protected $jenis_keluar_id;

    /**
     * The value for the tanggal_keluar field.
     * @var        string
     */
    protected $tanggal_keluar;

    /**
     * The value for the keterangan field.
     * @var        string
     */
    protected $keterangan;

    /**
     * The value for the no_skhun field.
     * @var        string
     */
    protected $no_skhun;

    /**
     * The value for the no_peserta_ujian field.
     * @var        string
     */
    protected $no_peserta_ujian;

    /**
     * The value for the no_seri_ijazah field.
     * @var        string
     */
    protected $no_seri_ijazah;

    /**
     * The value for the a_pernah_paud field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_pernah_paud;

    /**
     * The value for the a_pernah_tk field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_pernah_tk;

    /**
     * The value for the sekolah_asal field.
     * @var        string
     */
    protected $sekolah_asal;

    /**
     * The value for the id_hobby field.
     * @var        string
     */
    protected $id_hobby;

    /**
     * The value for the id_cita field.
     * @var        string
     */
    protected $id_cita;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
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
     * @var        JurusanSp
     */
    protected $aJurusanSp;

    /**
     * @var        PesertaDidik
     */
    protected $aPesertaDidik;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        JenisPendaftaran
     */
    protected $aJenisPendaftaran;

    /**
     * @var        JenisKeluar
     */
    protected $aJenisKeluar;

    /**
     * @var        JenisCita
     */
    protected $aJenisCita;

    /**
     * @var        JenisHobby
     */
    protected $aJenisHobby;

    /**
     * @var        PropelObjectCollection|AnggotaAktPd[] Collection to store aggregation of AnggotaAktPd objects.
     */
    protected $collAnggotaAktPds;
    protected $collAnggotaAktPdsPartial;

    /**
     * @var        PropelObjectCollection|TracerLulusan[] Collection to store aggregation of TracerLulusan objects.
     */
    protected $collTracerLulusans;
    protected $collTracerLulusansPartial;

    /**
     * @var        PropelObjectCollection|VldRegPd[] Collection to store aggregation of VldRegPd objects.
     */
    protected $collVldRegPds;
    protected $collVldRegPdsPartial;

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
    protected $anggotaAktPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tracerLulusansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRegPdsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->a_pernah_paud = '0';
        $this->a_pernah_tk = '0';
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseRegistrasiPesertaDidik object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [jurusan_sp_id] column value.
     * 
     * @return string
     */
    public function getJurusanSpId()
    {
        return $this->jurusan_sp_id;
    }

    /**
     * Get the [peserta_didik_id] column value.
     * 
     * @return string
     */
    public function getPesertaDidikId()
    {
        return $this->peserta_didik_id;
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
     * Get the [jenis_pendaftaran_id] column value.
     * 
     * @return string
     */
    public function getJenisPendaftaranId()
    {
        return $this->jenis_pendaftaran_id;
    }

    /**
     * Get the [nipd] column value.
     * 
     * @return string
     */
    public function getNipd()
    {
        return $this->nipd;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_masuk_sekolah] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalMasukSekolah($format = '%Y-%m-%d')
    {
        if ($this->tanggal_masuk_sekolah === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_masuk_sekolah);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_masuk_sekolah, true), $x);
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
     * Get the [jenis_keluar_id] column value.
     * 
     * @return string
     */
    public function getJenisKeluarId()
    {
        return $this->jenis_keluar_id;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_keluar] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalKeluar($format = '%Y-%m-%d')
    {
        if ($this->tanggal_keluar === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_keluar);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_keluar, true), $x);
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
     * Get the [keterangan] column value.
     * 
     * @return string
     */
    public function getKeterangan()
    {
        return $this->keterangan;
    }

    /**
     * Get the [no_skhun] column value.
     * 
     * @return string
     */
    public function getNoSkhun()
    {
        return $this->no_skhun;
    }

    /**
     * Get the [no_peserta_ujian] column value.
     * 
     * @return string
     */
    public function getNoPesertaUjian()
    {
        return $this->no_peserta_ujian;
    }

    /**
     * Get the [no_seri_ijazah] column value.
     * 
     * @return string
     */
    public function getNoSeriIjazah()
    {
        return $this->no_seri_ijazah;
    }

    /**
     * Get the [a_pernah_paud] column value.
     * 
     * @return string
     */
    public function getAPernahPaud()
    {
        return $this->a_pernah_paud;
    }

    /**
     * Get the [a_pernah_tk] column value.
     * 
     * @return string
     */
    public function getAPernahTk()
    {
        return $this->a_pernah_tk;
    }

    /**
     * Get the [sekolah_asal] column value.
     * 
     * @return string
     */
    public function getSekolahAsal()
    {
        return $this->sekolah_asal;
    }

    /**
     * Get the [id_hobby] column value.
     * 
     * @return string
     */
    public function getIdHobby()
    {
        return $this->id_hobby;
    }

    /**
     * Get the [id_cita] column value.
     * 
     * @return string
     */
    public function getIdCita()
    {
        return $this->id_cita;
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
     * Set the value of [registrasi_id] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setRegistrasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->registrasi_id !== $v) {
            $this->registrasi_id = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::REGISTRASI_ID;
        }


        return $this;
    } // setRegistrasiId()

    /**
     * Set the value of [jurusan_sp_id] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setJurusanSpId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_sp_id !== $v) {
            $this->jurusan_sp_id = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::JURUSAN_SP_ID;
        }

        if ($this->aJurusanSp !== null && $this->aJurusanSp->getJurusanSpId() !== $v) {
            $this->aJurusanSp = null;
        }


        return $this;
    } // setJurusanSpId()

    /**
     * Set the value of [peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peserta_didik_id !== $v) {
            $this->peserta_didik_id = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID;
        }

        if ($this->aPesertaDidik !== null && $this->aPesertaDidik->getPesertaDidikId() !== $v) {
            $this->aPesertaDidik = null;
        }


        return $this;
    } // setPesertaDidikId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [jenis_pendaftaran_id] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setJenisPendaftaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_pendaftaran_id !== $v) {
            $this->jenis_pendaftaran_id = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID;
        }

        if ($this->aJenisPendaftaran !== null && $this->aJenisPendaftaran->getJenisPendaftaranId() !== $v) {
            $this->aJenisPendaftaran = null;
        }


        return $this;
    } // setJenisPendaftaranId()

    /**
     * Set the value of [nipd] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setNipd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nipd !== $v) {
            $this->nipd = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::NIPD;
        }


        return $this;
    } // setNipd()

    /**
     * Sets the value of [tanggal_masuk_sekolah] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setTanggalMasukSekolah($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_masuk_sekolah !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_masuk_sekolah !== null && $tmpDt = new DateTime($this->tanggal_masuk_sekolah)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_masuk_sekolah = $newDateAsString;
                $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH;
            }
        } // if either are not null


        return $this;
    } // setTanggalMasukSekolah()

    /**
     * Set the value of [jenis_keluar_id] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setJenisKeluarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_keluar_id !== $v) {
            $this->jenis_keluar_id = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID;
        }

        if ($this->aJenisKeluar !== null && $this->aJenisKeluar->getJenisKeluarId() !== $v) {
            $this->aJenisKeluar = null;
        }


        return $this;
    } // setJenisKeluarId()

    /**
     * Sets the value of [tanggal_keluar] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setTanggalKeluar($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_keluar !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_keluar !== null && $tmpDt = new DateTime($this->tanggal_keluar)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_keluar = $newDateAsString;
                $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::TANGGAL_KELUAR;
            }
        } // if either are not null


        return $this;
    } // setTanggalKeluar()

    /**
     * Set the value of [keterangan] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setKeterangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keterangan !== $v) {
            $this->keterangan = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::KETERANGAN;
        }


        return $this;
    } // setKeterangan()

    /**
     * Set the value of [no_skhun] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setNoSkhun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_skhun !== $v) {
            $this->no_skhun = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::NO_SKHUN;
        }


        return $this;
    } // setNoSkhun()

    /**
     * Set the value of [no_peserta_ujian] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setNoPesertaUjian($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_peserta_ujian !== $v) {
            $this->no_peserta_ujian = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN;
        }


        return $this;
    } // setNoPesertaUjian()

    /**
     * Set the value of [no_seri_ijazah] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setNoSeriIjazah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_seri_ijazah !== $v) {
            $this->no_seri_ijazah = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH;
        }


        return $this;
    } // setNoSeriIjazah()

    /**
     * Set the value of [a_pernah_paud] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setAPernahPaud($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_pernah_paud !== $v) {
            $this->a_pernah_paud = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::A_PERNAH_PAUD;
        }


        return $this;
    } // setAPernahPaud()

    /**
     * Set the value of [a_pernah_tk] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setAPernahTk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_pernah_tk !== $v) {
            $this->a_pernah_tk = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::A_PERNAH_TK;
        }


        return $this;
    } // setAPernahTk()

    /**
     * Set the value of [sekolah_asal] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setSekolahAsal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_asal !== $v) {
            $this->sekolah_asal = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::SEKOLAH_ASAL;
        }


        return $this;
    } // setSekolahAsal()

    /**
     * Set the value of [id_hobby] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setIdHobby($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_hobby !== $v) {
            $this->id_hobby = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::ID_HOBBY;
        }

        if ($this->aJenisHobby !== null && $this->aJenisHobby->getIdHobby() !== $v) {
            $this->aJenisHobby = null;
        }


        return $this;
    } // setIdHobby()

    /**
     * Set the value of [id_cita] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setIdCita($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_cita !== $v) {
            $this->id_cita = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::ID_CITA;
        }

        if ($this->aJenisCita !== null && $this->aJenisCita->getIdCita() !== $v) {
            $this->aJenisCita = null;
        }


        return $this;
    } // setIdCita()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
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
                $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RegistrasiPesertaDidikPeer::UPDATER_ID;
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
            if ($this->a_pernah_paud !== '0') {
                return false;
            }

            if ($this->a_pernah_tk !== '0') {
                return false;
            }

            if ($this->create_date !== '2021-06-07 11:49:57') {
                return false;
            }

            if ($this->last_update !== '2021-06-07 11:49:57') {
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

            $this->registrasi_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jurusan_sp_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->peserta_didik_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sekolah_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jenis_pendaftaran_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->nipd = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tanggal_masuk_sekolah = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jenis_keluar_id = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tanggal_keluar = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->keterangan = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->no_skhun = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->no_peserta_ujian = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->no_seri_ijazah = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->a_pernah_paud = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->a_pernah_tk = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->sekolah_asal = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->id_hobby = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->id_cita = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->create_date = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->last_update = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->soft_delete = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->last_sync = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->updater_id = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 23; // 23 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RegistrasiPesertaDidik object", $e);
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

        if ($this->aJurusanSp !== null && $this->jurusan_sp_id !== $this->aJurusanSp->getJurusanSpId()) {
            $this->aJurusanSp = null;
        }
        if ($this->aPesertaDidik !== null && $this->peserta_didik_id !== $this->aPesertaDidik->getPesertaDidikId()) {
            $this->aPesertaDidik = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aJenisPendaftaran !== null && $this->jenis_pendaftaran_id !== $this->aJenisPendaftaran->getJenisPendaftaranId()) {
            $this->aJenisPendaftaran = null;
        }
        if ($this->aJenisKeluar !== null && $this->jenis_keluar_id !== $this->aJenisKeluar->getJenisKeluarId()) {
            $this->aJenisKeluar = null;
        }
        if ($this->aJenisHobby !== null && $this->id_hobby !== $this->aJenisHobby->getIdHobby()) {
            $this->aJenisHobby = null;
        }
        if ($this->aJenisCita !== null && $this->id_cita !== $this->aJenisCita->getIdCita()) {
            $this->aJenisCita = null;
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
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RegistrasiPesertaDidikPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJurusanSp = null;
            $this->aPesertaDidik = null;
            $this->aSekolah = null;
            $this->aJenisPendaftaran = null;
            $this->aJenisKeluar = null;
            $this->aJenisCita = null;
            $this->aJenisHobby = null;
            $this->collAnggotaAktPds = null;

            $this->collTracerLulusans = null;

            $this->collVldRegPds = null;

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
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RegistrasiPesertaDidikQuery::create()
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
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RegistrasiPesertaDidikPeer::addInstanceToPool($this);
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

            if ($this->aJurusanSp !== null) {
                if ($this->aJurusanSp->isModified() || $this->aJurusanSp->isNew()) {
                    $affectedRows += $this->aJurusanSp->save($con);
                }
                $this->setJurusanSp($this->aJurusanSp);
            }

            if ($this->aPesertaDidik !== null) {
                if ($this->aPesertaDidik->isModified() || $this->aPesertaDidik->isNew()) {
                    $affectedRows += $this->aPesertaDidik->save($con);
                }
                $this->setPesertaDidik($this->aPesertaDidik);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->aJenisPendaftaran !== null) {
                if ($this->aJenisPendaftaran->isModified() || $this->aJenisPendaftaran->isNew()) {
                    $affectedRows += $this->aJenisPendaftaran->save($con);
                }
                $this->setJenisPendaftaran($this->aJenisPendaftaran);
            }

            if ($this->aJenisKeluar !== null) {
                if ($this->aJenisKeluar->isModified() || $this->aJenisKeluar->isNew()) {
                    $affectedRows += $this->aJenisKeluar->save($con);
                }
                $this->setJenisKeluar($this->aJenisKeluar);
            }

            if ($this->aJenisCita !== null) {
                if ($this->aJenisCita->isModified() || $this->aJenisCita->isNew()) {
                    $affectedRows += $this->aJenisCita->save($con);
                }
                $this->setJenisCita($this->aJenisCita);
            }

            if ($this->aJenisHobby !== null) {
                if ($this->aJenisHobby->isModified() || $this->aJenisHobby->isNew()) {
                    $affectedRows += $this->aJenisHobby->save($con);
                }
                $this->setJenisHobby($this->aJenisHobby);
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

            if ($this->anggotaAktPdsScheduledForDeletion !== null) {
                if (!$this->anggotaAktPdsScheduledForDeletion->isEmpty()) {
                    AnggotaAktPdQuery::create()
                        ->filterByPrimaryKeys($this->anggotaAktPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anggotaAktPdsScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaAktPds !== null) {
                foreach ($this->collAnggotaAktPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tracerLulusansScheduledForDeletion !== null) {
                if (!$this->tracerLulusansScheduledForDeletion->isEmpty()) {
                    TracerLulusanQuery::create()
                        ->filterByPrimaryKeys($this->tracerLulusansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tracerLulusansScheduledForDeletion = null;
                }
            }

            if ($this->collTracerLulusans !== null) {
                foreach ($this->collTracerLulusans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRegPdsScheduledForDeletion !== null) {
                if (!$this->vldRegPdsScheduledForDeletion->isEmpty()) {
                    VldRegPdQuery::create()
                        ->filterByPrimaryKeys($this->vldRegPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRegPdsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRegPds !== null) {
                foreach ($this->collVldRegPds as $referrerFK) {
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
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::REGISTRASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"registrasi_id"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_sp_id"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peserta_didik_id"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_pendaftaran_id"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NIPD)) {
            $modifiedColumns[':p' . $index++]  = '"nipd"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_masuk_sekolah"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_keluar_id"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::TANGGAL_KELUAR)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_keluar"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::KETERANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"keterangan"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NO_SKHUN)) {
            $modifiedColumns[':p' . $index++]  = '"no_skhun"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN)) {
            $modifiedColumns[':p' . $index++]  = '"no_peserta_ujian"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH)) {
            $modifiedColumns[':p' . $index++]  = '"no_seri_ijazah"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::A_PERNAH_PAUD)) {
            $modifiedColumns[':p' . $index++]  = '"a_pernah_paud"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::A_PERNAH_TK)) {
            $modifiedColumns[':p' . $index++]  = '"a_pernah_tk"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::SEKOLAH_ASAL)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_asal"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::ID_HOBBY)) {
            $modifiedColumns[':p' . $index++]  = '"id_hobby"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::ID_CITA)) {
            $modifiedColumns[':p' . $index++]  = '"id_cita"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "registrasi_peserta_didik" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"registrasi_id"':						
                        $stmt->bindValue($identifier, $this->registrasi_id, PDO::PARAM_STR);
                        break;
                    case '"jurusan_sp_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_sp_id, PDO::PARAM_STR);
                        break;
                    case '"peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->peserta_didik_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_pendaftaran_id"':						
                        $stmt->bindValue($identifier, $this->jenis_pendaftaran_id, PDO::PARAM_STR);
                        break;
                    case '"nipd"':						
                        $stmt->bindValue($identifier, $this->nipd, PDO::PARAM_STR);
                        break;
                    case '"tanggal_masuk_sekolah"':						
                        $stmt->bindValue($identifier, $this->tanggal_masuk_sekolah, PDO::PARAM_STR);
                        break;
                    case '"jenis_keluar_id"':						
                        $stmt->bindValue($identifier, $this->jenis_keluar_id, PDO::PARAM_STR);
                        break;
                    case '"tanggal_keluar"':						
                        $stmt->bindValue($identifier, $this->tanggal_keluar, PDO::PARAM_STR);
                        break;
                    case '"keterangan"':						
                        $stmt->bindValue($identifier, $this->keterangan, PDO::PARAM_STR);
                        break;
                    case '"no_skhun"':						
                        $stmt->bindValue($identifier, $this->no_skhun, PDO::PARAM_STR);
                        break;
                    case '"no_peserta_ujian"':						
                        $stmt->bindValue($identifier, $this->no_peserta_ujian, PDO::PARAM_STR);
                        break;
                    case '"no_seri_ijazah"':						
                        $stmt->bindValue($identifier, $this->no_seri_ijazah, PDO::PARAM_STR);
                        break;
                    case '"a_pernah_paud"':						
                        $stmt->bindValue($identifier, $this->a_pernah_paud, PDO::PARAM_STR);
                        break;
                    case '"a_pernah_tk"':						
                        $stmt->bindValue($identifier, $this->a_pernah_tk, PDO::PARAM_STR);
                        break;
                    case '"sekolah_asal"':						
                        $stmt->bindValue($identifier, $this->sekolah_asal, PDO::PARAM_STR);
                        break;
                    case '"id_hobby"':						
                        $stmt->bindValue($identifier, $this->id_hobby, PDO::PARAM_STR);
                        break;
                    case '"id_cita"':						
                        $stmt->bindValue($identifier, $this->id_cita, PDO::PARAM_STR);
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

            if ($this->aJurusanSp !== null) {
                if (!$this->aJurusanSp->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJurusanSp->getValidationFailures());
                }
            }

            if ($this->aPesertaDidik !== null) {
                if (!$this->aPesertaDidik->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPesertaDidik->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aJenisPendaftaran !== null) {
                if (!$this->aJenisPendaftaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisPendaftaran->getValidationFailures());
                }
            }

            if ($this->aJenisKeluar !== null) {
                if (!$this->aJenisKeluar->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisKeluar->getValidationFailures());
                }
            }

            if ($this->aJenisCita !== null) {
                if (!$this->aJenisCita->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisCita->getValidationFailures());
                }
            }

            if ($this->aJenisHobby !== null) {
                if (!$this->aJenisHobby->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisHobby->getValidationFailures());
                }
            }


            if (($retval = RegistrasiPesertaDidikPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAnggotaAktPds !== null) {
                    foreach ($this->collAnggotaAktPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTracerLulusans !== null) {
                    foreach ($this->collTracerLulusans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRegPds !== null) {
                    foreach ($this->collVldRegPds as $referrerFK) {
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
        $pos = RegistrasiPesertaDidikPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRegistrasiId();
                break;
            case 1:
                return $this->getJurusanSpId();
                break;
            case 2:
                return $this->getPesertaDidikId();
                break;
            case 3:
                return $this->getSekolahId();
                break;
            case 4:
                return $this->getJenisPendaftaranId();
                break;
            case 5:
                return $this->getNipd();
                break;
            case 6:
                return $this->getTanggalMasukSekolah();
                break;
            case 7:
                return $this->getJenisKeluarId();
                break;
            case 8:
                return $this->getTanggalKeluar();
                break;
            case 9:
                return $this->getKeterangan();
                break;
            case 10:
                return $this->getNoSkhun();
                break;
            case 11:
                return $this->getNoPesertaUjian();
                break;
            case 12:
                return $this->getNoSeriIjazah();
                break;
            case 13:
                return $this->getAPernahPaud();
                break;
            case 14:
                return $this->getAPernahTk();
                break;
            case 15:
                return $this->getSekolahAsal();
                break;
            case 16:
                return $this->getIdHobby();
                break;
            case 17:
                return $this->getIdCita();
                break;
            case 18:
                return $this->getCreateDate();
                break;
            case 19:
                return $this->getLastUpdate();
                break;
            case 20:
                return $this->getSoftDelete();
                break;
            case 21:
                return $this->getLastSync();
                break;
            case 22:
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
        if (isset($alreadyDumpedObjects['RegistrasiPesertaDidik'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RegistrasiPesertaDidik'][$this->getPrimaryKey()] = true;
        $keys = RegistrasiPesertaDidikPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRegistrasiId(),
            $keys[1] => $this->getJurusanSpId(),
            $keys[2] => $this->getPesertaDidikId(),
            $keys[3] => $this->getSekolahId(),
            $keys[4] => $this->getJenisPendaftaranId(),
            $keys[5] => $this->getNipd(),
            $keys[6] => $this->getTanggalMasukSekolah(),
            $keys[7] => $this->getJenisKeluarId(),
            $keys[8] => $this->getTanggalKeluar(),
            $keys[9] => $this->getKeterangan(),
            $keys[10] => $this->getNoSkhun(),
            $keys[11] => $this->getNoPesertaUjian(),
            $keys[12] => $this->getNoSeriIjazah(),
            $keys[13] => $this->getAPernahPaud(),
            $keys[14] => $this->getAPernahTk(),
            $keys[15] => $this->getSekolahAsal(),
            $keys[16] => $this->getIdHobby(),
            $keys[17] => $this->getIdCita(),
            $keys[18] => $this->getCreateDate(),
            $keys[19] => $this->getLastUpdate(),
            $keys[20] => $this->getSoftDelete(),
            $keys[21] => $this->getLastSync(),
            $keys[22] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJurusanSp) {
                $result['JurusanSp'] = $this->aJurusanSp->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPesertaDidik) {
                $result['PesertaDidik'] = $this->aPesertaDidik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisPendaftaran) {
                $result['JenisPendaftaran'] = $this->aJenisPendaftaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisKeluar) {
                $result['JenisKeluar'] = $this->aJenisKeluar->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisCita) {
                $result['JenisCita'] = $this->aJenisCita->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisHobby) {
                $result['JenisHobby'] = $this->aJenisHobby->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAnggotaAktPds) {
                $result['AnggotaAktPds'] = $this->collAnggotaAktPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTracerLulusans) {
                $result['TracerLulusans'] = $this->collTracerLulusans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRegPds) {
                $result['VldRegPds'] = $this->collVldRegPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RegistrasiPesertaDidikPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRegistrasiId($value);
                break;
            case 1:
                $this->setJurusanSpId($value);
                break;
            case 2:
                $this->setPesertaDidikId($value);
                break;
            case 3:
                $this->setSekolahId($value);
                break;
            case 4:
                $this->setJenisPendaftaranId($value);
                break;
            case 5:
                $this->setNipd($value);
                break;
            case 6:
                $this->setTanggalMasukSekolah($value);
                break;
            case 7:
                $this->setJenisKeluarId($value);
                break;
            case 8:
                $this->setTanggalKeluar($value);
                break;
            case 9:
                $this->setKeterangan($value);
                break;
            case 10:
                $this->setNoSkhun($value);
                break;
            case 11:
                $this->setNoPesertaUjian($value);
                break;
            case 12:
                $this->setNoSeriIjazah($value);
                break;
            case 13:
                $this->setAPernahPaud($value);
                break;
            case 14:
                $this->setAPernahTk($value);
                break;
            case 15:
                $this->setSekolahAsal($value);
                break;
            case 16:
                $this->setIdHobby($value);
                break;
            case 17:
                $this->setIdCita($value);
                break;
            case 18:
                $this->setCreateDate($value);
                break;
            case 19:
                $this->setLastUpdate($value);
                break;
            case 20:
                $this->setSoftDelete($value);
                break;
            case 21:
                $this->setLastSync($value);
                break;
            case 22:
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
        $keys = RegistrasiPesertaDidikPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setRegistrasiId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJurusanSpId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPesertaDidikId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSekolahId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJenisPendaftaranId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNipd($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTanggalMasukSekolah($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJenisKeluarId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTanggalKeluar($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKeterangan($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNoSkhun($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNoPesertaUjian($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setNoSeriIjazah($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAPernahPaud($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAPernahTk($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setSekolahAsal($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setIdHobby($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setIdCita($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCreateDate($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setLastUpdate($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setSoftDelete($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setLastSync($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setUpdaterId($arr[$keys[22]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::REGISTRASI_ID)) $criteria->add(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $this->registrasi_id);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID)) $criteria->add(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, $this->jurusan_sp_id);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID)) $criteria->add(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::SEKOLAH_ID)) $criteria->add(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID)) $criteria->add(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, $this->jenis_pendaftaran_id);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NIPD)) $criteria->add(RegistrasiPesertaDidikPeer::NIPD, $this->nipd);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH)) $criteria->add(RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH, $this->tanggal_masuk_sekolah);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID)) $criteria->add(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, $this->jenis_keluar_id);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::TANGGAL_KELUAR)) $criteria->add(RegistrasiPesertaDidikPeer::TANGGAL_KELUAR, $this->tanggal_keluar);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::KETERANGAN)) $criteria->add(RegistrasiPesertaDidikPeer::KETERANGAN, $this->keterangan);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NO_SKHUN)) $criteria->add(RegistrasiPesertaDidikPeer::NO_SKHUN, $this->no_skhun);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN)) $criteria->add(RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN, $this->no_peserta_ujian);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH)) $criteria->add(RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH, $this->no_seri_ijazah);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::A_PERNAH_PAUD)) $criteria->add(RegistrasiPesertaDidikPeer::A_PERNAH_PAUD, $this->a_pernah_paud);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::A_PERNAH_TK)) $criteria->add(RegistrasiPesertaDidikPeer::A_PERNAH_TK, $this->a_pernah_tk);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::SEKOLAH_ASAL)) $criteria->add(RegistrasiPesertaDidikPeer::SEKOLAH_ASAL, $this->sekolah_asal);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::ID_HOBBY)) $criteria->add(RegistrasiPesertaDidikPeer::ID_HOBBY, $this->id_hobby);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::ID_CITA)) $criteria->add(RegistrasiPesertaDidikPeer::ID_CITA, $this->id_cita);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::CREATE_DATE)) $criteria->add(RegistrasiPesertaDidikPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::LAST_UPDATE)) $criteria->add(RegistrasiPesertaDidikPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::SOFT_DELETE)) $criteria->add(RegistrasiPesertaDidikPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::LAST_SYNC)) $criteria->add(RegistrasiPesertaDidikPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RegistrasiPesertaDidikPeer::UPDATER_ID)) $criteria->add(RegistrasiPesertaDidikPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        $criteria->add(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $this->registrasi_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getRegistrasiId();
    }

    /**
     * Generic method to set the primary key (registrasi_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRegistrasiId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getRegistrasiId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RegistrasiPesertaDidik (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJurusanSpId($this->getJurusanSpId());
        $copyObj->setPesertaDidikId($this->getPesertaDidikId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setJenisPendaftaranId($this->getJenisPendaftaranId());
        $copyObj->setNipd($this->getNipd());
        $copyObj->setTanggalMasukSekolah($this->getTanggalMasukSekolah());
        $copyObj->setJenisKeluarId($this->getJenisKeluarId());
        $copyObj->setTanggalKeluar($this->getTanggalKeluar());
        $copyObj->setKeterangan($this->getKeterangan());
        $copyObj->setNoSkhun($this->getNoSkhun());
        $copyObj->setNoPesertaUjian($this->getNoPesertaUjian());
        $copyObj->setNoSeriIjazah($this->getNoSeriIjazah());
        $copyObj->setAPernahPaud($this->getAPernahPaud());
        $copyObj->setAPernahTk($this->getAPernahTk());
        $copyObj->setSekolahAsal($this->getSekolahAsal());
        $copyObj->setIdHobby($this->getIdHobby());
        $copyObj->setIdCita($this->getIdCita());
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

            foreach ($this->getAnggotaAktPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaAktPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTracerLulusans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTracerLulusan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRegPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRegPd($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRegistrasiId(NULL); // this is a auto-increment column, so set to default value
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
     * @return RegistrasiPesertaDidik Clone of current object.
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
     * @return RegistrasiPesertaDidikPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RegistrasiPesertaDidikPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JurusanSp object.
     *
     * @param             JurusanSp $v
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJurusanSp(JurusanSp $v = null)
    {
        if ($v === null) {
            $this->setJurusanSpId(NULL);
        } else {
            $this->setJurusanSpId($v->getJurusanSpId());
        }

        $this->aJurusanSp = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JurusanSp object, it will not be re-added.
        if ($v !== null) {
            $v->addRegistrasiPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated JurusanSp object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JurusanSp The associated JurusanSp object.
     * @throws PropelException
     */
    public function getJurusanSp(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJurusanSp === null && (($this->jurusan_sp_id !== "" && $this->jurusan_sp_id !== null)) && $doQuery) {
            $this->aJurusanSp = JurusanSpQuery::create()->findPk($this->jurusan_sp_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJurusanSp->addRegistrasiPesertaDidiks($this);
             */
        }

        return $this->aJurusanSp;
    }

    /**
     * Declares an association between this object and a PesertaDidik object.
     *
     * @param             PesertaDidik $v
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPesertaDidik(PesertaDidik $v = null)
    {
        if ($v === null) {
            $this->setPesertaDidikId(NULL);
        } else {
            $this->setPesertaDidikId($v->getPesertaDidikId());
        }

        $this->aPesertaDidik = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the PesertaDidik object, it will not be re-added.
        if ($v !== null) {
            $v->addRegistrasiPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated PesertaDidik object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return PesertaDidik The associated PesertaDidik object.
     * @throws PropelException
     */
    public function getPesertaDidik(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPesertaDidik === null && (($this->peserta_didik_id !== "" && $this->peserta_didik_id !== null)) && $doQuery) {
            $this->aPesertaDidik = PesertaDidikQuery::create()->findPk($this->peserta_didik_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPesertaDidik->addRegistrasiPesertaDidiks($this);
             */
        }

        return $this->aPesertaDidik;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolah(Sekolah $v = null)
    {
        if ($v === null) {
            $this->setSekolahId(NULL);
        } else {
            $this->setSekolahId($v->getSekolahId());
        }

        $this->aSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addRegistrasiPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated Sekolah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sekolah The associated Sekolah object.
     * @throws PropelException
     */
    public function getSekolah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSekolah === null && (($this->sekolah_id !== "" && $this->sekolah_id !== null)) && $doQuery) {
            $this->aSekolah = SekolahQuery::create()->findPk($this->sekolah_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolah->addRegistrasiPesertaDidiks($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a JenisPendaftaran object.
     *
     * @param             JenisPendaftaran $v
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisPendaftaran(JenisPendaftaran $v = null)
    {
        if ($v === null) {
            $this->setJenisPendaftaranId(NULL);
        } else {
            $this->setJenisPendaftaranId($v->getJenisPendaftaranId());
        }

        $this->aJenisPendaftaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisPendaftaran object, it will not be re-added.
        if ($v !== null) {
            $v->addRegistrasiPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisPendaftaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisPendaftaran The associated JenisPendaftaran object.
     * @throws PropelException
     */
    public function getJenisPendaftaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisPendaftaran === null && (($this->jenis_pendaftaran_id !== "" && $this->jenis_pendaftaran_id !== null)) && $doQuery) {
            $this->aJenisPendaftaran = JenisPendaftaranQuery::create()->findPk($this->jenis_pendaftaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisPendaftaran->addRegistrasiPesertaDidiks($this);
             */
        }

        return $this->aJenisPendaftaran;
    }

    /**
     * Declares an association between this object and a JenisKeluar object.
     *
     * @param             JenisKeluar $v
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisKeluar(JenisKeluar $v = null)
    {
        if ($v === null) {
            $this->setJenisKeluarId(NULL);
        } else {
            $this->setJenisKeluarId($v->getJenisKeluarId());
        }

        $this->aJenisKeluar = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisKeluar object, it will not be re-added.
        if ($v !== null) {
            $v->addRegistrasiPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisKeluar object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisKeluar The associated JenisKeluar object.
     * @throws PropelException
     */
    public function getJenisKeluar(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisKeluar === null && (($this->jenis_keluar_id !== "" && $this->jenis_keluar_id !== null)) && $doQuery) {
            $this->aJenisKeluar = JenisKeluarQuery::create()->findPk($this->jenis_keluar_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisKeluar->addRegistrasiPesertaDidiks($this);
             */
        }

        return $this->aJenisKeluar;
    }

    /**
     * Declares an association between this object and a JenisCita object.
     *
     * @param             JenisCita $v
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisCita(JenisCita $v = null)
    {
        if ($v === null) {
            $this->setIdCita(NULL);
        } else {
            $this->setIdCita($v->getIdCita());
        }

        $this->aJenisCita = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisCita object, it will not be re-added.
        if ($v !== null) {
            $v->addRegistrasiPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisCita object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisCita The associated JenisCita object.
     * @throws PropelException
     */
    public function getJenisCita(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisCita === null && (($this->id_cita !== "" && $this->id_cita !== null)) && $doQuery) {
            $this->aJenisCita = JenisCitaQuery::create()->findPk($this->id_cita, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisCita->addRegistrasiPesertaDidiks($this);
             */
        }

        return $this->aJenisCita;
    }

    /**
     * Declares an association between this object and a JenisHobby object.
     *
     * @param             JenisHobby $v
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisHobby(JenisHobby $v = null)
    {
        if ($v === null) {
            $this->setIdHobby(NULL);
        } else {
            $this->setIdHobby($v->getIdHobby());
        }

        $this->aJenisHobby = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisHobby object, it will not be re-added.
        if ($v !== null) {
            $v->addRegistrasiPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisHobby object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisHobby The associated JenisHobby object.
     * @throws PropelException
     */
    public function getJenisHobby(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisHobby === null && (($this->id_hobby !== "" && $this->id_hobby !== null)) && $doQuery) {
            $this->aJenisHobby = JenisHobbyQuery::create()->findPk($this->id_hobby, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisHobby->addRegistrasiPesertaDidiks($this);
             */
        }

        return $this->aJenisHobby;
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
        if ('AnggotaAktPd' == $relationName) {
            $this->initAnggotaAktPds();
        }
        if ('TracerLulusan' == $relationName) {
            $this->initTracerLulusans();
        }
        if ('VldRegPd' == $relationName) {
            $this->initVldRegPds();
        }
    }

    /**
     * Clears out the collAnggotaAktPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @see        addAnggotaAktPds()
     */
    public function clearAnggotaAktPds()
    {
        $this->collAnggotaAktPds = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaAktPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaAktPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaAktPds($v = true)
    {
        $this->collAnggotaAktPdsPartial = $v;
    }

    /**
     * Initializes the collAnggotaAktPds collection.
     *
     * By default this just sets the collAnggotaAktPds collection to an empty array (like clearcollAnggotaAktPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaAktPds($overrideExisting = true)
    {
        if (null !== $this->collAnggotaAktPds && !$overrideExisting) {
            return;
        }
        $this->collAnggotaAktPds = new PropelObjectCollection();
        $this->collAnggotaAktPds->setModel('AnggotaAktPd');
    }

    /**
     * Gets an array of AnggotaAktPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RegistrasiPesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaAktPd[] List of AnggotaAktPd objects
     * @throws PropelException
     */
    public function getAnggotaAktPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaAktPdsPartial && !$this->isNew();
        if (null === $this->collAnggotaAktPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaAktPds) {
                // return empty collection
                $this->initAnggotaAktPds();
            } else {
                $collAnggotaAktPds = AnggotaAktPdQuery::create(null, $criteria)
                    ->filterByRegistrasiPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaAktPdsPartial && count($collAnggotaAktPds)) {
                      $this->initAnggotaAktPds(false);

                      foreach($collAnggotaAktPds as $obj) {
                        if (false == $this->collAnggotaAktPds->contains($obj)) {
                          $this->collAnggotaAktPds->append($obj);
                        }
                      }

                      $this->collAnggotaAktPdsPartial = true;
                    }

                    $collAnggotaAktPds->getInternalIterator()->rewind();
                    return $collAnggotaAktPds;
                }

                if($partial && $this->collAnggotaAktPds) {
                    foreach($this->collAnggotaAktPds as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaAktPds[] = $obj;
                        }
                    }
                }

                $this->collAnggotaAktPds = $collAnggotaAktPds;
                $this->collAnggotaAktPdsPartial = false;
            }
        }

        return $this->collAnggotaAktPds;
    }

    /**
     * Sets a collection of AnggotaAktPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaAktPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setAnggotaAktPds(PropelCollection $anggotaAktPds, PropelPDO $con = null)
    {
        $anggotaAktPdsToDelete = $this->getAnggotaAktPds(new Criteria(), $con)->diff($anggotaAktPds);

        $this->anggotaAktPdsScheduledForDeletion = unserialize(serialize($anggotaAktPdsToDelete));

        foreach ($anggotaAktPdsToDelete as $anggotaAktPdRemoved) {
            $anggotaAktPdRemoved->setRegistrasiPesertaDidik(null);
        }

        $this->collAnggotaAktPds = null;
        foreach ($anggotaAktPds as $anggotaAktPd) {
            $this->addAnggotaAktPd($anggotaAktPd);
        }

        $this->collAnggotaAktPds = $anggotaAktPds;
        $this->collAnggotaAktPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaAktPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaAktPd objects.
     * @throws PropelException
     */
    public function countAnggotaAktPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaAktPdsPartial && !$this->isNew();
        if (null === $this->collAnggotaAktPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaAktPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaAktPds());
            }
            $query = AnggotaAktPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegistrasiPesertaDidik($this)
                ->count($con);
        }

        return count($this->collAnggotaAktPds);
    }

    /**
     * Method called to associate a AnggotaAktPd object to this object
     * through the AnggotaAktPd foreign key attribute.
     *
     * @param    AnggotaAktPd $l AnggotaAktPd
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function addAnggotaAktPd(AnggotaAktPd $l)
    {
        if ($this->collAnggotaAktPds === null) {
            $this->initAnggotaAktPds();
            $this->collAnggotaAktPdsPartial = true;
        }
        if (!in_array($l, $this->collAnggotaAktPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaAktPd($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaAktPd $anggotaAktPd The anggotaAktPd object to add.
     */
    protected function doAddAnggotaAktPd($anggotaAktPd)
    {
        $this->collAnggotaAktPds[]= $anggotaAktPd;
        $anggotaAktPd->setRegistrasiPesertaDidik($this);
    }

    /**
     * @param	AnggotaAktPd $anggotaAktPd The anggotaAktPd object to remove.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function removeAnggotaAktPd($anggotaAktPd)
    {
        if ($this->getAnggotaAktPds()->contains($anggotaAktPd)) {
            $this->collAnggotaAktPds->remove($this->collAnggotaAktPds->search($anggotaAktPd));
            if (null === $this->anggotaAktPdsScheduledForDeletion) {
                $this->anggotaAktPdsScheduledForDeletion = clone $this->collAnggotaAktPds;
                $this->anggotaAktPdsScheduledForDeletion->clear();
            }
            $this->anggotaAktPdsScheduledForDeletion[]= clone $anggotaAktPd;
            $anggotaAktPd->setRegistrasiPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RegistrasiPesertaDidik is new, it will return
     * an empty collection; or if this RegistrasiPesertaDidik has previously
     * been saved, it will retrieve related AnggotaAktPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RegistrasiPesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaAktPd[] List of AnggotaAktPd objects
     */
    public function getAnggotaAktPdsJoinAktPd($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaAktPdQuery::create(null, $criteria);
        $query->joinWith('AktPd', $join_behavior);

        return $this->getAnggotaAktPds($query, $con);
    }

    /**
     * Clears out the collTracerLulusans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @see        addTracerLulusans()
     */
    public function clearTracerLulusans()
    {
        $this->collTracerLulusans = null; // important to set this to null since that means it is uninitialized
        $this->collTracerLulusansPartial = null;

        return $this;
    }

    /**
     * reset is the collTracerLulusans collection loaded partially
     *
     * @return void
     */
    public function resetPartialTracerLulusans($v = true)
    {
        $this->collTracerLulusansPartial = $v;
    }

    /**
     * Initializes the collTracerLulusans collection.
     *
     * By default this just sets the collTracerLulusans collection to an empty array (like clearcollTracerLulusans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTracerLulusans($overrideExisting = true)
    {
        if (null !== $this->collTracerLulusans && !$overrideExisting) {
            return;
        }
        $this->collTracerLulusans = new PropelObjectCollection();
        $this->collTracerLulusans->setModel('TracerLulusan');
    }

    /**
     * Gets an array of TracerLulusan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RegistrasiPesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     * @throws PropelException
     */
    public function getTracerLulusans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTracerLulusansPartial && !$this->isNew();
        if (null === $this->collTracerLulusans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTracerLulusans) {
                // return empty collection
                $this->initTracerLulusans();
            } else {
                $collTracerLulusans = TracerLulusanQuery::create(null, $criteria)
                    ->filterByRegistrasiPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTracerLulusansPartial && count($collTracerLulusans)) {
                      $this->initTracerLulusans(false);

                      foreach($collTracerLulusans as $obj) {
                        if (false == $this->collTracerLulusans->contains($obj)) {
                          $this->collTracerLulusans->append($obj);
                        }
                      }

                      $this->collTracerLulusansPartial = true;
                    }

                    $collTracerLulusans->getInternalIterator()->rewind();
                    return $collTracerLulusans;
                }

                if($partial && $this->collTracerLulusans) {
                    foreach($this->collTracerLulusans as $obj) {
                        if($obj->isNew()) {
                            $collTracerLulusans[] = $obj;
                        }
                    }
                }

                $this->collTracerLulusans = $collTracerLulusans;
                $this->collTracerLulusansPartial = false;
            }
        }

        return $this->collTracerLulusans;
    }

    /**
     * Sets a collection of TracerLulusan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tracerLulusans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setTracerLulusans(PropelCollection $tracerLulusans, PropelPDO $con = null)
    {
        $tracerLulusansToDelete = $this->getTracerLulusans(new Criteria(), $con)->diff($tracerLulusans);

        $this->tracerLulusansScheduledForDeletion = unserialize(serialize($tracerLulusansToDelete));

        foreach ($tracerLulusansToDelete as $tracerLulusanRemoved) {
            $tracerLulusanRemoved->setRegistrasiPesertaDidik(null);
        }

        $this->collTracerLulusans = null;
        foreach ($tracerLulusans as $tracerLulusan) {
            $this->addTracerLulusan($tracerLulusan);
        }

        $this->collTracerLulusans = $tracerLulusans;
        $this->collTracerLulusansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TracerLulusan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TracerLulusan objects.
     * @throws PropelException
     */
    public function countTracerLulusans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTracerLulusansPartial && !$this->isNew();
        if (null === $this->collTracerLulusans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTracerLulusans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTracerLulusans());
            }
            $query = TracerLulusanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegistrasiPesertaDidik($this)
                ->count($con);
        }

        return count($this->collTracerLulusans);
    }

    /**
     * Method called to associate a TracerLulusan object to this object
     * through the TracerLulusan foreign key attribute.
     *
     * @param    TracerLulusan $l TracerLulusan
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function addTracerLulusan(TracerLulusan $l)
    {
        if ($this->collTracerLulusans === null) {
            $this->initTracerLulusans();
            $this->collTracerLulusansPartial = true;
        }
        if (!in_array($l, $this->collTracerLulusans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTracerLulusan($l);
        }

        return $this;
    }

    /**
     * @param	TracerLulusan $tracerLulusan The tracerLulusan object to add.
     */
    protected function doAddTracerLulusan($tracerLulusan)
    {
        $this->collTracerLulusans[]= $tracerLulusan;
        $tracerLulusan->setRegistrasiPesertaDidik($this);
    }

    /**
     * @param	TracerLulusan $tracerLulusan The tracerLulusan object to remove.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function removeTracerLulusan($tracerLulusan)
    {
        if ($this->getTracerLulusans()->contains($tracerLulusan)) {
            $this->collTracerLulusans->remove($this->collTracerLulusans->search($tracerLulusan));
            if (null === $this->tracerLulusansScheduledForDeletion) {
                $this->tracerLulusansScheduledForDeletion = clone $this->collTracerLulusans;
                $this->tracerLulusansScheduledForDeletion->clear();
            }
            $this->tracerLulusansScheduledForDeletion[]= clone $tracerLulusan;
            $tracerLulusan->setRegistrasiPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RegistrasiPesertaDidik is new, it will return
     * an empty collection; or if this RegistrasiPesertaDidik has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RegistrasiPesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinPenghasilan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('Penghasilan', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RegistrasiPesertaDidik is new, it will return
     * an empty collection; or if this RegistrasiPesertaDidik has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RegistrasiPesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinBidangUsaha($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('BidangUsaha', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RegistrasiPesertaDidik is new, it will return
     * an empty collection; or if this RegistrasiPesertaDidik has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RegistrasiPesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinDudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('Dudi', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RegistrasiPesertaDidik is new, it will return
     * an empty collection; or if this RegistrasiPesertaDidik has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RegistrasiPesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinPekerjaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('Pekerjaan', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }

    /**
     * Clears out the collVldRegPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     * @see        addVldRegPds()
     */
    public function clearVldRegPds()
    {
        $this->collVldRegPds = null; // important to set this to null since that means it is uninitialized
        $this->collVldRegPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRegPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRegPds($v = true)
    {
        $this->collVldRegPdsPartial = $v;
    }

    /**
     * Initializes the collVldRegPds collection.
     *
     * By default this just sets the collVldRegPds collection to an empty array (like clearcollVldRegPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRegPds($overrideExisting = true)
    {
        if (null !== $this->collVldRegPds && !$overrideExisting) {
            return;
        }
        $this->collVldRegPds = new PropelObjectCollection();
        $this->collVldRegPds->setModel('VldRegPd');
    }

    /**
     * Gets an array of VldRegPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RegistrasiPesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRegPd[] List of VldRegPd objects
     * @throws PropelException
     */
    public function getVldRegPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRegPdsPartial && !$this->isNew();
        if (null === $this->collVldRegPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRegPds) {
                // return empty collection
                $this->initVldRegPds();
            } else {
                $collVldRegPds = VldRegPdQuery::create(null, $criteria)
                    ->filterByRegistrasiPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRegPdsPartial && count($collVldRegPds)) {
                      $this->initVldRegPds(false);

                      foreach($collVldRegPds as $obj) {
                        if (false == $this->collVldRegPds->contains($obj)) {
                          $this->collVldRegPds->append($obj);
                        }
                      }

                      $this->collVldRegPdsPartial = true;
                    }

                    $collVldRegPds->getInternalIterator()->rewind();
                    return $collVldRegPds;
                }

                if($partial && $this->collVldRegPds) {
                    foreach($this->collVldRegPds as $obj) {
                        if($obj->isNew()) {
                            $collVldRegPds[] = $obj;
                        }
                    }
                }

                $this->collVldRegPds = $collVldRegPds;
                $this->collVldRegPdsPartial = false;
            }
        }

        return $this->collVldRegPds;
    }

    /**
     * Sets a collection of VldRegPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRegPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function setVldRegPds(PropelCollection $vldRegPds, PropelPDO $con = null)
    {
        $vldRegPdsToDelete = $this->getVldRegPds(new Criteria(), $con)->diff($vldRegPds);

        $this->vldRegPdsScheduledForDeletion = unserialize(serialize($vldRegPdsToDelete));

        foreach ($vldRegPdsToDelete as $vldRegPdRemoved) {
            $vldRegPdRemoved->setRegistrasiPesertaDidik(null);
        }

        $this->collVldRegPds = null;
        foreach ($vldRegPds as $vldRegPd) {
            $this->addVldRegPd($vldRegPd);
        }

        $this->collVldRegPds = $vldRegPds;
        $this->collVldRegPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRegPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRegPd objects.
     * @throws PropelException
     */
    public function countVldRegPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRegPdsPartial && !$this->isNew();
        if (null === $this->collVldRegPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRegPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRegPds());
            }
            $query = VldRegPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegistrasiPesertaDidik($this)
                ->count($con);
        }

        return count($this->collVldRegPds);
    }

    /**
     * Method called to associate a VldRegPd object to this object
     * through the VldRegPd foreign key attribute.
     *
     * @param    VldRegPd $l VldRegPd
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function addVldRegPd(VldRegPd $l)
    {
        if ($this->collVldRegPds === null) {
            $this->initVldRegPds();
            $this->collVldRegPdsPartial = true;
        }
        if (!in_array($l, $this->collVldRegPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRegPd($l);
        }

        return $this;
    }

    /**
     * @param	VldRegPd $vldRegPd The vldRegPd object to add.
     */
    protected function doAddVldRegPd($vldRegPd)
    {
        $this->collVldRegPds[]= $vldRegPd;
        $vldRegPd->setRegistrasiPesertaDidik($this);
    }

    /**
     * @param	VldRegPd $vldRegPd The vldRegPd object to remove.
     * @return RegistrasiPesertaDidik The current object (for fluent API support)
     */
    public function removeVldRegPd($vldRegPd)
    {
        if ($this->getVldRegPds()->contains($vldRegPd)) {
            $this->collVldRegPds->remove($this->collVldRegPds->search($vldRegPd));
            if (null === $this->vldRegPdsScheduledForDeletion) {
                $this->vldRegPdsScheduledForDeletion = clone $this->collVldRegPds;
                $this->vldRegPdsScheduledForDeletion->clear();
            }
            $this->vldRegPdsScheduledForDeletion[]= clone $vldRegPd;
            $vldRegPd->setRegistrasiPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RegistrasiPesertaDidik is new, it will return
     * an empty collection; or if this RegistrasiPesertaDidik has previously
     * been saved, it will retrieve related VldRegPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RegistrasiPesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRegPd[] List of VldRegPd objects
     */
    public function getVldRegPdsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRegPdQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldRegPds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->registrasi_id = null;
        $this->jurusan_sp_id = null;
        $this->peserta_didik_id = null;
        $this->sekolah_id = null;
        $this->jenis_pendaftaran_id = null;
        $this->nipd = null;
        $this->tanggal_masuk_sekolah = null;
        $this->jenis_keluar_id = null;
        $this->tanggal_keluar = null;
        $this->keterangan = null;
        $this->no_skhun = null;
        $this->no_peserta_ujian = null;
        $this->no_seri_ijazah = null;
        $this->a_pernah_paud = null;
        $this->a_pernah_tk = null;
        $this->sekolah_asal = null;
        $this->id_hobby = null;
        $this->id_cita = null;
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
            if ($this->collAnggotaAktPds) {
                foreach ($this->collAnggotaAktPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTracerLulusans) {
                foreach ($this->collTracerLulusans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRegPds) {
                foreach ($this->collVldRegPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJurusanSp instanceof Persistent) {
              $this->aJurusanSp->clearAllReferences($deep);
            }
            if ($this->aPesertaDidik instanceof Persistent) {
              $this->aPesertaDidik->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aJenisPendaftaran instanceof Persistent) {
              $this->aJenisPendaftaran->clearAllReferences($deep);
            }
            if ($this->aJenisKeluar instanceof Persistent) {
              $this->aJenisKeluar->clearAllReferences($deep);
            }
            if ($this->aJenisCita instanceof Persistent) {
              $this->aJenisCita->clearAllReferences($deep);
            }
            if ($this->aJenisHobby instanceof Persistent) {
              $this->aJenisHobby->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAnggotaAktPds instanceof PropelCollection) {
            $this->collAnggotaAktPds->clearIterator();
        }
        $this->collAnggotaAktPds = null;
        if ($this->collTracerLulusans instanceof PropelCollection) {
            $this->collTracerLulusans->clearIterator();
        }
        $this->collTracerLulusans = null;
        if ($this->collVldRegPds instanceof PropelCollection) {
            $this->collVldRegPds->clearIterator();
        }
        $this->collVldRegPds = null;
        $this->aJurusanSp = null;
        $this->aPesertaDidik = null;
        $this->aSekolah = null;
        $this->aJenisPendaftaran = null;
        $this->aJenisKeluar = null;
        $this->aJenisCita = null;
        $this->aJenisHobby = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RegistrasiPesertaDidikPeer::DEFAULT_STRING_FORMAT);
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
