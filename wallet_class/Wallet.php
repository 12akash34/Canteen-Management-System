<?php

require_once 'database/dbcon.php';

class WalletException extends DbconException { }

/*
* Collects Funds, Stores, Accounts for it and gives the Financial statement.
*
* @param $_responseBody array response of the method
* @param $_db			object	The database connection	
* @param $conn			array  	Connection
*/
class Wallet extends Dbcon {
  	protected $responseBody;
  	protected $conn;
  
    public function __construct()
    {
        parent::__construct();
        $this->conn			= $this->databaseConnect();
        $this->responseBody	= array();

        date_default_timezone_set("Asia/Kolkata");
    }

    /*
     * Selects data from the wallet
     *
     * @param string $table		The source table
     * @param array  $where		WHERE clause
     * @param array  $options_	    The fields to select
     * @return array $this->responseBody
     * @throws WalletException
     */
    public function walletRead($table, Array $where = array(), Array $options_ = array())
    {
        $feedback	= array();
        if(strlen($table) == 0 || count($options_) < 1){
            throw new walletException('Please supply both table and the option parameters');
        }
        $count      = 0;
        $fields     = '';
        $where_as   = '';
        if(count($options_) == 1 && $options_ == '*'){
            //select all
            $fields = ' * ';
        }
        else{
            foreach ($options_ as $column_name){
                if($count++ != 0) $fields .= ', ';
                $column_name 	= mysqli_real_escape_string($this->conn, $column_name);
                $fields		.= "`$column_name`";
            }
        }
        //where
        foreach($where as $column_name=>$value){
            if($count++ != 0) $where_as .= '';
            $column_name 	= mysqli_real_escape_string($this->conn, $column_name);
            $value 		    = mysqli_real_escape_string($this->conn, $value);
            $where_as		.= "`$column_name` = $value";
        }
        if(count($where) > 0 ){
            //prepared sql Command
            $sql = "SELECT $fields FROM $table WHERE $where_as;";
        }
        else{
            //prepared sql Command
            $sql = "SELECT $fields FROM $table";
        }
        if($this->conn->query($sql)){
            //Send the user the feedback
            $results	=	$this->conn->query($sql);
            if($results->num_rows > 0){
                //rows were found
                $feedback['rows'] = $results;
            }
            else{
                //0 rows
                throw new walletException('Returned Zero rows');
            }

            $this->responseBody = $feedback;
        }
        else{
            //sql went wrong
            throw new walletException($sql.' '.$this->conn->error);
        }

        return $this->responseBody;

    }

    /*
     * Adds funds on the wallet
     *
     * @param string $table
     * @param array $options_
     *
     * @return array responseBody
     * @throws WalletException
     */
    public function walletTopUp($table, Array $options_ = array())
    {
        $feedback	= array();
        if(strlen($table) == 0 || count($options_) < 1){
            throw new walletException('Please supply both table and the column parameters');
        }
        $count  = 0;
        $fields = '';
        foreach($options_ as $column_name => $value){
            if($count++ != 0) $fields .= ', ';
            $column_name 	= mysqli_real_escape_string($this->conn, $column_name);
            $value 		    = mysqli_real_escape_string($this->conn, $value);
            $fields		    .= "`$column_name` = '$value'";
        }

        //prepared sql Command
        $sql = "INSERT INTO `$table` SET $fields;";
        if($this->conn->query($sql) === TRUE){
            //Send the user the feedback
            $feedback['message'] = 'Top up was successful ';
            $feedback['fields']  = $options_;

            $this->responseBody  = $this->arrayToObject($feedback);
        }
        else{
            //sql went wrong
            throw new walletException($sql.' '.$this->conn->error);
        }

        return $this->responseBody;

    }

    /*
     * wallet widthrawal cash from the wallet / credit the wallet_out
     *
     * @param string $table
     * @param array $options_
     *
     * @return array
     * @throws WalletException
     */
    public function walletWithdrawal($table , Array $options_ = array())
    {
        //this is just a top_up to wallet Out/Inherit Top up method

        //convert the object to array
        $feedback		        = $this->objectToArray((object) $this->walletTopUp($table, $options_));
        $feedback['message']    = 'widthrawal was successful ';

        $this->responseBody     = $this->arrayToObject($feedback);
        return $this->responseBody;
    }

