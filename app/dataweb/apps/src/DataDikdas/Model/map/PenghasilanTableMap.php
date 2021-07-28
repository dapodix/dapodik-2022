<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.penghasilan' table.
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
class PenghasilanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PenghasilanTableMap';

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
        $this->setName('ref.penghasilan');
        $this->setPhpName('Penghasilan');
        $this->setClassname('DataDikdas\\Model\\Penghasilan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('penghasilan_id', 'PenghasilanId', 'INTEGER', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 40, null);
        $this->addColumn('batas_bawah', 'BatasBawah', 'INTEGER', true, null, null);
        $this->addColumn('batas_atas', 'BatasAtas', 'INTEGER', true, null, null);
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
        $this->addRelation('PesertaDidikRelatedByPenghasilanIdAyah', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('penghasilan_id' => 'penghasilan_id_ayah', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByPenghasilanIdAyah');
        $this->addRelation('PesertaDidikRelatedByPenghasilanIdWali', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('penghasilan_id' => 'penghasilan_id_wali', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByPenghasilanIdWali');
        $this->addRelation('PesertaDidikRelatedByPenghasilanIdIbu', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('penghasilan_id' => 'penghasilan_id_ibu', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByPenghasilanIdIbu');
        $this->addRelation('TracerLulusan', 'DataDikdas\\Model\\TracerLulusan', RelationMap::ONE_TO_MANY, array('penghasilan_id' => 'penghasilan_id', ), 'RESTRICT', 'RESTRICT', 'TracerLulusans');
    } // buildRelations()

} // PenghasilanTableMap
