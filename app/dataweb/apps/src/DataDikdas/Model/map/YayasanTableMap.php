<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'yayasan' table.
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
class YayasanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.YayasanTableMap';

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
        $this->setName('yayasan');
        $this->setPhpName('Yayasan');
        $this->setClassname('DataDikdas\\Model\\Yayasan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('yayasan_id', 'YayasanId', 'VARCHAR', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('alamat_jalan', 'AlamatJalan', 'VARCHAR', true, 80, null);
        $this->addColumn('rt', 'Rt', 'DECIMAL', false, 131072, null);
        $this->addColumn('rw', 'Rw', 'DECIMAL', false, 131072, null);
        $this->addColumn('nama_dusun', 'NamaDusun', 'VARCHAR', false, 60, null);
        $this->addColumn('desa_kelurahan', 'DesaKelurahan', 'VARCHAR', true, 60, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('kode_pos', 'KodePos', 'CHAR', false, 5, null);
        $this->addColumn('lintang', 'Lintang', 'DECIMAL', false, 1179660, null);
        $this->addColumn('bujur', 'Bujur', 'DECIMAL', false, 1179660, null);
        $this->addColumn('nomor_telepon', 'NomorTelepon', 'VARCHAR', false, 20, null);
        $this->addColumn('nomor_fax', 'NomorFax', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 60, null);
        $this->addColumn('website', 'Website', 'VARCHAR', false, 100, null);
        $this->addColumn('npyp', 'Npyp', 'CHAR', false, 10, null);
        $this->addColumn('nama_pimpinan_yayasan', 'NamaPimpinanYayasan', 'VARCHAR', true, 100, null);
        $this->addColumn('no_pendirian_yayasan', 'NoPendirianYayasan', 'VARCHAR', false, 80, null);
        $this->addColumn('tanggal_pendirian_yayasan', 'TanggalPendirianYayasan', 'DATE', false, null, null);
        $this->addColumn('nomor_pengesahan_pn_ln', 'NomorPengesahanPnLn', 'VARCHAR', false, 30, null);
        $this->addColumn('nomor_sk_bn', 'NomorSkBn', 'VARCHAR', false, 255, null);
        $this->addColumn('tanggal_sk_bn', 'TanggalSkBn', 'DATE', false, null, null);
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
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::ONE_TO_MANY, array('yayasan_id' => 'yayasan_id', ), 'RESTRICT', 'RESTRICT', 'Sekolahs');
        $this->addRelation('VldYayasan', 'DataDikdas\\Model\\VldYayasan', RelationMap::ONE_TO_MANY, array('yayasan_id' => 'yayasan_id', ), 'RESTRICT', 'RESTRICT', 'VldYayasans');
    } // buildRelations()

} // YayasanTableMap
