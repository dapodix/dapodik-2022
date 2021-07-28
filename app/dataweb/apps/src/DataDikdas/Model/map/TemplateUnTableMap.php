<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.template_un' table.
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
class TemplateUnTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TemplateUnTableMap';

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
        $this->setName('ref.template_un');
        $this->setPhpName('TemplateUn');
        $this->setClassname('DataDikdas\\Model\\TemplateUn');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('template_id', 'TemplateId', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', true, 131072, null);
        $this->addForeignKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addForeignKey('jurusan_id', 'JurusanId', 'VARCHAR', 'ref.jurusan', 'jurusan_id', false, 25, null);
        $this->addColumn('template_ket', 'TemplateKet', 'VARCHAR', false, 250, null);
        $this->addForeignKey('mp1_id', 'Mp1Id', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', false, null, null);
        $this->addForeignKey('mp2_id', 'Mp2Id', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', false, null, null);
        $this->addForeignKey('mp3_id', 'Mp3Id', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', false, null, null);
        $this->addForeignKey('mp4_id', 'Mp4Id', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', false, null, null);
        $this->addForeignKey('mp5_id', 'Mp5Id', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', false, null, null);
        $this->addForeignKey('mp6_id', 'Mp6Id', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', false, null, null);
        $this->addForeignKey('mp7_id', 'Mp7Id', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', false, null, null);
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
        $this->addRelation('JenjangPendidikan', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Jurusan', 'DataDikdas\\Model\\Jurusan', RelationMap::MANY_TO_ONE, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaranRelatedByMp3Id', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mp3_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaranRelatedByMp4Id', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mp4_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaranRelatedByMp7Id', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mp7_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaranRelatedByMp5Id', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mp5_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaranRelatedByMp1Id', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mp1_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaranRelatedByMp2Id', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mp2_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaranRelatedByMp6Id', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mp6_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaran', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TemplateRapor', 'DataDikdas\\Model\\TemplateRapor', RelationMap::ONE_TO_MANY, array('template_id' => 'template_id', ), 'RESTRICT', 'RESTRICT', 'TemplateRapors');
        $this->addRelation('Un', 'DataDikdas\\Model\\Un', RelationMap::ONE_TO_MANY, array('template_id' => 'template_id', ), 'RESTRICT', 'RESTRICT', 'Uns');
    } // buildRelations()

} // TemplateUnTableMap
