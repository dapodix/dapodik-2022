<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ptk_baru' table.
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
class PtkBaruTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PtkBaruTableMap';

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
        $this->setName('ptk_baru');
        $this->setPhpName('PtkBaru');
        $this->setClassname('DataDikdas\\Model\\PtkBaru');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ptk_baru_id', 'PtkBaruId', 'VARCHAR', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addColumn('nama_ptk', 'NamaPtk', 'VARCHAR', true, 100, null);
        $this->addColumn('jenis_kelamin', 'JenisKelamin', 'CHAR', true, 1, null);
        $this->addColumn('nuptk', 'Nuptk', 'CHAR', false, 16, null);
        $this->addColumn('nik', 'Nik', 'CHAR', true, 16, null);
        $this->addColumn('tempat_lahir', 'TempatLahir', 'VARCHAR', true, 32, null);
        $this->addColumn('tanggal_lahir', 'TanggalLahir', 'DATE', true, null, null);
        $this->addColumn('nama_ibu_kandung', 'NamaIbuKandung', 'VARCHAR', true, 100, null);
        $this->addColumn('sudah_diproses', 'SudahDiproses', 'DECIMAL', true, 65536, 0);
        $this->addColumn('berhasil_diproses', 'BerhasilDiproses', 'DECIMAL', true, 65536, 0);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', false, null, null);
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaran', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // PtkBaruTableMap
