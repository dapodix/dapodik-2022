<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pembelajaran' table.
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
class PembelajaranTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PembelajaranTableMap';

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
        $this->setName('pembelajaran');
        $this->setPhpName('Pembelajaran');
        $this->setClassname('DataDikdas\\Model\\Pembelajaran');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pembelajaran_id', 'PembelajaranId', 'VARCHAR', true, null, null);
        $this->addForeignKey('rombongan_belajar_id', 'RombonganBelajarId', 'VARCHAR', 'rombongan_belajar', 'rombongan_belajar_id', true, null, null);
        $this->addForeignKey('semester_id', 'SemesterId', 'CHAR', 'ref.semester', 'semester_id', true, 5, null);
        $this->addForeignKey('mata_pelajaran_id', 'MataPelajaranId', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', true, null, null);
        $this->addForeignKey('ptk_terdaftar_id', 'PtkTerdaftarId', 'VARCHAR', 'ptk_terdaftar', 'ptk_terdaftar_id', true, null, null);
        $this->addColumn('sk_mengajar', 'SkMengajar', 'VARCHAR', true, 80, null);
        $this->addColumn('tanggal_sk_mengajar', 'TanggalSkMengajar', 'DATE', true, null, null);
        $this->addColumn('jam_mengajar_per_minggu', 'JamMengajarPerMinggu', 'DECIMAL', true, 131072, null);
        $this->addColumn('status_di_kurikulum', 'StatusDiKurikulum', 'DECIMAL', true, 131072, null);
        $this->addColumn('nama_mata_pelajaran', 'NamaMataPelajaran', 'VARCHAR', true, 50, null);
        $this->addForeignKey('induk_pembelajaran_id', 'IndukPembelajaranId', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
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
        $this->addRelation('PembelajaranRelatedByIndukPembelajaranId', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('induk_pembelajaran_id' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PtkTerdaftar', 'DataDikdas\\Model\\PtkTerdaftar', RelationMap::MANY_TO_ONE, array('ptk_terdaftar_id' => 'ptk_terdaftar_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::MANY_TO_ONE, array('rombongan_belajar_id' => 'rombongan_belajar_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaran', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BukuPelajaran', 'DataDikdas\\Model\\BukuPelajaran', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT', 'BukuPelajarans');
        $this->addRelation('JadwalRelatedByBelKe01', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_01', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe01');
        $this->addRelation('JadwalRelatedByBelKe02', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_02', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe02');
        $this->addRelation('JadwalRelatedByBelKe03', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_03', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe03');
        $this->addRelation('JadwalRelatedByBelKe04', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_04', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe04');
        $this->addRelation('JadwalRelatedByBelKe05', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_05', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe05');
        $this->addRelation('JadwalRelatedByBelKe06', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_06', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe06');
        $this->addRelation('JadwalRelatedByBelKe07', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_07', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe07');
        $this->addRelation('JadwalRelatedByBelKe08', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_08', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe08');
        $this->addRelation('JadwalRelatedByBelKe09', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_09', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe09');
        $this->addRelation('JadwalRelatedByBelKe10', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_10', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe10');
        $this->addRelation('JadwalRelatedByBelKe11', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_11', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe11');
        $this->addRelation('JadwalRelatedByBelKe12', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_12', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe12');
        $this->addRelation('JadwalRelatedByBelKe13', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_13', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe13');
        $this->addRelation('JadwalRelatedByBelKe14', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_14', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe14');
        $this->addRelation('JadwalRelatedByBelKe15', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_15', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe15');
        $this->addRelation('JadwalRelatedByBelKe16', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_16', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe16');
        $this->addRelation('JadwalRelatedByBelKe17', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_17', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe17');
        $this->addRelation('JadwalRelatedByBelKe18', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_18', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe18');
        $this->addRelation('JadwalRelatedByBelKe19', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_19', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe19');
        $this->addRelation('JadwalRelatedByBelKe20', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'bel_ke_20', ), 'RESTRICT', 'RESTRICT', 'JadwalsRelatedByBelKe20');
        $this->addRelation('PembelajaranRelatedByPembelajaranId', 'DataDikdas\\Model\\Pembelajaran', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'induk_pembelajaran_id', ), 'RESTRICT', 'RESTRICT', 'PembelajaransRelatedByPembelajaranId');
        $this->addRelation('VldPembelajaran', 'DataDikdas\\Model\\VldPembelajaran', RelationMap::ONE_TO_MANY, array('pembelajaran_id' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT', 'VldPembelajarans');
    } // buildRelations()

} // PembelajaranTableMap
