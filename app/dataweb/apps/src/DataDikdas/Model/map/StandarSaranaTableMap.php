<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.standar_sarana' table.
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
class StandarSaranaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.StandarSaranaTableMap';

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
        $this->setName('ref.standar_sarana');
        $this->setPhpName('StandarSarana');
        $this->setClassname('DataDikdas\\Model\\StandarSarana');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_std_sarana', 'IdStdSarana', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_prasarana_id', 'JenisPrasaranaId', 'INTEGER', 'ref.jenis_prasarana', 'jenis_prasarana_id', true, null, null);
        $this->addForeignKey('jenis_sarana_id', 'JenisSaranaId', 'INTEGER', 'ref.jenis_sarana', 'jenis_sarana_id', true, null, null);
        $this->addForeignKey('jurusan_id', 'JurusanId', 'VARCHAR', 'ref.jurusan', 'jurusan_id', false, 25, null);
        $this->addForeignKey('bentuk_pendidikan_id', 'BentukPendidikanId', 'SMALLINT', 'ref.bentuk_pendidikan', 'bentuk_pendidikan_id', true, null, null);
        $this->addColumn('a_harus_ada', 'AHarusAda', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('JenisSarana', 'DataDikdas\\Model\\JenisSarana', RelationMap::MANY_TO_ONE, array('jenis_sarana_id' => 'jenis_sarana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BentukPendidikan', 'DataDikdas\\Model\\BentukPendidikan', RelationMap::MANY_TO_ONE, array('bentuk_pendidikan_id' => 'bentuk_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPrasarana', 'DataDikdas\\Model\\JenisPrasarana', RelationMap::MANY_TO_ONE, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Jurusan', 'DataDikdas\\Model\\Jurusan', RelationMap::MANY_TO_ONE, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // StandarSaranaTableMap
