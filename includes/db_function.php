<?php
if(!function_exists('db_connect'))
{
 /**
*Initialize db connection
*@return mixed
*
 **/
function db_connect()
{
	$conn=mysqli_connect(config('db_host'),config('db_user'),config('db_pass'),config('db_name'));
	if(!$conn)
	{
		die('Error while connecting database. '.mysqli_connect_error());
	}
	else
	{
		return $conn;
	}
}

}
if(!function_exists('db_query'))
{   /**
     *Execute a data base query
     *@param mixed $con
     *@param string $sql
     *@return mixed
	**/
	function db_query($con,$sql)
	{
		return mysqli_query($con,$sql);
	}
}
if(!function_exists('db_fetch_assoc'))
{   /**
	*Fetches associative array data from query result
	*@param mixed $result
	*@return array  
	**/
	function db_fetch_assoc($result)
	{
		return mysqli_fetch_assoc($result);
	}
}
if(!function_exists('db_num_rows'))
{   /**
	 *count number of row in array
     *@param mixed $result
     *@return int
	**/
	function db_num_rows($result)
	{
		return mysqli_num_rows($result);
	}
}
if(!function_exists('db_error'))
{  /**
	*Return database error
	*@param mixed $con
	*@return string
	**/
 function db_error($con)
 {

 	return mysqli_error($con);
 }

}
if(!function_exists('db_insert_id'))
{   /**
     *Returns ID of last inserted data
     *@param mixed $con
     *@return int 
     **/
	function db_insert_id($con)
	{
		return mysqli_insert_id($con);
	}
}

?>