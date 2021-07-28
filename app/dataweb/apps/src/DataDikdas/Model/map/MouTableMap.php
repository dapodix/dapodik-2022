<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'mou' table.
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
class MouTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.MouTableMap';

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
        $this->setName('mou');
        $this->setPhpName('Mou');
        $this->setClassname('DataDikdas\\Model\\Mou');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('mou_id', 'MouId', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_jns_ks', 'IdJnsKs', 'DECIMAL', 'ref.jenis_ks', 'id_jns_ks', true, 393216, null);
        $this->addForeignKey('dudi_id', 'DudiId', 'VARCHAR', 'dudi', 'dudi_id', false, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addColumn('nomor_mou', 'NomorMou', 'VARCHAR', true, 80, null);
        $this->addColumn('judul_mou', 'JudulMou', 'VARCHAR', true, 80, null);
        $this->addColumn('tanggal_mulai', 'TanggalMulai', 'DATE', true, null, null);
        $this->addColumn('tanggal_selesai', 'TanggalSelesai', 'DATE', true, null, null);
        $this->addColumn('nama_dudi', 'NamaDudi', 'VARCHAR', true, 100, null);
        $this->addColumn('npwp_dudi', 'NpwpDudi', 'CHAR', false, 15, null);
        $this->addColumn('nama_bidang_usaha', 'NamaBidangUsaha', 'VARCHAR', true, 40, null);
        $this->addColumn('telp_kantor', 'TelpKantor', 'VARCHAR', false, 20, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', false, 20, null);
        $this->addColumn('contact_person', 'ContactPerson', 'VARCHAR', false, 100, null);
        $this->addColumn('telp_cp', 'TelpCp', 'VARCHAR', false, 20, null);
        $this->addColumn('jabatan_cp', 'JabatanCp', 'VARCHAR', false, 40, null);
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
        $this->addRelation('JenisKs', 'DataDikdas\\Model\\JenisKs', RelationMap::MANY_TO_ONE, array('id_jns_ks' => 'id_jns_ks', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Dudi', 'DataDikdas\\Model\\Dudi', RelationMap::MANY_TO_ONE, array('dudi_id' => 'dudi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AktPd', 'DataDikdas\\Model\\AktPd', RelationMap::ONE_TO_MANY, array('mou_id' => 'mou_id', ), 'RESTRICT', 'RESTRICT', 'AktPds');
        $this->addRelation('JurusanKerjasama', 'DataDikdas\\Model\\JurusanKerjasama', RelationMap::ONE_TO_MANY, array('mou_id' => 'mou_id', ), 'RESTRICT', 'RESTRICT', 'JurusanKerjasamas');
        $this->addRelation('UnitUsahaKerjasama', 'DataDikdas\\Model\\UnitUsahaKerjasama', RelationMap::ONE_TO_MANY, array('mou_id' => 'mou_id', ), 'RESTRICT', 'RESTRICT', 'UnitUsahaKerjasamas');
        $this->addRelation('VldMou', 'DataDikdas\\Model\\VldMou', RelationMap::ONE_TO_MANY, array('mou_id' => 'mou_id', ), 'RESTRICT', 'RESTRICT', 'VldMous');
    } // buildRelations()

} // MouTableMap
