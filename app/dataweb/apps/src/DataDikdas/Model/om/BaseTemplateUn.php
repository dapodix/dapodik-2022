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
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TahunAjaranQuery;
use DataDikdas\Model\TemplateRapor;
use DataDikdas\Model\TemplateRaporQuery;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TemplateUnPeer;
use DataDikdas\Model\TemplateUnQuery;
use DataDikdas\Model\Un;
use DataDikdas\Model\UnQuery;

/**
 * Base class that represents a row from the 'ref.template_un' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTemplateUn extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TemplateUnPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TemplateUnPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the template_id field.
     * @var        string
     */
    protected $template_id;

    /**
     * The value for the jenjang_pendidikan_id field.
     * @var        string
     */
    protected $jenjang_pendidikan_id;

    /**
     * The value for the tahun_ajaran_id field.
     * @var        string
     */
    protected $tahun_ajaran_id;

    /**
     * The value for the jurusan_id field.
     * @var        string
     */
    protected $jurusan_id;

    /**
     * The value for the template_ket field.
     * @var        string
     */
    protected $template_ket;

    /**
     * The value for the mp1_id field.
     * @var        int
     */
    protected $mp1_id;

    /**
     * The value for the mp2_id field.
     * @var        int
     */
    protected $mp2_id;

    /**
     * The value for the mp3_id field.
     * @var        int
     */
    protected $mp3_id;

    /**
     * The value for the mp4_id field.
     * @var        int
     */
    protected $mp4_id;

    /**
     * The value for the mp5_id field.
     * @var        int
     */
    protected $mp5_id;

    /**
     * The value for the mp6_id field.
     * @var        int
     */
    protected $mp6_id;

    /**
     * The value for the mp7_id field.
     * @var        int
     */
    protected $mp7_id;

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
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikan;

    /**
     * @var        Jurusan
     */
    protected $aJurusan;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaranRelatedByMp3Id;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaranRelatedByMp4Id;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaranRelatedByMp7Id;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaranRelatedByMp5Id;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaranRelatedByMp1Id;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaranRelatedByMp2Id;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaranRelatedByMp6Id;

    /**
     * @var        TahunAjaran
     */
    protected $aTahunAjaran;

    /**
     * @var        PropelObjectCollection|TemplateRapor[] Collection to store aggregation of TemplateRapor objects.
     */
    protected $collTemplateRapors;
    protected $collTemplateRaporsPartial;

    /**
     * @var        PropelObjectCollection|Un[] Collection to store aggregation of Un objects.
     */
    protected $collUns;
    protected $collUnsPartial;

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
    protected $templateRaporsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $unsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseTemplateUn object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [template_id] column value.
     * 
     * @return string
     */
    public function getTemplateId()
    {
        return $this->template_id;
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
     * Get the [tahun_ajaran_id] column value.
     * 
     * @return string
     */
    public function getTahunAjaranId()
    {
        return $this->tahun_ajaran_id;
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
     * Get the [template_ket] column value.
     * 
     * @return string
     */
    public function getTemplateKet()
    {
        return $this->template_ket;
    }

    /**
     * Get the [mp1_id] column value.
     * 
     * @return int
     */
    public function getMp1Id()
    {
        return $this->mp1_id;
    }

    /**
     * Get the [mp2_id] column value.
     * 
     * @return int
     */
    public function getMp2Id()
    {
        return $this->mp2_id;
    }

    /**
     * Get the [mp3_id] column value.
     * 
     * @return int
     */
    public function getMp3Id()
    {
        return $this->mp3_id;
    }

    /**
     * Get the [mp4_id] column value.
     * 
     * @return int
     */
    public function getMp4Id()
    {
        return $this->mp4_id;
    }

    /**
     * Get the [mp5_id] column value.
     * 
     * @return int
     */
    public function getMp5Id()
    {
        return $this->mp5_id;
    }

    /**
     * Get the [mp6_id] column value.
     * 
     * @return int
     */
    public function getMp6Id()
    {
        return $this->mp6_id;
    }

    /**
     * Get the [mp7_id] column value.
     * 
     * @return int
     */
    public function getMp7Id()
    {
        return $this->mp7_id;
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
     * Set the value of [template_id] column.
     * 
     * @param string $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setTemplateId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->template_id !== $v) {
            $this->template_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::TEMPLATE_ID;
        }


        return $this;
    } // setTemplateId()

    /**
     * Set the value of [jenjang_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setJenjangPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_id !== $v) {
            $this->jenjang_pendidikan_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::JENJANG_PENDIDIKAN_ID;
        }

        if ($this->aJenjangPendidikan !== null && $this->aJenjangPendidikan->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikan = null;
        }


        return $this;
    } // setJenjangPendidikanId()

    /**
     * Set the value of [tahun_ajaran_id] column.
     * 
     * @param string $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setTahunAjaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_ajaran_id !== $v) {
            $this->tahun_ajaran_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::TAHUN_AJARAN_ID;
        }

        if ($this->aTahunAjaran !== null && $this->aTahunAjaran->getTahunAjaranId() !== $v) {
            $this->aTahunAjaran = null;
        }


        return $this;
    } // setTahunAjaranId()

    /**
     * Set the value of [jurusan_id] column.
     * 
     * @param string $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setJurusanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_id !== $v) {
            $this->jurusan_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::JURUSAN_ID;
        }

        if ($this->aJurusan !== null && $this->aJurusan->getJurusanId() !== $v) {
            $this->aJurusan = null;
        }


        return $this;
    } // setJurusanId()

    /**
     * Set the value of [template_ket] column.
     * 
     * @param string $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setTemplateKet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->template_ket !== $v) {
            $this->template_ket = $v;
            $this->modifiedColumns[] = TemplateUnPeer::TEMPLATE_KET;
        }


        return $this;
    } // setTemplateKet()

    /**
     * Set the value of [mp1_id] column.
     * 
     * @param int $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setMp1Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mp1_id !== $v) {
            $this->mp1_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::MP1_ID;
        }

        if ($this->aMataPelajaranRelatedByMp1Id !== null && $this->aMataPelajaranRelatedByMp1Id->getMataPelajaranId() !== $v) {
            $this->aMataPelajaranRelatedByMp1Id = null;
        }


        return $this;
    } // setMp1Id()

    /**
     * Set the value of [mp2_id] column.
     * 
     * @param int $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setMp2Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mp2_id !== $v) {
            $this->mp2_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::MP2_ID;
        }

        if ($this->aMataPelajaranRelatedByMp2Id !== null && $this->aMataPelajaranRelatedByMp2Id->getMataPelajaranId() !== $v) {
            $this->aMataPelajaranRelatedByMp2Id = null;
        }


        return $this;
    } // setMp2Id()

    /**
     * Set the value of [mp3_id] column.
     * 
     * @param int $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setMp3Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mp3_id !== $v) {
            $this->mp3_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::MP3_ID;
        }

        if ($this->aMataPelajaranRelatedByMp3Id !== null && $this->aMataPelajaranRelatedByMp3Id->getMataPelajaranId() !== $v) {
            $this->aMataPelajaranRelatedByMp3Id = null;
        }


        return $this;
    } // setMp3Id()

    /**
     * Set the value of [mp4_id] column.
     * 
     * @param int $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setMp4Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mp4_id !== $v) {
            $this->mp4_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::MP4_ID;
        }

        if ($this->aMataPelajaranRelatedByMp4Id !== null && $this->aMataPelajaranRelatedByMp4Id->getMataPelajaranId() !== $v) {
            $this->aMataPelajaranRelatedByMp4Id = null;
        }


        return $this;
    } // setMp4Id()

    /**
     * Set the value of [mp5_id] column.
     * 
     * @param int $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setMp5Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mp5_id !== $v) {
            $this->mp5_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::MP5_ID;
        }

        if ($this->aMataPelajaranRelatedByMp5Id !== null && $this->aMataPelajaranRelatedByMp5Id->getMataPelajaranId() !== $v) {
            $this->aMataPelajaranRelatedByMp5Id = null;
        }


        return $this;
    } // setMp5Id()

    /**
     * Set the value of [mp6_id] column.
     * 
     * @param int $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setMp6Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mp6_id !== $v) {
            $this->mp6_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::MP6_ID;
        }

        if ($this->aMataPelajaranRelatedByMp6Id !== null && $this->aMataPelajaranRelatedByMp6Id->getMataPelajaranId() !== $v) {
            $this->aMataPelajaranRelatedByMp6Id = null;
        }


        return $this;
    } // setMp6Id()

    /**
     * Set the value of [mp7_id] column.
     * 
     * @param int $v new value
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setMp7Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mp7_id !== $v) {
            $this->mp7_id = $v;
            $this->modifiedColumns[] = TemplateUnPeer::MP7_ID;
        }

        if ($this->aMataPelajaranRelatedByMp7Id !== null && $this->aMataPelajaranRelatedByMp7Id->getMataPelajaranId() !== $v) {
            $this->aMataPelajaranRelatedByMp7Id = null;
        }


        return $this;
    } // setMp7Id()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = TemplateUnPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = TemplateUnPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = TemplateUnPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TemplateUn The current object (for fluent API support)
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
                $this->modifiedColumns[] = TemplateUnPeer::LAST_SYNC;
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

            $this->template_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenjang_pendidikan_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->tahun_ajaran_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jurusan_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->template_ket = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->mp1_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->mp2_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->mp3_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->mp4_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->mp5_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->mp6_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->mp7_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->create_date = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_update = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->expired_date = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->last_sync = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 16; // 16 = TemplateUnPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TemplateUn object", $e);
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
        if ($this->aTahunAjaran !== null && $this->tahun_ajaran_id !== $this->aTahunAjaran->getTahunAjaranId()) {
            $this->aTahunAjaran = null;
        }
        if ($this->aJurusan !== null && $this->jurusan_id !== $this->aJurusan->getJurusanId()) {
            $this->aJurusan = null;
        }
        if ($this->aMataPelajaranRelatedByMp1Id !== null && $this->mp1_id !== $this->aMataPelajaranRelatedByMp1Id->getMataPelajaranId()) {
            $this->aMataPelajaranRelatedByMp1Id = null;
        }
        if ($this->aMataPelajaranRelatedByMp2Id !== null && $this->mp2_id !== $this->aMataPelajaranRelatedByMp2Id->getMataPelajaranId()) {
            $this->aMataPelajaranRelatedByMp2Id = null;
        }
        if ($this->aMataPelajaranRelatedByMp3Id !== null && $this->mp3_id !== $this->aMataPelajaranRelatedByMp3Id->getMataPelajaranId()) {
            $this->aMataPelajaranRelatedByMp3Id = null;
        }
        if ($this->aMataPelajaranRelatedByMp4Id !== null && $this->mp4_id !== $this->aMataPelajaranRelatedByMp4Id->getMataPelajaranId()) {
            $this->aMataPelajaranRelatedByMp4Id = null;
        }
        if ($this->aMataPelajaranRelatedByMp5Id !== null && $this->mp5_id !== $this->aMataPelajaranRelatedByMp5Id->getMataPelajaranId()) {
            $this->aMataPelajaranRelatedByMp5Id = null;
        }
        if ($this->aMataPelajaranRelatedByMp6Id !== null && $this->mp6_id !== $this->aMataPelajaranRelatedByMp6Id->getMataPelajaranId()) {
            $this->aMataPelajaranRelatedByMp6Id = null;
        }
        if ($this->aMataPelajaranRelatedByMp7Id !== null && $this->mp7_id !== $this->aMataPelajaranRelatedByMp7Id->getMataPelajaranId()) {
            $this->aMataPelajaranRelatedByMp7Id = null;
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
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TemplateUnPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenjangPendidikan = null;
            $this->aJurusan = null;
            $this->aMataPelajaranRelatedByMp3Id = null;
            $this->aMataPelajaranRelatedByMp4Id = null;
            $this->aMataPelajaranRelatedByMp7Id = null;
            $this->aMataPelajaranRelatedByMp5Id = null;
            $this->aMataPelajaranRelatedByMp1Id = null;
            $this->aMataPelajaranRelatedByMp2Id = null;
            $this->aMataPelajaranRelatedByMp6Id = null;
            $this->aTahunAjaran = null;
            $this->collTemplateRapors = null;

            $this->collUns = null;

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
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TemplateUnQuery::create()
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
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TemplateUnPeer::addInstanceToPool($this);
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

            if ($this->aJenjangPendidikan !== null) {
                if ($this->aJenjangPendidikan->isModified() || $this->aJenjangPendidikan->isNew()) {
                    $affectedRows += $this->aJenjangPendidikan->save($con);
                }
                $this->setJenjangPendidikan($this->aJenjangPendidikan);
            }

            if ($this->aJurusan !== null) {
                if ($this->aJurusan->isModified() || $this->aJurusan->isNew()) {
                    $affectedRows += $this->aJurusan->save($con);
                }
                $this->setJurusan($this->aJurusan);
            }

            if ($this->aMataPelajaranRelatedByMp3Id !== null) {
                if ($this->aMataPelajaranRelatedByMp3Id->isModified() || $this->aMataPelajaranRelatedByMp3Id->isNew()) {
                    $affectedRows += $this->aMataPelajaranRelatedByMp3Id->save($con);
                }
                $this->setMataPelajaranRelatedByMp3Id($this->aMataPelajaranRelatedByMp3Id);
            }

            if ($this->aMataPelajaranRelatedByMp4Id !== null) {
                if ($this->aMataPelajaranRelatedByMp4Id->isModified() || $this->aMataPelajaranRelatedByMp4Id->isNew()) {
                    $affectedRows += $this->aMataPelajaranRelatedByMp4Id->save($con);
                }
                $this->setMataPelajaranRelatedByMp4Id($this->aMataPelajaranRelatedByMp4Id);
            }

            if ($this->aMataPelajaranRelatedByMp7Id !== null) {
                if ($this->aMataPelajaranRelatedByMp7Id->isModified() || $this->aMataPelajaranRelatedByMp7Id->isNew()) {
                    $affectedRows += $this->aMataPelajaranRelatedByMp7Id->save($con);
                }
                $this->setMataPelajaranRelatedByMp7Id($this->aMataPelajaranRelatedByMp7Id);
            }

            if ($this->aMataPelajaranRelatedByMp5Id !== null) {
                if ($this->aMataPelajaranRelatedByMp5Id->isModified() || $this->aMataPelajaranRelatedByMp5Id->isNew()) {
                    $affectedRows += $this->aMataPelajaranRelatedByMp5Id->save($con);
                }
                $this->setMataPelajaranRelatedByMp5Id($this->aMataPelajaranRelatedByMp5Id);
            }

            if ($this->aMataPelajaranRelatedByMp1Id !== null) {
                if ($this->aMataPelajaranRelatedByMp1Id->isModified() || $this->aMataPelajaranRelatedByMp1Id->isNew()) {
                    $affectedRows += $this->aMataPelajaranRelatedByMp1Id->save($con);
                }
                $this->setMataPelajaranRelatedByMp1Id($this->aMataPelajaranRelatedByMp1Id);
            }

            if ($this->aMataPelajaranRelatedByMp2Id !== null) {
                if ($this->aMataPelajaranRelatedByMp2Id->isModified() || $this->aMataPelajaranRelatedByMp2Id->isNew()) {
                    $affectedRows += $this->aMataPelajaranRelatedByMp2Id->save($con);
                }
                $this->setMataPelajaranRelatedByMp2Id($this->aMataPelajaranRelatedByMp2Id);
            }

            if ($this->aMataPelajaranRelatedByMp6Id !== null) {
                if ($this->aMataPelajaranRelatedByMp6Id->isModified() || $this->aMataPelajaranRelatedByMp6Id->isNew()) {
                    $affectedRows += $this->aMataPelajaranRelatedByMp6Id->save($con);
                }
                $this->setMataPelajaranRelatedByMp6Id($this->aMataPelajaranRelatedByMp6Id);
            }

            if ($this->aTahunAjaran !== null) {
                if ($this->aTahunAjaran->isModified() || $this->aTahunAjaran->isNew()) {
                    $affectedRows += $this->aTahunAjaran->save($con);
                }
                $this->setTahunAjaran($this->aTahunAjaran);
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

            if ($this->templateRaporsScheduledForDeletion !== null) {
                if (!$this->templateRaporsScheduledForDeletion->isEmpty()) {
                    TemplateRaporQuery::create()
                        ->filterByPrimaryKeys($this->templateRaporsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->templateRaporsScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateRapors !== null) {
                foreach ($this->collTemplateRapors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->unsScheduledForDeletion !== null) {
                if (!$this->unsScheduledForDeletion->isEmpty()) {
                    UnQuery::create()
                        ->filterByPrimaryKeys($this->unsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->unsScheduledForDeletion = null;
                }
            }

            if ($this->collUns !== null) {
                foreach ($this->collUns as $referrerFK) {
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
        if ($this->isColumnModified(TemplateUnPeer::TEMPLATE_ID)) {
            $modifiedColumns[':p' . $index++]  = '"template_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::JENJANG_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::TAHUN_AJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_ajaran_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::JURUSAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::TEMPLATE_KET)) {
            $modifiedColumns[':p' . $index++]  = '"template_ket"';
        }
        if ($this->isColumnModified(TemplateUnPeer::MP1_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mp1_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::MP2_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mp2_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::MP3_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mp3_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::MP4_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mp4_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::MP5_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mp5_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::MP6_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mp6_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::MP7_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mp7_id"';
        }
        if ($this->isColumnModified(TemplateUnPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(TemplateUnPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(TemplateUnPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(TemplateUnPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."template_un" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"template_id"':						
                        $stmt->bindValue($identifier, $this->template_id, PDO::PARAM_STR);
                        break;
                    case '"jenjang_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"tahun_ajaran_id"':						
                        $stmt->bindValue($identifier, $this->tahun_ajaran_id, PDO::PARAM_STR);
                        break;
                    case '"jurusan_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_id, PDO::PARAM_STR);
                        break;
                    case '"template_ket"':						
                        $stmt->bindValue($identifier, $this->template_ket, PDO::PARAM_STR);
                        break;
                    case '"mp1_id"':						
                        $stmt->bindValue($identifier, $this->mp1_id, PDO::PARAM_INT);
                        break;
                    case '"mp2_id"':						
                        $stmt->bindValue($identifier, $this->mp2_id, PDO::PARAM_INT);
                        break;
                    case '"mp3_id"':						
                        $stmt->bindValue($identifier, $this->mp3_id, PDO::PARAM_INT);
                        break;
                    case '"mp4_id"':						
                        $stmt->bindValue($identifier, $this->mp4_id, PDO::PARAM_INT);
                        break;
                    case '"mp5_id"':						
                        $stmt->bindValue($identifier, $this->mp5_id, PDO::PARAM_INT);
                        break;
                    case '"mp6_id"':						
                        $stmt->bindValue($identifier, $this->mp6_id, PDO::PARAM_INT);
                        break;
                    case '"mp7_id"':						
                        $stmt->bindValue($identifier, $this->mp7_id, PDO::PARAM_INT);
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

            if ($this->aJenjangPendidikan !== null) {
                if (!$this->aJenjangPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikan->getValidationFailures());
                }
            }

            if ($this->aJurusan !== null) {
                if (!$this->aJurusan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJurusan->getValidationFailures());
                }
            }

            if ($this->aMataPelajaranRelatedByMp3Id !== null) {
                if (!$this->aMataPelajaranRelatedByMp3Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaranRelatedByMp3Id->getValidationFailures());
                }
            }

            if ($this->aMataPelajaranRelatedByMp4Id !== null) {
                if (!$this->aMataPelajaranRelatedByMp4Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaranRelatedByMp4Id->getValidationFailures());
                }
            }

            if ($this->aMataPelajaranRelatedByMp7Id !== null) {
                if (!$this->aMataPelajaranRelatedByMp7Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaranRelatedByMp7Id->getValidationFailures());
                }
            }

            if ($this->aMataPelajaranRelatedByMp5Id !== null) {
                if (!$this->aMataPelajaranRelatedByMp5Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaranRelatedByMp5Id->getValidationFailures());
                }
            }

            if ($this->aMataPelajaranRelatedByMp1Id !== null) {
                if (!$this->aMataPelajaranRelatedByMp1Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaranRelatedByMp1Id->getValidationFailures());
                }
            }

            if ($this->aMataPelajaranRelatedByMp2Id !== null) {
                if (!$this->aMataPelajaranRelatedByMp2Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaranRelatedByMp2Id->getValidationFailures());
                }
            }

            if ($this->aMataPelajaranRelatedByMp6Id !== null) {
                if (!$this->aMataPelajaranRelatedByMp6Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaranRelatedByMp6Id->getValidationFailures());
                }
            }

            if ($this->aTahunAjaran !== null) {
                if (!$this->aTahunAjaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTahunAjaran->getValidationFailures());
                }
            }


            if (($retval = TemplateUnPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collTemplateRapors !== null) {
                    foreach ($this->collTemplateRapors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUns !== null) {
                    foreach ($this->collUns as $referrerFK) {
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
        $pos = TemplateUnPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTemplateId();
                break;
            case 1:
                return $this->getJenjangPendidikanId();
                break;
            case 2:
                return $this->getTahunAjaranId();
                break;
            case 3:
                return $this->getJurusanId();
                break;
            case 4:
                return $this->getTemplateKet();
                break;
            case 5:
                return $this->getMp1Id();
                break;
            case 6:
                return $this->getMp2Id();
                break;
            case 7:
                return $this->getMp3Id();
                break;
            case 8:
                return $this->getMp4Id();
                break;
            case 9:
                return $this->getMp5Id();
                break;
            case 10:
                return $this->getMp6Id();
                break;
            case 11:
                return $this->getMp7Id();
                break;
            case 12:
                return $this->getCreateDate();
                break;
            case 13:
                return $this->getLastUpdate();
                break;
            case 14:
                return $this->getExpiredDate();
                break;
            case 15:
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
        if (isset($alreadyDumpedObjects['TemplateUn'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TemplateUn'][$this->getPrimaryKey()] = true;
        $keys = TemplateUnPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTemplateId(),
            $keys[1] => $this->getJenjangPendidikanId(),
            $keys[2] => $this->getTahunAjaranId(),
            $keys[3] => $this->getJurusanId(),
            $keys[4] => $this->getTemplateKet(),
            $keys[5] => $this->getMp1Id(),
            $keys[6] => $this->getMp2Id(),
            $keys[7] => $this->getMp3Id(),
            $keys[8] => $this->getMp4Id(),
            $keys[9] => $this->getMp5Id(),
            $keys[10] => $this->getMp6Id(),
            $keys[11] => $this->getMp7Id(),
            $keys[12] => $this->getCreateDate(),
            $keys[13] => $this->getLastUpdate(),
            $keys[14] => $this->getExpiredDate(),
            $keys[15] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenjangPendidikan) {
                $result['JenjangPendidikan'] = $this->aJenjangPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJurusan) {
                $result['Jurusan'] = $this->aJurusan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaranRelatedByMp3Id) {
                $result['MataPelajaranRelatedByMp3Id'] = $this->aMataPelajaranRelatedByMp3Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaranRelatedByMp4Id) {
                $result['MataPelajaranRelatedByMp4Id'] = $this->aMataPelajaranRelatedByMp4Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaranRelatedByMp7Id) {
                $result['MataPelajaranRelatedByMp7Id'] = $this->aMataPelajaranRelatedByMp7Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaranRelatedByMp5Id) {
                $result['MataPelajaranRelatedByMp5Id'] = $this->aMataPelajaranRelatedByMp5Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaranRelatedByMp1Id) {
                $result['MataPelajaranRelatedByMp1Id'] = $this->aMataPelajaranRelatedByMp1Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaranRelatedByMp2Id) {
                $result['MataPelajaranRelatedByMp2Id'] = $this->aMataPelajaranRelatedByMp2Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaranRelatedByMp6Id) {
                $result['MataPelajaranRelatedByMp6Id'] = $this->aMataPelajaranRelatedByMp6Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTahunAjaran) {
                $result['TahunAjaran'] = $this->aTahunAjaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTemplateRapors) {
                $result['TemplateRapors'] = $this->collTemplateRapors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUns) {
                $result['Uns'] = $this->collUns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TemplateUnPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTemplateId($value);
                break;
            case 1:
                $this->setJenjangPendidikanId($value);
                break;
            case 2:
                $this->setTahunAjaranId($value);
                break;
            case 3:
                $this->setJurusanId($value);
                break;
            case 4:
                $this->setTemplateKet($value);
                break;
            case 5:
                $this->setMp1Id($value);
                break;
            case 6:
                $this->setMp2Id($value);
                break;
            case 7:
                $this->setMp3Id($value);
                break;
            case 8:
                $this->setMp4Id($value);
                break;
            case 9:
                $this->setMp5Id($value);
                break;
            case 10:
                $this->setMp6Id($value);
                break;
            case 11:
                $this->setMp7Id($value);
                break;
            case 12:
                $this->setCreateDate($value);
                break;
            case 13:
                $this->setLastUpdate($value);
                break;
            case 14:
                $this->setExpiredDate($value);
                break;
            case 15:
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
        $keys = TemplateUnPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTemplateId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenjangPendidikanId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTahunAjaranId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJurusanId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTemplateKet($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMp1Id($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMp2Id($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMp3Id($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setMp4Id($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setMp5Id($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setMp6Id($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setMp7Id($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setCreateDate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastUpdate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setExpiredDate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLastSync($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TemplateUnPeer::DATABASE_NAME);

        if ($this->isColumnModified(TemplateUnPeer::TEMPLATE_ID)) $criteria->add(TemplateUnPeer::TEMPLATE_ID, $this->template_id);
        if ($this->isColumnModified(TemplateUnPeer::JENJANG_PENDIDIKAN_ID)) $criteria->add(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);
        if ($this->isColumnModified(TemplateUnPeer::TAHUN_AJARAN_ID)) $criteria->add(TemplateUnPeer::TAHUN_AJARAN_ID, $this->tahun_ajaran_id);
        if ($this->isColumnModified(TemplateUnPeer::JURUSAN_ID)) $criteria->add(TemplateUnPeer::JURUSAN_ID, $this->jurusan_id);
        if ($this->isColumnModified(TemplateUnPeer::TEMPLATE_KET)) $criteria->add(TemplateUnPeer::TEMPLATE_KET, $this->template_ket);
        if ($this->isColumnModified(TemplateUnPeer::MP1_ID)) $criteria->add(TemplateUnPeer::MP1_ID, $this->mp1_id);
        if ($this->isColumnModified(TemplateUnPeer::MP2_ID)) $criteria->add(TemplateUnPeer::MP2_ID, $this->mp2_id);
        if ($this->isColumnModified(TemplateUnPeer::MP3_ID)) $criteria->add(TemplateUnPeer::MP3_ID, $this->mp3_id);
        if ($this->isColumnModified(TemplateUnPeer::MP4_ID)) $criteria->add(TemplateUnPeer::MP4_ID, $this->mp4_id);
        if ($this->isColumnModified(TemplateUnPeer::MP5_ID)) $criteria->add(TemplateUnPeer::MP5_ID, $this->mp5_id);
        if ($this->isColumnModified(TemplateUnPeer::MP6_ID)) $criteria->add(TemplateUnPeer::MP6_ID, $this->mp6_id);
        if ($this->isColumnModified(TemplateUnPeer::MP7_ID)) $criteria->add(TemplateUnPeer::MP7_ID, $this->mp7_id);
        if ($this->isColumnModified(TemplateUnPeer::CREATE_DATE)) $criteria->add(TemplateUnPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(TemplateUnPeer::LAST_UPDATE)) $criteria->add(TemplateUnPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(TemplateUnPeer::EXPIRED_DATE)) $criteria->add(TemplateUnPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(TemplateUnPeer::LAST_SYNC)) $criteria->add(TemplateUnPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(TemplateUnPeer::DATABASE_NAME);
        $criteria->add(TemplateUnPeer::TEMPLATE_ID, $this->template_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getTemplateId();
    }

    /**
     * Generic method to set the primary key (template_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTemplateId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTemplateId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of TemplateUn (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenjangPendidikanId($this->getJenjangPendidikanId());
        $copyObj->setTahunAjaranId($this->getTahunAjaranId());
        $copyObj->setJurusanId($this->getJurusanId());
        $copyObj->setTemplateKet($this->getTemplateKet());
        $copyObj->setMp1Id($this->getMp1Id());
        $copyObj->setMp2Id($this->getMp2Id());
        $copyObj->setMp3Id($this->getMp3Id());
        $copyObj->setMp4Id($this->getMp4Id());
        $copyObj->setMp5Id($this->getMp5Id());
        $copyObj->setMp6Id($this->getMp6Id());
        $copyObj->setMp7Id($this->getMp7Id());
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

            foreach ($this->getTemplateRapors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateRapor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUn($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTemplateId(NULL); // this is a auto-increment column, so set to default value
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
     * @return TemplateUn Clone of current object.
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
     * @return TemplateUnPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TemplateUnPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return TemplateUn The current object (for fluent API support)
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
            $v->addTemplateUn($this);
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
                $this->aJenjangPendidikan->addTemplateUns($this);
             */
        }

        return $this->aJenjangPendidikan;
    }

    /**
     * Declares an association between this object and a Jurusan object.
     *
     * @param             Jurusan $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJurusan(Jurusan $v = null)
    {
        if ($v === null) {
            $this->setJurusanId(NULL);
        } else {
            $this->setJurusanId($v->getJurusanId());
        }

        $this->aJurusan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Jurusan object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUn($this);
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
    public function getJurusan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJurusan === null && (($this->jurusan_id !== "" && $this->jurusan_id !== null)) && $doQuery) {
            $this->aJurusan = JurusanQuery::create()->findPk($this->jurusan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJurusan->addTemplateUns($this);
             */
        }

        return $this->aJurusan;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaranRelatedByMp3Id(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMp3Id(NULL);
        } else {
            $this->setMp3Id($v->getMataPelajaranId());
        }

        $this->aMataPelajaranRelatedByMp3Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUnRelatedByMp3Id($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaranRelatedByMp3Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaranRelatedByMp3Id === null && ($this->mp3_id !== null) && $doQuery) {
            $this->aMataPelajaranRelatedByMp3Id = MataPelajaranQuery::create()->findPk($this->mp3_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaranRelatedByMp3Id->addTemplateUnsRelatedByMp3Id($this);
             */
        }

        return $this->aMataPelajaranRelatedByMp3Id;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaranRelatedByMp4Id(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMp4Id(NULL);
        } else {
            $this->setMp4Id($v->getMataPelajaranId());
        }

        $this->aMataPelajaranRelatedByMp4Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUnRelatedByMp4Id($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaranRelatedByMp4Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaranRelatedByMp4Id === null && ($this->mp4_id !== null) && $doQuery) {
            $this->aMataPelajaranRelatedByMp4Id = MataPelajaranQuery::create()->findPk($this->mp4_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaranRelatedByMp4Id->addTemplateUnsRelatedByMp4Id($this);
             */
        }

        return $this->aMataPelajaranRelatedByMp4Id;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaranRelatedByMp7Id(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMp7Id(NULL);
        } else {
            $this->setMp7Id($v->getMataPelajaranId());
        }

        $this->aMataPelajaranRelatedByMp7Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUnRelatedByMp7Id($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaranRelatedByMp7Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaranRelatedByMp7Id === null && ($this->mp7_id !== null) && $doQuery) {
            $this->aMataPelajaranRelatedByMp7Id = MataPelajaranQuery::create()->findPk($this->mp7_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaranRelatedByMp7Id->addTemplateUnsRelatedByMp7Id($this);
             */
        }

        return $this->aMataPelajaranRelatedByMp7Id;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaranRelatedByMp5Id(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMp5Id(NULL);
        } else {
            $this->setMp5Id($v->getMataPelajaranId());
        }

        $this->aMataPelajaranRelatedByMp5Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUnRelatedByMp5Id($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaranRelatedByMp5Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaranRelatedByMp5Id === null && ($this->mp5_id !== null) && $doQuery) {
            $this->aMataPelajaranRelatedByMp5Id = MataPelajaranQuery::create()->findPk($this->mp5_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaranRelatedByMp5Id->addTemplateUnsRelatedByMp5Id($this);
             */
        }

        return $this->aMataPelajaranRelatedByMp5Id;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaranRelatedByMp1Id(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMp1Id(NULL);
        } else {
            $this->setMp1Id($v->getMataPelajaranId());
        }

        $this->aMataPelajaranRelatedByMp1Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUnRelatedByMp1Id($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaranRelatedByMp1Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaranRelatedByMp1Id === null && ($this->mp1_id !== null) && $doQuery) {
            $this->aMataPelajaranRelatedByMp1Id = MataPelajaranQuery::create()->findPk($this->mp1_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaranRelatedByMp1Id->addTemplateUnsRelatedByMp1Id($this);
             */
        }

        return $this->aMataPelajaranRelatedByMp1Id;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaranRelatedByMp2Id(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMp2Id(NULL);
        } else {
            $this->setMp2Id($v->getMataPelajaranId());
        }

        $this->aMataPelajaranRelatedByMp2Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUnRelatedByMp2Id($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaranRelatedByMp2Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaranRelatedByMp2Id === null && ($this->mp2_id !== null) && $doQuery) {
            $this->aMataPelajaranRelatedByMp2Id = MataPelajaranQuery::create()->findPk($this->mp2_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaranRelatedByMp2Id->addTemplateUnsRelatedByMp2Id($this);
             */
        }

        return $this->aMataPelajaranRelatedByMp2Id;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return TemplateUn The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaranRelatedByMp6Id(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMp6Id(NULL);
        } else {
            $this->setMp6Id($v->getMataPelajaranId());
        }

        $this->aMataPelajaranRelatedByMp6Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addTemplateUnRelatedByMp6Id($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaranRelatedByMp6Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaranRelatedByMp6Id === null && ($this->mp6_id !== null) && $doQuery) {
            $this->aMataPelajaranRelatedByMp6Id = MataPelajaranQuery::create()->findPk($this->mp6_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaranRelatedByMp6Id->addTemplateUnsRelatedByMp6Id($this);
             */
        }

        return $this->aMataPelajaranRelatedByMp6Id;
    }

    /**
     * Declares an association between this object and a TahunAjaran object.
     *
     * @param             TahunAjaran $v
     * @return TemplateUn The current object (for fluent API support)
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
            $v->addTemplateUn($this);
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
                $this->aTahunAjaran->addTemplateUns($this);
             */
        }

        return $this->aTahunAjaran;
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
        if ('TemplateRapor' == $relationName) {
            $this->initTemplateRapors();
        }
        if ('Un' == $relationName) {
            $this->initUns();
        }
    }

    /**
     * Clears out the collTemplateRapors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TemplateUn The current object (for fluent API support)
     * @see        addTemplateRapors()
     */
    public function clearTemplateRapors()
    {
        $this->collTemplateRapors = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateRaporsPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateRapors collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateRapors($v = true)
    {
        $this->collTemplateRaporsPartial = $v;
    }

    /**
     * Initializes the collTemplateRapors collection.
     *
     * By default this just sets the collTemplateRapors collection to an empty array (like clearcollTemplateRapors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateRapors($overrideExisting = true)
    {
        if (null !== $this->collTemplateRapors && !$overrideExisting) {
            return;
        }
        $this->collTemplateRapors = new PropelObjectCollection();
        $this->collTemplateRapors->setModel('TemplateRapor');
    }

    /**
     * Gets an array of TemplateRapor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TemplateUn is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateRapor[] List of TemplateRapor objects
     * @throws PropelException
     */
    public function getTemplateRapors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateRaporsPartial && !$this->isNew();
        if (null === $this->collTemplateRapors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateRapors) {
                // return empty collection
                $this->initTemplateRapors();
            } else {
                $collTemplateRapors = TemplateRaporQuery::create(null, $criteria)
                    ->filterByTemplateUn($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateRaporsPartial && count($collTemplateRapors)) {
                      $this->initTemplateRapors(false);

                      foreach($collTemplateRapors as $obj) {
                        if (false == $this->collTemplateRapors->contains($obj)) {
                          $this->collTemplateRapors->append($obj);
                        }
                      }

                      $this->collTemplateRaporsPartial = true;
                    }

                    $collTemplateRapors->getInternalIterator()->rewind();
                    return $collTemplateRapors;
                }

                if($partial && $this->collTemplateRapors) {
                    foreach($this->collTemplateRapors as $obj) {
                        if($obj->isNew()) {
                            $collTemplateRapors[] = $obj;
                        }
                    }
                }

                $this->collTemplateRapors = $collTemplateRapors;
                $this->collTemplateRaporsPartial = false;
            }
        }

        return $this->collTemplateRapors;
    }

    /**
     * Sets a collection of TemplateRapor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateRapors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setTemplateRapors(PropelCollection $templateRapors, PropelPDO $con = null)
    {
        $templateRaporsToDelete = $this->getTemplateRapors(new Criteria(), $con)->diff($templateRapors);

        $this->templateRaporsScheduledForDeletion = unserialize(serialize($templateRaporsToDelete));

        foreach ($templateRaporsToDelete as $templateRaporRemoved) {
            $templateRaporRemoved->setTemplateUn(null);
        }

        $this->collTemplateRapors = null;
        foreach ($templateRapors as $templateRapor) {
            $this->addTemplateRapor($templateRapor);
        }

        $this->collTemplateRapors = $templateRapors;
        $this->collTemplateRaporsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TemplateRapor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TemplateRapor objects.
     * @throws PropelException
     */
    public function countTemplateRapors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateRaporsPartial && !$this->isNew();
        if (null === $this->collTemplateRapors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateRapors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateRapors());
            }
            $query = TemplateRaporQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTemplateUn($this)
                ->count($con);
        }

        return count($this->collTemplateRapors);
    }

    /**
     * Method called to associate a TemplateRapor object to this object
     * through the TemplateRapor foreign key attribute.
     *
     * @param    TemplateRapor $l TemplateRapor
     * @return TemplateUn The current object (for fluent API support)
     */
    public function addTemplateRapor(TemplateRapor $l)
    {
        if ($this->collTemplateRapors === null) {
            $this->initTemplateRapors();
            $this->collTemplateRaporsPartial = true;
        }
        if (!in_array($l, $this->collTemplateRapors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateRapor($l);
        }

        return $this;
    }

    /**
     * @param	TemplateRapor $templateRapor The templateRapor object to add.
     */
    protected function doAddTemplateRapor($templateRapor)
    {
        $this->collTemplateRapors[]= $templateRapor;
        $templateRapor->setTemplateUn($this);
    }

    /**
     * @param	TemplateRapor $templateRapor The templateRapor object to remove.
     * @return TemplateUn The current object (for fluent API support)
     */
    public function removeTemplateRapor($templateRapor)
    {
        if ($this->getTemplateRapors()->contains($templateRapor)) {
            $this->collTemplateRapors->remove($this->collTemplateRapors->search($templateRapor));
            if (null === $this->templateRaporsScheduledForDeletion) {
                $this->templateRaporsScheduledForDeletion = clone $this->collTemplateRapors;
                $this->templateRaporsScheduledForDeletion->clear();
            }
            $this->templateRaporsScheduledForDeletion[]= clone $templateRapor;
            $templateRapor->setTemplateUn(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TemplateUn is new, it will return
     * an empty collection; or if this TemplateUn has previously
     * been saved, it will retrieve related TemplateRapors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TemplateUn.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateRapor[] List of TemplateRapor objects
     */
    public function getTemplateRaporsJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateRaporQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getTemplateRapors($query, $con);
    }

    /**
     * Clears out the collUns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TemplateUn The current object (for fluent API support)
     * @see        addUns()
     */
    public function clearUns()
    {
        $this->collUns = null; // important to set this to null since that means it is uninitialized
        $this->collUnsPartial = null;

        return $this;
    }

    /**
     * reset is the collUns collection loaded partially
     *
     * @return void
     */
    public function resetPartialUns($v = true)
    {
        $this->collUnsPartial = $v;
    }

    /**
     * Initializes the collUns collection.
     *
     * By default this just sets the collUns collection to an empty array (like clearcollUns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUns($overrideExisting = true)
    {
        if (null !== $this->collUns && !$overrideExisting) {
            return;
        }
        $this->collUns = new PropelObjectCollection();
        $this->collUns->setModel('Un');
    }

    /**
     * Gets an array of Un objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TemplateUn is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Un[] List of Un objects
     * @throws PropelException
     */
    public function getUns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUnsPartial && !$this->isNew();
        if (null === $this->collUns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUns) {
                // return empty collection
                $this->initUns();
            } else {
                $collUns = UnQuery::create(null, $criteria)
                    ->filterByTemplateUn($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUnsPartial && count($collUns)) {
                      $this->initUns(false);

                      foreach($collUns as $obj) {
                        if (false == $this->collUns->contains($obj)) {
                          $this->collUns->append($obj);
                        }
                      }

                      $this->collUnsPartial = true;
                    }

                    $collUns->getInternalIterator()->rewind();
                    return $collUns;
                }

                if($partial && $this->collUns) {
                    foreach($this->collUns as $obj) {
                        if($obj->isNew()) {
                            $collUns[] = $obj;
                        }
                    }
                }

                $this->collUns = $collUns;
                $this->collUnsPartial = false;
            }
        }

        return $this->collUns;
    }

    /**
     * Sets a collection of Un objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $uns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TemplateUn The current object (for fluent API support)
     */
    public function setUns(PropelCollection $uns, PropelPDO $con = null)
    {
        $unsToDelete = $this->getUns(new Criteria(), $con)->diff($uns);

        $this->unsScheduledForDeletion = unserialize(serialize($unsToDelete));

        foreach ($unsToDelete as $unRemoved) {
            $unRemoved->setTemplateUn(null);
        }

        $this->collUns = null;
        foreach ($uns as $un) {
            $this->addUn($un);
        }

        $this->collUns = $uns;
        $this->collUnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Un objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Un objects.
     * @throws PropelException
     */
    public function countUns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUnsPartial && !$this->isNew();
        if (null === $this->collUns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getUns());
            }
            $query = UnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTemplateUn($this)
                ->count($con);
        }

        return count($this->collUns);
    }

    /**
     * Method called to associate a Un object to this object
     * through the Un foreign key attribute.
     *
     * @param    Un $l Un
     * @return TemplateUn The current object (for fluent API support)
     */
    public function addUn(Un $l)
    {
        if ($this->collUns === null) {
            $this->initUns();
            $this->collUnsPartial = true;
        }
        if (!in_array($l, $this->collUns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUn($l);
        }

        return $this;
    }

    /**
     * @param	Un $un The un object to add.
     */
    protected function doAddUn($un)
    {
        $this->collUns[]= $un;
        $un->setTemplateUn($this);
    }

    /**
     * @param	Un $un The un object to remove.
     * @return TemplateUn The current object (for fluent API support)
     */
    public function removeUn($un)
    {
        if ($this->getUns()->contains($un)) {
            $this->collUns->remove($this->collUns->search($un));
            if (null === $this->unsScheduledForDeletion) {
                $this->unsScheduledForDeletion = clone $this->collUns;
                $this->unsScheduledForDeletion->clear();
            }
            $this->unsScheduledForDeletion[]= clone $un;
            $un->setTemplateUn(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TemplateUn is new, it will return
     * an empty collection; or if this TemplateUn has previously
     * been saved, it will retrieve related Uns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TemplateUn.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Un[] List of Un objects
     */
    public function getUnsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getUns($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->template_id = null;
        $this->jenjang_pendidikan_id = null;
        $this->tahun_ajaran_id = null;
        $this->jurusan_id = null;
        $this->template_ket = null;
        $this->mp1_id = null;
        $this->mp2_id = null;
        $this->mp3_id = null;
        $this->mp4_id = null;
        $this->mp5_id = null;
        $this->mp6_id = null;
        $this->mp7_id = null;
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
            if ($this->collTemplateRapors) {
                foreach ($this->collTemplateRapors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUns) {
                foreach ($this->collUns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenjangPendidikan instanceof Persistent) {
              $this->aJenjangPendidikan->clearAllReferences($deep);
            }
            if ($this->aJurusan instanceof Persistent) {
              $this->aJurusan->clearAllReferences($deep);
            }
            if ($this->aMataPelajaranRelatedByMp3Id instanceof Persistent) {
              $this->aMataPelajaranRelatedByMp3Id->clearAllReferences($deep);
            }
            if ($this->aMataPelajaranRelatedByMp4Id instanceof Persistent) {
              $this->aMataPelajaranRelatedByMp4Id->clearAllReferences($deep);
            }
            if ($this->aMataPelajaranRelatedByMp7Id instanceof Persistent) {
              $this->aMataPelajaranRelatedByMp7Id->clearAllReferences($deep);
            }
            if ($this->aMataPelajaranRelatedByMp5Id instanceof Persistent) {
              $this->aMataPelajaranRelatedByMp5Id->clearAllReferences($deep);
            }
            if ($this->aMataPelajaranRelatedByMp1Id instanceof Persistent) {
              $this->aMataPelajaranRelatedByMp1Id->clearAllReferences($deep);
            }
            if ($this->aMataPelajaranRelatedByMp2Id instanceof Persistent) {
              $this->aMataPelajaranRelatedByMp2Id->clearAllReferences($deep);
            }
            if ($this->aMataPelajaranRelatedByMp6Id instanceof Persistent) {
              $this->aMataPelajaranRelatedByMp6Id->clearAllReferences($deep);
            }
            if ($this->aTahunAjaran instanceof Persistent) {
              $this->aTahunAjaran->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collTemplateRapors instanceof PropelCollection) {
            $this->collTemplateRapors->clearIterator();
        }
        $this->collTemplateRapors = null;
        if ($this->collUns instanceof PropelCollection) {
            $this->collUns->clearIterator();
        }
        $this->collUns = null;
        $this->aJenjangPendidikan = null;
        $this->aJurusan = null;
        $this->aMataPelajaranRelatedByMp3Id = null;
        $this->aMataPelajaranRelatedByMp4Id = null;
        $this->aMataPelajaranRelatedByMp7Id = null;
        $this->aMataPelajaranRelatedByMp5Id = null;
        $this->aMataPelajaranRelatedByMp1Id = null;
        $this->aMataPelajaranRelatedByMp2Id = null;
        $this->aMataPelajaranRelatedByMp6Id = null;
        $this->aTahunAjaran = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TemplateUnPeer::DEFAULT_STRING_FORMAT);
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
