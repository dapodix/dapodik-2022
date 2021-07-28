<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.pekerjaan' table.
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
class PekerjaanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PekerjaanTableMap';

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
        $this->setName('ref.pekerjaan');
        $this->setPhpName('Pekerjaan');
        $this->setClassname('DataDikdas\\Model\\Pekerjaan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pekerjaan_id', 'PekerjaanId', 'INTEGER', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', false, 25, null);
        $this->addColumn('a_wirausaha', 'AWirausaha', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_pejabat_publik', 'APejabatPublik', 'DECIMAL', true, 65536, 0);
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
        $this->addRelation('PesertaDidikRelatedByPekerjaanId', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('pekerjaan_id' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByPekerjaanId');
        $this->addRelation('PesertaDidikRelatedByPekerjaanIdAyah', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('pekerjaan_id' => 'pekerjaan_id_ayah', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByPekerjaanIdAyah');
        $this->addRelation('PesertaDidikRelatedByPekerjaanIdIbu', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('pekerjaan_id' => 'pekerjaan_id_ibu', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByPekerjaanIdIbu');
        $this->addRelation('PesertaDidikRelatedByPekerjaanIdWali', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('pekerjaan_id' => 'pekerjaan_id_wali', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByPekerjaanIdWali');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::ONE_TO_MANY, array('pekerjaan_id' => 'pekerjaan_suami_istri', ), 'RESTRICT', 'RESTRICT', 'Ptks');
        $this->addRelation('TracerLulusan', 'DataDikdas\\Model\\TracerLulusan', RelationMap::ONE_TO_MANY, array('pekerjaan_id' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT', 'TracerLulusans');
    } // buildRelations()

} // PekerjaanTableMap
