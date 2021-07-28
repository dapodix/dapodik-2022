<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenjang_pendidikan' table.
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
class JenjangPendidikanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenjangPendidikanTableMap';

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
        $this->setName('ref.jenjang_pendidikan');
        $this->setPhpName('JenjangPendidikan');
        $this->setClassname('DataDikdas\\Model\\JenjangPendidikan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', true, 131072, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 25, null);
        $this->addColumn('jenjang_lembaga', 'JenjangLembaga', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_orang', 'JenjangOrang', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('Anak', 'DataDikdas\\Model\\Anak', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'Anaks');
        $this->addRelation('Jurusan', 'DataDikdas\\Model\\Jurusan', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'Jurusans');
        $this->addRelation('Kurikulum', 'DataDikdas\\Model\\Kurikulum', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'Kurikulums');
        $this->addRelation('PesertaDidikRelatedByJenjangPendidikanIbu', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_ibu', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByJenjangPendidikanIbu');
        $this->addRelation('PesertaDidikRelatedByJenjangPendidikanAyah', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_ayah', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByJenjangPendidikanAyah');
        $this->addRelation('PesertaDidikRelatedByJenjangPendidikanWali', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_wali', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByJenjangPendidikanWali');
        $this->addRelation('RwyKerja', 'DataDikdas\\Model\\RwyKerja', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'RwyKerjas');
        $this->addRelation('RwyPendFormal', 'DataDikdas\\Model\\RwyPendFormal', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'RwyPendFormals');
        $this->addRelation('TemplateUn', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUns');
        $this->addRelation('TingkatPendidikan', 'DataDikdas\\Model\\TingkatPendidikan', RelationMap::ONE_TO_MANY, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'TingkatPendidikans');
    } // buildRelations()

} // JenjangPendidikanTableMap
