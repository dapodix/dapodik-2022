<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'bidang_sdm' table.
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
class BidangSdmTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BidangSdmTableMap';

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
        $this->setName('bidang_sdm');
        $this->setPhpName('BidangSdm');
        $this->setClassname('DataDikdas\\Model\\BidangSdm');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ptk_id', 'PtkId', 'VARCHAR' , 'ptk', 'ptk_id', true, null, null);
        $this->addForeignPrimaryKey('bidang_studi_id', 'BidangStudiId', 'INTEGER' , 'ref.bidang_studi', 'bidang_studi_id', true, null, null);
        $this->addPrimaryKey('urutan', 'Urutan', 'DECIMAL', true, 65536, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BidangStudi', 'DataDikdas\\Model\\BidangStudi', RelationMap::MANY_TO_ONE, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // BidangSdmTableMap
