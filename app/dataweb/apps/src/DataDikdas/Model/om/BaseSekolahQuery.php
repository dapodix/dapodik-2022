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
use DataDikdas\Model\AkreditasiSp;
use DataDikdas\Model\Alat;
use DataDikdas\Model\AnggotaGugus;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BentukPendidikan;
use DataDikdas\Model\Blockgrant;
use DataDikdas\Model\Buku;
use DataDikdas\Model\DataDynamic;
use DataDikdas\Model\GugusSekolah;
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\IzinOperasional;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\Kepanitiaan;
use DataDikdas\Model\LayananKhusus;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\ProgramInklusi;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SasaranPengawasan;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahPaud;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\StatusKepemilikan;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\UnitUsaha;
use DataDikdas\Model\VldSekolah;
use DataDikdas\Model\Yayasan;

/**
 * Base class that represents a query for the 'sekolah' table.
 *
 * 
 *
 * @method SekolahQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method SekolahQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method SekolahQuery orderByNamaNomenklatur($order = Criteria::ASC) Order by the nama_nomenklatur column
 * @method SekolahQuery orderByNss($order = Criteria::ASC) Order by the nss column
 * @method SekolahQuery orderByNpsn($order = Criteria::ASC) Order by the npsn column
 * @method SekolahQuery orderByBentukPendidikanId($order = Criteria::ASC) Order by the bentuk_pendidikan_id column
 * @method SekolahQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method SekolahQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method SekolahQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method SekolahQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method SekolahQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method SekolahQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method SekolahQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method SekolahQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method SekolahQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method SekolahQuery orderByNomorTelepon($order = Criteria::ASC) Order by the nomor_telepon column
 * @method SekolahQuery orderByNomorFax($order = Criteria::ASC) Order by the nomor_fax column
 * @method SekolahQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method SekolahQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method SekolahQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method SekolahQuery orderByStatusSekolah($order = Criteria::ASC) Order by the status_sekolah column
 * @method SekolahQuery orderBySkPendirianSekolah($order = Criteria::ASC) Order by the sk_pendirian_sekolah column
 * @method SekolahQuery orderByTanggalSkPendirian($order = Criteria::ASC) Order by the tanggal_sk_pendirian column
 * @method SekolahQuery orderByStatusKepemilikanId($order = Criteria::ASC) Order by the status_kepemilikan_id column
 * @method SekolahQuery orderByYayasanId($order = Criteria::ASC) Order by the yayasan_id column
 * @method SekolahQuery orderBySkIzinOperasional($order = Criteria::ASC) Order by the sk_izin_operasional column
 * @method SekolahQuery orderByTanggalSkIzinOperasional($order = Criteria::ASC) Order by the tanggal_sk_izin_operasional column
 * @method SekolahQuery orderByNoRekening($order = Criteria::ASC) Order by the no_rekening column
 * @method SekolahQuery orderByNamaBank($order = Criteria::ASC) Order by the nama_bank column
 * @method SekolahQuery orderByCabangKcpUnit($order = Criteria::ASC) Order by the cabang_kcp_unit column
 * @method SekolahQuery orderByRekeningAtasNama($order = Criteria::ASC) Order by the rekening_atas_nama column
 * @method SekolahQuery orderByMbs($order = Criteria::ASC) Order by the mbs column
 * @method SekolahQuery orderByLuasTanahMilik($order = Criteria::ASC) Order by the luas_tanah_milik column
 * @method SekolahQuery orderByLuasTanahBukanMilik($order = Criteria::ASC) Order by the luas_tanah_bukan_milik column
 * @method SekolahQuery orderByKodeRegistrasi($order = Criteria::ASC) Order by the kode_registrasi column
 * @method SekolahQuery orderByNpwp($order = Criteria::ASC) Order by the npwp column
 * @method SekolahQuery orderByNmWp($order = Criteria::ASC) Order by the nm_wp column
 * @method SekolahQuery orderByKeaktifan($order = Criteria::ASC) Order by the keaktifan column
 * @method SekolahQuery orderByFlag($order = Criteria::ASC) Order by the flag column
 * @method SekolahQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SekolahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SekolahQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method SekolahQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method SekolahQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method SekolahQuery groupBySekolahId() Group by the sekolah_id column
 * @method SekolahQuery groupByNama() Group by the nama column
 * @method SekolahQuery groupByNamaNomenklatur() Group by the nama_nomenklatur column
 * @method SekolahQuery groupByNss() Group by the nss column
 * @method SekolahQuery groupByNpsn() Group by the npsn column
 * @method SekolahQuery groupByBentukPendidikanId() Group by the bentuk_pendidikan_id column
 * @method SekolahQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method SekolahQuery groupByRt() Group by the rt column
 * @method SekolahQuery groupByRw() Group by the rw column
 * @method SekolahQuery groupByNamaDusun() Group by the nama_dusun column
 * @method SekolahQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method SekolahQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method SekolahQuery groupByKodePos() Group by the kode_pos column
 * @method SekolahQuery groupByLintang() Group by the lintang column
 * @method SekolahQuery groupByBujur() Group by the bujur column
 * @method SekolahQuery groupByNomorTelepon() Group by the nomor_telepon column
 * @method SekolahQuery groupByNomorFax() Group by the nomor_fax column
 * @method SekolahQuery groupByEmail() Group by the email column
 * @method SekolahQuery groupByWebsite() Group by the website column
 * @method SekolahQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method SekolahQuery groupByStatusSekolah() Group by the status_sekolah column
 * @method SekolahQuery groupBySkPendirianSekolah() Group by the sk_pendirian_sekolah column
 * @method SekolahQuery groupByTanggalSkPendirian() Group by the tanggal_sk_pendirian column
 * @method SekolahQuery groupByStatusKepemilikanId() Group by the status_kepemilikan_id column
 * @method SekolahQuery groupByYayasanId() Group by the yayasan_id column
 * @method SekolahQuery groupBySkIzinOperasional() Group by the sk_izin_operasional column
 * @method SekolahQuery groupByTanggalSkIzinOperasional() Group by the tanggal_sk_izin_operasional column
 * @method SekolahQuery groupByNoRekening() Group by the no_rekening column
 * @method SekolahQuery groupByNamaBank() Group by the nama_bank column
 * @method SekolahQuery groupByCabangKcpUnit() Group by the cabang_kcp_unit column
 * @method SekolahQuery groupByRekeningAtasNama() Group by the rekening_atas_nama column
 * @method SekolahQuery groupByMbs() Group by the mbs column
 * @method SekolahQuery groupByLuasTanahMilik() Group by the luas_tanah_milik column
 * @method SekolahQuery groupByLuasTanahBukanMilik() Group by the luas_tanah_bukan_milik column
 * @method SekolahQuery groupByKodeRegistrasi() Group by the kode_registrasi column
 * @method SekolahQuery groupByNpwp() Group by the npwp column
 * @method SekolahQuery groupByNmWp() Group by the nm_wp column
 * @method SekolahQuery groupByKeaktifan() Group by the keaktifan column
 * @method SekolahQuery groupByFlag() Group by the flag column
 * @method SekolahQuery groupByCreateDate() Group by the create_date column
 * @method SekolahQuery groupByLastUpdate() Group by the last_update column
 * @method SekolahQuery groupBySoftDelete() Group by the soft_delete column
 * @method SekolahQuery groupByLastSync() Group by the last_sync column
 * @method SekolahQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method SekolahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SekolahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SekolahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SekolahQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method SekolahQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method SekolahQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method SekolahQuery leftJoinKebutuhanKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhusus relation
 * @method SekolahQuery rightJoinKebutuhanKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhusus relation
 * @method SekolahQuery innerJoinKebutuhanKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhusus relation
 *
 * @method SekolahQuery leftJoinBentukPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the BentukPendidikan relation
 * @method SekolahQuery rightJoinBentukPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BentukPendidikan relation
 * @method SekolahQuery innerJoinBentukPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the BentukPendidikan relation
 *
 * @method SekolahQuery leftJoinYayasan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Yayasan relation
 * @method SekolahQuery rightJoinYayasan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Yayasan relation
 * @method SekolahQuery innerJoinYayasan($relationAlias = null) Adds a INNER JOIN clause to the query using the Yayasan relation
 *
 * @method SekolahQuery leftJoinStatusKepemilikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKepemilikan relation
 * @method SekolahQuery rightJoinStatusKepemilikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKepemilikan relation
 * @method SekolahQuery innerJoinStatusKepemilikan($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKepemilikan relation
 *
 * @method SekolahQuery leftJoinAkreditasiSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the AkreditasiSp relation
 * @method SekolahQuery rightJoinAkreditasiSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AkreditasiSp relation
 * @method SekolahQuery innerJoinAkreditasiSp($relationAlias = null) Adds a INNER JOIN clause to the query using the AkreditasiSp relation
 *
 * @method SekolahQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method SekolahQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method SekolahQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method SekolahQuery leftJoinAnggotaGugus($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaGugus relation
 * @method SekolahQuery rightJoinAnggotaGugus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaGugus relation
 * @method SekolahQuery innerJoinAnggotaGugus($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaGugus relation
 *
 * @method SekolahQuery leftJoinAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Angkutan relation
 * @method SekolahQuery rightJoinAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Angkutan relation
 * @method SekolahQuery innerJoinAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the Angkutan relation
 *
 * @method SekolahQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method SekolahQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method SekolahQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method SekolahQuery leftJoinBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Blockgrant relation
 * @method SekolahQuery rightJoinBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Blockgrant relation
 * @method SekolahQuery innerJoinBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the Blockgrant relation
 *
 * @method SekolahQuery leftJoinBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buku relation
 * @method SekolahQuery rightJoinBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buku relation
 * @method SekolahQuery innerJoinBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the Buku relation
 *
 * @method SekolahQuery leftJoinDataDynamic($relationAlias = null) Adds a LEFT JOIN clause to the query using the DataDynamic relation
 * @method SekolahQuery rightJoinDataDynamic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DataDynamic relation
 * @method SekolahQuery innerJoinDataDynamic($relationAlias = null) Adds a INNER JOIN clause to the query using the DataDynamic relation
 *
 * @method SekolahQuery leftJoinGugusSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the GugusSekolah relation
 * @method SekolahQuery rightJoinGugusSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GugusSekolah relation
 * @method SekolahQuery innerJoinGugusSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the GugusSekolah relation
 *
 * @method SekolahQuery leftJoinInstalasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Instalasi relation
 * @method SekolahQuery rightJoinInstalasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Instalasi relation
 * @method SekolahQuery innerJoinInstalasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Instalasi relation
 *
 * @method SekolahQuery leftJoinIzinOperasional($relationAlias = null) Adds a LEFT JOIN clause to the query using the IzinOperasional relation
 * @method SekolahQuery rightJoinIzinOperasional($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IzinOperasional relation
 * @method SekolahQuery innerJoinIzinOperasional($relationAlias = null) Adds a INNER JOIN clause to the query using the IzinOperasional relation
 *
 * @method SekolahQuery leftJoinJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanSp relation
 * @method SekolahQuery rightJoinJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanSp relation
 * @method SekolahQuery innerJoinJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanSp relation
 *
 * @method SekolahQuery leftJoinKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kepanitiaan relation
 * @method SekolahQuery rightJoinKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kepanitiaan relation
 * @method SekolahQuery innerJoinKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Kepanitiaan relation
 *
 * @method SekolahQuery leftJoinLayananKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the LayananKhusus relation
 * @method SekolahQuery rightJoinLayananKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LayananKhusus relation
 * @method SekolahQuery innerJoinLayananKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the LayananKhusus relation
 *
 * @method SekolahQuery leftJoinMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mou relation
 * @method SekolahQuery rightJoinMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mou relation
 * @method SekolahQuery innerJoinMou($relationAlias = null) Adds a INNER JOIN clause to the query using the Mou relation
 *
 * @method SekolahQuery leftJoinPesertaDidikBaru($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikBaru relation
 * @method SekolahQuery rightJoinPesertaDidikBaru($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikBaru relation
 * @method SekolahQuery innerJoinPesertaDidikBaru($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikBaru relation
 *
 * @method SekolahQuery leftJoinProgramInklusi($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProgramInklusi relation
 * @method SekolahQuery rightJoinProgramInklusi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProgramInklusi relation
 * @method SekolahQuery innerJoinProgramInklusi($relationAlias = null) Adds a INNER JOIN clause to the query using the ProgramInklusi relation
 *
 * @method SekolahQuery leftJoinPtkBaru($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkBaru relation
 * @method SekolahQuery rightJoinPtkBaru($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkBaru relation
 * @method SekolahQuery innerJoinPtkBaru($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkBaru relation
 *
 * @method SekolahQuery leftJoinPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkTerdaftar relation
 * @method SekolahQuery rightJoinPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkTerdaftar relation
 * @method SekolahQuery innerJoinPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkTerdaftar relation
 *
 * @method SekolahQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method SekolahQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method SekolahQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method SekolahQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method SekolahQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method SekolahQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method SekolahQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method SekolahQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method SekolahQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method SekolahQuery leftJoinSanitasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sanitasi relation
 * @method SekolahQuery rightJoinSanitasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sanitasi relation
 * @method SekolahQuery innerJoinSanitasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Sanitasi relation
 *
 * @method SekolahQuery leftJoinSasaranPengawasan($relationAlias = null) Adds a LEFT JOIN clause to the query using the SasaranPengawasan relation
 * @method SekolahQuery rightJoinSasaranPengawasan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SasaranPengawasan relation
 * @method SekolahQuery innerJoinSasaranPengawasan($relationAlias = null) Adds a INNER JOIN clause to the query using the SasaranPengawasan relation
 *
 * @method SekolahQuery leftJoinSekolahLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahLongitudinal relation
 * @method SekolahQuery rightJoinSekolahLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahLongitudinal relation
 * @method SekolahQuery innerJoinSekolahLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahLongitudinal relation
 *
 * @method SekolahQuery leftJoinSekolahPaud($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahPaud relation
 * @method SekolahQuery rightJoinSekolahPaud($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahPaud relation
 * @method SekolahQuery innerJoinSekolahPaud($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahPaud relation
 *
 * @method SekolahQuery leftJoinTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tanah relation
 * @method SekolahQuery rightJoinTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tanah relation
 * @method SekolahQuery innerJoinTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the Tanah relation
 *
 * @method SekolahQuery leftJoinTugasTambahan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TugasTambahan relation
 * @method SekolahQuery rightJoinTugasTambahan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TugasTambahan relation
 * @method SekolahQuery innerJoinTugasTambahan($relationAlias = null) Adds a INNER JOIN clause to the query using the TugasTambahan relation
 *
 * @method SekolahQuery leftJoinUnitUsaha($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnitUsaha relation
 * @method SekolahQuery rightJoinUnitUsaha($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnitUsaha relation
 * @method SekolahQuery innerJoinUnitUsaha($relationAlias = null) Adds a INNER JOIN clause to the query using the UnitUsaha relation
 *
 * @method SekolahQuery leftJoinVldSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldSekolah relation
 * @method SekolahQuery rightJoinVldSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldSekolah relation
 * @method SekolahQuery innerJoinVldSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the VldSekolah relation
 *
 * @method Sekolah findOne(PropelPDO $con = null) Return the first Sekolah matching the query
 * @method Sekolah findOneOrCreate(PropelPDO $con = null) Return the first Sekolah matching the query, or a new Sekolah object populated from the query conditions when no match is found
 *
 * @method Sekolah findOneByNama(string $nama) Return the first Sekolah filtered by the nama column
 * @method Sekolah findOneByNamaNomenklatur(string $nama_nomenklatur) Return the first Sekolah filtered by the nama_nomenklatur column
 * @method Sekolah findOneByNss(string $nss) Return the first Sekolah filtered by the nss column
 * @method Sekolah findOneByNpsn(string $npsn) Return the first Sekolah filtered by the npsn column
 * @method Sekolah findOneByBentukPendidikanId(int $bentuk_pendidikan_id) Return the first Sekolah filtered by the bentuk_pendidikan_id column
 * @method Sekolah findOneByAlamatJalan(string $alamat_jalan) Return the first Sekolah filtered by the alamat_jalan column
 * @method Sekolah findOneByRt(string $rt) Return the first Sekolah filtered by the rt column
 * @method Sekolah findOneByRw(string $rw) Return the first Sekolah filtered by the rw column
 * @method Sekolah findOneByNamaDusun(string $nama_dusun) Return the first Sekolah filtered by the nama_dusun column
 * @method Sekolah findOneByDesaKelurahan(string $desa_kelurahan) Return the first Sekolah filtered by the desa_kelurahan column
 * @method Sekolah findOneByKodeWilayah(string $kode_wilayah) Return the first Sekolah filtered by the kode_wilayah column
 * @method Sekolah findOneByKodePos(string $kode_pos) Return the first Sekolah filtered by the kode_pos column
 * @method Sekolah findOneByLintang(string $lintang) Return the first Sekolah filtered by the lintang column
 * @method Sekolah findOneByBujur(string $bujur) Return the first Sekolah filtered by the bujur column
 * @method Sekolah findOneByNomorTelepon(string $nomor_telepon) Return the first Sekolah filtered by the nomor_telepon column
 * @method Sekolah findOneByNomorFax(string $nomor_fax) Return the first Sekolah filtered by the nomor_fax column
 * @method Sekolah findOneByEmail(string $email) Return the first Sekolah filtered by the email column
 * @method Sekolah findOneByWebsite(string $website) Return the first Sekolah filtered by the website column
 * @method Sekolah findOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first Sekolah filtered by the kebutuhan_khusus_id column
 * @method Sekolah findOneByStatusSekolah(string $status_sekolah) Return the first Sekolah filtered by the status_sekolah column
 * @method Sekolah findOneBySkPendirianSekolah(string $sk_pendirian_sekolah) Return the first Sekolah filtered by the sk_pendirian_sekolah column
 * @method Sekolah findOneByTanggalSkPendirian(string $tanggal_sk_pendirian) Return the first Sekolah filtered by the tanggal_sk_pendirian column
 * @method Sekolah findOneByStatusKepemilikanId(string $status_kepemilikan_id) Return the first Sekolah filtered by the status_kepemilikan_id column
 * @method Sekolah findOneByYayasanId(string $yayasan_id) Return the first Sekolah filtered by the yayasan_id column
 * @method Sekolah findOneBySkIzinOperasional(string $sk_izin_operasional) Return the first Sekolah filtered by the sk_izin_operasional column
 * @method Sekolah findOneByTanggalSkIzinOperasional(string $tanggal_sk_izin_operasional) Return the first Sekolah filtered by the tanggal_sk_izin_operasional column
 * @method Sekolah findOneByNoRekening(string $no_rekening) Return the first Sekolah filtered by the no_rekening column
 * @method Sekolah findOneByNamaBank(string $nama_bank) Return the first Sekolah filtered by the nama_bank column
 * @method Sekolah findOneByCabangKcpUnit(string $cabang_kcp_unit) Return the first Sekolah filtered by the cabang_kcp_unit column
 * @method Sekolah findOneByRekeningAtasNama(string $rekening_atas_nama) Return the first Sekolah filtered by the rekening_atas_nama column
 * @method Sekolah findOneByMbs(string $mbs) Return the first Sekolah filtered by the mbs column
 * @method Sekolah findOneByLuasTanahMilik(string $luas_tanah_milik) Return the first Sekolah filtered by the luas_tanah_milik column
 * @method Sekolah findOneByLuasTanahBukanMilik(string $luas_tanah_bukan_milik) Return the first Sekolah filtered by the luas_tanah_bukan_milik column
 * @method Sekolah findOneByKodeRegistrasi(string $kode_registrasi) Return the first Sekolah filtered by the kode_registrasi column
 * @method Sekolah findOneByNpwp(string $npwp) Return the first Sekolah filtered by the npwp column
 * @method Sekolah findOneByNmWp(string $nm_wp) Return the first Sekolah filtered by the nm_wp column
 * @method Sekolah findOneByKeaktifan(string $keaktifan) Return the first Sekolah filtered by the keaktifan column
 * @method Sekolah findOneByFlag(string $flag) Return the first Sekolah filtered by the flag column
 * @method Sekolah findOneByCreateDate(string $create_date) Return the first Sekolah filtered by the create_date column
 * @method Sekolah findOneByLastUpdate(string $last_update) Return the first Sekolah filtered by the last_update column
 * @method Sekolah findOneBySoftDelete(string $soft_delete) Return the first Sekolah filtered by the soft_delete column
 * @method Sekolah findOneByLastSync(string $last_sync) Return the first Sekolah filtered by the last_sync column
 * @method Sekolah findOneByUpdaterId(string $updater_id) Return the first Sekolah filtered by the updater_id column
 *
 * @method array findBySekolahId(string $sekolah_id) Return Sekolah objects filtered by the sekolah_id column
 * @method array findByNama(string $nama) Return Sekolah objects filtered by the nama column
 * @method array findByNamaNomenklatur(string $nama_nomenklatur) Return Sekolah objects filtered by the nama_nomenklatur column
 * @method array findByNss(string $nss) Return Sekolah objects filtered by the nss column
 * @method array findByNpsn(string $npsn) Return Sekolah objects filtered by the npsn column
 * @method array findByBentukPendidikanId(int $bentuk_pendidikan_id) Return Sekolah objects filtered by the bentuk_pendidikan_id column
 * @method array findByAlamatJalan(string $alamat_jalan) Return Sekolah objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return Sekolah objects filtered by the rt column
 * @method array findByRw(string $rw) Return Sekolah objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return Sekolah objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return Sekolah objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Sekolah objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return Sekolah objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return Sekolah objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return Sekolah objects filtered by the bujur column
 * @method array findByNomorTelepon(string $nomor_telepon) Return Sekolah objects filtered by the nomor_telepon column
 * @method array findByNomorFax(string $nomor_fax) Return Sekolah objects filtered by the nomor_fax column
 * @method array findByEmail(string $email) Return Sekolah objects filtered by the email column
 * @method array findByWebsite(string $website) Return Sekolah objects filtered by the website column
 * @method array findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return Sekolah objects filtered by the kebutuhan_khusus_id column
 * @method array findByStatusSekolah(string $status_sekolah) Return Sekolah objects filtered by the status_sekolah column
 * @method array findBySkPendirianSekolah(string $sk_pendirian_sekolah) Return Sekolah objects filtered by the sk_pendirian_sekolah column
 * @method array findByTanggalSkPendirian(string $tanggal_sk_pendirian) Return Sekolah objects filtered by the tanggal_sk_pendirian column
 * @method array findByStatusKepemilikanId(string $status_kepemilikan_id) Return Sekolah objects filtered by the status_kepemilikan_id column
 * @method array findByYayasanId(string $yayasan_id) Return Sekolah objects filtered by the yayasan_id column
 * @method array findBySkIzinOperasional(string $sk_izin_operasional) Return Sekolah objects filtered by the sk_izin_operasional column
 * @method array findByTanggalSkIzinOperasional(string $tanggal_sk_izin_operasional) Return Sekolah objects filtered by the tanggal_sk_izin_operasional column
 * @method array findByNoRekening(string $no_rekening) Return Sekolah objects filtered by the no_rekening column
 * @method array findByNamaBank(string $nama_bank) Return Sekolah objects filtered by the nama_bank column
 * @method array findByCabangKcpUnit(string $cabang_kcp_unit) Return Sekolah objects filtered by the cabang_kcp_unit column
 * @method array findByRekeningAtasNama(string $rekening_atas_nama) Return Sekolah objects filtered by the rekening_atas_nama column
 * @method array findByMbs(string $mbs) Return Sekolah objects filtered by the mbs column
 * @method array findByLuasTanahMilik(string $luas_tanah_milik) Return Sekolah objects filtered by the luas_tanah_milik column
 * @method array findByLuasTanahBukanMilik(string $luas_tanah_bukan_milik) Return Sekolah objects filtered by the luas_tanah_bukan_milik column
 * @method array findByKodeRegistrasi(string $kode_registrasi) Return Sekolah objects filtered by the kode_registrasi column
 * @method array findByNpwp(string $npwp) Return Sekolah objects filtered by the npwp column
 * @method array findByNmWp(string $nm_wp) Return Sekolah objects filtered by the nm_wp column
 * @method array findByKeaktifan(string $keaktifan) Return Sekolah objects filtered by the keaktifan column
 * @method array findByFlag(string $flag) Return Sekolah objects filtered by the flag column
 * @method array findByCreateDate(string $create_date) Return Sekolah objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Sekolah objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Sekolah objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Sekolah objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Sekolah objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSekolahQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Sekolah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SekolahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SekolahQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SekolahQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SekolahQuery) {
            return $criteria;
        }
        $query = new SekolahQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Sekolah|Sekolah[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SekolahPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sekolah A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySekolahId($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sekolah A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sekolah_id", "nama", "nama_nomenklatur", "nss", "npsn", "bentuk_pendidikan_id", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "nomor_telepon", "nomor_fax", "email", "website", "kebutuhan_khusus_id", "status_sekolah", "sk_pendirian_sekolah", "tanggal_sk_pendirian", "status_kepemilikan_id", "yayasan_id", "sk_izin_operasional", "tanggal_sk_izin_operasional", "no_rekening", "nama_bank", "cabang_kcp_unit", "rekening_atas_nama", "mbs", "luas_tanah_milik", "luas_tanah_bukan_milik", "kode_registrasi", "npwp", "nm_wp", "keaktifan", "flag", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "sekolah" WHERE "sekolah_id" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Sekolah();
            $obj->hydrate($row);
            SekolahPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sekolah|Sekolah[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Sekolah[]|mixed the list of results, formatted by the current formatter
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
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SekolahPeer::SEKOLAH_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SekolahPeer::SEKOLAH_ID, $keys, Criteria::IN);
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
     * @return SekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SekolahPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%'); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nama)) {
                $nama = str_replace('*', '%', $nama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the nama_nomenklatur column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaNomenklatur('fooValue');   // WHERE nama_nomenklatur = 'fooValue'
     * $query->filterByNamaNomenklatur('%fooValue%'); // WHERE nama_nomenklatur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaNomenklatur The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNamaNomenklatur($namaNomenklatur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaNomenklatur)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaNomenklatur)) {
                $namaNomenklatur = str_replace('*', '%', $namaNomenklatur);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NAMA_NOMENKLATUR, $namaNomenklatur, $comparison);
    }

    /**
     * Filter the query on the nss column
     *
     * Example usage:
     * <code>
     * $query->filterByNss('fooValue');   // WHERE nss = 'fooValue'
     * $query->filterByNss('%fooValue%'); // WHERE nss LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nss The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNss($nss = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nss)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nss)) {
                $nss = str_replace('*', '%', $nss);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NSS, $nss, $comparison);
    }

    /**
     * Filter the query on the npsn column
     *
     * Example usage:
     * <code>
     * $query->filterByNpsn('fooValue');   // WHERE npsn = 'fooValue'
     * $query->filterByNpsn('%fooValue%'); // WHERE npsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npsn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNpsn($npsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npsn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $npsn)) {
                $npsn = str_replace('*', '%', $npsn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NPSN, $npsn, $comparison);
    }

    /**
     * Filter the query on the bentuk_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBentukPendidikanId(1234); // WHERE bentuk_pendidikan_id = 1234
     * $query->filterByBentukPendidikanId(array(12, 34)); // WHERE bentuk_pendidikan_id IN (12, 34)
     * $query->filterByBentukPendidikanId(array('min' => 12)); // WHERE bentuk_pendidikan_id >= 12
     * $query->filterByBentukPendidikanId(array('max' => 12)); // WHERE bentuk_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByBentukPendidikan()
     *
     * @param     mixed $bentukPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByBentukPendidikanId($bentukPendidikanId = null, $comparison = null)
    {
        if (is_array($bentukPendidikanId)) {
            $useMinMax = false;
            if (isset($bentukPendidikanId['min'])) {
                $this->addUsingAlias(SekolahPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bentukPendidikanId['max'])) {
                $this->addUsingAlias(SekolahPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId, $comparison);
    }

    /**
     * Filter the query on the alamat_jalan column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamatJalan('fooValue');   // WHERE alamat_jalan = 'fooValue'
     * $query->filterByAlamatJalan('%fooValue%'); // WHERE alamat_jalan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamatJalan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByAlamatJalan($alamatJalan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamatJalan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamatJalan)) {
                $alamatJalan = str_replace('*', '%', $alamatJalan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
    }

    /**
     * Filter the query on the rt column
     *
     * Example usage:
     * <code>
     * $query->filterByRt(1234); // WHERE rt = 1234
     * $query->filterByRt(array(12, 34)); // WHERE rt IN (12, 34)
     * $query->filterByRt(array('min' => 12)); // WHERE rt >= 12
     * $query->filterByRt(array('max' => 12)); // WHERE rt <= 12
     * </code>
     *
     * @param     mixed $rt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(SekolahPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(SekolahPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::RT, $rt, $comparison);
    }

    /**
     * Filter the query on the rw column
     *
     * Example usage:
     * <code>
     * $query->filterByRw(1234); // WHERE rw = 1234
     * $query->filterByRw(array(12, 34)); // WHERE rw IN (12, 34)
     * $query->filterByRw(array('min' => 12)); // WHERE rw >= 12
     * $query->filterByRw(array('max' => 12)); // WHERE rw <= 12
     * </code>
     *
     * @param     mixed $rw The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(SekolahPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(SekolahPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::RW, $rw, $comparison);
    }

    /**
     * Filter the query on the nama_dusun column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaDusun('fooValue');   // WHERE nama_dusun = 'fooValue'
     * $query->filterByNamaDusun('%fooValue%'); // WHERE nama_dusun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaDusun The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNamaDusun($namaDusun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaDusun)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaDusun)) {
                $namaDusun = str_replace('*', '%', $namaDusun);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NAMA_DUSUN, $namaDusun, $comparison);
    }

    /**
     * Filter the query on the desa_kelurahan column
     *
     * Example usage:
     * <code>
     * $query->filterByDesaKelurahan('fooValue');   // WHERE desa_kelurahan = 'fooValue'
     * $query->filterByDesaKelurahan('%fooValue%'); // WHERE desa_kelurahan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desaKelurahan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByDesaKelurahan($desaKelurahan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desaKelurahan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $desaKelurahan)) {
                $desaKelurahan = str_replace('*', '%', $desaKelurahan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%'); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah)) {
                $kodeWilayah = str_replace('*', '%', $kodeWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the kode_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByKodePos('fooValue');   // WHERE kode_pos = 'fooValue'
     * $query->filterByKodePos('%fooValue%'); // WHERE kode_pos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodePos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByKodePos($kodePos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodePos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodePos)) {
                $kodePos = str_replace('*', '%', $kodePos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::KODE_POS, $kodePos, $comparison);
    }

    /**
     * Filter the query on the lintang column
     *
     * Example usage:
     * <code>
     * $query->filterByLintang(1234); // WHERE lintang = 1234
     * $query->filterByLintang(array(12, 34)); // WHERE lintang IN (12, 34)
     * $query->filterByLintang(array('min' => 12)); // WHERE lintang >= 12
     * $query->filterByLintang(array('max' => 12)); // WHERE lintang <= 12
     * </code>
     *
     * @param     mixed $lintang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(SekolahPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(SekolahPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::LINTANG, $lintang, $comparison);
    }

    /**
     * Filter the query on the bujur column
     *
     * Example usage:
     * <code>
     * $query->filterByBujur(1234); // WHERE bujur = 1234
     * $query->filterByBujur(array(12, 34)); // WHERE bujur IN (12, 34)
     * $query->filterByBujur(array('min' => 12)); // WHERE bujur >= 12
     * $query->filterByBujur(array('max' => 12)); // WHERE bujur <= 12
     * </code>
     *
     * @param     mixed $bujur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(SekolahPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(SekolahPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the nomor_telepon column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorTelepon('fooValue');   // WHERE nomor_telepon = 'fooValue'
     * $query->filterByNomorTelepon('%fooValue%'); // WHERE nomor_telepon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorTelepon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNomorTelepon($nomorTelepon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorTelepon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorTelepon)) {
                $nomorTelepon = str_replace('*', '%', $nomorTelepon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NOMOR_TELEPON, $nomorTelepon, $comparison);
    }

    /**
     * Filter the query on the nomor_fax column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorFax('fooValue');   // WHERE nomor_fax = 'fooValue'
     * $query->filterByNomorFax('%fooValue%'); // WHERE nomor_fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorFax The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNomorFax($nomorFax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorFax)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorFax)) {
                $nomorFax = str_replace('*', '%', $nomorFax);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NOMOR_FAX, $nomorFax, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususId(1234); // WHERE kebutuhan_khusus_id = 1234
     * $query->filterByKebutuhanKhususId(array(12, 34)); // WHERE kebutuhan_khusus_id IN (12, 34)
     * $query->filterByKebutuhanKhususId(array('min' => 12)); // WHERE kebutuhan_khusus_id >= 12
     * $query->filterByKebutuhanKhususId(array('max' => 12)); // WHERE kebutuhan_khusus_id <= 12
     * </code>
     *
     * @see       filterByKebutuhanKhusus()
     *
     * @param     mixed $kebutuhanKhususId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(SekolahPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(SekolahPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
    }

    /**
     * Filter the query on the status_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusSekolah(1234); // WHERE status_sekolah = 1234
     * $query->filterByStatusSekolah(array(12, 34)); // WHERE status_sekolah IN (12, 34)
     * $query->filterByStatusSekolah(array('min' => 12)); // WHERE status_sekolah >= 12
     * $query->filterByStatusSekolah(array('max' => 12)); // WHERE status_sekolah <= 12
     * </code>
     *
     * @param     mixed $statusSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByStatusSekolah($statusSekolah = null, $comparison = null)
    {
        if (is_array($statusSekolah)) {
            $useMinMax = false;
            if (isset($statusSekolah['min'])) {
                $this->addUsingAlias(SekolahPeer::STATUS_SEKOLAH, $statusSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusSekolah['max'])) {
                $this->addUsingAlias(SekolahPeer::STATUS_SEKOLAH, $statusSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::STATUS_SEKOLAH, $statusSekolah, $comparison);
    }

    /**
     * Filter the query on the sk_pendirian_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterBySkPendirianSekolah('fooValue');   // WHERE sk_pendirian_sekolah = 'fooValue'
     * $query->filterBySkPendirianSekolah('%fooValue%'); // WHERE sk_pendirian_sekolah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skPendirianSekolah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterBySkPendirianSekolah($skPendirianSekolah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skPendirianSekolah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skPendirianSekolah)) {
                $skPendirianSekolah = str_replace('*', '%', $skPendirianSekolah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::SK_PENDIRIAN_SEKOLAH, $skPendirianSekolah, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk_pendirian column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSkPendirian('2011-03-14'); // WHERE tanggal_sk_pendirian = '2011-03-14'
     * $query->filterByTanggalSkPendirian('now'); // WHERE tanggal_sk_pendirian = '2011-03-14'
     * $query->filterByTanggalSkPendirian(array('max' => 'yesterday')); // WHERE tanggal_sk_pendirian > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSkPendirian The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByTanggalSkPendirian($tanggalSkPendirian = null, $comparison = null)
    {
        if (is_array($tanggalSkPendirian)) {
            $useMinMax = false;
            if (isset($tanggalSkPendirian['min'])) {
                $this->addUsingAlias(SekolahPeer::TANGGAL_SK_PENDIRIAN, $tanggalSkPendirian['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSkPendirian['max'])) {
                $this->addUsingAlias(SekolahPeer::TANGGAL_SK_PENDIRIAN, $tanggalSkPendirian['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::TANGGAL_SK_PENDIRIAN, $tanggalSkPendirian, $comparison);
    }

    /**
     * Filter the query on the status_kepemilikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusKepemilikanId(1234); // WHERE status_kepemilikan_id = 1234
     * $query->filterByStatusKepemilikanId(array(12, 34)); // WHERE status_kepemilikan_id IN (12, 34)
     * $query->filterByStatusKepemilikanId(array('min' => 12)); // WHERE status_kepemilikan_id >= 12
     * $query->filterByStatusKepemilikanId(array('max' => 12)); // WHERE status_kepemilikan_id <= 12
     * </code>
     *
     * @see       filterByStatusKepemilikan()
     *
     * @param     mixed $statusKepemilikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByStatusKepemilikanId($statusKepemilikanId = null, $comparison = null)
    {
        if (is_array($statusKepemilikanId)) {
            $useMinMax = false;
            if (isset($statusKepemilikanId['min'])) {
                $this->addUsingAlias(SekolahPeer::STATUS_KEPEMILIKAN_ID, $statusKepemilikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKepemilikanId['max'])) {
                $this->addUsingAlias(SekolahPeer::STATUS_KEPEMILIKAN_ID, $statusKepemilikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::STATUS_KEPEMILIKAN_ID, $statusKepemilikanId, $comparison);
    }

    /**
     * Filter the query on the yayasan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByYayasanId('fooValue');   // WHERE yayasan_id = 'fooValue'
     * $query->filterByYayasanId('%fooValue%'); // WHERE yayasan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $yayasanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByYayasanId($yayasanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($yayasanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $yayasanId)) {
                $yayasanId = str_replace('*', '%', $yayasanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::YAYASAN_ID, $yayasanId, $comparison);
    }

    /**
     * Filter the query on the sk_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterBySkIzinOperasional('fooValue');   // WHERE sk_izin_operasional = 'fooValue'
     * $query->filterBySkIzinOperasional('%fooValue%'); // WHERE sk_izin_operasional LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skIzinOperasional The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterBySkIzinOperasional($skIzinOperasional = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skIzinOperasional)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skIzinOperasional)) {
                $skIzinOperasional = str_replace('*', '%', $skIzinOperasional);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::SK_IZIN_OPERASIONAL, $skIzinOperasional, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSkIzinOperasional('2011-03-14'); // WHERE tanggal_sk_izin_operasional = '2011-03-14'
     * $query->filterByTanggalSkIzinOperasional('now'); // WHERE tanggal_sk_izin_operasional = '2011-03-14'
     * $query->filterByTanggalSkIzinOperasional(array('max' => 'yesterday')); // WHERE tanggal_sk_izin_operasional > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSkIzinOperasional The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByTanggalSkIzinOperasional($tanggalSkIzinOperasional = null, $comparison = null)
    {
        if (is_array($tanggalSkIzinOperasional)) {
            $useMinMax = false;
            if (isset($tanggalSkIzinOperasional['min'])) {
                $this->addUsingAlias(SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL, $tanggalSkIzinOperasional['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSkIzinOperasional['max'])) {
                $this->addUsingAlias(SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL, $tanggalSkIzinOperasional['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL, $tanggalSkIzinOperasional, $comparison);
    }

    /**
     * Filter the query on the no_rekening column
     *
     * Example usage:
     * <code>
     * $query->filterByNoRekening('fooValue');   // WHERE no_rekening = 'fooValue'
     * $query->filterByNoRekening('%fooValue%'); // WHERE no_rekening LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noRekening The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNoRekening($noRekening = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noRekening)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noRekening)) {
                $noRekening = str_replace('*', '%', $noRekening);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NO_REKENING, $noRekening, $comparison);
    }

    /**
     * Filter the query on the nama_bank column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaBank('fooValue');   // WHERE nama_bank = 'fooValue'
     * $query->filterByNamaBank('%fooValue%'); // WHERE nama_bank LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaBank The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNamaBank($namaBank = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaBank)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaBank)) {
                $namaBank = str_replace('*', '%', $namaBank);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NAMA_BANK, $namaBank, $comparison);
    }

    /**
     * Filter the query on the cabang_kcp_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByCabangKcpUnit('fooValue');   // WHERE cabang_kcp_unit = 'fooValue'
     * $query->filterByCabangKcpUnit('%fooValue%'); // WHERE cabang_kcp_unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cabangKcpUnit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByCabangKcpUnit($cabangKcpUnit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cabangKcpUnit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cabangKcpUnit)) {
                $cabangKcpUnit = str_replace('*', '%', $cabangKcpUnit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::CABANG_KCP_UNIT, $cabangKcpUnit, $comparison);
    }

    /**
     * Filter the query on the rekening_atas_nama column
     *
     * Example usage:
     * <code>
     * $query->filterByRekeningAtasNama('fooValue');   // WHERE rekening_atas_nama = 'fooValue'
     * $query->filterByRekeningAtasNama('%fooValue%'); // WHERE rekening_atas_nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rekeningAtasNama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByRekeningAtasNama($rekeningAtasNama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rekeningAtasNama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rekeningAtasNama)) {
                $rekeningAtasNama = str_replace('*', '%', $rekeningAtasNama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::REKENING_ATAS_NAMA, $rekeningAtasNama, $comparison);
    }

    /**
     * Filter the query on the mbs column
     *
     * Example usage:
     * <code>
     * $query->filterByMbs(1234); // WHERE mbs = 1234
     * $query->filterByMbs(array(12, 34)); // WHERE mbs IN (12, 34)
     * $query->filterByMbs(array('min' => 12)); // WHERE mbs >= 12
     * $query->filterByMbs(array('max' => 12)); // WHERE mbs <= 12
     * </code>
     *
     * @param     mixed $mbs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByMbs($mbs = null, $comparison = null)
    {
        if (is_array($mbs)) {
            $useMinMax = false;
            if (isset($mbs['min'])) {
                $this->addUsingAlias(SekolahPeer::MBS, $mbs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mbs['max'])) {
                $this->addUsingAlias(SekolahPeer::MBS, $mbs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::MBS, $mbs, $comparison);
    }

    /**
     * Filter the query on the luas_tanah_milik column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasTanahMilik(1234); // WHERE luas_tanah_milik = 1234
     * $query->filterByLuasTanahMilik(array(12, 34)); // WHERE luas_tanah_milik IN (12, 34)
     * $query->filterByLuasTanahMilik(array('min' => 12)); // WHERE luas_tanah_milik >= 12
     * $query->filterByLuasTanahMilik(array('max' => 12)); // WHERE luas_tanah_milik <= 12
     * </code>
     *
     * @param     mixed $luasTanahMilik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByLuasTanahMilik($luasTanahMilik = null, $comparison = null)
    {
        if (is_array($luasTanahMilik)) {
            $useMinMax = false;
            if (isset($luasTanahMilik['min'])) {
                $this->addUsingAlias(SekolahPeer::LUAS_TANAH_MILIK, $luasTanahMilik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasTanahMilik['max'])) {
                $this->addUsingAlias(SekolahPeer::LUAS_TANAH_MILIK, $luasTanahMilik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::LUAS_TANAH_MILIK, $luasTanahMilik, $comparison);
    }

    /**
     * Filter the query on the luas_tanah_bukan_milik column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasTanahBukanMilik(1234); // WHERE luas_tanah_bukan_milik = 1234
     * $query->filterByLuasTanahBukanMilik(array(12, 34)); // WHERE luas_tanah_bukan_milik IN (12, 34)
     * $query->filterByLuasTanahBukanMilik(array('min' => 12)); // WHERE luas_tanah_bukan_milik >= 12
     * $query->filterByLuasTanahBukanMilik(array('max' => 12)); // WHERE luas_tanah_bukan_milik <= 12
     * </code>
     *
     * @param     mixed $luasTanahBukanMilik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByLuasTanahBukanMilik($luasTanahBukanMilik = null, $comparison = null)
    {
        if (is_array($luasTanahBukanMilik)) {
            $useMinMax = false;
            if (isset($luasTanahBukanMilik['min'])) {
                $this->addUsingAlias(SekolahPeer::LUAS_TANAH_BUKAN_MILIK, $luasTanahBukanMilik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasTanahBukanMilik['max'])) {
                $this->addUsingAlias(SekolahPeer::LUAS_TANAH_BUKAN_MILIK, $luasTanahBukanMilik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::LUAS_TANAH_BUKAN_MILIK, $luasTanahBukanMilik, $comparison);
    }

    /**
     * Filter the query on the kode_registrasi column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeRegistrasi(1234); // WHERE kode_registrasi = 1234
     * $query->filterByKodeRegistrasi(array(12, 34)); // WHERE kode_registrasi IN (12, 34)
     * $query->filterByKodeRegistrasi(array('min' => 12)); // WHERE kode_registrasi >= 12
     * $query->filterByKodeRegistrasi(array('max' => 12)); // WHERE kode_registrasi <= 12
     * </code>
     *
     * @param     mixed $kodeRegistrasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByKodeRegistrasi($kodeRegistrasi = null, $comparison = null)
    {
        if (is_array($kodeRegistrasi)) {
            $useMinMax = false;
            if (isset($kodeRegistrasi['min'])) {
                $this->addUsingAlias(SekolahPeer::KODE_REGISTRASI, $kodeRegistrasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeRegistrasi['max'])) {
                $this->addUsingAlias(SekolahPeer::KODE_REGISTRASI, $kodeRegistrasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::KODE_REGISTRASI, $kodeRegistrasi, $comparison);
    }

    /**
     * Filter the query on the npwp column
     *
     * Example usage:
     * <code>
     * $query->filterByNpwp('fooValue');   // WHERE npwp = 'fooValue'
     * $query->filterByNpwp('%fooValue%'); // WHERE npwp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npwp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNpwp($npwp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npwp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $npwp)) {
                $npwp = str_replace('*', '%', $npwp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NPWP, $npwp, $comparison);
    }

    /**
     * Filter the query on the nm_wp column
     *
     * Example usage:
     * <code>
     * $query->filterByNmWp('fooValue');   // WHERE nm_wp = 'fooValue'
     * $query->filterByNmWp('%fooValue%'); // WHERE nm_wp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmWp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByNmWp($nmWp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmWp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmWp)) {
                $nmWp = str_replace('*', '%', $nmWp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::NM_WP, $nmWp, $comparison);
    }

    /**
     * Filter the query on the keaktifan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeaktifan(1234); // WHERE keaktifan = 1234
     * $query->filterByKeaktifan(array(12, 34)); // WHERE keaktifan IN (12, 34)
     * $query->filterByKeaktifan(array('min' => 12)); // WHERE keaktifan >= 12
     * $query->filterByKeaktifan(array('max' => 12)); // WHERE keaktifan <= 12
     * </code>
     *
     * @param     mixed $keaktifan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByKeaktifan($keaktifan = null, $comparison = null)
    {
        if (is_array($keaktifan)) {
            $useMinMax = false;
            if (isset($keaktifan['min'])) {
                $this->addUsingAlias(SekolahPeer::KEAKTIFAN, $keaktifan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keaktifan['max'])) {
                $this->addUsingAlias(SekolahPeer::KEAKTIFAN, $keaktifan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::KEAKTIFAN, $keaktifan, $comparison);
    }

    /**
     * Filter the query on the flag column
     *
     * Example usage:
     * <code>
     * $query->filterByFlag('fooValue');   // WHERE flag = 'fooValue'
     * $query->filterByFlag('%fooValue%'); // WHERE flag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flag The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByFlag($flag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flag)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $flag)) {
                $flag = str_replace('*', '%', $flag);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPeer::FLAG, $flag, $comparison);
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
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SekolahPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SekolahPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SekolahPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SekolahPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(SekolahPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(SekolahPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return SekolahQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SekolahPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SekolahPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return SekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SekolahPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(SekolahPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayah');

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
            $this->addJoinObject($join, 'MstWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhusus($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(SekolahPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
        } else {
            throw new PropelException('filterByKebutuhanKhusus() only accepts arguments of type KebutuhanKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KebutuhanKhusus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinKebutuhanKhusus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KebutuhanKhusus');

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
            $this->addJoinObject($join, 'KebutuhanKhusus');
        }

        return $this;
    }

    /**
     * Use the KebutuhanKhusus relation KebutuhanKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KebutuhanKhususQuery A secondary query class using the current class as primary query
     */
    public function useKebutuhanKhususQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKebutuhanKhusus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KebutuhanKhusus', '\DataDikdas\Model\KebutuhanKhususQuery');
    }

    /**
     * Filter the query by a related BentukPendidikan object
     *
     * @param   BentukPendidikan|PropelObjectCollection $bentukPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBentukPendidikan($bentukPendidikan, $comparison = null)
    {
        if ($bentukPendidikan instanceof BentukPendidikan) {
            return $this
                ->addUsingAlias(SekolahPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikan->getBentukPendidikanId(), $comparison);
        } elseif ($bentukPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikan->toKeyValue('PrimaryKey', 'BentukPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByBentukPendidikan() only accepts arguments of type BentukPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BentukPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinBentukPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BentukPendidikan');

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
            $this->addJoinObject($join, 'BentukPendidikan');
        }

        return $this;
    }

    /**
     * Use the BentukPendidikan relation BentukPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BentukPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useBentukPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBentukPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BentukPendidikan', '\DataDikdas\Model\BentukPendidikanQuery');
    }

    /**
     * Filter the query by a related Yayasan object
     *
     * @param   Yayasan|PropelObjectCollection $yayasan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByYayasan($yayasan, $comparison = null)
    {
        if ($yayasan instanceof Yayasan) {
            return $this
                ->addUsingAlias(SekolahPeer::YAYASAN_ID, $yayasan->getYayasanId(), $comparison);
        } elseif ($yayasan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPeer::YAYASAN_ID, $yayasan->toKeyValue('PrimaryKey', 'YayasanId'), $comparison);
        } else {
            throw new PropelException('filterByYayasan() only accepts arguments of type Yayasan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Yayasan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinYayasan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Yayasan');

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
            $this->addJoinObject($join, 'Yayasan');
        }

        return $this;
    }

    /**
     * Use the Yayasan relation Yayasan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\YayasanQuery A secondary query class using the current class as primary query
     */
    public function useYayasanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinYayasan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Yayasan', '\DataDikdas\Model\YayasanQuery');
    }

    /**
     * Filter the query by a related StatusKepemilikan object
     *
     * @param   StatusKepemilikan|PropelObjectCollection $statusKepemilikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKepemilikan($statusKepemilikan, $comparison = null)
    {
        if ($statusKepemilikan instanceof StatusKepemilikan) {
            return $this
                ->addUsingAlias(SekolahPeer::STATUS_KEPEMILIKAN_ID, $statusKepemilikan->getStatusKepemilikanId(), $comparison);
        } elseif ($statusKepemilikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPeer::STATUS_KEPEMILIKAN_ID, $statusKepemilikan->toKeyValue('PrimaryKey', 'StatusKepemilikanId'), $comparison);
        } else {
            throw new PropelException('filterByStatusKepemilikan() only accepts arguments of type StatusKepemilikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusKepemilikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinStatusKepemilikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusKepemilikan');

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
            $this->addJoinObject($join, 'StatusKepemilikan');
        }

        return $this;
    }

    /**
     * Use the StatusKepemilikan relation StatusKepemilikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StatusKepemilikanQuery A secondary query class using the current class as primary query
     */
    public function useStatusKepemilikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusKepemilikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusKepemilikan', '\DataDikdas\Model\StatusKepemilikanQuery');
    }

    /**
     * Filter the query by a related AkreditasiSp object
     *
     * @param   AkreditasiSp|PropelObjectCollection $akreditasiSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasiSp($akreditasiSp, $comparison = null)
    {
        if ($akreditasiSp instanceof AkreditasiSp) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $akreditasiSp->getSekolahId(), $comparison);
        } elseif ($akreditasiSp instanceof PropelObjectCollection) {
            return $this
                ->useAkreditasiSpQuery()
                ->filterByPrimaryKeys($akreditasiSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAkreditasiSp() only accepts arguments of type AkreditasiSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AkreditasiSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinAkreditasiSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AkreditasiSp');

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
            $this->addJoinObject($join, 'AkreditasiSp');
        }

        return $this;
    }

    /**
     * Use the AkreditasiSp relation AkreditasiSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiSpQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasiSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AkreditasiSp', '\DataDikdas\Model\AkreditasiSpQuery');
    }

    /**
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $alat->getSekolahId(), $comparison);
        } elseif ($alat instanceof PropelObjectCollection) {
            return $this
                ->useAlatQuery()
                ->filterByPrimaryKeys($alat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlat() only accepts arguments of type Alat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alat');

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
            $this->addJoinObject($join, 'Alat');
        }

        return $this;
    }

    /**
     * Use the Alat relation Alat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatQuery A secondary query class using the current class as primary query
     */
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alat', '\DataDikdas\Model\AlatQuery');
    }

    /**
     * Filter the query by a related AnggotaGugus object
     *
     * @param   AnggotaGugus|PropelObjectCollection $anggotaGugus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaGugus($anggotaGugus, $comparison = null)
    {
        if ($anggotaGugus instanceof AnggotaGugus) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $anggotaGugus->getSekolahId(), $comparison);
        } elseif ($anggotaGugus instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaGugusQuery()
                ->filterByPrimaryKeys($anggotaGugus->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaGugus() only accepts arguments of type AnggotaGugus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaGugus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinAnggotaGugus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaGugus');

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
            $this->addJoinObject($join, 'AnggotaGugus');
        }

        return $this;
    }

    /**
     * Use the AnggotaGugus relation AnggotaGugus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaGugusQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaGugusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaGugus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaGugus', '\DataDikdas\Model\AnggotaGugusQuery');
    }

    /**
     * Filter the query by a related Angkutan object
     *
     * @param   Angkutan|PropelObjectCollection $angkutan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutan($angkutan, $comparison = null)
    {
        if ($angkutan instanceof Angkutan) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $angkutan->getSekolahId(), $comparison);
        } elseif ($angkutan instanceof PropelObjectCollection) {
            return $this
                ->useAngkutanQuery()
                ->filterByPrimaryKeys($angkutan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAngkutan() only accepts arguments of type Angkutan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Angkutan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinAngkutan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Angkutan');

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
            $this->addJoinObject($join, 'Angkutan');
        }

        return $this;
    }

    /**
     * Use the Angkutan relation Angkutan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AngkutanQuery A secondary query class using the current class as primary query
     */
    public function useAngkutanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Angkutan', '\DataDikdas\Model\AngkutanQuery');
    }

    /**
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $bangunan->getSekolahId(), $comparison);
        } elseif ($bangunan instanceof PropelObjectCollection) {
            return $this
                ->useBangunanQuery()
                ->filterByPrimaryKeys($bangunan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunan() only accepts arguments of type Bangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bangunan');

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
            $this->addJoinObject($join, 'Bangunan');
        }

        return $this;
    }

    /**
     * Use the Bangunan relation Bangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanQuery A secondary query class using the current class as primary query
     */
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Filter the query by a related Blockgrant object
     *
     * @param   Blockgrant|PropelObjectCollection $blockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlockgrant($blockgrant, $comparison = null)
    {
        if ($blockgrant instanceof Blockgrant) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $blockgrant->getSekolahId(), $comparison);
        } elseif ($blockgrant instanceof PropelObjectCollection) {
            return $this
                ->useBlockgrantQuery()
                ->filterByPrimaryKeys($blockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlockgrant() only accepts arguments of type Blockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Blockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Blockgrant');

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
            $this->addJoinObject($join, 'Blockgrant');
        }

        return $this;
    }

    /**
     * Use the Blockgrant relation Blockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Blockgrant', '\DataDikdas\Model\BlockgrantQuery');
    }

    /**
     * Filter the query by a related Buku object
     *
     * @param   Buku|PropelObjectCollection $buku  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBuku($buku, $comparison = null)
    {
        if ($buku instanceof Buku) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $buku->getSekolahId(), $comparison);
        } elseif ($buku instanceof PropelObjectCollection) {
            return $this
                ->useBukuQuery()
                ->filterByPrimaryKeys($buku->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBuku() only accepts arguments of type Buku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Buku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinBuku($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Buku');

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
            $this->addJoinObject($join, 'Buku');
        }

        return $this;
    }

    /**
     * Use the Buku relation Buku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuQuery A secondary query class using the current class as primary query
     */
    public function useBukuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Buku', '\DataDikdas\Model\BukuQuery');
    }

    /**
     * Filter the query by a related DataDynamic object
     *
     * @param   DataDynamic|PropelObjectCollection $dataDynamic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDataDynamic($dataDynamic, $comparison = null)
    {
        if ($dataDynamic instanceof DataDynamic) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $dataDynamic->getSekolahId(), $comparison);
        } elseif ($dataDynamic instanceof PropelObjectCollection) {
            return $this
                ->useDataDynamicQuery()
                ->filterByPrimaryKeys($dataDynamic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDataDynamic() only accepts arguments of type DataDynamic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DataDynamic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinDataDynamic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DataDynamic');

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
            $this->addJoinObject($join, 'DataDynamic');
        }

        return $this;
    }

    /**
     * Use the DataDynamic relation DataDynamic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DataDynamicQuery A secondary query class using the current class as primary query
     */
    public function useDataDynamicQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDataDynamic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DataDynamic', '\DataDikdas\Model\DataDynamicQuery');
    }

    /**
     * Filter the query by a related GugusSekolah object
     *
     * @param   GugusSekolah|PropelObjectCollection $gugusSekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGugusSekolah($gugusSekolah, $comparison = null)
    {
        if ($gugusSekolah instanceof GugusSekolah) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $gugusSekolah->getSekolahIntiId(), $comparison);
        } elseif ($gugusSekolah instanceof PropelObjectCollection) {
            return $this
                ->useGugusSekolahQuery()
                ->filterByPrimaryKeys($gugusSekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGugusSekolah() only accepts arguments of type GugusSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GugusSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinGugusSekolah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GugusSekolah');

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
            $this->addJoinObject($join, 'GugusSekolah');
        }

        return $this;
    }

    /**
     * Use the GugusSekolah relation GugusSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\GugusSekolahQuery A secondary query class using the current class as primary query
     */
    public function useGugusSekolahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinGugusSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GugusSekolah', '\DataDikdas\Model\GugusSekolahQuery');
    }

    /**
     * Filter the query by a related Instalasi object
     *
     * @param   Instalasi|PropelObjectCollection $instalasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInstalasi($instalasi, $comparison = null)
    {
        if ($instalasi instanceof Instalasi) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $instalasi->getSekolahId(), $comparison);
        } elseif ($instalasi instanceof PropelObjectCollection) {
            return $this
                ->useInstalasiQuery()
                ->filterByPrimaryKeys($instalasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInstalasi() only accepts arguments of type Instalasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Instalasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinInstalasi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Instalasi');

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
            $this->addJoinObject($join, 'Instalasi');
        }

        return $this;
    }

    /**
     * Use the Instalasi relation Instalasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\InstalasiQuery A secondary query class using the current class as primary query
     */
    public function useInstalasiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInstalasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Instalasi', '\DataDikdas\Model\InstalasiQuery');
    }

    /**
     * Filter the query by a related IzinOperasional object
     *
     * @param   IzinOperasional|PropelObjectCollection $izinOperasional  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByIzinOperasional($izinOperasional, $comparison = null)
    {
        if ($izinOperasional instanceof IzinOperasional) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $izinOperasional->getSekolahId(), $comparison);
        } elseif ($izinOperasional instanceof PropelObjectCollection) {
            return $this
                ->useIzinOperasionalQuery()
                ->filterByPrimaryKeys($izinOperasional->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByIzinOperasional() only accepts arguments of type IzinOperasional or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the IzinOperasional relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinIzinOperasional($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('IzinOperasional');

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
            $this->addJoinObject($join, 'IzinOperasional');
        }

        return $this;
    }

    /**
     * Use the IzinOperasional relation IzinOperasional object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\IzinOperasionalQuery A secondary query class using the current class as primary query
     */
    public function useIzinOperasionalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinIzinOperasional($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'IzinOperasional', '\DataDikdas\Model\IzinOperasionalQuery');
    }

    /**
     * Filter the query by a related JurusanSp object
     *
     * @param   JurusanSp|PropelObjectCollection $jurusanSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanSp($jurusanSp, $comparison = null)
    {
        if ($jurusanSp instanceof JurusanSp) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $jurusanSp->getSekolahId(), $comparison);
        } elseif ($jurusanSp instanceof PropelObjectCollection) {
            return $this
                ->useJurusanSpQuery()
                ->filterByPrimaryKeys($jurusanSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusanSp() only accepts arguments of type JurusanSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinJurusanSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanSp');

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
            $this->addJoinObject($join, 'JurusanSp');
        }

        return $this;
    }

    /**
     * Use the JurusanSp relation JurusanSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanSpQuery A secondary query class using the current class as primary query
     */
    public function useJurusanSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanSp', '\DataDikdas\Model\JurusanSpQuery');
    }

    /**
     * Filter the query by a related Kepanitiaan object
     *
     * @param   Kepanitiaan|PropelObjectCollection $kepanitiaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKepanitiaan($kepanitiaan, $comparison = null)
    {
        if ($kepanitiaan instanceof Kepanitiaan) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $kepanitiaan->getSekolahId(), $comparison);
        } elseif ($kepanitiaan instanceof PropelObjectCollection) {
            return $this
                ->useKepanitiaanQuery()
                ->filterByPrimaryKeys($kepanitiaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKepanitiaan() only accepts arguments of type Kepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinKepanitiaan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kepanitiaan');

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
            $this->addJoinObject($join, 'Kepanitiaan');
        }

        return $this;
    }

    /**
     * Use the Kepanitiaan relation Kepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useKepanitiaanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kepanitiaan', '\DataDikdas\Model\KepanitiaanQuery');
    }

    /**
     * Filter the query by a related LayananKhusus object
     *
     * @param   LayananKhusus|PropelObjectCollection $layananKhusus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLayananKhusus($layananKhusus, $comparison = null)
    {
        if ($layananKhusus instanceof LayananKhusus) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $layananKhusus->getSekolahId(), $comparison);
        } elseif ($layananKhusus instanceof PropelObjectCollection) {
            return $this
                ->useLayananKhususQuery()
                ->filterByPrimaryKeys($layananKhusus->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLayananKhusus() only accepts arguments of type LayananKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LayananKhusus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinLayananKhusus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LayananKhusus');

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
            $this->addJoinObject($join, 'LayananKhusus');
        }

        return $this;
    }

    /**
     * Use the LayananKhusus relation LayananKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LayananKhususQuery A secondary query class using the current class as primary query
     */
    public function useLayananKhususQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLayananKhusus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LayananKhusus', '\DataDikdas\Model\LayananKhususQuery');
    }

    /**
     * Filter the query by a related Mou object
     *
     * @param   Mou|PropelObjectCollection $mou  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMou($mou, $comparison = null)
    {
        if ($mou instanceof Mou) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $mou->getSekolahId(), $comparison);
        } elseif ($mou instanceof PropelObjectCollection) {
            return $this
                ->useMouQuery()
                ->filterByPrimaryKeys($mou->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMou() only accepts arguments of type Mou or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mou relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinMou($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mou');

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
            $this->addJoinObject($join, 'Mou');
        }

        return $this;
    }

    /**
     * Use the Mou relation Mou object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MouQuery A secondary query class using the current class as primary query
     */
    public function useMouQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMou($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mou', '\DataDikdas\Model\MouQuery');
    }

    /**
     * Filter the query by a related PesertaDidikBaru object
     *
     * @param   PesertaDidikBaru|PropelObjectCollection $pesertaDidikBaru  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikBaru($pesertaDidikBaru, $comparison = null)
    {
        if ($pesertaDidikBaru instanceof PesertaDidikBaru) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $pesertaDidikBaru->getSekolahId(), $comparison);
        } elseif ($pesertaDidikBaru instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikBaruQuery()
                ->filterByPrimaryKeys($pesertaDidikBaru->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikBaru() only accepts arguments of type PesertaDidikBaru or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikBaru relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinPesertaDidikBaru($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikBaru');

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
            $this->addJoinObject($join, 'PesertaDidikBaru');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikBaru relation PesertaDidikBaru object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikBaruQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikBaruQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikBaru($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikBaru', '\DataDikdas\Model\PesertaDidikBaruQuery');
    }

    /**
     * Filter the query by a related ProgramInklusi object
     *
     * @param   ProgramInklusi|PropelObjectCollection $programInklusi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProgramInklusi($programInklusi, $comparison = null)
    {
        if ($programInklusi instanceof ProgramInklusi) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $programInklusi->getSekolahId(), $comparison);
        } elseif ($programInklusi instanceof PropelObjectCollection) {
            return $this
                ->useProgramInklusiQuery()
                ->filterByPrimaryKeys($programInklusi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProgramInklusi() only accepts arguments of type ProgramInklusi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProgramInklusi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinProgramInklusi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProgramInklusi');

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
            $this->addJoinObject($join, 'ProgramInklusi');
        }

        return $this;
    }

    /**
     * Use the ProgramInklusi relation ProgramInklusi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\ProgramInklusiQuery A secondary query class using the current class as primary query
     */
    public function useProgramInklusiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProgramInklusi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProgramInklusi', '\DataDikdas\Model\ProgramInklusiQuery');
    }

    /**
     * Filter the query by a related PtkBaru object
     *
     * @param   PtkBaru|PropelObjectCollection $ptkBaru  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkBaru($ptkBaru, $comparison = null)
    {
        if ($ptkBaru instanceof PtkBaru) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $ptkBaru->getSekolahId(), $comparison);
        } elseif ($ptkBaru instanceof PropelObjectCollection) {
            return $this
                ->usePtkBaruQuery()
                ->filterByPrimaryKeys($ptkBaru->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtkBaru() only accepts arguments of type PtkBaru or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkBaru relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinPtkBaru($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkBaru');

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
            $this->addJoinObject($join, 'PtkBaru');
        }

        return $this;
    }

    /**
     * Use the PtkBaru relation PtkBaru object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkBaruQuery A secondary query class using the current class as primary query
     */
    public function usePtkBaruQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtkBaru($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkBaru', '\DataDikdas\Model\PtkBaruQuery');
    }

    /**
     * Filter the query by a related PtkTerdaftar object
     *
     * @param   PtkTerdaftar|PropelObjectCollection $ptkTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkTerdaftar($ptkTerdaftar, $comparison = null)
    {
        if ($ptkTerdaftar instanceof PtkTerdaftar) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $ptkTerdaftar->getSekolahId(), $comparison);
        } elseif ($ptkTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePtkTerdaftarQuery()
                ->filterByPrimaryKeys($ptkTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtkTerdaftar() only accepts arguments of type PtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinPtkTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkTerdaftar');

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
            $this->addJoinObject($join, 'PtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PtkTerdaftar relation PtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkTerdaftar', '\DataDikdas\Model\PtkTerdaftarQuery');
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $registrasiPesertaDidik->getSekolahId(), $comparison);
        } elseif ($registrasiPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useRegistrasiPesertaDidikQuery()
                ->filterByPrimaryKeys($registrasiPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRegistrasiPesertaDidik() only accepts arguments of type RegistrasiPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RegistrasiPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RegistrasiPesertaDidik');

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
            $this->addJoinObject($join, 'RegistrasiPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the RegistrasiPesertaDidik relation RegistrasiPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RegistrasiPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $rombonganBelajar->getSekolahId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            return $this
                ->useRombonganBelajarQuery()
                ->filterByPrimaryKeys($rombonganBelajar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $ruang->getSekolahId(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            return $this
                ->useRuangQuery()
                ->filterByPrimaryKeys($ruang->getPrimaryKeys())
                ->endUse();
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
     * @return SekolahQuery The current query, for fluid interface
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
     * Filter the query by a related Sanitasi object
     *
     * @param   Sanitasi|PropelObjectCollection $sanitasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySanitasi($sanitasi, $comparison = null)
    {
        if ($sanitasi instanceof Sanitasi) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $sanitasi->getSekolahId(), $comparison);
        } elseif ($sanitasi instanceof PropelObjectCollection) {
            return $this
                ->useSanitasiQuery()
                ->filterByPrimaryKeys($sanitasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySanitasi() only accepts arguments of type Sanitasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sanitasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinSanitasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sanitasi');

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
            $this->addJoinObject($join, 'Sanitasi');
        }

        return $this;
    }

    /**
     * Use the Sanitasi relation Sanitasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SanitasiQuery A secondary query class using the current class as primary query
     */
    public function useSanitasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSanitasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sanitasi', '\DataDikdas\Model\SanitasiQuery');
    }

    /**
     * Filter the query by a related SasaranPengawasan object
     *
     * @param   SasaranPengawasan|PropelObjectCollection $sasaranPengawasan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySasaranPengawasan($sasaranPengawasan, $comparison = null)
    {
        if ($sasaranPengawasan instanceof SasaranPengawasan) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $sasaranPengawasan->getSekolahId(), $comparison);
        } elseif ($sasaranPengawasan instanceof PropelObjectCollection) {
            return $this
                ->useSasaranPengawasanQuery()
                ->filterByPrimaryKeys($sasaranPengawasan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySasaranPengawasan() only accepts arguments of type SasaranPengawasan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SasaranPengawasan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinSasaranPengawasan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SasaranPengawasan');

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
            $this->addJoinObject($join, 'SasaranPengawasan');
        }

        return $this;
    }

    /**
     * Use the SasaranPengawasan relation SasaranPengawasan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SasaranPengawasanQuery A secondary query class using the current class as primary query
     */
    public function useSasaranPengawasanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSasaranPengawasan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SasaranPengawasan', '\DataDikdas\Model\SasaranPengawasanQuery');
    }

    /**
     * Filter the query by a related SekolahLongitudinal object
     *
     * @param   SekolahLongitudinal|PropelObjectCollection $sekolahLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahLongitudinal($sekolahLongitudinal, $comparison = null)
    {
        if ($sekolahLongitudinal instanceof SekolahLongitudinal) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $sekolahLongitudinal->getSekolahId(), $comparison);
        } elseif ($sekolahLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useSekolahLongitudinalQuery()
                ->filterByPrimaryKeys($sekolahLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahLongitudinal() only accepts arguments of type SekolahLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
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
     * Filter the query by a related SekolahPaud object
     *
     * @param   SekolahPaud|PropelObjectCollection $sekolahPaud  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahPaud($sekolahPaud, $comparison = null)
    {
        if ($sekolahPaud instanceof SekolahPaud) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $sekolahPaud->getSekolahId(), $comparison);
        } elseif ($sekolahPaud instanceof PropelObjectCollection) {
            return $this
                ->useSekolahPaudQuery()
                ->filterByPrimaryKeys($sekolahPaud->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahPaud() only accepts arguments of type SekolahPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahPaud relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinSekolahPaud($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahPaud');

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
            $this->addJoinObject($join, 'SekolahPaud');
        }

        return $this;
    }

    /**
     * Use the SekolahPaud relation SekolahPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahPaudQuery A secondary query class using the current class as primary query
     */
    public function useSekolahPaudQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahPaud($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahPaud', '\DataDikdas\Model\SekolahPaudQuery');
    }

    /**
     * Filter the query by a related Tanah object
     *
     * @param   Tanah|PropelObjectCollection $tanah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanah($tanah, $comparison = null)
    {
        if ($tanah instanceof Tanah) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $tanah->getSekolahId(), $comparison);
        } elseif ($tanah instanceof PropelObjectCollection) {
            return $this
                ->useTanahQuery()
                ->filterByPrimaryKeys($tanah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanah() only accepts arguments of type Tanah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tanah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinTanah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tanah');

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
            $this->addJoinObject($join, 'Tanah');
        }

        return $this;
    }

    /**
     * Use the Tanah relation Tanah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahQuery A secondary query class using the current class as primary query
     */
    public function useTanahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tanah', '\DataDikdas\Model\TanahQuery');
    }

    /**
     * Filter the query by a related TugasTambahan object
     *
     * @param   TugasTambahan|PropelObjectCollection $tugasTambahan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTugasTambahan($tugasTambahan, $comparison = null)
    {
        if ($tugasTambahan instanceof TugasTambahan) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $tugasTambahan->getSekolahId(), $comparison);
        } elseif ($tugasTambahan instanceof PropelObjectCollection) {
            return $this
                ->useTugasTambahanQuery()
                ->filterByPrimaryKeys($tugasTambahan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTugasTambahan() only accepts arguments of type TugasTambahan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TugasTambahan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinTugasTambahan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TugasTambahan');

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
            $this->addJoinObject($join, 'TugasTambahan');
        }

        return $this;
    }

    /**
     * Use the TugasTambahan relation TugasTambahan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TugasTambahanQuery A secondary query class using the current class as primary query
     */
    public function useTugasTambahanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTugasTambahan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TugasTambahan', '\DataDikdas\Model\TugasTambahanQuery');
    }

    /**
     * Filter the query by a related UnitUsaha object
     *
     * @param   UnitUsaha|PropelObjectCollection $unitUsaha  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUnitUsaha($unitUsaha, $comparison = null)
    {
        if ($unitUsaha instanceof UnitUsaha) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $unitUsaha->getSekolahId(), $comparison);
        } elseif ($unitUsaha instanceof PropelObjectCollection) {
            return $this
                ->useUnitUsahaQuery()
                ->filterByPrimaryKeys($unitUsaha->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUnitUsaha() only accepts arguments of type UnitUsaha or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnitUsaha relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinUnitUsaha($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnitUsaha');

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
            $this->addJoinObject($join, 'UnitUsaha');
        }

        return $this;
    }

    /**
     * Use the UnitUsaha relation UnitUsaha object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnitUsahaQuery A secondary query class using the current class as primary query
     */
    public function useUnitUsahaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUnitUsaha($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnitUsaha', '\DataDikdas\Model\UnitUsahaQuery');
    }

    /**
     * Filter the query by a related VldSekolah object
     *
     * @param   VldSekolah|PropelObjectCollection $vldSekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldSekolah($vldSekolah, $comparison = null)
    {
        if ($vldSekolah instanceof VldSekolah) {
            return $this
                ->addUsingAlias(SekolahPeer::SEKOLAH_ID, $vldSekolah->getSekolahId(), $comparison);
        } elseif ($vldSekolah instanceof PropelObjectCollection) {
            return $this
                ->useVldSekolahQuery()
                ->filterByPrimaryKeys($vldSekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldSekolah() only accepts arguments of type VldSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function joinVldSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldSekolah');

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
            $this->addJoinObject($join, 'VldSekolah');
        }

        return $this;
    }

    /**
     * Use the VldSekolah relation VldSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldSekolahQuery A secondary query class using the current class as primary query
     */
    public function useVldSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldSekolah', '\DataDikdas\Model\VldSekolahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sekolah $sekolah Object to remove from the list of results
     *
     * @return SekolahQuery The current query, for fluid interface
     */
    public function prune($sekolah = null)
    {
        if ($sekolah) {
            $this->addUsingAlias(SekolahPeer::SEKOLAH_ID, $sekolah->getSekolahId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
