<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ptk' table.
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
class PtkTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PtkTableMap';

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
        $this->setName('ptk');
        $this->setPhpName('Ptk');
        $this->setClassname('DataDikdas\\Model\\Ptk');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ptk_id', 'PtkId', 'VARCHAR', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('nip', 'Nip', 'VARCHAR', false, 18, null);
        $this->addColumn('jenis_kelamin', 'JenisKelamin', 'CHAR', true, 1, null);
        $this->addColumn('tempat_lahir', 'TempatLahir', 'VARCHAR', true, 32, null);
        $this->addColumn('tanggal_lahir', 'TanggalLahir', 'DATE', true, null, null);
        $this->addColumn('nik', 'Nik', 'CHAR', true, 16, null);
        $this->addColumn('no_kk', 'NoKk', 'CHAR', false, 16, null);
        $this->addColumn('niy_nigk', 'NiyNigk', 'VARCHAR', false, 30, null);
        $this->addColumn('nuptk', 'Nuptk', 'CHAR', false, 16, null);
        $this->addColumn('nrg', 'Nrg', 'VARCHAR', false, 22, null);
        $this->addColumn('nuks', 'Nuks', 'VARCHAR', false, 22, null);
        $this->addForeignKey('status_kepegawaian_id', 'StatusKepegawaianId', 'SMALLINT', 'ref.status_kepegawaian', 'status_kepegawaian_id', true, null, null);
        $this->addForeignKey('jenis_ptk_id', 'JenisPtkId', 'DECIMAL', 'ref.jenis_ptk', 'jenis_ptk_id', true, 131072, null);
        $this->addForeignKey('pengawas_bidang_studi_id', 'PengawasBidangStudiId', 'INTEGER', 'ref.bidang_studi', 'bidang_studi_id', false, null, null);
        $this->addForeignKey('agama_id', 'AgamaId', 'SMALLINT', 'ref.agama', 'agama_id', true, null, null);
        $this->addColumn('alamat_jalan', 'AlamatJalan', 'VARCHAR', true, 80, null);
        $this->addColumn('rt', 'Rt', 'DECIMAL', false, 131072, null);
        $this->addColumn('rw', 'Rw', 'DECIMAL', false, 131072, null);
        $this->addColumn('nama_dusun', 'NamaDusun', 'VARCHAR', false, 60, null);
        $this->addColumn('desa_kelurahan', 'DesaKelurahan', 'VARCHAR', true, 60, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('kode_pos', 'KodePos', 'CHAR', false, 5, null);
        $this->addColumn('lintang', 'Lintang', 'DECIMAL', false, 1179660, null);
        $this->addColumn('bujur', 'Bujur', 'DECIMAL', false, 1179660, null);
        $this->addColumn('no_telepon_rumah', 'NoTeleponRumah', 'VARCHAR', false, 20, null);
        $this->addColumn('no_hp', 'NoHp', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 60, null);
        $this->addForeignKey('status_keaktifan_id', 'StatusKeaktifanId', 'DECIMAL', 'ref.status_keaktifan_pegawai', 'status_keaktifan_id', true, 131072, null);
        $this->addColumn('sk_cpns', 'SkCpns', 'VARCHAR', false, 80, null);
        $this->addColumn('tgl_cpns', 'TglCpns', 'DATE', false, null, null);
        $this->addColumn('sk_pengangkatan', 'SkPengangkatan', 'VARCHAR', false, 80, null);
        $this->addColumn('tmt_pengangkatan', 'TmtPengangkatan', 'DATE', false, null, null);
        $this->addForeignKey('lembaga_pengangkat_id', 'LembagaPengangkatId', 'DECIMAL', 'ref.lembaga_pengangkat', 'lembaga_pengangkat_id', true, 131072, null);
        $this->addForeignKey('pangkat_golongan_id', 'PangkatGolonganId', 'DECIMAL', 'ref.pangkat_golongan', 'pangkat_golongan_id', false, 131072, null);
        $this->addForeignKey('keahlian_laboratorium_id', 'KeahlianLaboratoriumId', 'SMALLINT', 'ref.keahlian_laboratorium', 'keahlian_laboratorium_id', false, null, null);
        $this->addForeignKey('sumber_gaji_id', 'SumberGajiId', 'DECIMAL', 'ref.sumber_gaji', 'sumber_gaji_id', true, 131072, null);
        $this->addColumn('nama_ibu_kandung', 'NamaIbuKandung', 'VARCHAR', true, 100, null);
        $this->addColumn('status_perkawinan', 'StatusPerkawinan', 'DECIMAL', true, 65536, null);
        $this->addColumn('nama_suami_istri', 'NamaSuamiIstri', 'VARCHAR', false, 100, null);
        $this->addColumn('nip_suami_istri', 'NipSuamiIstri', 'CHAR', false, 18, null);
        $this->addForeignKey('pekerjaan_suami_istri', 'PekerjaanSuamiIstri', 'INTEGER', 'ref.pekerjaan', 'pekerjaan_id', true, null, null);
        $this->addColumn('tmt_pns', 'TmtPns', 'DATE', false, null, null);
        $this->addColumn('sudah_lisensi_kepala_sekolah', 'SudahLisensiKepalaSekolah', 'DECIMAL', true, 65536, null);
        $this->addColumn('jumlah_sekolah_binaan', 'JumlahSekolahBinaan', 'SMALLINT', false, null, null);
        $this->addColumn('pernah_diklat_kepengawasan', 'PernahDiklatKepengawasan', 'DECIMAL', true, 65536, null);
        $this->addColumn('nm_wp', 'NmWp', 'VARCHAR', false, 100, null);
        $this->addColumn('status_data', 'StatusData', 'INTEGER', false, null, null);
        $this->addColumn('karpeg', 'Karpeg', 'VARCHAR', false, 10, null);
        $this->addColumn('karpas', 'Karpas', 'VARCHAR', false, 16, null);
        $this->addForeignKey('mampu_handle_kk', 'MampuHandleKk', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
        $this->addColumn('keahlian_braille', 'KeahlianBraille', 'DECIMAL', false, 65536, 0);
        $this->addColumn('keahlian_bhs_isyarat', 'KeahlianBhsIsyarat', 'DECIMAL', false, 65536, 0);
        $this->addColumn('npwp', 'Npwp', 'CHAR', false, 15, null);
        $this->addForeignKey('kewarganegaraan', 'Kewarganegaraan', 'CHAR', 'ref.negara', 'negara_id', true, 2, null);
        $this->addForeignKey('id_bank', 'IdBank', 'CHAR', 'ref.bank', 'id_bank', false, 3, null);
        $this->addColumn('rekening_bank', 'RekeningBank', 'VARCHAR', false, 20, null);
        $this->addColumn('rekening_atas_nama', 'RekeningAtasNama', 'VARCHAR', false, 50, null);
        $this->addForeignKey('blob_id', 'BlobId', 'VARCHAR', 'blob.large_object', 'blob_id', false, null, null);
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
        $this->addRelation('Negara', 'DataDikdas\\Model\\Negara', RelationMap::MANY_TO_ONE, array('kewarganegaraan' => 'negara_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Bank', 'DataDikdas\\Model\\Bank', RelationMap::MANY_TO_ONE, array('id_bank' => 'id_bank', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LargeObject', 'DataDikdas\\Model\\LargeObject', RelationMap::MANY_TO_ONE, array('blob_id' => 'blob_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPtk', 'DataDikdas\\Model\\JenisPtk', RelationMap::MANY_TO_ONE, array('jenis_ptk_id' => 'jenis_ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KebutuhanKhusus', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('mampu_handle_kk' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembagaPengangkat', 'DataDikdas\\Model\\LembagaPengangkat', RelationMap::MANY_TO_ONE, array('lembaga_pengangkat_id' => 'lembaga_pengangkat_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('StatusKeaktifanPegawai', 'DataDikdas\\Model\\StatusKeaktifanPegawai', RelationMap::MANY_TO_ONE, array('status_keaktifan_id' => 'status_keaktifan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SumberGaji', 'DataDikdas\\Model\\SumberGaji', RelationMap::MANY_TO_ONE, array('sumber_gaji_id' => 'sumber_gaji_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PangkatGolongan', 'DataDikdas\\Model\\PangkatGolongan', RelationMap::MANY_TO_ONE, array('pangkat_golongan_id' => 'pangkat_golongan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BidangStudi', 'DataDikdas\\Model\\BidangStudi', RelationMap::MANY_TO_ONE, array('pengawas_bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KeahlianLaboratorium', 'DataDikdas\\Model\\KeahlianLaboratorium', RelationMap::MANY_TO_ONE, array('keahlian_laboratorium_id' => 'keahlian_laboratorium_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Pekerjaan', 'DataDikdas\\Model\\Pekerjaan', RelationMap::MANY_TO_ONE, array('pekerjaan_suami_istri' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Agama', 'DataDikdas\\Model\\Agama', RelationMap::MANY_TO_ONE, array('agama_id' => 'agama_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('StatusKepegawaian', 'DataDikdas\\Model\\StatusKepegawaian', RelationMap::MANY_TO_ONE, array('status_kepegawaian_id' => 'status_kepegawaian_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Alat', 'DataDikdas\\Model\\Alat', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Alats');
        $this->addRelation('Anak', 'DataDikdas\\Model\\Anak', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Anaks');
        $this->addRelation('AnggotaPanitia', 'DataDikdas\\Model\\AnggotaPanitia', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaPanitias');
        $this->addRelation('Angkutan', 'DataDikdas\\Model\\Angkutan', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Angkutans');
        $this->addRelation('Bangunan', 'DataDikdas\\Model\\Bangunan', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Bangunans');
        $this->addRelation('BeasiswaPtk', 'DataDikdas\\Model\\BeasiswaPtk', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'BeasiswaPtks');
        $this->addRelation('BidangSdm', 'DataDikdas\\Model\\BidangSdm', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'BidangSdms');
        $this->addRelation('BimbingPd', 'DataDikdas\\Model\\BimbingPd', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'BimbingPds');
        $this->addRelation('BukuPtk', 'DataDikdas\\Model\\BukuPtk', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'BukuPtks');
        $this->addRelation('Diklat', 'DataDikdas\\Model\\Diklat', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Diklats');
        $this->addRelation('Inpassing', 'DataDikdas\\Model\\Inpassing', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Inpassings');
        $this->addRelation('KaryaTulis', 'DataDikdas\\Model\\KaryaTulis', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'KaryaTuliss');
        $this->addRelation('Kesejahteraan', 'DataDikdas\\Model\\Kesejahteraan', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Kesejahteraans');
        $this->addRelation('KitasPtk', 'DataDikdas\\Model\\KitasPtk', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'KitasPtks');
        $this->addRelation('NilaiTest', 'DataDikdas\\Model\\NilaiTest', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'NilaiTests');
        $this->addRelation('PasporPtk', 'DataDikdas\\Model\\PasporPtk', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'PasporPtks');
        $this->addRelation('PengawasTerdaftar', 'DataDikdas\\Model\\PengawasTerdaftar', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'PengawasTerdaftars');
        $this->addRelation('Penghargaan', 'DataDikdas\\Model\\Penghargaan', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Penghargaans');
        $this->addRelation('PtkBaru', 'DataDikdas\\Model\\PtkBaru', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'PtkBarus');
        $this->addRelation('PtkTerdaftar', 'DataDikdas\\Model\\PtkTerdaftar', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'PtkTerdaftars');
        $this->addRelation('RiwayatGajiBerkala', 'DataDikdas\\Model\\RiwayatGajiBerkala', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RiwayatGajiBerkalas');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
        $this->addRelation('RwyFungsional', 'DataDikdas\\Model\\RwyFungsional', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwyFungsionals');
        $this->addRelation('RwyKepangkatan', 'DataDikdas\\Model\\RwyKepangkatan', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwyKepangkatans');
        $this->addRelation('RwyKerja', 'DataDikdas\\Model\\RwyKerja', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwyKerjas');
        $this->addRelation('RwyPendFormal', 'DataDikdas\\Model\\RwyPendFormal', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwyPendFormals');
        $this->addRelation('RwySertifikasi', 'DataDikdas\\Model\\RwySertifikasi', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwySertifikasis');
        $this->addRelation('RwyStruktural', 'DataDikdas\\Model\\RwyStruktural', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwyStrukturals');
        $this->addRelation('TugasTambahan', 'DataDikdas\\Model\\TugasTambahan', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'TugasTambahans');
        $this->addRelation('Tunjangan', 'DataDikdas\\Model\\Tunjangan', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'Tunjangans');
        $this->addRelation('VldPtk', 'DataDikdas\\Model\\VldPtk', RelationMap::ONE_TO_MANY, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT', 'VldPtks');
    } // buildRelations()

} // PtkTableMap
