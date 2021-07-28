<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\Publisher;
use DataDikdas\Model\PublisherPeer;
use DataDikdas\Model\map\PublisherTableMap;

/**
 * Base static class for performing query and update operations on the 'pustaka.publisher' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePublisherPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'pustaka.publisher';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Publisher';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PublisherTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 25;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 25;

    /** the column name for the id_publisher field */
    const ID_PUBLISHER = 'pustaka.publisher.id_publisher';

    /** the column name for the name field */
    const NAME = 'pustaka.publisher.name';

    /** the column name for the address field */
    const ADDRESS = 'pustaka.publisher.address';

    /** the column name for the phone field */
    const PHONE = 'pustaka.publisher.phone';

    /** the column name for the email field */
    const EMAIL = 'pustaka.publisher.email';

    /** the column name for the head_office field */
    const HEAD_OFFICE = 'pustaka.publisher.head_office';

    /** the column name for the director_name field */
    const DIRECTOR_NAME = 'pustaka.publisher.director_name';

    /** the column name for the director_phone field */
    const DIRECTOR_PHONE = 'pustaka.publisher.director_phone';

    /** the column name for the director_email field */
    const DIRECTOR_EMAIL = 'pustaka.publisher.director_email';

    /** the column name for the contact_person field */
    const CONTACT_PERSON = 'pustaka.publisher.contact_person';

    /** the column name for the cp_phone field */
    const CP_PHONE = 'pustaka.publisher.cp_phone';

    /** the column name for the contact_person2 field */
    const CONTACT_PERSON2 = 'pustaka.publisher.contact_person2';

    /** the column name for the cp_phone2 field */
    const CP_PHONE2 = 'pustaka.publisher.cp_phone2';

    /** the column name for the npwp field */
    const NPWP = 'pustaka.publisher.npwp';

    /** the column name for the siup field */
    const SIUP = 'pustaka.publisher.siup';

    /** the column name for the akta field */
    const AKTA = 'pustaka.publisher.akta';

    /** the column name for the no_kta field */
    const NO_KTA = 'pustaka.publisher.no_kta';

    /** the column name for the kta field */
    const KTA = 'pustaka.publisher.kta';

    /** the column name for the surat field */
    const SURAT = 'pustaka.publisher.surat';

    /** the column name for the surat_pernyataan field */
    const SURAT_PERNYATAAN = 'pustaka.publisher.surat_pernyataan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'pustaka.publisher.kode_wilayah';

    /** the column name for the create_date field */
    const CREATE_DATE = 'pustaka.publisher.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'pustaka.publisher.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'pustaka.publisher.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'pustaka.publisher.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Publisher objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Publisher[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PublisherPeer::$fieldNames[PublisherPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdPublisher', 'Name', 'Address', 'Phone', 'Email', 'HeadOffice', 'DirectorName', 'DirectorPhone', 'DirectorEmail', 'ContactPerson', 'CpPhone', 'ContactPerson2', 'CpPhone2', 'Npwp', 'Siup', 'Akta', 'NoKta', 'Kta', 'Surat', 'SuratPernyataan', 'KodeWilayah', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idPublisher', 'name', 'address', 'phone', 'email', 'headOffice', 'directorName', 'directorPhone', 'directorEmail', 'contactPerson', 'cpPhone', 'contactPerson2', 'cpPhone2', 'npwp', 'siup', 'akta', 'noKta', 'kta', 'surat', 'suratPernyataan', 'kodeWilayah', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (PublisherPeer::ID_PUBLISHER, PublisherPeer::NAME, PublisherPeer::ADDRESS, PublisherPeer::PHONE, PublisherPeer::EMAIL, PublisherPeer::HEAD_OFFICE, PublisherPeer::DIRECTOR_NAME, PublisherPeer::DIRECTOR_PHONE, PublisherPeer::DIRECTOR_EMAIL, PublisherPeer::CONTACT_PERSON, PublisherPeer::CP_PHONE, PublisherPeer::CONTACT_PERSON2, PublisherPeer::CP_PHONE2, PublisherPeer::NPWP, PublisherPeer::SIUP, PublisherPeer::AKTA, PublisherPeer::NO_KTA, PublisherPeer::KTA, PublisherPeer::SURAT, PublisherPeer::SURAT_PERNYATAAN, PublisherPeer::KODE_WILAYAH, PublisherPeer::CREATE_DATE, PublisherPeer::LAST_UPDATE, PublisherPeer::EXPIRED_DATE, PublisherPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_PUBLISHER', 'NAME', 'ADDRESS', 'PHONE', 'EMAIL', 'HEAD_OFFICE', 'DIRECTOR_NAME', 'DIRECTOR_PHONE', 'DIRECTOR_EMAIL', 'CONTACT_PERSON', 'CP_PHONE', 'CONTACT_PERSON2', 'CP_PHONE2', 'NPWP', 'SIUP', 'AKTA', 'NO_KTA', 'KTA', 'SURAT', 'SURAT_PERNYATAAN', 'KODE_WILAYAH', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('id_publisher', 'name', 'address', 'phone', 'email', 'head_office', 'director_name', 'director_phone', 'director_email', 'contact_person', 'cp_phone', 'contact_person2', 'cp_phone2', 'npwp', 'siup', 'akta', 'no_kta', 'kta', 'surat', 'surat_pernyataan', 'kode_wilayah', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PublisherPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdPublisher' => 0, 'Name' => 1, 'Address' => 2, 'Phone' => 3, 'Email' => 4, 'HeadOffice' => 5, 'DirectorName' => 6, 'DirectorPhone' => 7, 'DirectorEmail' => 8, 'ContactPerson' => 9, 'CpPhone' => 10, 'ContactPerson2' => 11, 'CpPhone2' => 12, 'Npwp' => 13, 'Siup' => 14, 'Akta' => 15, 'NoKta' => 16, 'Kta' => 17, 'Surat' => 18, 'SuratPernyataan' => 19, 'KodeWilayah' => 20, 'CreateDate' => 21, 'LastUpdate' => 22, 'ExpiredDate' => 23, 'LastSync' => 24, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idPublisher' => 0, 'name' => 1, 'address' => 2, 'phone' => 3, 'email' => 4, 'headOffice' => 5, 'directorName' => 6, 'directorPhone' => 7, 'directorEmail' => 8, 'contactPerson' => 9, 'cpPhone' => 10, 'contactPerson2' => 11, 'cpPhone2' => 12, 'npwp' => 13, 'siup' => 14, 'akta' => 15, 'noKta' => 16, 'kta' => 17, 'surat' => 18, 'suratPernyataan' => 19, 'kodeWilayah' => 20, 'createDate' => 21, 'lastUpdate' => 22, 'expiredDate' => 23, 'lastSync' => 24, ),
        BasePeer::TYPE_COLNAME => array (PublisherPeer::ID_PUBLISHER => 0, PublisherPeer::NAME => 1, PublisherPeer::ADDRESS => 2, PublisherPeer::PHONE => 3, PublisherPeer::EMAIL => 4, PublisherPeer::HEAD_OFFICE => 5, PublisherPeer::DIRECTOR_NAME => 6, PublisherPeer::DIRECTOR_PHONE => 7, PublisherPeer::DIRECTOR_EMAIL => 8, PublisherPeer::CONTACT_PERSON => 9, PublisherPeer::CP_PHONE => 10, PublisherPeer::CONTACT_PERSON2 => 11, PublisherPeer::CP_PHONE2 => 12, PublisherPeer::NPWP => 13, PublisherPeer::SIUP => 14, PublisherPeer::AKTA => 15, PublisherPeer::NO_KTA => 16, PublisherPeer::KTA => 17, PublisherPeer::SURAT => 18, PublisherPeer::SURAT_PERNYATAAN => 19, PublisherPeer::KODE_WILAYAH => 20, PublisherPeer::CREATE_DATE => 21, PublisherPeer::LAST_UPDATE => 22, PublisherPeer::EXPIRED_DATE => 23, PublisherPeer::LAST_SYNC => 24, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_PUBLISHER' => 0, 'NAME' => 1, 'ADDRESS' => 2, 'PHONE' => 3, 'EMAIL' => 4, 'HEAD_OFFICE' => 5, 'DIRECTOR_NAME' => 6, 'DIRECTOR_PHONE' => 7, 'DIRECTOR_EMAIL' => 8, 'CONTACT_PERSON' => 9, 'CP_PHONE' => 10, 'CONTACT_PERSON2' => 11, 'CP_PHONE2' => 12, 'NPWP' => 13, 'SIUP' => 14, 'AKTA' => 15, 'NO_KTA' => 16, 'KTA' => 17, 'SURAT' => 18, 'SURAT_PERNYATAAN' => 19, 'KODE_WILAYAH' => 20, 'CREATE_DATE' => 21, 'LAST_UPDATE' => 22, 'EXPIRED_DATE' => 23, 'LAST_SYNC' => 24, ),
        BasePeer::TYPE_FIELDNAME => array ('id_publisher' => 0, 'name' => 1, 'address' => 2, 'phone' => 3, 'email' => 4, 'head_office' => 5, 'director_name' => 6, 'director_phone' => 7, 'director_email' => 8, 'contact_person' => 9, 'cp_phone' => 10, 'contact_person2' => 11, 'cp_phone2' => 12, 'npwp' => 13, 'siup' => 14, 'akta' => 15, 'no_kta' => 16, 'kta' => 17, 'surat' => 18, 'surat_pernyataan' => 19, 'kode_wilayah' => 20, 'create_date' => 21, 'last_update' => 22, 'expired_date' => 23, 'last_sync' => 24, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
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
        $toNames = PublisherPeer::getFieldNames($toType);
        $key = isset(PublisherPeer::$fieldKeys[$fromType][$name]) ? PublisherPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PublisherPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PublisherPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PublisherPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PublisherPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PublisherPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PublisherPeer::ID_PUBLISHER);
            $criteria->addSelectColumn(PublisherPeer::NAME);
            $criteria->addSelectColumn(PublisherPeer::ADDRESS);
            $criteria->addSelectColumn(PublisherPeer::PHONE);
            $criteria->addSelectColumn(PublisherPeer::EMAIL);
            $criteria->addSelectColumn(PublisherPeer::HEAD_OFFICE);
            $criteria->addSelectColumn(PublisherPeer::DIRECTOR_NAME);
            $criteria->addSelectColumn(PublisherPeer::DIRECTOR_PHONE);
            $criteria->addSelectColumn(PublisherPeer::DIRECTOR_EMAIL);
            $criteria->addSelectColumn(PublisherPeer::CONTACT_PERSON);
            $criteria->addSelectColumn(PublisherPeer::CP_PHONE);
            $criteria->addSelectColumn(PublisherPeer::CONTACT_PERSON2);
            $criteria->addSelectColumn(PublisherPeer::CP_PHONE2);
            $criteria->addSelectColumn(PublisherPeer::NPWP);
            $criteria->addSelectColumn(PublisherPeer::SIUP);
            $criteria->addSelectColumn(PublisherPeer::AKTA);
            $criteria->addSelectColumn(PublisherPeer::NO_KTA);
            $criteria->addSelectColumn(PublisherPeer::KTA);
            $criteria->addSelectColumn(PublisherPeer::SURAT);
            $criteria->addSelectColumn(PublisherPeer::SURAT_PERNYATAAN);
            $criteria->addSelectColumn(PublisherPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(PublisherPeer::CREATE_DATE);
            $criteria->addSelectColumn(PublisherPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PublisherPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(PublisherPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.id_publisher');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.head_office');
            $criteria->addSelectColumn($alias . '.director_name');
            $criteria->addSelectColumn($alias . '.director_phone');
            $criteria->addSelectColumn($alias . '.director_email');
            $criteria->addSelectColumn($alias . '.contact_person');
            $criteria->addSelectColumn($alias . '.cp_phone');
            $criteria->addSelectColumn($alias . '.contact_person2');
            $criteria->addSelectColumn($alias . '.cp_phone2');
            $criteria->addSelectColumn($alias . '.npwp');
            $criteria->addSelectColumn($alias . '.siup');
            $criteria->addSelectColumn($alias . '.akta');
            $criteria->addSelectColumn($alias . '.no_kta');
            $criteria->addSelectColumn($alias . '.kta');
            $criteria->addSelectColumn($alias . '.surat');
            $criteria->addSelectColumn($alias . '.surat_pernyataan');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.expired_date');
            $criteria->addSelectColumn($alias . '.last_sync');
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
        $criteria->setPrimaryTableName(PublisherPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PublisherPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PublisherPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Publisher
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PublisherPeer::doSelect($critcopy, $con);
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
        return PublisherPeer::populateObjects(PublisherPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PublisherPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PublisherPeer::DATABASE_NAME);

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
     * @param      Publisher $obj A Publisher object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdPublisher();
            } // if key === null
            PublisherPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Publisher object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Publisher) {
                $key = (string) $value->getIdPublisher();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Publisher object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PublisherPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Publisher Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PublisherPeer::$instances[$key])) {
                return PublisherPeer::$instances[$key];
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
        foreach (PublisherPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PublisherPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to pustaka.publisher
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
        $cls = PublisherPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PublisherPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PublisherPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PublisherPeer::addInstanceToPool($obj, $key);
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
     * @return array (Publisher object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PublisherPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PublisherPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PublisherPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PublisherPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PublisherPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMstWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PublisherPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PublisherPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PublisherPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PublisherPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of Publisher objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Publisher objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PublisherPeer::DATABASE_NAME);
        }

        PublisherPeer::addSelectColumns($criteria);
        $startcol = PublisherPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(PublisherPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PublisherPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PublisherPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PublisherPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PublisherPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Publisher) to $obj2 (MstWilayah)
                $obj2->addPublisher($obj1);

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
        $criteria->setPrimaryTableName(PublisherPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PublisherPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PublisherPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PublisherPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of Publisher objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Publisher objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PublisherPeer::DATABASE_NAME);
        }

        PublisherPeer::addSelectColumns($criteria);
        $startcol2 = PublisherPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PublisherPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PublisherPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PublisherPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PublisherPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PublisherPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined MstWilayah rows

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Publisher) to the collection in $obj2 (MstWilayah)
                $obj2->addPublisher($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(PublisherPeer::DATABASE_NAME)->getTable(PublisherPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePublisherPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePublisherPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PublisherTableMap());
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
        return PublisherPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Publisher or Criteria object.
     *
     * @param      mixed $values Criteria or Publisher object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Publisher object
        }


        // Set the correct dbName
        $criteria->setDbName(PublisherPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Publisher or Criteria object.
     *
     * @param      mixed $values Criteria or Publisher object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PublisherPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PublisherPeer::ID_PUBLISHER);
            $value = $criteria->remove(PublisherPeer::ID_PUBLISHER);
            if ($value) {
                $selectCriteria->add(PublisherPeer::ID_PUBLISHER, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PublisherPeer::TABLE_NAME);
            }

        } else { // $values is Publisher object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PublisherPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pustaka.publisher table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PublisherPeer::TABLE_NAME, $con, PublisherPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PublisherPeer::clearInstancePool();
            PublisherPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Publisher or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Publisher object or primary key or array of primary keys
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
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PublisherPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Publisher) { // it's a model object
            // invalidate the cache for this single object
            PublisherPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PublisherPeer::DATABASE_NAME);
            $criteria->add(PublisherPeer::ID_PUBLISHER, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PublisherPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PublisherPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PublisherPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Publisher object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Publisher $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PublisherPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PublisherPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PublisherPeer::DATABASE_NAME, PublisherPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Publisher
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PublisherPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PublisherPeer::DATABASE_NAME);
        $criteria->add(PublisherPeer::ID_PUBLISHER, $pk);

        $v = PublisherPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Publisher[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PublisherPeer::DATABASE_NAME);
            $criteria->add(PublisherPeer::ID_PUBLISHER, $pks, Criteria::IN);
            $objs = PublisherPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePublisherPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePublisherPeer::buildTableMap();