    /**
     * Find the sum of a table
     *
     * @param string $table
     * @param array $where
     * @param array $options_
     * @return float $responseBody
     * @throws WalletException
     * @throws WalletException
     * @throws WalletException
     * @throws WalletException
     */
    public function walletSum($table, Array $where = array(), Array $options_ = array())
    {
        $count        =   0;
        $fields       =   '';
        $where_as     =   '';

        if(strlen($table) == 0 || count($options_) < 1){
            throw new walletException('Please supply both table and the option parameters');
        }

        //Use AND Gate
        if(count($where) > 1){
            //where
            foreach($where as $column_name => $value){
                if($count++ != 0) $where_as .= ' AND ';
                $column_name 	= mysqli_real_escape_string($this->conn, $column_name);
                $value 		= mysqli_real_escape_string($this->conn, $value);
                $where_as		.= "`$column_name` = '$value'";
            }
        }
        else{
            //where
            foreach($where as $column_name => $value){
                if($count++ != 0) $where_as .= '';
                $column_name 	= mysqli_real_escape_string($this->conn, $column_name);
                $value 		= mysqli_real_escape_string($this->conn, $value);
                $where_as		.= "`$column_name` = '$value'";
            }
        }

        //fields & values
        if(count($options_) == 1){
            foreach ($options_ as $column_name){
                if ($count++ != 0) $fields .= '';
                $column_name 	= mysqli_real_escape_string($this->conn, $column_name);
                $fields		.= "$column_name";
            }
        }
        else{
            throw new WalletException('More than one fields were given for SUM function');
        }

        if(count($where) >= 1 && isset($where)){
            //prepared sql Command
            $sql	=	"SELECT SUM($fields) AS $fields  FROM $table WHERE $where_as ;";
        }
        elseif(count($where) <=0 ||  !isset($where)){
            //prepared sql Command
            $sql	=	"SELECT SUM($fields)AS $fields FROM $table;";
        }
        else{
            throw new WalletException('the where clause can\'t be more than 1 items');
        }

        if ($this->conn->query($sql)){
            //Send the user the feedback
            $results	=	$this->conn->query($sql);
            if($results){
                //rows were found
                $sum		 	    = $results->fetch_assoc();
                $total_sum 		= (float)$sum[$fields];
            }
            else{
                //0 rows
                $total_sum 	=	0;
            }

            $this->responseBody = $total_sum;
        }
        else{
            //sql went wrong
            throw new walletException($sql.' '.$this->conn->error);
        }


        return $this->responseBody;

    }

    /**
     * Fetches the wallet balance,You can load your Currency & preAppend here e.g USD. Balance
     *
     * @param string $table1 This is the table that stores Cash In
     * @param string $table2 The Cash OUT / Withdrawals
     * @param array $where Specifies the records to be picked MOST probably userId
     * @param array $options_ The fields to be picked. Advisable to Amount field e.g array('amount')
     * @return double Balance
     *
     * @throws WalletException
     * @throws WalletException
     */
    public function walletBalance($table1, $table2, Array $where = array(), Array $options_ = array())
    {
        //total amount in wallet in less total amount in wallet out
        //total wallet in
        $total_wallet_in	=	$this->walletSum($table1, $where, $options_);

        //total wallet out
        $total_wallet_out	=   $this->walletSum($table2, $where, $options_);

        //wallet balance
        //make sure the deviant is not zero
        if($total_wallet_in==0){
            //cant divide by 0
            //throw new WalletException('Can\'t divide by 0 ');
            $walletBalance		=	0;
        }
        else{
            $walletBalance		=	$total_wallet_in - $total_wallet_out;
        }

        $this->responseBody	=	number_format($walletBalance,2);

        return $this->responseBody;

    }

    /*
     * convert arrays to objects
     * @param $array $array
     * @return object $array
     */
    public function arrayToObject($array)
    {
        return (object) $array;

    }

    /*
     * convert arrays to object
     *
     * @param object $object
     * @return array
     */
    public function objectToArray($object)
    {
	    return (array) $object;

    }

//End of Wallet Class
}