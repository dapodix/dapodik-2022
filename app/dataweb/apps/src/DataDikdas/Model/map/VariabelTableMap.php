<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.variabel' table.
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
class VariabelTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.VariabelTableMap';

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
        $this->setName('ref.variabel');
        $this->setPhpName('Variabel');
        $this->setClassname('DataDikdas\\Model\\Variabel');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('variabel_id', 'VariabelId', 'VARCHAR', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 500, null);
        $this->addColumn('jenis_variabel', 'JenisVariabel', 'CHAR', true, 1, null);
        $this->addColumn('u_paud', 'UPaud', 'DECIMAL', true, 65536, null);
        $this->addColumn('u_sd', 'USd', 'DECIMAL', true, 65536, null);
        $this->addColumn('u_smp', 'USmp', 'DECIMAL', true, 65536, null);
        $this->addColumn('u_sma', 'USma', 'DECIMAL', true, 65536, null);
        $this->addColumn('u_smk', 'USmk', 'DECIMAL', true, 65536, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DataDynamic', 'DataDikdas\\Model\\DataDynamic', RelationMap::ONE_TO_MANY, array('variabel_id' => 'variabel_id', ), 'RESTRICT', 'RESTRICT', 'DataDynamics');
        $this->addRelation('VariabelValue', 'DataDikdas\\Model\\VariabelValue', RelationMap::ONE_TO_MANY, array('variabel_id' => 'variabel_id', ), 'RESTRICT', 'RESTRICT', 'VariabelValues');
    } // buildRelations()

} // VariabelTableMap
