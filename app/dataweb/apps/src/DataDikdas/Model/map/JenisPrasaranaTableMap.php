<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_prasarana' table.
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
class JenisPrasaranaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisPrasaranaTableMap';

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
        $this->setName('ref.jenis_prasarana');
        $this->setPhpName('JenisPrasarana');
        $this->setClassname('DataDikdas\\Model\\JenisPrasarana');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_prasarana_id', 'JenisPrasaranaId', 'INTEGER', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 60, null);
        $this->addColumn('a_unit_organisasi', 'AUnitOrganisasi', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_tanah', 'ATanah', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_bangunan', 'ABangunan', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_ruang', 'ARuang', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_sub', 'ASub', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('Bangunan', 'DataDikdas\\Model\\Bangunan', RelationMap::ONE_TO_MANY, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT', 'Bangunans');
        $this->addRelation('PemakaiPrasarana', 'DataDikdas\\Model\\PemakaiPrasarana', RelationMap::ONE_TO_MANY, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT', 'PemakaiPrasaranas');
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::ONE_TO_MANY, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT', 'Ruangs');
        $this->addRelation('StandarSarana', 'DataDikdas\\Model\\StandarSarana', RelationMap::ONE_TO_MANY, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT', 'StandarSaranas');
        $this->addRelation('Tanah', 'DataDikdas\\Model\\Tanah', RelationMap::ONE_TO_MANY, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT', 'Tanahs');
    } // buildRelations()

} // JenisPrasaranaTableMap
