<?php
include_once 'dbconnect.php';
include_once  'interface1.php';

class dao implements interface1 
{    
    private $conn;
    function __construct() 
    {
        //include_once './config.php';
       
        $db=new DbConnect();
        $this->conn=$db->connect();
    }
    function dbCon() {
     $db=new dbconnect();
     return  $this->conn=$db->connect();
   }

    //data insert funtion
    function insert($table,$value)
    {
        $field="";
        $val="";
        $i=0;
        
        foreach ($value as $k => $v)
        {
            $v = $this->conn->real_escape_string($v);
            if($i == 0)
            {
                $field.=$k;
                $val.="'".$v."'";
            }
            
            else 
            {
                $field.=",".$k;
                $val.=",'".$v."'";
                
            }
            $i++;
            
        }
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"INSERT INTO $table($field) VALUES($val)") or die(mysqli_error($this->conn));
    }

    // insert log
    function insert_log($role_id,$user_id,$user_name,$log_name,$mac,$modal_type)
    {   
      $user_name = $this->conn->real_escape_string($user_name);
      $log_name = $this->conn->real_escape_string($log_name);
        $now=date("y-m-d H:i:s");
        $val="'$role_id','$user_id','$user_name','$log_name','$now','$mac','$modal_type'";
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"INSERT INTO log_master(log_role_id,user_id,user_name,log_name,log_time,user_mac_address,modal_type) VALUES($val)") or die(mysqli_error($this->conn));
    }

    //using insert funtion for procedures 
    function insert1($table, $value)
    {
        $field="";
        $val="";
        $i = 0;
        
          foreach($value as $k => $v)
          {
            $v = $this->conn->real_escape_string($v);
              if($i==0)
             
               {
                  $field.=$k;
                  $val.="'" . $v . "'";
              }
              else 
              {
                  $field.="," . $k ;
                  $val.=", '" . $v . "'";
              }
              $i++;
          }
          mysqli_set_charset($this->conn,"utf8");
          return mysqli_query($this->conn,"CALL $table($val)")or die(mysqli_error($this->conn));;
    }
    function loginSp($sp_name)
    {
          mysqli_set_charset($this->conn,"utf8");
          $result = mysqli_query($this->conn,"CALL $sp_name")or die(mysqli_error($this->conn));
          return $result;
    }
    
      //select funtion display data
   function select($table, $where='', $other='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT * FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }

      //select funtion display data
    function selectRow($colum,$table, $where='', $other='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT $colum FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }
    function select_row($table, $where='', $other='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT COUNT(*) as num_rows FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }
     //select funtion display data with DISTINCT  (not show duplicate)
    function select1($table, $column, $where='',$other='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT DISTINCT $column FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }
    function select2($table, $where='',$other='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $select = mysqli_query($this->conn,"SELECT DISTINCT * FROM $table $where $other") or die(mysqli_error($this->conn));
        return $select;
    }
    function selectColumnWise($table,$columnName='',$where=''){
        if($where != '')
        {
           $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
         $select = mysqli_query($this->conn,"SELECT $columnName FROM $table $where") or die(mysqli_error($this->conn));
        return $select;
    }
   
   
      //delete using update query(active_flag)
     function delete1($table ,$var, $where)
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        if($var != '')
        {
            $var= 'active_flag= ' .$var;
        }
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table set $var $where");
    }

    //Update Product View (view_status)
     function view_status($table ,$var, $where)
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        if($var != '')
        {
            $var= 'view_status= ' .$var;
        }
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table set $var $where");
    }


     //Comment ()
     function comment($table ,$var, $where)
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        if($var != '')
        {
            $var= 'status= ' .$var;
        }
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table set $var $where");
    }
     //delete permanataly  function
    function delete($table , $where='')
    {
        if($where != '')
        {
        $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"delete FROM $table $where")or die(mysqli_error($this->conn));
    }

    //Upadate funtion
    function update($table ,$value, $where)
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }


        $val="";
        $i=0;
        foreach ($value as $k => $v)
        {
            $v = $this->conn->real_escape_string($v);
            if($i == 0)
            {
              $val.=$k."='".$v."'";    
            }
            
            else 
            {
              $val.=",".$k."='".$v."'";
            }
            $i++;
            
        }
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table SET $val $where");
    }
     //select next auto_increment_id
    function last_auto_id($table)
    {
         mysqli_set_charset($this->conn,"utf8");
        $select_id = mysqli_query($this->conn,"SHOW TABLE STATUS LIKE '$table'" ) or die(mysqli_error($this->conn));
        return $select_id;
    }

        //Count Data of Table
    function count_data($field='' ,$table ,$where='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $count_data = mysqli_query($this->conn,"SELECT $field,COUNT(*)  FROM $table $where" ) or die(mysqli_error($this->conn));
        return $count_data;

    }

    //Count Data of Table
    function count_data_direct($field='' ,$table ,$where='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $temp = mysqli_query($this->conn,"SELECT $field,COUNT(*)  FROM $table $where" ) or die(mysqli_error($this->conn));
        while($rowCount=mysqli_fetch_array($temp)) {
             $totalCount=$rowCount['COUNT(*)'];
        return $totalCount;
        }

    }
     //Count sum of  Table field
    function sum_data($field='' ,$table ,$where='')
    {
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $sum_data = mysqli_query($this->conn,"SELECT SUM($field) from `$table` $where" ) or die(mysqli_error($this->conn));
        return $sum_data;

    }

