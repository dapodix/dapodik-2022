<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'blockgrant' table.
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
class BlockgrantTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BlockgrantTableMap';

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
        $this->setName('blockgrant');
        $this->setPhpName('Blockgrant');
        $this->setClassname('DataDikdas\\Model\\Blockgrant');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('blockgrant_id', 'BlockgrantId', 'VARCHAR', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('tahun', 'Tahun', 'DECIMAL', true, 262144, null);
        $this->addForeignKey('jenis_bantuan_id', 'JenisBantuanId', 'INTEGER', 'ref.jenis_bantuan', 'jenis_bantuan_id', true, null, null);
        $this->addForeignKey('sumber_dana_id', 'SumberDanaId', 'DECIMAL', 'ref.sumber_dana', 'sumber_dana_id', true, 196608, null);
        $this->addColumn('besar_bantuan', 'BesarBantuan', 'DECIMAL', true, 983040, null);
        $this->addColumn('dana_pendamping', 'DanaPendamping', 'DECIMAL', true, 983040, null);
        $this->addColumn('peruntukan_dana', 'PeruntukanDana', 'VARCHAR', false, 50, null);
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
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisBantuan', 'DataDikdas\\Model\\JenisBantuan', RelationMap::MANY_TO_ONE, array('jenis_bantuan_id' => 'jenis_bantuan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SumberDana', 'DataDikdas\\Model\\SumberDana', RelationMap::MANY_TO_ONE, array('sumber_dana_id' => 'sumber_dana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AlatDariBlockgrant', 'DataDikdas\\Model\\AlatDariBlockgrant', RelationMap::ONE_TO_MANY, array('blockgrant_id' => 'blockgrant_id', ), 'RESTRICT', 'RESTRICT', 'AlatDariBlockgrants');
        $this->addRelation('AngkutanDariBlockgrant', 'DataDikdas\\Model\\AngkutanDariBlockgrant', RelationMap::ONE_TO_MANY, array('blockgrant_id' => 'blockgrant_id', ), 'RESTRICT', 'RESTRICT', 'AngkutanDariBlockgrants');
        $this->addRelation('BangunanDariBlockgrant', 'DataDikdas\\Model\\BangunanDariBlockgrant', RelationMap::ONE_TO_MANY, array('blockgrant_id' => 'blockgrant_id', ), 'RESTRICT', 'RESTRICT', 'BangunanDariBlockgrants');
        $this->addRelation('TanahDariBlockgrant', 'DataDikdas\\Model\\TanahDariBlockgrant', RelationMap::ONE_TO_MANY, array('blockgrant_id' => 'blockgrant_id', ), 'RESTRICT', 'RESTRICT', 'TanahDariBlockgrants');
    } // buildRelations()

} // BlockgrantTableMap
