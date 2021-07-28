<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'jurusan_sp' table.
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
class JurusanSpTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JurusanSpTableMap';

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
        $this->setName('jurusan_sp');
        $this->setPhpName('JurusanSp');
        $this->setClassname('DataDikdas\\Model\\JurusanSp');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jurusan_sp_id', 'JurusanSpId', 'VARCHAR', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('kebutuhan_khusus_id', 'KebutuhanKhususId', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
        $this->addForeignKey('jurusan_id', 'JurusanId', 'VARCHAR', 'ref.jurusan', 'jurusan_id', true, 25, null);
        $this->addColumn('nama_jurusan_sp', 'NamaJurusanSp', 'VARCHAR', true, 60, null);
        $this->addColumn('sk_izin', 'SkIzin', 'VARCHAR', false, 80, null);
        $this->addColumn('tanggal_sk_izin', 'TanggalSkIzin', 'DATE', false, null, null);
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
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Jurusan', 'DataDikdas\\Model\\Jurusan', RelationMap::MANY_TO_ONE, array('jurusan_id' => 'jurusan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KebutuhanKhusus', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AkreditasiProdi', 'DataDikdas\\Model\\AkreditasiProdi', RelationMap::ONE_TO_MANY, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT', 'AkreditasiProdis');
        $this->addRelation('JurSpLong', 'DataDikdas\\Model\\JurSpLong', RelationMap::ONE_TO_MANY, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT', 'JurSpLongs');
        $this->addRelation('JurusanKerjasama', 'DataDikdas\\Model\\JurusanKerjasama', RelationMap::ONE_TO_MANY, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT', 'JurusanKerjasamas');
        $this->addRelation('RegistrasiPesertaDidik', 'DataDikdas\\Model\\RegistrasiPesertaDidik', RelationMap::ONE_TO_MANY, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT', 'RegistrasiPesertaDidiks');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
        $this->addRelation('VldJurusanSp', 'DataDikdas\\Model\\VldJurusanSp', RelationMap::ONE_TO_MANY, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT', 'VldJurusanSps');
    } // buildRelations()

} // JurusanSpTableMap
