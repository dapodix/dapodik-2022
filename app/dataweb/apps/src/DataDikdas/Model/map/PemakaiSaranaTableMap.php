<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.pemakai_sarana' table.
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
class PemakaiSaranaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PemakaiSaranaTableMap';

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
        $this->setName('ref.pemakai_sarana');
        $this->setPhpName('PemakaiSarana');
        $this->setClassname('DataDikdas\\Model\\PemakaiSarana');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('jenis_sarana_id', 'JenisSaranaId', 'INTEGER' , 'ref.jenis_sarana', 'jenis_sarana_id', true, null, null);
        $this->addForeignPrimaryKey('jurusan_id', 'JurusanId', 'VARCHAR' , 'ref.jurusan', 'jurusan_id', true, 25, null);
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
        $this->addRelation('Jurusan', 'DataDikdas\\Model\\Jurusan', RelationMap::MANY_TO_ONE, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisSarana', 'DataDikdas\\Model\\JenisSarana', RelationMap::MANY_TO_ONE, array('jenis_sarana_id' => 'jenis_sarana_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // PemakaiSaranaTableMap
