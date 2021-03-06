<?php
/**
 * Class that operate on table 'rapor_kkm'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class RaporKkmMySqlDAO implements RaporKkmDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporKkmDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_kkm WHERE id_kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_kkm';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_kkm ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporKkm primary key
 	 */
	public function delete($id_kkm){
		$sql = 'DELETE FROM rapor_kkm WHERE id_kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kkm);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporKkmDTO raporKkm
 	 */
	public function insert($raporKkm){
		$sql = 'INSERT INTO rapor_kkm (kkm, bobot_ph, bobot_pts, bobot_pas, bobot_absen, beban_jam, id_tp, id_smt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporKkm->kkm);
		$sqlQuery->setNumber($raporKkm->bobot_ph);
		$sqlQuery->setNumber($raporKkm->bobot_pts);
		$sqlQuery->setNumber($raporKkm->bobot_pas);
		$sqlQuery->setNumber($raporKkm->bobot_absen);
		$sqlQuery->setNumber($raporKkm->beban_jam);
		$sqlQuery->setNumber($raporKkm->id_tp);
		$sqlQuery->setNumber($raporKkm->id_smt);

		$id = $this->executeInsert($sqlQuery);	
		$raporKkm->id_kkm = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporKkmDTO raporKkm
 	 */
	public function update($raporKkm){
		$sql = 'UPDATE rapor_kkm SET kkm = ?, bobot_ph = ?, bobot_pts = ?, bobot_pas = ?, bobot_absen = ?, beban_jam = ?, id_tp = ?, id_smt = ? WHERE id_kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporKkm->kkm);
		$sqlQuery->setNumber($raporKkm->bobot_ph);
		$sqlQuery->setNumber($raporKkm->bobot_pts);
		$sqlQuery->setNumber($raporKkm->bobot_pas);
		$sqlQuery->setNumber($raporKkm->bobot_absen);
		$sqlQuery->setNumber($raporKkm->beban_jam);
		$sqlQuery->setNumber($raporKkm->id_tp);
		$sqlQuery->setNumber($raporKkm->id_smt);

		$sqlQuery->setNumber($raporKkm->id_kkm);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_kkm';
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
		$sql = 'SELECT * FROM rapor_kkm WHERE ';
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

	public function queryByIdKkm($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE id_kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByKkm($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPh($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE bobot_ph = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPts($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE bobot_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPas($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE bobot_pas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotAbsen($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE bobot_absen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBebanJam($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE beban_jam = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_kkm WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKkm($value){
		$sql = 'DELETE FROM rapor_kkm WHERE id_kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKkm($value){
		$sql = 'DELETE FROM rapor_kkm WHERE kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPh($value){
		$sql = 'DELETE FROM rapor_kkm WHERE bobot_ph = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPts($value){
		$sql = 'DELETE FROM rapor_kkm WHERE bobot_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPas($value){
		$sql = 'DELETE FROM rapor_kkm WHERE bobot_pas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotAbsen($value){
		$sql = 'DELETE FROM rapor_kkm WHERE bobot_absen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBebanJam($value){
		$sql = 'DELETE FROM rapor_kkm WHERE beban_jam = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_kkm WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_kkm WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_kkm';
		
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
	 * @return RaporKkmDTO
	 */
	protected function readRow($row){
		$raporKkm = new RaporKkmDTO();
		
		$raporKkm->id_kkm = isset($row['id_kkm']) ? $row['id_kkm'] : null;
		$raporKkm->kkm = isset($row['kkm']) ? $row['kkm'] : null;
		$raporKkm->bobot_ph = isset($row['bobot_ph']) ? $row['bobot_ph'] : null;
		$raporKkm->bobot_pts = isset($row['bobot_pts']) ? $row['bobot_pts'] : null;
		$raporKkm->bobot_pas = isset($row['bobot_pas']) ? $row['bobot_pas'] : null;
		$raporKkm->bobot_absen = isset($row['bobot_absen']) ? $row['bobot_absen'] : null;
		$raporKkm->beban_jam = isset($row['beban_jam']) ? $row['beban_jam'] : null;
		$raporKkm->id_tp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporKkm->id_smt = isset($row['id_smt']) ? $row['id_smt'] : null;

		return $raporKkm;
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
	 * @return RaporKkmDTO
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