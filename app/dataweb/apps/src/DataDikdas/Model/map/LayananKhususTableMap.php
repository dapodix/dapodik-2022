<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'layanan_khusus' table.
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
class LayananKhususTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.LayananKhususTableMap';

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
        $this->setName('layanan_khusus');
        $this->setPhpName('LayananKhusus');
        $this->setClassname('DataDikdas\\Model\\LayananKhusus');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_lk', 'IdLk', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_jenis_lk', 'IdJenisLk', 'CHAR', 'ref.jenis_lk', 'id_jenis_lk', true, 6, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addColumn('sk_lk', 'SkLk', 'VARCHAR', true, 80, null);
        $this->addColumn('tmt_lk', 'TmtLk', 'DATE', true, null, null);
        $this->addColumn('tst_lk', 'TstLk', 'DATE', false, null, null);
        $this->addColumn('ket_lk', 'KetLk', 'VARCHAR', false, 200, null);
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
        $this->addRelation('JenisLk', 'DataDikdas\\Model\\JenisLk', RelationMap::MANY_TO_ONE, array('id_jenis_lk' => 'id_jenis_lk', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // LayananKhususTableMap
