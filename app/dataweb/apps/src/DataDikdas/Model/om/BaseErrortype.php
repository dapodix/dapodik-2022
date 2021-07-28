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
use DataDikdas\Model\Errortype;
use DataDikdas\Model\ErrortypePeer;
use DataDikdas\Model\ErrortypeQuery;
use DataDikdas\Model\VldAktPd;
use DataDikdas\Model\VldAktPdQuery;
use DataDikdas\Model\VldAlat;
use DataDikdas\Model\VldAlatQuery;
use DataDikdas\Model\VldAnak;
use DataDikdas\Model\VldAnakQuery;
use DataDikdas\Model\VldAngkutan;
use DataDikdas\Model\VldAngkutanQuery;
use DataDikdas\Model\VldBangunan;
use DataDikdas\Model\VldBangunanQuery;
use DataDikdas\Model\VldBeaPd;
use DataDikdas\Model\VldBeaPdQuery;
use DataDikdas\Model\VldBeaPtk;
use DataDikdas\Model\VldBeaPtkQuery;
use DataDikdas\Model\VldBukuPtk;
use DataDikdas\Model\VldBukuPtkQuery;
use DataDikdas\Model\VldDemografi;
use DataDikdas\Model\VldDemografiQuery;
use DataDikdas\Model\VldDudi;
use DataDikdas\Model\VldDudiQuery;
use DataDikdas\Model\VldInpassing;
use DataDikdas\Model\VldInpassingQuery;
use DataDikdas\Model\VldJurusanSp;
use DataDikdas\Model\VldJurusanSpQuery;
use DataDikdas\Model\VldKaryaTulis;
use DataDikdas\Model\VldKaryaTulisQuery;
use DataDikdas\Model\VldKesejahteraan;
use DataDikdas\Model\VldKesejahteraanQuery;
use DataDikdas\Model\VldMou;
use DataDikdas\Model\VldMouQuery;
use DataDikdas\Model\VldNilaiRapor;
use DataDikdas\Model\VldNilaiRaporQuery;
use DataDikdas\Model\VldNilaiTest;
use DataDikdas\Model\VldNilaiTestQuery;
use DataDikdas\Model\VldNonsekolah;
use DataDikdas\Model\VldNonsekolahQuery;
use DataDikdas\Model\VldPdLong;
use DataDikdas\Model\VldPdLongQuery;
use DataDikdas\Model\VldPembelajaran;
use DataDikdas\Model\VldPembelajaranQuery;
use DataDikdas\Model\VldPenghargaan;
use DataDikdas\Model\VldPenghargaanQuery;
use DataDikdas\Model\VldPesertaDidik;
use DataDikdas\Model\VldPesertaDidikQuery;
use DataDikdas\Model\VldPrestasi;
use DataDikdas\Model\VldPrestasiQuery;
use DataDikdas\Model\VldPtk;
use DataDikdas\Model\VldPtkQuery;
use DataDikdas\Model\VldPtkTerdaftar;
use DataDikdas\Model\VldPtkTerdaftarQuery;
use DataDikdas\Model\VldRegPd;
use DataDikdas\Model\VldRegPdQuery;
use DataDikdas\Model\VldRombel;
use DataDikdas\Model\VldRombelQuery;
use DataDikdas\Model\VldRwyFungsional;
use DataDikdas\Model\VldRwyFungsionalQuery;
use DataDikdas\Model\VldRwyKepangkatan;
use DataDikdas\Model\VldRwyKepangkatanQuery;
use DataDikdas\Model\VldRwyKerja;
use DataDikdas\Model\VldRwyKerjaQuery;
use DataDikdas\Model\VldRwyPendFormal;
use DataDikdas\Model\VldRwyPendFormalQuery;
use DataDikdas\Model\VldRwySertifikasi;
use DataDikdas\Model\VldRwySertifikasiQuery;
use DataDikdas\Model\VldRwyStruktural;
use DataDikdas\Model\VldRwyStrukturalQuery;
use DataDikdas\Model\VldSekolah;
use DataDikdas\Model\VldSekolahQuery;
use DataDikdas\Model\VldTanah;
use DataDikdas\Model\VldTanahQuery;
use DataDikdas\Model\VldTugasTambahan;
use DataDikdas\Model\VldTugasTambahanQuery;
use DataDikdas\Model\VldTunjangan;
use DataDikdas\Model\VldTunjanganQuery;
use DataDikdas\Model\VldUn;
use DataDikdas\Model\VldUnQuery;
use DataDikdas\Model\VldYayasan;
use DataDikdas\Model\VldYayasanQuery;

