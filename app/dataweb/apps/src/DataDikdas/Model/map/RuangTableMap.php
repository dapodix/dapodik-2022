<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ruang' table.
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
class RuangTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RuangTableMap';

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
        $this->setName('ruang');
        $this->setPhpName('Ruang');
        $this->setClassname('DataDikdas\\Model\\Ruang');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_ruang', 'IdRuang', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_prasarana_id', 'JenisPrasaranaId', 'INTEGER', 'ref.jenis_prasarana', 'jenis_prasarana_id', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('parent_id_ruang', 'ParentIdRuang', 'VARCHAR', 'ruang', 'id_ruang', false, null, null);
        $this->addForeignKey('id_bangunan', 'IdBangunan', 'VARCHAR', 'bangunan', 'id_bangunan', true, null, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
        $this->addColumn('kd_ruang', 'KdRuang', 'VARCHAR', true, 10, null);
        $this->addColumn('nm_ruang', 'NmRuang', 'VARCHAR', true, 100, null);
        $this->addColumn('lantai', 'Lantai', 'DECIMAL', true, 196608, 1);
        $this->addColumn('panjang', 'Panjang', 'DOUBLE', false, null, null);
        $this->addColumn('lebar', 'Lebar', 'DOUBLE', false, null, null);
        $this->addColumn('reg_pras', 'RegPras', 'VARCHAR', false, 16, null);
        $this->addColumn('kapasitas', 'Kapasitas', 'DECIMAL', false, 327680, null);
        $this->addColumn('luas_ruang', 'LuasRuang', 'DOUBLE', false, null, null);
        $this->addColumn('luas_plester_m2', 'LuasPlesterM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_plafon_m2', 'LuasPlafonM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_dinding_m2', 'LuasDindingM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_daun_jendela_m2', 'LuasDaunJendelaM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_daun_pintu_m2', 'LuasDaunPintuM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('panj_kusen_m', 'PanjKusenM', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_tutup_lantai_m2', 'LuasTutupLantaiM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('panj_inst_listrik_m', 'PanjInstListrikM', 'DECIMAL', false, 458753, null);
        $this->addColumn('jml_inst_listrik', 'JmlInstListrik', 'DECIMAL', false, 262144, null);
        $this->addColumn('panj_inst_air_m', 'PanjInstAirM', 'DECIMAL', false, 458753, null);
        $this->addColumn('jml_inst_air', 'JmlInstAir', 'DECIMAL', false, 262144, null);
        $this->addColumn('panj_drainase_m', 'PanjDrainaseM', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_finish_struktur_m2', 'LuasFinishStrukturM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_finish_plafon_m2', 'LuasFinishPlafonM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_finish_dinding_m2', 'LuasFinishDindingM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_finish_kpj_m2', 'LuasFinishKpjM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
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
        $this->addRelation('RuangRelatedByParentIdRuang', 'DataDikdas\\Model\\Ruang', RelationMap::MANY_TO_ONE, array('parent_id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Bangunan', 'DataDikdas\\Model\\Bangunan', RelationMap::MANY_TO_ONE, array('id_bangunan' => 'id_bangunan', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPrasarana', 'DataDikdas\\Model\\JenisPrasarana', RelationMap::MANY_TO_ONE, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Alat', 'DataDikdas\\Model\\Alat', RelationMap::ONE_TO_MANY, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT', 'Alats');
        $this->addRelation('Buku', 'DataDikdas\\Model\\Buku', RelationMap::ONE_TO_MANY, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT', 'Bukus');
        $this->addRelation('Jadwal', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT', 'Jadwals');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
        $this->addRelation('RuangRelatedByIdRuang', 'DataDikdas\\Model\\Ruang', RelationMap::ONE_TO_MANY, array('id_ruang' => 'parent_id_ruang', ), 'RESTRICT', 'RESTRICT', 'RuangsRelatedByIdRuang');
        $this->addRelation('RuangLongitudinal', 'DataDikdas\\Model\\RuangLongitudinal', RelationMap::ONE_TO_MANY, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT', 'RuangLongitudinals');
        $this->addRelation('TugasTambahan', 'DataDikdas\\Model\\TugasTambahan', RelationMap::ONE_TO_MANY, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT', 'TugasTambahans');
    } // buildRelations()

} // RuangTableMap
