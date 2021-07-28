<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.role_pengguna' table.
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
class RolePenggunaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RolePenggunaTableMap';

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
        $this->setName('man_akses.role_pengguna');
        $this->setPhpName('RolePengguna');
        $this->setClassname('DataDikdas\\Model\\RolePengguna');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_role_pengguna', 'IdRolePengguna', 'VARCHAR', true, null, null);
        $this->addColumn('sekolah_id', 'SekolahId', 'VARCHAR', false, null, null);
        $this->addColumn('lembaga_id', 'LembagaId', 'VARCHAR', false, null, null);
        $this->addColumn('yayasan_id', 'YayasanId', 'VARCHAR', false, null, null);
        $this->addForeignKey('la_id', 'LaId', 'CHAR', 'ref.lembaga_akreditasi', 'la_id', false, 5, null);
        $this->addColumn('dudi_id', 'DudiId', 'VARCHAR', false, null, null);
        $this->addForeignKey('kode_lemb_sert', 'KodeLembSert', 'DECIMAL', 'ref.lemb_sertifikasi', 'kode_lemb_sert', false, 327680, null);
        $this->addForeignKey('pengguna_id', 'PenggunaId', 'VARCHAR', 'man_akses.pengguna', 'pengguna_id', true, null, null);
        $this->addForeignKey('peran_id', 'PeranId', 'INTEGER', 'man_akses.peran', 'peran_id', true, null, null);
        $this->addColumn('sk_penugasan', 'SkPenugasan', 'VARCHAR', false, 80, null);
        $this->addColumn('tgl_sk_penugasan', 'TglSkPenugasan', 'DATE', false, null, null);
        $this->addColumn('approval_peran', 'ApprovalPeran', 'DECIMAL', true, 65536, 0);
        $this->addColumn('tgl_kadaluwarsa', 'TglKadaluwarsa', 'DATE', false, null, null);
        $this->addColumn('last_active', 'LastActive', 'TIMESTAMP', false, null, null);
        $this->addColumn('jenis_lembaga', 'JenisLembaga', 'CHAR', true, 1, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Peran', 'DataDikdas\\Model\\Peran', RelationMap::MANY_TO_ONE, array('peran_id' => 'peran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembSertifikasi', 'DataDikdas\\Model\\LembSertifikasi', RelationMap::MANY_TO_ONE, array('kode_lemb_sert' => 'kode_lemb_sert', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Pengguna', 'DataDikdas\\Model\\Pengguna', RelationMap::MANY_TO_ONE, array('pengguna_id' => 'pengguna_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembagaAkreditasi', 'DataDikdas\\Model\\LembagaAkreditasi', RelationMap::MANY_TO_ONE, array('la_id' => 'la_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LogOtorisasi', 'DataDikdas\\Model\\LogOtorisasi', RelationMap::ONE_TO_MANY, array('id_role_pengguna' => 'id_role_pengguna', ), 'RESTRICT', 'RESTRICT', 'LogOtorisasis');
    } // buildRelations()

} // RolePenggunaTableMap
