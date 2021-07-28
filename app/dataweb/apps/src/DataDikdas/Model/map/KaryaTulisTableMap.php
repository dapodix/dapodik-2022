<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'karya_tulis' table.
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
class KaryaTulisTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KaryaTulisTableMap';

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
        $this->setName('karya_tulis');
        $this->setPhpName('KaryaTulis');
        $this->setClassname('DataDikdas\\Model\\KaryaTulis');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('karya_tulis_id', 'KaryaTulisId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addColumn('judul', 'Judul', 'VARCHAR', true, 200, null);
        $this->addColumn('tahun_pembuatan', 'TahunPembuatan', 'DECIMAL', true, 262144, null);
        $this->addColumn('publikasi', 'Publikasi', 'VARCHAR', false, 150, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 200, null);
        $this->addColumn('url_publikasi', 'UrlPublikasi', 'VARCHAR', false, 120, null);
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
        $this->addRelation('VldKaryaTulis', 'DataDikdas\\Model\\VldKaryaTulis', RelationMap::ONE_TO_MANY, array('karya_tulis_id' => 'karya_tulis_id', ), 'RESTRICT', 'RESTRICT', 'VldKaryaTuliss');
    } // buildRelations()

} // KaryaTulisTableMap
