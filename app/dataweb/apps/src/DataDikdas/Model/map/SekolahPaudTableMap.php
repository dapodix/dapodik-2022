<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'sekolah_paud' table.
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
class SekolahPaudTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SekolahPaudTableMap';

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
        $this->setName('sekolah_paud');
        $this->setPhpName('SekolahPaud');
        $this->setClassname('DataDikdas\\Model\\SekolahPaud');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('sekolah_id', 'SekolahId', 'VARCHAR' , 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('kategori_tk_id', 'KategoriTkId', 'DECIMAL', 'ref.kategori_tk', 'kategori_tk_id', true, 131072, null);
        $this->addForeignKey('klasifikasi_lembaga_id', 'KlasifikasiLembagaId', 'DECIMAL', 'ref.klasifikasi_lembaga', 'klasifikasi_lembaga_id', true, 131072, null);
        $this->addForeignKey('sumber_dana_sekolah_id', 'SumberDanaSekolahId', 'DECIMAL', 'ref.sumber_dana_sekolah', 'sumber_dana_sekolah_id', true, 131072, null);
        $this->addForeignKey('fasilitas_layanan_id', 'FasilitasLayananId', 'DECIMAL', 'ref.fasilitas_layanan', 'fasilitas_layanan_id', true, 131072, null);
        $this->addForeignKey('jadwal_pmtas', 'JadwalPmtas', 'DECIMAL', 'ref.jadwal_paud', 'jadwal_id', true, 131072, null);
        $this->addForeignKey('lembaga_pengangkat_id', 'LembagaPengangkatId', 'DECIMAL', 'ref.lembaga_pengangkat', 'lembaga_pengangkat_id', true, 131072, null);
        $this->addForeignKey('jadwal_ddtk', 'JadwalDdtk', 'DECIMAL', 'ref.jadwal_paud', 'jadwal_id', true, 131072, null);
        $this->addForeignKey('freq_parenting', 'FreqParenting', 'DECIMAL', 'ref.jadwal_paud', 'jadwal_id', true, 131072, null);
        $this->addForeignKey('bentuk_lembaga_id', 'BentukLembagaId', 'DECIMAL', 'ref.bentuk_lembaga', 'bentuk_lembaga_id', true, 131072, null);
        $this->addForeignKey('jadwal_kesehatan', 'JadwalKesehatan', 'DECIMAL', 'ref.jadwal_paud', 'jadwal_id', true, 131072, null);
        $this->addColumn('izin_paud', 'IzinPaud', 'DECIMAL', true, 65536, null);
        $this->addColumn('pencatatan_ddtk', 'PencatatanDdtk', 'DECIMAL', true, 65536, null);
        $this->addColumn('rujukan_ddtk', 'RujukanDdtk', 'DECIMAL', true, 65536, null);
        $this->addColumn('pelaksanaan_parenting', 'PelaksanaanParenting', 'DECIMAL', true, 65536, null);
        $this->addColumn('parenting_kpo', 'ParentingKpo', 'DECIMAL', true, 65536, null);
        $this->addColumn('parenting_kelas', 'ParentingKelas', 'DECIMAL', true, 65536, null);
        $this->addColumn('parenting_kegiatan', 'ParentingKegiatan', 'DECIMAL', true, 65536, null);
        $this->addColumn('parenting_konsultasi', 'ParentingKonsultasi', 'DECIMAL', true, 65536, null);
        $this->addColumn('parenting_kunjungan', 'ParentingKunjungan', 'DECIMAL', true, 65536, null);
        $this->addColumn('parenting_lainnya', 'ParentingLainnya', 'DECIMAL', true, 65536, null);
        $this->addColumn('nilk', 'Nilk', 'VARCHAR', false, 20, null);
        $this->addColumn('nilm', 'Nilm', 'VARCHAR', false, 20, null);
        $this->addColumn('no_penetapan_pnf', 'NoPenetapanPnf', 'VARCHAR', false, 80, null);
        $this->addColumn('tanggal_penetapan_pnf', 'TanggalPenetapanPnf', 'DATE', false, null, null);
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
        $this->addRelation('BentukLembaga', 'DataDikdas\\Model\\BentukLembaga', RelationMap::MANY_TO_ONE, array('bentuk_lembaga_id' => 'bentuk_lembaga_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('FasilitasLayanan', 'DataDikdas\\Model\\FasilitasLayanan', RelationMap::MANY_TO_ONE, array('fasilitas_layanan_id' => 'fasilitas_layanan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JadwalPaudRelatedByFreqParenting', 'DataDikdas\\Model\\JadwalPaud', RelationMap::MANY_TO_ONE, array('freq_parenting' => 'jadwal_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JadwalPaudRelatedByJadwalDdtk', 'DataDikdas\\Model\\JadwalPaud', RelationMap::MANY_TO_ONE, array('jadwal_ddtk' => 'jadwal_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JadwalPaudRelatedByJadwalKesehatan', 'DataDikdas\\Model\\JadwalPaud', RelationMap::MANY_TO_ONE, array('jadwal_kesehatan' => 'jadwal_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JadwalPaudRelatedByJadwalPmtas', 'DataDikdas\\Model\\JadwalPaud', RelationMap::MANY_TO_ONE, array('jadwal_pmtas' => 'jadwal_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KategoriTk', 'DataDikdas\\Model\\KategoriTk', RelationMap::MANY_TO_ONE, array('kategori_tk_id' => 'kategori_tk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KlasifikasiLembaga', 'DataDikdas\\Model\\KlasifikasiLembaga', RelationMap::MANY_TO_ONE, array('klasifikasi_lembaga_id' => 'klasifikasi_lembaga_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembagaPengangkat', 'DataDikdas\\Model\\LembagaPengangkat', RelationMap::MANY_TO_ONE, array('lembaga_pengangkat_id' => 'lembaga_pengangkat_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SumberDanaSekolah', 'DataDikdas\\Model\\SumberDanaSekolah', RelationMap::MANY_TO_ONE, array('sumber_dana_sekolah_id' => 'sumber_dana_sekolah_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // SekolahPaudTableMap
