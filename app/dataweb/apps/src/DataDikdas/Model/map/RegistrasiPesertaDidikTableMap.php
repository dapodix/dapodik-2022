<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'registrasi_peserta_didik' table.
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
class RegistrasiPesertaDidikTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RegistrasiPesertaDidikTableMap';

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
        $this->setName('registrasi_peserta_didik');
        $this->setPhpName('RegistrasiPesertaDidik');
        $this->setClassname('DataDikdas\\Model\\RegistrasiPesertaDidik');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('registrasi_id', 'RegistrasiId', 'VARCHAR', true, null, null);
        $this->addForeignKey('jurusan_sp_id', 'JurusanSpId', 'VARCHAR', 'jurusan_sp', 'jurusan_sp_id', false, null, null);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('jenis_pendaftaran_id', 'JenisPendaftaranId', 'DECIMAL', 'ref.jenis_pendaftaran', 'jenis_pendaftaran_id', true, 65536, null);
        $this->addColumn('nipd', 'Nipd', 'VARCHAR', false, 18, null);
        $this->addColumn('tanggal_masuk_sekolah', 'TanggalMasukSekolah', 'DATE', true, null, null);
        $this->addForeignKey('jenis_keluar_id', 'JenisKeluarId', 'CHAR', 'ref.jenis_keluar', 'jenis_keluar_id', false, 1, null);
        $this->addColumn('tanggal_keluar', 'TanggalKeluar', 'DATE', false, null, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 128, null);
        $this->addColumn('no_skhun', 'NoSkhun', 'CHAR', false, 22, null);
        $this->addColumn('no_peserta_ujian', 'NoPesertaUjian', 'CHAR', false, 22, null);
        $this->addColumn('no_seri_ijazah', 'NoSeriIjazah', 'VARCHAR', false, 80, null);
        $this->addColumn('a_pernah_paud', 'APernahPaud', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_pernah_tk', 'APernahTk', 'DECIMAL', true, 65536, 0);
        $this->addColumn('sekolah_asal', 'SekolahAsal', 'VARCHAR', false, 100, null);
        $this->addForeignKey('id_hobby', 'IdHobby', 'DECIMAL', 'ref.jenis_hobby', 'id_hobby', true, 327680, null);
        $this->addForeignKey('id_cita', 'IdCita', 'DECIMAL', 'ref.jenis_cita', 'id_cita', true, 327680, null);
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
        $this->addRelation('JurusanSp', 'DataDikdas\\Model\\JurusanSp', RelationMap::MANY_TO_ONE, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::MANY_TO_ONE, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPendaftaran', 'DataDikdas\\Model\\JenisPendaftaran', RelationMap::MANY_TO_ONE, array('jenis_pendaftaran_id' => 'jenis_pendaftaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisKeluar', 'DataDikdas\\Model\\JenisKeluar', RelationMap::MANY_TO_ONE, array('jenis_keluar_id' => 'jenis_keluar_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisCita', 'DataDikdas\\Model\\JenisCita', RelationMap::MANY_TO_ONE, array('id_cita' => 'id_cita', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisHobby', 'DataDikdas\\Model\\JenisHobby', RelationMap::MANY_TO_ONE, array('id_hobby' => 'id_hobby', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AnggotaAktPd', 'DataDikdas\\Model\\AnggotaAktPd', RelationMap::ONE_TO_MANY, array('registrasi_id' => 'registrasi_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaAktPds');
        $this->addRelation('TracerLulusan', 'DataDikdas\\Model\\TracerLulusan', RelationMap::ONE_TO_MANY, array('registrasi_id' => 'registrasi_id', ), 'RESTRICT', 'RESTRICT', 'TracerLulusans');
        $this->addRelation('VldRegPd', 'DataDikdas\\Model\\VldRegPd', RelationMap::ONE_TO_MANY, array('registrasi_id' => 'registrasi_id', ), 'RESTRICT', 'RESTRICT', 'VldRegPds');
    } // buildRelations()

} // RegistrasiPesertaDidikTableMap
