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
use DataDikdas\Model\JenisLembaga;
use DataDikdas\Model\JenisLembagaQuery;
use DataDikdas\Model\JenisPtk;
use DataDikdas\Model\JenisPtkQuery;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyKerjaPeer;
use DataDikdas\Model\RwyKerjaQuery;
use DataDikdas\Model\StatusKepegawaian;
use DataDikdas\Model\StatusKepegawaianQuery;
use DataDikdas\Model\VldRwyKerja;
use DataDikdas\Model\VldRwyKerjaQuery;

/**
 * Base class that represents a row from the 'rwy_kerja' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyKerja extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RwyKerjaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RwyKerjaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the rwy_kerja_id field.
     * @var        string
     */
    protected $rwy_kerja_id;

    /**
     * The value for the jenjang_pendidikan_id field.
     * @var        string
     */
    protected $jenjang_pendidikan_id;

    /**
     * The value for the jenis_lembaga_id field.
     * @var        string
     */
    protected $jenis_lembaga_id;

    /**
     * The value for the status_kepegawaian_id field.
     * @var        int
     */
    protected $status_kepegawaian_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the jenis_ptk_id field.
     * @var        string
     */
    protected $jenis_ptk_id;

    /**
     * The value for the lembaga_pengangkat field.
     * @var        string
     */
    protected $lembaga_pengangkat;

    /**
     * The value for the no_sk_kerja field.
     * @var        string
     */
    protected $no_sk_kerja;

    /**
     * The value for the tgl_sk_kerja field.
     * @var        string
     */
    protected $tgl_sk_kerja;

    /**
     * The value for the tmt_kerja field.
     * @var        string
     */
    protected $tmt_kerja;

    /**
     * The value for the tst_kerja field.
     * @var        string
     */
    protected $tst_kerja;

    /**
     * The value for the tempat_kerja field.
     * @var        string
     */
    protected $tempat_kerja;

    /**
     * The value for the ttd_sk_kerja field.
     * @var        string
     */
    protected $ttd_sk_kerja;

    /**
     * The value for the mapel_diajarkan field.
     * @var        string
     */
    protected $mapel_diajarkan;

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
     * @var        JenisLembaga
     */
    protected $aJenisLembaga;

    /**
     * @var        JenisPtk
     */
    protected $aJenisPtk;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        StatusKepegawaian
     */
    protected $aStatusKepegawaian;

    /**
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikan;

    /**
     * @var        PropelObjectCollection|VldRwyKerja[] Collection to store aggregation of VldRwyKerja objects.
     */
    protected $collVldRwyKerjas;
    protected $collVldRwyKerjasPartial;

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
    protected $vldRwyKerjasScheduledForDeletion = null;

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
     * Initializes internal state of BaseRwyKerja object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [rwy_kerja_id] column value.
     * 
     * @return string
     */
    public function getRwyKerjaId()
    {
        return $this->rwy_kerja_id;
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
     * Get the [jenis_lembaga_id] column value.
     * 
     * @return string
     */
    public function getJenisLembagaId()
    {
        return $this->jenis_lembaga_id;
    }

    /**
     * Get the [status_kepegawaian_id] column value.
     * 
     * @return int
     */
    public function getStatusKepegawaianId()
    {
        return $this->status_kepegawaian_id;
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
     * Get the [jenis_ptk_id] column value.
     * 
     * @return string
     */
    public function getJenisPtkId()
    {
        return $this->jenis_ptk_id;
    }

    /**
     * Get the [lembaga_pengangkat] column value.
     * 
     * @return string
     */
    public function getLembagaPengangkat()
    {
        return $this->lembaga_pengangkat;
    }

    /**
     * Get the [no_sk_kerja] column value.
     * 
     * @return string
     */
    public function getNoSkKerja()
    {
        return $this->no_sk_kerja;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_sk_kerja] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglSkKerja($format = '%Y-%m-%d')
    {
        if ($this->tgl_sk_kerja === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_sk_kerja);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_sk_kerja, true), $x);
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
     * Get the [optionally formatted] temporal [tmt_kerja] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtKerja($format = '%Y-%m-%d')
    {
        if ($this->tmt_kerja === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_kerja);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_kerja, true), $x);
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
     * Get the [optionally formatted] temporal [tst_kerja] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTstKerja($format = '%Y-%m-%d')
    {
        if ($this->tst_kerja === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tst_kerja);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tst_kerja, true), $x);
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
     * Get the [tempat_kerja] column value.
     * 
     * @return string
     */
    public function getTempatKerja()
    {
        return $this->tempat_kerja;
    }

    /**
     * Get the [ttd_sk_kerja] column value.
     * 
     * @return string
     */
    public function getTtdSkKerja()
    {
        return $this->ttd_sk_kerja;
    }

    /**
     * Get the [mapel_diajarkan] column value.
     * 
     * @return string
     */
    public function getMapelDiajarkan()
    {
        return $this->mapel_diajarkan;
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
     * Set the value of [rwy_kerja_id] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setRwyKerjaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rwy_kerja_id !== $v) {
            $this->rwy_kerja_id = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::RWY_KERJA_ID;
        }


        return $this;
    } // setRwyKerjaId()

    /**
     * Set the value of [jenjang_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setJenjangPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_id !== $v) {
            $this->jenjang_pendidikan_id = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::JENJANG_PENDIDIKAN_ID;
        }

        if ($this->aJenjangPendidikan !== null && $this->aJenjangPendidikan->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikan = null;
        }


        return $this;
    } // setJenjangPendidikanId()

    /**
     * Set the value of [jenis_lembaga_id] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setJenisLembagaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_lembaga_id !== $v) {
            $this->jenis_lembaga_id = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::JENIS_LEMBAGA_ID;
        }

        if ($this->aJenisLembaga !== null && $this->aJenisLembaga->getJenisLembagaId() !== $v) {
            $this->aJenisLembaga = null;
        }


        return $this;
    } // setJenisLembagaId()

    /**
     * Set the value of [status_kepegawaian_id] column.
     * 
     * @param int $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setStatusKepegawaianId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->status_kepegawaian_id !== $v) {
            $this->status_kepegawaian_id = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID;
        }

        if ($this->aStatusKepegawaian !== null && $this->aStatusKepegawaian->getStatusKepegawaianId() !== $v) {
            $this->aStatusKepegawaian = null;
        }


        return $this;
    } // setStatusKepegawaianId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [jenis_ptk_id] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setJenisPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_ptk_id !== $v) {
            $this->jenis_ptk_id = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::JENIS_PTK_ID;
        }

        if ($this->aJenisPtk !== null && $this->aJenisPtk->getJenisPtkId() !== $v) {
            $this->aJenisPtk = null;
        }


        return $this;
    } // setJenisPtkId()

    /**
     * Set the value of [lembaga_pengangkat] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setLembagaPengangkat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lembaga_pengangkat !== $v) {
            $this->lembaga_pengangkat = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::LEMBAGA_PENGANGKAT;
        }


        return $this;
    } // setLembagaPengangkat()

    /**
     * Set the value of [no_sk_kerja] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setNoSkKerja($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_sk_kerja !== $v) {
            $this->no_sk_kerja = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::NO_SK_KERJA;
        }


        return $this;
    } // setNoSkKerja()

    /**
     * Sets the value of [tgl_sk_kerja] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setTglSkKerja($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_sk_kerja !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_sk_kerja !== null && $tmpDt = new DateTime($this->tgl_sk_kerja)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_sk_kerja = $newDateAsString;
                $this->modifiedColumns[] = RwyKerjaPeer::TGL_SK_KERJA;
            }
        } // if either are not null


        return $this;
    } // setTglSkKerja()

    /**
     * Sets the value of [tmt_kerja] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setTmtKerja($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_kerja !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_kerja !== null && $tmpDt = new DateTime($this->tmt_kerja)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_kerja = $newDateAsString;
                $this->modifiedColumns[] = RwyKerjaPeer::TMT_KERJA;
            }
        } // if either are not null


        return $this;
    } // setTmtKerja()

    /**
     * Sets the value of [tst_kerja] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setTstKerja($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tst_kerja !== null || $dt !== null) {
            $currentDateAsString = ($this->tst_kerja !== null && $tmpDt = new DateTime($this->tst_kerja)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tst_kerja = $newDateAsString;
                $this->modifiedColumns[] = RwyKerjaPeer::TST_KERJA;
            }
        } // if either are not null


        return $this;
    } // setTstKerja()

    /**
     * Set the value of [tempat_kerja] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setTempatKerja($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_kerja !== $v) {
            $this->tempat_kerja = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::TEMPAT_KERJA;
        }


        return $this;
    } // setTempatKerja()

    /**
     * Set the value of [ttd_sk_kerja] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setTtdSkKerja($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ttd_sk_kerja !== $v) {
            $this->ttd_sk_kerja = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::TTD_SK_KERJA;
        }


        return $this;
    } // setTtdSkKerja()

    /**
     * Set the value of [mapel_diajarkan] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setMapelDiajarkan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mapel_diajarkan !== $v) {
            $this->mapel_diajarkan = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::MAPEL_DIAJARKAN;
        }


        return $this;
    } // setMapelDiajarkan()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RwyKerjaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RwyKerjaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyKerja The current object (for fluent API support)
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
                $this->modifiedColumns[] = RwyKerjaPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RwyKerjaPeer::UPDATER_ID;
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

            $this->rwy_kerja_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenjang_pendidikan_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jenis_lembaga_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->status_kepegawaian_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->ptk_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jenis_ptk_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->lembaga_pengangkat = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->no_sk_kerja = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tgl_sk_kerja = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->tmt_kerja = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->tst_kerja = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->tempat_kerja = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->ttd_sk_kerja = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->mapel_diajarkan = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->create_date = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->last_update = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->soft_delete = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->last_sync = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->updater_id = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 19; // 19 = RwyKerjaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RwyKerja object", $e);
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
        if ($this->aJenisLembaga !== null && $this->jenis_lembaga_id !== $this->aJenisLembaga->getJenisLembagaId()) {
            $this->aJenisLembaga = null;
        }
        if ($this->aStatusKepegawaian !== null && $this->status_kepegawaian_id !== $this->aStatusKepegawaian->getStatusKepegawaianId()) {
            $this->aStatusKepegawaian = null;
        }
        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aJenisPtk !== null && $this->jenis_ptk_id !== $this->aJenisPtk->getJenisPtkId()) {
            $this->aJenisPtk = null;
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
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RwyKerjaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisLembaga = null;
            $this->aJenisPtk = null;
            $this->aPtk = null;
            $this->aStatusKepegawaian = null;
            $this->aJenjangPendidikan = null;
            $this->collVldRwyKerjas = null;

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
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RwyKerjaQuery::create()
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
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RwyKerjaPeer::addInstanceToPool($this);
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

            if ($this->aJenisLembaga !== null) {
                if ($this->aJenisLembaga->isModified() || $this->aJenisLembaga->isNew()) {
                    $affectedRows += $this->aJenisLembaga->save($con);
                }
                $this->setJenisLembaga($this->aJenisLembaga);
            }

            if ($this->aJenisPtk !== null) {
                if ($this->aJenisPtk->isModified() || $this->aJenisPtk->isNew()) {
                    $affectedRows += $this->aJenisPtk->save($con);
                }
                $this->setJenisPtk($this->aJenisPtk);
            }

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aStatusKepegawaian !== null) {
                if ($this->aStatusKepegawaian->isModified() || $this->aStatusKepegawaian->isNew()) {
                    $affectedRows += $this->aStatusKepegawaian->save($con);
                }
                $this->setStatusKepegawaian($this->aStatusKepegawaian);
            }

            if ($this->aJenjangPendidikan !== null) {
                if ($this->aJenjangPendidikan->isModified() || $this->aJenjangPendidikan->isNew()) {
                    $affectedRows += $this->aJenjangPendidikan->save($con);
                }
                $this->setJenjangPendidikan($this->aJenjangPendidikan);
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

            if ($this->vldRwyKerjasScheduledForDeletion !== null) {
                if (!$this->vldRwyKerjasScheduledForDeletion->isEmpty()) {
                    VldRwyKerjaQuery::create()
                        ->filterByPrimaryKeys($this->vldRwyKerjasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwyKerjasScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwyKerjas !== null) {
                foreach ($this->collVldRwyKerjas as $referrerFK) {
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
        if ($this->isColumnModified(RwyKerjaPeer::RWY_KERJA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"rwy_kerja_id"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_id"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::JENIS_LEMBAGA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_lembaga_id"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"status_kepegawaian_id"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::JENIS_PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_ptk_id"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::LEMBAGA_PENGANGKAT)) {
            $modifiedColumns[':p' . $index++]  = '"lembaga_pengangkat"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::NO_SK_KERJA)) {
            $modifiedColumns[':p' . $index++]  = '"no_sk_kerja"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::TGL_SK_KERJA)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_sk_kerja"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::TMT_KERJA)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_kerja"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::TST_KERJA)) {
            $modifiedColumns[':p' . $index++]  = '"tst_kerja"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::TEMPAT_KERJA)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_kerja"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::TTD_SK_KERJA)) {
            $modifiedColumns[':p' . $index++]  = '"ttd_sk_kerja"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::MAPEL_DIAJARKAN)) {
            $modifiedColumns[':p' . $index++]  = '"mapel_diajarkan"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RwyKerjaPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "rwy_kerja" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"rwy_kerja_id"':						
                        $stmt->bindValue($identifier, $this->rwy_kerja_id, PDO::PARAM_STR);
                        break;
                    case '"jenjang_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_lembaga_id"':						
                        $stmt->bindValue($identifier, $this->jenis_lembaga_id, PDO::PARAM_STR);
                        break;
                    case '"status_kepegawaian_id"':						
                        $stmt->bindValue($identifier, $this->status_kepegawaian_id, PDO::PARAM_INT);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_ptk_id"':						
                        $stmt->bindValue($identifier, $this->jenis_ptk_id, PDO::PARAM_STR);
                        break;
                    case '"lembaga_pengangkat"':						
                        $stmt->bindValue($identifier, $this->lembaga_pengangkat, PDO::PARAM_STR);
                        break;
                    case '"no_sk_kerja"':						
                        $stmt->bindValue($identifier, $this->no_sk_kerja, PDO::PARAM_STR);
                        break;
                    case '"tgl_sk_kerja"':						
                        $stmt->bindValue($identifier, $this->tgl_sk_kerja, PDO::PARAM_STR);
                        break;
                    case '"tmt_kerja"':						
                        $stmt->bindValue($identifier, $this->tmt_kerja, PDO::PARAM_STR);
                        break;
                    case '"tst_kerja"':						
                        $stmt->bindValue($identifier, $this->tst_kerja, PDO::PARAM_STR);
                        break;
                    case '"tempat_kerja"':						
                        $stmt->bindValue($identifier, $this->tempat_kerja, PDO::PARAM_STR);
                        break;
                    case '"ttd_sk_kerja"':						
                        $stmt->bindValue($identifier, $this->ttd_sk_kerja, PDO::PARAM_STR);
                        break;
                    case '"mapel_diajarkan"':						
                        $stmt->bindValue($identifier, $this->mapel_diajarkan, PDO::PARAM_STR);
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

            if ($this->aJenisLembaga !== null) {
                if (!$this->aJenisLembaga->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisLembaga->getValidationFailures());
                }
            }

            if ($this->aJenisPtk !== null) {
                if (!$this->aJenisPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisPtk->getValidationFailures());
                }
            }

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aStatusKepegawaian !== null) {
                if (!$this->aStatusKepegawaian->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatusKepegawaian->getValidationFailures());
                }
            }

            if ($this->aJenjangPendidikan !== null) {
                if (!$this->aJenjangPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikan->getValidationFailures());
                }
            }


            if (($retval = RwyKerjaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldRwyKerjas !== null) {
                    foreach ($this->collVldRwyKerjas as $referrerFK) {
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
        $pos = RwyKerjaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRwyKerjaId();
                break;
            case 1:
                return $this->getJenjangPendidikanId();
                break;
            case 2:
                return $this->getJenisLembagaId();
                break;
            case 3:
                return $this->getStatusKepegawaianId();
                break;
            case 4:
                return $this->getPtkId();
                break;
            case 5:
                return $this->getJenisPtkId();
                break;
            case 6:
                return $this->getLembagaPengangkat();
                break;
            case 7:
                return $this->getNoSkKerja();
                break;
            case 8:
                return $this->getTglSkKerja();
                break;
            case 9:
                return $this->getTmtKerja();
                break;
            case 10:
                return $this->getTstKerja();
                break;
            case 11:
                return $this->getTempatKerja();
                break;
            case 12:
                return $this->getTtdSkKerja();
                break;
            case 13:
                return $this->getMapelDiajarkan();
                break;
            case 14:
                return $this->getCreateDate();
                break;
            case 15:
                return $this->getLastUpdate();
                break;
            case 16:
                return $this->getSoftDelete();
                break;
            case 17:
                return $this->getLastSync();
                break;
            case 18:
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
        if (isset($alreadyDumpedObjects['RwyKerja'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RwyKerja'][$this->getPrimaryKey()] = true;
        $keys = RwyKerjaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRwyKerjaId(),
            $keys[1] => $this->getJenjangPendidikanId(),
            $keys[2] => $this->getJenisLembagaId(),
            $keys[3] => $this->getStatusKepegawaianId(),
            $keys[4] => $this->getPtkId(),
            $keys[5] => $this->getJenisPtkId(),
            $keys[6] => $this->getLembagaPengangkat(),
            $keys[7] => $this->getNoSkKerja(),
            $keys[8] => $this->getTglSkKerja(),
            $keys[9] => $this->getTmtKerja(),
            $keys[10] => $this->getTstKerja(),
            $keys[11] => $this->getTempatKerja(),
            $keys[12] => $this->getTtdSkKerja(),
            $keys[13] => $this->getMapelDiajarkan(),
            $keys[14] => $this->getCreateDate(),
            $keys[15] => $this->getLastUpdate(),
            $keys[16] => $this->getSoftDelete(),
            $keys[17] => $this->getLastSync(),
            $keys[18] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisLembaga) {
                $result['JenisLembaga'] = $this->aJenisLembaga->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisPtk) {
                $result['JenisPtk'] = $this->aJenisPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatusKepegawaian) {
                $result['StatusKepegawaian'] = $this->aStatusKepegawaian->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenjangPendidikan) {
                $result['JenjangPendidikan'] = $this->aJenjangPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldRwyKerjas) {
                $result['VldRwyKerjas'] = $this->collVldRwyKerjas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RwyKerjaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRwyKerjaId($value);
                break;
            case 1:
                $this->setJenjangPendidikanId($value);
                break;
            case 2:
                $this->setJenisLembagaId($value);
                break;
            case 3:
                $this->setStatusKepegawaianId($value);
                break;
            case 4:
                $this->setPtkId($value);
                break;
            case 5:
                $this->setJenisPtkId($value);
                break;
            case 6:
                $this->setLembagaPengangkat($value);
                break;
            case 7:
                $this->setNoSkKerja($value);
                break;
            case 8:
                $this->setTglSkKerja($value);
                break;
            case 9:
                $this->setTmtKerja($value);
                break;
            case 10:
                $this->setTstKerja($value);
                break;
            case 11:
                $this->setTempatKerja($value);
                break;
            case 12:
                $this->setTtdSkKerja($value);
                break;
            case 13:
                $this->setMapelDiajarkan($value);
                break;
            case 14:
                $this->setCreateDate($value);
                break;
            case 15:
                $this->setLastUpdate($value);
                break;
            case 16:
                $this->setSoftDelete($value);
                break;
            case 17:
                $this->setLastSync($value);
                break;
            case 18:
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
        $keys = RwyKerjaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setRwyKerjaId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenjangPendidikanId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenisLembagaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setStatusKepegawaianId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPtkId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJenisPtkId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLembagaPengangkat($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setNoSkKerja($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTglSkKerja($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setTmtKerja($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTstKerja($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTempatKerja($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setTtdSkKerja($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setMapelDiajarkan($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCreateDate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLastUpdate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSoftDelete($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLastSync($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setUpdaterId($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RwyKerjaPeer::DATABASE_NAME);

        if ($this->isColumnModified(RwyKerjaPeer::RWY_KERJA_ID)) $criteria->add(RwyKerjaPeer::RWY_KERJA_ID, $this->rwy_kerja_id);
        if ($this->isColumnModified(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID)) $criteria->add(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);
        if ($this->isColumnModified(RwyKerjaPeer::JENIS_LEMBAGA_ID)) $criteria->add(RwyKerjaPeer::JENIS_LEMBAGA_ID, $this->jenis_lembaga_id);
        if ($this->isColumnModified(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID)) $criteria->add(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, $this->status_kepegawaian_id);
        if ($this->isColumnModified(RwyKerjaPeer::PTK_ID)) $criteria->add(RwyKerjaPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(RwyKerjaPeer::JENIS_PTK_ID)) $criteria->add(RwyKerjaPeer::JENIS_PTK_ID, $this->jenis_ptk_id);
        if ($this->isColumnModified(RwyKerjaPeer::LEMBAGA_PENGANGKAT)) $criteria->add(RwyKerjaPeer::LEMBAGA_PENGANGKAT, $this->lembaga_pengangkat);
        if ($this->isColumnModified(RwyKerjaPeer::NO_SK_KERJA)) $criteria->add(RwyKerjaPeer::NO_SK_KERJA, $this->no_sk_kerja);
        if ($this->isColumnModified(RwyKerjaPeer::TGL_SK_KERJA)) $criteria->add(RwyKerjaPeer::TGL_SK_KERJA, $this->tgl_sk_kerja);
        if ($this->isColumnModified(RwyKerjaPeer::TMT_KERJA)) $criteria->add(RwyKerjaPeer::TMT_KERJA, $this->tmt_kerja);
        if ($this->isColumnModified(RwyKerjaPeer::TST_KERJA)) $criteria->add(RwyKerjaPeer::TST_KERJA, $this->tst_kerja);
        if ($this->isColumnModified(RwyKerjaPeer::TEMPAT_KERJA)) $criteria->add(RwyKerjaPeer::TEMPAT_KERJA, $this->tempat_kerja);
        if ($this->isColumnModified(RwyKerjaPeer::TTD_SK_KERJA)) $criteria->add(RwyKerjaPeer::TTD_SK_KERJA, $this->ttd_sk_kerja);
        if ($this->isColumnModified(RwyKerjaPeer::MAPEL_DIAJARKAN)) $criteria->add(RwyKerjaPeer::MAPEL_DIAJARKAN, $this->mapel_diajarkan);
        if ($this->isColumnModified(RwyKerjaPeer::CREATE_DATE)) $criteria->add(RwyKerjaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RwyKerjaPeer::LAST_UPDATE)) $criteria->add(RwyKerjaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RwyKerjaPeer::SOFT_DELETE)) $criteria->add(RwyKerjaPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RwyKerjaPeer::LAST_SYNC)) $criteria->add(RwyKerjaPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RwyKerjaPeer::UPDATER_ID)) $criteria->add(RwyKerjaPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RwyKerjaPeer::DATABASE_NAME);
        $criteria->add(RwyKerjaPeer::RWY_KERJA_ID, $this->rwy_kerja_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getRwyKerjaId();
    }

    /**
     * Generic method to set the primary key (rwy_kerja_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRwyKerjaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getRwyKerjaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RwyKerja (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenjangPendidikanId($this->getJenjangPendidikanId());
        $copyObj->setJenisLembagaId($this->getJenisLembagaId());
        $copyObj->setStatusKepegawaianId($this->getStatusKepegawaianId());
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setJenisPtkId($this->getJenisPtkId());
        $copyObj->setLembagaPengangkat($this->getLembagaPengangkat());
        $copyObj->setNoSkKerja($this->getNoSkKerja());
        $copyObj->setTglSkKerja($this->getTglSkKerja());
        $copyObj->setTmtKerja($this->getTmtKerja());
        $copyObj->setTstKerja($this->getTstKerja());
        $copyObj->setTempatKerja($this->getTempatKerja());
        $copyObj->setTtdSkKerja($this->getTtdSkKerja());
        $copyObj->setMapelDiajarkan($this->getMapelDiajarkan());
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

            foreach ($this->getVldRwyKerjas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyKerja($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRwyKerjaId(NULL); // this is a auto-increment column, so set to default value
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
     * @return RwyKerja Clone of current object.
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
     * @return RwyKerjaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RwyKerjaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisLembaga object.
     *
     * @param             JenisLembaga $v
     * @return RwyKerja The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisLembaga(JenisLembaga $v = null)
    {
        if ($v === null) {
            $this->setJenisLembagaId(NULL);
        } else {
            $this->setJenisLembagaId($v->getJenisLembagaId());
        }

        $this->aJenisLembaga = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisLembaga object, it will not be re-added.
        if ($v !== null) {
            $v->addRwyKerja($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisLembaga object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisLembaga The associated JenisLembaga object.
     * @throws PropelException
     */
    public function getJenisLembaga(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisLembaga === null && (($this->jenis_lembaga_id !== "" && $this->jenis_lembaga_id !== null)) && $doQuery) {
            $this->aJenisLembaga = JenisLembagaQuery::create()->findPk($this->jenis_lembaga_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisLembaga->addRwyKerjas($this);
             */
        }

        return $this->aJenisLembaga;
    }

    /**
     * Declares an association between this object and a JenisPtk object.
     *
     * @param             JenisPtk $v
     * @return RwyKerja The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisPtk(JenisPtk $v = null)
    {
        if ($v === null) {
            $this->setJenisPtkId(NULL);
        } else {
            $this->setJenisPtkId($v->getJenisPtkId());
        }

        $this->aJenisPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisPtk object, it will not be re-added.
        if ($v !== null) {
            $v->addRwyKerja($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisPtk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisPtk The associated JenisPtk object.
     * @throws PropelException
     */
    public function getJenisPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisPtk === null && (($this->jenis_ptk_id !== "" && $this->jenis_ptk_id !== null)) && $doQuery) {
            $this->aJenisPtk = JenisPtkQuery::create()->findPk($this->jenis_ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisPtk->addRwyKerjas($this);
             */
        }

        return $this->aJenisPtk;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return RwyKerja The current object (for fluent API support)
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
            $v->addRwyKerja($this);
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
                $this->aPtk->addRwyKerjas($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a StatusKepegawaian object.
     *
     * @param             StatusKepegawaian $v
     * @return RwyKerja The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatusKepegawaian(StatusKepegawaian $v = null)
    {
        if ($v === null) {
            $this->setStatusKepegawaianId(NULL);
        } else {
            $this->setStatusKepegawaianId($v->getStatusKepegawaianId());
        }

        $this->aStatusKepegawaian = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the StatusKepegawaian object, it will not be re-added.
        if ($v !== null) {
            $v->addRwyKerja($this);
        }


        return $this;
    }


    /**
     * Get the associated StatusKepegawaian object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return StatusKepegawaian The associated StatusKepegawaian object.
     * @throws PropelException
     */
    public function getStatusKepegawaian(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatusKepegawaian === null && ($this->status_kepegawaian_id !== null) && $doQuery) {
            $this->aStatusKepegawaian = StatusKepegawaianQuery::create()->findPk($this->status_kepegawaian_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatusKepegawaian->addRwyKerjas($this);
             */
        }

        return $this->aStatusKepegawaian;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return RwyKerja The current object (for fluent API support)
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
            $v->addRwyKerja($this);
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
                $this->aJenjangPendidikan->addRwyKerjas($this);
             */
        }

        return $this->aJenjangPendidikan;
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
        if ('VldRwyKerja' == $relationName) {
            $this->initVldRwyKerjas();
        }
    }

    /**
     * Clears out the collVldRwyKerjas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RwyKerja The current object (for fluent API support)
     * @see        addVldRwyKerjas()
     */
    public function clearVldRwyKerjas()
    {
        $this->collVldRwyKerjas = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwyKerjasPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwyKerjas collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwyKerjas($v = true)
    {
        $this->collVldRwyKerjasPartial = $v;
    }

    /**
     * Initializes the collVldRwyKerjas collection.
     *
     * By default this just sets the collVldRwyKerjas collection to an empty array (like clearcollVldRwyKerjas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwyKerjas($overrideExisting = true)
    {
        if (null !== $this->collVldRwyKerjas && !$overrideExisting) {
            return;
        }
        $this->collVldRwyKerjas = new PropelObjectCollection();
        $this->collVldRwyKerjas->setModel('VldRwyKerja');
    }

    /**
     * Gets an array of VldRwyKerja objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RwyKerja is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwyKerja[] List of VldRwyKerja objects
     * @throws PropelException
     */
    public function getVldRwyKerjas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyKerjasPartial && !$this->isNew();
        if (null === $this->collVldRwyKerjas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwyKerjas) {
                // return empty collection
                $this->initVldRwyKerjas();
            } else {
                $collVldRwyKerjas = VldRwyKerjaQuery::create(null, $criteria)
                    ->filterByRwyKerja($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwyKerjasPartial && count($collVldRwyKerjas)) {
                      $this->initVldRwyKerjas(false);

                      foreach($collVldRwyKerjas as $obj) {
                        if (false == $this->collVldRwyKerjas->contains($obj)) {
                          $this->collVldRwyKerjas->append($obj);
                        }
                      }

                      $this->collVldRwyKerjasPartial = true;
                    }

                    $collVldRwyKerjas->getInternalIterator()->rewind();
                    return $collVldRwyKerjas;
                }

                if($partial && $this->collVldRwyKerjas) {
                    foreach($this->collVldRwyKerjas as $obj) {
                        if($obj->isNew()) {
                            $collVldRwyKerjas[] = $obj;
                        }
                    }
                }

                $this->collVldRwyKerjas = $collVldRwyKerjas;
                $this->collVldRwyKerjasPartial = false;
            }
        }

        return $this->collVldRwyKerjas;
    }

    /**
     * Sets a collection of VldRwyKerja objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwyKerjas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RwyKerja The current object (for fluent API support)
     */
    public function setVldRwyKerjas(PropelCollection $vldRwyKerjas, PropelPDO $con = null)
    {
        $vldRwyKerjasToDelete = $this->getVldRwyKerjas(new Criteria(), $con)->diff($vldRwyKerjas);

        $this->vldRwyKerjasScheduledForDeletion = unserialize(serialize($vldRwyKerjasToDelete));

        foreach ($vldRwyKerjasToDelete as $vldRwyKerjaRemoved) {
            $vldRwyKerjaRemoved->setRwyKerja(null);
        }

        $this->collVldRwyKerjas = null;
        foreach ($vldRwyKerjas as $vldRwyKerja) {
            $this->addVldRwyKerja($vldRwyKerja);
        }

        $this->collVldRwyKerjas = $vldRwyKerjas;
        $this->collVldRwyKerjasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwyKerja objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwyKerja objects.
     * @throws PropelException
     */
    public function countVldRwyKerjas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyKerjasPartial && !$this->isNew();
        if (null === $this->collVldRwyKerjas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwyKerjas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwyKerjas());
            }
            $query = VldRwyKerjaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRwyKerja($this)
                ->count($con);
        }

        return count($this->collVldRwyKerjas);
    }

    /**
     * Method called to associate a VldRwyKerja object to this object
     * through the VldRwyKerja foreign key attribute.
     *
     * @param    VldRwyKerja $l VldRwyKerja
     * @return RwyKerja The current object (for fluent API support)
     */
    public function addVldRwyKerja(VldRwyKerja $l)
    {
        if ($this->collVldRwyKerjas === null) {
            $this->initVldRwyKerjas();
            $this->collVldRwyKerjasPartial = true;
        }
        if (!in_array($l, $this->collVldRwyKerjas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwyKerja($l);
        }

        return $this;
    }

    /**
     * @param	VldRwyKerja $vldRwyKerja The vldRwyKerja object to add.
     */
    protected function doAddVldRwyKerja($vldRwyKerja)
    {
        $this->collVldRwyKerjas[]= $vldRwyKerja;
        $vldRwyKerja->setRwyKerja($this);
    }

    /**
     * @param	VldRwyKerja $vldRwyKerja The vldRwyKerja object to remove.
     * @return RwyKerja The current object (for fluent API support)
     */
    public function removeVldRwyKerja($vldRwyKerja)
    {
        if ($this->getVldRwyKerjas()->contains($vldRwyKerja)) {
            $this->collVldRwyKerjas->remove($this->collVldRwyKerjas->search($vldRwyKerja));
            if (null === $this->vldRwyKerjasScheduledForDeletion) {
                $this->vldRwyKerjasScheduledForDeletion = clone $this->collVldRwyKerjas;
                $this->vldRwyKerjasScheduledForDeletion->clear();
            }
            $this->vldRwyKerjasScheduledForDeletion[]= clone $vldRwyKerja;
            $vldRwyKerja->setRwyKerja(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RwyKerja is new, it will return
     * an empty collection; or if this RwyKerja has previously
     * been saved, it will retrieve related VldRwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RwyKerja.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyKerja[] List of VldRwyKerja objects
     */
    public function getVldRwyKerjasJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyKerjaQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldRwyKerjas($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->rwy_kerja_id = null;
        $this->jenjang_pendidikan_id = null;
        $this->jenis_lembaga_id = null;
        $this->status_kepegawaian_id = null;
        $this->ptk_id = null;
        $this->jenis_ptk_id = null;
        $this->lembaga_pengangkat = null;
        $this->no_sk_kerja = null;
        $this->tgl_sk_kerja = null;
        $this->tmt_kerja = null;
        $this->tst_kerja = null;
        $this->tempat_kerja = null;
        $this->ttd_sk_kerja = null;
        $this->mapel_diajarkan = null;
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
            if ($this->collVldRwyKerjas) {
                foreach ($this->collVldRwyKerjas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisLembaga instanceof Persistent) {
              $this->aJenisLembaga->clearAllReferences($deep);
            }
            if ($this->aJenisPtk instanceof Persistent) {
              $this->aJenisPtk->clearAllReferences($deep);
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aStatusKepegawaian instanceof Persistent) {
              $this->aStatusKepegawaian->clearAllReferences($deep);
            }
            if ($this->aJenjangPendidikan instanceof Persistent) {
              $this->aJenjangPendidikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldRwyKerjas instanceof PropelCollection) {
            $this->collVldRwyKerjas->clearIterator();
        }
        $this->collVldRwyKerjas = null;
        $this->aJenisLembaga = null;
        $this->aJenisPtk = null;
        $this->aPtk = null;
        $this->aStatusKepegawaian = null;
        $this->aJenjangPendidikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RwyKerjaPeer::DEFAULT_STRING_FORMAT);
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
