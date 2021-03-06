<?php
/**
 * Class that operate on table 'post_comments'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class PostCommentsMySqlDAO implements PostCommentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PostCommentsDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM post_comments WHERE id_comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM post_comments';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM post_comments ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param postComment primary key
 	 */
	public function delete($id_comment){
		$sql = 'DELETE FROM post_comments WHERE id_comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_comment);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostCommentsDTO postComment
 	 */
	public function insert($postComment){
		$sql = 'INSERT INTO post_comments (id_post, dari, dari_group, text, tanggal, updated) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($postComment->id_post);
		$sqlQuery->setNumber($postComment->dari);
		$sqlQuery->setNumber($postComment->dari_group);
		$sqlQuery->set($postComment->text);
		$sqlQuery->set($postComment->tanggal);
		$sqlQuery->set($postComment->updated);

		$id = $this->executeInsert($sqlQuery);	
		$postComment->id_comment = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostCommentsDTO postComment
 	 */
	public function update($postComment){
		$sql = 'UPDATE post_comments SET id_post = ?, dari = ?, dari_group = ?, text = ?, tanggal = ?, updated = ? WHERE id_comment = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($postComment->id_post);
		$sqlQuery->setNumber($postComment->dari);
		$sqlQuery->setNumber($postComment->dari_group);
		$sqlQuery->set($postComment->text);
		$sqlQuery->set($postComment->tanggal);
		$sqlQuery->set($postComment->updated);

		$sqlQuery->setNumber($postComment->id_comment);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM post_comments';
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
		$sql = 'SELECT * FROM post_comments WHERE ';
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

	public function queryByIdComment($value, $single = false){
		$sql = 'SELECT * FROM post_comments WHERE id_comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdPost($value, $single = false){
		$sql = 'SELECT * FROM post_comments WHERE id_post = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDari($value, $single = false){
		$sql = 'SELECT * FROM post_comments WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDariGroup($value, $single = false){
		$sql = 'SELECT * FROM post_comments WHERE dari_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM post_comments WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTanggal($value, $single = false){
		$sql = 'SELECT * FROM post_comments WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUpdated($value, $single = false){
		$sql = 'SELECT * FROM post_comments WHERE updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdComment($value){
		$sql = 'DELETE FROM post_comments WHERE id_comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPost($value){
		$sql = 'DELETE FROM post_comments WHERE id_post = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDari($value){
		$sql = 'DELETE FROM post_comments WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDariGroup($value){
		$sql = 'DELETE FROM post_comments WHERE dari_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM post_comments WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTanggal($value){
		$sql = 'DELETE FROM post_comments WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdated($value){
		$sql = 'DELETE FROM post_comments WHERE updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from post_comments';
		
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
	 * @return PostCommentsDTO
	 */
	protected function readRow($row){
		$postComment = new PostCommentsDTO();
		
		$postComment->id_comment = isset($row['id_comment']) ? $row['id_comment'] : null;
		$postComment->id_post = isset($row['id_post']) ? $row['id_post'] : null;
		$postComment->dari = isset($row['dari']) ? $row['dari'] : null;
		$postComment->dari_group = isset($row['dari_group']) ? $row['dari_group'] : null;
		$postComment->text = isset($row['text']) ? $row['text'] : null;
		$postComment->tanggal = isset($row['tanggal']) ? $row['tanggal'] : null;
		$postComment->updated = isset($row['updated']) ? $row['updated'] : null;

		return $postComment;
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
	 * @return PostCommentsDTO
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