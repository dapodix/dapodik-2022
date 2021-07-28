<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\JadwalPeer;
use DataDikdas\Model\JadwalQuery;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\SekolahLongitudinal;

/**
 * Base class that represents a query for the 'jadwal' table.
 *
 * 
 *
 * @method JadwalQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method JadwalQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method JadwalQuery orderByIdRuang($order = Criteria::ASC) Order by the id_ruang column
 * @method JadwalQuery orderByHari($order = Criteria::ASC) Order by the hari column
 * @method JadwalQuery orderByBelKe01($order = Criteria::ASC) Order by the bel_ke_01 column
 * @method JadwalQuery orderByBelKe02($order = Criteria::ASC) Order by the bel_ke_02 column
 * @method JadwalQuery orderByBelKe03($order = Criteria::ASC) Order by the bel_ke_03 column
 * @method JadwalQuery orderByBelKe04($order = Criteria::ASC) Order by the bel_ke_04 column
 * @method JadwalQuery orderByBelKe05($order = Criteria::ASC) Order by the bel_ke_05 column
 * @method JadwalQuery orderByBelKe06($order = Criteria::ASC) Order by the bel_ke_06 column
 * @method JadwalQuery orderByBelKe07($order = Criteria::ASC) Order by the bel_ke_07 column
 * @method JadwalQuery orderByBelKe08($order = Criteria::ASC) Order by the bel_ke_08 column
 * @method JadwalQuery orderByBelKe09($order = Criteria::ASC) Order by the bel_ke_09 column
 * @method JadwalQuery orderByBelKe10($order = Criteria::ASC) Order by the bel_ke_10 column
 * @method JadwalQuery orderByBelKe11($order = Criteria::ASC) Order by the bel_ke_11 column
 * @method JadwalQuery orderByBelKe12($order = Criteria::ASC) Order by the bel_ke_12 column
 * @method JadwalQuery orderByBelKe13($order = Criteria::ASC) Order by the bel_ke_13 column
 * @method JadwalQuery orderByBelKe14($order = Criteria::ASC) Order by the bel_ke_14 column
 * @method JadwalQuery orderByBelKe15($order = Criteria::ASC) Order by the bel_ke_15 column
 * @method JadwalQuery orderByBelKe16($order = Criteria::ASC) Order by the bel_ke_16 column
 * @method JadwalQuery orderByBelKe17($order = Criteria::ASC) Order by the bel_ke_17 column
 * @method JadwalQuery orderByBelKe18($order = Criteria::ASC) Order by the bel_ke_18 column
 * @method JadwalQuery orderByBelKe19($order = Criteria::ASC) Order by the bel_ke_19 column
 * @method JadwalQuery orderByBelKe20($order = Criteria::ASC) Order by the bel_ke_20 column
 * @method JadwalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JadwalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JadwalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method JadwalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method JadwalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method JadwalQuery groupBySekolahId() Group by the sekolah_id column
 * @method JadwalQuery groupBySemesterId() Group by the semester_id column
 * @method JadwalQuery groupByIdRuang() Group by the id_ruang column
 * @method JadwalQuery groupByHari() Group by the hari column
 * @method JadwalQuery groupByBelKe01() Group by the bel_ke_01 column
 * @method JadwalQuery groupByBelKe02() Group by the bel_ke_02 column
 * @method JadwalQuery groupByBelKe03() Group by the bel_ke_03 column
 * @method JadwalQuery groupByBelKe04() Group by the bel_ke_04 column
 * @method JadwalQuery groupByBelKe05() Group by the bel_ke_05 column
 * @method JadwalQuery groupByBelKe06() Group by the bel_ke_06 column
 * @method JadwalQuery groupByBelKe07() Group by the bel_ke_07 column
 * @method JadwalQuery groupByBelKe08() Group by the bel_ke_08 column
 * @method JadwalQuery groupByBelKe09() Group by the bel_ke_09 column
 * @method JadwalQuery groupByBelKe10() Group by the bel_ke_10 column
 * @method JadwalQuery groupByBelKe11() Group by the bel_ke_11 column
 * @method JadwalQuery groupByBelKe12() Group by the bel_ke_12 column
 * @method JadwalQuery groupByBelKe13() Group by the bel_ke_13 column
 * @method JadwalQuery groupByBelKe14() Group by the bel_ke_14 column
 * @method JadwalQuery groupByBelKe15() Group by the bel_ke_15 column
 * @method JadwalQuery groupByBelKe16() Group by the bel_ke_16 column
 * @method JadwalQuery groupByBelKe17() Group by the bel_ke_17 column
 * @method JadwalQuery groupByBelKe18() Group by the bel_ke_18 column
 * @method JadwalQuery groupByBelKe19() Group by the bel_ke_19 column
 * @method JadwalQuery groupByBelKe20() Group by the bel_ke_20 column
 * @method JadwalQuery groupByCreateDate() Group by the create_date column
 * @method JadwalQuery groupByLastUpdate() Group by the last_update column
 * @method JadwalQuery groupBySoftDelete() Group by the soft_delete column
 * @method JadwalQuery groupByLastSync() Group by the last_sync column
 * @method JadwalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method JadwalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JadwalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JadwalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JadwalQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method JadwalQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method JadwalQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method JadwalQuery leftJoinSekolahLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahLongitudinal relation
 * @method JadwalQuery rightJoinSekolahLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahLongitudinal relation
 * @method JadwalQuery innerJoinSekolahLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahLongitudinal relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe01($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe01 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe01($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe01 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe01($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe01 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe02($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe02 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe02($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe02 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe02($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe02 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe03($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe03 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe03($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe03 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe03($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe03 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe04($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe04 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe04($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe04 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe04($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe04 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe05($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe05 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe05($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe05 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe05($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe05 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe06($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe06 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe06($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe06 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe06($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe06 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe07($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe07 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe07($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe07 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe07($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe07 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe08($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe08 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe08($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe08 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe08($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe08 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe09($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe09 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe09($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe09 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe09($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe09 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe10($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe10 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe10($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe10 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe10($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe10 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe11($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe11 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe11($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe11 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe11($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe11 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe12($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe12 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe12($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe12 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe12($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe12 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe13($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe13 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe13($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe13 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe13($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe13 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe14($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe14 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe14($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe14 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe14($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe14 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe15($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe15 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe15($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe15 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe15($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe15 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe16($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe16 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe16($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe16 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe16($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe16 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe17($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe17 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe17($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe17 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe17($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe17 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe18($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe18 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe18($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe18 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe18($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe18 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe19($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe19 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe19($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe19 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe19($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe19 relation
 *
 * @method JadwalQuery leftJoinPembelajaranRelatedByBelKe20($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByBelKe20 relation
 * @method JadwalQuery rightJoinPembelajaranRelatedByBelKe20($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByBelKe20 relation
 * @method JadwalQuery innerJoinPembelajaranRelatedByBelKe20($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByBelKe20 relation
 *
 * @method Jadwal findOne(PropelPDO $con = null) Return the first Jadwal matching the query
 * @method Jadwal findOneOrCreate(PropelPDO $con = null) Return the first Jadwal matching the query, or a new Jadwal object populated from the query conditions when no match is found
 *
 * @method Jadwal findOneBySekolahId(string $sekolah_id) Return the first Jadwal filtered by the sekolah_id column
 * @method Jadwal findOneBySemesterId(string $semester_id) Return the first Jadwal filtered by the semester_id column
 * @method Jadwal findOneByIdRuang(string $id_ruang) Return the first Jadwal filtered by the id_ruang column
 * @method Jadwal findOneByHari(string $hari) Return the first Jadwal filtered by the hari column
 * @method Jadwal findOneByBelKe01(string $bel_ke_01) Return the first Jadwal filtered by the bel_ke_01 column
 * @method Jadwal findOneByBelKe02(string $bel_ke_02) Return the first Jadwal filtered by the bel_ke_02 column
 * @method Jadwal findOneByBelKe03(string $bel_ke_03) Return the first Jadwal filtered by the bel_ke_03 column
 * @method Jadwal findOneByBelKe04(string $bel_ke_04) Return the first Jadwal filtered by the bel_ke_04 column
 * @method Jadwal findOneByBelKe05(string $bel_ke_05) Return the first Jadwal filtered by the bel_ke_05 column
 * @method Jadwal findOneByBelKe06(string $bel_ke_06) Return the first Jadwal filtered by the bel_ke_06 column
 * @method Jadwal findOneByBelKe07(string $bel_ke_07) Return the first Jadwal filtered by the bel_ke_07 column
 * @method Jadwal findOneByBelKe08(string $bel_ke_08) Return the first Jadwal filtered by the bel_ke_08 column
 * @method Jadwal findOneByBelKe09(string $bel_ke_09) Return the first Jadwal filtered by the bel_ke_09 column
 * @method Jadwal findOneByBelKe10(string $bel_ke_10) Return the first Jadwal filtered by the bel_ke_10 column
 * @method Jadwal findOneByBelKe11(string $bel_ke_11) Return the first Jadwal filtered by the bel_ke_11 column
 * @method Jadwal findOneByBelKe12(string $bel_ke_12) Return the first Jadwal filtered by the bel_ke_12 column
 * @method Jadwal findOneByBelKe13(string $bel_ke_13) Return the first Jadwal filtered by the bel_ke_13 column
 * @method Jadwal findOneByBelKe14(string $bel_ke_14) Return the first Jadwal filtered by the bel_ke_14 column
 * @method Jadwal findOneByBelKe15(string $bel_ke_15) Return the first Jadwal filtered by the bel_ke_15 column
 * @method Jadwal findOneByBelKe16(string $bel_ke_16) Return the first Jadwal filtered by the bel_ke_16 column
 * @method Jadwal findOneByBelKe17(string $bel_ke_17) Return the first Jadwal filtered by the bel_ke_17 column
 * @method Jadwal findOneByBelKe18(string $bel_ke_18) Return the first Jadwal filtered by the bel_ke_18 column
 * @method Jadwal findOneByBelKe19(string $bel_ke_19) Return the first Jadwal filtered by the bel_ke_19 column
 * @method Jadwal findOneByBelKe20(string $bel_ke_20) Return the first Jadwal filtered by the bel_ke_20 column
 * @method Jadwal findOneByCreateDate(string $create_date) Return the first Jadwal filtered by the create_date column
 * @method Jadwal findOneByLastUpdate(string $last_update) Return the first Jadwal filtered by the last_update column
 * @method Jadwal findOneBySoftDelete(string $soft_delete) Return the first Jadwal filtered by the soft_delete column
 * @method Jadwal findOneByLastSync(string $last_sync) Return the first Jadwal filtered by the last_sync column
 * @method Jadwal findOneByUpdaterId(string $updater_id) Return the first Jadwal filtered by the updater_id column
 *
 * @method array findBySekolahId(string $sekolah_id) Return Jadwal objects filtered by the sekolah_id column
 * @method array findBySemesterId(string $semester_id) Return Jadwal objects filtered by the semester_id column
 * @method array findByIdRuang(string $id_ruang) Return Jadwal objects filtered by the id_ruang column
 * @method array findByHari(string $hari) Return Jadwal objects filtered by the hari column
 * @method array findByBelKe01(string $bel_ke_01) Return Jadwal objects filtered by the bel_ke_01 column
 * @method array findByBelKe02(string $bel_ke_02) Return Jadwal objects filtered by the bel_ke_02 column
 * @method array findByBelKe03(string $bel_ke_03) Return Jadwal objects filtered by the bel_ke_03 column
 * @method array findByBelKe04(string $bel_ke_04) Return Jadwal objects filtered by the bel_ke_04 column
 * @method array findByBelKe05(string $bel_ke_05) Return Jadwal objects filtered by the bel_ke_05 column
 * @method array findByBelKe06(string $bel_ke_06) Return Jadwal objects filtered by the bel_ke_06 column
 * @method array findByBelKe07(string $bel_ke_07) Return Jadwal objects filtered by the bel_ke_07 column
 * @method array findByBelKe08(string $bel_ke_08) Return Jadwal objects filtered by the bel_ke_08 column
 * @method array findByBelKe09(string $bel_ke_09) Return Jadwal objects filtered by the bel_ke_09 column
 * @method array findByBelKe10(string $bel_ke_10) Return Jadwal objects filtered by the bel_ke_10 column
 * @method array findByBelKe11(string $bel_ke_11) Return Jadwal objects filtered by the bel_ke_11 column
 * @method array findByBelKe12(string $bel_ke_12) Return Jadwal objects filtered by the bel_ke_12 column
 * @method array findByBelKe13(string $bel_ke_13) Return Jadwal objects filtered by the bel_ke_13 column
 * @method array findByBelKe14(string $bel_ke_14) Return Jadwal objects filtered by the bel_ke_14 column
 * @method array findByBelKe15(string $bel_ke_15) Return Jadwal objects filtered by the bel_ke_15 column
 * @method array findByBelKe16(string $bel_ke_16) Return Jadwal objects filtered by the bel_ke_16 column
 * @method array findByBelKe17(string $bel_ke_17) Return Jadwal objects filtered by the bel_ke_17 column
 * @method array findByBelKe18(string $bel_ke_18) Return Jadwal objects filtered by the bel_ke_18 column
 * @method array findByBelKe19(string $bel_ke_19) Return Jadwal objects filtered by the bel_ke_19 column
 * @method array findByBelKe20(string $bel_ke_20) Return Jadwal objects filtered by the bel_ke_20 column
 * @method array findByCreateDate(string $create_date) Return Jadwal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Jadwal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Jadwal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Jadwal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Jadwal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJadwalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJadwalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Jadwal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JadwalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JadwalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JadwalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JadwalQuery) {
            return $criteria;
        }
        $query = new JadwalQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34, 56, 78), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$sekolah_id, $semester_id, $id_ruang, $hari]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Jadwal|Jadwal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JadwalPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2], (string) $key[3]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Jadwal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sekolah_id", "semester_id", "id_ruang", "hari", "bel_ke_01", "bel_ke_02", "bel_ke_03", "bel_ke_04", "bel_ke_05", "bel_ke_06", "bel_ke_07", "bel_ke_08", "bel_ke_09", "bel_ke_10", "bel_ke_11", "bel_ke_12", "bel_ke_13", "bel_ke_14", "bel_ke_15", "bel_ke_16", "bel_ke_17", "bel_ke_18", "bel_ke_19", "bel_ke_20", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "jadwal" WHERE "sekolah_id" = :p0 AND "semester_id" = :p1 AND "id_ruang" = :p2 AND "hari" = :p3';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);			
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);			
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Jadwal();
            $obj->hydrate($row);
            JadwalPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2], (string) $key[3])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Jadwal|Jadwal[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Jadwal[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(JadwalPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(JadwalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(JadwalPeer::ID_RUANG, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(JadwalPeer::HARI, $key[3], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(JadwalPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(JadwalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(JadwalPeer::ID_RUANG, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(JadwalPeer::HARI, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the id_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRuang('fooValue');   // WHERE id_ruang = 'fooValue'
     * $query->filterByIdRuang('%fooValue%'); // WHERE id_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByIdRuang($idRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idRuang)) {
                $idRuang = str_replace('*', '%', $idRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::ID_RUANG, $idRuang, $comparison);
    }

    /**
     * Filter the query on the hari column
     *
     * Example usage:
     * <code>
     * $query->filterByHari(1234); // WHERE hari = 1234
     * $query->filterByHari(array(12, 34)); // WHERE hari IN (12, 34)
     * $query->filterByHari(array('min' => 12)); // WHERE hari >= 12
     * $query->filterByHari(array('max' => 12)); // WHERE hari <= 12
     * </code>
     *
     * @param     mixed $hari The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByHari($hari = null, $comparison = null)
    {
        if (is_array($hari)) {
            $useMinMax = false;
            if (isset($hari['min'])) {
                $this->addUsingAlias(JadwalPeer::HARI, $hari['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hari['max'])) {
                $this->addUsingAlias(JadwalPeer::HARI, $hari['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPeer::HARI, $hari, $comparison);
    }

    /**
     * Filter the query on the bel_ke_01 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe01('fooValue');   // WHERE bel_ke_01 = 'fooValue'
     * $query->filterByBelKe01('%fooValue%'); // WHERE bel_ke_01 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe01 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe01($belKe01 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe01)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe01)) {
                $belKe01 = str_replace('*', '%', $belKe01);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_01, $belKe01, $comparison);
    }

    /**
     * Filter the query on the bel_ke_02 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe02('fooValue');   // WHERE bel_ke_02 = 'fooValue'
     * $query->filterByBelKe02('%fooValue%'); // WHERE bel_ke_02 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe02 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe02($belKe02 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe02)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe02)) {
                $belKe02 = str_replace('*', '%', $belKe02);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_02, $belKe02, $comparison);
    }

    /**
     * Filter the query on the bel_ke_03 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe03('fooValue');   // WHERE bel_ke_03 = 'fooValue'
     * $query->filterByBelKe03('%fooValue%'); // WHERE bel_ke_03 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe03 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe03($belKe03 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe03)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe03)) {
                $belKe03 = str_replace('*', '%', $belKe03);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_03, $belKe03, $comparison);
    }

    /**
     * Filter the query on the bel_ke_04 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe04('fooValue');   // WHERE bel_ke_04 = 'fooValue'
     * $query->filterByBelKe04('%fooValue%'); // WHERE bel_ke_04 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe04 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe04($belKe04 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe04)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe04)) {
                $belKe04 = str_replace('*', '%', $belKe04);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_04, $belKe04, $comparison);
    }

    /**
     * Filter the query on the bel_ke_05 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe05('fooValue');   // WHERE bel_ke_05 = 'fooValue'
     * $query->filterByBelKe05('%fooValue%'); // WHERE bel_ke_05 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe05 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe05($belKe05 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe05)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe05)) {
                $belKe05 = str_replace('*', '%', $belKe05);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_05, $belKe05, $comparison);
    }

    /**
     * Filter the query on the bel_ke_06 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe06('fooValue');   // WHERE bel_ke_06 = 'fooValue'
     * $query->filterByBelKe06('%fooValue%'); // WHERE bel_ke_06 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe06 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe06($belKe06 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe06)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe06)) {
                $belKe06 = str_replace('*', '%', $belKe06);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_06, $belKe06, $comparison);
    }

    /**
     * Filter the query on the bel_ke_07 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe07('fooValue');   // WHERE bel_ke_07 = 'fooValue'
     * $query->filterByBelKe07('%fooValue%'); // WHERE bel_ke_07 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe07 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe07($belKe07 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe07)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe07)) {
                $belKe07 = str_replace('*', '%', $belKe07);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_07, $belKe07, $comparison);
    }

    /**
     * Filter the query on the bel_ke_08 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe08('fooValue');   // WHERE bel_ke_08 = 'fooValue'
     * $query->filterByBelKe08('%fooValue%'); // WHERE bel_ke_08 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe08 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe08($belKe08 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe08)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe08)) {
                $belKe08 = str_replace('*', '%', $belKe08);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_08, $belKe08, $comparison);
    }

    /**
     * Filter the query on the bel_ke_09 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe09('fooValue');   // WHERE bel_ke_09 = 'fooValue'
     * $query->filterByBelKe09('%fooValue%'); // WHERE bel_ke_09 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe09 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe09($belKe09 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe09)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe09)) {
                $belKe09 = str_replace('*', '%', $belKe09);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_09, $belKe09, $comparison);
    }

    /**
     * Filter the query on the bel_ke_10 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe10('fooValue');   // WHERE bel_ke_10 = 'fooValue'
     * $query->filterByBelKe10('%fooValue%'); // WHERE bel_ke_10 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe10 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe10($belKe10 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe10)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe10)) {
                $belKe10 = str_replace('*', '%', $belKe10);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_10, $belKe10, $comparison);
    }

    /**
     * Filter the query on the bel_ke_11 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe11('fooValue');   // WHERE bel_ke_11 = 'fooValue'
     * $query->filterByBelKe11('%fooValue%'); // WHERE bel_ke_11 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe11 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe11($belKe11 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe11)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe11)) {
                $belKe11 = str_replace('*', '%', $belKe11);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_11, $belKe11, $comparison);
    }

    /**
     * Filter the query on the bel_ke_12 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe12('fooValue');   // WHERE bel_ke_12 = 'fooValue'
     * $query->filterByBelKe12('%fooValue%'); // WHERE bel_ke_12 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe12 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe12($belKe12 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe12)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe12)) {
                $belKe12 = str_replace('*', '%', $belKe12);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_12, $belKe12, $comparison);
    }

    /**
     * Filter the query on the bel_ke_13 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe13('fooValue');   // WHERE bel_ke_13 = 'fooValue'
     * $query->filterByBelKe13('%fooValue%'); // WHERE bel_ke_13 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe13 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe13($belKe13 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe13)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe13)) {
                $belKe13 = str_replace('*', '%', $belKe13);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_13, $belKe13, $comparison);
    }

    /**
     * Filter the query on the bel_ke_14 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe14('fooValue');   // WHERE bel_ke_14 = 'fooValue'
     * $query->filterByBelKe14('%fooValue%'); // WHERE bel_ke_14 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe14 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe14($belKe14 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe14)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe14)) {
                $belKe14 = str_replace('*', '%', $belKe14);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_14, $belKe14, $comparison);
    }

    /**
     * Filter the query on the bel_ke_15 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe15('fooValue');   // WHERE bel_ke_15 = 'fooValue'
     * $query->filterByBelKe15('%fooValue%'); // WHERE bel_ke_15 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe15 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe15($belKe15 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe15)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe15)) {
                $belKe15 = str_replace('*', '%', $belKe15);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_15, $belKe15, $comparison);
    }

    /**
     * Filter the query on the bel_ke_16 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe16('fooValue');   // WHERE bel_ke_16 = 'fooValue'
     * $query->filterByBelKe16('%fooValue%'); // WHERE bel_ke_16 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe16 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe16($belKe16 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe16)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe16)) {
                $belKe16 = str_replace('*', '%', $belKe16);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_16, $belKe16, $comparison);
    }

    /**
     * Filter the query on the bel_ke_17 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe17('fooValue');   // WHERE bel_ke_17 = 'fooValue'
     * $query->filterByBelKe17('%fooValue%'); // WHERE bel_ke_17 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe17 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe17($belKe17 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe17)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe17)) {
                $belKe17 = str_replace('*', '%', $belKe17);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_17, $belKe17, $comparison);
    }

    /**
     * Filter the query on the bel_ke_18 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe18('fooValue');   // WHERE bel_ke_18 = 'fooValue'
     * $query->filterByBelKe18('%fooValue%'); // WHERE bel_ke_18 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe18 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe18($belKe18 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe18)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe18)) {
                $belKe18 = str_replace('*', '%', $belKe18);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_18, $belKe18, $comparison);
    }

    /**
     * Filter the query on the bel_ke_19 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe19('fooValue');   // WHERE bel_ke_19 = 'fooValue'
     * $query->filterByBelKe19('%fooValue%'); // WHERE bel_ke_19 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe19 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe19($belKe19 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe19)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe19)) {
                $belKe19 = str_replace('*', '%', $belKe19);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_19, $belKe19, $comparison);
    }

    /**
     * Filter the query on the bel_ke_20 column
     *
     * Example usage:
     * <code>
     * $query->filterByBelKe20('fooValue');   // WHERE bel_ke_20 = 'fooValue'
     * $query->filterByBelKe20('%fooValue%'); // WHERE bel_ke_20 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $belKe20 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByBelKe20($belKe20 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($belKe20)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $belKe20)) {
                $belKe20 = str_replace('*', '%', $belKe20);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::BEL_KE_20, $belKe20, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('2011-03-14'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate('now'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate(array('max' => 'yesterday')); // WHERE create_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JadwalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JadwalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPeer::CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the last_update column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdate('2011-03-14'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate('now'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate(array('max' => 'yesterday')); // WHERE last_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JadwalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JadwalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete >= 12
     * $query->filterBySoftDelete(array('max' => 12)); // WHERE soft_delete <= 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(JadwalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(JadwalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPeer::SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query on the last_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSync('2011-03-14'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync('now'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync(array('max' => 'yesterday')); // WHERE last_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JadwalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JadwalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%'); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updaterId)) {
                $updaterId = str_replace('*', '%', $updaterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JadwalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(JadwalPeer::ID_RUANG, $ruang->getIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::ID_RUANG, $ruang->toKeyValue('PrimaryKey', 'IdRuang'), $comparison);
        } else {
            throw new PropelException('filterByRuang() only accepts arguments of type Ruang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ruang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinRuang($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ruang');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Ruang');
        }

        return $this;
    }

    /**
     * Use the Ruang relation Ruang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangQuery A secondary query class using the current class as primary query
     */
    public function useRuangQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ruang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related SekolahLongitudinal object
     *
     * @param   SekolahLongitudinal $sekolahLongitudinal The related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahLongitudinal($sekolahLongitudinal, $comparison = null)
    {
        if ($sekolahLongitudinal instanceof SekolahLongitudinal) {
            return $this
                ->addUsingAlias(JadwalPeer::SEKOLAH_ID, $sekolahLongitudinal->getSekolahId(), $comparison)
                ->addUsingAlias(JadwalPeer::SEMESTER_ID, $sekolahLongitudinal->getSemesterId(), $comparison);
        } else {
            throw new PropelException('filterBySekolahLongitudinal() only accepts arguments of type SekolahLongitudinal');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinSekolahLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahLongitudinal');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SekolahLongitudinal');
        }

        return $this;
    }

    /**
     * Use the SekolahLongitudinal relation SekolahLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useSekolahLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahLongitudinal', '\DataDikdas\Model\SekolahLongitudinalQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe01($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_01, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_01, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe01() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe01 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe01($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe01');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe01');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe01 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe01Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe01($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe01', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe02($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_02, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_02, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe02() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe02 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe02($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe02');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe02');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe02 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe02Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe02($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe02', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe03($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_03, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_03, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe03() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe03 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe03($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe03');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe03');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe03 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe03Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe03($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe03', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe04($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_04, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_04, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe04() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe04 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe04($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe04');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe04');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe04 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe04Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe04($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe04', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe05($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_05, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_05, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe05() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe05 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe05($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe05');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe05');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe05 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe05Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe05($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe05', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe06($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_06, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_06, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe06() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe06 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe06($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe06');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe06');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe06 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe06Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe06($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe06', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe07($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_07, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_07, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe07() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe07 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe07($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe07');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe07');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe07 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe07Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe07($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe07', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe08($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_08, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_08, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe08() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe08 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe08($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe08');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe08');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe08 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe08Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe08($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe08', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe09($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_09, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_09, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe09() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe09 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe09($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe09');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe09');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe09 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe09Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe09($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe09', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe10($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_10, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_10, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe10() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe10 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe10($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe10');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe10');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe10 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe10Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe10($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe10', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe11($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_11, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_11, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe11() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe11 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe11($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe11');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe11');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe11 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe11Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe11($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe11', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe12($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_12, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_12, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe12() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe12 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe12($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe12');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe12');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe12 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe12Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe12($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe12', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe13($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_13, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_13, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe13() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe13 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe13($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe13');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe13');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe13 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe13Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe13($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe13', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe14($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_14, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_14, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe14() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe14 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe14($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe14');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe14');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe14 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe14Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe14($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe14', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe15($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_15, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_15, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe15() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe15 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe15($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe15');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe15');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe15 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe15Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe15($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe15', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe16($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_16, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_16, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe16() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe16 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe16($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe16');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe16');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe16 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe16Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe16($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe16', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe17($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_17, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_17, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe17() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe17 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe17($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe17');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe17');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe17 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe17Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe17($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe17', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe18($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_18, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_18, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe18() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe18 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe18($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe18');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe18');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe18 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe18Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe18($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe18', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe19($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_19, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_19, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe19() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe19 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe19($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe19');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe19');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe19 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe19Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe19($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe19', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByBelKe20($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_20, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JadwalPeer::BEL_KE_20, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByBelKe20() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByBelKe20 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByBelKe20($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByBelKe20');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PembelajaranRelatedByBelKe20');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByBelKe20 relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByBelKe20Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByBelKe20($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByBelKe20', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Jadwal $jadwal Object to remove from the list of results
     *
     * @return JadwalQuery The current query, for fluid interface
     */
    public function prune($jadwal = null)
    {
        if ($jadwal) {
            $this->addCond('pruneCond0', $this->getAliasedColName(JadwalPeer::SEKOLAH_ID), $jadwal->getSekolahId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(JadwalPeer::SEMESTER_ID), $jadwal->getSemesterId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(JadwalPeer::ID_RUANG), $jadwal->getIdRuang(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(JadwalPeer::HARI), $jadwal->getHari(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
