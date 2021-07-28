<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'sekolah_longitudinal' table.
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
class SekolahLongitudinalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SekolahLongitudinalTableMap';

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
        $this->setName('sekolah_longitudinal');
        $this->setPhpName('SekolahLongitudinal');
        $this->setClassname('DataDikdas\\Model\\SekolahLongitudinal');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('sekolah_id', 'SekolahId', 'VARCHAR' , 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignPrimaryKey('semester_id', 'SemesterId', 'CHAR' , 'ref.semester', 'semester_id', true, 5, null);
        $this->addForeignKey('waktu_penyelenggaraan_id', 'WaktuPenyelenggaraanId', 'DECIMAL', 'ref.waktu_penyelenggaraan', 'waktu_penyelenggaraan_id', true, 65536, null);
        $this->addColumn('kontinuitas_listrik', 'KontinuitasListrik', 'CHAR', true, 1, '1');
        $this->addColumn('jarak_listrik', 'JarakListrik', 'DECIMAL', false, 655360, null);
        $this->addColumn('wilayah_terpencil', 'WilayahTerpencil', 'DECIMAL', true, 65536, null);
        $this->addColumn('wilayah_perbatasan', 'WilayahPerbatasan', 'DECIMAL', true, 65536, null);
        $this->addColumn('wilayah_transmigrasi', 'WilayahTransmigrasi', 'DECIMAL', true, 65536, null);
        $this->addColumn('wilayah_adat_terpencil', 'WilayahAdatTerpencil', 'DECIMAL', true, 65536, null);
        $this->addColumn('wilayah_bencana_alam', 'WilayahBencanaAlam', 'DECIMAL', true, 65536, null);
        $this->addColumn('wilayah_bencana_sosial', 'WilayahBencanaSosial', 'DECIMAL', true, 65536, null);
        $this->addColumn('partisipasi_bos', 'PartisipasiBos', 'DECIMAL', true, 65536, 1);
        $this->addForeignKey('sertifikasi_iso_id', 'SertifikasiIsoId', 'SMALLINT', 'ref.sertifikasi_iso', 'sertifikasi_iso_id', true, null, null);
        $this->addForeignKey('sumber_listrik_id', 'SumberListrikId', 'DECIMAL', 'ref.sumber_listrik', 'sumber_listrik_id', true, 131072, null);
        $this->addColumn('daya_listrik', 'DayaListrik', 'DECIMAL', true, 393216, null);
        $this->addForeignKey('akses_internet_id', 'AksesInternetId', 'SMALLINT', 'ref.akses_internet', 'akses_internet_id', false, null, null);
        $this->addForeignKey('akses_internet_2_id', 'AksesInternet2Id', 'SMALLINT', 'ref.akses_internet', 'akses_internet_id', true, null, null);
        $this->addForeignKey('blob_id', 'BlobId', 'VARCHAR', 'blob.large_object', 'blob_id', false, null, null);
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
        $this->addRelation('LargeObject', 'DataDikdas\\Model\\LargeObject', RelationMap::MANY_TO_ONE, array('blob_id' => 'blob_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SertifikasiIso', 'DataDikdas\\Model\\SertifikasiIso', RelationMap::MANY_TO_ONE, array('sertifikasi_iso_id' => 'sertifikasi_iso_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SumberListrik', 'DataDikdas\\Model\\SumberListrik', RelationMap::MANY_TO_ONE, array('sumber_listrik_id' => 'sumber_listrik_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('WaktuPenyelenggaraan', 'DataDikdas\\Model\\WaktuPenyelenggaraan', RelationMap::MANY_TO_ONE, array('waktu_penyelenggaraan_id' => 'waktu_penyelenggaraan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AksesInternetRelatedByAksesInternetId', 'DataDikdas\\Model\\AksesInternet', RelationMap::MANY_TO_ONE, array('akses_internet_id' => 'akses_internet_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AksesInternetRelatedByAksesInternet2Id', 'DataDikdas\\Model\\AksesInternet', RelationMap::MANY_TO_ONE, array('akses_internet_2_id' => 'akses_internet_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Jadwal', 'DataDikdas\\Model\\Jadwal', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', 'semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'Jadwals');
    } // buildRelations()

} // SekolahLongitudinalTableMap
