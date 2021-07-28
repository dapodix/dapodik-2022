<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'peserta_didik' table.
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
class PesertaDidikTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PesertaDidikTableMap';

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
        $this->setName('peserta_didik');
        $this->setPhpName('PesertaDidik');
        $this->setClassname('DataDikdas\\Model\\PesertaDidik');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('jenis_kelamin', 'JenisKelamin', 'CHAR', true, 1, null);
        $this->addColumn('nisn', 'Nisn', 'CHAR', false, 10, null);
        $this->addColumn('nik', 'Nik', 'CHAR', false, 16, null);
        $this->addColumn('no_kk', 'NoKk', 'CHAR', false, 16, null);
        $this->addColumn('tempat_lahir', 'TempatLahir', 'VARCHAR', false, 32, null);
        $this->addColumn('tanggal_lahir', 'TanggalLahir', 'DATE', true, null, null);
        $this->addForeignKey('agama_id', 'AgamaId', 'SMALLINT', 'ref.agama', 'agama_id', true, null, null);
        $this->addForeignKey('kebutuhan_khusus_id', 'KebutuhanKhususId', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
        $this->addColumn('alamat_jalan', 'AlamatJalan', 'VARCHAR', true, 80, null);
        $this->addColumn('rt', 'Rt', 'DECIMAL', false, 131072, null);
        $this->addColumn('rw', 'Rw', 'DECIMAL', false, 131072, null);
        $this->addColumn('nama_dusun', 'NamaDusun', 'VARCHAR', false, 60, null);
        $this->addColumn('desa_kelurahan', 'DesaKelurahan', 'VARCHAR', true, 60, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('kode_pos', 'KodePos', 'CHAR', false, 5, null);
        $this->addColumn('lintang', 'Lintang', 'DECIMAL', false, 1179660, null);
        $this->addColumn('bujur', 'Bujur', 'DECIMAL', false, 1179660, null);
        $this->addForeignKey('jenis_tinggal_id', 'JenisTinggalId', 'DECIMAL', 'ref.jenis_tinggal', 'jenis_tinggal_id', false, 131072, null);
        $this->addForeignKey('alat_transportasi_id', 'AlatTransportasiId', 'DECIMAL', 'ref.alat_transportasi', 'alat_transportasi_id', false, 131072, null);
        $this->addColumn('nik_ayah', 'NikAyah', 'CHAR', false, 16, null);
        $this->addColumn('nik_ibu', 'NikIbu', 'CHAR', false, 16, null);
        $this->addColumn('anak_keberapa', 'AnakKeberapa', 'DECIMAL', false, 131072, null);
        $this->addColumn('nik_wali', 'NikWali', 'CHAR', false, 16, null);
        $this->addColumn('nomor_telepon_rumah', 'NomorTeleponRumah', 'VARCHAR', false, 20, null);
        $this->addColumn('nomor_telepon_seluler', 'NomorTeleponSeluler', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 60, null);
        $this->addColumn('penerima_kps', 'PenerimaKps', 'DECIMAL', true, 65536, null);
        $this->addColumn('no_kps', 'NoKps', 'VARCHAR', false, 80, null);
        $this->addColumn('layak_pip', 'LayakPip', 'DECIMAL', true, 65536, 0);
        $this->addColumn('penerima_kip', 'PenerimaKip', 'DECIMAL', true, 65536, null);
        $this->addColumn('no_kip', 'NoKip', 'VARCHAR', false, 6, null);
        $this->addColumn('nm_kip', 'NmKip', 'VARCHAR', false, 100, null);
        $this->addColumn('no_kks', 'NoKks', 'VARCHAR', false, 6, null);
        $this->addColumn('reg_akta_lahir', 'RegAktaLahir', 'VARCHAR', false, 80, null);
        $this->addForeignKey('id_layak_pip', 'IdLayakPip', 'DECIMAL', 'ref.alasan_layak_pip', 'id_layak_pip', false, 131072, null);
        $this->addForeignKey('id_bank', 'IdBank', 'CHAR', 'ref.bank', 'id_bank', false, 3, null);
        $this->addColumn('rekening_bank', 'RekeningBank', 'VARCHAR', false, 20, null);
        $this->addColumn('nama_kcp', 'NamaKcp', 'VARCHAR', false, 100, null);
        $this->addColumn('rekening_atas_nama', 'RekeningAtasNama', 'VARCHAR', false, 100, null);
        $this->addColumn('status_data', 'StatusData', 'INTEGER', false, null, null);
        $this->addColumn('nama_ayah', 'NamaAyah', 'VARCHAR', false, 100, null);
        $this->addColumn('tahun_lahir_ayah', 'TahunLahirAyah', 'DECIMAL', false, 262144, null);
        $this->addForeignKey('jenjang_pendidikan_ayah', 'JenjangPendidikanAyah', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', false, 131072, null);
        $this->addForeignKey('pekerjaan_id_ayah', 'PekerjaanIdAyah', 'INTEGER', 'ref.pekerjaan', 'pekerjaan_id', false, null, null);
        $this->addForeignKey('penghasilan_id_ayah', 'PenghasilanIdAyah', 'INTEGER', 'ref.penghasilan', 'penghasilan_id', false, null, null);
        $this->addForeignKey('kebutuhan_khusus_id_ayah', 'KebutuhanKhususIdAyah', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
        $this->addColumn('nama_ibu_kandung', 'NamaIbuKandung', 'VARCHAR', true, 100, null);
        $this->addColumn('tahun_lahir_ibu', 'TahunLahirIbu', 'DECIMAL', false, 262144, null);
        $this->addForeignKey('jenjang_pendidikan_ibu', 'JenjangPendidikanIbu', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', false, 131072, null);
        $this->addForeignKey('penghasilan_id_ibu', 'PenghasilanIdIbu', 'INTEGER', 'ref.penghasilan', 'penghasilan_id', false, null, null);
        $this->addForeignKey('pekerjaan_id_ibu', 'PekerjaanIdIbu', 'INTEGER', 'ref.pekerjaan', 'pekerjaan_id', false, null, null);
        $this->addForeignKey('kebutuhan_khusus_id_ibu', 'KebutuhanKhususIdIbu', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
        $this->addColumn('nama_wali', 'NamaWali', 'VARCHAR', false, 30, null);
        $this->addColumn('tahun_lahir_wali', 'TahunLahirWali', 'DECIMAL', false, 262144, null);
        $this->addForeignKey('jenjang_pendidikan_wali', 'JenjangPendidikanWali', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', false, 131072, null);
        $this->addForeignKey('pekerjaan_id_wali', 'PekerjaanIdWali', 'INTEGER', 'ref.pekerjaan', 'pekerjaan_id', false, null, null);
        $this->addForeignKey('penghasilan_id_wali', 'PenghasilanIdWali', 'INTEGER', 'ref.penghasilan', 'penghasilan_id', false, null, null);
        $this->addForeignKey('kewarganegaraan', 'Kewarganegaraan', 'CHAR', 'ref.negara', 'negara_id', true, 2, null);
        $this->addForeignKey('pekerjaan_id', 'PekerjaanId', 'INTEGER', 'ref.pekerjaan', 'pekerjaan_id', false, null, null);
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
        $this->addRelation('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('kebutuhan_khusus_id_ayah' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('kebutuhan_khusus_id_ibu' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Negara', 'DataDikdas\\Model\\Negara', RelationMap::MANY_TO_ONE, array('kewarganegaraan' => 'negara_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AlasanLayakPip', 'DataDikdas\\Model\\AlasanLayakPip', RelationMap::MANY_TO_ONE, array('id_layak_pip' => 'id_layak_pip', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Bank', 'DataDikdas\\Model\\Bank', RelationMap::MANY_TO_ONE, array('id_bank' => 'id_bank', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KebutuhanKhususRelatedByKebutuhanKhususId', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PekerjaanRelatedByPekerjaanId', 'DataDikdas\\Model\\Pekerjaan', RelationMap::MANY_TO_ONE, array('pekerjaan_id' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Agama', 'DataDikdas\\Model\\Agama', RelationMap::MANY_TO_ONE, array('agama_id' => 'agama_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PenghasilanRelatedByPenghasilanIdAyah', 'DataDikdas\\Model\\Penghasilan', RelationMap::MANY_TO_ONE, array('penghasilan_id_ayah' => 'penghasilan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisTinggal', 'DataDikdas\\Model\\JenisTinggal', RelationMap::MANY_TO_ONE, array('jenis_tinggal_id' => 'jenis_tinggal_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AlatTransportasi', 'DataDikdas\\Model\\AlatTransportasi', RelationMap::MANY_TO_ONE, array('alat_transportasi_id' => 'alat_transportasi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PekerjaanRelatedByPekerjaanIdAyah', 'DataDikdas\\Model\\Pekerjaan', RelationMap::MANY_TO_ONE, array('pekerjaan_id_ayah' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenjangPendidikanRelatedByJenjangPendidikanIbu', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_ibu' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PenghasilanRelatedByPenghasilanIdWali', 'DataDikdas\\Model\\Penghasilan', RelationMap::MANY_TO_ONE, array('penghasilan_id_wali' => 'penghasilan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PekerjaanRelatedByPekerjaanIdIbu', 'DataDikdas\\Model\\Pekerjaan', RelationMap::MANY_TO_ONE, array('pekerjaan_id_ibu' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenjangPendidikanRelatedByJenjangPendidikanAyah', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_ayah' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PenghasilanRelatedByPenghasilanIdIbu', 'DataDikdas\\Model\\Penghasilan', RelationMap::MANY_TO_ONE, array('penghasilan_id_ibu' => 'penghasilan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PekerjaanRelatedByPekerjaanIdWali', 'DataDikdas\\Model\\Pekerjaan', RelationMap::MANY_TO_ONE, array('pekerjaan_id_wali' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenjangPendidikanRelatedByJenjangPendidikanWali', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_wali' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AnggotaPanitia', 'DataDikdas\\Model\\AnggotaPanitia', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaPanitias');
        $this->addRelation('AnggotaRombel', 'DataDikdas\\Model\\AnggotaRombel', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaRombels');
        $this->addRelation('BeasiswaPesertaDidik', 'DataDikdas\\Model\\BeasiswaPesertaDidik', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'BeasiswaPesertaDidiks');
        $this->addRelation('KesejahteraanPd', 'DataDikdas\\Model\\KesejahteraanPd', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'KesejahteraanPds');
        $this->addRelation('KitasPd', 'DataDikdas\\Model\\KitasPd', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'KitasPds');
        $this->addRelation('PasporPd', 'DataDikdas\\Model\\PasporPd', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'PasporPds');
        $this->addRelation('PesertaDidikBaru', 'DataDikdas\\Model\\PesertaDidikBaru', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidikBarus');
        $this->addRelation('PesertaDidikLongitudinal', 'DataDikdas\\Model\\PesertaDidikLongitudinal', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidikLongitudinals');
        $this->addRelation('Prestasi', 'DataDikdas\\Model\\Prestasi', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'Prestasis');
        $this->addRelation('RegistrasiPesertaDidik', 'DataDikdas\\Model\\RegistrasiPesertaDidik', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'RegistrasiPesertaDidiks');
        $this->addRelation('SertifikasiPd', 'DataDikdas\\Model\\SertifikasiPd', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'SertifikasiPds');
        $this->addRelation('VldPesertaDidik', 'DataDikdas\\Model\\VldPesertaDidik', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'VldPesertaDidiks');
    } // buildRelations()

} // PesertaDidikTableMap
