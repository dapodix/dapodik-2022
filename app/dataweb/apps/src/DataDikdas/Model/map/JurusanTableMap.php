<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jurusan' table.
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
class JurusanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JurusanTableMap';

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
        $this->setName('ref.jurusan');
        $this->setPhpName('Jurusan');
        $this->setClassname('DataDikdas\\Model\\Jurusan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jurusan_id', 'JurusanId', 'VARCHAR', true, 25, null);
        $this->addColumn('nama_jurusan', 'NamaJurusan', 'VARCHAR', true, 100, null);
        $this->addColumn('untuk_sma', 'UntukSma', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_smk', 'UntukSmk', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_pt', 'UntukPt', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_slb', 'UntukSlb', 'DECIMAL', true, 65536, 0);
        $this->addColumn('untuk_smklb', 'UntukSmklb', 'DECIMAL', true, 65536, 0);
        $this->addForeignKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', false, 131072, null);
        $this->addForeignKey('jurusan_induk', 'JurusanInduk', 'VARCHAR', 'ref.jurusan', 'jurusan_id', false, 25, null);
        $this->addForeignKey('level_bidang_id', 'LevelBidangId', 'VARCHAR', 'ref.kelompok_bidang', 'level_bidang_id', true, 5, null);
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
        $this->addRelation('JurusanRelatedByJurusanInduk', 'DataDikdas\\Model\\Jurusan', RelationMap::MANY_TO_ONE, array('jurusan_induk' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KelompokBidang', 'DataDikdas\\Model\\KelompokBidang', RelationMap::MANY_TO_ONE, array('level_bidang_id' => 'level_bidang_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenjangPendidikan', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JurusanRelatedByJurusanId', 'DataDikdas\\Model\\Jurusan', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_induk', ), 'RESTRICT', 'RESTRICT', 'JurusansRelatedByJurusanId');
        $this->addRelation('JurusanSp', 'DataDikdas\\Model\\JurusanSp', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT', 'JurusanSps');
        $this->addRelation('Kurikulum', 'DataDikdas\\Model\\Kurikulum', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT', 'Kurikulums');
        $this->addRelation('MataPelajaran', 'DataDikdas\\Model\\MataPelajaran', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT', 'MataPelajarans');
        $this->addRelation('PemakaiPrasarana', 'DataDikdas\\Model\\PemakaiPrasarana', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT', 'PemakaiPrasaranas');
        $this->addRelation('PemakaiSarana', 'DataDikdas\\Model\\PemakaiSarana', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT', 'PemakaiSaranas');
        $this->addRelation('StandarSarana', 'DataDikdas\\Model\\StandarSarana', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT', 'StandarSaranas');
        $this->addRelation('TemplateUn', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUns');
    } // buildRelations()

} // JurusanTableMap
