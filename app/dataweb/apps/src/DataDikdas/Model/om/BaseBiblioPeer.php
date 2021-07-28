<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Biblio;
use DataDikdas\Model\BiblioPeer;
use DataDikdas\Model\ClassificationsPeer;
use DataDikdas\Model\FrequencyPeer;
use DataDikdas\Model\GmdPeer;
use DataDikdas\Model\NegaraPeer;
use DataDikdas\Model\map\BiblioTableMap;

/**
 * Base static class for performing query and update operations on the 'pustaka.biblio' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBiblioPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'pustaka.biblio';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Biblio';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BiblioTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 28;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 28;

    /** the column name for the id_biblio field */
    const ID_BIBLIO = 'pustaka.biblio.id_biblio';

    /** the column name for the id_freq field */
    const ID_FREQ = 'pustaka.biblio.id_freq';

    /** the column name for the id_publisher field */
    const ID_PUBLISHER = 'pustaka.biblio.id_publisher';

    /** the column name for the negara_id field */
    const NEGARA_ID = 'pustaka.biblio.negara_id';

    /** the column name for the id_gmd field */
    const ID_GMD = 'pustaka.biblio.id_gmd';

    /** the column name for the id_classification field */
    const ID_CLASSIFICATION = 'pustaka.biblio.id_classification';

    /** the column name for the create_date field */
    const CREATE_DATE = 'pustaka.biblio.create_date';

    /** the column name for the title field */
    const TITLE = 'pustaka.biblio.title';

    /** the column name for the sor field */
    const SOR = 'pustaka.biblio.sor';

    /** the column name for the edition field */
    const EDITION = 'pustaka.biblio.edition';

    /** the column name for the isbn_issn field */
    const ISBN_ISSN = 'pustaka.biblio.isbn_issn';

    /** the column name for the collations field */
    const COLLATIONS = 'pustaka.biblio.collations';

    /** the column name for the publisher field */
    const PUBLISHER = 'pustaka.biblio.publisher';

    /** the column name for the publish_year field */
    const PUBLISH_YEAR = 'pustaka.biblio.publish_year';

    /** the column name for the series_title field */
    const SERIES_TITLE = 'pustaka.biblio.series_title';

    /** the column name for the call_number field */
    const CALL_NUMBER = 'pustaka.biblio.call_number';

    /** the column name for the source field */
    const SOURCE = 'pustaka.biblio.source';

    /** the column name for the publish_place field */
    const PUBLISH_PLACE = 'pustaka.biblio.publish_place';

    /** the column name for the notes field */
    const NOTES = 'pustaka.biblio.notes';

    /** the column name for the image field */
    const IMAGE = 'pustaka.biblio.image';

    /** the column name for the file_att field */
    const FILE_ATT = 'pustaka.biblio.file_att';

    /** the column name for the opac_hide field */
    const OPAC_HIDE = 'pustaka.biblio.opac_hide';

    /** the column name for the promoted field */
    const PROMOTED = 'pustaka.biblio.promoted';

    /** the column name for the labels field */
    const LABELS = 'pustaka.biblio.labels';

    /** the column name for the paper_printing_spec field */
    const PAPER_PRINTING_SPEC = 'pustaka.biblio.paper_printing_spec';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'pustaka.biblio.last_sync';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'pustaka.biblio.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'pustaka.biblio.expired_date';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Biblio objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Biblio[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BiblioPeer::$fieldNames[BiblioPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdBiblio', 'IdFreq', 'IdPublisher', 'NegaraId', 'IdGmd', 'IdClassification', 'CreateDate', 'Title', 'Sor', 'Edition', 'IsbnIssn', 'Collations', 'Publisher', 'PublishYear', 'SeriesTitle', 'CallNumber', 'Source', 'PublishPlace', 'Notes', 'Image', 'FileAtt', 'OpacHide', 'Promoted', 'Labels', 'PaperPrintingSpec', 'LastSync', 'LastUpdate', 'ExpiredDate', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBiblio', 'idFreq', 'idPublisher', 'negaraId', 'idGmd', 'idClassification', 'createDate', 'title', 'sor', 'edition', 'isbnIssn', 'collations', 'publisher', 'publishYear', 'seriesTitle', 'callNumber', 'source', 'publishPlace', 'notes', 'image', 'fileAtt', 'opacHide', 'promoted', 'labels', 'paperPrintingSpec', 'lastSync', 'lastUpdate', 'expiredDate', ),
        BasePeer::TYPE_COLNAME => array (BiblioPeer::ID_BIBLIO, BiblioPeer::ID_FREQ, BiblioPeer::ID_PUBLISHER, BiblioPeer::NEGARA_ID, BiblioPeer::ID_GMD, BiblioPeer::ID_CLASSIFICATION, BiblioPeer::CREATE_DATE, BiblioPeer::TITLE, BiblioPeer::SOR, BiblioPeer::EDITION, BiblioPeer::ISBN_ISSN, BiblioPeer::COLLATIONS, BiblioPeer::PUBLISHER, BiblioPeer::PUBLISH_YEAR, BiblioPeer::SERIES_TITLE, BiblioPeer::CALL_NUMBER, BiblioPeer::SOURCE, BiblioPeer::PUBLISH_PLACE, BiblioPeer::NOTES, BiblioPeer::IMAGE, BiblioPeer::FILE_ATT, BiblioPeer::OPAC_HIDE, BiblioPeer::PROMOTED, BiblioPeer::LABELS, BiblioPeer::PAPER_PRINTING_SPEC, BiblioPeer::LAST_SYNC, BiblioPeer::LAST_UPDATE, BiblioPeer::EXPIRED_DATE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BIBLIO', 'ID_FREQ', 'ID_PUBLISHER', 'NEGARA_ID', 'ID_GMD', 'ID_CLASSIFICATION', 'CREATE_DATE', 'TITLE', 'SOR', 'EDITION', 'ISBN_ISSN', 'COLLATIONS', 'PUBLISHER', 'PUBLISH_YEAR', 'SERIES_TITLE', 'CALL_NUMBER', 'SOURCE', 'PUBLISH_PLACE', 'NOTES', 'IMAGE', 'FILE_ATT', 'OPAC_HIDE', 'PROMOTED', 'LABELS', 'PAPER_PRINTING_SPEC', 'LAST_SYNC', 'LAST_UPDATE', 'EXPIRED_DATE', ),
        BasePeer::TYPE_FIELDNAME => array ('id_biblio', 'id_freq', 'id_publisher', 'negara_id', 'id_gmd', 'id_classification', 'create_date', 'title', 'sor', 'edition', 'isbn_issn', 'collations', 'publisher', 'publish_year', 'series_title', 'call_number', 'source', 'publish_place', 'notes', 'image', 'file_att', 'opac_hide', 'promoted', 'labels', 'paper_printing_spec', 'last_sync', 'last_update', 'expired_date', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BiblioPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdBiblio' => 0, 'IdFreq' => 1, 'IdPublisher' => 2, 'NegaraId' => 3, 'IdGmd' => 4, 'IdClassification' => 5, 'CreateDate' => 6, 'Title' => 7, 'Sor' => 8, 'Edition' => 9, 'IsbnIssn' => 10, 'Collations' => 11, 'Publisher' => 12, 'PublishYear' => 13, 'SeriesTitle' => 14, 'CallNumber' => 15, 'Source' => 16, 'PublishPlace' => 17, 'Notes' => 18, 'Image' => 19, 'FileAtt' => 20, 'OpacHide' => 21, 'Promoted' => 22, 'Labels' => 23, 'PaperPrintingSpec' => 24, 'LastSync' => 25, 'LastUpdate' => 26, 'ExpiredDate' => 27, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBiblio' => 0, 'idFreq' => 1, 'idPublisher' => 2, 'negaraId' => 3, 'idGmd' => 4, 'idClassification' => 5, 'createDate' => 6, 'title' => 7, 'sor' => 8, 'edition' => 9, 'isbnIssn' => 10, 'collations' => 11, 'publisher' => 12, 'publishYear' => 13, 'seriesTitle' => 14, 'callNumber' => 15, 'source' => 16, 'publishPlace' => 17, 'notes' => 18, 'image' => 19, 'fileAtt' => 20, 'opacHide' => 21, 'promoted' => 22, 'labels' => 23, 'paperPrintingSpec' => 24, 'lastSync' => 25, 'lastUpdate' => 26, 'expiredDate' => 27, ),
        BasePeer::TYPE_COLNAME => array (BiblioPeer::ID_BIBLIO => 0, BiblioPeer::ID_FREQ => 1, BiblioPeer::ID_PUBLISHER => 2, BiblioPeer::NEGARA_ID => 3, BiblioPeer::ID_GMD => 4, BiblioPeer::ID_CLASSIFICATION => 5, BiblioPeer::CREATE_DATE => 6, BiblioPeer::TITLE => 7, BiblioPeer::SOR => 8, BiblioPeer::EDITION => 9, BiblioPeer::ISBN_ISSN => 10, BiblioPeer::COLLATIONS => 11, BiblioPeer::PUBLISHER => 12, BiblioPeer::PUBLISH_YEAR => 13, BiblioPeer::SERIES_TITLE => 14, BiblioPeer::CALL_NUMBER => 15, BiblioPeer::SOURCE => 16, BiblioPeer::PUBLISH_PLACE => 17, BiblioPeer::NOTES => 18, BiblioPeer::IMAGE => 19, BiblioPeer::FILE_ATT => 20, BiblioPeer::OPAC_HIDE => 21, BiblioPeer::PROMOTED => 22, BiblioPeer::LABELS => 23, BiblioPeer::PAPER_PRINTING_SPEC => 24, BiblioPeer::LAST_SYNC => 25, BiblioPeer::LAST_UPDATE => 26, BiblioPeer::EXPIRED_DATE => 27, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BIBLIO' => 0, 'ID_FREQ' => 1, 'ID_PUBLISHER' => 2, 'NEGARA_ID' => 3, 'ID_GMD' => 4, 'ID_CLASSIFICATION' => 5, 'CREATE_DATE' => 6, 'TITLE' => 7, 'SOR' => 8, 'EDITION' => 9, 'ISBN_ISSN' => 10, 'COLLATIONS' => 11, 'PUBLISHER' => 12, 'PUBLISH_YEAR' => 13, 'SERIES_TITLE' => 14, 'CALL_NUMBER' => 15, 'SOURCE' => 16, 'PUBLISH_PLACE' => 17, 'NOTES' => 18, 'IMAGE' => 19, 'FILE_ATT' => 20, 'OPAC_HIDE' => 21, 'PROMOTED' => 22, 'LABELS' => 23, 'PAPER_PRINTING_SPEC' => 24, 'LAST_SYNC' => 25, 'LAST_UPDATE' => 26, 'EXPIRED_DATE' => 27, ),
        BasePeer::TYPE_FIELDNAME => array ('id_biblio' => 0, 'id_freq' => 1, 'id_publisher' => 2, 'negara_id' => 3, 'id_gmd' => 4, 'id_classification' => 5, 'create_date' => 6, 'title' => 7, 'sor' => 8, 'edition' => 9, 'isbn_issn' => 10, 'collations' => 11, 'publisher' => 12, 'publish_year' => 13, 'series_title' => 14, 'call_number' => 15, 'source' => 16, 'publish_place' => 17, 'notes' => 18, 'image' => 19, 'file_att' => 20, 'opac_hide' => 21, 'promoted' => 22, 'labels' => 23, 'paper_printing_spec' => 24, 'last_sync' => 25, 'last_update' => 26, 'expired_date' => 27, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = BiblioPeer::getFieldNames($toType);
        $key = isset(BiblioPeer::$fieldKeys[$fromType][$name]) ? BiblioPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BiblioPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, BiblioPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BiblioPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. BiblioPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BiblioPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BiblioPeer::ID_BIBLIO);
            $criteria->addSelectColumn(BiblioPeer::ID_FREQ);
            $criteria->addSelectColumn(BiblioPeer::ID_PUBLISHER);
            $criteria->addSelectColumn(BiblioPeer::NEGARA_ID);
            $criteria->addSelectColumn(BiblioPeer::ID_GMD);
            $criteria->addSelectColumn(BiblioPeer::ID_CLASSIFICATION);
            $criteria->addSelectColumn(BiblioPeer::CREATE_DATE);
            $criteria->addSelectColumn(BiblioPeer::TITLE);
            $criteria->addSelectColumn(BiblioPeer::SOR);
            $criteria->addSelectColumn(BiblioPeer::EDITION);
            $criteria->addSelectColumn(BiblioPeer::ISBN_ISSN);
            $criteria->addSelectColumn(BiblioPeer::COLLATIONS);
            $criteria->addSelectColumn(BiblioPeer::PUBLISHER);
            $criteria->addSelectColumn(BiblioPeer::PUBLISH_YEAR);
            $criteria->addSelectColumn(BiblioPeer::SERIES_TITLE);
            $criteria->addSelectColumn(BiblioPeer::CALL_NUMBER);
            $criteria->addSelectColumn(BiblioPeer::SOURCE);
            $criteria->addSelectColumn(BiblioPeer::PUBLISH_PLACE);
            $criteria->addSelectColumn(BiblioPeer::NOTES);
            $criteria->addSelectColumn(BiblioPeer::IMAGE);
            $criteria->addSelectColumn(BiblioPeer::FILE_ATT);
            $criteria->addSelectColumn(BiblioPeer::OPAC_HIDE);
            $criteria->addSelectColumn(BiblioPeer::PROMOTED);
            $criteria->addSelectColumn(BiblioPeer::LABELS);
            $criteria->addSelectColumn(BiblioPeer::PAPER_PRINTING_SPEC);
            $criteria->addSelectColumn(BiblioPeer::LAST_SYNC);
            $criteria->addSelectColumn(BiblioPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BiblioPeer::EXPIRED_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id_biblio');
            $criteria->addSelectColumn($alias . '.id_freq');
            $criteria->addSelectColumn($alias . '.id_publisher');
            $criteria->addSelectColumn($alias . '.negara_id');
            $criteria->addSelectColumn($alias . '.id_gmd');
            $criteria->addSelectColumn($alias . '.id_classification');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.sor');
            $criteria->addSelectColumn($alias . '.edition');
            $criteria->addSelectColumn($alias . '.isbn_issn');
            $criteria->addSelectColumn($alias . '.collations');
            $criteria->addSelectColumn($alias . '.publisher');
            $criteria->addSelectColumn($alias . '.publish_year');
            $criteria->addSelectColumn($alias . '.series_title');
            $criteria->addSelectColumn($alias . '.call_number');
            $criteria->addSelectColumn($alias . '.source');
            $criteria->addSelectColumn($alias . '.publish_place');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.file_att');
            $criteria->addSelectColumn($alias . '.opac_hide');
            $criteria->addSelectColumn($alias . '.promoted');
            $criteria->addSelectColumn($alias . '.labels');
            $criteria->addSelectColumn($alias . '.paper_printing_spec');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.expired_date');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BiblioPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Biblio
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BiblioPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return BiblioPeer::populateObjects(BiblioPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BiblioPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Biblio $obj A Biblio object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdBiblio();
            } // if key === null
            BiblioPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Biblio object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Biblio) {
                $key = (string) $value->getIdBiblio();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Biblio object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BiblioPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Biblio Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BiblioPeer::$instances[$key])) {
                return BiblioPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (BiblioPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BiblioPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to pustaka.biblio
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (string) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = BiblioPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BiblioPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BiblioPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Biblio object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BiblioPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BiblioPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BiblioPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BiblioPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Classifications table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinClassifications(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Frequency table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinFrequency(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Gmd table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinGmd(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with their Classifications objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinClassifications(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol = BiblioPeer::NUM_HYDRATE_COLUMNS;
        ClassificationsPeer::addSelectColumns($criteria);

        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ClassificationsPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ClassificationsPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClassificationsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ClassificationsPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Biblio) to $obj2 (Classifications)
                $obj2->addBiblio($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with their Frequency objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinFrequency(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol = BiblioPeer::NUM_HYDRATE_COLUMNS;
        FrequencyPeer::addSelectColumns($criteria);

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = FrequencyPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = FrequencyPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = FrequencyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    FrequencyPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Biblio) to $obj2 (Frequency)
                $obj2->addBiblio($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with their Gmd objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinGmd(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol = BiblioPeer::NUM_HYDRATE_COLUMNS;
        GmdPeer::addSelectColumns($criteria);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = GmdPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = GmdPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = GmdPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    GmdPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Biblio) to $obj2 (Gmd)
                $obj2->addBiblio($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with their Negara objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol = BiblioPeer::NUM_HYDRATE_COLUMNS;
        NegaraPeer::addSelectColumns($criteria);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = NegaraPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Biblio) to $obj2 (Negara)
                $obj2->addBiblio($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Biblio objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol2 = BiblioPeer::NUM_HYDRATE_COLUMNS;

        ClassificationsPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClassificationsPeer::NUM_HYDRATE_COLUMNS;

        FrequencyPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FrequencyPeer::NUM_HYDRATE_COLUMNS;

        GmdPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + GmdPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Classifications rows

            $key2 = ClassificationsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ClassificationsPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClassificationsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClassificationsPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Biblio) to the collection in $obj2 (Classifications)
                $obj2->addBiblio($obj1);
            } // if joined row not null

            // Add objects for joined Frequency rows

            $key3 = FrequencyPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = FrequencyPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = FrequencyPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FrequencyPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Biblio) to the collection in $obj3 (Frequency)
                $obj3->addBiblio($obj1);
            } // if joined row not null

            // Add objects for joined Gmd rows

            $key4 = GmdPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = GmdPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = GmdPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    GmdPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Biblio) to the collection in $obj4 (Gmd)
                $obj4->addBiblio($obj1);
            } // if joined row not null

            // Add objects for joined Negara rows

            $key5 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = NegaraPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = NegaraPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    NegaraPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Biblio) to the collection in $obj5 (Negara)
                $obj5->addBiblio($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Classifications table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptClassifications(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Frequency table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptFrequency(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Gmd table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptGmd(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BiblioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with all related objects except Classifications.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptClassifications(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol2 = BiblioPeer::NUM_HYDRATE_COLUMNS;

        FrequencyPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + FrequencyPeer::NUM_HYDRATE_COLUMNS;

        GmdPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + GmdPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Frequency rows

                $key2 = FrequencyPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = FrequencyPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = FrequencyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    FrequencyPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj2 (Frequency)
                $obj2->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Gmd rows

                $key3 = GmdPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = GmdPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = GmdPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    GmdPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj3 (Gmd)
                $obj3->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj4 (Negara)
                $obj4->addBiblio($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with all related objects except Frequency.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptFrequency(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol2 = BiblioPeer::NUM_HYDRATE_COLUMNS;

        ClassificationsPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClassificationsPeer::NUM_HYDRATE_COLUMNS;

        GmdPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + GmdPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Classifications rows

                $key2 = ClassificationsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClassificationsPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = ClassificationsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClassificationsPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj2 (Classifications)
                $obj2->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Gmd rows

                $key3 = GmdPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = GmdPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = GmdPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    GmdPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj3 (Gmd)
                $obj3->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj4 (Negara)
                $obj4->addBiblio($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with all related objects except Gmd.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptGmd(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol2 = BiblioPeer::NUM_HYDRATE_COLUMNS;

        ClassificationsPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClassificationsPeer::NUM_HYDRATE_COLUMNS;

        FrequencyPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FrequencyPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Classifications rows

                $key2 = ClassificationsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClassificationsPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = ClassificationsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClassificationsPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj2 (Classifications)
                $obj2->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Frequency rows

                $key3 = FrequencyPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FrequencyPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FrequencyPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FrequencyPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj3 (Frequency)
                $obj3->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj4 (Negara)
                $obj4->addBiblio($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Biblio objects pre-filled with all related objects except Negara.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Biblio objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BiblioPeer::DATABASE_NAME);
        }

        BiblioPeer::addSelectColumns($criteria);
        $startcol2 = BiblioPeer::NUM_HYDRATE_COLUMNS;

        ClassificationsPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClassificationsPeer::NUM_HYDRATE_COLUMNS;

        FrequencyPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FrequencyPeer::NUM_HYDRATE_COLUMNS;

        GmdPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + GmdPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BiblioPeer::ID_CLASSIFICATION, ClassificationsPeer::ID_CLASSIFICATION, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_FREQ, FrequencyPeer::ID_FREQ, $join_behavior);

        $criteria->addJoin(BiblioPeer::ID_GMD, GmdPeer::ID_GMD, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BiblioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BiblioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BiblioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BiblioPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Classifications rows

                $key2 = ClassificationsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClassificationsPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = ClassificationsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClassificationsPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj2 (Classifications)
                $obj2->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Frequency rows

                $key3 = FrequencyPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FrequencyPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FrequencyPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FrequencyPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj3 (Frequency)
                $obj3->addBiblio($obj1);

            } // if joined row is not null

                // Add objects for joined Gmd rows

                $key4 = GmdPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = GmdPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = GmdPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    GmdPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Biblio) to the collection in $obj4 (Gmd)
                $obj4->addBiblio($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(BiblioPeer::DATABASE_NAME)->getTable(BiblioPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBiblioPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBiblioPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BiblioTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return BiblioPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Biblio or Criteria object.
     *
     * @param      mixed $values Criteria or Biblio object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Biblio object
        }


        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Biblio or Criteria object.
     *
     * @param      mixed $values Criteria or Biblio object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BiblioPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BiblioPeer::ID_BIBLIO);
            $value = $criteria->remove(BiblioPeer::ID_BIBLIO);
            if ($value) {
                $selectCriteria->add(BiblioPeer::ID_BIBLIO, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BiblioPeer::TABLE_NAME);
            }

        } else { // $values is Biblio object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pustaka.biblio table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BiblioPeer::TABLE_NAME, $con, BiblioPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BiblioPeer::clearInstancePool();
            BiblioPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Biblio or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Biblio object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BiblioPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Biblio) { // it's a model object
            // invalidate the cache for this single object
            BiblioPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BiblioPeer::DATABASE_NAME);
            $criteria->add(BiblioPeer::ID_BIBLIO, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BiblioPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BiblioPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BiblioPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Biblio object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Biblio $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BiblioPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BiblioPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(BiblioPeer::DATABASE_NAME, BiblioPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Biblio
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BiblioPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BiblioPeer::DATABASE_NAME);
        $criteria->add(BiblioPeer::ID_BIBLIO, $pk);

        $v = BiblioPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Biblio[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BiblioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BiblioPeer::DATABASE_NAME);
            $criteria->add(BiblioPeer::ID_BIBLIO, $pks, Criteria::IN);
            $objs = BiblioPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBiblioPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBiblioPeer::buildTableMap();

