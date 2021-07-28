<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'kitas_pd' table.
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
class KitasPdTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KitasPdTableMap';

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
        $this->setName('kitas_pd');
        $this->setPhpName('KitasPd');
        $this->setClassname('DataDikdas\\Model\\KitasPd');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('no_kitas', 'NoKitas', 'VARCHAR', true, 20, null);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', true, null, null);
        $this->addColumn('tmt_kitas', 'TmtKitas', 'DATE', true, null, null);
        $this->addColumn('tst_kitas', 'TstKitas', 'DATE', true, null, null);
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
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::MANY_TO_ONE, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // KitasPdTableMap
