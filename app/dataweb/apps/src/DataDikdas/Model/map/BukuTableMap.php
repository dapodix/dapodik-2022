<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'buku' table.
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
class BukuTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BukuTableMap';

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
        $this->setName('buku');
        $this->setPhpName('Buku');
        $this->setClassname('DataDikdas\\Model\\Buku');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_buku', 'IdBuku', 'VARCHAR', true, null, null);
        $this->addForeignKey('mata_pelajaran_id', 'MataPelajaranId', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', true, null, null);
        $this->addForeignKey('id_ruang', 'IdRuang', 'VARCHAR', 'ruang', 'id_ruang', false, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('id_biblio', 'IdBiblio', 'VARCHAR', 'pustaka.biblio', 'id_biblio', false, null, null);
        $this->addForeignKey('tingkat_pendidikan_id', 'TingkatPendidikanId', 'DECIMAL', 'ref.tingkat_pendidikan', 'tingkat_pendidikan_id', false, 131072, null);
        $this->addColumn('nm_buku', 'NmBuku', 'VARCHAR', true, 256, null);
        $this->addForeignKey('id_hapus_buku', 'IdHapusBuku', 'CHAR', 'ref.jenis_hapus_buku', 'id_hapus_buku', false, 1, null);
        $this->addColumn('tgl_hapus_buku', 'TglHapusBuku', 'DATE', false, null, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
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
        $this->addRelation('MataPelajaran', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Biblio', 'DataDikdas\\Model\\Biblio', RelationMap::MANY_TO_ONE, array('id_biblio' => 'id_biblio', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TingkatPendidikan', 'DataDikdas\\Model\\TingkatPendidikan', RelationMap::MANY_TO_ONE, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisHapusBuku', 'DataDikdas\\Model\\JenisHapusBuku', RelationMap::MANY_TO_ONE, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::MANY_TO_ONE, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BukuLongitudinal', 'DataDikdas\\Model\\BukuLongitudinal', RelationMap::ONE_TO_MANY, array('id_buku' => 'id_buku', ), 'RESTRICT', 'RESTRICT', 'BukuLongitudinals');
    } // buildRelations()

} // BukuTableMap
