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
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikLongitudinal;
use DataDikdas\Model\PesertaDidikLongitudinalPeer;
use DataDikdas\Model\PesertaDidikLongitudinalQuery;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\VldPdLong;
use DataDikdas\Model\VldPdLongQuery;

/**
 * Base class that represents a row from the 'peserta_didik_longitudinal' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePesertaDidikLongitudinal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PesertaDidikLongitudinalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PesertaDidikLongitudinalPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the peserta_didik_id field.
     * @var        string
     */
    protected $peserta_didik_id;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

    /**
     * The value for the tinggi_badan field.
     * @var        string
     */
    protected $tinggi_badan;

    /**
     * The value for the berat_badan field.
     * @var        string
     */
    protected $berat_badan;

    /**
     * The value for the lingkar_kepala field.
     * @var        string
     */
    protected $lingkar_kepala;

    /**
     * The value for the jarak_rumah_ke_sekolah field.
     * @var        string
     */
    protected $jarak_rumah_ke_sekolah;

    /**
     * The value for the jarak_rumah_ke_sekolah_km field.
     * @var        string
     */
    protected $jarak_rumah_ke_sekolah_km;

    /**
     * The value for the waktu_tempuh_ke_sekolah field.
     * @var        string
     */
    protected $waktu_tempuh_ke_sekolah;

    /**
     * The value for the menit_tempuh_ke_sekolah field.
     * @var        string
     */
    protected $menit_tempuh_ke_sekolah;

    /**
     * The value for the jumlah_saudara_kandung field.
     * @var        string
     */
    protected $jumlah_saudara_kandung;

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
     * @var        PesertaDidik
     */
    protected $aPesertaDidik;

    /**
     * @var        Semester
     */
    protected $aSemester;

    /**
     * @var        PropelObjectCollection|VldPdLong[] Collection to store aggregation of VldPdLong objects.
     */
    protected $collVldPdLongs;
    protected $collVldPdLongsPartial;

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
    protected $vldPdLongsScheduledForDeletion = null;

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
     * Initializes internal state of BasePesertaDidikLongitudinal object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [semester_id] column value.
     * 
     * @return string
     */
    public function getSemesterId()
    {
        return $this->semester_id;
    }

    /**
     * Get the [tinggi_badan] column value.
     * 
     * @return string
     */
    public function getTinggiBadan()
    {
        return $this->tinggi_badan;
    }

    /**
     * Get the [berat_badan] column value.
     * 
     * @return string
     */
    public function getBeratBadan()
    {
        return $this->berat_badan;
    }

    /**
     * Get the [lingkar_kepala] column value.
     * 
     * @return string
     */
    public function getLingkarKepala()
    {
        return $this->lingkar_kepala;
    }

    /**
     * Get the [jarak_rumah_ke_sekolah] column value.
     * 
     * @return string
     */
    public function getJarakRumahKeSekolah()
    {
        return $this->jarak_rumah_ke_sekolah;
    }

    /**
     * Get the [jarak_rumah_ke_sekolah_km] column value.
     * 
     * @return string
     */
    public function getJarakRumahKeSekolahKm()
    {
        return $this->jarak_rumah_ke_sekolah_km;
    }

    /**
     * Get the [waktu_tempuh_ke_sekolah] column value.
     * 
     * @return string
     */
    public function getWaktuTempuhKeSekolah()
    {
        return $this->waktu_tempuh_ke_sekolah;
    }

    /**
     * Get the [menit_tempuh_ke_sekolah] column value.
     * 
     * @return string
     */
    public function getMenitTempuhKeSekolah()
    {
        return $this->menit_tempuh_ke_sekolah;
    }

    /**
     * Get the [jumlah_saudara_kandung] column value.
     * 
     * @return string
     */
    public function getJumlahSaudaraKandung()
    {
        return $this->jumlah_saudara_kandung;
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
     * Set the value of [peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peserta_didik_id !== $v) {
            $this->peserta_didik_id = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID;
        }

        if ($this->aPesertaDidik !== null && $this->aPesertaDidik->getPesertaDidikId() !== $v) {
            $this->aPesertaDidik = null;
        }


        return $this;
    } // setPesertaDidikId()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [tinggi_badan] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setTinggiBadan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tinggi_badan !== $v) {
            $this->tinggi_badan = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::TINGGI_BADAN;
        }


        return $this;
    } // setTinggiBadan()

    /**
     * Set the value of [berat_badan] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setBeratBadan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->berat_badan !== $v) {
            $this->berat_badan = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::BERAT_BADAN;
        }


        return $this;
    } // setBeratBadan()

    /**
     * Set the value of [lingkar_kepala] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setLingkarKepala($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lingkar_kepala !== $v) {
            $this->lingkar_kepala = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::LINGKAR_KEPALA;
        }


        return $this;
    } // setLingkarKepala()

    /**
     * Set the value of [jarak_rumah_ke_sekolah] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setJarakRumahKeSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jarak_rumah_ke_sekolah !== $v) {
            $this->jarak_rumah_ke_sekolah = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH;
        }


        return $this;
    } // setJarakRumahKeSekolah()

    /**
     * Set the value of [jarak_rumah_ke_sekolah_km] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setJarakRumahKeSekolahKm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jarak_rumah_ke_sekolah_km !== $v) {
            $this->jarak_rumah_ke_sekolah_km = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH_KM;
        }


        return $this;
    } // setJarakRumahKeSekolahKm()

    /**
     * Set the value of [waktu_tempuh_ke_sekolah] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setWaktuTempuhKeSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->waktu_tempuh_ke_sekolah !== $v) {
            $this->waktu_tempuh_ke_sekolah = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::WAKTU_TEMPUH_KE_SEKOLAH;
        }


        return $this;
    } // setWaktuTempuhKeSekolah()

    /**
     * Set the value of [menit_tempuh_ke_sekolah] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setMenitTempuhKeSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->menit_tempuh_ke_sekolah !== $v) {
            $this->menit_tempuh_ke_sekolah = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::MENIT_TEMPUH_KE_SEKOLAH;
        }


        return $this;
    } // setMenitTempuhKeSekolah()

    /**
     * Set the value of [jumlah_saudara_kandung] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setJumlahSaudaraKandung($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jumlah_saudara_kandung !== $v) {
            $this->jumlah_saudara_kandung = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::JUMLAH_SAUDARA_KANDUNG;
        }


        return $this;
    } // setJumlahSaudaraKandung()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
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
                $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PesertaDidikLongitudinalPeer::UPDATER_ID;
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

            $this->peserta_didik_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->semester_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->tinggi_badan = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->berat_badan = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->lingkar_kepala = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jarak_rumah_ke_sekolah = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->jarak_rumah_ke_sekolah_km = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->waktu_tempuh_ke_sekolah = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->menit_tempuh_ke_sekolah = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->jumlah_saudara_kandung = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->create_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_update = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->soft_delete = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_sync = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updater_id = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = PesertaDidikLongitudinalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PesertaDidikLongitudinal object", $e);
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

        if ($this->aPesertaDidik !== null && $this->peserta_didik_id !== $this->aPesertaDidik->getPesertaDidikId()) {
            $this->aPesertaDidik = null;
        }
        if ($this->aSemester !== null && $this->semester_id !== $this->aSemester->getSemesterId()) {
            $this->aSemester = null;
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
            $con = Propel::getConnection(PesertaDidikLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PesertaDidikLongitudinalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPesertaDidik = null;
            $this->aSemester = null;
            $this->collVldPdLongs = null;

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
            $con = Propel::getConnection(PesertaDidikLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PesertaDidikLongitudinalQuery::create()
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
            $con = Propel::getConnection(PesertaDidikLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PesertaDidikLongitudinalPeer::addInstanceToPool($this);
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

            if ($this->aPesertaDidik !== null) {
                if ($this->aPesertaDidik->isModified() || $this->aPesertaDidik->isNew()) {
                    $affectedRows += $this->aPesertaDidik->save($con);
                }
                $this->setPesertaDidik($this->aPesertaDidik);
            }

            if ($this->aSemester !== null) {
                if ($this->aSemester->isModified() || $this->aSemester->isNew()) {
                    $affectedRows += $this->aSemester->save($con);
                }
                $this->setSemester($this->aSemester);
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

            if ($this->vldPdLongsScheduledForDeletion !== null) {
                if (!$this->vldPdLongsScheduledForDeletion->isEmpty()) {
                    VldPdLongQuery::create()
                        ->filterByPrimaryKeys($this->vldPdLongsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPdLongsScheduledForDeletion = null;
                }
            }

            if ($this->collVldPdLongs !== null) {
                foreach ($this->collVldPdLongs as $referrerFK) {
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
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peserta_didik_id"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::TINGGI_BADAN)) {
            $modifiedColumns[':p' . $index++]  = '"tinggi_badan"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::BERAT_BADAN)) {
            $modifiedColumns[':p' . $index++]  = '"berat_badan"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::LINGKAR_KEPALA)) {
            $modifiedColumns[':p' . $index++]  = '"lingkar_kepala"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"jarak_rumah_ke_sekolah"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH_KM)) {
            $modifiedColumns[':p' . $index++]  = '"jarak_rumah_ke_sekolah_km"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::WAKTU_TEMPUH_KE_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"waktu_tempuh_ke_sekolah"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::MENIT_TEMPUH_KE_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"menit_tempuh_ke_sekolah"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::JUMLAH_SAUDARA_KANDUNG)) {
            $modifiedColumns[':p' . $index++]  = '"jumlah_saudara_kandung"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "peserta_didik_longitudinal" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->peserta_didik_id, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"tinggi_badan"':						
                        $stmt->bindValue($identifier, $this->tinggi_badan, PDO::PARAM_STR);
                        break;
                    case '"berat_badan"':						
                        $stmt->bindValue($identifier, $this->berat_badan, PDO::PARAM_STR);
                        break;
                    case '"lingkar_kepala"':						
                        $stmt->bindValue($identifier, $this->lingkar_kepala, PDO::PARAM_STR);
                        break;
                    case '"jarak_rumah_ke_sekolah"':						
                        $stmt->bindValue($identifier, $this->jarak_rumah_ke_sekolah, PDO::PARAM_STR);
                        break;
                    case '"jarak_rumah_ke_sekolah_km"':						
                        $stmt->bindValue($identifier, $this->jarak_rumah_ke_sekolah_km, PDO::PARAM_STR);
                        break;
                    case '"waktu_tempuh_ke_sekolah"':						
                        $stmt->bindValue($identifier, $this->waktu_tempuh_ke_sekolah, PDO::PARAM_STR);
                        break;
                    case '"menit_tempuh_ke_sekolah"':						
                        $stmt->bindValue($identifier, $this->menit_tempuh_ke_sekolah, PDO::PARAM_STR);
                        break;
                    case '"jumlah_saudara_kandung"':						
                        $stmt->bindValue($identifier, $this->jumlah_saudara_kandung, PDO::PARAM_STR);
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

            if ($this->aPesertaDidik !== null) {
                if (!$this->aPesertaDidik->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPesertaDidik->getValidationFailures());
                }
            }

            if ($this->aSemester !== null) {
                if (!$this->aSemester->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSemester->getValidationFailures());
                }
            }


            if (($retval = PesertaDidikLongitudinalPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldPdLongs !== null) {
                    foreach ($this->collVldPdLongs as $referrerFK) {
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
        $pos = PesertaDidikLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPesertaDidikId();
                break;
            case 1:
                return $this->getSemesterId();
                break;
            case 2:
                return $this->getTinggiBadan();
                break;
            case 3:
                return $this->getBeratBadan();
                break;
            case 4:
                return $this->getLingkarKepala();
                break;
            case 5:
                return $this->getJarakRumahKeSekolah();
                break;
            case 6:
                return $this->getJarakRumahKeSekolahKm();
                break;
            case 7:
                return $this->getWaktuTempuhKeSekolah();
                break;
            case 8:
                return $this->getMenitTempuhKeSekolah();
                break;
            case 9:
                return $this->getJumlahSaudaraKandung();
                break;
            case 10:
                return $this->getCreateDate();
                break;
            case 11:
                return $this->getLastUpdate();
                break;
            case 12:
                return $this->getSoftDelete();
                break;
            case 13:
                return $this->getLastSync();
                break;
            case 14:
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
        if (isset($alreadyDumpedObjects['PesertaDidikLongitudinal'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PesertaDidikLongitudinal'][serialize($this->getPrimaryKey())] = true;
        $keys = PesertaDidikLongitudinalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPesertaDidikId(),
            $keys[1] => $this->getSemesterId(),
            $keys[2] => $this->getTinggiBadan(),
            $keys[3] => $this->getBeratBadan(),
            $keys[4] => $this->getLingkarKepala(),
            $keys[5] => $this->getJarakRumahKeSekolah(),
            $keys[6] => $this->getJarakRumahKeSekolahKm(),
            $keys[7] => $this->getWaktuTempuhKeSekolah(),
            $keys[8] => $this->getMenitTempuhKeSekolah(),
            $keys[9] => $this->getJumlahSaudaraKandung(),
            $keys[10] => $this->getCreateDate(),
            $keys[11] => $this->getLastUpdate(),
            $keys[12] => $this->getSoftDelete(),
            $keys[13] => $this->getLastSync(),
            $keys[14] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPesertaDidik) {
                $result['PesertaDidik'] = $this->aPesertaDidik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldPdLongs) {
                $result['VldPdLongs'] = $this->collVldPdLongs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PesertaDidikLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPesertaDidikId($value);
                break;
            case 1:
                $this->setSemesterId($value);
                break;
            case 2:
                $this->setTinggiBadan($value);
                break;
            case 3:
                $this->setBeratBadan($value);
                break;
            case 4:
                $this->setLingkarKepala($value);
                break;
            case 5:
                $this->setJarakRumahKeSekolah($value);
                break;
            case 6:
                $this->setJarakRumahKeSekolahKm($value);
                break;
            case 7:
                $this->setWaktuTempuhKeSekolah($value);
                break;
            case 8:
                $this->setMenitTempuhKeSekolah($value);
                break;
            case 9:
                $this->setJumlahSaudaraKandung($value);
                break;
            case 10:
                $this->setCreateDate($value);
                break;
            case 11:
                $this->setLastUpdate($value);
                break;
            case 12:
                $this->setSoftDelete($value);
                break;
            case 13:
                $this->setLastSync($value);
                break;
            case 14:
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
        $keys = PesertaDidikLongitudinalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPesertaDidikId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSemesterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTinggiBadan($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBeratBadan($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLingkarKepala($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJarakRumahKeSekolah($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setJarakRumahKeSekolahKm($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setWaktuTempuhKeSekolah($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setMenitTempuhKeSekolah($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setJumlahSaudaraKandung($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreateDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastUpdate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSoftDelete($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastSync($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setUpdaterId($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PesertaDidikLongitudinalPeer::DATABASE_NAME);

        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID)) $criteria->add(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::SEMESTER_ID)) $criteria->add(PesertaDidikLongitudinalPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::TINGGI_BADAN)) $criteria->add(PesertaDidikLongitudinalPeer::TINGGI_BADAN, $this->tinggi_badan);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::BERAT_BADAN)) $criteria->add(PesertaDidikLongitudinalPeer::BERAT_BADAN, $this->berat_badan);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::LINGKAR_KEPALA)) $criteria->add(PesertaDidikLongitudinalPeer::LINGKAR_KEPALA, $this->lingkar_kepala);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH)) $criteria->add(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH, $this->jarak_rumah_ke_sekolah);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH_KM)) $criteria->add(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH_KM, $this->jarak_rumah_ke_sekolah_km);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::WAKTU_TEMPUH_KE_SEKOLAH)) $criteria->add(PesertaDidikLongitudinalPeer::WAKTU_TEMPUH_KE_SEKOLAH, $this->waktu_tempuh_ke_sekolah);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::MENIT_TEMPUH_KE_SEKOLAH)) $criteria->add(PesertaDidikLongitudinalPeer::MENIT_TEMPUH_KE_SEKOLAH, $this->menit_tempuh_ke_sekolah);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::JUMLAH_SAUDARA_KANDUNG)) $criteria->add(PesertaDidikLongitudinalPeer::JUMLAH_SAUDARA_KANDUNG, $this->jumlah_saudara_kandung);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::CREATE_DATE)) $criteria->add(PesertaDidikLongitudinalPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::LAST_UPDATE)) $criteria->add(PesertaDidikLongitudinalPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::SOFT_DELETE)) $criteria->add(PesertaDidikLongitudinalPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::LAST_SYNC)) $criteria->add(PesertaDidikLongitudinalPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PesertaDidikLongitudinalPeer::UPDATER_ID)) $criteria->add(PesertaDidikLongitudinalPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PesertaDidikLongitudinalPeer::DATABASE_NAME);
        $criteria->add(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        $criteria->add(PesertaDidikLongitudinalPeer::SEMESTER_ID, $this->semester_id);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getPesertaDidikId();
        $pks[1] = $this->getSemesterId();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setPesertaDidikId($keys[0]);
        $this->setSemesterId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getPesertaDidikId()) && (null === $this->getSemesterId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of PesertaDidikLongitudinal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPesertaDidikId($this->getPesertaDidikId());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setTinggiBadan($this->getTinggiBadan());
        $copyObj->setBeratBadan($this->getBeratBadan());
        $copyObj->setLingkarKepala($this->getLingkarKepala());
        $copyObj->setJarakRumahKeSekolah($this->getJarakRumahKeSekolah());
        $copyObj->setJarakRumahKeSekolahKm($this->getJarakRumahKeSekolahKm());
        $copyObj->setWaktuTempuhKeSekolah($this->getWaktuTempuhKeSekolah());
        $copyObj->setMenitTempuhKeSekolah($this->getMenitTempuhKeSekolah());
        $copyObj->setJumlahSaudaraKandung($this->getJumlahSaudaraKandung());
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

            foreach ($this->getVldPdLongs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPdLong($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return PesertaDidikLongitudinal Clone of current object.
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
     * @return PesertaDidikLongitudinalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PesertaDidikLongitudinalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a PesertaDidik object.
     *
     * @param             PesertaDidik $v
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
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
            $v->addPesertaDidikLongitudinal($this);
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
                $this->aPesertaDidik->addPesertaDidikLongitudinals($this);
             */
        }

        return $this->aPesertaDidik;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
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
            $v->addPesertaDidikLongitudinal($this);
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
                $this->aSemester->addPesertaDidikLongitudinals($this);
             */
        }

        return $this->aSemester;
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
        if ('VldPdLong' == $relationName) {
            $this->initVldPdLongs();
        }
    }

    /**
     * Clears out the collVldPdLongs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     * @see        addVldPdLongs()
     */
    public function clearVldPdLongs()
    {
        $this->collVldPdLongs = null; // important to set this to null since that means it is uninitialized
        $this->collVldPdLongsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPdLongs collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPdLongs($v = true)
    {
        $this->collVldPdLongsPartial = $v;
    }

    /**
     * Initializes the collVldPdLongs collection.
     *
     * By default this just sets the collVldPdLongs collection to an empty array (like clearcollVldPdLongs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPdLongs($overrideExisting = true)
    {
        if (null !== $this->collVldPdLongs && !$overrideExisting) {
            return;
        }
        $this->collVldPdLongs = new PropelObjectCollection();
        $this->collVldPdLongs->setModel('VldPdLong');
    }

    /**
     * Gets an array of VldPdLong objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidikLongitudinal is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPdLong[] List of VldPdLong objects
     * @throws PropelException
     */
    public function getVldPdLongs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPdLongsPartial && !$this->isNew();
        if (null === $this->collVldPdLongs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPdLongs) {
                // return empty collection
                $this->initVldPdLongs();
            } else {
                $collVldPdLongs = VldPdLongQuery::create(null, $criteria)
                    ->filterByPesertaDidikLongitudinal($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPdLongsPartial && count($collVldPdLongs)) {
                      $this->initVldPdLongs(false);

                      foreach($collVldPdLongs as $obj) {
                        if (false == $this->collVldPdLongs->contains($obj)) {
                          $this->collVldPdLongs->append($obj);
                        }
                      }

                      $this->collVldPdLongsPartial = true;
                    }

                    $collVldPdLongs->getInternalIterator()->rewind();
                    return $collVldPdLongs;
                }

                if($partial && $this->collVldPdLongs) {
                    foreach($this->collVldPdLongs as $obj) {
                        if($obj->isNew()) {
                            $collVldPdLongs[] = $obj;
                        }
                    }
                }

                $this->collVldPdLongs = $collVldPdLongs;
                $this->collVldPdLongsPartial = false;
            }
        }

        return $this->collVldPdLongs;
    }

    /**
     * Sets a collection of VldPdLong objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPdLongs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function setVldPdLongs(PropelCollection $vldPdLongs, PropelPDO $con = null)
    {
        $vldPdLongsToDelete = $this->getVldPdLongs(new Criteria(), $con)->diff($vldPdLongs);

        $this->vldPdLongsScheduledForDeletion = unserialize(serialize($vldPdLongsToDelete));

        foreach ($vldPdLongsToDelete as $vldPdLongRemoved) {
            $vldPdLongRemoved->setPesertaDidikLongitudinal(null);
        }

        $this->collVldPdLongs = null;
        foreach ($vldPdLongs as $vldPdLong) {
            $this->addVldPdLong($vldPdLong);
        }

        $this->collVldPdLongs = $vldPdLongs;
        $this->collVldPdLongsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPdLong objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPdLong objects.
     * @throws PropelException
     */
    public function countVldPdLongs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPdLongsPartial && !$this->isNew();
        if (null === $this->collVldPdLongs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPdLongs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPdLongs());
            }
            $query = VldPdLongQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidikLongitudinal($this)
                ->count($con);
        }

        return count($this->collVldPdLongs);
    }

    /**
     * Method called to associate a VldPdLong object to this object
     * through the VldPdLong foreign key attribute.
     *
     * @param    VldPdLong $l VldPdLong
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function addVldPdLong(VldPdLong $l)
    {
        if ($this->collVldPdLongs === null) {
            $this->initVldPdLongs();
            $this->collVldPdLongsPartial = true;
        }
        if (!in_array($l, $this->collVldPdLongs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPdLong($l);
        }

        return $this;
    }

    /**
     * @param	VldPdLong $vldPdLong The vldPdLong object to add.
     */
    protected function doAddVldPdLong($vldPdLong)
    {
        $this->collVldPdLongs[]= $vldPdLong;
        $vldPdLong->setPesertaDidikLongitudinal($this);
    }

    /**
     * @param	VldPdLong $vldPdLong The vldPdLong object to remove.
     * @return PesertaDidikLongitudinal The current object (for fluent API support)
     */
    public function removeVldPdLong($vldPdLong)
    {
        if ($this->getVldPdLongs()->contains($vldPdLong)) {
            $this->collVldPdLongs->remove($this->collVldPdLongs->search($vldPdLong));
            if (null === $this->vldPdLongsScheduledForDeletion) {
                $this->vldPdLongsScheduledForDeletion = clone $this->collVldPdLongs;
                $this->vldPdLongsScheduledForDeletion->clear();
            }
            $this->vldPdLongsScheduledForDeletion[]= clone $vldPdLong;
            $vldPdLong->setPesertaDidikLongitudinal(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidikLongitudinal is new, it will return
     * an empty collection; or if this PesertaDidikLongitudinal has previously
     * been saved, it will retrieve related VldPdLongs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidikLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPdLong[] List of VldPdLong objects
     */
    public function getVldPdLongsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPdLongQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldPdLongs($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->peserta_didik_id = null;
        $this->semester_id = null;
        $this->tinggi_badan = null;
        $this->berat_badan = null;
        $this->lingkar_kepala = null;
        $this->jarak_rumah_ke_sekolah = null;
        $this->jarak_rumah_ke_sekolah_km = null;
        $this->waktu_tempuh_ke_sekolah = null;
        $this->menit_tempuh_ke_sekolah = null;
        $this->jumlah_saudara_kandung = null;
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
            if ($this->collVldPdLongs) {
                foreach ($this->collVldPdLongs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPesertaDidik instanceof Persistent) {
              $this->aPesertaDidik->clearAllReferences($deep);
            }
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldPdLongs instanceof PropelCollection) {
            $this->collVldPdLongs->clearIterator();
        }
        $this->collVldPdLongs = null;
        $this->aPesertaDidik = null;
        $this->aSemester = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PesertaDidikLongitudinalPeer::DEFAULT_STRING_FORMAT);
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
