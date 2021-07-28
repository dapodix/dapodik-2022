<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.kurikulum' table.
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
class KurikulumTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KurikulumTableMap';

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
        $this->setName('ref.kurikulum');
        $this->setPhpName('Kurikulum');
        $this->setClassname('DataDikdas\\Model\\Kurikulum');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('kurikulum_id', 'KurikulumId', 'SMALLINT', true, null, null);
        $this->addColumn('nama_kurikulum', 'NamaKurikulum', 'VARCHAR', true, 120, null);
        $this->addColumn('mulai_berlaku', 'MulaiBerlaku', 'DATE', true, null, null);
        $this->addColumn('sistem_sks', 'SistemSks', 'DECIMAL', true, 65536, 0);
        $this->addColumn('total_sks', 'TotalSks', 'DECIMAL', true, 196608, 0);
        $this->addForeignKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', true, 131072, null);
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
        $this->addRelation('JenjangPendidikan', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Jurusan', 'DataDikdas\\Model\\Jurusan', RelationMap::MANY_TO_ONE, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('GroupMatpel', 'DataDikdas\\Model\\GroupMatpel', RelationMap::ONE_TO_MANY, array('kurikulum_id' => 'kurikulum_id', ), 'RESTRICT', 'RESTRICT', 'GroupMatpels');
        $this->addRelation('Kompetensi', 'DataDikdas\\Model\\Kompetensi', RelationMap::ONE_TO_MANY, array('kurikulum_id' => 'kurikulum_id', ), 'RESTRICT', 'RESTRICT', 'Kompetensis');
        $this->addRelation('MataPelajaranKurikulum', 'DataDikdas\\Model\\MataPelajaranKurikulum', RelationMap::ONE_TO_MANY, array('kurikulum_id' => 'kurikulum_id', ), 'RESTRICT', 'RESTRICT', 'MataPelajaranKurikulums');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('kurikulum_id' => 'kurikulum_id', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
    } // buildRelations()

} // KurikulumTableMap
