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
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\VldYayasan;
use DataDikdas\Model\VldYayasanQuery;
use DataDikdas\Model\Yayasan;
use DataDikdas\Model\YayasanPeer;
use DataDikdas\Model\YayasanQuery;

/**
 * Base class that represents a row from the 'yayasan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseYayasan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\YayasanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        YayasanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the yayasan_id field.
     * @var        string
     */
    protected $yayasan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

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
     * The value for the npyp field.
     * @var        string
     */
    protected $npyp;

    /**
     * The value for the nama_pimpinan_yayasan field.
     * @var        string
     */
    protected $nama_pimpinan_yayasan;

    /**
     * The value for the no_pendirian_yayasan field.
     * @var        string
     */
    protected $no_pendirian_yayasan;

    /**
     * The value for the tanggal_pendirian_yayasan field.
     * @var        string
     */
    protected $tanggal_pendirian_yayasan;

    /**
     * The value for the nomor_pengesahan_pn_ln field.
     * @var        string
     */
    protected $nomor_pengesahan_pn_ln;

    /**
     * The value for the nomor_sk_bn field.
     * @var        string
     */
    protected $nomor_sk_bn;

    /**
     * The value for the tanggal_sk_bn field.
     * @var        string
     */
    protected $tanggal_sk_bn;

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
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        PropelObjectCollection|Sekolah[] Collection to store aggregation of Sekolah objects.
     */
    protected $collSekolahs;
    protected $collSekolahsPartial;

    /**
     * @var        PropelObjectCollection|VldYayasan[] Collection to store aggregation of VldYayasan objects.
     */
    protected $collVldYayasans;
    protected $collVldYayasansPartial;

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
    protected $sekolahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldYayasansScheduledForDeletion = null;

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
     * Initializes internal state of BaseYayasan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
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
     * Get the [npyp] column value.
     * 
     * @return string
     */
    public function getNpyp()
    {
        return $this->npyp;
    }

    /**
     * Get the [nama_pimpinan_yayasan] column value.
     * 
     * @return string
     */
    public function getNamaPimpinanYayasan()
    {
        return $this->nama_pimpinan_yayasan;
    }

    /**
     * Get the [no_pendirian_yayasan] column value.
     * 
     * @return string
     */
    public function getNoPendirianYayasan()
    {
        return $this->no_pendirian_yayasan;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_pendirian_yayasan] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalPendirianYayasan($format = '%Y-%m-%d')
    {
        if ($this->tanggal_pendirian_yayasan === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_pendirian_yayasan);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_pendirian_yayasan, true), $x);
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
     * Get the [nomor_pengesahan_pn_ln] column value.
     * 
     * @return string
     */
    public function getNomorPengesahanPnLn()
    {
        return $this->nomor_pengesahan_pn_ln;
    }

    /**
     * Get the [nomor_sk_bn] column value.
     * 
     * @return string
     */
    public function getNomorSkBn()
    {
        return $this->nomor_sk_bn;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk_bn] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSkBn($format = '%Y-%m-%d')
    {
        if ($this->tanggal_sk_bn === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_sk_bn);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_sk_bn, true), $x);
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
     * Set the value of [yayasan_id] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setYayasanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->yayasan_id !== $v) {
            $this->yayasan_id = $v;
            $this->modifiedColumns[] = YayasanPeer::YAYASAN_ID;
        }


        return $this;
    } // setYayasanId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = YayasanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [alamat_jalan] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[] = YayasanPeer::ALAMAT_JALAN;
        }


        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[] = YayasanPeer::RT;
        }


        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[] = YayasanPeer::RW;
        }


        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[] = YayasanPeer::NAMA_DUSUN;
        }


        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[] = YayasanPeer::DESA_KELURAHAN;
        }


        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = YayasanPeer::KODE_WILAYAH;
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
     * @return Yayasan The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[] = YayasanPeer::KODE_POS;
        }


        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[] = YayasanPeer::LINTANG;
        }


        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[] = YayasanPeer::BUJUR;
        }


        return $this;
    } // setBujur()

    /**
     * Set the value of [nomor_telepon] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNomorTelepon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_telepon !== $v) {
            $this->nomor_telepon = $v;
            $this->modifiedColumns[] = YayasanPeer::NOMOR_TELEPON;
        }


        return $this;
    } // setNomorTelepon()

    /**
     * Set the value of [nomor_fax] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNomorFax($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_fax !== $v) {
            $this->nomor_fax = $v;
            $this->modifiedColumns[] = YayasanPeer::NOMOR_FAX;
        }


        return $this;
    } // setNomorFax()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = YayasanPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [website] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[] = YayasanPeer::WEBSITE;
        }


        return $this;
    } // setWebsite()

    /**
     * Set the value of [npyp] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNpyp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->npyp !== $v) {
            $this->npyp = $v;
            $this->modifiedColumns[] = YayasanPeer::NPYP;
        }


        return $this;
    } // setNpyp()

    /**
     * Set the value of [nama_pimpinan_yayasan] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNamaPimpinanYayasan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_pimpinan_yayasan !== $v) {
            $this->nama_pimpinan_yayasan = $v;
            $this->modifiedColumns[] = YayasanPeer::NAMA_PIMPINAN_YAYASAN;
        }


        return $this;
    } // setNamaPimpinanYayasan()

    /**
     * Set the value of [no_pendirian_yayasan] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNoPendirianYayasan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_pendirian_yayasan !== $v) {
            $this->no_pendirian_yayasan = $v;
            $this->modifiedColumns[] = YayasanPeer::NO_PENDIRIAN_YAYASAN;
        }


        return $this;
    } // setNoPendirianYayasan()

    /**
     * Sets the value of [tanggal_pendirian_yayasan] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Yayasan The current object (for fluent API support)
     */
    public function setTanggalPendirianYayasan($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_pendirian_yayasan !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_pendirian_yayasan !== null && $tmpDt = new DateTime($this->tanggal_pendirian_yayasan)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_pendirian_yayasan = $newDateAsString;
                $this->modifiedColumns[] = YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN;
            }
        } // if either are not null


        return $this;
    } // setTanggalPendirianYayasan()

    /**
     * Set the value of [nomor_pengesahan_pn_ln] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNomorPengesahanPnLn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_pengesahan_pn_ln !== $v) {
            $this->nomor_pengesahan_pn_ln = $v;
            $this->modifiedColumns[] = YayasanPeer::NOMOR_PENGESAHAN_PN_LN;
        }


        return $this;
    } // setNomorPengesahanPnLn()

    /**
     * Set the value of [nomor_sk_bn] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setNomorSkBn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_sk_bn !== $v) {
            $this->nomor_sk_bn = $v;
            $this->modifiedColumns[] = YayasanPeer::NOMOR_SK_BN;
        }


        return $this;
    } // setNomorSkBn()

    /**
     * Sets the value of [tanggal_sk_bn] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Yayasan The current object (for fluent API support)
     */
    public function setTanggalSkBn($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk_bn !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_sk_bn !== null && $tmpDt = new DateTime($this->tanggal_sk_bn)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_sk_bn = $newDateAsString;
                $this->modifiedColumns[] = YayasanPeer::TANGGAL_SK_BN;
            }
        } // if either are not null


        return $this;
    } // setTanggalSkBn()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Yayasan The current object (for fluent API support)
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
                $this->modifiedColumns[] = YayasanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Yayasan The current object (for fluent API support)
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
                $this->modifiedColumns[] = YayasanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = YayasanPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Yayasan The current object (for fluent API support)
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
                $this->modifiedColumns[] = YayasanPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Yayasan The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = YayasanPeer::UPDATER_ID;
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

            $this->yayasan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->alamat_jalan = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->rt = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->rw = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->nama_dusun = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->desa_kelurahan = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->kode_wilayah = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->kode_pos = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->lintang = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->bujur = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->nomor_telepon = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->nomor_fax = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->email = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->website = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->npyp = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->nama_pimpinan_yayasan = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->no_pendirian_yayasan = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->tanggal_pendirian_yayasan = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->nomor_pengesahan_pn_ln = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->nomor_sk_bn = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->tanggal_sk_bn = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
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
            return $startcol + 27; // 27 = YayasanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Yayasan object", $e);
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
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = YayasanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMstWilayah = null;
            $this->collSekolahs = null;

            $this->collVldYayasans = null;

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
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = YayasanQuery::create()
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
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                YayasanPeer::addInstanceToPool($this);
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

            if ($this->sekolahsScheduledForDeletion !== null) {
                if (!$this->sekolahsScheduledForDeletion->isEmpty()) {
                    foreach ($this->sekolahsScheduledForDeletion as $sekolah) {
                        // need to save related object because we set the relation to null
                        $sekolah->save($con);
                    }
                    $this->sekolahsScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahs !== null) {
                foreach ($this->collSekolahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldYayasansScheduledForDeletion !== null) {
                if (!$this->vldYayasansScheduledForDeletion->isEmpty()) {
                    VldYayasanQuery::create()
                        ->filterByPrimaryKeys($this->vldYayasansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldYayasansScheduledForDeletion = null;
                }
            }

            if ($this->collVldYayasans !== null) {
                foreach ($this->collVldYayasans as $referrerFK) {
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
        if ($this->isColumnModified(YayasanPeer::YAYASAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"yayasan_id"';
        }
        if ($this->isColumnModified(YayasanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(YayasanPeer::ALAMAT_JALAN)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_jalan"';
        }
        if ($this->isColumnModified(YayasanPeer::RT)) {
            $modifiedColumns[':p' . $index++]  = '"rt"';
        }
        if ($this->isColumnModified(YayasanPeer::RW)) {
            $modifiedColumns[':p' . $index++]  = '"rw"';
        }
        if ($this->isColumnModified(YayasanPeer::NAMA_DUSUN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dusun"';
        }
        if ($this->isColumnModified(YayasanPeer::DESA_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"desa_kelurahan"';
        }
        if ($this->isColumnModified(YayasanPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(YayasanPeer::KODE_POS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_pos"';
        }
        if ($this->isColumnModified(YayasanPeer::LINTANG)) {
            $modifiedColumns[':p' . $index++]  = '"lintang"';
        }
        if ($this->isColumnModified(YayasanPeer::BUJUR)) {
            $modifiedColumns[':p' . $index++]  = '"bujur"';
        }
        if ($this->isColumnModified(YayasanPeer::NOMOR_TELEPON)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_telepon"';
        }
        if ($this->isColumnModified(YayasanPeer::NOMOR_FAX)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_fax"';
        }
        if ($this->isColumnModified(YayasanPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"email"';
        }
        if ($this->isColumnModified(YayasanPeer::WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '"website"';
        }
        if ($this->isColumnModified(YayasanPeer::NPYP)) {
            $modifiedColumns[':p' . $index++]  = '"npyp"';
        }
        if ($this->isColumnModified(YayasanPeer::NAMA_PIMPINAN_YAYASAN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_pimpinan_yayasan"';
        }
        if ($this->isColumnModified(YayasanPeer::NO_PENDIRIAN_YAYASAN)) {
            $modifiedColumns[':p' . $index++]  = '"no_pendirian_yayasan"';
        }
        if ($this->isColumnModified(YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_pendirian_yayasan"';
        }
        if ($this->isColumnModified(YayasanPeer::NOMOR_PENGESAHAN_PN_LN)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_pengesahan_pn_ln"';
        }
        if ($this->isColumnModified(YayasanPeer::NOMOR_SK_BN)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_sk_bn"';
        }
        if ($this->isColumnModified(YayasanPeer::TANGGAL_SK_BN)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_sk_bn"';
        }
        if ($this->isColumnModified(YayasanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(YayasanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(YayasanPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(YayasanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(YayasanPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "yayasan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"yayasan_id"':						
                        $stmt->bindValue($identifier, $this->yayasan_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
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
                    case '"npyp"':						
                        $stmt->bindValue($identifier, $this->npyp, PDO::PARAM_STR);
                        break;
                    case '"nama_pimpinan_yayasan"':						
                        $stmt->bindValue($identifier, $this->nama_pimpinan_yayasan, PDO::PARAM_STR);
                        break;
                    case '"no_pendirian_yayasan"':						
                        $stmt->bindValue($identifier, $this->no_pendirian_yayasan, PDO::PARAM_STR);
                        break;
                    case '"tanggal_pendirian_yayasan"':						
                        $stmt->bindValue($identifier, $this->tanggal_pendirian_yayasan, PDO::PARAM_STR);
                        break;
                    case '"nomor_pengesahan_pn_ln"':						
                        $stmt->bindValue($identifier, $this->nomor_pengesahan_pn_ln, PDO::PARAM_STR);
                        break;
                    case '"nomor_sk_bn"':						
                        $stmt->bindValue($identifier, $this->nomor_sk_bn, PDO::PARAM_STR);
                        break;
                    case '"tanggal_sk_bn"':						
                        $stmt->bindValue($identifier, $this->tanggal_sk_bn, PDO::PARAM_STR);
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

            if ($this->aMstWilayah !== null) {
                if (!$this->aMstWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayah->getValidationFailures());
                }
            }


            if (($retval = YayasanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSekolahs !== null) {
                    foreach ($this->collSekolahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldYayasans !== null) {
                    foreach ($this->collVldYayasans as $referrerFK) {
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
        $pos = YayasanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getYayasanId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getAlamatJalan();
                break;
            case 3:
                return $this->getRt();
                break;
            case 4:
                return $this->getRw();
                break;
            case 5:
                return $this->getNamaDusun();
                break;
            case 6:
                return $this->getDesaKelurahan();
                break;
            case 7:
                return $this->getKodeWilayah();
                break;
            case 8:
                return $this->getKodePos();
                break;
            case 9:
                return $this->getLintang();
                break;
            case 10:
                return $this->getBujur();
                break;
            case 11:
                return $this->getNomorTelepon();
                break;
            case 12:
                return $this->getNomorFax();
                break;
            case 13:
                return $this->getEmail();
                break;
            case 14:
                return $this->getWebsite();
                break;
            case 15:
                return $this->getNpyp();
                break;
            case 16:
                return $this->getNamaPimpinanYayasan();
                break;
            case 17:
                return $this->getNoPendirianYayasan();
                break;
            case 18:
                return $this->getTanggalPendirianYayasan();
                break;
            case 19:
                return $this->getNomorPengesahanPnLn();
                break;
            case 20:
                return $this->getNomorSkBn();
                break;
            case 21:
                return $this->getTanggalSkBn();
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
        if (isset($alreadyDumpedObjects['Yayasan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Yayasan'][$this->getPrimaryKey()] = true;
        $keys = YayasanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getYayasanId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getAlamatJalan(),
            $keys[3] => $this->getRt(),
            $keys[4] => $this->getRw(),
            $keys[5] => $this->getNamaDusun(),
            $keys[6] => $this->getDesaKelurahan(),
            $keys[7] => $this->getKodeWilayah(),
            $keys[8] => $this->getKodePos(),
            $keys[9] => $this->getLintang(),
            $keys[10] => $this->getBujur(),
            $keys[11] => $this->getNomorTelepon(),
            $keys[12] => $this->getNomorFax(),
            $keys[13] => $this->getEmail(),
            $keys[14] => $this->getWebsite(),
            $keys[15] => $this->getNpyp(),
            $keys[16] => $this->getNamaPimpinanYayasan(),
            $keys[17] => $this->getNoPendirianYayasan(),
            $keys[18] => $this->getTanggalPendirianYayasan(),
            $keys[19] => $this->getNomorPengesahanPnLn(),
            $keys[20] => $this->getNomorSkBn(),
            $keys[21] => $this->getTanggalSkBn(),
            $keys[22] => $this->getCreateDate(),
            $keys[23] => $this->getLastUpdate(),
            $keys[24] => $this->getSoftDelete(),
            $keys[25] => $this->getLastSync(),
            $keys[26] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSekolahs) {
                $result['Sekolahs'] = $this->collSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldYayasans) {
                $result['VldYayasans'] = $this->collVldYayasans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = YayasanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setYayasanId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setAlamatJalan($value);
                break;
            case 3:
                $this->setRt($value);
                break;
            case 4:
                $this->setRw($value);
                break;
            case 5:
                $this->setNamaDusun($value);
                break;
            case 6:
                $this->setDesaKelurahan($value);
                break;
            case 7:
                $this->setKodeWilayah($value);
                break;
            case 8:
                $this->setKodePos($value);
                break;
            case 9:
                $this->setLintang($value);
                break;
            case 10:
                $this->setBujur($value);
                break;
            case 11:
                $this->setNomorTelepon($value);
                break;
            case 12:
                $this->setNomorFax($value);
                break;
            case 13:
                $this->setEmail($value);
                break;
            case 14:
                $this->setWebsite($value);
                break;
            case 15:
                $this->setNpyp($value);
                break;
            case 16:
                $this->setNamaPimpinanYayasan($value);
                break;
            case 17:
                $this->setNoPendirianYayasan($value);
                break;
            case 18:
                $this->setTanggalPendirianYayasan($value);
                break;
            case 19:
                $this->setNomorPengesahanPnLn($value);
                break;
            case 20:
                $this->setNomorSkBn($value);
                break;
            case 21:
                $this->setTanggalSkBn($value);
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
        $keys = YayasanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setYayasanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAlamatJalan($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRw($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNamaDusun($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDesaKelurahan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKodeWilayah($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKodePos($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLintang($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setBujur($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNomorTelepon($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setNomorFax($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setEmail($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setWebsite($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setNpyp($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNamaPimpinanYayasan($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setNoPendirianYayasan($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setTanggalPendirianYayasan($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setNomorPengesahanPnLn($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setNomorSkBn($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setTanggalSkBn($arr[$keys[21]]);
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
        $criteria = new Criteria(YayasanPeer::DATABASE_NAME);

        if ($this->isColumnModified(YayasanPeer::YAYASAN_ID)) $criteria->add(YayasanPeer::YAYASAN_ID, $this->yayasan_id);
        if ($this->isColumnModified(YayasanPeer::NAMA)) $criteria->add(YayasanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(YayasanPeer::ALAMAT_JALAN)) $criteria->add(YayasanPeer::ALAMAT_JALAN, $this->alamat_jalan);
        if ($this->isColumnModified(YayasanPeer::RT)) $criteria->add(YayasanPeer::RT, $this->rt);
        if ($this->isColumnModified(YayasanPeer::RW)) $criteria->add(YayasanPeer::RW, $this->rw);
        if ($this->isColumnModified(YayasanPeer::NAMA_DUSUN)) $criteria->add(YayasanPeer::NAMA_DUSUN, $this->nama_dusun);
        if ($this->isColumnModified(YayasanPeer::DESA_KELURAHAN)) $criteria->add(YayasanPeer::DESA_KELURAHAN, $this->desa_kelurahan);
        if ($this->isColumnModified(YayasanPeer::KODE_WILAYAH)) $criteria->add(YayasanPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(YayasanPeer::KODE_POS)) $criteria->add(YayasanPeer::KODE_POS, $this->kode_pos);
        if ($this->isColumnModified(YayasanPeer::LINTANG)) $criteria->add(YayasanPeer::LINTANG, $this->lintang);
        if ($this->isColumnModified(YayasanPeer::BUJUR)) $criteria->add(YayasanPeer::BUJUR, $this->bujur);
        if ($this->isColumnModified(YayasanPeer::NOMOR_TELEPON)) $criteria->add(YayasanPeer::NOMOR_TELEPON, $this->nomor_telepon);
        if ($this->isColumnModified(YayasanPeer::NOMOR_FAX)) $criteria->add(YayasanPeer::NOMOR_FAX, $this->nomor_fax);
        if ($this->isColumnModified(YayasanPeer::EMAIL)) $criteria->add(YayasanPeer::EMAIL, $this->email);
        if ($this->isColumnModified(YayasanPeer::WEBSITE)) $criteria->add(YayasanPeer::WEBSITE, $this->website);
        if ($this->isColumnModified(YayasanPeer::NPYP)) $criteria->add(YayasanPeer::NPYP, $this->npyp);
        if ($this->isColumnModified(YayasanPeer::NAMA_PIMPINAN_YAYASAN)) $criteria->add(YayasanPeer::NAMA_PIMPINAN_YAYASAN, $this->nama_pimpinan_yayasan);
        if ($this->isColumnModified(YayasanPeer::NO_PENDIRIAN_YAYASAN)) $criteria->add(YayasanPeer::NO_PENDIRIAN_YAYASAN, $this->no_pendirian_yayasan);
        if ($this->isColumnModified(YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN)) $criteria->add(YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN, $this->tanggal_pendirian_yayasan);
        if ($this->isColumnModified(YayasanPeer::NOMOR_PENGESAHAN_PN_LN)) $criteria->add(YayasanPeer::NOMOR_PENGESAHAN_PN_LN, $this->nomor_pengesahan_pn_ln);
        if ($this->isColumnModified(YayasanPeer::NOMOR_SK_BN)) $criteria->add(YayasanPeer::NOMOR_SK_BN, $this->nomor_sk_bn);
        if ($this->isColumnModified(YayasanPeer::TANGGAL_SK_BN)) $criteria->add(YayasanPeer::TANGGAL_SK_BN, $this->tanggal_sk_bn);
        if ($this->isColumnModified(YayasanPeer::CREATE_DATE)) $criteria->add(YayasanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(YayasanPeer::LAST_UPDATE)) $criteria->add(YayasanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(YayasanPeer::SOFT_DELETE)) $criteria->add(YayasanPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(YayasanPeer::LAST_SYNC)) $criteria->add(YayasanPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(YayasanPeer::UPDATER_ID)) $criteria->add(YayasanPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(YayasanPeer::DATABASE_NAME);
        $criteria->add(YayasanPeer::YAYASAN_ID, $this->yayasan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getYayasanId();
    }

    /**
     * Generic method to set the primary key (yayasan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setYayasanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getYayasanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Yayasan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setAlamatJalan($this->getAlamatJalan());
        $copyObj->setRt($this->getRt());
        $copyObj->setRw($this->getRw());
        $copyObj->setNamaDusun($this->getNamaDusun());
        $copyObj->setDesaKelurahan($this->getDesaKelurahan());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setKodePos($this->getKodePos());
        $copyObj->setLintang($this->getLintang());
        $copyObj->setBujur($this->getBujur());
        $copyObj->setNomorTelepon($this->getNomorTelepon());
        $copyObj->setNomorFax($this->getNomorFax());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setWebsite($this->getWebsite());
        $copyObj->setNpyp($this->getNpyp());
        $copyObj->setNamaPimpinanYayasan($this->getNamaPimpinanYayasan());
        $copyObj->setNoPendirianYayasan($this->getNoPendirianYayasan());
        $copyObj->setTanggalPendirianYayasan($this->getTanggalPendirianYayasan());
        $copyObj->setNomorPengesahanPnLn($this->getNomorPengesahanPnLn());
        $copyObj->setNomorSkBn($this->getNomorSkBn());
        $copyObj->setTanggalSkBn($this->getTanggalSkBn());
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

            foreach ($this->getSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldYayasans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldYayasan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setYayasanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Yayasan Clone of current object.
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
     * @return YayasanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new YayasanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Yayasan The current object (for fluent API support)
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
            $v->addYayasan($this);
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
                $this->aMstWilayah->addYayasans($this);
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
        if ('Sekolah' == $relationName) {
            $this->initSekolahs();
        }
        if ('VldYayasan' == $relationName) {
            $this->initVldYayasans();
        }
    }

    /**
     * Clears out the collSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Yayasan The current object (for fluent API support)
     * @see        addSekolahs()
     */
    public function clearSekolahs()
    {
        $this->collSekolahs = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahsPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahs($v = true)
    {
        $this->collSekolahsPartial = $v;
    }

    /**
     * Initializes the collSekolahs collection.
     *
     * By default this just sets the collSekolahs collection to an empty array (like clearcollSekolahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahs($overrideExisting = true)
    {
        if (null !== $this->collSekolahs && !$overrideExisting) {
            return;
        }
        $this->collSekolahs = new PropelObjectCollection();
        $this->collSekolahs->setModel('Sekolah');
    }

    /**
     * Gets an array of Sekolah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Yayasan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     * @throws PropelException
     */
    public function getSekolahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahsPartial && !$this->isNew();
        if (null === $this->collSekolahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahs) {
                // return empty collection
                $this->initSekolahs();
            } else {
                $collSekolahs = SekolahQuery::create(null, $criteria)
                    ->filterByYayasan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahsPartial && count($collSekolahs)) {
                      $this->initSekolahs(false);

                      foreach($collSekolahs as $obj) {
                        if (false == $this->collSekolahs->contains($obj)) {
                          $this->collSekolahs->append($obj);
                        }
                      }

                      $this->collSekolahsPartial = true;
                    }

                    $collSekolahs->getInternalIterator()->rewind();
                    return $collSekolahs;
                }

                if($partial && $this->collSekolahs) {
                    foreach($this->collSekolahs as $obj) {
                        if($obj->isNew()) {
                            $collSekolahs[] = $obj;
                        }
                    }
                }

                $this->collSekolahs = $collSekolahs;
                $this->collSekolahsPartial = false;
            }
        }

        return $this->collSekolahs;
    }

    /**
     * Sets a collection of Sekolah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Yayasan The current object (for fluent API support)
     */
    public function setSekolahs(PropelCollection $sekolahs, PropelPDO $con = null)
    {
        $sekolahsToDelete = $this->getSekolahs(new Criteria(), $con)->diff($sekolahs);

        $this->sekolahsScheduledForDeletion = unserialize(serialize($sekolahsToDelete));

        foreach ($sekolahsToDelete as $sekolahRemoved) {
            $sekolahRemoved->setYayasan(null);
        }

        $this->collSekolahs = null;
        foreach ($sekolahs as $sekolah) {
            $this->addSekolah($sekolah);
        }

        $this->collSekolahs = $sekolahs;
        $this->collSekolahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sekolah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sekolah objects.
     * @throws PropelException
     */
    public function countSekolahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahsPartial && !$this->isNew();
        if (null === $this->collSekolahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahs());
            }
            $query = SekolahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByYayasan($this)
                ->count($con);
        }

        return count($this->collSekolahs);
    }

    /**
     * Method called to associate a Sekolah object to this object
     * through the Sekolah foreign key attribute.
     *
     * @param    Sekolah $l Sekolah
     * @return Yayasan The current object (for fluent API support)
     */
    public function addSekolah(Sekolah $l)
    {
        if ($this->collSekolahs === null) {
            $this->initSekolahs();
            $this->collSekolahsPartial = true;
        }
        if (!in_array($l, $this->collSekolahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolah($l);
        }

        return $this;
    }

    /**
     * @param	Sekolah $sekolah The sekolah object to add.
     */
    protected function doAddSekolah($sekolah)
    {
        $this->collSekolahs[]= $sekolah;
        $sekolah->setYayasan($this);
    }

    /**
     * @param	Sekolah $sekolah The sekolah object to remove.
     * @return Yayasan The current object (for fluent API support)
     */
    public function removeSekolah($sekolah)
    {
        if ($this->getSekolahs()->contains($sekolah)) {
            $this->collSekolahs->remove($this->collSekolahs->search($sekolah));
            if (null === $this->sekolahsScheduledForDeletion) {
                $this->sekolahsScheduledForDeletion = clone $this->collSekolahs;
                $this->sekolahsScheduledForDeletion->clear();
            }
            $this->sekolahsScheduledForDeletion[]= $sekolah;
            $sekolah->setYayasan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Yayasan is new, it will return
     * an empty collection; or if this Yayasan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Yayasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Yayasan is new, it will return
     * an empty collection; or if this Yayasan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Yayasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Yayasan is new, it will return
     * an empty collection; or if this Yayasan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Yayasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinBentukPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('BentukPendidikan', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Yayasan is new, it will return
     * an empty collection; or if this Yayasan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Yayasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinStatusKepemilikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikan', $join_behavior);

        return $this->getSekolahs($query, $con);
    }

    /**
     * Clears out the collVldYayasans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Yayasan The current object (for fluent API support)
     * @see        addVldYayasans()
     */
    public function clearVldYayasans()
    {
        $this->collVldYayasans = null; // important to set this to null since that means it is uninitialized
        $this->collVldYayasansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldYayasans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldYayasans($v = true)
    {
        $this->collVldYayasansPartial = $v;
    }

    /**
     * Initializes the collVldYayasans collection.
     *
     * By default this just sets the collVldYayasans collection to an empty array (like clearcollVldYayasans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldYayasans($overrideExisting = true)
    {
        if (null !== $this->collVldYayasans && !$overrideExisting) {
            return;
        }
        $this->collVldYayasans = new PropelObjectCollection();
        $this->collVldYayasans->setModel('VldYayasan');
    }

    /**
     * Gets an array of VldYayasan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Yayasan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldYayasan[] List of VldYayasan objects
     * @throws PropelException
     */
    public function getVldYayasans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldYayasansPartial && !$this->isNew();
        if (null === $this->collVldYayasans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldYayasans) {
                // return empty collection
                $this->initVldYayasans();
            } else {
                $collVldYayasans = VldYayasanQuery::create(null, $criteria)
                    ->filterByYayasan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldYayasansPartial && count($collVldYayasans)) {
                      $this->initVldYayasans(false);

                      foreach($collVldYayasans as $obj) {
                        if (false == $this->collVldYayasans->contains($obj)) {
                          $this->collVldYayasans->append($obj);
                        }
                      }

                      $this->collVldYayasansPartial = true;
                    }

                    $collVldYayasans->getInternalIterator()->rewind();
                    return $collVldYayasans;
                }

                if($partial && $this->collVldYayasans) {
                    foreach($this->collVldYayasans as $obj) {
                        if($obj->isNew()) {
                            $collVldYayasans[] = $obj;
                        }
                    }
                }

                $this->collVldYayasans = $collVldYayasans;
                $this->collVldYayasansPartial = false;
            }
        }

        return $this->collVldYayasans;
    }

    /**
     * Sets a collection of VldYayasan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldYayasans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Yayasan The current object (for fluent API support)
     */
    public function setVldYayasans(PropelCollection $vldYayasans, PropelPDO $con = null)
    {
        $vldYayasansToDelete = $this->getVldYayasans(new Criteria(), $con)->diff($vldYayasans);

        $this->vldYayasansScheduledForDeletion = unserialize(serialize($vldYayasansToDelete));

        foreach ($vldYayasansToDelete as $vldYayasanRemoved) {
            $vldYayasanRemoved->setYayasan(null);
        }

        $this->collVldYayasans = null;
        foreach ($vldYayasans as $vldYayasan) {
            $this->addVldYayasan($vldYayasan);
        }

        $this->collVldYayasans = $vldYayasans;
        $this->collVldYayasansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldYayasan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldYayasan objects.
     * @throws PropelException
     */
    public function countVldYayasans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldYayasansPartial && !$this->isNew();
        if (null === $this->collVldYayasans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldYayasans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldYayasans());
            }
            $query = VldYayasanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByYayasan($this)
                ->count($con);
        }

        return count($this->collVldYayasans);
    }

    /**
     * Method called to associate a VldYayasan object to this object
     * through the VldYayasan foreign key attribute.
     *
     * @param    VldYayasan $l VldYayasan
     * @return Yayasan The current object (for fluent API support)
     */
    public function addVldYayasan(VldYayasan $l)
    {
        if ($this->collVldYayasans === null) {
            $this->initVldYayasans();
            $this->collVldYayasansPartial = true;
        }
        if (!in_array($l, $this->collVldYayasans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldYayasan($l);
        }

        return $this;
    }

    /**
     * @param	VldYayasan $vldYayasan The vldYayasan object to add.
     */
    protected function doAddVldYayasan($vldYayasan)
    {
        $this->collVldYayasans[]= $vldYayasan;
        $vldYayasan->setYayasan($this);
    }

    /**
     * @param	VldYayasan $vldYayasan The vldYayasan object to remove.
     * @return Yayasan The current object (for fluent API support)
     */
    public function removeVldYayasan($vldYayasan)
    {
        if ($this->getVldYayasans()->contains($vldYayasan)) {
            $this->collVldYayasans->remove($this->collVldYayasans->search($vldYayasan));
            if (null === $this->vldYayasansScheduledForDeletion) {
                $this->vldYayasansScheduledForDeletion = clone $this->collVldYayasans;
                $this->vldYayasansScheduledForDeletion->clear();
            }
            $this->vldYayasansScheduledForDeletion[]= clone $vldYayasan;
            $vldYayasan->setYayasan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Yayasan is new, it will return
     * an empty collection; or if this Yayasan has previously
     * been saved, it will retrieve related VldYayasans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Yayasan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldYayasan[] List of VldYayasan objects
     */
    public function getVldYayasansJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldYayasanQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldYayasans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->yayasan_id = null;
        $this->nama = null;
        $this->alamat_jalan = null;
        $this->rt = null;
        $this->rw = null;
        $this->nama_dusun = null;
        $this->desa_kelurahan = null;
        $this->kode_wilayah = null;
        $this->kode_pos = null;
        $this->lintang = null;
        $this->bujur = null;
        $this->nomor_telepon = null;
        $this->nomor_fax = null;
        $this->email = null;
        $this->website = null;
        $this->npyp = null;
        $this->nama_pimpinan_yayasan = null;
        $this->no_pendirian_yayasan = null;
        $this->tanggal_pendirian_yayasan = null;
        $this->nomor_pengesahan_pn_ln = null;
        $this->nomor_sk_bn = null;
        $this->tanggal_sk_bn = null;
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
            if ($this->collSekolahs) {
                foreach ($this->collSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldYayasans) {
                foreach ($this->collVldYayasans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSekolahs instanceof PropelCollection) {
            $this->collSekolahs->clearIterator();
        }
        $this->collSekolahs = null;
        if ($this->collVldYayasans instanceof PropelCollection) {
            $this->collVldYayasans->clearIterator();
        }
        $this->collVldYayasans = null;
        $this->aMstWilayah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(YayasanPeer::DEFAULT_STRING_FORMAT);
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
