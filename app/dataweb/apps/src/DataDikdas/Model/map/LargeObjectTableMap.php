<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'blob.large_object' table.
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
class LargeObjectTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.LargeObjectTableMap';

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
        $this->setName('blob.large_object');
        $this->setPhpName('LargeObject');
        $this->setClassname('DataDikdas\\Model\\LargeObject');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('blob_id', 'BlobId', 'VARCHAR', true, null, null);
        $this->addColumn('blob_content', 'BlobContent', 'BLOB', true, null, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('soft_delete', 'SoftDelete', 'DECIMAL', true, 65536, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::ONE_TO_MANY, array('blob_id' => 'blob_id', ), 'RESTRICT', 'RESTRICT', 'Ptks');
        $this->addRelation('RuangLongitudinal', 'DataDikdas\\Model\\RuangLongitudinal', RelationMap::ONE_TO_MANY, array('blob_id' => 'blob_id', ), 'RESTRICT', 'RESTRICT', 'RuangLongitudinals');
        $this->addRelation('SekolahLongitudinal', 'DataDikdas\\Model\\SekolahLongitudinal', RelationMap::ONE_TO_MANY, array('blob_id' => 'blob_id', ), 'RESTRICT', 'RESTRICT', 'SekolahLongitudinals');
    } // buildRelations()

} // LargeObjectTableMap
