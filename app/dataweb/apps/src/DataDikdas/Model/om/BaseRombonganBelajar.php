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
use DataDikdas\Model\AnggotaRombel;
use DataDikdas\Model\AnggotaRombelQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususQuery;
use DataDikdas\Model\KelasEkskul;
use DataDikdas\Model\KelasEkskulQuery;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\KurikulumQuery;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarPeer;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\TingkatPendidikanQuery;
use DataDikdas\Model\VldRombel;
use DataDikdas\Model\VldRombelQuery;

/**
 * Base class that represents a row from the 'rombongan_belajar' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRombonganBelajar extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RombonganBelajarPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RombonganBelajarPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the rombongan_belajar_id field.
     * @var        string
     */
    protected $rombongan_belajar_id;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

    /**
     * The value for the id_ruang field.
     * @var        string
     */
    protected $id_ruang;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the tingkat_pendidikan_id field.
     * @var        string
     */
    protected $tingkat_pendidikan_id;

    /**
     * The value for the jurusan_sp_id field.
     * @var        string
     */
    protected $jurusan_sp_id;

    /**
     * The value for the kurikulum_id field.
     * @var        int
     */
    protected $kurikulum_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the moving_class field.
     * @var        string
     */
    protected $moving_class;

    /**
     * The value for the jenis_rombel field.
     * @var        string
     */
    protected $jenis_rombel;

    /**
     * The value for the sks field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $sks;

    /**
     * The value for the tanggal_mulai field.
     * @var        string
     */
    protected $tanggal_mulai;

    /**
     * The value for the tanggal_selesai field.
     * @var        string
     */
    protected $tanggal_selesai;

    /**
     * The value for the kebutuhan_khusus_id field.
     * @var        int
     */
    protected $kebutuhan_khusus_id;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
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
     * @var        KebutuhanKhusus
     */
    protected $aKebutuhanKhusus;

    /**
     * @var        Kurikulum
     */
    protected $aKurikulum;

    /**
     * @var        Semester
     */
    protected $aSemester;

    /**
     * @var        TingkatPendidikan
     */
    protected $aTingkatPendidikan;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        Ruang
     */
    protected $aRuang;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|AnggotaRombel[] Collection to store aggregation of AnggotaRombel objects.
     */
    protected $collAnggotaRombels;
    protected $collAnggotaRombelsPartial;

    /**
     * @var        PropelObjectCollection|KelasEkskul[] Collection to store aggregation of KelasEkskul objects.
     */
    protected $collKelasEkskuls;
    protected $collKelasEkskulsPartial;

    /**
     * @var        PropelObjectCollection|Pembelajaran[] Collection to store aggregation of Pembelajaran objects.
     */
    protected $collPembelajarans;
    protected $collPembelajaransPartial;

    /**
     * @var        PropelObjectCollection|VldRombel[] Collection to store aggregation of VldRombel objects.
     */
    protected $collVldRombels;
    protected $collVldRombelsPartial;

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
    protected $anggotaRombelsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kelasEkskulsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pembelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRombelsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->sks = '0';
        $this->create_date = '2020-04-16 09:40:03';
        $this->last_update = '2020-04-16 09:40:03';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseRombonganBelajar object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [rombongan_belajar_id] column value.
     * 
     * @return string
     */
    public function getRombonganBelajarId()
    {
        return $this->rombongan_belajar_id;
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
     * Get the [id_ruang] column value.
     * 
     * @return string
     */
    public function getIdRuang()
    {
        return $this->id_ruang;
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
     * Get the [tingkat_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getTingkatPendidikanId()
    {
        return $this->tingkat_pendidikan_id;
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
     * Get the [kurikulum_id] column value.
     * 
     * @return int
     */
    public function getKurikulumId()
    {
        return $this->kurikulum_id;
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
     * Get the [ptk_id] column value.
     * 
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
    }

    /**
     * Get the [moving_class] column value.
     * 
     * @return string
     */
    public function getMovingClass()
    {
        return $this->moving_class;
    }

    /**
     * Get the [jenis_rombel] column value.
     * 
     * @return string
     */
    public function getJenisRombel()
    {
        return $this->jenis_rombel;
    }

    /**
     * Get the [sks] column value.
     * 
     * @return string
     */
    public function getSks()
    {
        return $this->sks;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_mulai] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalMulai($format = '%Y-%m-%d')
    {
        if ($this->tanggal_mulai === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_mulai);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_mulai, true), $x);
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
     * Get the [optionally formatted] temporal [tanggal_selesai] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSelesai($format = '%Y-%m-%d')
    {
        if ($this->tanggal_selesai === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_selesai);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_selesai, true), $x);
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
     * Get the [kebutuhan_khusus_id] column value.
     * 
     * @return int
     */
    public function getKebutuhanKhususId()
    {
        return $this->kebutuhan_khusus_id;
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
     * Set the value of [rombongan_belajar_id] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setRombonganBelajarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rombongan_belajar_id !== $v) {
            $this->rombongan_belajar_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID;
        }


        return $this;
    } // setRombonganBelajarId()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [id_ruang] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_ruang !== $v) {
            $this->id_ruang = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::ID_RUANG;
        }

        if ($this->aRuang !== null && $this->aRuang->getIdRuang() !== $v) {
            $this->aRuang = null;
        }


        return $this;
    } // setIdRuang()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [tingkat_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setTingkatPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tingkat_pendidikan_id !== $v) {
            $this->tingkat_pendidikan_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID;
        }

        if ($this->aTingkatPendidikan !== null && $this->aTingkatPendidikan->getTingkatPendidikanId() !== $v) {
            $this->aTingkatPendidikan = null;
        }


        return $this;
    } // setTingkatPendidikanId()

    /**
     * Set the value of [jurusan_sp_id] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setJurusanSpId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_sp_id !== $v) {
            $this->jurusan_sp_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::JURUSAN_SP_ID;
        }

        if ($this->aJurusanSp !== null && $this->aJurusanSp->getJurusanSpId() !== $v) {
            $this->aJurusanSp = null;
        }


        return $this;
    } // setJurusanSpId()

    /**
     * Set the value of [kurikulum_id] column.
     * 
     * @param int $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setKurikulumId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kurikulum_id !== $v) {
            $this->kurikulum_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::KURIKULUM_ID;
        }

        if ($this->aKurikulum !== null && $this->aKurikulum->getKurikulumId() !== $v) {
            $this->aKurikulum = null;
        }


        return $this;
    } // setKurikulumId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [moving_class] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setMovingClass($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->moving_class !== $v) {
            $this->moving_class = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::MOVING_CLASS;
        }


        return $this;
    } // setMovingClass()

    /**
     * Set the value of [jenis_rombel] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setJenisRombel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_rombel !== $v) {
            $this->jenis_rombel = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::JENIS_ROMBEL;
        }


        return $this;
    } // setJenisRombel()

    /**
     * Set the value of [sks] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setSks($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sks !== $v) {
            $this->sks = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::SKS;
        }


        return $this;
    } // setSks()

    /**
     * Sets the value of [tanggal_mulai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setTanggalMulai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_mulai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_mulai !== null && $tmpDt = new DateTime($this->tanggal_mulai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_mulai = $newDateAsString;
                $this->modifiedColumns[] = RombonganBelajarPeer::TANGGAL_MULAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalMulai()

    /**
     * Sets the value of [tanggal_selesai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setTanggalSelesai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_selesai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_selesai !== null && $tmpDt = new DateTime($this->tanggal_selesai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_selesai = $newDateAsString;
                $this->modifiedColumns[] = RombonganBelajarPeer::TANGGAL_SELESAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalSelesai()

    /**
     * Set the value of [kebutuhan_khusus_id] column.
     * 
     * @param int $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setKebutuhanKhususId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id !== $v) {
            $this->kebutuhan_khusus_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID;
        }

        if ($this->aKebutuhanKhusus !== null && $this->aKebutuhanKhusus->getKebutuhanKhususId() !== $v) {
            $this->aKebutuhanKhusus = null;
        }


        return $this;
    } // setKebutuhanKhususId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RombonganBelajarPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RombonganBelajarPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RombonganBelajar The current object (for fluent API support)
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
                $this->modifiedColumns[] = RombonganBelajarPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RombonganBelajarPeer::UPDATER_ID;
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
            if ($this->sks !== '0') {
                return false;
            }

            if ($this->create_date !== '2020-04-16 09:40:03') {
                return false;
            }

            if ($this->last_update !== '2020-04-16 09:40:03') {
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

            $this->rombongan_belajar_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->semester_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_ruang = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sekolah_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tingkat_pendidikan_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jurusan_sp_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kurikulum_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->nama = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->ptk_id = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->moving_class = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->jenis_rombel = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->sks = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->tanggal_mulai = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->tanggal_selesai = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->kebutuhan_khusus_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->create_date = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->last_update = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->soft_delete = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->last_sync = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->updater_id = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 20; // 20 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RombonganBelajar object", $e);
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

        if ($this->aSemester !== null && $this->semester_id !== $this->aSemester->getSemesterId()) {
            $this->aSemester = null;
        }
        if ($this->aRuang !== null && $this->id_ruang !== $this->aRuang->getIdRuang()) {
            $this->aRuang = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aTingkatPendidikan !== null && $this->tingkat_pendidikan_id !== $this->aTingkatPendidikan->getTingkatPendidikanId()) {
            $this->aTingkatPendidikan = null;
        }
        if ($this->aJurusanSp !== null && $this->jurusan_sp_id !== $this->aJurusanSp->getJurusanSpId()) {
            $this->aJurusanSp = null;
        }
        if ($this->aKurikulum !== null && $this->kurikulum_id !== $this->aKurikulum->getKurikulumId()) {
            $this->aKurikulum = null;
        }
        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aKebutuhanKhusus !== null && $this->kebutuhan_khusus_id !== $this->aKebutuhanKhusus->getKebutuhanKhususId()) {
            $this->aKebutuhanKhusus = null;
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
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RombonganBelajarPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJurusanSp = null;
            $this->aKebutuhanKhusus = null;
            $this->aKurikulum = null;
            $this->aSemester = null;
            $this->aTingkatPendidikan = null;
            $this->aPtk = null;
            $this->aRuang = null;
            $this->aSekolah = null;
            $this->collAnggotaRombels = null;

            $this->collKelasEkskuls = null;

            $this->collPembelajarans = null;

            $this->collVldRombels = null;

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
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RombonganBelajarQuery::create()
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
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RombonganBelajarPeer::addInstanceToPool($this);
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

            if ($this->aKebutuhanKhusus !== null) {
                if ($this->aKebutuhanKhusus->isModified() || $this->aKebutuhanKhusus->isNew()) {
                    $affectedRows += $this->aKebutuhanKhusus->save($con);
                }
                $this->setKebutuhanKhusus($this->aKebutuhanKhusus);
            }

            if ($this->aKurikulum !== null) {
                if ($this->aKurikulum->isModified() || $this->aKurikulum->isNew()) {
                    $affectedRows += $this->aKurikulum->save($con);
                }
                $this->setKurikulum($this->aKurikulum);
            }

            if ($this->aSemester !== null) {
                if ($this->aSemester->isModified() || $this->aSemester->isNew()) {
                    $affectedRows += $this->aSemester->save($con);
                }
                $this->setSemester($this->aSemester);
            }

            if ($this->aTingkatPendidikan !== null) {
                if ($this->aTingkatPendidikan->isModified() || $this->aTingkatPendidikan->isNew()) {
                    $affectedRows += $this->aTingkatPendidikan->save($con);
                }
                $this->setTingkatPendidikan($this->aTingkatPendidikan);
            }

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aRuang !== null) {
                if ($this->aRuang->isModified() || $this->aRuang->isNew()) {
                    $affectedRows += $this->aRuang->save($con);
                }
                $this->setRuang($this->aRuang);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
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

            if ($this->anggotaRombelsScheduledForDeletion !== null) {
                if (!$this->anggotaRombelsScheduledForDeletion->isEmpty()) {
                    AnggotaRombelQuery::create()
                        ->filterByPrimaryKeys($this->anggotaRombelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anggotaRombelsScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaRombels !== null) {
                foreach ($this->collAnggotaRombels as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kelasEkskulsScheduledForDeletion !== null) {
                if (!$this->kelasEkskulsScheduledForDeletion->isEmpty()) {
                    KelasEkskulQuery::create()
                        ->filterByPrimaryKeys($this->kelasEkskulsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kelasEkskulsScheduledForDeletion = null;
                }
            }

            if ($this->collKelasEkskuls !== null) {
                foreach ($this->collKelasEkskuls as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pembelajaransScheduledForDeletion !== null) {
                if (!$this->pembelajaransScheduledForDeletion->isEmpty()) {
                    PembelajaranQuery::create()
                        ->filterByPrimaryKeys($this->pembelajaransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pembelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collPembelajarans !== null) {
                foreach ($this->collPembelajarans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRombelsScheduledForDeletion !== null) {
                if (!$this->vldRombelsScheduledForDeletion->isEmpty()) {
                    VldRombelQuery::create()
                        ->filterByPrimaryKeys($this->vldRombelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRombelsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRombels !== null) {
                foreach ($this->collVldRombels as $referrerFK) {
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
        if ($this->isColumnModified(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"rombongan_belajar_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"id_ruang"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tingkat_pendidikan_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::JURUSAN_SP_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_sp_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::KURIKULUM_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kurikulum_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::MOVING_CLASS)) {
            $modifiedColumns[':p' . $index++]  = '"moving_class"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::JENIS_ROMBEL)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_rombel"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::SKS)) {
            $modifiedColumns[':p' . $index++]  = '"sks"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::TANGGAL_MULAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_mulai"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::TANGGAL_SELESAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_selesai"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus_id"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RombonganBelajarPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "rombongan_belajar" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"rombongan_belajar_id"':						
                        $stmt->bindValue($identifier, $this->rombongan_belajar_id, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"id_ruang"':						
                        $stmt->bindValue($identifier, $this->id_ruang, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"tingkat_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->tingkat_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"jurusan_sp_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_sp_id, PDO::PARAM_STR);
                        break;
                    case '"kurikulum_id"':						
                        $stmt->bindValue($identifier, $this->kurikulum_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"moving_class"':						
                        $stmt->bindValue($identifier, $this->moving_class, PDO::PARAM_STR);
                        break;
                    case '"jenis_rombel"':						
                        $stmt->bindValue($identifier, $this->jenis_rombel, PDO::PARAM_STR);
                        break;
                    case '"sks"':						
                        $stmt->bindValue($identifier, $this->sks, PDO::PARAM_STR);
                        break;
                    case '"tanggal_mulai"':						
                        $stmt->bindValue($identifier, $this->tanggal_mulai, PDO::PARAM_STR);
                        break;
                    case '"tanggal_selesai"':						
                        $stmt->bindValue($identifier, $this->tanggal_selesai, PDO::PARAM_STR);
                        break;
                    case '"kebutuhan_khusus_id"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus_id, PDO::PARAM_INT);
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

            if ($this->aKebutuhanKhusus !== null) {
                if (!$this->aKebutuhanKhusus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKebutuhanKhusus->getValidationFailures());
                }
            }

            if ($this->aKurikulum !== null) {
                if (!$this->aKurikulum->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKurikulum->getValidationFailures());
                }
            }

            if ($this->aSemester !== null) {
                if (!$this->aSemester->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSemester->getValidationFailures());
                }
            }

            if ($this->aTingkatPendidikan !== null) {
                if (!$this->aTingkatPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTingkatPendidikan->getValidationFailures());
                }
            }

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aRuang !== null) {
                if (!$this->aRuang->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRuang->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = RombonganBelajarPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAnggotaRombels !== null) {
                    foreach ($this->collAnggotaRombels as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKelasEkskuls !== null) {
                    foreach ($this->collKelasEkskuls as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPembelajarans !== null) {
                    foreach ($this->collPembelajarans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRombels !== null) {
                    foreach ($this->collVldRombels as $referrerFK) {
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
        $pos = RombonganBelajarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRombonganBelajarId();
                break;
            case 1:
                return $this->getSemesterId();
                break;
            case 2:
                return $this->getIdRuang();
                break;
            case 3:
                return $this->getSekolahId();
                break;
            case 4:
                return $this->getTingkatPendidikanId();
                break;
            case 5:
                return $this->getJurusanSpId();
                break;
            case 6:
                return $this->getKurikulumId();
                break;
            case 7:
                return $this->getNama();
                break;
            case 8:
                return $this->getPtkId();
                break;
            case 9:
                return $this->getMovingClass();
                break;
            case 10:
                return $this->getJenisRombel();
                break;
            case 11:
                return $this->getSks();
                break;
            case 12:
                return $this->getTanggalMulai();
                break;
            case 13:
                return $this->getTanggalSelesai();
                break;
            case 14:
                return $this->getKebutuhanKhususId();
                break;
            case 15:
                return $this->getCreateDate();
                break;
            case 16:
                return $this->getLastUpdate();
                break;
            case 17:
                return $this->getSoftDelete();
                break;
            case 18:
                return $this->getLastSync();
                break;
            case 19:
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
        if (isset($alreadyDumpedObjects['RombonganBelajar'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RombonganBelajar'][$this->getPrimaryKey()] = true;
        $keys = RombonganBelajarPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRombonganBelajarId(),
            $keys[1] => $this->getSemesterId(),
            $keys[2] => $this->getIdRuang(),
            $keys[3] => $this->getSekolahId(),
            $keys[4] => $this->getTingkatPendidikanId(),
            $keys[5] => $this->getJurusanSpId(),
            $keys[6] => $this->getKurikulumId(),
            $keys[7] => $this->getNama(),
            $keys[8] => $this->getPtkId(),
            $keys[9] => $this->getMovingClass(),
            $keys[10] => $this->getJenisRombel(),
            $keys[11] => $this->getSks(),
            $keys[12] => $this->getTanggalMulai(),
            $keys[13] => $this->getTanggalSelesai(),
            $keys[14] => $this->getKebutuhanKhususId(),
            $keys[15] => $this->getCreateDate(),
            $keys[16] => $this->getLastUpdate(),
            $keys[17] => $this->getSoftDelete(),
            $keys[18] => $this->getLastSync(),
            $keys[19] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJurusanSp) {
                $result['JurusanSp'] = $this->aJurusanSp->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKebutuhanKhusus) {
                $result['KebutuhanKhusus'] = $this->aKebutuhanKhusus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKurikulum) {
                $result['Kurikulum'] = $this->aKurikulum->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTingkatPendidikan) {
                $result['TingkatPendidikan'] = $this->aTingkatPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRuang) {
                $result['Ruang'] = $this->aRuang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAnggotaRombels) {
                $result['AnggotaRombels'] = $this->collAnggotaRombels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKelasEkskuls) {
                $result['KelasEkskuls'] = $this->collKelasEkskuls->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPembelajarans) {
                $result['Pembelajarans'] = $this->collPembelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRombels) {
                $result['VldRombels'] = $this->collVldRombels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RombonganBelajarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRombonganBelajarId($value);
                break;
            case 1:
                $this->setSemesterId($value);
                break;
            case 2:
                $this->setIdRuang($value);
                break;
            case 3:
                $this->setSekolahId($value);
                break;
            case 4:
                $this->setTingkatPendidikanId($value);
                break;
            case 5:
                $this->setJurusanSpId($value);
                break;
            case 6:
                $this->setKurikulumId($value);
                break;
            case 7:
                $this->setNama($value);
                break;
            case 8:
                $this->setPtkId($value);
                break;
            case 9:
                $this->setMovingClass($value);
                break;
            case 10:
                $this->setJenisRombel($value);
                break;
            case 11:
                $this->setSks($value);
                break;
            case 12:
                $this->setTanggalMulai($value);
                break;
            case 13:
                $this->setTanggalSelesai($value);
                break;
            case 14:
                $this->setKebutuhanKhususId($value);
                break;
            case 15:
                $this->setCreateDate($value);
                break;
            case 16:
                $this->setLastUpdate($value);
                break;
            case 17:
                $this->setSoftDelete($value);
                break;
            case 18:
                $this->setLastSync($value);
                break;
            case 19:
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
        $keys = RombonganBelajarPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setRombonganBelajarId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSemesterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdRuang($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSekolahId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTingkatPendidikanId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJurusanSpId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKurikulumId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setNama($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPtkId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setMovingClass($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setJenisRombel($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSks($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTanggalMulai($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setTanggalSelesai($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setKebutuhanKhususId($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setCreateDate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setLastUpdate($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setSoftDelete($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setLastSync($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setUpdaterId($arr[$keys[19]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RombonganBelajarPeer::DATABASE_NAME);

        if ($this->isColumnModified(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID)) $criteria->add(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $this->rombongan_belajar_id);
        if ($this->isColumnModified(RombonganBelajarPeer::SEMESTER_ID)) $criteria->add(RombonganBelajarPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(RombonganBelajarPeer::ID_RUANG)) $criteria->add(RombonganBelajarPeer::ID_RUANG, $this->id_ruang);
        if ($this->isColumnModified(RombonganBelajarPeer::SEKOLAH_ID)) $criteria->add(RombonganBelajarPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID)) $criteria->add(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, $this->tingkat_pendidikan_id);
        if ($this->isColumnModified(RombonganBelajarPeer::JURUSAN_SP_ID)) $criteria->add(RombonganBelajarPeer::JURUSAN_SP_ID, $this->jurusan_sp_id);
        if ($this->isColumnModified(RombonganBelajarPeer::KURIKULUM_ID)) $criteria->add(RombonganBelajarPeer::KURIKULUM_ID, $this->kurikulum_id);
        if ($this->isColumnModified(RombonganBelajarPeer::NAMA)) $criteria->add(RombonganBelajarPeer::NAMA, $this->nama);
        if ($this->isColumnModified(RombonganBelajarPeer::PTK_ID)) $criteria->add(RombonganBelajarPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(RombonganBelajarPeer::MOVING_CLASS)) $criteria->add(RombonganBelajarPeer::MOVING_CLASS, $this->moving_class);
        if ($this->isColumnModified(RombonganBelajarPeer::JENIS_ROMBEL)) $criteria->add(RombonganBelajarPeer::JENIS_ROMBEL, $this->jenis_rombel);
        if ($this->isColumnModified(RombonganBelajarPeer::SKS)) $criteria->add(RombonganBelajarPeer::SKS, $this->sks);
        if ($this->isColumnModified(RombonganBelajarPeer::TANGGAL_MULAI)) $criteria->add(RombonganBelajarPeer::TANGGAL_MULAI, $this->tanggal_mulai);
        if ($this->isColumnModified(RombonganBelajarPeer::TANGGAL_SELESAI)) $criteria->add(RombonganBelajarPeer::TANGGAL_SELESAI, $this->tanggal_selesai);
        if ($this->isColumnModified(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID)) $criteria->add(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, $this->kebutuhan_khusus_id);
        if ($this->isColumnModified(RombonganBelajarPeer::CREATE_DATE)) $criteria->add(RombonganBelajarPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RombonganBelajarPeer::LAST_UPDATE)) $criteria->add(RombonganBelajarPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RombonganBelajarPeer::SOFT_DELETE)) $criteria->add(RombonganBelajarPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RombonganBelajarPeer::LAST_SYNC)) $criteria->add(RombonganBelajarPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RombonganBelajarPeer::UPDATER_ID)) $criteria->add(RombonganBelajarPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RombonganBelajarPeer::DATABASE_NAME);
        $criteria->add(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $this->rombongan_belajar_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getRombonganBelajarId();
    }

    /**
     * Generic method to set the primary key (rombongan_belajar_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRombonganBelajarId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getRombonganBelajarId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RombonganBelajar (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setIdRuang($this->getIdRuang());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setTingkatPendidikanId($this->getTingkatPendidikanId());
        $copyObj->setJurusanSpId($this->getJurusanSpId());
        $copyObj->setKurikulumId($this->getKurikulumId());
        $copyObj->setNama($this->getNama());
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setMovingClass($this->getMovingClass());
        $copyObj->setJenisRombel($this->getJenisRombel());
        $copyObj->setSks($this->getSks());
        $copyObj->setTanggalMulai($this->getTanggalMulai());
        $copyObj->setTanggalSelesai($this->getTanggalSelesai());
        $copyObj->setKebutuhanKhususId($this->getKebutuhanKhususId());
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

            foreach ($this->getAnggotaRombels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaRombel($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKelasEkskuls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKelasEkskul($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPembelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPembelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRombels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRombel($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRombonganBelajarId(NULL); // this is a auto-increment column, so set to default value
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
     * @return RombonganBelajar Clone of current object.
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
     * @return RombonganBelajarPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RombonganBelajarPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JurusanSp object.
     *
     * @param             JurusanSp $v
     * @return RombonganBelajar The current object (for fluent API support)
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
            $v->addRombonganBelajar($this);
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
                $this->aJurusanSp->addRombonganBelajars($this);
             */
        }

        return $this->aJurusanSp;
    }

    /**
     * Declares an association between this object and a KebutuhanKhusus object.
     *
     * @param             KebutuhanKhusus $v
     * @return RombonganBelajar The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKebutuhanKhusus(KebutuhanKhusus $v = null)
    {
        if ($v === null) {
            $this->setKebutuhanKhususId(NULL);
        } else {
            $this->setKebutuhanKhususId($v->getKebutuhanKhususId());
        }

        $this->aKebutuhanKhusus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KebutuhanKhusus object, it will not be re-added.
        if ($v !== null) {
            $v->addRombonganBelajar($this);
        }


        return $this;
    }


    /**
     * Get the associated KebutuhanKhusus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KebutuhanKhusus The associated KebutuhanKhusus object.
     * @throws PropelException
     */
    public function getKebutuhanKhusus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKebutuhanKhusus === null && ($this->kebutuhan_khusus_id !== null) && $doQuery) {
            $this->aKebutuhanKhusus = KebutuhanKhususQuery::create()->findPk($this->kebutuhan_khusus_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKebutuhanKhusus->addRombonganBelajars($this);
             */
        }

        return $this->aKebutuhanKhusus;
    }

    /**
     * Declares an association between this object and a Kurikulum object.
     *
     * @param             Kurikulum $v
     * @return RombonganBelajar The current object (for fluent API support)
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
            $v->addRombonganBelajar($this);
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
                $this->aKurikulum->addRombonganBelajars($this);
             */
        }

        return $this->aKurikulum;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return RombonganBelajar The current object (for fluent API support)
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
            $v->addRombonganBelajar($this);
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
                $this->aSemester->addRombonganBelajars($this);
             */
        }

        return $this->aSemester;
    }

    /**
     * Declares an association between this object and a TingkatPendidikan object.
     *
     * @param             TingkatPendidikan $v
     * @return RombonganBelajar The current object (for fluent API support)
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
            $v->addRombonganBelajar($this);
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
                $this->aTingkatPendidikan->addRombonganBelajars($this);
             */
        }

        return $this->aTingkatPendidikan;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return RombonganBelajar The current object (for fluent API support)
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
            $v->addRombonganBelajar($this);
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
                $this->aPtk->addRombonganBelajars($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a Ruang object.
     *
     * @param             Ruang $v
     * @return RombonganBelajar The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRuang(Ruang $v = null)
    {
        if ($v === null) {
            $this->setIdRuang(NULL);
        } else {
            $this->setIdRuang($v->getIdRuang());
        }

        $this->aRuang = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ruang object, it will not be re-added.
        if ($v !== null) {
            $v->addRombonganBelajar($this);
        }


        return $this;
    }


    /**
     * Get the associated Ruang object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ruang The associated Ruang object.
     * @throws PropelException
     */
    public function getRuang(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRuang === null && (($this->id_ruang !== "" && $this->id_ruang !== null)) && $doQuery) {
            $this->aRuang = RuangQuery::create()->findPk($this->id_ruang, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRuang->addRombonganBelajars($this);
             */
        }

        return $this->aRuang;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return RombonganBelajar The current object (for fluent API support)
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
            $v->addRombonganBelajar($this);
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
                $this->aSekolah->addRombonganBelajars($this);
             */
        }

        return $this->aSekolah;
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
        if ('AnggotaRombel' == $relationName) {
            $this->initAnggotaRombels();
        }
        if ('KelasEkskul' == $relationName) {
            $this->initKelasEkskuls();
        }
        if ('Pembelajaran' == $relationName) {
            $this->initPembelajarans();
        }
        if ('VldRombel' == $relationName) {
            $this->initVldRombels();
        }
    }

    /**
     * Clears out the collAnggotaRombels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RombonganBelajar The current object (for fluent API support)
     * @see        addAnggotaRombels()
     */
    public function clearAnggotaRombels()
    {
        $this->collAnggotaRombels = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaRombelsPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaRombels collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaRombels($v = true)
    {
        $this->collAnggotaRombelsPartial = $v;
    }

    /**
     * Initializes the collAnggotaRombels collection.
     *
     * By default this just sets the collAnggotaRombels collection to an empty array (like clearcollAnggotaRombels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaRombels($overrideExisting = true)
    {
        if (null !== $this->collAnggotaRombels && !$overrideExisting) {
            return;
        }
        $this->collAnggotaRombels = new PropelObjectCollection();
        $this->collAnggotaRombels->setModel('AnggotaRombel');
    }

    /**
     * Gets an array of AnggotaRombel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RombonganBelajar is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaRombel[] List of AnggotaRombel objects
     * @throws PropelException
     */
    public function getAnggotaRombels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaRombelsPartial && !$this->isNew();
        if (null === $this->collAnggotaRombels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaRombels) {
                // return empty collection
                $this->initAnggotaRombels();
            } else {
                $collAnggotaRombels = AnggotaRombelQuery::create(null, $criteria)
                    ->filterByRombonganBelajar($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaRombelsPartial && count($collAnggotaRombels)) {
                      $this->initAnggotaRombels(false);

                      foreach($collAnggotaRombels as $obj) {
                        if (false == $this->collAnggotaRombels->contains($obj)) {
                          $this->collAnggotaRombels->append($obj);
                        }
                      }

                      $this->collAnggotaRombelsPartial = true;
                    }

                    $collAnggotaRombels->getInternalIterator()->rewind();
                    return $collAnggotaRombels;
                }

                if($partial && $this->collAnggotaRombels) {
                    foreach($this->collAnggotaRombels as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaRombels[] = $obj;
                        }
                    }
                }

                $this->collAnggotaRombels = $collAnggotaRombels;
                $this->collAnggotaRombelsPartial = false;
            }
        }

        return $this->collAnggotaRombels;
    }

    /**
     * Sets a collection of AnggotaRombel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaRombels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setAnggotaRombels(PropelCollection $anggotaRombels, PropelPDO $con = null)
    {
        $anggotaRombelsToDelete = $this->getAnggotaRombels(new Criteria(), $con)->diff($anggotaRombels);

        $this->anggotaRombelsScheduledForDeletion = unserialize(serialize($anggotaRombelsToDelete));

        foreach ($anggotaRombelsToDelete as $anggotaRombelRemoved) {
            $anggotaRombelRemoved->setRombonganBelajar(null);
        }

        $this->collAnggotaRombels = null;
        foreach ($anggotaRombels as $anggotaRombel) {
            $this->addAnggotaRombel($anggotaRombel);
        }

        $this->collAnggotaRombels = $anggotaRombels;
        $this->collAnggotaRombelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaRombel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaRombel objects.
     * @throws PropelException
     */
    public function countAnggotaRombels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaRombelsPartial && !$this->isNew();
        if (null === $this->collAnggotaRombels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaRombels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaRombels());
            }
            $query = AnggotaRombelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRombonganBelajar($this)
                ->count($con);
        }

        return count($this->collAnggotaRombels);
    }

    /**
     * Method called to associate a AnggotaRombel object to this object
     * through the AnggotaRombel foreign key attribute.
     *
     * @param    AnggotaRombel $l AnggotaRombel
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function addAnggotaRombel(AnggotaRombel $l)
    {
        if ($this->collAnggotaRombels === null) {
            $this->initAnggotaRombels();
            $this->collAnggotaRombelsPartial = true;
        }
        if (!in_array($l, $this->collAnggotaRombels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaRombel($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaRombel $anggotaRombel The anggotaRombel object to add.
     */
    protected function doAddAnggotaRombel($anggotaRombel)
    {
        $this->collAnggotaRombels[]= $anggotaRombel;
        $anggotaRombel->setRombonganBelajar($this);
    }

    /**
     * @param	AnggotaRombel $anggotaRombel The anggotaRombel object to remove.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function removeAnggotaRombel($anggotaRombel)
    {
        if ($this->getAnggotaRombels()->contains($anggotaRombel)) {
            $this->collAnggotaRombels->remove($this->collAnggotaRombels->search($anggotaRombel));
            if (null === $this->anggotaRombelsScheduledForDeletion) {
                $this->anggotaRombelsScheduledForDeletion = clone $this->collAnggotaRombels;
                $this->anggotaRombelsScheduledForDeletion->clear();
            }
            $this->anggotaRombelsScheduledForDeletion[]= clone $anggotaRombel;
            $anggotaRombel->setRombonganBelajar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related AnggotaRombels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaRombel[] List of AnggotaRombel objects
     */
    public function getAnggotaRombelsJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaRombelQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getAnggotaRombels($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related AnggotaRombels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaRombel[] List of AnggotaRombel objects
     */
    public function getAnggotaRombelsJoinJenisPendaftaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaRombelQuery::create(null, $criteria);
        $query->joinWith('JenisPendaftaran', $join_behavior);

        return $this->getAnggotaRombels($query, $con);
    }

    /**
     * Clears out the collKelasEkskuls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RombonganBelajar The current object (for fluent API support)
     * @see        addKelasEkskuls()
     */
    public function clearKelasEkskuls()
    {
        $this->collKelasEkskuls = null; // important to set this to null since that means it is uninitialized
        $this->collKelasEkskulsPartial = null;

        return $this;
    }

    /**
     * reset is the collKelasEkskuls collection loaded partially
     *
     * @return void
     */
    public function resetPartialKelasEkskuls($v = true)
    {
        $this->collKelasEkskulsPartial = $v;
    }

    /**
     * Initializes the collKelasEkskuls collection.
     *
     * By default this just sets the collKelasEkskuls collection to an empty array (like clearcollKelasEkskuls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKelasEkskuls($overrideExisting = true)
    {
        if (null !== $this->collKelasEkskuls && !$overrideExisting) {
            return;
        }
        $this->collKelasEkskuls = new PropelObjectCollection();
        $this->collKelasEkskuls->setModel('KelasEkskul');
    }

    /**
     * Gets an array of KelasEkskul objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RombonganBelajar is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|KelasEkskul[] List of KelasEkskul objects
     * @throws PropelException
     */
    public function getKelasEkskuls($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKelasEkskulsPartial && !$this->isNew();
        if (null === $this->collKelasEkskuls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKelasEkskuls) {
                // return empty collection
                $this->initKelasEkskuls();
            } else {
                $collKelasEkskuls = KelasEkskulQuery::create(null, $criteria)
                    ->filterByRombonganBelajar($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKelasEkskulsPartial && count($collKelasEkskuls)) {
                      $this->initKelasEkskuls(false);

                      foreach($collKelasEkskuls as $obj) {
                        if (false == $this->collKelasEkskuls->contains($obj)) {
                          $this->collKelasEkskuls->append($obj);
                        }
                      }

                      $this->collKelasEkskulsPartial = true;
                    }

                    $collKelasEkskuls->getInternalIterator()->rewind();
                    return $collKelasEkskuls;
                }

                if($partial && $this->collKelasEkskuls) {
                    foreach($this->collKelasEkskuls as $obj) {
                        if($obj->isNew()) {
                            $collKelasEkskuls[] = $obj;
                        }
                    }
                }

                $this->collKelasEkskuls = $collKelasEkskuls;
                $this->collKelasEkskulsPartial = false;
            }
        }

        return $this->collKelasEkskuls;
    }

    /**
     * Sets a collection of KelasEkskul objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kelasEkskuls A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setKelasEkskuls(PropelCollection $kelasEkskuls, PropelPDO $con = null)
    {
        $kelasEkskulsToDelete = $this->getKelasEkskuls(new Criteria(), $con)->diff($kelasEkskuls);

        $this->kelasEkskulsScheduledForDeletion = unserialize(serialize($kelasEkskulsToDelete));

        foreach ($kelasEkskulsToDelete as $kelasEkskulRemoved) {
            $kelasEkskulRemoved->setRombonganBelajar(null);
        }

        $this->collKelasEkskuls = null;
        foreach ($kelasEkskuls as $kelasEkskul) {
            $this->addKelasEkskul($kelasEkskul);
        }

        $this->collKelasEkskuls = $kelasEkskuls;
        $this->collKelasEkskulsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related KelasEkskul objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related KelasEkskul objects.
     * @throws PropelException
     */
    public function countKelasEkskuls(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKelasEkskulsPartial && !$this->isNew();
        if (null === $this->collKelasEkskuls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKelasEkskuls) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKelasEkskuls());
            }
            $query = KelasEkskulQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRombonganBelajar($this)
                ->count($con);
        }

        return count($this->collKelasEkskuls);
    }

    /**
     * Method called to associate a KelasEkskul object to this object
     * through the KelasEkskul foreign key attribute.
     *
     * @param    KelasEkskul $l KelasEkskul
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function addKelasEkskul(KelasEkskul $l)
    {
        if ($this->collKelasEkskuls === null) {
            $this->initKelasEkskuls();
            $this->collKelasEkskulsPartial = true;
        }
        if (!in_array($l, $this->collKelasEkskuls->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKelasEkskul($l);
        }

        return $this;
    }

    /**
     * @param	KelasEkskul $kelasEkskul The kelasEkskul object to add.
     */
    protected function doAddKelasEkskul($kelasEkskul)
    {
        $this->collKelasEkskuls[]= $kelasEkskul;
        $kelasEkskul->setRombonganBelajar($this);
    }

    /**
     * @param	KelasEkskul $kelasEkskul The kelasEkskul object to remove.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function removeKelasEkskul($kelasEkskul)
    {
        if ($this->getKelasEkskuls()->contains($kelasEkskul)) {
            $this->collKelasEkskuls->remove($this->collKelasEkskuls->search($kelasEkskul));
            if (null === $this->kelasEkskulsScheduledForDeletion) {
                $this->kelasEkskulsScheduledForDeletion = clone $this->collKelasEkskuls;
                $this->kelasEkskulsScheduledForDeletion->clear();
            }
            $this->kelasEkskulsScheduledForDeletion[]= clone $kelasEkskul;
            $kelasEkskul->setRombonganBelajar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related KelasEkskuls from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|KelasEkskul[] List of KelasEkskul objects
     */
    public function getKelasEkskulsJoinEkstraKurikuler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KelasEkskulQuery::create(null, $criteria);
        $query->joinWith('EkstraKurikuler', $join_behavior);

        return $this->getKelasEkskuls($query, $con);
    }

    /**
     * Clears out the collPembelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RombonganBelajar The current object (for fluent API support)
     * @see        addPembelajarans()
     */
    public function clearPembelajarans()
    {
        $this->collPembelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collPembelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collPembelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialPembelajarans($v = true)
    {
        $this->collPembelajaransPartial = $v;
    }

    /**
     * Initializes the collPembelajarans collection.
     *
     * By default this just sets the collPembelajarans collection to an empty array (like clearcollPembelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPembelajarans($overrideExisting = true)
    {
        if (null !== $this->collPembelajarans && !$overrideExisting) {
            return;
        }
        $this->collPembelajarans = new PropelObjectCollection();
        $this->collPembelajarans->setModel('Pembelajaran');
    }

    /**
     * Gets an array of Pembelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RombonganBelajar is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     * @throws PropelException
     */
    public function getPembelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPembelajaransPartial && !$this->isNew();
        if (null === $this->collPembelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPembelajarans) {
                // return empty collection
                $this->initPembelajarans();
            } else {
                $collPembelajarans = PembelajaranQuery::create(null, $criteria)
                    ->filterByRombonganBelajar($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPembelajaransPartial && count($collPembelajarans)) {
                      $this->initPembelajarans(false);

                      foreach($collPembelajarans as $obj) {
                        if (false == $this->collPembelajarans->contains($obj)) {
                          $this->collPembelajarans->append($obj);
                        }
                      }

                      $this->collPembelajaransPartial = true;
                    }

                    $collPembelajarans->getInternalIterator()->rewind();
                    return $collPembelajarans;
                }

                if($partial && $this->collPembelajarans) {
                    foreach($this->collPembelajarans as $obj) {
                        if($obj->isNew()) {
                            $collPembelajarans[] = $obj;
                        }
                    }
                }

                $this->collPembelajarans = $collPembelajarans;
                $this->collPembelajaransPartial = false;
            }
        }

        return $this->collPembelajarans;
    }

    /**
     * Sets a collection of Pembelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pembelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setPembelajarans(PropelCollection $pembelajarans, PropelPDO $con = null)
    {
        $pembelajaransToDelete = $this->getPembelajarans(new Criteria(), $con)->diff($pembelajarans);

        $this->pembelajaransScheduledForDeletion = unserialize(serialize($pembelajaransToDelete));

        foreach ($pembelajaransToDelete as $pembelajaranRemoved) {
            $pembelajaranRemoved->setRombonganBelajar(null);
        }

        $this->collPembelajarans = null;
        foreach ($pembelajarans as $pembelajaran) {
            $this->addPembelajaran($pembelajaran);
        }

        $this->collPembelajarans = $pembelajarans;
        $this->collPembelajaransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Pembelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Pembelajaran objects.
     * @throws PropelException
     */
    public function countPembelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPembelajaransPartial && !$this->isNew();
        if (null === $this->collPembelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPembelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPembelajarans());
            }
            $query = PembelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRombonganBelajar($this)
                ->count($con);
        }

        return count($this->collPembelajarans);
    }

    /**
     * Method called to associate a Pembelajaran object to this object
     * through the Pembelajaran foreign key attribute.
     *
     * @param    Pembelajaran $l Pembelajaran
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function addPembelajaran(Pembelajaran $l)
    {
        if ($this->collPembelajarans === null) {
            $this->initPembelajarans();
            $this->collPembelajaransPartial = true;
        }
        if (!in_array($l, $this->collPembelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPembelajaran($l);
        }

        return $this;
    }

    /**
     * @param	Pembelajaran $pembelajaran The pembelajaran object to add.
     */
    protected function doAddPembelajaran($pembelajaran)
    {
        $this->collPembelajarans[]= $pembelajaran;
        $pembelajaran->setRombonganBelajar($this);
    }

    /**
     * @param	Pembelajaran $pembelajaran The pembelajaran object to remove.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function removePembelajaran($pembelajaran)
    {
        if ($this->getPembelajarans()->contains($pembelajaran)) {
            $this->collPembelajarans->remove($this->collPembelajarans->search($pembelajaran));
            if (null === $this->pembelajaransScheduledForDeletion) {
                $this->pembelajaransScheduledForDeletion = clone $this->collPembelajarans;
                $this->pembelajaransScheduledForDeletion->clear();
            }
            $this->pembelajaransScheduledForDeletion[]= clone $pembelajaran;
            $pembelajaran->setRombonganBelajar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinPembelajaranRelatedByIndukPembelajaranId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByIndukPembelajaranId', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinPtkTerdaftar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('PtkTerdaftar', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }

    /**
     * Clears out the collVldRombels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RombonganBelajar The current object (for fluent API support)
     * @see        addVldRombels()
     */
    public function clearVldRombels()
    {
        $this->collVldRombels = null; // important to set this to null since that means it is uninitialized
        $this->collVldRombelsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRombels collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRombels($v = true)
    {
        $this->collVldRombelsPartial = $v;
    }

    /**
     * Initializes the collVldRombels collection.
     *
     * By default this just sets the collVldRombels collection to an empty array (like clearcollVldRombels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRombels($overrideExisting = true)
    {
        if (null !== $this->collVldRombels && !$overrideExisting) {
            return;
        }
        $this->collVldRombels = new PropelObjectCollection();
        $this->collVldRombels->setModel('VldRombel');
    }

    /**
     * Gets an array of VldRombel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RombonganBelajar is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRombel[] List of VldRombel objects
     * @throws PropelException
     */
    public function getVldRombels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRombelsPartial && !$this->isNew();
        if (null === $this->collVldRombels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRombels) {
                // return empty collection
                $this->initVldRombels();
            } else {
                $collVldRombels = VldRombelQuery::create(null, $criteria)
                    ->filterByRombonganBelajar($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRombelsPartial && count($collVldRombels)) {
                      $this->initVldRombels(false);

                      foreach($collVldRombels as $obj) {
                        if (false == $this->collVldRombels->contains($obj)) {
                          $this->collVldRombels->append($obj);
                        }
                      }

                      $this->collVldRombelsPartial = true;
                    }

                    $collVldRombels->getInternalIterator()->rewind();
                    return $collVldRombels;
                }

                if($partial && $this->collVldRombels) {
                    foreach($this->collVldRombels as $obj) {
                        if($obj->isNew()) {
                            $collVldRombels[] = $obj;
                        }
                    }
                }

                $this->collVldRombels = $collVldRombels;
                $this->collVldRombelsPartial = false;
            }
        }

        return $this->collVldRombels;
    }

    /**
     * Sets a collection of VldRombel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRombels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function setVldRombels(PropelCollection $vldRombels, PropelPDO $con = null)
    {
        $vldRombelsToDelete = $this->getVldRombels(new Criteria(), $con)->diff($vldRombels);

        $this->vldRombelsScheduledForDeletion = unserialize(serialize($vldRombelsToDelete));

        foreach ($vldRombelsToDelete as $vldRombelRemoved) {
            $vldRombelRemoved->setRombonganBelajar(null);
        }

        $this->collVldRombels = null;
        foreach ($vldRombels as $vldRombel) {
            $this->addVldRombel($vldRombel);
        }

        $this->collVldRombels = $vldRombels;
        $this->collVldRombelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRombel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRombel objects.
     * @throws PropelException
     */
    public function countVldRombels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRombelsPartial && !$this->isNew();
        if (null === $this->collVldRombels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRombels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRombels());
            }
            $query = VldRombelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRombonganBelajar($this)
                ->count($con);
        }

        return count($this->collVldRombels);
    }

    /**
     * Method called to associate a VldRombel object to this object
     * through the VldRombel foreign key attribute.
     *
     * @param    VldRombel $l VldRombel
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function addVldRombel(VldRombel $l)
    {
        if ($this->collVldRombels === null) {
            $this->initVldRombels();
            $this->collVldRombelsPartial = true;
        }
        if (!in_array($l, $this->collVldRombels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRombel($l);
        }

        return $this;
    }

    /**
     * @param	VldRombel $vldRombel The vldRombel object to add.
     */
    protected function doAddVldRombel($vldRombel)
    {
        $this->collVldRombels[]= $vldRombel;
        $vldRombel->setRombonganBelajar($this);
    }

    /**
     * @param	VldRombel $vldRombel The vldRombel object to remove.
     * @return RombonganBelajar The current object (for fluent API support)
     */
    public function removeVldRombel($vldRombel)
    {
        if ($this->getVldRombels()->contains($vldRombel)) {
            $this->collVldRombels->remove($this->collVldRombels->search($vldRombel));
            if (null === $this->vldRombelsScheduledForDeletion) {
                $this->vldRombelsScheduledForDeletion = clone $this->collVldRombels;
                $this->vldRombelsScheduledForDeletion->clear();
            }
            $this->vldRombelsScheduledForDeletion[]= clone $vldRombel;
            $vldRombel->setRombonganBelajar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RombonganBelajar is new, it will return
     * an empty collection; or if this RombonganBelajar has previously
     * been saved, it will retrieve related VldRombels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RombonganBelajar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRombel[] List of VldRombel objects
     */
    public function getVldRombelsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRombelQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldRombels($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->rombongan_belajar_id = null;
        $this->semester_id = null;
        $this->id_ruang = null;
        $this->sekolah_id = null;
        $this->tingkat_pendidikan_id = null;
        $this->jurusan_sp_id = null;
        $this->kurikulum_id = null;
        $this->nama = null;
        $this->ptk_id = null;
        $this->moving_class = null;
        $this->jenis_rombel = null;
        $this->sks = null;
        $this->tanggal_mulai = null;
        $this->tanggal_selesai = null;
        $this->kebutuhan_khusus_id = null;
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
            if ($this->collAnggotaRombels) {
                foreach ($this->collAnggotaRombels as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKelasEkskuls) {
                foreach ($this->collKelasEkskuls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPembelajarans) {
                foreach ($this->collPembelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRombels) {
                foreach ($this->collVldRombels as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJurusanSp instanceof Persistent) {
              $this->aJurusanSp->clearAllReferences($deep);
            }
            if ($this->aKebutuhanKhusus instanceof Persistent) {
              $this->aKebutuhanKhusus->clearAllReferences($deep);
            }
            if ($this->aKurikulum instanceof Persistent) {
              $this->aKurikulum->clearAllReferences($deep);
            }
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }
            if ($this->aTingkatPendidikan instanceof Persistent) {
              $this->aTingkatPendidikan->clearAllReferences($deep);
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aRuang instanceof Persistent) {
              $this->aRuang->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAnggotaRombels instanceof PropelCollection) {
            $this->collAnggotaRombels->clearIterator();
        }
        $this->collAnggotaRombels = null;
        if ($this->collKelasEkskuls instanceof PropelCollection) {
            $this->collKelasEkskuls->clearIterator();
        }
        $this->collKelasEkskuls = null;
        if ($this->collPembelajarans instanceof PropelCollection) {
            $this->collPembelajarans->clearIterator();
        }
        $this->collPembelajarans = null;
        if ($this->collVldRombels instanceof PropelCollection) {
            $this->collVldRombels->clearIterator();
        }
        $this->collVldRombels = null;
        $this->aJurusanSp = null;
        $this->aKebutuhanKhusus = null;
        $this->aKurikulum = null;
        $this->aSemester = null;
        $this->aTingkatPendidikan = null;
        $this->aPtk = null;
        $this->aRuang = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RombonganBelajarPeer::DEFAULT_STRING_FORMAT);
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
