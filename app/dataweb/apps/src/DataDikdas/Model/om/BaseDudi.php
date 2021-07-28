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
use DataDikdas\Model\BidangUsaha;
use DataDikdas\Model\BidangUsahaQuery;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\DudiPeer;
use DataDikdas\Model\DudiQuery;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MouQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\TracerLulusanQuery;
use DataDikdas\Model\VldDudi;
use DataDikdas\Model\VldDudiQuery;

/**
 * Base class that represents a row from the 'dudi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseDudi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\DudiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DudiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the dudi_id field.
     * @var        string
     */
    protected $dudi_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the bidang_usaha_id field.
     * @var        string
     */
    protected $bidang_usaha_id;

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
     * The value for the npwp field.
     * @var        string
     */
    protected $npwp;

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
     * @var        BidangUsaha
     */
    protected $aBidangUsaha;

    /**
     * @var        PropelObjectCollection|Mou[] Collection to store aggregation of Mou objects.
     */
    protected $collMous;
    protected $collMousPartial;

    /**
     * @var        PropelObjectCollection|TracerLulusan[] Collection to store aggregation of TracerLulusan objects.
     */
    protected $collTracerLulusans;
    protected $collTracerLulusansPartial;

    /**
     * @var        PropelObjectCollection|VldDudi[] Collection to store aggregation of VldDudi objects.
     */
    protected $collVldDudis;
    protected $collVldDudisPartial;

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
    protected $mousScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tracerLulusansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldDudisScheduledForDeletion = null;

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
     * Initializes internal state of BaseDudi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
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
     * Get the [npwp] column value.
     * 
     * @return string
     */
    public function getNpwp()
    {
        return $this->npwp;
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
     * Set the value of [dudi_id] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setDudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dudi_id !== $v) {
            $this->dudi_id = $v;
            $this->modifiedColumns[] = DudiPeer::DUDI_ID;
        }


        return $this;
    } // setDudiId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = DudiPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [bidang_usaha_id] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setBidangUsahaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bidang_usaha_id !== $v) {
            $this->bidang_usaha_id = $v;
            $this->modifiedColumns[] = DudiPeer::BIDANG_USAHA_ID;
        }

        if ($this->aBidangUsaha !== null && $this->aBidangUsaha->getBidangUsahaId() !== $v) {
            $this->aBidangUsaha = null;
        }


        return $this;
    } // setBidangUsahaId()

    /**
     * Set the value of [alamat_jalan] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[] = DudiPeer::ALAMAT_JALAN;
        }


        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[] = DudiPeer::RT;
        }


        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[] = DudiPeer::RW;
        }


        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[] = DudiPeer::NAMA_DUSUN;
        }


        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[] = DudiPeer::DESA_KELURAHAN;
        }


        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = DudiPeer::KODE_WILAYAH;
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
     * @return Dudi The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[] = DudiPeer::KODE_POS;
        }


        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[] = DudiPeer::LINTANG;
        }


        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[] = DudiPeer::BUJUR;
        }


        return $this;
    } // setBujur()

    /**
     * Set the value of [nomor_telepon] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setNomorTelepon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_telepon !== $v) {
            $this->nomor_telepon = $v;
            $this->modifiedColumns[] = DudiPeer::NOMOR_TELEPON;
        }


        return $this;
    } // setNomorTelepon()

    /**
     * Set the value of [nomor_fax] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setNomorFax($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_fax !== $v) {
            $this->nomor_fax = $v;
            $this->modifiedColumns[] = DudiPeer::NOMOR_FAX;
        }


        return $this;
    } // setNomorFax()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = DudiPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [website] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[] = DudiPeer::WEBSITE;
        }


        return $this;
    } // setWebsite()

    /**
     * Set the value of [npwp] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setNpwp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->npwp !== $v) {
            $this->npwp = $v;
            $this->modifiedColumns[] = DudiPeer::NPWP;
        }


        return $this;
    } // setNpwp()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Dudi The current object (for fluent API support)
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
                $this->modifiedColumns[] = DudiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Dudi The current object (for fluent API support)
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
                $this->modifiedColumns[] = DudiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = DudiPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Dudi The current object (for fluent API support)
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
                $this->modifiedColumns[] = DudiPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Dudi The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = DudiPeer::UPDATER_ID;
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

            $this->dudi_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->bidang_usaha_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->alamat_jalan = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->rt = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->rw = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->nama_dusun = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->desa_kelurahan = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->kode_wilayah = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->kode_pos = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->lintang = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->bujur = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->nomor_telepon = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->nomor_fax = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->email = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->website = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->npwp = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->create_date = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->last_update = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->soft_delete = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->last_sync = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->updater_id = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 22; // 22 = DudiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Dudi object", $e);
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

        if ($this->aBidangUsaha !== null && $this->bidang_usaha_id !== $this->aBidangUsaha->getBidangUsahaId()) {
            $this->aBidangUsaha = null;
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
            $con = Propel::getConnection(DudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DudiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMstWilayah = null;
            $this->aBidangUsaha = null;
            $this->collMous = null;

            $this->collTracerLulusans = null;

            $this->collVldDudis = null;

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
            $con = Propel::getConnection(DudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DudiQuery::create()
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
            $con = Propel::getConnection(DudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DudiPeer::addInstanceToPool($this);
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

            if ($this->aBidangUsaha !== null) {
                if ($this->aBidangUsaha->isModified() || $this->aBidangUsaha->isNew()) {
                    $affectedRows += $this->aBidangUsaha->save($con);
                }
                $this->setBidangUsaha($this->aBidangUsaha);
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

            if ($this->mousScheduledForDeletion !== null) {
                if (!$this->mousScheduledForDeletion->isEmpty()) {
                    foreach ($this->mousScheduledForDeletion as $mou) {
                        // need to save related object because we set the relation to null
                        $mou->save($con);
                    }
                    $this->mousScheduledForDeletion = null;
                }
            }

            if ($this->collMous !== null) {
                foreach ($this->collMous as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tracerLulusansScheduledForDeletion !== null) {
                if (!$this->tracerLulusansScheduledForDeletion->isEmpty()) {
                    foreach ($this->tracerLulusansScheduledForDeletion as $tracerLulusan) {
                        // need to save related object because we set the relation to null
                        $tracerLulusan->save($con);
                    }
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

            if ($this->vldDudisScheduledForDeletion !== null) {
                if (!$this->vldDudisScheduledForDeletion->isEmpty()) {
                    VldDudiQuery::create()
                        ->filterByPrimaryKeys($this->vldDudisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldDudisScheduledForDeletion = null;
                }
            }

            if ($this->collVldDudis !== null) {
                foreach ($this->collVldDudis as $referrerFK) {
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
        if ($this->isColumnModified(DudiPeer::DUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"dudi_id"';
        }
        if ($this->isColumnModified(DudiPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(DudiPeer::BIDANG_USAHA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bidang_usaha_id"';
        }
        if ($this->isColumnModified(DudiPeer::ALAMAT_JALAN)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_jalan"';
        }
        if ($this->isColumnModified(DudiPeer::RT)) {
            $modifiedColumns[':p' . $index++]  = '"rt"';
        }
        if ($this->isColumnModified(DudiPeer::RW)) {
            $modifiedColumns[':p' . $index++]  = '"rw"';
        }
        if ($this->isColumnModified(DudiPeer::NAMA_DUSUN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dusun"';
        }
        if ($this->isColumnModified(DudiPeer::DESA_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"desa_kelurahan"';
        }
        if ($this->isColumnModified(DudiPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(DudiPeer::KODE_POS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_pos"';
        }
        if ($this->isColumnModified(DudiPeer::LINTANG)) {
            $modifiedColumns[':p' . $index++]  = '"lintang"';
        }
        if ($this->isColumnModified(DudiPeer::BUJUR)) {
            $modifiedColumns[':p' . $index++]  = '"bujur"';
        }
        if ($this->isColumnModified(DudiPeer::NOMOR_TELEPON)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_telepon"';
        }
        if ($this->isColumnModified(DudiPeer::NOMOR_FAX)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_fax"';
        }
        if ($this->isColumnModified(DudiPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"email"';
        }
        if ($this->isColumnModified(DudiPeer::WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '"website"';
        }
        if ($this->isColumnModified(DudiPeer::NPWP)) {
            $modifiedColumns[':p' . $index++]  = '"npwp"';
        }
        if ($this->isColumnModified(DudiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(DudiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(DudiPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(DudiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(DudiPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "dudi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"dudi_id"':						
                        $stmt->bindValue($identifier, $this->dudi_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"bidang_usaha_id"':						
                        $stmt->bindValue($identifier, $this->bidang_usaha_id, PDO::PARAM_STR);
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
                    case '"npwp"':						
                        $stmt->bindValue($identifier, $this->npwp, PDO::PARAM_STR);
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

            if ($this->aBidangUsaha !== null) {
                if (!$this->aBidangUsaha->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBidangUsaha->getValidationFailures());
                }
            }


            if (($retval = DudiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMous !== null) {
                    foreach ($this->collMous as $referrerFK) {
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

                if ($this->collVldDudis !== null) {
                    foreach ($this->collVldDudis as $referrerFK) {
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
        $pos = DudiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDudiId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getBidangUsahaId();
                break;
            case 3:
                return $this->getAlamatJalan();
                break;
            case 4:
                return $this->getRt();
                break;
            case 5:
                return $this->getRw();
                break;
            case 6:
                return $this->getNamaDusun();
                break;
            case 7:
                return $this->getDesaKelurahan();
                break;
            case 8:
                return $this->getKodeWilayah();
                break;
            case 9:
                return $this->getKodePos();
                break;
            case 10:
                return $this->getLintang();
                break;
            case 11:
                return $this->getBujur();
                break;
            case 12:
                return $this->getNomorTelepon();
                break;
            case 13:
                return $this->getNomorFax();
                break;
            case 14:
                return $this->getEmail();
                break;
            case 15:
                return $this->getWebsite();
                break;
            case 16:
                return $this->getNpwp();
                break;
            case 17:
                return $this->getCreateDate();
                break;
            case 18:
                return $this->getLastUpdate();
                break;
            case 19:
                return $this->getSoftDelete();
                break;
            case 20:
                return $this->getLastSync();
                break;
            case 21:
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
        if (isset($alreadyDumpedObjects['Dudi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Dudi'][$this->getPrimaryKey()] = true;
        $keys = DudiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDudiId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getBidangUsahaId(),
            $keys[3] => $this->getAlamatJalan(),
            $keys[4] => $this->getRt(),
            $keys[5] => $this->getRw(),
            $keys[6] => $this->getNamaDusun(),
            $keys[7] => $this->getDesaKelurahan(),
            $keys[8] => $this->getKodeWilayah(),
            $keys[9] => $this->getKodePos(),
            $keys[10] => $this->getLintang(),
            $keys[11] => $this->getBujur(),
            $keys[12] => $this->getNomorTelepon(),
            $keys[13] => $this->getNomorFax(),
            $keys[14] => $this->getEmail(),
            $keys[15] => $this->getWebsite(),
            $keys[16] => $this->getNpwp(),
            $keys[17] => $this->getCreateDate(),
            $keys[18] => $this->getLastUpdate(),
            $keys[19] => $this->getSoftDelete(),
            $keys[20] => $this->getLastSync(),
            $keys[21] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBidangUsaha) {
                $result['BidangUsaha'] = $this->aBidangUsaha->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMous) {
                $result['Mous'] = $this->collMous->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTracerLulusans) {
                $result['TracerLulusans'] = $this->collTracerLulusans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldDudis) {
                $result['VldDudis'] = $this->collVldDudis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = DudiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDudiId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setBidangUsahaId($value);
                break;
            case 3:
                $this->setAlamatJalan($value);
                break;
            case 4:
                $this->setRt($value);
                break;
            case 5:
                $this->setRw($value);
                break;
            case 6:
                $this->setNamaDusun($value);
                break;
            case 7:
                $this->setDesaKelurahan($value);
                break;
            case 8:
                $this->setKodeWilayah($value);
                break;
            case 9:
                $this->setKodePos($value);
                break;
            case 10:
                $this->setLintang($value);
                break;
            case 11:
                $this->setBujur($value);
                break;
            case 12:
                $this->setNomorTelepon($value);
                break;
            case 13:
                $this->setNomorFax($value);
                break;
            case 14:
                $this->setEmail($value);
                break;
            case 15:
                $this->setWebsite($value);
                break;
            case 16:
                $this->setNpwp($value);
                break;
            case 17:
                $this->setCreateDate($value);
                break;
            case 18:
                $this->setLastUpdate($value);
                break;
            case 19:
                $this->setSoftDelete($value);
                break;
            case 20:
                $this->setLastSync($value);
                break;
            case 21:
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
        $keys = DudiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setDudiId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setBidangUsahaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAlamatJalan($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRt($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setRw($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNamaDusun($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDesaKelurahan($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKodeWilayah($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKodePos($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLintang($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setBujur($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setNomorTelepon($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNomorFax($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setEmail($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setWebsite($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNpwp($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCreateDate($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setLastUpdate($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setSoftDelete($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setLastSync($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setUpdaterId($arr[$keys[21]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DudiPeer::DATABASE_NAME);

        if ($this->isColumnModified(DudiPeer::DUDI_ID)) $criteria->add(DudiPeer::DUDI_ID, $this->dudi_id);
        if ($this->isColumnModified(DudiPeer::NAMA)) $criteria->add(DudiPeer::NAMA, $this->nama);
        if ($this->isColumnModified(DudiPeer::BIDANG_USAHA_ID)) $criteria->add(DudiPeer::BIDANG_USAHA_ID, $this->bidang_usaha_id);
        if ($this->isColumnModified(DudiPeer::ALAMAT_JALAN)) $criteria->add(DudiPeer::ALAMAT_JALAN, $this->alamat_jalan);
        if ($this->isColumnModified(DudiPeer::RT)) $criteria->add(DudiPeer::RT, $this->rt);
        if ($this->isColumnModified(DudiPeer::RW)) $criteria->add(DudiPeer::RW, $this->rw);
        if ($this->isColumnModified(DudiPeer::NAMA_DUSUN)) $criteria->add(DudiPeer::NAMA_DUSUN, $this->nama_dusun);
        if ($this->isColumnModified(DudiPeer::DESA_KELURAHAN)) $criteria->add(DudiPeer::DESA_KELURAHAN, $this->desa_kelurahan);
        if ($this->isColumnModified(DudiPeer::KODE_WILAYAH)) $criteria->add(DudiPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(DudiPeer::KODE_POS)) $criteria->add(DudiPeer::KODE_POS, $this->kode_pos);
        if ($this->isColumnModified(DudiPeer::LINTANG)) $criteria->add(DudiPeer::LINTANG, $this->lintang);
        if ($this->isColumnModified(DudiPeer::BUJUR)) $criteria->add(DudiPeer::BUJUR, $this->bujur);
        if ($this->isColumnModified(DudiPeer::NOMOR_TELEPON)) $criteria->add(DudiPeer::NOMOR_TELEPON, $this->nomor_telepon);
        if ($this->isColumnModified(DudiPeer::NOMOR_FAX)) $criteria->add(DudiPeer::NOMOR_FAX, $this->nomor_fax);
        if ($this->isColumnModified(DudiPeer::EMAIL)) $criteria->add(DudiPeer::EMAIL, $this->email);
        if ($this->isColumnModified(DudiPeer::WEBSITE)) $criteria->add(DudiPeer::WEBSITE, $this->website);
        if ($this->isColumnModified(DudiPeer::NPWP)) $criteria->add(DudiPeer::NPWP, $this->npwp);
        if ($this->isColumnModified(DudiPeer::CREATE_DATE)) $criteria->add(DudiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(DudiPeer::LAST_UPDATE)) $criteria->add(DudiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(DudiPeer::SOFT_DELETE)) $criteria->add(DudiPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(DudiPeer::LAST_SYNC)) $criteria->add(DudiPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(DudiPeer::UPDATER_ID)) $criteria->add(DudiPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(DudiPeer::DATABASE_NAME);
        $criteria->add(DudiPeer::DUDI_ID, $this->dudi_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getDudiId();
    }

    /**
     * Generic method to set the primary key (dudi_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setDudiId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getDudiId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Dudi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setBidangUsahaId($this->getBidangUsahaId());
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
        $copyObj->setNpwp($this->getNpwp());
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

            foreach ($this->getMous() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMou($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTracerLulusans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTracerLulusan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldDudis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldDudi($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setDudiId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Dudi Clone of current object.
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
     * @return DudiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DudiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Dudi The current object (for fluent API support)
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
            $v->addDudi($this);
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
                $this->aMstWilayah->addDudis($this);
             */
        }

        return $this->aMstWilayah;
    }

    /**
     * Declares an association between this object and a BidangUsaha object.
     *
     * @param             BidangUsaha $v
     * @return Dudi The current object (for fluent API support)
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
            $v->addDudi($this);
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
                $this->aBidangUsaha->addDudis($this);
             */
        }

        return $this->aBidangUsaha;
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
        if ('Mou' == $relationName) {
            $this->initMous();
        }
        if ('TracerLulusan' == $relationName) {
            $this->initTracerLulusans();
        }
        if ('VldDudi' == $relationName) {
            $this->initVldDudis();
        }
    }

    /**
     * Clears out the collMous collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Dudi The current object (for fluent API support)
     * @see        addMous()
     */
    public function clearMous()
    {
        $this->collMous = null; // important to set this to null since that means it is uninitialized
        $this->collMousPartial = null;

        return $this;
    }

    /**
     * reset is the collMous collection loaded partially
     *
     * @return void
     */
    public function resetPartialMous($v = true)
    {
        $this->collMousPartial = $v;
    }

    /**
     * Initializes the collMous collection.
     *
     * By default this just sets the collMous collection to an empty array (like clearcollMous());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMous($overrideExisting = true)
    {
        if (null !== $this->collMous && !$overrideExisting) {
            return;
        }
        $this->collMous = new PropelObjectCollection();
        $this->collMous->setModel('Mou');
    }

    /**
     * Gets an array of Mou objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Dudi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mou[] List of Mou objects
     * @throws PropelException
     */
    public function getMous($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMousPartial && !$this->isNew();
        if (null === $this->collMous || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMous) {
                // return empty collection
                $this->initMous();
            } else {
                $collMous = MouQuery::create(null, $criteria)
                    ->filterByDudi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMousPartial && count($collMous)) {
                      $this->initMous(false);

                      foreach($collMous as $obj) {
                        if (false == $this->collMous->contains($obj)) {
                          $this->collMous->append($obj);
                        }
                      }

                      $this->collMousPartial = true;
                    }

                    $collMous->getInternalIterator()->rewind();
                    return $collMous;
                }

                if($partial && $this->collMous) {
                    foreach($this->collMous as $obj) {
                        if($obj->isNew()) {
                            $collMous[] = $obj;
                        }
                    }
                }

                $this->collMous = $collMous;
                $this->collMousPartial = false;
            }
        }

        return $this->collMous;
    }

    /**
     * Sets a collection of Mou objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mous A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Dudi The current object (for fluent API support)
     */
    public function setMous(PropelCollection $mous, PropelPDO $con = null)
    {
        $mousToDelete = $this->getMous(new Criteria(), $con)->diff($mous);

        $this->mousScheduledForDeletion = unserialize(serialize($mousToDelete));

        foreach ($mousToDelete as $mouRemoved) {
            $mouRemoved->setDudi(null);
        }

        $this->collMous = null;
        foreach ($mous as $mou) {
            $this->addMou($mou);
        }

        $this->collMous = $mous;
        $this->collMousPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mou objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mou objects.
     * @throws PropelException
     */
    public function countMous(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMousPartial && !$this->isNew();
        if (null === $this->collMous || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMous) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMous());
            }
            $query = MouQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDudi($this)
                ->count($con);
        }

        return count($this->collMous);
    }

    /**
     * Method called to associate a Mou object to this object
     * through the Mou foreign key attribute.
     *
     * @param    Mou $l Mou
     * @return Dudi The current object (for fluent API support)
     */
    public function addMou(Mou $l)
    {
        if ($this->collMous === null) {
            $this->initMous();
            $this->collMousPartial = true;
        }
        if (!in_array($l, $this->collMous->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMou($l);
        }

        return $this;
    }

    /**
     * @param	Mou $mou The mou object to add.
     */
    protected function doAddMou($mou)
    {
        $this->collMous[]= $mou;
        $mou->setDudi($this);
    }

    /**
     * @param	Mou $mou The mou object to remove.
     * @return Dudi The current object (for fluent API support)
     */
    public function removeMou($mou)
    {
        if ($this->getMous()->contains($mou)) {
            $this->collMous->remove($this->collMous->search($mou));
            if (null === $this->mousScheduledForDeletion) {
                $this->mousScheduledForDeletion = clone $this->collMous;
                $this->mousScheduledForDeletion->clear();
            }
            $this->mousScheduledForDeletion[]= $mou;
            $mou->setDudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dudi is new, it will return
     * an empty collection; or if this Dudi has previously
     * been saved, it will retrieve related Mous from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mou[] List of Mou objects
     */
    public function getMousJoinJenisKs($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MouQuery::create(null, $criteria);
        $query->joinWith('JenisKs', $join_behavior);

        return $this->getMous($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dudi is new, it will return
     * an empty collection; or if this Dudi has previously
     * been saved, it will retrieve related Mous from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mou[] List of Mou objects
     */
    public function getMousJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MouQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getMous($query, $con);
    }

    /**
     * Clears out the collTracerLulusans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Dudi The current object (for fluent API support)
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
     * If this Dudi is new, it will return
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
                    ->filterByDudi($this)
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
     * @return Dudi The current object (for fluent API support)
     */
    public function setTracerLulusans(PropelCollection $tracerLulusans, PropelPDO $con = null)
    {
        $tracerLulusansToDelete = $this->getTracerLulusans(new Criteria(), $con)->diff($tracerLulusans);

        $this->tracerLulusansScheduledForDeletion = unserialize(serialize($tracerLulusansToDelete));

        foreach ($tracerLulusansToDelete as $tracerLulusanRemoved) {
            $tracerLulusanRemoved->setDudi(null);
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
                ->filterByDudi($this)
                ->count($con);
        }

        return count($this->collTracerLulusans);
    }

    /**
     * Method called to associate a TracerLulusan object to this object
     * through the TracerLulusan foreign key attribute.
     *
     * @param    TracerLulusan $l TracerLulusan
     * @return Dudi The current object (for fluent API support)
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
        $tracerLulusan->setDudi($this);
    }

    /**
     * @param	TracerLulusan $tracerLulusan The tracerLulusan object to remove.
     * @return Dudi The current object (for fluent API support)
     */
    public function removeTracerLulusan($tracerLulusan)
    {
        if ($this->getTracerLulusans()->contains($tracerLulusan)) {
            $this->collTracerLulusans->remove($this->collTracerLulusans->search($tracerLulusan));
            if (null === $this->tracerLulusansScheduledForDeletion) {
                $this->tracerLulusansScheduledForDeletion = clone $this->collTracerLulusans;
                $this->tracerLulusansScheduledForDeletion->clear();
            }
            $this->tracerLulusansScheduledForDeletion[]= $tracerLulusan;
            $tracerLulusan->setDudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dudi is new, it will return
     * an empty collection; or if this Dudi has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dudi.
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
     * Otherwise if this Dudi is new, it will return
     * an empty collection; or if this Dudi has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dudi.
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
     * Otherwise if this Dudi is new, it will return
     * an empty collection; or if this Dudi has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dudi.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dudi is new, it will return
     * an empty collection; or if this Dudi has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinRegistrasiPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('RegistrasiPesertaDidik', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }

    /**
     * Clears out the collVldDudis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Dudi The current object (for fluent API support)
     * @see        addVldDudis()
     */
    public function clearVldDudis()
    {
        $this->collVldDudis = null; // important to set this to null since that means it is uninitialized
        $this->collVldDudisPartial = null;

        return $this;
    }

    /**
     * reset is the collVldDudis collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldDudis($v = true)
    {
        $this->collVldDudisPartial = $v;
    }

    /**
     * Initializes the collVldDudis collection.
     *
     * By default this just sets the collVldDudis collection to an empty array (like clearcollVldDudis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldDudis($overrideExisting = true)
    {
        if (null !== $this->collVldDudis && !$overrideExisting) {
            return;
        }
        $this->collVldDudis = new PropelObjectCollection();
        $this->collVldDudis->setModel('VldDudi');
    }

    /**
     * Gets an array of VldDudi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Dudi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldDudi[] List of VldDudi objects
     * @throws PropelException
     */
    public function getVldDudis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldDudisPartial && !$this->isNew();
        if (null === $this->collVldDudis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldDudis) {
                // return empty collection
                $this->initVldDudis();
            } else {
                $collVldDudis = VldDudiQuery::create(null, $criteria)
                    ->filterByDudi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldDudisPartial && count($collVldDudis)) {
                      $this->initVldDudis(false);

                      foreach($collVldDudis as $obj) {
                        if (false == $this->collVldDudis->contains($obj)) {
                          $this->collVldDudis->append($obj);
                        }
                      }

                      $this->collVldDudisPartial = true;
                    }

                    $collVldDudis->getInternalIterator()->rewind();
                    return $collVldDudis;
                }

                if($partial && $this->collVldDudis) {
                    foreach($this->collVldDudis as $obj) {
                        if($obj->isNew()) {
                            $collVldDudis[] = $obj;
                        }
                    }
                }

                $this->collVldDudis = $collVldDudis;
                $this->collVldDudisPartial = false;
            }
        }

        return $this->collVldDudis;
    }

    /**
     * Sets a collection of VldDudi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldDudis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Dudi The current object (for fluent API support)
     */
    public function setVldDudis(PropelCollection $vldDudis, PropelPDO $con = null)
    {
        $vldDudisToDelete = $this->getVldDudis(new Criteria(), $con)->diff($vldDudis);

        $this->vldDudisScheduledForDeletion = unserialize(serialize($vldDudisToDelete));

        foreach ($vldDudisToDelete as $vldDudiRemoved) {
            $vldDudiRemoved->setDudi(null);
        }

        $this->collVldDudis = null;
        foreach ($vldDudis as $vldDudi) {
            $this->addVldDudi($vldDudi);
        }

        $this->collVldDudis = $vldDudis;
        $this->collVldDudisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldDudi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldDudi objects.
     * @throws PropelException
     */
    public function countVldDudis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldDudisPartial && !$this->isNew();
        if (null === $this->collVldDudis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldDudis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldDudis());
            }
            $query = VldDudiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDudi($this)
                ->count($con);
        }

        return count($this->collVldDudis);
    }

    /**
     * Method called to associate a VldDudi object to this object
     * through the VldDudi foreign key attribute.
     *
     * @param    VldDudi $l VldDudi
     * @return Dudi The current object (for fluent API support)
     */
    public function addVldDudi(VldDudi $l)
    {
        if ($this->collVldDudis === null) {
            $this->initVldDudis();
            $this->collVldDudisPartial = true;
        }
        if (!in_array($l, $this->collVldDudis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldDudi($l);
        }

        return $this;
    }

    /**
     * @param	VldDudi $vldDudi The vldDudi object to add.
     */
    protected function doAddVldDudi($vldDudi)
    {
        $this->collVldDudis[]= $vldDudi;
        $vldDudi->setDudi($this);
    }

    /**
     * @param	VldDudi $vldDudi The vldDudi object to remove.
     * @return Dudi The current object (for fluent API support)
     */
    public function removeVldDudi($vldDudi)
    {
        if ($this->getVldDudis()->contains($vldDudi)) {
            $this->collVldDudis->remove($this->collVldDudis->search($vldDudi));
            if (null === $this->vldDudisScheduledForDeletion) {
                $this->vldDudisScheduledForDeletion = clone $this->collVldDudis;
                $this->vldDudisScheduledForDeletion->clear();
            }
            $this->vldDudisScheduledForDeletion[]= clone $vldDudi;
            $vldDudi->setDudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dudi is new, it will return
     * an empty collection; or if this Dudi has previously
     * been saved, it will retrieve related VldDudis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldDudi[] List of VldDudi objects
     */
    public function getVldDudisJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldDudiQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldDudis($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->dudi_id = null;
        $this->nama = null;
        $this->bidang_usaha_id = null;
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
        $this->npwp = null;
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
            if ($this->collMous) {
                foreach ($this->collMous as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTracerLulusans) {
                foreach ($this->collTracerLulusans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldDudis) {
                foreach ($this->collVldDudis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }
            if ($this->aBidangUsaha instanceof Persistent) {
              $this->aBidangUsaha->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMous instanceof PropelCollection) {
            $this->collMous->clearIterator();
        }
        $this->collMous = null;
        if ($this->collTracerLulusans instanceof PropelCollection) {
            $this->collTracerLulusans->clearIterator();
        }
        $this->collTracerLulusans = null;
        if ($this->collVldDudis instanceof PropelCollection) {
            $this->collVldDudis->clearIterator();
        }
        $this->collVldDudis = null;
        $this->aMstWilayah = null;
        $this->aBidangUsaha = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DudiPeer::DEFAULT_STRING_FORMAT);
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
