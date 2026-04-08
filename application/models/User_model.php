<?php
    class user_model extends CI_Model{
         function __construct(){
          $this->load->database();
        }  
        	function showAllUsers(){
			$this->db->order_by('id', 'asc');		
			$query = $this->db->get('users');
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}




      function createcsv555master111(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "emp_candidate.csv";
        $query = "SELECT * FROM emp_candidate"; //USE HERE YOUR QUERY
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, "\xEF\xBB\xBF" . $data);
        //force_download($filename, $data);

    }
 public function get_user_by_id($user_id) {
        $query = $this->db->get_where('users', ['id' => $user_id]);
        return $query->row_array();
    }

    


        function createcsv(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "jobs.csv";
        $query = "SELECT * FROM jobs"; //USE HERE YOUR QUERY
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, "\xEF\xBB\xBF" . $data);
        //force_download($filename, $data);

    }



        function createcsv555(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "emp_candidate.csv";
        $query = "SELECT * FROM emp_candidate"; //USE HERE YOUR QUERY
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, "\xEF\xBB\xBF" . $data);
        //force_download($filename, $data);

    }

    



    
    public function get_items101(){
        $this->db->order_by('id');
        $query = $this->db->get('items');
        return $query->result_array();
    }


   function cuntt_emp_candidate1101619(){
   $results = array();
        $table = 'emp_candidate';
         $d="19";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }




 function cuntt_emp_candidate110165999mang1010(){
   $results = array();
        $table = 'emp_candidate';
        $id=$this->session->userdata('user_id');
         $d="2";
        
        
         $array = array('state_interview' =>$d, 'useridfuture'=>$id);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

   function get_emp_candidate_admin102_user_id_co_sultan(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuturetype ='11';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


 public function emp_update_status101001105($dd){
             
           $data = array(
                
               //  'useridfuturetype'=> '5',
                 'useridfuture'=> '3',
                 'state_interview'=>'3',
               //  'user_false_id'=> $this ->session->userdata('user_id'),
               //  'user_false_name'=> $this ->session->userdata('name'),
               //  'reason'=> $this->input->post('reason'),
                 '  useridfuturename'=> 'بسام العتيبي'
            );
            $this->db->where('id', $dd);
            return $this->db->update('emp_candidate', $data);
       }





  function get_emp_candidate_admin102_user_idsucc(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuture='$id'  and state_interview =2;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }
 function get_emp_candidate_admin102_user_id101_co(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from emp_candidate where  useridfuture='$id' and useridfuturetype='12';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

 function cuntt_emp_candidate11014co_sultant(){
   $results = array();
        $table = 'emp_candidate';
         $d="11";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }



 function cuntt_emp_candidate110165310aawait_adeeb(){
        $useridfuture= $this ->session->userdata('user_id');
        $useridfuturetype= '12';
        $results = array();
        $table = 'emp_candidate'; 
        $array = array('useridfuture' =>$useridfuture,'useridfuturetype=' => $useridfuturetype); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }



  function cuntt_emp_candidate11016538(){
   $results = array();
        $table = 'emp_candidate';
         $d="38";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

 function cuntt_emp_candidate1101653899(){
   $results = array();
        $table = 'emp_candidate';
         $d="39";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


function cuntt_emp_candidate11016538991(){
   $results = array();
        $table = 'emp_candidate';
         $d="40";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

function cuntt_emp_candidate110165389919(){
   $results = array();
        $table = 'emp_candidate';
         $d="41";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }







function get_emp_candidate_admin102_user_idwaiting(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuture='$id'  and state_interview =9;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


 function cuntt_emp_candidate110165310aawait5050(){
       $results = array();
        $table = 'emp_candidate';
         $d="9";
        
         $array = array('state_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }
    public function emp_update_status101001_sultan($dd){
             
           $data = array(
                
                 'useridfuturetype'=> '11',
                 'useridfuture'=> '3',
                 'user_false_id'=> $this ->session->userdata('user_id'),
                 'user_false_name'=> $this ->session->userdata('name'),
                 'reason101'=> $this->input->post('reason101'),
                 '  useridfuturename'=> 'بسام العتيبي'
            );
            $this->db->where('id', $dd);
            return $this->db->update('emp_candidate', $data);
       }


         public function emp_update_status101001_adeeb($dd){
             
           $data = array(
                
                 'useridfuturetype'=> '12',
                 'useridfuture'=> '9',
                 'user_false_id'=> $this ->session->userdata('user_id'),
                 'user_false_name'=> $this ->session->userdata('name'),
                 'reason101'=> $this->input->post('reason101'),
                 '  useridfuturename'=> 'أديب الزاحم'
            );
            $this->db->where('id', $dd);
            return $this->db->update('emp_candidate', $data);
       }








  function get_emp_candidate_admin102_user_id_wait_mang(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  state_interview ='4';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


 function cuntt_emp_candidate110165999mang(){
   $results = array();
        $table = 'emp_candidate';
         $d="4";
        
         $array = array('state_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }









 function cuntt_emp_candidate110165999(){
   $results = array();
        $table = 'emp_candidate';
         $d="3";
        
         $array = array('state_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


function id_emp_pointment_update101555($id){
             
           $data = array(
                  'Date_of_the_personal_interview1' => $this->input->POST('Date_of_the_personal_interview'),
                  'Time_of_the_interview1' => $this->input->POST('Time_of_the_interview'),
                  
                  
                  'useridfuturetype'=> '3',
                  'useridfuture'=> '1',
                  'useridfuturename'=> 'بسام العتيبي'
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }



     public function get_items_selected($id){
          $sql = "select * from order_detailes where id='$id';";
      $query=$this->db->query($sql);
        return $query->row_array();
    }

      public function get_id_insert_selected($id){
          $sql = "select * from id_insert where id='$id';";
      $query=$this->db->query($sql);
        return $query->row_array();
    }


      public function get_id_insert_selected1111($id){
          $sql = "select * from jobs where id='$id';";
      $query=$this->db->query($sql);
        return $query->row_array();
    }


     public function get_id_insert_selected1010($id){
          $sql = "select * from jobs where id='$id';";
      $query=$this->db->query($sql);
        return $query->row_array();
    }


     public function get_id_insert_selected1010555($id){
          $sql = "select * from emp_candidate where id='$id';";
      $query=$this->db->query($sql);
        return $query->row_array();
    }


       function id_emp_pointment_update_jobs_jobs555566745($id){
             
           $data = array(
                  'id_number' => $this->input->POST('id_number')

                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

        function id_emp_pointment_update_jobs_jobs5555667452145($id){
             
           $data = array(
                  'emp_id' => $this->input->POST('id_number')

                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

       





 public function get_id_insert_selected555($id){
          $sql = "select * from id_insert where id_number='$id';";
      $query=$this->db->query($sql);
        return $query->row_array();
    }


     public function get_id_insert_selected5559999($id){
          $sql = "select * from jobs where n12='$id';";
      $query=$this->db->query($sql);
        return $query->row_array();
    }






 function id_state_interview_update($id){
             
           $data = array(
                  'state_interview' => $this->input->POST('state_interview')
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }






     function get_notifications($userid){
         $response = array();   
         $this->db->select('*');
         $this->db->where('responder_id',$userid);
         $this->db->where('reed',0);
         $q = $this->db->get('notifications');
         $response = $q->result_array();
        
        return $response;
       }


         function get_notificationscode22(){
         $response = array(); 
         $this->db->select('*');
         $this->db->where('tables','ccmessage');
         $this->db->where('reed',0);
         $q = $this->db->get('notifications');
         $response = $q->result_array();
         return $response;
       }

          function get_notificationscode(){
         $response = array(); 
         $this->db->select('*');
         $this->db->where('tables','addcode');
         $this->db->where('reed',0);
         $q = $this->db->get('notifications');
         $response = $q->result_array();
         return $response;
       }

        function get_notifications_sales_to_ssuport(){
         $response = array(); 
         $this->db->select('*');
         $this->db->where('type','3');
         $this->db->where('reed',0);
         $q = $this->db->get('notifications');
         $response = $q->result_array();
         return $response;
       }

    function get_notifications_ssuport_to_sales1(){
$id=$this->session->userdata('username');
      $this->db->select('*');
$this->db->from('notifications');
$this->db->like('responder_name', $id);
$this->db->like('reed', '0');

$query = $this->db->get();
 $response = $query->result_array();
        return $response;


        // $id=$this->session->userdata('username');
        // $results = array();
        // $array = array('reed' => '0', 'responder_name=' => $id);
        // $table = 'notifications';
        // $this->db->select("*");
        // $this->db->where($array);
        // $this->db->from($table);
        // $query = $this->db->get();
        // $response = $query->result_array();
        // return $response;

      //  $num_of_records = $query->num_rows();
      //  return $num_of_records;
    }



       function get_notifications_ssuport_to_sales(){
         $response = array(); 
         $this->db->select('*');
         $this->db->where('responder_name',$this->session->userdata('username'));
         $this->db->where('reed',0);
         $q = $this->db->get('notifications');
         $response = $q->result_array();
         return $response;
       }


        function get_notifications_cc_to_clint(){
         $response = array(); 
         $this->db->select('*');
         $this->db->where('responder_id',$this->session->userdata('user_id'));
         $this->db->where('reed',0);
         $q = $this->db->get('notifications');
         $response = $q->result_array();
         return $response;
       }

         function get_reportboxin($s,$s1){  
      
         $sql="SELECT * FROM archives WHERE mdate between '$s' and '$s1' ;";
         $query = $this->db->query($sql);
        return $query->result_array();
        }


         function get_report_sadad_date_admin($s,$s1){  
      
         $sql="SELECT * FROM payment WHERE sadad_date_day between '$s' and '$s1' ;";
         $query = $this->db->query($sql);
        return $query->result_array();
        }


         function get_report_sadad_date($s,$s1){  
       $id=$this->session->userdata('user_id');
         $sql="SELECT * FROM payment WHERE sadad_date_day between '$s' and '$s1' and user_id ='$id';";
         $query = $this->db->query($sql);
        return $query->result_array();
        }


         function get_report_sadad_date_sub($s,$s1){  

             $project=$this ->session->userdata('project');
         $section=$this ->session->userdata('section');

         $sql="SELECT * FROM payment WHERE sadad_date_day between '$s' and '$s1' and project ='$project' and section ='$section';";
         $query = $this->db->query($sql);
        return $query->result_array();
        }






         public function reportbox(){
        $sql = "select * from archives ;";
        $query = $this->db->query($sql);
        return $query->result_array();
        }


        //   function get_reportboxin($s,$s1){  
      
        //  $sql="SELECT * FROM archives WHERE mdate between '$s' and '$s1' ;";
        //  $query = $this->db->query($sql);
        // return $query->result_array();
        // }



       //////////////////////////
		 public function getmydata($user_id){
            //validate
            $sql = "SELECT * FROM `users` WHERE `id`='$user_id' LIMIT 1;";
            $query = $this->db->query($sql);
            $data = $query->row_array();
            return $data;
                }
        
        function CHECK_USERS(){ 
			$id = $this->input->get('id');
			$sql = "select * from transactions  where did='$id';";
            $query = $this->db->query($sql);
            return $query->row_array();
		}
        function get_deals(){   
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend=u.id AND t.modest='واردة' AND t.dtype!='سري'  order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_deals1(){   
            $id=$this ->session->userdata('username');
              $sql = "select t.*,u.* from transactions t, users u where t.useridfuture='$id' AND t.useridsend=u.id AND t.modest='واردة'  order by did desc;";

         //   $sql = "select * from transactions   where  useridfuture='$id' and  modest='واردة' ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }


		function get_dealsout(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u  where t.useridsend=u.id AND t.modest='صادرة' AND t.dtype!='سري'  order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_dealsout11(){   
             $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }




        function get_dealsout111(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u  where t.useridsend=u.id AND t.modest='صادرة' AND t.dtype!='سري' ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }



        function get_dealsout11_view(){   
             $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_dealsout12_view(){   
             $id="ali";
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_dealsout13_view(){   
             $id="amlak";
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }


         function get_dealsout14_view(){   
             $id="ahmed";
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_dealsout15_view(){   
             $id="faisal";
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_dealsout16_view(){   
             $id="abdula";
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_dealsout17_view(){   
             $id="mohammed";
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_dealsout18_view(){   
             $id="saeed";
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.useridfuture='$id' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }


        function get_dealsout1(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend='mtka1960' AND t.modest='صادرة' AND t.useridfuture='$id' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }


         function get_dealsout121(){   
            $id=$this ->session->userdata('username');
            $id2=$this ->session->userdata('user_id');
            $sql="select * from transactions where useridsend='$id2' AND modest='صادرة' ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }



         function get_dealsout2(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend='u.id' AND t.modest='صادرة' AND t.useridfuture='$id' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }



         function get_dealsout3(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend='103' AND t.modest='صادرة' AND t.useridfuture='$id' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }



        function get_dealsin(){ 
            $id=$this ->session->userdata('username');  
            $sql = "select t.*,u.* from transactions t, users u where t.useridfuture='$id' AND t.useridsend=u.id AND t.modest='واردة' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_dealsin2(){ 
            $id=$this ->session->userdata('username');  
            $sql = "select t.*,u.* from transactions t, users u where t.useridfuture='mtka1960' AND t.useridsend=u.id AND t.modest='واردة' order by t.did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }


          function get_dealsin3(){ 
            $id=$this ->session->userdata('username');  
            $sql = "select t.*,u.* from transactions t, users u where t.useridfuture='mohammed' AND t.useridsend=u.id AND t.modest='واردة' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }



          function get_dealsin1(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend=u.id AND useridfuture='admin2' AND t.modest='واردة' order by did desc;";
           // $query =$this->db->order_by('t.useridsend=u.did','DESC');  
            $query = $this->db->query($sql);
            return $query->result_array();
        }


         function get_dealsin11(){   
            $id='admin';
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend=u.id AND t.modest='واردة' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }



        function get_discharge(){   
            $id=$this ->session->userdata('username');
            $sql = "select  * from discharge    order by did desc;";
           // $query =$this->db->order_by('t.useridsend=u.did','DESC');  
            $query = $this->db->query($sql);
            return $query->result_array();
        }


         function get_discharge1(){   
            $id=$this ->session->userdata('username');
            $sql = "select  * from discharge where mode='دفترية'   order by did desc;";
           // $query =$this->db->order_by('t.useridsend=u.did','DESC');  
            $query = $this->db->query($sql);
            return $query->result_array();
        }


         function get_discharge2(){   
            $id=$this ->session->userdata('username');
            $sql = "select  * from discharge where mode='غير الدفترية'   order by did desc;";
           // $query =$this->db->order_by('t.useridsend=u.did','DESC');  
            $query = $this->db->query($sql);
            return $query->result_array();
        }

          function get_discharge3(){   
            $id=$this ->session->userdata('username');
            $sql = "select  * from discharge where mode='آخرى'   order by did desc;";
           // $query =$this->db->order_by('t.useridsend=u.did','DESC');  
            $query = $this->db->query($sql);
            return $query->result_array();
        }





 function get_dealsin55(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend=u.id AND t.modest='واردة' order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
 

        function get_archivesout($id){   
            $sql = "select t.*,u.* from archives t, users u where t.useridsend=u.id AND t.modest='صادرة' AND t.dtype!='سري'  AND t.type=$id  order by did desc;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_tasks(){   
            $sql = "select t.*,u.* from tasks t, users u where t.useridsend=u.id ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }


		function get_dealsvip(){   
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend=u.id AND t.dtype='سري' ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

          function get_tran_details($id){   
            $sql = "select t.*,u.* from tran_details t, users u where t.useridsend=u.id AND t.tid=$id ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

         function get_cc($id){   
            $sql = "SELECT * FROM cc where did=$id ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_cc_username(){   
          $id=$this ->session->userdata('username');
            $sql = "SELECT * FROM cc where username='$id' ;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }




          function get_dealsvip1(){   
             $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions t, users u where t.useridsend=u.id AND t.dtype='سري' AND t.useridfuture='$id';";
            $query = $this->db->query($sql);
            return $query->result_array();
        }


		function get_action(){   
            $sql = "select * from action;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
		function editEmployee(){
			$id = $this->input->get('id');
			$this->db->where('did', $id);
			$query = $this->db->get('transactions');
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return false;
			}
		}

    function editdetails(){
      $id = $this->input->get('id');
      $this->db->where('did', $id);
      $query = $this->db->get('tran_details');
      if($query->num_rows() > 0){
        return $query->row();
      }else{
        return false;
      }
    }

		function deal_connect(){
			$id = $this->input->get('txtId');
			$connect		= implode(',',$this->input->get('connect'));
			$field = array(
				'connect' => $connect
			);
			$this->db->where('did', $id);
			$this->db->update('transactions', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		} 


    function deal_replay_change(){
      $id = $this->input->get('txtId');
       $modest="واردة";
      $users    = implode(',',$this->input->get('useridfuture'));
      $field = array(
        'modest' =>$modest
      );
      $this->db->where('did', $id);
      $this->db->update('transactions', $field);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    } 


     function deal_replay_change1(){
      $id = $this->input->get('txtId');
      $modest="صادرة";
      $users    = implode(',',$this->input->get('useridfuture'));
      $field = array(
        'modest' =>$modest
      );
      $this->db->where('id', $id);
      $this->db->update('emp_candidate', $field);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    } 




       function user_recipient($id2){   
             
            $sql = "select  * from users where username='$id2';";
            $query = $this->db->query($sql);
            return $query->row_array();
        }
         function user_recipient22($id22){   
             
            $sql = "select  * from users where id='$id22';";
            $query = $this->db->query($sql);
            return $query->row_array();
        }




		function deal_replay(){
            $id = $this->input->get('txtId');

      // $id2=$this->input->get('useridfuture');
      // $data['dealsout_numbers']=$this->user_model->user_recipient($id2);


            $users      = implode(',',$this->input->get('useridfuture'));
            $field = array(
                'useridfuture' => $users
            );
            $this->db->where('id', $id);
            $this->db->update('emp_candidate', $field);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        } 


		function updateEmployee(){
			$id = $this->input->get('txtId');
			$action = $this->input->get('action');
			$field = array(
				'dstatus' => $action
			);
			$this->db->where('did', $id);
			$this->db->update('transactions', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		} 

    function updatedetails(){
      $id = $this->input->get('txtId');
      $action = $this->input->get('action');
      $field = array(
        'dstatus' => $action
      );
      $this->db->where('did', $id);
      $this->db->update('tran_details', $field);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    } 


		function deleteEmployee(){
			$id = $this->input->get('id');
			$this->db->where('did', $id);
			$this->db->delete('transactions');
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}	


      function deletearchives(){
      $id = $this->input->get('id');
      $this->db->where('did', $id);
      $this->db->delete('archives');
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    } 


        //Related_add
		function related_add($did,$uid,$name,$phone,$mail,$job,$address)
		{
			if($name !== null)
			{
				$data = array(
					'did' => $did,
					'uid' => $uid,
					'name' => $name,
					'mobile' => $phone,
					'email' => $mail,
					'transaction' => $address,
					'office' => $job
				
				);
				$this->db->insert('relatedpeople', $data);
			}
		}
		//get_people
		function get_people($id){   
			$sql = "select * from relatedpeople where did='$id';";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		//get_deal_id
		function get_deal_id($id){   
			$sql = "select t.*,u.username from transactions t,users u where t.did='$id' AND t.useridsend=u.id;";
			$query = $this->db->query($sql);
			return $query->row_array();
		}

    //   function get_deal_id_view($id){   
    //   $sql = "select t.*,u.username from transactions_view t,users u where t.did='$id' AND t.useridsend=u.id;";
    //   $query = $this->db->query($sql);
    //   return $query->row_array();
    // }


    function get_deal_id_view(){   
            $id=$this ->session->userdata('username');
            $sql = "select t.*,u.* from transactions_view t, users u where t.useridsend=u.id AND useridfuture='admin2' AND t.modest='صادرة' order by did desc;";
           // $query =$this->db->order_by('t.useridsend=u.did','DESC');  
            $query = $this->db->query($sql);
            return $query->result_array();
        }




    function get_tran_details_id($id){   
      $sql = "select t.*,u.username from tran_details t,users u where t.did='$id' AND t.useridsend=u.id;";
      $query = $this->db->query($sql);
      return $query->row_array();
    }


      function get_archives_id($id){   
      $sql = "select t.*,u.username from archives t,users u where t.did='$id' AND t.useridsend=u.id;";
      $query = $this->db->query($sql);
      return $query->row_array();
    }

		//Deal_Add
		function deal_add($uid){
      $dete = date('Y/m');
			$users		= implode(',',$this->input->post('useridfuture'));
			$mdate  	= $this->input->post('mdate');
			$hdate		= $this->input->post('hdate');
			$vip		= $this->input->post('vip');
			$mode		= $this->input->post('mode');
			$modest		= $this->input->post('list');
			$type		= $this->input->post('type');
      $name1   = $this->input->post('name1');
      $Identity_no   = $this->input->post('Identity_no');
      $mobile   = $this->input->post('mobile');
      $disc =$this->input->post('disc');
			
			$data = array(
				'title'			=> $this->input->post('title'),
				'useridsend' 	=> $uid,
				'useridfuture'  => $users,
				//'dfile' 		=> $names,
				'dtype' 		=> $type,
				'dstatus' 		=> 'جديد',
				'mdate'		 	=> $mdate,
				'hdate' 		=> $hdate,
				'vip' 			=> $vip,
				'mode' 			=> $mode,
				'modest' 		=> $modest,
        'date'    => $dete,
        'name'    => $name1,
				'Identity_no'=> $Identity_no,
        'mobile'      => $mobile,
        'disc' => $disc
      
       		
			);

			// Insert user
			$this->db->insert('transactions', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
        }


            function discharge_add($uid){
      $dete = date('Y/m');
           // $users      = implode(',',$this->input->post('useridfuture'));
            $mdate      = $this->input->post('mdate');
            $hdate      = $this->input->post('hdate');
            $typen1        = $this->input->post('typen1');
            $typen11       = $this->input->post('typen11');
            $typen2     = $this->input->post('typen2');
            $status       = $this->input->post('status');
      $name1   = $this->input->post('name1');
      $Identity_no   = $this->input->post('Identity_no');
      $mobile   = $this->input->post('mobile');
      $mode   = $this->input->post('mode');
      

      $disc =$this->input->post('disc');
            
            $data = array(
                'title'         => $this->input->post('title'),
                'useridsend'    => $uid,
                'typen1'  => $typen1,
                'typen11'       => $typen11,
                'typen2'         => $typen2,
               
                'mdate'         => $mdate,
                'hdate'         => $hdate,
                'status'           => $status,
                'mode'          => $mode,
              //  'modest'        => $modest,
        'date'    => $dete,
        'name'    => $name1,
                'Identity_no'=> $Identity_no,
        'mobile'      => $mobile,
        'disc' => $disc
      
            
            );

            // Insert user
            $this->db->insert('discharge', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }






        function add_cc($id){
       
      $users    = implode(',',$this->input->post('useridfuture'));
      
      
      $data = array(
        'user_id'     => $this->session->userdata('user_id'),
        'did'  => $id,
        'username'  => $users,
         
      );

      // Insert user
      $this->db->insert('cc', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
        }



    function deal_add_view($uid,$id5){
      $dete = date('Y/m');
      $users    = implode(',',$this->input->post('useridfuture'));
      $mdate    = $this->input->post('mdate');
      $hdate    = $this->input->post('hdate');
      $vip    = $this->input->post('vip');
      $mode   = $this->input->post('mode');
      $modest   = $this->input->post('list');
      $type   = $this->input->post('type');
      $name1   = $this->input->post('name1');
      $Identity_no   = $this->input->post('Identity_no');
      $mobile   = $this->input->post('mobile');
      $disc =$this->input->post('disc');  
      $data = array(
        
        'title'     => $this->input->post('title'),
        'useridsend'  => $uid,
        'useridfuture'  => $users,
        'dtype'     => $type,
        'dstatus'     => 'تحت الطلب',
        'mdate'     => $mdate,
        'hdate'     => $hdate,
        'vip'       => $vip,
        'mode'      => $mode,
        'modest'    => $modest,
        'date'    => $dete,
        'name'    => $name1,
        'Identity_no'=> $Identity_no,
        'mobile'      => $mobile,
        'disc' => $disc,
        'did'  => $id5     
      );

      // Insert user
      $this->db->insert('transactions_view', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
        }

    public function tran_update($id,$tran1){

      
      $data = array(
        'id_point'=> $tran1
      );
            $this->db->where('did', $id);
            return $this->db->update('transactions', $data);
     }

  public function deal_update($uid,$names,$id){

      $dete = date('Y/m/d');
      //$users    = implode(',',$this->input->post('useridfuture'));
      $mdate    = $this->input->post('mdate');
      $hdate    = $this->input->post('hdate');
     // $vip    = $this->input->post('vip');
     // $mode   = $this->input->post('mode');
      //$modest   = $this->input->post('list');
     // $type   = $this->input->post('type');
      $name1   = $this->input->post('name1');
      $Identity_no   = $this->input->post('Identity_no');
      $mobile   = $this->input->post('mobile');
      //$disc =$this->input->post('disc');
      
      $data = array(
        'title'     => $this->input->post('title'),
        'useridsend'  => $uid,
        //'useridfuture'  => $users,
        'dfile'     => $names,
        //'dtype'     => $type,
        //'dstatus'     => 'تحت الطلب',
        'mdate'     => $mdate,
        'hdate'     => $hdate,
       // 'vip'       => $vip,
        //'mode'      => $mode,
       // 'modest'    => $modest,
        'date'    => $dete,
        'name'    => $name1,
        'Identity_no'=> $Identity_no,
        'mobile'      => $mobile
       // 'disc' => $disc
      
          
      );

 
            $this->db->where('did', $id);
            return $this->db->update('transactions', $data);
         }


           public function deal_update_view($uid,$names,$id){

      $dete = date('Y/m/d');
      //$users    = implode(',',$this->input->post('useridfuture'));
      $mdate    = $this->input->post('mdate');
      $hdate    = $this->input->post('hdate');
     // $vip    = $this->input->post('vip');
     // $mode   = $this->input->post('mode');
      //$modest   = $this->input->post('list');
     // $type   = $this->input->post('type');
      $name1   = $this->input->post('name1');
      $Identity_no   = $this->input->post('Identity_no');
      $mobile   = $this->input->post('mobile');
      //$disc =$this->input->post('disc');
      
      $data = array(
        'title'     => $this->input->post('title'),
        'useridsend'  => $uid,
        //'useridfuture'  => $users,
        'dfile'     => $names,
        //'dtype'     => $type,
        //'dstatus'     => 'تحت الطلب',
        'mdate'     => $mdate,
        'hdate'     => $hdate,
       // 'vip'       => $vip,
        //'mode'      => $mode,
       // 'modest'    => $modest,
        'date'    => $dete,
        'name'    => $name1,
        'Identity_no'=> $Identity_no,
        'mobile'      => $mobile
       // 'disc' => $disc
      
          
      );

 
            $this->db->where('did', $id);
            return $this->db->update('transactions_view', $data);
         }



     function notifications_add($id5,$id77,$id99){
      //$dete = date('Y/m/d');

      $users    = implode(',',$this->input->post('useridfuture'));
      $sender_name    = $this->session->userdata('username');
      
      
      $data = array(
        
        'sender_name'  => $id99,
        'responder_name'  =>$id77,
        'responder_id' =>'1',
        'message'     => 'تم إضافة معاملة جديدة',
        'oid'     => $id5,
        'type'     => '2'
         
          
      );

      // Insert user
      $this->db->insert('notifications', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
        }


              function notifications_add2(){
      //$dete = date('Y/m/d');
        $id5 = $this->input->get('txtId');
      $users    = implode(',',$this->input->get('useridfuture'));
      $sender_name    = $this->session->userdata('username');
      
      
      $data = array(
        
        'sender_name'  => $sender_name,
        'responder_name'  =>$users,
        'responder_id' =>'1',
         'reed' =>'0',
        'message'     => ' معاملة معاد توجيهها      ',
         
        'type'     => '2'
         
          
      );
 
      $this->db->where('oid', $id5);
      $this->db->update('notifications', $data);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
 
       }


         public function not_update($id){ 
            $data = array(
                 'reed' =>'1'
              );
                  $this->db->where('oid', $id);
                  return $this->db->update('notifications', $data);
            }

             public function work_flow_update($id5,$id6){ 
            $data = array(
                 'work_flow' =>$id6
              );
                  $this->db->where('id', $id5);
                  return $this->db->update('emp_candidate', $data);
            }

              public function work_flow_update102($id8){ 
            $data = array(
                 'work_flow2' =>"1",
                  //'name' => $this->input->post('name'),
                 'name_en' => $this->input->post('name_en'),
                 'id_number' => $this->input->post('id_number'),
                 'date_of_end_id' => $this->input->post('date_of_end_id'),
                 //'nationality' => $this->input->post('nationality'),
                // 'marital_status' => $this->input->post('marital_status'),
                 'religion' => $this->input->post('religion'),
                 'date_of_birth' => $this->input->post('date_of_birth'),
                 'place_of_birth' => $this->input->post('place_of_birth'),
                // 'mobile' => $this->input->post('mobile'),
                 'tell_no' => $this->input->post('tell_no'),
                 'address' => $this->input->post('address'),
                 'email' => $this->input->post('email'),
                 'profession_Iqama' => $this->input->post('profession_Iqama'),
                 'lawyer_license_no' => $this->input->post('lawyer_license_no'),
                 'qualification1' => $this->input->post('qualification1'),
                 'major' => $this->input->post('major'),
                 'gpa' => $this->input->post('gpa'),
                 'educational_institution' => $this->input->post('educational_institution'),
                 'date_of_graduation' => $this->input->post('date_of_graduation'),
                 'identifier1' => $this->input->post('identifier1'),
                 'city1' => $this->input->post('city1'),
                 'job_title1' => $this->input->post('job_title1'),
                 'mobile1' => $this->input->post('mobile1'),
                 'identifier2' => $this->input->post('identifier2'),
                 'city2' => $this->input->post('city2'),
                 'job_title2' => $this->input->post('job_title2'),
                 'mobile2' => $this->input->post('mobile2'),
                 'company' => $this->input->post('company'),
                 'job_title3' => $this->input->post('job_title3'),
                 'work_years' => $this->input->post('work_years'),
                 'salary_old' => $this->input->post('salary_old'),
                 'course1' => $this->input->post('course1'),
                 'course2' => $this->input->post('course2'),
                 'course3' => $this->input->post('course3'),
                 'course4' => $this->input->post('course4'),
                 'course5' => $this->input->post('course5'),
                 'course6' => $this->input->post('course6'),
                 'course7' => $this->input->post('course7'),
                 'course8' => $this->input->post('course8'),
                 'course9' => $this->input->post('course9'),
                 'course10' => $this->input->post('course10'),
                 'course11' => $this->input->post('course11'),
                 'company1' => $this->input->post('company1'),
                 'job_title31' => $this->input->post('job_title31'),
                 'work_years1' => $this->input->post('work_years1'),
                 'salary_old1' => $this->input->post('salary_old1'),
                 'company2' => $this->input->post('company2'),
                 'job_title32' => $this->input->post('job_title32'),
                 'work_years2' => $this->input->post('work_years2'),
                 'salary_old2' => $this->input->post('salary_old2'),
                 'biilding_number' => $this->input->post('biilding_number'),
                 'street_name' => $this->input->post('street_name'),
                 'the_name_of_the_neighborhood' => $this->input->post('the_name_of_the_neighborhood'),
                 'the_city_name' => $this->input->post('the_city_name'),
                 'postal_code' => $this->input->post('postal_code'),
                 'additional_number' => $this->input->post('additional_number'),
                 'unit_number' => $this->input->post('unit_number')
              );
                  $this->db->where('id_number', $id8);
                  return $this->db->update('emp_candidate', $data);
            }


              public function work_flow_update010($id5,$id6){ 
            $data = array(
                 'work_flow' =>$id6
              );
                  $this->db->where('id_number', $id5);
                  return $this->db->update('emp_candidate', $data);
            }







          public function max_tran(){  

           $this->db->select_max('id');
           $this->db->from('orders');
           $query = $this->db->get();
           return $query->row()->id;
        }

         public function max_emp_candidate(){  

           $this->db->select_max('id');
           $this->db->from('emp_candidate');
           $query = $this->db->get();
           return $query->row()->id;
        }

         public function max_emp_candidate101(){  

           $this->db->select_max('id_number');
           $this->db->from('emp_candidate');
           $query = $this->db->get();
           return $query->row()->id_number;
        }




         public function max_id_candidate(){  

           $this->db->select_max('id');
           $this->db->from('id_insert');
           $query = $this->db->get();
           return $query->row()->id;
        }









   function tran_details_add($uid,$names,$id){
      $dete = date('Y/m/d');
    //  $users    = implode(',',$this->input->post('useridfuture'));
     // $mdate    = $this->input->post('mdate');
     // $hdate    = $this->input->post('hdate');
    //  $vip    = $this->input->post('vip');
    //  $mode   = $this->input->post('mode');
    //  $modest   = $this->input->post('list');
    //  $type   = $this->input->post('type');
      
      $data = array(
        
        'useridsend'  => $uid,
       // 'useridfuture'  => $users,
        'dfile'     => $names,
        
        'dstatus'     => 'تحت الطلب',
        
         
         
         
       
        'date'    => $dete,
        'disc'      => $this->input->post('disc'),
        'tid'    => $id      
      );
 
      // Insert user
      $this->db->insert('tran_details', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
        }


          function archives_add($uid,$names){

             $dete = date('Y/m/d');

                  $users    = implode(',',$this->input->post('useridfuture'));
                  $mdate    = $this->input->post('mdate');
                  $hdate    = $this->input->post('hdate');
                  $vip    = $this->input->post('vip');
                  $mode   = $this->input->post('mode');
                  $modest   = $this->input->post('list');
                  $type   = $this->input->post('type'); 
                  $data = array(
                    'title'     => $this->input->post('title'),
                    'useridsend'  => $uid,
                    'useridfuture'  => $users,
                    'dfile'     => $names,
                    'dtype'     => $type,
                    'dstatus'     => 'تحت الطلب',
                    'mdate'     => $mdate,
                    'hdate'     => $hdate,
                    'vip'       => $vip,
                    'mode'      => $mode,
                    'modest'    => $modest,
                    'disc'      => $this->input->post('disc'),
                    'type'    =>'1',
                    'date'=>$dete       
                  );

                  // Insert user
                  $this->db->insert('archives', $data);
                  $insert_id = $this->db->insert_id();
                  return  $insert_id;
        }


          function task_add($uid,$names){

                  $users    = implode(',',$this->input->post('useridfuture'));
                  $mdate    = $this->input->post('mdate');
                  $hdate    = $this->input->post('hdate');
                  $vip    = $this->input->post('vip');
                  $mode   = $this->input->post('mode');
                  $modest   = $this->input->post('list');
                  $type   = $this->input->post('type'); 
                  $data = array(
                    'title'     => $this->input->post('title'),
                    'useridsend'  => $uid,
                    'useridfuture'  => $users,
                    'dfile'     => $names,
                    'dtype'     => $type,
                    'dstatus'     => 'تحت الطلب',
                    'mdate'     => $mdate,
                    'hdate'     => $hdate,
                    'vip'       => $vip,
                    'mode'      => $mode,
                    'modest'    => $modest,
                    'disc'      => $this->input->post('disc')       
                  );

                  // Insert user
                  $this->db->insert('tasks', $data);
                  $insert_id = $this->db->insert_id();
                  return  $insert_id;
        }




     function get_userdata(){
        date_default_timezone_set('Asia/Riyadh');
        $id=$this->session->userdata('user_id');
        $sql = "select * from users where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }

       function get_userdata1020($id_user){
        date_default_timezone_set('Asia/Riyadh');
       
        $sql = "select * from users where id='$id_user';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


function get_max_moshrif(){
    
        $sql = "select max(total) from (select sum(payment_amount) as total from payment as x GROUP by user_id) as y;";
        $query = $this->db->query($sql);
       return $query->result_array();
         //return $result->payment_amount;

            }


      function get_ordersdata_star(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders where user_id=$id order by id desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_ordersdata_star0101(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders where user_id=$id and status='4';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


       function get_ordersdata_star010(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders where user_id=$id and status='3';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


      function get_ordersdata_star00(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders where user_id=$id and status='1' order by id desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


        function get_emp_candidate($id){
      
        $sql = "select * from emp_candidate where id=$id ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


        function get_emp_candidate2255($id){
      
        $sql = "select * from emp_candidate where id_number=$id ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }



       function get_emp_candidate_id_number($id){
      
        $sql = "select * from emp_candidate where id_number=$id ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


        function get_emp_candidate_id_number_jobs($id){
      
        $sql = "select * from jobs where id=$id ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


        function get_emp_candidate_id_number_jobsemp_candidate($id){
      
        $sql = "select * from emp_candidate where id=$id ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


       function get_report1(){
        
         
       

        $sql = "select * from report order by id desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function add_type_report(){
            date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $day=date("l");
            $time=date("h:i:s");
            $n19=$this->input->post('n19');
         
           $data = array(
                 
               
                  'name' => $this->input->post('name'),
                  'from_date' => $this->input->post('from_date'),
                  'to_date' => $this->input->post('to_date') 
               
                 
              
            );
            return $this->db->insert('report', $data);
        // } 


}   


function get_order_emkan_report1111($from_date,$to_date){  

    $d1='2024/08';
    $d2='2024/08';    
        
         $sql="SELECT * FROM emp_candidate WHERE  month between '$d1' and '$d2';";
         $query = $this->db->query($sql);
        return $query->result_array();
        }

 function get_customers77all_report($id){
        $sql = "select * from report where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }




      

       function get_id_insert_id_number($id){
      
        $sql = "select * from id_insert where id_number=$id ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


        function get_id_insert_id_number1515($id){
      
        $sql = "select * from id_insert where id=$id ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }



      



        function get_id_insert_id_number101($id4){
      
        $sql = "select * from id_insert where id=$id4 ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }

       function get_id_emp_id_number1011($id8){
      
        $sql = "select * from emp_candidate where id_number='$id8' ;";
        $query = $this->db->query($sql);
        return $query->row_array();
      }








      function get_ordersdata_admin(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders ORDER BY id DESC ;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_ordersdata_admin101(){
       
        $sql = "select * from attachment ;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_ordersdata_message101(){
       
        $sql = "select * from message;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


      function get_ordersdata_admin102(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders where status='2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_emp_candidate_admin102(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from emp_candidate where work_flow2='0';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


        function get_emp_candidate_admin102555(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from emp_candidate where useridfuturetype='0';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


       // نطاق تاريخ المباشرة (موجودة عندك - مذكّرة)
public function get_emp_candidate_admin102555555510_done112_by_direct_range_with_cv($from_date, $to_date, $status4 = '2')
{
    $sql = "
        SELECT 
            ec.*,
            j.cv AS cv
        FROM emp_candidate ec
        LEFT JOIN (
            SELECT n12, MAX(id) AS max_job_id
            FROM jobs
            GROUP BY n12
        ) jm ON jm.n12 = ec.id_number
        LEFT JOIN jobs j ON j.id = jm.max_job_id
        WHERE ec.status4 = ?
          AND ec.f5 <> ''
          AND STR_TO_DATE(REPLACE(ec.f5, '-', '/'), '%Y/%m/%d') BETWEEN ? AND ?
        ORDER BY STR_TO_DATE(REPLACE(ec.f5, '-', '/'), '%Y/%m/%d') DESC
    ";
    $query = $this->db->query($sql, [$status4, $from_date, $to_date]);
    return $query->result_array();
}

// *** جديدة: البحث برقم الهوية ***
public function get_candidates_by_idnumber_with_cv($id_number, $status4 = '2')
{
    $sql = "
        SELECT 
            ec.*,
            j.cv AS cv
        FROM emp_candidate ec
        LEFT JOIN (
            SELECT n12, MAX(id) AS max_job_id
            FROM jobs
            GROUP BY n12
        ) jm ON jm.n12 = ec.id_number
        LEFT JOIN jobs j ON j.id = jm.max_job_id
        WHERE ec.status4 = ?
          AND ec.id_number = ?
        ORDER BY ec.id DESC
        LIMIT 200
    ";
    $query = $this->db->query($sql, [$status4, $id_number]);
    return $query->result_array();
}





        function get_emp_candidate_admin1025555555(){
        $id=$this->session->userdata('user_id');
        $id2='0';
      //  $f=' لا يوجد خبرة سابقة';

          $d="الدمام";

        if ($this->db->table_exists('jobs')) {
            $sql = "select * from jobs where status='$id2';";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        if ($this->db->table_exists('job_postings')) {
            $this->db->from('job_postings');
            $this->db->where('status', $id2);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                return $q->result_array();
            }
            $this->db->from('job_postings');
            $this->db->where('status !=', 'Published');
            return $this->db->get()->result_array();
        }
        return [];
      }

    /**
     * بيانات المتقدمين — المرحلة الأولى (جدول emp_candidate، ليس job_postings).
     * يستبعد المعتمدين (status4 = 2) الموجودين في شاشة المعتمدين.
     */
    public function get_emp_candidate_list_first_stage()
    {
        if (!$this->db->table_exists('emp_candidate')) {
            return [];
        }
        $this->db->from('emp_candidate');
        $this->db->group_start();
        $this->db->where('status4 IS NULL', null, false);
        $this->db->or_where('status4 !=', '2');
        $this->db->group_end();
        $this->db->order_by('id', 'DESC');
        $this->db->limit(2000);
        return $this->db->get()->result_array();
    }

    /**
     * المرشحين المعتمدين من رئيس اللجنة (emp_candidate مع status4 = 2).
     */
    public function get_emp_candidate_list_approved_stage()
    {
        if (!$this->db->table_exists('emp_candidate')) {
            return [];
        }
        $this->db->from('emp_candidate');
        $this->db->where('status4', '2');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(2000);
        return $this->db->get()->result_array();
    }

      function get_emp_candidate_admin102558855555(){
        $id=$this->session->userdata('user_id');
        $id2='0';
      //  $f=' لا يوجد خبرة سابقة';

          $d="الدمام";
        
       
        $sql = "select * from jobs where n16='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function update_order_emkan_status_add_file5($id,$names){
         
           $data = array(
                
                  'path' => $names
                      
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }



       function get_emp_candidate_admin10255555557777(){
        $id=$this->session->userdata('user_id');
        $id2='0';
      //  $f=' لا يوجد خبرة سابقة';
      
        $sql = "select * from emp_candidate;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_emp_candidate_admin102555555565($id){
       
      
        $sql = "select * from jobs where  n2='$id' ;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

         function get_emp_candidate_admin1025555555999(){
        $id=$this->session->userdata('user_id');
        $id2='0';
        $f=' لا يوجد خبرة سابقة';
          $d="ابها";
           $d11="انثى";
 
      
        $sql = "select * from jobs where  n7!='$f' and n16='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

        


         function get_emp_candidate_admin102555555510(){
        $id=$this->session->userdata('user_id');
        $id2='10';
       // $id22='اخرى';
        if ($this->db->table_exists('jobs')) {
            $sql = "select * from jobs where  status='$id2';";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        if ($this->db->table_exists('job_postings')) {
            $this->db->from('job_postings');
            $this->db->where('status', $id2);
            return $this->db->get()->result_array();
        }
        return [];
      }

      function get_emp_candidate_admin102555555510_g(){
        $id=$this->session->userdata('user_id');
        $id2='غزية السبيعي';
       // $id22='اخرى';
        $sql = "select * from emp_candidate where  username='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_emp_candidate_admin102555555510_done(){
        if (!$this->db->table_exists('emp_candidate')) {
            return [];
        }
        $id=$this->session->userdata('user_id');
        $id2='2';
       // $id22='اخرى';
        $sql = "select * from emp_candidate where  status4='$id2';";
        $query = $this->db->query($sql);
        return $query ? $query->result_array() : [];
      }

      function get_emp_candidate_admin102555555510_done112(){
    $id2='2';
    $sql = "select * from emp_candidate where status4='$id2';";
    $query = $this->db->query($sql);
    return $query->result_array();
}


      public function get_emp_candidate_admin102555555510_done112_by_direct_range($from_date, $to_date, $status4 = '2')
{
    // ملاحظة: f5 مخزّن بصيغة نصية YYYY/MM/DD؛
    // نستخدم STR_TO_DATE بعد استبدال أي '-' بـ '/' للمقارنة الصحيحة.
    $sql = "
        SELECT *
        FROM emp_candidate
        WHERE status4 = ?
          AND f5 <> ''
          AND STR_TO_DATE(REPLACE(f5, '-', '/'), '%Y/%m/%d')
              BETWEEN ? AND ?
        ORDER BY STR_TO_DATE(REPLACE(f5, '-', '/'), '%Y/%m/%d') DESC
    ";
    $query = $this->db->query($sql, [$status4, $from_date, $to_date]);
    return $query->result_array();
}



        function get_emp_candidate_admin102555555510_done225($id){
       
        $sql = "select * from emp_candidate where mobile='$id';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_emp_candidate_admin102555555510_done4(){
        $id=$this->session->userdata('user_id');
        $id2='4';
       // $id22='اخرى';
        $sql = "select * from emp_candidate where  status4='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }
       function get_emp_candidate_admin102555555510_done3(){
        $id=$this->session->userdata('user_id');
        $id2='3';
       // $id22='اخرى';
        $sql = "select * from emp_candidate where  status4='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }
       function get_emp_candidate_admin102555555510_done1(){
        $id=$this->session->userdata('user_id');
        $id2='1';
       // $id22='اخرى';
        $sql = "select * from emp_candidate where  status4='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


        function get_emp_candidate_admin102555555510_today(){

        date_default_timezone_set('Asia/Riyadh');     
        $d=date("Y/m/d");    
        $sql = "select * from emp_candidate where  Date_of_the_personal_interview='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


       function get_emp_candidate_admin102555555510_tom(){

        date_default_timezone_set('Asia/Riyadh');     
        $d=date('Y/m/d', strtotime(' +1 day'));
        $sql = "select * from emp_candidate where  Date_of_the_personal_interview='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_emp_candidate_admin102555555510_tom2(){

        date_default_timezone_set('Asia/Riyadh');     
        $d=date('Y/m/d', strtotime(' +2 day'));
        $sql = "select * from emp_candidate where  Date_of_the_personal_interview='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

        function get_emp_candidate_admin102555555510_tom3(){

        date_default_timezone_set('Asia/Riyadh');     
        $d=date('Y/m/d', strtotime(' +3 day'));
        $sql = "select * from emp_candidate where  Date_of_the_personal_interview='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

        function get_emp_candidate_admin102555555510_tom4(){

        date_default_timezone_set('Asia/Riyadh');     
        $d=date('Y/m/d', strtotime(' +4 day'));
        $sql = "select * from emp_candidate where  Date_of_the_personal_interview='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }



        function get_emp_candidate_admin102555555510_a(){
        $id=$this->session->userdata('user_id');
        $id2='عبير الفيفي';
       // $id22='اخرى';
        $sql = "select * from emp_candidate where  username='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

         function get_emp_candidate_admin10255555558(){
        $id=$this->session->userdata('user_id');
        $id2='8';
       // $id22='اخرى';
        $sql = "select * from jobs where  status='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

         function get_emp_candidate_admin10255555557(){
        $id=$this->session->userdata('user_id');
        $id2='7';
       // $id22='اخرى';
        $sql = "select * from jobs where  status='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


  function get_emp_candidate_admin102_user_id(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuture='$id'  and state_interview !=3 and useridfuturetype = $type;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }





        


  function get_emp_candidate_admin102_user_id999(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuture='$id' and state_interview !=9 and state_interview !=3 ;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }





       function get_emp_candidate_admin102_user_id_hrs(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuturetype ='2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


        function get_emp_candidate_admin102_user_id_mang(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuturetype ='1';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_emp_candidate_admin102_user_id_new(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuturetype ='0';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


      function get_emp_candidate_admin102_user_id_co(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuturetype ='4';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


       function get_emp_candidate_admin102_user_id_don(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuturetype ='6';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }



      function get_emp_candidate_admin102_user_id_false(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  useridfuturetype ='5';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }






       function get_emp_candidate_admin102_user_id_all(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }







       function get_emp_candidate_admin102_user_id101(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from emp_candidate where  useridfuture='$id' and useridfuturetype='8';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }



       public function emp_update_status101001($dd){
             $id5='3';
           $data = array(
                
                 'useridfuturetype'=> '5',
                 'useridfuture'=> '3',
                 'user_false_id'=> $this ->session->userdata('user_id'),
                 'user_false_name'=> $this ->session->userdata('name'),
                 'reason'=> $this->input->post('reason'),
                  'status4'=> $id5,
                 '  useridfuturename'=> 'بسام العتيبي'
            );
            $this->db->where('id', $dd);
            return $this->db->update('emp_candidate', $data);
       }

        public function emp_update_status10100150($dd){
             $id6='4';
           $data = array(
                
                 'useridfuturetype'=> '50',
                 'useridfuture'=> '30',
                 'user_false_id'=> $this ->session->userdata('user_id'),
                 'user_false_name'=> $this ->session->userdata('name'),
                 'reason'=> $this->input->post('reason'),
                  'status4'=> $id6,
                 '  useridfuturename'=> 'دعاء'
            );
            $this->db->where('id', $dd);
            return $this->db->update('emp_candidate', $data);
       }

        public function emp_update_status10100160($dd){
             $id7='1';
           $data = array(
                
                 'useridfuturetype'=> '60',
                 'useridfuture'=> '40',
                 'user_false_id'=> $this ->session->userdata('user_id'),
                 'user_false_name'=> $this ->session->userdata('name'),
                 'reason'=> $this->input->post('reason'),
                  'status4'=> $id7,
                 '  useridfuturename'=> 'دعاء'
            );
            $this->db->where('id', $dd);
            return $this->db->update('emp_candidate', $data);
       }


         function get_users_otp($id4){
      
        $sql = "select * from emp_candidate where id='$id4';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }

        function get_users_otp_id_number($id_number){
      
        $sql = "select * from emp_candidate where id='$id_number';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


      function get_users_otp_id_number55222111($id_number){
      
        $sql = "select * from emp_candidate where id='$id_number';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


      function get_users_otp_id_number5522211111($id_number){
      
        $sql = "select * from jobs where id='$id_number';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }








        public function emp_update_status1010019999($id){
             
           $data = array(
                
                 'status'=> '1' 
            );
            $this->db->where('id', $id);
            return $this->db->update('jobs', $data);
       }


        public function emp_update_status101001wait($dd){
             
           $data = array(
                
                 'useridfuturetype'=> '8',
               
            );
            $this->db->where('id', $dd);
            return $this->db->update('emp_candidate', $data);
       }





        







       function get_emp_candidate_admin102_user_id_id($id){
       
        $sql = "select * from emp_candidate where work_flow2='0' and id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }

       function get_emp_candidate_admin102_user_id_id1421($id){
       
        $sql = "select * from ev where emp_id='$id';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }






       function get_emp_candidate_admin103(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from emp_candidate where work_flow2='1';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }




      function get_ordersdata_admin103(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders where status='3';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_ordersdata_admin104(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from orders where status='4';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }








      function get_userdata_star(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from users;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_id_insert_star(){
        
        $sql = "select * from id_insert;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }



       function get_watch_star(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from watch;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }





       function get_itemdata_star(){
       // $id=$this->session->userdata('user_id');
        $sql = "select * from items;";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


       function get_userdata_star_edit_targit(){
        $id=$this->session->userdata('project');
        $id2=$this->session->userdata('section');
        $sql = "select * from users where project='$id' and section='$id2';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }






      function get_userdata_star_update(){
        $id=$this->session->userdata('user_id');
        $sql = "select * from users where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


      function get_item_for_edit($id){
       
        $sql = "select * from items where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }


       function get_userdata_star_targit($id){
       // $id=$this->session->userdata('user_id');
        $sql = "select * from users where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
      }





       function get_sadad_star_update(){
        date_default_timezone_set('Asia/Riyadh');
        $id=$this->session->userdata('user_id');
        $d=date("Y/m/d");
        $sql = "select * from payment where user_id='$id' and sadad_date_day='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

       function get_sadad_star_update_admin(){
        date_default_timezone_set('Asia/Riyadh');
        $d=date("Y/m/d");
        $sql = "select * from payment where sadad_date_day='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


     function get_sadad_star_update_admin_moshrif(){ 
        $sql="SELECT username,user_id, SUM(payment_amount) FROM payment GROUP BY user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


       function get_sadad_star_update_admin_moshrif_project(){ 
        $sql="SELECT username,project, SUM(payment_amount) FROM payment GROUP BY project";
        $query = $this->db->query($sql);
        return $query->result_array();
      }





      function get_sadad_star_update_admin_moshrif_day(){ 
        date_default_timezone_set('Asia/Riyadh');
        $d=date("Y/m/d");
        $sql="SELECT username,user_id, SUM(payment_amount) FROM payment where sadad_date_day='$d' GROUP BY user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


      function get_sadad_star_update_admin_project_day(){ 
        date_default_timezone_set('Asia/Riyadh');
        $d=date("Y/m/d");
        $sql="SELECT username,project, SUM(payment_amount) FROM payment where sadad_date_day='$d' GROUP BY project";
        $query = $this->db->query($sql);
        return $query->result_array();
      }



       function get_sadad_star_update_admin_moshrif_month(){ 
        date_default_timezone_set('Asia/Riyadh');
        $m=date("Y/m");
        $sql="SELECT username,user_id, SUM(payment_amount) FROM payment where sadad_date_month='$m' GROUP BY user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
      }


      function get_sadad_star_update_admin_project_month(){ 
        date_default_timezone_set('Asia/Riyadh');
        $m=date("Y/m");
        $sql="SELECT username,project, SUM(payment_amount) FROM payment where sadad_date_month='$m' GROUP BY project";
        $query = $this->db->query($sql);
        return $query->result_array();
      }




 


      function get_sadad_star_update_sub(){
        date_default_timezone_set('Asia/Riyadh');
         $project=$this ->session->userdata('project');
         $section=$this ->session->userdata('section');

         
        $d=date("Y/m/d");
        $sql = "select * from payment where project='$project' and section='$section' and sadad_date_day='$d';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }






 
     function register($enc_password,$post_image){
        date_default_timezone_set('Asia/Riyadh');
			$data = array(
				 'name' => $this->input->post('name'),
				 'email' => $this->input->post('email'),
                 'username' => $this->input->post('username'),
                 'mobile' => $this->input->post('mobile'),
                 'password' => $enc_password,
                 'type' =>$this->input->post('type'),
                 'status' =>"active",
                // 'section' =>$this->input->post('section'),
                // 'project' =>$this->input->post('project'),
                //  'tragit_month' => $this->input->post('tragit_month'),
                // 'tragit_day' => $this->input->post('tragit_day'),  
                 'path' => $post_image
               
			);

			// Insert user
			return $this->db->insert('users', $data);
        }


        function add_item(){
        date_default_timezone_set('Asia/Riyadh');
            $data = array(
                 'name' => $this->input->post('name'),
                 'type' => $this->input->post('type'),
                 'unit' => $this->input->post('unit'),
                 'status' => $this->input->post('status')
   
            );

            // Insert user
            return $this->db->insert('items', $data);
        }


         function add_emp_candidate101(){
        date_default_timezone_set('Asia/Riyadh');
            $data = array(
                 'name' => $this->input->post('name'),
                 'type' => $this->input->post('type'),
                 'unit' => $this->input->post('unit'),
                 'status' => $this->input->post('status')
   
            );

            // Insert user
            return $this->db->insert('emp_candidate', $data);
        }




         function id_number_update($id){
             
           $data = array(
                  'id_number' => $this->input->POST('id_number'),
                  'job_name' => $this->input->POST('job_name'),
                  'sex' => $this->input->POST('sex'),
                  'job_name_detailes' => $this->input->POST('job_name_detailes')
                  
                 
            );
            $this->db->where('id', $id);
            return $this->db->update('id_insert', $data);
       }


         function id_emp_pointment_update($id){
             
           $data = array(
                  'Date_of_the_personal_interview' => $this->input->POST('Date_of_the_personal_interview'),
                  'Time_of_the_interview' => $this->input->POST('Time_of_the_interview'),
                  'note' => $this->input->POST('note'),
                  'degree' => $this->input->POST('degree'),
                  'insert_name' =>$this ->session->userdata('name'),
                  'The_project' =>$this->input->POST('The_project'),
                  'branch' =>$this->input->POST('branch'),
                   'Years_of_experience_in_the_same_field' =>$this->input->POST('Years_of_experience_in_the_same_field'),
                  'filter_classification' =>$this->input->POST('filter_classification'),
 'state_interview' => '1',
                  
                  
                  
                  'useridfuturetype'=> '3',
                  'useridfuture'=> '1',
                  'useridfuturename'=> 'بسام العتيبي'
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

        function id_emp_pointment_update_jobs_jobs($id){
             
           $data = array(
                  'status' => $this->input->POST('status'),
                  'note' => $this->input->POST('note')
            );
            $this->db->where('id', $id);
            return $this->db->update('jobs', $data);
       }


        function id_emp_pointment_update_jobs_jobs5555($id){
             
           $data = array(
                  'f1' => $this->input->POST('f1'),
                  'f2' => $this->input->POST('f2'),
                  'f3' => $this->input->POST('f3'),
                  'f4' => $this->input->POST('f4'),
                  'f5' => $this->input->POST('f5'),
                  'bransh' => $this->input->POST('bransh')

                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }


        function id_emp_pointment_update_jobs_jobs555533($id){
             
           $data = array(
                  'c1' => $this->input->POST('c1'),
                  'c2' => $this->input->POST('c2'),
                  'c3' => $this->input->POST('c3'),
                  'c4' => $this->input->POST('c4'),
                  'c5' => $this->input->POST('c5'),
                  'c6' => $this->input->POST('c6'),
                  'c7' => $this->input->POST('c7'),
                  'c8' => $this->input->POST('c8'),
                  'c9' => $this->input->POST('c9'),
                  'c10' => $this->input->POST('c10'),
                  'c11' => $this->input->POST('c11'),
                  'c12' => $this->input->POST('c12'),
                  'c13' => $this->input->POST('c13'),
                  'c13' => $this->input->POST('c133'),
                  'c13' => $this->input->POST('c134')

                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

        function id_emp_pointment_update_jobs_jobs555566($id){
             
           $data = array(
                  'job_name' => $this->input->POST('job_name')

                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }


        function id_emp_pointment_update_jobs_jobs555566666($id){
             
           $data = array(
                  'status5' => $this->input->POST('status5')

                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }



        function id_emp_pointment_update_jobs_jobs5555666($id){
            $sms='1';
             
           $data = array(
                  'sms' => $sms
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

       function id_emp_pointment_update_jobs_jobs555566677($id){
            $sms='1';
             
           $data = array(
                  'sms2' => $sms
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

         function id_emp_pointment_update_jobs_jobs5555666771254($id){
            $sms='1';
             
           $data = array(
                  'sms2' => $sms
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }


       function id_emp_pointment_update_jobs_jobs555566655556666($id){
            $sms1='1';
             
           $data = array(
                  'sms1' => $sms1
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }




        function id_emp_pointment_update101($id){
             
           $data = array(
                  'computer_deg' => $this->input->POST('computer_deg')
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }



        function id_emp_view_emp_update($id){
             
        $note_co=$this->input->POST('note_co');
            if ($note_co == "") {
                $note_co="تم الموافقة والإعتماد من العضو المنتدب";
            }else{
                 $note_co=$this->input->POST('note_co');
            }

              $salary_real=$this->input->POST('expected_salary');
            if ($salary_real == "") {
                  $data = array(
                  'note_co' => $note_co,
                //  'salary_real' => $this->input->POST('expected_salary'),
                  'The_project' => $this->input->POST('The_project'),
                  'useridfuturetype'=> '6',
                  'useridfuturename'=> 'بسام العتيبي'
                  
            );
               
            }elseif ($salary_real == 0) {
                 $data = array(
                  'note_co' => $note_co,
                //  'salary_real' => $this->input->POST('expected_salary'),
                  'The_project' => $this->input->POST('The_project'),
                  'useridfuturetype'=> '6',
                  'useridfuturename'=> 'بسام العتيبي'
                  
            );
            }
            else{
                 $data = array(
                  'note_co' => $note_co,
                  'salary_real' => $this->input->POST('expected_salary'),
                  'The_project' => $this->input->POST('The_project'),
                  'useridfuturetype'=> '6',
                  'useridfuturename'=> 'بسام العتيبي'
                  
            );
            }

             
         
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }


       function id_emp_view_emp_update_hrm($id){
             
           $data = array(
                  'note_hrm' => $this->input->POST('note_hrm'),
                  'salary_real' => $this->input->POST('expected_salary'),
                  'The_project' => $this->input->POST('The_project'),
                 'useridfuturetype'=> '3',
                  'useridfuture'=> '1',
                  'useridfuturename'=> 'بسام العتيبي'
                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

         function id_emp_view_emp_update_mang($id){
             
           $data = array(
                   
                
                  'manag_name' => $this ->session->userdata('name'),  
                  'useridfuturetype'=> '3',
                  'useridfuture'=> '1',
                  'useridfuturename'=> ' التوظيف بعد اجراء تقييم المسؤول  '
                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }

         function id_emp_view_emp_update_hrs($id,$username,$useridfuturetype){
             $id4='2';
           $data = array(
               'useridfuture' => $this->input->POST('useridfuture'),
                  'useridfuturename' => $username,
                  'useridfuturetype' => $useridfuturetype,

                 // 'note_hrs' => $this->input->POST('note_hrs'),
                 // 'expected_salary' => $this->input->POST('expected_salary'),
                //  'degree_hrs' => $this->input->POST('degree_hrs'),
                  // 'computer_deg' => $this->input->POST('computer_deg'),
                    'salary_real' => $this->input->POST('salary_real'),
                      'The_project' => $this->input->POST('The_project'),
                      'branch' => $this->input->POST('branch'),
  'q6' => $this->input->POST('branch'),
   'status4' => $id4,
                      
                  
             //     'useridfuturetype'=> '2',
              //    'useridfuture'=> '9',
                  'useridfuturename'=> ' التوظيف بعد اجراء تقييم المسؤول  '
                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }









          function id_emp_pointment_redirection($id,$username,$useridfuturetype){
             
           $data = array(
                  'useridfuture' => $this->input->POST('useridfuture'),
                  'useridfuturename' => $username,
                  'useridfuturetype' => $useridfuturetype
                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }


        function salary_real($id){
             
           $data = array(
                  'salary_real' => $this->input->POST('salary_real')
                  
                  
            );
            $this->db->where('id', $id);
            return $this->db->update('emp_candidate', $data);
       }


 

           function add_id_number(){
            date_default_timezone_set('Asia/Riyadh');
            $data = array(
                 'id_number' => $this->input->post('id_number'),  
                 'job_name' => $this->input->post('job_name'), 
                 'sex' => $this->input->post('sex'),
                 'Employer' => $this->input->post('Employer'),
                 'qualification1' => $this->input->post('qualification1'),
                 'specialization' => $this->input->post('specialization'),    
                 'job_name_detailes' => $this->input->post('job_name_detailes'),   
                 'status' => '0'
            );
            return $this->db->insert('id_insert', $data);
        }

         function add_id_number5412($id){
              date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
             $time=date("h:i:s"); 
            $data = array(
                 'name' => $this ->session->userdata('name'),  
                 'username' => $this ->session->userdata('username'), 
                 'degree' => $this->input->post('n1'),
                 'note' => $this->input->post('n3'),
                 'aprove' => $this->input->post('n2'),
                 'date' => $d,    
                 'time' =>  $time, 
                 'emp_id' =>  $id
            );
            return $this->db->insert('ev', $data);
        }


          function add_job_vacancy(){
             date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $day=date("l");
            $time=date("h:i:s");
            $data = array(
                 'n1' => $this->input->post('n1'),
                 'n2' => $this->input->post('n2'),
                 'n3' => $this->input->post('n3'),
                 'n4' => $this->input->post('n4'),
                 'n5' => $this->input->post('n5'),
                 'n6' => $this->input->post('n6'),
                 'n7' => $this->input->post('n7'),
                 'n8' => $this->input->post('n8'),
                 'n9' => $this->input->post('n9'),
                 'n10' => $this->input->post('n10'),
                 'n11' => $this->input->post('n11'),
                 'date' => $d,
                 'time' => $time,
                 'day' => $day

                
            );
            return $this->db->insert('job_vacancy', $data);
        }





           function add_emp_candidate($id){
        date_default_timezone_set('Asia/Riyadh');
            $data = array(
                 'name' => $this->input->post('name'),
                 'name_en' => $this->input->post('name_en'),
                 'id_number' => $this->input->post('id_number'),
                 'date_of_end_id' => $this->input->post('date_of_end_id'),
                 'nationality' => $this->input->post('nationality'),
                 'marital_status' => $this->input->post('marital_status'),
                 'religion' => $this->input->post('religion'),
                 'date_of_birth' => $this->input->post('date_of_birth'),
                 'place_of_birth' => $this->input->post('place_of_birth'),
                 'mobile' => $this->input->post('mobile'),
                 'tell_no' => $this->input->post('tell_no'),
                 'address' => $this->input->post('address'),
                 'email' => $this->input->post('email'),
                 'profession_Iqama' => $this->input->post('profession_Iqama'),
                 'lawyer_license_no' => $this->input->post('lawyer_license_no'),
                 'qualification1' => $this->input->post('qualification1'),
                 'major' => $this->input->post('major'),
                 'gpa' => $this->input->post('gpa'),
                 'educational_institution' => $this->input->post('educational_institution'),
                 'date_of_graduation' => $this->input->post('date_of_graduation'),
                 'identifier1' => $this->input->post('identifier1'),
                 'city1' => $this->input->post('city1'),
                 'job_title1' => $this->input->post('job_title1'),
                 'mobile1' => $this->input->post('mobile1'),
                 'identifier2' => $this->input->post('identifier2'),
                 'city2' => $this->input->post('city2'),
                 'job_title2' => $this->input->post('job_title2'),
                 'mobile2' => $this->input->post('mobile2'),
                 'company' => $this->input->post('company'),
                 'job_title3' => $this->input->post('job_title3'),
                 'work_years' => $this->input->post('work_years'),
                 'salary_old' => $this->input->post('salary_old'),
                 'course1' => $this->input->post('course1'),
                 'course2' => $this->input->post('course2'),
                 'course3' => $this->input->post('course3'),
                 'course4' => $this->input->post('course4'),
                 'course5' => $this->input->post('course5'),
                 'course6' => $this->input->post('course6'),
                 'course7' => $this->input->post('course7'),
                 'course8' => $this->input->post('course8'),
                 'course9' => $this->input->post('course9'),
                 'course10' => $this->input->post('course10'),
                 'course11' => $this->input->post('course11'),
                 'company1' => $this->input->post('company1'),
                 'job_title31' => $this->input->post('job_title31'),
                 'work_years1' => $this->input->post('work_years1'),
                 'salary_old1' => $this->input->post('salary_old1'),
                 'company2' => $this->input->post('company2'),
                 'job_title32' => $this->input->post('job_title32'),
                 'work_years2' => $this->input->post('work_years2'),
                 'salary_old2' => $this->input->post('salary_old2'),
                 'biilding_number' => $this->input->post('biilding_number'),
                 'street_name' => $this->input->post('street_name'),
                 'the_name_of_the_neighborhood' => $this->input->post('the_name_of_the_neighborhood'),
                 'the_city_name' => $this->input->post('the_city_name'),
                 'postal_code' => $this->input->post('postal_code'),
                 'additional_number' => $this->input->post('additional_number'),
                 'unit_number' => $this->input->post('unit_number')

            );

            // Insert user

                $this->db->where('id_number', $id);
            return $this->db->update('emp_candidate', $data);

        }

          public function reg_emp_update102($id8){ 
            $data = array(
                'name_en' => $this->input->post('name_en')
              );
                  $this->db->where('id_number', $id8);
                  return $this->db->update('emp_candidate', $data);
            }



          function add_interview(){

            date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
                        if ($this->input->post('q1') =='نعم' ) {
                   $Date_of_the_interview_old = $this->input->post('Date_of_the_interview_old');    
                }else{
                     $Date_of_the_interview_old="";
                }
                   if ($this->input->post('q2')=='نعم') {
                   $current_job = $this->input->post('current_job'); 
                   $salary_befor_cut = $this->input->post('salary_befor_cut');   

                    
                }else{
                     $current_job="";
                      $salary_befor_cut="";

                }

                if ($this->input->post('q5')=='نعم') {
                   $premium_value = $this->input->post('premium_value');    
                }else{
                     $premium_value="";
                }

                 if ($this->input->post('q5')=='نعم') {
                   $premium_value = $this->input->post('premium_value');    
                }else{
                     $premium_value="";
                }

                if ($this->input->post('q7')=='نعم') {
                   $details7 = $this->input->post('details7');    
                }else{
                     $details7="";
                }

                if ($this->input->post('q8')=='نعم') {
                   $details8 = $this->input->post('details8');    
                }else{
                     $details8="";
                }
                if ($this->input->post('q9')=='نعم') {
                   $details9 = $this->input->post('details9');    
                }else{
                     $details9="";
                }
                if ($this->input->post('q10')=='نعم') {
                   $details10 = $this->input->post('details10');    
                }else{
                     $details10="";
                }

                if ($this->input->post('q101')=='1') {
                   $expected_salary = $this->input->post('expected_salary');    
                }else{
                     $expected_salary="لا يرغب بالافصاح";
                }




            $data = array( 
                 'name' => $this->input->post('name'),
                 'id_number' => $this->input->post('id_number'),  
                 'nationality' => $this->input->post('nationality'),
                 'marital_status' => $this->input->post('marital_status'),
                 'mobile' => $this->input->post('mobile'),
                 'job_name' => $this->input->post('job_name'),    
                 'q1' => $this->input->post('q1'),
                 'q2' => $this->input->post('q2'),
                 'q3' => $this->input->post('q3'),
                 'q331' => $this->input->post('q331'),
                 'q332' => $this->input->post('q332'),
                 'q333' => $this->input->post('q333'),
                 'q31' => $this->input->post('q31'),
                 'q32' => $this->input->post('q32'),
                 'q33' => $this->input->post('q33'),
                 'q34' => $this->input->post('q34'),
                 'q35' => $this->input->post('q35'),
                 'q36' => $this->input->post('q36'),
                 'q4' => $this->input->post('q4'),
                 'q5' => $this->input->post('q5'),
                 'q6' => $this->input->post('q6'),
                 'q7' => $this->input->post('q7'),
                 'q8' => $this->input->post('q8'),
                 'q9' => $this->input->post('q9'),
                 'q10' => $this->input->post('q10'),
                 'q11' => $this->input->post('q11'),
                 'q12' => $this->input->post('q12'),
                 'q13' => $this->input->post('q13'),
                 'b1' => $this->input->post('b1'),
                 'b2' => $this->input->post('b2'),
                 'b12' => $this->input->post('b12'),
                 'b13' => $this->input->post('b13'),
                 'b14' => $this->input->post('b14'),
                 'b15' => $this->input->post('b15'),
                 'b16' => $this->input->post('b16'),
                 'b17' => $this->input->post('b17'),
                 'b18' => $this->input->post('b18'),
                 'b19' => $this->input->post('b19'),
                 'b20' => $this->input->post('b20'),
                 'b21' => $this->input->post('b21'),
                 'qualification1' => $this->input->post('qualification1'),
                 'specialization' => $this->input->post('specialization'),

                 //'q14' => $this->input->post('q14'),
                 'Date_of_the_interview_old' => $Date_of_the_interview_old,
                 'current_job' => $current_job,
                 'salary_befor_cut' => $salary_befor_cut,    
                 'premium_value' => $premium_value,
                 'details7' => $details7,
                 'details8' => $details8,
                 'details9' => $details9,
                 'details10' => $details10,
                 'expected_salary' => $expected_salary,
                 'date_of_birth' => $this->input->post('date_of_birth'),
                 'qualification1' => $this->input->post('qualification1'),
                 'Employer' => $this->input->post('Employer'),
                 'day' => $d,
                 'month' => $m,
                 'year' => $y,
                 'user_id' => $this ->session->userdata('user_id'),
                 'username' => $this ->session->userdata('name'),
'family_members' => $this->input->post('family_members'),
   'job_name_detailes' => $this->input->post('job_name_detailes'),
   'n11' => $this->input->post('n11')
   
            );
             
            
            return $this->db->insert('emp_candidate', $data);
 
        }



            function add_interview_update(){

            date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
                        if ($this->input->post('q1') =='نعم' ) {
                   $Date_of_the_interview_old = $this->input->post('Date_of_the_interview_old');    
                }else{
                     $Date_of_the_interview_old="";
                }
                   if ($this->input->post('q2')=='نعم') {
                   $current_job = $this->input->post('current_job'); 
                   $salary_befor_cut = $this->input->post('salary_befor_cut');   

                    
                }else{
                     $current_job="";
                      $salary_befor_cut="";

                }

                if ($this->input->post('q5')=='نعم') {
                   $premium_value = $this->input->post('premium_value');    
                }else{
                     $premium_value="";
                }

                 if ($this->input->post('q5')=='نعم') {
                   $premium_value = $this->input->post('premium_value');    
                }else{
                     $premium_value="";
                }

                if ($this->input->post('q7')=='نعم') {
                   $details7 = $this->input->post('details7');    
                }else{
                     $details7="";
                }

                if ($this->input->post('q8')=='نعم') {
                   $details8 = $this->input->post('details8');    
                }else{
                     $details8="";
                }
                if ($this->input->post('q9')=='نعم') {
                   $details9 = $this->input->post('details9');    
                }else{
                     $details9="";
                }
                if ($this->input->post('q10')=='نعم') {
                   $details10 = $this->input->post('details10');    
                }else{
                     $details10="";
                }

                if ($this->input->post('q101')=='1') {
                   $expected_salary = $this->input->post('expected_salary');    
                }else{
                     $expected_salary="لا يرغب بالافصاح";
                }




            $data = array( 
                 'name' => $this->input->post('name'),
                 'id_number' => $this->input->post('id_number'),  
                 'nationality' => $this->input->post('nationality'),
                 'marital_status' => $this->input->post('marital_status'),
                 'mobile' => $this->input->post('mobile'),
                 'job_name' => $this->input->post('job_name'),    
                 'q1' => $this->input->post('q1'),
                 'q2' => $this->input->post('q2'),
                 'q3' => $this->input->post('q3'),
                 'q331' => $this->input->post('q331'),
                 'q332' => $this->input->post('q332'),
                 'q333' => $this->input->post('q333'),
                 'q31' => $this->input->post('q31'),
                 'q32' => $this->input->post('q32'),
                 'q33' => $this->input->post('q33'),
                 'q34' => $this->input->post('q34'),
                 'q35' => $this->input->post('q35'),
                 'q36' => $this->input->post('q36'),
                 'q4' => $this->input->post('q4'),
                 'q5' => $this->input->post('q5'),
                 'q6' => $this->input->post('q6'),
                 'q7' => $this->input->post('q7'),
                 'q8' => $this->input->post('q8'),
                 'q9' => $this->input->post('q9'),
                 'q10' => $this->input->post('q10'),
                 'q11' => $this->input->post('q11'),
                 'q12' => $this->input->post('q12'),
                 'q13' => $this->input->post('q13'),
                 'b1' => $this->input->post('b1'),
                 'b2' => $this->input->post('b2'),
                 'b12' => $this->input->post('b12'),
                 'b13' => $this->input->post('b13'),
                 'b14' => $this->input->post('b14'),
                 'b15' => $this->input->post('b15'),
                 'b16' => $this->input->post('b16'),
                 'b17' => $this->input->post('b17'),
                 'b18' => $this->input->post('b18'),
                 'b19' => $this->input->post('b19'),
                 'b20' => $this->input->post('b20'),
                 'b21' => $this->input->post('b21'),
                 'qualification1' => $this->input->post('qualification1'),
                 'specialization' => $this->input->post('specialization'),

                 //'q14' => $this->input->post('q14'),
                 'Date_of_the_interview_old' => $Date_of_the_interview_old,
                 'current_job' => $current_job,
                 'salary_befor_cut' => $salary_befor_cut,    
                 'premium_value' => $premium_value,
                 'details7' => $details7,
                 'details8' => $details8,
                 'details9' => $details9,
                 'details10' => $details10,
                 'expected_salary' => $expected_salary,
                 'date_of_birth' => $this->input->post('date_of_birth'),
                 'qualification1' => $this->input->post('qualification1'),
                 'Employer' => $this->input->post('Employer'),
                 'day' => $d,
                 'month' => $m,
                 'year' => $y,
                 'user_id' => $this ->session->userdata('user_id'),
                 'username' => $this ->session->userdata('name'),
'family_members' => $this->input->post('family_members'),
   'job_name_detailes' => $this->input->post('job_name_detailes')
   
            );
             
            
            return $this->db->insert('emp_candidate', $data);
 
        }






           function add_interviewf(){

         date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");

                        if ($this->input->post('q1') =='نعم' ) {
                   $Date_of_the_interview_old = $this->input->post('Date_of_the_interview_old');    
                }else{
                     $Date_of_the_interview_old="";
                }
                   if ($this->input->post('q2')=='نعم') {
                   $current_job = $this->input->post('current_job'); 
                   $salary_befor_cut = $this->input->post('salary_befor_cut');   

                    
                }else{
                     $current_job="";
                      $salary_befor_cut="";

                }

                if ($this->input->post('q5')=='نعم') {
                   $premium_value = $this->input->post('premium_value');    
                }else{
                     $premium_value="";
                }

                 if ($this->input->post('q5')=='نعم') {
                   $premium_value = $this->input->post('premium_value');    
                }else{
                     $premium_value="";
                }

                if ($this->input->post('q7')=='نعم') {
                   $details7 = $this->input->post('details7');    
                }else{
                     $details7="";
                }

                if ($this->input->post('q8')=='نعم') {
                   $details8 = $this->input->post('details8');    
                }else{
                     $details8="";
                }
                if ($this->input->post('q9')=='نعم') {
                   $details9 = $this->input->post('details9');    
                }else{
                     $details9="";
                }
                if ($this->input->post('q10')=='نعم') {
                   $details10 = $this->input->post('details10');    
                }else{
                     $details10="";
                }
                 if ($this->input->post('q22')=='نعم') {
                   $month_of_ch = $this->input->post('month_of_ch');
                   $ch_count = $this->input->post('ch_count');      
                    
                }else{
                     $month_of_ch="";
                     $ch_count="";
                     
                }
                 if ($this->input->post('q23')=='نعم') {
                   $kids = $this->input->post('kids');    
                }else{
                     $kids="";
                }
                 if ($this->input->post('q24')=='نعم') {
                   $kids2 = $this->input->post('kids2');    
                }else{
                     $kids2="";
                }

                 if ($this->input->post('q101')=='1') {
                   $expected_salary = $this->input->post('expected_salary');    
                }else{
                     $expected_salary="لا يرغب بالافصاح";
                }


                
            $data = array( 
                 'name' => $this->input->post('name'),
                 'id_number' => $this->input->post('id_number'),  
                 'nationality' => $this->input->post('nationality'),
                 'marital_status' => $this->input->post('marital_status'),
                 'mobile' => $this->input->post('mobile'),
                 'job_name' => $this->input->post('job_name'),    
                 'q1' => $this->input->post('q1'),
                 'q2' => $this->input->post('q2'),
                 'q3' => $this->input->post('q3'),
                 'q331' => $this->input->post('q331'),
                 'q332' => $this->input->post('q332'),
                 'q333' => $this->input->post('q333'),
                 'q31' => $this->input->post('q31'),
                 'q32' => $this->input->post('q32'),
                 'q33' => $this->input->post('q33'),
                 'q34' => $this->input->post('q34'),
                 'q35' => $this->input->post('q35'),
                 'q36' => $this->input->post('q36'),
                 'q4' => $this->input->post('q4'),
                 'q5' => $this->input->post('q5'),
                 'q6' => $this->input->post('q6'),
                 'q7' => $this->input->post('q7'),
                 'q8' => $this->input->post('q8'),
                 'q9' => $this->input->post('q9'),
                 'q10' => $this->input->post('q10'),
                 'q11' => $this->input->post('q11'),
                 'q12' => $this->input->post('q12'),
                 'q13' => $this->input->post('q13'),


                 'qualification1' => $this->input->post('qualification1'),
                 'specialization' => $this->input->post('specialization'),

                 //'q14' => $this->input->post('q14'),
                 'Date_of_the_interview_old' => $Date_of_the_interview_old,
                 'current_job' => $current_job,
                 'salary_befor_cut' => $salary_befor_cut,    
                 'premium_value' => $premium_value,
                 'details7' => $details7,
                 'details8' => $details8,
                 'details9' => $details9,
                 'details10' => $details10,
                 'expected_salary' => $expected_salary,
                 'q22' => $this->input->post('q22'),
                 'month_of_ch' => $month_of_ch,
                 'ch_count' => $ch_count,
                 'q23' => $this->input->post('q23'),
                 'kids' => $kids,
                 'q24' => $this->input->post('q24'),
                 'kids2' => $kids2,
                 'date_of_birth' => $this->input->post('date_of_birth'),
                 'qualification1' => $this->input->post('qualification1'),
                 'day' => $d,
                 'month' => $m,
                 'year' => $y,
                 'user_id' => $this ->session->userdata('user_id'),
                 'username' => $this ->session->userdata('name'),
'family_members' => $this->input->post('family_members'),
 'job_name_detailes' => $this->input->post('job_name_detailes')
         
            );
             
            
            return $this->db->insert('emp_candidate', $data);
 
        }



       function item_update($id){
             
           $data = array(
                  'name' =>$this->input->POST('name'),
                  'type' => $this->input->POST('type'),
                  'unit' => $this->input->POST('unit'),
                  'status' => $this->input->POST('status')         
            );
            $this->db->where('id', $id);
            return $this->db->update('items', $data);
       }

         function user_update_conect($id){
             
           $data = array(
                  'conect' =>'1',        
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
       }

        function user_update_conect_out($id){
            // $id=$this->session->unset_userdata('user_id2');
           $data = array(
                  'conect' =>'0',        
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
       }





       function add_watch($username,$op_name){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $time=date("h:i:s");
            $data = array(
                 'user_name' => $username,
                 'time' => $time,
                 'date' => $y,
                 'month' =>  $m,
                 'day' => $d,
                 'op_name' => $op_name
            );
            return $this->db->insert('watch', $data);
        }

         function add_watch101($username,$op_name,$op_type){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $time=date("h:i:s");
            $data = array(
                 'user_name' => $username,
                 'time' => $time,
                 'date' => $y,
                 'month' =>  $m,
                 'day' => $d,
                 'op_name' => $op_name,
                 'op_type' => $op_type,

            );
            return $this->db->insert('watch', $data);
        }





    


         function get_items1(){
            $Payment=$this->session->userdata('Payment');
        $sql = "select * from items where type='$Payment';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }




    function add_order(){
        date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $time=date("h:i:s");
            if ($this->input->post('priority') == 1) {
                $status='2';
            }else
            $status='1';
           

            $data = array(
                  'user_id' => $this ->session->userdata('user_id'),
                  'name' => $this ->session->userdata('name'),
                  'titel' => $this->input->post('titel'),
                  'reason' => $this->input->post('reason'),
                  'type' => $this->session->userdata('Payment'),
                  'priority' => $this->input->post('priority'),
                  'Payment' => $this->input->post('Payment'),
                  
                  //'path' => $names,
                  'date_order' => $d,
                  'date_month' => $m,
                  'date_years' => $y,
                  'time_order' => $time,  
                  'location' => $this->input->post('location'),    

                  'status' => $status
            );
            return $this->db->insert('orders', $data);
        }


         function create_attachment($post_image,$id){
        
            $data = array(
                  'user_id' => $this ->session->userdata('user_id'), 
                  'name' => $this->input->post('Name'),
                  'path' => $post_image,
                  'order_id' => $id,    
                  
            );
            return $this->db->insert('attachment', $data);
        }


          function create_attachment101($post_image,$id){
        
            $data = array(
                  'name' => 'الصورة الشخصية',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }

         function create_attachment102($post_image,$id){
        
            $data = array(
                  'name' => 'الهوية / كرت العائلة',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }

         function create_attachment103($post_image,$id){
        
            $data = array(
                  'name' => 'صور المؤهلات العلمية',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }

           function create_attachment104($post_image,$id){
        
            $data = array(
                  'name' => 'صور من الخبرات',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }

          function create_attachment105($post_image,$id){
        
            $data = array(
                  'name' => 'صورة إخلاء طرف',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }


           function create_attachment106($post_image,$id){
        
            $data = array(
                  'name' => 'صورة    إتمام الكشف الطبي',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }

         function create_attachment107($post_image,$id){
        
            $data = array(
                  'name' => 'صورة         صحيفة الأدلة الجنائية',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }


         function create_attachment108($post_image,$id){
        
            $data = array(
                  'name' => 'الكفالة الوظيفية',
                  'path' => $post_image,
                  'emp_id' => $id,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }


         function create_attachment109($post_image,$id1){
        
            $data = array(
                  'name' => 'رقم الحساب البنكي  (الأيبان)',
                  'path' => $post_image,
                  'emp_id' => $id1,    
                  
            );
            return $this->db->insert('att_emp', $data);
        }













          function add_detaies_order($id5){
          
            $data = array(
                  'order_id' => $id5,
                  'item_name' => $this->input->post('item_name'),
                  'quantity' => $this->input->post('quantity'),    
                  'price' => $this->input->post('price')
            );
            return $this->db->insert('order_detailes', $data);
         }
          function add_detaies_order1($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name1'),
                  'quantity' => $this->input->post('quantity1'),   
                  'price' => $this->input->post('price1') 
            );
            return $this->db->insert('order_detailes', $data);
         }
          function add_detaies_order2($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name2'),
                  'quantity' => $this->input->post('quantity2'),    
                  'price' => $this->input->post('price2')
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order3($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name3'),
                  'quantity' => $this->input->post('quantity3'), 
                  'price' => $this->input->post('price3')   
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order4($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name4'),
                  'quantity' => $this->input->post('quantity4'),   
                  'price' => $this->input->post('price4') 
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order5($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name5'),
                  'quantity' => $this->input->post('quantity5'),
                  'price' => $this->input->post('price5')    
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order6($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' =>$this->input->post('item_name6'),
                  'quantity' => $this->input->post('quantity6'),  
                  'price' => $this->input->post('price6')  
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order7($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name7'),
                  'quantity' => $this->input->post('quantity7'),
                  'price' => $this->input->post('price7')    
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order8($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name8'),
                  'quantity' => $this->input->post('quantity8'),  
                  'price' => $this->input->post('price8')  
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order9($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name9'),
                  'quantity' => $this->input->post('quantity9'),  
                  'price' => $this->input->post('price9')  
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order10($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name10'),
                  'quantity' => $this->input->post('quantity10'),  
                  'price' => $this->input->post('price10')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order11($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name11'),
                  'quantity' => $this->input->post('quantity11'),  
                  'price' => $this->input->post('price11')  
            );
            return $this->db->insert('order_detailes', $data);
         }


         function add_detaies_order12($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name12'),
                  'quantity' => $this->input->post('quantity12'),  
                  'price' => $this->input->post('price12')  
            );
            return $this->db->insert('order_detailes', $data);
         }


          function add_detaies_order13($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name13'),
                  'quantity' => $this->input->post('quantity13'),  
                  'price' => $this->input->post('price13')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order14($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name14'),
                  'quantity' => $this->input->post('quantity14'),  
                  'price' => $this->input->post('price14')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order15($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name15'),
                  'quantity' => $this->input->post('quantity15'),  
                  'price' => $this->input->post('price15')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order16($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name16'),
                  'quantity' => $this->input->post('quantity16'),  
                  'price' => $this->input->post('price16')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order17($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name17'),
                  'quantity' => $this->input->post('quantity17'),  
                  'price' => $this->input->post('price17')  
            );
            return $this->db->insert('order_detailes', $data);
         }
          function add_detaies_order18($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name18'),
                  'quantity' => $this->input->post('quantity18'),  
                  'price' => $this->input->post('price18')  
            );
            return $this->db->insert('order_detailes', $data);
         }
         function add_detaies_order19($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name19'),
                  'quantity' => $this->input->post('quantity19'),  
                  'price' => $this->input->post('price19')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order20($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name20'),
                  'quantity' => $this->input->post('quantity20'),  
                  'price' => $this->input->post('price20')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order21($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name21'),
                  'quantity' => $this->input->post('quantity21'),  
                  'price' => $this->input->post('price21')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order22($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name22'),
                  'quantity' => $this->input->post('quantity22'),  
                  'price' => $this->input->post('price22')  
            );
            return $this->db->insert('order_detailes', $data);
         }


          function add_detaies_order23($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name23'),
                  'quantity' => $this->input->post('quantity23'),  
                  'price' => $this->input->post('price23')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order24($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name24'),
                  'quantity' => $this->input->post('quantity24'),  
                  'price' => $this->input->post('price24')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order25($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name25'),
                  'quantity' => $this->input->post('quantity25'),  
                  'price' => $this->input->post('price25')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order26($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name26'),
                  'quantity' => $this->input->post('quantity26'),  
                  'price' => $this->input->post('price26')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order27($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name27'),
                  'quantity' => $this->input->post('quantity27'),  
                  'price' => $this->input->post('price27')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order28($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name28'),
                  'quantity' => $this->input->post('quantity28'),  
                  'price' => $this->input->post('price28')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order29($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name29'),
                  'quantity' => $this->input->post('quantity29'),  
                  'price' => $this->input->post('price29')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order30($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name30'),
                  'quantity' => $this->input->post('quantity30'),  
                  'price' => $this->input->post('price30')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order31($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name31'),
                  'quantity' => $this->input->post('quantity31'),  
                  'price' => $this->input->post('price31')  
            );
            return $this->db->insert('order_detailes', $data);
         }


         function add_detaies_order32($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name32'),
                  'quantity' => $this->input->post('quantity32'),  
                  'price' => $this->input->post('price32')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order33($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name33'),
                  'quantity' => $this->input->post('quantity33'),  
                  'price' => $this->input->post('price33')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order34($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name34'),
                  'quantity' => $this->input->post('quantity34'),  
                  'price' => $this->input->post('price34')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order35($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name35'),
                  'quantity' => $this->input->post('quantity35'),  
                  'price' => $this->input->post('price35')  
            );
            return $this->db->insert('order_detailes', $data);
         }


         function add_detaies_order36($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name36'),
                  'quantity' => $this->input->post('quantity36'),  
                  'price' => $this->input->post('price36')  
            );
            return $this->db->insert('order_detailes', $data);
         }


         function add_detaies_order37($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name37'),
                  'quantity' => $this->input->post('quantity37'),  
                  'price' => $this->input->post('price37')  
            );
            return $this->db->insert('order_detailes', $data);
         }


         function add_detaies_order38($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name38'),
                  'quantity' => $this->input->post('quantity38'),  
                  'price' => $this->input->post('price38')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order39($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name39'),
                  'quantity' => $this->input->post('quantity39'),  
                  'price' => $this->input->post('price39')  
            );
            return $this->db->insert('order_detailes', $data);
         }


         function add_detaies_order40($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name40'),
                  'quantity' => $this->input->post('quantity40'),  
                  'price' => $this->input->post('price40')  
            );
            return $this->db->insert('order_detailes', $data);
         }


         function add_detaies_order41($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name41'),
                  'quantity' => $this->input->post('quantity41'),  
                  'price' => $this->input->post('price41')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order42($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name42'),
                  'quantity' => $this->input->post('quantity42'),  
                  'price' => $this->input->post('price42')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         function add_detaies_order43($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name43'),
                  'quantity' => $this->input->post('quantity43'),  
                  'price' => $this->input->post('price43')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order44($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name44'),
                  'quantity' => $this->input->post('quantity44'),  
                  'price' => $this->input->post('price44')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order45($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name45'),
                  'quantity' => $this->input->post('quantity45'),  
                  'price' => $this->input->post('price45')  
            );
            return $this->db->insert('order_detailes', $data);
         }

          function add_detaies_order46($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name46'),
                  'quantity' => $this->input->post('quantity46'),  
                  'price' => $this->input->post('price46')  
            );
            return $this->db->insert('order_detailes', $data);
         }


          function add_detaies_order47($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name47'),
                  'quantity' => $this->input->post('quantity47'),  
                  'price' => $this->input->post('price47')  
            );
            return $this->db->insert('order_detailes', $data);
         }


          function add_detaies_order48($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name48'),
                  'quantity' => $this->input->post('quantity48'),  
                  'price' => $this->input->post('price48')  
            );
            return $this->db->insert('order_detailes', $data);
         }


          function add_detaies_order49($id){
          
            $data = array(
                  'order_id' => $id,
                  'item_name' => $this->input->post('item_name49'),
                  'quantity' => $this->input->post('quantity49'),  
                  'price' => $this->input->post('price49')  
            );
            return $this->db->insert('order_detailes', $data);
         }

         //  function add_detaies_order50($id){
          
         //    $data = array(
         //          'order_id' => $id,
         //          'item_name' => $this->input->post('item_name50'),
         //          'quantity' => $this->input->post('quantity50'),  
         //          'price9' => $this->input->post('price50')  
         //    );
         //    return $this->db->insert('order_detailes', $data);
         // }














         public function max_order(){  

           $this->db->select_max('id');
           $this->db->from('orders');
           $query = $this->db->get();
           return $query->row()->id;
        }



 
        function payment($post_image){
            date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $data = array(
                 'user_id' => $this ->session->userdata('user_id'),
                 'username' => $this ->session->userdata('username'),
                 'project' => $this ->session->userdata('project'),
                 'section' => $this ->session->userdata('section'),
                 'payment_amount' => $this->input->post('payment_amount'),
                 'date_amount' =>$d,
                 'time_amount' =>date("h:i:sa"),
                
                 'sadad_date_years' =>$y,
                 'sadad_date_month' =>$m,
                 'sadad_date_day' =>$d,  
                 'path' => $post_image
               
            );

            // Insert user
            return $this->db->insert('payment', $data);
        }



          function add_member($enc_password,$post_image){
             $userid=$this ->session->userdata('user_id');
        // User data array
      $data = array(
         'name' => $this->input->post('name'),
         'email' => $this->input->post('email'),
                 'username' => $this->input->post('username'),
                 'mobile' => $this->input->post('mobile'),
                 'idno' => $this->input->post('idno'),
                 'email' => $this->input->post('email'),
                 // 'username'=>$this->input->post('username'),
                 'password' => $enc_password,
                 'type' =>$this->input->post('type'),
                 'group_id' =>$userid,
                  'path' => $post_image
               
      );

      // Insert user
      return $this->db->insert('users', $data);
        }



         function sendSMS($userAccount, $passAccount, $numbers, $sender, $msg, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
{
  global $arraySendMsg;
  $url = "http://www.mobily.ws/api/msgSend.php";
  $applicationType = "68";  
  $sender = urlencode($sender);
  $domainName = $_SERVER['SERVER_NAME'];

    if(!empty($userAccount) && empty($passAccount)) {
        $stringToPost = "apiKey=".$userAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
    } else {
        $stringToPost = "mobile=".$userAccount."&password=".$passAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
    }
    $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $stringToPost);
  $result = curl_exec($ch);

  if($viewResult)
    $result = printStringResult(trim($result) , $arraySendMsg);
  return $result;
}

         function sendSMSWK($userAccount, $passAccount, $numbers, $sender, $msg, $msgKey, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
{
  global $arraySendMsgWK;
  $url = "https://www.mobily.ws/api/msgSendWK.php";
  $applicationType = "68";
  $sender = urlencode($sender);
  $domainName = $_SERVER['SERVER_NAME'];

    if(!empty($userAccount) && empty($passAccount)) {
        $stringToPost = "apiKey=".$userAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&msgKey=".$msgKey."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
    } else {
        $stringToPost = "mobile=".$userAccount."&password=".$passAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&msgKey=".$msgKey."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
    }

    $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $stringToPost);
  $result = curl_exec($ch);

  if($viewResult)
    $result = printStringResult(trim($result) , $arraySendMsgWK);
  return $result;
}


        
   //       function check_username_exists($username){
			// $query = $this->db->get_where('users', array('username' => $username));
			// if(empty($query->row_array())){
			// 	return true;
			// } else {
			// 	return false;
			// }
   //      }
        
        // Check email exists
		 function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

     function check_idno_exists($idno){
      $query = $this->db->get_where('users', array('idno' => $idno));
      if(empty($query->row_array())){
        return true;
      } else {
        return false;
      }
    }


    function check_mobile_exists($mobile){
      $query = $this->db->get_where('users', array('mobile' => $mobile));
      if(empty($query->row_array())){
        return true;
      } else {
        return false;
      }
    }

     function check_username_exists($username){
      $query = $this->db->get_where('users', array('username' => $username));
      if(empty($query->row_array())){
        return true;
      } else {
        return false;
      }
    }



function cuntt_emp_candidate1101617(){
   $results = array();
        $table = 'emp_candidate';
         $d="17";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }
function cuntt_emp_candidate1101618221(){
   $results = array();
        $table = 'emp_candidate';
         $d="21";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

 function cuntt_emp_candidate110161822(){
   $results = array();
        $table = 'emp_candidate';
         $d="20";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate1101618(){
   $results = array();
        $table = 'emp_candidate';
         $d="18";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }




 function cuntt_emp_candidate1101616(){
   $results = array();
        $table = 'emp_candidate';
         $d="16";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


public function getmydata_by_username($username) {
    $this->db->where('username', $username);
    $query = $this->db->get('users');
    
    if($query->num_rows() == 1) {
        return $query->row_array();
    } else {
        return false;
    }
}
		
        
        
          function login($username, $password){
            //validate
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $result =$this->db->get('users');

            if($result->num_rows() == 1){
                return $result->row(0)->id;

            }else{
                return false;
            }

        }
        
          function customer_update($id,$post_image){
             
		   $data = array(
			      'name' =>$this->input->POST('name'),
	              'username' => $this->input->POST('name'),
                  'mobile' => $this->input->POST('mobile'),
                  'job' => $this->input->POST('job'),
                  'email' => $this->input->POST('email'),
                  'titel' => $this->input->POST('titel'),
                  'idno' => $this->input->POST('idno'),
                  'path' => $post_image
                 
			);
			$this->db->where('id', $id);
			return $this->db->update('users', $data);
       }

       function my_profile_update($post_image){
             $id=$this ->session->userdata('user_id');
           $data = array(
                  'name' =>$this->input->POST('name'),
                  'mobile' => $this->input->POST('mobile'),
                  'email' => $this->input->POST('email'),
                  'path' => $post_image
                 
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
       }

        function my_password_update($password){
             $id=$this ->session->userdata('user_id');
           $data = array(
                  'password' =>$password,
                 
                 
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
       }


        function my_targit_update($id){
             
           $data = array(
                  'tragit_day' => $this->input->POST('tragit_day'),
                  'tragit_month' => $this->input->POST('tragit_month'),
                  'path' => $post_image
                 
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
       }

               function my_items_update($id){
             
           $data = array(
                  'item_name' => $this->input->POST('item_name'),
                  'quantity' => $this->input->POST('quantity'),
                  'price' => $this->input->POST('price')
                 
            );
            $this->db->where('id', $id);
            return $this->db->update('order_detailes', $data);
       }




        function my_user_update(){
             $id=$this->input->POST('d1');
           $data = array(
                  'name' => $this->input->POST('d2')
                  
                 
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
       }




        
         function get_customers($id){
        $sql = "select * from users where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


     function get_customers77($id){
        $sql = "select * from emp_candidate where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


      function get_orders202($id){
        $sql = "select * from orders where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


      function get_attachment202($id){
        $sql = "select * from attachment where order_id='$id';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


     function get_ordersdetailes_202($id){
        $sql = "select * from order_detailes where order_id='$id';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    function get_customersss($id){
        $sql = "select * from users where username='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
     function get_categories6(){   
        $sql =" SELECT * FROM  categories ORDER BY id DESC ;";

        //$sql = "select * from categories;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


     function get_attachment($id){   
        $sql =" SELECT * FROM  attachment where did='$id';";

        //$sql = "select * from categories;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    
    
      function delete_user($id){         
       
        $this->db->where('id', $id);
        $this->db->delete('users');
        return true;
        }
        
      function delete_action($id){         
        $this->db->where('id', $id);
        $this->db->delete('action');
        return true;
        }


        function delete_attachment($id){         
        $this->db->where('id', $id);
        $this->db->delete('attachment');
        return true;
        }


       function get_customers77all_complaints9999($n3){

        $sql = "select * from emp_candidate where mobile='$n3';";
        $query = $this->db->query($sql);
        return $query->row_array();

    }






        function delete_attachment5555555($id){         
        $this->db->where('id', $id);
        $this->db->delete('emp_candidate');
        return true;
        }


         function delete_detailes_order($id){         
        $this->db->where('id', $id);
        $this->db->delete('order_detailes');
        return true;
        }


         function delete_detailes_id_insert($id){         
        $this->db->where('id', $id);
        $this->db->delete('id_insert');
        return true;
        }
        



        
        
          public function addcategories(){
            $data = array(
                 'name' => $this->input->post('name'),    
            );
            return $this->db->insert('categories', $data);
        }
        
        
        
    function get_customersid6(){   
        $id='3';
        $sql = "select * from users;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

     function get_job_vacancy(){   
      
        $sql = "select * from job_vacancy;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

     function get_baptizing(){   
      
        $sql = "select * from baptizing;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function get_baptizing1($d,$d1){   
      
        $sql = "select * from baptizing1 where n11='$d' and n3='$d1';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }





    function get_member(){   
        $id='3';
        $userid=$this ->session->userdata('user_id');
        $sql = "select * from users where group_id='$userid';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    
        
      
      
      function get_categories55($id){
        $sql = "select * from categories where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


      function get_tran55($id){
        $sql = "select * from transactions where did='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


      public function categories_update($id){
             
           $data = array(
                 'name' =>$this->input->POST('name') 
            );
            $this->db->where('id', $id);
            return $this->db->update('categories', $data);
       }


       public function order_update_status($dd){
             
           $data = array(
                 'status' =>'2'
            );
            $this->db->where('id', $dd);
            return $this->db->update('orders', $data);
       }

        public function order_update_status102($dd){
             
           $data = array(
                 'status' =>'3'
            );
            $this->db->where('id', $dd);
            return $this->db->update('orders', $data);
       }

       public function order_update_status101($dd){
             
           $data = array(
                 'status' =>'3'
            );
            $this->db->where('id', $dd);
            return $this->db->update('orders', $data);
       }





        public function note_update($id){
             
           $data = array(
                 'note' =>$this->input->POST('note') 
            );
            $this->db->where('did', $id);
            return $this->db->update('discharge', $data);
       }


       public function attachment($post_image,$id){
           $data = array(
            'title' => $this->input->post('title'),
            'path' => $post_image,
            'did'=> $id,
            
           );

           return $this->db->insert('attachment', $data);
       }


    
    
    function cuntt4(){ 
         date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');
         $d=date("Y/m/d");
         $array = array('sadad_date_day' =>$d, 'user_id=' => $userid); 
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }


    //  function cuntt_study(){ 
        
    //      $d="1";
    //      $array = array('status' =>$d); 
    //      $this->db->select_sum('payment_amount');
    //      $this->db->where($array);
    //      $result = $this->db->get('payment')->row();  
    //      return $result->payment_amount;
    // }


 function cuntt_study(){

     $results = array();
        $table = 'attachment';
       
        $this->db->select("*");
        $this->db->from($table);
        
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_study5544(){

       // $results = array();
       //  $table = 'attachment';
       //   $d="0";
        
       //   $array = array('work_flow2' =>$d); 
       //  $this->db->select("*");
       //  $this->db->from($table);
       //  $this->db->where($array);
       //  $query = $this->db->get();
       //  $num_of_records = $query->num_rows();
       //  return $num_of_records;


       
    }



     function cuntt_emp_candidate1(){
   $results = array();
        $table = 'emp_candidate';
         $d="0";
        
         $array = array('work_flow2' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

      function watch_days(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
   $results = array();
        $table = 'watch';
          
        
         $array = array('day' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

      function watch_all(){
          
   $results = array();
        $table = 'watch';
          
        
       
        $this->db->select("*");
        $this->db->from($table);
      
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }





    function cuntt_user_conect(){
   $results = array();
        $table = 'users';
         $d="1";
        
         $array = array('conect' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }



     function cuntt_emp_candidate1sultan(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='1';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('day' =>$d, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

    function cuntt_emp_candidate1sultanm(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='1';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('month' =>$m, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

     function cuntt_emp_candidate1sultanall(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='1';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

    function cuntt_emp_candidate1sultanall555(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $d='2';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('status4' => $d); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }


    function cuntt_emp_candidate1sultanall5551114(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $d='22';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('status4' => $d); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }


     function cuntt_emp_candidate1sultanall5551(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $d='1';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('status4' => $d); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

     function cuntt_emp_candidate1sultanall5553(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $d='3';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('status4' => $d); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

     function cuntt_emp_candidate1sultanall5554(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $d='4';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('status4' => $d); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }




     function cuntt_emp_candidate1noof(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='36';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('day' =>$d, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

     function cuntt_emp_candidate1noofm(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='36';
            $results = array();
            $table = 'emp_candidate';
            $array = array('month' =>$m, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

    function cuntt_emp_candidate1noofall(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='36';
            $results = array();
            $table = 'emp_candidate';
            $array = array('user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }



    function cuntt_emp_candidate1mram(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='54';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('day' =>$d, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

    function cuntt_emp_candidate1mramm(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='54';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('month' =>$m, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

    function cuntt_emp_candidate1mramall(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='54';
            $results = array();
            $table = 'emp_candidate';
     
            $array = array('user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }




     function cuntt_emp_candidate1abdulla(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='58';
            $results = array();
            $table = 'emp_candidate';
            $array = array('day' =>$d, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }

     function cuntt_emp_candidate1abdullam(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='58';
            $results = array();
            $table = 'emp_candidate';
            $array = array('month' =>$m, 'user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }


  function get_emp_candidate_admin102_user_id_wait(){
        $id=$this->session->userdata('user_id');
          $type=$this->session->userdata('type');
        $sql = "select * from emp_candidate where  state_interview ='3';";
        $query = $this->db->query($sql);
        return $query->result_array();
      }



    function cuntt_emp_candidate1abdullaall(){
          date_default_timezone_set('Asia/Riyadh');
            $d=date("Y/m/d");
            $m=date("Y/m");
            $y=date("Y");
            $user_id='58';
            $results = array();
            $table = 'emp_candidate';
            $array = array('user_id' => $user_id); 
            $this->db->select("*");
            $this->db->from($table);
            $this->db->where($array);
            $query = $this->db->get();
            $num_of_records = $query->num_rows();
            return $num_of_records; 
    }













    function cuntt_emp_candidate11010(){
   $results = array();
        $table = 'emp_candidate';
         $d="1";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

    function cuntt_emp_candidate11012(){
   $results = array();
        $table = 'emp_candidate';
         $d="2";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


    function cuntt_emp_candidate11014(){
   $results = array();
        $table = 'emp_candidate';
         $d="4";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


    function cuntt_emp_candidate11013(){
   $results = array();
        $table = 'emp_candidate';
         $d="3";
        
         $array = array('state_interview' =>1 ,'useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }




    function cuntt_emp_candidate11015(){
   $results = array();
        $table = 'emp_candidate';
         $d="0";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate110155555(){
   $results = array();
        $table = 'jobs';
        // $d="0";
        
       //  $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        //$this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


      function cuntt_emp_candidate110155555662(){
   $results = array();
        $table = 'emp_candidate';
        // $d="0";
        
       //  $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        //$this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }




     function cuntt_emp_candidate11015555510101(){
   $results = array();
        $table = 'jobs';
         $d="جدة";
        
         $array = array('n16' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate1101555551010111(){
   $results = array();
        $table = 'jobs';
         $d="ابها";
        
         $array = array('n16' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

      function cuntt_emp_candidate110155555101011133(){
   $results = array();
        $table = 'jobs';
         $d="الدمام";
        
         $array = array('n16' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


      function cuntt_emp_candidate1101555557(){
   $results = array();
        $table = 'jobs';
         $d="7";
        
         $array = array('status' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

    function cuntt_emp_candidate1101555558(){
   $results = array();
        $table = 'jobs';
         $d="8";
        
         $array = array('status' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

    function cuntt_emp_candidate11015555510(){
   $results = array();
        $table = 'jobs';
         $d="10";
        
         $array = array('status' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate110168888(){
   $results = array();
        $table = 'emp_candidate';
         $d="غزية السبيعي";
           $d1="عبير الفيفي";

            $array = array('username' =>$d); 
        
       //  $array = array('username' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate11016888899(){
   $results = array();
        $table = 'emp_candidate';
        
           $d1="عبير الفيفي";

            $array = array('username=' => $d1); 
        
       //  $array = array('username' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

      function cuntt_emp_candidate110168888991414(){
   $results = array();
        $table = 'emp_candidate';
        
           $d1="خلود العتيبي";

            $array = array('username=' => $d1); 
        
       //  $array = array('username' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate110168888991515(){
   $results = array();
        $table = 'emp_candidate';
        
           $d1="مها السبيعي";

            $array = array('username=' => $d1); 
        
       //  $array = array('username' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }




    
    function cuntt_emp_candidate11016(){
   $results = array();
        $table = 'emp_candidate';
         $d="6";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate110165(){
   $results = array();
        $table = 'emp_candidate';
         $d="5";
        
         $array = array('useridfuturetype' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate11016527(){
   $results = array();
        $table = 'emp_candidate';
         $d="27";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate11016528(){
   $results = array();
        $table = 'emp_candidate';
         $d="28";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

    function cuntt_emp_candidate11016529(){
   $results = array();
        $table = 'emp_candidate';
         $d="29";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate11016530(){
   $results = array();
        $table = 'emp_candidate';
         $d="30";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

    function cuntt_emp_candidate11016531(){
   $results = array();
        $table = 'emp_candidate';
         $d="31";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate11016532(){
   $results = array();
        $table = 'emp_candidate';
         $d="32";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate11016533(){
   $results = array();
        $table = 'emp_candidate';
         $d="33";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate11016534(){
   $results = array();
        $table = 'emp_candidate';
         $d="34";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate110165310(){
   $results = array();
        $table = 'emp_candidate';
         $d="10";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_apology($id){
        $results = array();
        $table = 'apology';
        $array = array('n1' =>$id); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

      function cuntt_direct($id){
        $results = array();
        $table = 'direct';
        $array = array('n1' =>$id); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

      function cuntt_baptizing($id){
        $results = array();
        $table = 'baptizing';
        $array = array('n1' =>$id); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }




     function cuntt_emp_candidate110165310aa(){
        $useridfuture= $this ->session->userdata('user_id');
   $results = array();
        $table = 'emp_candidate';
         $useridfuturetype= $this ->session->userdata('type');
        
         $array = array('useridfuture' =>$useridfuture,'useridfuturetype=' => $useridfuturetype); 
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate110165310aawait(){
        $useridfuture= $this ->session->userdata('user_id');
        $useridfuturetype= '8';
        $results = array();
        $table = 'emp_candidate'; 
        $array = array('useridfuture' =>$useridfuture,'useridfuturetype=' => $useridfuturetype); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }





     function cuntt_emp_candidate11016539(){
   $results = array();
        $table = 'emp_candidate';
         $d="9";
        
         $array = array('useridfuture' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

    function cuntt_emp_candidate1101653999999(){
          date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');
         $d=date("Y/m/d");

   $results = array();
        $table = 'emp_candidate';
        
        
         $array = array('Date_of_the_personal_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_emp_candidate110165399999988(){
          date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');

        $d=date('Y/m/d', strtotime(' +1 day'));
        

   $results = array();
        $table = 'emp_candidate';
        
        
         $array = array('Date_of_the_personal_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate1101653999999882(){
          date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');

        $d=date('Y/m/d', strtotime(' +2 day'));
        

   $results = array();
        $table = 'emp_candidate';
        
        
         $array = array('Date_of_the_personal_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate1101653999999883(){
          date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');

        $d=date('Y/m/d', strtotime(' +3 day'));
        

   $results = array();
        $table = 'emp_candidate';
        
        
         $array = array('Date_of_the_personal_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }

     function cuntt_emp_candidate1101653999999884(){
          date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');

        $d=date('Y/m/d', strtotime(' +4 day'));
        

   $results = array();
        $table = 'emp_candidate';
        
        
         $array = array('Date_of_the_personal_interview' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }











     function cuntt_emp_candidate110169(){
   $results = array();
        $table = 'emp_candidate';
          
       
        $this->db->select("*");
        $this->db->from($table);
       
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }












     function cuntt_emp_candidate2(){
   $results = array();
        $table = 'emp_candidate';
         $d="1";
        
         $array = array('work_flow2' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;


       
    }


     function cuntt_study_baptizing($d){
        $results = array();
        $table = 'baptizing';
        date_default_timezone_set('Asia/Riyadh');
        $userid=$this ->session->userdata('username');
         
       
         $array = array(); 
        $this->db->like('n12', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function cuntt_study_baptizing55($d){
        $results = array();
        $table = 'baptizing1';
        date_default_timezone_set('Asia/Riyadh');
        $userid=$this ->session->userdata('username');
         
       
         $array = array(); 
        $this->db->like('n12', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }




     function cuntt_study_baptizingman($d,$sex){
        $results = array();
        $table = 'baptizing';
        $array = array('n3=' => $sex); 
        $this->db->like('n12', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function cuntt_study_baptizingman1($d,$sex){
        $results = array();
        $table = 'baptizing1';
        $array = array('n3=' => $sex); 
        $this->db->like('n12', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }





     function cuntt_study_baptizing1($d){
        $results = array();
        $table = 'baptizing';
        date_default_timezone_set('Asia/Riyadh');
        $userid=$this ->session->userdata('username');
         
       
         $array = array(); 
        $this->db->like('n11', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }
     function cuntt_study_baptizingman_space($d,$sex){
        $results = array();
        $table = 'baptizing1';
        $array = array('n3=' => $sex); 
        $this->db->like('n11', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function cuntt_study_baptizing2($d){
        $results = array();
        $table = 'baptizing';
        date_default_timezone_set('Asia/Riyadh');
        $userid=$this ->session->userdata('username');
         
       
         $array = array(); 
        $this->db->like('n10', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function cuntt_study_baptizingman_project($d,$sex){
        $results = array();
        $table = 'baptizing1';
        $array = array('n3=' => $sex); 
        $this->db->like('n10', $d);
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }







     function cuntt_study1001(){
        $results = array();
        $userid=$this ->session->userdata('user_id');
        $table = 'users';
       
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function cuntt_study101(){
       $results = array();
        $table = 'message';
       
        $this->db->select("*");
        $this->db->from($table);
        
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function cuntt_study10001(){
        $results = array();
        $table = 'orders';
         $d="2";
         $userid=$this ->session->userdata('user_id');
         $array = array('status' =>$d, 'user_id=' => $userid); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



     function cuntt_study102(){
        $results = array();
        $table = 'orders';
         $d="3";
         $array = array('status' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function cuntt_study10002(){
        $results = array();
        $table = 'orders';
         $d="3";
         $userid=$this ->session->userdata('user_id');
         $array = array('status' =>$d, 'user_id=' => $userid); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



     function cuntt_study103(){
        $results = array();
        $table = 'orders';
         $d="4";
         $array = array('status' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function cuntt_study10003(){
        $results = array();
        $table = 'orders';
         $d="4";
         $userid=$this ->session->userdata('user_id');
         $array = array('status' =>$d, 'user_id=' => $userid); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



     function cuntt_study_day(){
        $results = array();
        $table = 'orders';
        date_default_timezone_set('Asia/Riyadh');
         
         $d=date("Y/m/d");
         $array = array('date_order' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


     function cuntt_study_day00(){
        $results = array();
        $table = 'orders';
        date_default_timezone_set('Asia/Riyadh');
        $userid=$this ->session->userdata('user_id');
         
         $d=date("Y/m/d");
         $array = array('date_order' =>$d, 'user_id=' => $userid); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



    function cuntt_study_month(){
        $results = array();
        $table = 'orders';
        date_default_timezone_set('Asia/Riyadh');
         
         $d=date("Y/m");
         $array = array('date_month' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function cuntt_study_month00(){
        $results = array();
        $table = 'orders';
        date_default_timezone_set('Asia/Riyadh');
         
         $d=date("Y/m");
          $userid=$this ->session->userdata('user_id');
         $array = array('date_month' =>$d, 'user_id=' => $userid); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



    function cuntt_study_years(){
        $results = array();
        $table = 'orders';
        date_default_timezone_set('Asia/Riyadh');
         
         $d=date("Y");
         $array = array('date_years' =>$d); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function cuntt_study_years00(){
        $results = array();
        $table = 'orders';
        date_default_timezone_set('Asia/Riyadh');
         
        $d=date("Y");
        $userid=$this ->session->userdata('user_id');
        $array = array('date_years' =>$d, 'user_id=' => $userid); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



     function cuntt_studys_all(){
        $results = array();
        $table = 'orders';
       
        $this->db->select("*");
        $this->db->from($table);
        
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function cuntt_studys_all00(){
        $results = array();
        $table = 'orders';
       
        $userid=$this ->session->userdata('user_id');
        $array = array('user_id=' => $userid); 
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($array);
        
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }











     function cuntt4_admin(){ 
         
         date_default_timezone_set('Asia/Riyadh');
         
         $d=date("Y/m/d");
         $array = array('sadad_date_day' =>$d); 
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }


    function cuntt4_admin_month(){ 
         
         $m=date("Y/m");
         $array = array('sadad_date_month' =>$m); 
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }


    function cuntt4_admin_month_project(){ 
         
         $m=date("Y/m");
         $array = array('sadad_date_month' =>$m); 
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }






    function cuntt4_admin_all(){ 
         
        // $d=date("Y/m/d");
        // $array = array('sadad_date_day' =>$d); 
         $this->db->select_sum('payment_amount');
        // $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }

    function cuntt4_admin_all_project(){ 
         
        // $d=date("Y/m/d");
        // $array = array('sadad_date_day' =>$d); 
         $this->db->select_sum('payment_amount');
        // $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }




     function cuntt4_sub(){ 
         
         date_default_timezone_set('Asia/Riyadh');
         $project=$this ->session->userdata('project');
         $section=$this ->session->userdata('section');
         $d=date("Y/m/d");
         $array = array('sadad_date_day' =>$d, 'project=' => $project, 'section=' => $section); 
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }




    function cuntt4_month(){ 
         date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');
         $m=date("Y/m");
         $array = array('sadad_date_month' =>$m, 'user_id=' => $userid); 
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }
 

    function cuntt4_max(){     
        $sql="SELECT user_id, SUM(payment_amount) FROM payment GROUP BY user_id";
         $this->db->select_max($sql);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;     
    }

 






   //  public function getPeriodeNummer($bedrijf_id) {
   //  $this->db->select_max('id');
   //  $this->db->where('bedrijf_id', $bedrijf_id);
   //  $result = $this->db->get('rapporten');

   //  $this->db->select('periode_nummer');
   //  $this->db->where('rapporten_id', $result);
   //  $query = $this->db->get('statistieken_onderhoud');

   //  $data = $query + 1;

   //  return $data;
   // }



     function cuntt4_month_sub(){ 
        date_default_timezone_set('Asia/Riyadh');
         $project=$this ->session->userdata('project');
         $section=$this ->session->userdata('section');
        
         $m=date("Y/m");
         $array = array('sadad_date_month' =>$m, 'project=' => $project, 'section=' => $section); 
        
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }


     function cuntt4_month_admin(){ 
        
         date_default_timezone_set('Asia/Riyadh');
         $m=date("Y/m");
         $array = array('sadad_date_month' =>$m); 
        
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }




    function cuntt4_years(){ 
         date_default_timezone_set('Asia/Riyadh');
         $userid=$this ->session->userdata('user_id');
         $Y=date("Y");
         $array = array('sadad_date_years' =>$Y, 'user_id=' => $userid); 
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }

    function cuntt4_years_sub(){ 
         date_default_timezone_set('Asia/Riyadh');
         $project=$this ->session->userdata('project');
         $section=$this ->session->userdata('section');
         
         $Y=date("Y");
         $array = array('sadad_date_years' =>$Y, 'project=' => $project, 'section=' => $section); 
         
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }


     function cuntt4_years_admin(){ 
         
         date_default_timezone_set('Asia/Riyadh');
         $Y=date("Y");
         $array = array('sadad_date_years' =>$Y); 
         
         $this->db->select_sum('payment_amount');
         $this->db->where($array);
         $result = $this->db->get('payment')->row();  
         return $result->payment_amount;
    }




    function cuntt444(){
        $results = array();
        $array = array('type' => '1');
        $table = 'archives';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function cuntt555(){
        $results = array();
        $array = array('type' => '2');
        $table = 'archives';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function cuntt666(){
        $results = array();
        $array = array('type' => '3');
        $table = 'archives';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


     function cuntt777(){
        $results = array();
        $array = array('type' => '4');
        $table = 'archives';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }






	function dealsin_numbers(){
        $results = array();
		$array = array('modest' => 'واردة');
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function dealsin_numbers22(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => 'admin2');
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function dealsin_numbers22_ar(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function get_cc_number(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('username' => $id);
        $table = 'cc';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



     function dealsin_numbers22_ar1(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => "ali");
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


     function dealsin_numbers22_ar2(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => "amlak");
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function dealsin_numbers22_ar3(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => "ahmed");
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function dealsin_numbers22_ar4(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => "faisal");
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function dealsin_numbers22_ar5(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => "abdula");
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function dealsin_numbers22_ar6(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => "mohammed");
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsin_numbers22_ar7(){
       $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture' => "saeed");
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }










     function dealsin_numbers82(){
       $id='mtka1960';
        $results = array();
    $array = array('modest' => 'واردة', 'useridfuture' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsin_numbers99(){
       $id='ali';
        $results = array();
    $array = array('modest' => 'واردة', 'useridfuture' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsin_numbers100(){
       $id='ahmed';
        $results = array();
    $array = array('modest' => 'واردة', 'useridfuture' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsin_numbers101(){
       $id='faisal';
        $results = array();
    $array = array('modest' => 'واردة', 'useridfuture' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsin_numbers102(){
       $id='abdula';
        $results = array();
    $array = array('modest' => 'واردة', 'useridfuture' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsin_numbers103(){
       $id='mohammed';
        $results = array();
    $array = array('modest' => 'واردة', 'useridfuture' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

      function dealsin_numbers104(){
       $id='saeed';
        $results = array();
    $array = array('modest' => 'واردة', 'useridfuture' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }



    function dealsin_numbers2(){
        $id=$this->session->userdata('username');
        $results = array();
        $array = array('modest' => 'واردة', 'useridfuture=' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


      function descharge_numbers2(){
       // $id=$this->session->userdata('username');
        $results = array();
       // $array = array('modest' => 'واردة', 'useridfuture=' => $id);
        $table = 'discharge';
        $this->db->select("*");
      //  $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function descharge_numbers3(){
       // $id=$this->session->userdata('username');
        $results = array();
        $array = array('mode' => 'دفترية');
        $table = 'discharge';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


     function descharge_numbers4(){
       // $id=$this->session->userdata('username');
        $results = array();
        $array = array('mode' => 'غير الدفترية');
        $table = 'discharge';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function descharge_numbers5(){
       // $id=$this->session->userdata('username');
        $results = array();
        $array = array('mode' => 'آخرى');
        $table = 'discharge';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }




	function dealsout_numbers(){
        $results = array();
		$array = array('modest' => 'صادرة', 'dtype!=' => 'سري');
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


    function dealsout_numbers22(){
        $id='105';
        $results = array();
        $array = array('modest' => 'واردة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


     function dealsout_numbers82(){
        $id='82';
        $results = array();
        $array = array('modest' => 'صادرة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsout_numbers99(){
        $id='99';
        $results = array();
        $array = array('modest' => 'صادرة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


     function dealsout_numbers100(){
        $id='100';
        $results = array();
        $array = array('modest' => 'صادرة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsout_numbers101(){
        $id='101';
        $results = array();
        $array = array('modest' => 'صادرة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsout_numbers102(){
        $id='102';
        $results = array();
        $array = array('modest' => 'صادرة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsout_numbers103(){
        $id='103';
        $results = array();
        $array = array('modest' => 'صادرة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

     function dealsout_numbers104(){
        $id='104';
        $results = array();
        $array = array('modest' => 'صادرة', 'useridsend' => $id);
        $table = 'transactions_view';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }




    function dealsout_numbers2(){
      $id=$this->session->userdata('username');
        $results = array();
    $array = array('modest' => 'صادرة', 'useridfuture=' => $id);
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


	function dealsvip_numbers(){
        $results = array();
//		$array = array('modest' => 'صادرة', 'dtype!=' => 'سري');
        $table = 'transactions';
        $this->db->select("*");
        $this->db->where('dtype','سري');
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }

    function dealsvip_numbers22(){
       $id=$this->session->userdata('username');
        $results = array();
         $array = array('dtype' => 'سري', 'useridfuture=' => $id);
//    $array = array('modest' => 'صادرة', 'dtype!=' => 'سري');
        $table = 'transactions';
        $this->db->select("*");
          
     //   $this->db->where('dtype','سري' ,'useridfuture=' => $id);
         $this->db->where($array);
        $this->db->from($table);
        $query = $this->db->get();
        $num_of_records = $query->num_rows();
        return $num_of_records;
    }


	/*function cuntt44(){
       $sql="SELECT COUNT(id) as num FROM transactions WHERE modest='واردة' AND dtype!='سري'; ";
		$query=$this->db->query($sql);
		$data=$query->row_array();
		
		return $data['num'];
    }*/
    
    public function delete_categories($id){         
       
        $this->db->where('id', $id);
        $this->db->delete('categories');
        return true;
        }
        
        
          public function addimportance(){
            $data = array(
                 'name' => $this->input->post('name'),    
            );
            return $this->db->insert('importance', $data);
        }
        
            public function addaction(){
            $data = array(
                 'name' => $this->input->post('name'), 
                 'color' => $this->input->post('color')    
            );
            return $this->db->insert('action', $data);
        }
        
        
        
         
        
        		// Check username exists
	 
        
        // Check email exists
	 
       
    function get_importance6(){   
        $id='3';
        $sql = "select * from importance;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
        function get_action6(){   
        $id='3';
        $sql = "select * from action;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
    function get_importance55($id){
        $sql = "select * from importance where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    function get_action55($id){
        $sql = "select * from action where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    
    
    function get_relatedpeople6(){   
        $id='3';
        $sql = "select * from relatedpeople;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
     public function addrelatedpeople(){
            $data = array(
                 'name' => $this->input->post('name'),
                 'mobile' => $this->input->post('mobile'), 
                 'email' => $this->input->post('email'),
                 'transaction' => $this->input->post('transaction'),
                 'office' => $this->input->post('office')
            );
            return $this->db->insert('relatedpeople', $data);
        }
        
    
    
    
      function get_relatedpeople55($id){
        $sql = "select * from relatedpeople where id='$id';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    
     public function relatedpeople_update($id){
             
           $data = array(
                 'name' =>$this->input->POST('name'),
                 'mobile' =>$this->input->POST('mobile'),
                 'email' =>$this->input->POST('email'), 
                 'transaction' =>$this->input->POST('transaction'),
                 'office' =>$this->input->POST('office')

            );
            $this->db->where('id', $id);
            return $this->db->update('relatedpeople', $data);
         }
         
            public function delete_relatedpeople($id){         
       
        $this->db->where('id', $id);
        $this->db->delete('relatedpeople');
        return true;
        }
    
      public function importance_update($id){
             
           $data = array(
                 'name' =>$this->input->POST('name') 
            );
            $this->db->where('id', $id);
            return $this->db->update('importance', $data);
         }
         
           public function action_update($id){
             
           $data = array(
                 'name' =>$this->input->POST('name') 
            );
            $this->db->where('id', $id);
            return $this->db->update('action', $data);
         }
         
    public function curlTest()
    {
      $testValue = 0;
      if(function_exists("curl_init"))
        ++$testValue;
      if(function_exists("curl_setopt"))
        ++$testValue;
      if(function_exists("curl_exec"))
        ++$testValue;
      if(function_exists("curl_close"))
        ++$testValue;
      if(function_exists("curl_errno"))
        ++$testValue;
      return $testValue;
    }
     
     public function sendMsgSMS($userAccount, $passAccount, $numbers, $sender, $msg, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
     {
  $applicationType = "68";
  $sender = urlencode($sender);
  $domainName = $_SERVER['SERVER_NAME'];
    if(!empty($userAccount) && empty($passAccount)) {
        $stringToPost = "apiKey=".$userAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
    } else {
        $stringToPost = "mobile=".$userAccount."&password=".$passAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
    }
  $stringToPostLength = strlen($stringToPost);
  $fsockParameter = "POST /api/msgSend.php HTTP/1.0\r\n";
  $fsockParameter.= "Host: www.mobily.ws \r\n";
  $fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
  $fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
  $fsockParameter.= "$stringToPost";

  $fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 10);
  fputs($fsockConn, $fsockParameter);
    
  $result = ""; 
  $clearResult = false; 
  
  while(!feof($fsockConn))
  {
    $line = fgets($fsockConn, 10240);
    if($line == "\r\n" && !$clearResult)
    $clearResult = true;
    
    if($clearResult)
      $result .= trim($line); 
  }
  return $result;
}
    }
    
    ?>