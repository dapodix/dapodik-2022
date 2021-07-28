<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ptk_terdaftar' table.
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
class PtkTerdaftarTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PtkTerdaftarTableMap';

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
        $this->setName('ptk_terdaftar');
        $this->setPhpName('PtkTerdaftar');
        $this->setClassname('DataDikdas\\Model\\PtkTerdaftar');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ptk_terdaftar_id', 'PtkTerdaftarId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('jenis_keluar_id', 'JenisKeluarId', 'CHAR', 'ref.jenis_keluar', 'jenis_keluar_id', false, 1, null);
        $this->addForeignKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addColumn('nomor_surat_tugas', 'NomorSuratTugas', 'VARCHAR', true, 80, null);
        $this->addColumn('tanggal_surat_tugas', 'TanggalSuratTugas', 'DATE', true, null, null);
        $this->addColumn('ptk_induk', 'PtkInduk', 'DECIMAL', true, 65536, null);
        $this->addColumn('tmt_tugas', 'TmtTugas', 'DATE', true, null, null);
        $this->addColumn('aktif_bulan_01', 'AktifBulan01', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_02', 'AktifBulan02', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_03', 'AktifBulan03', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_04', 'AktifBulan04', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_05', 'AktifBulan05', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_06', 'AktifBulan06', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_07', 'AktifBulan07', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_08', 'AktifBulan08', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_09', 'AktifBulan09', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_10', 'AktifBulan10', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_11', 'AktifBulan11', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif_bulan_12', 'AktifBulan12', 'DECIMAL', true, 65536, 0);
        $this->addColumn('tgl_ptk_keluar', 'TglPtkKeluar', 'DATE', false, null, null);
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
        $this->addRelation('JenisKeluar', 'DataDikdas\\Model\\JenisKeluar', RelationMap::MANY_TO_ONE, array('jenis_keluar_id' => 'jenis_keluar_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaran', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('GuruSasaranPengawas', 'DataDikdas\\Model\\GuruSasaranPengawas', RelationMap::ONE_TO_MANY, array('ptk_terdaftar_id' => 'ptk_terdaftar_id', ), 'RESTRICT', 'RESTRICT', 'GuruSasaranPengawass');
        $this->addRelation('Pembelajaran', 'DataDikdas\\Model\\Pembelajaran', RelationMap::ONE_TO_MANY, array('ptk_terdaftar_id' => 'ptk_terdaftar_id', ), 'RESTRICT', 'RESTRICT', 'Pembelajarans');
        $this->addRelation('VldPtkTerdaftar', 'DataDikdas\\Model\\VldPtkTerdaftar', RelationMap::ONE_TO_MANY, array('ptk_terdaftar_id' => 'ptk_terdaftar_id', ), 'RESTRICT', 'RESTRICT', 'VldPtkTerdaftars');
    } // buildRelations()

} // PtkTerdaftarTableMap
