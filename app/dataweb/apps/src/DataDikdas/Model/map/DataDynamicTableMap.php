<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'data_dynamic' table.
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
class DataDynamicTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.DataDynamicTableMap';

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
        $this->setName('data_dynamic');
        $this->setPhpName('DataDynamic');
        $this->setClassname('DataDikdas\\Model\\DataDynamic');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('sekolah_id', 'SekolahId', 'VARCHAR' , 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignPrimaryKey('variabel_id', 'VariabelId', 'VARCHAR' , 'ref.variabel', 'variabel_id', true, null, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
        $this->addColumn('value_int', 'ValueInt', 'INTEGER', false, null, null);
        $this->addColumn('value_double', 'ValueDouble', 'DECIMAL', false, 1966088, null);
        $this->addColumn('value_string', 'ValueString', 'VARCHAR', false, 100, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
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
        $this->addRelation('Variabel', 'DataDikdas\\Model\\Variabel', RelationMap::MANY_TO_ONE, array('variabel_id' => 'variabel_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // DataDynamicTableMap
