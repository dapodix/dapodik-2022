<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pustaka.daftar_author' table.
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
class DaftarAuthorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.DaftarAuthorTableMap';

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
        $this->setName('pustaka.daftar_author');
        $this->setPhpName('DaftarAuthor');
        $this->setClassname('DataDikdas\\Model\\DaftarAuthor');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_biblio', 'IdBiblio', 'VARCHAR' , 'pustaka.biblio', 'id_biblio', true, null, null);
        $this->addPrimaryKey('urutan_author', 'UrutanAuthor', 'DECIMAL', true, 196608, null);
        $this->addColumn('id_author', 'IdAuthor', 'VARCHAR', true, null, null);
        $this->addColumn('peran_biblio', 'PeranBiblio', 'DECIMAL', true, 65536, 1);
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
    } // buildRelations()

} // DaftarAuthorTableMap
