<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'tracer_lulusan' table.
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
class TracerLulusanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TracerLulusanTableMap';

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
        $this->setName('tracer_lulusan');
        $this->setPhpName('TracerLulusan');
        $this->setClassname('DataDikdas\\Model\\TracerLulusan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_tracer', 'IdTracer', 'VARCHAR', true, null, null);
        $this->addForeignKey('penghasilan_id', 'PenghasilanId', 'INTEGER', 'ref.penghasilan', 'penghasilan_id', false, null, null);
        $this->addForeignKey('registrasi_id', 'RegistrasiId', 'VARCHAR', 'registrasi_peserta_didik', 'registrasi_id', true, null, null);
        $this->addColumn('tgl_entry', 'TglEntry', 'DATE', true, null, null);
        $this->addColumn('akt_setelah_lulus', 'AktSetelahLulus', 'CHAR', true, 1, null);
        $this->addColumn('nm_inst_perusahaan', 'NmInstPerusahaan', 'VARCHAR', false, 100, null);
        $this->addColumn('nm_sp', 'NmSp', 'VARCHAR', false, 100, null);
        $this->addColumn('nm_prodi', 'NmProdi', 'VARCHAR', false, 100, null);
        $this->addColumn('ket_tracer', 'KetTracer', 'VARCHAR', false, 250, null);
        $this->addForeignKey('pekerjaan_id', 'PekerjaanId', 'INTEGER', 'ref.pekerjaan', 'pekerjaan_id', false, null, null);
        $this->addForeignKey('dudi_id', 'DudiId', 'VARCHAR', 'dudi', 'dudi_id', false, null, null);
        $this->addForeignKey('bidang_usaha_id', 'BidangUsahaId', 'CHAR', 'ref.bidang_usaha', 'bidang_usaha_id', false, 10, null);
        $this->addColumn('id_prodi', 'IdProdi', 'VARCHAR', false, null, null);
        $this->addColumn('stat_tracer', 'StatTracer', 'CHAR', true, 1, null);
        $this->addColumn('ikatan_kerja', 'IkatanKerja', 'CHAR', true, 1, '*');
        $this->addColumn('a_sesuai_kompetensi', 'ASesuaiKompetensi', 'DECIMAL', false, 65536, null);
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
        $this->addRelation('Penghasilan', 'DataDikdas\\Model\\Penghasilan', RelationMap::MANY_TO_ONE, array('penghasilan_id' => 'penghasilan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BidangUsaha', 'DataDikdas\\Model\\BidangUsaha', RelationMap::MANY_TO_ONE, array('bidang_usaha_id' => 'bidang_usaha_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Dudi', 'DataDikdas\\Model\\Dudi', RelationMap::MANY_TO_ONE, array('dudi_id' => 'dudi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Pekerjaan', 'DataDikdas\\Model\\Pekerjaan', RelationMap::MANY_TO_ONE, array('pekerjaan_id' => 'pekerjaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('RegistrasiPesertaDidik', 'DataDikdas\\Model\\RegistrasiPesertaDidik', RelationMap::MANY_TO_ONE, array('registrasi_id' => 'registrasi_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // TracerLulusanTableMap
