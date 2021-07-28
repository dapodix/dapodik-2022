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
use DataDikdas\Model\JenisPendaftaran;
use DataDikdas\Model\JenisPendaftaranQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PesertaDidikBaruPeer;
use DataDikdas\Model\PesertaDidikBaruQuery;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TahunAjaranQuery;

/**
 * Base class that represents a row from the 'peserta_didik_baru' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePesertaDidikBaru extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PesertaDidikBaruPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PesertaDidikBaruPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the pdb_id field.
     * @var        string
     */
    protected $pdb_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the tahun_ajaran_id field.
     * @var        string
     */
    protected $tahun_ajaran_id;

    /**
     * The value for the nama_pd field.
     * @var        string
     */
    protected $nama_pd;

    /**
     * The value for the jenis_kelamin field.
     * @var        string
     */
    protected $jenis_kelamin;

    /**
     * The value for the nisn field.
     * @var        string
     */
    protected $nisn;

    /**
     * The value for the nik field.
     * @var        string
     */
    protected $nik;

    /**
     * The value for the tempat_lahir field.
     * @var        string
     */
    protected $tempat_lahir;

    /**
     * The value for the tanggal_lahir field.
     * @var        string
     */
    protected $tanggal_lahir;

    /**
     * The value for the nama_ibu_kandung field.
     * @var        string
     */
    protected $nama_ibu_kandung;

    /**
     * The value for the jenis_pendaftaran_id field.
     * @var        string
     */
    protected $jenis_pendaftaran_id;

    /**
     * The value for the sudah_diproses field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $sudah_diproses;

    /**
     * The value for the berhasil_diproses field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $berhasil_diproses;

    /**
     * The value for the peserta_didik_id field.
     * @var        string
     */
    protected $peserta_didik_id;

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
     * @var        JenisPendaftaran
     */
    protected $aJenisPendaftaran;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        TahunAjaran
     */
    protected $aTahunAjaran;

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
        $this->sudah_diproses = '0';
        $this->berhasil_diproses = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BasePesertaDidikBaru object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [pdb_id] column value.
     * 
     * @return string
     */
    public function getPdbId()
    {
        return $this->pdb_id;
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
     * Get the [tahun_ajaran_id] column value.
     * 
     * @return string
     */
    public function getTahunAjaranId()
    {
        return $this->tahun_ajaran_id;
    }

    /**
     * Get the [nama_pd] column value.
     * 
     * @return string
     */
    public function getNamaPd()
    {
        return $this->nama_pd;
    }

    /**
     * Get the [jenis_kelamin] column value.
     * 
     * @return string
     */
    public function getJenisKelamin()
    {
        return $this->jenis_kelamin;
    }

    /**
     * Get the [nisn] column value.
     * 
     * @return string
     */
    public function getNisn()
    {
        return $this->nisn;
    }

    /**
     * Get the [nik] column value.
     * 
     * @return string
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * Get the [tempat_lahir] column value.
     * 
     * @return string
     */
    public function getTempatLahir()
    {
        return $this->tempat_lahir;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_lahir] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalLahir($format = '%Y-%m-%d')
    {
        if ($this->tanggal_lahir === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_lahir);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_lahir, true), $x);
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
     * Get the [nama_ibu_kandung] column value.
     * 
     * @return string
     */
    public function getNamaIbuKandung()
    {
        return $this->nama_ibu_kandung;
    }

    /**
     * Get the [jenis_pendaftaran_id] column value.
     * 
     * @return string
     */
    public function getJenisPendaftaranId()
    {
        return $this->jenis_pendaftaran_id;
    }

    /**
     * Get the [sudah_diproses] column value.
     * 
     * @return string
     */
    public function getSudahDiproses()
    {
        return $this->sudah_diproses;
    }

    /**
     * Get the [berhasil_diproses] column value.
     * 
     * @return string
     */
    public function getBerhasilDiproses()
    {
        return $this->berhasil_diproses;
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
     * Set the value of [pdb_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setPdbId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pdb_id !== $v) {
            $this->pdb_id = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::PDB_ID;
        }


        return $this;
    } // setPdbId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [tahun_ajaran_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setTahunAjaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_ajaran_id !== $v) {
            $this->tahun_ajaran_id = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::TAHUN_AJARAN_ID;
        }

        if ($this->aTahunAjaran !== null && $this->aTahunAjaran->getTahunAjaranId() !== $v) {
            $this->aTahunAjaran = null;
        }


        return $this;
    } // setTahunAjaranId()

    /**
     * Set the value of [nama_pd] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setNamaPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_pd !== $v) {
            $this->nama_pd = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::NAMA_PD;
        }


        return $this;
    } // setNamaPd()

    /**
     * Set the value of [jenis_kelamin] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setJenisKelamin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_kelamin !== $v) {
            $this->jenis_kelamin = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::JENIS_KELAMIN;
        }


        return $this;
    } // setJenisKelamin()

    /**
     * Set the value of [nisn] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setNisn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nisn !== $v) {
            $this->nisn = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::NISN;
        }


        return $this;
    } // setNisn()

    /**
     * Set the value of [nik] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setNik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nik !== $v) {
            $this->nik = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::NIK;
        }


        return $this;
    } // setNik()

    /**
     * Set the value of [tempat_lahir] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setTempatLahir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_lahir !== $v) {
            $this->tempat_lahir = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::TEMPAT_LAHIR;
        }


        return $this;
    } // setTempatLahir()

    /**
     * Sets the value of [tanggal_lahir] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setTanggalLahir($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_lahir !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_lahir !== null && $tmpDt = new DateTime($this->tanggal_lahir)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_lahir = $newDateAsString;
                $this->modifiedColumns[] = PesertaDidikBaruPeer::TANGGAL_LAHIR;
            }
        } // if either are not null


        return $this;
    } // setTanggalLahir()

    /**
     * Set the value of [nama_ibu_kandung] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setNamaIbuKandung($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_ibu_kandung !== $v) {
            $this->nama_ibu_kandung = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::NAMA_IBU_KANDUNG;
        }


        return $this;
    } // setNamaIbuKandung()

    /**
     * Set the value of [jenis_pendaftaran_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setJenisPendaftaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_pendaftaran_id !== $v) {
            $this->jenis_pendaftaran_id = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID;
        }

        if ($this->aJenisPendaftaran !== null && $this->aJenisPendaftaran->getJenisPendaftaranId() !== $v) {
            $this->aJenisPendaftaran = null;
        }


        return $this;
    } // setJenisPendaftaranId()

    /**
     * Set the value of [sudah_diproses] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setSudahDiproses($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sudah_diproses !== $v) {
            $this->sudah_diproses = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::SUDAH_DIPROSES;
        }


        return $this;
    } // setSudahDiproses()

    /**
     * Set the value of [berhasil_diproses] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setBerhasilDiproses($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->berhasil_diproses !== $v) {
            $this->berhasil_diproses = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::BERHASIL_DIPROSES;
        }


        return $this;
    } // setBerhasilDiproses()

    /**
     * Set the value of [peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peserta_didik_id !== $v) {
            $this->peserta_didik_id = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::PESERTA_DIDIK_ID;
        }

        if ($this->aPesertaDidik !== null && $this->aPesertaDidik->getPesertaDidikId() !== $v) {
            $this->aPesertaDidik = null;
        }


        return $this;
    } // setPesertaDidikId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PesertaDidikBaruPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PesertaDidikBaruPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidikBaru The current object (for fluent API support)
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
                $this->modifiedColumns[] = PesertaDidikBaruPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidikBaru The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PesertaDidikBaruPeer::UPDATER_ID;
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
            if ($this->sudah_diproses !== '0') {
                return false;
            }

            if ($this->berhasil_diproses !== '0') {
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

            $this->pdb_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->sekolah_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->tahun_ajaran_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nama_pd = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jenis_kelamin = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->nisn = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->nik = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->tempat_lahir = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tanggal_lahir = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->nama_ibu_kandung = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->jenis_pendaftaran_id = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->sudah_diproses = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->berhasil_diproses = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->peserta_didik_id = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
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
            return $startcol + 19; // 19 = PesertaDidikBaruPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PesertaDidikBaru object", $e);
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
        if ($this->aTahunAjaran !== null && $this->tahun_ajaran_id !== $this->aTahunAjaran->getTahunAjaranId()) {
            $this->aTahunAjaran = null;
        }
        if ($this->aJenisPendaftaran !== null && $this->jenis_pendaftaran_id !== $this->aJenisPendaftaran->getJenisPendaftaranId()) {
            $this->aJenisPendaftaran = null;
        }
        if ($this->aPesertaDidik !== null && $this->peserta_didik_id !== $this->aPesertaDidik->getPesertaDidikId()) {
            $this->aPesertaDidik = null;
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
            $con = Propel::getConnection(PesertaDidikBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PesertaDidikBaruPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPesertaDidik = null;
            $this->aJenisPendaftaran = null;
            $this->aSekolah = null;
            $this->aTahunAjaran = null;
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
            $con = Propel::getConnection(PesertaDidikBaruPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PesertaDidikBaruQuery::create()
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
            $con = Propel::getConnection(PesertaDidikBaruPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PesertaDidikBaruPeer::addInstanceToPool($this);
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

            if ($this->aJenisPendaftaran !== null) {
                if ($this->aJenisPendaftaran->isModified() || $this->aJenisPendaftaran->isNew()) {
                    $affectedRows += $this->aJenisPendaftaran->save($con);
                }
                $this->setJenisPendaftaran($this->aJenisPendaftaran);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
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
        if ($this->isColumnModified(PesertaDidikBaruPeer::PDB_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pdb_id"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::TAHUN_AJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_ajaran_id"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::NAMA_PD)) {
            $modifiedColumns[':p' . $index++]  = '"nama_pd"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::JENIS_KELAMIN)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_kelamin"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::NISN)) {
            $modifiedColumns[':p' . $index++]  = '"nisn"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::NIK)) {
            $modifiedColumns[':p' . $index++]  = '"nik"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::TEMPAT_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_lahir"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::TANGGAL_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_lahir"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::NAMA_IBU_KANDUNG)) {
            $modifiedColumns[':p' . $index++]  = '"nama_ibu_kandung"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_pendaftaran_id"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::SUDAH_DIPROSES)) {
            $modifiedColumns[':p' . $index++]  = '"sudah_diproses"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::BERHASIL_DIPROSES)) {
            $modifiedColumns[':p' . $index++]  = '"berhasil_diproses"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peserta_didik_id"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PesertaDidikBaruPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "peserta_didik_baru" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"pdb_id"':						
                        $stmt->bindValue($identifier, $this->pdb_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"tahun_ajaran_id"':						
                        $stmt->bindValue($identifier, $this->tahun_ajaran_id, PDO::PARAM_STR);
                        break;
                    case '"nama_pd"':						
                        $stmt->bindValue($identifier, $this->nama_pd, PDO::PARAM_STR);
                        break;
                    case '"jenis_kelamin"':						
                        $stmt->bindValue($identifier, $this->jenis_kelamin, PDO::PARAM_STR);
                        break;
                    case '"nisn"':						
                        $stmt->bindValue($identifier, $this->nisn, PDO::PARAM_STR);
                        break;
                    case '"nik"':						
                        $stmt->bindValue($identifier, $this->nik, PDO::PARAM_STR);
                        break;
                    case '"tempat_lahir"':						
                        $stmt->bindValue($identifier, $this->tempat_lahir, PDO::PARAM_STR);
                        break;
                    case '"tanggal_lahir"':						
                        $stmt->bindValue($identifier, $this->tanggal_lahir, PDO::PARAM_STR);
                        break;
                    case '"nama_ibu_kandung"':						
                        $stmt->bindValue($identifier, $this->nama_ibu_kandung, PDO::PARAM_STR);
                        break;
                    case '"jenis_pendaftaran_id"':						
                        $stmt->bindValue($identifier, $this->jenis_pendaftaran_id, PDO::PARAM_STR);
                        break;
                    case '"sudah_diproses"':						
                        $stmt->bindValue($identifier, $this->sudah_diproses, PDO::PARAM_STR);
                        break;
                    case '"berhasil_diproses"':						
                        $stmt->bindValue($identifier, $this->berhasil_diproses, PDO::PARAM_STR);
                        break;
                    case '"peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->peserta_didik_id, PDO::PARAM_STR);
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

            if ($this->aJenisPendaftaran !== null) {
                if (!$this->aJenisPendaftaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisPendaftaran->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aTahunAjaran !== null) {
                if (!$this->aTahunAjaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTahunAjaran->getValidationFailures());
                }
            }


            if (($retval = PesertaDidikBaruPeer::doValidate($this, $columns)) !== true) {
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
        $pos = PesertaDidikBaruPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPdbId();
                break;
            case 1:
                return $this->getSekolahId();
                break;
            case 2:
                return $this->getTahunAjaranId();
                break;
            case 3:
                return $this->getNamaPd();
                break;
            case 4:
                return $this->getJenisKelamin();
                break;
            case 5:
                return $this->getNisn();
                break;
            case 6:
                return $this->getNik();
                break;
            case 7:
                return $this->getTempatLahir();
                break;
            case 8:
                return $this->getTanggalLahir();
                break;
            case 9:
                return $this->getNamaIbuKandung();
                break;
            case 10:
                return $this->getJenisPendaftaranId();
                break;
            case 11:
                return $this->getSudahDiproses();
                break;
            case 12:
                return $this->getBerhasilDiproses();
                break;
            case 13:
                return $this->getPesertaDidikId();
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
        if (isset($alreadyDumpedObjects['PesertaDidikBaru'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PesertaDidikBaru'][$this->getPrimaryKey()] = true;
        $keys = PesertaDidikBaruPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPdbId(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getTahunAjaranId(),
            $keys[3] => $this->getNamaPd(),
            $keys[4] => $this->getJenisKelamin(),
            $keys[5] => $this->getNisn(),
            $keys[6] => $this->getNik(),
            $keys[7] => $this->getTempatLahir(),
            $keys[8] => $this->getTanggalLahir(),
            $keys[9] => $this->getNamaIbuKandung(),
            $keys[10] => $this->getJenisPendaftaranId(),
            $keys[11] => $this->getSudahDiproses(),
            $keys[12] => $this->getBerhasilDiproses(),
            $keys[13] => $this->getPesertaDidikId(),
            $keys[14] => $this->getCreateDate(),
            $keys[15] => $this->getLastUpdate(),
            $keys[16] => $this->getSoftDelete(),
            $keys[17] => $this->getLastSync(),
            $keys[18] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPesertaDidik) {
                $result['PesertaDidik'] = $this->aPesertaDidik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisPendaftaran) {
                $result['JenisPendaftaran'] = $this->aJenisPendaftaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTahunAjaran) {
                $result['TahunAjaran'] = $this->aTahunAjaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = PesertaDidikBaruPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPdbId($value);
                break;
            case 1:
                $this->setSekolahId($value);
                break;
            case 2:
                $this->setTahunAjaranId($value);
                break;
            case 3:
                $this->setNamaPd($value);
                break;
            case 4:
                $this->setJenisKelamin($value);
                break;
            case 5:
                $this->setNisn($value);
                break;
            case 6:
                $this->setNik($value);
                break;
            case 7:
                $this->setTempatLahir($value);
                break;
            case 8:
                $this->setTanggalLahir($value);
                break;
            case 9:
                $this->setNamaIbuKandung($value);
                break;
            case 10:
                $this->setJenisPendaftaranId($value);
                break;
            case 11:
                $this->setSudahDiproses($value);
                break;
            case 12:
                $this->setBerhasilDiproses($value);
                break;
            case 13:
                $this->setPesertaDidikId($value);
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
        $keys = PesertaDidikBaruPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPdbId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSekolahId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTahunAjaranId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNamaPd($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJenisKelamin($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNisn($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNik($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTempatLahir($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTanggalLahir($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setNamaIbuKandung($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setJenisPendaftaranId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSudahDiproses($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setBerhasilDiproses($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setPesertaDidikId($arr[$keys[13]]);
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
        $criteria = new Criteria(PesertaDidikBaruPeer::DATABASE_NAME);

        if ($this->isColumnModified(PesertaDidikBaruPeer::PDB_ID)) $criteria->add(PesertaDidikBaruPeer::PDB_ID, $this->pdb_id);
        if ($this->isColumnModified(PesertaDidikBaruPeer::SEKOLAH_ID)) $criteria->add(PesertaDidikBaruPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(PesertaDidikBaruPeer::TAHUN_AJARAN_ID)) $criteria->add(PesertaDidikBaruPeer::TAHUN_AJARAN_ID, $this->tahun_ajaran_id);
        if ($this->isColumnModified(PesertaDidikBaruPeer::NAMA_PD)) $criteria->add(PesertaDidikBaruPeer::NAMA_PD, $this->nama_pd);
        if ($this->isColumnModified(PesertaDidikBaruPeer::JENIS_KELAMIN)) $criteria->add(PesertaDidikBaruPeer::JENIS_KELAMIN, $this->jenis_kelamin);
        if ($this->isColumnModified(PesertaDidikBaruPeer::NISN)) $criteria->add(PesertaDidikBaruPeer::NISN, $this->nisn);
        if ($this->isColumnModified(PesertaDidikBaruPeer::NIK)) $criteria->add(PesertaDidikBaruPeer::NIK, $this->nik);
        if ($this->isColumnModified(PesertaDidikBaruPeer::TEMPAT_LAHIR)) $criteria->add(PesertaDidikBaruPeer::TEMPAT_LAHIR, $this->tempat_lahir);
        if ($this->isColumnModified(PesertaDidikBaruPeer::TANGGAL_LAHIR)) $criteria->add(PesertaDidikBaruPeer::TANGGAL_LAHIR, $this->tanggal_lahir);
        if ($this->isColumnModified(PesertaDidikBaruPeer::NAMA_IBU_KANDUNG)) $criteria->add(PesertaDidikBaruPeer::NAMA_IBU_KANDUNG, $this->nama_ibu_kandung);
        if ($this->isColumnModified(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID)) $criteria->add(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID, $this->jenis_pendaftaran_id);
        if ($this->isColumnModified(PesertaDidikBaruPeer::SUDAH_DIPROSES)) $criteria->add(PesertaDidikBaruPeer::SUDAH_DIPROSES, $this->sudah_diproses);
        if ($this->isColumnModified(PesertaDidikBaruPeer::BERHASIL_DIPROSES)) $criteria->add(PesertaDidikBaruPeer::BERHASIL_DIPROSES, $this->berhasil_diproses);
        if ($this->isColumnModified(PesertaDidikBaruPeer::PESERTA_DIDIK_ID)) $criteria->add(PesertaDidikBaruPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        if ($this->isColumnModified(PesertaDidikBaruPeer::CREATE_DATE)) $criteria->add(PesertaDidikBaruPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PesertaDidikBaruPeer::LAST_UPDATE)) $criteria->add(PesertaDidikBaruPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PesertaDidikBaruPeer::SOFT_DELETE)) $criteria->add(PesertaDidikBaruPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PesertaDidikBaruPeer::LAST_SYNC)) $criteria->add(PesertaDidikBaruPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PesertaDidikBaruPeer::UPDATER_ID)) $criteria->add(PesertaDidikBaruPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PesertaDidikBaruPeer::DATABASE_NAME);
        $criteria->add(PesertaDidikBaruPeer::PDB_ID, $this->pdb_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPdbId();
    }

    /**
     * Generic method to set the primary key (pdb_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPdbId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPdbId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of PesertaDidikBaru (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setTahunAjaranId($this->getTahunAjaranId());
        $copyObj->setNamaPd($this->getNamaPd());
        $copyObj->setJenisKelamin($this->getJenisKelamin());
        $copyObj->setNisn($this->getNisn());
        $copyObj->setNik($this->getNik());
        $copyObj->setTempatLahir($this->getTempatLahir());
        $copyObj->setTanggalLahir($this->getTanggalLahir());
        $copyObj->setNamaIbuKandung($this->getNamaIbuKandung());
        $copyObj->setJenisPendaftaranId($this->getJenisPendaftaranId());
        $copyObj->setSudahDiproses($this->getSudahDiproses());
        $copyObj->setBerhasilDiproses($this->getBerhasilDiproses());
        $copyObj->setPesertaDidikId($this->getPesertaDidikId());
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
            $copyObj->setPdbId(NULL); // this is a auto-increment column, so set to default value
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
     * @return PesertaDidikBaru Clone of current object.
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
     * @return PesertaDidikBaruPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PesertaDidikBaruPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a PesertaDidik object.
     *
     * @param             PesertaDidik $v
     * @return PesertaDidikBaru The current object (for fluent API support)
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
            $v->addPesertaDidikBaru($this);
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
                $this->aPesertaDidik->addPesertaDidikBarus($this);
             */
        }

        return $this->aPesertaDidik;
    }

    /**
     * Declares an association between this object and a JenisPendaftaran object.
     *
     * @param             JenisPendaftaran $v
     * @return PesertaDidikBaru The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisPendaftaran(JenisPendaftaran $v = null)
    {
        if ($v === null) {
            $this->setJenisPendaftaranId(NULL);
        } else {
            $this->setJenisPendaftaranId($v->getJenisPendaftaranId());
        }

        $this->aJenisPendaftaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisPendaftaran object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikBaru($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisPendaftaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisPendaftaran The associated JenisPendaftaran object.
     * @throws PropelException
     */
    public function getJenisPendaftaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisPendaftaran === null && (($this->jenis_pendaftaran_id !== "" && $this->jenis_pendaftaran_id !== null)) && $doQuery) {
            $this->aJenisPendaftaran = JenisPendaftaranQuery::create()->findPk($this->jenis_pendaftaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisPendaftaran->addPesertaDidikBarus($this);
             */
        }

        return $this->aJenisPendaftaran;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return PesertaDidikBaru The current object (for fluent API support)
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
            $v->addPesertaDidikBaru($this);
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
                $this->aSekolah->addPesertaDidikBarus($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a TahunAjaran object.
     *
     * @param             TahunAjaran $v
     * @return PesertaDidikBaru The current object (for fluent API support)
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
            $v->addPesertaDidikBaru($this);
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
                $this->aTahunAjaran->addPesertaDidikBarus($this);
             */
        }

        return $this->aTahunAjaran;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->pdb_id = null;
        $this->sekolah_id = null;
        $this->tahun_ajaran_id = null;
        $this->nama_pd = null;
        $this->jenis_kelamin = null;
        $this->nisn = null;
        $this->nik = null;
        $this->tempat_lahir = null;
        $this->tanggal_lahir = null;
        $this->nama_ibu_kandung = null;
        $this->jenis_pendaftaran_id = null;
        $this->sudah_diproses = null;
        $this->berhasil_diproses = null;
        $this->peserta_didik_id = null;
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
            if ($this->aPesertaDidik instanceof Persistent) {
              $this->aPesertaDidik->clearAllReferences($deep);
            }
            if ($this->aJenisPendaftaran instanceof Persistent) {
              $this->aJenisPendaftaran->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aTahunAjaran instanceof Persistent) {
              $this->aTahunAjaran->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPesertaDidik = null;
        $this->aJenisPendaftaran = null;
        $this->aSekolah = null;
        $this->aTahunAjaran = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PesertaDidikBaruPeer::DEFAULT_STRING_FORMAT);
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
