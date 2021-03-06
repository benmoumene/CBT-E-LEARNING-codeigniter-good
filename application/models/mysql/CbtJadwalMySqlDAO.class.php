<?php
/**
 * Class that operate on table 'cbt_jadwal'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class CbtJadwalMySqlDAO implements CbtJadwalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtJadwalDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_jadwal WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_jadwal';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_jadwal ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtJadwal primary key
 	 */
	public function delete($id_jadwal){
		$sql = 'DELETE FROM cbt_jadwal WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_jadwal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJadwalDTO cbtJadwal
 	 */
	public function insert($cbtJadwal){
		$sql = 'INSERT INTO cbt_jadwal (id_tp, id_smt, id_bank, id_jenis, tgl_mulai, tgl_selesai, durasi_ujian, pengawas, acak_soal, acak_opsi, hasil_tampil, token, status, ulang, reset_login, rekap, jam_ke, jarak) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtJadwal->id_tp);
		$sqlQuery->setNumber($cbtJadwal->id_smt);
		$sqlQuery->setNumber($cbtJadwal->id_bank);
		$sqlQuery->setNumber($cbtJadwal->id_jenis);
		$sqlQuery->set($cbtJadwal->tgl_mulai);
		$sqlQuery->set($cbtJadwal->tgl_selesai);
		$sqlQuery->setNumber($cbtJadwal->durasi_ujian);
		$sqlQuery->set($cbtJadwal->pengawas);
		$sqlQuery->setNumber($cbtJadwal->acak_soal);
		$sqlQuery->setNumber($cbtJadwal->acak_opsi);
		$sqlQuery->setNumber($cbtJadwal->hasil_tampil);
		$sqlQuery->setNumber($cbtJadwal->token);
		$sqlQuery->setNumber($cbtJadwal->status);
		$sqlQuery->setNumber($cbtJadwal->ulang);
		$sqlQuery->setNumber($cbtJadwal->reset_login);
		$sqlQuery->setNumber($cbtJadwal->rekap);
		$sqlQuery->setNumber($cbtJadwal->jam_ke);
		$sqlQuery->setNumber($cbtJadwal->jarak);

		$id = $this->executeInsert($sqlQuery);	
		$cbtJadwal->id_jadwal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJadwalDTO cbtJadwal
 	 */
	public function update($cbtJadwal){
		$sql = 'UPDATE cbt_jadwal SET id_tp = ?, id_smt = ?, id_bank = ?, id_jenis = ?, tgl_mulai = ?, tgl_selesai = ?, durasi_ujian = ?, pengawas = ?, acak_soal = ?, acak_opsi = ?, hasil_tampil = ?, token = ?, status = ?, ulang = ?, reset_login = ?, rekap = ?, jam_ke = ?, jarak = ? WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtJadwal->id_tp);
		$sqlQuery->setNumber($cbtJadwal->id_smt);
		$sqlQuery->setNumber($cbtJadwal->id_bank);
		$sqlQuery->setNumber($cbtJadwal->id_jenis);
		$sqlQuery->set($cbtJadwal->tgl_mulai);
		$sqlQuery->set($cbtJadwal->tgl_selesai);
		$sqlQuery->setNumber($cbtJadwal->durasi_ujian);
		$sqlQuery->set($cbtJadwal->pengawas);
		$sqlQuery->setNumber($cbtJadwal->acak_soal);
		$sqlQuery->setNumber($cbtJadwal->acak_opsi);
		$sqlQuery->setNumber($cbtJadwal->hasil_tampil);
		$sqlQuery->setNumber($cbtJadwal->token);
		$sqlQuery->setNumber($cbtJadwal->status);
		$sqlQuery->setNumber($cbtJadwal->ulang);
		$sqlQuery->setNumber($cbtJadwal->reset_login);
		$sqlQuery->setNumber($cbtJadwal->rekap);
		$sqlQuery->setNumber($cbtJadwal->jam_ke);
		$sqlQuery->setNumber($cbtJadwal->jarak);

		$sqlQuery->setNumber($cbtJadwal->id_jadwal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_jadwal';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	* @param $sql
	* @param bool $single
	*/
	public function execQuery($sql, $single = false) {
	$sqlQuery = new SqlQuery($sql);
	if ($single === true)
		return $this->getRow($sqlQuery);
	else
		return $this->getList($sqlQuery);
	}

	/**
	* @param $arr_values
	* @param bool $single
	*/
	public function queryByKeys($arr_values, $single = false){
		$no = 0;
		$count = count($arr_values);
		$values = [];
		$sql = 'SELECT * FROM cbt_jadwal WHERE ';
		foreach ($arr_values as $key=>$value) {
			$sql .= $key.' = ?';
			if(++$no !== $count) {
				$sql .= ' AND ';
			}
			array_push($values, $value);
		}

		$sqlQuery = new SqlQuery($sql);
		foreach ($values as $value) {
			$sqlQuery->set($value);
		}
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdBank($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglMulai($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglSelesai($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE tgl_selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDurasiUjian($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE durasi_ujian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPengawas($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE pengawas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAcakSoal($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE acak_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAcakOpsi($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE acak_opsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHasilTampil($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE hasil_tampil = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByToken($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUlang($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE ulang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByResetLogin($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE reset_login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRekap($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE rekap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJamKe($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE jam_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJarak($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal WHERE jarak = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdBank($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJenis($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglMulai($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglSelesai($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE tgl_selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDurasiUjian($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE durasi_ujian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPengawas($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE pengawas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAcakSoal($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE acak_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAcakOpsi($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE acak_opsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHasilTampil($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE hasil_tampil = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByToken($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUlang($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE ulang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByResetLogin($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE reset_login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRekap($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE rekap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJamKe($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE jam_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJarak($value){
		$sql = 'DELETE FROM cbt_jadwal WHERE jarak = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_jadwal';
		
		if ($where !== false){
			$sql.=' where ';
			$whereArr = array();
			foreach($where as $clause => $val) {
				$whereArr[] = $clause.'=\''.$val.'\'';
			}
			$sql.=' where '.implode(',',$whereArr);
		}
		$sqlQuery = new SqlQuery($sql);
		return $this->querySingleResult($sqlQuery);
	 }
	
	/**
	 * Read row
	 *
	 * @return CbtJadwalDTO
	 */
	protected function readRow($row){
		$cbtJadwal = new CbtJadwalDTO();
		
		$cbtJadwal->id_jadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$cbtJadwal->id_tp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$cbtJadwal->id_smt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$cbtJadwal->id_bank = isset($row['id_bank']) ? $row['id_bank'] : null;
		$cbtJadwal->id_jenis = isset($row['id_jenis']) ? $row['id_jenis'] : null;
		$cbtJadwal->tgl_mulai = isset($row['tgl_mulai']) ? $row['tgl_mulai'] : null;
		$cbtJadwal->tgl_selesai = isset($row['tgl_selesai']) ? $row['tgl_selesai'] : null;
		$cbtJadwal->durasi_ujian = isset($row['durasi_ujian']) ? $row['durasi_ujian'] : null;
		$cbtJadwal->pengawas = isset($row['pengawas']) ? $row['pengawas'] : null;
		$cbtJadwal->acak_soal = isset($row['acak_soal']) ? $row['acak_soal'] : null;
		$cbtJadwal->acak_opsi = isset($row['acak_opsi']) ? $row['acak_opsi'] : null;
		$cbtJadwal->hasil_tampil = isset($row['hasil_tampil']) ? $row['hasil_tampil'] : null;
		$cbtJadwal->token = isset($row['token']) ? $row['token'] : null;
		$cbtJadwal->status = isset($row['status']) ? $row['status'] : null;
		$cbtJadwal->ulang = isset($row['ulang']) ? $row['ulang'] : null;
		$cbtJadwal->reset_login = isset($row['reset_login']) ? $row['reset_login'] : null;
		$cbtJadwal->rekap = isset($row['rekap']) ? $row['rekap'] : null;
		$cbtJadwal->jam_ke = isset($row['jam_ke']) ? $row['jam_ke'] : null;
		$cbtJadwal->jarak = isset($row['jarak']) ? $row['jarak'] : null;

		return $cbtJadwal;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return CbtJadwalDTO
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);

		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>