<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.template_rapor' table.
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
class TemplateRaporTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TemplateRaporTableMap';

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
        $this->setName('ref.template_rapor');
        $this->setPhpName('TemplateRapor');
        $this->setClassname('DataDikdas\\Model\\TemplateRapor');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('template_id', 'TemplateId', 'VARCHAR' , 'ref.template_un', 'template_id', true, null, null);
        $this->addForeignPrimaryKey('mata_pelajaran_id', 'MataPelajaranId', 'INTEGER' , 'ref.mata_pelajaran', 'mata_pelajaran_id', true, null, null);
        $this->addColumn('no_urut', 'NoUrut', 'DECIMAL', true, 196608, null);
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
        $this->addRelation('MataPelajaran', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TemplateUn', 'DataDikdas\\Model\\TemplateUn', RelationMap::MANY_TO_ONE, array('template_id' => 'template_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // TemplateRaporTableMap
