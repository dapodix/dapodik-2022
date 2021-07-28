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
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\JadwalPeer;
use DataDikdas\Model\JadwalQuery;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalQuery;

/**
 * Base class that represents a row from the 'jadwal' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJadwal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JadwalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JadwalPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

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
     * The value for the hari field.
     * @var        string
     */
    protected $hari;

    /**
     * The value for the bel_ke_01 field.
     * @var        string
     */
    protected $bel_ke_01;

    /**
     * The value for the bel_ke_02 field.
     * @var        string
     */
    protected $bel_ke_02;

    /**
     * The value for the bel_ke_03 field.
     * @var        string
     */
    protected $bel_ke_03;

    /**
     * The value for the bel_ke_04 field.
     * @var        string
     */
    protected $bel_ke_04;

    /**
     * The value for the bel_ke_05 field.
     * @var        string
     */
    protected $bel_ke_05;

    /**
     * The value for the bel_ke_06 field.
     * @var        string
     */
    protected $bel_ke_06;

    /**
     * The value for the bel_ke_07 field.
     * @var        string
     */
    protected $bel_ke_07;

    /**
     * The value for the bel_ke_08 field.
     * @var        string
     */
    protected $bel_ke_08;

    /**
     * The value for the bel_ke_09 field.
     * @var        string
     */
    protected $bel_ke_09;

    /**
     * The value for the bel_ke_10 field.
     * @var        string
     */
    protected $bel_ke_10;

    /**
     * The value for the bel_ke_11 field.
     * @var        string
     */
    protected $bel_ke_11;

    /**
     * The value for the bel_ke_12 field.
     * @var        string
     */
    protected $bel_ke_12;

    /**
     * The value for the bel_ke_13 field.
     * @var        string
     */
    protected $bel_ke_13;

    /**
     * The value for the bel_ke_14 field.
     * @var        string
     */
    protected $bel_ke_14;

    /**
     * The value for the bel_ke_15 field.
     * @var        string
     */
    protected $bel_ke_15;

    /**
     * The value for the bel_ke_16 field.
     * @var        string
     */
    protected $bel_ke_16;

    /**
     * The value for the bel_ke_17 field.
     * @var        string
     */
    protected $bel_ke_17;

    /**
     * The value for the bel_ke_18 field.
     * @var        string
     */
    protected $bel_ke_18;

    /**
     * The value for the bel_ke_19 field.
     * @var        string
     */
    protected $bel_ke_19;

    /**
     * The value for the bel_ke_20 field.
     * @var        string
     */
    protected $bel_ke_20;

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
     * @var        Ruang
     */
    protected $aRuang;

    /**
     * @var        SekolahLongitudinal
     */
    protected $aSekolahLongitudinal;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe01;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe02;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe03;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe04;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe05;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe06;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe07;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe08;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe09;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe10;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe11;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe12;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe13;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe14;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe15;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe16;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe17;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe18;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe19;

    /**
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByBelKe20;

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
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJadwal object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [hari] column value.
     * 
     * @return string
     */
    public function getHari()
    {
        return $this->hari;
    }

    /**
     * Get the [bel_ke_01] column value.
     * 
     * @return string
     */
    public function getBelKe01()
    {
        return $this->bel_ke_01;
    }

    /**
     * Get the [bel_ke_02] column value.
     * 
     * @return string
     */
    public function getBelKe02()
    {
        return $this->bel_ke_02;
    }

    /**
     * Get the [bel_ke_03] column value.
     * 
     * @return string
     */
    public function getBelKe03()
    {
        return $this->bel_ke_03;
    }

    /**
     * Get the [bel_ke_04] column value.
     * 
     * @return string
     */
    public function getBelKe04()
    {
        return $this->bel_ke_04;
    }

    /**
     * Get the [bel_ke_05] column value.
     * 
     * @return string
     */
    public function getBelKe05()
    {
        return $this->bel_ke_05;
    }

    /**
     * Get the [bel_ke_06] column value.
     * 
     * @return string
     */
    public function getBelKe06()
    {
        return $this->bel_ke_06;
    }

    /**
     * Get the [bel_ke_07] column value.
     * 
     * @return string
     */
    public function getBelKe07()
    {
        return $this->bel_ke_07;
    }

    /**
     * Get the [bel_ke_08] column value.
     * 
     * @return string
     */
    public function getBelKe08()
    {
        return $this->bel_ke_08;
    }

    /**
     * Get the [bel_ke_09] column value.
     * 
     * @return string
     */
    public function getBelKe09()
    {
        return $this->bel_ke_09;
    }

    /**
     * Get the [bel_ke_10] column value.
     * 
     * @return string
     */
    public function getBelKe10()
    {
        return $this->bel_ke_10;
    }

    /**
     * Get the [bel_ke_11] column value.
     * 
     * @return string
     */
    public function getBelKe11()
    {
        return $this->bel_ke_11;
    }

    /**
     * Get the [bel_ke_12] column value.
     * 
     * @return string
     */
    public function getBelKe12()
    {
        return $this->bel_ke_12;
    }

    /**
     * Get the [bel_ke_13] column value.
     * 
     * @return string
     */
    public function getBelKe13()
    {
        return $this->bel_ke_13;
    }

    /**
     * Get the [bel_ke_14] column value.
     * 
     * @return string
     */
    public function getBelKe14()
    {
        return $this->bel_ke_14;
    }

    /**
     * Get the [bel_ke_15] column value.
     * 
     * @return string
     */
    public function getBelKe15()
    {
        return $this->bel_ke_15;
    }

    /**
     * Get the [bel_ke_16] column value.
     * 
     * @return string
     */
    public function getBelKe16()
    {
        return $this->bel_ke_16;
    }

    /**
     * Get the [bel_ke_17] column value.
     * 
     * @return string
     */
    public function getBelKe17()
    {
        return $this->bel_ke_17;
    }

    /**
     * Get the [bel_ke_18] column value.
     * 
     * @return string
     */
    public function getBelKe18()
    {
        return $this->bel_ke_18;
    }

    /**
     * Get the [bel_ke_19] column value.
     * 
     * @return string
     */
    public function getBelKe19()
    {
        return $this->bel_ke_19;
    }

    /**
     * Get the [bel_ke_20] column value.
     * 
     * @return string
     */
    public function getBelKe20()
    {
        return $this->bel_ke_20;
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
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = JadwalPeer::SEKOLAH_ID;
        }

        if ($this->aSekolahLongitudinal !== null && $this->aSekolahLongitudinal->getSekolahId() !== $v) {
            $this->aSekolahLongitudinal = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = JadwalPeer::SEMESTER_ID;
        }

        if ($this->aSekolahLongitudinal !== null && $this->aSekolahLongitudinal->getSemesterId() !== $v) {
            $this->aSekolahLongitudinal = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [id_ruang] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_ruang !== $v) {
            $this->id_ruang = $v;
            $this->modifiedColumns[] = JadwalPeer::ID_RUANG;
        }

        if ($this->aRuang !== null && $this->aRuang->getIdRuang() !== $v) {
            $this->aRuang = null;
        }


        return $this;
    } // setIdRuang()

    /**
     * Set the value of [hari] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setHari($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->hari !== $v) {
            $this->hari = $v;
            $this->modifiedColumns[] = JadwalPeer::HARI;
        }


        return $this;
    } // setHari()

    /**
     * Set the value of [bel_ke_01] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe01($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_01 !== $v) {
            $this->bel_ke_01 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_01;
        }

        if ($this->aPembelajaranRelatedByBelKe01 !== null && $this->aPembelajaranRelatedByBelKe01->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe01 = null;
        }


        return $this;
    } // setBelKe01()

    /**
     * Set the value of [bel_ke_02] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe02($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_02 !== $v) {
            $this->bel_ke_02 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_02;
        }

        if ($this->aPembelajaranRelatedByBelKe02 !== null && $this->aPembelajaranRelatedByBelKe02->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe02 = null;
        }


        return $this;
    } // setBelKe02()

    /**
     * Set the value of [bel_ke_03] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe03($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_03 !== $v) {
            $this->bel_ke_03 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_03;
        }

        if ($this->aPembelajaranRelatedByBelKe03 !== null && $this->aPembelajaranRelatedByBelKe03->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe03 = null;
        }


        return $this;
    } // setBelKe03()

    /**
     * Set the value of [bel_ke_04] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe04($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_04 !== $v) {
            $this->bel_ke_04 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_04;
        }

        if ($this->aPembelajaranRelatedByBelKe04 !== null && $this->aPembelajaranRelatedByBelKe04->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe04 = null;
        }


        return $this;
    } // setBelKe04()

    /**
     * Set the value of [bel_ke_05] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe05($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_05 !== $v) {
            $this->bel_ke_05 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_05;
        }

        if ($this->aPembelajaranRelatedByBelKe05 !== null && $this->aPembelajaranRelatedByBelKe05->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe05 = null;
        }


        return $this;
    } // setBelKe05()

    /**
     * Set the value of [bel_ke_06] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe06($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_06 !== $v) {
            $this->bel_ke_06 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_06;
        }

        if ($this->aPembelajaranRelatedByBelKe06 !== null && $this->aPembelajaranRelatedByBelKe06->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe06 = null;
        }


        return $this;
    } // setBelKe06()

    /**
     * Set the value of [bel_ke_07] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe07($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_07 !== $v) {
            $this->bel_ke_07 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_07;
        }

        if ($this->aPembelajaranRelatedByBelKe07 !== null && $this->aPembelajaranRelatedByBelKe07->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe07 = null;
        }


        return $this;
    } // setBelKe07()

    /**
     * Set the value of [bel_ke_08] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe08($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_08 !== $v) {
            $this->bel_ke_08 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_08;
        }

        if ($this->aPembelajaranRelatedByBelKe08 !== null && $this->aPembelajaranRelatedByBelKe08->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe08 = null;
        }


        return $this;
    } // setBelKe08()

    /**
     * Set the value of [bel_ke_09] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe09($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_09 !== $v) {
            $this->bel_ke_09 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_09;
        }

        if ($this->aPembelajaranRelatedByBelKe09 !== null && $this->aPembelajaranRelatedByBelKe09->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe09 = null;
        }


        return $this;
    } // setBelKe09()

    /**
     * Set the value of [bel_ke_10] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe10($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_10 !== $v) {
            $this->bel_ke_10 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_10;
        }

        if ($this->aPembelajaranRelatedByBelKe10 !== null && $this->aPembelajaranRelatedByBelKe10->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe10 = null;
        }


        return $this;
    } // setBelKe10()

    /**
     * Set the value of [bel_ke_11] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe11($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_11 !== $v) {
            $this->bel_ke_11 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_11;
        }

        if ($this->aPembelajaranRelatedByBelKe11 !== null && $this->aPembelajaranRelatedByBelKe11->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe11 = null;
        }


        return $this;
    } // setBelKe11()

    /**
     * Set the value of [bel_ke_12] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe12($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_12 !== $v) {
            $this->bel_ke_12 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_12;
        }

        if ($this->aPembelajaranRelatedByBelKe12 !== null && $this->aPembelajaranRelatedByBelKe12->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe12 = null;
        }


        return $this;
    } // setBelKe12()

    /**
     * Set the value of [bel_ke_13] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe13($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_13 !== $v) {
            $this->bel_ke_13 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_13;
        }

        if ($this->aPembelajaranRelatedByBelKe13 !== null && $this->aPembelajaranRelatedByBelKe13->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe13 = null;
        }


        return $this;
    } // setBelKe13()

    /**
     * Set the value of [bel_ke_14] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe14($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_14 !== $v) {
            $this->bel_ke_14 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_14;
        }

        if ($this->aPembelajaranRelatedByBelKe14 !== null && $this->aPembelajaranRelatedByBelKe14->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe14 = null;
        }


        return $this;
    } // setBelKe14()

    /**
     * Set the value of [bel_ke_15] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe15($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_15 !== $v) {
            $this->bel_ke_15 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_15;
        }

        if ($this->aPembelajaranRelatedByBelKe15 !== null && $this->aPembelajaranRelatedByBelKe15->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe15 = null;
        }


        return $this;
    } // setBelKe15()

    /**
     * Set the value of [bel_ke_16] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe16($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_16 !== $v) {
            $this->bel_ke_16 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_16;
        }

        if ($this->aPembelajaranRelatedByBelKe16 !== null && $this->aPembelajaranRelatedByBelKe16->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe16 = null;
        }


        return $this;
    } // setBelKe16()

    /**
     * Set the value of [bel_ke_17] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe17($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_17 !== $v) {
            $this->bel_ke_17 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_17;
        }

        if ($this->aPembelajaranRelatedByBelKe17 !== null && $this->aPembelajaranRelatedByBelKe17->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe17 = null;
        }


        return $this;
    } // setBelKe17()

    /**
     * Set the value of [bel_ke_18] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe18($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_18 !== $v) {
            $this->bel_ke_18 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_18;
        }

        if ($this->aPembelajaranRelatedByBelKe18 !== null && $this->aPembelajaranRelatedByBelKe18->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe18 = null;
        }


        return $this;
    } // setBelKe18()

    /**
     * Set the value of [bel_ke_19] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe19($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_19 !== $v) {
            $this->bel_ke_19 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_19;
        }

        if ($this->aPembelajaranRelatedByBelKe19 !== null && $this->aPembelajaranRelatedByBelKe19->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe19 = null;
        }


        return $this;
    } // setBelKe19()

    /**
     * Set the value of [bel_ke_20] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setBelKe20($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bel_ke_20 !== $v) {
            $this->bel_ke_20 = $v;
            $this->modifiedColumns[] = JadwalPeer::BEL_KE_20;
        }

        if ($this->aPembelajaranRelatedByBelKe20 !== null && $this->aPembelajaranRelatedByBelKe20->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByBelKe20 = null;
        }


        return $this;
    } // setBelKe20()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Jadwal The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JadwalPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Jadwal The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JadwalPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = JadwalPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Jadwal The current object (for fluent API support)
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
                $this->modifiedColumns[] = JadwalPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Jadwal The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = JadwalPeer::UPDATER_ID;
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

            $this->sekolah_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->semester_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_ruang = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->hari = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->bel_ke_01 = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->bel_ke_02 = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->bel_ke_03 = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->bel_ke_04 = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->bel_ke_05 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->bel_ke_06 = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->bel_ke_07 = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->bel_ke_08 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->bel_ke_09 = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->bel_ke_10 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->bel_ke_11 = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->bel_ke_12 = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->bel_ke_13 = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->bel_ke_14 = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->bel_ke_15 = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->bel_ke_16 = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->bel_ke_17 = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->bel_ke_18 = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->bel_ke_19 = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->bel_ke_20 = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->create_date = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->last_update = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->soft_delete = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->last_sync = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->updater_id = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 29; // 29 = JadwalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Jadwal object", $e);
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

        if ($this->aSekolahLongitudinal !== null && $this->sekolah_id !== $this->aSekolahLongitudinal->getSekolahId()) {
            $this->aSekolahLongitudinal = null;
        }
        if ($this->aSekolahLongitudinal !== null && $this->semester_id !== $this->aSekolahLongitudinal->getSemesterId()) {
            $this->aSekolahLongitudinal = null;
        }
        if ($this->aRuang !== null && $this->id_ruang !== $this->aRuang->getIdRuang()) {
            $this->aRuang = null;
        }
        if ($this->aPembelajaranRelatedByBelKe01 !== null && $this->bel_ke_01 !== $this->aPembelajaranRelatedByBelKe01->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe01 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe02 !== null && $this->bel_ke_02 !== $this->aPembelajaranRelatedByBelKe02->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe02 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe03 !== null && $this->bel_ke_03 !== $this->aPembelajaranRelatedByBelKe03->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe03 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe04 !== null && $this->bel_ke_04 !== $this->aPembelajaranRelatedByBelKe04->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe04 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe05 !== null && $this->bel_ke_05 !== $this->aPembelajaranRelatedByBelKe05->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe05 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe06 !== null && $this->bel_ke_06 !== $this->aPembelajaranRelatedByBelKe06->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe06 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe07 !== null && $this->bel_ke_07 !== $this->aPembelajaranRelatedByBelKe07->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe07 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe08 !== null && $this->bel_ke_08 !== $this->aPembelajaranRelatedByBelKe08->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe08 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe09 !== null && $this->bel_ke_09 !== $this->aPembelajaranRelatedByBelKe09->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe09 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe10 !== null && $this->bel_ke_10 !== $this->aPembelajaranRelatedByBelKe10->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe10 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe11 !== null && $this->bel_ke_11 !== $this->aPembelajaranRelatedByBelKe11->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe11 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe12 !== null && $this->bel_ke_12 !== $this->aPembelajaranRelatedByBelKe12->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe12 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe13 !== null && $this->bel_ke_13 !== $this->aPembelajaranRelatedByBelKe13->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe13 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe14 !== null && $this->bel_ke_14 !== $this->aPembelajaranRelatedByBelKe14->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe14 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe15 !== null && $this->bel_ke_15 !== $this->aPembelajaranRelatedByBelKe15->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe15 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe16 !== null && $this->bel_ke_16 !== $this->aPembelajaranRelatedByBelKe16->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe16 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe17 !== null && $this->bel_ke_17 !== $this->aPembelajaranRelatedByBelKe17->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe17 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe18 !== null && $this->bel_ke_18 !== $this->aPembelajaranRelatedByBelKe18->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe18 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe19 !== null && $this->bel_ke_19 !== $this->aPembelajaranRelatedByBelKe19->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe19 = null;
        }
        if ($this->aPembelajaranRelatedByBelKe20 !== null && $this->bel_ke_20 !== $this->aPembelajaranRelatedByBelKe20->getPembelajaranId()) {
            $this->aPembelajaranRelatedByBelKe20 = null;
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
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JadwalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRuang = null;
            $this->aSekolahLongitudinal = null;
            $this->aPembelajaranRelatedByBelKe01 = null;
            $this->aPembelajaranRelatedByBelKe02 = null;
            $this->aPembelajaranRelatedByBelKe03 = null;
            $this->aPembelajaranRelatedByBelKe04 = null;
            $this->aPembelajaranRelatedByBelKe05 = null;
            $this->aPembelajaranRelatedByBelKe06 = null;
            $this->aPembelajaranRelatedByBelKe07 = null;
            $this->aPembelajaranRelatedByBelKe08 = null;
            $this->aPembelajaranRelatedByBelKe09 = null;
            $this->aPembelajaranRelatedByBelKe10 = null;
            $this->aPembelajaranRelatedByBelKe11 = null;
            $this->aPembelajaranRelatedByBelKe12 = null;
            $this->aPembelajaranRelatedByBelKe13 = null;
            $this->aPembelajaranRelatedByBelKe14 = null;
            $this->aPembelajaranRelatedByBelKe15 = null;
            $this->aPembelajaranRelatedByBelKe16 = null;
            $this->aPembelajaranRelatedByBelKe17 = null;
            $this->aPembelajaranRelatedByBelKe18 = null;
            $this->aPembelajaranRelatedByBelKe19 = null;
            $this->aPembelajaranRelatedByBelKe20 = null;
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
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JadwalQuery::create()
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
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JadwalPeer::addInstanceToPool($this);
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

            if ($this->aRuang !== null) {
                if ($this->aRuang->isModified() || $this->aRuang->isNew()) {
                    $affectedRows += $this->aRuang->save($con);
                }
                $this->setRuang($this->aRuang);
            }

            if ($this->aSekolahLongitudinal !== null) {
                if ($this->aSekolahLongitudinal->isModified() || $this->aSekolahLongitudinal->isNew()) {
                    $affectedRows += $this->aSekolahLongitudinal->save($con);
                }
                $this->setSekolahLongitudinal($this->aSekolahLongitudinal);
            }

            if ($this->aPembelajaranRelatedByBelKe01 !== null) {
                if ($this->aPembelajaranRelatedByBelKe01->isModified() || $this->aPembelajaranRelatedByBelKe01->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe01->save($con);
                }
                $this->setPembelajaranRelatedByBelKe01($this->aPembelajaranRelatedByBelKe01);
            }

            if ($this->aPembelajaranRelatedByBelKe02 !== null) {
                if ($this->aPembelajaranRelatedByBelKe02->isModified() || $this->aPembelajaranRelatedByBelKe02->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe02->save($con);
                }
                $this->setPembelajaranRelatedByBelKe02($this->aPembelajaranRelatedByBelKe02);
            }

            if ($this->aPembelajaranRelatedByBelKe03 !== null) {
                if ($this->aPembelajaranRelatedByBelKe03->isModified() || $this->aPembelajaranRelatedByBelKe03->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe03->save($con);
                }
                $this->setPembelajaranRelatedByBelKe03($this->aPembelajaranRelatedByBelKe03);
            }

            if ($this->aPembelajaranRelatedByBelKe04 !== null) {
                if ($this->aPembelajaranRelatedByBelKe04->isModified() || $this->aPembelajaranRelatedByBelKe04->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe04->save($con);
                }
                $this->setPembelajaranRelatedByBelKe04($this->aPembelajaranRelatedByBelKe04);
            }

            if ($this->aPembelajaranRelatedByBelKe05 !== null) {
                if ($this->aPembelajaranRelatedByBelKe05->isModified() || $this->aPembelajaranRelatedByBelKe05->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe05->save($con);
                }
                $this->setPembelajaranRelatedByBelKe05($this->aPembelajaranRelatedByBelKe05);
            }

            if ($this->aPembelajaranRelatedByBelKe06 !== null) {
                if ($this->aPembelajaranRelatedByBelKe06->isModified() || $this->aPembelajaranRelatedByBelKe06->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe06->save($con);
                }
                $this->setPembelajaranRelatedByBelKe06($this->aPembelajaranRelatedByBelKe06);
            }

            if ($this->aPembelajaranRelatedByBelKe07 !== null) {
                if ($this->aPembelajaranRelatedByBelKe07->isModified() || $this->aPembelajaranRelatedByBelKe07->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe07->save($con);
                }
                $this->setPembelajaranRelatedByBelKe07($this->aPembelajaranRelatedByBelKe07);
            }

            if ($this->aPembelajaranRelatedByBelKe08 !== null) {
                if ($this->aPembelajaranRelatedByBelKe08->isModified() || $this->aPembelajaranRelatedByBelKe08->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe08->save($con);
                }
                $this->setPembelajaranRelatedByBelKe08($this->aPembelajaranRelatedByBelKe08);
            }

            if ($this->aPembelajaranRelatedByBelKe09 !== null) {
                if ($this->aPembelajaranRelatedByBelKe09->isModified() || $this->aPembelajaranRelatedByBelKe09->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe09->save($con);
                }
                $this->setPembelajaranRelatedByBelKe09($this->aPembelajaranRelatedByBelKe09);
            }

            if ($this->aPembelajaranRelatedByBelKe10 !== null) {
                if ($this->aPembelajaranRelatedByBelKe10->isModified() || $this->aPembelajaranRelatedByBelKe10->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe10->save($con);
                }
                $this->setPembelajaranRelatedByBelKe10($this->aPembelajaranRelatedByBelKe10);
            }

            if ($this->aPembelajaranRelatedByBelKe11 !== null) {
                if ($this->aPembelajaranRelatedByBelKe11->isModified() || $this->aPembelajaranRelatedByBelKe11->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe11->save($con);
                }
                $this->setPembelajaranRelatedByBelKe11($this->aPembelajaranRelatedByBelKe11);
            }

            if ($this->aPembelajaranRelatedByBelKe12 !== null) {
                if ($this->aPembelajaranRelatedByBelKe12->isModified() || $this->aPembelajaranRelatedByBelKe12->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe12->save($con);
                }
                $this->setPembelajaranRelatedByBelKe12($this->aPembelajaranRelatedByBelKe12);
            }

            if ($this->aPembelajaranRelatedByBelKe13 !== null) {
                if ($this->aPembelajaranRelatedByBelKe13->isModified() || $this->aPembelajaranRelatedByBelKe13->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe13->save($con);
                }
                $this->setPembelajaranRelatedByBelKe13($this->aPembelajaranRelatedByBelKe13);
            }

            if ($this->aPembelajaranRelatedByBelKe14 !== null) {
                if ($this->aPembelajaranRelatedByBelKe14->isModified() || $this->aPembelajaranRelatedByBelKe14->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe14->save($con);
                }
                $this->setPembelajaranRelatedByBelKe14($this->aPembelajaranRelatedByBelKe14);
            }

            if ($this->aPembelajaranRelatedByBelKe15 !== null) {
                if ($this->aPembelajaranRelatedByBelKe15->isModified() || $this->aPembelajaranRelatedByBelKe15->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe15->save($con);
                }
                $this->setPembelajaranRelatedByBelKe15($this->aPembelajaranRelatedByBelKe15);
            }

            if ($this->aPembelajaranRelatedByBelKe16 !== null) {
                if ($this->aPembelajaranRelatedByBelKe16->isModified() || $this->aPembelajaranRelatedByBelKe16->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe16->save($con);
                }
                $this->setPembelajaranRelatedByBelKe16($this->aPembelajaranRelatedByBelKe16);
            }

            if ($this->aPembelajaranRelatedByBelKe17 !== null) {
                if ($this->aPembelajaranRelatedByBelKe17->isModified() || $this->aPembelajaranRelatedByBelKe17->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe17->save($con);
                }
                $this->setPembelajaranRelatedByBelKe17($this->aPembelajaranRelatedByBelKe17);
            }

            if ($this->aPembelajaranRelatedByBelKe18 !== null) {
                if ($this->aPembelajaranRelatedByBelKe18->isModified() || $this->aPembelajaranRelatedByBelKe18->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe18->save($con);
                }
                $this->setPembelajaranRelatedByBelKe18($this->aPembelajaranRelatedByBelKe18);
            }

            if ($this->aPembelajaranRelatedByBelKe19 !== null) {
                if ($this->aPembelajaranRelatedByBelKe19->isModified() || $this->aPembelajaranRelatedByBelKe19->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe19->save($con);
                }
                $this->setPembelajaranRelatedByBelKe19($this->aPembelajaranRelatedByBelKe19);
            }

            if ($this->aPembelajaranRelatedByBelKe20 !== null) {
                if ($this->aPembelajaranRelatedByBelKe20->isModified() || $this->aPembelajaranRelatedByBelKe20->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByBelKe20->save($con);
                }
                $this->setPembelajaranRelatedByBelKe20($this->aPembelajaranRelatedByBelKe20);
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
        if ($this->isColumnModified(JadwalPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(JadwalPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(JadwalPeer::ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"id_ruang"';
        }
        if ($this->isColumnModified(JadwalPeer::HARI)) {
            $modifiedColumns[':p' . $index++]  = '"hari"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_01)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_01"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_02)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_02"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_03)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_03"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_04)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_04"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_05)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_05"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_06)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_06"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_07)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_07"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_08)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_08"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_09)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_09"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_10)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_10"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_11)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_11"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_12)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_12"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_13)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_13"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_14)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_14"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_15)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_15"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_16)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_16"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_17)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_17"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_18)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_18"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_19)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_19"';
        }
        if ($this->isColumnModified(JadwalPeer::BEL_KE_20)) {
            $modifiedColumns[':p' . $index++]  = '"bel_ke_20"';
        }
        if ($this->isColumnModified(JadwalPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JadwalPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JadwalPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(JadwalPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(JadwalPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "jadwal" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"id_ruang"':						
                        $stmt->bindValue($identifier, $this->id_ruang, PDO::PARAM_STR);
                        break;
                    case '"hari"':						
                        $stmt->bindValue($identifier, $this->hari, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_01"':						
                        $stmt->bindValue($identifier, $this->bel_ke_01, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_02"':						
                        $stmt->bindValue($identifier, $this->bel_ke_02, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_03"':						
                        $stmt->bindValue($identifier, $this->bel_ke_03, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_04"':						
                        $stmt->bindValue($identifier, $this->bel_ke_04, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_05"':						
                        $stmt->bindValue($identifier, $this->bel_ke_05, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_06"':						
                        $stmt->bindValue($identifier, $this->bel_ke_06, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_07"':						
                        $stmt->bindValue($identifier, $this->bel_ke_07, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_08"':						
                        $stmt->bindValue($identifier, $this->bel_ke_08, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_09"':						
                        $stmt->bindValue($identifier, $this->bel_ke_09, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_10"':						
                        $stmt->bindValue($identifier, $this->bel_ke_10, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_11"':						
                        $stmt->bindValue($identifier, $this->bel_ke_11, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_12"':						
                        $stmt->bindValue($identifier, $this->bel_ke_12, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_13"':						
                        $stmt->bindValue($identifier, $this->bel_ke_13, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_14"':						
                        $stmt->bindValue($identifier, $this->bel_ke_14, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_15"':						
                        $stmt->bindValue($identifier, $this->bel_ke_15, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_16"':						
                        $stmt->bindValue($identifier, $this->bel_ke_16, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_17"':						
                        $stmt->bindValue($identifier, $this->bel_ke_17, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_18"':						
                        $stmt->bindValue($identifier, $this->bel_ke_18, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_19"':						
                        $stmt->bindValue($identifier, $this->bel_ke_19, PDO::PARAM_STR);
                        break;
                    case '"bel_ke_20"':						
                        $stmt->bindValue($identifier, $this->bel_ke_20, PDO::PARAM_STR);
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

            if ($this->aRuang !== null) {
                if (!$this->aRuang->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRuang->getValidationFailures());
                }
            }

            if ($this->aSekolahLongitudinal !== null) {
                if (!$this->aSekolahLongitudinal->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolahLongitudinal->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe01 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe01->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe01->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe02 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe02->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe02->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe03 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe03->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe03->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe04 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe04->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe04->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe05 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe05->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe05->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe06 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe06->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe06->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe07 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe07->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe07->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe08 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe08->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe08->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe09 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe09->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe09->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe10 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe10->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe10->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe11 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe11->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe11->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe12 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe12->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe12->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe13 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe13->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe13->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe14 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe14->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe14->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe15 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe15->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe15->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe16 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe16->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe16->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe17 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe17->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe17->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe18 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe18->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe18->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe19 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe19->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe19->getValidationFailures());
                }
            }

            if ($this->aPembelajaranRelatedByBelKe20 !== null) {
                if (!$this->aPembelajaranRelatedByBelKe20->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByBelKe20->getValidationFailures());
                }
            }


            if (($retval = JadwalPeer::doValidate($this, $columns)) !== true) {
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
        $pos = JadwalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSekolahId();
                break;
            case 1:
                return $this->getSemesterId();
                break;
            case 2:
                return $this->getIdRuang();
                break;
            case 3:
                return $this->getHari();
                break;
            case 4:
                return $this->getBelKe01();
                break;
            case 5:
                return $this->getBelKe02();
                break;
            case 6:
                return $this->getBelKe03();
                break;
            case 7:
                return $this->getBelKe04();
                break;
            case 8:
                return $this->getBelKe05();
                break;
            case 9:
                return $this->getBelKe06();
                break;
            case 10:
                return $this->getBelKe07();
                break;
            case 11:
                return $this->getBelKe08();
                break;
            case 12:
                return $this->getBelKe09();
                break;
            case 13:
                return $this->getBelKe10();
                break;
            case 14:
                return $this->getBelKe11();
                break;
            case 15:
                return $this->getBelKe12();
                break;
            case 16:
                return $this->getBelKe13();
                break;
            case 17:
                return $this->getBelKe14();
                break;
            case 18:
                return $this->getBelKe15();
                break;
            case 19:
                return $this->getBelKe16();
                break;
            case 20:
                return $this->getBelKe17();
                break;
            case 21:
                return $this->getBelKe18();
                break;
            case 22:
                return $this->getBelKe19();
                break;
            case 23:
                return $this->getBelKe20();
                break;
            case 24:
                return $this->getCreateDate();
                break;
            case 25:
                return $this->getLastUpdate();
                break;
            case 26:
                return $this->getSoftDelete();
                break;
            case 27:
                return $this->getLastSync();
                break;
            case 28:
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
        if (isset($alreadyDumpedObjects['Jadwal'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Jadwal'][serialize($this->getPrimaryKey())] = true;
        $keys = JadwalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSekolahId(),
            $keys[1] => $this->getSemesterId(),
            $keys[2] => $this->getIdRuang(),
            $keys[3] => $this->getHari(),
            $keys[4] => $this->getBelKe01(),
            $keys[5] => $this->getBelKe02(),
            $keys[6] => $this->getBelKe03(),
            $keys[7] => $this->getBelKe04(),
            $keys[8] => $this->getBelKe05(),
            $keys[9] => $this->getBelKe06(),
            $keys[10] => $this->getBelKe07(),
            $keys[11] => $this->getBelKe08(),
            $keys[12] => $this->getBelKe09(),
            $keys[13] => $this->getBelKe10(),
            $keys[14] => $this->getBelKe11(),
            $keys[15] => $this->getBelKe12(),
            $keys[16] => $this->getBelKe13(),
            $keys[17] => $this->getBelKe14(),
            $keys[18] => $this->getBelKe15(),
            $keys[19] => $this->getBelKe16(),
            $keys[20] => $this->getBelKe17(),
            $keys[21] => $this->getBelKe18(),
            $keys[22] => $this->getBelKe19(),
            $keys[23] => $this->getBelKe20(),
            $keys[24] => $this->getCreateDate(),
            $keys[25] => $this->getLastUpdate(),
            $keys[26] => $this->getSoftDelete(),
            $keys[27] => $this->getLastSync(),
            $keys[28] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRuang) {
                $result['Ruang'] = $this->aRuang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolahLongitudinal) {
                $result['SekolahLongitudinal'] = $this->aSekolahLongitudinal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe01) {
                $result['PembelajaranRelatedByBelKe01'] = $this->aPembelajaranRelatedByBelKe01->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe02) {
                $result['PembelajaranRelatedByBelKe02'] = $this->aPembelajaranRelatedByBelKe02->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe03) {
                $result['PembelajaranRelatedByBelKe03'] = $this->aPembelajaranRelatedByBelKe03->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe04) {
                $result['PembelajaranRelatedByBelKe04'] = $this->aPembelajaranRelatedByBelKe04->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe05) {
                $result['PembelajaranRelatedByBelKe05'] = $this->aPembelajaranRelatedByBelKe05->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe06) {
                $result['PembelajaranRelatedByBelKe06'] = $this->aPembelajaranRelatedByBelKe06->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe07) {
                $result['PembelajaranRelatedByBelKe07'] = $this->aPembelajaranRelatedByBelKe07->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe08) {
                $result['PembelajaranRelatedByBelKe08'] = $this->aPembelajaranRelatedByBelKe08->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe09) {
                $result['PembelajaranRelatedByBelKe09'] = $this->aPembelajaranRelatedByBelKe09->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe10) {
                $result['PembelajaranRelatedByBelKe10'] = $this->aPembelajaranRelatedByBelKe10->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe11) {
                $result['PembelajaranRelatedByBelKe11'] = $this->aPembelajaranRelatedByBelKe11->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe12) {
                $result['PembelajaranRelatedByBelKe12'] = $this->aPembelajaranRelatedByBelKe12->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe13) {
                $result['PembelajaranRelatedByBelKe13'] = $this->aPembelajaranRelatedByBelKe13->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe14) {
                $result['PembelajaranRelatedByBelKe14'] = $this->aPembelajaranRelatedByBelKe14->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe15) {
                $result['PembelajaranRelatedByBelKe15'] = $this->aPembelajaranRelatedByBelKe15->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe16) {
                $result['PembelajaranRelatedByBelKe16'] = $this->aPembelajaranRelatedByBelKe16->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe17) {
                $result['PembelajaranRelatedByBelKe17'] = $this->aPembelajaranRelatedByBelKe17->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe18) {
                $result['PembelajaranRelatedByBelKe18'] = $this->aPembelajaranRelatedByBelKe18->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe19) {
                $result['PembelajaranRelatedByBelKe19'] = $this->aPembelajaranRelatedByBelKe19->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPembelajaranRelatedByBelKe20) {
                $result['PembelajaranRelatedByBelKe20'] = $this->aPembelajaranRelatedByBelKe20->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = JadwalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSekolahId($value);
                break;
            case 1:
                $this->setSemesterId($value);
                break;
            case 2:
                $this->setIdRuang($value);
                break;
            case 3:
                $this->setHari($value);
                break;
            case 4:
                $this->setBelKe01($value);
                break;
            case 5:
                $this->setBelKe02($value);
                break;
            case 6:
                $this->setBelKe03($value);
                break;
            case 7:
                $this->setBelKe04($value);
                break;
            case 8:
                $this->setBelKe05($value);
                break;
            case 9:
                $this->setBelKe06($value);
                break;
            case 10:
                $this->setBelKe07($value);
                break;
            case 11:
                $this->setBelKe08($value);
                break;
            case 12:
                $this->setBelKe09($value);
                break;
            case 13:
                $this->setBelKe10($value);
                break;
            case 14:
                $this->setBelKe11($value);
                break;
            case 15:
                $this->setBelKe12($value);
                break;
            case 16:
                $this->setBelKe13($value);
                break;
            case 17:
                $this->setBelKe14($value);
                break;
            case 18:
                $this->setBelKe15($value);
                break;
            case 19:
                $this->setBelKe16($value);
                break;
            case 20:
                $this->setBelKe17($value);
                break;
            case 21:
                $this->setBelKe18($value);
                break;
            case 22:
                $this->setBelKe19($value);
                break;
            case 23:
                $this->setBelKe20($value);
                break;
            case 24:
                $this->setCreateDate($value);
                break;
            case 25:
                $this->setLastUpdate($value);
                break;
            case 26:
                $this->setSoftDelete($value);
                break;
            case 27:
                $this->setLastSync($value);
                break;
            case 28:
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
        $keys = JadwalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSekolahId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSemesterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdRuang($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setHari($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBelKe01($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBelKe02($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setBelKe03($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBelKe04($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setBelKe05($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setBelKe06($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setBelKe07($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setBelKe08($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setBelKe09($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setBelKe10($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setBelKe11($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setBelKe12($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setBelKe13($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setBelKe14($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setBelKe15($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setBelKe16($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setBelKe17($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setBelKe18($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setBelKe19($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setBelKe20($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setCreateDate($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setLastUpdate($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setSoftDelete($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setLastSync($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setUpdaterId($arr[$keys[28]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JadwalPeer::DATABASE_NAME);

        if ($this->isColumnModified(JadwalPeer::SEKOLAH_ID)) $criteria->add(JadwalPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(JadwalPeer::SEMESTER_ID)) $criteria->add(JadwalPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(JadwalPeer::ID_RUANG)) $criteria->add(JadwalPeer::ID_RUANG, $this->id_ruang);
        if ($this->isColumnModified(JadwalPeer::HARI)) $criteria->add(JadwalPeer::HARI, $this->hari);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_01)) $criteria->add(JadwalPeer::BEL_KE_01, $this->bel_ke_01);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_02)) $criteria->add(JadwalPeer::BEL_KE_02, $this->bel_ke_02);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_03)) $criteria->add(JadwalPeer::BEL_KE_03, $this->bel_ke_03);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_04)) $criteria->add(JadwalPeer::BEL_KE_04, $this->bel_ke_04);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_05)) $criteria->add(JadwalPeer::BEL_KE_05, $this->bel_ke_05);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_06)) $criteria->add(JadwalPeer::BEL_KE_06, $this->bel_ke_06);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_07)) $criteria->add(JadwalPeer::BEL_KE_07, $this->bel_ke_07);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_08)) $criteria->add(JadwalPeer::BEL_KE_08, $this->bel_ke_08);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_09)) $criteria->add(JadwalPeer::BEL_KE_09, $this->bel_ke_09);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_10)) $criteria->add(JadwalPeer::BEL_KE_10, $this->bel_ke_10);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_11)) $criteria->add(JadwalPeer::BEL_KE_11, $this->bel_ke_11);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_12)) $criteria->add(JadwalPeer::BEL_KE_12, $this->bel_ke_12);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_13)) $criteria->add(JadwalPeer::BEL_KE_13, $this->bel_ke_13);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_14)) $criteria->add(JadwalPeer::BEL_KE_14, $this->bel_ke_14);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_15)) $criteria->add(JadwalPeer::BEL_KE_15, $this->bel_ke_15);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_16)) $criteria->add(JadwalPeer::BEL_KE_16, $this->bel_ke_16);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_17)) $criteria->add(JadwalPeer::BEL_KE_17, $this->bel_ke_17);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_18)) $criteria->add(JadwalPeer::BEL_KE_18, $this->bel_ke_18);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_19)) $criteria->add(JadwalPeer::BEL_KE_19, $this->bel_ke_19);
        if ($this->isColumnModified(JadwalPeer::BEL_KE_20)) $criteria->add(JadwalPeer::BEL_KE_20, $this->bel_ke_20);
        if ($this->isColumnModified(JadwalPeer::CREATE_DATE)) $criteria->add(JadwalPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JadwalPeer::LAST_UPDATE)) $criteria->add(JadwalPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JadwalPeer::SOFT_DELETE)) $criteria->add(JadwalPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(JadwalPeer::LAST_SYNC)) $criteria->add(JadwalPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(JadwalPeer::UPDATER_ID)) $criteria->add(JadwalPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(JadwalPeer::DATABASE_NAME);
        $criteria->add(JadwalPeer::SEKOLAH_ID, $this->sekolah_id);
        $criteria->add(JadwalPeer::SEMESTER_ID, $this->semester_id);
        $criteria->add(JadwalPeer::ID_RUANG, $this->id_ruang);
        $criteria->add(JadwalPeer::HARI, $this->hari);

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
        $pks[0] = $this->getSekolahId();
        $pks[1] = $this->getSemesterId();
        $pks[2] = $this->getIdRuang();
        $pks[3] = $this->getHari();

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
        $this->setSekolahId($keys[0]);
        $this->setSemesterId($keys[1]);
        $this->setIdRuang($keys[2]);
        $this->setHari($keys[3]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getSekolahId()) && (null === $this->getSemesterId()) && (null === $this->getIdRuang()) && (null === $this->getHari());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Jadwal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setIdRuang($this->getIdRuang());
        $copyObj->setHari($this->getHari());
        $copyObj->setBelKe01($this->getBelKe01());
        $copyObj->setBelKe02($this->getBelKe02());
        $copyObj->setBelKe03($this->getBelKe03());
        $copyObj->setBelKe04($this->getBelKe04());
        $copyObj->setBelKe05($this->getBelKe05());
        $copyObj->setBelKe06($this->getBelKe06());
        $copyObj->setBelKe07($this->getBelKe07());
        $copyObj->setBelKe08($this->getBelKe08());
        $copyObj->setBelKe09($this->getBelKe09());
        $copyObj->setBelKe10($this->getBelKe10());
        $copyObj->setBelKe11($this->getBelKe11());
        $copyObj->setBelKe12($this->getBelKe12());
        $copyObj->setBelKe13($this->getBelKe13());
        $copyObj->setBelKe14($this->getBelKe14());
        $copyObj->setBelKe15($this->getBelKe15());
        $copyObj->setBelKe16($this->getBelKe16());
        $copyObj->setBelKe17($this->getBelKe17());
        $copyObj->setBelKe18($this->getBelKe18());
        $copyObj->setBelKe19($this->getBelKe19());
        $copyObj->setBelKe20($this->getBelKe20());
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
     * @return Jadwal Clone of current object.
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
     * @return JadwalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JadwalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ruang object.
     *
     * @param             Ruang $v
     * @return Jadwal The current object (for fluent API support)
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
            $v->addJadwal($this);
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
                $this->aRuang->addJadwals($this);
             */
        }

        return $this->aRuang;
    }

    /**
     * Declares an association between this object and a SekolahLongitudinal object.
     *
     * @param             SekolahLongitudinal $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolahLongitudinal(SekolahLongitudinal $v = null)
    {
        if ($v === null) {
            $this->setSekolahId(NULL);
        } else {
            $this->setSekolahId($v->getSekolahId());
        }

        if ($v === null) {
            $this->setSemesterId(NULL);
        } else {
            $this->setSemesterId($v->getSemesterId());
        }

        $this->aSekolahLongitudinal = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SekolahLongitudinal object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwal($this);
        }


        return $this;
    }


    /**
     * Get the associated SekolahLongitudinal object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SekolahLongitudinal The associated SekolahLongitudinal object.
     * @throws PropelException
     */
    public function getSekolahLongitudinal(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSekolahLongitudinal === null && (($this->sekolah_id !== "" && $this->sekolah_id !== null) && ($this->semester_id !== "" && $this->semester_id !== null)) && $doQuery) {
            $this->aSekolahLongitudinal = SekolahLongitudinalQuery::create()->findPk(array($this->sekolah_id, $this->semester_id), $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolahLongitudinal->addJadwals($this);
             */
        }

        return $this->aSekolahLongitudinal;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe01(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe01(NULL);
        } else {
            $this->setBelKe01($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe01 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe01($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe01(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe01 === null && (($this->bel_ke_01 !== "" && $this->bel_ke_01 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe01 = PembelajaranQuery::create()->findPk($this->bel_ke_01, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe01->addJadwalsRelatedByBelKe01($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe01;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe02(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe02(NULL);
        } else {
            $this->setBelKe02($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe02 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe02($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe02(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe02 === null && (($this->bel_ke_02 !== "" && $this->bel_ke_02 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe02 = PembelajaranQuery::create()->findPk($this->bel_ke_02, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe02->addJadwalsRelatedByBelKe02($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe02;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe03(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe03(NULL);
        } else {
            $this->setBelKe03($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe03 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe03($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe03(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe03 === null && (($this->bel_ke_03 !== "" && $this->bel_ke_03 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe03 = PembelajaranQuery::create()->findPk($this->bel_ke_03, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe03->addJadwalsRelatedByBelKe03($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe03;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe04(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe04(NULL);
        } else {
            $this->setBelKe04($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe04 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe04($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe04(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe04 === null && (($this->bel_ke_04 !== "" && $this->bel_ke_04 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe04 = PembelajaranQuery::create()->findPk($this->bel_ke_04, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe04->addJadwalsRelatedByBelKe04($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe04;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe05(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe05(NULL);
        } else {
            $this->setBelKe05($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe05 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe05($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe05(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe05 === null && (($this->bel_ke_05 !== "" && $this->bel_ke_05 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe05 = PembelajaranQuery::create()->findPk($this->bel_ke_05, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe05->addJadwalsRelatedByBelKe05($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe05;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe06(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe06(NULL);
        } else {
            $this->setBelKe06($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe06 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe06($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe06(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe06 === null && (($this->bel_ke_06 !== "" && $this->bel_ke_06 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe06 = PembelajaranQuery::create()->findPk($this->bel_ke_06, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe06->addJadwalsRelatedByBelKe06($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe06;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe07(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe07(NULL);
        } else {
            $this->setBelKe07($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe07 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe07($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe07(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe07 === null && (($this->bel_ke_07 !== "" && $this->bel_ke_07 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe07 = PembelajaranQuery::create()->findPk($this->bel_ke_07, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe07->addJadwalsRelatedByBelKe07($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe07;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe08(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe08(NULL);
        } else {
            $this->setBelKe08($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe08 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe08($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe08(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe08 === null && (($this->bel_ke_08 !== "" && $this->bel_ke_08 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe08 = PembelajaranQuery::create()->findPk($this->bel_ke_08, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe08->addJadwalsRelatedByBelKe08($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe08;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe09(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe09(NULL);
        } else {
            $this->setBelKe09($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe09 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe09($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe09(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe09 === null && (($this->bel_ke_09 !== "" && $this->bel_ke_09 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe09 = PembelajaranQuery::create()->findPk($this->bel_ke_09, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe09->addJadwalsRelatedByBelKe09($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe09;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe10(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe10(NULL);
        } else {
            $this->setBelKe10($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe10 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe10($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe10(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe10 === null && (($this->bel_ke_10 !== "" && $this->bel_ke_10 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe10 = PembelajaranQuery::create()->findPk($this->bel_ke_10, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe10->addJadwalsRelatedByBelKe10($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe10;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe11(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe11(NULL);
        } else {
            $this->setBelKe11($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe11 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe11($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe11(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe11 === null && (($this->bel_ke_11 !== "" && $this->bel_ke_11 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe11 = PembelajaranQuery::create()->findPk($this->bel_ke_11, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe11->addJadwalsRelatedByBelKe11($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe11;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe12(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe12(NULL);
        } else {
            $this->setBelKe12($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe12 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe12($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe12(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe12 === null && (($this->bel_ke_12 !== "" && $this->bel_ke_12 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe12 = PembelajaranQuery::create()->findPk($this->bel_ke_12, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe12->addJadwalsRelatedByBelKe12($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe12;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe13(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe13(NULL);
        } else {
            $this->setBelKe13($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe13 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe13($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe13(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe13 === null && (($this->bel_ke_13 !== "" && $this->bel_ke_13 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe13 = PembelajaranQuery::create()->findPk($this->bel_ke_13, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe13->addJadwalsRelatedByBelKe13($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe13;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe14(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe14(NULL);
        } else {
            $this->setBelKe14($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe14 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe14($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe14(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe14 === null && (($this->bel_ke_14 !== "" && $this->bel_ke_14 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe14 = PembelajaranQuery::create()->findPk($this->bel_ke_14, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe14->addJadwalsRelatedByBelKe14($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe14;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe15(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe15(NULL);
        } else {
            $this->setBelKe15($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe15 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe15($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe15(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe15 === null && (($this->bel_ke_15 !== "" && $this->bel_ke_15 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe15 = PembelajaranQuery::create()->findPk($this->bel_ke_15, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe15->addJadwalsRelatedByBelKe15($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe15;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe16(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe16(NULL);
        } else {
            $this->setBelKe16($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe16 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe16($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe16(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe16 === null && (($this->bel_ke_16 !== "" && $this->bel_ke_16 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe16 = PembelajaranQuery::create()->findPk($this->bel_ke_16, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe16->addJadwalsRelatedByBelKe16($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe16;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe17(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe17(NULL);
        } else {
            $this->setBelKe17($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe17 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe17($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe17(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe17 === null && (($this->bel_ke_17 !== "" && $this->bel_ke_17 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe17 = PembelajaranQuery::create()->findPk($this->bel_ke_17, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe17->addJadwalsRelatedByBelKe17($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe17;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe18(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe18(NULL);
        } else {
            $this->setBelKe18($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe18 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe18($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe18(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe18 === null && (($this->bel_ke_18 !== "" && $this->bel_ke_18 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe18 = PembelajaranQuery::create()->findPk($this->bel_ke_18, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe18->addJadwalsRelatedByBelKe18($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe18;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe19(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe19(NULL);
        } else {
            $this->setBelKe19($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe19 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe19($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe19(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe19 === null && (($this->bel_ke_19 !== "" && $this->bel_ke_19 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe19 = PembelajaranQuery::create()->findPk($this->bel_ke_19, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe19->addJadwalsRelatedByBelKe19($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe19;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Jadwal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByBelKe20(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setBelKe20(NULL);
        } else {
            $this->setBelKe20($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByBelKe20 = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addJadwalRelatedByBelKe20($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByBelKe20(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByBelKe20 === null && (($this->bel_ke_20 !== "" && $this->bel_ke_20 !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByBelKe20 = PembelajaranQuery::create()->findPk($this->bel_ke_20, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByBelKe20->addJadwalsRelatedByBelKe20($this);
             */
        }

        return $this->aPembelajaranRelatedByBelKe20;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->sekolah_id = null;
        $this->semester_id = null;
        $this->id_ruang = null;
        $this->hari = null;
        $this->bel_ke_01 = null;
        $this->bel_ke_02 = null;
        $this->bel_ke_03 = null;
        $this->bel_ke_04 = null;
        $this->bel_ke_05 = null;
        $this->bel_ke_06 = null;
        $this->bel_ke_07 = null;
        $this->bel_ke_08 = null;
        $this->bel_ke_09 = null;
        $this->bel_ke_10 = null;
        $this->bel_ke_11 = null;
        $this->bel_ke_12 = null;
        $this->bel_ke_13 = null;
        $this->bel_ke_14 = null;
        $this->bel_ke_15 = null;
        $this->bel_ke_16 = null;
        $this->bel_ke_17 = null;
        $this->bel_ke_18 = null;
        $this->bel_ke_19 = null;
        $this->bel_ke_20 = null;
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
            if ($this->aRuang instanceof Persistent) {
              $this->aRuang->clearAllReferences($deep);
            }
            if ($this->aSekolahLongitudinal instanceof Persistent) {
              $this->aSekolahLongitudinal->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe01 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe01->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe02 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe02->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe03 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe03->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe04 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe04->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe05 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe05->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe06 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe06->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe07 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe07->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe08 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe08->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe09 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe09->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe10 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe10->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe11 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe11->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe12 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe12->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe13 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe13->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe14 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe14->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe15 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe15->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe16 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe16->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe17 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe17->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe18 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe18->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe19 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe19->clearAllReferences($deep);
            }
            if ($this->aPembelajaranRelatedByBelKe20 instanceof Persistent) {
              $this->aPembelajaranRelatedByBelKe20->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRuang = null;
        $this->aSekolahLongitudinal = null;
        $this->aPembelajaranRelatedByBelKe01 = null;
        $this->aPembelajaranRelatedByBelKe02 = null;
        $this->aPembelajaranRelatedByBelKe03 = null;
        $this->aPembelajaranRelatedByBelKe04 = null;
        $this->aPembelajaranRelatedByBelKe05 = null;
        $this->aPembelajaranRelatedByBelKe06 = null;
        $this->aPembelajaranRelatedByBelKe07 = null;
        $this->aPembelajaranRelatedByBelKe08 = null;
        $this->aPembelajaranRelatedByBelKe09 = null;
        $this->aPembelajaranRelatedByBelKe10 = null;
        $this->aPembelajaranRelatedByBelKe11 = null;
        $this->aPembelajaranRelatedByBelKe12 = null;
        $this->aPembelajaranRelatedByBelKe13 = null;
        $this->aPembelajaranRelatedByBelKe14 = null;
        $this->aPembelajaranRelatedByBelKe15 = null;
        $this->aPembelajaranRelatedByBelKe16 = null;
        $this->aPembelajaranRelatedByBelKe17 = null;
        $this->aPembelajaranRelatedByBelKe18 = null;
        $this->aPembelajaranRelatedByBelKe19 = null;
        $this->aPembelajaranRelatedByBelKe20 = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JadwalPeer::DEFAULT_STRING_FORMAT);
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
