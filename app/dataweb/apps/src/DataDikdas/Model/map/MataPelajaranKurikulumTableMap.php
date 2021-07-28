<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.mata_pelajaran_kurikulum' table.
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
class MataPelajaranKurikulumTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.MataPelajaranKurikulumTableMap';

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
        $this->setName('ref.mata_pelajaran_kurikulum');
        $this->setPhpName('MataPelajaranKurikulum');
        $this->setClassname('DataDikdas\\Model\\MataPelajaranKurikulum');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('kurikulum_id', 'KurikulumId', 'SMALLINT' , 'ref.kurikulum', 'kurikulum_id', true, null, null);
        $this->addForeignPrimaryKey('mata_pelajaran_id', 'MataPelajaranId', 'INTEGER' , 'ref.mata_pelajaran', 'mata_pelajaran_id', true, null, null);
        $this->addForeignPrimaryKey('tingkat_pendidikan_id', 'TingkatPendidikanId', 'DECIMAL' , 'ref.tingkat_pendidikan', 'tingkat_pendidikan_id', true, 131072, null);
        $this->addColumn('jumlah_jam', 'JumlahJam', 'DECIMAL', true, 131072, null);
        $this->addColumn('jumlah_jam_maksimum', 'JumlahJamMaksimum', 'DECIMAL', true, 131072, null);
        $this->addColumn('wajib', 'Wajib', 'DECIMAL', true, 65536, null);
        $this->addColumn('sks', 'Sks', 'DECIMAL', true, 131072, 0);
        $this->addColumn('a_peminatan', 'APeminatan', 'DECIMAL', true, 65536, null);
        $this->addColumn('area_kompetensi', 'AreaKompetensi', 'CHAR', true, 1, '*');
        $this->addForeignKey('gmp_id', 'GmpId', 'VARCHAR', 'ref.group_matpel', 'gmp_id', false, null, null);
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
        $this->addRelation('GroupMatpel', 'DataDikdas\\Model\\GroupMatpel', RelationMap::MANY_TO_ONE, array('gmp_id' => 'gmp_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Kurikulum', 'DataDikdas\\Model\\Kurikulum', RelationMap::MANY_TO_ONE, array('kurikulum_id' => 'kurikulum_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaran', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TingkatPendidikan', 'DataDikdas\\Model\\TingkatPendidikan', RelationMap::MANY_TO_ONE, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // MataPelajaranKurikulumTableMap
