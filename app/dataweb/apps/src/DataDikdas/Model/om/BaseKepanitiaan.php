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
use DataDikdas\Model\AktivitasKepanitiaan;
use DataDikdas\Model\AktivitasKepanitiaanQuery;
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\AnggotaPanitiaQuery;
use DataDikdas\Model\JenisKepanitiaan;
use DataDikdas\Model\JenisKepanitiaanQuery;
use DataDikdas\Model\Kepanitiaan;
use DataDikdas\Model\KepanitiaanPeer;
use DataDikdas\Model\KepanitiaanQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;

/**
 * Base class that represents a row from the 'kepanitiaan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKepanitiaan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\KepanitiaanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        KepanitiaanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_panitia field.
     * @var        string
     */
    protected $id_panitia;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the id_jns_panitia field.
     * @var        int
     */
    protected $id_jns_panitia;

    /**
     * The value for the nm_panitia field.
     * @var        string
     */
    protected $nm_panitia;

    /**
     * The value for the instansi field.
     * @var        string
     */
    protected $instansi;

    /**
     * The value for the tkt_panitia field.
     * @var        string
     */
    protected $tkt_panitia;

    /**
     * The value for the sk_tugas field.
     * @var        string
     */
    protected $sk_tugas;

    /**
     * The value for the tmt_sk_tugas field.
     * @var        string
     */
    protected $tmt_sk_tugas;

    /**
     * The value for the tst_sk_tugas field.
     * @var        string
     */
    protected $tst_sk_tugas;

    /**
     * The value for the a_pasang_papan field.
     * @var        string
     */
    protected $a_pasang_papan;

    /**
     * The value for the a_formulir field.
     * @var        string
     */
    protected $a_formulir;

    /**
     * The value for the a_silabus field.
     * @var        string
     */
    protected $a_silabus;

    /**
     * The value for the a_berlaku_pos field.
     * @var        string
     */
    protected $a_berlaku_pos;

    /**
     * The value for the a_sosialisasi_pos field.
     * @var        string
     */
    protected $a_sosialisasi_pos;

    /**
     * The value for the a_ks_edukatif field.
     * @var        string
     */
    protected $a_ks_edukatif;

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
     * @var        JenisKepanitiaan
     */
    protected $aJenisKepanitiaan;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|AktivitasKepanitiaan[] Collection to store aggregation of AktivitasKepanitiaan objects.
     */
    protected $collAktivitasKepanitiaans;
    protected $collAktivitasKepanitiaansPartial;

    /**
     * @var        PropelObjectCollection|AnggotaPanitia[] Collection to store aggregation of AnggotaPanitia objects.
     */
    protected $collAnggotaPanitias;
    protected $collAnggotaPanitiasPartial;

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
    protected $aktivitasKepanitiaansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $anggotaPanitiasScheduledForDeletion = null;

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
     * Initializes internal state of BaseKepanitiaan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_panitia] column value.
     * 
     * @return string
     */
    public function getIdPanitia()
    {
        return $this->id_panitia;
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
     * Get the [id_jns_panitia] column value.
     * 
     * @return int
     */
    public function getIdJnsPanitia()
    {
        return $this->id_jns_panitia;
    }

    /**
     * Get the [nm_panitia] column value.
     * 
     * @return string
     */
    public function getNmPanitia()
    {
        return $this->nm_panitia;
    }

    /**
     * Get the [instansi] column value.
     * 
     * @return string
     */
    public function getInstansi()
    {
        return $this->instansi;
    }

    /**
     * Get the [tkt_panitia] column value.
     * 
     * @return string
     */
    public function getTktPanitia()
    {
        return $this->tkt_panitia;
    }

    /**
     * Get the [sk_tugas] column value.
     * 
     * @return string
     */
    public function getSkTugas()
    {
        return $this->sk_tugas;
    }

    /**
     * Get the [optionally formatted] temporal [tmt_sk_tugas] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtSkTugas($format = '%Y-%m-%d')
    {
        if ($this->tmt_sk_tugas === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_sk_tugas);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_sk_tugas, true), $x);
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
     * Get the [optionally formatted] temporal [tst_sk_tugas] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTstSkTugas($format = '%Y-%m-%d')
    {
        if ($this->tst_sk_tugas === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tst_sk_tugas);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tst_sk_tugas, true), $x);
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
     * Get the [a_pasang_papan] column value.
     * 
     * @return string
     */
    public function getAPasangPapan()
    {
        return $this->a_pasang_papan;
    }

    /**
     * Get the [a_formulir] column value.
     * 
     * @return string
     */
    public function getAFormulir()
    {
        return $this->a_formulir;
    }

    /**
     * Get the [a_silabus] column value.
     * 
     * @return string
     */
    public function getASilabus()
    {
        return $this->a_silabus;
    }

    /**
     * Get the [a_berlaku_pos] column value.
     * 
     * @return string
     */
    public function getABerlakuPos()
    {
        return $this->a_berlaku_pos;
    }

    /**
     * Get the [a_sosialisasi_pos] column value.
     * 
     * @return string
     */
    public function getASosialisasiPos()
    {
        return $this->a_sosialisasi_pos;
    }

    /**
     * Get the [a_ks_edukatif] column value.
     * 
     * @return string
     */
    public function getAKsEdukatif()
    {
        return $this->a_ks_edukatif;
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
     * Set the value of [id_panitia] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setIdPanitia($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_panitia !== $v) {
            $this->id_panitia = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::ID_PANITIA;
        }


        return $this;
    } // setIdPanitia()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [id_jns_panitia] column.
     * 
     * @param int $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setIdJnsPanitia($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_jns_panitia !== $v) {
            $this->id_jns_panitia = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::ID_JNS_PANITIA;
        }

        if ($this->aJenisKepanitiaan !== null && $this->aJenisKepanitiaan->getIdJnsPanitia() !== $v) {
            $this->aJenisKepanitiaan = null;
        }


        return $this;
    } // setIdJnsPanitia()

    /**
     * Set the value of [nm_panitia] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setNmPanitia($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_panitia !== $v) {
            $this->nm_panitia = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::NM_PANITIA;
        }


        return $this;
    } // setNmPanitia()

    /**
     * Set the value of [instansi] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setInstansi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->instansi !== $v) {
            $this->instansi = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::INSTANSI;
        }


        return $this;
    } // setInstansi()

    /**
     * Set the value of [tkt_panitia] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setTktPanitia($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tkt_panitia !== $v) {
            $this->tkt_panitia = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::TKT_PANITIA;
        }


        return $this;
    } // setTktPanitia()

    /**
     * Set the value of [sk_tugas] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setSkTugas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_tugas !== $v) {
            $this->sk_tugas = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::SK_TUGAS;
        }


        return $this;
    } // setSkTugas()

    /**
     * Sets the value of [tmt_sk_tugas] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setTmtSkTugas($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_sk_tugas !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_sk_tugas !== null && $tmpDt = new DateTime($this->tmt_sk_tugas)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_sk_tugas = $newDateAsString;
                $this->modifiedColumns[] = KepanitiaanPeer::TMT_SK_TUGAS;
            }
        } // if either are not null


        return $this;
    } // setTmtSkTugas()

    /**
     * Sets the value of [tst_sk_tugas] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setTstSkTugas($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tst_sk_tugas !== null || $dt !== null) {
            $currentDateAsString = ($this->tst_sk_tugas !== null && $tmpDt = new DateTime($this->tst_sk_tugas)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tst_sk_tugas = $newDateAsString;
                $this->modifiedColumns[] = KepanitiaanPeer::TST_SK_TUGAS;
            }
        } // if either are not null


        return $this;
    } // setTstSkTugas()

    /**
     * Set the value of [a_pasang_papan] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setAPasangPapan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_pasang_papan !== $v) {
            $this->a_pasang_papan = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::A_PASANG_PAPAN;
        }


        return $this;
    } // setAPasangPapan()

    /**
     * Set the value of [a_formulir] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setAFormulir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_formulir !== $v) {
            $this->a_formulir = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::A_FORMULIR;
        }


        return $this;
    } // setAFormulir()

    /**
     * Set the value of [a_silabus] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setASilabus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_silabus !== $v) {
            $this->a_silabus = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::A_SILABUS;
        }


        return $this;
    } // setASilabus()

    /**
     * Set the value of [a_berlaku_pos] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setABerlakuPos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_berlaku_pos !== $v) {
            $this->a_berlaku_pos = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::A_BERLAKU_POS;
        }


        return $this;
    } // setABerlakuPos()

    /**
     * Set the value of [a_sosialisasi_pos] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setASosialisasiPos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_sosialisasi_pos !== $v) {
            $this->a_sosialisasi_pos = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::A_SOSIALISASI_POS;
        }


        return $this;
    } // setASosialisasiPos()

    /**
     * Set the value of [a_ks_edukatif] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setAKsEdukatif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_ks_edukatif !== $v) {
            $this->a_ks_edukatif = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::A_KS_EDUKATIF;
        }


        return $this;
    } // setAKsEdukatif()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = KepanitiaanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = KepanitiaanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kepanitiaan The current object (for fluent API support)
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
                $this->modifiedColumns[] = KepanitiaanPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = KepanitiaanPeer::UPDATER_ID;
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

            $this->id_panitia = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->sekolah_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_jns_panitia = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->nm_panitia = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->instansi = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tkt_panitia = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->sk_tugas = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->tmt_sk_tugas = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tst_sk_tugas = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->a_pasang_papan = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->a_formulir = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->a_silabus = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->a_berlaku_pos = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->a_sosialisasi_pos = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->a_ks_edukatif = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->create_date = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->last_update = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->soft_delete = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->last_sync = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->updater_id = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 20; // 20 = KepanitiaanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Kepanitiaan object", $e);
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

        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aJenisKepanitiaan !== null && $this->id_jns_panitia !== $this->aJenisKepanitiaan->getIdJnsPanitia()) {
            $this->aJenisKepanitiaan = null;
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
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = KepanitiaanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisKepanitiaan = null;
            $this->aSekolah = null;
            $this->collAktivitasKepanitiaans = null;

            $this->collAnggotaPanitias = null;

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
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = KepanitiaanQuery::create()
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
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                KepanitiaanPeer::addInstanceToPool($this);
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

            if ($this->aJenisKepanitiaan !== null) {
                if ($this->aJenisKepanitiaan->isModified() || $this->aJenisKepanitiaan->isNew()) {
                    $affectedRows += $this->aJenisKepanitiaan->save($con);
                }
                $this->setJenisKepanitiaan($this->aJenisKepanitiaan);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
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

            if ($this->aktivitasKepanitiaansScheduledForDeletion !== null) {
                if (!$this->aktivitasKepanitiaansScheduledForDeletion->isEmpty()) {
                    AktivitasKepanitiaanQuery::create()
                        ->filterByPrimaryKeys($this->aktivitasKepanitiaansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aktivitasKepanitiaansScheduledForDeletion = null;
                }
            }

            if ($this->collAktivitasKepanitiaans !== null) {
                foreach ($this->collAktivitasKepanitiaans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->anggotaPanitiasScheduledForDeletion !== null) {
                if (!$this->anggotaPanitiasScheduledForDeletion->isEmpty()) {
                    AnggotaPanitiaQuery::create()
                        ->filterByPrimaryKeys($this->anggotaPanitiasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anggotaPanitiasScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaPanitias !== null) {
                foreach ($this->collAnggotaPanitias as $referrerFK) {
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
        if ($this->isColumnModified(KepanitiaanPeer::ID_PANITIA)) {
            $modifiedColumns[':p' . $index++]  = '"id_panitia"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::ID_JNS_PANITIA)) {
            $modifiedColumns[':p' . $index++]  = '"id_jns_panitia"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::NM_PANITIA)) {
            $modifiedColumns[':p' . $index++]  = '"nm_panitia"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::INSTANSI)) {
            $modifiedColumns[':p' . $index++]  = '"instansi"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::TKT_PANITIA)) {
            $modifiedColumns[':p' . $index++]  = '"tkt_panitia"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::SK_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"sk_tugas"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::TMT_SK_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_sk_tugas"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::TST_SK_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"tst_sk_tugas"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::A_PASANG_PAPAN)) {
            $modifiedColumns[':p' . $index++]  = '"a_pasang_papan"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::A_FORMULIR)) {
            $modifiedColumns[':p' . $index++]  = '"a_formulir"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::A_SILABUS)) {
            $modifiedColumns[':p' . $index++]  = '"a_silabus"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::A_BERLAKU_POS)) {
            $modifiedColumns[':p' . $index++]  = '"a_berlaku_pos"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::A_SOSIALISASI_POS)) {
            $modifiedColumns[':p' . $index++]  = '"a_sosialisasi_pos"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::A_KS_EDUKATIF)) {
            $modifiedColumns[':p' . $index++]  = '"a_ks_edukatif"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(KepanitiaanPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "kepanitiaan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_panitia"':						
                        $stmt->bindValue($identifier, $this->id_panitia, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"id_jns_panitia"':						
                        $stmt->bindValue($identifier, $this->id_jns_panitia, PDO::PARAM_INT);
                        break;
                    case '"nm_panitia"':						
                        $stmt->bindValue($identifier, $this->nm_panitia, PDO::PARAM_STR);
                        break;
                    case '"instansi"':						
                        $stmt->bindValue($identifier, $this->instansi, PDO::PARAM_STR);
                        break;
                    case '"tkt_panitia"':						
                        $stmt->bindValue($identifier, $this->tkt_panitia, PDO::PARAM_STR);
                        break;
                    case '"sk_tugas"':						
                        $stmt->bindValue($identifier, $this->sk_tugas, PDO::PARAM_STR);
                        break;
                    case '"tmt_sk_tugas"':						
                        $stmt->bindValue($identifier, $this->tmt_sk_tugas, PDO::PARAM_STR);
                        break;
                    case '"tst_sk_tugas"':						
                        $stmt->bindValue($identifier, $this->tst_sk_tugas, PDO::PARAM_STR);
                        break;
                    case '"a_pasang_papan"':						
                        $stmt->bindValue($identifier, $this->a_pasang_papan, PDO::PARAM_STR);
                        break;
                    case '"a_formulir"':						
                        $stmt->bindValue($identifier, $this->a_formulir, PDO::PARAM_STR);
                        break;
                    case '"a_silabus"':						
                        $stmt->bindValue($identifier, $this->a_silabus, PDO::PARAM_STR);
                        break;
                    case '"a_berlaku_pos"':						
                        $stmt->bindValue($identifier, $this->a_berlaku_pos, PDO::PARAM_STR);
                        break;
                    case '"a_sosialisasi_pos"':						
                        $stmt->bindValue($identifier, $this->a_sosialisasi_pos, PDO::PARAM_STR);
                        break;
                    case '"a_ks_edukatif"':						
                        $stmt->bindValue($identifier, $this->a_ks_edukatif, PDO::PARAM_STR);
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

            if ($this->aJenisKepanitiaan !== null) {
                if (!$this->aJenisKepanitiaan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisKepanitiaan->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = KepanitiaanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAktivitasKepanitiaans !== null) {
                    foreach ($this->collAktivitasKepanitiaans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAnggotaPanitias !== null) {
                    foreach ($this->collAnggotaPanitias as $referrerFK) {
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
        $pos = KepanitiaanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdPanitia();
                break;
            case 1:
                return $this->getSekolahId();
                break;
            case 2:
                return $this->getIdJnsPanitia();
                break;
            case 3:
                return $this->getNmPanitia();
                break;
            case 4:
                return $this->getInstansi();
                break;
            case 5:
                return $this->getTktPanitia();
                break;
            case 6:
                return $this->getSkTugas();
                break;
            case 7:
                return $this->getTmtSkTugas();
                break;
            case 8:
                return $this->getTstSkTugas();
                break;
            case 9:
                return $this->getAPasangPapan();
                break;
            case 10:
                return $this->getAFormulir();
                break;
            case 11:
                return $this->getASilabus();
                break;
            case 12:
                return $this->getABerlakuPos();
                break;
            case 13:
                return $this->getASosialisasiPos();
                break;
            case 14:
                return $this->getAKsEdukatif();
                break;
            case 15:
                return $this->getCreateDate();
                break;
            case 16:
                return $this->getLastUpdate();
                break;
            case 17:
                return $this->getSoftDelete();
                break;
            case 18:
                return $this->getLastSync();
                break;
            case 19:
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
        if (isset($alreadyDumpedObjects['Kepanitiaan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Kepanitiaan'][$this->getPrimaryKey()] = true;
        $keys = KepanitiaanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPanitia(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getIdJnsPanitia(),
            $keys[3] => $this->getNmPanitia(),
            $keys[4] => $this->getInstansi(),
            $keys[5] => $this->getTktPanitia(),
            $keys[6] => $this->getSkTugas(),
            $keys[7] => $this->getTmtSkTugas(),
            $keys[8] => $this->getTstSkTugas(),
            $keys[9] => $this->getAPasangPapan(),
            $keys[10] => $this->getAFormulir(),
            $keys[11] => $this->getASilabus(),
            $keys[12] => $this->getABerlakuPos(),
            $keys[13] => $this->getASosialisasiPos(),
            $keys[14] => $this->getAKsEdukatif(),
            $keys[15] => $this->getCreateDate(),
            $keys[16] => $this->getLastUpdate(),
            $keys[17] => $this->getSoftDelete(),
            $keys[18] => $this->getLastSync(),
            $keys[19] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisKepanitiaan) {
                $result['JenisKepanitiaan'] = $this->aJenisKepanitiaan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAktivitasKepanitiaans) {
                $result['AktivitasKepanitiaans'] = $this->collAktivitasKepanitiaans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnggotaPanitias) {
                $result['AnggotaPanitias'] = $this->collAnggotaPanitias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = KepanitiaanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdPanitia($value);
                break;
            case 1:
                $this->setSekolahId($value);
                break;
            case 2:
                $this->setIdJnsPanitia($value);
                break;
            case 3:
                $this->setNmPanitia($value);
                break;
            case 4:
                $this->setInstansi($value);
                break;
            case 5:
                $this->setTktPanitia($value);
                break;
            case 6:
                $this->setSkTugas($value);
                break;
            case 7:
                $this->setTmtSkTugas($value);
                break;
            case 8:
                $this->setTstSkTugas($value);
                break;
            case 9:
                $this->setAPasangPapan($value);
                break;
            case 10:
                $this->setAFormulir($value);
                break;
            case 11:
                $this->setASilabus($value);
                break;
            case 12:
                $this->setABerlakuPos($value);
                break;
            case 13:
                $this->setASosialisasiPos($value);
                break;
            case 14:
                $this->setAKsEdukatif($value);
                break;
            case 15:
                $this->setCreateDate($value);
                break;
            case 16:
                $this->setLastUpdate($value);
                break;
            case 17:
                $this->setSoftDelete($value);
                break;
            case 18:
                $this->setLastSync($value);
                break;
            case 19:
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
        $keys = KepanitiaanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdPanitia($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSekolahId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdJnsPanitia($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNmPanitia($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setInstansi($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTktPanitia($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSkTugas($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTmtSkTugas($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTstSkTugas($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAPasangPapan($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAFormulir($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setASilabus($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setABerlakuPos($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setASosialisasiPos($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAKsEdukatif($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setCreateDate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setLastUpdate($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setSoftDelete($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setLastSync($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setUpdaterId($arr[$keys[19]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(KepanitiaanPeer::DATABASE_NAME);

        if ($this->isColumnModified(KepanitiaanPeer::ID_PANITIA)) $criteria->add(KepanitiaanPeer::ID_PANITIA, $this->id_panitia);
        if ($this->isColumnModified(KepanitiaanPeer::SEKOLAH_ID)) $criteria->add(KepanitiaanPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(KepanitiaanPeer::ID_JNS_PANITIA)) $criteria->add(KepanitiaanPeer::ID_JNS_PANITIA, $this->id_jns_panitia);
        if ($this->isColumnModified(KepanitiaanPeer::NM_PANITIA)) $criteria->add(KepanitiaanPeer::NM_PANITIA, $this->nm_panitia);
        if ($this->isColumnModified(KepanitiaanPeer::INSTANSI)) $criteria->add(KepanitiaanPeer::INSTANSI, $this->instansi);
        if ($this->isColumnModified(KepanitiaanPeer::TKT_PANITIA)) $criteria->add(KepanitiaanPeer::TKT_PANITIA, $this->tkt_panitia);
        if ($this->isColumnModified(KepanitiaanPeer::SK_TUGAS)) $criteria->add(KepanitiaanPeer::SK_TUGAS, $this->sk_tugas);
        if ($this->isColumnModified(KepanitiaanPeer::TMT_SK_TUGAS)) $criteria->add(KepanitiaanPeer::TMT_SK_TUGAS, $this->tmt_sk_tugas);
        if ($this->isColumnModified(KepanitiaanPeer::TST_SK_TUGAS)) $criteria->add(KepanitiaanPeer::TST_SK_TUGAS, $this->tst_sk_tugas);
        if ($this->isColumnModified(KepanitiaanPeer::A_PASANG_PAPAN)) $criteria->add(KepanitiaanPeer::A_PASANG_PAPAN, $this->a_pasang_papan);
        if ($this->isColumnModified(KepanitiaanPeer::A_FORMULIR)) $criteria->add(KepanitiaanPeer::A_FORMULIR, $this->a_formulir);
        if ($this->isColumnModified(KepanitiaanPeer::A_SILABUS)) $criteria->add(KepanitiaanPeer::A_SILABUS, $this->a_silabus);
        if ($this->isColumnModified(KepanitiaanPeer::A_BERLAKU_POS)) $criteria->add(KepanitiaanPeer::A_BERLAKU_POS, $this->a_berlaku_pos);
        if ($this->isColumnModified(KepanitiaanPeer::A_SOSIALISASI_POS)) $criteria->add(KepanitiaanPeer::A_SOSIALISASI_POS, $this->a_sosialisasi_pos);
        if ($this->isColumnModified(KepanitiaanPeer::A_KS_EDUKATIF)) $criteria->add(KepanitiaanPeer::A_KS_EDUKATIF, $this->a_ks_edukatif);
        if ($this->isColumnModified(KepanitiaanPeer::CREATE_DATE)) $criteria->add(KepanitiaanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(KepanitiaanPeer::LAST_UPDATE)) $criteria->add(KepanitiaanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(KepanitiaanPeer::SOFT_DELETE)) $criteria->add(KepanitiaanPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(KepanitiaanPeer::LAST_SYNC)) $criteria->add(KepanitiaanPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(KepanitiaanPeer::UPDATER_ID)) $criteria->add(KepanitiaanPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(KepanitiaanPeer::DATABASE_NAME);
        $criteria->add(KepanitiaanPeer::ID_PANITIA, $this->id_panitia);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdPanitia();
    }

    /**
     * Generic method to set the primary key (id_panitia column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPanitia($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdPanitia();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Kepanitiaan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setIdJnsPanitia($this->getIdJnsPanitia());
        $copyObj->setNmPanitia($this->getNmPanitia());
        $copyObj->setInstansi($this->getInstansi());
        $copyObj->setTktPanitia($this->getTktPanitia());
        $copyObj->setSkTugas($this->getSkTugas());
        $copyObj->setTmtSkTugas($this->getTmtSkTugas());
        $copyObj->setTstSkTugas($this->getTstSkTugas());
        $copyObj->setAPasangPapan($this->getAPasangPapan());
        $copyObj->setAFormulir($this->getAFormulir());
        $copyObj->setASilabus($this->getASilabus());
        $copyObj->setABerlakuPos($this->getABerlakuPos());
        $copyObj->setASosialisasiPos($this->getASosialisasiPos());
        $copyObj->setAKsEdukatif($this->getAKsEdukatif());
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

            foreach ($this->getAktivitasKepanitiaans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAktivitasKepanitiaan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnggotaPanitias() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaPanitia($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPanitia(NULL); // this is a auto-increment column, so set to default value
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
     * @return Kepanitiaan Clone of current object.
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
     * @return KepanitiaanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new KepanitiaanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisKepanitiaan object.
     *
     * @param             JenisKepanitiaan $v
     * @return Kepanitiaan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisKepanitiaan(JenisKepanitiaan $v = null)
    {
        if ($v === null) {
            $this->setIdJnsPanitia(NULL);
        } else {
            $this->setIdJnsPanitia($v->getIdJnsPanitia());
        }

        $this->aJenisKepanitiaan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisKepanitiaan object, it will not be re-added.
        if ($v !== null) {
            $v->addKepanitiaan($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisKepanitiaan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisKepanitiaan The associated JenisKepanitiaan object.
     * @throws PropelException
     */
    public function getJenisKepanitiaan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisKepanitiaan === null && ($this->id_jns_panitia !== null) && $doQuery) {
            $this->aJenisKepanitiaan = JenisKepanitiaanQuery::create()->findPk($this->id_jns_panitia, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisKepanitiaan->addKepanitiaans($this);
             */
        }

        return $this->aJenisKepanitiaan;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Kepanitiaan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolah(Sekolah $v = null)
    {
        if ($v === null) {
            $this->setSekolahId(NULL);
        } else {
            $this->setSekolahId($v->getSekolahId());
        }

        $this->aSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addKepanitiaan($this);
        }


        return $this;
    }


    /**
     * Get the associated Sekolah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sekolah The associated Sekolah object.
     * @throws PropelException
     */
    public function getSekolah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSekolah === null && (($this->sekolah_id !== "" && $this->sekolah_id !== null)) && $doQuery) {
            $this->aSekolah = SekolahQuery::create()->findPk($this->sekolah_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolah->addKepanitiaans($this);
             */
        }

        return $this->aSekolah;
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
        if ('AktivitasKepanitiaan' == $relationName) {
            $this->initAktivitasKepanitiaans();
        }
        if ('AnggotaPanitia' == $relationName) {
            $this->initAnggotaPanitias();
        }
    }

    /**
     * Clears out the collAktivitasKepanitiaans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Kepanitiaan The current object (for fluent API support)
     * @see        addAktivitasKepanitiaans()
     */
    public function clearAktivitasKepanitiaans()
    {
        $this->collAktivitasKepanitiaans = null; // important to set this to null since that means it is uninitialized
        $this->collAktivitasKepanitiaansPartial = null;

        return $this;
    }

    /**
     * reset is the collAktivitasKepanitiaans collection loaded partially
     *
     * @return void
     */
    public function resetPartialAktivitasKepanitiaans($v = true)
    {
        $this->collAktivitasKepanitiaansPartial = $v;
    }

    /**
     * Initializes the collAktivitasKepanitiaans collection.
     *
     * By default this just sets the collAktivitasKepanitiaans collection to an empty array (like clearcollAktivitasKepanitiaans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAktivitasKepanitiaans($overrideExisting = true)
    {
        if (null !== $this->collAktivitasKepanitiaans && !$overrideExisting) {
            return;
        }
        $this->collAktivitasKepanitiaans = new PropelObjectCollection();
        $this->collAktivitasKepanitiaans->setModel('AktivitasKepanitiaan');
    }

    /**
     * Gets an array of AktivitasKepanitiaan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Kepanitiaan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AktivitasKepanitiaan[] List of AktivitasKepanitiaan objects
     * @throws PropelException
     */
    public function getAktivitasKepanitiaans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAktivitasKepanitiaansPartial && !$this->isNew();
        if (null === $this->collAktivitasKepanitiaans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAktivitasKepanitiaans) {
                // return empty collection
                $this->initAktivitasKepanitiaans();
            } else {
                $collAktivitasKepanitiaans = AktivitasKepanitiaanQuery::create(null, $criteria)
                    ->filterByKepanitiaan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAktivitasKepanitiaansPartial && count($collAktivitasKepanitiaans)) {
                      $this->initAktivitasKepanitiaans(false);

                      foreach($collAktivitasKepanitiaans as $obj) {
                        if (false == $this->collAktivitasKepanitiaans->contains($obj)) {
                          $this->collAktivitasKepanitiaans->append($obj);
                        }
                      }

                      $this->collAktivitasKepanitiaansPartial = true;
                    }

                    $collAktivitasKepanitiaans->getInternalIterator()->rewind();
                    return $collAktivitasKepanitiaans;
                }

                if($partial && $this->collAktivitasKepanitiaans) {
                    foreach($this->collAktivitasKepanitiaans as $obj) {
                        if($obj->isNew()) {
                            $collAktivitasKepanitiaans[] = $obj;
                        }
                    }
                }

                $this->collAktivitasKepanitiaans = $collAktivitasKepanitiaans;
                $this->collAktivitasKepanitiaansPartial = false;
            }
        }

        return $this->collAktivitasKepanitiaans;
    }

    /**
     * Sets a collection of AktivitasKepanitiaan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aktivitasKepanitiaans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setAktivitasKepanitiaans(PropelCollection $aktivitasKepanitiaans, PropelPDO $con = null)
    {
        $aktivitasKepanitiaansToDelete = $this->getAktivitasKepanitiaans(new Criteria(), $con)->diff($aktivitasKepanitiaans);

        $this->aktivitasKepanitiaansScheduledForDeletion = unserialize(serialize($aktivitasKepanitiaansToDelete));

        foreach ($aktivitasKepanitiaansToDelete as $aktivitasKepanitiaanRemoved) {
            $aktivitasKepanitiaanRemoved->setKepanitiaan(null);
        }

        $this->collAktivitasKepanitiaans = null;
        foreach ($aktivitasKepanitiaans as $aktivitasKepanitiaan) {
            $this->addAktivitasKepanitiaan($aktivitasKepanitiaan);
        }

        $this->collAktivitasKepanitiaans = $aktivitasKepanitiaans;
        $this->collAktivitasKepanitiaansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AktivitasKepanitiaan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AktivitasKepanitiaan objects.
     * @throws PropelException
     */
    public function countAktivitasKepanitiaans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAktivitasKepanitiaansPartial && !$this->isNew();
        if (null === $this->collAktivitasKepanitiaans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAktivitasKepanitiaans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAktivitasKepanitiaans());
            }
            $query = AktivitasKepanitiaanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKepanitiaan($this)
                ->count($con);
        }

        return count($this->collAktivitasKepanitiaans);
    }

    /**
     * Method called to associate a AktivitasKepanitiaan object to this object
     * through the AktivitasKepanitiaan foreign key attribute.
     *
     * @param    AktivitasKepanitiaan $l AktivitasKepanitiaan
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function addAktivitasKepanitiaan(AktivitasKepanitiaan $l)
    {
        if ($this->collAktivitasKepanitiaans === null) {
            $this->initAktivitasKepanitiaans();
            $this->collAktivitasKepanitiaansPartial = true;
        }
        if (!in_array($l, $this->collAktivitasKepanitiaans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAktivitasKepanitiaan($l);
        }

        return $this;
    }

    /**
     * @param	AktivitasKepanitiaan $aktivitasKepanitiaan The aktivitasKepanitiaan object to add.
     */
    protected function doAddAktivitasKepanitiaan($aktivitasKepanitiaan)
    {
        $this->collAktivitasKepanitiaans[]= $aktivitasKepanitiaan;
        $aktivitasKepanitiaan->setKepanitiaan($this);
    }

    /**
     * @param	AktivitasKepanitiaan $aktivitasKepanitiaan The aktivitasKepanitiaan object to remove.
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function removeAktivitasKepanitiaan($aktivitasKepanitiaan)
    {
        if ($this->getAktivitasKepanitiaans()->contains($aktivitasKepanitiaan)) {
            $this->collAktivitasKepanitiaans->remove($this->collAktivitasKepanitiaans->search($aktivitasKepanitiaan));
            if (null === $this->aktivitasKepanitiaansScheduledForDeletion) {
                $this->aktivitasKepanitiaansScheduledForDeletion = clone $this->collAktivitasKepanitiaans;
                $this->aktivitasKepanitiaansScheduledForDeletion->clear();
            }
            $this->aktivitasKepanitiaansScheduledForDeletion[]= clone $aktivitasKepanitiaan;
            $aktivitasKepanitiaan->setKepanitiaan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Kepanitiaan is new, it will return
     * an empty collection; or if this Kepanitiaan has previously
     * been saved, it will retrieve related AktivitasKepanitiaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Kepanitiaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AktivitasKepanitiaan[] List of AktivitasKepanitiaan objects
     */
    public function getAktivitasKepanitiaansJoinJenisAktivitasKepanitiaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AktivitasKepanitiaanQuery::create(null, $criteria);
        $query->joinWith('JenisAktivitasKepanitiaan', $join_behavior);

        return $this->getAktivitasKepanitiaans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Kepanitiaan is new, it will return
     * an empty collection; or if this Kepanitiaan has previously
     * been saved, it will retrieve related AktivitasKepanitiaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Kepanitiaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AktivitasKepanitiaan[] List of AktivitasKepanitiaan objects
     */
    public function getAktivitasKepanitiaansJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AktivitasKepanitiaanQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getAktivitasKepanitiaans($query, $con);
    }

    /**
     * Clears out the collAnggotaPanitias collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Kepanitiaan The current object (for fluent API support)
     * @see        addAnggotaPanitias()
     */
    public function clearAnggotaPanitias()
    {
        $this->collAnggotaPanitias = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaPanitiasPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaPanitias collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaPanitias($v = true)
    {
        $this->collAnggotaPanitiasPartial = $v;
    }

    /**
     * Initializes the collAnggotaPanitias collection.
     *
     * By default this just sets the collAnggotaPanitias collection to an empty array (like clearcollAnggotaPanitias());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaPanitias($overrideExisting = true)
    {
        if (null !== $this->collAnggotaPanitias && !$overrideExisting) {
            return;
        }
        $this->collAnggotaPanitias = new PropelObjectCollection();
        $this->collAnggotaPanitias->setModel('AnggotaPanitia');
    }

    /**
     * Gets an array of AnggotaPanitia objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Kepanitiaan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaPanitia[] List of AnggotaPanitia objects
     * @throws PropelException
     */
    public function getAnggotaPanitias($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaPanitiasPartial && !$this->isNew();
        if (null === $this->collAnggotaPanitias || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaPanitias) {
                // return empty collection
                $this->initAnggotaPanitias();
            } else {
                $collAnggotaPanitias = AnggotaPanitiaQuery::create(null, $criteria)
                    ->filterByKepanitiaan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaPanitiasPartial && count($collAnggotaPanitias)) {
                      $this->initAnggotaPanitias(false);

                      foreach($collAnggotaPanitias as $obj) {
                        if (false == $this->collAnggotaPanitias->contains($obj)) {
                          $this->collAnggotaPanitias->append($obj);
                        }
                      }

                      $this->collAnggotaPanitiasPartial = true;
                    }

                    $collAnggotaPanitias->getInternalIterator()->rewind();
                    return $collAnggotaPanitias;
                }

                if($partial && $this->collAnggotaPanitias) {
                    foreach($this->collAnggotaPanitias as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaPanitias[] = $obj;
                        }
                    }
                }

                $this->collAnggotaPanitias = $collAnggotaPanitias;
                $this->collAnggotaPanitiasPartial = false;
            }
        }

        return $this->collAnggotaPanitias;
    }

    /**
     * Sets a collection of AnggotaPanitia objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaPanitias A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function setAnggotaPanitias(PropelCollection $anggotaPanitias, PropelPDO $con = null)
    {
        $anggotaPanitiasToDelete = $this->getAnggotaPanitias(new Criteria(), $con)->diff($anggotaPanitias);

        $this->anggotaPanitiasScheduledForDeletion = unserialize(serialize($anggotaPanitiasToDelete));

        foreach ($anggotaPanitiasToDelete as $anggotaPanitiaRemoved) {
            $anggotaPanitiaRemoved->setKepanitiaan(null);
        }

        $this->collAnggotaPanitias = null;
        foreach ($anggotaPanitias as $anggotaPanitia) {
            $this->addAnggotaPanitia($anggotaPanitia);
        }

        $this->collAnggotaPanitias = $anggotaPanitias;
        $this->collAnggotaPanitiasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaPanitia objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaPanitia objects.
     * @throws PropelException
     */
    public function countAnggotaPanitias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaPanitiasPartial && !$this->isNew();
        if (null === $this->collAnggotaPanitias || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaPanitias) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaPanitias());
            }
            $query = AnggotaPanitiaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKepanitiaan($this)
                ->count($con);
        }

        return count($this->collAnggotaPanitias);
    }

    /**
     * Method called to associate a AnggotaPanitia object to this object
     * through the AnggotaPanitia foreign key attribute.
     *
     * @param    AnggotaPanitia $l AnggotaPanitia
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function addAnggotaPanitia(AnggotaPanitia $l)
    {
        if ($this->collAnggotaPanitias === null) {
            $this->initAnggotaPanitias();
            $this->collAnggotaPanitiasPartial = true;
        }
        if (!in_array($l, $this->collAnggotaPanitias->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaPanitia($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaPanitia $anggotaPanitia The anggotaPanitia object to add.
     */
    protected function doAddAnggotaPanitia($anggotaPanitia)
    {
        $this->collAnggotaPanitias[]= $anggotaPanitia;
        $anggotaPanitia->setKepanitiaan($this);
    }

    /**
     * @param	AnggotaPanitia $anggotaPanitia The anggotaPanitia object to remove.
     * @return Kepanitiaan The current object (for fluent API support)
     */
    public function removeAnggotaPanitia($anggotaPanitia)
    {
        if ($this->getAnggotaPanitias()->contains($anggotaPanitia)) {
            $this->collAnggotaPanitias->remove($this->collAnggotaPanitias->search($anggotaPanitia));
            if (null === $this->anggotaPanitiasScheduledForDeletion) {
                $this->anggotaPanitiasScheduledForDeletion = clone $this->collAnggotaPanitias;
                $this->anggotaPanitiasScheduledForDeletion->clear();
            }
            $this->anggotaPanitiasScheduledForDeletion[]= clone $anggotaPanitia;
            $anggotaPanitia->setKepanitiaan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Kepanitiaan is new, it will return
     * an empty collection; or if this Kepanitiaan has previously
     * been saved, it will retrieve related AnggotaPanitias from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Kepanitiaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaPanitia[] List of AnggotaPanitia objects
     */
    public function getAnggotaPanitiasJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaPanitiaQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getAnggotaPanitias($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Kepanitiaan is new, it will return
     * an empty collection; or if this Kepanitiaan has previously
     * been saved, it will retrieve related AnggotaPanitias from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Kepanitiaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaPanitia[] List of AnggotaPanitia objects
     */
    public function getAnggotaPanitiasJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaPanitiaQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAnggotaPanitias($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_panitia = null;
        $this->sekolah_id = null;
        $this->id_jns_panitia = null;
        $this->nm_panitia = null;
        $this->instansi = null;
        $this->tkt_panitia = null;
        $this->sk_tugas = null;
        $this->tmt_sk_tugas = null;
        $this->tst_sk_tugas = null;
        $this->a_pasang_papan = null;
        $this->a_formulir = null;
        $this->a_silabus = null;
        $this->a_berlaku_pos = null;
        $this->a_sosialisasi_pos = null;
        $this->a_ks_edukatif = null;
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
            if ($this->collAktivitasKepanitiaans) {
                foreach ($this->collAktivitasKepanitiaans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnggotaPanitias) {
                foreach ($this->collAnggotaPanitias as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisKepanitiaan instanceof Persistent) {
              $this->aJenisKepanitiaan->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAktivitasKepanitiaans instanceof PropelCollection) {
            $this->collAktivitasKepanitiaans->clearIterator();
        }
        $this->collAktivitasKepanitiaans = null;
        if ($this->collAnggotaPanitias instanceof PropelCollection) {
            $this->collAnggotaPanitias->clearIterator();
        }
        $this->collAnggotaPanitias = null;
        $this->aJenisKepanitiaan = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(KepanitiaanPeer::DEFAULT_STRING_FORMAT);
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