/**
 * Base class that represents a row from the 'ref.errortype' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseErrortype extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\ErrortypePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ErrortypePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idtype field.
     * @var        int
     */
    protected $idtype;

    /**
     * The value for the kategori_error field.
     * @var        int
     */
    protected $kategori_error;

    /**
     * The value for the keterangan field.
     * @var        string
     */
    protected $keterangan;

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
     * @var        PropelObjectCollection|VldAktPd[] Collection to store aggregation of VldAktPd objects.
     */
    protected $collVldAktPds;
    protected $collVldAktPdsPartial;

    /**
     * @var        PropelObjectCollection|VldAlat[] Collection to store aggregation of VldAlat objects.
     */
    protected $collVldAlats;
    protected $collVldAlatsPartial;

    /**
     * @var        PropelObjectCollection|VldAnak[] Collection to store aggregation of VldAnak objects.
     */
    protected $collVldAnaks;
    protected $collVldAnaksPartial;

    /**
     * @var        PropelObjectCollection|VldAngkutan[] Collection to store aggregation of VldAngkutan objects.
     */
    protected $collVldAngkutans;
    protected $collVldAngkutansPartial;

    /**
     * @var        PropelObjectCollection|VldBangunan[] Collection to store aggregation of VldBangunan objects.
     */
    protected $collVldBangunans;
    protected $collVldBangunansPartial;

    /**
     * @var        PropelObjectCollection|VldBeaPd[] Collection to store aggregation of VldBeaPd objects.
     */
    protected $collVldBeaPds;
    protected $collVldBeaPdsPartial;

    /**
     * @var        PropelObjectCollection|VldBeaPtk[] Collection to store aggregation of VldBeaPtk objects.
     */
    protected $collVldBeaPtks;
    protected $collVldBeaPtksPartial;

    /**
     * @var        PropelObjectCollection|VldBukuPtk[] Collection to store aggregation of VldBukuPtk objects.
     */
    protected $collVldBukuPtks;
    protected $collVldBukuPtksPartial;

    /**
     * @var        PropelObjectCollection|VldDemografi[] Collection to store aggregation of VldDemografi objects.
     */
    protected $collVldDemografis;
    protected $collVldDemografisPartial;

    /**
     * @var        PropelObjectCollection|VldDudi[] Collection to store aggregation of VldDudi objects.
     */
    protected $collVldDudis;
    protected $collVldDudisPartial;

    /**
     * @var        PropelObjectCollection|VldInpassing[] Collection to store aggregation of VldInpassing objects.
     */
    protected $collVldInpassings;
    protected $collVldInpassingsPartial;

    /**
     * @var        PropelObjectCollection|VldJurusanSp[] Collection to store aggregation of VldJurusanSp objects.
     */
    protected $collVldJurusanSps;
    protected $collVldJurusanSpsPartial;

    /**
     * @var        PropelObjectCollection|VldKaryaTulis[] Collection to store aggregation of VldKaryaTulis objects.
     */
    protected $collVldKaryaTuliss;
    protected $collVldKaryaTulissPartial;

    /**
     * @var        PropelObjectCollection|VldKesejahteraan[] Collection to store aggregation of VldKesejahteraan objects.
     */
    protected $collVldKesejahteraans;
    protected $collVldKesejahteraansPartial;

    /**
     * @var        PropelObjectCollection|VldMou[] Collection to store aggregation of VldMou objects.
     */
    protected $collVldMous;
    protected $collVldMousPartial;

    /**
     * @var        PropelObjectCollection|VldNilaiRapor[] Collection to store aggregation of VldNilaiRapor objects.
     */
    protected $collVldNilaiRapors;
    protected $collVldNilaiRaporsPartial;

    /**
     * @var        PropelObjectCollection|VldNilaiTest[] Collection to store aggregation of VldNilaiTest objects.
     */
    protected $collVldNilaiTests;
    protected $collVldNilaiTestsPartial;

    /**
     * @var        PropelObjectCollection|VldNonsekolah[] Collection to store aggregation of VldNonsekolah objects.
     */
    protected $collVldNonsekolahs;
    protected $collVldNonsekolahsPartial;

    /**
     * @var        PropelObjectCollection|VldPdLong[] Collection to store aggregation of VldPdLong objects.
     */
    protected $collVldPdLongs;
    protected $collVldPdLongsPartial;

    /**
     * @var        PropelObjectCollection|VldPembelajaran[] Collection to store aggregation of VldPembelajaran objects.
     */
    protected $collVldPembelajarans;
    protected $collVldPembelajaransPartial;

    /**
     * @var        PropelObjectCollection|VldPenghargaan[] Collection to store aggregation of VldPenghargaan objects.
     */
    protected $collVldPenghargaans;
    protected $collVldPenghargaansPartial;

    /**
     * @var        PropelObjectCollection|VldPesertaDidik[] Collection to store aggregation of VldPesertaDidik objects.
     */
    protected $collVldPesertaDidiks;
    protected $collVldPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|VldPrestasi[] Collection to store aggregation of VldPrestasi objects.
     */
    protected $collVldPrestasis;
    protected $collVldPrestasisPartial;

    /**
     * @var        PropelObjectCollection|VldPtk[] Collection to store aggregation of VldPtk objects.
     */
    protected $collVldPtks;
    protected $collVldPtksPartial;

    /**
     * @var        PropelObjectCollection|VldPtkTerdaftar[] Collection to store aggregation of VldPtkTerdaftar objects.
     */
    protected $collVldPtkTerdaftars;
    protected $collVldPtkTerdaftarsPartial;

    /**
     * @var        PropelObjectCollection|VldRegPd[] Collection to store aggregation of VldRegPd objects.
     */
    protected $collVldRegPds;
    protected $collVldRegPdsPartial;

    /**
     * @var        PropelObjectCollection|VldRombel[] Collection to store aggregation of VldRombel objects.
     */
    protected $collVldRombels;
    protected $collVldRombelsPartial;

    /**
     * @var        PropelObjectCollection|VldRwyFungsional[] Collection to store aggregation of VldRwyFungsional objects.
     */
    protected $collVldRwyFungsionals;
    protected $collVldRwyFungsionalsPartial;

    /**
     * @var        PropelObjectCollection|VldRwyKepangkatan[] Collection to store aggregation of VldRwyKepangkatan objects.
     */
    protected $collVldRwyKepangkatans;
    protected $collVldRwyKepangkatansPartial;

    /**
     * @var        PropelObjectCollection|VldRwyKerja[] Collection to store aggregation of VldRwyKerja objects.
     */
    protected $collVldRwyKerjas;
    protected $collVldRwyKerjasPartial;

    /**
     * @var        PropelObjectCollection|VldRwyPendFormal[] Collection to store aggregation of VldRwyPendFormal objects.
     */
    protected $collVldRwyPendFormals;
    protected $collVldRwyPendFormalsPartial;

    /**
     * @var        PropelObjectCollection|VldRwySertifikasi[] Collection to store aggregation of VldRwySertifikasi objects.
     */
    protected $collVldRwySertifikasis;
    protected $collVldRwySertifikasisPartial;

    /**
     * @var        PropelObjectCollection|VldRwyStruktural[] Collection to store aggregation of VldRwyStruktural objects.
     */
    protected $collVldRwyStrukturals;
    protected $collVldRwyStrukturalsPartial;

    /**
     * @var        PropelObjectCollection|VldSekolah[] Collection to store aggregation of VldSekolah objects.
     */
    protected $collVldSekolahs;
    protected $collVldSekolahsPartial;

    /**
     * @var        PropelObjectCollection|VldTanah[] Collection to store aggregation of VldTanah objects.
     */
    protected $collVldTanahs;
    protected $collVldTanahsPartial;

    /**
     * @var        PropelObjectCollection|VldTugasTambahan[] Collection to store aggregation of VldTugasTambahan objects.
     */
    protected $collVldTugasTambahans;
    protected $collVldTugasTambahansPartial;

    /**
     * @var        PropelObjectCollection|VldTunjangan[] Collection to store aggregation of VldTunjangan objects.
     */
    protected $collVldTunjangans;
    protected $collVldTunjangansPartial;

    /**
     * @var        PropelObjectCollection|VldUn[] Collection to store aggregation of VldUn objects.
     */
    protected $collVldUns;
    protected $collVldUnsPartial;

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
    protected $vldAktPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldAlatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldAnaksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldAngkutansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldBangunansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldBeaPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldBeaPtksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldBukuPtksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldDemografisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldDudisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldInpassingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldJurusanSpsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldKaryaTulissScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldKesejahteraansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldMousScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldNilaiRaporsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldNilaiTestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldNonsekolahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPdLongsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPembelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPenghargaansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPrestasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPtksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPtkTerdaftarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRegPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRombelsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRwyFungsionalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRwyKepangkatansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRwyKerjasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRwyPendFormalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRwySertifikasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldRwyStrukturalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldSekolahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldTanahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldTugasTambahansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldTunjangansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldUnsScheduledForDeletion = null;

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
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseErrortype object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idtype] column value.
     * 
     * @return int
     */
    public function getIdtype()
    {
        return $this->idtype;
    }

    /**
     * Get the [kategori_error] column value.
     * 
     * @return int
     */
    public function getKategoriError()
    {
        return $this->kategori_error;
    }

    /**
     * Get the [keterangan] column value.
     * 
     * @return string
     */
    public function getKeterangan()
    {
        return $this->keterangan;
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
     * Set the value of [idtype] column.
     * 
     * @param int $v new value
     * @return Errortype The current object (for fluent API support)
     */
    public function setIdtype($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idtype !== $v) {
            $this->idtype = $v;
            $this->modifiedColumns[] = ErrortypePeer::IDTYPE;
        }


        return $this;
    } // setIdtype()

    /**
     * Set the value of [kategori_error] column.
     * 
     * @param int $v new value
     * @return Errortype The current object (for fluent API support)
     */
    public function setKategoriError($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kategori_error !== $v) {
            $this->kategori_error = $v;
            $this->modifiedColumns[] = ErrortypePeer::KATEGORI_ERROR;
        }


        return $this;
    } // setKategoriError()

    /**
     * Set the value of [keterangan] column.
     * 
     * @param string $v new value
     * @return Errortype The current object (for fluent API support)
     */
    public function setKeterangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keterangan !== $v) {
            $this->keterangan = $v;
            $this->modifiedColumns[] = ErrortypePeer::KETERANGAN;
        }


        return $this;
    } // setKeterangan()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Errortype The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = ErrortypePeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Errortype The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = ErrortypePeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Errortype The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = ErrortypePeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Errortype The current object (for fluent API support)
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
                $this->modifiedColumns[] = ErrortypePeer::LAST_SYNC;
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

            $this->idtype = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->kategori_error = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->keterangan = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->create_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->last_update = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->expired_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_sync = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = ErrortypePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Errortype object", $e);
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
            $con = Propel::getConnection(ErrortypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ErrortypePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collVldAktPds = null;

            $this->collVldAlats = null;

            $this->collVldAnaks = null;

            $this->collVldAngkutans = null;

            $this->collVldBangunans = null;

            $this->collVldBeaPds = null;

            $this->collVldBeaPtks = null;

            $this->collVldBukuPtks = null;

            $this->collVldDemografis = null;

            $this->collVldDudis = null;

            $this->collVldInpassings = null;

            $this->collVldJurusanSps = null;

            $this->collVldKaryaTuliss = null;

            $this->collVldKesejahteraans = null;

            $this->collVldMous = null;

            $this->collVldNilaiRapors = null;

            $this->collVldNilaiTests = null;

            $this->collVldNonsekolahs = null;

            $this->collVldPdLongs = null;

            $this->collVldPembelajarans = null;

            $this->collVldPenghargaans = null;

            $this->collVldPesertaDidiks = null;

            $this->collVldPrestasis = null;

            $this->collVldPtks = null;

            $this->collVldPtkTerdaftars = null;

            $this->collVldRegPds = null;

            $this->collVldRombels = null;

            $this->collVldRwyFungsionals = null;

            $this->collVldRwyKepangkatans = null;

            $this->collVldRwyKerjas = null;

            $this->collVldRwyPendFormals = null;

            $this->collVldRwySertifikasis = null;

            $this->collVldRwyStrukturals = null;

            $this->collVldSekolahs = null;

            $this->collVldTanahs = null;

            $this->collVldTugasTambahans = null;

            $this->collVldTunjangans = null;

            $this->collVldUns = null;

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
            $con = Propel::getConnection(ErrortypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ErrortypeQuery::create()
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
            $con = Propel::getConnection(ErrortypePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ErrortypePeer::addInstanceToPool($this);
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

            if ($this->vldAktPdsScheduledForDeletion !== null) {
                if (!$this->vldAktPdsScheduledForDeletion->isEmpty()) {
                    VldAktPdQuery::create()
                        ->filterByPrimaryKeys($this->vldAktPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldAktPdsScheduledForDeletion = null;
                }
            }

            if ($this->collVldAktPds !== null) {
                foreach ($this->collVldAktPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldAlatsScheduledForDeletion !== null) {
                if (!$this->vldAlatsScheduledForDeletion->isEmpty()) {
                    VldAlatQuery::create()
                        ->filterByPrimaryKeys($this->vldAlatsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldAlatsScheduledForDeletion = null;
                }
            }

            if ($this->collVldAlats !== null) {
                foreach ($this->collVldAlats as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldAnaksScheduledForDeletion !== null) {
                if (!$this->vldAnaksScheduledForDeletion->isEmpty()) {
                    VldAnakQuery::create()
                        ->filterByPrimaryKeys($this->vldAnaksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldAnaksScheduledForDeletion = null;
                }
            }

            if ($this->collVldAnaks !== null) {
                foreach ($this->collVldAnaks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldAngkutansScheduledForDeletion !== null) {
                if (!$this->vldAngkutansScheduledForDeletion->isEmpty()) {
                    VldAngkutanQuery::create()
                        ->filterByPrimaryKeys($this->vldAngkutansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldAngkutansScheduledForDeletion = null;
                }
            }

            if ($this->collVldAngkutans !== null) {
                foreach ($this->collVldAngkutans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldBangunansScheduledForDeletion !== null) {
                if (!$this->vldBangunansScheduledForDeletion->isEmpty()) {
                    VldBangunanQuery::create()
                        ->filterByPrimaryKeys($this->vldBangunansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldBangunansScheduledForDeletion = null;
                }
            }

            if ($this->collVldBangunans !== null) {
                foreach ($this->collVldBangunans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldBeaPdsScheduledForDeletion !== null) {
                if (!$this->vldBeaPdsScheduledForDeletion->isEmpty()) {
                    VldBeaPdQuery::create()
                        ->filterByPrimaryKeys($this->vldBeaPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldBeaPdsScheduledForDeletion = null;
                }
            }

            if ($this->collVldBeaPds !== null) {
                foreach ($this->collVldBeaPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldBeaPtksScheduledForDeletion !== null) {
                if (!$this->vldBeaPtksScheduledForDeletion->isEmpty()) {
                    VldBeaPtkQuery::create()
                        ->filterByPrimaryKeys($this->vldBeaPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldBeaPtksScheduledForDeletion = null;
                }
            }

            if ($this->collVldBeaPtks !== null) {
                foreach ($this->collVldBeaPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldBukuPtksScheduledForDeletion !== null) {
                if (!$this->vldBukuPtksScheduledForDeletion->isEmpty()) {
                    VldBukuPtkQuery::create()
                        ->filterByPrimaryKeys($this->vldBukuPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldBukuPtksScheduledForDeletion = null;
                }
            }

            if ($this->collVldBukuPtks !== null) {
                foreach ($this->collVldBukuPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldDemografisScheduledForDeletion !== null) {
                if (!$this->vldDemografisScheduledForDeletion->isEmpty()) {
                    VldDemografiQuery::create()
                        ->filterByPrimaryKeys($this->vldDemografisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldDemografisScheduledForDeletion = null;
                }
            }

            if ($this->collVldDemografis !== null) {
                foreach ($this->collVldDemografis as $referrerFK) {
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

            if ($this->vldInpassingsScheduledForDeletion !== null) {
                if (!$this->vldInpassingsScheduledForDeletion->isEmpty()) {
                    VldInpassingQuery::create()
                        ->filterByPrimaryKeys($this->vldInpassingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldInpassingsScheduledForDeletion = null;
                }
            }

            if ($this->collVldInpassings !== null) {
                foreach ($this->collVldInpassings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldJurusanSpsScheduledForDeletion !== null) {
                if (!$this->vldJurusanSpsScheduledForDeletion->isEmpty()) {
                    VldJurusanSpQuery::create()
                        ->filterByPrimaryKeys($this->vldJurusanSpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldJurusanSpsScheduledForDeletion = null;
                }
            }

            if ($this->collVldJurusanSps !== null) {
                foreach ($this->collVldJurusanSps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldKaryaTulissScheduledForDeletion !== null) {
                if (!$this->vldKaryaTulissScheduledForDeletion->isEmpty()) {
                    VldKaryaTulisQuery::create()
                        ->filterByPrimaryKeys($this->vldKaryaTulissScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldKaryaTulissScheduledForDeletion = null;
                }
            }

            if ($this->collVldKaryaTuliss !== null) {
                foreach ($this->collVldKaryaTuliss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldKesejahteraansScheduledForDeletion !== null) {
                if (!$this->vldKesejahteraansScheduledForDeletion->isEmpty()) {
                    VldKesejahteraanQuery::create()
                        ->filterByPrimaryKeys($this->vldKesejahteraansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldKesejahteraansScheduledForDeletion = null;
                }
            }

            if ($this->collVldKesejahteraans !== null) {
                foreach ($this->collVldKesejahteraans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldMousScheduledForDeletion !== null) {
                if (!$this->vldMousScheduledForDeletion->isEmpty()) {
                    VldMouQuery::create()
                        ->filterByPrimaryKeys($this->vldMousScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldMousScheduledForDeletion = null;
                }
            }

            if ($this->collVldMous !== null) {
                foreach ($this->collVldMous as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldNilaiRaporsScheduledForDeletion !== null) {
                if (!$this->vldNilaiRaporsScheduledForDeletion->isEmpty()) {
                    VldNilaiRaporQuery::create()
                        ->filterByPrimaryKeys($this->vldNilaiRaporsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldNilaiRaporsScheduledForDeletion = null;
                }
            }

            if ($this->collVldNilaiRapors !== null) {
                foreach ($this->collVldNilaiRapors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldNilaiTestsScheduledForDeletion !== null) {
                if (!$this->vldNilaiTestsScheduledForDeletion->isEmpty()) {
                    VldNilaiTestQuery::create()
                        ->filterByPrimaryKeys($this->vldNilaiTestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldNilaiTestsScheduledForDeletion = null;
                }
            }

            if ($this->collVldNilaiTests !== null) {
                foreach ($this->collVldNilaiTests as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldNonsekolahsScheduledForDeletion !== null) {
                if (!$this->vldNonsekolahsScheduledForDeletion->isEmpty()) {
                    VldNonsekolahQuery::create()
                        ->filterByPrimaryKeys($this->vldNonsekolahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldNonsekolahsScheduledForDeletion = null;
                }
            }

            if ($this->collVldNonsekolahs !== null) {
                foreach ($this->collVldNonsekolahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->vldPembelajaransScheduledForDeletion !== null) {
                if (!$this->vldPembelajaransScheduledForDeletion->isEmpty()) {
                    VldPembelajaranQuery::create()
                        ->filterByPrimaryKeys($this->vldPembelajaransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPembelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collVldPembelajarans !== null) {
                foreach ($this->collVldPembelajarans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPenghargaansScheduledForDeletion !== null) {
                if (!$this->vldPenghargaansScheduledForDeletion->isEmpty()) {
                    VldPenghargaanQuery::create()
                        ->filterByPrimaryKeys($this->vldPenghargaansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPenghargaansScheduledForDeletion = null;
                }
            }

            if ($this->collVldPenghargaans !== null) {
                foreach ($this->collVldPenghargaans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPesertaDidiksScheduledForDeletion !== null) {
                if (!$this->vldPesertaDidiksScheduledForDeletion->isEmpty()) {
                    VldPesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->vldPesertaDidiksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collVldPesertaDidiks !== null) {
                foreach ($this->collVldPesertaDidiks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPrestasisScheduledForDeletion !== null) {
                if (!$this->vldPrestasisScheduledForDeletion->isEmpty()) {
                    VldPrestasiQuery::create()
                        ->filterByPrimaryKeys($this->vldPrestasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPrestasisScheduledForDeletion = null;
                }
            }

            if ($this->collVldPrestasis !== null) {
                foreach ($this->collVldPrestasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPtksScheduledForDeletion !== null) {
                if (!$this->vldPtksScheduledForDeletion->isEmpty()) {
                    VldPtkQuery::create()
                        ->filterByPrimaryKeys($this->vldPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPtksScheduledForDeletion = null;
                }
            }

            if ($this->collVldPtks !== null) {
                foreach ($this->collVldPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPtkTerdaftarsScheduledForDeletion !== null) {
                if (!$this->vldPtkTerdaftarsScheduledForDeletion->isEmpty()) {
                    VldPtkTerdaftarQuery::create()
                        ->filterByPrimaryKeys($this->vldPtkTerdaftarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPtkTerdaftarsScheduledForDeletion = null;
                }
            }

            if ($this->collVldPtkTerdaftars !== null) {
                foreach ($this->collVldPtkTerdaftars as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRegPdsScheduledForDeletion !== null) {
                if (!$this->vldRegPdsScheduledForDeletion->isEmpty()) {
                    VldRegPdQuery::create()
                        ->filterByPrimaryKeys($this->vldRegPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRegPdsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRegPds !== null) {
                foreach ($this->collVldRegPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRombelsScheduledForDeletion !== null) {
                if (!$this->vldRombelsScheduledForDeletion->isEmpty()) {
                    VldRombelQuery::create()
                        ->filterByPrimaryKeys($this->vldRombelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRombelsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRombels !== null) {
                foreach ($this->collVldRombels as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRwyFungsionalsScheduledForDeletion !== null) {
                if (!$this->vldRwyFungsionalsScheduledForDeletion->isEmpty()) {
                    VldRwyFungsionalQuery::create()
                        ->filterByPrimaryKeys($this->vldRwyFungsionalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwyFungsionalsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwyFungsionals !== null) {
                foreach ($this->collVldRwyFungsionals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRwyKepangkatansScheduledForDeletion !== null) {
                if (!$this->vldRwyKepangkatansScheduledForDeletion->isEmpty()) {
                    VldRwyKepangkatanQuery::create()
                        ->filterByPrimaryKeys($this->vldRwyKepangkatansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwyKepangkatansScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwyKepangkatans !== null) {
                foreach ($this->collVldRwyKepangkatans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->vldRwyPendFormalsScheduledForDeletion !== null) {
                if (!$this->vldRwyPendFormalsScheduledForDeletion->isEmpty()) {
                    VldRwyPendFormalQuery::create()
                        ->filterByPrimaryKeys($this->vldRwyPendFormalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwyPendFormalsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwyPendFormals !== null) {
                foreach ($this->collVldRwyPendFormals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRwySertifikasisScheduledForDeletion !== null) {
                if (!$this->vldRwySertifikasisScheduledForDeletion->isEmpty()) {
                    VldRwySertifikasiQuery::create()
                        ->filterByPrimaryKeys($this->vldRwySertifikasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwySertifikasisScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwySertifikasis !== null) {
                foreach ($this->collVldRwySertifikasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldRwyStrukturalsScheduledForDeletion !== null) {
                if (!$this->vldRwyStrukturalsScheduledForDeletion->isEmpty()) {
                    VldRwyStrukturalQuery::create()
                        ->filterByPrimaryKeys($this->vldRwyStrukturalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwyStrukturalsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwyStrukturals !== null) {
                foreach ($this->collVldRwyStrukturals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldSekolahsScheduledForDeletion !== null) {
                if (!$this->vldSekolahsScheduledForDeletion->isEmpty()) {
                    VldSekolahQuery::create()
                        ->filterByPrimaryKeys($this->vldSekolahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldSekolahsScheduledForDeletion = null;
                }
            }

            if ($this->collVldSekolahs !== null) {
                foreach ($this->collVldSekolahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldTanahsScheduledForDeletion !== null) {
                if (!$this->vldTanahsScheduledForDeletion->isEmpty()) {
                    VldTanahQuery::create()
                        ->filterByPrimaryKeys($this->vldTanahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldTanahsScheduledForDeletion = null;
                }
            }

            if ($this->collVldTanahs !== null) {
                foreach ($this->collVldTanahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldTugasTambahansScheduledForDeletion !== null) {
                if (!$this->vldTugasTambahansScheduledForDeletion->isEmpty()) {
                    VldTugasTambahanQuery::create()
                        ->filterByPrimaryKeys($this->vldTugasTambahansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldTugasTambahansScheduledForDeletion = null;
                }
            }

            if ($this->collVldTugasTambahans !== null) {
                foreach ($this->collVldTugasTambahans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldTunjangansScheduledForDeletion !== null) {
                if (!$this->vldTunjangansScheduledForDeletion->isEmpty()) {
                    VldTunjanganQuery::create()
                        ->filterByPrimaryKeys($this->vldTunjangansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldTunjangansScheduledForDeletion = null;
                }
            }

            if ($this->collVldTunjangans !== null) {
                foreach ($this->collVldTunjangans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldUnsScheduledForDeletion !== null) {
                if (!$this->vldUnsScheduledForDeletion->isEmpty()) {
                    VldUnQuery::create()
                        ->filterByPrimaryKeys($this->vldUnsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldUnsScheduledForDeletion = null;
                }
            }

            if ($this->collVldUns !== null) {
                foreach ($this->collVldUns as $referrerFK) {
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
        if ($this->isColumnModified(ErrortypePeer::IDTYPE)) {
            $modifiedColumns[':p' . $index++]  = '"idtype"';
        }
        if ($this->isColumnModified(ErrortypePeer::KATEGORI_ERROR)) {
            $modifiedColumns[':p' . $index++]  = '"kategori_error"';
        }
        if ($this->isColumnModified(ErrortypePeer::KETERANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"keterangan"';
        }
        if ($this->isColumnModified(ErrortypePeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(ErrortypePeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(ErrortypePeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(ErrortypePeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."errortype" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"idtype"':						
                        $stmt->bindValue($identifier, $this->idtype, PDO::PARAM_INT);
                        break;
                    case '"kategori_error"':						
                        $stmt->bindValue($identifier, $this->kategori_error, PDO::PARAM_INT);
                        break;
                    case '"keterangan"':						
                        $stmt->bindValue($identifier, $this->keterangan, PDO::PARAM_STR);
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


            if (($retval = ErrortypePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldAktPds !== null) {
                    foreach ($this->collVldAktPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldAlats !== null) {
                    foreach ($this->collVldAlats as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldAnaks !== null) {
                    foreach ($this->collVldAnaks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldAngkutans !== null) {
                    foreach ($this->collVldAngkutans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldBangunans !== null) {
                    foreach ($this->collVldBangunans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldBeaPds !== null) {
                    foreach ($this->collVldBeaPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldBeaPtks !== null) {
                    foreach ($this->collVldBeaPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldBukuPtks !== null) {
                    foreach ($this->collVldBukuPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldDemografis !== null) {
                    foreach ($this->collVldDemografis as $referrerFK) {
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

                if ($this->collVldInpassings !== null) {
                    foreach ($this->collVldInpassings as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldJurusanSps !== null) {
                    foreach ($this->collVldJurusanSps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldKaryaTuliss !== null) {
                    foreach ($this->collVldKaryaTuliss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldKesejahteraans !== null) {
                    foreach ($this->collVldKesejahteraans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldMous !== null) {
                    foreach ($this->collVldMous as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldNilaiRapors !== null) {
                    foreach ($this->collVldNilaiRapors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldNilaiTests !== null) {
                    foreach ($this->collVldNilaiTests as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldNonsekolahs !== null) {
                    foreach ($this->collVldNonsekolahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPdLongs !== null) {
                    foreach ($this->collVldPdLongs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPembelajarans !== null) {
                    foreach ($this->collVldPembelajarans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPenghargaans !== null) {
                    foreach ($this->collVldPenghargaans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPesertaDidiks !== null) {
                    foreach ($this->collVldPesertaDidiks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPrestasis !== null) {
                    foreach ($this->collVldPrestasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPtks !== null) {
                    foreach ($this->collVldPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPtkTerdaftars !== null) {
                    foreach ($this->collVldPtkTerdaftars as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRegPds !== null) {
                    foreach ($this->collVldRegPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRombels !== null) {
                    foreach ($this->collVldRombels as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRwyFungsionals !== null) {
                    foreach ($this->collVldRwyFungsionals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRwyKepangkatans !== null) {
                    foreach ($this->collVldRwyKepangkatans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRwyKerjas !== null) {
                    foreach ($this->collVldRwyKerjas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRwyPendFormals !== null) {
                    foreach ($this->collVldRwyPendFormals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRwySertifikasis !== null) {
                    foreach ($this->collVldRwySertifikasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldRwyStrukturals !== null) {
                    foreach ($this->collVldRwyStrukturals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldSekolahs !== null) {
                    foreach ($this->collVldSekolahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldTanahs !== null) {
                    foreach ($this->collVldTanahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldTugasTambahans !== null) {
                    foreach ($this->collVldTugasTambahans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldTunjangans !== null) {
                    foreach ($this->collVldTunjangans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldUns !== null) {
                    foreach ($this->collVldUns as $referrerFK) {
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
        $pos = ErrortypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdtype();
                break;
            case 1:
                return $this->getKategoriError();
                break;
            case 2:
                return $this->getKeterangan();
                break;
            case 3:
                return $this->getCreateDate();
                break;
            case 4:
                return $this->getLastUpdate();
                break;
            case 5:
                return $this->getExpiredDate();
                break;
            case 6:
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
        if (isset($alreadyDumpedObjects['Errortype'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Errortype'][$this->getPrimaryKey()] = true;
        $keys = ErrortypePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdtype(),
            $keys[1] => $this->getKategoriError(),
            $keys[2] => $this->getKeterangan(),
            $keys[3] => $this->getCreateDate(),
            $keys[4] => $this->getLastUpdate(),
            $keys[5] => $this->getExpiredDate(),
            $keys[6] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collVldAktPds) {
                $result['VldAktPds'] = $this->collVldAktPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldAlats) {
                $result['VldAlats'] = $this->collVldAlats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldAnaks) {
                $result['VldAnaks'] = $this->collVldAnaks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldAngkutans) {
                $result['VldAngkutans'] = $this->collVldAngkutans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldBangunans) {
                $result['VldBangunans'] = $this->collVldBangunans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldBeaPds) {
                $result['VldBeaPds'] = $this->collVldBeaPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldBeaPtks) {
                $result['VldBeaPtks'] = $this->collVldBeaPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldBukuPtks) {
                $result['VldBukuPtks'] = $this->collVldBukuPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldDemografis) {
                $result['VldDemografis'] = $this->collVldDemografis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldDudis) {
                $result['VldDudis'] = $this->collVldDudis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldInpassings) {
                $result['VldInpassings'] = $this->collVldInpassings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldJurusanSps) {
                $result['VldJurusanSps'] = $this->collVldJurusanSps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldKaryaTuliss) {
                $result['VldKaryaTuliss'] = $this->collVldKaryaTuliss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldKesejahteraans) {
                $result['VldKesejahteraans'] = $this->collVldKesejahteraans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldMous) {
                $result['VldMous'] = $this->collVldMous->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldNilaiRapors) {
                $result['VldNilaiRapors'] = $this->collVldNilaiRapors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldNilaiTests) {
                $result['VldNilaiTests'] = $this->collVldNilaiTests->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldNonsekolahs) {
                $result['VldNonsekolahs'] = $this->collVldNonsekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPdLongs) {
                $result['VldPdLongs'] = $this->collVldPdLongs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPembelajarans) {
                $result['VldPembelajarans'] = $this->collVldPembelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPenghargaans) {
                $result['VldPenghargaans'] = $this->collVldPenghargaans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPesertaDidiks) {
                $result['VldPesertaDidiks'] = $this->collVldPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPrestasis) {
                $result['VldPrestasis'] = $this->collVldPrestasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPtks) {
                $result['VldPtks'] = $this->collVldPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPtkTerdaftars) {
                $result['VldPtkTerdaftars'] = $this->collVldPtkTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRegPds) {
                $result['VldRegPds'] = $this->collVldRegPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRombels) {
                $result['VldRombels'] = $this->collVldRombels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRwyFungsionals) {
                $result['VldRwyFungsionals'] = $this->collVldRwyFungsionals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRwyKepangkatans) {
                $result['VldRwyKepangkatans'] = $this->collVldRwyKepangkatans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRwyKerjas) {
                $result['VldRwyKerjas'] = $this->collVldRwyKerjas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRwyPendFormals) {
                $result['VldRwyPendFormals'] = $this->collVldRwyPendFormals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRwySertifikasis) {
                $result['VldRwySertifikasis'] = $this->collVldRwySertifikasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldRwyStrukturals) {
                $result['VldRwyStrukturals'] = $this->collVldRwyStrukturals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldSekolahs) {
                $result['VldSekolahs'] = $this->collVldSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldTanahs) {
                $result['VldTanahs'] = $this->collVldTanahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldTugasTambahans) {
                $result['VldTugasTambahans'] = $this->collVldTugasTambahans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldTunjangans) {
                $result['VldTunjangans'] = $this->collVldTunjangans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldUns) {
                $result['VldUns'] = $this->collVldUns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ErrortypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdtype($value);
                break;
            case 1:
                $this->setKategoriError($value);
                break;
            case 2:
                $this->setKeterangan($value);
                break;
            case 3:
                $this->setCreateDate($value);
                break;
            case 4:
                $this->setLastUpdate($value);
                break;
            case 5:
                $this->setExpiredDate($value);
                break;
            case 6:
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
        $keys = ErrortypePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdtype($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKategoriError($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKeterangan($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCreateDate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLastUpdate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setExpiredDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastSync($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ErrortypePeer::DATABASE_NAME);

        if ($this->isColumnModified(ErrortypePeer::IDTYPE)) $criteria->add(ErrortypePeer::IDTYPE, $this->idtype);
        if ($this->isColumnModified(ErrortypePeer::KATEGORI_ERROR)) $criteria->add(ErrortypePeer::KATEGORI_ERROR, $this->kategori_error);
        if ($this->isColumnModified(ErrortypePeer::KETERANGAN)) $criteria->add(ErrortypePeer::KETERANGAN, $this->keterangan);
        if ($this->isColumnModified(ErrortypePeer::CREATE_DATE)) $criteria->add(ErrortypePeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(ErrortypePeer::LAST_UPDATE)) $criteria->add(ErrortypePeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(ErrortypePeer::EXPIRED_DATE)) $criteria->add(ErrortypePeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(ErrortypePeer::LAST_SYNC)) $criteria->add(ErrortypePeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(ErrortypePeer::DATABASE_NAME);
        $criteria->add(ErrortypePeer::IDTYPE, $this->idtype);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdtype();
    }

    /**
     * Generic method to set the primary key (idtype column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdtype($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdtype();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Errortype (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKategoriError($this->getKategoriError());
        $copyObj->setKeterangan($this->getKeterangan());
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

            foreach ($this->getVldAktPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldAktPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldAlats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldAlat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldAnaks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldAnak($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldAngkutans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldAngkutan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldBangunans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldBangunan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldBeaPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldBeaPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldBeaPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldBeaPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldBukuPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldBukuPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldDemografis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldDemografi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldDudis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldDudi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldInpassings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldInpassing($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldJurusanSps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldJurusanSp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldKaryaTuliss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldKaryaTulis($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldKesejahteraans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldKesejahteraan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldMous() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldMou($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldNilaiRapors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldNilaiRapor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldNilaiTests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldNilaiTest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldNonsekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldNonsekolah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPdLongs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPdLong($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPembelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPembelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPenghargaans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPenghargaan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPrestasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPrestasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPtkTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPtkTerdaftar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRegPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRegPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRombels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRombel($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRwyFungsionals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyFungsional($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRwyKepangkatans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyKepangkatan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRwyKerjas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyKerja($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRwyPendFormals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyPendFormal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRwySertifikasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwySertifikasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldRwyStrukturals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyStruktural($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldSekolah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldTanahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldTanah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldTugasTambahans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldTugasTambahan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldTunjangans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldTunjangan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldUns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldUn($relObj->copy($deepCopy));
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
            $copyObj->setIdtype(NULL); // this is a auto-increment column, so set to default value
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
     * @return Errortype Clone of current object.
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
     * @return ErrortypePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ErrortypePeer();
        }

        return self::$peer;
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
        if ('VldAktPd' == $relationName) {
            $this->initVldAktPds();
        }
        if ('VldAlat' == $relationName) {
            $this->initVldAlats();
        }
        if ('VldAnak' == $relationName) {
            $this->initVldAnaks();
        }
        if ('VldAngkutan' == $relationName) {
            $this->initVldAngkutans();
        }
        if ('VldBangunan' == $relationName) {
            $this->initVldBangunans();
        }
        if ('VldBeaPd' == $relationName) {
            $this->initVldBeaPds();
        }
        if ('VldBeaPtk' == $relationName) {
            $this->initVldBeaPtks();
        }
        if ('VldBukuPtk' == $relationName) {
            $this->initVldBukuPtks();
        }
        if ('VldDemografi' == $relationName) {
            $this->initVldDemografis();
        }
        if ('VldDudi' == $relationName) {
            $this->initVldDudis();
        }
        if ('VldInpassing' == $relationName) {
            $this->initVldInpassings();
        }
        if ('VldJurusanSp' == $relationName) {
            $this->initVldJurusanSps();
        }
        if ('VldKaryaTulis' == $relationName) {
            $this->initVldKaryaTuliss();
        }
        if ('VldKesejahteraan' == $relationName) {
            $this->initVldKesejahteraans();
        }
        if ('VldMou' == $relationName) {
            $this->initVldMous();
        }
        if ('VldNilaiRapor' == $relationName) {
            $this->initVldNilaiRapors();
        }
        if ('VldNilaiTest' == $relationName) {
            $this->initVldNilaiTests();
        }
        if ('VldNonsekolah' == $relationName) {
            $this->initVldNonsekolahs();
        }
        if ('VldPdLong' == $relationName) {
            $this->initVldPdLongs();
        }
        if ('VldPembelajaran' == $relationName) {
            $this->initVldPembelajarans();
        }
        if ('VldPenghargaan' == $relationName) {
            $this->initVldPenghargaans();
        }
        if ('VldPesertaDidik' == $relationName) {
            $this->initVldPesertaDidiks();
        }
        if ('VldPrestasi' == $relationName) {
            $this->initVldPrestasis();
        }
        if ('VldPtk' == $relationName) {
            $this->initVldPtks();
        }
        if ('VldPtkTerdaftar' == $relationName) {
            $this->initVldPtkTerdaftars();
        }
        if ('VldRegPd' == $relationName) {
            $this->initVldRegPds();
        }
        if ('VldRombel' == $relationName) {
            $this->initVldRombels();
        }
        if ('VldRwyFungsional' == $relationName) {
            $this->initVldRwyFungsionals();
        }
        if ('VldRwyKepangkatan' == $relationName) {
            $this->initVldRwyKepangkatans();
        }
        if ('VldRwyKerja' == $relationName) {
            $this->initVldRwyKerjas();
        }
        if ('VldRwyPendFormal' == $relationName) {
            $this->initVldRwyPendFormals();
        }
        if ('VldRwySertifikasi' == $relationName) {
            $this->initVldRwySertifikasis();
        }
        if ('VldRwyStruktural' == $relationName) {
            $this->initVldRwyStrukturals();
        }
        if ('VldSekolah' == $relationName) {
            $this->initVldSekolahs();
        }
        if ('VldTanah' == $relationName) {
            $this->initVldTanahs();
        }
        if ('VldTugasTambahan' == $relationName) {
            $this->initVldTugasTambahans();
        }
        if ('VldTunjangan' == $relationName) {
            $this->initVldTunjangans();
        }
        if ('VldUn' == $relationName) {
            $this->initVldUns();
        }
        if ('VldYayasan' == $relationName) {
            $this->initVldYayasans();
        }
    }

    /**
     * Clears out the collVldAktPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldAktPds()
     */
    public function clearVldAktPds()
    {
        $this->collVldAktPds = null; // important to set this to null since that means it is uninitialized
        $this->collVldAktPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldAktPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldAktPds($v = true)
    {
        $this->collVldAktPdsPartial = $v;
    }

    /**
     * Initializes the collVldAktPds collection.
     *
     * By default this just sets the collVldAktPds collection to an empty array (like clearcollVldAktPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldAktPds($overrideExisting = true)
    {
        if (null !== $this->collVldAktPds && !$overrideExisting) {
            return;
        }
        $this->collVldAktPds = new PropelObjectCollection();
        $this->collVldAktPds->setModel('VldAktPd');
    }

    /**
     * Gets an array of VldAktPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldAktPd[] List of VldAktPd objects
     * @throws PropelException
     */
    public function getVldAktPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldAktPdsPartial && !$this->isNew();
        if (null === $this->collVldAktPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldAktPds) {
                // return empty collection
                $this->initVldAktPds();
            } else {
                $collVldAktPds = VldAktPdQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldAktPdsPartial && count($collVldAktPds)) {
                      $this->initVldAktPds(false);

                      foreach($collVldAktPds as $obj) {
                        if (false == $this->collVldAktPds->contains($obj)) {
                          $this->collVldAktPds->append($obj);
                        }
                      }

                      $this->collVldAktPdsPartial = true;
                    }

                    $collVldAktPds->getInternalIterator()->rewind();
                    return $collVldAktPds;
                }

                if($partial && $this->collVldAktPds) {
                    foreach($this->collVldAktPds as $obj) {
                        if($obj->isNew()) {
                            $collVldAktPds[] = $obj;
                        }
                    }
                }

                $this->collVldAktPds = $collVldAktPds;
                $this->collVldAktPdsPartial = false;
            }
        }

        return $this->collVldAktPds;
    }

    /**
     * Sets a collection of VldAktPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldAktPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldAktPds(PropelCollection $vldAktPds, PropelPDO $con = null)
    {
        $vldAktPdsToDelete = $this->getVldAktPds(new Criteria(), $con)->diff($vldAktPds);

        $this->vldAktPdsScheduledForDeletion = unserialize(serialize($vldAktPdsToDelete));

        foreach ($vldAktPdsToDelete as $vldAktPdRemoved) {
            $vldAktPdRemoved->setErrortype(null);
        }

        $this->collVldAktPds = null;
        foreach ($vldAktPds as $vldAktPd) {
            $this->addVldAktPd($vldAktPd);
        }

        $this->collVldAktPds = $vldAktPds;
        $this->collVldAktPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldAktPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldAktPd objects.
     * @throws PropelException
     */
    public function countVldAktPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldAktPdsPartial && !$this->isNew();
        if (null === $this->collVldAktPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldAktPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldAktPds());
            }
            $query = VldAktPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldAktPds);
    }

    /**
     * Method called to associate a VldAktPd object to this object
     * through the VldAktPd foreign key attribute.
     *
     * @param    VldAktPd $l VldAktPd
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldAktPd(VldAktPd $l)
    {
        if ($this->collVldAktPds === null) {
            $this->initVldAktPds();
            $this->collVldAktPdsPartial = true;
        }
        if (!in_array($l, $this->collVldAktPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldAktPd($l);
        }

        return $this;
    }

    /**
     * @param	VldAktPd $vldAktPd The vldAktPd object to add.
     */
    protected function doAddVldAktPd($vldAktPd)
    {
        $this->collVldAktPds[]= $vldAktPd;
        $vldAktPd->setErrortype($this);
    }

    /**
     * @param	VldAktPd $vldAktPd The vldAktPd object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldAktPd($vldAktPd)
    {
        if ($this->getVldAktPds()->contains($vldAktPd)) {
            $this->collVldAktPds->remove($this->collVldAktPds->search($vldAktPd));
            if (null === $this->vldAktPdsScheduledForDeletion) {
                $this->vldAktPdsScheduledForDeletion = clone $this->collVldAktPds;
                $this->vldAktPdsScheduledForDeletion->clear();
            }
            $this->vldAktPdsScheduledForDeletion[]= clone $vldAktPd;
            $vldAktPd->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldAktPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldAktPd[] List of VldAktPd objects
     */
    public function getVldAktPdsJoinAktPd($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldAktPdQuery::create(null, $criteria);
        $query->joinWith('AktPd', $join_behavior);

        return $this->getVldAktPds($query, $con);
    }

    /**
     * Clears out the collVldAlats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldAlats()
     */
    public function clearVldAlats()
    {
        $this->collVldAlats = null; // important to set this to null since that means it is uninitialized
        $this->collVldAlatsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldAlats collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldAlats($v = true)
    {
        $this->collVldAlatsPartial = $v;
    }

    /**
     * Initializes the collVldAlats collection.
     *
     * By default this just sets the collVldAlats collection to an empty array (like clearcollVldAlats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldAlats($overrideExisting = true)
    {
        if (null !== $this->collVldAlats && !$overrideExisting) {
            return;
        }
        $this->collVldAlats = new PropelObjectCollection();
        $this->collVldAlats->setModel('VldAlat');
    }

    /**
     * Gets an array of VldAlat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldAlat[] List of VldAlat objects
     * @throws PropelException
     */
    public function getVldAlats($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldAlatsPartial && !$this->isNew();
        if (null === $this->collVldAlats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldAlats) {
                // return empty collection
                $this->initVldAlats();
            } else {
                $collVldAlats = VldAlatQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldAlatsPartial && count($collVldAlats)) {
                      $this->initVldAlats(false);

                      foreach($collVldAlats as $obj) {
                        if (false == $this->collVldAlats->contains($obj)) {
                          $this->collVldAlats->append($obj);
                        }
                      }

                      $this->collVldAlatsPartial = true;
                    }

                    $collVldAlats->getInternalIterator()->rewind();
                    return $collVldAlats;
                }

                if($partial && $this->collVldAlats) {
                    foreach($this->collVldAlats as $obj) {
                        if($obj->isNew()) {
                            $collVldAlats[] = $obj;
                        }
                    }
                }

                $this->collVldAlats = $collVldAlats;
                $this->collVldAlatsPartial = false;
            }
        }

        return $this->collVldAlats;
    }

    /**
     * Sets a collection of VldAlat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldAlats A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldAlats(PropelCollection $vldAlats, PropelPDO $con = null)
    {
        $vldAlatsToDelete = $this->getVldAlats(new Criteria(), $con)->diff($vldAlats);

        $this->vldAlatsScheduledForDeletion = unserialize(serialize($vldAlatsToDelete));

        foreach ($vldAlatsToDelete as $vldAlatRemoved) {
            $vldAlatRemoved->setErrortype(null);
        }

        $this->collVldAlats = null;
        foreach ($vldAlats as $vldAlat) {
            $this->addVldAlat($vldAlat);
        }

        $this->collVldAlats = $vldAlats;
        $this->collVldAlatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldAlat objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldAlat objects.
     * @throws PropelException
     */
    public function countVldAlats(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldAlatsPartial && !$this->isNew();
        if (null === $this->collVldAlats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldAlats) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldAlats());
            }
            $query = VldAlatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldAlats);
    }

    /**
     * Method called to associate a VldAlat object to this object
     * through the VldAlat foreign key attribute.
     *
     * @param    VldAlat $l VldAlat
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldAlat(VldAlat $l)
    {
        if ($this->collVldAlats === null) {
            $this->initVldAlats();
            $this->collVldAlatsPartial = true;
        }
        if (!in_array($l, $this->collVldAlats->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldAlat($l);
        }

        return $this;
    }

    /**
     * @param	VldAlat $vldAlat The vldAlat object to add.
     */
    protected function doAddVldAlat($vldAlat)
    {
        $this->collVldAlats[]= $vldAlat;
        $vldAlat->setErrortype($this);
    }

    /**
     * @param	VldAlat $vldAlat The vldAlat object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldAlat($vldAlat)
    {
        if ($this->getVldAlats()->contains($vldAlat)) {
            $this->collVldAlats->remove($this->collVldAlats->search($vldAlat));
            if (null === $this->vldAlatsScheduledForDeletion) {
                $this->vldAlatsScheduledForDeletion = clone $this->collVldAlats;
                $this->vldAlatsScheduledForDeletion->clear();
            }
            $this->vldAlatsScheduledForDeletion[]= clone $vldAlat;
            $vldAlat->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldAlats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldAlat[] List of VldAlat objects
     */
    public function getVldAlatsJoinAlat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldAlatQuery::create(null, $criteria);
        $query->joinWith('Alat', $join_behavior);

        return $this->getVldAlats($query, $con);
    }

    /**
     * Clears out the collVldAnaks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldAnaks()
     */
    public function clearVldAnaks()
    {
        $this->collVldAnaks = null; // important to set this to null since that means it is uninitialized
        $this->collVldAnaksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldAnaks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldAnaks($v = true)
    {
        $this->collVldAnaksPartial = $v;
    }

    /**
     * Initializes the collVldAnaks collection.
     *
     * By default this just sets the collVldAnaks collection to an empty array (like clearcollVldAnaks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldAnaks($overrideExisting = true)
    {
        if (null !== $this->collVldAnaks && !$overrideExisting) {
            return;
        }
        $this->collVldAnaks = new PropelObjectCollection();
        $this->collVldAnaks->setModel('VldAnak');
    }

    /**
     * Gets an array of VldAnak objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldAnak[] List of VldAnak objects
     * @throws PropelException
     */
    public function getVldAnaks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldAnaksPartial && !$this->isNew();
        if (null === $this->collVldAnaks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldAnaks) {
                // return empty collection
                $this->initVldAnaks();
            } else {
                $collVldAnaks = VldAnakQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldAnaksPartial && count($collVldAnaks)) {
                      $this->initVldAnaks(false);

                      foreach($collVldAnaks as $obj) {
                        if (false == $this->collVldAnaks->contains($obj)) {
                          $this->collVldAnaks->append($obj);
                        }
                      }

                      $this->collVldAnaksPartial = true;
                    }

                    $collVldAnaks->getInternalIterator()->rewind();
                    return $collVldAnaks;
                }

                if($partial && $this->collVldAnaks) {
                    foreach($this->collVldAnaks as $obj) {
                        if($obj->isNew()) {
                            $collVldAnaks[] = $obj;
                        }
                    }
                }

                $this->collVldAnaks = $collVldAnaks;
                $this->collVldAnaksPartial = false;
            }
        }

        return $this->collVldAnaks;
    }

    /**
     * Sets a collection of VldAnak objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldAnaks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldAnaks(PropelCollection $vldAnaks, PropelPDO $con = null)
    {
        $vldAnaksToDelete = $this->getVldAnaks(new Criteria(), $con)->diff($vldAnaks);

        $this->vldAnaksScheduledForDeletion = unserialize(serialize($vldAnaksToDelete));

        foreach ($vldAnaksToDelete as $vldAnakRemoved) {
            $vldAnakRemoved->setErrortype(null);
        }

        $this->collVldAnaks = null;
        foreach ($vldAnaks as $vldAnak) {
            $this->addVldAnak($vldAnak);
        }

        $this->collVldAnaks = $vldAnaks;
        $this->collVldAnaksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldAnak objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldAnak objects.
     * @throws PropelException
     */
    public function countVldAnaks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldAnaksPartial && !$this->isNew();
        if (null === $this->collVldAnaks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldAnaks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldAnaks());
            }
            $query = VldAnakQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldAnaks);
    }

    /**
     * Method called to associate a VldAnak object to this object
     * through the VldAnak foreign key attribute.
     *
     * @param    VldAnak $l VldAnak
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldAnak(VldAnak $l)
    {
        if ($this->collVldAnaks === null) {
            $this->initVldAnaks();
            $this->collVldAnaksPartial = true;
        }
        if (!in_array($l, $this->collVldAnaks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldAnak($l);
        }

        return $this;
    }

    /**
     * @param	VldAnak $vldAnak The vldAnak object to add.
     */
    protected function doAddVldAnak($vldAnak)
    {
        $this->collVldAnaks[]= $vldAnak;
        $vldAnak->setErrortype($this);
    }

    /**
     * @param	VldAnak $vldAnak The vldAnak object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldAnak($vldAnak)
    {
        if ($this->getVldAnaks()->contains($vldAnak)) {
            $this->collVldAnaks->remove($this->collVldAnaks->search($vldAnak));
            if (null === $this->vldAnaksScheduledForDeletion) {
                $this->vldAnaksScheduledForDeletion = clone $this->collVldAnaks;
                $this->vldAnaksScheduledForDeletion->clear();
            }
            $this->vldAnaksScheduledForDeletion[]= clone $vldAnak;
            $vldAnak->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldAnaks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldAnak[] List of VldAnak objects
     */
    public function getVldAnaksJoinAnak($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldAnakQuery::create(null, $criteria);
        $query->joinWith('Anak', $join_behavior);

        return $this->getVldAnaks($query, $con);
    }

    /**
     * Clears out the collVldAngkutans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldAngkutans()
     */
    public function clearVldAngkutans()
    {
        $this->collVldAngkutans = null; // important to set this to null since that means it is uninitialized
        $this->collVldAngkutansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldAngkutans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldAngkutans($v = true)
    {
        $this->collVldAngkutansPartial = $v;
    }

    /**
     * Initializes the collVldAngkutans collection.
     *
     * By default this just sets the collVldAngkutans collection to an empty array (like clearcollVldAngkutans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldAngkutans($overrideExisting = true)
    {
        if (null !== $this->collVldAngkutans && !$overrideExisting) {
            return;
        }
        $this->collVldAngkutans = new PropelObjectCollection();
        $this->collVldAngkutans->setModel('VldAngkutan');
    }

    /**
     * Gets an array of VldAngkutan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldAngkutan[] List of VldAngkutan objects
     * @throws PropelException
     */
    public function getVldAngkutans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldAngkutansPartial && !$this->isNew();
        if (null === $this->collVldAngkutans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldAngkutans) {
                // return empty collection
                $this->initVldAngkutans();
            } else {
                $collVldAngkutans = VldAngkutanQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldAngkutansPartial && count($collVldAngkutans)) {
                      $this->initVldAngkutans(false);

                      foreach($collVldAngkutans as $obj) {
                        if (false == $this->collVldAngkutans->contains($obj)) {
                          $this->collVldAngkutans->append($obj);
                        }
                      }

                      $this->collVldAngkutansPartial = true;
                    }

                    $collVldAngkutans->getInternalIterator()->rewind();
                    return $collVldAngkutans;
                }

                if($partial && $this->collVldAngkutans) {
                    foreach($this->collVldAngkutans as $obj) {
                        if($obj->isNew()) {
                            $collVldAngkutans[] = $obj;
                        }
                    }
                }

                $this->collVldAngkutans = $collVldAngkutans;
                $this->collVldAngkutansPartial = false;
            }
        }

        return $this->collVldAngkutans;
    }

    /**
     * Sets a collection of VldAngkutan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldAngkutans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldAngkutans(PropelCollection $vldAngkutans, PropelPDO $con = null)
    {
        $vldAngkutansToDelete = $this->getVldAngkutans(new Criteria(), $con)->diff($vldAngkutans);

        $this->vldAngkutansScheduledForDeletion = unserialize(serialize($vldAngkutansToDelete));

        foreach ($vldAngkutansToDelete as $vldAngkutanRemoved) {
            $vldAngkutanRemoved->setErrortype(null);
        }

        $this->collVldAngkutans = null;
        foreach ($vldAngkutans as $vldAngkutan) {
            $this->addVldAngkutan($vldAngkutan);
        }

        $this->collVldAngkutans = $vldAngkutans;
        $this->collVldAngkutansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldAngkutan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldAngkutan objects.
     * @throws PropelException
     */
    public function countVldAngkutans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldAngkutansPartial && !$this->isNew();
        if (null === $this->collVldAngkutans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldAngkutans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldAngkutans());
            }
            $query = VldAngkutanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldAngkutans);
    }

    /**
     * Method called to associate a VldAngkutan object to this object
     * through the VldAngkutan foreign key attribute.
     *
     * @param    VldAngkutan $l VldAngkutan
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldAngkutan(VldAngkutan $l)
    {
        if ($this->collVldAngkutans === null) {
            $this->initVldAngkutans();
            $this->collVldAngkutansPartial = true;
        }
        if (!in_array($l, $this->collVldAngkutans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldAngkutan($l);
        }

        return $this;
    }

    /**
     * @param	VldAngkutan $vldAngkutan The vldAngkutan object to add.
     */
    protected function doAddVldAngkutan($vldAngkutan)
    {
        $this->collVldAngkutans[]= $vldAngkutan;
        $vldAngkutan->setErrortype($this);
    }

    /**
     * @param	VldAngkutan $vldAngkutan The vldAngkutan object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldAngkutan($vldAngkutan)
    {
        if ($this->getVldAngkutans()->contains($vldAngkutan)) {
            $this->collVldAngkutans->remove($this->collVldAngkutans->search($vldAngkutan));
            if (null === $this->vldAngkutansScheduledForDeletion) {
                $this->vldAngkutansScheduledForDeletion = clone $this->collVldAngkutans;
                $this->vldAngkutansScheduledForDeletion->clear();
            }
            $this->vldAngkutansScheduledForDeletion[]= clone $vldAngkutan;
            $vldAngkutan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldAngkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldAngkutan[] List of VldAngkutan objects
     */
    public function getVldAngkutansJoinAngkutan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldAngkutanQuery::create(null, $criteria);
        $query->joinWith('Angkutan', $join_behavior);

        return $this->getVldAngkutans($query, $con);
    }

    /**
     * Clears out the collVldBangunans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldBangunans()
     */
    public function clearVldBangunans()
    {
        $this->collVldBangunans = null; // important to set this to null since that means it is uninitialized
        $this->collVldBangunansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldBangunans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldBangunans($v = true)
    {
        $this->collVldBangunansPartial = $v;
    }

    /**
     * Initializes the collVldBangunans collection.
     *
     * By default this just sets the collVldBangunans collection to an empty array (like clearcollVldBangunans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldBangunans($overrideExisting = true)
    {
        if (null !== $this->collVldBangunans && !$overrideExisting) {
            return;
        }
        $this->collVldBangunans = new PropelObjectCollection();
        $this->collVldBangunans->setModel('VldBangunan');
    }

    /**
     * Gets an array of VldBangunan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldBangunan[] List of VldBangunan objects
     * @throws PropelException
     */
    public function getVldBangunans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldBangunansPartial && !$this->isNew();
        if (null === $this->collVldBangunans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldBangunans) {
                // return empty collection
                $this->initVldBangunans();
            } else {
                $collVldBangunans = VldBangunanQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldBangunansPartial && count($collVldBangunans)) {
                      $this->initVldBangunans(false);

                      foreach($collVldBangunans as $obj) {
                        if (false == $this->collVldBangunans->contains($obj)) {
                          $this->collVldBangunans->append($obj);
                        }
                      }

                      $this->collVldBangunansPartial = true;
                    }

                    $collVldBangunans->getInternalIterator()->rewind();
                    return $collVldBangunans;
                }

                if($partial && $this->collVldBangunans) {
                    foreach($this->collVldBangunans as $obj) {
                        if($obj->isNew()) {
                            $collVldBangunans[] = $obj;
                        }
                    }
                }

                $this->collVldBangunans = $collVldBangunans;
                $this->collVldBangunansPartial = false;
            }
        }

        return $this->collVldBangunans;
    }

    /**
     * Sets a collection of VldBangunan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldBangunans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldBangunans(PropelCollection $vldBangunans, PropelPDO $con = null)
    {
        $vldBangunansToDelete = $this->getVldBangunans(new Criteria(), $con)->diff($vldBangunans);

        $this->vldBangunansScheduledForDeletion = unserialize(serialize($vldBangunansToDelete));

        foreach ($vldBangunansToDelete as $vldBangunanRemoved) {
            $vldBangunanRemoved->setErrortype(null);
        }

        $this->collVldBangunans = null;
        foreach ($vldBangunans as $vldBangunan) {
            $this->addVldBangunan($vldBangunan);
        }

        $this->collVldBangunans = $vldBangunans;
        $this->collVldBangunansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldBangunan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldBangunan objects.
     * @throws PropelException
     */
    public function countVldBangunans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldBangunansPartial && !$this->isNew();
        if (null === $this->collVldBangunans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldBangunans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldBangunans());
            }
            $query = VldBangunanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldBangunans);
    }

    /**
     * Method called to associate a VldBangunan object to this object
     * through the VldBangunan foreign key attribute.
     *
     * @param    VldBangunan $l VldBangunan
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldBangunan(VldBangunan $l)
    {
        if ($this->collVldBangunans === null) {
            $this->initVldBangunans();
            $this->collVldBangunansPartial = true;
        }
        if (!in_array($l, $this->collVldBangunans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldBangunan($l);
        }

        return $this;
    }

    /**
     * @param	VldBangunan $vldBangunan The vldBangunan object to add.
     */
    protected function doAddVldBangunan($vldBangunan)
    {
        $this->collVldBangunans[]= $vldBangunan;
        $vldBangunan->setErrortype($this);
    }

    /**
     * @param	VldBangunan $vldBangunan The vldBangunan object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldBangunan($vldBangunan)
    {
        if ($this->getVldBangunans()->contains($vldBangunan)) {
            $this->collVldBangunans->remove($this->collVldBangunans->search($vldBangunan));
            if (null === $this->vldBangunansScheduledForDeletion) {
                $this->vldBangunansScheduledForDeletion = clone $this->collVldBangunans;
                $this->vldBangunansScheduledForDeletion->clear();
            }
            $this->vldBangunansScheduledForDeletion[]= clone $vldBangunan;
            $vldBangunan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldBangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldBangunan[] List of VldBangunan objects
     */
    public function getVldBangunansJoinBangunan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldBangunanQuery::create(null, $criteria);
        $query->joinWith('Bangunan', $join_behavior);

        return $this->getVldBangunans($query, $con);
    }

    /**
     * Clears out the collVldBeaPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldBeaPds()
     */
    public function clearVldBeaPds()
    {
        $this->collVldBeaPds = null; // important to set this to null since that means it is uninitialized
        $this->collVldBeaPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldBeaPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldBeaPds($v = true)
    {
        $this->collVldBeaPdsPartial = $v;
    }

    /**
     * Initializes the collVldBeaPds collection.
     *
     * By default this just sets the collVldBeaPds collection to an empty array (like clearcollVldBeaPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldBeaPds($overrideExisting = true)
    {
        if (null !== $this->collVldBeaPds && !$overrideExisting) {
            return;
        }
        $this->collVldBeaPds = new PropelObjectCollection();
        $this->collVldBeaPds->setModel('VldBeaPd');
    }

    /**
     * Gets an array of VldBeaPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldBeaPd[] List of VldBeaPd objects
     * @throws PropelException
     */
    public function getVldBeaPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldBeaPdsPartial && !$this->isNew();
        if (null === $this->collVldBeaPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldBeaPds) {
                // return empty collection
                $this->initVldBeaPds();
            } else {
                $collVldBeaPds = VldBeaPdQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldBeaPdsPartial && count($collVldBeaPds)) {
                      $this->initVldBeaPds(false);

                      foreach($collVldBeaPds as $obj) {
                        if (false == $this->collVldBeaPds->contains($obj)) {
                          $this->collVldBeaPds->append($obj);
                        }
                      }

                      $this->collVldBeaPdsPartial = true;
                    }

                    $collVldBeaPds->getInternalIterator()->rewind();
                    return $collVldBeaPds;
                }

                if($partial && $this->collVldBeaPds) {
                    foreach($this->collVldBeaPds as $obj) {
                        if($obj->isNew()) {
                            $collVldBeaPds[] = $obj;
                        }
                    }
                }

                $this->collVldBeaPds = $collVldBeaPds;
                $this->collVldBeaPdsPartial = false;
            }
        }

        return $this->collVldBeaPds;
    }

    /**
     * Sets a collection of VldBeaPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldBeaPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldBeaPds(PropelCollection $vldBeaPds, PropelPDO $con = null)
    {
        $vldBeaPdsToDelete = $this->getVldBeaPds(new Criteria(), $con)->diff($vldBeaPds);

        $this->vldBeaPdsScheduledForDeletion = unserialize(serialize($vldBeaPdsToDelete));

        foreach ($vldBeaPdsToDelete as $vldBeaPdRemoved) {
            $vldBeaPdRemoved->setErrortype(null);
        }

        $this->collVldBeaPds = null;
        foreach ($vldBeaPds as $vldBeaPd) {
            $this->addVldBeaPd($vldBeaPd);
        }

        $this->collVldBeaPds = $vldBeaPds;
        $this->collVldBeaPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldBeaPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldBeaPd objects.
     * @throws PropelException
     */
    public function countVldBeaPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldBeaPdsPartial && !$this->isNew();
        if (null === $this->collVldBeaPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldBeaPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldBeaPds());
            }
            $query = VldBeaPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldBeaPds);
    }

    /**
     * Method called to associate a VldBeaPd object to this object
     * through the VldBeaPd foreign key attribute.
     *
     * @param    VldBeaPd $l VldBeaPd
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldBeaPd(VldBeaPd $l)
    {
        if ($this->collVldBeaPds === null) {
            $this->initVldBeaPds();
            $this->collVldBeaPdsPartial = true;
        }
        if (!in_array($l, $this->collVldBeaPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldBeaPd($l);
        }

        return $this;
    }

    /**
     * @param	VldBeaPd $vldBeaPd The vldBeaPd object to add.
     */
    protected function doAddVldBeaPd($vldBeaPd)
    {
        $this->collVldBeaPds[]= $vldBeaPd;
        $vldBeaPd->setErrortype($this);
    }

    /**
     * @param	VldBeaPd $vldBeaPd The vldBeaPd object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldBeaPd($vldBeaPd)
    {
        if ($this->getVldBeaPds()->contains($vldBeaPd)) {
            $this->collVldBeaPds->remove($this->collVldBeaPds->search($vldBeaPd));
            if (null === $this->vldBeaPdsScheduledForDeletion) {
                $this->vldBeaPdsScheduledForDeletion = clone $this->collVldBeaPds;
                $this->vldBeaPdsScheduledForDeletion->clear();
            }
            $this->vldBeaPdsScheduledForDeletion[]= clone $vldBeaPd;
            $vldBeaPd->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldBeaPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldBeaPd[] List of VldBeaPd objects
     */
    public function getVldBeaPdsJoinBeasiswaPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldBeaPdQuery::create(null, $criteria);
        $query->joinWith('BeasiswaPesertaDidik', $join_behavior);

        return $this->getVldBeaPds($query, $con);
    }

    /**
     * Clears out the collVldBeaPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldBeaPtks()
     */
    public function clearVldBeaPtks()
    {
        $this->collVldBeaPtks = null; // important to set this to null since that means it is uninitialized
        $this->collVldBeaPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldBeaPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldBeaPtks($v = true)
    {
        $this->collVldBeaPtksPartial = $v;
    }

    /**
     * Initializes the collVldBeaPtks collection.
     *
     * By default this just sets the collVldBeaPtks collection to an empty array (like clearcollVldBeaPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldBeaPtks($overrideExisting = true)
    {
        if (null !== $this->collVldBeaPtks && !$overrideExisting) {
            return;
        }
        $this->collVldBeaPtks = new PropelObjectCollection();
        $this->collVldBeaPtks->setModel('VldBeaPtk');
    }

    /**
     * Gets an array of VldBeaPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldBeaPtk[] List of VldBeaPtk objects
     * @throws PropelException
     */
    public function getVldBeaPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldBeaPtksPartial && !$this->isNew();
        if (null === $this->collVldBeaPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldBeaPtks) {
                // return empty collection
                $this->initVldBeaPtks();
            } else {
                $collVldBeaPtks = VldBeaPtkQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldBeaPtksPartial && count($collVldBeaPtks)) {
                      $this->initVldBeaPtks(false);

                      foreach($collVldBeaPtks as $obj) {
                        if (false == $this->collVldBeaPtks->contains($obj)) {
                          $this->collVldBeaPtks->append($obj);
                        }
                      }

                      $this->collVldBeaPtksPartial = true;
                    }

                    $collVldBeaPtks->getInternalIterator()->rewind();
                    return $collVldBeaPtks;
                }

                if($partial && $this->collVldBeaPtks) {
                    foreach($this->collVldBeaPtks as $obj) {
                        if($obj->isNew()) {
                            $collVldBeaPtks[] = $obj;
                        }
                    }
                }

                $this->collVldBeaPtks = $collVldBeaPtks;
                $this->collVldBeaPtksPartial = false;
            }
        }

        return $this->collVldBeaPtks;
    }

    /**
     * Sets a collection of VldBeaPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldBeaPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldBeaPtks(PropelCollection $vldBeaPtks, PropelPDO $con = null)
    {
        $vldBeaPtksToDelete = $this->getVldBeaPtks(new Criteria(), $con)->diff($vldBeaPtks);

        $this->vldBeaPtksScheduledForDeletion = unserialize(serialize($vldBeaPtksToDelete));

        foreach ($vldBeaPtksToDelete as $vldBeaPtkRemoved) {
            $vldBeaPtkRemoved->setErrortype(null);
        }

        $this->collVldBeaPtks = null;
        foreach ($vldBeaPtks as $vldBeaPtk) {
            $this->addVldBeaPtk($vldBeaPtk);
        }

        $this->collVldBeaPtks = $vldBeaPtks;
        $this->collVldBeaPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldBeaPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldBeaPtk objects.
     * @throws PropelException
     */
    public function countVldBeaPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldBeaPtksPartial && !$this->isNew();
        if (null === $this->collVldBeaPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldBeaPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldBeaPtks());
            }
            $query = VldBeaPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldBeaPtks);
    }

    /**
     * Method called to associate a VldBeaPtk object to this object
     * through the VldBeaPtk foreign key attribute.
     *
     * @param    VldBeaPtk $l VldBeaPtk
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldBeaPtk(VldBeaPtk $l)
    {
        if ($this->collVldBeaPtks === null) {
            $this->initVldBeaPtks();
            $this->collVldBeaPtksPartial = true;
        }
        if (!in_array($l, $this->collVldBeaPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldBeaPtk($l);
        }

        return $this;
    }

    /**
     * @param	VldBeaPtk $vldBeaPtk The vldBeaPtk object to add.
     */
    protected function doAddVldBeaPtk($vldBeaPtk)
    {
        $this->collVldBeaPtks[]= $vldBeaPtk;
        $vldBeaPtk->setErrortype($this);
    }

    /**
     * @param	VldBeaPtk $vldBeaPtk The vldBeaPtk object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldBeaPtk($vldBeaPtk)
    {
        if ($this->getVldBeaPtks()->contains($vldBeaPtk)) {
            $this->collVldBeaPtks->remove($this->collVldBeaPtks->search($vldBeaPtk));
            if (null === $this->vldBeaPtksScheduledForDeletion) {
                $this->vldBeaPtksScheduledForDeletion = clone $this->collVldBeaPtks;
                $this->vldBeaPtksScheduledForDeletion->clear();
            }
            $this->vldBeaPtksScheduledForDeletion[]= clone $vldBeaPtk;
            $vldBeaPtk->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldBeaPtks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldBeaPtk[] List of VldBeaPtk objects
     */
    public function getVldBeaPtksJoinBeasiswaPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldBeaPtkQuery::create(null, $criteria);
        $query->joinWith('BeasiswaPtk', $join_behavior);

        return $this->getVldBeaPtks($query, $con);
    }

    /**
     * Clears out the collVldBukuPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldBukuPtks()
     */
    public function clearVldBukuPtks()
    {
        $this->collVldBukuPtks = null; // important to set this to null since that means it is uninitialized
        $this->collVldBukuPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldBukuPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldBukuPtks($v = true)
    {
        $this->collVldBukuPtksPartial = $v;
    }

    /**
     * Initializes the collVldBukuPtks collection.
     *
     * By default this just sets the collVldBukuPtks collection to an empty array (like clearcollVldBukuPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldBukuPtks($overrideExisting = true)
    {
        if (null !== $this->collVldBukuPtks && !$overrideExisting) {
            return;
        }
        $this->collVldBukuPtks = new PropelObjectCollection();
        $this->collVldBukuPtks->setModel('VldBukuPtk');
    }

    /**
     * Gets an array of VldBukuPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldBukuPtk[] List of VldBukuPtk objects
     * @throws PropelException
     */
    public function getVldBukuPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldBukuPtksPartial && !$this->isNew();
        if (null === $this->collVldBukuPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldBukuPtks) {
                // return empty collection
                $this->initVldBukuPtks();
            } else {
                $collVldBukuPtks = VldBukuPtkQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldBukuPtksPartial && count($collVldBukuPtks)) {
                      $this->initVldBukuPtks(false);

                      foreach($collVldBukuPtks as $obj) {
                        if (false == $this->collVldBukuPtks->contains($obj)) {
                          $this->collVldBukuPtks->append($obj);
                        }
                      }

                      $this->collVldBukuPtksPartial = true;
                    }

                    $collVldBukuPtks->getInternalIterator()->rewind();
                    return $collVldBukuPtks;
                }

                if($partial && $this->collVldBukuPtks) {
                    foreach($this->collVldBukuPtks as $obj) {
                        if($obj->isNew()) {
                            $collVldBukuPtks[] = $obj;
                        }
                    }
                }

                $this->collVldBukuPtks = $collVldBukuPtks;
                $this->collVldBukuPtksPartial = false;
            }
        }

        return $this->collVldBukuPtks;
    }

    /**
     * Sets a collection of VldBukuPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldBukuPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldBukuPtks(PropelCollection $vldBukuPtks, PropelPDO $con = null)
    {
        $vldBukuPtksToDelete = $this->getVldBukuPtks(new Criteria(), $con)->diff($vldBukuPtks);

        $this->vldBukuPtksScheduledForDeletion = unserialize(serialize($vldBukuPtksToDelete));

        foreach ($vldBukuPtksToDelete as $vldBukuPtkRemoved) {
            $vldBukuPtkRemoved->setErrortype(null);
        }

        $this->collVldBukuPtks = null;
        foreach ($vldBukuPtks as $vldBukuPtk) {
            $this->addVldBukuPtk($vldBukuPtk);
        }

        $this->collVldBukuPtks = $vldBukuPtks;
        $this->collVldBukuPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldBukuPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldBukuPtk objects.
     * @throws PropelException
     */
    public function countVldBukuPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldBukuPtksPartial && !$this->isNew();
        if (null === $this->collVldBukuPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldBukuPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldBukuPtks());
            }
            $query = VldBukuPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldBukuPtks);
    }

    /**
     * Method called to associate a VldBukuPtk object to this object
     * through the VldBukuPtk foreign key attribute.
     *
     * @param    VldBukuPtk $l VldBukuPtk
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldBukuPtk(VldBukuPtk $l)
    {
        if ($this->collVldBukuPtks === null) {
            $this->initVldBukuPtks();
            $this->collVldBukuPtksPartial = true;
        }
        if (!in_array($l, $this->collVldBukuPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldBukuPtk($l);
        }

        return $this;
    }

    /**
     * @param	VldBukuPtk $vldBukuPtk The vldBukuPtk object to add.
     */
    protected function doAddVldBukuPtk($vldBukuPtk)
    {
        $this->collVldBukuPtks[]= $vldBukuPtk;
        $vldBukuPtk->setErrortype($this);
    }

    /**
     * @param	VldBukuPtk $vldBukuPtk The vldBukuPtk object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldBukuPtk($vldBukuPtk)
    {
        if ($this->getVldBukuPtks()->contains($vldBukuPtk)) {
            $this->collVldBukuPtks->remove($this->collVldBukuPtks->search($vldBukuPtk));
            if (null === $this->vldBukuPtksScheduledForDeletion) {
                $this->vldBukuPtksScheduledForDeletion = clone $this->collVldBukuPtks;
                $this->vldBukuPtksScheduledForDeletion->clear();
            }
            $this->vldBukuPtksScheduledForDeletion[]= clone $vldBukuPtk;
            $vldBukuPtk->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldBukuPtks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldBukuPtk[] List of VldBukuPtk objects
     */
    public function getVldBukuPtksJoinBukuPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldBukuPtkQuery::create(null, $criteria);
        $query->joinWith('BukuPtk', $join_behavior);

        return $this->getVldBukuPtks($query, $con);
    }

    /**
     * Clears out the collVldDemografis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldDemografis()
     */
    public function clearVldDemografis()
    {
        $this->collVldDemografis = null; // important to set this to null since that means it is uninitialized
        $this->collVldDemografisPartial = null;

        return $this;
    }

    /**
     * reset is the collVldDemografis collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldDemografis($v = true)
    {
        $this->collVldDemografisPartial = $v;
    }

    /**
     * Initializes the collVldDemografis collection.
     *
     * By default this just sets the collVldDemografis collection to an empty array (like clearcollVldDemografis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldDemografis($overrideExisting = true)
    {
        if (null !== $this->collVldDemografis && !$overrideExisting) {
            return;
        }
        $this->collVldDemografis = new PropelObjectCollection();
        $this->collVldDemografis->setModel('VldDemografi');
    }

    /**
     * Gets an array of VldDemografi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldDemografi[] List of VldDemografi objects
     * @throws PropelException
     */
    public function getVldDemografis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldDemografisPartial && !$this->isNew();
        if (null === $this->collVldDemografis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldDemografis) {
                // return empty collection
                $this->initVldDemografis();
            } else {
                $collVldDemografis = VldDemografiQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldDemografisPartial && count($collVldDemografis)) {
                      $this->initVldDemografis(false);

                      foreach($collVldDemografis as $obj) {
                        if (false == $this->collVldDemografis->contains($obj)) {
                          $this->collVldDemografis->append($obj);
                        }
                      }

                      $this->collVldDemografisPartial = true;
                    }

                    $collVldDemografis->getInternalIterator()->rewind();
                    return $collVldDemografis;
                }

                if($partial && $this->collVldDemografis) {
                    foreach($this->collVldDemografis as $obj) {
                        if($obj->isNew()) {
                            $collVldDemografis[] = $obj;
                        }
                    }
                }

                $this->collVldDemografis = $collVldDemografis;
                $this->collVldDemografisPartial = false;
            }
        }

        return $this->collVldDemografis;
    }

    /**
     * Sets a collection of VldDemografi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldDemografis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldDemografis(PropelCollection $vldDemografis, PropelPDO $con = null)
    {
        $vldDemografisToDelete = $this->getVldDemografis(new Criteria(), $con)->diff($vldDemografis);

        $this->vldDemografisScheduledForDeletion = unserialize(serialize($vldDemografisToDelete));

        foreach ($vldDemografisToDelete as $vldDemografiRemoved) {
            $vldDemografiRemoved->setErrortype(null);
        }

        $this->collVldDemografis = null;
        foreach ($vldDemografis as $vldDemografi) {
            $this->addVldDemografi($vldDemografi);
        }

        $this->collVldDemografis = $vldDemografis;
        $this->collVldDemografisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldDemografi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldDemografi objects.
     * @throws PropelException
     */
    public function countVldDemografis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldDemografisPartial && !$this->isNew();
        if (null === $this->collVldDemografis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldDemografis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldDemografis());
            }
            $query = VldDemografiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldDemografis);
    }

    /**
     * Method called to associate a VldDemografi object to this object
     * through the VldDemografi foreign key attribute.
     *
     * @param    VldDemografi $l VldDemografi
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldDemografi(VldDemografi $l)
    {
        if ($this->collVldDemografis === null) {
            $this->initVldDemografis();
            $this->collVldDemografisPartial = true;
        }
        if (!in_array($l, $this->collVldDemografis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldDemografi($l);
        }

        return $this;
    }

    /**
     * @param	VldDemografi $vldDemografi The vldDemografi object to add.
     */
    protected function doAddVldDemografi($vldDemografi)
    {
        $this->collVldDemografis[]= $vldDemografi;
        $vldDemografi->setErrortype($this);
    }

    /**
     * @param	VldDemografi $vldDemografi The vldDemografi object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldDemografi($vldDemografi)
    {
        if ($this->getVldDemografis()->contains($vldDemografi)) {
            $this->collVldDemografis->remove($this->collVldDemografis->search($vldDemografi));
            if (null === $this->vldDemografisScheduledForDeletion) {
                $this->vldDemografisScheduledForDeletion = clone $this->collVldDemografis;
                $this->vldDemografisScheduledForDeletion->clear();
            }
            $this->vldDemografisScheduledForDeletion[]= clone $vldDemografi;
            $vldDemografi->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldDemografis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldDemografi[] List of VldDemografi objects
     */
    public function getVldDemografisJoinDemografi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldDemografiQuery::create(null, $criteria);
        $query->joinWith('Demografi', $join_behavior);

        return $this->getVldDemografis($query, $con);
    }

    /**
     * Clears out the collVldDudis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
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
     * If this Errortype is new, it will return
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
                    ->filterByErrortype($this)
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
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldDudis(PropelCollection $vldDudis, PropelPDO $con = null)
    {
        $vldDudisToDelete = $this->getVldDudis(new Criteria(), $con)->diff($vldDudis);

        $this->vldDudisScheduledForDeletion = unserialize(serialize($vldDudisToDelete));

        foreach ($vldDudisToDelete as $vldDudiRemoved) {
            $vldDudiRemoved->setErrortype(null);
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
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldDudis);
    }

    /**
     * Method called to associate a VldDudi object to this object
     * through the VldDudi foreign key attribute.
     *
     * @param    VldDudi $l VldDudi
     * @return Errortype The current object (for fluent API support)
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
        $vldDudi->setErrortype($this);
    }

    /**
     * @param	VldDudi $vldDudi The vldDudi object to remove.
     * @return Errortype The current object (for fluent API support)
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
            $vldDudi->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldDudis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldDudi[] List of VldDudi objects
     */
    public function getVldDudisJoinDudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldDudiQuery::create(null, $criteria);
        $query->joinWith('Dudi', $join_behavior);

        return $this->getVldDudis($query, $con);
    }

    /**
     * Clears out the collVldInpassings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldInpassings()
     */
    public function clearVldInpassings()
    {
        $this->collVldInpassings = null; // important to set this to null since that means it is uninitialized
        $this->collVldInpassingsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldInpassings collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldInpassings($v = true)
    {
        $this->collVldInpassingsPartial = $v;
    }

    /**
     * Initializes the collVldInpassings collection.
     *
     * By default this just sets the collVldInpassings collection to an empty array (like clearcollVldInpassings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldInpassings($overrideExisting = true)
    {
        if (null !== $this->collVldInpassings && !$overrideExisting) {
            return;
        }
        $this->collVldInpassings = new PropelObjectCollection();
        $this->collVldInpassings->setModel('VldInpassing');
    }

    /**
     * Gets an array of VldInpassing objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldInpassing[] List of VldInpassing objects
     * @throws PropelException
     */
    public function getVldInpassings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldInpassingsPartial && !$this->isNew();
        if (null === $this->collVldInpassings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldInpassings) {
                // return empty collection
                $this->initVldInpassings();
            } else {
                $collVldInpassings = VldInpassingQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldInpassingsPartial && count($collVldInpassings)) {
                      $this->initVldInpassings(false);

                      foreach($collVldInpassings as $obj) {
                        if (false == $this->collVldInpassings->contains($obj)) {
                          $this->collVldInpassings->append($obj);
                        }
                      }

                      $this->collVldInpassingsPartial = true;
                    }

                    $collVldInpassings->getInternalIterator()->rewind();
                    return $collVldInpassings;
                }

                if($partial && $this->collVldInpassings) {
                    foreach($this->collVldInpassings as $obj) {
                        if($obj->isNew()) {
                            $collVldInpassings[] = $obj;
                        }
                    }
                }

                $this->collVldInpassings = $collVldInpassings;
                $this->collVldInpassingsPartial = false;
            }
        }

        return $this->collVldInpassings;
    }

    /**
     * Sets a collection of VldInpassing objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldInpassings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldInpassings(PropelCollection $vldInpassings, PropelPDO $con = null)
    {
        $vldInpassingsToDelete = $this->getVldInpassings(new Criteria(), $con)->diff($vldInpassings);

        $this->vldInpassingsScheduledForDeletion = unserialize(serialize($vldInpassingsToDelete));

        foreach ($vldInpassingsToDelete as $vldInpassingRemoved) {
            $vldInpassingRemoved->setErrortype(null);
        }

        $this->collVldInpassings = null;
        foreach ($vldInpassings as $vldInpassing) {
            $this->addVldInpassing($vldInpassing);
        }

        $this->collVldInpassings = $vldInpassings;
        $this->collVldInpassingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldInpassing objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldInpassing objects.
     * @throws PropelException
     */
    public function countVldInpassings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldInpassingsPartial && !$this->isNew();
        if (null === $this->collVldInpassings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldInpassings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldInpassings());
            }
            $query = VldInpassingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldInpassings);
    }

    /**
     * Method called to associate a VldInpassing object to this object
     * through the VldInpassing foreign key attribute.
     *
     * @param    VldInpassing $l VldInpassing
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldInpassing(VldInpassing $l)
    {
        if ($this->collVldInpassings === null) {
            $this->initVldInpassings();
            $this->collVldInpassingsPartial = true;
        }
        if (!in_array($l, $this->collVldInpassings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldInpassing($l);
        }

        return $this;
    }

    /**
     * @param	VldInpassing $vldInpassing The vldInpassing object to add.
     */
    protected function doAddVldInpassing($vldInpassing)
    {
        $this->collVldInpassings[]= $vldInpassing;
        $vldInpassing->setErrortype($this);
    }

    /**
     * @param	VldInpassing $vldInpassing The vldInpassing object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldInpassing($vldInpassing)
    {
        if ($this->getVldInpassings()->contains($vldInpassing)) {
            $this->collVldInpassings->remove($this->collVldInpassings->search($vldInpassing));
            if (null === $this->vldInpassingsScheduledForDeletion) {
                $this->vldInpassingsScheduledForDeletion = clone $this->collVldInpassings;
                $this->vldInpassingsScheduledForDeletion->clear();
            }
            $this->vldInpassingsScheduledForDeletion[]= clone $vldInpassing;
            $vldInpassing->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldInpassings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldInpassing[] List of VldInpassing objects
     */
    public function getVldInpassingsJoinInpassing($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldInpassingQuery::create(null, $criteria);
        $query->joinWith('Inpassing', $join_behavior);

        return $this->getVldInpassings($query, $con);
    }

    /**
     * Clears out the collVldJurusanSps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldJurusanSps()
     */
    public function clearVldJurusanSps()
    {
        $this->collVldJurusanSps = null; // important to set this to null since that means it is uninitialized
        $this->collVldJurusanSpsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldJurusanSps collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldJurusanSps($v = true)
    {
        $this->collVldJurusanSpsPartial = $v;
    }

    /**
     * Initializes the collVldJurusanSps collection.
     *
     * By default this just sets the collVldJurusanSps collection to an empty array (like clearcollVldJurusanSps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldJurusanSps($overrideExisting = true)
    {
        if (null !== $this->collVldJurusanSps && !$overrideExisting) {
            return;
        }
        $this->collVldJurusanSps = new PropelObjectCollection();
        $this->collVldJurusanSps->setModel('VldJurusanSp');
    }

    /**
     * Gets an array of VldJurusanSp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldJurusanSp[] List of VldJurusanSp objects
     * @throws PropelException
     */
    public function getVldJurusanSps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldJurusanSpsPartial && !$this->isNew();
        if (null === $this->collVldJurusanSps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldJurusanSps) {
                // return empty collection
                $this->initVldJurusanSps();
            } else {
                $collVldJurusanSps = VldJurusanSpQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldJurusanSpsPartial && count($collVldJurusanSps)) {
                      $this->initVldJurusanSps(false);

                      foreach($collVldJurusanSps as $obj) {
                        if (false == $this->collVldJurusanSps->contains($obj)) {
                          $this->collVldJurusanSps->append($obj);
                        }
                      }

                      $this->collVldJurusanSpsPartial = true;
                    }

                    $collVldJurusanSps->getInternalIterator()->rewind();
                    return $collVldJurusanSps;
                }

                if($partial && $this->collVldJurusanSps) {
                    foreach($this->collVldJurusanSps as $obj) {
                        if($obj->isNew()) {
                            $collVldJurusanSps[] = $obj;
                        }
                    }
                }

                $this->collVldJurusanSps = $collVldJurusanSps;
                $this->collVldJurusanSpsPartial = false;
            }
        }

        return $this->collVldJurusanSps;
    }

    /**
     * Sets a collection of VldJurusanSp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldJurusanSps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldJurusanSps(PropelCollection $vldJurusanSps, PropelPDO $con = null)
    {
        $vldJurusanSpsToDelete = $this->getVldJurusanSps(new Criteria(), $con)->diff($vldJurusanSps);

        $this->vldJurusanSpsScheduledForDeletion = unserialize(serialize($vldJurusanSpsToDelete));

        foreach ($vldJurusanSpsToDelete as $vldJurusanSpRemoved) {
            $vldJurusanSpRemoved->setErrortype(null);
        }

        $this->collVldJurusanSps = null;
        foreach ($vldJurusanSps as $vldJurusanSp) {
            $this->addVldJurusanSp($vldJurusanSp);
        }

        $this->collVldJurusanSps = $vldJurusanSps;
        $this->collVldJurusanSpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldJurusanSp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldJurusanSp objects.
     * @throws PropelException
     */
    public function countVldJurusanSps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldJurusanSpsPartial && !$this->isNew();
        if (null === $this->collVldJurusanSps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldJurusanSps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldJurusanSps());
            }
            $query = VldJurusanSpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldJurusanSps);
    }

    /**
     * Method called to associate a VldJurusanSp object to this object
     * through the VldJurusanSp foreign key attribute.
     *
     * @param    VldJurusanSp $l VldJurusanSp
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldJurusanSp(VldJurusanSp $l)
    {
        if ($this->collVldJurusanSps === null) {
            $this->initVldJurusanSps();
            $this->collVldJurusanSpsPartial = true;
        }
        if (!in_array($l, $this->collVldJurusanSps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldJurusanSp($l);
        }

        return $this;
    }

    /**
     * @param	VldJurusanSp $vldJurusanSp The vldJurusanSp object to add.
     */
    protected function doAddVldJurusanSp($vldJurusanSp)
    {
        $this->collVldJurusanSps[]= $vldJurusanSp;
        $vldJurusanSp->setErrortype($this);
    }

    /**
     * @param	VldJurusanSp $vldJurusanSp The vldJurusanSp object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldJurusanSp($vldJurusanSp)
    {
        if ($this->getVldJurusanSps()->contains($vldJurusanSp)) {
            $this->collVldJurusanSps->remove($this->collVldJurusanSps->search($vldJurusanSp));
            if (null === $this->vldJurusanSpsScheduledForDeletion) {
                $this->vldJurusanSpsScheduledForDeletion = clone $this->collVldJurusanSps;
                $this->vldJurusanSpsScheduledForDeletion->clear();
            }
            $this->vldJurusanSpsScheduledForDeletion[]= clone $vldJurusanSp;
            $vldJurusanSp->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldJurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldJurusanSp[] List of VldJurusanSp objects
     */
    public function getVldJurusanSpsJoinJurusanSp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldJurusanSpQuery::create(null, $criteria);
        $query->joinWith('JurusanSp', $join_behavior);

        return $this->getVldJurusanSps($query, $con);
    }

    /**
     * Clears out the collVldKaryaTuliss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldKaryaTuliss()
     */
    public function clearVldKaryaTuliss()
    {
        $this->collVldKaryaTuliss = null; // important to set this to null since that means it is uninitialized
        $this->collVldKaryaTulissPartial = null;

        return $this;
    }

    /**
     * reset is the collVldKaryaTuliss collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldKaryaTuliss($v = true)
    {
        $this->collVldKaryaTulissPartial = $v;
    }

    /**
     * Initializes the collVldKaryaTuliss collection.
     *
     * By default this just sets the collVldKaryaTuliss collection to an empty array (like clearcollVldKaryaTuliss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldKaryaTuliss($overrideExisting = true)
    {
        if (null !== $this->collVldKaryaTuliss && !$overrideExisting) {
            return;
        }
        $this->collVldKaryaTuliss = new PropelObjectCollection();
        $this->collVldKaryaTuliss->setModel('VldKaryaTulis');
    }

    /**
     * Gets an array of VldKaryaTulis objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldKaryaTulis[] List of VldKaryaTulis objects
     * @throws PropelException
     */
    public function getVldKaryaTuliss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldKaryaTulissPartial && !$this->isNew();
        if (null === $this->collVldKaryaTuliss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldKaryaTuliss) {
                // return empty collection
                $this->initVldKaryaTuliss();
            } else {
                $collVldKaryaTuliss = VldKaryaTulisQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldKaryaTulissPartial && count($collVldKaryaTuliss)) {
                      $this->initVldKaryaTuliss(false);

                      foreach($collVldKaryaTuliss as $obj) {
                        if (false == $this->collVldKaryaTuliss->contains($obj)) {
                          $this->collVldKaryaTuliss->append($obj);
                        }
                      }

                      $this->collVldKaryaTulissPartial = true;
                    }

                    $collVldKaryaTuliss->getInternalIterator()->rewind();
                    return $collVldKaryaTuliss;
                }

                if($partial && $this->collVldKaryaTuliss) {
                    foreach($this->collVldKaryaTuliss as $obj) {
                        if($obj->isNew()) {
                            $collVldKaryaTuliss[] = $obj;
                        }
                    }
                }

                $this->collVldKaryaTuliss = $collVldKaryaTuliss;
                $this->collVldKaryaTulissPartial = false;
            }
        }

        return $this->collVldKaryaTuliss;
    }

    /**
     * Sets a collection of VldKaryaTulis objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldKaryaTuliss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldKaryaTuliss(PropelCollection $vldKaryaTuliss, PropelPDO $con = null)
    {
        $vldKaryaTulissToDelete = $this->getVldKaryaTuliss(new Criteria(), $con)->diff($vldKaryaTuliss);

        $this->vldKaryaTulissScheduledForDeletion = unserialize(serialize($vldKaryaTulissToDelete));

        foreach ($vldKaryaTulissToDelete as $vldKaryaTulisRemoved) {
            $vldKaryaTulisRemoved->setErrortype(null);
        }

        $this->collVldKaryaTuliss = null;
        foreach ($vldKaryaTuliss as $vldKaryaTulis) {
            $this->addVldKaryaTulis($vldKaryaTulis);
        }

        $this->collVldKaryaTuliss = $vldKaryaTuliss;
        $this->collVldKaryaTulissPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldKaryaTulis objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldKaryaTulis objects.
     * @throws PropelException
     */
    public function countVldKaryaTuliss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldKaryaTulissPartial && !$this->isNew();
        if (null === $this->collVldKaryaTuliss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldKaryaTuliss) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldKaryaTuliss());
            }
            $query = VldKaryaTulisQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldKaryaTuliss);
    }

    /**
     * Method called to associate a VldKaryaTulis object to this object
     * through the VldKaryaTulis foreign key attribute.
     *
     * @param    VldKaryaTulis $l VldKaryaTulis
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldKaryaTulis(VldKaryaTulis $l)
    {
        if ($this->collVldKaryaTuliss === null) {
            $this->initVldKaryaTuliss();
            $this->collVldKaryaTulissPartial = true;
        }
        if (!in_array($l, $this->collVldKaryaTuliss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldKaryaTulis($l);
        }

        return $this;
    }

    /**
     * @param	VldKaryaTulis $vldKaryaTulis The vldKaryaTulis object to add.
     */
    protected function doAddVldKaryaTulis($vldKaryaTulis)
    {
        $this->collVldKaryaTuliss[]= $vldKaryaTulis;
        $vldKaryaTulis->setErrortype($this);
    }

    /**
     * @param	VldKaryaTulis $vldKaryaTulis The vldKaryaTulis object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldKaryaTulis($vldKaryaTulis)
    {
        if ($this->getVldKaryaTuliss()->contains($vldKaryaTulis)) {
            $this->collVldKaryaTuliss->remove($this->collVldKaryaTuliss->search($vldKaryaTulis));
            if (null === $this->vldKaryaTulissScheduledForDeletion) {
                $this->vldKaryaTulissScheduledForDeletion = clone $this->collVldKaryaTuliss;
                $this->vldKaryaTulissScheduledForDeletion->clear();
            }
            $this->vldKaryaTulissScheduledForDeletion[]= clone $vldKaryaTulis;
            $vldKaryaTulis->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldKaryaTuliss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldKaryaTulis[] List of VldKaryaTulis objects
     */
    public function getVldKaryaTulissJoinKaryaTulis($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldKaryaTulisQuery::create(null, $criteria);
        $query->joinWith('KaryaTulis', $join_behavior);

        return $this->getVldKaryaTuliss($query, $con);
    }

    /**
     * Clears out the collVldKesejahteraans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldKesejahteraans()
     */
    public function clearVldKesejahteraans()
    {
        $this->collVldKesejahteraans = null; // important to set this to null since that means it is uninitialized
        $this->collVldKesejahteraansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldKesejahteraans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldKesejahteraans($v = true)
    {
        $this->collVldKesejahteraansPartial = $v;
    }

    /**
     * Initializes the collVldKesejahteraans collection.
     *
     * By default this just sets the collVldKesejahteraans collection to an empty array (like clearcollVldKesejahteraans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldKesejahteraans($overrideExisting = true)
    {
        if (null !== $this->collVldKesejahteraans && !$overrideExisting) {
            return;
        }
        $this->collVldKesejahteraans = new PropelObjectCollection();
        $this->collVldKesejahteraans->setModel('VldKesejahteraan');
    }

    /**
     * Gets an array of VldKesejahteraan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldKesejahteraan[] List of VldKesejahteraan objects
     * @throws PropelException
     */
    public function getVldKesejahteraans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldKesejahteraansPartial && !$this->isNew();
        if (null === $this->collVldKesejahteraans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldKesejahteraans) {
                // return empty collection
                $this->initVldKesejahteraans();
            } else {
                $collVldKesejahteraans = VldKesejahteraanQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldKesejahteraansPartial && count($collVldKesejahteraans)) {
                      $this->initVldKesejahteraans(false);

                      foreach($collVldKesejahteraans as $obj) {
                        if (false == $this->collVldKesejahteraans->contains($obj)) {
                          $this->collVldKesejahteraans->append($obj);
                        }
                      }

                      $this->collVldKesejahteraansPartial = true;
                    }

                    $collVldKesejahteraans->getInternalIterator()->rewind();
                    return $collVldKesejahteraans;
                }

                if($partial && $this->collVldKesejahteraans) {
                    foreach($this->collVldKesejahteraans as $obj) {
                        if($obj->isNew()) {
                            $collVldKesejahteraans[] = $obj;
                        }
                    }
                }

                $this->collVldKesejahteraans = $collVldKesejahteraans;
                $this->collVldKesejahteraansPartial = false;
            }
        }

        return $this->collVldKesejahteraans;
    }

    /**
     * Sets a collection of VldKesejahteraan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldKesejahteraans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldKesejahteraans(PropelCollection $vldKesejahteraans, PropelPDO $con = null)
    {
        $vldKesejahteraansToDelete = $this->getVldKesejahteraans(new Criteria(), $con)->diff($vldKesejahteraans);

        $this->vldKesejahteraansScheduledForDeletion = unserialize(serialize($vldKesejahteraansToDelete));

        foreach ($vldKesejahteraansToDelete as $vldKesejahteraanRemoved) {
            $vldKesejahteraanRemoved->setErrortype(null);
        }

        $this->collVldKesejahteraans = null;
        foreach ($vldKesejahteraans as $vldKesejahteraan) {
            $this->addVldKesejahteraan($vldKesejahteraan);
        }

        $this->collVldKesejahteraans = $vldKesejahteraans;
        $this->collVldKesejahteraansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldKesejahteraan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldKesejahteraan objects.
     * @throws PropelException
     */
    public function countVldKesejahteraans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldKesejahteraansPartial && !$this->isNew();
        if (null === $this->collVldKesejahteraans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldKesejahteraans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldKesejahteraans());
            }
            $query = VldKesejahteraanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldKesejahteraans);
    }

    /**
     * Method called to associate a VldKesejahteraan object to this object
     * through the VldKesejahteraan foreign key attribute.
     *
     * @param    VldKesejahteraan $l VldKesejahteraan
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldKesejahteraan(VldKesejahteraan $l)
    {
        if ($this->collVldKesejahteraans === null) {
            $this->initVldKesejahteraans();
            $this->collVldKesejahteraansPartial = true;
        }
        if (!in_array($l, $this->collVldKesejahteraans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldKesejahteraan($l);
        }

        return $this;
    }

    /**
     * @param	VldKesejahteraan $vldKesejahteraan The vldKesejahteraan object to add.
     */
    protected function doAddVldKesejahteraan($vldKesejahteraan)
    {
        $this->collVldKesejahteraans[]= $vldKesejahteraan;
        $vldKesejahteraan->setErrortype($this);
    }

    /**
     * @param	VldKesejahteraan $vldKesejahteraan The vldKesejahteraan object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldKesejahteraan($vldKesejahteraan)
    {
        if ($this->getVldKesejahteraans()->contains($vldKesejahteraan)) {
            $this->collVldKesejahteraans->remove($this->collVldKesejahteraans->search($vldKesejahteraan));
            if (null === $this->vldKesejahteraansScheduledForDeletion) {
                $this->vldKesejahteraansScheduledForDeletion = clone $this->collVldKesejahteraans;
                $this->vldKesejahteraansScheduledForDeletion->clear();
            }
            $this->vldKesejahteraansScheduledForDeletion[]= clone $vldKesejahteraan;
            $vldKesejahteraan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldKesejahteraans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldKesejahteraan[] List of VldKesejahteraan objects
     */
    public function getVldKesejahteraansJoinKesejahteraan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldKesejahteraanQuery::create(null, $criteria);
        $query->joinWith('Kesejahteraan', $join_behavior);

        return $this->getVldKesejahteraans($query, $con);
    }

    /**
     * Clears out the collVldMous collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldMous()
     */
    public function clearVldMous()
    {
        $this->collVldMous = null; // important to set this to null since that means it is uninitialized
        $this->collVldMousPartial = null;

        return $this;
    }

    /**
     * reset is the collVldMous collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldMous($v = true)
    {
        $this->collVldMousPartial = $v;
    }

    /**
     * Initializes the collVldMous collection.
     *
     * By default this just sets the collVldMous collection to an empty array (like clearcollVldMous());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldMous($overrideExisting = true)
    {
        if (null !== $this->collVldMous && !$overrideExisting) {
            return;
        }
        $this->collVldMous = new PropelObjectCollection();
        $this->collVldMous->setModel('VldMou');
    }

    /**
     * Gets an array of VldMou objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldMou[] List of VldMou objects
     * @throws PropelException
     */
    public function getVldMous($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldMousPartial && !$this->isNew();
        if (null === $this->collVldMous || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldMous) {
                // return empty collection
                $this->initVldMous();
            } else {
                $collVldMous = VldMouQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldMousPartial && count($collVldMous)) {
                      $this->initVldMous(false);

                      foreach($collVldMous as $obj) {
                        if (false == $this->collVldMous->contains($obj)) {
                          $this->collVldMous->append($obj);
                        }
                      }

                      $this->collVldMousPartial = true;
                    }

                    $collVldMous->getInternalIterator()->rewind();
                    return $collVldMous;
                }

                if($partial && $this->collVldMous) {
                    foreach($this->collVldMous as $obj) {
                        if($obj->isNew()) {
                            $collVldMous[] = $obj;
                        }
                    }
                }

                $this->collVldMous = $collVldMous;
                $this->collVldMousPartial = false;
            }
        }

        return $this->collVldMous;
    }

    /**
     * Sets a collection of VldMou objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldMous A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldMous(PropelCollection $vldMous, PropelPDO $con = null)
    {
        $vldMousToDelete = $this->getVldMous(new Criteria(), $con)->diff($vldMous);

        $this->vldMousScheduledForDeletion = unserialize(serialize($vldMousToDelete));

        foreach ($vldMousToDelete as $vldMouRemoved) {
            $vldMouRemoved->setErrortype(null);
        }

        $this->collVldMous = null;
        foreach ($vldMous as $vldMou) {
            $this->addVldMou($vldMou);
        }

        $this->collVldMous = $vldMous;
        $this->collVldMousPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldMou objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldMou objects.
     * @throws PropelException
     */
    public function countVldMous(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldMousPartial && !$this->isNew();
        if (null === $this->collVldMous || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldMous) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldMous());
            }
            $query = VldMouQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldMous);
    }

    /**
     * Method called to associate a VldMou object to this object
     * through the VldMou foreign key attribute.
     *
     * @param    VldMou $l VldMou
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldMou(VldMou $l)
    {
        if ($this->collVldMous === null) {
            $this->initVldMous();
            $this->collVldMousPartial = true;
        }
        if (!in_array($l, $this->collVldMous->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldMou($l);
        }

        return $this;
    }

    /**
     * @param	VldMou $vldMou The vldMou object to add.
     */
    protected function doAddVldMou($vldMou)
    {
        $this->collVldMous[]= $vldMou;
        $vldMou->setErrortype($this);
    }

    /**
     * @param	VldMou $vldMou The vldMou object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldMou($vldMou)
    {
        if ($this->getVldMous()->contains($vldMou)) {
            $this->collVldMous->remove($this->collVldMous->search($vldMou));
            if (null === $this->vldMousScheduledForDeletion) {
                $this->vldMousScheduledForDeletion = clone $this->collVldMous;
                $this->vldMousScheduledForDeletion->clear();
            }
            $this->vldMousScheduledForDeletion[]= clone $vldMou;
            $vldMou->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldMous from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldMou[] List of VldMou objects
     */
    public function getVldMousJoinMou($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldMouQuery::create(null, $criteria);
        $query->joinWith('Mou', $join_behavior);

        return $this->getVldMous($query, $con);
    }

    /**
     * Clears out the collVldNilaiRapors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldNilaiRapors()
     */
    public function clearVldNilaiRapors()
    {
        $this->collVldNilaiRapors = null; // important to set this to null since that means it is uninitialized
        $this->collVldNilaiRaporsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldNilaiRapors collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldNilaiRapors($v = true)
    {
        $this->collVldNilaiRaporsPartial = $v;
    }

    /**
     * Initializes the collVldNilaiRapors collection.
     *
     * By default this just sets the collVldNilaiRapors collection to an empty array (like clearcollVldNilaiRapors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldNilaiRapors($overrideExisting = true)
    {
        if (null !== $this->collVldNilaiRapors && !$overrideExisting) {
            return;
        }
        $this->collVldNilaiRapors = new PropelObjectCollection();
        $this->collVldNilaiRapors->setModel('VldNilaiRapor');
    }

    /**
     * Gets an array of VldNilaiRapor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldNilaiRapor[] List of VldNilaiRapor objects
     * @throws PropelException
     */
    public function getVldNilaiRapors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldNilaiRaporsPartial && !$this->isNew();
        if (null === $this->collVldNilaiRapors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldNilaiRapors) {
                // return empty collection
                $this->initVldNilaiRapors();
            } else {
                $collVldNilaiRapors = VldNilaiRaporQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldNilaiRaporsPartial && count($collVldNilaiRapors)) {
                      $this->initVldNilaiRapors(false);

                      foreach($collVldNilaiRapors as $obj) {
                        if (false == $this->collVldNilaiRapors->contains($obj)) {
                          $this->collVldNilaiRapors->append($obj);
                        }
                      }

                      $this->collVldNilaiRaporsPartial = true;
                    }

                    $collVldNilaiRapors->getInternalIterator()->rewind();
                    return $collVldNilaiRapors;
                }

                if($partial && $this->collVldNilaiRapors) {
                    foreach($this->collVldNilaiRapors as $obj) {
                        if($obj->isNew()) {
                            $collVldNilaiRapors[] = $obj;
                        }
                    }
                }

                $this->collVldNilaiRapors = $collVldNilaiRapors;
                $this->collVldNilaiRaporsPartial = false;
            }
        }

        return $this->collVldNilaiRapors;
    }

    /**
     * Sets a collection of VldNilaiRapor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldNilaiRapors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldNilaiRapors(PropelCollection $vldNilaiRapors, PropelPDO $con = null)
    {
        $vldNilaiRaporsToDelete = $this->getVldNilaiRapors(new Criteria(), $con)->diff($vldNilaiRapors);

        $this->vldNilaiRaporsScheduledForDeletion = unserialize(serialize($vldNilaiRaporsToDelete));

        foreach ($vldNilaiRaporsToDelete as $vldNilaiRaporRemoved) {
            $vldNilaiRaporRemoved->setErrortype(null);
        }

        $this->collVldNilaiRapors = null;
        foreach ($vldNilaiRapors as $vldNilaiRapor) {
            $this->addVldNilaiRapor($vldNilaiRapor);
        }

        $this->collVldNilaiRapors = $vldNilaiRapors;
        $this->collVldNilaiRaporsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldNilaiRapor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldNilaiRapor objects.
     * @throws PropelException
     */
    public function countVldNilaiRapors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldNilaiRaporsPartial && !$this->isNew();
        if (null === $this->collVldNilaiRapors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldNilaiRapors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldNilaiRapors());
            }
            $query = VldNilaiRaporQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldNilaiRapors);
    }

    /**
     * Method called to associate a VldNilaiRapor object to this object
     * through the VldNilaiRapor foreign key attribute.
     *
     * @param    VldNilaiRapor $l VldNilaiRapor
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldNilaiRapor(VldNilaiRapor $l)
    {
        if ($this->collVldNilaiRapors === null) {
            $this->initVldNilaiRapors();
            $this->collVldNilaiRaporsPartial = true;
        }
        if (!in_array($l, $this->collVldNilaiRapors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldNilaiRapor($l);
        }

        return $this;
    }

    /**
     * @param	VldNilaiRapor $vldNilaiRapor The vldNilaiRapor object to add.
     */
    protected function doAddVldNilaiRapor($vldNilaiRapor)
    {
        $this->collVldNilaiRapors[]= $vldNilaiRapor;
        $vldNilaiRapor->setErrortype($this);
    }

    /**
     * @param	VldNilaiRapor $vldNilaiRapor The vldNilaiRapor object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldNilaiRapor($vldNilaiRapor)
    {
        if ($this->getVldNilaiRapors()->contains($vldNilaiRapor)) {
            $this->collVldNilaiRapors->remove($this->collVldNilaiRapors->search($vldNilaiRapor));
            if (null === $this->vldNilaiRaporsScheduledForDeletion) {
                $this->vldNilaiRaporsScheduledForDeletion = clone $this->collVldNilaiRapors;
                $this->vldNilaiRaporsScheduledForDeletion->clear();
            }
            $this->vldNilaiRaporsScheduledForDeletion[]= clone $vldNilaiRapor;
            $vldNilaiRapor->setErrortype(null);
        }

        return $this;
    }

    /**
     * Clears out the collVldNilaiTests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldNilaiTests()
     */
    public function clearVldNilaiTests()
    {
        $this->collVldNilaiTests = null; // important to set this to null since that means it is uninitialized
        $this->collVldNilaiTestsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldNilaiTests collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldNilaiTests($v = true)
    {
        $this->collVldNilaiTestsPartial = $v;
    }

    /**
     * Initializes the collVldNilaiTests collection.
     *
     * By default this just sets the collVldNilaiTests collection to an empty array (like clearcollVldNilaiTests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldNilaiTests($overrideExisting = true)
    {
        if (null !== $this->collVldNilaiTests && !$overrideExisting) {
            return;
        }
        $this->collVldNilaiTests = new PropelObjectCollection();
        $this->collVldNilaiTests->setModel('VldNilaiTest');
    }

    /**
     * Gets an array of VldNilaiTest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldNilaiTest[] List of VldNilaiTest objects
     * @throws PropelException
     */
    public function getVldNilaiTests($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldNilaiTestsPartial && !$this->isNew();
        if (null === $this->collVldNilaiTests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldNilaiTests) {
                // return empty collection
                $this->initVldNilaiTests();
            } else {
                $collVldNilaiTests = VldNilaiTestQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldNilaiTestsPartial && count($collVldNilaiTests)) {
                      $this->initVldNilaiTests(false);

                      foreach($collVldNilaiTests as $obj) {
                        if (false == $this->collVldNilaiTests->contains($obj)) {
                          $this->collVldNilaiTests->append($obj);
                        }
                      }

                      $this->collVldNilaiTestsPartial = true;
                    }

                    $collVldNilaiTests->getInternalIterator()->rewind();
                    return $collVldNilaiTests;
                }

                if($partial && $this->collVldNilaiTests) {
                    foreach($this->collVldNilaiTests as $obj) {
                        if($obj->isNew()) {
                            $collVldNilaiTests[] = $obj;
                        }
                    }
                }

                $this->collVldNilaiTests = $collVldNilaiTests;
                $this->collVldNilaiTestsPartial = false;
            }
        }

        return $this->collVldNilaiTests;
    }

    /**
     * Sets a collection of VldNilaiTest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldNilaiTests A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldNilaiTests(PropelCollection $vldNilaiTests, PropelPDO $con = null)
    {
        $vldNilaiTestsToDelete = $this->getVldNilaiTests(new Criteria(), $con)->diff($vldNilaiTests);

        $this->vldNilaiTestsScheduledForDeletion = unserialize(serialize($vldNilaiTestsToDelete));

        foreach ($vldNilaiTestsToDelete as $vldNilaiTestRemoved) {
            $vldNilaiTestRemoved->setErrortype(null);
        }

        $this->collVldNilaiTests = null;
        foreach ($vldNilaiTests as $vldNilaiTest) {
            $this->addVldNilaiTest($vldNilaiTest);
        }

        $this->collVldNilaiTests = $vldNilaiTests;
        $this->collVldNilaiTestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldNilaiTest objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldNilaiTest objects.
     * @throws PropelException
     */
    public function countVldNilaiTests(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldNilaiTestsPartial && !$this->isNew();
        if (null === $this->collVldNilaiTests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldNilaiTests) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldNilaiTests());
            }
            $query = VldNilaiTestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldNilaiTests);
    }

    /**
     * Method called to associate a VldNilaiTest object to this object
     * through the VldNilaiTest foreign key attribute.
     *
     * @param    VldNilaiTest $l VldNilaiTest
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldNilaiTest(VldNilaiTest $l)
    {
        if ($this->collVldNilaiTests === null) {
            $this->initVldNilaiTests();
            $this->collVldNilaiTestsPartial = true;
        }
        if (!in_array($l, $this->collVldNilaiTests->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldNilaiTest($l);
        }

        return $this;
    }

    /**
     * @param	VldNilaiTest $vldNilaiTest The vldNilaiTest object to add.
     */
    protected function doAddVldNilaiTest($vldNilaiTest)
    {
        $this->collVldNilaiTests[]= $vldNilaiTest;
        $vldNilaiTest->setErrortype($this);
    }

    /**
     * @param	VldNilaiTest $vldNilaiTest The vldNilaiTest object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldNilaiTest($vldNilaiTest)
    {
        if ($this->getVldNilaiTests()->contains($vldNilaiTest)) {
            $this->collVldNilaiTests->remove($this->collVldNilaiTests->search($vldNilaiTest));
            if (null === $this->vldNilaiTestsScheduledForDeletion) {
                $this->vldNilaiTestsScheduledForDeletion = clone $this->collVldNilaiTests;
                $this->vldNilaiTestsScheduledForDeletion->clear();
            }
            $this->vldNilaiTestsScheduledForDeletion[]= clone $vldNilaiTest;
            $vldNilaiTest->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldNilaiTests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldNilaiTest[] List of VldNilaiTest objects
     */
    public function getVldNilaiTestsJoinNilaiTest($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldNilaiTestQuery::create(null, $criteria);
        $query->joinWith('NilaiTest', $join_behavior);

        return $this->getVldNilaiTests($query, $con);
    }

    /**
     * Clears out the collVldNonsekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldNonsekolahs()
     */
    public function clearVldNonsekolahs()
    {
        $this->collVldNonsekolahs = null; // important to set this to null since that means it is uninitialized
        $this->collVldNonsekolahsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldNonsekolahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldNonsekolahs($v = true)
    {
        $this->collVldNonsekolahsPartial = $v;
    }

    /**
     * Initializes the collVldNonsekolahs collection.
     *
     * By default this just sets the collVldNonsekolahs collection to an empty array (like clearcollVldNonsekolahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldNonsekolahs($overrideExisting = true)
    {
        if (null !== $this->collVldNonsekolahs && !$overrideExisting) {
            return;
        }
        $this->collVldNonsekolahs = new PropelObjectCollection();
        $this->collVldNonsekolahs->setModel('VldNonsekolah');
    }

    /**
     * Gets an array of VldNonsekolah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldNonsekolah[] List of VldNonsekolah objects
     * @throws PropelException
     */
    public function getVldNonsekolahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldNonsekolahsPartial && !$this->isNew();
        if (null === $this->collVldNonsekolahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldNonsekolahs) {
                // return empty collection
                $this->initVldNonsekolahs();
            } else {
                $collVldNonsekolahs = VldNonsekolahQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldNonsekolahsPartial && count($collVldNonsekolahs)) {
                      $this->initVldNonsekolahs(false);

                      foreach($collVldNonsekolahs as $obj) {
                        if (false == $this->collVldNonsekolahs->contains($obj)) {
                          $this->collVldNonsekolahs->append($obj);
                        }
                      }

                      $this->collVldNonsekolahsPartial = true;
                    }

                    $collVldNonsekolahs->getInternalIterator()->rewind();
                    return $collVldNonsekolahs;
                }

                if($partial && $this->collVldNonsekolahs) {
                    foreach($this->collVldNonsekolahs as $obj) {
                        if($obj->isNew()) {
                            $collVldNonsekolahs[] = $obj;
                        }
                    }
                }

                $this->collVldNonsekolahs = $collVldNonsekolahs;
                $this->collVldNonsekolahsPartial = false;
            }
        }

        return $this->collVldNonsekolahs;
    }

    /**
     * Sets a collection of VldNonsekolah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldNonsekolahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldNonsekolahs(PropelCollection $vldNonsekolahs, PropelPDO $con = null)
    {
        $vldNonsekolahsToDelete = $this->getVldNonsekolahs(new Criteria(), $con)->diff($vldNonsekolahs);

        $this->vldNonsekolahsScheduledForDeletion = unserialize(serialize($vldNonsekolahsToDelete));

        foreach ($vldNonsekolahsToDelete as $vldNonsekolahRemoved) {
            $vldNonsekolahRemoved->setErrortype(null);
        }

        $this->collVldNonsekolahs = null;
        foreach ($vldNonsekolahs as $vldNonsekolah) {
            $this->addVldNonsekolah($vldNonsekolah);
        }

        $this->collVldNonsekolahs = $vldNonsekolahs;
        $this->collVldNonsekolahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldNonsekolah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldNonsekolah objects.
     * @throws PropelException
     */
    public function countVldNonsekolahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldNonsekolahsPartial && !$this->isNew();
        if (null === $this->collVldNonsekolahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldNonsekolahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldNonsekolahs());
            }
            $query = VldNonsekolahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldNonsekolahs);
    }

    /**
     * Method called to associate a VldNonsekolah object to this object
     * through the VldNonsekolah foreign key attribute.
     *
     * @param    VldNonsekolah $l VldNonsekolah
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldNonsekolah(VldNonsekolah $l)
    {
        if ($this->collVldNonsekolahs === null) {
            $this->initVldNonsekolahs();
            $this->collVldNonsekolahsPartial = true;
        }
        if (!in_array($l, $this->collVldNonsekolahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldNonsekolah($l);
        }

        return $this;
    }

    /**
     * @param	VldNonsekolah $vldNonsekolah The vldNonsekolah object to add.
     */
    protected function doAddVldNonsekolah($vldNonsekolah)
    {
        $this->collVldNonsekolahs[]= $vldNonsekolah;
        $vldNonsekolah->setErrortype($this);
    }

    /**
     * @param	VldNonsekolah $vldNonsekolah The vldNonsekolah object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldNonsekolah($vldNonsekolah)
    {
        if ($this->getVldNonsekolahs()->contains($vldNonsekolah)) {
            $this->collVldNonsekolahs->remove($this->collVldNonsekolahs->search($vldNonsekolah));
            if (null === $this->vldNonsekolahsScheduledForDeletion) {
                $this->vldNonsekolahsScheduledForDeletion = clone $this->collVldNonsekolahs;
                $this->vldNonsekolahsScheduledForDeletion->clear();
            }
            $this->vldNonsekolahsScheduledForDeletion[]= clone $vldNonsekolah;
            $vldNonsekolah->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldNonsekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldNonsekolah[] List of VldNonsekolah objects
     */
    public function getVldNonsekolahsJoinLembagaNonSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldNonsekolahQuery::create(null, $criteria);
        $query->joinWith('LembagaNonSekolah', $join_behavior);

        return $this->getVldNonsekolahs($query, $con);
    }

    /**
     * Clears out the collVldPdLongs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
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
     * If this Errortype is new, it will return
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
                    ->filterByErrortype($this)
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
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldPdLongs(PropelCollection $vldPdLongs, PropelPDO $con = null)
    {
        $vldPdLongsToDelete = $this->getVldPdLongs(new Criteria(), $con)->diff($vldPdLongs);

        $this->vldPdLongsScheduledForDeletion = unserialize(serialize($vldPdLongsToDelete));

        foreach ($vldPdLongsToDelete as $vldPdLongRemoved) {
            $vldPdLongRemoved->setErrortype(null);
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
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldPdLongs);
    }

    /**
     * Method called to associate a VldPdLong object to this object
     * through the VldPdLong foreign key attribute.
     *
     * @param    VldPdLong $l VldPdLong
     * @return Errortype The current object (for fluent API support)
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
        $vldPdLong->setErrortype($this);
    }

    /**
     * @param	VldPdLong $vldPdLong The vldPdLong object to remove.
     * @return Errortype The current object (for fluent API support)
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
            $vldPdLong->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldPdLongs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPdLong[] List of VldPdLong objects
     */
    public function getVldPdLongsJoinPesertaDidikLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPdLongQuery::create(null, $criteria);
        $query->joinWith('PesertaDidikLongitudinal', $join_behavior);

        return $this->getVldPdLongs($query, $con);
    }

    /**
     * Clears out the collVldPembelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldPembelajarans()
     */
    public function clearVldPembelajarans()
    {
        $this->collVldPembelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collVldPembelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPembelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPembelajarans($v = true)
    {
        $this->collVldPembelajaransPartial = $v;
    }

    /**
     * Initializes the collVldPembelajarans collection.
     *
     * By default this just sets the collVldPembelajarans collection to an empty array (like clearcollVldPembelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPembelajarans($overrideExisting = true)
    {
        if (null !== $this->collVldPembelajarans && !$overrideExisting) {
            return;
        }
        $this->collVldPembelajarans = new PropelObjectCollection();
        $this->collVldPembelajarans->setModel('VldPembelajaran');
    }

    /**
     * Gets an array of VldPembelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPembelajaran[] List of VldPembelajaran objects
     * @throws PropelException
     */
    public function getVldPembelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPembelajaransPartial && !$this->isNew();
        if (null === $this->collVldPembelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPembelajarans) {
                // return empty collection
                $this->initVldPembelajarans();
            } else {
                $collVldPembelajarans = VldPembelajaranQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPembelajaransPartial && count($collVldPembelajarans)) {
                      $this->initVldPembelajarans(false);

                      foreach($collVldPembelajarans as $obj) {
                        if (false == $this->collVldPembelajarans->contains($obj)) {
                          $this->collVldPembelajarans->append($obj);
                        }
                      }

                      $this->collVldPembelajaransPartial = true;
                    }

                    $collVldPembelajarans->getInternalIterator()->rewind();
                    return $collVldPembelajarans;
                }

                if($partial && $this->collVldPembelajarans) {
                    foreach($this->collVldPembelajarans as $obj) {
                        if($obj->isNew()) {
                            $collVldPembelajarans[] = $obj;
                        }
                    }
                }

                $this->collVldPembelajarans = $collVldPembelajarans;
                $this->collVldPembelajaransPartial = false;
            }
        }

        return $this->collVldPembelajarans;
    }

    /**
     * Sets a collection of VldPembelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPembelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldPembelajarans(PropelCollection $vldPembelajarans, PropelPDO $con = null)
    {
        $vldPembelajaransToDelete = $this->getVldPembelajarans(new Criteria(), $con)->diff($vldPembelajarans);

        $this->vldPembelajaransScheduledForDeletion = unserialize(serialize($vldPembelajaransToDelete));

        foreach ($vldPembelajaransToDelete as $vldPembelajaranRemoved) {
            $vldPembelajaranRemoved->setErrortype(null);
        }

        $this->collVldPembelajarans = null;
        foreach ($vldPembelajarans as $vldPembelajaran) {
            $this->addVldPembelajaran($vldPembelajaran);
        }

        $this->collVldPembelajarans = $vldPembelajarans;
        $this->collVldPembelajaransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPembelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPembelajaran objects.
     * @throws PropelException
     */
    public function countVldPembelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPembelajaransPartial && !$this->isNew();
        if (null === $this->collVldPembelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPembelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPembelajarans());
            }
            $query = VldPembelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldPembelajarans);
    }

    /**
     * Method called to associate a VldPembelajaran object to this object
     * through the VldPembelajaran foreign key attribute.
     *
     * @param    VldPembelajaran $l VldPembelajaran
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldPembelajaran(VldPembelajaran $l)
    {
        if ($this->collVldPembelajarans === null) {
            $this->initVldPembelajarans();
            $this->collVldPembelajaransPartial = true;
        }
        if (!in_array($l, $this->collVldPembelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPembelajaran($l);
        }

        return $this;
    }

    /**
     * @param	VldPembelajaran $vldPembelajaran The vldPembelajaran object to add.
     */
    protected function doAddVldPembelajaran($vldPembelajaran)
    {
        $this->collVldPembelajarans[]= $vldPembelajaran;
        $vldPembelajaran->setErrortype($this);
    }

    /**
     * @param	VldPembelajaran $vldPembelajaran The vldPembelajaran object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldPembelajaran($vldPembelajaran)
    {
        if ($this->getVldPembelajarans()->contains($vldPembelajaran)) {
            $this->collVldPembelajarans->remove($this->collVldPembelajarans->search($vldPembelajaran));
            if (null === $this->vldPembelajaransScheduledForDeletion) {
                $this->vldPembelajaransScheduledForDeletion = clone $this->collVldPembelajarans;
                $this->vldPembelajaransScheduledForDeletion->clear();
            }
            $this->vldPembelajaransScheduledForDeletion[]= clone $vldPembelajaran;
            $vldPembelajaran->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldPembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPembelajaran[] List of VldPembelajaran objects
     */
    public function getVldPembelajaransJoinPembelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPembelajaranQuery::create(null, $criteria);
        $query->joinWith('Pembelajaran', $join_behavior);

        return $this->getVldPembelajarans($query, $con);
    }

    /**
     * Clears out the collVldPenghargaans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldPenghargaans()
     */
    public function clearVldPenghargaans()
    {
        $this->collVldPenghargaans = null; // important to set this to null since that means it is uninitialized
        $this->collVldPenghargaansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPenghargaans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPenghargaans($v = true)
    {
        $this->collVldPenghargaansPartial = $v;
    }

    /**
     * Initializes the collVldPenghargaans collection.
     *
     * By default this just sets the collVldPenghargaans collection to an empty array (like clearcollVldPenghargaans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPenghargaans($overrideExisting = true)
    {
        if (null !== $this->collVldPenghargaans && !$overrideExisting) {
            return;
        }
        $this->collVldPenghargaans = new PropelObjectCollection();
        $this->collVldPenghargaans->setModel('VldPenghargaan');
    }

    /**
     * Gets an array of VldPenghargaan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPenghargaan[] List of VldPenghargaan objects
     * @throws PropelException
     */
    public function getVldPenghargaans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPenghargaansPartial && !$this->isNew();
        if (null === $this->collVldPenghargaans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPenghargaans) {
                // return empty collection
                $this->initVldPenghargaans();
            } else {
                $collVldPenghargaans = VldPenghargaanQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPenghargaansPartial && count($collVldPenghargaans)) {
                      $this->initVldPenghargaans(false);

                      foreach($collVldPenghargaans as $obj) {
                        if (false == $this->collVldPenghargaans->contains($obj)) {
                          $this->collVldPenghargaans->append($obj);
                        }
                      }

                      $this->collVldPenghargaansPartial = true;
                    }

                    $collVldPenghargaans->getInternalIterator()->rewind();
                    return $collVldPenghargaans;
                }

                if($partial && $this->collVldPenghargaans) {
                    foreach($this->collVldPenghargaans as $obj) {
                        if($obj->isNew()) {
                            $collVldPenghargaans[] = $obj;
                        }
                    }
                }

                $this->collVldPenghargaans = $collVldPenghargaans;
                $this->collVldPenghargaansPartial = false;
            }
        }

        return $this->collVldPenghargaans;
    }

    /**
     * Sets a collection of VldPenghargaan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPenghargaans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldPenghargaans(PropelCollection $vldPenghargaans, PropelPDO $con = null)
    {
        $vldPenghargaansToDelete = $this->getVldPenghargaans(new Criteria(), $con)->diff($vldPenghargaans);

        $this->vldPenghargaansScheduledForDeletion = unserialize(serialize($vldPenghargaansToDelete));

        foreach ($vldPenghargaansToDelete as $vldPenghargaanRemoved) {
            $vldPenghargaanRemoved->setErrortype(null);
        }

        $this->collVldPenghargaans = null;
        foreach ($vldPenghargaans as $vldPenghargaan) {
            $this->addVldPenghargaan($vldPenghargaan);
        }

        $this->collVldPenghargaans = $vldPenghargaans;
        $this->collVldPenghargaansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPenghargaan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPenghargaan objects.
     * @throws PropelException
     */
    public function countVldPenghargaans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPenghargaansPartial && !$this->isNew();
        if (null === $this->collVldPenghargaans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPenghargaans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPenghargaans());
            }
            $query = VldPenghargaanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldPenghargaans);
    }

    /**
     * Method called to associate a VldPenghargaan object to this object
     * through the VldPenghargaan foreign key attribute.
     *
     * @param    VldPenghargaan $l VldPenghargaan
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldPenghargaan(VldPenghargaan $l)
    {
        if ($this->collVldPenghargaans === null) {
            $this->initVldPenghargaans();
            $this->collVldPenghargaansPartial = true;
        }
        if (!in_array($l, $this->collVldPenghargaans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPenghargaan($l);
        }

        return $this;
    }

    /**
     * @param	VldPenghargaan $vldPenghargaan The vldPenghargaan object to add.
     */
    protected function doAddVldPenghargaan($vldPenghargaan)
    {
        $this->collVldPenghargaans[]= $vldPenghargaan;
        $vldPenghargaan->setErrortype($this);
    }

    /**
     * @param	VldPenghargaan $vldPenghargaan The vldPenghargaan object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldPenghargaan($vldPenghargaan)
    {
        if ($this->getVldPenghargaans()->contains($vldPenghargaan)) {
            $this->collVldPenghargaans->remove($this->collVldPenghargaans->search($vldPenghargaan));
            if (null === $this->vldPenghargaansScheduledForDeletion) {
                $this->vldPenghargaansScheduledForDeletion = clone $this->collVldPenghargaans;
                $this->vldPenghargaansScheduledForDeletion->clear();
            }
            $this->vldPenghargaansScheduledForDeletion[]= clone $vldPenghargaan;
            $vldPenghargaan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldPenghargaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPenghargaan[] List of VldPenghargaan objects
     */
    public function getVldPenghargaansJoinPenghargaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPenghargaanQuery::create(null, $criteria);
        $query->joinWith('Penghargaan', $join_behavior);

        return $this->getVldPenghargaans($query, $con);
    }

    /**
     * Clears out the collVldPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldPesertaDidiks()
     */
    public function clearVldPesertaDidiks()
    {
        $this->collVldPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collVldPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPesertaDidiks($v = true)
    {
        $this->collVldPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collVldPesertaDidiks collection.
     *
     * By default this just sets the collVldPesertaDidiks collection to an empty array (like clearcollVldPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collVldPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collVldPesertaDidiks = new PropelObjectCollection();
        $this->collVldPesertaDidiks->setModel('VldPesertaDidik');
    }

    /**
     * Gets an array of VldPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPesertaDidik[] List of VldPesertaDidik objects
     * @throws PropelException
     */
    public function getVldPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collVldPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPesertaDidiks) {
                // return empty collection
                $this->initVldPesertaDidiks();
            } else {
                $collVldPesertaDidiks = VldPesertaDidikQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPesertaDidiksPartial && count($collVldPesertaDidiks)) {
                      $this->initVldPesertaDidiks(false);

                      foreach($collVldPesertaDidiks as $obj) {
                        if (false == $this->collVldPesertaDidiks->contains($obj)) {
                          $this->collVldPesertaDidiks->append($obj);
                        }
                      }

                      $this->collVldPesertaDidiksPartial = true;
                    }

                    $collVldPesertaDidiks->getInternalIterator()->rewind();
                    return $collVldPesertaDidiks;
                }

                if($partial && $this->collVldPesertaDidiks) {
                    foreach($this->collVldPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collVldPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collVldPesertaDidiks = $collVldPesertaDidiks;
                $this->collVldPesertaDidiksPartial = false;
            }
        }

        return $this->collVldPesertaDidiks;
    }

    /**
     * Sets a collection of VldPesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldPesertaDidiks(PropelCollection $vldPesertaDidiks, PropelPDO $con = null)
    {
        $vldPesertaDidiksToDelete = $this->getVldPesertaDidiks(new Criteria(), $con)->diff($vldPesertaDidiks);

        $this->vldPesertaDidiksScheduledForDeletion = unserialize(serialize($vldPesertaDidiksToDelete));

        foreach ($vldPesertaDidiksToDelete as $vldPesertaDidikRemoved) {
            $vldPesertaDidikRemoved->setErrortype(null);
        }

        $this->collVldPesertaDidiks = null;
        foreach ($vldPesertaDidiks as $vldPesertaDidik) {
            $this->addVldPesertaDidik($vldPesertaDidik);
        }

        $this->collVldPesertaDidiks = $vldPesertaDidiks;
        $this->collVldPesertaDidiksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPesertaDidik objects.
     * @throws PropelException
     */
    public function countVldPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collVldPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPesertaDidiks());
            }
            $query = VldPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldPesertaDidiks);
    }

    /**
     * Method called to associate a VldPesertaDidik object to this object
     * through the VldPesertaDidik foreign key attribute.
     *
     * @param    VldPesertaDidik $l VldPesertaDidik
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldPesertaDidik(VldPesertaDidik $l)
    {
        if ($this->collVldPesertaDidiks === null) {
            $this->initVldPesertaDidiks();
            $this->collVldPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collVldPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	VldPesertaDidik $vldPesertaDidik The vldPesertaDidik object to add.
     */
    protected function doAddVldPesertaDidik($vldPesertaDidik)
    {
        $this->collVldPesertaDidiks[]= $vldPesertaDidik;
        $vldPesertaDidik->setErrortype($this);
    }

    /**
     * @param	VldPesertaDidik $vldPesertaDidik The vldPesertaDidik object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldPesertaDidik($vldPesertaDidik)
    {
        if ($this->getVldPesertaDidiks()->contains($vldPesertaDidik)) {
            $this->collVldPesertaDidiks->remove($this->collVldPesertaDidiks->search($vldPesertaDidik));
            if (null === $this->vldPesertaDidiksScheduledForDeletion) {
                $this->vldPesertaDidiksScheduledForDeletion = clone $this->collVldPesertaDidiks;
                $this->vldPesertaDidiksScheduledForDeletion->clear();
            }
            $this->vldPesertaDidiksScheduledForDeletion[]= clone $vldPesertaDidik;
            $vldPesertaDidik->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPesertaDidik[] List of VldPesertaDidik objects
     */
    public function getVldPesertaDidiksJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getVldPesertaDidiks($query, $con);
    }

    /**
     * Clears out the collVldPrestasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldPrestasis()
     */
    public function clearVldPrestasis()
    {
        $this->collVldPrestasis = null; // important to set this to null since that means it is uninitialized
        $this->collVldPrestasisPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPrestasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPrestasis($v = true)
    {
        $this->collVldPrestasisPartial = $v;
    }

    /**
     * Initializes the collVldPrestasis collection.
     *
     * By default this just sets the collVldPrestasis collection to an empty array (like clearcollVldPrestasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPrestasis($overrideExisting = true)
    {
        if (null !== $this->collVldPrestasis && !$overrideExisting) {
            return;
        }
        $this->collVldPrestasis = new PropelObjectCollection();
        $this->collVldPrestasis->setModel('VldPrestasi');
    }

    /**
     * Gets an array of VldPrestasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPrestasi[] List of VldPrestasi objects
     * @throws PropelException
     */
    public function getVldPrestasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPrestasisPartial && !$this->isNew();
        if (null === $this->collVldPrestasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPrestasis) {
                // return empty collection
                $this->initVldPrestasis();
            } else {
                $collVldPrestasis = VldPrestasiQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPrestasisPartial && count($collVldPrestasis)) {
                      $this->initVldPrestasis(false);

                      foreach($collVldPrestasis as $obj) {
                        if (false == $this->collVldPrestasis->contains($obj)) {
                          $this->collVldPrestasis->append($obj);
                        }
                      }

                      $this->collVldPrestasisPartial = true;
                    }

                    $collVldPrestasis->getInternalIterator()->rewind();
                    return $collVldPrestasis;
                }

                if($partial && $this->collVldPrestasis) {
                    foreach($this->collVldPrestasis as $obj) {
                        if($obj->isNew()) {
                            $collVldPrestasis[] = $obj;
                        }
                    }
                }

                $this->collVldPrestasis = $collVldPrestasis;
                $this->collVldPrestasisPartial = false;
            }
        }

        return $this->collVldPrestasis;
    }

    /**
     * Sets a collection of VldPrestasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPrestasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldPrestasis(PropelCollection $vldPrestasis, PropelPDO $con = null)
    {
        $vldPrestasisToDelete = $this->getVldPrestasis(new Criteria(), $con)->diff($vldPrestasis);

        $this->vldPrestasisScheduledForDeletion = unserialize(serialize($vldPrestasisToDelete));

        foreach ($vldPrestasisToDelete as $vldPrestasiRemoved) {
            $vldPrestasiRemoved->setErrortype(null);
        }

        $this->collVldPrestasis = null;
        foreach ($vldPrestasis as $vldPrestasi) {
            $this->addVldPrestasi($vldPrestasi);
        }

        $this->collVldPrestasis = $vldPrestasis;
        $this->collVldPrestasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPrestasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPrestasi objects.
     * @throws PropelException
     */
    public function countVldPrestasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPrestasisPartial && !$this->isNew();
        if (null === $this->collVldPrestasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPrestasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPrestasis());
            }
            $query = VldPrestasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldPrestasis);
    }

    /**
     * Method called to associate a VldPrestasi object to this object
     * through the VldPrestasi foreign key attribute.
     *
     * @param    VldPrestasi $l VldPrestasi
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldPrestasi(VldPrestasi $l)
    {
        if ($this->collVldPrestasis === null) {
            $this->initVldPrestasis();
            $this->collVldPrestasisPartial = true;
        }
        if (!in_array($l, $this->collVldPrestasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPrestasi($l);
        }

        return $this;
    }

    /**
     * @param	VldPrestasi $vldPrestasi The vldPrestasi object to add.
     */
    protected function doAddVldPrestasi($vldPrestasi)
    {
        $this->collVldPrestasis[]= $vldPrestasi;
        $vldPrestasi->setErrortype($this);
    }

    /**
     * @param	VldPrestasi $vldPrestasi The vldPrestasi object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldPrestasi($vldPrestasi)
    {
        if ($this->getVldPrestasis()->contains($vldPrestasi)) {
            $this->collVldPrestasis->remove($this->collVldPrestasis->search($vldPrestasi));
            if (null === $this->vldPrestasisScheduledForDeletion) {
                $this->vldPrestasisScheduledForDeletion = clone $this->collVldPrestasis;
                $this->vldPrestasisScheduledForDeletion->clear();
            }
            $this->vldPrestasisScheduledForDeletion[]= clone $vldPrestasi;
            $vldPrestasi->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldPrestasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPrestasi[] List of VldPrestasi objects
     */
    public function getVldPrestasisJoinPrestasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPrestasiQuery::create(null, $criteria);
        $query->joinWith('Prestasi', $join_behavior);

        return $this->getVldPrestasis($query, $con);
    }

    /**
     * Clears out the collVldPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldPtks()
     */
    public function clearVldPtks()
    {
        $this->collVldPtks = null; // important to set this to null since that means it is uninitialized
        $this->collVldPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPtks($v = true)
    {
        $this->collVldPtksPartial = $v;
    }

    /**
     * Initializes the collVldPtks collection.
     *
     * By default this just sets the collVldPtks collection to an empty array (like clearcollVldPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPtks($overrideExisting = true)
    {
        if (null !== $this->collVldPtks && !$overrideExisting) {
            return;
        }
        $this->collVldPtks = new PropelObjectCollection();
        $this->collVldPtks->setModel('VldPtk');
    }

    /**
     * Gets an array of VldPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPtk[] List of VldPtk objects
     * @throws PropelException
     */
    public function getVldPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPtksPartial && !$this->isNew();
        if (null === $this->collVldPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPtks) {
                // return empty collection
                $this->initVldPtks();
            } else {
                $collVldPtks = VldPtkQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPtksPartial && count($collVldPtks)) {
                      $this->initVldPtks(false);

                      foreach($collVldPtks as $obj) {
                        if (false == $this->collVldPtks->contains($obj)) {
                          $this->collVldPtks->append($obj);
                        }
                      }

                      $this->collVldPtksPartial = true;
                    }

                    $collVldPtks->getInternalIterator()->rewind();
                    return $collVldPtks;
                }

                if($partial && $this->collVldPtks) {
                    foreach($this->collVldPtks as $obj) {
                        if($obj->isNew()) {
                            $collVldPtks[] = $obj;
                        }
                    }
                }

                $this->collVldPtks = $collVldPtks;
                $this->collVldPtksPartial = false;
            }
        }

        return $this->collVldPtks;
    }

    /**
     * Sets a collection of VldPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldPtks(PropelCollection $vldPtks, PropelPDO $con = null)
    {
        $vldPtksToDelete = $this->getVldPtks(new Criteria(), $con)->diff($vldPtks);

        $this->vldPtksScheduledForDeletion = unserialize(serialize($vldPtksToDelete));

        foreach ($vldPtksToDelete as $vldPtkRemoved) {
            $vldPtkRemoved->setErrortype(null);
        }

        $this->collVldPtks = null;
        foreach ($vldPtks as $vldPtk) {
            $this->addVldPtk($vldPtk);
        }

        $this->collVldPtks = $vldPtks;
        $this->collVldPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPtk objects.
     * @throws PropelException
     */
    public function countVldPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPtksPartial && !$this->isNew();
        if (null === $this->collVldPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPtks());
            }
            $query = VldPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldPtks);
    }

    /**
     * Method called to associate a VldPtk object to this object
     * through the VldPtk foreign key attribute.
     *
     * @param    VldPtk $l VldPtk
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldPtk(VldPtk $l)
    {
        if ($this->collVldPtks === null) {
            $this->initVldPtks();
            $this->collVldPtksPartial = true;
        }
        if (!in_array($l, $this->collVldPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPtk($l);
        }

        return $this;
    }

    /**
     * @param	VldPtk $vldPtk The vldPtk object to add.
     */
    protected function doAddVldPtk($vldPtk)
    {
        $this->collVldPtks[]= $vldPtk;
        $vldPtk->setErrortype($this);
    }

    /**
     * @param	VldPtk $vldPtk The vldPtk object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldPtk($vldPtk)
    {
        if ($this->getVldPtks()->contains($vldPtk)) {
            $this->collVldPtks->remove($this->collVldPtks->search($vldPtk));
            if (null === $this->vldPtksScheduledForDeletion) {
                $this->vldPtksScheduledForDeletion = clone $this->collVldPtks;
                $this->vldPtksScheduledForDeletion->clear();
            }
            $this->vldPtksScheduledForDeletion[]= clone $vldPtk;
            $vldPtk->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldPtks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPtk[] List of VldPtk objects
     */
    public function getVldPtksJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPtkQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getVldPtks($query, $con);
    }

    /**
     * Clears out the collVldPtkTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldPtkTerdaftars()
     */
    public function clearVldPtkTerdaftars()
    {
        $this->collVldPtkTerdaftars = null; // important to set this to null since that means it is uninitialized
        $this->collVldPtkTerdaftarsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPtkTerdaftars collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPtkTerdaftars($v = true)
    {
        $this->collVldPtkTerdaftarsPartial = $v;
    }

    /**
     * Initializes the collVldPtkTerdaftars collection.
     *
     * By default this just sets the collVldPtkTerdaftars collection to an empty array (like clearcollVldPtkTerdaftars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPtkTerdaftars($overrideExisting = true)
    {
        if (null !== $this->collVldPtkTerdaftars && !$overrideExisting) {
            return;
        }
        $this->collVldPtkTerdaftars = new PropelObjectCollection();
        $this->collVldPtkTerdaftars->setModel('VldPtkTerdaftar');
    }

    /**
     * Gets an array of VldPtkTerdaftar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPtkTerdaftar[] List of VldPtkTerdaftar objects
     * @throws PropelException
     */
    public function getVldPtkTerdaftars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collVldPtkTerdaftars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPtkTerdaftars) {
                // return empty collection
                $this->initVldPtkTerdaftars();
            } else {
                $collVldPtkTerdaftars = VldPtkTerdaftarQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPtkTerdaftarsPartial && count($collVldPtkTerdaftars)) {
                      $this->initVldPtkTerdaftars(false);

                      foreach($collVldPtkTerdaftars as $obj) {
                        if (false == $this->collVldPtkTerdaftars->contains($obj)) {
                          $this->collVldPtkTerdaftars->append($obj);
                        }
                      }

                      $this->collVldPtkTerdaftarsPartial = true;
                    }

                    $collVldPtkTerdaftars->getInternalIterator()->rewind();
                    return $collVldPtkTerdaftars;
                }

                if($partial && $this->collVldPtkTerdaftars) {
                    foreach($this->collVldPtkTerdaftars as $obj) {
                        if($obj->isNew()) {
                            $collVldPtkTerdaftars[] = $obj;
                        }
                    }
                }

                $this->collVldPtkTerdaftars = $collVldPtkTerdaftars;
                $this->collVldPtkTerdaftarsPartial = false;
            }
        }

        return $this->collVldPtkTerdaftars;
    }

    /**
     * Sets a collection of VldPtkTerdaftar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPtkTerdaftars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldPtkTerdaftars(PropelCollection $vldPtkTerdaftars, PropelPDO $con = null)
    {
        $vldPtkTerdaftarsToDelete = $this->getVldPtkTerdaftars(new Criteria(), $con)->diff($vldPtkTerdaftars);

        $this->vldPtkTerdaftarsScheduledForDeletion = unserialize(serialize($vldPtkTerdaftarsToDelete));

        foreach ($vldPtkTerdaftarsToDelete as $vldPtkTerdaftarRemoved) {
            $vldPtkTerdaftarRemoved->setErrortype(null);
        }

        $this->collVldPtkTerdaftars = null;
        foreach ($vldPtkTerdaftars as $vldPtkTerdaftar) {
            $this->addVldPtkTerdaftar($vldPtkTerdaftar);
        }

        $this->collVldPtkTerdaftars = $vldPtkTerdaftars;
        $this->collVldPtkTerdaftarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPtkTerdaftar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPtkTerdaftar objects.
     * @throws PropelException
     */
    public function countVldPtkTerdaftars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collVldPtkTerdaftars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPtkTerdaftars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPtkTerdaftars());
            }
            $query = VldPtkTerdaftarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldPtkTerdaftars);
    }

    /**
     * Method called to associate a VldPtkTerdaftar object to this object
     * through the VldPtkTerdaftar foreign key attribute.
     *
     * @param    VldPtkTerdaftar $l VldPtkTerdaftar
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldPtkTerdaftar(VldPtkTerdaftar $l)
    {
        if ($this->collVldPtkTerdaftars === null) {
            $this->initVldPtkTerdaftars();
            $this->collVldPtkTerdaftarsPartial = true;
        }
        if (!in_array($l, $this->collVldPtkTerdaftars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPtkTerdaftar($l);
        }

        return $this;
    }

    /**
     * @param	VldPtkTerdaftar $vldPtkTerdaftar The vldPtkTerdaftar object to add.
     */
    protected function doAddVldPtkTerdaftar($vldPtkTerdaftar)
    {
        $this->collVldPtkTerdaftars[]= $vldPtkTerdaftar;
        $vldPtkTerdaftar->setErrortype($this);
    }

    /**
     * @param	VldPtkTerdaftar $vldPtkTerdaftar The vldPtkTerdaftar object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldPtkTerdaftar($vldPtkTerdaftar)
    {
        if ($this->getVldPtkTerdaftars()->contains($vldPtkTerdaftar)) {
            $this->collVldPtkTerdaftars->remove($this->collVldPtkTerdaftars->search($vldPtkTerdaftar));
            if (null === $this->vldPtkTerdaftarsScheduledForDeletion) {
                $this->vldPtkTerdaftarsScheduledForDeletion = clone $this->collVldPtkTerdaftars;
                $this->vldPtkTerdaftarsScheduledForDeletion->clear();
            }
            $this->vldPtkTerdaftarsScheduledForDeletion[]= clone $vldPtkTerdaftar;
            $vldPtkTerdaftar->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldPtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPtkTerdaftar[] List of VldPtkTerdaftar objects
     */
    public function getVldPtkTerdaftarsJoinPtkTerdaftar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('PtkTerdaftar', $join_behavior);

        return $this->getVldPtkTerdaftars($query, $con);
    }

    /**
     * Clears out the collVldRegPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldRegPds()
     */
    public function clearVldRegPds()
    {
        $this->collVldRegPds = null; // important to set this to null since that means it is uninitialized
        $this->collVldRegPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRegPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRegPds($v = true)
    {
        $this->collVldRegPdsPartial = $v;
    }

    /**
     * Initializes the collVldRegPds collection.
     *
     * By default this just sets the collVldRegPds collection to an empty array (like clearcollVldRegPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRegPds($overrideExisting = true)
    {
        if (null !== $this->collVldRegPds && !$overrideExisting) {
            return;
        }
        $this->collVldRegPds = new PropelObjectCollection();
        $this->collVldRegPds->setModel('VldRegPd');
    }

    /**
     * Gets an array of VldRegPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRegPd[] List of VldRegPd objects
     * @throws PropelException
     */
    public function getVldRegPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRegPdsPartial && !$this->isNew();
        if (null === $this->collVldRegPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRegPds) {
                // return empty collection
                $this->initVldRegPds();
            } else {
                $collVldRegPds = VldRegPdQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRegPdsPartial && count($collVldRegPds)) {
                      $this->initVldRegPds(false);

                      foreach($collVldRegPds as $obj) {
                        if (false == $this->collVldRegPds->contains($obj)) {
                          $this->collVldRegPds->append($obj);
                        }
                      }

                      $this->collVldRegPdsPartial = true;
                    }

                    $collVldRegPds->getInternalIterator()->rewind();
                    return $collVldRegPds;
                }

                if($partial && $this->collVldRegPds) {
                    foreach($this->collVldRegPds as $obj) {
                        if($obj->isNew()) {
                            $collVldRegPds[] = $obj;
                        }
                    }
                }

                $this->collVldRegPds = $collVldRegPds;
                $this->collVldRegPdsPartial = false;
            }
        }

        return $this->collVldRegPds;
    }

    /**
     * Sets a collection of VldRegPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRegPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRegPds(PropelCollection $vldRegPds, PropelPDO $con = null)
    {
        $vldRegPdsToDelete = $this->getVldRegPds(new Criteria(), $con)->diff($vldRegPds);

        $this->vldRegPdsScheduledForDeletion = unserialize(serialize($vldRegPdsToDelete));

        foreach ($vldRegPdsToDelete as $vldRegPdRemoved) {
            $vldRegPdRemoved->setErrortype(null);
        }

        $this->collVldRegPds = null;
        foreach ($vldRegPds as $vldRegPd) {
            $this->addVldRegPd($vldRegPd);
        }

        $this->collVldRegPds = $vldRegPds;
        $this->collVldRegPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRegPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRegPd objects.
     * @throws PropelException
     */
    public function countVldRegPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRegPdsPartial && !$this->isNew();
        if (null === $this->collVldRegPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRegPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRegPds());
            }
            $query = VldRegPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRegPds);
    }

    /**
     * Method called to associate a VldRegPd object to this object
     * through the VldRegPd foreign key attribute.
     *
     * @param    VldRegPd $l VldRegPd
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldRegPd(VldRegPd $l)
    {
        if ($this->collVldRegPds === null) {
            $this->initVldRegPds();
            $this->collVldRegPdsPartial = true;
        }
        if (!in_array($l, $this->collVldRegPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRegPd($l);
        }

        return $this;
    }

    /**
     * @param	VldRegPd $vldRegPd The vldRegPd object to add.
     */
    protected function doAddVldRegPd($vldRegPd)
    {
        $this->collVldRegPds[]= $vldRegPd;
        $vldRegPd->setErrortype($this);
    }

    /**
     * @param	VldRegPd $vldRegPd The vldRegPd object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldRegPd($vldRegPd)
    {
        if ($this->getVldRegPds()->contains($vldRegPd)) {
            $this->collVldRegPds->remove($this->collVldRegPds->search($vldRegPd));
            if (null === $this->vldRegPdsScheduledForDeletion) {
                $this->vldRegPdsScheduledForDeletion = clone $this->collVldRegPds;
                $this->vldRegPdsScheduledForDeletion->clear();
            }
            $this->vldRegPdsScheduledForDeletion[]= clone $vldRegPd;
            $vldRegPd->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRegPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRegPd[] List of VldRegPd objects
     */
    public function getVldRegPdsJoinRegistrasiPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRegPdQuery::create(null, $criteria);
        $query->joinWith('RegistrasiPesertaDidik', $join_behavior);

        return $this->getVldRegPds($query, $con);
    }

    /**
     * Clears out the collVldRombels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldRombels()
     */
    public function clearVldRombels()
    {
        $this->collVldRombels = null; // important to set this to null since that means it is uninitialized
        $this->collVldRombelsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRombels collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRombels($v = true)
    {
        $this->collVldRombelsPartial = $v;
    }

    /**
     * Initializes the collVldRombels collection.
     *
     * By default this just sets the collVldRombels collection to an empty array (like clearcollVldRombels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRombels($overrideExisting = true)
    {
        if (null !== $this->collVldRombels && !$overrideExisting) {
            return;
        }
        $this->collVldRombels = new PropelObjectCollection();
        $this->collVldRombels->setModel('VldRombel');
    }

    /**
     * Gets an array of VldRombel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRombel[] List of VldRombel objects
     * @throws PropelException
     */
    public function getVldRombels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRombelsPartial && !$this->isNew();
        if (null === $this->collVldRombels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRombels) {
                // return empty collection
                $this->initVldRombels();
            } else {
                $collVldRombels = VldRombelQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRombelsPartial && count($collVldRombels)) {
                      $this->initVldRombels(false);

                      foreach($collVldRombels as $obj) {
                        if (false == $this->collVldRombels->contains($obj)) {
                          $this->collVldRombels->append($obj);
                        }
                      }

                      $this->collVldRombelsPartial = true;
                    }

                    $collVldRombels->getInternalIterator()->rewind();
                    return $collVldRombels;
                }

                if($partial && $this->collVldRombels) {
                    foreach($this->collVldRombels as $obj) {
                        if($obj->isNew()) {
                            $collVldRombels[] = $obj;
                        }
                    }
                }

                $this->collVldRombels = $collVldRombels;
                $this->collVldRombelsPartial = false;
            }
        }

        return $this->collVldRombels;
    }

    /**
     * Sets a collection of VldRombel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRombels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRombels(PropelCollection $vldRombels, PropelPDO $con = null)
    {
        $vldRombelsToDelete = $this->getVldRombels(new Criteria(), $con)->diff($vldRombels);

        $this->vldRombelsScheduledForDeletion = unserialize(serialize($vldRombelsToDelete));

        foreach ($vldRombelsToDelete as $vldRombelRemoved) {
            $vldRombelRemoved->setErrortype(null);
        }

        $this->collVldRombels = null;
        foreach ($vldRombels as $vldRombel) {
            $this->addVldRombel($vldRombel);
        }

        $this->collVldRombels = $vldRombels;
        $this->collVldRombelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRombel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRombel objects.
     * @throws PropelException
     */
    public function countVldRombels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRombelsPartial && !$this->isNew();
        if (null === $this->collVldRombels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRombels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRombels());
            }
            $query = VldRombelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRombels);
    }

    /**
     * Method called to associate a VldRombel object to this object
     * through the VldRombel foreign key attribute.
     *
     * @param    VldRombel $l VldRombel
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldRombel(VldRombel $l)
    {
        if ($this->collVldRombels === null) {
            $this->initVldRombels();
            $this->collVldRombelsPartial = true;
        }
        if (!in_array($l, $this->collVldRombels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRombel($l);
        }

        return $this;
    }

    /**
     * @param	VldRombel $vldRombel The vldRombel object to add.
     */
    protected function doAddVldRombel($vldRombel)
    {
        $this->collVldRombels[]= $vldRombel;
        $vldRombel->setErrortype($this);
    }

    /**
     * @param	VldRombel $vldRombel The vldRombel object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldRombel($vldRombel)
    {
        if ($this->getVldRombels()->contains($vldRombel)) {
            $this->collVldRombels->remove($this->collVldRombels->search($vldRombel));
            if (null === $this->vldRombelsScheduledForDeletion) {
                $this->vldRombelsScheduledForDeletion = clone $this->collVldRombels;
                $this->vldRombelsScheduledForDeletion->clear();
            }
            $this->vldRombelsScheduledForDeletion[]= clone $vldRombel;
            $vldRombel->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRombels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRombel[] List of VldRombel objects
     */
    public function getVldRombelsJoinRombonganBelajar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRombelQuery::create(null, $criteria);
        $query->joinWith('RombonganBelajar', $join_behavior);

        return $this->getVldRombels($query, $con);
    }

    /**
     * Clears out the collVldRwyFungsionals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldRwyFungsionals()
     */
    public function clearVldRwyFungsionals()
    {
        $this->collVldRwyFungsionals = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwyFungsionalsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwyFungsionals collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwyFungsionals($v = true)
    {
        $this->collVldRwyFungsionalsPartial = $v;
    }

    /**
     * Initializes the collVldRwyFungsionals collection.
     *
     * By default this just sets the collVldRwyFungsionals collection to an empty array (like clearcollVldRwyFungsionals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwyFungsionals($overrideExisting = true)
    {
        if (null !== $this->collVldRwyFungsionals && !$overrideExisting) {
            return;
        }
        $this->collVldRwyFungsionals = new PropelObjectCollection();
        $this->collVldRwyFungsionals->setModel('VldRwyFungsional');
    }

    /**
     * Gets an array of VldRwyFungsional objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwyFungsional[] List of VldRwyFungsional objects
     * @throws PropelException
     */
    public function getVldRwyFungsionals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyFungsionalsPartial && !$this->isNew();
        if (null === $this->collVldRwyFungsionals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwyFungsionals) {
                // return empty collection
                $this->initVldRwyFungsionals();
            } else {
                $collVldRwyFungsionals = VldRwyFungsionalQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwyFungsionalsPartial && count($collVldRwyFungsionals)) {
                      $this->initVldRwyFungsionals(false);

                      foreach($collVldRwyFungsionals as $obj) {
                        if (false == $this->collVldRwyFungsionals->contains($obj)) {
                          $this->collVldRwyFungsionals->append($obj);
                        }
                      }

                      $this->collVldRwyFungsionalsPartial = true;
                    }

                    $collVldRwyFungsionals->getInternalIterator()->rewind();
                    return $collVldRwyFungsionals;
                }

                if($partial && $this->collVldRwyFungsionals) {
                    foreach($this->collVldRwyFungsionals as $obj) {
                        if($obj->isNew()) {
                            $collVldRwyFungsionals[] = $obj;
                        }
                    }
                }

                $this->collVldRwyFungsionals = $collVldRwyFungsionals;
                $this->collVldRwyFungsionalsPartial = false;
            }
        }

        return $this->collVldRwyFungsionals;
    }

    /**
     * Sets a collection of VldRwyFungsional objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwyFungsionals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRwyFungsionals(PropelCollection $vldRwyFungsionals, PropelPDO $con = null)
    {
        $vldRwyFungsionalsToDelete = $this->getVldRwyFungsionals(new Criteria(), $con)->diff($vldRwyFungsionals);

        $this->vldRwyFungsionalsScheduledForDeletion = unserialize(serialize($vldRwyFungsionalsToDelete));

        foreach ($vldRwyFungsionalsToDelete as $vldRwyFungsionalRemoved) {
            $vldRwyFungsionalRemoved->setErrortype(null);
        }

        $this->collVldRwyFungsionals = null;
        foreach ($vldRwyFungsionals as $vldRwyFungsional) {
            $this->addVldRwyFungsional($vldRwyFungsional);
        }

        $this->collVldRwyFungsionals = $vldRwyFungsionals;
        $this->collVldRwyFungsionalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwyFungsional objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwyFungsional objects.
     * @throws PropelException
     */
    public function countVldRwyFungsionals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyFungsionalsPartial && !$this->isNew();
        if (null === $this->collVldRwyFungsionals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwyFungsionals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwyFungsionals());
            }
            $query = VldRwyFungsionalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRwyFungsionals);
    }

    /**
     * Method called to associate a VldRwyFungsional object to this object
     * through the VldRwyFungsional foreign key attribute.
     *
     * @param    VldRwyFungsional $l VldRwyFungsional
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldRwyFungsional(VldRwyFungsional $l)
    {
        if ($this->collVldRwyFungsionals === null) {
            $this->initVldRwyFungsionals();
            $this->collVldRwyFungsionalsPartial = true;
        }
        if (!in_array($l, $this->collVldRwyFungsionals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwyFungsional($l);
        }

        return $this;
    }

    /**
     * @param	VldRwyFungsional $vldRwyFungsional The vldRwyFungsional object to add.
     */
    protected function doAddVldRwyFungsional($vldRwyFungsional)
    {
        $this->collVldRwyFungsionals[]= $vldRwyFungsional;
        $vldRwyFungsional->setErrortype($this);
    }

    /**
     * @param	VldRwyFungsional $vldRwyFungsional The vldRwyFungsional object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldRwyFungsional($vldRwyFungsional)
    {
        if ($this->getVldRwyFungsionals()->contains($vldRwyFungsional)) {
            $this->collVldRwyFungsionals->remove($this->collVldRwyFungsionals->search($vldRwyFungsional));
            if (null === $this->vldRwyFungsionalsScheduledForDeletion) {
                $this->vldRwyFungsionalsScheduledForDeletion = clone $this->collVldRwyFungsionals;
                $this->vldRwyFungsionalsScheduledForDeletion->clear();
            }
            $this->vldRwyFungsionalsScheduledForDeletion[]= clone $vldRwyFungsional;
            $vldRwyFungsional->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRwyFungsionals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyFungsional[] List of VldRwyFungsional objects
     */
    public function getVldRwyFungsionalsJoinRwyFungsional($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyFungsionalQuery::create(null, $criteria);
        $query->joinWith('RwyFungsional', $join_behavior);

        return $this->getVldRwyFungsionals($query, $con);
    }

    /**
     * Clears out the collVldRwyKepangkatans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldRwyKepangkatans()
     */
    public function clearVldRwyKepangkatans()
    {
        $this->collVldRwyKepangkatans = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwyKepangkatansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwyKepangkatans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwyKepangkatans($v = true)
    {
        $this->collVldRwyKepangkatansPartial = $v;
    }

    /**
     * Initializes the collVldRwyKepangkatans collection.
     *
     * By default this just sets the collVldRwyKepangkatans collection to an empty array (like clearcollVldRwyKepangkatans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwyKepangkatans($overrideExisting = true)
    {
        if (null !== $this->collVldRwyKepangkatans && !$overrideExisting) {
            return;
        }
        $this->collVldRwyKepangkatans = new PropelObjectCollection();
        $this->collVldRwyKepangkatans->setModel('VldRwyKepangkatan');
    }

    /**
     * Gets an array of VldRwyKepangkatan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwyKepangkatan[] List of VldRwyKepangkatan objects
     * @throws PropelException
     */
    public function getVldRwyKepangkatans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyKepangkatansPartial && !$this->isNew();
        if (null === $this->collVldRwyKepangkatans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwyKepangkatans) {
                // return empty collection
                $this->initVldRwyKepangkatans();
            } else {
                $collVldRwyKepangkatans = VldRwyKepangkatanQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwyKepangkatansPartial && count($collVldRwyKepangkatans)) {
                      $this->initVldRwyKepangkatans(false);

                      foreach($collVldRwyKepangkatans as $obj) {
                        if (false == $this->collVldRwyKepangkatans->contains($obj)) {
                          $this->collVldRwyKepangkatans->append($obj);
                        }
                      }

                      $this->collVldRwyKepangkatansPartial = true;
                    }

                    $collVldRwyKepangkatans->getInternalIterator()->rewind();
                    return $collVldRwyKepangkatans;
                }

                if($partial && $this->collVldRwyKepangkatans) {
                    foreach($this->collVldRwyKepangkatans as $obj) {
                        if($obj->isNew()) {
                            $collVldRwyKepangkatans[] = $obj;
                        }
                    }
                }

                $this->collVldRwyKepangkatans = $collVldRwyKepangkatans;
                $this->collVldRwyKepangkatansPartial = false;
            }
        }

        return $this->collVldRwyKepangkatans;
    }

    /**
     * Sets a collection of VldRwyKepangkatan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwyKepangkatans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRwyKepangkatans(PropelCollection $vldRwyKepangkatans, PropelPDO $con = null)
    {
        $vldRwyKepangkatansToDelete = $this->getVldRwyKepangkatans(new Criteria(), $con)->diff($vldRwyKepangkatans);

        $this->vldRwyKepangkatansScheduledForDeletion = unserialize(serialize($vldRwyKepangkatansToDelete));

        foreach ($vldRwyKepangkatansToDelete as $vldRwyKepangkatanRemoved) {
            $vldRwyKepangkatanRemoved->setErrortype(null);
        }

        $this->collVldRwyKepangkatans = null;
        foreach ($vldRwyKepangkatans as $vldRwyKepangkatan) {
            $this->addVldRwyKepangkatan($vldRwyKepangkatan);
        }

        $this->collVldRwyKepangkatans = $vldRwyKepangkatans;
        $this->collVldRwyKepangkatansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwyKepangkatan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwyKepangkatan objects.
     * @throws PropelException
     */
    public function countVldRwyKepangkatans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyKepangkatansPartial && !$this->isNew();
        if (null === $this->collVldRwyKepangkatans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwyKepangkatans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwyKepangkatans());
            }
            $query = VldRwyKepangkatanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRwyKepangkatans);
    }

    /**
     * Method called to associate a VldRwyKepangkatan object to this object
     * through the VldRwyKepangkatan foreign key attribute.
     *
     * @param    VldRwyKepangkatan $l VldRwyKepangkatan
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldRwyKepangkatan(VldRwyKepangkatan $l)
    {
        if ($this->collVldRwyKepangkatans === null) {
            $this->initVldRwyKepangkatans();
            $this->collVldRwyKepangkatansPartial = true;
        }
        if (!in_array($l, $this->collVldRwyKepangkatans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwyKepangkatan($l);
        }

        return $this;
    }

    /**
     * @param	VldRwyKepangkatan $vldRwyKepangkatan The vldRwyKepangkatan object to add.
     */
    protected function doAddVldRwyKepangkatan($vldRwyKepangkatan)
    {
        $this->collVldRwyKepangkatans[]= $vldRwyKepangkatan;
        $vldRwyKepangkatan->setErrortype($this);
    }

    /**
     * @param	VldRwyKepangkatan $vldRwyKepangkatan The vldRwyKepangkatan object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldRwyKepangkatan($vldRwyKepangkatan)
    {
        if ($this->getVldRwyKepangkatans()->contains($vldRwyKepangkatan)) {
            $this->collVldRwyKepangkatans->remove($this->collVldRwyKepangkatans->search($vldRwyKepangkatan));
            if (null === $this->vldRwyKepangkatansScheduledForDeletion) {
                $this->vldRwyKepangkatansScheduledForDeletion = clone $this->collVldRwyKepangkatans;
                $this->vldRwyKepangkatansScheduledForDeletion->clear();
            }
            $this->vldRwyKepangkatansScheduledForDeletion[]= clone $vldRwyKepangkatan;
            $vldRwyKepangkatan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRwyKepangkatans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyKepangkatan[] List of VldRwyKepangkatan objects
     */
    public function getVldRwyKepangkatansJoinRwyKepangkatan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyKepangkatanQuery::create(null, $criteria);
        $query->joinWith('RwyKepangkatan', $join_behavior);

        return $this->getVldRwyKepangkatans($query, $con);
    }

    /**
     * Clears out the collVldRwyKerjas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
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
     * If this Errortype is new, it will return
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
                    ->filterByErrortype($this)
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
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRwyKerjas(PropelCollection $vldRwyKerjas, PropelPDO $con = null)
    {
        $vldRwyKerjasToDelete = $this->getVldRwyKerjas(new Criteria(), $con)->diff($vldRwyKerjas);

        $this->vldRwyKerjasScheduledForDeletion = unserialize(serialize($vldRwyKerjasToDelete));

        foreach ($vldRwyKerjasToDelete as $vldRwyKerjaRemoved) {
            $vldRwyKerjaRemoved->setErrortype(null);
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
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRwyKerjas);
    }

    /**
     * Method called to associate a VldRwyKerja object to this object
     * through the VldRwyKerja foreign key attribute.
     *
     * @param    VldRwyKerja $l VldRwyKerja
     * @return Errortype The current object (for fluent API support)
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
        $vldRwyKerja->setErrortype($this);
    }

    /**
     * @param	VldRwyKerja $vldRwyKerja The vldRwyKerja object to remove.
     * @return Errortype The current object (for fluent API support)
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
            $vldRwyKerja->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyKerja[] List of VldRwyKerja objects
     */
    public function getVldRwyKerjasJoinRwyKerja($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyKerjaQuery::create(null, $criteria);
        $query->joinWith('RwyKerja', $join_behavior);

        return $this->getVldRwyKerjas($query, $con);
    }

    /**
     * Clears out the collVldRwyPendFormals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldRwyPendFormals()
     */
    public function clearVldRwyPendFormals()
    {
        $this->collVldRwyPendFormals = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwyPendFormalsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwyPendFormals collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwyPendFormals($v = true)
    {
        $this->collVldRwyPendFormalsPartial = $v;
    }

    /**
     * Initializes the collVldRwyPendFormals collection.
     *
     * By default this just sets the collVldRwyPendFormals collection to an empty array (like clearcollVldRwyPendFormals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwyPendFormals($overrideExisting = true)
    {
        if (null !== $this->collVldRwyPendFormals && !$overrideExisting) {
            return;
        }
        $this->collVldRwyPendFormals = new PropelObjectCollection();
        $this->collVldRwyPendFormals->setModel('VldRwyPendFormal');
    }

    /**
     * Gets an array of VldRwyPendFormal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwyPendFormal[] List of VldRwyPendFormal objects
     * @throws PropelException
     */
    public function getVldRwyPendFormals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collVldRwyPendFormals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwyPendFormals) {
                // return empty collection
                $this->initVldRwyPendFormals();
            } else {
                $collVldRwyPendFormals = VldRwyPendFormalQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwyPendFormalsPartial && count($collVldRwyPendFormals)) {
                      $this->initVldRwyPendFormals(false);

                      foreach($collVldRwyPendFormals as $obj) {
                        if (false == $this->collVldRwyPendFormals->contains($obj)) {
                          $this->collVldRwyPendFormals->append($obj);
                        }
                      }

                      $this->collVldRwyPendFormalsPartial = true;
                    }

                    $collVldRwyPendFormals->getInternalIterator()->rewind();
                    return $collVldRwyPendFormals;
                }

                if($partial && $this->collVldRwyPendFormals) {
                    foreach($this->collVldRwyPendFormals as $obj) {
                        if($obj->isNew()) {
                            $collVldRwyPendFormals[] = $obj;
                        }
                    }
                }

                $this->collVldRwyPendFormals = $collVldRwyPendFormals;
                $this->collVldRwyPendFormalsPartial = false;
            }
        }

        return $this->collVldRwyPendFormals;
    }

    /**
     * Sets a collection of VldRwyPendFormal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwyPendFormals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRwyPendFormals(PropelCollection $vldRwyPendFormals, PropelPDO $con = null)
    {
        $vldRwyPendFormalsToDelete = $this->getVldRwyPendFormals(new Criteria(), $con)->diff($vldRwyPendFormals);

        $this->vldRwyPendFormalsScheduledForDeletion = unserialize(serialize($vldRwyPendFormalsToDelete));

        foreach ($vldRwyPendFormalsToDelete as $vldRwyPendFormalRemoved) {
            $vldRwyPendFormalRemoved->setErrortype(null);
        }

        $this->collVldRwyPendFormals = null;
        foreach ($vldRwyPendFormals as $vldRwyPendFormal) {
            $this->addVldRwyPendFormal($vldRwyPendFormal);
        }

        $this->collVldRwyPendFormals = $vldRwyPendFormals;
        $this->collVldRwyPendFormalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwyPendFormal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwyPendFormal objects.
     * @throws PropelException
     */
    public function countVldRwyPendFormals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collVldRwyPendFormals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwyPendFormals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwyPendFormals());
            }
            $query = VldRwyPendFormalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRwyPendFormals);
    }

    /**
     * Method called to associate a VldRwyPendFormal object to this object
     * through the VldRwyPendFormal foreign key attribute.
     *
     * @param    VldRwyPendFormal $l VldRwyPendFormal
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldRwyPendFormal(VldRwyPendFormal $l)
    {
        if ($this->collVldRwyPendFormals === null) {
            $this->initVldRwyPendFormals();
            $this->collVldRwyPendFormalsPartial = true;
        }
        if (!in_array($l, $this->collVldRwyPendFormals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwyPendFormal($l);
        }

        return $this;
    }

    /**
     * @param	VldRwyPendFormal $vldRwyPendFormal The vldRwyPendFormal object to add.
     */
    protected function doAddVldRwyPendFormal($vldRwyPendFormal)
    {
        $this->collVldRwyPendFormals[]= $vldRwyPendFormal;
        $vldRwyPendFormal->setErrortype($this);
    }

    /**
     * @param	VldRwyPendFormal $vldRwyPendFormal The vldRwyPendFormal object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldRwyPendFormal($vldRwyPendFormal)
    {
        if ($this->getVldRwyPendFormals()->contains($vldRwyPendFormal)) {
            $this->collVldRwyPendFormals->remove($this->collVldRwyPendFormals->search($vldRwyPendFormal));
            if (null === $this->vldRwyPendFormalsScheduledForDeletion) {
                $this->vldRwyPendFormalsScheduledForDeletion = clone $this->collVldRwyPendFormals;
                $this->vldRwyPendFormalsScheduledForDeletion->clear();
            }
            $this->vldRwyPendFormalsScheduledForDeletion[]= clone $vldRwyPendFormal;
            $vldRwyPendFormal->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyPendFormal[] List of VldRwyPendFormal objects
     */
    public function getVldRwyPendFormalsJoinRwyPendFormal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('RwyPendFormal', $join_behavior);

        return $this->getVldRwyPendFormals($query, $con);
    }

    /**
     * Clears out the collVldRwySertifikasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldRwySertifikasis()
     */
    public function clearVldRwySertifikasis()
    {
        $this->collVldRwySertifikasis = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwySertifikasisPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwySertifikasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwySertifikasis($v = true)
    {
        $this->collVldRwySertifikasisPartial = $v;
    }

    /**
     * Initializes the collVldRwySertifikasis collection.
     *
     * By default this just sets the collVldRwySertifikasis collection to an empty array (like clearcollVldRwySertifikasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwySertifikasis($overrideExisting = true)
    {
        if (null !== $this->collVldRwySertifikasis && !$overrideExisting) {
            return;
        }
        $this->collVldRwySertifikasis = new PropelObjectCollection();
        $this->collVldRwySertifikasis->setModel('VldRwySertifikasi');
    }

    /**
     * Gets an array of VldRwySertifikasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwySertifikasi[] List of VldRwySertifikasi objects
     * @throws PropelException
     */
    public function getVldRwySertifikasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collVldRwySertifikasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwySertifikasis) {
                // return empty collection
                $this->initVldRwySertifikasis();
            } else {
                $collVldRwySertifikasis = VldRwySertifikasiQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwySertifikasisPartial && count($collVldRwySertifikasis)) {
                      $this->initVldRwySertifikasis(false);

                      foreach($collVldRwySertifikasis as $obj) {
                        if (false == $this->collVldRwySertifikasis->contains($obj)) {
                          $this->collVldRwySertifikasis->append($obj);
                        }
                      }

                      $this->collVldRwySertifikasisPartial = true;
                    }

                    $collVldRwySertifikasis->getInternalIterator()->rewind();
                    return $collVldRwySertifikasis;
                }

                if($partial && $this->collVldRwySertifikasis) {
                    foreach($this->collVldRwySertifikasis as $obj) {
                        if($obj->isNew()) {
                            $collVldRwySertifikasis[] = $obj;
                        }
                    }
                }

                $this->collVldRwySertifikasis = $collVldRwySertifikasis;
                $this->collVldRwySertifikasisPartial = false;
            }
        }

        return $this->collVldRwySertifikasis;
    }

    /**
     * Sets a collection of VldRwySertifikasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwySertifikasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRwySertifikasis(PropelCollection $vldRwySertifikasis, PropelPDO $con = null)
    {
        $vldRwySertifikasisToDelete = $this->getVldRwySertifikasis(new Criteria(), $con)->diff($vldRwySertifikasis);

        $this->vldRwySertifikasisScheduledForDeletion = unserialize(serialize($vldRwySertifikasisToDelete));

        foreach ($vldRwySertifikasisToDelete as $vldRwySertifikasiRemoved) {
            $vldRwySertifikasiRemoved->setErrortype(null);
        }

        $this->collVldRwySertifikasis = null;
        foreach ($vldRwySertifikasis as $vldRwySertifikasi) {
            $this->addVldRwySertifikasi($vldRwySertifikasi);
        }

        $this->collVldRwySertifikasis = $vldRwySertifikasis;
        $this->collVldRwySertifikasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwySertifikasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwySertifikasi objects.
     * @throws PropelException
     */
    public function countVldRwySertifikasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collVldRwySertifikasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwySertifikasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwySertifikasis());
            }
            $query = VldRwySertifikasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRwySertifikasis);
    }

    /**
     * Method called to associate a VldRwySertifikasi object to this object
     * through the VldRwySertifikasi foreign key attribute.
     *
     * @param    VldRwySertifikasi $l VldRwySertifikasi
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldRwySertifikasi(VldRwySertifikasi $l)
    {
        if ($this->collVldRwySertifikasis === null) {
            $this->initVldRwySertifikasis();
            $this->collVldRwySertifikasisPartial = true;
        }
        if (!in_array($l, $this->collVldRwySertifikasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwySertifikasi($l);
        }

        return $this;
    }

    /**
     * @param	VldRwySertifikasi $vldRwySertifikasi The vldRwySertifikasi object to add.
     */
    protected function doAddVldRwySertifikasi($vldRwySertifikasi)
    {
        $this->collVldRwySertifikasis[]= $vldRwySertifikasi;
        $vldRwySertifikasi->setErrortype($this);
    }

    /**
     * @param	VldRwySertifikasi $vldRwySertifikasi The vldRwySertifikasi object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldRwySertifikasi($vldRwySertifikasi)
    {
        if ($this->getVldRwySertifikasis()->contains($vldRwySertifikasi)) {
            $this->collVldRwySertifikasis->remove($this->collVldRwySertifikasis->search($vldRwySertifikasi));
            if (null === $this->vldRwySertifikasisScheduledForDeletion) {
                $this->vldRwySertifikasisScheduledForDeletion = clone $this->collVldRwySertifikasis;
                $this->vldRwySertifikasisScheduledForDeletion->clear();
            }
            $this->vldRwySertifikasisScheduledForDeletion[]= clone $vldRwySertifikasi;
            $vldRwySertifikasi->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwySertifikasi[] List of VldRwySertifikasi objects
     */
    public function getVldRwySertifikasisJoinRwySertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('RwySertifikasi', $join_behavior);

        return $this->getVldRwySertifikasis($query, $con);
    }

    /**
     * Clears out the collVldRwyStrukturals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldRwyStrukturals()
     */
    public function clearVldRwyStrukturals()
    {
        $this->collVldRwyStrukturals = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwyStrukturalsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwyStrukturals collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwyStrukturals($v = true)
    {
        $this->collVldRwyStrukturalsPartial = $v;
    }

    /**
     * Initializes the collVldRwyStrukturals collection.
     *
     * By default this just sets the collVldRwyStrukturals collection to an empty array (like clearcollVldRwyStrukturals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwyStrukturals($overrideExisting = true)
    {
        if (null !== $this->collVldRwyStrukturals && !$overrideExisting) {
            return;
        }
        $this->collVldRwyStrukturals = new PropelObjectCollection();
        $this->collVldRwyStrukturals->setModel('VldRwyStruktural');
    }

    /**
     * Gets an array of VldRwyStruktural objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwyStruktural[] List of VldRwyStruktural objects
     * @throws PropelException
     */
    public function getVldRwyStrukturals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyStrukturalsPartial && !$this->isNew();
        if (null === $this->collVldRwyStrukturals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwyStrukturals) {
                // return empty collection
                $this->initVldRwyStrukturals();
            } else {
                $collVldRwyStrukturals = VldRwyStrukturalQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwyStrukturalsPartial && count($collVldRwyStrukturals)) {
                      $this->initVldRwyStrukturals(false);

                      foreach($collVldRwyStrukturals as $obj) {
                        if (false == $this->collVldRwyStrukturals->contains($obj)) {
                          $this->collVldRwyStrukturals->append($obj);
                        }
                      }

                      $this->collVldRwyStrukturalsPartial = true;
                    }

                    $collVldRwyStrukturals->getInternalIterator()->rewind();
                    return $collVldRwyStrukturals;
                }

                if($partial && $this->collVldRwyStrukturals) {
                    foreach($this->collVldRwyStrukturals as $obj) {
                        if($obj->isNew()) {
                            $collVldRwyStrukturals[] = $obj;
                        }
                    }
                }

                $this->collVldRwyStrukturals = $collVldRwyStrukturals;
                $this->collVldRwyStrukturalsPartial = false;
            }
        }

        return $this->collVldRwyStrukturals;
    }

    /**
     * Sets a collection of VldRwyStruktural objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwyStrukturals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldRwyStrukturals(PropelCollection $vldRwyStrukturals, PropelPDO $con = null)
    {
        $vldRwyStrukturalsToDelete = $this->getVldRwyStrukturals(new Criteria(), $con)->diff($vldRwyStrukturals);

        $this->vldRwyStrukturalsScheduledForDeletion = unserialize(serialize($vldRwyStrukturalsToDelete));

        foreach ($vldRwyStrukturalsToDelete as $vldRwyStrukturalRemoved) {
            $vldRwyStrukturalRemoved->setErrortype(null);
        }

        $this->collVldRwyStrukturals = null;
        foreach ($vldRwyStrukturals as $vldRwyStruktural) {
            $this->addVldRwyStruktural($vldRwyStruktural);
        }

        $this->collVldRwyStrukturals = $vldRwyStrukturals;
        $this->collVldRwyStrukturalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwyStruktural objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwyStruktural objects.
     * @throws PropelException
     */
    public function countVldRwyStrukturals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyStrukturalsPartial && !$this->isNew();
        if (null === $this->collVldRwyStrukturals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwyStrukturals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwyStrukturals());
            }
            $query = VldRwyStrukturalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldRwyStrukturals);
    }

    /**
     * Method called to associate a VldRwyStruktural object to this object
     * through the VldRwyStruktural foreign key attribute.
     *
     * @param    VldRwyStruktural $l VldRwyStruktural
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldRwyStruktural(VldRwyStruktural $l)
    {
        if ($this->collVldRwyStrukturals === null) {
            $this->initVldRwyStrukturals();
            $this->collVldRwyStrukturalsPartial = true;
        }
        if (!in_array($l, $this->collVldRwyStrukturals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwyStruktural($l);
        }

        return $this;
    }

    /**
     * @param	VldRwyStruktural $vldRwyStruktural The vldRwyStruktural object to add.
     */
    protected function doAddVldRwyStruktural($vldRwyStruktural)
    {
        $this->collVldRwyStrukturals[]= $vldRwyStruktural;
        $vldRwyStruktural->setErrortype($this);
    }

    /**
     * @param	VldRwyStruktural $vldRwyStruktural The vldRwyStruktural object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldRwyStruktural($vldRwyStruktural)
    {
        if ($this->getVldRwyStrukturals()->contains($vldRwyStruktural)) {
            $this->collVldRwyStrukturals->remove($this->collVldRwyStrukturals->search($vldRwyStruktural));
            if (null === $this->vldRwyStrukturalsScheduledForDeletion) {
                $this->vldRwyStrukturalsScheduledForDeletion = clone $this->collVldRwyStrukturals;
                $this->vldRwyStrukturalsScheduledForDeletion->clear();
            }
            $this->vldRwyStrukturalsScheduledForDeletion[]= clone $vldRwyStruktural;
            $vldRwyStruktural->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldRwyStrukturals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyStruktural[] List of VldRwyStruktural objects
     */
    public function getVldRwyStrukturalsJoinRwyStruktural($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyStrukturalQuery::create(null, $criteria);
        $query->joinWith('RwyStruktural', $join_behavior);

        return $this->getVldRwyStrukturals($query, $con);
    }

    /**
     * Clears out the collVldSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldSekolahs()
     */
    public function clearVldSekolahs()
    {
        $this->collVldSekolahs = null; // important to set this to null since that means it is uninitialized
        $this->collVldSekolahsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldSekolahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldSekolahs($v = true)
    {
        $this->collVldSekolahsPartial = $v;
    }

    /**
     * Initializes the collVldSekolahs collection.
     *
     * By default this just sets the collVldSekolahs collection to an empty array (like clearcollVldSekolahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldSekolahs($overrideExisting = true)
    {
        if (null !== $this->collVldSekolahs && !$overrideExisting) {
            return;
        }
        $this->collVldSekolahs = new PropelObjectCollection();
        $this->collVldSekolahs->setModel('VldSekolah');
    }

    /**
     * Gets an array of VldSekolah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldSekolah[] List of VldSekolah objects
     * @throws PropelException
     */
    public function getVldSekolahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldSekolahsPartial && !$this->isNew();
        if (null === $this->collVldSekolahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldSekolahs) {
                // return empty collection
                $this->initVldSekolahs();
            } else {
                $collVldSekolahs = VldSekolahQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldSekolahsPartial && count($collVldSekolahs)) {
                      $this->initVldSekolahs(false);

                      foreach($collVldSekolahs as $obj) {
                        if (false == $this->collVldSekolahs->contains($obj)) {
                          $this->collVldSekolahs->append($obj);
                        }
                      }

                      $this->collVldSekolahsPartial = true;
                    }

                    $collVldSekolahs->getInternalIterator()->rewind();
                    return $collVldSekolahs;
                }

                if($partial && $this->collVldSekolahs) {
                    foreach($this->collVldSekolahs as $obj) {
                        if($obj->isNew()) {
                            $collVldSekolahs[] = $obj;
                        }
                    }
                }

                $this->collVldSekolahs = $collVldSekolahs;
                $this->collVldSekolahsPartial = false;
            }
        }

        return $this->collVldSekolahs;
    }

    /**
     * Sets a collection of VldSekolah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldSekolahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldSekolahs(PropelCollection $vldSekolahs, PropelPDO $con = null)
    {
        $vldSekolahsToDelete = $this->getVldSekolahs(new Criteria(), $con)->diff($vldSekolahs);

        $this->vldSekolahsScheduledForDeletion = unserialize(serialize($vldSekolahsToDelete));

        foreach ($vldSekolahsToDelete as $vldSekolahRemoved) {
            $vldSekolahRemoved->setErrortype(null);
        }

        $this->collVldSekolahs = null;
        foreach ($vldSekolahs as $vldSekolah) {
            $this->addVldSekolah($vldSekolah);
        }

        $this->collVldSekolahs = $vldSekolahs;
        $this->collVldSekolahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldSekolah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldSekolah objects.
     * @throws PropelException
     */
    public function countVldSekolahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldSekolahsPartial && !$this->isNew();
        if (null === $this->collVldSekolahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldSekolahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldSekolahs());
            }
            $query = VldSekolahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldSekolahs);
    }

    /**
     * Method called to associate a VldSekolah object to this object
     * through the VldSekolah foreign key attribute.
     *
     * @param    VldSekolah $l VldSekolah
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldSekolah(VldSekolah $l)
    {
        if ($this->collVldSekolahs === null) {
            $this->initVldSekolahs();
            $this->collVldSekolahsPartial = true;
        }
        if (!in_array($l, $this->collVldSekolahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldSekolah($l);
        }

        return $this;
    }

    /**
     * @param	VldSekolah $vldSekolah The vldSekolah object to add.
     */
    protected function doAddVldSekolah($vldSekolah)
    {
        $this->collVldSekolahs[]= $vldSekolah;
        $vldSekolah->setErrortype($this);
    }

    /**
     * @param	VldSekolah $vldSekolah The vldSekolah object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldSekolah($vldSekolah)
    {
        if ($this->getVldSekolahs()->contains($vldSekolah)) {
            $this->collVldSekolahs->remove($this->collVldSekolahs->search($vldSekolah));
            if (null === $this->vldSekolahsScheduledForDeletion) {
                $this->vldSekolahsScheduledForDeletion = clone $this->collVldSekolahs;
                $this->vldSekolahsScheduledForDeletion->clear();
            }
            $this->vldSekolahsScheduledForDeletion[]= clone $vldSekolah;
            $vldSekolah->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldSekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldSekolah[] List of VldSekolah objects
     */
    public function getVldSekolahsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldSekolahQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getVldSekolahs($query, $con);
    }

    /**
     * Clears out the collVldTanahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldTanahs()
     */
    public function clearVldTanahs()
    {
        $this->collVldTanahs = null; // important to set this to null since that means it is uninitialized
        $this->collVldTanahsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldTanahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldTanahs($v = true)
    {
        $this->collVldTanahsPartial = $v;
    }

    /**
     * Initializes the collVldTanahs collection.
     *
     * By default this just sets the collVldTanahs collection to an empty array (like clearcollVldTanahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldTanahs($overrideExisting = true)
    {
        if (null !== $this->collVldTanahs && !$overrideExisting) {
            return;
        }
        $this->collVldTanahs = new PropelObjectCollection();
        $this->collVldTanahs->setModel('VldTanah');
    }

    /**
     * Gets an array of VldTanah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldTanah[] List of VldTanah objects
     * @throws PropelException
     */
    public function getVldTanahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldTanahsPartial && !$this->isNew();
        if (null === $this->collVldTanahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldTanahs) {
                // return empty collection
                $this->initVldTanahs();
            } else {
                $collVldTanahs = VldTanahQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldTanahsPartial && count($collVldTanahs)) {
                      $this->initVldTanahs(false);

                      foreach($collVldTanahs as $obj) {
                        if (false == $this->collVldTanahs->contains($obj)) {
                          $this->collVldTanahs->append($obj);
                        }
                      }

                      $this->collVldTanahsPartial = true;
                    }

                    $collVldTanahs->getInternalIterator()->rewind();
                    return $collVldTanahs;
                }

                if($partial && $this->collVldTanahs) {
                    foreach($this->collVldTanahs as $obj) {
                        if($obj->isNew()) {
                            $collVldTanahs[] = $obj;
                        }
                    }
                }

                $this->collVldTanahs = $collVldTanahs;
                $this->collVldTanahsPartial = false;
            }
        }

        return $this->collVldTanahs;
    }

    /**
     * Sets a collection of VldTanah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldTanahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldTanahs(PropelCollection $vldTanahs, PropelPDO $con = null)
    {
        $vldTanahsToDelete = $this->getVldTanahs(new Criteria(), $con)->diff($vldTanahs);

        $this->vldTanahsScheduledForDeletion = unserialize(serialize($vldTanahsToDelete));

        foreach ($vldTanahsToDelete as $vldTanahRemoved) {
            $vldTanahRemoved->setErrortype(null);
        }

        $this->collVldTanahs = null;
        foreach ($vldTanahs as $vldTanah) {
            $this->addVldTanah($vldTanah);
        }

        $this->collVldTanahs = $vldTanahs;
        $this->collVldTanahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldTanah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldTanah objects.
     * @throws PropelException
     */
    public function countVldTanahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldTanahsPartial && !$this->isNew();
        if (null === $this->collVldTanahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldTanahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldTanahs());
            }
            $query = VldTanahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldTanahs);
    }

    /**
     * Method called to associate a VldTanah object to this object
     * through the VldTanah foreign key attribute.
     *
     * @param    VldTanah $l VldTanah
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldTanah(VldTanah $l)
    {
        if ($this->collVldTanahs === null) {
            $this->initVldTanahs();
            $this->collVldTanahsPartial = true;
        }
        if (!in_array($l, $this->collVldTanahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldTanah($l);
        }

        return $this;
    }

    /**
     * @param	VldTanah $vldTanah The vldTanah object to add.
     */
    protected function doAddVldTanah($vldTanah)
    {
        $this->collVldTanahs[]= $vldTanah;
        $vldTanah->setErrortype($this);
    }

    /**
     * @param	VldTanah $vldTanah The vldTanah object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldTanah($vldTanah)
    {
        if ($this->getVldTanahs()->contains($vldTanah)) {
            $this->collVldTanahs->remove($this->collVldTanahs->search($vldTanah));
            if (null === $this->vldTanahsScheduledForDeletion) {
                $this->vldTanahsScheduledForDeletion = clone $this->collVldTanahs;
                $this->vldTanahsScheduledForDeletion->clear();
            }
            $this->vldTanahsScheduledForDeletion[]= clone $vldTanah;
            $vldTanah->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldTanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldTanah[] List of VldTanah objects
     */
    public function getVldTanahsJoinTanah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldTanahQuery::create(null, $criteria);
        $query->joinWith('Tanah', $join_behavior);

        return $this->getVldTanahs($query, $con);
    }

    /**
     * Clears out the collVldTugasTambahans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldTugasTambahans()
     */
    public function clearVldTugasTambahans()
    {
        $this->collVldTugasTambahans = null; // important to set this to null since that means it is uninitialized
        $this->collVldTugasTambahansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldTugasTambahans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldTugasTambahans($v = true)
    {
        $this->collVldTugasTambahansPartial = $v;
    }

    /**
     * Initializes the collVldTugasTambahans collection.
     *
     * By default this just sets the collVldTugasTambahans collection to an empty array (like clearcollVldTugasTambahans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldTugasTambahans($overrideExisting = true)
    {
        if (null !== $this->collVldTugasTambahans && !$overrideExisting) {
            return;
        }
        $this->collVldTugasTambahans = new PropelObjectCollection();
        $this->collVldTugasTambahans->setModel('VldTugasTambahan');
    }

    /**
     * Gets an array of VldTugasTambahan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldTugasTambahan[] List of VldTugasTambahan objects
     * @throws PropelException
     */
    public function getVldTugasTambahans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldTugasTambahansPartial && !$this->isNew();
        if (null === $this->collVldTugasTambahans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldTugasTambahans) {
                // return empty collection
                $this->initVldTugasTambahans();
            } else {
                $collVldTugasTambahans = VldTugasTambahanQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldTugasTambahansPartial && count($collVldTugasTambahans)) {
                      $this->initVldTugasTambahans(false);

                      foreach($collVldTugasTambahans as $obj) {
                        if (false == $this->collVldTugasTambahans->contains($obj)) {
                          $this->collVldTugasTambahans->append($obj);
                        }
                      }

                      $this->collVldTugasTambahansPartial = true;
                    }

                    $collVldTugasTambahans->getInternalIterator()->rewind();
                    return $collVldTugasTambahans;
                }

                if($partial && $this->collVldTugasTambahans) {
                    foreach($this->collVldTugasTambahans as $obj) {
                        if($obj->isNew()) {
                            $collVldTugasTambahans[] = $obj;
                        }
                    }
                }

                $this->collVldTugasTambahans = $collVldTugasTambahans;
                $this->collVldTugasTambahansPartial = false;
            }
        }

        return $this->collVldTugasTambahans;
    }

    /**
     * Sets a collection of VldTugasTambahan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldTugasTambahans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldTugasTambahans(PropelCollection $vldTugasTambahans, PropelPDO $con = null)
    {
        $vldTugasTambahansToDelete = $this->getVldTugasTambahans(new Criteria(), $con)->diff($vldTugasTambahans);

        $this->vldTugasTambahansScheduledForDeletion = unserialize(serialize($vldTugasTambahansToDelete));

        foreach ($vldTugasTambahansToDelete as $vldTugasTambahanRemoved) {
            $vldTugasTambahanRemoved->setErrortype(null);
        }

        $this->collVldTugasTambahans = null;
        foreach ($vldTugasTambahans as $vldTugasTambahan) {
            $this->addVldTugasTambahan($vldTugasTambahan);
        }

        $this->collVldTugasTambahans = $vldTugasTambahans;
        $this->collVldTugasTambahansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldTugasTambahan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldTugasTambahan objects.
     * @throws PropelException
     */
    public function countVldTugasTambahans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldTugasTambahansPartial && !$this->isNew();
        if (null === $this->collVldTugasTambahans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldTugasTambahans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldTugasTambahans());
            }
            $query = VldTugasTambahanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldTugasTambahans);
    }

    /**
     * Method called to associate a VldTugasTambahan object to this object
     * through the VldTugasTambahan foreign key attribute.
     *
     * @param    VldTugasTambahan $l VldTugasTambahan
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldTugasTambahan(VldTugasTambahan $l)
    {
        if ($this->collVldTugasTambahans === null) {
            $this->initVldTugasTambahans();
            $this->collVldTugasTambahansPartial = true;
        }
        if (!in_array($l, $this->collVldTugasTambahans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldTugasTambahan($l);
        }

        return $this;
    }

    /**
     * @param	VldTugasTambahan $vldTugasTambahan The vldTugasTambahan object to add.
     */
    protected function doAddVldTugasTambahan($vldTugasTambahan)
    {
        $this->collVldTugasTambahans[]= $vldTugasTambahan;
        $vldTugasTambahan->setErrortype($this);
    }

    /**
     * @param	VldTugasTambahan $vldTugasTambahan The vldTugasTambahan object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldTugasTambahan($vldTugasTambahan)
    {
        if ($this->getVldTugasTambahans()->contains($vldTugasTambahan)) {
            $this->collVldTugasTambahans->remove($this->collVldTugasTambahans->search($vldTugasTambahan));
            if (null === $this->vldTugasTambahansScheduledForDeletion) {
                $this->vldTugasTambahansScheduledForDeletion = clone $this->collVldTugasTambahans;
                $this->vldTugasTambahansScheduledForDeletion->clear();
            }
            $this->vldTugasTambahansScheduledForDeletion[]= clone $vldTugasTambahan;
            $vldTugasTambahan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldTugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldTugasTambahan[] List of VldTugasTambahan objects
     */
    public function getVldTugasTambahansJoinTugasTambahan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldTugasTambahanQuery::create(null, $criteria);
        $query->joinWith('TugasTambahan', $join_behavior);

        return $this->getVldTugasTambahans($query, $con);
    }

    /**
     * Clears out the collVldTunjangans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldTunjangans()
     */
    public function clearVldTunjangans()
    {
        $this->collVldTunjangans = null; // important to set this to null since that means it is uninitialized
        $this->collVldTunjangansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldTunjangans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldTunjangans($v = true)
    {
        $this->collVldTunjangansPartial = $v;
    }

    /**
     * Initializes the collVldTunjangans collection.
     *
     * By default this just sets the collVldTunjangans collection to an empty array (like clearcollVldTunjangans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldTunjangans($overrideExisting = true)
    {
        if (null !== $this->collVldTunjangans && !$overrideExisting) {
            return;
        }
        $this->collVldTunjangans = new PropelObjectCollection();
        $this->collVldTunjangans->setModel('VldTunjangan');
    }

    /**
     * Gets an array of VldTunjangan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldTunjangan[] List of VldTunjangan objects
     * @throws PropelException
     */
    public function getVldTunjangans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldTunjangansPartial && !$this->isNew();
        if (null === $this->collVldTunjangans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldTunjangans) {
                // return empty collection
                $this->initVldTunjangans();
            } else {
                $collVldTunjangans = VldTunjanganQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldTunjangansPartial && count($collVldTunjangans)) {
                      $this->initVldTunjangans(false);

                      foreach($collVldTunjangans as $obj) {
                        if (false == $this->collVldTunjangans->contains($obj)) {
                          $this->collVldTunjangans->append($obj);
                        }
                      }

                      $this->collVldTunjangansPartial = true;
                    }

                    $collVldTunjangans->getInternalIterator()->rewind();
                    return $collVldTunjangans;
                }

                if($partial && $this->collVldTunjangans) {
                    foreach($this->collVldTunjangans as $obj) {
                        if($obj->isNew()) {
                            $collVldTunjangans[] = $obj;
                        }
                    }
                }

                $this->collVldTunjangans = $collVldTunjangans;
                $this->collVldTunjangansPartial = false;
            }
        }

        return $this->collVldTunjangans;
    }

    /**
     * Sets a collection of VldTunjangan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldTunjangans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldTunjangans(PropelCollection $vldTunjangans, PropelPDO $con = null)
    {
        $vldTunjangansToDelete = $this->getVldTunjangans(new Criteria(), $con)->diff($vldTunjangans);

        $this->vldTunjangansScheduledForDeletion = unserialize(serialize($vldTunjangansToDelete));

        foreach ($vldTunjangansToDelete as $vldTunjanganRemoved) {
            $vldTunjanganRemoved->setErrortype(null);
        }

        $this->collVldTunjangans = null;
        foreach ($vldTunjangans as $vldTunjangan) {
            $this->addVldTunjangan($vldTunjangan);
        }

        $this->collVldTunjangans = $vldTunjangans;
        $this->collVldTunjangansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldTunjangan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldTunjangan objects.
     * @throws PropelException
     */
    public function countVldTunjangans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldTunjangansPartial && !$this->isNew();
        if (null === $this->collVldTunjangans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldTunjangans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldTunjangans());
            }
            $query = VldTunjanganQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldTunjangans);
    }

    /**
     * Method called to associate a VldTunjangan object to this object
     * through the VldTunjangan foreign key attribute.
     *
     * @param    VldTunjangan $l VldTunjangan
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldTunjangan(VldTunjangan $l)
    {
        if ($this->collVldTunjangans === null) {
            $this->initVldTunjangans();
            $this->collVldTunjangansPartial = true;
        }
        if (!in_array($l, $this->collVldTunjangans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldTunjangan($l);
        }

        return $this;
    }

    /**
     * @param	VldTunjangan $vldTunjangan The vldTunjangan object to add.
     */
    protected function doAddVldTunjangan($vldTunjangan)
    {
        $this->collVldTunjangans[]= $vldTunjangan;
        $vldTunjangan->setErrortype($this);
    }

    /**
     * @param	VldTunjangan $vldTunjangan The vldTunjangan object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldTunjangan($vldTunjangan)
    {
        if ($this->getVldTunjangans()->contains($vldTunjangan)) {
            $this->collVldTunjangans->remove($this->collVldTunjangans->search($vldTunjangan));
            if (null === $this->vldTunjangansScheduledForDeletion) {
                $this->vldTunjangansScheduledForDeletion = clone $this->collVldTunjangans;
                $this->vldTunjangansScheduledForDeletion->clear();
            }
            $this->vldTunjangansScheduledForDeletion[]= clone $vldTunjangan;
            $vldTunjangan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldTunjangans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldTunjangan[] List of VldTunjangan objects
     */
    public function getVldTunjangansJoinTunjangan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldTunjanganQuery::create(null, $criteria);
        $query->joinWith('Tunjangan', $join_behavior);

        return $this->getVldTunjangans($query, $con);
    }

    /**
     * Clears out the collVldUns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
     * @see        addVldUns()
     */
    public function clearVldUns()
    {
        $this->collVldUns = null; // important to set this to null since that means it is uninitialized
        $this->collVldUnsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldUns collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldUns($v = true)
    {
        $this->collVldUnsPartial = $v;
    }

    /**
     * Initializes the collVldUns collection.
     *
     * By default this just sets the collVldUns collection to an empty array (like clearcollVldUns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldUns($overrideExisting = true)
    {
        if (null !== $this->collVldUns && !$overrideExisting) {
            return;
        }
        $this->collVldUns = new PropelObjectCollection();
        $this->collVldUns->setModel('VldUn');
    }

    /**
     * Gets an array of VldUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Errortype is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldUn[] List of VldUn objects
     * @throws PropelException
     */
    public function getVldUns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldUnsPartial && !$this->isNew();
        if (null === $this->collVldUns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldUns) {
                // return empty collection
                $this->initVldUns();
            } else {
                $collVldUns = VldUnQuery::create(null, $criteria)
                    ->filterByErrortype($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldUnsPartial && count($collVldUns)) {
                      $this->initVldUns(false);

                      foreach($collVldUns as $obj) {
                        if (false == $this->collVldUns->contains($obj)) {
                          $this->collVldUns->append($obj);
                        }
                      }

                      $this->collVldUnsPartial = true;
                    }

                    $collVldUns->getInternalIterator()->rewind();
                    return $collVldUns;
                }

                if($partial && $this->collVldUns) {
                    foreach($this->collVldUns as $obj) {
                        if($obj->isNew()) {
                            $collVldUns[] = $obj;
                        }
                    }
                }

                $this->collVldUns = $collVldUns;
                $this->collVldUnsPartial = false;
            }
        }

        return $this->collVldUns;
    }

    /**
     * Sets a collection of VldUn objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldUns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldUns(PropelCollection $vldUns, PropelPDO $con = null)
    {
        $vldUnsToDelete = $this->getVldUns(new Criteria(), $con)->diff($vldUns);

        $this->vldUnsScheduledForDeletion = unserialize(serialize($vldUnsToDelete));

        foreach ($vldUnsToDelete as $vldUnRemoved) {
            $vldUnRemoved->setErrortype(null);
        }

        $this->collVldUns = null;
        foreach ($vldUns as $vldUn) {
            $this->addVldUn($vldUn);
        }

        $this->collVldUns = $vldUns;
        $this->collVldUnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldUn objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldUn objects.
     * @throws PropelException
     */
    public function countVldUns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldUnsPartial && !$this->isNew();
        if (null === $this->collVldUns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldUns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldUns());
            }
            $query = VldUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldUns);
    }

    /**
     * Method called to associate a VldUn object to this object
     * through the VldUn foreign key attribute.
     *
     * @param    VldUn $l VldUn
     * @return Errortype The current object (for fluent API support)
     */
    public function addVldUn(VldUn $l)
    {
        if ($this->collVldUns === null) {
            $this->initVldUns();
            $this->collVldUnsPartial = true;
        }
        if (!in_array($l, $this->collVldUns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldUn($l);
        }

        return $this;
    }

    /**
     * @param	VldUn $vldUn The vldUn object to add.
     */
    protected function doAddVldUn($vldUn)
    {
        $this->collVldUns[]= $vldUn;
        $vldUn->setErrortype($this);
    }

    /**
     * @param	VldUn $vldUn The vldUn object to remove.
     * @return Errortype The current object (for fluent API support)
     */
    public function removeVldUn($vldUn)
    {
        if ($this->getVldUns()->contains($vldUn)) {
            $this->collVldUns->remove($this->collVldUns->search($vldUn));
            if (null === $this->vldUnsScheduledForDeletion) {
                $this->vldUnsScheduledForDeletion = clone $this->collVldUns;
                $this->vldUnsScheduledForDeletion->clear();
            }
            $this->vldUnsScheduledForDeletion[]= clone $vldUn;
            $vldUn->setErrortype(null);
        }

        return $this;
    }

    /**
     * Clears out the collVldYayasans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Errortype The current object (for fluent API support)
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
     * If this Errortype is new, it will return
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
                    ->filterByErrortype($this)
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
     * @return Errortype The current object (for fluent API support)
     */
    public function setVldYayasans(PropelCollection $vldYayasans, PropelPDO $con = null)
    {
        $vldYayasansToDelete = $this->getVldYayasans(new Criteria(), $con)->diff($vldYayasans);

        $this->vldYayasansScheduledForDeletion = unserialize(serialize($vldYayasansToDelete));

        foreach ($vldYayasansToDelete as $vldYayasanRemoved) {
            $vldYayasanRemoved->setErrortype(null);
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
                ->filterByErrortype($this)
                ->count($con);
        }

        return count($this->collVldYayasans);
    }

    /**
     * Method called to associate a VldYayasan object to this object
     * through the VldYayasan foreign key attribute.
     *
     * @param    VldYayasan $l VldYayasan
     * @return Errortype The current object (for fluent API support)
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
        $vldYayasan->setErrortype($this);
    }

    /**
     * @param	VldYayasan $vldYayasan The vldYayasan object to remove.
     * @return Errortype The current object (for fluent API support)
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
            $vldYayasan->setErrortype(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Errortype is new, it will return
     * an empty collection; or if this Errortype has previously
     * been saved, it will retrieve related VldYayasans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Errortype.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldYayasan[] List of VldYayasan objects
     */
    public function getVldYayasansJoinYayasan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldYayasanQuery::create(null, $criteria);
        $query->joinWith('Yayasan', $join_behavior);

        return $this->getVldYayasans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idtype = null;
        $this->kategori_error = null;
        $this->keterangan = null;
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
            if ($this->collVldAktPds) {
                foreach ($this->collVldAktPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldAlats) {
                foreach ($this->collVldAlats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldAnaks) {
                foreach ($this->collVldAnaks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldAngkutans) {
                foreach ($this->collVldAngkutans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldBangunans) {
                foreach ($this->collVldBangunans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldBeaPds) {
                foreach ($this->collVldBeaPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldBeaPtks) {
                foreach ($this->collVldBeaPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldBukuPtks) {
                foreach ($this->collVldBukuPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldDemografis) {
                foreach ($this->collVldDemografis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldDudis) {
                foreach ($this->collVldDudis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldInpassings) {
                foreach ($this->collVldInpassings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldJurusanSps) {
                foreach ($this->collVldJurusanSps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldKaryaTuliss) {
                foreach ($this->collVldKaryaTuliss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldKesejahteraans) {
                foreach ($this->collVldKesejahteraans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldMous) {
                foreach ($this->collVldMous as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldNilaiRapors) {
                foreach ($this->collVldNilaiRapors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldNilaiTests) {
                foreach ($this->collVldNilaiTests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldNonsekolahs) {
                foreach ($this->collVldNonsekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPdLongs) {
                foreach ($this->collVldPdLongs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPembelajarans) {
                foreach ($this->collVldPembelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPenghargaans) {
                foreach ($this->collVldPenghargaans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPesertaDidiks) {
                foreach ($this->collVldPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPrestasis) {
                foreach ($this->collVldPrestasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPtks) {
                foreach ($this->collVldPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPtkTerdaftars) {
                foreach ($this->collVldPtkTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRegPds) {
                foreach ($this->collVldRegPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRombels) {
                foreach ($this->collVldRombels as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRwyFungsionals) {
                foreach ($this->collVldRwyFungsionals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRwyKepangkatans) {
                foreach ($this->collVldRwyKepangkatans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRwyKerjas) {
                foreach ($this->collVldRwyKerjas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRwyPendFormals) {
                foreach ($this->collVldRwyPendFormals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRwySertifikasis) {
                foreach ($this->collVldRwySertifikasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldRwyStrukturals) {
                foreach ($this->collVldRwyStrukturals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldSekolahs) {
                foreach ($this->collVldSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldTanahs) {
                foreach ($this->collVldTanahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldTugasTambahans) {
                foreach ($this->collVldTugasTambahans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldTunjangans) {
                foreach ($this->collVldTunjangans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldUns) {
                foreach ($this->collVldUns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldYayasans) {
                foreach ($this->collVldYayasans as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldAktPds instanceof PropelCollection) {
            $this->collVldAktPds->clearIterator();
        }
        $this->collVldAktPds = null;
        if ($this->collVldAlats instanceof PropelCollection) {
            $this->collVldAlats->clearIterator();
        }
        $this->collVldAlats = null;
        if ($this->collVldAnaks instanceof PropelCollection) {
            $this->collVldAnaks->clearIterator();
        }
        $this->collVldAnaks = null;
        if ($this->collVldAngkutans instanceof PropelCollection) {
            $this->collVldAngkutans->clearIterator();
        }
        $this->collVldAngkutans = null;
        if ($this->collVldBangunans instanceof PropelCollection) {
            $this->collVldBangunans->clearIterator();
        }
        $this->collVldBangunans = null;
        if ($this->collVldBeaPds instanceof PropelCollection) {
            $this->collVldBeaPds->clearIterator();
        }
        $this->collVldBeaPds = null;
        if ($this->collVldBeaPtks instanceof PropelCollection) {
            $this->collVldBeaPtks->clearIterator();
        }
        $this->collVldBeaPtks = null;
        if ($this->collVldBukuPtks instanceof PropelCollection) {
            $this->collVldBukuPtks->clearIterator();
        }
        $this->collVldBukuPtks = null;
        if ($this->collVldDemografis instanceof PropelCollection) {
            $this->collVldDemografis->clearIterator();
        }
        $this->collVldDemografis = null;
        if ($this->collVldDudis instanceof PropelCollection) {
            $this->collVldDudis->clearIterator();
        }
        $this->collVldDudis = null;
        if ($this->collVldInpassings instanceof PropelCollection) {
            $this->collVldInpassings->clearIterator();
        }
        $this->collVldInpassings = null;
        if ($this->collVldJurusanSps instanceof PropelCollection) {
            $this->collVldJurusanSps->clearIterator();
        }
        $this->collVldJurusanSps = null;
        if ($this->collVldKaryaTuliss instanceof PropelCollection) {
            $this->collVldKaryaTuliss->clearIterator();
        }
        $this->collVldKaryaTuliss = null;
        if ($this->collVldKesejahteraans instanceof PropelCollection) {
            $this->collVldKesejahteraans->clearIterator();
        }
        $this->collVldKesejahteraans = null;
        if ($this->collVldMous instanceof PropelCollection) {
            $this->collVldMous->clearIterator();
        }
        $this->collVldMous = null;
        if ($this->collVldNilaiRapors instanceof PropelCollection) {
            $this->collVldNilaiRapors->clearIterator();
        }
        $this->collVldNilaiRapors = null;
        if ($this->collVldNilaiTests instanceof PropelCollection) {
            $this->collVldNilaiTests->clearIterator();
        }
        $this->collVldNilaiTests = null;
        if ($this->collVldNonsekolahs instanceof PropelCollection) {
            $this->collVldNonsekolahs->clearIterator();
        }
        $this->collVldNonsekolahs = null;
        if ($this->collVldPdLongs instanceof PropelCollection) {
            $this->collVldPdLongs->clearIterator();
        }
        $this->collVldPdLongs = null;
        if ($this->collVldPembelajarans instanceof PropelCollection) {
            $this->collVldPembelajarans->clearIterator();
        }
        $this->collVldPembelajarans = null;
        if ($this->collVldPenghargaans instanceof PropelCollection) {
            $this->collVldPenghargaans->clearIterator();
        }
        $this->collVldPenghargaans = null;
        if ($this->collVldPesertaDidiks instanceof PropelCollection) {
            $this->collVldPesertaDidiks->clearIterator();
        }
        $this->collVldPesertaDidiks = null;
        if ($this->collVldPrestasis instanceof PropelCollection) {
            $this->collVldPrestasis->clearIterator();
        }
        $this->collVldPrestasis = null;
        if ($this->collVldPtks instanceof PropelCollection) {
            $this->collVldPtks->clearIterator();
        }
        $this->collVldPtks = null;
        if ($this->collVldPtkTerdaftars instanceof PropelCollection) {
            $this->collVldPtkTerdaftars->clearIterator();
        }
        $this->collVldPtkTerdaftars = null;
        if ($this->collVldRegPds instanceof PropelCollection) {
            $this->collVldRegPds->clearIterator();
        }
        $this->collVldRegPds = null;
        if ($this->collVldRombels instanceof PropelCollection) {
            $this->collVldRombels->clearIterator();
        }
        $this->collVldRombels = null;
        if ($this->collVldRwyFungsionals instanceof PropelCollection) {
            $this->collVldRwyFungsionals->clearIterator();
        }
        $this->collVldRwyFungsionals = null;
        if ($this->collVldRwyKepangkatans instanceof PropelCollection) {
            $this->collVldRwyKepangkatans->clearIterator();
        }
        $this->collVldRwyKepangkatans = null;
        if ($this->collVldRwyKerjas instanceof PropelCollection) {
            $this->collVldRwyKerjas->clearIterator();
        }
        $this->collVldRwyKerjas = null;
        if ($this->collVldRwyPendFormals instanceof PropelCollection) {
            $this->collVldRwyPendFormals->clearIterator();
        }
        $this->collVldRwyPendFormals = null;
        if ($this->collVldRwySertifikasis instanceof PropelCollection) {
            $this->collVldRwySertifikasis->clearIterator();
        }
        $this->collVldRwySertifikasis = null;
        if ($this->collVldRwyStrukturals instanceof PropelCollection) {
            $this->collVldRwyStrukturals->clearIterator();
        }
        $this->collVldRwyStrukturals = null;
        if ($this->collVldSekolahs instanceof PropelCollection) {
            $this->collVldSekolahs->clearIterator();
        }
        $this->collVldSekolahs = null;
        if ($this->collVldTanahs instanceof PropelCollection) {
            $this->collVldTanahs->clearIterator();
        }
        $this->collVldTanahs = null;
        if ($this->collVldTugasTambahans instanceof PropelCollection) {
            $this->collVldTugasTambahans->clearIterator();
        }
        $this->collVldTugasTambahans = null;
        if ($this->collVldTunjangans instanceof PropelCollection) {
            $this->collVldTunjangans->clearIterator();
        }
        $this->collVldTunjangans = null;
        if ($this->collVldUns instanceof PropelCollection) {
            $this->collVldUns->clearIterator();
        }
        $this->collVldUns = null;
        if ($this->collVldYayasans instanceof PropelCollection) {
            $this->collVldYayasans->clearIterator();
        }
        $this->collVldYayasans = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ErrortypePeer::DEFAULT_STRING_FORMAT);
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
