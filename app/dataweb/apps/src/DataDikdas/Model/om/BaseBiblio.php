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
use DataDikdas\Model\Biblio;
use DataDikdas\Model\BiblioPeer;
use DataDikdas\Model\BiblioQuery;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuPelajaran;
use DataDikdas\Model\BukuPelajaranQuery;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\Classifications;
use DataDikdas\Model\ClassificationsQuery;
use DataDikdas\Model\DaftarAuthor;
use DataDikdas\Model\DaftarAuthorQuery;
use DataDikdas\Model\Frequency;
use DataDikdas\Model\FrequencyQuery;
use DataDikdas\Model\Gmd;
use DataDikdas\Model\GmdQuery;
use DataDikdas\Model\MapelBiblio;
use DataDikdas\Model\MapelBiblioQuery;
use DataDikdas\Model\Negara;
use DataDikdas\Model\NegaraQuery;
use DataDikdas\Model\TingkatBiblio;
use DataDikdas\Model\TingkatBiblioQuery;

/**
 * Base class that represents a row from the 'pustaka.biblio' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBiblio extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BiblioPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BiblioPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_biblio field.
     * @var        string
     */
    protected $id_biblio;

    /**
     * The value for the id_freq field.
     * @var        string
     */
    protected $id_freq;

    /**
     * The value for the id_publisher field.
     * @var        string
     */
    protected $id_publisher;

    /**
     * The value for the negara_id field.
     * @var        string
     */
    protected $negara_id;

    /**
     * The value for the id_gmd field.
     * @var        string
     */
    protected $id_gmd;

    /**
     * The value for the id_classification field.
     * @var        string
     */
    protected $id_classification;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the sor field.
     * @var        string
     */
    protected $sor;

    /**
     * The value for the edition field.
     * @var        string
     */
    protected $edition;

    /**
     * The value for the isbn_issn field.
     * @var        string
     */
    protected $isbn_issn;

    /**
     * The value for the collations field.
     * @var        string
     */
    protected $collations;

    /**
     * The value for the publisher field.
     * @var        string
     */
    protected $publisher;

    /**
     * The value for the publish_year field.
     * @var        string
     */
    protected $publish_year;

    /**
     * The value for the series_title field.
     * @var        string
     */
    protected $series_title;

    /**
     * The value for the call_number field.
     * @var        string
     */
    protected $call_number;

    /**
     * The value for the source field.
     * @var        string
     */
    protected $source;

    /**
     * The value for the publish_place field.
     * @var        string
     */
    protected $publish_place;

    /**
     * The value for the notes field.
     * @var        string
     */
    protected $notes;

    /**
     * The value for the image field.
     * @var        string
     */
    protected $image;

    /**
     * The value for the file_att field.
     * @var        string
     */
    protected $file_att;

    /**
     * The value for the opac_hide field.
     * @var        string
     */
    protected $opac_hide;

    /**
     * The value for the promoted field.
     * @var        string
     */
    protected $promoted;

    /**
     * The value for the labels field.
     * @var        string
     */
    protected $labels;

    /**
     * The value for the paper_printing_spec field.
     * @var        string
     */
    protected $paper_printing_spec;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

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
     * @var        Classifications
     */
    protected $aClassifications;

    /**
     * @var        Frequency
     */
    protected $aFrequency;

    /**
     * @var        Gmd
     */
    protected $aGmd;

    /**
     * @var        Negara
     */
    protected $aNegara;

    /**
     * @var        PropelObjectCollection|Buku[] Collection to store aggregation of Buku objects.
     */
    protected $collBukus;
    protected $collBukusPartial;

    /**
     * @var        PropelObjectCollection|BukuPelajaran[] Collection to store aggregation of BukuPelajaran objects.
     */
    protected $collBukuPelajarans;
    protected $collBukuPelajaransPartial;

    /**
     * @var        PropelObjectCollection|DaftarAuthor[] Collection to store aggregation of DaftarAuthor objects.
     */
    protected $collDaftarAuthors;
    protected $collDaftarAuthorsPartial;

    /**
     * @var        PropelObjectCollection|MapelBiblio[] Collection to store aggregation of MapelBiblio objects.
     */
    protected $collMapelBiblios;
    protected $collMapelBibliosPartial;

    /**
     * @var        PropelObjectCollection|TingkatBiblio[] Collection to store aggregation of TingkatBiblio objects.
     */
    protected $collTingkatBiblios;
    protected $collTingkatBibliosPartial;

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
    protected $bukusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bukuPelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $daftarAuthorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mapelBibliosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tingkatBibliosScheduledForDeletion = null;

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
     * Initializes internal state of BaseBiblio object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_biblio] column value.
     * 
     * @return string
     */
    public function getIdBiblio()
    {
        return $this->id_biblio;
    }

    /**
     * Get the [id_freq] column value.
     * 
     * @return string
     */
    public function getIdFreq()
    {
        return $this->id_freq;
    }

    /**
     * Get the [id_publisher] column value.
     * 
     * @return string
     */
    public function getIdPublisher()
    {
        return $this->id_publisher;
    }

    /**
     * Get the [negara_id] column value.
     * 
     * @return string
     */
    public function getNegaraId()
    {
        return $this->negara_id;
    }

    /**
     * Get the [id_gmd] column value.
     * 
     * @return string
     */
    public function getIdGmd()
    {
        return $this->id_gmd;
    }

    /**
     * Get the [id_classification] column value.
     * 
     * @return string
     */
    public function getIdClassification()
    {
        return $this->id_classification;
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
     * Get the [title] column value.
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [sor] column value.
     * 
     * @return string
     */
    public function getSor()
    {
        return $this->sor;
    }

    /**
     * Get the [edition] column value.
     * 
     * @return string
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Get the [isbn_issn] column value.
     * 
     * @return string
     */
    public function getIsbnIssn()
    {
        return $this->isbn_issn;
    }

    /**
     * Get the [collations] column value.
     * 
     * @return string
     */
    public function getCollations()
    {
        return $this->collations;
    }

    /**
     * Get the [publisher] column value.
     * 
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Get the [publish_year] column value.
     * 
     * @return string
     */
    public function getPublishYear()
    {
        return $this->publish_year;
    }

    /**
     * Get the [series_title] column value.
     * 
     * @return string
     */
    public function getSeriesTitle()
    {
        return $this->series_title;
    }

    /**
     * Get the [call_number] column value.
     * 
     * @return string
     */
    public function getCallNumber()
    {
        return $this->call_number;
    }

    /**
     * Get the [source] column value.
     * 
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Get the [publish_place] column value.
     * 
     * @return string
     */
    public function getPublishPlace()
    {
        return $this->publish_place;
    }

    /**
     * Get the [notes] column value.
     * 
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get the [image] column value.
     * 
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the [file_att] column value.
     * 
     * @return string
     */
    public function getFileAtt()
    {
        return $this->file_att;
    }

    /**
     * Get the [opac_hide] column value.
     * 
     * @return string
     */
    public function getOpacHide()
    {
        return $this->opac_hide;
    }

    /**
     * Get the [promoted] column value.
     * 
     * @return string
     */
    public function getPromoted()
    {
        return $this->promoted;
    }

    /**
     * Get the [labels] column value.
     * 
     * @return string
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Get the [paper_printing_spec] column value.
     * 
     * @return string
     */
    public function getPaperPrintingSpec()
    {
        return $this->paper_printing_spec;
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
     * Set the value of [id_biblio] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setIdBiblio($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_biblio !== $v) {
            $this->id_biblio = $v;
            $this->modifiedColumns[] = BiblioPeer::ID_BIBLIO;
        }


        return $this;
    } // setIdBiblio()

    /**
     * Set the value of [id_freq] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setIdFreq($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_freq !== $v) {
            $this->id_freq = $v;
            $this->modifiedColumns[] = BiblioPeer::ID_FREQ;
        }

        if ($this->aFrequency !== null && $this->aFrequency->getIdFreq() !== $v) {
            $this->aFrequency = null;
        }


        return $this;
    } // setIdFreq()

    /**
     * Set the value of [id_publisher] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setIdPublisher($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_publisher !== $v) {
            $this->id_publisher = $v;
            $this->modifiedColumns[] = BiblioPeer::ID_PUBLISHER;
        }


        return $this;
    } // setIdPublisher()

    /**
     * Set the value of [negara_id] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setNegaraId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->negara_id !== $v) {
            $this->negara_id = $v;
            $this->modifiedColumns[] = BiblioPeer::NEGARA_ID;
        }

        if ($this->aNegara !== null && $this->aNegara->getNegaraId() !== $v) {
            $this->aNegara = null;
        }


        return $this;
    } // setNegaraId()

    /**
     * Set the value of [id_gmd] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setIdGmd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_gmd !== $v) {
            $this->id_gmd = $v;
            $this->modifiedColumns[] = BiblioPeer::ID_GMD;
        }

        if ($this->aGmd !== null && $this->aGmd->getIdGmd() !== $v) {
            $this->aGmd = null;
        }


        return $this;
    } // setIdGmd()

    /**
     * Set the value of [id_classification] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setIdClassification($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_classification !== $v) {
            $this->id_classification = $v;
            $this->modifiedColumns[] = BiblioPeer::ID_CLASSIFICATION;
        }

        if ($this->aClassifications !== null && $this->aClassifications->getIdClassification() !== $v) {
            $this->aClassifications = null;
        }


        return $this;
    } // setIdClassification()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Biblio The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BiblioPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Set the value of [title] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = BiblioPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [sor] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setSor($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sor !== $v) {
            $this->sor = $v;
            $this->modifiedColumns[] = BiblioPeer::SOR;
        }


        return $this;
    } // setSor()

    /**
     * Set the value of [edition] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setEdition($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->edition !== $v) {
            $this->edition = $v;
            $this->modifiedColumns[] = BiblioPeer::EDITION;
        }


        return $this;
    } // setEdition()

    /**
     * Set the value of [isbn_issn] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setIsbnIssn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->isbn_issn !== $v) {
            $this->isbn_issn = $v;
            $this->modifiedColumns[] = BiblioPeer::ISBN_ISSN;
        }


        return $this;
    } // setIsbnIssn()

    /**
     * Set the value of [collations] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setCollations($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->collations !== $v) {
            $this->collations = $v;
            $this->modifiedColumns[] = BiblioPeer::COLLATIONS;
        }


        return $this;
    } // setCollations()

    /**
     * Set the value of [publisher] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setPublisher($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->publisher !== $v) {
            $this->publisher = $v;
            $this->modifiedColumns[] = BiblioPeer::PUBLISHER;
        }


        return $this;
    } // setPublisher()

    /**
     * Set the value of [publish_year] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setPublishYear($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->publish_year !== $v) {
            $this->publish_year = $v;
            $this->modifiedColumns[] = BiblioPeer::PUBLISH_YEAR;
        }


        return $this;
    } // setPublishYear()

    /**
     * Set the value of [series_title] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setSeriesTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->series_title !== $v) {
            $this->series_title = $v;
            $this->modifiedColumns[] = BiblioPeer::SERIES_TITLE;
        }


        return $this;
    } // setSeriesTitle()

    /**
     * Set the value of [call_number] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setCallNumber($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->call_number !== $v) {
            $this->call_number = $v;
            $this->modifiedColumns[] = BiblioPeer::CALL_NUMBER;
        }


        return $this;
    } // setCallNumber()

    /**
     * Set the value of [source] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setSource($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->source !== $v) {
            $this->source = $v;
            $this->modifiedColumns[] = BiblioPeer::SOURCE;
        }


        return $this;
    } // setSource()

    /**
     * Set the value of [publish_place] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setPublishPlace($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->publish_place !== $v) {
            $this->publish_place = $v;
            $this->modifiedColumns[] = BiblioPeer::PUBLISH_PLACE;
        }


        return $this;
    } // setPublishPlace()

    /**
     * Set the value of [notes] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setNotes($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->notes !== $v) {
            $this->notes = $v;
            $this->modifiedColumns[] = BiblioPeer::NOTES;
        }


        return $this;
    } // setNotes()

    /**
     * Set the value of [image] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[] = BiblioPeer::IMAGE;
        }


        return $this;
    } // setImage()

    /**
     * Set the value of [file_att] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setFileAtt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->file_att !== $v) {
            $this->file_att = $v;
            $this->modifiedColumns[] = BiblioPeer::FILE_ATT;
        }


        return $this;
    } // setFileAtt()

    /**
     * Set the value of [opac_hide] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setOpacHide($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->opac_hide !== $v) {
            $this->opac_hide = $v;
            $this->modifiedColumns[] = BiblioPeer::OPAC_HIDE;
        }


        return $this;
    } // setOpacHide()

    /**
     * Set the value of [promoted] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setPromoted($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->promoted !== $v) {
            $this->promoted = $v;
            $this->modifiedColumns[] = BiblioPeer::PROMOTED;
        }


        return $this;
    } // setPromoted()

    /**
     * Set the value of [labels] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setLabels($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->labels !== $v) {
            $this->labels = $v;
            $this->modifiedColumns[] = BiblioPeer::LABELS;
        }


        return $this;
    } // setLabels()

    /**
     * Set the value of [paper_printing_spec] column.
     * 
     * @param string $v new value
     * @return Biblio The current object (for fluent API support)
     */
    public function setPaperPrintingSpec($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->paper_printing_spec !== $v) {
            $this->paper_printing_spec = $v;
            $this->modifiedColumns[] = BiblioPeer::PAPER_PRINTING_SPEC;
        }


        return $this;
    } // setPaperPrintingSpec()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Biblio The current object (for fluent API support)
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
                $this->modifiedColumns[] = BiblioPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Biblio The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BiblioPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Biblio The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = BiblioPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

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

            $this->id_biblio = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->id_freq = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_publisher = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->negara_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->id_gmd = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->id_classification = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->create_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->title = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->sor = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->edition = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->isbn_issn = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->collations = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->publisher = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->publish_year = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->series_title = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->call_number = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->source = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->publish_place = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->notes = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->image = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->file_att = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->opac_hide = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->promoted = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->labels = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->paper_printing_spec = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->last_sync = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->last_update = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->expired_date = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 28; // 28 = BiblioPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Biblio object", $e);
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

        if ($this->aFrequency !== null && $this->id_freq !== $this->aFrequency->getIdFreq()) {
            $this->aFrequency = null;
        }
        if ($this->aNegara !== null && $this->negara_id !== $this->aNegara->getNegaraId()) {
            $this->aNegara = null;
        }
        if ($this->aGmd !== null && $this->id_gmd !== $this->aGmd->getIdGmd()) {
            $this->aGmd = null;
        }
        if ($this->aClassifications !== null && $this->id_classification !== $this->aClassifications->getIdClassification()) {
            $this->aClassifications = null;
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
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BiblioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClassifications = null;
            $this->aFrequency = null;
            $this->aGmd = null;
            $this->aNegara = null;
            $this->collBukus = null;

            $this->collBukuPelajarans = null;

            $this->collDaftarAuthors = null;

            $this->collMapelBiblios = null;

            $this->collTingkatBiblios = null;

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
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BiblioQuery::create()
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
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BiblioPeer::addInstanceToPool($this);
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

            if ($this->aClassifications !== null) {
                if ($this->aClassifications->isModified() || $this->aClassifications->isNew()) {
                    $affectedRows += $this->aClassifications->save($con);
                }
                $this->setClassifications($this->aClassifications);
            }

            if ($this->aFrequency !== null) {
                if ($this->aFrequency->isModified() || $this->aFrequency->isNew()) {
                    $affectedRows += $this->aFrequency->save($con);
                }
                $this->setFrequency($this->aFrequency);
            }

            if ($this->aGmd !== null) {
                if ($this->aGmd->isModified() || $this->aGmd->isNew()) {
                    $affectedRows += $this->aGmd->save($con);
                }
                $this->setGmd($this->aGmd);
            }

            if ($this->aNegara !== null) {
                if ($this->aNegara->isModified() || $this->aNegara->isNew()) {
                    $affectedRows += $this->aNegara->save($con);
                }
                $this->setNegara($this->aNegara);
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

            if ($this->bukusScheduledForDeletion !== null) {
                if (!$this->bukusScheduledForDeletion->isEmpty()) {
                    foreach ($this->bukusScheduledForDeletion as $buku) {
                        // need to save related object because we set the relation to null
                        $buku->save($con);
                    }
                    $this->bukusScheduledForDeletion = null;
                }
            }

            if ($this->collBukus !== null) {
                foreach ($this->collBukus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bukuPelajaransScheduledForDeletion !== null) {
                if (!$this->bukuPelajaransScheduledForDeletion->isEmpty()) {
                    BukuPelajaranQuery::create()
                        ->filterByPrimaryKeys($this->bukuPelajaransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bukuPelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collBukuPelajarans !== null) {
                foreach ($this->collBukuPelajarans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->daftarAuthorsScheduledForDeletion !== null) {
                if (!$this->daftarAuthorsScheduledForDeletion->isEmpty()) {
                    DaftarAuthorQuery::create()
                        ->filterByPrimaryKeys($this->daftarAuthorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->daftarAuthorsScheduledForDeletion = null;
                }
            }

            if ($this->collDaftarAuthors !== null) {
                foreach ($this->collDaftarAuthors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mapelBibliosScheduledForDeletion !== null) {
                if (!$this->mapelBibliosScheduledForDeletion->isEmpty()) {
                    MapelBiblioQuery::create()
                        ->filterByPrimaryKeys($this->mapelBibliosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mapelBibliosScheduledForDeletion = null;
                }
            }

            if ($this->collMapelBiblios !== null) {
                foreach ($this->collMapelBiblios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tingkatBibliosScheduledForDeletion !== null) {
                if (!$this->tingkatBibliosScheduledForDeletion->isEmpty()) {
                    TingkatBiblioQuery::create()
                        ->filterByPrimaryKeys($this->tingkatBibliosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tingkatBibliosScheduledForDeletion = null;
                }
            }

            if ($this->collTingkatBiblios !== null) {
                foreach ($this->collTingkatBiblios as $referrerFK) {
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
        if ($this->isColumnModified(BiblioPeer::ID_BIBLIO)) {
            $modifiedColumns[':p' . $index++]  = '"id_biblio"';
        }
        if ($this->isColumnModified(BiblioPeer::ID_FREQ)) {
            $modifiedColumns[':p' . $index++]  = '"id_freq"';
        }
        if ($this->isColumnModified(BiblioPeer::ID_PUBLISHER)) {
            $modifiedColumns[':p' . $index++]  = '"id_publisher"';
        }
        if ($this->isColumnModified(BiblioPeer::NEGARA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"negara_id"';
        }
        if ($this->isColumnModified(BiblioPeer::ID_GMD)) {
            $modifiedColumns[':p' . $index++]  = '"id_gmd"';
        }
        if ($this->isColumnModified(BiblioPeer::ID_CLASSIFICATION)) {
            $modifiedColumns[':p' . $index++]  = '"id_classification"';
        }
        if ($this->isColumnModified(BiblioPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BiblioPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '"title"';
        }
        if ($this->isColumnModified(BiblioPeer::SOR)) {
            $modifiedColumns[':p' . $index++]  = '"sor"';
        }
        if ($this->isColumnModified(BiblioPeer::EDITION)) {
            $modifiedColumns[':p' . $index++]  = '"edition"';
        }
        if ($this->isColumnModified(BiblioPeer::ISBN_ISSN)) {
            $modifiedColumns[':p' . $index++]  = '"isbn_issn"';
        }
        if ($this->isColumnModified(BiblioPeer::COLLATIONS)) {
            $modifiedColumns[':p' . $index++]  = '"collations"';
        }
        if ($this->isColumnModified(BiblioPeer::PUBLISHER)) {
            $modifiedColumns[':p' . $index++]  = '"publisher"';
        }
        if ($this->isColumnModified(BiblioPeer::PUBLISH_YEAR)) {
            $modifiedColumns[':p' . $index++]  = '"publish_year"';
        }
        if ($this->isColumnModified(BiblioPeer::SERIES_TITLE)) {
            $modifiedColumns[':p' . $index++]  = '"series_title"';
        }
        if ($this->isColumnModified(BiblioPeer::CALL_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '"call_number"';
        }
        if ($this->isColumnModified(BiblioPeer::SOURCE)) {
            $modifiedColumns[':p' . $index++]  = '"source"';
        }
        if ($this->isColumnModified(BiblioPeer::PUBLISH_PLACE)) {
            $modifiedColumns[':p' . $index++]  = '"publish_place"';
        }
        if ($this->isColumnModified(BiblioPeer::NOTES)) {
            $modifiedColumns[':p' . $index++]  = '"notes"';
        }
        if ($this->isColumnModified(BiblioPeer::IMAGE)) {
            $modifiedColumns[':p' . $index++]  = '"image"';
        }
        if ($this->isColumnModified(BiblioPeer::FILE_ATT)) {
            $modifiedColumns[':p' . $index++]  = '"file_att"';
        }
        if ($this->isColumnModified(BiblioPeer::OPAC_HIDE)) {
            $modifiedColumns[':p' . $index++]  = '"opac_hide"';
        }
        if ($this->isColumnModified(BiblioPeer::PROMOTED)) {
            $modifiedColumns[':p' . $index++]  = '"promoted"';
        }
        if ($this->isColumnModified(BiblioPeer::LABELS)) {
            $modifiedColumns[':p' . $index++]  = '"labels"';
        }
        if ($this->isColumnModified(BiblioPeer::PAPER_PRINTING_SPEC)) {
            $modifiedColumns[':p' . $index++]  = '"paper_printing_spec"';
        }
        if ($this->isColumnModified(BiblioPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(BiblioPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BiblioPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }

        $sql = sprintf(
            'INSERT INTO "pustaka"."biblio" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_biblio"':						
                        $stmt->bindValue($identifier, $this->id_biblio, PDO::PARAM_STR);
                        break;
                    case '"id_freq"':						
                        $stmt->bindValue($identifier, $this->id_freq, PDO::PARAM_STR);
                        break;
                    case '"id_publisher"':						
                        $stmt->bindValue($identifier, $this->id_publisher, PDO::PARAM_STR);
                        break;
                    case '"negara_id"':						
                        $stmt->bindValue($identifier, $this->negara_id, PDO::PARAM_STR);
                        break;
                    case '"id_gmd"':						
                        $stmt->bindValue($identifier, $this->id_gmd, PDO::PARAM_STR);
                        break;
                    case '"id_classification"':						
                        $stmt->bindValue($identifier, $this->id_classification, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"title"':						
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '"sor"':						
                        $stmt->bindValue($identifier, $this->sor, PDO::PARAM_STR);
                        break;
                    case '"edition"':						
                        $stmt->bindValue($identifier, $this->edition, PDO::PARAM_STR);
                        break;
                    case '"isbn_issn"':						
                        $stmt->bindValue($identifier, $this->isbn_issn, PDO::PARAM_STR);
                        break;
                    case '"collations"':						
                        $stmt->bindValue($identifier, $this->collations, PDO::PARAM_STR);
                        break;
                    case '"publisher"':						
                        $stmt->bindValue($identifier, $this->publisher, PDO::PARAM_STR);
                        break;
                    case '"publish_year"':						
                        $stmt->bindValue($identifier, $this->publish_year, PDO::PARAM_STR);
                        break;
                    case '"series_title"':						
                        $stmt->bindValue($identifier, $this->series_title, PDO::PARAM_STR);
                        break;
                    case '"call_number"':						
                        $stmt->bindValue($identifier, $this->call_number, PDO::PARAM_STR);
                        break;
                    case '"source"':						
                        $stmt->bindValue($identifier, $this->source, PDO::PARAM_STR);
                        break;
                    case '"publish_place"':						
                        $stmt->bindValue($identifier, $this->publish_place, PDO::PARAM_STR);
                        break;
                    case '"notes"':						
                        $stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
                        break;
                    case '"image"':						
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
                        break;
                    case '"file_att"':						
                        $stmt->bindValue($identifier, $this->file_att, PDO::PARAM_STR);
                        break;
                    case '"opac_hide"':						
                        $stmt->bindValue($identifier, $this->opac_hide, PDO::PARAM_STR);
                        break;
                    case '"promoted"':						
                        $stmt->bindValue($identifier, $this->promoted, PDO::PARAM_STR);
                        break;
                    case '"labels"':						
                        $stmt->bindValue($identifier, $this->labels, PDO::PARAM_STR);
                        break;
                    case '"paper_printing_spec"':						
                        $stmt->bindValue($identifier, $this->paper_printing_spec, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
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

            if ($this->aClassifications !== null) {
                if (!$this->aClassifications->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClassifications->getValidationFailures());
                }
            }

            if ($this->aFrequency !== null) {
                if (!$this->aFrequency->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFrequency->getValidationFailures());
                }
            }

            if ($this->aGmd !== null) {
                if (!$this->aGmd->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aGmd->getValidationFailures());
                }
            }

            if ($this->aNegara !== null) {
                if (!$this->aNegara->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aNegara->getValidationFailures());
                }
            }


            if (($retval = BiblioPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBukus !== null) {
                    foreach ($this->collBukus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBukuPelajarans !== null) {
                    foreach ($this->collBukuPelajarans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDaftarAuthors !== null) {
                    foreach ($this->collDaftarAuthors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMapelBiblios !== null) {
                    foreach ($this->collMapelBiblios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTingkatBiblios !== null) {
                    foreach ($this->collTingkatBiblios as $referrerFK) {
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
        $pos = BiblioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdBiblio();
                break;
            case 1:
                return $this->getIdFreq();
                break;
            case 2:
                return $this->getIdPublisher();
                break;
            case 3:
                return $this->getNegaraId();
                break;
            case 4:
                return $this->getIdGmd();
                break;
            case 5:
                return $this->getIdClassification();
                break;
            case 6:
                return $this->getCreateDate();
                break;
            case 7:
                return $this->getTitle();
                break;
            case 8:
                return $this->getSor();
                break;
            case 9:
                return $this->getEdition();
                break;
            case 10:
                return $this->getIsbnIssn();
                break;
            case 11:
                return $this->getCollations();
                break;
            case 12:
                return $this->getPublisher();
                break;
            case 13:
                return $this->getPublishYear();
                break;
            case 14:
                return $this->getSeriesTitle();
                break;
            case 15:
                return $this->getCallNumber();
                break;
            case 16:
                return $this->getSource();
                break;
            case 17:
                return $this->getPublishPlace();
                break;
            case 18:
                return $this->getNotes();
                break;
            case 19:
                return $this->getImage();
                break;
            case 20:
                return $this->getFileAtt();
                break;
            case 21:
                return $this->getOpacHide();
                break;
            case 22:
                return $this->getPromoted();
                break;
            case 23:
                return $this->getLabels();
                break;
            case 24:
                return $this->getPaperPrintingSpec();
                break;
            case 25:
                return $this->getLastSync();
                break;
            case 26:
                return $this->getLastUpdate();
                break;
            case 27:
                return $this->getExpiredDate();
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
        if (isset($alreadyDumpedObjects['Biblio'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Biblio'][$this->getPrimaryKey()] = true;
        $keys = BiblioPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdBiblio(),
            $keys[1] => $this->getIdFreq(),
            $keys[2] => $this->getIdPublisher(),
            $keys[3] => $this->getNegaraId(),
            $keys[4] => $this->getIdGmd(),
            $keys[5] => $this->getIdClassification(),
            $keys[6] => $this->getCreateDate(),
            $keys[7] => $this->getTitle(),
            $keys[8] => $this->getSor(),
            $keys[9] => $this->getEdition(),
            $keys[10] => $this->getIsbnIssn(),
            $keys[11] => $this->getCollations(),
            $keys[12] => $this->getPublisher(),
            $keys[13] => $this->getPublishYear(),
            $keys[14] => $this->getSeriesTitle(),
            $keys[15] => $this->getCallNumber(),
            $keys[16] => $this->getSource(),
            $keys[17] => $this->getPublishPlace(),
            $keys[18] => $this->getNotes(),
            $keys[19] => $this->getImage(),
            $keys[20] => $this->getFileAtt(),
            $keys[21] => $this->getOpacHide(),
            $keys[22] => $this->getPromoted(),
            $keys[23] => $this->getLabels(),
            $keys[24] => $this->getPaperPrintingSpec(),
            $keys[25] => $this->getLastSync(),
            $keys[26] => $this->getLastUpdate(),
            $keys[27] => $this->getExpiredDate(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aClassifications) {
                $result['Classifications'] = $this->aClassifications->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFrequency) {
                $result['Frequency'] = $this->aFrequency->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aGmd) {
                $result['Gmd'] = $this->aGmd->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aNegara) {
                $result['Negara'] = $this->aNegara->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBukus) {
                $result['Bukus'] = $this->collBukus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBukuPelajarans) {
                $result['BukuPelajarans'] = $this->collBukuPelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDaftarAuthors) {
                $result['DaftarAuthors'] = $this->collDaftarAuthors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMapelBiblios) {
                $result['MapelBiblios'] = $this->collMapelBiblios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTingkatBiblios) {
                $result['TingkatBiblios'] = $this->collTingkatBiblios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BiblioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdBiblio($value);
                break;
            case 1:
                $this->setIdFreq($value);
                break;
            case 2:
                $this->setIdPublisher($value);
                break;
            case 3:
                $this->setNegaraId($value);
                break;
            case 4:
                $this->setIdGmd($value);
                break;
            case 5:
                $this->setIdClassification($value);
                break;
            case 6:
                $this->setCreateDate($value);
                break;
            case 7:
                $this->setTitle($value);
                break;
            case 8:
                $this->setSor($value);
                break;
            case 9:
                $this->setEdition($value);
                break;
            case 10:
                $this->setIsbnIssn($value);
                break;
            case 11:
                $this->setCollations($value);
                break;
            case 12:
                $this->setPublisher($value);
                break;
            case 13:
                $this->setPublishYear($value);
                break;
            case 14:
                $this->setSeriesTitle($value);
                break;
            case 15:
                $this->setCallNumber($value);
                break;
            case 16:
                $this->setSource($value);
                break;
            case 17:
                $this->setPublishPlace($value);
                break;
            case 18:
                $this->setNotes($value);
                break;
            case 19:
                $this->setImage($value);
                break;
            case 20:
                $this->setFileAtt($value);
                break;
            case 21:
                $this->setOpacHide($value);
                break;
            case 22:
                $this->setPromoted($value);
                break;
            case 23:
                $this->setLabels($value);
                break;
            case 24:
                $this->setPaperPrintingSpec($value);
                break;
            case 25:
                $this->setLastSync($value);
                break;
            case 26:
                $this->setLastUpdate($value);
                break;
            case 27:
                $this->setExpiredDate($value);
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
        $keys = BiblioPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdBiblio($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdFreq($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdPublisher($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNegaraId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIdGmd($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIdClassification($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreateDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTitle($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSor($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setEdition($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIsbnIssn($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCollations($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setPublisher($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setPublishYear($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setSeriesTitle($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setCallNumber($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSource($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setPublishPlace($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setNotes($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setImage($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setFileAtt($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setOpacHide($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setPromoted($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setLabels($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setPaperPrintingSpec($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setLastSync($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setLastUpdate($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setExpiredDate($arr[$keys[27]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BiblioPeer::DATABASE_NAME);

        if ($this->isColumnModified(BiblioPeer::ID_BIBLIO)) $criteria->add(BiblioPeer::ID_BIBLIO, $this->id_biblio);
        if ($this->isColumnModified(BiblioPeer::ID_FREQ)) $criteria->add(BiblioPeer::ID_FREQ, $this->id_freq);
        if ($this->isColumnModified(BiblioPeer::ID_PUBLISHER)) $criteria->add(BiblioPeer::ID_PUBLISHER, $this->id_publisher);
        if ($this->isColumnModified(BiblioPeer::NEGARA_ID)) $criteria->add(BiblioPeer::NEGARA_ID, $this->negara_id);
        if ($this->isColumnModified(BiblioPeer::ID_GMD)) $criteria->add(BiblioPeer::ID_GMD, $this->id_gmd);
        if ($this->isColumnModified(BiblioPeer::ID_CLASSIFICATION)) $criteria->add(BiblioPeer::ID_CLASSIFICATION, $this->id_classification);
        if ($this->isColumnModified(BiblioPeer::CREATE_DATE)) $criteria->add(BiblioPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BiblioPeer::TITLE)) $criteria->add(BiblioPeer::TITLE, $this->title);
        if ($this->isColumnModified(BiblioPeer::SOR)) $criteria->add(BiblioPeer::SOR, $this->sor);
        if ($this->isColumnModified(BiblioPeer::EDITION)) $criteria->add(BiblioPeer::EDITION, $this->edition);
        if ($this->isColumnModified(BiblioPeer::ISBN_ISSN)) $criteria->add(BiblioPeer::ISBN_ISSN, $this->isbn_issn);
        if ($this->isColumnModified(BiblioPeer::COLLATIONS)) $criteria->add(BiblioPeer::COLLATIONS, $this->collations);
        if ($this->isColumnModified(BiblioPeer::PUBLISHER)) $criteria->add(BiblioPeer::PUBLISHER, $this->publisher);
        if ($this->isColumnModified(BiblioPeer::PUBLISH_YEAR)) $criteria->add(BiblioPeer::PUBLISH_YEAR, $this->publish_year);
        if ($this->isColumnModified(BiblioPeer::SERIES_TITLE)) $criteria->add(BiblioPeer::SERIES_TITLE, $this->series_title);
        if ($this->isColumnModified(BiblioPeer::CALL_NUMBER)) $criteria->add(BiblioPeer::CALL_NUMBER, $this->call_number);
        if ($this->isColumnModified(BiblioPeer::SOURCE)) $criteria->add(BiblioPeer::SOURCE, $this->source);
        if ($this->isColumnModified(BiblioPeer::PUBLISH_PLACE)) $criteria->add(BiblioPeer::PUBLISH_PLACE, $this->publish_place);
        if ($this->isColumnModified(BiblioPeer::NOTES)) $criteria->add(BiblioPeer::NOTES, $this->notes);
        if ($this->isColumnModified(BiblioPeer::IMAGE)) $criteria->add(BiblioPeer::IMAGE, $this->image);
        if ($this->isColumnModified(BiblioPeer::FILE_ATT)) $criteria->add(BiblioPeer::FILE_ATT, $this->file_att);
        if ($this->isColumnModified(BiblioPeer::OPAC_HIDE)) $criteria->add(BiblioPeer::OPAC_HIDE, $this->opac_hide);
        if ($this->isColumnModified(BiblioPeer::PROMOTED)) $criteria->add(BiblioPeer::PROMOTED, $this->promoted);
        if ($this->isColumnModified(BiblioPeer::LABELS)) $criteria->add(BiblioPeer::LABELS, $this->labels);
        if ($this->isColumnModified(BiblioPeer::PAPER_PRINTING_SPEC)) $criteria->add(BiblioPeer::PAPER_PRINTING_SPEC, $this->paper_printing_spec);
        if ($this->isColumnModified(BiblioPeer::LAST_SYNC)) $criteria->add(BiblioPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(BiblioPeer::LAST_UPDATE)) $criteria->add(BiblioPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BiblioPeer::EXPIRED_DATE)) $criteria->add(BiblioPeer::EXPIRED_DATE, $this->expired_date);

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
        $criteria = new Criteria(BiblioPeer::DATABASE_NAME);
        $criteria->add(BiblioPeer::ID_BIBLIO, $this->id_biblio);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdBiblio();
    }

    /**
     * Generic method to set the primary key (id_biblio column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdBiblio($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdBiblio();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Biblio (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdFreq($this->getIdFreq());
        $copyObj->setIdPublisher($this->getIdPublisher());
        $copyObj->setNegaraId($this->getNegaraId());
        $copyObj->setIdGmd($this->getIdGmd());
        $copyObj->setIdClassification($this->getIdClassification());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setSor($this->getSor());
        $copyObj->setEdition($this->getEdition());
        $copyObj->setIsbnIssn($this->getIsbnIssn());
        $copyObj->setCollations($this->getCollations());
        $copyObj->setPublisher($this->getPublisher());
        $copyObj->setPublishYear($this->getPublishYear());
        $copyObj->setSeriesTitle($this->getSeriesTitle());
        $copyObj->setCallNumber($this->getCallNumber());
        $copyObj->setSource($this->getSource());
        $copyObj->setPublishPlace($this->getPublishPlace());
        $copyObj->setNotes($this->getNotes());
        $copyObj->setImage($this->getImage());
        $copyObj->setFileAtt($this->getFileAtt());
        $copyObj->setOpacHide($this->getOpacHide());
        $copyObj->setPromoted($this->getPromoted());
        $copyObj->setLabels($this->getLabels());
        $copyObj->setPaperPrintingSpec($this->getPaperPrintingSpec());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setExpiredDate($this->getExpiredDate());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBukus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBuku($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBukuPelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBukuPelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDaftarAuthors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDaftarAuthor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapelBiblios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapelBiblio($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTingkatBiblios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTingkatBiblio($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdBiblio(NULL); // this is a auto-increment column, so set to default value
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
     * @return Biblio Clone of current object.
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
     * @return BiblioPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BiblioPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Classifications object.
     *
     * @param             Classifications $v
     * @return Biblio The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClassifications(Classifications $v = null)
    {
        if ($v === null) {
            $this->setIdClassification(NULL);
        } else {
            $this->setIdClassification($v->getIdClassification());
        }

        $this->aClassifications = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Classifications object, it will not be re-added.
        if ($v !== null) {
            $v->addBiblio($this);
        }


        return $this;
    }


    /**
     * Get the associated Classifications object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Classifications The associated Classifications object.
     * @throws PropelException
     */
    public function getClassifications(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClassifications === null && (($this->id_classification !== "" && $this->id_classification !== null)) && $doQuery) {
            $this->aClassifications = ClassificationsQuery::create()->findPk($this->id_classification, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClassifications->addBiblios($this);
             */
        }

        return $this->aClassifications;
    }

    /**
     * Declares an association between this object and a Frequency object.
     *
     * @param             Frequency $v
     * @return Biblio The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFrequency(Frequency $v = null)
    {
        if ($v === null) {
            $this->setIdFreq(NULL);
        } else {
            $this->setIdFreq($v->getIdFreq());
        }

        $this->aFrequency = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Frequency object, it will not be re-added.
        if ($v !== null) {
            $v->addBiblio($this);
        }


        return $this;
    }


    /**
     * Get the associated Frequency object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Frequency The associated Frequency object.
     * @throws PropelException
     */
    public function getFrequency(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFrequency === null && (($this->id_freq !== "" && $this->id_freq !== null)) && $doQuery) {
            $this->aFrequency = FrequencyQuery::create()->findPk($this->id_freq, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFrequency->addBiblios($this);
             */
        }

        return $this->aFrequency;
    }

    /**
     * Declares an association between this object and a Gmd object.
     *
     * @param             Gmd $v
     * @return Biblio The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGmd(Gmd $v = null)
    {
        if ($v === null) {
            $this->setIdGmd(NULL);
        } else {
            $this->setIdGmd($v->getIdGmd());
        }

        $this->aGmd = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Gmd object, it will not be re-added.
        if ($v !== null) {
            $v->addBiblio($this);
        }


        return $this;
    }


    /**
     * Get the associated Gmd object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Gmd The associated Gmd object.
     * @throws PropelException
     */
    public function getGmd(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aGmd === null && (($this->id_gmd !== "" && $this->id_gmd !== null)) && $doQuery) {
            $this->aGmd = GmdQuery::create()->findPk($this->id_gmd, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGmd->addBiblios($this);
             */
        }

        return $this->aGmd;
    }

    /**
     * Declares an association between this object and a Negara object.
     *
     * @param             Negara $v
     * @return Biblio The current object (for fluent API support)
     * @throws PropelException
     */
    public function setNegara(Negara $v = null)
    {
        if ($v === null) {
            $this->setNegaraId(NULL);
        } else {
            $this->setNegaraId($v->getNegaraId());
        }

        $this->aNegara = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Negara object, it will not be re-added.
        if ($v !== null) {
            $v->addBiblio($this);
        }


        return $this;
    }


    /**
     * Get the associated Negara object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Negara The associated Negara object.
     * @throws PropelException
     */
    public function getNegara(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aNegara === null && (($this->negara_id !== "" && $this->negara_id !== null)) && $doQuery) {
            $this->aNegara = NegaraQuery::create()->findPk($this->negara_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aNegara->addBiblios($this);
             */
        }

        return $this->aNegara;
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
        if ('Buku' == $relationName) {
            $this->initBukus();
        }
        if ('BukuPelajaran' == $relationName) {
            $this->initBukuPelajarans();
        }
        if ('DaftarAuthor' == $relationName) {
            $this->initDaftarAuthors();
        }
        if ('MapelBiblio' == $relationName) {
            $this->initMapelBiblios();
        }
        if ('TingkatBiblio' == $relationName) {
            $this->initTingkatBiblios();
        }
    }

    /**
     * Clears out the collBukus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Biblio The current object (for fluent API support)
     * @see        addBukus()
     */
    public function clearBukus()
    {
        $this->collBukus = null; // important to set this to null since that means it is uninitialized
        $this->collBukusPartial = null;

        return $this;
    }

    /**
     * reset is the collBukus collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukus($v = true)
    {
        $this->collBukusPartial = $v;
    }

    /**
     * Initializes the collBukus collection.
     *
     * By default this just sets the collBukus collection to an empty array (like clearcollBukus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukus($overrideExisting = true)
    {
        if (null !== $this->collBukus && !$overrideExisting) {
            return;
        }
        $this->collBukus = new PropelObjectCollection();
        $this->collBukus->setModel('Buku');
    }

    /**
     * Gets an array of Buku objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Biblio is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Buku[] List of Buku objects
     * @throws PropelException
     */
    public function getBukus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                // return empty collection
                $this->initBukus();
            } else {
                $collBukus = BukuQuery::create(null, $criteria)
                    ->filterByBiblio($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukusPartial && count($collBukus)) {
                      $this->initBukus(false);

                      foreach($collBukus as $obj) {
                        if (false == $this->collBukus->contains($obj)) {
                          $this->collBukus->append($obj);
                        }
                      }

                      $this->collBukusPartial = true;
                    }

                    $collBukus->getInternalIterator()->rewind();
                    return $collBukus;
                }

                if($partial && $this->collBukus) {
                    foreach($this->collBukus as $obj) {
                        if($obj->isNew()) {
                            $collBukus[] = $obj;
                        }
                    }
                }

                $this->collBukus = $collBukus;
                $this->collBukusPartial = false;
            }
        }

        return $this->collBukus;
    }

    /**
     * Sets a collection of Buku objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Biblio The current object (for fluent API support)
     */
    public function setBukus(PropelCollection $bukus, PropelPDO $con = null)
    {
        $bukusToDelete = $this->getBukus(new Criteria(), $con)->diff($bukus);

        $this->bukusScheduledForDeletion = unserialize(serialize($bukusToDelete));

        foreach ($bukusToDelete as $bukuRemoved) {
            $bukuRemoved->setBiblio(null);
        }

        $this->collBukus = null;
        foreach ($bukus as $buku) {
            $this->addBuku($buku);
        }

        $this->collBukus = $bukus;
        $this->collBukusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Buku objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Buku objects.
     * @throws PropelException
     */
    public function countBukus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukus());
            }
            $query = BukuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBiblio($this)
                ->count($con);
        }

        return count($this->collBukus);
    }

    /**
     * Method called to associate a Buku object to this object
     * through the Buku foreign key attribute.
     *
     * @param    Buku $l Buku
     * @return Biblio The current object (for fluent API support)
     */
    public function addBuku(Buku $l)
    {
        if ($this->collBukus === null) {
            $this->initBukus();
            $this->collBukusPartial = true;
        }
        if (!in_array($l, $this->collBukus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBuku($l);
        }

        return $this;
    }

    /**
     * @param	Buku $buku The buku object to add.
     */
    protected function doAddBuku($buku)
    {
        $this->collBukus[]= $buku;
        $buku->setBiblio($this);
    }

    /**
     * @param	Buku $buku The buku object to remove.
     * @return Biblio The current object (for fluent API support)
     */
    public function removeBuku($buku)
    {
        if ($this->getBukus()->contains($buku)) {
            $this->collBukus->remove($this->collBukus->search($buku));
            if (null === $this->bukusScheduledForDeletion) {
                $this->bukusScheduledForDeletion = clone $this->collBukus;
                $this->bukusScheduledForDeletion->clear();
            }
            $this->bukusScheduledForDeletion[]= $buku;
            $buku->setBiblio(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getBukus($query, $con);
    }

    /**
     * Clears out the collBukuPelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Biblio The current object (for fluent API support)
     * @see        addBukuPelajarans()
     */
    public function clearBukuPelajarans()
    {
        $this->collBukuPelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collBukuPelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collBukuPelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukuPelajarans($v = true)
    {
        $this->collBukuPelajaransPartial = $v;
    }

    /**
     * Initializes the collBukuPelajarans collection.
     *
     * By default this just sets the collBukuPelajarans collection to an empty array (like clearcollBukuPelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukuPelajarans($overrideExisting = true)
    {
        if (null !== $this->collBukuPelajarans && !$overrideExisting) {
            return;
        }
        $this->collBukuPelajarans = new PropelObjectCollection();
        $this->collBukuPelajarans->setModel('BukuPelajaran');
    }

    /**
     * Gets an array of BukuPelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Biblio is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BukuPelajaran[] List of BukuPelajaran objects
     * @throws PropelException
     */
    public function getBukuPelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukuPelajaransPartial && !$this->isNew();
        if (null === $this->collBukuPelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukuPelajarans) {
                // return empty collection
                $this->initBukuPelajarans();
            } else {
                $collBukuPelajarans = BukuPelajaranQuery::create(null, $criteria)
                    ->filterByBiblio($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukuPelajaransPartial && count($collBukuPelajarans)) {
                      $this->initBukuPelajarans(false);

                      foreach($collBukuPelajarans as $obj) {
                        if (false == $this->collBukuPelajarans->contains($obj)) {
                          $this->collBukuPelajarans->append($obj);
                        }
                      }

                      $this->collBukuPelajaransPartial = true;
                    }

                    $collBukuPelajarans->getInternalIterator()->rewind();
                    return $collBukuPelajarans;
                }

                if($partial && $this->collBukuPelajarans) {
                    foreach($this->collBukuPelajarans as $obj) {
                        if($obj->isNew()) {
                            $collBukuPelajarans[] = $obj;
                        }
                    }
                }

                $this->collBukuPelajarans = $collBukuPelajarans;
                $this->collBukuPelajaransPartial = false;
            }
        }

        return $this->collBukuPelajarans;
    }

    /**
     * Sets a collection of BukuPelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukuPelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Biblio The current object (for fluent API support)
     */
    public function setBukuPelajarans(PropelCollection $bukuPelajarans, PropelPDO $con = null)
    {
        $bukuPelajaransToDelete = $this->getBukuPelajarans(new Criteria(), $con)->diff($bukuPelajarans);

        $this->bukuPelajaransScheduledForDeletion = unserialize(serialize($bukuPelajaransToDelete));

        foreach ($bukuPelajaransToDelete as $bukuPelajaranRemoved) {
            $bukuPelajaranRemoved->setBiblio(null);
        }

        $this->collBukuPelajarans = null;
        foreach ($bukuPelajarans as $bukuPelajaran) {
            $this->addBukuPelajaran($bukuPelajaran);
        }

        $this->collBukuPelajarans = $bukuPelajarans;
        $this->collBukuPelajaransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BukuPelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BukuPelajaran objects.
     * @throws PropelException
     */
    public function countBukuPelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukuPelajaransPartial && !$this->isNew();
        if (null === $this->collBukuPelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukuPelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukuPelajarans());
            }
            $query = BukuPelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBiblio($this)
                ->count($con);
        }

        return count($this->collBukuPelajarans);
    }

    /**
     * Method called to associate a BukuPelajaran object to this object
     * through the BukuPelajaran foreign key attribute.
     *
     * @param    BukuPelajaran $l BukuPelajaran
     * @return Biblio The current object (for fluent API support)
     */
    public function addBukuPelajaran(BukuPelajaran $l)
    {
        if ($this->collBukuPelajarans === null) {
            $this->initBukuPelajarans();
            $this->collBukuPelajaransPartial = true;
        }
        if (!in_array($l, $this->collBukuPelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBukuPelajaran($l);
        }

        return $this;
    }

    /**
     * @param	BukuPelajaran $bukuPelajaran The bukuPelajaran object to add.
     */
    protected function doAddBukuPelajaran($bukuPelajaran)
    {
        $this->collBukuPelajarans[]= $bukuPelajaran;
        $bukuPelajaran->setBiblio($this);
    }

    /**
     * @param	BukuPelajaran $bukuPelajaran The bukuPelajaran object to remove.
     * @return Biblio The current object (for fluent API support)
     */
    public function removeBukuPelajaran($bukuPelajaran)
    {
        if ($this->getBukuPelajarans()->contains($bukuPelajaran)) {
            $this->collBukuPelajarans->remove($this->collBukuPelajarans->search($bukuPelajaran));
            if (null === $this->bukuPelajaransScheduledForDeletion) {
                $this->bukuPelajaransScheduledForDeletion = clone $this->collBukuPelajarans;
                $this->bukuPelajaransScheduledForDeletion->clear();
            }
            $this->bukuPelajaransScheduledForDeletion[]= clone $bukuPelajaran;
            $bukuPelajaran->setBiblio(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related BukuPelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BukuPelajaran[] List of BukuPelajaran objects
     */
    public function getBukuPelajaransJoinPembelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuPelajaranQuery::create(null, $criteria);
        $query->joinWith('Pembelajaran', $join_behavior);

        return $this->getBukuPelajarans($query, $con);
    }

    /**
     * Clears out the collDaftarAuthors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Biblio The current object (for fluent API support)
     * @see        addDaftarAuthors()
     */
    public function clearDaftarAuthors()
    {
        $this->collDaftarAuthors = null; // important to set this to null since that means it is uninitialized
        $this->collDaftarAuthorsPartial = null;

        return $this;
    }

    /**
     * reset is the collDaftarAuthors collection loaded partially
     *
     * @return void
     */
    public function resetPartialDaftarAuthors($v = true)
    {
        $this->collDaftarAuthorsPartial = $v;
    }

    /**
     * Initializes the collDaftarAuthors collection.
     *
     * By default this just sets the collDaftarAuthors collection to an empty array (like clearcollDaftarAuthors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDaftarAuthors($overrideExisting = true)
    {
        if (null !== $this->collDaftarAuthors && !$overrideExisting) {
            return;
        }
        $this->collDaftarAuthors = new PropelObjectCollection();
        $this->collDaftarAuthors->setModel('DaftarAuthor');
    }

    /**
     * Gets an array of DaftarAuthor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Biblio is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|DaftarAuthor[] List of DaftarAuthor objects
     * @throws PropelException
     */
    public function getDaftarAuthors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDaftarAuthorsPartial && !$this->isNew();
        if (null === $this->collDaftarAuthors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDaftarAuthors) {
                // return empty collection
                $this->initDaftarAuthors();
            } else {
                $collDaftarAuthors = DaftarAuthorQuery::create(null, $criteria)
                    ->filterByBiblio($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDaftarAuthorsPartial && count($collDaftarAuthors)) {
                      $this->initDaftarAuthors(false);

                      foreach($collDaftarAuthors as $obj) {
                        if (false == $this->collDaftarAuthors->contains($obj)) {
                          $this->collDaftarAuthors->append($obj);
                        }
                      }

                      $this->collDaftarAuthorsPartial = true;
                    }

                    $collDaftarAuthors->getInternalIterator()->rewind();
                    return $collDaftarAuthors;
                }

                if($partial && $this->collDaftarAuthors) {
                    foreach($this->collDaftarAuthors as $obj) {
                        if($obj->isNew()) {
                            $collDaftarAuthors[] = $obj;
                        }
                    }
                }

                $this->collDaftarAuthors = $collDaftarAuthors;
                $this->collDaftarAuthorsPartial = false;
            }
        }

        return $this->collDaftarAuthors;
    }

    /**
     * Sets a collection of DaftarAuthor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $daftarAuthors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Biblio The current object (for fluent API support)
     */
    public function setDaftarAuthors(PropelCollection $daftarAuthors, PropelPDO $con = null)
    {
        $daftarAuthorsToDelete = $this->getDaftarAuthors(new Criteria(), $con)->diff($daftarAuthors);

        $this->daftarAuthorsScheduledForDeletion = unserialize(serialize($daftarAuthorsToDelete));

        foreach ($daftarAuthorsToDelete as $daftarAuthorRemoved) {
            $daftarAuthorRemoved->setBiblio(null);
        }

        $this->collDaftarAuthors = null;
        foreach ($daftarAuthors as $daftarAuthor) {
            $this->addDaftarAuthor($daftarAuthor);
        }

        $this->collDaftarAuthors = $daftarAuthors;
        $this->collDaftarAuthorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DaftarAuthor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related DaftarAuthor objects.
     * @throws PropelException
     */
    public function countDaftarAuthors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDaftarAuthorsPartial && !$this->isNew();
        if (null === $this->collDaftarAuthors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDaftarAuthors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDaftarAuthors());
            }
            $query = DaftarAuthorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBiblio($this)
                ->count($con);
        }

        return count($this->collDaftarAuthors);
    }

    /**
     * Method called to associate a DaftarAuthor object to this object
     * through the DaftarAuthor foreign key attribute.
     *
     * @param    DaftarAuthor $l DaftarAuthor
     * @return Biblio The current object (for fluent API support)
     */
    public function addDaftarAuthor(DaftarAuthor $l)
    {
        if ($this->collDaftarAuthors === null) {
            $this->initDaftarAuthors();
            $this->collDaftarAuthorsPartial = true;
        }
        if (!in_array($l, $this->collDaftarAuthors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDaftarAuthor($l);
        }

        return $this;
    }

    /**
     * @param	DaftarAuthor $daftarAuthor The daftarAuthor object to add.
     */
    protected function doAddDaftarAuthor($daftarAuthor)
    {
        $this->collDaftarAuthors[]= $daftarAuthor;
        $daftarAuthor->setBiblio($this);
    }

    /**
     * @param	DaftarAuthor $daftarAuthor The daftarAuthor object to remove.
     * @return Biblio The current object (for fluent API support)
     */
    public function removeDaftarAuthor($daftarAuthor)
    {
        if ($this->getDaftarAuthors()->contains($daftarAuthor)) {
            $this->collDaftarAuthors->remove($this->collDaftarAuthors->search($daftarAuthor));
            if (null === $this->daftarAuthorsScheduledForDeletion) {
                $this->daftarAuthorsScheduledForDeletion = clone $this->collDaftarAuthors;
                $this->daftarAuthorsScheduledForDeletion->clear();
            }
            $this->daftarAuthorsScheduledForDeletion[]= clone $daftarAuthor;
            $daftarAuthor->setBiblio(null);
        }

        return $this;
    }

    /**
     * Clears out the collMapelBiblios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Biblio The current object (for fluent API support)
     * @see        addMapelBiblios()
     */
    public function clearMapelBiblios()
    {
        $this->collMapelBiblios = null; // important to set this to null since that means it is uninitialized
        $this->collMapelBibliosPartial = null;

        return $this;
    }

    /**
     * reset is the collMapelBiblios collection loaded partially
     *
     * @return void
     */
    public function resetPartialMapelBiblios($v = true)
    {
        $this->collMapelBibliosPartial = $v;
    }

    /**
     * Initializes the collMapelBiblios collection.
     *
     * By default this just sets the collMapelBiblios collection to an empty array (like clearcollMapelBiblios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMapelBiblios($overrideExisting = true)
    {
        if (null !== $this->collMapelBiblios && !$overrideExisting) {
            return;
        }
        $this->collMapelBiblios = new PropelObjectCollection();
        $this->collMapelBiblios->setModel('MapelBiblio');
    }

    /**
     * Gets an array of MapelBiblio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Biblio is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MapelBiblio[] List of MapelBiblio objects
     * @throws PropelException
     */
    public function getMapelBiblios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMapelBibliosPartial && !$this->isNew();
        if (null === $this->collMapelBiblios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMapelBiblios) {
                // return empty collection
                $this->initMapelBiblios();
            } else {
                $collMapelBiblios = MapelBiblioQuery::create(null, $criteria)
                    ->filterByBiblio($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMapelBibliosPartial && count($collMapelBiblios)) {
                      $this->initMapelBiblios(false);

                      foreach($collMapelBiblios as $obj) {
                        if (false == $this->collMapelBiblios->contains($obj)) {
                          $this->collMapelBiblios->append($obj);
                        }
                      }

                      $this->collMapelBibliosPartial = true;
                    }

                    $collMapelBiblios->getInternalIterator()->rewind();
                    return $collMapelBiblios;
                }

                if($partial && $this->collMapelBiblios) {
                    foreach($this->collMapelBiblios as $obj) {
                        if($obj->isNew()) {
                            $collMapelBiblios[] = $obj;
                        }
                    }
                }

                $this->collMapelBiblios = $collMapelBiblios;
                $this->collMapelBibliosPartial = false;
            }
        }

        return $this->collMapelBiblios;
    }

    /**
     * Sets a collection of MapelBiblio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mapelBiblios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Biblio The current object (for fluent API support)
     */
    public function setMapelBiblios(PropelCollection $mapelBiblios, PropelPDO $con = null)
    {
        $mapelBibliosToDelete = $this->getMapelBiblios(new Criteria(), $con)->diff($mapelBiblios);

        $this->mapelBibliosScheduledForDeletion = unserialize(serialize($mapelBibliosToDelete));

        foreach ($mapelBibliosToDelete as $mapelBiblioRemoved) {
            $mapelBiblioRemoved->setBiblio(null);
        }

        $this->collMapelBiblios = null;
        foreach ($mapelBiblios as $mapelBiblio) {
            $this->addMapelBiblio($mapelBiblio);
        }

        $this->collMapelBiblios = $mapelBiblios;
        $this->collMapelBibliosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MapelBiblio objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MapelBiblio objects.
     * @throws PropelException
     */
    public function countMapelBiblios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMapelBibliosPartial && !$this->isNew();
        if (null === $this->collMapelBiblios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMapelBiblios) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMapelBiblios());
            }
            $query = MapelBiblioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBiblio($this)
                ->count($con);
        }

        return count($this->collMapelBiblios);
    }

    /**
     * Method called to associate a MapelBiblio object to this object
     * through the MapelBiblio foreign key attribute.
     *
     * @param    MapelBiblio $l MapelBiblio
     * @return Biblio The current object (for fluent API support)
     */
    public function addMapelBiblio(MapelBiblio $l)
    {
        if ($this->collMapelBiblios === null) {
            $this->initMapelBiblios();
            $this->collMapelBibliosPartial = true;
        }
        if (!in_array($l, $this->collMapelBiblios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMapelBiblio($l);
        }

        return $this;
    }

    /**
     * @param	MapelBiblio $mapelBiblio The mapelBiblio object to add.
     */
    protected function doAddMapelBiblio($mapelBiblio)
    {
        $this->collMapelBiblios[]= $mapelBiblio;
        $mapelBiblio->setBiblio($this);
    }

    /**
     * @param	MapelBiblio $mapelBiblio The mapelBiblio object to remove.
     * @return Biblio The current object (for fluent API support)
     */
    public function removeMapelBiblio($mapelBiblio)
    {
        if ($this->getMapelBiblios()->contains($mapelBiblio)) {
            $this->collMapelBiblios->remove($this->collMapelBiblios->search($mapelBiblio));
            if (null === $this->mapelBibliosScheduledForDeletion) {
                $this->mapelBibliosScheduledForDeletion = clone $this->collMapelBiblios;
                $this->mapelBibliosScheduledForDeletion->clear();
            }
            $this->mapelBibliosScheduledForDeletion[]= clone $mapelBiblio;
            $mapelBiblio->setBiblio(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related MapelBiblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MapelBiblio[] List of MapelBiblio objects
     */
    public function getMapelBibliosJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MapelBiblioQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getMapelBiblios($query, $con);
    }

    /**
     * Clears out the collTingkatBiblios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Biblio The current object (for fluent API support)
     * @see        addTingkatBiblios()
     */
    public function clearTingkatBiblios()
    {
        $this->collTingkatBiblios = null; // important to set this to null since that means it is uninitialized
        $this->collTingkatBibliosPartial = null;

        return $this;
    }

    /**
     * reset is the collTingkatBiblios collection loaded partially
     *
     * @return void
     */
    public function resetPartialTingkatBiblios($v = true)
    {
        $this->collTingkatBibliosPartial = $v;
    }

    /**
     * Initializes the collTingkatBiblios collection.
     *
     * By default this just sets the collTingkatBiblios collection to an empty array (like clearcollTingkatBiblios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTingkatBiblios($overrideExisting = true)
    {
        if (null !== $this->collTingkatBiblios && !$overrideExisting) {
            return;
        }
        $this->collTingkatBiblios = new PropelObjectCollection();
        $this->collTingkatBiblios->setModel('TingkatBiblio');
    }

    /**
     * Gets an array of TingkatBiblio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Biblio is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TingkatBiblio[] List of TingkatBiblio objects
     * @throws PropelException
     */
    public function getTingkatBiblios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTingkatBibliosPartial && !$this->isNew();
        if (null === $this->collTingkatBiblios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTingkatBiblios) {
                // return empty collection
                $this->initTingkatBiblios();
            } else {
                $collTingkatBiblios = TingkatBiblioQuery::create(null, $criteria)
                    ->filterByBiblio($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTingkatBibliosPartial && count($collTingkatBiblios)) {
                      $this->initTingkatBiblios(false);

                      foreach($collTingkatBiblios as $obj) {
                        if (false == $this->collTingkatBiblios->contains($obj)) {
                          $this->collTingkatBiblios->append($obj);
                        }
                      }

                      $this->collTingkatBibliosPartial = true;
                    }

                    $collTingkatBiblios->getInternalIterator()->rewind();
                    return $collTingkatBiblios;
                }

                if($partial && $this->collTingkatBiblios) {
                    foreach($this->collTingkatBiblios as $obj) {
                        if($obj->isNew()) {
                            $collTingkatBiblios[] = $obj;
                        }
                    }
                }

                $this->collTingkatBiblios = $collTingkatBiblios;
                $this->collTingkatBibliosPartial = false;
            }
        }

        return $this->collTingkatBiblios;
    }

    /**
     * Sets a collection of TingkatBiblio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tingkatBiblios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Biblio The current object (for fluent API support)
     */
    public function setTingkatBiblios(PropelCollection $tingkatBiblios, PropelPDO $con = null)
    {
        $tingkatBibliosToDelete = $this->getTingkatBiblios(new Criteria(), $con)->diff($tingkatBiblios);

        $this->tingkatBibliosScheduledForDeletion = unserialize(serialize($tingkatBibliosToDelete));

        foreach ($tingkatBibliosToDelete as $tingkatBiblioRemoved) {
            $tingkatBiblioRemoved->setBiblio(null);
        }

        $this->collTingkatBiblios = null;
        foreach ($tingkatBiblios as $tingkatBiblio) {
            $this->addTingkatBiblio($tingkatBiblio);
        }

        $this->collTingkatBiblios = $tingkatBiblios;
        $this->collTingkatBibliosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TingkatBiblio objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TingkatBiblio objects.
     * @throws PropelException
     */
    public function countTingkatBiblios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTingkatBibliosPartial && !$this->isNew();
        if (null === $this->collTingkatBiblios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTingkatBiblios) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTingkatBiblios());
            }
            $query = TingkatBiblioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBiblio($this)
                ->count($con);
        }

        return count($this->collTingkatBiblios);
    }

    /**
     * Method called to associate a TingkatBiblio object to this object
     * through the TingkatBiblio foreign key attribute.
     *
     * @param    TingkatBiblio $l TingkatBiblio
     * @return Biblio The current object (for fluent API support)
     */
    public function addTingkatBiblio(TingkatBiblio $l)
    {
        if ($this->collTingkatBiblios === null) {
            $this->initTingkatBiblios();
            $this->collTingkatBibliosPartial = true;
        }
        if (!in_array($l, $this->collTingkatBiblios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTingkatBiblio($l);
        }

        return $this;
    }

    /**
     * @param	TingkatBiblio $tingkatBiblio The tingkatBiblio object to add.
     */
    protected function doAddTingkatBiblio($tingkatBiblio)
    {
        $this->collTingkatBiblios[]= $tingkatBiblio;
        $tingkatBiblio->setBiblio($this);
    }

    /**
     * @param	TingkatBiblio $tingkatBiblio The tingkatBiblio object to remove.
     * @return Biblio The current object (for fluent API support)
     */
    public function removeTingkatBiblio($tingkatBiblio)
    {
        if ($this->getTingkatBiblios()->contains($tingkatBiblio)) {
            $this->collTingkatBiblios->remove($this->collTingkatBiblios->search($tingkatBiblio));
            if (null === $this->tingkatBibliosScheduledForDeletion) {
                $this->tingkatBibliosScheduledForDeletion = clone $this->collTingkatBiblios;
                $this->tingkatBibliosScheduledForDeletion->clear();
            }
            $this->tingkatBibliosScheduledForDeletion[]= clone $tingkatBiblio;
            $tingkatBiblio->setBiblio(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Biblio is new, it will return
     * an empty collection; or if this Biblio has previously
     * been saved, it will retrieve related TingkatBiblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Biblio.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TingkatBiblio[] List of TingkatBiblio objects
     */
    public function getTingkatBibliosJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TingkatBiblioQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getTingkatBiblios($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_biblio = null;
        $this->id_freq = null;
        $this->id_publisher = null;
        $this->negara_id = null;
        $this->id_gmd = null;
        $this->id_classification = null;
        $this->create_date = null;
        $this->title = null;
        $this->sor = null;
        $this->edition = null;
        $this->isbn_issn = null;
        $this->collations = null;
        $this->publisher = null;
        $this->publish_year = null;
        $this->series_title = null;
        $this->call_number = null;
        $this->source = null;
        $this->publish_place = null;
        $this->notes = null;
        $this->image = null;
        $this->file_att = null;
        $this->opac_hide = null;
        $this->promoted = null;
        $this->labels = null;
        $this->paper_printing_spec = null;
        $this->last_sync = null;
        $this->last_update = null;
        $this->expired_date = null;
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
            if ($this->collBukus) {
                foreach ($this->collBukus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBukuPelajarans) {
                foreach ($this->collBukuPelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDaftarAuthors) {
                foreach ($this->collDaftarAuthors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapelBiblios) {
                foreach ($this->collMapelBiblios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTingkatBiblios) {
                foreach ($this->collTingkatBiblios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aClassifications instanceof Persistent) {
              $this->aClassifications->clearAllReferences($deep);
            }
            if ($this->aFrequency instanceof Persistent) {
              $this->aFrequency->clearAllReferences($deep);
            }
            if ($this->aGmd instanceof Persistent) {
              $this->aGmd->clearAllReferences($deep);
            }
            if ($this->aNegara instanceof Persistent) {
              $this->aNegara->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBukus instanceof PropelCollection) {
            $this->collBukus->clearIterator();
        }
        $this->collBukus = null;
        if ($this->collBukuPelajarans instanceof PropelCollection) {
            $this->collBukuPelajarans->clearIterator();
        }
        $this->collBukuPelajarans = null;
        if ($this->collDaftarAuthors instanceof PropelCollection) {
            $this->collDaftarAuthors->clearIterator();
        }
        $this->collDaftarAuthors = null;
        if ($this->collMapelBiblios instanceof PropelCollection) {
            $this->collMapelBiblios->clearIterator();
        }
        $this->collMapelBiblios = null;
        if ($this->collTingkatBiblios instanceof PropelCollection) {
            $this->collTingkatBiblios->clearIterator();
        }
        $this->collTingkatBiblios = null;
        $this->aClassifications = null;
        $this->aFrequency = null;
        $this->aGmd = null;
        $this->aNegara = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BiblioPeer::DEFAULT_STRING_FORMAT);
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
