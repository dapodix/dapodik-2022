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
use DataDikdas\Model\GuruSasaranPengawas;
use DataDikdas\Model\GuruSasaranPengawasQuery;
use DataDikdas\Model\JenisKeluar;
use DataDikdas\Model\JenisKeluarQuery;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\PtkTerdaftarPeer;
use DataDikdas\Model\PtkTerdaftarQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TahunAjaranQuery;
use DataDikdas\Model\VldPtkTerdaftar;
use DataDikdas\Model\VldPtkTerdaftarQuery;

/**
 * Base class that represents a row from the 'ptk_terdaftar' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePtkTerdaftar extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PtkTerdaftarPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PtkTerdaftarPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the ptk_terdaftar_id field.
     * @var        string
     */
    protected $ptk_terdaftar_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the jenis_keluar_id field.
     * @var        string
     */
    protected $jenis_keluar_id;

    /**
     * The value for the tahun_ajaran_id field.
     * @var        string
     */
    protected $tahun_ajaran_id;

    /**
     * The value for the nomor_surat_tugas field.
     * @var        string
     */
    protected $nomor_surat_tugas;

    /**
     * The value for the tanggal_surat_tugas field.
     * @var        string
     */
    protected $tanggal_surat_tugas;

    /**
     * The value for the ptk_induk field.
     * @var        string
     */
    protected $ptk_induk;

    /**
     * The value for the tmt_tugas field.
     * @var        string
     */
    protected $tmt_tugas;

    /**
     * The value for the aktif_bulan_01 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_01;

    /**
     * The value for the aktif_bulan_02 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_02;

    /**
     * The value for the aktif_bulan_03 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_03;

    /**
     * The value for the aktif_bulan_04 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_04;

    /**
     * The value for the aktif_bulan_05 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_05;

    /**
     * The value for the aktif_bulan_06 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_06;

    /**
     * The value for the aktif_bulan_07 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_07;

    /**
     * The value for the aktif_bulan_08 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_08;

    /**
     * The value for the aktif_bulan_09 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_09;

    /**
     * The value for the aktif_bulan_10 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_10;

    /**
     * The value for the aktif_bulan_11 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_11;

    /**
     * The value for the aktif_bulan_12 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $aktif_bulan_12;

    /**
     * The value for the tgl_ptk_keluar field.
     * @var        string
     */
    protected $tgl_ptk_keluar;

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
     * @var        JenisKeluar
     */
    protected $aJenisKeluar;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        TahunAjaran
     */
    protected $aTahunAjaran;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|GuruSasaranPengawas[] Collection to store aggregation of GuruSasaranPengawas objects.
     */
    protected $collGuruSasaranPengawass;
    protected $collGuruSasaranPengawassPartial;

    /**
     * @var        PropelObjectCollection|Pembelajaran[] Collection to store aggregation of Pembelajaran objects.
     */
    protected $collPembelajarans;
    protected $collPembelajaransPartial;

    /**
     * @var        PropelObjectCollection|VldPtkTerdaftar[] Collection to store aggregation of VldPtkTerdaftar objects.
     */
    protected $collVldPtkTerdaftars;
    protected $collVldPtkTerdaftarsPartial;

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
    protected $guruSasaranPengawassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pembelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPtkTerdaftarsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->aktif_bulan_01 = '0';
        $this->aktif_bulan_02 = '0';
        $this->aktif_bulan_03 = '0';
        $this->aktif_bulan_04 = '0';
        $this->aktif_bulan_05 = '0';
        $this->aktif_bulan_06 = '0';
        $this->aktif_bulan_07 = '0';
        $this->aktif_bulan_08 = '0';
        $this->aktif_bulan_09 = '0';
        $this->aktif_bulan_10 = '0';
        $this->aktif_bulan_11 = '0';
        $this->aktif_bulan_12 = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BasePtkTerdaftar object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [ptk_terdaftar_id] column value.
     * 
     * @return string
     */
    public function getPtkTerdaftarId()
    {
        return $this->ptk_terdaftar_id;
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
     * Get the [sekolah_id] column value.
     * 
     * @return string
     */
    public function getSekolahId()
    {
        return $this->sekolah_id;
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
     * Get the [tahun_ajaran_id] column value.
     * 
     * @return string
     */
    public function getTahunAjaranId()
    {
        return $this->tahun_ajaran_id;
    }

    /**
     * Get the [nomor_surat_tugas] column value.
     * 
     * @return string
     */
    public function getNomorSuratTugas()
    {
        return $this->nomor_surat_tugas;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_surat_tugas] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSuratTugas($format = '%Y-%m-%d')
    {
        if ($this->tanggal_surat_tugas === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_surat_tugas);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_surat_tugas, true), $x);
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
     * Get the [ptk_induk] column value.
     * 
     * @return string
     */
    public function getPtkInduk()
    {
        return $this->ptk_induk;
    }

    /**
     * Get the [optionally formatted] temporal [tmt_tugas] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtTugas($format = '%Y-%m-%d')
    {
        if ($this->tmt_tugas === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_tugas);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_tugas, true), $x);
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
     * Get the [aktif_bulan_01] column value.
     * 
     * @return string
     */
    public function getAktifBulan01()
    {
        return $this->aktif_bulan_01;
    }

    /**
     * Get the [aktif_bulan_02] column value.
     * 
     * @return string
     */
    public function getAktifBulan02()
    {
        return $this->aktif_bulan_02;
    }

    /**
     * Get the [aktif_bulan_03] column value.
     * 
     * @return string
     */
    public function getAktifBulan03()
    {
        return $this->aktif_bulan_03;
    }

    /**
     * Get the [aktif_bulan_04] column value.
     * 
     * @return string
     */
    public function getAktifBulan04()
    {
        return $this->aktif_bulan_04;
    }

    /**
     * Get the [aktif_bulan_05] column value.
     * 
     * @return string
     */
    public function getAktifBulan05()
    {
        return $this->aktif_bulan_05;
    }

    /**
     * Get the [aktif_bulan_06] column value.
     * 
     * @return string
     */
    public function getAktifBulan06()
    {
        return $this->aktif_bulan_06;
    }

    /**
     * Get the [aktif_bulan_07] column value.
     * 
     * @return string
     */
    public function getAktifBulan07()
    {
        return $this->aktif_bulan_07;
    }

    /**
     * Get the [aktif_bulan_08] column value.
     * 
     * @return string
     */
    public function getAktifBulan08()
    {
        return $this->aktif_bulan_08;
    }

    /**
     * Get the [aktif_bulan_09] column value.
     * 
     * @return string
     */
    public function getAktifBulan09()
    {
        return $this->aktif_bulan_09;
    }

    /**
     * Get the [aktif_bulan_10] column value.
     * 
     * @return string
     */
    public function getAktifBulan10()
    {
        return $this->aktif_bulan_10;
    }

    /**
     * Get the [aktif_bulan_11] column value.
     * 
     * @return string
     */
    public function getAktifBulan11()
    {
        return $this->aktif_bulan_11;
    }

    /**
     * Get the [aktif_bulan_12] column value.
     * 
     * @return string
     */
    public function getAktifBulan12()
    {
        return $this->aktif_bulan_12;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_ptk_keluar] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglPtkKeluar($format = '%Y-%m-%d')
    {
        if ($this->tgl_ptk_keluar === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_ptk_keluar);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_ptk_keluar, true), $x);
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
     * Set the value of [ptk_terdaftar_id] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setPtkTerdaftarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_terdaftar_id !== $v) {
            $this->ptk_terdaftar_id = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::PTK_TERDAFTAR_ID;
        }


        return $this;
    } // setPtkTerdaftarId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [jenis_keluar_id] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setJenisKeluarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_keluar_id !== $v) {
            $this->jenis_keluar_id = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::JENIS_KELUAR_ID;
        }

        if ($this->aJenisKeluar !== null && $this->aJenisKeluar->getJenisKeluarId() !== $v) {
            $this->aJenisKeluar = null;
        }


        return $this;
    } // setJenisKeluarId()

    /**
     * Set the value of [tahun_ajaran_id] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setTahunAjaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_ajaran_id !== $v) {
            $this->tahun_ajaran_id = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::TAHUN_AJARAN_ID;
        }

        if ($this->aTahunAjaran !== null && $this->aTahunAjaran->getTahunAjaranId() !== $v) {
            $this->aTahunAjaran = null;
        }


        return $this;
    } // setTahunAjaranId()

    /**
     * Set the value of [nomor_surat_tugas] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setNomorSuratTugas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_surat_tugas !== $v) {
            $this->nomor_surat_tugas = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::NOMOR_SURAT_TUGAS;
        }


        return $this;
    } // setNomorSuratTugas()

    /**
     * Sets the value of [tanggal_surat_tugas] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setTanggalSuratTugas($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_surat_tugas !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_surat_tugas !== null && $tmpDt = new DateTime($this->tanggal_surat_tugas)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_surat_tugas = $newDateAsString;
                $this->modifiedColumns[] = PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS;
            }
        } // if either are not null


        return $this;
    } // setTanggalSuratTugas()

    /**
     * Set the value of [ptk_induk] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setPtkInduk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_induk !== $v) {
            $this->ptk_induk = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::PTK_INDUK;
        }


        return $this;
    } // setPtkInduk()

    /**
     * Sets the value of [tmt_tugas] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setTmtTugas($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_tugas !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_tugas !== null && $tmpDt = new DateTime($this->tmt_tugas)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_tugas = $newDateAsString;
                $this->modifiedColumns[] = PtkTerdaftarPeer::TMT_TUGAS;
            }
        } // if either are not null


        return $this;
    } // setTmtTugas()

    /**
     * Set the value of [aktif_bulan_01] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan01($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_01 !== $v) {
            $this->aktif_bulan_01 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_01;
        }


        return $this;
    } // setAktifBulan01()

    /**
     * Set the value of [aktif_bulan_02] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan02($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_02 !== $v) {
            $this->aktif_bulan_02 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_02;
        }


        return $this;
    } // setAktifBulan02()

    /**
     * Set the value of [aktif_bulan_03] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan03($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_03 !== $v) {
            $this->aktif_bulan_03 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_03;
        }


        return $this;
    } // setAktifBulan03()

    /**
     * Set the value of [aktif_bulan_04] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan04($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_04 !== $v) {
            $this->aktif_bulan_04 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_04;
        }


        return $this;
    } // setAktifBulan04()

    /**
     * Set the value of [aktif_bulan_05] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan05($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_05 !== $v) {
            $this->aktif_bulan_05 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_05;
        }


        return $this;
    } // setAktifBulan05()

    /**
     * Set the value of [aktif_bulan_06] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan06($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_06 !== $v) {
            $this->aktif_bulan_06 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_06;
        }


        return $this;
    } // setAktifBulan06()

    /**
     * Set the value of [aktif_bulan_07] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan07($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_07 !== $v) {
            $this->aktif_bulan_07 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_07;
        }


        return $this;
    } // setAktifBulan07()

    /**
     * Set the value of [aktif_bulan_08] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan08($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_08 !== $v) {
            $this->aktif_bulan_08 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_08;
        }


        return $this;
    } // setAktifBulan08()

    /**
     * Set the value of [aktif_bulan_09] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan09($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_09 !== $v) {
            $this->aktif_bulan_09 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_09;
        }


        return $this;
    } // setAktifBulan09()

    /**
     * Set the value of [aktif_bulan_10] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan10($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_10 !== $v) {
            $this->aktif_bulan_10 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_10;
        }


        return $this;
    } // setAktifBulan10()

    /**
     * Set the value of [aktif_bulan_11] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan11($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_11 !== $v) {
            $this->aktif_bulan_11 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_11;
        }


        return $this;
    } // setAktifBulan11()

    /**
     * Set the value of [aktif_bulan_12] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setAktifBulan12($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif_bulan_12 !== $v) {
            $this->aktif_bulan_12 = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::AKTIF_BULAN_12;
        }


        return $this;
    } // setAktifBulan12()

    /**
     * Sets the value of [tgl_ptk_keluar] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setTglPtkKeluar($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_ptk_keluar !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_ptk_keluar !== null && $tmpDt = new DateTime($this->tgl_ptk_keluar)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_ptk_keluar = $newDateAsString;
                $this->modifiedColumns[] = PtkTerdaftarPeer::TGL_PTK_KELUAR;
            }
        } // if either are not null


        return $this;
    } // setTglPtkKeluar()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PtkTerdaftarPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PtkTerdaftarPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PtkTerdaftar The current object (for fluent API support)
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
                $this->modifiedColumns[] = PtkTerdaftarPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PtkTerdaftarPeer::UPDATER_ID;
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
            if ($this->aktif_bulan_01 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_02 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_03 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_04 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_05 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_06 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_07 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_08 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_09 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_10 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_11 !== '0') {
                return false;
            }

            if ($this->aktif_bulan_12 !== '0') {
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

            $this->ptk_terdaftar_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->ptk_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->sekolah_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jenis_keluar_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tahun_ajaran_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->nomor_surat_tugas = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tanggal_surat_tugas = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->ptk_induk = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tmt_tugas = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->aktif_bulan_01 = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->aktif_bulan_02 = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->aktif_bulan_03 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->aktif_bulan_04 = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->aktif_bulan_05 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->aktif_bulan_06 = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->aktif_bulan_07 = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->aktif_bulan_08 = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->aktif_bulan_09 = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->aktif_bulan_10 = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->aktif_bulan_11 = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->aktif_bulan_12 = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->tgl_ptk_keluar = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->create_date = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->last_update = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->soft_delete = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->last_sync = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->updater_id = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 27; // 27 = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PtkTerdaftar object", $e);
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
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aJenisKeluar !== null && $this->jenis_keluar_id !== $this->aJenisKeluar->getJenisKeluarId()) {
            $this->aJenisKeluar = null;
        }
        if ($this->aTahunAjaran !== null && $this->tahun_ajaran_id !== $this->aTahunAjaran->getTahunAjaranId()) {
            $this->aTahunAjaran = null;
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
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PtkTerdaftarPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisKeluar = null;
            $this->aPtk = null;
            $this->aTahunAjaran = null;
            $this->aSekolah = null;
            $this->collGuruSasaranPengawass = null;

            $this->collPembelajarans = null;

            $this->collVldPtkTerdaftars = null;

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
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PtkTerdaftarQuery::create()
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
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PtkTerdaftarPeer::addInstanceToPool($this);
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

            if ($this->aJenisKeluar !== null) {
                if ($this->aJenisKeluar->isModified() || $this->aJenisKeluar->isNew()) {
                    $affectedRows += $this->aJenisKeluar->save($con);
                }
                $this->setJenisKeluar($this->aJenisKeluar);
            }

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aTahunAjaran !== null) {
                if ($this->aTahunAjaran->isModified() || $this->aTahunAjaran->isNew()) {
                    $affectedRows += $this->aTahunAjaran->save($con);
                }
                $this->setTahunAjaran($this->aTahunAjaran);
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

            if ($this->guruSasaranPengawassScheduledForDeletion !== null) {
                if (!$this->guruSasaranPengawassScheduledForDeletion->isEmpty()) {
                    GuruSasaranPengawasQuery::create()
                        ->filterByPrimaryKeys($this->guruSasaranPengawassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->guruSasaranPengawassScheduledForDeletion = null;
                }
            }

            if ($this->collGuruSasaranPengawass !== null) {
                foreach ($this->collGuruSasaranPengawass as $referrerFK) {
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

            if ($this->vldPtkTerdaftarsScheduledForDeletion !== null) {
                if (!$this->vldPtkTerdaftarsScheduledForDeletion->isEmpty()) {
                    VldPtkTerdaftarQuery::create()
                        ->filterByPrimaryKeys($this->vldPtkTerdaftarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPtkTerdaftarsScheduledForDeletion = null;
                }
            }

            if ($this->collVldPtkTerdaftars !== null) {
                foreach ($this->collVldPtkTerdaftars as $referrerFK) {
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
        if ($this->isColumnModified(PtkTerdaftarPeer::PTK_TERDAFTAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_terdaftar_id"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::JENIS_KELUAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_keluar_id"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::TAHUN_AJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_ajaran_id"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::NOMOR_SURAT_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_surat_tugas"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_surat_tugas"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::PTK_INDUK)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_induk"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::TMT_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_tugas"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_01)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_01"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_02)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_02"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_03)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_03"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_04)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_04"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_05)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_05"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_06)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_06"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_07)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_07"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_08)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_08"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_09)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_09"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_10)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_10"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_11)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_11"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_12)) {
            $modifiedColumns[':p' . $index++]  = '"aktif_bulan_12"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::TGL_PTK_KELUAR)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_ptk_keluar"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PtkTerdaftarPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "ptk_terdaftar" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"ptk_terdaftar_id"':						
                        $stmt->bindValue($identifier, $this->ptk_terdaftar_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_keluar_id"':						
                        $stmt->bindValue($identifier, $this->jenis_keluar_id, PDO::PARAM_STR);
                        break;
                    case '"tahun_ajaran_id"':						
                        $stmt->bindValue($identifier, $this->tahun_ajaran_id, PDO::PARAM_STR);
                        break;
                    case '"nomor_surat_tugas"':						
                        $stmt->bindValue($identifier, $this->nomor_surat_tugas, PDO::PARAM_STR);
                        break;
                    case '"tanggal_surat_tugas"':						
                        $stmt->bindValue($identifier, $this->tanggal_surat_tugas, PDO::PARAM_STR);
                        break;
                    case '"ptk_induk"':						
                        $stmt->bindValue($identifier, $this->ptk_induk, PDO::PARAM_STR);
                        break;
                    case '"tmt_tugas"':						
                        $stmt->bindValue($identifier, $this->tmt_tugas, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_01"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_01, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_02"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_02, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_03"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_03, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_04"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_04, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_05"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_05, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_06"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_06, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_07"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_07, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_08"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_08, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_09"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_09, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_10"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_10, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_11"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_11, PDO::PARAM_STR);
                        break;
                    case '"aktif_bulan_12"':						
                        $stmt->bindValue($identifier, $this->aktif_bulan_12, PDO::PARAM_STR);
                        break;
                    case '"tgl_ptk_keluar"':						
                        $stmt->bindValue($identifier, $this->tgl_ptk_keluar, PDO::PARAM_STR);
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

            if ($this->aJenisKeluar !== null) {
                if (!$this->aJenisKeluar->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisKeluar->getValidationFailures());
                }
            }

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aTahunAjaran !== null) {
                if (!$this->aTahunAjaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTahunAjaran->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = PtkTerdaftarPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collGuruSasaranPengawass !== null) {
                    foreach ($this->collGuruSasaranPengawass as $referrerFK) {
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

                if ($this->collVldPtkTerdaftars !== null) {
                    foreach ($this->collVldPtkTerdaftars as $referrerFK) {
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
        $pos = PtkTerdaftarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPtkTerdaftarId();
                break;
            case 1:
                return $this->getPtkId();
                break;
            case 2:
                return $this->getSekolahId();
                break;
            case 3:
                return $this->getJenisKeluarId();
                break;
            case 4:
                return $this->getTahunAjaranId();
                break;
            case 5:
                return $this->getNomorSuratTugas();
                break;
            case 6:
                return $this->getTanggalSuratTugas();
                break;
            case 7:
                return $this->getPtkInduk();
                break;
            case 8:
                return $this->getTmtTugas();
                break;
            case 9:
                return $this->getAktifBulan01();
                break;
            case 10:
                return $this->getAktifBulan02();
                break;
            case 11:
                return $this->getAktifBulan03();
                break;
            case 12:
                return $this->getAktifBulan04();
                break;
            case 13:
                return $this->getAktifBulan05();
                break;
            case 14:
                return $this->getAktifBulan06();
                break;
            case 15:
                return $this->getAktifBulan07();
                break;
            case 16:
                return $this->getAktifBulan08();
                break;
            case 17:
                return $this->getAktifBulan09();
                break;
            case 18:
                return $this->getAktifBulan10();
                break;
            case 19:
                return $this->getAktifBulan11();
                break;
            case 20:
                return $this->getAktifBulan12();
                break;
            case 21:
                return $this->getTglPtkKeluar();
                break;
            case 22:
                return $this->getCreateDate();
                break;
            case 23:
                return $this->getLastUpdate();
                break;
            case 24:
                return $this->getSoftDelete();
                break;
            case 25:
                return $this->getLastSync();
                break;
            case 26:
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
        if (isset($alreadyDumpedObjects['PtkTerdaftar'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PtkTerdaftar'][$this->getPrimaryKey()] = true;
        $keys = PtkTerdaftarPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPtkTerdaftarId(),
            $keys[1] => $this->getPtkId(),
            $keys[2] => $this->getSekolahId(),
            $keys[3] => $this->getJenisKeluarId(),
            $keys[4] => $this->getTahunAjaranId(),
            $keys[5] => $this->getNomorSuratTugas(),
            $keys[6] => $this->getTanggalSuratTugas(),
            $keys[7] => $this->getPtkInduk(),
            $keys[8] => $this->getTmtTugas(),
            $keys[9] => $this->getAktifBulan01(),
            $keys[10] => $this->getAktifBulan02(),
            $keys[11] => $this->getAktifBulan03(),
            $keys[12] => $this->getAktifBulan04(),
            $keys[13] => $this->getAktifBulan05(),
            $keys[14] => $this->getAktifBulan06(),
            $keys[15] => $this->getAktifBulan07(),
            $keys[16] => $this->getAktifBulan08(),
            $keys[17] => $this->getAktifBulan09(),
            $keys[18] => $this->getAktifBulan10(),
            $keys[19] => $this->getAktifBulan11(),
            $keys[20] => $this->getAktifBulan12(),
            $keys[21] => $this->getTglPtkKeluar(),
            $keys[22] => $this->getCreateDate(),
            $keys[23] => $this->getLastUpdate(),
            $keys[24] => $this->getSoftDelete(),
            $keys[25] => $this->getLastSync(),
            $keys[26] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisKeluar) {
                $result['JenisKeluar'] = $this->aJenisKeluar->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTahunAjaran) {
                $result['TahunAjaran'] = $this->aTahunAjaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collGuruSasaranPengawass) {
                $result['GuruSasaranPengawass'] = $this->collGuruSasaranPengawass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPembelajarans) {
                $result['Pembelajarans'] = $this->collPembelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPtkTerdaftars) {
                $result['VldPtkTerdaftars'] = $this->collVldPtkTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PtkTerdaftarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPtkTerdaftarId($value);
                break;
            case 1:
                $this->setPtkId($value);
                break;
            case 2:
                $this->setSekolahId($value);
                break;
            case 3:
                $this->setJenisKeluarId($value);
                break;
            case 4:
                $this->setTahunAjaranId($value);
                break;
            case 5:
                $this->setNomorSuratTugas($value);
                break;
            case 6:
                $this->setTanggalSuratTugas($value);
                break;
            case 7:
                $this->setPtkInduk($value);
                break;
            case 8:
                $this->setTmtTugas($value);
                break;
            case 9:
                $this->setAktifBulan01($value);
                break;
            case 10:
                $this->setAktifBulan02($value);
                break;
            case 11:
                $this->setAktifBulan03($value);
                break;
            case 12:
                $this->setAktifBulan04($value);
                break;
            case 13:
                $this->setAktifBulan05($value);
                break;
            case 14:
                $this->setAktifBulan06($value);
                break;
            case 15:
                $this->setAktifBulan07($value);
                break;
            case 16:
                $this->setAktifBulan08($value);
                break;
            case 17:
                $this->setAktifBulan09($value);
                break;
            case 18:
                $this->setAktifBulan10($value);
                break;
            case 19:
                $this->setAktifBulan11($value);
                break;
            case 20:
                $this->setAktifBulan12($value);
                break;
            case 21:
                $this->setTglPtkKeluar($value);
                break;
            case 22:
                $this->setCreateDate($value);
                break;
            case 23:
                $this->setLastUpdate($value);
                break;
            case 24:
                $this->setSoftDelete($value);
                break;
            case 25:
                $this->setLastSync($value);
                break;
            case 26:
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
        $keys = PtkTerdaftarPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPtkTerdaftarId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPtkId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSekolahId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJenisKeluarId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTahunAjaranId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNomorSuratTugas($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTanggalSuratTugas($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPtkInduk($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTmtTugas($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAktifBulan01($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAktifBulan02($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAktifBulan03($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setAktifBulan04($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAktifBulan05($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAktifBulan06($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAktifBulan07($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAktifBulan08($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setAktifBulan09($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setAktifBulan10($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setAktifBulan11($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setAktifBulan12($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setTglPtkKeluar($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setCreateDate($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setLastUpdate($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setSoftDelete($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setLastSync($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setUpdaterId($arr[$keys[26]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PtkTerdaftarPeer::DATABASE_NAME);

        if ($this->isColumnModified(PtkTerdaftarPeer::PTK_TERDAFTAR_ID)) $criteria->add(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $this->ptk_terdaftar_id);
        if ($this->isColumnModified(PtkTerdaftarPeer::PTK_ID)) $criteria->add(PtkTerdaftarPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(PtkTerdaftarPeer::SEKOLAH_ID)) $criteria->add(PtkTerdaftarPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(PtkTerdaftarPeer::JENIS_KELUAR_ID)) $criteria->add(PtkTerdaftarPeer::JENIS_KELUAR_ID, $this->jenis_keluar_id);
        if ($this->isColumnModified(PtkTerdaftarPeer::TAHUN_AJARAN_ID)) $criteria->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $this->tahun_ajaran_id);
        if ($this->isColumnModified(PtkTerdaftarPeer::NOMOR_SURAT_TUGAS)) $criteria->add(PtkTerdaftarPeer::NOMOR_SURAT_TUGAS, $this->nomor_surat_tugas);
        if ($this->isColumnModified(PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS)) $criteria->add(PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS, $this->tanggal_surat_tugas);
        if ($this->isColumnModified(PtkTerdaftarPeer::PTK_INDUK)) $criteria->add(PtkTerdaftarPeer::PTK_INDUK, $this->ptk_induk);
        if ($this->isColumnModified(PtkTerdaftarPeer::TMT_TUGAS)) $criteria->add(PtkTerdaftarPeer::TMT_TUGAS, $this->tmt_tugas);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_01)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_01, $this->aktif_bulan_01);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_02)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_02, $this->aktif_bulan_02);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_03)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_03, $this->aktif_bulan_03);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_04)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_04, $this->aktif_bulan_04);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_05)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_05, $this->aktif_bulan_05);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_06)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_06, $this->aktif_bulan_06);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_07)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_07, $this->aktif_bulan_07);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_08)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_08, $this->aktif_bulan_08);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_09)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_09, $this->aktif_bulan_09);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_10)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_10, $this->aktif_bulan_10);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_11)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_11, $this->aktif_bulan_11);
        if ($this->isColumnModified(PtkTerdaftarPeer::AKTIF_BULAN_12)) $criteria->add(PtkTerdaftarPeer::AKTIF_BULAN_12, $this->aktif_bulan_12);
        if ($this->isColumnModified(PtkTerdaftarPeer::TGL_PTK_KELUAR)) $criteria->add(PtkTerdaftarPeer::TGL_PTK_KELUAR, $this->tgl_ptk_keluar);
        if ($this->isColumnModified(PtkTerdaftarPeer::CREATE_DATE)) $criteria->add(PtkTerdaftarPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PtkTerdaftarPeer::LAST_UPDATE)) $criteria->add(PtkTerdaftarPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PtkTerdaftarPeer::SOFT_DELETE)) $criteria->add(PtkTerdaftarPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PtkTerdaftarPeer::LAST_SYNC)) $criteria->add(PtkTerdaftarPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PtkTerdaftarPeer::UPDATER_ID)) $criteria->add(PtkTerdaftarPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PtkTerdaftarPeer::DATABASE_NAME);
        $criteria->add(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $this->ptk_terdaftar_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPtkTerdaftarId();
    }

    /**
     * Generic method to set the primary key (ptk_terdaftar_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPtkTerdaftarId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPtkTerdaftarId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of PtkTerdaftar (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setJenisKeluarId($this->getJenisKeluarId());
        $copyObj->setTahunAjaranId($this->getTahunAjaranId());
        $copyObj->setNomorSuratTugas($this->getNomorSuratTugas());
        $copyObj->setTanggalSuratTugas($this->getTanggalSuratTugas());
        $copyObj->setPtkInduk($this->getPtkInduk());
        $copyObj->setTmtTugas($this->getTmtTugas());
        $copyObj->setAktifBulan01($this->getAktifBulan01());
        $copyObj->setAktifBulan02($this->getAktifBulan02());
        $copyObj->setAktifBulan03($this->getAktifBulan03());
        $copyObj->setAktifBulan04($this->getAktifBulan04());
        $copyObj->setAktifBulan05($this->getAktifBulan05());
        $copyObj->setAktifBulan06($this->getAktifBulan06());
        $copyObj->setAktifBulan07($this->getAktifBulan07());
        $copyObj->setAktifBulan08($this->getAktifBulan08());
        $copyObj->setAktifBulan09($this->getAktifBulan09());
        $copyObj->setAktifBulan10($this->getAktifBulan10());
        $copyObj->setAktifBulan11($this->getAktifBulan11());
        $copyObj->setAktifBulan12($this->getAktifBulan12());
        $copyObj->setTglPtkKeluar($this->getTglPtkKeluar());
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

            foreach ($this->getGuruSasaranPengawass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGuruSasaranPengawas($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPembelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPembelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPtkTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPtkTerdaftar($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPtkTerdaftarId(NULL); // this is a auto-increment column, so set to default value
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
     * @return PtkTerdaftar Clone of current object.
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
     * @return PtkTerdaftarPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PtkTerdaftarPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisKeluar object.
     *
     * @param             JenisKeluar $v
     * @return PtkTerdaftar The current object (for fluent API support)
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
            $v->addPtkTerdaftar($this);
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
                $this->aJenisKeluar->addPtkTerdaftars($this);
             */
        }

        return $this->aJenisKeluar;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return PtkTerdaftar The current object (for fluent API support)
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
            $v->addPtkTerdaftar($this);
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
                $this->aPtk->addPtkTerdaftars($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a TahunAjaran object.
     *
     * @param             TahunAjaran $v
     * @return PtkTerdaftar The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTahunAjaran(TahunAjaran $v = null)
    {
        if ($v === null) {
            $this->setTahunAjaranId(NULL);
        } else {
            $this->setTahunAjaranId($v->getTahunAjaranId());
        }

        $this->aTahunAjaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TahunAjaran object, it will not be re-added.
        if ($v !== null) {
            $v->addPtkTerdaftar($this);
        }


        return $this;
    }


    /**
     * Get the associated TahunAjaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TahunAjaran The associated TahunAjaran object.
     * @throws PropelException
     */
    public function getTahunAjaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTahunAjaran === null && (($this->tahun_ajaran_id !== "" && $this->tahun_ajaran_id !== null)) && $doQuery) {
            $this->aTahunAjaran = TahunAjaranQuery::create()->findPk($this->tahun_ajaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTahunAjaran->addPtkTerdaftars($this);
             */
        }

        return $this->aTahunAjaran;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return PtkTerdaftar The current object (for fluent API support)
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
            $v->addPtkTerdaftar($this);
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
                $this->aSekolah->addPtkTerdaftars($this);
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
        if ('GuruSasaranPengawas' == $relationName) {
            $this->initGuruSasaranPengawass();
        }
        if ('Pembelajaran' == $relationName) {
            $this->initPembelajarans();
        }
        if ('VldPtkTerdaftar' == $relationName) {
            $this->initVldPtkTerdaftars();
        }
    }

    /**
     * Clears out the collGuruSasaranPengawass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PtkTerdaftar The current object (for fluent API support)
     * @see        addGuruSasaranPengawass()
     */
    public function clearGuruSasaranPengawass()
    {
        $this->collGuruSasaranPengawass = null; // important to set this to null since that means it is uninitialized
        $this->collGuruSasaranPengawassPartial = null;

        return $this;
    }

    /**
     * reset is the collGuruSasaranPengawass collection loaded partially
     *
     * @return void
     */
    public function resetPartialGuruSasaranPengawass($v = true)
    {
        $this->collGuruSasaranPengawassPartial = $v;
    }

    /**
     * Initializes the collGuruSasaranPengawass collection.
     *
     * By default this just sets the collGuruSasaranPengawass collection to an empty array (like clearcollGuruSasaranPengawass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGuruSasaranPengawass($overrideExisting = true)
    {
        if (null !== $this->collGuruSasaranPengawass && !$overrideExisting) {
            return;
        }
        $this->collGuruSasaranPengawass = new PropelObjectCollection();
        $this->collGuruSasaranPengawass->setModel('GuruSasaranPengawas');
    }

    /**
     * Gets an array of GuruSasaranPengawas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PtkTerdaftar is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|GuruSasaranPengawas[] List of GuruSasaranPengawas objects
     * @throws PropelException
     */
    public function getGuruSasaranPengawass($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGuruSasaranPengawassPartial && !$this->isNew();
        if (null === $this->collGuruSasaranPengawass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGuruSasaranPengawass) {
                // return empty collection
                $this->initGuruSasaranPengawass();
            } else {
                $collGuruSasaranPengawass = GuruSasaranPengawasQuery::create(null, $criteria)
                    ->filterByPtkTerdaftar($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGuruSasaranPengawassPartial && count($collGuruSasaranPengawass)) {
                      $this->initGuruSasaranPengawass(false);

                      foreach($collGuruSasaranPengawass as $obj) {
                        if (false == $this->collGuruSasaranPengawass->contains($obj)) {
                          $this->collGuruSasaranPengawass->append($obj);
                        }
                      }

                      $this->collGuruSasaranPengawassPartial = true;
                    }

                    $collGuruSasaranPengawass->getInternalIterator()->rewind();
                    return $collGuruSasaranPengawass;
                }

                if($partial && $this->collGuruSasaranPengawass) {
                    foreach($this->collGuruSasaranPengawass as $obj) {
                        if($obj->isNew()) {
                            $collGuruSasaranPengawass[] = $obj;
                        }
                    }
                }

                $this->collGuruSasaranPengawass = $collGuruSasaranPengawass;
                $this->collGuruSasaranPengawassPartial = false;
            }
        }

        return $this->collGuruSasaranPengawass;
    }

    /**
     * Sets a collection of GuruSasaranPengawas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $guruSasaranPengawass A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setGuruSasaranPengawass(PropelCollection $guruSasaranPengawass, PropelPDO $con = null)
    {
        $guruSasaranPengawassToDelete = $this->getGuruSasaranPengawass(new Criteria(), $con)->diff($guruSasaranPengawass);

        $this->guruSasaranPengawassScheduledForDeletion = unserialize(serialize($guruSasaranPengawassToDelete));

        foreach ($guruSasaranPengawassToDelete as $guruSasaranPengawasRemoved) {
            $guruSasaranPengawasRemoved->setPtkTerdaftar(null);
        }

        $this->collGuruSasaranPengawass = null;
        foreach ($guruSasaranPengawass as $guruSasaranPengawas) {
            $this->addGuruSasaranPengawas($guruSasaranPengawas);
        }

        $this->collGuruSasaranPengawass = $guruSasaranPengawass;
        $this->collGuruSasaranPengawassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related GuruSasaranPengawas objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related GuruSasaranPengawas objects.
     * @throws PropelException
     */
    public function countGuruSasaranPengawass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGuruSasaranPengawassPartial && !$this->isNew();
        if (null === $this->collGuruSasaranPengawass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGuruSasaranPengawass) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getGuruSasaranPengawass());
            }
            $query = GuruSasaranPengawasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtkTerdaftar($this)
                ->count($con);
        }

        return count($this->collGuruSasaranPengawass);
    }

    /**
     * Method called to associate a GuruSasaranPengawas object to this object
     * through the GuruSasaranPengawas foreign key attribute.
     *
     * @param    GuruSasaranPengawas $l GuruSasaranPengawas
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function addGuruSasaranPengawas(GuruSasaranPengawas $l)
    {
        if ($this->collGuruSasaranPengawass === null) {
            $this->initGuruSasaranPengawass();
            $this->collGuruSasaranPengawassPartial = true;
        }
        if (!in_array($l, $this->collGuruSasaranPengawass->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGuruSasaranPengawas($l);
        }

        return $this;
    }

    /**
     * @param	GuruSasaranPengawas $guruSasaranPengawas The guruSasaranPengawas object to add.
     */
    protected function doAddGuruSasaranPengawas($guruSasaranPengawas)
    {
        $this->collGuruSasaranPengawass[]= $guruSasaranPengawas;
        $guruSasaranPengawas->setPtkTerdaftar($this);
    }

    /**
     * @param	GuruSasaranPengawas $guruSasaranPengawas The guruSasaranPengawas object to remove.
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function removeGuruSasaranPengawas($guruSasaranPengawas)
    {
        if ($this->getGuruSasaranPengawass()->contains($guruSasaranPengawas)) {
            $this->collGuruSasaranPengawass->remove($this->collGuruSasaranPengawass->search($guruSasaranPengawas));
            if (null === $this->guruSasaranPengawassScheduledForDeletion) {
                $this->guruSasaranPengawassScheduledForDeletion = clone $this->collGuruSasaranPengawass;
                $this->guruSasaranPengawassScheduledForDeletion->clear();
            }
            $this->guruSasaranPengawassScheduledForDeletion[]= clone $guruSasaranPengawas;
            $guruSasaranPengawas->setPtkTerdaftar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PtkTerdaftar is new, it will return
     * an empty collection; or if this PtkTerdaftar has previously
     * been saved, it will retrieve related GuruSasaranPengawass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PtkTerdaftar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|GuruSasaranPengawas[] List of GuruSasaranPengawas objects
     */
    public function getGuruSasaranPengawassJoinPengawasTerdaftar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = GuruSasaranPengawasQuery::create(null, $criteria);
        $query->joinWith('PengawasTerdaftar', $join_behavior);

        return $this->getGuruSasaranPengawass($query, $con);
    }

    /**
     * Clears out the collPembelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PtkTerdaftar The current object (for fluent API support)
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
     * If this PtkTerdaftar is new, it will return
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
                    ->filterByPtkTerdaftar($this)
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
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setPembelajarans(PropelCollection $pembelajarans, PropelPDO $con = null)
    {
        $pembelajaransToDelete = $this->getPembelajarans(new Criteria(), $con)->diff($pembelajarans);

        $this->pembelajaransScheduledForDeletion = unserialize(serialize($pembelajaransToDelete));

        foreach ($pembelajaransToDelete as $pembelajaranRemoved) {
            $pembelajaranRemoved->setPtkTerdaftar(null);
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
                ->filterByPtkTerdaftar($this)
                ->count($con);
        }

        return count($this->collPembelajarans);
    }

    /**
     * Method called to associate a Pembelajaran object to this object
     * through the Pembelajaran foreign key attribute.
     *
     * @param    Pembelajaran $l Pembelajaran
     * @return PtkTerdaftar The current object (for fluent API support)
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
        $pembelajaran->setPtkTerdaftar($this);
    }

    /**
     * @param	Pembelajaran $pembelajaran The pembelajaran object to remove.
     * @return PtkTerdaftar The current object (for fluent API support)
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
            $pembelajaran->setPtkTerdaftar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PtkTerdaftar is new, it will return
     * an empty collection; or if this PtkTerdaftar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PtkTerdaftar.
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
     * Otherwise if this PtkTerdaftar is new, it will return
     * an empty collection; or if this PtkTerdaftar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PtkTerdaftar.
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
     * Otherwise if this PtkTerdaftar is new, it will return
     * an empty collection; or if this PtkTerdaftar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PtkTerdaftar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinRombonganBelajar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('RombonganBelajar', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PtkTerdaftar is new, it will return
     * an empty collection; or if this PtkTerdaftar has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PtkTerdaftar.
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
     * Clears out the collVldPtkTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PtkTerdaftar The current object (for fluent API support)
     * @see        addVldPtkTerdaftars()
     */
    public function clearVldPtkTerdaftars()
    {
        $this->collVldPtkTerdaftars = null; // important to set this to null since that means it is uninitialized
        $this->collVldPtkTerdaftarsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPtkTerdaftars collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPtkTerdaftars($v = true)
    {
        $this->collVldPtkTerdaftarsPartial = $v;
    }

    /**
     * Initializes the collVldPtkTerdaftars collection.
     *
     * By default this just sets the collVldPtkTerdaftars collection to an empty array (like clearcollVldPtkTerdaftars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPtkTerdaftars($overrideExisting = true)
    {
        if (null !== $this->collVldPtkTerdaftars && !$overrideExisting) {
            return;
        }
        $this->collVldPtkTerdaftars = new PropelObjectCollection();
        $this->collVldPtkTerdaftars->setModel('VldPtkTerdaftar');
    }

    /**
     * Gets an array of VldPtkTerdaftar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PtkTerdaftar is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPtkTerdaftar[] List of VldPtkTerdaftar objects
     * @throws PropelException
     */
    public function getVldPtkTerdaftars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collVldPtkTerdaftars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPtkTerdaftars) {
                // return empty collection
                $this->initVldPtkTerdaftars();
            } else {
                $collVldPtkTerdaftars = VldPtkTerdaftarQuery::create(null, $criteria)
                    ->filterByPtkTerdaftar($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPtkTerdaftarsPartial && count($collVldPtkTerdaftars)) {
                      $this->initVldPtkTerdaftars(false);

                      foreach($collVldPtkTerdaftars as $obj) {
                        if (false == $this->collVldPtkTerdaftars->contains($obj)) {
                          $this->collVldPtkTerdaftars->append($obj);
                        }
                      }

                      $this->collVldPtkTerdaftarsPartial = true;
                    }

                    $collVldPtkTerdaftars->getInternalIterator()->rewind();
                    return $collVldPtkTerdaftars;
                }

                if($partial && $this->collVldPtkTerdaftars) {
                    foreach($this->collVldPtkTerdaftars as $obj) {
                        if($obj->isNew()) {
                            $collVldPtkTerdaftars[] = $obj;
                        }
                    }
                }

                $this->collVldPtkTerdaftars = $collVldPtkTerdaftars;
                $this->collVldPtkTerdaftarsPartial = false;
            }
        }

        return $this->collVldPtkTerdaftars;
    }

    /**
     * Sets a collection of VldPtkTerdaftar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPtkTerdaftars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function setVldPtkTerdaftars(PropelCollection $vldPtkTerdaftars, PropelPDO $con = null)
    {
        $vldPtkTerdaftarsToDelete = $this->getVldPtkTerdaftars(new Criteria(), $con)->diff($vldPtkTerdaftars);

        $this->vldPtkTerdaftarsScheduledForDeletion = unserialize(serialize($vldPtkTerdaftarsToDelete));

        foreach ($vldPtkTerdaftarsToDelete as $vldPtkTerdaftarRemoved) {
            $vldPtkTerdaftarRemoved->setPtkTerdaftar(null);
        }

        $this->collVldPtkTerdaftars = null;
        foreach ($vldPtkTerdaftars as $vldPtkTerdaftar) {
            $this->addVldPtkTerdaftar($vldPtkTerdaftar);
        }

        $this->collVldPtkTerdaftars = $vldPtkTerdaftars;
        $this->collVldPtkTerdaftarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPtkTerdaftar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPtkTerdaftar objects.
     * @throws PropelException
     */
    public function countVldPtkTerdaftars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collVldPtkTerdaftars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPtkTerdaftars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPtkTerdaftars());
            }
            $query = VldPtkTerdaftarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtkTerdaftar($this)
                ->count($con);
        }

        return count($this->collVldPtkTerdaftars);
    }

    /**
     * Method called to associate a VldPtkTerdaftar object to this object
     * through the VldPtkTerdaftar foreign key attribute.
     *
     * @param    VldPtkTerdaftar $l VldPtkTerdaftar
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function addVldPtkTerdaftar(VldPtkTerdaftar $l)
    {
        if ($this->collVldPtkTerdaftars === null) {
            $this->initVldPtkTerdaftars();
            $this->collVldPtkTerdaftarsPartial = true;
        }
        if (!in_array($l, $this->collVldPtkTerdaftars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPtkTerdaftar($l);
        }

        return $this;
    }

    /**
     * @param	VldPtkTerdaftar $vldPtkTerdaftar The vldPtkTerdaftar object to add.
     */
    protected function doAddVldPtkTerdaftar($vldPtkTerdaftar)
    {
        $this->collVldPtkTerdaftars[]= $vldPtkTerdaftar;
        $vldPtkTerdaftar->setPtkTerdaftar($this);
    }

    /**
     * @param	VldPtkTerdaftar $vldPtkTerdaftar The vldPtkTerdaftar object to remove.
     * @return PtkTerdaftar The current object (for fluent API support)
     */
    public function removeVldPtkTerdaftar($vldPtkTerdaftar)
    {
        if ($this->getVldPtkTerdaftars()->contains($vldPtkTerdaftar)) {
            $this->collVldPtkTerdaftars->remove($this->collVldPtkTerdaftars->search($vldPtkTerdaftar));
            if (null === $this->vldPtkTerdaftarsScheduledForDeletion) {
                $this->vldPtkTerdaftarsScheduledForDeletion = clone $this->collVldPtkTerdaftars;
                $this->vldPtkTerdaftarsScheduledForDeletion->clear();
            }
            $this->vldPtkTerdaftarsScheduledForDeletion[]= clone $vldPtkTerdaftar;
            $vldPtkTerdaftar->setPtkTerdaftar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PtkTerdaftar is new, it will return
     * an empty collection; or if this PtkTerdaftar has previously
     * been saved, it will retrieve related VldPtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PtkTerdaftar.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPtkTerdaftar[] List of VldPtkTerdaftar objects
     */
    public function getVldPtkTerdaftarsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldPtkTerdaftars($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->ptk_terdaftar_id = null;
        $this->ptk_id = null;
        $this->sekolah_id = null;
        $this->jenis_keluar_id = null;
        $this->tahun_ajaran_id = null;
        $this->nomor_surat_tugas = null;
        $this->tanggal_surat_tugas = null;
        $this->ptk_induk = null;
        $this->tmt_tugas = null;
        $this->aktif_bulan_01 = null;
        $this->aktif_bulan_02 = null;
        $this->aktif_bulan_03 = null;
        $this->aktif_bulan_04 = null;
        $this->aktif_bulan_05 = null;
        $this->aktif_bulan_06 = null;
        $this->aktif_bulan_07 = null;
        $this->aktif_bulan_08 = null;
        $this->aktif_bulan_09 = null;
        $this->aktif_bulan_10 = null;
        $this->aktif_bulan_11 = null;
        $this->aktif_bulan_12 = null;
        $this->tgl_ptk_keluar = null;
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
            if ($this->collGuruSasaranPengawass) {
                foreach ($this->collGuruSasaranPengawass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPembelajarans) {
                foreach ($this->collPembelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPtkTerdaftars) {
                foreach ($this->collVldPtkTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisKeluar instanceof Persistent) {
              $this->aJenisKeluar->clearAllReferences($deep);
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aTahunAjaran instanceof Persistent) {
              $this->aTahunAjaran->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collGuruSasaranPengawass instanceof PropelCollection) {
            $this->collGuruSasaranPengawass->clearIterator();
        }
        $this->collGuruSasaranPengawass = null;
        if ($this->collPembelajarans instanceof PropelCollection) {
            $this->collPembelajarans->clearIterator();
        }
        $this->collPembelajarans = null;
        if ($this->collVldPtkTerdaftars instanceof PropelCollection) {
            $this->collVldPtkTerdaftars->clearIterator();
        }
        $this->collVldPtkTerdaftars = null;
        $this->aJenisKeluar = null;
        $this->aPtk = null;
        $this->aTahunAjaran = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PtkTerdaftarPeer::DEFAULT_STRING_FORMAT);
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
