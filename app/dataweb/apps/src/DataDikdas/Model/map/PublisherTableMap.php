<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pustaka.publisher' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.DataDikdas.Model.map
 */
class PublisherTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PublisherTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pustaka.publisher');
        $this->setPhpName('Publisher');
        $this->setClassname('DataDikdas\\Model\\Publisher');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_publisher', 'IdPublisher', 'VARCHAR', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('address', 'Address', 'VARCHAR', false, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('head_office', 'HeadOffice', 'VARCHAR', false, 255, null);
        $this->addColumn('director_name', 'DirectorName', 'VARCHAR', false, 255, null);
        $this->addColumn('director_phone', 'DirectorPhone', 'VARCHAR', false, 255, null);
        $this->addColumn('director_email', 'DirectorEmail', 'VARCHAR', false, 255, null);
        $this->addColumn('contact_person', 'ContactPerson', 'VARCHAR', false, 255, null);
        $this->addColumn('cp_phone', 'CpPhone', 'VARCHAR', false, 255, null);
        $this->addColumn('contact_person2', 'ContactPerson2', 'VARCHAR', false, 255, null);
        $this->addColumn('cp_phone2', 'CpPhone2', 'VARCHAR', false, 255, null);
        $this->addColumn('npwp', 'Npwp', 'VARCHAR', false, 255, null);
        $this->addColumn('siup', 'Siup', 'VARCHAR', false, 255, null);
        $this->addColumn('akta', 'Akta', 'VARCHAR', false, 255, null);
        $this->addColumn('no_kta', 'NoKta', 'VARCHAR', false, 255, null);
        $this->addColumn('kta', 'Kta', 'VARCHAR', false, 255, null);
        $this->addColumn('surat', 'Surat', 'VARCHAR', false, 255, null);
        $this->addColumn('surat_pernyataan', 'SuratPernyataan', 'VARCHAR', false, 255, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // PublisherTableMap
