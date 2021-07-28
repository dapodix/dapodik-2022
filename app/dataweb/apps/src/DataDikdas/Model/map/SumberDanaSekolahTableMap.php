<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.sumber_dana_sekolah' table.
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
class SumberDanaSekolahTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SumberDanaSekolahTableMap';

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
        $this->setName('ref.sumber_dana_sekolah');
        $this->setPhpName('SumberDanaSekolah');
        $this->setClassname('DataDikdas\\Model\\SumberDanaSekolah');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sumber_dana_sekolah_id', 'SumberDanaSekolahId', 'DECIMAL', true, 131072, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SekolahPaud', 'DataDikdas\\Model\\SekolahPaud', RelationMap::ONE_TO_MANY, array('sumber_dana_sekolah_id' => 'sumber_dana_sekolah_id', ), 'RESTRICT', 'RESTRICT', 'SekolahPauds');
    } // buildRelations()

} // SumberDanaSekolahTableMap
