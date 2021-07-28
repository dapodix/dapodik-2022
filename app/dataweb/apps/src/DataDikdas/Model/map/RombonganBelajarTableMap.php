<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rombongan_belajar' table.
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
class RombonganBelajarTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RombonganBelajarTableMap';

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
        $this->setName('rombongan_belajar');
        $this->setPhpName('RombonganBelajar');
        $this->setClassname('DataDikdas\\Model\\RombonganBelajar');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('rombongan_belajar_id', 'RombonganBelajarId', 'VARCHAR', true, null, null);
        $this->addForeignKey('semester_id', 'SemesterId', 'CHAR', 'ref.semester', 'semester_id', true, 5, null);
        $this->addForeignKey('id_ruang', 'IdRuang', 'VARCHAR', 'ruang', 'id_ruang', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('tingkat_pendidikan_id', 'TingkatPendidikanId', 'DECIMAL', 'ref.tingkat_pendidikan', 'tingkat_pendidikan_id', true, 131072, null);
        $this->addForeignKey('jurusan_sp_id', 'JurusanSpId', 'VARCHAR', 'jurusan_sp', 'jurusan_sp_id', false, null, null);
        $this->addForeignKey('kurikulum_id', 'KurikulumId', 'SMALLINT', 'ref.kurikulum', 'kurikulum_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 30, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', false, null, null);
        $this->addColumn('moving_class', 'MovingClass', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenis_rombel', 'JenisRombel', 'DECIMAL', true, 131072, null);
        $this->addColumn('sks', 'Sks', 'DECIMAL', true, 131072, 0);
        $this->addColumn('tanggal_mulai', 'TanggalMulai', 'DATE', true, null, null);
        $this->addColumn('tanggal_selesai', 'TanggalSelesai', 'DATE', true, null, null);
        $this->addForeignKey('kebutuhan_khusus_id', 'KebutuhanKhususId', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
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
        $this->addRelation('JurusanSp', 'DataDikdas\\Model\\JurusanSp', RelationMap::MANY_TO_ONE, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KebutuhanKhusus', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Kurikulum', 'DataDikdas\\Model\\Kurikulum', RelationMap::MANY_TO_ONE, array('kurikulum_id' => 'kurikulum_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TingkatPendidikan', 'DataDikdas\\Model\\TingkatPendidikan', RelationMap::MANY_TO_ONE, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::MANY_TO_ONE, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AnggotaRombel', 'DataDikdas\\Model\\AnggotaRombel', RelationMap::ONE_TO_MANY, array('rombongan_belajar_id' => 'rombongan_belajar_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaRombels');
        $this->addRelation('KelasEkskul', 'DataDikdas\\Model\\KelasEkskul', RelationMap::ONE_TO_MANY, array('rombongan_belajar_id' => 'rombongan_belajar_id', ), 'RESTRICT', 'RESTRICT', 'KelasEkskuls');
        $this->addRelation('Pembelajaran', 'DataDikdas\\Model\\Pembelajaran', RelationMap::ONE_TO_MANY, array('rombongan_belajar_id' => 'rombongan_belajar_id', ), 'RESTRICT', 'RESTRICT', 'Pembelajarans');
        $this->addRelation('VldRombel', 'DataDikdas\\Model\\VldRombel', RelationMap::ONE_TO_MANY, array('rombongan_belajar_id' => 'rombongan_belajar_id', ), 'RESTRICT', 'RESTRICT', 'VldRombels');
    } // buildRelations()

} // RombonganBelajarTableMap
