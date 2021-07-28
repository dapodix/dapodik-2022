<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'akreditasi_sp' table.
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
class AkreditasiSpTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AkreditasiSpTableMap';

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
        $this->setName('akreditasi_sp');
        $this->setPhpName('AkreditasiSp');
        $this->setClassname('DataDikdas\\Model\\AkreditasiSp');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('akred_sp_id', 'AkredSpId', 'VARCHAR', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addColumn('akred_sp_sk', 'AkredSpSk', 'VARCHAR', true, 80, null);
        $this->addColumn('akred_sp_tmt', 'AkredSpTmt', 'DATE', true, null, null);
        $this->addColumn('akred_sp_tst', 'AkredSpTst', 'DATE', true, null, null);
        $this->addForeignKey('akreditasi_id', 'AkreditasiId', 'DECIMAL', 'ref.akreditasi', 'akreditasi_id', true, 65536, null);
        $this->addForeignKey('la_id', 'LaId', 'CHAR', 'ref.lembaga_akreditasi', 'la_id', true, 5, null);
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
        $this->addRelation('Akreditasi', 'DataDikdas\\Model\\Akreditasi', RelationMap::MANY_TO_ONE, array('akreditasi_id' => 'akreditasi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembagaAkreditasi', 'DataDikdas\\Model\\LembagaAkreditasi', RelationMap::MANY_TO_ONE, array('la_id' => 'la_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // AkreditasiSpTableMap
