<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.kebutuhan_khusus' table.
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
class KebutuhanKhususTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KebutuhanKhususTableMap';

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
        $this->setName('ref.kebutuhan_khusus');
        $this->setPhpName('KebutuhanKhusus');
        $this->setClassname('DataDikdas\\Model\\KebutuhanKhusus');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('kebutuhan_khusus_id', 'KebutuhanKhususId', 'INTEGER', true, null, null);
        $this->addColumn('kebutuhan_khusus', 'KebutuhanKhusus', 'VARCHAR', true, 40, null);
        $this->addColumn('kk_a', 'KkA', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_b', 'KkB', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_c', 'KkC', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_c1', 'KkC1', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_d', 'KkD', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_d1', 'KkD1', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_e', 'KkE', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_f', 'KkF', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_h', 'KkH', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_i', 'KkI', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_j', 'KkJ', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_k', 'KkK', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_n', 'KkN', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_o', 'KkO', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_p', 'KkP', 'DECIMAL', true, 65536, null);
        $this->addColumn('kk_q', 'KkQ', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_lembaga', 'UntukLembaga', 'DECIMAL', true, 65536, 1);
        $this->addColumn('untuk_ptk', 'UntukPtk', 'DECIMAL', true, 65536, 1);
        $this->addColumn('untuk_pd', 'UntukPd', 'DECIMAL', true, 65536, 1);
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
        $this->addRelation('JenisSertifikasi', 'DataDikdas\\Model\\JenisSertifikasi', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT', 'JenisSertifikasis');
        $this->addRelation('JurusanSp', 'DataDikdas\\Model\\JurusanSp', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT', 'JurusanSps');
        $this->addRelation('PesertaDidikRelatedByKebutuhanKhususIdAyah', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id_ayah', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByKebutuhanKhususIdAyah');
        $this->addRelation('PesertaDidikRelatedByKebutuhanKhususIdIbu', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id_ibu', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByKebutuhanKhususIdIbu');
        $this->addRelation('PesertaDidikRelatedByKebutuhanKhususId', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiksRelatedByKebutuhanKhususId');
        $this->addRelation('ProgramInklusi', 'DataDikdas\\Model\\ProgramInklusi', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT', 'ProgramInklusis');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'mampu_handle_kk', ), 'RESTRICT', 'RESTRICT', 'Ptks');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::ONE_TO_MANY, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT', 'Sekolahs');
    } // buildRelations()

} // KebutuhanKhususTableMap
