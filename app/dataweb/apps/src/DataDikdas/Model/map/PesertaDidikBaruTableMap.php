<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'peserta_didik_baru' table.
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
class PesertaDidikBaruTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PesertaDidikBaruTableMap';

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
        $this->setName('peserta_didik_baru');
        $this->setPhpName('PesertaDidikBaru');
        $this->setClassname('DataDikdas\\Model\\PesertaDidikBaru');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pdb_id', 'PdbId', 'VARCHAR', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addColumn('nama_pd', 'NamaPd', 'VARCHAR', true, 100, null);
        $this->addColumn('jenis_kelamin', 'JenisKelamin', 'CHAR', true, 1, null);
        $this->addColumn('nisn', 'Nisn', 'CHAR', false, 10, null);
        $this->addColumn('nik', 'Nik', 'CHAR', false, 16, null);
        $this->addColumn('tempat_lahir', 'TempatLahir', 'VARCHAR', false, 32, null);
        $this->addColumn('tanggal_lahir', 'TanggalLahir', 'DATE', true, null, null);
        $this->addColumn('nama_ibu_kandung', 'NamaIbuKandung', 'VARCHAR', true, 100, null);
        $this->addForeignKey('jenis_pendaftaran_id', 'JenisPendaftaranId', 'DECIMAL', 'ref.jenis_pendaftaran', 'jenis_pendaftaran_id', true, 65536, null);
        $this->addColumn('sudah_diproses', 'SudahDiproses', 'DECIMAL', true, 65536, 0);
        $this->addColumn('berhasil_diproses', 'BerhasilDiproses', 'DECIMAL', true, 65536, 0);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', false, null, null);
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
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::MANY_TO_ONE, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPendaftaran', 'DataDikdas\\Model\\JenisPendaftaran', RelationMap::MANY_TO_ONE, array('jenis_pendaftaran_id' => 'jenis_pendaftaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaran', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // PesertaDidikBaruTableMap
