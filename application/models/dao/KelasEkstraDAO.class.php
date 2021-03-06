<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
interface KelasEkstraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasEkstra 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param kelasEkstra primary key
 	 */
	public function delete($id_kelas_ekstra);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasEkstra kelasEkstra
 	 */
	public function insert($kelasEkstra);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasEkstra kelasEkstra
 	 */
	public function update($kelasEkstra);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByEkstra($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdKelas($value);

	public function deleteByEkstra($value);


}
?>