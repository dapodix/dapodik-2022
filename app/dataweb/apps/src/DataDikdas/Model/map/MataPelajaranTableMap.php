<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.mata_pelajaran' table.
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
class MataPelajaranTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.MataPelajaranTableMap';

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
        $this->setName('ref.mata_pelajaran');
        $this->setPhpName('MataPelajaran');
        $this->setClassname('DataDikdas\\Model\\MataPelajaran');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('mata_pelajaran_id', 'MataPelajaranId', 'INTEGER', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 80, null);
        $this->addColumn('pilihan_sekolah', 'PilihanSekolah', 'DECIMAL', true, 65536, null);
        $this->addColumn('pilihan_buku', 'PilihanBuku', 'DECIMAL', true, 65536, null);
        $this->addColumn('pilihan_kepengawasan', 'PilihanKepengawasan', 'DECIMAL', true, 65536, null);
        $this->addColumn('pilihan_evaluasi', 'PilihanEvaluasi', 'DECIMAL', true, 65536, 0);
        $this->addForeignKey('jurusan_id', 'JurusanId', 'VARCHAR', 'ref.jurusan', 'jurusan_id', false, 25, null);
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
        $this->addRelation('Buku', 'DataDikdas\\Model\\Buku', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'Bukus');
        $this->addRelation('Kompetensi', 'DataDikdas\\Model\\Kompetensi', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'Kompetensis');
        $this->addRelation('MapBidangMataPelajaran', 'DataDikdas\\Model\\MapBidangMataPelajaran', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'MapBidangMataPelajarans');
        $this->addRelation('MapelBiblio', 'DataDikdas\\Model\\MapelBiblio', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'MapelBiblios');
        $this->addRelation('MataPelajaranKurikulum', 'DataDikdas\\Model\\MataPelajaranKurikulum', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'MataPelajaranKurikulums');
        $this->addRelation('MatevRapor', 'DataDikdas\\Model\\MatevRapor', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'MatevRapors');
        $this->addRelation('Mulok', 'DataDikdas\\Model\\Mulok', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'Muloks');
        $this->addRelation('Pembelajaran', 'DataDikdas\\Model\\Pembelajaran', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'Pembelajarans');
        $this->addRelation('PengawasTerdaftar', 'DataDikdas\\Model\\PengawasTerdaftar', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'PengawasTerdaftars');
        $this->addRelation('TemplateRapor', 'DataDikdas\\Model\\TemplateRapor', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT', 'TemplateRapors');
        $this->addRelation('TemplateUnRelatedByMp3Id', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mp3_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUnsRelatedByMp3Id');
        $this->addRelation('TemplateUnRelatedByMp4Id', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mp4_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUnsRelatedByMp4Id');
        $this->addRelation('TemplateUnRelatedByMp7Id', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mp7_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUnsRelatedByMp7Id');
        $this->addRelation('TemplateUnRelatedByMp5Id', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mp5_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUnsRelatedByMp5Id');
        $this->addRelation('TemplateUnRelatedByMp1Id', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mp1_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUnsRelatedByMp1Id');
        $this->addRelation('TemplateUnRelatedByMp2Id', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mp2_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUnsRelatedByMp2Id');
        $this->addRelation('TemplateUnRelatedByMp6Id', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('mata_pelajaran_id' => 'mp6_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUnsRelatedByMp6Id');
    } // buildRelations()

} // MataPelajaranTableMap
