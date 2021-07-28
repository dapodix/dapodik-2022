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
use DataDikdas\Model\LembSertifikasiPeer;
use DataDikdas\Model\LembSertifikasiQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\PenggunaQuery;
use DataDikdas\Model\RolePengguna;
use DataDikdas\Model\RolePenggunaQuery;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\RwySertifikasiQuery;
use DataDikdas\Model\SertifikasiPd;
use DataDikdas\Model\SertifikasiPdQuery;

/**
 * Base class that represents a row from the 'ref.lemb_sertifikasi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseLembSertifikasi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\LembSertifikasiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        LembSertifikasiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the kode_lemb_sert field.
     * @var        string
     */
    protected $kode_lemb_sert;

    /**
     * The value for the nm_lemb_sert field.
     * @var        string
     */
    protected $nm_lemb_sert;

    /**
     * The value for the tmt_lemb_sert field.
     * @var        string
     */
    protected $tmt_lemb_sert;

    /**
     * The value for the ket_lemb_sert field.
     * @var        string
     */
    protected $ket_lemb_sert;

    /**
     * The value for the alamat_jalan field.
     * @var        string
     */
    protected $alamat_jalan;

    /**
     * The value for the rt field.
     * @var        string
     */
    protected $rt;

    /**
     * The value for the rw field.
     * @var        string
     */
    protected $rw;

    /**
     * The value for the nama_dusun field.
     * @var        string
     */
    protected $nama_dusun;

    /**
     * The value for the desa_kelurahan field.
     * @var        string
     */
    protected $desa_kelurahan;

    /**
     * The value for the kode_wilayah field.
     * @var        string
     */
    protected $kode_wilayah;

    /**
     * The value for the kode_pos field.
     * @var        string
     */
    protected $kode_pos;

    /**
     * The value for the lintang field.
     * @var        string
     */
    protected $lintang;

    /**
     * The value for the bujur field.
     * @var        string
     */
    protected $bujur;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the nomor_telepon field.
     * @var        string
     */
    protected $nomor_telepon;

    /**
     * The value for the nomor_fax field.
     * @var        string
     */
    protected $nomor_fax;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the website field.
     * @var        string
     */
    protected $website;

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
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        PropelObjectCollection|Pengguna[] Collection to store aggregation of Pengguna objects.
     */
    protected $collPenggunas;
    protected $collPenggunasPartial;

    /**
     * @var        PropelObjectCollection|RolePengguna[] Collection to store aggregation of RolePengguna objects.
     */
    protected $collRolePenggunas;
    protected $collRolePenggunasPartial;

    /**
     * @var        PropelObjectCollection|RwySertifikasi[] Collection to store aggregation of RwySertifikasi objects.
     */
    protected $collRwySertifikasis;
    protected $collRwySertifikasisPartial;

    /**
     * @var        PropelObjectCollection|SertifikasiPd[] Collection to store aggregation of SertifikasiPd objects.
     */
    protected $collSertifikasiPds;
    protected $collSertifikasiPdsPartial;

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
    protected $penggunasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rolePenggunasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwySertifikasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sertifikasiPdsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->create_date = '2020-04-16 09:40:03';
        $this->last_update = '2020-04-16 09:40:03';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseLembSertifikasi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [nm_lemb_sert] column value.
     * 
     * @return string
     */
    public function getNmLembSert()
    {
        return $this->nm_lemb_sert;
    }

    /**
     * Get the [optionally formatted] temporal [tmt_lemb_sert] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtLembSert($format = '%Y-%m-%d')
    {
        if ($this->tmt_lemb_sert === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_lemb_sert);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_lemb_sert, true), $x);
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
     * Get the [ket_lemb_sert] column value.
     * 
     * @return string
     */
    public function getKetLembSert()
    {
        return $this->ket_lemb_sert;
    }

    /**
     * Get the [alamat_jalan] column value.
     * 
     * @return string
     */
    public function getAlamatJalan()
    {
        return $this->alamat_jalan;
    }

    /**
     * Get the [rt] column value.
     * 
     * @return string
     */
    public function getRt()
    {
        return $this->rt;
    }

    /**
     * Get the [rw] column value.
     * 
     * @return string
     */
    public function getRw()
    {
        return $this->rw;
    }

    /**
     * Get the [nama_dusun] column value.
     * 
     * @return string
     */
    public function getNamaDusun()
    {
        return $this->nama_dusun;
    }

    /**
     * Get the [desa_kelurahan] column value.
     * 
     * @return string
     */
    public function getDesaKelurahan()
    {
        return $this->desa_kelurahan;
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
     * Get the [kode_pos] column value.
     * 
     * @return string
     */
    public function getKodePos()
    {
        return $this->kode_pos;
    }

    /**
     * Get the [lintang] column value.
     * 
     * @return string
     */
    public function getLintang()
    {
        return $this->lintang;
    }

    /**
     * Get the [bujur] column value.
     * 
     * @return string
     */
    public function getBujur()
    {
        return $this->bujur;
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
     * Get the [nomor_telepon] column value.
     * 
     * @return string
     */
    public function getNomorTelepon()
    {
        return $this->nomor_telepon;
    }

    /**
     * Get the [nomor_fax] column value.
     * 
     * @return string
     */
    public function getNomorFax()
    {
        return $this->nomor_fax;
    }

    /**
     * Get the [email] column value.
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [website] column value.
     * 
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
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
     * Set the value of [kode_lemb_sert] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setKodeLembSert($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_lemb_sert !== $v) {
            $this->kode_lemb_sert = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::KODE_LEMB_SERT;
        }


        return $this;
    } // setKodeLembSert()

    /**
     * Set the value of [nm_lemb_sert] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setNmLembSert($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_lemb_sert !== $v) {
            $this->nm_lemb_sert = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::NM_LEMB_SERT;
        }


        return $this;
    } // setNmLembSert()

    /**
     * Sets the value of [tmt_lemb_sert] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setTmtLembSert($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_lemb_sert !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_lemb_sert !== null && $tmpDt = new DateTime($this->tmt_lemb_sert)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_lemb_sert = $newDateAsString;
                $this->modifiedColumns[] = LembSertifikasiPeer::TMT_LEMB_SERT;
            }
        } // if either are not null


        return $this;
    } // setTmtLembSert()

    /**
     * Set the value of [ket_lemb_sert] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setKetLembSert($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_lemb_sert !== $v) {
            $this->ket_lemb_sert = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::KET_LEMB_SERT;
        }


        return $this;
    } // setKetLembSert()

    /**
     * Set the value of [alamat_jalan] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::ALAMAT_JALAN;
        }


        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::RT;
        }


        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::RW;
        }


        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::NAMA_DUSUN;
        }


        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::DESA_KELURAHAN;
        }


        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::KODE_WILAYAH;
        }

        if ($this->aMstWilayah !== null && $this->aMstWilayah->getKodeWilayah() !== $v) {
            $this->aMstWilayah = null;
        }


        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [kode_pos] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::KODE_POS;
        }


        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::LINTANG;
        }


        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::BUJUR;
        }


        return $this;
    } // setBujur()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [nomor_telepon] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setNomorTelepon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_telepon !== $v) {
            $this->nomor_telepon = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::NOMOR_TELEPON;
        }


        return $this;
    } // setNomorTelepon()

    /**
     * Set the value of [nomor_fax] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setNomorFax($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_fax !== $v) {
            $this->nomor_fax = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::NOMOR_FAX;
        }


        return $this;
    } // setNomorFax()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [website] column.
     * 
     * @param string $v new value
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[] = LembSertifikasiPeer::WEBSITE;
        }


        return $this;
    } // setWebsite()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return LembSertifikasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = LembSertifikasiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return LembSertifikasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = LembSertifikasiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = LembSertifikasiPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return LembSertifikasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = LembSertifikasiPeer::LAST_SYNC;
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

            $this->kode_lemb_sert = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nm_lemb_sert = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->tmt_lemb_sert = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->ket_lemb_sert = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->alamat_jalan = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->rt = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->rw = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->nama_dusun = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->desa_kelurahan = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->kode_wilayah = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->kode_pos = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->lintang = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->bujur = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->nama = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->nomor_telepon = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->nomor_fax = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->email = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->website = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->create_date = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->last_update = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->expired_date = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->last_sync = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 22; // 22 = LembSertifikasiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating LembSertifikasi object", $e);
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
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = LembSertifikasiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMstWilayah = null;
            $this->collPenggunas = null;

            $this->collRolePenggunas = null;

            $this->collRwySertifikasis = null;

            $this->collSertifikasiPds = null;

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
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = LembSertifikasiQuery::create()
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
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                LembSertifikasiPeer::addInstanceToPool($this);
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

            if ($this->aMstWilayah !== null) {
                if ($this->aMstWilayah->isModified() || $this->aMstWilayah->isNew()) {
                    $affectedRows += $this->aMstWilayah->save($con);
                }
                $this->setMstWilayah($this->aMstWilayah);
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

            if ($this->penggunasScheduledForDeletion !== null) {
                if (!$this->penggunasScheduledForDeletion->isEmpty()) {
                    foreach ($this->penggunasScheduledForDeletion as $pengguna) {
                        // need to save related object because we set the relation to null
                        $pengguna->save($con);
                    }
                    $this->penggunasScheduledForDeletion = null;
                }
            }

            if ($this->collPenggunas !== null) {
                foreach ($this->collPenggunas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rolePenggunasScheduledForDeletion !== null) {
                if (!$this->rolePenggunasScheduledForDeletion->isEmpty()) {
                    foreach ($this->rolePenggunasScheduledForDeletion as $rolePengguna) {
                        // need to save related object because we set the relation to null
                        $rolePengguna->save($con);
                    }
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

            if ($this->rwySertifikasisScheduledForDeletion !== null) {
                if (!$this->rwySertifikasisScheduledForDeletion->isEmpty()) {
                    RwySertifikasiQuery::create()
                        ->filterByPrimaryKeys($this->rwySertifikasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwySertifikasisScheduledForDeletion = null;
                }
            }

            if ($this->collRwySertifikasis !== null) {
                foreach ($this->collRwySertifikasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sertifikasiPdsScheduledForDeletion !== null) {
                if (!$this->sertifikasiPdsScheduledForDeletion->isEmpty()) {
                    SertifikasiPdQuery::create()
                        ->filterByPrimaryKeys($this->sertifikasiPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sertifikasiPdsScheduledForDeletion = null;
                }
            }

            if ($this->collSertifikasiPds !== null) {
                foreach ($this->collSertifikasiPds as $referrerFK) {
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
        if ($this->isColumnModified(LembSertifikasiPeer::KODE_LEMB_SERT)) {
            $modifiedColumns[':p' . $index++]  = '"kode_lemb_sert"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::NM_LEMB_SERT)) {
            $modifiedColumns[':p' . $index++]  = '"nm_lemb_sert"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::TMT_LEMB_SERT)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_lemb_sert"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::KET_LEMB_SERT)) {
            $modifiedColumns[':p' . $index++]  = '"ket_lemb_sert"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::ALAMAT_JALAN)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_jalan"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::RT)) {
            $modifiedColumns[':p' . $index++]  = '"rt"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::RW)) {
            $modifiedColumns[':p' . $index++]  = '"rw"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::NAMA_DUSUN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dusun"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::DESA_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"desa_kelurahan"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::KODE_POS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_pos"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::LINTANG)) {
            $modifiedColumns[':p' . $index++]  = '"lintang"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::BUJUR)) {
            $modifiedColumns[':p' . $index++]  = '"bujur"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::NOMOR_TELEPON)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_telepon"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::NOMOR_FAX)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_fax"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"email"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '"website"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(LembSertifikasiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."lemb_sertifikasi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"kode_lemb_sert"':						
                        $stmt->bindValue($identifier, $this->kode_lemb_sert, PDO::PARAM_STR);
                        break;
                    case '"nm_lemb_sert"':						
                        $stmt->bindValue($identifier, $this->nm_lemb_sert, PDO::PARAM_STR);
                        break;
                    case '"tmt_lemb_sert"':						
                        $stmt->bindValue($identifier, $this->tmt_lemb_sert, PDO::PARAM_STR);
                        break;
                    case '"ket_lemb_sert"':						
                        $stmt->bindValue($identifier, $this->ket_lemb_sert, PDO::PARAM_STR);
                        break;
                    case '"alamat_jalan"':						
                        $stmt->bindValue($identifier, $this->alamat_jalan, PDO::PARAM_STR);
                        break;
                    case '"rt"':						
                        $stmt->bindValue($identifier, $this->rt, PDO::PARAM_STR);
                        break;
                    case '"rw"':						
                        $stmt->bindValue($identifier, $this->rw, PDO::PARAM_STR);
                        break;
                    case '"nama_dusun"':						
                        $stmt->bindValue($identifier, $this->nama_dusun, PDO::PARAM_STR);
                        break;
                    case '"desa_kelurahan"':						
                        $stmt->bindValue($identifier, $this->desa_kelurahan, PDO::PARAM_STR);
                        break;
                    case '"kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->kode_wilayah, PDO::PARAM_STR);
                        break;
                    case '"kode_pos"':						
                        $stmt->bindValue($identifier, $this->kode_pos, PDO::PARAM_STR);
                        break;
                    case '"lintang"':						
                        $stmt->bindValue($identifier, $this->lintang, PDO::PARAM_STR);
                        break;
                    case '"bujur"':						
                        $stmt->bindValue($identifier, $this->bujur, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"nomor_telepon"':						
                        $stmt->bindValue($identifier, $this->nomor_telepon, PDO::PARAM_STR);
                        break;
                    case '"nomor_fax"':						
                        $stmt->bindValue($identifier, $this->nomor_fax, PDO::PARAM_STR);
                        break;
                    case '"email"':						
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '"website"':						
                        $stmt->bindValue($identifier, $this->website, PDO::PARAM_STR);
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

            if ($this->aMstWilayah !== null) {
                if (!$this->aMstWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayah->getValidationFailures());
                }
            }


            if (($retval = LembSertifikasiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPenggunas !== null) {
                    foreach ($this->collPenggunas as $referrerFK) {
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

                if ($this->collRwySertifikasis !== null) {
                    foreach ($this->collRwySertifikasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSertifikasiPds !== null) {
                    foreach ($this->collSertifikasiPds as $referrerFK) {
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
        $pos = LembSertifikasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getKodeLembSert();
                break;
            case 1:
                return $this->getNmLembSert();
                break;
            case 2:
                return $this->getTmtLembSert();
                break;
            case 3:
                return $this->getKetLembSert();
                break;
            case 4:
                return $this->getAlamatJalan();
                break;
            case 5:
                return $this->getRt();
                break;
            case 6:
                return $this->getRw();
                break;
            case 7:
                return $this->getNamaDusun();
                break;
            case 8:
                return $this->getDesaKelurahan();
                break;
            case 9:
                return $this->getKodeWilayah();
                break;
            case 10:
                return $this->getKodePos();
                break;
            case 11:
                return $this->getLintang();
                break;
            case 12:
                return $this->getBujur();
                break;
            case 13:
                return $this->getNama();
                break;
            case 14:
                return $this->getNomorTelepon();
                break;
            case 15:
                return $this->getNomorFax();
                break;
            case 16:
                return $this->getEmail();
                break;
            case 17:
                return $this->getWebsite();
                break;
            case 18:
                return $this->getCreateDate();
                break;
            case 19:
                return $this->getLastUpdate();
                break;
            case 20:
                return $this->getExpiredDate();
                break;
            case 21:
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
        if (isset($alreadyDumpedObjects['LembSertifikasi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['LembSertifikasi'][$this->getPrimaryKey()] = true;
        $keys = LembSertifikasiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getKodeLembSert(),
            $keys[1] => $this->getNmLembSert(),
            $keys[2] => $this->getTmtLembSert(),
            $keys[3] => $this->getKetLembSert(),
            $keys[4] => $this->getAlamatJalan(),
            $keys[5] => $this->getRt(),
            $keys[6] => $this->getRw(),
            $keys[7] => $this->getNamaDusun(),
            $keys[8] => $this->getDesaKelurahan(),
            $keys[9] => $this->getKodeWilayah(),
            $keys[10] => $this->getKodePos(),
            $keys[11] => $this->getLintang(),
            $keys[12] => $this->getBujur(),
            $keys[13] => $this->getNama(),
            $keys[14] => $this->getNomorTelepon(),
            $keys[15] => $this->getNomorFax(),
            $keys[16] => $this->getEmail(),
            $keys[17] => $this->getWebsite(),
            $keys[18] => $this->getCreateDate(),
            $keys[19] => $this->getLastUpdate(),
            $keys[20] => $this->getExpiredDate(),
            $keys[21] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPenggunas) {
                $result['Penggunas'] = $this->collPenggunas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRolePenggunas) {
                $result['RolePenggunas'] = $this->collRolePenggunas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwySertifikasis) {
                $result['RwySertifikasis'] = $this->collRwySertifikasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSertifikasiPds) {
                $result['SertifikasiPds'] = $this->collSertifikasiPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = LembSertifikasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setKodeLembSert($value);
                break;
            case 1:
                $this->setNmLembSert($value);
                break;
            case 2:
                $this->setTmtLembSert($value);
                break;
            case 3:
                $this->setKetLembSert($value);
                break;
            case 4:
                $this->setAlamatJalan($value);
                break;
            case 5:
                $this->setRt($value);
                break;
            case 6:
                $this->setRw($value);
                break;
            case 7:
                $this->setNamaDusun($value);
                break;
            case 8:
                $this->setDesaKelurahan($value);
                break;
            case 9:
                $this->setKodeWilayah($value);
                break;
            case 10:
                $this->setKodePos($value);
                break;
            case 11:
                $this->setLintang($value);
                break;
            case 12:
                $this->setBujur($value);
                break;
            case 13:
                $this->setNama($value);
                break;
            case 14:
                $this->setNomorTelepon($value);
                break;
            case 15:
                $this->setNomorFax($value);
                break;
            case 16:
                $this->setEmail($value);
                break;
            case 17:
                $this->setWebsite($value);
                break;
            case 18:
                $this->setCreateDate($value);
                break;
            case 19:
                $this->setLastUpdate($value);
                break;
            case 20:
                $this->setExpiredDate($value);
                break;
            case 21:
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
        $keys = LembSertifikasiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setKodeLembSert($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNmLembSert($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTmtLembSert($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKetLembSert($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAlamatJalan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setRt($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setRw($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setNamaDusun($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDesaKelurahan($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKodeWilayah($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setKodePos($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLintang($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setBujur($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNama($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setNomorTelepon($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setNomorFax($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setEmail($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setWebsite($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCreateDate($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setLastUpdate($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setExpiredDate($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setLastSync($arr[$keys[21]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(LembSertifikasiPeer::DATABASE_NAME);

        if ($this->isColumnModified(LembSertifikasiPeer::KODE_LEMB_SERT)) $criteria->add(LembSertifikasiPeer::KODE_LEMB_SERT, $this->kode_lemb_sert);
        if ($this->isColumnModified(LembSertifikasiPeer::NM_LEMB_SERT)) $criteria->add(LembSertifikasiPeer::NM_LEMB_SERT, $this->nm_lemb_sert);
        if ($this->isColumnModified(LembSertifikasiPeer::TMT_LEMB_SERT)) $criteria->add(LembSertifikasiPeer::TMT_LEMB_SERT, $this->tmt_lemb_sert);
        if ($this->isColumnModified(LembSertifikasiPeer::KET_LEMB_SERT)) $criteria->add(LembSertifikasiPeer::KET_LEMB_SERT, $this->ket_lemb_sert);
        if ($this->isColumnModified(LembSertifikasiPeer::ALAMAT_JALAN)) $criteria->add(LembSertifikasiPeer::ALAMAT_JALAN, $this->alamat_jalan);
        if ($this->isColumnModified(LembSertifikasiPeer::RT)) $criteria->add(LembSertifikasiPeer::RT, $this->rt);
        if ($this->isColumnModified(LembSertifikasiPeer::RW)) $criteria->add(LembSertifikasiPeer::RW, $this->rw);
        if ($this->isColumnModified(LembSertifikasiPeer::NAMA_DUSUN)) $criteria->add(LembSertifikasiPeer::NAMA_DUSUN, $this->nama_dusun);
        if ($this->isColumnModified(LembSertifikasiPeer::DESA_KELURAHAN)) $criteria->add(LembSertifikasiPeer::DESA_KELURAHAN, $this->desa_kelurahan);
        if ($this->isColumnModified(LembSertifikasiPeer::KODE_WILAYAH)) $criteria->add(LembSertifikasiPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(LembSertifikasiPeer::KODE_POS)) $criteria->add(LembSertifikasiPeer::KODE_POS, $this->kode_pos);
        if ($this->isColumnModified(LembSertifikasiPeer::LINTANG)) $criteria->add(LembSertifikasiPeer::LINTANG, $this->lintang);
        if ($this->isColumnModified(LembSertifikasiPeer::BUJUR)) $criteria->add(LembSertifikasiPeer::BUJUR, $this->bujur);
        if ($this->isColumnModified(LembSertifikasiPeer::NAMA)) $criteria->add(LembSertifikasiPeer::NAMA, $this->nama);
        if ($this->isColumnModified(LembSertifikasiPeer::NOMOR_TELEPON)) $criteria->add(LembSertifikasiPeer::NOMOR_TELEPON, $this->nomor_telepon);
        if ($this->isColumnModified(LembSertifikasiPeer::NOMOR_FAX)) $criteria->add(LembSertifikasiPeer::NOMOR_FAX, $this->nomor_fax);
        if ($this->isColumnModified(LembSertifikasiPeer::EMAIL)) $criteria->add(LembSertifikasiPeer::EMAIL, $this->email);
        if ($this->isColumnModified(LembSertifikasiPeer::WEBSITE)) $criteria->add(LembSertifikasiPeer::WEBSITE, $this->website);
        if ($this->isColumnModified(LembSertifikasiPeer::CREATE_DATE)) $criteria->add(LembSertifikasiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(LembSertifikasiPeer::LAST_UPDATE)) $criteria->add(LembSertifikasiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(LembSertifikasiPeer::EXPIRED_DATE)) $criteria->add(LembSertifikasiPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(LembSertifikasiPeer::LAST_SYNC)) $criteria->add(LembSertifikasiPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(LembSertifikasiPeer::DATABASE_NAME);
        $criteria->add(LembSertifikasiPeer::KODE_LEMB_SERT, $this->kode_lemb_sert);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getKodeLembSert();
    }

    /**
     * Generic method to set the primary key (kode_lemb_sert column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setKodeLembSert($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getKodeLembSert();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of LembSertifikasi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNmLembSert($this->getNmLembSert());
        $copyObj->setTmtLembSert($this->getTmtLembSert());
        $copyObj->setKetLembSert($this->getKetLembSert());
        $copyObj->setAlamatJalan($this->getAlamatJalan());
        $copyObj->setRt($this->getRt());
        $copyObj->setRw($this->getRw());
        $copyObj->setNamaDusun($this->getNamaDusun());
        $copyObj->setDesaKelurahan($this->getDesaKelurahan());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setKodePos($this->getKodePos());
        $copyObj->setLintang($this->getLintang());
        $copyObj->setBujur($this->getBujur());
        $copyObj->setNama($this->getNama());
        $copyObj->setNomorTelepon($this->getNomorTelepon());
        $copyObj->setNomorFax($this->getNomorFax());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setWebsite($this->getWebsite());
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

            foreach ($this->getPenggunas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengguna($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRolePenggunas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRolePengguna($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwySertifikasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwySertifikasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSertifikasiPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSertifikasiPd($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setKodeLembSert(NULL); // this is a auto-increment column, so set to default value
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
     * @return LembSertifikasi Clone of current object.
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
     * @return LembSertifikasiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new LembSertifikasiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return LembSertifikasi The current object (for fluent API support)
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
            $v->addLembSertifikasi($this);
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
                $this->aMstWilayah->addLembSertifikasis($this);
             */
        }

        return $this->aMstWilayah;
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
        if ('Pengguna' == $relationName) {
            $this->initPenggunas();
        }
        if ('RolePengguna' == $relationName) {
            $this->initRolePenggunas();
        }
        if ('RwySertifikasi' == $relationName) {
            $this->initRwySertifikasis();
        }
        if ('SertifikasiPd' == $relationName) {
            $this->initSertifikasiPds();
        }
    }

    /**
     * Clears out the collPenggunas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return LembSertifikasi The current object (for fluent API support)
     * @see        addPenggunas()
     */
    public function clearPenggunas()
    {
        $this->collPenggunas = null; // important to set this to null since that means it is uninitialized
        $this->collPenggunasPartial = null;

        return $this;
    }

    /**
     * reset is the collPenggunas collection loaded partially
     *
     * @return void
     */
    public function resetPartialPenggunas($v = true)
    {
        $this->collPenggunasPartial = $v;
    }

    /**
     * Initializes the collPenggunas collection.
     *
     * By default this just sets the collPenggunas collection to an empty array (like clearcollPenggunas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPenggunas($overrideExisting = true)
    {
        if (null !== $this->collPenggunas && !$overrideExisting) {
            return;
        }
        $this->collPenggunas = new PropelObjectCollection();
        $this->collPenggunas->setModel('Pengguna');
    }

    /**
     * Gets an array of Pengguna objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this LembSertifikasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Pengguna[] List of Pengguna objects
     * @throws PropelException
     */
    public function getPenggunas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPenggunasPartial && !$this->isNew();
        if (null === $this->collPenggunas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPenggunas) {
                // return empty collection
                $this->initPenggunas();
            } else {
                $collPenggunas = PenggunaQuery::create(null, $criteria)
                    ->filterByLembSertifikasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPenggunasPartial && count($collPenggunas)) {
                      $this->initPenggunas(false);

                      foreach($collPenggunas as $obj) {
                        if (false == $this->collPenggunas->contains($obj)) {
                          $this->collPenggunas->append($obj);
                        }
                      }

                      $this->collPenggunasPartial = true;
                    }

                    $collPenggunas->getInternalIterator()->rewind();
                    return $collPenggunas;
                }

                if($partial && $this->collPenggunas) {
                    foreach($this->collPenggunas as $obj) {
                        if($obj->isNew()) {
                            $collPenggunas[] = $obj;
                        }
                    }
                }

                $this->collPenggunas = $collPenggunas;
                $this->collPenggunasPartial = false;
            }
        }

        return $this->collPenggunas;
    }

    /**
     * Sets a collection of Pengguna objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $penggunas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setPenggunas(PropelCollection $penggunas, PropelPDO $con = null)
    {
        $penggunasToDelete = $this->getPenggunas(new Criteria(), $con)->diff($penggunas);

        $this->penggunasScheduledForDeletion = unserialize(serialize($penggunasToDelete));

        foreach ($penggunasToDelete as $penggunaRemoved) {
            $penggunaRemoved->setLembSertifikasi(null);
        }

        $this->collPenggunas = null;
        foreach ($penggunas as $pengguna) {
            $this->addPengguna($pengguna);
        }

        $this->collPenggunas = $penggunas;
        $this->collPenggunasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Pengguna objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Pengguna objects.
     * @throws PropelException
     */
    public function countPenggunas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPenggunasPartial && !$this->isNew();
        if (null === $this->collPenggunas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPenggunas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPenggunas());
            }
            $query = PenggunaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLembSertifikasi($this)
                ->count($con);
        }

        return count($this->collPenggunas);
    }

    /**
     * Method called to associate a Pengguna object to this object
     * through the Pengguna foreign key attribute.
     *
     * @param    Pengguna $l Pengguna
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function addPengguna(Pengguna $l)
    {
        if ($this->collPenggunas === null) {
            $this->initPenggunas();
            $this->collPenggunasPartial = true;
        }
        if (!in_array($l, $this->collPenggunas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPengguna($l);
        }

        return $this;
    }

    /**
     * @param	Pengguna $pengguna The pengguna object to add.
     */
    protected function doAddPengguna($pengguna)
    {
        $this->collPenggunas[]= $pengguna;
        $pengguna->setLembSertifikasi($this);
    }

    /**
     * @param	Pengguna $pengguna The pengguna object to remove.
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function removePengguna($pengguna)
    {
        if ($this->getPenggunas()->contains($pengguna)) {
            $this->collPenggunas->remove($this->collPenggunas->search($pengguna));
            if (null === $this->penggunasScheduledForDeletion) {
                $this->penggunasScheduledForDeletion = clone $this->collPenggunas;
                $this->penggunasScheduledForDeletion->clear();
            }
            $this->penggunasScheduledForDeletion[]= $pengguna;
            $pengguna->setLembSertifikasi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related Penggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pengguna[] List of Pengguna objects
     */
    public function getPenggunasJoinLembagaAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PenggunaQuery::create(null, $criteria);
        $query->joinWith('LembagaAkreditasi', $join_behavior);

        return $this->getPenggunas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related Penggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pengguna[] List of Pengguna objects
     */
    public function getPenggunasJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PenggunaQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPenggunas($query, $con);
    }

    /**
     * Clears out the collRolePenggunas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return LembSertifikasi The current object (for fluent API support)
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
     * If this LembSertifikasi is new, it will return
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
                    ->filterByLembSertifikasi($this)
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
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setRolePenggunas(PropelCollection $rolePenggunas, PropelPDO $con = null)
    {
        $rolePenggunasToDelete = $this->getRolePenggunas(new Criteria(), $con)->diff($rolePenggunas);

        $this->rolePenggunasScheduledForDeletion = unserialize(serialize($rolePenggunasToDelete));

        foreach ($rolePenggunasToDelete as $rolePenggunaRemoved) {
            $rolePenggunaRemoved->setLembSertifikasi(null);
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
                ->filterByLembSertifikasi($this)
                ->count($con);
        }

        return count($this->collRolePenggunas);
    }

    /**
     * Method called to associate a RolePengguna object to this object
     * through the RolePengguna foreign key attribute.
     *
     * @param    RolePengguna $l RolePengguna
     * @return LembSertifikasi The current object (for fluent API support)
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
        $rolePengguna->setLembSertifikasi($this);
    }

    /**
     * @param	RolePengguna $rolePengguna The rolePengguna object to remove.
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function removeRolePengguna($rolePengguna)
    {
        if ($this->getRolePenggunas()->contains($rolePengguna)) {
            $this->collRolePenggunas->remove($this->collRolePenggunas->search($rolePengguna));
            if (null === $this->rolePenggunasScheduledForDeletion) {
                $this->rolePenggunasScheduledForDeletion = clone $this->collRolePenggunas;
                $this->rolePenggunasScheduledForDeletion->clear();
            }
            $this->rolePenggunasScheduledForDeletion[]= $rolePengguna;
            $rolePengguna->setLembSertifikasi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related RolePenggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
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
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related RolePenggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RolePengguna[] List of RolePengguna objects
     */
    public function getRolePenggunasJoinPengguna($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RolePenggunaQuery::create(null, $criteria);
        $query->joinWith('Pengguna', $join_behavior);

        return $this->getRolePenggunas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related RolePenggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
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
     * Clears out the collRwySertifikasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return LembSertifikasi The current object (for fluent API support)
     * @see        addRwySertifikasis()
     */
    public function clearRwySertifikasis()
    {
        $this->collRwySertifikasis = null; // important to set this to null since that means it is uninitialized
        $this->collRwySertifikasisPartial = null;

        return $this;
    }

    /**
     * reset is the collRwySertifikasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwySertifikasis($v = true)
    {
        $this->collRwySertifikasisPartial = $v;
    }

    /**
     * Initializes the collRwySertifikasis collection.
     *
     * By default this just sets the collRwySertifikasis collection to an empty array (like clearcollRwySertifikasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwySertifikasis($overrideExisting = true)
    {
        if (null !== $this->collRwySertifikasis && !$overrideExisting) {
            return;
        }
        $this->collRwySertifikasis = new PropelObjectCollection();
        $this->collRwySertifikasis->setModel('RwySertifikasi');
    }

    /**
     * Gets an array of RwySertifikasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this LembSertifikasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     * @throws PropelException
     */
    public function getRwySertifikasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collRwySertifikasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwySertifikasis) {
                // return empty collection
                $this->initRwySertifikasis();
            } else {
                $collRwySertifikasis = RwySertifikasiQuery::create(null, $criteria)
                    ->filterByLembSertifikasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwySertifikasisPartial && count($collRwySertifikasis)) {
                      $this->initRwySertifikasis(false);

                      foreach($collRwySertifikasis as $obj) {
                        if (false == $this->collRwySertifikasis->contains($obj)) {
                          $this->collRwySertifikasis->append($obj);
                        }
                      }

                      $this->collRwySertifikasisPartial = true;
                    }

                    $collRwySertifikasis->getInternalIterator()->rewind();
                    return $collRwySertifikasis;
                }

                if($partial && $this->collRwySertifikasis) {
                    foreach($this->collRwySertifikasis as $obj) {
                        if($obj->isNew()) {
                            $collRwySertifikasis[] = $obj;
                        }
                    }
                }

                $this->collRwySertifikasis = $collRwySertifikasis;
                $this->collRwySertifikasisPartial = false;
            }
        }

        return $this->collRwySertifikasis;
    }

    /**
     * Sets a collection of RwySertifikasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwySertifikasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setRwySertifikasis(PropelCollection $rwySertifikasis, PropelPDO $con = null)
    {
        $rwySertifikasisToDelete = $this->getRwySertifikasis(new Criteria(), $con)->diff($rwySertifikasis);

        $this->rwySertifikasisScheduledForDeletion = unserialize(serialize($rwySertifikasisToDelete));

        foreach ($rwySertifikasisToDelete as $rwySertifikasiRemoved) {
            $rwySertifikasiRemoved->setLembSertifikasi(null);
        }

        $this->collRwySertifikasis = null;
        foreach ($rwySertifikasis as $rwySertifikasi) {
            $this->addRwySertifikasi($rwySertifikasi);
        }

        $this->collRwySertifikasis = $rwySertifikasis;
        $this->collRwySertifikasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwySertifikasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwySertifikasi objects.
     * @throws PropelException
     */
    public function countRwySertifikasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collRwySertifikasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwySertifikasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwySertifikasis());
            }
            $query = RwySertifikasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLembSertifikasi($this)
                ->count($con);
        }

        return count($this->collRwySertifikasis);
    }

    /**
     * Method called to associate a RwySertifikasi object to this object
     * through the RwySertifikasi foreign key attribute.
     *
     * @param    RwySertifikasi $l RwySertifikasi
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function addRwySertifikasi(RwySertifikasi $l)
    {
        if ($this->collRwySertifikasis === null) {
            $this->initRwySertifikasis();
            $this->collRwySertifikasisPartial = true;
        }
        if (!in_array($l, $this->collRwySertifikasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwySertifikasi($l);
        }

        return $this;
    }

    /**
     * @param	RwySertifikasi $rwySertifikasi The rwySertifikasi object to add.
     */
    protected function doAddRwySertifikasi($rwySertifikasi)
    {
        $this->collRwySertifikasis[]= $rwySertifikasi;
        $rwySertifikasi->setLembSertifikasi($this);
    }

    /**
     * @param	RwySertifikasi $rwySertifikasi The rwySertifikasi object to remove.
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function removeRwySertifikasi($rwySertifikasi)
    {
        if ($this->getRwySertifikasis()->contains($rwySertifikasi)) {
            $this->collRwySertifikasis->remove($this->collRwySertifikasis->search($rwySertifikasi));
            if (null === $this->rwySertifikasisScheduledForDeletion) {
                $this->rwySertifikasisScheduledForDeletion = clone $this->collRwySertifikasis;
                $this->rwySertifikasisScheduledForDeletion->clear();
            }
            $this->rwySertifikasisScheduledForDeletion[]= clone $rwySertifikasi;
            $rwySertifikasi->setLembSertifikasi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinJenisSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('JenisSertifikasi', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }

    /**
     * Clears out the collSertifikasiPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return LembSertifikasi The current object (for fluent API support)
     * @see        addSertifikasiPds()
     */
    public function clearSertifikasiPds()
    {
        $this->collSertifikasiPds = null; // important to set this to null since that means it is uninitialized
        $this->collSertifikasiPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collSertifikasiPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialSertifikasiPds($v = true)
    {
        $this->collSertifikasiPdsPartial = $v;
    }

    /**
     * Initializes the collSertifikasiPds collection.
     *
     * By default this just sets the collSertifikasiPds collection to an empty array (like clearcollSertifikasiPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSertifikasiPds($overrideExisting = true)
    {
        if (null !== $this->collSertifikasiPds && !$overrideExisting) {
            return;
        }
        $this->collSertifikasiPds = new PropelObjectCollection();
        $this->collSertifikasiPds->setModel('SertifikasiPd');
    }

    /**
     * Gets an array of SertifikasiPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this LembSertifikasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     * @throws PropelException
     */
    public function getSertifikasiPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSertifikasiPdsPartial && !$this->isNew();
        if (null === $this->collSertifikasiPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSertifikasiPds) {
                // return empty collection
                $this->initSertifikasiPds();
            } else {
                $collSertifikasiPds = SertifikasiPdQuery::create(null, $criteria)
                    ->filterByLembSertifikasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSertifikasiPdsPartial && count($collSertifikasiPds)) {
                      $this->initSertifikasiPds(false);

                      foreach($collSertifikasiPds as $obj) {
                        if (false == $this->collSertifikasiPds->contains($obj)) {
                          $this->collSertifikasiPds->append($obj);
                        }
                      }

                      $this->collSertifikasiPdsPartial = true;
                    }

                    $collSertifikasiPds->getInternalIterator()->rewind();
                    return $collSertifikasiPds;
                }

                if($partial && $this->collSertifikasiPds) {
                    foreach($this->collSertifikasiPds as $obj) {
                        if($obj->isNew()) {
                            $collSertifikasiPds[] = $obj;
                        }
                    }
                }

                $this->collSertifikasiPds = $collSertifikasiPds;
                $this->collSertifikasiPdsPartial = false;
            }
        }

        return $this->collSertifikasiPds;
    }

    /**
     * Sets a collection of SertifikasiPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sertifikasiPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function setSertifikasiPds(PropelCollection $sertifikasiPds, PropelPDO $con = null)
    {
        $sertifikasiPdsToDelete = $this->getSertifikasiPds(new Criteria(), $con)->diff($sertifikasiPds);

        $this->sertifikasiPdsScheduledForDeletion = unserialize(serialize($sertifikasiPdsToDelete));

        foreach ($sertifikasiPdsToDelete as $sertifikasiPdRemoved) {
            $sertifikasiPdRemoved->setLembSertifikasi(null);
        }

        $this->collSertifikasiPds = null;
        foreach ($sertifikasiPds as $sertifikasiPd) {
            $this->addSertifikasiPd($sertifikasiPd);
        }

        $this->collSertifikasiPds = $sertifikasiPds;
        $this->collSertifikasiPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SertifikasiPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SertifikasiPd objects.
     * @throws PropelException
     */
    public function countSertifikasiPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSertifikasiPdsPartial && !$this->isNew();
        if (null === $this->collSertifikasiPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSertifikasiPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSertifikasiPds());
            }
            $query = SertifikasiPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByLembSertifikasi($this)
                ->count($con);
        }

        return count($this->collSertifikasiPds);
    }

    /**
     * Method called to associate a SertifikasiPd object to this object
     * through the SertifikasiPd foreign key attribute.
     *
     * @param    SertifikasiPd $l SertifikasiPd
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function addSertifikasiPd(SertifikasiPd $l)
    {
        if ($this->collSertifikasiPds === null) {
            $this->initSertifikasiPds();
            $this->collSertifikasiPdsPartial = true;
        }
        if (!in_array($l, $this->collSertifikasiPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSertifikasiPd($l);
        }

        return $this;
    }

    /**
     * @param	SertifikasiPd $sertifikasiPd The sertifikasiPd object to add.
     */
    protected function doAddSertifikasiPd($sertifikasiPd)
    {
        $this->collSertifikasiPds[]= $sertifikasiPd;
        $sertifikasiPd->setLembSertifikasi($this);
    }

    /**
     * @param	SertifikasiPd $sertifikasiPd The sertifikasiPd object to remove.
     * @return LembSertifikasi The current object (for fluent API support)
     */
    public function removeSertifikasiPd($sertifikasiPd)
    {
        if ($this->getSertifikasiPds()->contains($sertifikasiPd)) {
            $this->collSertifikasiPds->remove($this->collSertifikasiPds->search($sertifikasiPd));
            if (null === $this->sertifikasiPdsScheduledForDeletion) {
                $this->sertifikasiPdsScheduledForDeletion = clone $this->collSertifikasiPds;
                $this->sertifikasiPdsScheduledForDeletion->clear();
            }
            $this->sertifikasiPdsScheduledForDeletion[]= clone $sertifikasiPd;
            $sertifikasiPd->setLembSertifikasi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinJenisSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('JenisSertifikasi', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this LembSertifikasi is new, it will return
     * an empty collection; or if this LembSertifikasi has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in LembSertifikasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->kode_lemb_sert = null;
        $this->nm_lemb_sert = null;
        $this->tmt_lemb_sert = null;
        $this->ket_lemb_sert = null;
        $this->alamat_jalan = null;
        $this->rt = null;
        $this->rw = null;
        $this->nama_dusun = null;
        $this->desa_kelurahan = null;
        $this->kode_wilayah = null;
        $this->kode_pos = null;
        $this->lintang = null;
        $this->bujur = null;
        $this->nama = null;
        $this->nomor_telepon = null;
        $this->nomor_fax = null;
        $this->email = null;
        $this->website = null;
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
            if ($this->collPenggunas) {
                foreach ($this->collPenggunas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRolePenggunas) {
                foreach ($this->collRolePenggunas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwySertifikasis) {
                foreach ($this->collRwySertifikasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSertifikasiPds) {
                foreach ($this->collSertifikasiPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPenggunas instanceof PropelCollection) {
            $this->collPenggunas->clearIterator();
        }
        $this->collPenggunas = null;
        if ($this->collRolePenggunas instanceof PropelCollection) {
            $this->collRolePenggunas->clearIterator();
        }
        $this->collRolePenggunas = null;
        if ($this->collRwySertifikasis instanceof PropelCollection) {
            $this->collRwySertifikasis->clearIterator();
        }
        $this->collRwySertifikasis = null;
        if ($this->collSertifikasiPds instanceof PropelCollection) {
            $this->collSertifikasiPds->clearIterator();
        }
        $this->collSertifikasiPds = null;
        $this->aMstWilayah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(LembSertifikasiPeer::DEFAULT_STRING_FORMAT);
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
