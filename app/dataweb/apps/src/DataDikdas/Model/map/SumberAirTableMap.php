<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.sumber_air' table.
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
class SumberAirTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SumberAirTableMap';

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
        $this->setName('ref.sumber_air');
        $this->setPhpName('SumberAir');
        $this->setClassname('DataDikdas\\Model\\SumberAir');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sumber_air_id', 'SumberAirId', 'DECIMAL', true, 131072, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 25, null);
        $this->addColumn('sumber_air', 'SumberAir', 'DECIMAL', false, 65536, null);
        $this->addColumn('sumber_minum', 'SumberMinum', 'DECIMAL', false, 65536, null);
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
        $this->addRelation('SanitasiRelatedBySumberAirId', 'DataDikdas\\Model\\Sanitasi', RelationMap::ONE_TO_MANY, array('sumber_air_id' => 'sumber_air_id', ), 'RESTRICT', 'RESTRICT', 'SanitasisRelatedBySumberAirId');
        $this->addRelation('SanitasiRelatedBySumberAirMinumId', 'DataDikdas\\Model\\Sanitasi', RelationMap::ONE_TO_MANY, array('sumber_air_id' => 'sumber_air_minum_id', ), 'RESTRICT', 'RESTRICT', 'SanitasisRelatedBySumberAirMinumId');
    } // buildRelations()

} // SumberAirTableMap
