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
use DataDikdas\Model\LogOtentikasi;
use DataDikdas\Model\LogOtentikasiQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\PenggunaPeer;
use DataDikdas\Model\PenggunaQuery;
use DataDikdas\Model\RolePengguna;
use DataDikdas\Model\RolePenggunaQuery;

/**
 * Base class that represents a row from the 'man_akses.pengguna' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePengguna extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PenggunaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PenggunaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the pengguna_id field.
     * @var        string
     */
    protected $pengguna_id;

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
     * The value for the peserta_didik_id field.
     * @var        string
     */
    protected $peserta_didik_id;

    /**
     * The value for the username field.
     * @var        string
     */
    protected $username;

    /**
     * The value for the a_bot field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_bot;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the tempat_lahir field.
     * @var        string
     */
    protected $tempat_lahir;

    /**
     * The value for the tgl_lahir field.
     * @var        string
     */
    protected $tgl_lahir;

    /**
     * The value for the jenis_kelamin field.
     * @var        string
     */
    protected $jenis_kelamin;

    /**
     * The value for the nip_nim field.
     * @var        string
     */
    protected $nip_nim;

    /**
     * The value for the jabatan_lembaga field.
     * @var        string
     */
    protected $jabatan_lembaga;

    /**
     * The value for the alamat field.
     * @var        string
     */
    protected $alamat;

    /**
     * The value for the kode_wilayah field.
     * @var        string
     */
    protected $kode_wilayah;

    /**
     * The value for the no_telepon field.
     * @var        string
     */
    protected $no_telepon;

    /**
     * The value for the no_hp field.
     * @var        string
     */
    protected $no_hp;

    /**
     * The value for the approval_pengguna field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $approval_pengguna;

    /**
     * The value for the aktif field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $aktif;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the password_lama field.
     * @var        string
     */
    protected $password_lama;

    /**
     * The value for the tgl_ganti_pwd field.
     * @var        string
     */
    protected $tgl_ganti_pwd;

    /**
     * The value for the id_sdm_pengguna field.
     * @var        string
     */
    protected $id_sdm_pengguna;

    /**
     * The value for the id_pd_pengguna field.
     * @var        string
     */
    protected $id_pd_pengguna;

    /**
     * The value for the token_reg field.
     * @var        string
     */
    protected $token_reg;

    /**
     * The value for the jabatan field.
     * @var        string
     */
    protected $jabatan;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

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
     * @var        LembagaAkreditasi
     */
    protected $aLembagaAkreditasi;

    /**
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        LembSertifikasi
     */
    protected $aLembSertifikasi;

    /**
     * @var        PropelObjectCollection|LogOtentikasi[] Collection to store aggregation of LogOtentikasi objects.
     */
    protected $collLogOtentikasis;
    protected $collLogOtentikasisPartial;

    /**
     * @var        PropelObjectCollection|RolePengguna[] Collection to store aggregation of RolePengguna objects.
     */
    protected $collRolePenggunas;
    protected $collRolePenggunasPartial;

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
    protected $logOtentikasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rolePenggunasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->a_bot = '0';
        $this->approval_pengguna = '0';
        $this->aktif = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BasePengguna object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [peserta_didik_id] column value.
     * 
     * @return string
     */
    public function getPesertaDidikId()
    {
        return $this->peserta_didik_id;
    }

    /**
     * Get the [username] column value.
     * 
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [a_bot] column value.
     * 
     * @return string
     */
    public function getABot()
    {
        return $this->a_bot;
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
     * Get the [tempat_lahir] column value.
     * 
     * @return string
     */
    public function getTempatLahir()
    {
        return $this->tempat_lahir;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_lahir] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglLahir($format = '%Y-%m-%d')
    {
        if ($this->tgl_lahir === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_lahir);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_lahir, true), $x);
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
     * Get the [jenis_kelamin] column value.
     * 
     * @return string
     */
    public function getJenisKelamin()
    {
        return $this->jenis_kelamin;
    }

    /**
     * Get the [nip_nim] column value.
     * 
     * @return string
     */
    public function getNipNim()
    {
        return $this->nip_nim;
    }

    /**
     * Get the [jabatan_lembaga] column value.
     * 
     * @return string
     */
    public function getJabatanLembaga()
    {
        return $this->jabatan_lembaga;
    }

    /**
     * Get the [alamat] column value.
     * 
     * @return string
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Get the [kode_wilayah] column value.
     * 
     * @return string
     */
    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
    }

    /**
     * Get the [no_telepon] column value.
     * 
     * @return string
     */
    public function getNoTelepon()
    {
        return $this->no_telepon;
    }

    /**
     * Get the [no_hp] column value.
     * 
     * @return string
     */
    public function getNoHp()
    {
        return $this->no_hp;
    }

    /**
     * Get the [approval_pengguna] column value.
     * 
     * @return string
     */
    public function getApprovalPengguna()
    {
        return $this->approval_pengguna;
    }

    /**
     * Get the [aktif] column value.
     * 
     * @return string
     */
    public function getAktif()
    {
        return $this->aktif;
    }

    /**
     * Get the [password] column value.
     * 
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [password_lama] column value.
     * 
     * @return string
     */
    public function getPasswordLama()
    {
        return $this->password_lama;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_ganti_pwd] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglGantiPwd($format = '%Y-%m-%d')
    {
        if ($this->tgl_ganti_pwd === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_ganti_pwd);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_ganti_pwd, true), $x);
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
     * Get the [id_sdm_pengguna] column value.
     * 
     * @return string
     */
    public function getIdSdmPengguna()
    {
        return $this->id_sdm_pengguna;
    }

    /**
     * Get the [id_pd_pengguna] column value.
     * 
     * @return string
     */
    public function getIdPdPengguna()
    {
        return $this->id_pd_pengguna;
    }

    /**
     * Get the [token_reg] column value.
     * 
     * @return string
     */
    public function getTokenReg()
    {
        return $this->token_reg;
    }

    /**
     * Get the [jabatan] column value.
     * 
     * @return string
     */
    public function getJabatan()
    {
        return $this->jabatan;
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
     * Set the value of [pengguna_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setPenggunaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pengguna_id !== $v) {
            $this->pengguna_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::PENGGUNA_ID;
        }


        return $this;
    } // setPenggunaId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::SEKOLAH_ID;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [lembaga_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setLembagaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lembaga_id !== $v) {
            $this->lembaga_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::LEMBAGA_ID;
        }


        return $this;
    } // setLembagaId()

    /**
     * Set the value of [yayasan_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setYayasanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->yayasan_id !== $v) {
            $this->yayasan_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::YAYASAN_ID;
        }


        return $this;
    } // setYayasanId()

    /**
     * Set the value of [la_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setLaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->la_id !== $v) {
            $this->la_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::LA_ID;
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
     * @return Pengguna The current object (for fluent API support)
     */
    public function setDudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dudi_id !== $v) {
            $this->dudi_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::DUDI_ID;
        }


        return $this;
    } // setDudiId()

    /**
     * Set the value of [kode_lemb_sert] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setKodeLembSert($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_lemb_sert !== $v) {
            $this->kode_lemb_sert = $v;
            $this->modifiedColumns[] = PenggunaPeer::KODE_LEMB_SERT;
        }

        if ($this->aLembSertifikasi !== null && $this->aLembSertifikasi->getKodeLembSert() !== $v) {
            $this->aLembSertifikasi = null;
        }


        return $this;
    } // setKodeLembSert()

    /**
     * Set the value of [peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peserta_didik_id !== $v) {
            $this->peserta_didik_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::PESERTA_DIDIK_ID;
        }


        return $this;
    } // setPesertaDidikId()

    /**
     * Set the value of [username] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = PenggunaPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [a_bot] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setABot($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_bot !== $v) {
            $this->a_bot = $v;
            $this->modifiedColumns[] = PenggunaPeer::A_BOT;
        }


        return $this;
    } // setABot()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = PenggunaPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [tempat_lahir] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setTempatLahir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_lahir !== $v) {
            $this->tempat_lahir = $v;
            $this->modifiedColumns[] = PenggunaPeer::TEMPAT_LAHIR;
        }


        return $this;
    } // setTempatLahir()

    /**
     * Sets the value of [tgl_lahir] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pengguna The current object (for fluent API support)
     */
    public function setTglLahir($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_lahir !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_lahir !== null && $tmpDt = new DateTime($this->tgl_lahir)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_lahir = $newDateAsString;
                $this->modifiedColumns[] = PenggunaPeer::TGL_LAHIR;
            }
        } // if either are not null


        return $this;
    } // setTglLahir()

    /**
     * Set the value of [jenis_kelamin] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setJenisKelamin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_kelamin !== $v) {
            $this->jenis_kelamin = $v;
            $this->modifiedColumns[] = PenggunaPeer::JENIS_KELAMIN;
        }


        return $this;
    } // setJenisKelamin()

    /**
     * Set the value of [nip_nim] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setNipNim($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nip_nim !== $v) {
            $this->nip_nim = $v;
            $this->modifiedColumns[] = PenggunaPeer::NIP_NIM;
        }


        return $this;
    } // setNipNim()

    /**
     * Set the value of [jabatan_lembaga] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setJabatanLembaga($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jabatan_lembaga !== $v) {
            $this->jabatan_lembaga = $v;
            $this->modifiedColumns[] = PenggunaPeer::JABATAN_LEMBAGA;
        }


        return $this;
    } // setJabatanLembaga()

    /**
     * Set the value of [alamat] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setAlamat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat !== $v) {
            $this->alamat = $v;
            $this->modifiedColumns[] = PenggunaPeer::ALAMAT;
        }


        return $this;
    } // setAlamat()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = PenggunaPeer::KODE_WILAYAH;
        }

        if ($this->aMstWilayah !== null && $this->aMstWilayah->getKodeWilayah() !== $v) {
            $this->aMstWilayah = null;
        }


        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [no_telepon] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setNoTelepon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_telepon !== $v) {
            $this->no_telepon = $v;
            $this->modifiedColumns[] = PenggunaPeer::NO_TELEPON;
        }


        return $this;
    } // setNoTelepon()

    /**
     * Set the value of [no_hp] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setNoHp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_hp !== $v) {
            $this->no_hp = $v;
            $this->modifiedColumns[] = PenggunaPeer::NO_HP;
        }


        return $this;
    } // setNoHp()

    /**
     * Set the value of [approval_pengguna] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setApprovalPengguna($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->approval_pengguna !== $v) {
            $this->approval_pengguna = $v;
            $this->modifiedColumns[] = PenggunaPeer::APPROVAL_PENGGUNA;
        }


        return $this;
    } // setApprovalPengguna()

    /**
     * Set the value of [aktif] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif !== $v) {
            $this->aktif = $v;
            $this->modifiedColumns[] = PenggunaPeer::AKTIF;
        }


        return $this;
    } // setAktif()

    /**
     * Set the value of [password] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = PenggunaPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [password_lama] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setPasswordLama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password_lama !== $v) {
            $this->password_lama = $v;
            $this->modifiedColumns[] = PenggunaPeer::PASSWORD_LAMA;
        }


        return $this;
    } // setPasswordLama()

    /**
     * Sets the value of [tgl_ganti_pwd] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pengguna The current object (for fluent API support)
     */
    public function setTglGantiPwd($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_ganti_pwd !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_ganti_pwd !== null && $tmpDt = new DateTime($this->tgl_ganti_pwd)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_ganti_pwd = $newDateAsString;
                $this->modifiedColumns[] = PenggunaPeer::TGL_GANTI_PWD;
            }
        } // if either are not null


        return $this;
    } // setTglGantiPwd()

    /**
     * Set the value of [id_sdm_pengguna] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setIdSdmPengguna($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_sdm_pengguna !== $v) {
            $this->id_sdm_pengguna = $v;
            $this->modifiedColumns[] = PenggunaPeer::ID_SDM_PENGGUNA;
        }


        return $this;
    } // setIdSdmPengguna()

    /**
     * Set the value of [id_pd_pengguna] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setIdPdPengguna($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_pd_pengguna !== $v) {
            $this->id_pd_pengguna = $v;
            $this->modifiedColumns[] = PenggunaPeer::ID_PD_PENGGUNA;
        }


        return $this;
    } // setIdPdPengguna()

    /**
     * Set the value of [token_reg] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setTokenReg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->token_reg !== $v) {
            $this->token_reg = $v;
            $this->modifiedColumns[] = PenggunaPeer::TOKEN_REG;
        }


        return $this;
    } // setTokenReg()

    /**
     * Set the value of [jabatan] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setJabatan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jabatan !== $v) {
            $this->jabatan = $v;
            $this->modifiedColumns[] = PenggunaPeer::JABATAN;
        }


        return $this;
    } // setJabatan()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::PTK_ID;
        }


        return $this;
    } // setPtkId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pengguna The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PenggunaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pengguna The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PenggunaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PenggunaPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pengguna The current object (for fluent API support)
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
                $this->modifiedColumns[] = PenggunaPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Pengguna The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PenggunaPeer::UPDATER_ID;
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
            if ($this->a_bot !== '0') {
                return false;
            }

            if ($this->approval_pengguna !== '0') {
                return false;
            }

            if ($this->aktif !== '1') {
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

            $this->pengguna_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->sekolah_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->lembaga_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->yayasan_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->la_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->dudi_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kode_lemb_sert = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->peserta_didik_id = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->username = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->a_bot = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->nama = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->tempat_lahir = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->tgl_lahir = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->jenis_kelamin = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->nip_nim = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->jabatan_lembaga = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->alamat = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->kode_wilayah = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->no_telepon = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->no_hp = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->approval_pengguna = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->aktif = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->password = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->password_lama = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->tgl_ganti_pwd = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->id_sdm_pengguna = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->id_pd_pengguna = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->token_reg = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->jabatan = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->ptk_id = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->create_date = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->last_update = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->soft_delete = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->last_sync = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->updater_id = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 35; // 35 = PenggunaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Pengguna object", $e);
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
        if ($this->aMstWilayah !== null && $this->kode_wilayah !== $this->aMstWilayah->getKodeWilayah()) {
            $this->aMstWilayah = null;
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
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PenggunaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aLembagaAkreditasi = null;
            $this->aMstWilayah = null;
            $this->aLembSertifikasi = null;
            $this->collLogOtentikasis = null;

            $this->collRolePenggunas = null;

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
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PenggunaQuery::create()
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
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PenggunaPeer::addInstanceToPool($this);
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

            if ($this->aLembagaAkreditasi !== null) {
                if ($this->aLembagaAkreditasi->isModified() || $this->aLembagaAkreditasi->isNew()) {
                    $affectedRows += $this->aLembagaAkreditasi->save($con);
                }
                $this->setLembagaAkreditasi($this->aLembagaAkreditasi);
            }

            if ($this->aMstWilayah !== null) {
                if ($this->aMstWilayah->isModified() || $this->aMstWilayah->isNew()) {
                    $affectedRows += $this->aMstWilayah->save($con);
                }
                $this->setMstWilayah($this->aMstWilayah);
            }

            if ($this->aLembSertifikasi !== null) {
                if ($this->aLembSertifikasi->isModified() || $this->aLembSertifikasi->isNew()) {
                    $affectedRows += $this->aLembSertifikasi->save($con);
                }
                $this->setLembSertifikasi($this->aLembSertifikasi);
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

            if ($this->logOtentikasisScheduledForDeletion !== null) {
                if (!$this->logOtentikasisScheduledForDeletion->isEmpty()) {
                    LogOtentikasiQuery::create()
                        ->filterByPrimaryKeys($this->logOtentikasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->logOtentikasisScheduledForDeletion = null;
                }
            }

            if ($this->collLogOtentikasis !== null) {
                foreach ($this->collLogOtentikasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rolePenggunasScheduledForDeletion !== null) {
                if (!$this->rolePenggunasScheduledForDeletion->isEmpty()) {
                    RolePenggunaQuery::create()
                        ->filterByPrimaryKeys($this->rolePenggunasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rolePenggunasScheduledForDeletion = null;
                }
            }

            if ($this->collRolePenggunas !== null) {
                foreach ($this->collRolePenggunas as $referrerFK) {
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
        if ($this->isColumnModified(PenggunaPeer::PENGGUNA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pengguna_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::LEMBAGA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"lembaga_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::YAYASAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"yayasan_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::LA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"la_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::DUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"dudi_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::KODE_LEMB_SERT)) {
            $modifiedColumns[':p' . $index++]  = '"kode_lemb_sert"';
        }
        if ($this->isColumnModified(PenggunaPeer::PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peserta_didik_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '"username"';
        }
        if ($this->isColumnModified(PenggunaPeer::A_BOT)) {
            $modifiedColumns[':p' . $index++]  = '"a_bot"';
        }
        if ($this->isColumnModified(PenggunaPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(PenggunaPeer::TEMPAT_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_lahir"';
        }
        if ($this->isColumnModified(PenggunaPeer::TGL_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_lahir"';
        }
        if ($this->isColumnModified(PenggunaPeer::JENIS_KELAMIN)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_kelamin"';
        }
        if ($this->isColumnModified(PenggunaPeer::NIP_NIM)) {
            $modifiedColumns[':p' . $index++]  = '"nip_nim"';
        }
        if ($this->isColumnModified(PenggunaPeer::JABATAN_LEMBAGA)) {
            $modifiedColumns[':p' . $index++]  = '"jabatan_lembaga"';
        }
        if ($this->isColumnModified(PenggunaPeer::ALAMAT)) {
            $modifiedColumns[':p' . $index++]  = '"alamat"';
        }
        if ($this->isColumnModified(PenggunaPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(PenggunaPeer::NO_TELEPON)) {
            $modifiedColumns[':p' . $index++]  = '"no_telepon"';
        }
        if ($this->isColumnModified(PenggunaPeer::NO_HP)) {
            $modifiedColumns[':p' . $index++]  = '"no_hp"';
        }
        if ($this->isColumnModified(PenggunaPeer::APPROVAL_PENGGUNA)) {
            $modifiedColumns[':p' . $index++]  = '"approval_pengguna"';
        }
        if ($this->isColumnModified(PenggunaPeer::AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"aktif"';
        }
        if ($this->isColumnModified(PenggunaPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '"password"';
        }
        if ($this->isColumnModified(PenggunaPeer::PASSWORD_LAMA)) {
            $modifiedColumns[':p' . $index++]  = '"password_lama"';
        }
        if ($this->isColumnModified(PenggunaPeer::TGL_GANTI_PWD)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_ganti_pwd"';
        }
        if ($this->isColumnModified(PenggunaPeer::ID_SDM_PENGGUNA)) {
            $modifiedColumns[':p' . $index++]  = '"id_sdm_pengguna"';
        }
        if ($this->isColumnModified(PenggunaPeer::ID_PD_PENGGUNA)) {
            $modifiedColumns[':p' . $index++]  = '"id_pd_pengguna"';
        }
        if ($this->isColumnModified(PenggunaPeer::TOKEN_REG)) {
            $modifiedColumns[':p' . $index++]  = '"token_reg"';
        }
        if ($this->isColumnModified(PenggunaPeer::JABATAN)) {
            $modifiedColumns[':p' . $index++]  = '"jabatan"';
        }
        if ($this->isColumnModified(PenggunaPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(PenggunaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PenggunaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PenggunaPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PenggunaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PenggunaPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "man_akses"."pengguna" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"pengguna_id"':						
                        $stmt->bindValue($identifier, $this->pengguna_id, PDO::PARAM_STR);
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
                    case '"peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->peserta_didik_id, PDO::PARAM_STR);
                        break;
                    case '"username"':						
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '"a_bot"':						
                        $stmt->bindValue($identifier, $this->a_bot, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"tempat_lahir"':						
                        $stmt->bindValue($identifier, $this->tempat_lahir, PDO::PARAM_STR);
                        break;
                    case '"tgl_lahir"':						
                        $stmt->bindValue($identifier, $this->tgl_lahir, PDO::PARAM_STR);
                        break;
                    case '"jenis_kelamin"':						
                        $stmt->bindValue($identifier, $this->jenis_kelamin, PDO::PARAM_STR);
                        break;
                    case '"nip_nim"':						
                        $stmt->bindValue($identifier, $this->nip_nim, PDO::PARAM_STR);
                        break;
                    case '"jabatan_lembaga"':						
                        $stmt->bindValue($identifier, $this->jabatan_lembaga, PDO::PARAM_STR);
                        break;
                    case '"alamat"':						
                        $stmt->bindValue($identifier, $this->alamat, PDO::PARAM_STR);
                        break;
                    case '"kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->kode_wilayah, PDO::PARAM_STR);
                        break;
                    case '"no_telepon"':						
                        $stmt->bindValue($identifier, $this->no_telepon, PDO::PARAM_STR);
                        break;
                    case '"no_hp"':						
                        $stmt->bindValue($identifier, $this->no_hp, PDO::PARAM_STR);
                        break;
                    case '"approval_pengguna"':						
                        $stmt->bindValue($identifier, $this->approval_pengguna, PDO::PARAM_STR);
                        break;
                    case '"aktif"':						
                        $stmt->bindValue($identifier, $this->aktif, PDO::PARAM_STR);
                        break;
                    case '"password"':						
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '"password_lama"':						
                        $stmt->bindValue($identifier, $this->password_lama, PDO::PARAM_STR);
                        break;
                    case '"tgl_ganti_pwd"':						
                        $stmt->bindValue($identifier, $this->tgl_ganti_pwd, PDO::PARAM_STR);
                        break;
                    case '"id_sdm_pengguna"':						
                        $stmt->bindValue($identifier, $this->id_sdm_pengguna, PDO::PARAM_STR);
                        break;
                    case '"id_pd_pengguna"':						
                        $stmt->bindValue($identifier, $this->id_pd_pengguna, PDO::PARAM_STR);
                        break;
                    case '"token_reg"':						
                        $stmt->bindValue($identifier, $this->token_reg, PDO::PARAM_STR);
                        break;
                    case '"jabatan"':						
                        $stmt->bindValue($identifier, $this->jabatan, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
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

            if ($this->aLembagaAkreditasi !== null) {
                if (!$this->aLembagaAkreditasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLembagaAkreditasi->getValidationFailures());
                }
            }

            if ($this->aMstWilayah !== null) {
                if (!$this->aMstWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayah->getValidationFailures());
                }
            }

            if ($this->aLembSertifikasi !== null) {
                if (!$this->aLembSertifikasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLembSertifikasi->getValidationFailures());
                }
            }


            if (($retval = PenggunaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collLogOtentikasis !== null) {
                    foreach ($this->collLogOtentikasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRolePenggunas !== null) {
                    foreach ($this->collRolePenggunas as $referrerFK) {
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
        $pos = PenggunaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPenggunaId();
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
                return $this->getPesertaDidikId();
                break;
            case 8:
                return $this->getUsername();
                break;
            case 9:
                return $this->getABot();
                break;
            case 10:
                return $this->getNama();
                break;
            case 11:
                return $this->getTempatLahir();
                break;
            case 12:
                return $this->getTglLahir();
                break;
            case 13:
                return $this->getJenisKelamin();
                break;
            case 14:
                return $this->getNipNim();
                break;
            case 15:
                return $this->getJabatanLembaga();
                break;
            case 16:
                return $this->getAlamat();
                break;
            case 17:
                return $this->getKodeWilayah();
                break;
            case 18:
                return $this->getNoTelepon();
                break;
            case 19:
                return $this->getNoHp();
                break;
            case 20:
                return $this->getApprovalPengguna();
                break;
            case 21:
                return $this->getAktif();
                break;
            case 22:
                return $this->getPassword();
                break;
            case 23:
                return $this->getPasswordLama();
                break;
            case 24:
                return $this->getTglGantiPwd();
                break;
            case 25:
                return $this->getIdSdmPengguna();
                break;
            case 26:
                return $this->getIdPdPengguna();
                break;
            case 27:
                return $this->getTokenReg();
                break;
            case 28:
                return $this->getJabatan();
                break;
            case 29:
                return $this->getPtkId();
                break;
            case 30:
                return $this->getCreateDate();
                break;
            case 31:
                return $this->getLastUpdate();
                break;
            case 32:
                return $this->getSoftDelete();
                break;
            case 33:
                return $this->getLastSync();
                break;
            case 34:
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
        if (isset($alreadyDumpedObjects['Pengguna'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pengguna'][$this->getPrimaryKey()] = true;
        $keys = PenggunaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPenggunaId(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getLembagaId(),
            $keys[3] => $this->getYayasanId(),
            $keys[4] => $this->getLaId(),
            $keys[5] => $this->getDudiId(),
            $keys[6] => $this->getKodeLembSert(),
            $keys[7] => $this->getPesertaDidikId(),
            $keys[8] => $this->getUsername(),
            $keys[9] => $this->getABot(),
            $keys[10] => $this->getNama(),
            $keys[11] => $this->getTempatLahir(),
            $keys[12] => $this->getTglLahir(),
            $keys[13] => $this->getJenisKelamin(),
            $keys[14] => $this->getNipNim(),
            $keys[15] => $this->getJabatanLembaga(),
            $keys[16] => $this->getAlamat(),
            $keys[17] => $this->getKodeWilayah(),
            $keys[18] => $this->getNoTelepon(),
            $keys[19] => $this->getNoHp(),
            $keys[20] => $this->getApprovalPengguna(),
            $keys[21] => $this->getAktif(),
            $keys[22] => $this->getPassword(),
            $keys[23] => $this->getPasswordLama(),
            $keys[24] => $this->getTglGantiPwd(),
            $keys[25] => $this->getIdSdmPengguna(),
            $keys[26] => $this->getIdPdPengguna(),
            $keys[27] => $this->getTokenReg(),
            $keys[28] => $this->getJabatan(),
            $keys[29] => $this->getPtkId(),
            $keys[30] => $this->getCreateDate(),
            $keys[31] => $this->getLastUpdate(),
            $keys[32] => $this->getSoftDelete(),
            $keys[33] => $this->getLastSync(),
            $keys[34] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aLembagaAkreditasi) {
                $result['LembagaAkreditasi'] = $this->aLembagaAkreditasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLembSertifikasi) {
                $result['LembSertifikasi'] = $this->aLembSertifikasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collLogOtentikasis) {
                $result['LogOtentikasis'] = $this->collLogOtentikasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRolePenggunas) {
                $result['RolePenggunas'] = $this->collRolePenggunas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PenggunaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPenggunaId($value);
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
                $this->setPesertaDidikId($value);
                break;
            case 8:
                $this->setUsername($value);
                break;
            case 9:
                $this->setABot($value);
                break;
            case 10:
                $this->setNama($value);
                break;
            case 11:
                $this->setTempatLahir($value);
                break;
            case 12:
                $this->setTglLahir($value);
                break;
            case 13:
                $this->setJenisKelamin($value);
                break;
            case 14:
                $this->setNipNim($value);
                break;
            case 15:
                $this->setJabatanLembaga($value);
                break;
            case 16:
                $this->setAlamat($value);
                break;
            case 17:
                $this->setKodeWilayah($value);
                break;
            case 18:
                $this->setNoTelepon($value);
                break;
            case 19:
                $this->setNoHp($value);
                break;
            case 20:
                $this->setApprovalPengguna($value);
                break;
            case 21:
                $this->setAktif($value);
                break;
            case 22:
                $this->setPassword($value);
                break;
            case 23:
                $this->setPasswordLama($value);
                break;
            case 24:
                $this->setTglGantiPwd($value);
                break;
            case 25:
                $this->setIdSdmPengguna($value);
                break;
            case 26:
                $this->setIdPdPengguna($value);
                break;
            case 27:
                $this->setTokenReg($value);
                break;
            case 28:
                $this->setJabatan($value);
                break;
            case 29:
                $this->setPtkId($value);
                break;
            case 30:
                $this->setCreateDate($value);
                break;
            case 31:
                $this->setLastUpdate($value);
                break;
            case 32:
                $this->setSoftDelete($value);
                break;
            case 33:
                $this->setLastSync($value);
                break;
            case 34:
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
        $keys = PenggunaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPenggunaId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSekolahId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLembagaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setYayasanId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLaId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDudiId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKodeLembSert($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPesertaDidikId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setUsername($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setABot($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNama($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTempatLahir($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTglLahir($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setJenisKelamin($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setNipNim($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setJabatanLembaga($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAlamat($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setKodeWilayah($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setNoTelepon($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setNoHp($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setApprovalPengguna($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setAktif($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setPassword($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setPasswordLama($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setTglGantiPwd($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setIdSdmPengguna($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setIdPdPengguna($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setTokenReg($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setJabatan($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setPtkId($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setCreateDate($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setLastUpdate($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setSoftDelete($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setLastSync($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setUpdaterId($arr[$keys[34]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PenggunaPeer::DATABASE_NAME);

        if ($this->isColumnModified(PenggunaPeer::PENGGUNA_ID)) $criteria->add(PenggunaPeer::PENGGUNA_ID, $this->pengguna_id);
        if ($this->isColumnModified(PenggunaPeer::SEKOLAH_ID)) $criteria->add(PenggunaPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(PenggunaPeer::LEMBAGA_ID)) $criteria->add(PenggunaPeer::LEMBAGA_ID, $this->lembaga_id);
        if ($this->isColumnModified(PenggunaPeer::YAYASAN_ID)) $criteria->add(PenggunaPeer::YAYASAN_ID, $this->yayasan_id);
        if ($this->isColumnModified(PenggunaPeer::LA_ID)) $criteria->add(PenggunaPeer::LA_ID, $this->la_id);
        if ($this->isColumnModified(PenggunaPeer::DUDI_ID)) $criteria->add(PenggunaPeer::DUDI_ID, $this->dudi_id);
        if ($this->isColumnModified(PenggunaPeer::KODE_LEMB_SERT)) $criteria->add(PenggunaPeer::KODE_LEMB_SERT, $this->kode_lemb_sert);
        if ($this->isColumnModified(PenggunaPeer::PESERTA_DIDIK_ID)) $criteria->add(PenggunaPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        if ($this->isColumnModified(PenggunaPeer::USERNAME)) $criteria->add(PenggunaPeer::USERNAME, $this->username);
        if ($this->isColumnModified(PenggunaPeer::A_BOT)) $criteria->add(PenggunaPeer::A_BOT, $this->a_bot);
        if ($this->isColumnModified(PenggunaPeer::NAMA)) $criteria->add(PenggunaPeer::NAMA, $this->nama);
        if ($this->isColumnModified(PenggunaPeer::TEMPAT_LAHIR)) $criteria->add(PenggunaPeer::TEMPAT_LAHIR, $this->tempat_lahir);
        if ($this->isColumnModified(PenggunaPeer::TGL_LAHIR)) $criteria->add(PenggunaPeer::TGL_LAHIR, $this->tgl_lahir);
        if ($this->isColumnModified(PenggunaPeer::JENIS_KELAMIN)) $criteria->add(PenggunaPeer::JENIS_KELAMIN, $this->jenis_kelamin);
        if ($this->isColumnModified(PenggunaPeer::NIP_NIM)) $criteria->add(PenggunaPeer::NIP_NIM, $this->nip_nim);
        if ($this->isColumnModified(PenggunaPeer::JABATAN_LEMBAGA)) $criteria->add(PenggunaPeer::JABATAN_LEMBAGA, $this->jabatan_lembaga);
        if ($this->isColumnModified(PenggunaPeer::ALAMAT)) $criteria->add(PenggunaPeer::ALAMAT, $this->alamat);
        if ($this->isColumnModified(PenggunaPeer::KODE_WILAYAH)) $criteria->add(PenggunaPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(PenggunaPeer::NO_TELEPON)) $criteria->add(PenggunaPeer::NO_TELEPON, $this->no_telepon);
        if ($this->isColumnModified(PenggunaPeer::NO_HP)) $criteria->add(PenggunaPeer::NO_HP, $this->no_hp);
        if ($this->isColumnModified(PenggunaPeer::APPROVAL_PENGGUNA)) $criteria->add(PenggunaPeer::APPROVAL_PENGGUNA, $this->approval_pengguna);
        if ($this->isColumnModified(PenggunaPeer::AKTIF)) $criteria->add(PenggunaPeer::AKTIF, $this->aktif);
        if ($this->isColumnModified(PenggunaPeer::PASSWORD)) $criteria->add(PenggunaPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(PenggunaPeer::PASSWORD_LAMA)) $criteria->add(PenggunaPeer::PASSWORD_LAMA, $this->password_lama);
        if ($this->isColumnModified(PenggunaPeer::TGL_GANTI_PWD)) $criteria->add(PenggunaPeer::TGL_GANTI_PWD, $this->tgl_ganti_pwd);
        if ($this->isColumnModified(PenggunaPeer::ID_SDM_PENGGUNA)) $criteria->add(PenggunaPeer::ID_SDM_PENGGUNA, $this->id_sdm_pengguna);
        if ($this->isColumnModified(PenggunaPeer::ID_PD_PENGGUNA)) $criteria->add(PenggunaPeer::ID_PD_PENGGUNA, $this->id_pd_pengguna);
        if ($this->isColumnModified(PenggunaPeer::TOKEN_REG)) $criteria->add(PenggunaPeer::TOKEN_REG, $this->token_reg);
        if ($this->isColumnModified(PenggunaPeer::JABATAN)) $criteria->add(PenggunaPeer::JABATAN, $this->jabatan);
        if ($this->isColumnModified(PenggunaPeer::PTK_ID)) $criteria->add(PenggunaPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(PenggunaPeer::CREATE_DATE)) $criteria->add(PenggunaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PenggunaPeer::LAST_UPDATE)) $criteria->add(PenggunaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PenggunaPeer::SOFT_DELETE)) $criteria->add(PenggunaPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PenggunaPeer::LAST_SYNC)) $criteria->add(PenggunaPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PenggunaPeer::UPDATER_ID)) $criteria->add(PenggunaPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PenggunaPeer::DATABASE_NAME);
        $criteria->add(PenggunaPeer::PENGGUNA_ID, $this->pengguna_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPenggunaId();
    }

    /**
     * Generic method to set the primary key (pengguna_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPenggunaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPenggunaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Pengguna (or compatible) type.
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
        $copyObj->setPesertaDidikId($this->getPesertaDidikId());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setABot($this->getABot());
        $copyObj->setNama($this->getNama());
        $copyObj->setTempatLahir($this->getTempatLahir());
        $copyObj->setTglLahir($this->getTglLahir());
        $copyObj->setJenisKelamin($this->getJenisKelamin());
        $copyObj->setNipNim($this->getNipNim());
        $copyObj->setJabatanLembaga($this->getJabatanLembaga());
        $copyObj->setAlamat($this->getAlamat());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setNoTelepon($this->getNoTelepon());
        $copyObj->setNoHp($this->getNoHp());
        $copyObj->setApprovalPengguna($this->getApprovalPengguna());
        $copyObj->setAktif($this->getAktif());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setPasswordLama($this->getPasswordLama());
        $copyObj->setTglGantiPwd($this->getTglGantiPwd());
        $copyObj->setIdSdmPengguna($this->getIdSdmPengguna());
        $copyObj->setIdPdPengguna($this->getIdPdPengguna());
        $copyObj->setTokenReg($this->getTokenReg());
        $copyObj->setJabatan($this->getJabatan());
        $copyObj->setPtkId($this->getPtkId());
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

            foreach ($this->getLogOtentikasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLogOtentikasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRolePenggunas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRolePengguna($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPenggunaId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Pengguna Clone of current object.
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
     * @return PenggunaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PenggunaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a LembagaAkreditasi object.
     *
     * @param             LembagaAkreditasi $v
     * @return Pengguna The current object (for fluent API support)
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
            $v->addPengguna($this);
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
                $this->aLembagaAkreditasi->addPenggunas($this);
             */
        }

        return $this->aLembagaAkreditasi;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Pengguna The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMstWilayah(MstWilayah $v = null)
    {
        if ($v === null) {
            $this->setKodeWilayah(NULL);
        } else {
            $this->setKodeWilayah($v->getKodeWilayah());
        }

        $this->aMstWilayah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MstWilayah object, it will not be re-added.
        if ($v !== null) {
            $v->addPengguna($this);
        }


        return $this;
    }


    /**
     * Get the associated MstWilayah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MstWilayah The associated MstWilayah object.
     * @throws PropelException
     */
    public function getMstWilayah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMstWilayah === null && (($this->kode_wilayah !== "" && $this->kode_wilayah !== null)) && $doQuery) {
            $this->aMstWilayah = MstWilayahQuery::create()->findPk($this->kode_wilayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMstWilayah->addPenggunas($this);
             */
        }

        return $this->aMstWilayah;
    }

    /**
     * Declares an association between this object and a LembSertifikasi object.
     *
     * @param             LembSertifikasi $v
     * @return Pengguna The current object (for fluent API support)
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
            $v->addPengguna($this);
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
                $this->aLembSertifikasi->addPenggunas($this);
             */
        }

        return $this->aLembSertifikasi;
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
        if ('LogOtentikasi' == $relationName) {
            $this->initLogOtentikasis();
        }
        if ('RolePengguna' == $relationName) {
            $this->initRolePenggunas();
        }
    }

    /**
     * Clears out the collLogOtentikasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pengguna The current object (for fluent API support)
     * @see        addLogOtentikasis()
     */
    public function clearLogOtentikasis()
    {
        $this->collLogOtentikasis = null; // important to set this to null since that means it is uninitialized
        $this->collLogOtentikasisPartial = null;

        return $this;
    }

    /**
     * reset is the collLogOtentikasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialLogOtentikasis($v = true)
    {
        $this->collLogOtentikasisPartial = $v;
    }

    /**
     * Initializes the collLogOtentikasis collection.
     *
     * By default this just sets the collLogOtentikasis collection to an empty array (like clearcollLogOtentikasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLogOtentikasis($overrideExisting = true)
    {
        if (null !== $this->collLogOtentikasis && !$overrideExisting) {
            return;
        }
        $this->collLogOtentikasis = new PropelObjectCollection();
        $this->collLogOtentikasis->setModel('LogOtentikasi');
    }

    /**
     * Gets an array of LogOtentikasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pengguna is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|LogOtentikasi[] List of LogOtentikasi objects
     * @throws PropelException
     */
    public function getLogOtentikasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLogOtentikasisPartial && !$this->isNew();
        if (null === $this->collLogOtentikasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLogOtentikasis) {
                // return empty collection
                $this->initLogOtentikasis();
            } else {
                $collLogOtentikasis = LogOtentikasiQuery::create(null, $criteria)
                    ->filterByPengguna($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLogOtentikasisPartial && count($collLogOtentikasis)) {
                      $this->initLogOtentikasis(false);

                      foreach($collLogOtentikasis as $obj) {
                        if (false == $this->collLogOtentikasis->contains($obj)) {
                          $this->collLogOtentikasis->append($obj);
                        }
                      }

                      $this->collLogOtentikasisPartial = true;
                    }

                    $collLogOtentikasis->getInternalIterator()->rewind();
                    return $collLogOtentikasis;
                }

                if($partial && $this->collLogOtentikasis) {
                    foreach($this->collLogOtentikasis as $obj) {
                        if($obj->isNew()) {
                            $collLogOtentikasis[] = $obj;
                        }
                    }
                }

                $this->collLogOtentikasis = $collLogOtentikasis;
                $this->collLogOtentikasisPartial = false;
            }
        }

        return $this->collLogOtentikasis;
    }

    /**
     * Sets a collection of LogOtentikasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $logOtentikasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pengguna The current object (for fluent API support)
     */
    public function setLogOtentikasis(PropelCollection $logOtentikasis, PropelPDO $con = null)
    {
        $logOtentikasisToDelete = $this->getLogOtentikasis(new Criteria(), $con)->diff($logOtentikasis);

        $this->logOtentikasisScheduledForDeletion = unserialize(serialize($logOtentikasisToDelete));

        foreach ($logOtentikasisToDelete as $logOtentikasiRemoved) {
            $logOtentikasiRemoved->setPengguna(null);
        }

        $this->collLogOtentikasis = null;
        foreach ($logOtentikasis as $logOtentikasi) {
            $this->addLogOtentikasi($logOtentikasi);
        }

        $this->collLogOtentikasis = $logOtentikasis;
        $this->collLogOtentikasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related LogOtentikasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related LogOtentikasi objects.
     * @throws PropelException
     */
    public function countLogOtentikasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLogOtentikasisPartial && !$this->isNew();
        if (null === $this->collLogOtentikasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLogOtentikasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getLogOtentikasis());
            }
            $query = LogOtentikasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPengguna($this)
                ->count($con);
        }

        return count($this->collLogOtentikasis);
    }

    /**
     * Method called to associate a LogOtentikasi object to this object
     * through the LogOtentikasi foreign key attribute.
     *
     * @param    LogOtentikasi $l LogOtentikasi
     * @return Pengguna The current object (for fluent API support)
     */
    public function addLogOtentikasi(LogOtentikasi $l)
    {
        if ($this->collLogOtentikasis === null) {
            $this->initLogOtentikasis();
            $this->collLogOtentikasisPartial = true;
        }
        if (!in_array($l, $this->collLogOtentikasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLogOtentikasi($l);
        }

        return $this;
    }

    /**
     * @param	LogOtentikasi $logOtentikasi The logOtentikasi object to add.
     */
    protected function doAddLogOtentikasi($logOtentikasi)
    {
        $this->collLogOtentikasis[]= $logOtentikasi;
        $logOtentikasi->setPengguna($this);
    }

    /**
     * @param	LogOtentikasi $logOtentikasi The logOtentikasi object to remove.
     * @return Pengguna The current object (for fluent API support)
     */
    public function removeLogOtentikasi($logOtentikasi)
    {
        if ($this->getLogOtentikasis()->contains($logOtentikasi)) {
            $this->collLogOtentikasis->remove($this->collLogOtentikasis->search($logOtentikasi));
            if (null === $this->logOtentikasisScheduledForDeletion) {
                $this->logOtentikasisScheduledForDeletion = clone $this->collLogOtentikasis;
                $this->logOtentikasisScheduledForDeletion->clear();
            }
            $this->logOtentikasisScheduledForDeletion[]= clone $logOtentikasi;
            $logOtentikasi->setPengguna(null);
        }

        return $this;
    }

    /**
     * Clears out the collRolePenggunas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pengguna The current object (for fluent API support)
     * @see        addRolePenggunas()
     */
    public function clearRolePenggunas()
    {
        $this->collRolePenggunas = null; // important to set this to null since that means it is uninitialized
        $this->collRolePenggunasPartial = null;

        return $this;
    }

    /**
     * reset is the collRolePenggunas collection loaded partially
     *
     * @return void
     */
    public function resetPartialRolePenggunas($v = true)
    {
        $this->collRolePenggunasPartial = $v;
    }

    /**
     * Initializes the collRolePenggunas collection.
     *
     * By default this just sets the collRolePenggunas collection to an empty array (like clearcollRolePenggunas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRolePenggunas($overrideExisting = true)
    {
        if (null !== $this->collRolePenggunas && !$overrideExisting) {
            return;
        }
        $this->collRolePenggunas = new PropelObjectCollection();
        $this->collRolePenggunas->setModel('RolePengguna');
    }

    /**
     * Gets an array of RolePengguna objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pengguna is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RolePengguna[] List of RolePengguna objects
     * @throws PropelException
     */
    public function getRolePenggunas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRolePenggunasPartial && !$this->isNew();
        if (null === $this->collRolePenggunas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRolePenggunas) {
                // return empty collection
                $this->initRolePenggunas();
            } else {
                $collRolePenggunas = RolePenggunaQuery::create(null, $criteria)
                    ->filterByPengguna($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRolePenggunasPartial && count($collRolePenggunas)) {
                      $this->initRolePenggunas(false);

                      foreach($collRolePenggunas as $obj) {
                        if (false == $this->collRolePenggunas->contains($obj)) {
                          $this->collRolePenggunas->append($obj);
                        }
                      }

                      $this->collRolePenggunasPartial = true;
                    }

                    $collRolePenggunas->getInternalIterator()->rewind();
                    return $collRolePenggunas;
                }

                if($partial && $this->collRolePenggunas) {
                    foreach($this->collRolePenggunas as $obj) {
                        if($obj->isNew()) {
                            $collRolePenggunas[] = $obj;
                        }
                    }
                }

                $this->collRolePenggunas = $collRolePenggunas;
                $this->collRolePenggunasPartial = false;
            }
        }

        return $this->collRolePenggunas;
    }

    /**
     * Sets a collection of RolePengguna objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rolePenggunas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pengguna The current object (for fluent API support)
     */
    public function setRolePenggunas(PropelCollection $rolePenggunas, PropelPDO $con = null)
    {
        $rolePenggunasToDelete = $this->getRolePenggunas(new Criteria(), $con)->diff($rolePenggunas);

        $this->rolePenggunasScheduledForDeletion = unserialize(serialize($rolePenggunasToDelete));

        foreach ($rolePenggunasToDelete as $rolePenggunaRemoved) {
            $rolePenggunaRemoved->setPengguna(null);
        }

        $this->collRolePenggunas = null;
        foreach ($rolePenggunas as $rolePengguna) {
            $this->addRolePengguna($rolePengguna);
        }

        $this->collRolePenggunas = $rolePenggunas;
        $this->collRolePenggunasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RolePengguna objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RolePengguna objects.
     * @throws PropelException
     */
    public function countRolePenggunas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRolePenggunasPartial && !$this->isNew();
        if (null === $this->collRolePenggunas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRolePenggunas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRolePenggunas());
            }
            $query = RolePenggunaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPengguna($this)
                ->count($con);
        }

        return count($this->collRolePenggunas);
    }

    /**
     * Method called to associate a RolePengguna object to this object
     * through the RolePengguna foreign key attribute.
     *
     * @param    RolePengguna $l RolePengguna
     * @return Pengguna The current object (for fluent API support)
     */
    public function addRolePengguna(RolePengguna $l)
    {
        if ($this->collRolePenggunas === null) {
            $this->initRolePenggunas();
            $this->collRolePenggunasPartial = true;
        }
        if (!in_array($l, $this->collRolePenggunas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRolePengguna($l);
        }

        return $this;
    }

    /**
     * @param	RolePengguna $rolePengguna The rolePengguna object to add.
     */
    protected function doAddRolePengguna($rolePengguna)
    {
        $this->collRolePenggunas[]= $rolePengguna;
        $rolePengguna->setPengguna($this);
    }

    /**
     * @param	RolePengguna $rolePengguna The rolePengguna object to remove.
     * @return Pengguna The current object (for fluent API support)
     */
    public function removeRolePengguna($rolePengguna)
    {
        if ($this->getRolePenggunas()->contains($rolePengguna)) {
            $this->collRolePenggunas->remove($this->collRolePenggunas->search($rolePengguna));
            if (null === $this->rolePenggunasScheduledForDeletion) {
                $this->rolePenggunasScheduledForDeletion = clone $this->collRolePenggunas;
                $this->rolePenggunasScheduledForDeletion->clear();
            }
            $this->rolePenggunasScheduledForDeletion[]= clone $rolePengguna;
            $rolePengguna->setPengguna(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pengguna is new, it will return
     * an empty collection; or if this Pengguna has previously
     * been saved, it will retrieve related RolePenggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pengguna.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RolePengguna[] List of RolePengguna objects
     */
    public function getRolePenggunasJoinPeran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RolePenggunaQuery::create(null, $criteria);
        $query->joinWith('Peran', $join_behavior);

        return $this->getRolePenggunas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pengguna is new, it will return
     * an empty collection; or if this Pengguna has previously
     * been saved, it will retrieve related RolePenggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pengguna.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RolePengguna[] List of RolePengguna objects
     */
    public function getRolePenggunasJoinLembSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RolePenggunaQuery::create(null, $criteria);
        $query->joinWith('LembSertifikasi', $join_behavior);

        return $this->getRolePenggunas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pengguna is new, it will return
     * an empty collection; or if this Pengguna has previously
     * been saved, it will retrieve related RolePenggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pengguna.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RolePengguna[] List of RolePengguna objects
     */
    public function getRolePenggunasJoinLembagaAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RolePenggunaQuery::create(null, $criteria);
        $query->joinWith('LembagaAkreditasi', $join_behavior);

        return $this->getRolePenggunas($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->pengguna_id = null;
        $this->sekolah_id = null;
        $this->lembaga_id = null;
        $this->yayasan_id = null;
        $this->la_id = null;
        $this->dudi_id = null;
        $this->kode_lemb_sert = null;
        $this->peserta_didik_id = null;
        $this->username = null;
        $this->a_bot = null;
        $this->nama = null;
        $this->tempat_lahir = null;
        $this->tgl_lahir = null;
        $this->jenis_kelamin = null;
        $this->nip_nim = null;
        $this->jabatan_lembaga = null;
        $this->alamat = null;
        $this->kode_wilayah = null;
        $this->no_telepon = null;
        $this->no_hp = null;
        $this->approval_pengguna = null;
        $this->aktif = null;
        $this->password = null;
        $this->password_lama = null;
        $this->tgl_ganti_pwd = null;
        $this->id_sdm_pengguna = null;
        $this->id_pd_pengguna = null;
        $this->token_reg = null;
        $this->jabatan = null;
        $this->ptk_id = null;
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
            if ($this->collLogOtentikasis) {
                foreach ($this->collLogOtentikasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRolePenggunas) {
                foreach ($this->collRolePenggunas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aLembagaAkreditasi instanceof Persistent) {
              $this->aLembagaAkreditasi->clearAllReferences($deep);
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }
            if ($this->aLembSertifikasi instanceof Persistent) {
              $this->aLembSertifikasi->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collLogOtentikasis instanceof PropelCollection) {
            $this->collLogOtentikasis->clearIterator();
        }
        $this->collLogOtentikasis = null;
        if ($this->collRolePenggunas instanceof PropelCollection) {
            $this->collRolePenggunas->clearIterator();
        }
        $this->collRolePenggunas = null;
        $this->aLembagaAkreditasi = null;
        $this->aMstWilayah = null;
        $this->aLembSertifikasi = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PenggunaPeer::DEFAULT_STRING_FORMAT);
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