// sms send 
    function send_sms($mobile,$message) {
       
        $YourAPIKey='210eaaf9-8e87-11e9-ade6-0200cd936042';
        $From="RAVTRI";
        $To=$mobile;
        $Msg=$message;
        ### DO NOT Change anything below this line
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $url = "https://2factor.in/API/V1/$YourAPIKey/ADDON_SERVICES/SEND/TSMS"; 
        $ch = curl_init(); 
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_POST,true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"From=$From&To=$To&Msg=$Msg"); 
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_exec($ch); 
        curl_close($ch);
       // $msg=urlencode($message);
       // $temp = mysqli_query($this->conn,"SELECT *  FROM sms ORDER BY rand() LIMIT 1" ) or die(mysqli_error($this->conn));
       // $smsData=mysqli_fetch_array($temp);
       // extract($smsData);
       // $sms= file_get_contents("http://silverwingsms.in/api/sendmsg.php?user=$sms_user&pass=$sms_password&sender=$sms_sender&phone=$mobile&text=$msg&priority=sdnd&stype=normal");

    }

    // get fcm token
    function getFcm($fildName,$table,$where){
     
     $sql="SELECT $fildName FROM $table WHERE $where";
     $temp=mysqli_query($this->conn,$sql);
     $data=mysqli_fetch_array($temp);
       if($data > 0){
        $fcm=$data[$fildName];
        return $fcm;
       }
       else{
        return false;
       }
      }



  //update counter
  function updateCounter($table ,$value='')
    {
         mysqli_set_charset($this->conn,"utf8");
        return mysqli_query($this->conn,"update $table SET $value");
    }
   //push_array
   function getUniqueID($field,$table,$where,$other){
        $mainArray = array();
        if($where != '')
        {
            $where= 'where ' .$where;
        }
         mysqli_set_charset($this->conn,"utf8");
        $q = mysqli_query($this->conn,"SELECT * FROM $table $where $other") or die(mysqli_error($this->conn));
        while($data = mysqli_fetch_array($q)){
            array_push($mainArray, $data[$field]);
        } 
        return $mainArray;
    }

    
    function getExplodedArray($variable){
        $mainArray = array();
        $variable_array = explode("~", $variable);
        for ($i=0; $i < count($variable_array) ; $i++) { 
            array_push($mainArray, $variable_array[$i]);
        }
        return $mainArray;
    }
    
    //to delete the files and directory from the folder
    function delete_directory($dirname) {
        if (is_dir($dirname))
           $dir_handle = opendir($dirname);
            if (!$dir_handle)
                return false;
            while($file = readdir($dir_handle)) {
                if ($file != "." && $file != "..") {
                    if (!is_dir($dirname."/".$file))
                        unlink($dirname."/".$file);
                    else
                        delete_directory($dirname.'/'.$file);
                   }
             }
             closedir($dir_handle);
             rmdir($dirname);
             return true;
    }

    //getMatters for Lawyer
    function getMatterList($field,$table,$where,$other,$search,$pass_id){
        $mainArray = array();
        $lawyers_id = array();
        if($where != '')
        {
            $where= 'where ' .$where;
        }
        mysqli_set_charset($this->conn,"utf8");
        $q = mysqli_query($this->conn,"SELECT * FROM $table $where $other") or die(mysqli_error($this->conn));
        while($data = mysqli_fetch_array($q)){
            $lawyers_id = explode("~", $data[$field]);
            if (in_array($search, $lawyers_id)) {
                array_push($mainArray, $data[$pass_id]);
            }
        } 
        return $mainArray;
    }

    function get_fcm($field,$table,$where) {
       if($where != '')
       {
           $where= 'where ' .$where;
       }
       mysqli_set_charset($this->conn,"utf8");
       $select = mysqli_query($this->conn,"SELECT * FROM $table $where") or die(mysqli_error($this->conn));
       $totalUsers = mysqli_num_rows($select);
       $loopCount= $totalUsers/1000;
       $loopCount= round($loopCount)+1;
          for ($i=0; $i <$loopCount ; $i++) {
               $limit_users = $i."000";
               $fcmArray=array();
               $q1 = mysqli_query($this->conn,"SELECT $field FROM $table $where") or die(mysqli_error($this->conn));
                 while ($row=mysqli_fetch_array($q1)) {
                   $user_token= $row[$field];
                   array_push($fcmArray, $user_token);
                 }
                return $fcmArray;
             }
  }

  function selectArray($table, $where='', $other='')
  {
      if($where != '')
      {
          $where= 'where ' .$where;
      }
      mysqli_set_charset($this->conn,"utf8");
      mysqli_set_charset($this->conn,"utf8");
      $select = mysqli_query($this->conn,"SELECT * FROM $table $where $other") or die(mysqli_error($this->conn));
      $data = mysqli_fetch_array($select);
      return $data;
  }

}
?> 