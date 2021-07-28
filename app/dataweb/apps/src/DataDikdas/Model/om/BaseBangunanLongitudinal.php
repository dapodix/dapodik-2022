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
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanLongitudinal;
use DataDikdas\Model\BangunanLongitudinalPeer;
use DataDikdas\Model\BangunanLongitudinalQuery;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;

/**
 * Base class that represents a row from the 'bangunan_longitudinal' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBangunanLongitudinal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BangunanLongitudinalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BangunanLongitudinalPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_bangunan field.
     * @var        string
     */
    protected $id_bangunan;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

    /**
     * The value for the rusak_pondasi field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_pondasi;

    /**
     * The value for the ket_pondasi field.
     * @var        string
     */
    protected $ket_pondasi;

    /**
     * The value for the rusak_sloop_kolom_balok field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_sloop_kolom_balok;

    /**
     * The value for the ket_sloop_kolom_balok field.
     * @var        string
     */
    protected $ket_sloop_kolom_balok;

    /**
     * The value for the rusak_plester_struktur field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_plester_struktur;

    /**
     * The value for the ket_plester_struktur field.
     * @var        string
     */
    protected $ket_plester_struktur;

    /**
     * The value for the rusak_kudakuda_atap field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_kudakuda_atap;

    /**
     * The value for the ket_kudakuda_atap field.
     * @var        string
     */
    protected $ket_kudakuda_atap;

    /**
     * The value for the rusak_kaso_atap field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_kaso_atap;

    /**
     * The value for the ket_kaso_atap field.
     * @var        string
     */
    protected $ket_kaso_atap;

    /**
     * The value for the rusak_reng_atap field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_reng_atap;

    /**
     * The value for the ket_reng_atap field.
     * @var        string
     */
    protected $ket_reng_atap;

    /**
     * The value for the rusak_tutup_atap field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_tutup_atap;

    /**
     * The value for the ket_tutup_atap field.
     * @var        string
     */
    protected $ket_tutup_atap;

    /**
     * The value for the nilai_saat_ini field.
     * @var        string
     */
    protected $nilai_saat_ini;

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
     * @var        Semester
     */
    protected $aSemester;

    /**
     * @var        Bangunan
     */
    protected $aBangunan;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->rusak_pondasi = '0';
        $this->rusak_sloop_kolom_balok = '0';
        $this->rusak_plester_struktur = '0';
        $this->rusak_kudakuda_atap = '0';
        $this->rusak_kaso_atap = '0';
        $this->rusak_reng_atap = '0';
        $this->rusak_tutup_atap = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseBangunanLongitudinal object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_bangunan] column value.
     * 
     * @return string
     */
    public function getIdBangunan()
    {
        return $this->id_bangunan;
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
     * Get the [rusak_pondasi] column value.
     * 
     * @return string
     */
    public function getRusakPondasi()
    {
        return $this->rusak_pondasi;
    }

    /**
     * Get the [ket_pondasi] column value.
     * 
     * @return string
     */
    public function getKetPondasi()
    {
        return $this->ket_pondasi;
    }

    /**
     * Get the [rusak_sloop_kolom_balok] column value.
     * 
     * @return string
     */
    public function getRusakSloopKolomBalok()
    {
        return $this->rusak_sloop_kolom_balok;
    }

    /**
     * Get the [ket_sloop_kolom_balok] column value.
     * 
     * @return string
     */
    public function getKetSloopKolomBalok()
    {
        return $this->ket_sloop_kolom_balok;
    }

    /**
     * Get the [rusak_plester_struktur] column value.
     * 
     * @return string
     */
    public function getRusakPlesterStruktur()
    {
        return $this->rusak_plester_struktur;
    }

    /**
     * Get the [ket_plester_struktur] column value.
     * 
     * @return string
     */
    public function getKetPlesterStruktur()
    {
        return $this->ket_plester_struktur;
    }

    /**
     * Get the [rusak_kudakuda_atap] column value.
     * 
     * @return string
     */
    public function getRusakKudakudaAtap()
    {
        return $this->rusak_kudakuda_atap;
    }

    /**
     * Get the [ket_kudakuda_atap] column value.
     * 
     * @return string
     */
    public function getKetKudakudaAtap()
    {
        return $this->ket_kudakuda_atap;
    }

    /**
     * Get the [rusak_kaso_atap] column value.
     * 
     * @return string
     */
    public function getRusakKasoAtap()
    {
        return $this->rusak_kaso_atap;
    }

    /**
     * Get the [ket_kaso_atap] column value.
     * 
     * @return string
     */
    public function getKetKasoAtap()
    {
        return $this->ket_kaso_atap;
    }

    /**
     * Get the [rusak_reng_atap] column value.
     * 
     * @return string
     */
    public function getRusakRengAtap()
    {
        return $this->rusak_reng_atap;
    }

    /**
     * Get the [ket_reng_atap] column value.
     * 
     * @return string
     */
    public function getKetRengAtap()
    {
        return $this->ket_reng_atap;
    }

    /**
     * Get the [rusak_tutup_atap] column value.
     * 
     * @return string
     */
    public function getRusakTutupAtap()
    {
        return $this->rusak_tutup_atap;
    }

    /**
     * Get the [ket_tutup_atap] column value.
     * 
     * @return string
     */
    public function getKetTutupAtap()
    {
        return $this->ket_tutup_atap;
    }

    /**
     * Get the [nilai_saat_ini] column value.
     * 
     * @return string
     */
    public function getNilaiSaatIni()
    {
        return $this->nilai_saat_ini;
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
     * Set the value of [id_bangunan] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setIdBangunan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_bangunan !== $v) {
            $this->id_bangunan = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::ID_BANGUNAN;
        }

        if ($this->aBangunan !== null && $this->aBangunan->getIdBangunan() !== $v) {
            $this->aBangunan = null;
        }


        return $this;
    } // setIdBangunan()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [rusak_pondasi] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setRusakPondasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_pondasi !== $v) {
            $this->rusak_pondasi = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::RUSAK_PONDASI;
        }


        return $this;
    } // setRusakPondasi()

    /**
     * Set the value of [ket_pondasi] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setKetPondasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_pondasi !== $v) {
            $this->ket_pondasi = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::KET_PONDASI;
        }


        return $this;
    } // setKetPondasi()

    /**
     * Set the value of [rusak_sloop_kolom_balok] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setRusakSloopKolomBalok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_sloop_kolom_balok !== $v) {
            $this->rusak_sloop_kolom_balok = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK;
        }


        return $this;
    } // setRusakSloopKolomBalok()

    /**
     * Set the value of [ket_sloop_kolom_balok] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setKetSloopKolomBalok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_sloop_kolom_balok !== $v) {
            $this->ket_sloop_kolom_balok = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK;
        }


        return $this;
    } // setKetSloopKolomBalok()

    /**
     * Set the value of [rusak_plester_struktur] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setRusakPlesterStruktur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_plester_struktur !== $v) {
            $this->rusak_plester_struktur = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR;
        }


        return $this;
    } // setRusakPlesterStruktur()

    /**
     * Set the value of [ket_plester_struktur] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setKetPlesterStruktur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_plester_struktur !== $v) {
            $this->ket_plester_struktur = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR;
        }


        return $this;
    } // setKetPlesterStruktur()

    /**
     * Set the value of [rusak_kudakuda_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setRusakKudakudaAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_kudakuda_atap !== $v) {
            $this->rusak_kudakuda_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP;
        }


        return $this;
    } // setRusakKudakudaAtap()

    /**
     * Set the value of [ket_kudakuda_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setKetKudakudaAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_kudakuda_atap !== $v) {
            $this->ket_kudakuda_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP;
        }


        return $this;
    } // setKetKudakudaAtap()

    /**
     * Set the value of [rusak_kaso_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setRusakKasoAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_kaso_atap !== $v) {
            $this->rusak_kaso_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::RUSAK_KASO_ATAP;
        }


        return $this;
    } // setRusakKasoAtap()

    /**
     * Set the value of [ket_kaso_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setKetKasoAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_kaso_atap !== $v) {
            $this->ket_kaso_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::KET_KASO_ATAP;
        }


        return $this;
    } // setKetKasoAtap()

    /**
     * Set the value of [rusak_reng_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setRusakRengAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_reng_atap !== $v) {
            $this->rusak_reng_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::RUSAK_RENG_ATAP;
        }


        return $this;
    } // setRusakRengAtap()

    /**
     * Set the value of [ket_reng_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setKetRengAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_reng_atap !== $v) {
            $this->ket_reng_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::KET_RENG_ATAP;
        }


        return $this;
    } // setKetRengAtap()

    /**
     * Set the value of [rusak_tutup_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setRusakTutupAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_tutup_atap !== $v) {
            $this->rusak_tutup_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP;
        }


        return $this;
    } // setRusakTutupAtap()

    /**
     * Set the value of [ket_tutup_atap] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setKetTutupAtap($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_tutup_atap !== $v) {
            $this->ket_tutup_atap = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::KET_TUTUP_ATAP;
        }


        return $this;
    } // setKetTutupAtap()

    /**
     * Set the value of [nilai_saat_ini] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setNilaiSaatIni($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_saat_ini !== $v) {
            $this->nilai_saat_ini = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::NILAI_SAAT_INI;
        }


        return $this;
    } // setNilaiSaatIni()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BangunanLongitudinalPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BangunanLongitudinalPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BangunanLongitudinal The current object (for fluent API support)
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
                $this->modifiedColumns[] = BangunanLongitudinalPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return BangunanLongitudinal The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = BangunanLongitudinalPeer::UPDATER_ID;
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
            if ($this->rusak_pondasi !== '0') {
                return false;
            }

            if ($this->rusak_sloop_kolom_balok !== '0') {
                return false;
            }

            if ($this->rusak_plester_struktur !== '0') {
                return false;
            }

            if ($this->rusak_kudakuda_atap !== '0') {
                return false;
            }

            if ($this->rusak_kaso_atap !== '0') {
                return false;
            }

            if ($this->rusak_reng_atap !== '0') {
                return false;
            }

            if ($this->rusak_tutup_atap !== '0') {
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

            $this->id_bangunan = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->semester_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->rusak_pondasi = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->ket_pondasi = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->rusak_sloop_kolom_balok = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->ket_sloop_kolom_balok = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->rusak_plester_struktur = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->ket_plester_struktur = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->rusak_kudakuda_atap = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->ket_kudakuda_atap = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->rusak_kaso_atap = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->ket_kaso_atap = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->rusak_reng_atap = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->ket_reng_atap = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->rusak_tutup_atap = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->ket_tutup_atap = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->nilai_saat_ini = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
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
            return $startcol + 22; // 22 = BangunanLongitudinalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating BangunanLongitudinal object", $e);
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

        if ($this->aBangunan !== null && $this->id_bangunan !== $this->aBangunan->getIdBangunan()) {
            $this->aBangunan = null;
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
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BangunanLongitudinalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSemester = null;
            $this->aBangunan = null;
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
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BangunanLongitudinalQuery::create()
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
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BangunanLongitudinalPeer::addInstanceToPool($this);
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

            if ($this->aSemester !== null) {
                if ($this->aSemester->isModified() || $this->aSemester->isNew()) {
                    $affectedRows += $this->aSemester->save($con);
                }
                $this->setSemester($this->aSemester);
            }

            if ($this->aBangunan !== null) {
                if ($this->aBangunan->isModified() || $this->aBangunan->isNew()) {
                    $affectedRows += $this->aBangunan->save($con);
                }
                $this->setBangunan($this->aBangunan);
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
        if ($this->isColumnModified(BangunanLongitudinalPeer::ID_BANGUNAN)) {
            $modifiedColumns[':p' . $index++]  = '"id_bangunan"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_PONDASI)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_pondasi"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_PONDASI)) {
            $modifiedColumns[':p' . $index++]  = '"ket_pondasi"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_sloop_kolom_balok"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK)) {
            $modifiedColumns[':p' . $index++]  = '"ket_sloop_kolom_balok"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_plester_struktur"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR)) {
            $modifiedColumns[':p' . $index++]  = '"ket_plester_struktur"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_kudakuda_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"ket_kudakuda_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_KASO_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_kaso_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_KASO_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"ket_kaso_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_RENG_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_reng_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_RENG_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"ket_reng_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_tutup_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_TUTUP_ATAP)) {
            $modifiedColumns[':p' . $index++]  = '"ket_tutup_atap"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::NILAI_SAAT_INI)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_saat_ini"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(BangunanLongitudinalPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "bangunan_longitudinal" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_bangunan"':						
                        $stmt->bindValue($identifier, $this->id_bangunan, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"rusak_pondasi"':						
                        $stmt->bindValue($identifier, $this->rusak_pondasi, PDO::PARAM_STR);
                        break;
                    case '"ket_pondasi"':						
                        $stmt->bindValue($identifier, $this->ket_pondasi, PDO::PARAM_STR);
                        break;
                    case '"rusak_sloop_kolom_balok"':						
                        $stmt->bindValue($identifier, $this->rusak_sloop_kolom_balok, PDO::PARAM_STR);
                        break;
                    case '"ket_sloop_kolom_balok"':						
                        $stmt->bindValue($identifier, $this->ket_sloop_kolom_balok, PDO::PARAM_STR);
                        break;
                    case '"rusak_plester_struktur"':						
                        $stmt->bindValue($identifier, $this->rusak_plester_struktur, PDO::PARAM_STR);
                        break;
                    case '"ket_plester_struktur"':						
                        $stmt->bindValue($identifier, $this->ket_plester_struktur, PDO::PARAM_STR);
                        break;
                    case '"rusak_kudakuda_atap"':						
                        $stmt->bindValue($identifier, $this->rusak_kudakuda_atap, PDO::PARAM_STR);
                        break;
                    case '"ket_kudakuda_atap"':						
                        $stmt->bindValue($identifier, $this->ket_kudakuda_atap, PDO::PARAM_STR);
                        break;
                    case '"rusak_kaso_atap"':						
                        $stmt->bindValue($identifier, $this->rusak_kaso_atap, PDO::PARAM_STR);
                        break;
                    case '"ket_kaso_atap"':						
                        $stmt->bindValue($identifier, $this->ket_kaso_atap, PDO::PARAM_STR);
                        break;
                    case '"rusak_reng_atap"':						
                        $stmt->bindValue($identifier, $this->rusak_reng_atap, PDO::PARAM_STR);
                        break;
                    case '"ket_reng_atap"':						
                        $stmt->bindValue($identifier, $this->ket_reng_atap, PDO::PARAM_STR);
                        break;
                    case '"rusak_tutup_atap"':						
                        $stmt->bindValue($identifier, $this->rusak_tutup_atap, PDO::PARAM_STR);
                        break;
                    case '"ket_tutup_atap"':						
                        $stmt->bindValue($identifier, $this->ket_tutup_atap, PDO::PARAM_STR);
                        break;
                    case '"nilai_saat_ini"':						
                        $stmt->bindValue($identifier, $this->nilai_saat_ini, PDO::PARAM_STR);
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

            if ($this->aSemester !== null) {
                if (!$this->aSemester->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSemester->getValidationFailures());
                }
            }

            if ($this->aBangunan !== null) {
                if (!$this->aBangunan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBangunan->getValidationFailures());
                }
            }


            if (($retval = BangunanLongitudinalPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = BangunanLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdBangunan();
                break;
            case 1:
                return $this->getSemesterId();
                break;
            case 2:
                return $this->getRusakPondasi();
                break;
            case 3:
                return $this->getKetPondasi();
                break;
            case 4:
                return $this->getRusakSloopKolomBalok();
                break;
            case 5:
                return $this->getKetSloopKolomBalok();
                break;
            case 6:
                return $this->getRusakPlesterStruktur();
                break;
            case 7:
                return $this->getKetPlesterStruktur();
                break;
            case 8:
                return $this->getRusakKudakudaAtap();
                break;
            case 9:
                return $this->getKetKudakudaAtap();
                break;
            case 10:
                return $this->getRusakKasoAtap();
                break;
            case 11:
                return $this->getKetKasoAtap();
                break;
            case 12:
                return $this->getRusakRengAtap();
                break;
            case 13:
                return $this->getKetRengAtap();
                break;
            case 14:
                return $this->getRusakTutupAtap();
                break;
            case 15:
                return $this->getKetTutupAtap();
                break;
            case 16:
                return $this->getNilaiSaatIni();
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
        if (isset($alreadyDumpedObjects['BangunanLongitudinal'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['BangunanLongitudinal'][serialize($this->getPrimaryKey())] = true;
        $keys = BangunanLongitudinalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdBangunan(),
            $keys[1] => $this->getSemesterId(),
            $keys[2] => $this->getRusakPondasi(),
            $keys[3] => $this->getKetPondasi(),
            $keys[4] => $this->getRusakSloopKolomBalok(),
            $keys[5] => $this->getKetSloopKolomBalok(),
            $keys[6] => $this->getRusakPlesterStruktur(),
            $keys[7] => $this->getKetPlesterStruktur(),
            $keys[8] => $this->getRusakKudakudaAtap(),
            $keys[9] => $this->getKetKudakudaAtap(),
            $keys[10] => $this->getRusakKasoAtap(),
            $keys[11] => $this->getKetKasoAtap(),
            $keys[12] => $this->getRusakRengAtap(),
            $keys[13] => $this->getKetRengAtap(),
            $keys[14] => $this->getRusakTutupAtap(),
            $keys[15] => $this->getKetTutupAtap(),
            $keys[16] => $this->getNilaiSaatIni(),
            $keys[17] => $this->getCreateDate(),
            $keys[18] => $this->getLastUpdate(),
            $keys[19] => $this->getSoftDelete(),
            $keys[20] => $this->getLastSync(),
            $keys[21] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBangunan) {
                $result['Bangunan'] = $this->aBangunan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = BangunanLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdBangunan($value);
                break;
            case 1:
                $this->setSemesterId($value);
                break;
            case 2:
                $this->setRusakPondasi($value);
                break;
            case 3:
                $this->setKetPondasi($value);
                break;
            case 4:
                $this->setRusakSloopKolomBalok($value);
                break;
            case 5:
                $this->setKetSloopKolomBalok($value);
                break;
            case 6:
                $this->setRusakPlesterStruktur($value);
                break;
            case 7:
                $this->setKetPlesterStruktur($value);
                break;
            case 8:
                $this->setRusakKudakudaAtap($value);
                break;
            case 9:
                $this->setKetKudakudaAtap($value);
                break;
            case 10:
                $this->setRusakKasoAtap($value);
                break;
            case 11:
                $this->setKetKasoAtap($value);
                break;
            case 12:
                $this->setRusakRengAtap($value);
                break;
            case 13:
                $this->setKetRengAtap($value);
                break;
            case 14:
                $this->setRusakTutupAtap($value);
                break;
            case 15:
                $this->setKetTutupAtap($value);
                break;
            case 16:
                $this->setNilaiSaatIni($value);
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
        $keys = BangunanLongitudinalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdBangunan($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSemesterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setRusakPondasi($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKetPondasi($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRusakSloopKolomBalok($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setKetSloopKolomBalok($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setRusakPlesterStruktur($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKetPlesterStruktur($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRusakKudakudaAtap($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKetKudakudaAtap($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setRusakKasoAtap($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setKetKasoAtap($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setRusakRengAtap($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setKetRengAtap($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setRusakTutupAtap($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setKetTutupAtap($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNilaiSaatIni($arr[$keys[16]]);
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
        $criteria = new Criteria(BangunanLongitudinalPeer::DATABASE_NAME);

        if ($this->isColumnModified(BangunanLongitudinalPeer::ID_BANGUNAN)) $criteria->add(BangunanLongitudinalPeer::ID_BANGUNAN, $this->id_bangunan);
        if ($this->isColumnModified(BangunanLongitudinalPeer::SEMESTER_ID)) $criteria->add(BangunanLongitudinalPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_PONDASI)) $criteria->add(BangunanLongitudinalPeer::RUSAK_PONDASI, $this->rusak_pondasi);
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_PONDASI)) $criteria->add(BangunanLongitudinalPeer::KET_PONDASI, $this->ket_pondasi);
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK)) $criteria->add(BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK, $this->rusak_sloop_kolom_balok);
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK)) $criteria->add(BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK, $this->ket_sloop_kolom_balok);
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR)) $criteria->add(BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR, $this->rusak_plester_struktur);
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR)) $criteria->add(BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR, $this->ket_plester_struktur);
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP)) $criteria->add(BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP, $this->rusak_kudakuda_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP)) $criteria->add(BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP, $this->ket_kudakuda_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_KASO_ATAP)) $criteria->add(BangunanLongitudinalPeer::RUSAK_KASO_ATAP, $this->rusak_kaso_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_KASO_ATAP)) $criteria->add(BangunanLongitudinalPeer::KET_KASO_ATAP, $this->ket_kaso_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_RENG_ATAP)) $criteria->add(BangunanLongitudinalPeer::RUSAK_RENG_ATAP, $this->rusak_reng_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_RENG_ATAP)) $criteria->add(BangunanLongitudinalPeer::KET_RENG_ATAP, $this->ket_reng_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP)) $criteria->add(BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP, $this->rusak_tutup_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::KET_TUTUP_ATAP)) $criteria->add(BangunanLongitudinalPeer::KET_TUTUP_ATAP, $this->ket_tutup_atap);
        if ($this->isColumnModified(BangunanLongitudinalPeer::NILAI_SAAT_INI)) $criteria->add(BangunanLongitudinalPeer::NILAI_SAAT_INI, $this->nilai_saat_ini);
        if ($this->isColumnModified(BangunanLongitudinalPeer::CREATE_DATE)) $criteria->add(BangunanLongitudinalPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BangunanLongitudinalPeer::LAST_UPDATE)) $criteria->add(BangunanLongitudinalPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BangunanLongitudinalPeer::SOFT_DELETE)) $criteria->add(BangunanLongitudinalPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(BangunanLongitudinalPeer::LAST_SYNC)) $criteria->add(BangunanLongitudinalPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(BangunanLongitudinalPeer::UPDATER_ID)) $criteria->add(BangunanLongitudinalPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(BangunanLongitudinalPeer::DATABASE_NAME);
        $criteria->add(BangunanLongitudinalPeer::ID_BANGUNAN, $this->id_bangunan);
        $criteria->add(BangunanLongitudinalPeer::SEMESTER_ID, $this->semester_id);

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
        $pks[0] = $this->getIdBangunan();
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
        $this->setIdBangunan($keys[0]);
        $this->setSemesterId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdBangunan()) && (null === $this->getSemesterId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of BangunanLongitudinal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdBangunan($this->getIdBangunan());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setRusakPondasi($this->getRusakPondasi());
        $copyObj->setKetPondasi($this->getKetPondasi());
        $copyObj->setRusakSloopKolomBalok($this->getRusakSloopKolomBalok());
        $copyObj->setKetSloopKolomBalok($this->getKetSloopKolomBalok());
        $copyObj->setRusakPlesterStruktur($this->getRusakPlesterStruktur());
        $copyObj->setKetPlesterStruktur($this->getKetPlesterStruktur());
        $copyObj->setRusakKudakudaAtap($this->getRusakKudakudaAtap());
        $copyObj->setKetKudakudaAtap($this->getKetKudakudaAtap());
        $copyObj->setRusakKasoAtap($this->getRusakKasoAtap());
        $copyObj->setKetKasoAtap($this->getKetKasoAtap());
        $copyObj->setRusakRengAtap($this->getRusakRengAtap());
        $copyObj->setKetRengAtap($this->getKetRengAtap());
        $copyObj->setRusakTutupAtap($this->getRusakTutupAtap());
        $copyObj->setKetTutupAtap($this->getKetTutupAtap());
        $copyObj->setNilaiSaatIni($this->getNilaiSaatIni());
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
     * @return BangunanLongitudinal Clone of current object.
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
     * @return BangunanLongitudinalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BangunanLongitudinalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return BangunanLongitudinal The current object (for fluent API support)
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
            $v->addBangunanLongitudinal($this);
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
                $this->aSemester->addBangunanLongitudinals($this);
             */
        }

        return $this->aSemester;
    }

    /**
     * Declares an association between this object and a Bangunan object.
     *
     * @param             Bangunan $v
     * @return BangunanLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBangunan(Bangunan $v = null)
    {
        if ($v === null) {
            $this->setIdBangunan(NULL);
        } else {
            $this->setIdBangunan($v->getIdBangunan());
        }

        $this->aBangunan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Bangunan object, it will not be re-added.
        if ($v !== null) {
            $v->addBangunanLongitudinal($this);
        }


        return $this;
    }


    /**
     * Get the associated Bangunan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Bangunan The associated Bangunan object.
     * @throws PropelException
     */
    public function getBangunan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBangunan === null && (($this->id_bangunan !== "" && $this->id_bangunan !== null)) && $doQuery) {
            $this->aBangunan = BangunanQuery::create()->findPk($this->id_bangunan, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBangunan->addBangunanLongitudinals($this);
             */
        }

        return $this->aBangunan;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_bangunan = null;
        $this->semester_id = null;
        $this->rusak_pondasi = null;
        $this->ket_pondasi = null;
        $this->rusak_sloop_kolom_balok = null;
        $this->ket_sloop_kolom_balok = null;
        $this->rusak_plester_struktur = null;
        $this->ket_plester_struktur = null;
        $this->rusak_kudakuda_atap = null;
        $this->ket_kudakuda_atap = null;
        $this->rusak_kaso_atap = null;
        $this->ket_kaso_atap = null;
        $this->rusak_reng_atap = null;
        $this->ket_reng_atap = null;
        $this->rusak_tutup_atap = null;
        $this->ket_tutup_atap = null;
        $this->nilai_saat_ini = null;
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
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }
            if ($this->aBangunan instanceof Persistent) {
              $this->aBangunan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aSemester = null;
        $this->aBangunan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BangunanLongitudinalPeer::DEFAULT_STRING_FORMAT);
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
