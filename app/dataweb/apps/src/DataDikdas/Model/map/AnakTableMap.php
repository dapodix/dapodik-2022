<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'anak' table.
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
class AnakTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AnakTableMap';

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
        $this->setName('anak');
        $this->setPhpName('Anak');
        $this->setClassname('DataDikdas\\Model\\Anak');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('anak_id', 'AnakId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('status_anak_id', 'StatusAnakId', 'DECIMAL', 'ref.status_anak', 'status_anak_id', true, 65536, null);
        $this->addForeignKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', true, 131072, null);
        $this->addColumn('nik', 'Nik', 'CHAR', false, 16, null);
        $this->addColumn('nisn', 'Nisn', 'CHAR', false, 10, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('jenis_kelamin', 'JenisKelamin', 'CHAR', true, 1, null);
        $this->addColumn('tempat_lahir', 'TempatLahir', 'VARCHAR', false, 32, null);
        $this->addColumn('tanggal_lahir', 'TanggalLahir', 'DATE', true, null, null);
        $this->addColumn('tahun_masuk', 'TahunMasuk', 'INTEGER', false, null, null);
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
        $this->addRelation('StatusAnak', 'DataDikdas\\Model\\StatusAnak', RelationMap::MANY_TO_ONE, array('status_anak_id' => 'status_anak_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenjangPendidikan', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldAnak', 'DataDikdas\\Model\\VldAnak', RelationMap::ONE_TO_MANY, array('anak_id' => 'anak_id', ), 'RESTRICT', 'RESTRICT', 'VldAnaks');
    } // buildRelations()

} // AnakTableMap
