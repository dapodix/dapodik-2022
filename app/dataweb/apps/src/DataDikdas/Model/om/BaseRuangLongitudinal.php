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
use DataDikdas\Model\LargeObject;
use DataDikdas\Model\LargeObjectQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangLongitudinal;
use DataDikdas\Model\RuangLongitudinalPeer;
use DataDikdas\Model\RuangLongitudinalQuery;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;

/**
 * Base class that represents a row from the 'ruang_longitudinal' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRuangLongitudinal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RuangLongitudinalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RuangLongitudinalPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_ruang field.
     * @var        string
     */
    protected $id_ruang;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

    /**
     * The value for the blob_id field.
     * @var        string
     */
    protected $blob_id;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

    /**
     * The value for the rusak_lisplang_talang field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_lisplang_talang;

    /**
     * The value for the ket_lisplang_talang field.
     * @var        string
     */
    protected $ket_lisplang_talang;

    /**
     * The value for the rusak_rangka_plafon field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_rangka_plafon;

    /**
     * The value for the ket_rangka_plafon field.
     * @var        string
     */
    protected $ket_rangka_plafon;

    /**
     * The value for the rusak_tutup_plafon field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_tutup_plafon;

    /**
     * The value for the ket_tutup_plafon field.
     * @var        string
     */
    protected $ket_tutup_plafon;

    /**
     * The value for the rusak_bata_dinding field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_bata_dinding;

    /**
     * The value for the ket_bata_dinding field.
     * @var        string
     */
    protected $ket_bata_dinding;

    /**
     * The value for the rusak_plester_dinding field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_plester_dinding;

    /**
     * The value for the ket_plester_dinding field.
     * @var        string
     */
    protected $ket_plester_dinding;

    /**
     * The value for the rusak_daun_jendela field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_daun_jendela;

    /**
     * The value for the ket_daun_jendela field.
     * @var        string
     */
    protected $ket_daun_jendela;

    /**
     * The value for the rusak_daun_pintu field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_daun_pintu;

    /**
     * The value for the ket_daun_pintu field.
     * @var        string
     */
    protected $ket_daun_pintu;

    /**
     * The value for the rusak_kusen field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_kusen;

    /**
     * The value for the ket_kusen field.
     * @var        string
     */
    protected $ket_kusen;

    /**
     * The value for the rusak_tutup_lantai field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_tutup_lantai;

    /**
     * The value for the ket_penutup_lantai field.
     * @var        string
     */
    protected $ket_penutup_lantai;

    /**
     * The value for the rusak_inst_listrik field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_inst_listrik;

    /**
     * The value for the ket_inst_listrik field.
     * @var        string
     */
    protected $ket_inst_listrik;

    /**
     * The value for the rusak_inst_air field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_inst_air;

    /**
     * The value for the ket_inst_air field.
     * @var        string
     */
    protected $ket_inst_air;

    /**
     * The value for the rusak_drainase field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_drainase;

    /**
     * The value for the ket_drainase field.
     * @var        string
     */
    protected $ket_drainase;

    /**
     * The value for the rusak_finish_struktur field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_finish_struktur;

    /**
     * The value for the ket_finish_struktur field.
     * @var        string
     */
    protected $ket_finish_struktur;

    /**
     * The value for the rusak_finish_plafon field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_finish_plafon;

    /**
     * The value for the ket_finish_plafon field.
     * @var        string
     */
    protected $ket_finish_plafon;

    /**
     * The value for the rusak_finish_dinding field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_finish_dinding;

    /**
     * The value for the ket_finish_dinding field.
     * @var        string
     */
    protected $ket_finish_dinding;

    /**
     * The value for the rusak_finish_kpj field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $rusak_finish_kpj;

    /**
     * The value for the ket_finish_kpj field.
     * @var        string
     */
    protected $ket_finish_kpj;

    /**
     * The value for the berfungsi field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $berfungsi;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
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
     * @var        LargeObject
     */
    protected $aLargeObject;

    /**
     * @var        Semester
     */
    protected $aSemester;

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
        $this->asal_data = '1';
        $this->rusak_lisplang_talang = '0';
        $this->rusak_rangka_plafon = '0';
        $this->rusak_tutup_plafon = '0';
        $this->rusak_bata_dinding = '0';
        $this->rusak_plester_dinding = '0';
        $this->rusak_daun_jendela = '0';
        $this->rusak_daun_pintu = '0';
        $this->rusak_kusen = '0';
        $this->rusak_tutup_lantai = '0';
        $this->rusak_inst_listrik = '0';
        $this->rusak_inst_air = '0';
        $this->rusak_drainase = '0';
        $this->rusak_finish_struktur = '0';
        $this->rusak_finish_plafon = '0';
        $this->rusak_finish_dinding = '0';
        $this->rusak_finish_kpj = '0';
        $this->berfungsi = '1';
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseRuangLongitudinal object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [semester_id] column value.
     * 
     * @return string
     */
    public function getSemesterId()
    {
        return $this->semester_id;
    }

    /**
     * Get the [blob_id] column value.
     * 
     * @return string
     */
    public function getBlobId()
    {
        return $this->blob_id;
    }

    /**
     * Get the [asal_data] column value.
     * 
     * @return string
     */
    public function getAsalData()
    {
        return $this->asal_data;
    }

    /**
     * Get the [rusak_lisplang_talang] column value.
     * 
     * @return string
     */
    public function getRusakLisplangTalang()
    {
        return $this->rusak_lisplang_talang;
    }

    /**
     * Get the [ket_lisplang_talang] column value.
     * 
     * @return string
     */
    public function getKetLisplangTalang()
    {
        return $this->ket_lisplang_talang;
    }

    /**
     * Get the [rusak_rangka_plafon] column value.
     * 
     * @return string
     */
    public function getRusakRangkaPlafon()
    {
        return $this->rusak_rangka_plafon;
    }

    /**
     * Get the [ket_rangka_plafon] column value.
     * 
     * @return string
     */
    public function getKetRangkaPlafon()
    {
        return $this->ket_rangka_plafon;
    }

    /**
     * Get the [rusak_tutup_plafon] column value.
     * 
     * @return string
     */
    public function getRusakTutupPlafon()
    {
        return $this->rusak_tutup_plafon;
    }

    /**
     * Get the [ket_tutup_plafon] column value.
     * 
     * @return string
     */
    public function getKetTutupPlafon()
    {
        return $this->ket_tutup_plafon;
    }

    /**
     * Get the [rusak_bata_dinding] column value.
     * 
     * @return string
     */
    public function getRusakBataDinding()
    {
        return $this->rusak_bata_dinding;
    }

    /**
     * Get the [ket_bata_dinding] column value.
     * 
     * @return string
     */
    public function getKetBataDinding()
    {
        return $this->ket_bata_dinding;
    }

    /**
     * Get the [rusak_plester_dinding] column value.
     * 
     * @return string
     */
    public function getRusakPlesterDinding()
    {
        return $this->rusak_plester_dinding;
    }

    /**
     * Get the [ket_plester_dinding] column value.
     * 
     * @return string
     */
    public function getKetPlesterDinding()
    {
        return $this->ket_plester_dinding;
    }

    /**
     * Get the [rusak_daun_jendela] column value.
     * 
     * @return string
     */
    public function getRusakDaunJendela()
    {
        return $this->rusak_daun_jendela;
    }

    /**
     * Get the [ket_daun_jendela] column value.
     * 
     * @return string
     */
    public function getKetDaunJendela()
    {
        return $this->ket_daun_jendela;
    }

    /**
     * Get the [rusak_daun_pintu] column value.
     * 
     * @return string
     */
    public function getRusakDaunPintu()
    {
        return $this->rusak_daun_pintu;
    }

    /**
     * Get the [ket_daun_pintu] column value.
     * 
     * @return string
     */
    public function getKetDaunPintu()
    {
        return $this->ket_daun_pintu;
    }

    /**
     * Get the [rusak_kusen] column value.
     * 
     * @return string
     */
    public function getRusakKusen()
    {
        return $this->rusak_kusen;
    }

    /**
     * Get the [ket_kusen] column value.
     * 
     * @return string
     */
    public function getKetKusen()
    {
        return $this->ket_kusen;
    }

    /**
     * Get the [rusak_tutup_lantai] column value.
     * 
     * @return string
     */
    public function getRusakTutupLantai()
    {
        return $this->rusak_tutup_lantai;
    }

    /**
     * Get the [ket_penutup_lantai] column value.
     * 
     * @return string
     */
    public function getKetPenutupLantai()
    {
        return $this->ket_penutup_lantai;
    }

    /**
     * Get the [rusak_inst_listrik] column value.
     * 
     * @return string
     */
    public function getRusakInstListrik()
    {
        return $this->rusak_inst_listrik;
    }

    /**
     * Get the [ket_inst_listrik] column value.
     * 
     * @return string
     */
    public function getKetInstListrik()
    {
        return $this->ket_inst_listrik;
    }

    /**
     * Get the [rusak_inst_air] column value.
     * 
     * @return string
     */
    public function getRusakInstAir()
    {
        return $this->rusak_inst_air;
    }

    /**
     * Get the [ket_inst_air] column value.
     * 
     * @return string
     */
    public function getKetInstAir()
    {
        return $this->ket_inst_air;
    }

    /**
     * Get the [rusak_drainase] column value.
     * 
     * @return string
     */
    public function getRusakDrainase()
    {
        return $this->rusak_drainase;
    }

    /**
     * Get the [ket_drainase] column value.
     * 
     * @return string
     */
    public function getKetDrainase()
    {
        return $this->ket_drainase;
    }

    /**
     * Get the [rusak_finish_struktur] column value.
     * 
     * @return string
     */
    public function getRusakFinishStruktur()
    {
        return $this->rusak_finish_struktur;
    }

    /**
     * Get the [ket_finish_struktur] column value.
     * 
     * @return string
     */
    public function getKetFinishStruktur()
    {
        return $this->ket_finish_struktur;
    }

    /**
     * Get the [rusak_finish_plafon] column value.
     * 
     * @return string
     */
    public function getRusakFinishPlafon()
    {
        return $this->rusak_finish_plafon;
    }

    /**
     * Get the [ket_finish_plafon] column value.
     * 
     * @return string
     */
    public function getKetFinishPlafon()
    {
        return $this->ket_finish_plafon;
    }

    /**
     * Get the [rusak_finish_dinding] column value.
     * 
     * @return string
     */
    public function getRusakFinishDinding()
    {
        return $this->rusak_finish_dinding;
    }

    /**
     * Get the [ket_finish_dinding] column value.
     * 
     * @return string
     */
    public function getKetFinishDinding()
    {
        return $this->ket_finish_dinding;
    }

    /**
     * Get the [rusak_finish_kpj] column value.
     * 
     * @return string
     */
    public function getRusakFinishKpj()
    {
        return $this->rusak_finish_kpj;
    }

    /**
     * Get the [ket_finish_kpj] column value.
     * 
     * @return string
     */
    public function getKetFinishKpj()
    {
        return $this->ket_finish_kpj;
    }

    /**
     * Get the [berfungsi] column value.
     * 
     * @return string
     */
    public function getBerfungsi()
    {
        return $this->berfungsi;
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
     * Set the value of [id_ruang] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_ruang !== $v) {
            $this->id_ruang = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::ID_RUANG;
        }

        if ($this->aRuang !== null && $this->aRuang->getIdRuang() !== $v) {
            $this->aRuang = null;
        }


        return $this;
    } // setIdRuang()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [blob_id] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setBlobId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->blob_id !== $v) {
            $this->blob_id = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::BLOB_ID;
        }

        if ($this->aLargeObject !== null && $this->aLargeObject->getBlobId() !== $v) {
            $this->aLargeObject = null;
        }


        return $this;
    } // setBlobId()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Set the value of [rusak_lisplang_talang] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakLisplangTalang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_lisplang_talang !== $v) {
            $this->rusak_lisplang_talang = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG;
        }


        return $this;
    } // setRusakLisplangTalang()

    /**
     * Set the value of [ket_lisplang_talang] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetLisplangTalang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_lisplang_talang !== $v) {
            $this->ket_lisplang_talang = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_LISPLANG_TALANG;
        }


        return $this;
    } // setKetLisplangTalang()

    /**
     * Set the value of [rusak_rangka_plafon] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakRangkaPlafon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_rangka_plafon !== $v) {
            $this->rusak_rangka_plafon = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON;
        }


        return $this;
    } // setRusakRangkaPlafon()

    /**
     * Set the value of [ket_rangka_plafon] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetRangkaPlafon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_rangka_plafon !== $v) {
            $this->ket_rangka_plafon = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_RANGKA_PLAFON;
        }


        return $this;
    } // setKetRangkaPlafon()

    /**
     * Set the value of [rusak_tutup_plafon] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakTutupPlafon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_tutup_plafon !== $v) {
            $this->rusak_tutup_plafon = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON;
        }


        return $this;
    } // setRusakTutupPlafon()

    /**
     * Set the value of [ket_tutup_plafon] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetTutupPlafon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_tutup_plafon !== $v) {
            $this->ket_tutup_plafon = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_TUTUP_PLAFON;
        }


        return $this;
    } // setKetTutupPlafon()

    /**
     * Set the value of [rusak_bata_dinding] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakBataDinding($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_bata_dinding !== $v) {
            $this->rusak_bata_dinding = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_BATA_DINDING;
        }


        return $this;
    } // setRusakBataDinding()

    /**
     * Set the value of [ket_bata_dinding] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetBataDinding($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_bata_dinding !== $v) {
            $this->ket_bata_dinding = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_BATA_DINDING;
        }


        return $this;
    } // setKetBataDinding()

    /**
     * Set the value of [rusak_plester_dinding] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakPlesterDinding($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_plester_dinding !== $v) {
            $this->rusak_plester_dinding = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_PLESTER_DINDING;
        }


        return $this;
    } // setRusakPlesterDinding()

    /**
     * Set the value of [ket_plester_dinding] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetPlesterDinding($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_plester_dinding !== $v) {
            $this->ket_plester_dinding = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_PLESTER_DINDING;
        }


        return $this;
    } // setKetPlesterDinding()

    /**
     * Set the value of [rusak_daun_jendela] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakDaunJendela($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_daun_jendela !== $v) {
            $this->rusak_daun_jendela = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_DAUN_JENDELA;
        }


        return $this;
    } // setRusakDaunJendela()

    /**
     * Set the value of [ket_daun_jendela] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetDaunJendela($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_daun_jendela !== $v) {
            $this->ket_daun_jendela = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_DAUN_JENDELA;
        }


        return $this;
    } // setKetDaunJendela()

    /**
     * Set the value of [rusak_daun_pintu] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakDaunPintu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_daun_pintu !== $v) {
            $this->rusak_daun_pintu = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_DAUN_PINTU;
        }


        return $this;
    } // setRusakDaunPintu()

    /**
     * Set the value of [ket_daun_pintu] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetDaunPintu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_daun_pintu !== $v) {
            $this->ket_daun_pintu = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_DAUN_PINTU;
        }


        return $this;
    } // setKetDaunPintu()

    /**
     * Set the value of [rusak_kusen] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakKusen($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_kusen !== $v) {
            $this->rusak_kusen = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_KUSEN;
        }


        return $this;
    } // setRusakKusen()

    /**
     * Set the value of [ket_kusen] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetKusen($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_kusen !== $v) {
            $this->ket_kusen = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_KUSEN;
        }


        return $this;
    } // setKetKusen()

    /**
     * Set the value of [rusak_tutup_lantai] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakTutupLantai($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_tutup_lantai !== $v) {
            $this->rusak_tutup_lantai = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI;
        }


        return $this;
    } // setRusakTutupLantai()

    /**
     * Set the value of [ket_penutup_lantai] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetPenutupLantai($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_penutup_lantai !== $v) {
            $this->ket_penutup_lantai = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_PENUTUP_LANTAI;
        }


        return $this;
    } // setKetPenutupLantai()

    /**
     * Set the value of [rusak_inst_listrik] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakInstListrik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_inst_listrik !== $v) {
            $this->rusak_inst_listrik = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_INST_LISTRIK;
        }


        return $this;
    } // setRusakInstListrik()

    /**
     * Set the value of [ket_inst_listrik] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetInstListrik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_inst_listrik !== $v) {
            $this->ket_inst_listrik = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_INST_LISTRIK;
        }


        return $this;
    } // setKetInstListrik()

    /**
     * Set the value of [rusak_inst_air] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakInstAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_inst_air !== $v) {
            $this->rusak_inst_air = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_INST_AIR;
        }


        return $this;
    } // setRusakInstAir()

    /**
     * Set the value of [ket_inst_air] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetInstAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_inst_air !== $v) {
            $this->ket_inst_air = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_INST_AIR;
        }


        return $this;
    } // setKetInstAir()

    /**
     * Set the value of [rusak_drainase] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakDrainase($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_drainase !== $v) {
            $this->rusak_drainase = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_DRAINASE;
        }


        return $this;
    } // setRusakDrainase()

    /**
     * Set the value of [ket_drainase] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetDrainase($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_drainase !== $v) {
            $this->ket_drainase = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_DRAINASE;
        }


        return $this;
    } // setKetDrainase()

    /**
     * Set the value of [rusak_finish_struktur] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakFinishStruktur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_finish_struktur !== $v) {
            $this->rusak_finish_struktur = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR;
        }


        return $this;
    } // setRusakFinishStruktur()

    /**
     * Set the value of [ket_finish_struktur] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetFinishStruktur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_finish_struktur !== $v) {
            $this->ket_finish_struktur = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_FINISH_STRUKTUR;
        }


        return $this;
    } // setKetFinishStruktur()

    /**
     * Set the value of [rusak_finish_plafon] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakFinishPlafon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_finish_plafon !== $v) {
            $this->rusak_finish_plafon = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_FINISH_PLAFON;
        }


        return $this;
    } // setRusakFinishPlafon()

    /**
     * Set the value of [ket_finish_plafon] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetFinishPlafon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_finish_plafon !== $v) {
            $this->ket_finish_plafon = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_FINISH_PLAFON;
        }


        return $this;
    } // setKetFinishPlafon()

    /**
     * Set the value of [rusak_finish_dinding] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakFinishDinding($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_finish_dinding !== $v) {
            $this->rusak_finish_dinding = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_FINISH_DINDING;
        }


        return $this;
    } // setRusakFinishDinding()

    /**
     * Set the value of [ket_finish_dinding] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetFinishDinding($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_finish_dinding !== $v) {
            $this->ket_finish_dinding = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_FINISH_DINDING;
        }


        return $this;
    } // setKetFinishDinding()

    /**
     * Set the value of [rusak_finish_kpj] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setRusakFinishKpj($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rusak_finish_kpj !== $v) {
            $this->rusak_finish_kpj = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::RUSAK_FINISH_KPJ;
        }


        return $this;
    } // setRusakFinishKpj()

    /**
     * Set the value of [ket_finish_kpj] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setKetFinishKpj($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_finish_kpj !== $v) {
            $this->ket_finish_kpj = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::KET_FINISH_KPJ;
        }


        return $this;
    } // setKetFinishKpj()

    /**
     * Set the value of [berfungsi] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setBerfungsi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->berfungsi !== $v) {
            $this->berfungsi = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::BERFUNGSI;
        }


        return $this;
    } // setBerfungsi()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RuangLongitudinalPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RuangLongitudinalPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RuangLongitudinal The current object (for fluent API support)
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
                $this->modifiedColumns[] = RuangLongitudinalPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return RuangLongitudinal The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RuangLongitudinalPeer::UPDATER_ID;
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
            if ($this->asal_data !== '1') {
                return false;
            }

            if ($this->rusak_lisplang_talang !== '0') {
                return false;
            }

            if ($this->rusak_rangka_plafon !== '0') {
                return false;
            }

            if ($this->rusak_tutup_plafon !== '0') {
                return false;
            }

            if ($this->rusak_bata_dinding !== '0') {
                return false;
            }

            if ($this->rusak_plester_dinding !== '0') {
                return false;
            }

            if ($this->rusak_daun_jendela !== '0') {
                return false;
            }

            if ($this->rusak_daun_pintu !== '0') {
                return false;
            }

            if ($this->rusak_kusen !== '0') {
                return false;
            }

            if ($this->rusak_tutup_lantai !== '0') {
                return false;
            }

            if ($this->rusak_inst_listrik !== '0') {
                return false;
            }

            if ($this->rusak_inst_air !== '0') {
                return false;
            }

            if ($this->rusak_drainase !== '0') {
                return false;
            }

            if ($this->rusak_finish_struktur !== '0') {
                return false;
            }

            if ($this->rusak_finish_plafon !== '0') {
                return false;
            }

            if ($this->rusak_finish_dinding !== '0') {
                return false;
            }

            if ($this->rusak_finish_kpj !== '0') {
                return false;
            }

            if ($this->berfungsi !== '1') {
                return false;
            }

            if ($this->create_date !== '2021-06-07 11:49:57') {
                return false;
            }

            if ($this->last_update !== '2021-06-07 11:49:57') {
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

            $this->id_ruang = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->semester_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->blob_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->asal_data = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->rusak_lisplang_talang = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->ket_lisplang_talang = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->rusak_rangka_plafon = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->ket_rangka_plafon = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->rusak_tutup_plafon = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->ket_tutup_plafon = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->rusak_bata_dinding = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->ket_bata_dinding = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->rusak_plester_dinding = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->ket_plester_dinding = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->rusak_daun_jendela = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->ket_daun_jendela = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->rusak_daun_pintu = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->ket_daun_pintu = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->rusak_kusen = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->ket_kusen = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->rusak_tutup_lantai = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->ket_penutup_lantai = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->rusak_inst_listrik = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->ket_inst_listrik = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->rusak_inst_air = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->ket_inst_air = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->rusak_drainase = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->ket_drainase = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->rusak_finish_struktur = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->ket_finish_struktur = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->rusak_finish_plafon = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->ket_finish_plafon = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->rusak_finish_dinding = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->ket_finish_dinding = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->rusak_finish_kpj = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->ket_finish_kpj = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->berfungsi = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->create_date = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->last_update = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
            $this->soft_delete = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
            $this->last_sync = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
            $this->updater_id = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 42; // 42 = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RuangLongitudinal object", $e);
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

        if ($this->aRuang !== null && $this->id_ruang !== $this->aRuang->getIdRuang()) {
            $this->aRuang = null;
        }
        if ($this->aSemester !== null && $this->semester_id !== $this->aSemester->getSemesterId()) {
            $this->aSemester = null;
        }
        if ($this->aLargeObject !== null && $this->blob_id !== $this->aLargeObject->getBlobId()) {
            $this->aLargeObject = null;
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
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RuangLongitudinalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRuang = null;
            $this->aLargeObject = null;
            $this->aSemester = null;
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
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RuangLongitudinalQuery::create()
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
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RuangLongitudinalPeer::addInstanceToPool($this);
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

            if ($this->aLargeObject !== null) {
                if ($this->aLargeObject->isModified() || $this->aLargeObject->isNew()) {
                    $affectedRows += $this->aLargeObject->save($con);
                }
                $this->setLargeObject($this->aLargeObject);
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
        if ($this->isColumnModified(RuangLongitudinalPeer::ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"id_ruang"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::BLOB_ID)) {
            $modifiedColumns[':p' . $index++]  = '"blob_id"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_lisplang_talang"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_LISPLANG_TALANG)) {
            $modifiedColumns[':p' . $index++]  = '"ket_lisplang_talang"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_rangka_plafon"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_RANGKA_PLAFON)) {
            $modifiedColumns[':p' . $index++]  = '"ket_rangka_plafon"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_tutup_plafon"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_TUTUP_PLAFON)) {
            $modifiedColumns[':p' . $index++]  = '"ket_tutup_plafon"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_BATA_DINDING)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_bata_dinding"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_BATA_DINDING)) {
            $modifiedColumns[':p' . $index++]  = '"ket_bata_dinding"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_PLESTER_DINDING)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_plester_dinding"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_PLESTER_DINDING)) {
            $modifiedColumns[':p' . $index++]  = '"ket_plester_dinding"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_DAUN_JENDELA)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_daun_jendela"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_DAUN_JENDELA)) {
            $modifiedColumns[':p' . $index++]  = '"ket_daun_jendela"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_DAUN_PINTU)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_daun_pintu"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_DAUN_PINTU)) {
            $modifiedColumns[':p' . $index++]  = '"ket_daun_pintu"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_KUSEN)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_kusen"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_KUSEN)) {
            $modifiedColumns[':p' . $index++]  = '"ket_kusen"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_tutup_lantai"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_PENUTUP_LANTAI)) {
            $modifiedColumns[':p' . $index++]  = '"ket_penutup_lantai"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_INST_LISTRIK)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_inst_listrik"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_INST_LISTRIK)) {
            $modifiedColumns[':p' . $index++]  = '"ket_inst_listrik"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_INST_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_inst_air"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_INST_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"ket_inst_air"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_DRAINASE)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_drainase"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_DRAINASE)) {
            $modifiedColumns[':p' . $index++]  = '"ket_drainase"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_finish_struktur"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_STRUKTUR)) {
            $modifiedColumns[':p' . $index++]  = '"ket_finish_struktur"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_PLAFON)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_finish_plafon"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_PLAFON)) {
            $modifiedColumns[':p' . $index++]  = '"ket_finish_plafon"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_DINDING)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_finish_dinding"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_DINDING)) {
            $modifiedColumns[':p' . $index++]  = '"ket_finish_dinding"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_KPJ)) {
            $modifiedColumns[':p' . $index++]  = '"rusak_finish_kpj"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_KPJ)) {
            $modifiedColumns[':p' . $index++]  = '"ket_finish_kpj"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::BERFUNGSI)) {
            $modifiedColumns[':p' . $index++]  = '"berfungsi"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RuangLongitudinalPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "ruang_longitudinal" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_ruang"':						
                        $stmt->bindValue($identifier, $this->id_ruang, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"blob_id"':						
                        $stmt->bindValue($identifier, $this->blob_id, PDO::PARAM_STR);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
                        break;
                    case '"rusak_lisplang_talang"':						
                        $stmt->bindValue($identifier, $this->rusak_lisplang_talang, PDO::PARAM_STR);
                        break;
                    case '"ket_lisplang_talang"':						
                        $stmt->bindValue($identifier, $this->ket_lisplang_talang, PDO::PARAM_STR);
                        break;
                    case '"rusak_rangka_plafon"':						
                        $stmt->bindValue($identifier, $this->rusak_rangka_plafon, PDO::PARAM_STR);
                        break;
                    case '"ket_rangka_plafon"':						
                        $stmt->bindValue($identifier, $this->ket_rangka_plafon, PDO::PARAM_STR);
                        break;
                    case '"rusak_tutup_plafon"':						
                        $stmt->bindValue($identifier, $this->rusak_tutup_plafon, PDO::PARAM_STR);
                        break;
                    case '"ket_tutup_plafon"':						
                        $stmt->bindValue($identifier, $this->ket_tutup_plafon, PDO::PARAM_STR);
                        break;
                    case '"rusak_bata_dinding"':						
                        $stmt->bindValue($identifier, $this->rusak_bata_dinding, PDO::PARAM_STR);
                        break;
                    case '"ket_bata_dinding"':						
                        $stmt->bindValue($identifier, $this->ket_bata_dinding, PDO::PARAM_STR);
                        break;
                    case '"rusak_plester_dinding"':						
                        $stmt->bindValue($identifier, $this->rusak_plester_dinding, PDO::PARAM_STR);
                        break;
                    case '"ket_plester_dinding"':						
                        $stmt->bindValue($identifier, $this->ket_plester_dinding, PDO::PARAM_STR);
                        break;
                    case '"rusak_daun_jendela"':						
                        $stmt->bindValue($identifier, $this->rusak_daun_jendela, PDO::PARAM_STR);
                        break;
                    case '"ket_daun_jendela"':						
                        $stmt->bindValue($identifier, $this->ket_daun_jendela, PDO::PARAM_STR);
                        break;
                    case '"rusak_daun_pintu"':						
                        $stmt->bindValue($identifier, $this->rusak_daun_pintu, PDO::PARAM_STR);
                        break;
                    case '"ket_daun_pintu"':						
                        $stmt->bindValue($identifier, $this->ket_daun_pintu, PDO::PARAM_STR);
                        break;
                    case '"rusak_kusen"':						
                        $stmt->bindValue($identifier, $this->rusak_kusen, PDO::PARAM_STR);
                        break;
                    case '"ket_kusen"':						
                        $stmt->bindValue($identifier, $this->ket_kusen, PDO::PARAM_STR);
                        break;
                    case '"rusak_tutup_lantai"':						
                        $stmt->bindValue($identifier, $this->rusak_tutup_lantai, PDO::PARAM_STR);
                        break;
                    case '"ket_penutup_lantai"':						
                        $stmt->bindValue($identifier, $this->ket_penutup_lantai, PDO::PARAM_STR);
                        break;
                    case '"rusak_inst_listrik"':						
                        $stmt->bindValue($identifier, $this->rusak_inst_listrik, PDO::PARAM_STR);
                        break;
                    case '"ket_inst_listrik"':						
                        $stmt->bindValue($identifier, $this->ket_inst_listrik, PDO::PARAM_STR);
                        break;
                    case '"rusak_inst_air"':						
                        $stmt->bindValue($identifier, $this->rusak_inst_air, PDO::PARAM_STR);
                        break;
                    case '"ket_inst_air"':						
                        $stmt->bindValue($identifier, $this->ket_inst_air, PDO::PARAM_STR);
                        break;
                    case '"rusak_drainase"':						
                        $stmt->bindValue($identifier, $this->rusak_drainase, PDO::PARAM_STR);
                        break;
                    case '"ket_drainase"':						
                        $stmt->bindValue($identifier, $this->ket_drainase, PDO::PARAM_STR);
                        break;
                    case '"rusak_finish_struktur"':						
                        $stmt->bindValue($identifier, $this->rusak_finish_struktur, PDO::PARAM_STR);
                        break;
                    case '"ket_finish_struktur"':						
                        $stmt->bindValue($identifier, $this->ket_finish_struktur, PDO::PARAM_STR);
                        break;
                    case '"rusak_finish_plafon"':						
                        $stmt->bindValue($identifier, $this->rusak_finish_plafon, PDO::PARAM_STR);
                        break;
                    case '"ket_finish_plafon"':						
                        $stmt->bindValue($identifier, $this->ket_finish_plafon, PDO::PARAM_STR);
                        break;
                    case '"rusak_finish_dinding"':						
                        $stmt->bindValue($identifier, $this->rusak_finish_dinding, PDO::PARAM_STR);
                        break;
                    case '"ket_finish_dinding"':						
                        $stmt->bindValue($identifier, $this->ket_finish_dinding, PDO::PARAM_STR);
                        break;
                    case '"rusak_finish_kpj"':						
                        $stmt->bindValue($identifier, $this->rusak_finish_kpj, PDO::PARAM_STR);
                        break;
                    case '"ket_finish_kpj"':						
                        $stmt->bindValue($identifier, $this->ket_finish_kpj, PDO::PARAM_STR);
                        break;
                    case '"berfungsi"':						
                        $stmt->bindValue($identifier, $this->berfungsi, PDO::PARAM_STR);
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

            if ($this->aLargeObject !== null) {
                if (!$this->aLargeObject->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLargeObject->getValidationFailures());
                }
            }

            if ($this->aSemester !== null) {
                if (!$this->aSemester->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSemester->getValidationFailures());
                }
            }


            if (($retval = RuangLongitudinalPeer::doValidate($this, $columns)) !== true) {
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
        $pos = RuangLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdRuang();
                break;
            case 1:
                return $this->getSemesterId();
                break;
            case 2:
                return $this->getBlobId();
                break;
            case 3:
                return $this->getAsalData();
                break;
            case 4:
                return $this->getRusakLisplangTalang();
                break;
            case 5:
                return $this->getKetLisplangTalang();
                break;
            case 6:
                return $this->getRusakRangkaPlafon();
                break;
            case 7:
                return $this->getKetRangkaPlafon();
                break;
            case 8:
                return $this->getRusakTutupPlafon();
                break;
            case 9:
                return $this->getKetTutupPlafon();
                break;
            case 10:
                return $this->getRusakBataDinding();
                break;
            case 11:
                return $this->getKetBataDinding();
                break;
            case 12:
                return $this->getRusakPlesterDinding();
                break;
            case 13:
                return $this->getKetPlesterDinding();
                break;
            case 14:
                return $this->getRusakDaunJendela();
                break;
            case 15:
                return $this->getKetDaunJendela();
                break;
            case 16:
                return $this->getRusakDaunPintu();
                break;
            case 17:
                return $this->getKetDaunPintu();
                break;
            case 18:
                return $this->getRusakKusen();
                break;
            case 19:
                return $this->getKetKusen();
                break;
            case 20:
                return $this->getRusakTutupLantai();
                break;
            case 21:
                return $this->getKetPenutupLantai();
                break;
            case 22:
                return $this->getRusakInstListrik();
                break;
            case 23:
                return $this->getKetInstListrik();
                break;
            case 24:
                return $this->getRusakInstAir();
                break;
            case 25:
                return $this->getKetInstAir();
                break;
            case 26:
                return $this->getRusakDrainase();
                break;
            case 27:
                return $this->getKetDrainase();
                break;
            case 28:
                return $this->getRusakFinishStruktur();
                break;
            case 29:
                return $this->getKetFinishStruktur();
                break;
            case 30:
                return $this->getRusakFinishPlafon();
                break;
            case 31:
                return $this->getKetFinishPlafon();
                break;
            case 32:
                return $this->getRusakFinishDinding();
                break;
            case 33:
                return $this->getKetFinishDinding();
                break;
            case 34:
                return $this->getRusakFinishKpj();
                break;
            case 35:
                return $this->getKetFinishKpj();
                break;
            case 36:
                return $this->getBerfungsi();
                break;
            case 37:
                return $this->getCreateDate();
                break;
            case 38:
                return $this->getLastUpdate();
                break;
            case 39:
                return $this->getSoftDelete();
                break;
            case 40:
                return $this->getLastSync();
                break;
            case 41:
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
        if (isset($alreadyDumpedObjects['RuangLongitudinal'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RuangLongitudinal'][serialize($this->getPrimaryKey())] = true;
        $keys = RuangLongitudinalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdRuang(),
            $keys[1] => $this->getSemesterId(),
            $keys[2] => $this->getBlobId(),
            $keys[3] => $this->getAsalData(),
            $keys[4] => $this->getRusakLisplangTalang(),
            $keys[5] => $this->getKetLisplangTalang(),
            $keys[6] => $this->getRusakRangkaPlafon(),
            $keys[7] => $this->getKetRangkaPlafon(),
            $keys[8] => $this->getRusakTutupPlafon(),
            $keys[9] => $this->getKetTutupPlafon(),
            $keys[10] => $this->getRusakBataDinding(),
            $keys[11] => $this->getKetBataDinding(),
            $keys[12] => $this->getRusakPlesterDinding(),
            $keys[13] => $this->getKetPlesterDinding(),
            $keys[14] => $this->getRusakDaunJendela(),
            $keys[15] => $this->getKetDaunJendela(),
            $keys[16] => $this->getRusakDaunPintu(),
            $keys[17] => $this->getKetDaunPintu(),
            $keys[18] => $this->getRusakKusen(),
            $keys[19] => $this->getKetKusen(),
            $keys[20] => $this->getRusakTutupLantai(),
            $keys[21] => $this->getKetPenutupLantai(),
            $keys[22] => $this->getRusakInstListrik(),
            $keys[23] => $this->getKetInstListrik(),
            $keys[24] => $this->getRusakInstAir(),
            $keys[25] => $this->getKetInstAir(),
            $keys[26] => $this->getRusakDrainase(),
            $keys[27] => $this->getKetDrainase(),
            $keys[28] => $this->getRusakFinishStruktur(),
            $keys[29] => $this->getKetFinishStruktur(),
            $keys[30] => $this->getRusakFinishPlafon(),
            $keys[31] => $this->getKetFinishPlafon(),
            $keys[32] => $this->getRusakFinishDinding(),
            $keys[33] => $this->getKetFinishDinding(),
            $keys[34] => $this->getRusakFinishKpj(),
            $keys[35] => $this->getKetFinishKpj(),
            $keys[36] => $this->getBerfungsi(),
            $keys[37] => $this->getCreateDate(),
            $keys[38] => $this->getLastUpdate(),
            $keys[39] => $this->getSoftDelete(),
            $keys[40] => $this->getLastSync(),
            $keys[41] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRuang) {
                $result['Ruang'] = $this->aRuang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLargeObject) {
                $result['LargeObject'] = $this->aLargeObject->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = RuangLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdRuang($value);
                break;
            case 1:
                $this->setSemesterId($value);
                break;
            case 2:
                $this->setBlobId($value);
                break;
            case 3:
                $this->setAsalData($value);
                break;
            case 4:
                $this->setRusakLisplangTalang($value);
                break;
            case 5:
                $this->setKetLisplangTalang($value);
                break;
            case 6:
                $this->setRusakRangkaPlafon($value);
                break;
            case 7:
                $this->setKetRangkaPlafon($value);
                break;
            case 8:
                $this->setRusakTutupPlafon($value);
                break;
            case 9:
                $this->setKetTutupPlafon($value);
                break;
            case 10:
                $this->setRusakBataDinding($value);
                break;
            case 11:
                $this->setKetBataDinding($value);
                break;
            case 12:
                $this->setRusakPlesterDinding($value);
                break;
            case 13:
                $this->setKetPlesterDinding($value);
                break;
            case 14:
                $this->setRusakDaunJendela($value);
                break;
            case 15:
                $this->setKetDaunJendela($value);
                break;
            case 16:
                $this->setRusakDaunPintu($value);
                break;
            case 17:
                $this->setKetDaunPintu($value);
                break;
            case 18:
                $this->setRusakKusen($value);
                break;
            case 19:
                $this->setKetKusen($value);
                break;
            case 20:
                $this->setRusakTutupLantai($value);
                break;
            case 21:
                $this->setKetPenutupLantai($value);
                break;
            case 22:
                $this->setRusakInstListrik($value);
                break;
            case 23:
                $this->setKetInstListrik($value);
                break;
            case 24:
                $this->setRusakInstAir($value);
                break;
            case 25:
                $this->setKetInstAir($value);
                break;
            case 26:
                $this->setRusakDrainase($value);
                break;
            case 27:
                $this->setKetDrainase($value);
                break;
            case 28:
                $this->setRusakFinishStruktur($value);
                break;
            case 29:
                $this->setKetFinishStruktur($value);
                break;
            case 30:
                $this->setRusakFinishPlafon($value);
                break;
            case 31:
                $this->setKetFinishPlafon($value);
                break;
            case 32:
                $this->setRusakFinishDinding($value);
                break;
            case 33:
                $this->setKetFinishDinding($value);
                break;
            case 34:
                $this->setRusakFinishKpj($value);
                break;
            case 35:
                $this->setKetFinishKpj($value);
                break;
            case 36:
                $this->setBerfungsi($value);
                break;
            case 37:
                $this->setCreateDate($value);
                break;
            case 38:
                $this->setLastUpdate($value);
                break;
            case 39:
                $this->setSoftDelete($value);
                break;
            case 40:
                $this->setLastSync($value);
                break;
            case 41:
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
        $keys = RuangLongitudinalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdRuang($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSemesterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setBlobId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAsalData($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRusakLisplangTalang($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setKetLisplangTalang($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setRusakRangkaPlafon($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKetRangkaPlafon($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRusakTutupPlafon($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKetTutupPlafon($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setRusakBataDinding($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setKetBataDinding($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setRusakPlesterDinding($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setKetPlesterDinding($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setRusakDaunJendela($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setKetDaunJendela($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setRusakDaunPintu($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setKetDaunPintu($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setRusakKusen($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setKetKusen($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setRusakTutupLantai($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setKetPenutupLantai($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setRusakInstListrik($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setKetInstListrik($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setRusakInstAir($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setKetInstAir($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setRusakDrainase($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setKetDrainase($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setRusakFinishStruktur($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setKetFinishStruktur($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setRusakFinishPlafon($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setKetFinishPlafon($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setRusakFinishDinding($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setKetFinishDinding($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setRusakFinishKpj($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setKetFinishKpj($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setBerfungsi($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setCreateDate($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setLastUpdate($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setSoftDelete($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setLastSync($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setUpdaterId($arr[$keys[41]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RuangLongitudinalPeer::DATABASE_NAME);

        if ($this->isColumnModified(RuangLongitudinalPeer::ID_RUANG)) $criteria->add(RuangLongitudinalPeer::ID_RUANG, $this->id_ruang);
        if ($this->isColumnModified(RuangLongitudinalPeer::SEMESTER_ID)) $criteria->add(RuangLongitudinalPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(RuangLongitudinalPeer::BLOB_ID)) $criteria->add(RuangLongitudinalPeer::BLOB_ID, $this->blob_id);
        if ($this->isColumnModified(RuangLongitudinalPeer::ASAL_DATA)) $criteria->add(RuangLongitudinalPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG)) $criteria->add(RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG, $this->rusak_lisplang_talang);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_LISPLANG_TALANG)) $criteria->add(RuangLongitudinalPeer::KET_LISPLANG_TALANG, $this->ket_lisplang_talang);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON)) $criteria->add(RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON, $this->rusak_rangka_plafon);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_RANGKA_PLAFON)) $criteria->add(RuangLongitudinalPeer::KET_RANGKA_PLAFON, $this->ket_rangka_plafon);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON)) $criteria->add(RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON, $this->rusak_tutup_plafon);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_TUTUP_PLAFON)) $criteria->add(RuangLongitudinalPeer::KET_TUTUP_PLAFON, $this->ket_tutup_plafon);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_BATA_DINDING)) $criteria->add(RuangLongitudinalPeer::RUSAK_BATA_DINDING, $this->rusak_bata_dinding);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_BATA_DINDING)) $criteria->add(RuangLongitudinalPeer::KET_BATA_DINDING, $this->ket_bata_dinding);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_PLESTER_DINDING)) $criteria->add(RuangLongitudinalPeer::RUSAK_PLESTER_DINDING, $this->rusak_plester_dinding);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_PLESTER_DINDING)) $criteria->add(RuangLongitudinalPeer::KET_PLESTER_DINDING, $this->ket_plester_dinding);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_DAUN_JENDELA)) $criteria->add(RuangLongitudinalPeer::RUSAK_DAUN_JENDELA, $this->rusak_daun_jendela);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_DAUN_JENDELA)) $criteria->add(RuangLongitudinalPeer::KET_DAUN_JENDELA, $this->ket_daun_jendela);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_DAUN_PINTU)) $criteria->add(RuangLongitudinalPeer::RUSAK_DAUN_PINTU, $this->rusak_daun_pintu);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_DAUN_PINTU)) $criteria->add(RuangLongitudinalPeer::KET_DAUN_PINTU, $this->ket_daun_pintu);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_KUSEN)) $criteria->add(RuangLongitudinalPeer::RUSAK_KUSEN, $this->rusak_kusen);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_KUSEN)) $criteria->add(RuangLongitudinalPeer::KET_KUSEN, $this->ket_kusen);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI)) $criteria->add(RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI, $this->rusak_tutup_lantai);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_PENUTUP_LANTAI)) $criteria->add(RuangLongitudinalPeer::KET_PENUTUP_LANTAI, $this->ket_penutup_lantai);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_INST_LISTRIK)) $criteria->add(RuangLongitudinalPeer::RUSAK_INST_LISTRIK, $this->rusak_inst_listrik);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_INST_LISTRIK)) $criteria->add(RuangLongitudinalPeer::KET_INST_LISTRIK, $this->ket_inst_listrik);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_INST_AIR)) $criteria->add(RuangLongitudinalPeer::RUSAK_INST_AIR, $this->rusak_inst_air);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_INST_AIR)) $criteria->add(RuangLongitudinalPeer::KET_INST_AIR, $this->ket_inst_air);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_DRAINASE)) $criteria->add(RuangLongitudinalPeer::RUSAK_DRAINASE, $this->rusak_drainase);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_DRAINASE)) $criteria->add(RuangLongitudinalPeer::KET_DRAINASE, $this->ket_drainase);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR)) $criteria->add(RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR, $this->rusak_finish_struktur);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_STRUKTUR)) $criteria->add(RuangLongitudinalPeer::KET_FINISH_STRUKTUR, $this->ket_finish_struktur);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_PLAFON)) $criteria->add(RuangLongitudinalPeer::RUSAK_FINISH_PLAFON, $this->rusak_finish_plafon);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_PLAFON)) $criteria->add(RuangLongitudinalPeer::KET_FINISH_PLAFON, $this->ket_finish_plafon);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_DINDING)) $criteria->add(RuangLongitudinalPeer::RUSAK_FINISH_DINDING, $this->rusak_finish_dinding);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_DINDING)) $criteria->add(RuangLongitudinalPeer::KET_FINISH_DINDING, $this->ket_finish_dinding);
        if ($this->isColumnModified(RuangLongitudinalPeer::RUSAK_FINISH_KPJ)) $criteria->add(RuangLongitudinalPeer::RUSAK_FINISH_KPJ, $this->rusak_finish_kpj);
        if ($this->isColumnModified(RuangLongitudinalPeer::KET_FINISH_KPJ)) $criteria->add(RuangLongitudinalPeer::KET_FINISH_KPJ, $this->ket_finish_kpj);
        if ($this->isColumnModified(RuangLongitudinalPeer::BERFUNGSI)) $criteria->add(RuangLongitudinalPeer::BERFUNGSI, $this->berfungsi);
        if ($this->isColumnModified(RuangLongitudinalPeer::CREATE_DATE)) $criteria->add(RuangLongitudinalPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RuangLongitudinalPeer::LAST_UPDATE)) $criteria->add(RuangLongitudinalPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RuangLongitudinalPeer::SOFT_DELETE)) $criteria->add(RuangLongitudinalPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RuangLongitudinalPeer::LAST_SYNC)) $criteria->add(RuangLongitudinalPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RuangLongitudinalPeer::UPDATER_ID)) $criteria->add(RuangLongitudinalPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RuangLongitudinalPeer::DATABASE_NAME);
        $criteria->add(RuangLongitudinalPeer::ID_RUANG, $this->id_ruang);
        $criteria->add(RuangLongitudinalPeer::SEMESTER_ID, $this->semester_id);

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
        $pks[0] = $this->getIdRuang();
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
        $this->setIdRuang($keys[0]);
        $this->setSemesterId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdRuang()) && (null === $this->getSemesterId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RuangLongitudinal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdRuang($this->getIdRuang());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setBlobId($this->getBlobId());
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setRusakLisplangTalang($this->getRusakLisplangTalang());
        $copyObj->setKetLisplangTalang($this->getKetLisplangTalang());
        $copyObj->setRusakRangkaPlafon($this->getRusakRangkaPlafon());
        $copyObj->setKetRangkaPlafon($this->getKetRangkaPlafon());
        $copyObj->setRusakTutupPlafon($this->getRusakTutupPlafon());
        $copyObj->setKetTutupPlafon($this->getKetTutupPlafon());
        $copyObj->setRusakBataDinding($this->getRusakBataDinding());
        $copyObj->setKetBataDinding($this->getKetBataDinding());
        $copyObj->setRusakPlesterDinding($this->getRusakPlesterDinding());
        $copyObj->setKetPlesterDinding($this->getKetPlesterDinding());
        $copyObj->setRusakDaunJendela($this->getRusakDaunJendela());
        $copyObj->setKetDaunJendela($this->getKetDaunJendela());
        $copyObj->setRusakDaunPintu($this->getRusakDaunPintu());
        $copyObj->setKetDaunPintu($this->getKetDaunPintu());
        $copyObj->setRusakKusen($this->getRusakKusen());
        $copyObj->setKetKusen($this->getKetKusen());
        $copyObj->setRusakTutupLantai($this->getRusakTutupLantai());
        $copyObj->setKetPenutupLantai($this->getKetPenutupLantai());
        $copyObj->setRusakInstListrik($this->getRusakInstListrik());
        $copyObj->setKetInstListrik($this->getKetInstListrik());
        $copyObj->setRusakInstAir($this->getRusakInstAir());
        $copyObj->setKetInstAir($this->getKetInstAir());
        $copyObj->setRusakDrainase($this->getRusakDrainase());
        $copyObj->setKetDrainase($this->getKetDrainase());
        $copyObj->setRusakFinishStruktur($this->getRusakFinishStruktur());
        $copyObj->setKetFinishStruktur($this->getKetFinishStruktur());
        $copyObj->setRusakFinishPlafon($this->getRusakFinishPlafon());
        $copyObj->setKetFinishPlafon($this->getKetFinishPlafon());
        $copyObj->setRusakFinishDinding($this->getRusakFinishDinding());
        $copyObj->setKetFinishDinding($this->getKetFinishDinding());
        $copyObj->setRusakFinishKpj($this->getRusakFinishKpj());
        $copyObj->setKetFinishKpj($this->getKetFinishKpj());
        $copyObj->setBerfungsi($this->getBerfungsi());
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
     * @return RuangLongitudinal Clone of current object.
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
     * @return RuangLongitudinalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RuangLongitudinalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ruang object.
     *
     * @param             Ruang $v
     * @return RuangLongitudinal The current object (for fluent API support)
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
            $v->addRuangLongitudinal($this);
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
                $this->aRuang->addRuangLongitudinals($this);
             */
        }

        return $this->aRuang;
    }

    /**
     * Declares an association between this object and a LargeObject object.
     *
     * @param             LargeObject $v
     * @return RuangLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLargeObject(LargeObject $v = null)
    {
        if ($v === null) {
            $this->setBlobId(NULL);
        } else {
            $this->setBlobId($v->getBlobId());
        }

        $this->aLargeObject = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LargeObject object, it will not be re-added.
        if ($v !== null) {
            $v->addRuangLongitudinal($this);
        }


        return $this;
    }


    /**
     * Get the associated LargeObject object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LargeObject The associated LargeObject object.
     * @throws PropelException
     */
    public function getLargeObject(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLargeObject === null && (($this->blob_id !== "" && $this->blob_id !== null)) && $doQuery) {
            $this->aLargeObject = LargeObjectQuery::create()->findPk($this->blob_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLargeObject->addRuangLongitudinals($this);
             */
        }

        return $this->aLargeObject;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return RuangLongitudinal The current object (for fluent API support)
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
            $v->addRuangLongitudinal($this);
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
                $this->aSemester->addRuangLongitudinals($this);
             */
        }

        return $this->aSemester;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_ruang = null;
        $this->semester_id = null;
        $this->blob_id = null;
        $this->asal_data = null;
        $this->rusak_lisplang_talang = null;
        $this->ket_lisplang_talang = null;
        $this->rusak_rangka_plafon = null;
        $this->ket_rangka_plafon = null;
        $this->rusak_tutup_plafon = null;
        $this->ket_tutup_plafon = null;
        $this->rusak_bata_dinding = null;
        $this->ket_bata_dinding = null;
        $this->rusak_plester_dinding = null;
        $this->ket_plester_dinding = null;
        $this->rusak_daun_jendela = null;
        $this->ket_daun_jendela = null;
        $this->rusak_daun_pintu = null;
        $this->ket_daun_pintu = null;
        $this->rusak_kusen = null;
        $this->ket_kusen = null;
        $this->rusak_tutup_lantai = null;
        $this->ket_penutup_lantai = null;
        $this->rusak_inst_listrik = null;
        $this->ket_inst_listrik = null;
        $this->rusak_inst_air = null;
        $this->ket_inst_air = null;
        $this->rusak_drainase = null;
        $this->ket_drainase = null;
        $this->rusak_finish_struktur = null;
        $this->ket_finish_struktur = null;
        $this->rusak_finish_plafon = null;
        $this->ket_finish_plafon = null;
        $this->rusak_finish_dinding = null;
        $this->ket_finish_dinding = null;
        $this->rusak_finish_kpj = null;
        $this->ket_finish_kpj = null;
        $this->berfungsi = null;
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
            if ($this->aLargeObject instanceof Persistent) {
              $this->aLargeObject->clearAllReferences($deep);
            }
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRuang = null;
        $this->aLargeObject = null;
        $this->aSemester = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RuangLongitudinalPeer::DEFAULT_STRING_FORMAT);
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
