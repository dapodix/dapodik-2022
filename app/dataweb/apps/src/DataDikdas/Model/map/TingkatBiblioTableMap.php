<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pustaka.tingkat_biblio' table.
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
class TingkatBiblioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TingkatBiblioTableMap';

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
        $this->setName('pustaka.tingkat_biblio');
        $this->setPhpName('TingkatBiblio');
        $this->setClassname('DataDikdas\\Model\\TingkatBiblio');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_biblio', 'IdBiblio', 'VARCHAR' , 'pustaka.biblio', 'id_biblio', true, null, null);
        $this->addForeignPrimaryKey('tingkat_pendidikan_id', 'TingkatPendidikanId', 'DECIMAL' , 'ref.tingkat_pendidikan', 'tingkat_pendidikan_id', true, 131072, null);
        $this->addPrimaryKey('bentuk_pendidikan_id', 'BentukPendidikanId', 'SMALLINT', true, null, null);
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
        $this->addRelation('Biblio', 'DataDikdas\\Model\\Biblio', RelationMap::MANY_TO_ONE, array('id_biblio' => 'id_biblio', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TingkatPendidikan', 'DataDikdas\\Model\\TingkatPendidikan', RelationMap::MANY_TO_ONE, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // TingkatBiblioTableMap
