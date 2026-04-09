<?php
	class Users extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
        }
         function setview($pagename,$data){
    		$this->load->view('templateo/header');
    		$this->load->view($pagename,$data);
    		$this->load->view('templateo/footer');
        } 
         /**********************       index            *****************************/
      function index(){ 
        $this->load->view('templateo/index');      
      }


      function dashbord_analyses1111(){ 
       $this->user_model->createcsv();
    }


    function dashbord_analyses11115555(){ 
       $this->user_model->createcsv555();
    }

     function detailes_add5(){
           if(!$this ->session->userdata('logged_in')){
                redirect('users/login');
            }elseif($this->session->userdata('type')==7 or $this->session->userdata('type')==3){
           //   $uid  = $this->session->userdata('user_id');
              $data['id'] = $this->uri->segment(3,0);
              $id = $data['id'];


            $this->load->view('templateo/header1');
            $this->load->view('templateo/detailes_add5',$data); 
            $this->load->view('templateo/footer1');
      $this->form_validation->set_rules('disc', 'disc', 'required');

      if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
        $name_array = array();
        $count = count($_FILES['userfile']['size']);
        foreach($_FILES as $key=>$value)    
      for($s=0; $s <= $count-1; $s++) 
      {     
        $_FILES['userfile']['name']= $value['name'][$s];
        $_FILES['userfile']['type']    = $value['type'][$s];
        $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
        $_FILES['userfile']['error']       = $value['error'][$s];
        $_FILES['userfile']['size']    = $value['size'][$s];    
        $config['upload_path'] = './assets/imeges/posts/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = $this->upload->data();
        $name_array[] = $data['file_name'];
        
      }
           $names= implode(',', $name_array);

 $this->user_model->update_order_emkan_status_add_file5($id,$names);
      
        
          
           
        
          
                redirect('users/data_emp_part_new_jobs555');
          
          
      
           }

            }else
      redirect('users/login');  

 
      
    }




     function dashbord_analyses5555_master(){ 
       $this->user_model->createcsv555master111();
    }


      function add_status555612(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status555612', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs555566745($id);
              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }

public function main_emp() {
    
    // Check if 'username' (or any key you set at login) exists in the session.
    if (!$this->session->userdata('username')) 
    {
        // If the user is NOT logged in, redirect them to the login page.
        // ---
        // IMPORTANT: Change 'users/login' to the correct path of your login controller function.
        // ---
        redirect('users/login');

    } 
    else 
    {
        // If the user IS logged in, load the main page as normal.
        $this->load->view('templateo/main_page');
    }
}












     function add_status55561225141(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status55561225141', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs5555667452145($id);
              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }



     


     public function national_day(){
     
   

            

               
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('emp_id', 'emp_id', 'required'); 
                      if($this->form_validation->run() === FALSE){
                  
                      $this->load->view('templateo/national_day', $data);
                  
                } else {

                   $id=$this->input->post('emp_id');
                   $data['get_emp1'] = $this->user_model->get_emp1($id);
                   if ($data['get_emp1'] == "") {
                     redirect('users/national_day_false/'.$id);       
                   }else{
                     $data['get_national_day'] = $this->user_model->get_national_day1($id);
                    if ($data['get_national_day'] == "") {
                         redirect('users/national_day_add/'.$id);
                    }else{

                     redirect('users/national_day_false1/'.$id);
                    }
                   }

                            
      
           
          }
      
    }


     public function national_day1(){
     
   

            

               
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('emp_id', 'emp_id', 'required'); 
                      if($this->form_validation->run() === FALSE){
                  
                      $this->load->view('templateo/national_day1', $data);
                  
                } else {

                   $id=$this->input->post('emp_id');
                   $data['get_emp1'] = $this->user_model->get_emp1($id);
                   if ($data['get_emp1'] == "") {
                     redirect('users/national_day_false/'.$id);       
                   }else{
                     $data['get_national_day'] = $this->user_model->get_national_day1($id);
                    if ($data['get_national_day'] == "") {
                         redirect('users/national_day_add/'.$id);
                    }else{

                     redirect('users/national_day_false1/'.$id);
                    }
                   }

                            
      
           
          }
      
    }


     public function national_day2(){
     
   

            

               
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('emp_id', 'emp_id', 'required'); 
                      if($this->form_validation->run() === FALSE){
                  
                      $this->load->view('templateo/national_day2', $data);
                  
                } else {

                   $id=$this->input->post('emp_id');
                   $data['get_emp1'] = $this->user_model->get_emp1($id);
                   if ($data['get_emp1'] == "") {
                     redirect('users/national_day_false/'.$id);       
                   }else{
                     $data['get_national_day'] = $this->user_model->get_national_day1($id);
                    if ($data['get_national_day'] == "") {
                         redirect('users/national_day_add/'.$id);
                    }else{

                     redirect('users/national_day_false1/'.$id);
                    }
                   }

                            
      
           
          }
      
    }



    
    

 function main(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 

        $this->load->view('templateo/main'); 

       
      }


      }


  






       function door(){ 
        $this->load->view('templateo/door');      
      }


function data_emp_part_don66(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 15) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_don();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 20) {
                    $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_co();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_don66', $data);
      }
    }




 function view_emp_don66(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';

                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_id($id);
                      $customers= $data['customers'];

                      $customers1= $data['customers']['id_number'];
                        $data['customers12'] = $this->user_model->get_id_insert_selected555($customers1);

                     



                     
                    
                      $this->form_validation->set_rules('degree_mang', 'degree_mang', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_emp_don66', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                                $id_user = $this->input->POST('useridfuture');
                               $data['get_userdata'] = $this->user_model->get_userdata1020($id_user);
                               $username= $data['get_userdata']['name'];
                               $useridfuturetype= $data['get_userdata']['type'];
                              
                              $this->user_model->id_emp_view_emp_update_hrs16($id);

 
sleep(1);
                        
                             redirect('users/dashbord_analyses106');
                           
 
       
          }
      }
    }

 function dashbord_analyses106(){ 
            if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this->session->userdata('type') == 20) {

                        $data['cuntt_emp_candidate110165999mang']=$this->user_model->cuntt_emp_candidate110165999mang();
                           $data['cuntt_emp_candidate1101616']=$this->user_model->cuntt_emp_candidate1101616();
                            $data['cuntt_emp_candidate1101617']=$this->user_model->cuntt_emp_candidate1101617();
                                $data['cuntt_emp_candidate1101618']=$this->user_model->cuntt_emp_candidate1101618();
                                  $data['cuntt_emp_candidate1101619']=$this->user_model->cuntt_emp_candidate1101619();
                                   $data['cuntt_emp_candidate110161822']=$this->user_model->cuntt_emp_candidate110161822();
                                   $data['cuntt_emp_candidate1101618221']=$this->user_model->cuntt_emp_candidate1101618221();
                                  

 $data['cuntt_emp_candidate110165999mang1010']=$this->user_model->cuntt_emp_candidate110165999mang1010();
    $data['cuntt_emp_candidate110165310aawait5050']=$this->user_model->cuntt_emp_candidate110165310aawait5050();

  $data['cuntt_emp_candidate11014co_sultant']=$this->user_model->cuntt_emp_candidate11014co_sultant();



                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();
   $data['cuntt_emp_candidate1101653899']=$this->user_model->cuntt_emp_candidate1101653899();

 $data['cuntt_emp_candidate11016538991']=$this->user_model->cuntt_emp_candidate11016538991();
 $data['cuntt_emp_candidate110165389919']=$this->user_model->cuntt_emp_candidate110165389919();




$data['cuntt_emp_candidate110165310aawait']=$this->user_model->cuntt_emp_candidate110165310aawait();
                       $data['cuntt_emp_candidate11013']=$this->user_model->cuntt_emp_candidate11013();
                      $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();
                          $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                                   

                                  



                              
                             




                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();
                           $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();
                    
                    }elseif ($this->session->userdata('type') == 2) {
                       $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();
                       
                    }elseif ($this->session->userdata('type') == 3) {
                       $data['cuntt_study']=$this->user_model->cuntt_study(); 
                       $data['cuntt_study101']=$this->user_model->cuntt_study101();
                          $data['cuntt_study102']=$this->user_model->cuntt_study102();
                            $data['cuntt_study103']=$this->user_model->cuntt_study103();
                            $data['cuntt_study_day']=$this->user_model->cuntt_study_day();
                            $data['cuntt_study_month']=$this->user_model->cuntt_study_month();
                            $data['cuntt_study_years']=$this->user_model->cuntt_study_years();
                            $data['cuntt_studys_all']=$this->user_model->cuntt_studys_all();
                    }elseif ($this->session->userdata('type') == 6) {
                       
                    }elseif ($this->session->userdata('type') == 4) {
                     
                    }elseif ($this->session->userdata('type') == 5) {
                       
                    }elseif ($this->session->userdata('type') == 7) {
 $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();

                       $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                       
                    }
 
       
         
         
         
         
         
         
          
         $this->load->view('templateo/header'); 
         $this->load->view('templateo/dashbord_analyses106', $data);
         $this->load->view('templateo/footer');  
      }
    }





 public function update_order101001105($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001105($dd);
        
        redirect('users/data_emp_part1');
         }



 function data_emp_part_sucss(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_idsucc();


                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_sucss', $data);
      }
    }

 function data_emp_part_co_sultan(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_co_sultan();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                     $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_co();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_co_sultan', $data);
      }
    }



      function data_emp_part101co(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();




                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101_co();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part101co', $data);
      }
    }




function data_emp_part_waiting(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_idwaiting();


                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_waiting', $data);
      }
    }

    public function update_order101001_sultan($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001_sultan($dd);
        
        redirect('users/data_emp_part1');
         }



            public function update_order101001_adeeb($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001_adeeb($dd);
        
        redirect('users/data_emp_part1');
         }





function new_app(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];


               $data['get_id_insert_selected'] = $this->user_model->get_id_insert_selected($id);
                      $id2= $data['get_id_insert_selected']['id'];
                          $data['customers'] = $this->user_model->get_userdata_star_targit($id);
             $this->load->view('templateo/header');
              $this->load->view('templateo/new_app', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             
                             }  

               $this->user_model->id_emp_pointment_update101555($id);

                 

    
 
            
                redirect('users/view_emp_data/'.$id);
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }



 public function update_order101001hrs($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001($dd);
        
        redirect('users/data_emp_part3');
         }


          public function update_order101001hrs50($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status10100150($dd);
        
        redirect('users/data_emp_part3');
         }


            public function update_order101001hrs60($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status10100160($dd);
        
        redirect('users/data_emp_part3');
         }








 function data_emp_part_int_wait_mang(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_wait_mang();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_wait();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_int_wait_mang', $data);
      }
    }


function state_interview(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];


               $data['get_id_insert_selected'] = $this->user_model->get_id_insert_selected($id);
                      $id2= $data['get_id_insert_selected']['id'];
                          $data['customers'] = $this->user_model->get_userdata_star_targit($id);
             $this->load->view('templateo/header');
              $this->load->view('templateo/state_interview', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('state_interview', 'state_interview', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_state_interview_update($id);

                 

    
 
            }
                redirect('users/data_emp_part3');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }







       function aa(){ 
        $this->load->view('templateo/aa');      
      }



  function data_emp_part_int_wait(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_wait();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_wait();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_int_wait', $data);
      }
    }


  
       function qrcode(){ 
           $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];

                      $data['get_items1'] = $this->user_model->get_items1();
                     
                      $data['get_orders202'] = $this->user_model->get_orders202($id);
        $this->load->view('templateo/qrcode',$data);  
      }


      function dashbord_analyses(){ 
            if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this->session->userdata('type') == 3) {
                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();
                    
                    }elseif ($this->session->userdata('type') == 2) {
                       
                    }elseif ($this->session->userdata('type') == 3) {
                       $data['cuntt_study']=$this->user_model->cuntt_study(); 
                       $data['cuntt_study101']=$this->user_model->cuntt_study101();
                          $data['cuntt_study102']=$this->user_model->cuntt_study102();
                            $data['cuntt_study103']=$this->user_model->cuntt_study103();
                            $data['cuntt_study_day']=$this->user_model->cuntt_study_day();
                            $data['cuntt_study_month']=$this->user_model->cuntt_study_month();
                            $data['cuntt_study_years']=$this->user_model->cuntt_study_years();
                            $data['cuntt_studys_all']=$this->user_model->cuntt_studys_all();
                    }elseif ($this->session->userdata('type') == 6) {
                       
                    }elseif ($this->session->userdata('type') == 4) {
                     
                    }elseif ($this->session->userdata('type') == 5) {
                       
                    }elseif ($this->session->userdata('type') == 7) {

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                       
                    }
 
       
         
         
         
         
         
         
          
         $this->load->view('templateo/header'); 
         $this->load->view('templateo/dashbord_analyses', $data);
         $this->load->view('templateo/footer');  
      }
    }


     function dashbord_analyses103(){ 
            if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this->session->userdata('type') == 3) {

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();
                    
                    }elseif ($this->session->userdata('type') == 2) {
                          $data['cuntt_emp_candidate110165310aa']=$this->user_model->cuntt_emp_candidate110165310aa();

   $data['cuntt_emp_candidate110165310aawait_adeeb']=$this->user_model->cuntt_emp_candidate110165310aawait_adeeb();



                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();


                          $data['cuntt_emp_candidate110165310aawait']=$this->user_model->cuntt_emp_candidate110165310aawait();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();
                       
                    }elseif ($this->session->userdata('type') == 3) {
                    

                       $data['cuntt_study']=$this->user_model->cuntt_study(); 
                       $data['cuntt_study101']=$this->user_model->cuntt_study101();
                          $data['cuntt_study102']=$this->user_model->cuntt_study102();
                            $data['cuntt_study103']=$this->user_model->cuntt_study103();
                            $data['cuntt_study_day']=$this->user_model->cuntt_study_day();
                            $data['cuntt_study_month']=$this->user_model->cuntt_study_month();
                            $data['cuntt_study_years']=$this->user_model->cuntt_study_years();
                            $data['cuntt_studys_all']=$this->user_model->cuntt_studys_all();
                    }elseif ($this->session->userdata('type') == 6) {
                       
                    }elseif ($this->session->userdata('type') == 4) {

                            $data['get_job_vacancy'] = $this->user_model->get_job_vacancy();


                          $data['cuntt_emp_candidate110165310aa']=$this->user_model->cuntt_emp_candidate110165310aa();

                           $data['cuntt_emp_candidate110165310aawait']=$this->user_model->cuntt_emp_candidate110165310aawait();

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                     
                    }elseif ($this->session->userdata('type') == 5) {
                       
                    }elseif ($this->session->userdata('type') == 7) {

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                       
                    }elseif ($this->session->userdata('type') == 1) {

                      
                      
                        $data['cuntt_emp_candidate110165310aa']=$this->user_model->cuntt_emp_candidate110165310aa();

                        $data['cuntt_emp_candidate110165310aawait']=$this->user_model->cuntt_emp_candidate110165310aawait();


                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                       
                    }
 
       
         
         
         
         
         
         
          
         $this->load->view('templateo/header'); 
         $this->load->view('templateo/dashbord_analyses103', $data);
         $this->load->view('templateo/footer');  
      }
    }


    function print_report(){ 
             $data['id'] = $this->uri->segment(3,0);
             $id = $data['id']; 

              $data['get_job_vacancy'] = $this->user_model->get_job_vacancy();

        
          
           
           $this->load->view('templateo/print_report', $data);  
      }

       function print_report1(){ 
             $data['id'] = $this->uri->segment(3,0);
             $id = $data['id']; 

              $data['get_job_vacancy'] = $this->user_model->get_job_vacancy();

        
          
           
           $this->load->view('templateo/print_report1', $data);  
      }






  function data_emp_part101_hrm(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();




                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part101_hrm', $data);
      }
    }





     function dashbord_analyses101(){ 
            if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this->session->userdata('type') == 3) {
                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();
                    
                    }elseif ($this->session->userdata('type') == 2) {
                       
                    }elseif ($this->session->userdata('type') == 3) {
                       $data['cuntt_study']=$this->user_model->cuntt_study(); 
                       $data['cuntt_study101']=$this->user_model->cuntt_study101();
                          $data['cuntt_study102']=$this->user_model->cuntt_study102();
                            $data['cuntt_study103']=$this->user_model->cuntt_study103();
                            $data['cuntt_study_day']=$this->user_model->cuntt_study_day();
                            $data['cuntt_study_month']=$this->user_model->cuntt_study_month();
                            $data['cuntt_study_years']=$this->user_model->cuntt_study_years();
                            $data['cuntt_studys_all']=$this->user_model->cuntt_studys_all();
                    }elseif ($this->session->userdata('type') == 6) {
                       
                    }elseif ($this->session->userdata('type') == 4) {
                     
                    }elseif ($this->session->userdata('type') == 5) {
                       
                    }elseif ($this->session->userdata('type') == 7) {

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                       
                    }
 
       
         
         
         
         
         
         
          
         $this->load->view('templateo/header'); 
         $this->load->view('templateo/dashbord_analyses101', $data);
         $this->load->view('templateo/footer');  
      }
    }



    public function update_order101001wait_hrm($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001wait($dd);
        
        redirect('users/dashbord_analyses102');
         }





     function dashbord_analyses102(){ 
            if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this->session->userdata('type') == 3) {

 $data['cuntt_emp_candidate110155555662']=$this->user_model->cuntt_emp_candidate110155555662();

 $data['cuntt_emp_candidate1101653999999']=$this->user_model->cuntt_emp_candidate1101653999999();

 $data['cuntt_emp_candidate110168888991414']=$this->user_model->cuntt_emp_candidate110168888991414();
 $data['cuntt_emp_candidate110168888991515']=$this->user_model->cuntt_emp_candidate110168888991515();

  $data['cuntt_emp_candidate1sultanall555']=$this->user_model->cuntt_emp_candidate1sultanall555();
  $data['cuntt_emp_candidate1sultanall5551']=$this->user_model->cuntt_emp_candidate1sultanall5551();
  $data['cuntt_emp_candidate1sultanall5554']=$this->user_model->cuntt_emp_candidate1sultanall5554();
$data['cuntt_emp_candidate1sultanall5553']=$this->user_model->cuntt_emp_candidate1sultanall5553();

 

  $data['cuntt_emp_candidate110165399999988']=$this->user_model->cuntt_emp_candidate110165399999988();

   $data['cuntt_emp_candidate1101653999999882']=$this->user_model->cuntt_emp_candidate1101653999999882();
   $data['cuntt_emp_candidate1101653999999883']=$this->user_model->cuntt_emp_candidate1101653999999883();
   $data['cuntt_emp_candidate1101653999999884']=$this->user_model->cuntt_emp_candidate1101653999999884();

 $data['cuntt_emp_candidate110168888']=$this->user_model->cuntt_emp_candidate110168888();
 $data['cuntt_emp_candidate11016888899']=$this->user_model->cuntt_emp_candidate11016888899();
                        

                        $data['cuntt_emp_candidate1101555557']=$this->user_model->cuntt_emp_candidate1101555557();

                           $data['cuntt_emp_candidate1101555558']=$this->user_model->cuntt_emp_candidate1101555558();
                              $data['cuntt_emp_candidate11015555510']=$this->user_model->cuntt_emp_candidate11015555510();


 $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                        $data['cuntt_emp_candidate110155555']=$this->user_model->cuntt_emp_candidate110155555();

                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();



                        $data['cuntt_emp_candidate110165999mang']=$this->user_model->cuntt_emp_candidate110165999mang();

                        $data['cuntt_emp_candidate110155555']=$this->user_model->cuntt_emp_candidate110155555();



 $data['cuntt_emp_candidate110165999mang1010']=$this->user_model->cuntt_emp_candidate110165999mang1010();
    $data['cuntt_emp_candidate110165310aawait5050']=$this->user_model->cuntt_emp_candidate110165310aawait5050();

  $data['cuntt_emp_candidate11014co_sultant']=$this->user_model->cuntt_emp_candidate11014co_sultant();



                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();
   $data['cuntt_emp_candidate1101653899']=$this->user_model->cuntt_emp_candidate1101653899();

 $data['cuntt_emp_candidate11016538991']=$this->user_model->cuntt_emp_candidate11016538991();
 $data['cuntt_emp_candidate110165389919']=$this->user_model->cuntt_emp_candidate110165389919();




$data['cuntt_emp_candidate110165310aawait']=$this->user_model->cuntt_emp_candidate110165310aawait();
                       $data['cuntt_emp_candidate11013']=$this->user_model->cuntt_emp_candidate11013();
                      $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();
                          $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                                   

                                  



                              
                             




                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();
                           $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();
                    
                    }elseif ($this->session->userdata('type') == 2) {
                        $data['cuntt_emp_candidate110155555662']=$this->user_model->cuntt_emp_candidate110155555662();
                       $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();
                       
                    }elseif ($this->session->userdata('type') == 3) {
                       $data['cuntt_study']=$this->user_model->cuntt_study(); 
                       $data['cuntt_study101']=$this->user_model->cuntt_study101();
                          $data['cuntt_study102']=$this->user_model->cuntt_study102();
                            $data['cuntt_study103']=$this->user_model->cuntt_study103();
                            $data['cuntt_study_day']=$this->user_model->cuntt_study_day();
                            $data['cuntt_study_month']=$this->user_model->cuntt_study_month();
                            $data['cuntt_study_years']=$this->user_model->cuntt_study_years();
                            $data['cuntt_studys_all']=$this->user_model->cuntt_studys_all();
                    }elseif ($this->session->userdata('type') == 6) {
                       
                    }elseif ($this->session->userdata('type') == 4) {
                     
                    }elseif ($this->session->userdata('type') == 5) {
                       
                    }elseif ($this->session->userdata('type') == 7) {

$data['cuntt_emp_candidate110155555662']=$this->user_model->cuntt_emp_candidate110155555662();
                        
                        $data['cuntt_emp_candidate11015555510101']=$this->user_model->cuntt_emp_candidate11015555510101();
                        $data['cuntt_emp_candidate1101555551010111']=$this->user_model->cuntt_emp_candidate1101555551010111();
                         $data['cuntt_emp_candidate110155555101011133']=$this->user_model->cuntt_emp_candidate110155555101011133();



 $data['cuntt_emp_candidate1101653999999']=$this->user_model->cuntt_emp_candidate1101653999999();

  $data['cuntt_emp_candidate1sultanall555']=$this->user_model->cuntt_emp_candidate1sultanall555();
  $data['cuntt_emp_candidate1sultanall5551']=$this->user_model->cuntt_emp_candidate1sultanall5551();
  $data['cuntt_emp_candidate1sultanall5554']=$this->user_model->cuntt_emp_candidate1sultanall5554();
$data['cuntt_emp_candidate1sultanall5553']=$this->user_model->cuntt_emp_candidate1sultanall5553();

 

  $data['cuntt_emp_candidate110165399999988']=$this->user_model->cuntt_emp_candidate110165399999988();

   $data['cuntt_emp_candidate1101653999999882']=$this->user_model->cuntt_emp_candidate1101653999999882();
   $data['cuntt_emp_candidate1101653999999883']=$this->user_model->cuntt_emp_candidate1101653999999883();
   $data['cuntt_emp_candidate1101653999999884']=$this->user_model->cuntt_emp_candidate1101653999999884();

 $data['cuntt_emp_candidate110168888']=$this->user_model->cuntt_emp_candidate110168888();
 $data['cuntt_emp_candidate11016888899']=$this->user_model->cuntt_emp_candidate11016888899();
                        

                        $data['cuntt_emp_candidate1101555557']=$this->user_model->cuntt_emp_candidate1101555557();

                           $data['cuntt_emp_candidate1101555558']=$this->user_model->cuntt_emp_candidate1101555558();
                              $data['cuntt_emp_candidate11015555510']=$this->user_model->cuntt_emp_candidate11015555510();


 $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                        $data['cuntt_emp_candidate110155555']=$this->user_model->cuntt_emp_candidate110155555();

                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();

                       $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                       
                    }
 
       
         
         
         
         
         
         
          
       //  $this->load->view('template/new_header'); 
         $this->load->view('templateo/dashbord_analyses102', $data);
      //   $this->load->view('template/new_footer');  
      }
    }

/**
 * Loads the standalone "Candidates" dashboard page.
 * This function only loads data required for the 'Home-new2' tab.
 */
public function candidates_dashboard() {
    
    // 1. Check if user is logged in
    if (!$this->session->userdata('logged_in')) {
        redirect('users/login');
    }

    // 2. Prepare data array
    $data = array();

    // 3. Load ONLY the 12 data variables needed for the 'Home-new2' view
    // (I found these by checking your view file)
    $data['cuntt_emp_candidate110155555']      = $this->user_model->cuntt_emp_candidate110155555();
    $data['cuntt_emp_candidate110155555662']   = $this->user_model->cuntt_emp_candidate110155555662();
    $data['cuntt_emp_candidate1101555551010111']  = $this->user_model->cuntt_emp_candidate1101555551010111();
    $data['cuntt_emp_candidate110155555101011133'] = $this->user_model->cuntt_emp_candidate110155555101011133();
    $data['cuntt_emp_candidate11015555510101']    = $this->user_model->cuntt_emp_candidate11015555510101();
    $data['cuntt_emp_candidate1101555557']        = $this->user_model->cuntt_emp_candidate1101555557();
    $data['cuntt_emp_candidate11015555510']       = $this->user_model->cuntt_emp_candidate11015555510();
    $data['cuntt_emp_candidate1101555558']        = $this->user_model->cuntt_emp_candidate1101555558();
    $data['cuntt_emp_candidate110168888']         = $this->user_model->cuntt_emp_candidate110168888();
    $data['cuntt_emp_candidate11016888899']       = $this->user_model->cuntt_emp_candidate11016888899();
    $data['cuntt_emp_candidate110168888991515']   = $this->user_model->cuntt_emp_candidate110168888991515();
    $data['cuntt_emp_candidate110168888991414']   = $this->user_model->cuntt_emp_candidate110168888991414();

    // 4. Load session data for the header/nav
    // (Your original function missed this, but the nav bar needs it)
    $data['name'] = $this->session->userdata('name');
    $data['username'] = $this->session->userdata('username');

    // 5. Load the views
    // ---
    // IMPORTANT: Make sure you have saved the new view file from
    // the previous step as 'templateo/dashboard_candidates'.
    // ---
    $this->load->view('templateo/header');
    $this->load->view('templateo/dashboard_candidate', $data); // <-- This is your NEW view file
    $this->load->view('templateo/footer');
}

       function dashbord_analyses102_2(){ 
            if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this->session->userdata('type') == 3) {


 $data['cuntt_emp_candidate1101653999999']=$this->user_model->cuntt_emp_candidate1101653999999();

 $data['cuntt_emp_candidate110168888991414']=$this->user_model->cuntt_emp_candidate110168888991414();
 $data['cuntt_emp_candidate110168888991515']=$this->user_model->cuntt_emp_candidate110168888991515();

  $data['cuntt_emp_candidate1sultanall555']=$this->user_model->cuntt_emp_candidate1sultanall555();
  $data['cuntt_emp_candidate1sultanall5551']=$this->user_model->cuntt_emp_candidate1sultanall5551();
  $data['cuntt_emp_candidate1sultanall5554']=$this->user_model->cuntt_emp_candidate1sultanall5554();
$data['cuntt_emp_candidate1sultanall5553']=$this->user_model->cuntt_emp_candidate1sultanall5553();

 

  $data['cuntt_emp_candidate110165399999988']=$this->user_model->cuntt_emp_candidate110165399999988();

   $data['cuntt_emp_candidate1101653999999882']=$this->user_model->cuntt_emp_candidate1101653999999882();
   $data['cuntt_emp_candidate1101653999999883']=$this->user_model->cuntt_emp_candidate1101653999999883();
   $data['cuntt_emp_candidate1101653999999884']=$this->user_model->cuntt_emp_candidate1101653999999884();

 $data['cuntt_emp_candidate110168888']=$this->user_model->cuntt_emp_candidate110168888();
 $data['cuntt_emp_candidate11016888899']=$this->user_model->cuntt_emp_candidate11016888899();
                        

                        $data['cuntt_emp_candidate1101555557']=$this->user_model->cuntt_emp_candidate1101555557();

                           $data['cuntt_emp_candidate1101555558']=$this->user_model->cuntt_emp_candidate1101555558();
                              $data['cuntt_emp_candidate11015555510']=$this->user_model->cuntt_emp_candidate11015555510();


 $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                        $data['cuntt_emp_candidate110155555']=$this->user_model->cuntt_emp_candidate110155555();

                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();



                        $data['cuntt_emp_candidate110165999mang']=$this->user_model->cuntt_emp_candidate110165999mang();

                        $data['cuntt_emp_candidate110155555']=$this->user_model->cuntt_emp_candidate110155555();



 $data['cuntt_emp_candidate110165999mang1010']=$this->user_model->cuntt_emp_candidate110165999mang1010();
    $data['cuntt_emp_candidate110165310aawait5050']=$this->user_model->cuntt_emp_candidate110165310aawait5050();

  $data['cuntt_emp_candidate11014co_sultant']=$this->user_model->cuntt_emp_candidate11014co_sultant();



                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();
   $data['cuntt_emp_candidate1101653899']=$this->user_model->cuntt_emp_candidate1101653899();

 $data['cuntt_emp_candidate11016538991']=$this->user_model->cuntt_emp_candidate11016538991();
 $data['cuntt_emp_candidate110165389919']=$this->user_model->cuntt_emp_candidate110165389919();




$data['cuntt_emp_candidate110165310aawait']=$this->user_model->cuntt_emp_candidate110165310aawait();
                       $data['cuntt_emp_candidate11013']=$this->user_model->cuntt_emp_candidate11013();
                      $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();
                          $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                                   

                                  



                              
                             




                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();
                           $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();
                    
                    }elseif ($this->session->userdata('type') == 2) {
                       $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();
                       
                    }elseif ($this->session->userdata('type') == 3) {
                       $data['cuntt_study']=$this->user_model->cuntt_study(); 
                       $data['cuntt_study101']=$this->user_model->cuntt_study101();
                          $data['cuntt_study102']=$this->user_model->cuntt_study102();
                            $data['cuntt_study103']=$this->user_model->cuntt_study103();
                            $data['cuntt_study_day']=$this->user_model->cuntt_study_day();
                            $data['cuntt_study_month']=$this->user_model->cuntt_study_month();
                            $data['cuntt_study_years']=$this->user_model->cuntt_study_years();
                            $data['cuntt_studys_all']=$this->user_model->cuntt_studys_all();
                    }elseif ($this->session->userdata('type') == 6) {
                       
                    }elseif ($this->session->userdata('type') == 4) {
                     
                    }elseif ($this->session->userdata('type') == 5) {
                       
                    }elseif ($this->session->userdata('type') == 7) {


                        
                        $data['cuntt_emp_candidate11015555510101']=$this->user_model->cuntt_emp_candidate11015555510101();
                        $data['cuntt_emp_candidate1101555551010111']=$this->user_model->cuntt_emp_candidate1101555551010111();
                         $data['cuntt_emp_candidate110155555101011133']=$this->user_model->cuntt_emp_candidate110155555101011133();



 $data['cuntt_emp_candidate1101653999999']=$this->user_model->cuntt_emp_candidate1101653999999();

  $data['cuntt_emp_candidate1sultanall555']=$this->user_model->cuntt_emp_candidate1sultanall555();
  $data['cuntt_emp_candidate1sultanall5551']=$this->user_model->cuntt_emp_candidate1sultanall5551();
  $data['cuntt_emp_candidate1sultanall5554']=$this->user_model->cuntt_emp_candidate1sultanall5554();
$data['cuntt_emp_candidate1sultanall5553']=$this->user_model->cuntt_emp_candidate1sultanall5553();

 

  $data['cuntt_emp_candidate110165399999988']=$this->user_model->cuntt_emp_candidate110165399999988();

   $data['cuntt_emp_candidate1101653999999882']=$this->user_model->cuntt_emp_candidate1101653999999882();
   $data['cuntt_emp_candidate1101653999999883']=$this->user_model->cuntt_emp_candidate1101653999999883();
   $data['cuntt_emp_candidate1101653999999884']=$this->user_model->cuntt_emp_candidate1101653999999884();

 $data['cuntt_emp_candidate110168888']=$this->user_model->cuntt_emp_candidate110168888();
 $data['cuntt_emp_candidate11016888899']=$this->user_model->cuntt_emp_candidate11016888899();
                        

                        $data['cuntt_emp_candidate1101555557']=$this->user_model->cuntt_emp_candidate1101555557();

                           $data['cuntt_emp_candidate1101555558']=$this->user_model->cuntt_emp_candidate1101555558();
                              $data['cuntt_emp_candidate11015555510']=$this->user_model->cuntt_emp_candidate11015555510();


 $data['cuntt_emp_candidate110165999']=$this->user_model->cuntt_emp_candidate110165999();

                        $data['cuntt_emp_candidate110155555']=$this->user_model->cuntt_emp_candidate110155555();

                            $data['cuntt_emp_candidate11016538']=$this->user_model->cuntt_emp_candidate11016538();

                       $data['cuntt_emp_candidate1sultan']=$this->user_model->cuntt_emp_candidate1sultan();
                      $data['cuntt_emp_candidate1noof']=$this->user_model->cuntt_emp_candidate1noof();
                      $data['cuntt_emp_candidate1mram']=$this->user_model->cuntt_emp_candidate1mram();
                      $data['cuntt_emp_candidate1abdulla']=$this->user_model->cuntt_emp_candidate1abdulla();
                      $data['cuntt_emp_candidate1abdullam']=$this->user_model->cuntt_emp_candidate1abdullam();
                      $data['cuntt_emp_candidate1mramm']=$this->user_model->cuntt_emp_candidate1mramm();
                      $data['cuntt_emp_candidate1noofm']=$this->user_model->cuntt_emp_candidate1noofm();
                       $data['cuntt_emp_candidate1sultanm']=$this->user_model->cuntt_emp_candidate1sultanm();
                       $data['cuntt_emp_candidate1sultanall']=$this->user_model->cuntt_emp_candidate1sultanall();      
                       $data['cuntt_emp_candidate1noofall']=$this->user_model->cuntt_emp_candidate1noofall();
                       $data['cuntt_emp_candidate1mramall']=$this->user_model->cuntt_emp_candidate1mramall();
                       $data['cuntt_emp_candidate1abdullaall']=$this->user_model->cuntt_emp_candidate1abdullaall();
                       $data['cuntt_user_conect']=$this->user_model->cuntt_user_conect();
                        $data['watch_days']=$this->user_model->watch_days();
                              $data['watch_all']=$this->user_model->watch_all();
                        $data['cuntt_emp_candidate11010']=$this->user_model->cuntt_emp_candidate11010();
                        $data['cuntt_emp_candidate11012']=$this->user_model->cuntt_emp_candidate11012();
                        $data['cuntt_emp_candidate11014']=$this->user_model->cuntt_emp_candidate11014();
                        $data['cuntt_emp_candidate11015']=$this->user_model->cuntt_emp_candidate11015();
                        $data['cuntt_emp_candidate11016']=$this->user_model->cuntt_emp_candidate11016();
                        $data['cuntt_emp_candidate110165']=$this->user_model->cuntt_emp_candidate110165();
                        $data['cuntt_emp_candidate110169']=$this->user_model->cuntt_emp_candidate110169();
                        $data['cuntt_emp_candidate11016527']=$this->user_model->cuntt_emp_candidate11016527();
                        $data['cuntt_emp_candidate11016528']=$this->user_model->cuntt_emp_candidate11016528();
                        $data['cuntt_emp_candidate11016529']=$this->user_model->cuntt_emp_candidate11016529();
                        $data['cuntt_emp_candidate11016530']=$this->user_model->cuntt_emp_candidate11016530();
                        $data['cuntt_emp_candidate11016531']=$this->user_model->cuntt_emp_candidate11016531();
                        $data['cuntt_emp_candidate11016532']=$this->user_model->cuntt_emp_candidate11016532();
                        $data['cuntt_emp_candidate11016533']=$this->user_model->cuntt_emp_candidate11016533();
                        $data['cuntt_emp_candidate11016534']=$this->user_model->cuntt_emp_candidate11016534();
                        $data['cuntt_emp_candidate110165310']=$this->user_model->cuntt_emp_candidate110165310();
                        $data['cuntt_emp_candidate11016539']=$this->user_model->cuntt_emp_candidate11016539();

                        $data['cuntt_study']=$this->user_model->cuntt_study();

                        $data['cuntt_emp_candidate1']=$this->user_model->cuntt_emp_candidate1();

                         $data['cuntt_emp_candidate2']=$this->user_model->cuntt_emp_candidate2();

                        
                         $data['cuntt_study101']=$this->user_model->cuntt_study101();

                       
                    }
 
       
         
         
         
         
         
         
          
         $this->load->view('templateo/header'); 
         $this->load->view('templateo/dashbord_analyses102_2', $data);
         $this->load->view('templateo/footer');  
      }
    }





      function chart_flot(){ 
        $this->load->view('templateo/chart_flot');      
      }

       function show(){ 
        $this->load->view('templateo/show');      
      }



      function real_time(){ 
        $this->load->view('templateo/header');
        $this->load->view('templateo/real_time');    
        $this->load->view('templateo/footer');  
      }



       function data_picker(){ 
        $this->load->view('templateo/data_picker');      
      }


      

        function forgit_password(){ 
        $this->load->view('templateo/forgit_password');      
      }



        function insert_sadad(){ 
                    if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('payment_amount', 'payment_amount', 'required'); 
                      if($this->form_validation->run() === FALSE){
                         $this->load->view('templateo/header');    
                         $this->load->view('templateo/insert_sadad');    
                         $this->load->view('templateo/footer');   
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  

                              $this->user_model->payment($post_image);
      
            redirect('users/chart_gugus');
          }
      }

            
      }

        function dashbord(){ 
           if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/dashbord');    
        $this->load->view('templateo/footer');      
      }}

      function chart_gugus(){ 

         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 

                    $id=$this->session->userdata('type');
                    if ($id == 1) {
                          $data['customers'] = $this->user_model->get_userdata();
                          $data['customer_numbers']=$this->user_model->cuntt4();
                          $data['cuntt4_month']=$this->user_model->cuntt4_month();
                          $data['cuntt4_years']=$this->user_model->cuntt4_years();
                          
                          
                       
                    }elseif ($id == 3) {

                          $data['customers'] = $this->user_model->get_userdata();
                          $data['customer_numbers']=$this->user_model->cuntt4_admin();

                          $data['cuntt4_month']=$this->user_model->cuntt4_month_admin();
                          $data['cuntt4_years']=$this->user_model->cuntt4_years_admin();



                    }elseif ($id == 2) {
                           $data['customers'] = $this->user_model->get_userdata();
                           $data['customer_numbers']=$this->user_model->cuntt4_sub();
                            $data['cuntt4_month']=$this->user_model->cuntt4_month_sub();
                          $data['cuntt4_years']=$this->user_model->cuntt4_years_sub();

                    }
                    
                  $this->load->view('templateo/header');    
                  $this->load->view('templateo/chart_gugus', $data);
                  $this->load->view('templateo/footer');      
      }
    }


       function users_index(){ 

        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 

          $data['customers'] = $this->user_model->get_userdata_star();
          $this->load->view('templateo/header');    
          $this->load->view('templateo/users_index', $data);
       // $this->load->view('templateo/footer');      
      }}


       function items_index(){ 

        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 

          $data['customers'] = $this->user_model->get_itemdata_star();
          $this->load->view('templateo/header');    
          $this->load->view('templateo/items_index', $data);
       // $this->load->view('templateo/footer');      
      }}






      function sadad_report(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     $id=$this->session->userdata('type');
                    if ($id == 1) {
                        $data['customer_numbers']=$this->user_model->cuntt4();
                        $data['customers'] = $this->user_model->get_sadad_star_update();

                    }elseif ($id == 2) {
                        $data['customer_numbers']=$this->user_model->cuntt4_sub();
                        $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                      
                    }elseif ($id == 3) {
                      
                      $data['get_max_moshrif']=$this->user_model->get_max_moshrif();
                        $data['customer_numbers']=$this->user_model->cuntt4_admin();
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin();
                      
                    }

        
          $this->load->view('templateo/header');    
          $this->load->view('templateo/sadad_report', $data);
          
      }}



       function sadad_report_moshrif(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     $id=$this->session->userdata('type');
                    if ($id == 1) {
                        $data['customer_numbers']=$this->user_model->cuntt4();
                        $data['customers'] = $this->user_model->get_sadad_star_update();

                    }elseif ($id == 2) {
                        $data['customer_numbers']=$this->user_model->cuntt4_sub();
                        $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                      
                    }elseif ($id == 3) {
                        $data['customer_numbers']=$this->user_model->cuntt4_admin_all();
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin_moshrif();
                      
                    }

        
          $this->load->view('templateo/header');    
          $this->load->view('templateo/sadad_report_moshrif', $data);
          
      }}


      function sadad_report_moshrif_project(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     $id=$this->session->userdata('type');
                    if ($id == 1) {
                        $data['customer_numbers']=$this->user_model->cuntt4();
                        $data['customers'] = $this->user_model->get_sadad_star_update();

                    }elseif ($id == 2) {
                        $data['customer_numbers']=$this->user_model->cuntt4_sub();
                        $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                      
                    }elseif ($id == 3) {
                        $data['customer_numbers']=$this->user_model->cuntt4_admin_all_project();
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin_moshrif_project();
                      
                    }

        
          $this->load->view('templateo/header');    
          $this->load->view('templateo/sadad_report_moshrif_project', $data);
          
      }}



      function sadad_report_moshrif_day(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     $id=$this->session->userdata('type');
                    if ($id == 1) {
                        $data['customer_numbers']=$this->user_model->cuntt4();
                        $data['customers'] = $this->user_model->get_sadad_star_update();

                    }elseif ($id == 2) {
                        $data['customer_numbers']=$this->user_model->cuntt4_sub();
                        $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                      
                    }elseif ($id == 3) {
                        $data['customer_numbers']=$this->user_model->cuntt4_admin();
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin_moshrif_day();
                      
                    }

        
          $this->load->view('templateo/header');    
          $this->load->view('templateo/sadad_report_moshrif_day', $data);
          
      }}


       function sadad_report_project_day(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     $id=$this->session->userdata('type');
                    if ($id == 1) {
                        $data['customer_numbers']=$this->user_model->cuntt4();
                        $data['customers'] = $this->user_model->get_sadad_star_update();

                    }elseif ($id == 2) {
                        $data['customer_numbers']=$this->user_model->cuntt4_sub();
                        $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                      
                    }elseif ($id == 3) {
                        $data['customer_numbers']=$this->user_model->cuntt4_admin();
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin_project_day();
                      
                    }

        
          $this->load->view('templateo/header');    
          $this->load->view('templateo/sadad_report_project_day', $data);
          
      }}



      function sadad_report_moshrif_month(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     $id=$this->session->userdata('type');
                    if ($id == 1) {
                        $data['customer_numbers']=$this->user_model->cuntt4();
                        $data['customers'] = $this->user_model->get_sadad_star_update();

                    }elseif ($id == 2) {
                        $data['customer_numbers']=$this->user_model->cuntt4_sub();
                        $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                      
                    }elseif ($id == 3) {
                        $data['customer_numbers']=$this->user_model->cuntt4_admin_month();
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin_moshrif_month();
                      
                    }

        
          $this->load->view('templateo/header');    
          $this->load->view('templateo/sadad_report_moshrif_month', $data);
          
      }}


       function sadad_report_project_month(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     $id=$this->session->userdata('type');
                    if ($id == 1) {
                        $data['customer_numbers']=$this->user_model->cuntt4();
                        $data['customers'] = $this->user_model->get_sadad_star_update();

                    }elseif ($id == 2) {
                        $data['customer_numbers']=$this->user_model->cuntt4_sub();
                        $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                      
                    }elseif ($id == 3) {
                        $data['customer_numbers']=$this->user_model->cuntt4_admin_month_project();
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin_project_month();
                      
                    }

        
          $this->load->view('templateo/header');    
          $this->load->view('templateo/sadad_report_project_month', $data);
          
      }}
      





       public function sadad_report_dynamic(){
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
          
          $id=$this->session->userdata('type');

        if ($id == 1) {
                         $data['customers'] = $this->user_model->get_sadad_star_update();
             $s='55';
             $s1='55';
             $data['customers'] = $this->user_model->get_report_sadad_date($s,$s1); 
             $this->form_validation->set_rules('search','search','required');
                    if($this->form_validation->run() === FALSE){                       
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/sadad_report_dynamic', $data);
                     
                      
                    } else {
                      $s = $this->input->post('search'); 
                      $s1 = $this->input->post('search1');    
                      $data['customers'] = $this->user_model->get_report_sadad_date($s,$s1);
                      $this->load->view('templateo/header',$data);
                      $this->load->view('templateo/sadad_report_dynamic', $data);
                      
                    }

                    }elseif ($id == 2) {
                         $data['customers'] = $this->user_model->get_sadad_star_update_sub();
                         $s='55';
                         $s1='55';
                         $data['customers'] = $this->user_model->get_report_sadad_date_sub($s,$s1); 
                         $this->form_validation->set_rules('search','search','required');
                        if($this->form_validation->run() === FALSE){                       
                          $this->load->view('templateo/header');
                          $this->load->view('templateo/sadad_report_dynamic', $data);
                     
                      
                    } else {
                          $s = $this->input->post('search'); 
                          $s1 = $this->input->post('search1');    
                          $data['customers'] = $this->user_model->get_report_sadad_date_sub($s,$s1);
                          $this->load->view('templateo/header',$data);
                          $this->load->view('templateo/sadad_report_dynamic', $data);
                      
                    }
                      
                    }elseif ($id == 3) {
                        $data['customers'] = $this->user_model->get_sadad_star_update_admin();
                         $s='55';
                         $s1='55';
                         $data['customers'] = $this->user_model->get_report_sadad_date_admin($s,$s1); 
                         $this->form_validation->set_rules('search','search','required');
                        if($this->form_validation->run() === FALSE){                       
                          $this->load->view('templateo/header');
                          $this->load->view('templateo/sadad_report_dynamic', $data);
                     
                      
                    } else {
                          $s = $this->input->post('search'); 
                          $s1 = $this->input->post('search1');    
                          $data['customers'] = $this->user_model->get_report_sadad_date_admin($s,$s1);
                          $this->load->view('templateo/header',$data);
                          $this->load->view('templateo/sadad_report_dynamic', $data);
                      
                    }
                      
                    }
 
              
           
        }}

 





      function user_report(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 


          $data['customers'] = $this->user_model->get_userdata_star();
          $this->load->view('templateo/header');    
          $this->load->view('templateo/user_report', $data);
       // $this->load->view('templateo/footer');      
      }}

       function id_number(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 


          $data['customers'] = $this->user_model->get_id_insert_star();
          $this->load->view('templateo/header');    
          $this->load->view('templateo/id_number', $data);
         
      }}


       function watch_report(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 


          $data['customers'] = $this->user_model->get_watch_star();
          $this->load->view('templateo/header');    
          $this->load->view('templateo/watch_report', $data);
       // $this->load->view('templateo/footer');      
      }}


      function order_list(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                      $data['customers'] = $this->user_model->get_ordersdata_star();
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin();
                    }elseif ($this ->session->userdata('type') == 6) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin();
                    }elseif ($this ->session->userdata('type') == 6) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin();
                    }
          
          $this->load->view('templateo/header');    
          $this->load->view('templateo/order_list', $data);
      }}


      function order_list1(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                      
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin101();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/order_list1', $data);
      }
    }



    function deal_replay1(){
    $result = $this->user_model->deal_replay();
   // $result3 = $this->user_model->deal_replay_change1();
    
    //$result1 = $this->user_model->notifications_add2();
    // $msg['success'] = false;
    // $msg['type'] = 'update';
    // if($result){
    //   $msg['success'] = true;
    // }
    // if($result1){
    //   $msg['success'] = true;
    // }
    //echo json_encode($msg);
      redirect('users/dashbord_analyses');

  }




     function data_emp_part1(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part1', $data);
      }
    }



      function data_emp_part101(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();




                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id101();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part1', $data);
      }
    }





     function data_emp_part3(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id999();


                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part3', $data);
      }
    }



     function data_emp_part_hrs(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_hrs();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                       $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_hrs();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_hrs', $data);
      }
    }



     function data_emp_part_mang(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_mang();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                     $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_mang();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_mang', $data);
      }
    }


      function data_emp_part_new(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new', $data);
      }
    }

      function data_emp_part_new_jobs(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs', $data);
      }
    }

      function data_emp_part_new_jobs55214(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102558855555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102558855555();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102558855555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102558855555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102558855555();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs', $data);
      }
    }


      function data_emp_part_new_jobs555(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['customers'] = $this->user_model->get_emp_candidate_admin10255555557777();
                      //  $data['user'] = $this->user_model->get_customersid6();

                    ///  $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {
                        $data['customers'] = $this->user_model->get_emp_candidate_admin10255555557777();


                    //  $data['user'] = $this->user_model->get_customersid6();

                      //$data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                        $data['customers'] = $this->user_model->get_emp_candidate_admin10255555557777();
                     // $data['user'] = $this->user_model->get_customersid6();

                    //  $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                        $data['customers'] = $this->user_model->get_emp_candidate_admin10255555557777();
                     // $data['user'] = $this->user_model->get_customersid6();

                   //   $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin10255555557777();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_done', $data);
      }
    }




     function data_emp_part_new_jobs1(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 

                     $data['id'] = $this->uri->segment(3,0);
            $id = $data['id']; 



                     $data['customers'] = $this->user_model->get_emp_candidate_admin102555555565($id);
                  
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs', $data);
      }
    }

     function data_emp_part_new_jobs_abha(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555999();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs_abha', $data);
      }
    }

    function data_emp_part_new_jobs7(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin10255555557();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin10255555557();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs7', $data);
      }
    }

    function data_emp_part_new_jobs8(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin10255555558();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin10255555558();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs8', $data);
      }
    }

    function data_emp_part_new_jobs10(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10', $data);
      }
    }

     function data_emp_part_new_jobs10_G(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_g();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_g();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_G', $data);
      }
    }

      function data_emp_part_new_jobs10_done(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done();
                    } 
        
        
          // $data['title'] = 'المرشحين المعتمدين';
          // $data['extra_css'] = [
          //     'https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css',
          // ];
          // $data['extra_js'] = [
          //     'https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js',
          //     'https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js',
          // ];
          // $data['after_js_view'] = 'includes/datatables-basic-init';       
         
          $this->load->view('template/new_header', $data);
          $this->load->view('templateo/data_emp_part_new_jobs10_done', $data);
          $this->load->view('template/new_footer', $data);
      }
    }


        public function rec_data()
{
    $from       = $this->input->get('from', true);
    $to         = $this->input->get('to', true);
    $id_number  = $this->input->get('id_number', true);

    $data = [
        'from'       => $from,
        'to'         => $to,
        'id_number'  => $id_number,
        'customers'  => []
    ];

    $this->load->model('User_model');

    if (!empty($id_number)) {
        // بحث مباشر برقم الهوية
        $data['customers'] = $this->User_model
            ->get_candidates_by_idnumber_with_cv($id_number);
    } else {
        // بحث بنطاق تاريخ المباشرة (لو صالح)
        $valid = (preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$from) &&
                  preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$to));
        if ($valid) {
            $data['customers'] = $this->User_model
                ->get_emp_candidate_admin102555555510_done112_by_direct_range_with_cv($from, $to, '2');
        }
    }

    $this->load->view('templateo/rec_data', $data);
}



 public function rec_data_export()
{
    $from       = $this->input->get('from', true);
    $to         = $this->input->get('to', true);
    $id_number  = $this->input->get('id_number', true);

    $this->load->model('User_model');

    if (!empty($id_number)) {
        $rows = $this->User_model->get_candidates_by_idnumber_with_cv($id_number);
    } else {
        $valid = (preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$from) &&
                  preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$to));
        if ($valid) {
            $rows = $this->User_model
                ->get_emp_candidate_admin102555555510_done112_by_direct_range_with_cv($from, $to, '2');
        } else {
            $rows = [];
        }
    }

    // إخراج CSV بسيط
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=candidates.csv');
    $out = fopen('php://output', 'w');
    // سطر BOM للغة العربية (اختياري)
    fprintf($out, chr(0xEF).chr(0xBB).chr(0xBF));
    // العناوين
    fputcsv($out, ['الرقم','الرقم الوظيفي','الاسم','رقم الجوال','تاريخ المقابلة','المسمى الوظيفي','تاريخ المباشرة','حالة المباشرة','رقم الهوية','CV']);
    foreach ($rows as $r) {
        fputcsv($out, [
            $r['id'] ?? '',
            $r['emp_id'] ?? '',
            $r['name'] ?? '',
            $r['mobile'] ?? '',
            $r['day'] ?? '',
            $r['job_name'] ?? '',
            $r['f5'] ?? '',
            $r['status5'] ?? '',
            $r['id_number'] ?? '',
            $r['cv'] ?? '',
        ]);
    }
    fclose($out);
    exit;
}




     function data_emp_part_new_jobs10_done12(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 


            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id']; 
            $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done225($id);


                   
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_done', $data);
      }
    }






      function data_emp_part_new_jobs10_done1(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done1();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done1();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_done1', $data);
      }
    }

      function data_emp_part_new_jobs10_done3(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done3();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done3();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_done3', $data);
      }
    }

      function data_emp_part_new_jobs10_done4(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done4();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_done4();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_done4', $data);
      }
    }


    function data_emp_part_new_jobs10_today(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_today();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_today();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_today', $data);
      }
    }

      function data_emp_part_new_jobs10_tom(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_tom', $data);
      }
    }


       function data_emp_part_new_jobs10_tom2(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom2();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom2();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_tom2', $data);
      }
    }

     function data_emp_part_new_jobs10_tom3(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom3();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom3();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_tom3', $data);
      }
    }

     function data_emp_part_new_jobs10_tom4(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom4();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_tom4();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_tom4', $data);
      }
    }

      function data_emp_part_new_jobs10_A(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_a();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin1025555555();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102555555510_a();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_new_jobs10_A', $data);
      }
    }


      function data_emp_part_all(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_all();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_all', $data);
      }
    }



     function data_emp_part_co(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_co();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                     $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_co();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_co', $data);
      }
    }



      function data_emp_part_don(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_don();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                     $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_don();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_don', $data);
      }
    }


      function data_emp_part_false(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_false();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id();
                    }elseif ($this ->session->userdata('type') == 7) {
                         $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_false();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part_false', $data);
      }
    }


    function users_conect(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                       
                      
                    }elseif ($this ->session->userdata('type') == 3) {


                      $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_false();

                      
                    }elseif ($this ->session->userdata('type') == 4) {
                    
                    }elseif ($this ->session->userdata('type') == 2) {
                     
                    }elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102();
                    } 
          $this->load->view('templateo/header');    
          $this->load->view('templateo/users_conect', $data);
      }
    }















    function data_emp_part2(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                      
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin103();
                    } 
                    elseif ($this ->session->userdata('type') == 7) {
                      $data['customers'] = $this->user_model->get_emp_candidate_admin103();
                    }
          $this->load->view('templateo/header');    
          $this->load->view('templateo/data_emp_part2', $data);
      }
    }




       function message_list(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                      
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['customers'] = $this->user_model->get_ordersdata_message101();
                    } 
          
          $this->load->view('templateo/header');    
          $this->load->view('templateo/message_list', $data);
      }}

      



      function order_list2(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                      $data['customers'] = $this->user_model->get_ordersdata_star00();
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin102();
                    }elseif ($this ->session->userdata('type') == 6) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin102();
                    }elseif ($this ->session->userdata('type') == 5) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin102();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin102();
                    }
          
          $this->load->view('templateo/header');    
          $this->load->view('templateo/order_list2', $data);
      }}

      function order_list3(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                      $data['customers'] = $this->user_model->get_ordersdata_star010();
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin103();
                    }elseif ($this ->session->userdata('type') == 6) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin103();
                    }elseif ($this ->session->userdata('type') == 5) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin103();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin103();
                    }
          
          $this->load->view('templateo/header');    
          $this->load->view('templateo/order_list3', $data);
      }}


       function order_list4(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                    if ($this ->session->userdata('type') == 1) {
                      $data['customers'] = $this->user_model->get_ordersdata_star0101();
                    }elseif ($this ->session->userdata('type') == 3) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin104();
                    }elseif ($this ->session->userdata('type') == 6) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin104();
                    }elseif ($this ->session->userdata('type') == 5) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin104();
                    }elseif ($this ->session->userdata('type') == 2) {
                      $data['customers'] = $this->user_model->get_ordersdata_admin104();
                    }
          
          $this->load->view('templateo/header');    
          $this->load->view('templateo/order_list4', $data);
      }}







       function user_edit_targit(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 


          $data['customers'] = $this->user_model->get_userdata_star_edit_targit();
          $this->load->view('templateo/header');    
          $this->load->view('templateo/user_edit_targit', $data);
       // $this->load->view('templateo/footer');      
      }}





       function data_table(){ 

 

         
          $this->load->view('templateo/data_table');
             
      }







         /**********************       index            *****************************/
      function job(){ 
        $this->load->view('templateo/job');      
      }

         /**********************       index            *****************************/
      function services(){ 
        $this->load->view('templateo/services');      
      }


    public function sendMail()
{
   

}


 function register(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 1){
              redirect('users/login');
            }else{
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/register', $data);
                      $this->load->view('templateo/footer');
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                              $enc_password = md5($this->input->post('password'));
                              $this->user_model->register($enc_password,$post_image);
                            

 
 
      
            redirect('users/dashbord_analyses');
          }}
      }
    }


    function add_id_number(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 4){
              redirect('users/login');
            }else{
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('id_number', 'id_number', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/add_id_number', $data);
                      $this->load->view('templateo/footer');
                } else {

                      $id_number = $this->input->post('id_number');

                         $data['customers'] = $this->user_model->get_id_insert_id_number($id_number);
                   if ($data['customers']['id'] == "") {

                   
      
                      $this->user_model->add_id_number();
                    

                      redirect('users/check_id101');

                    }
                      else{
                        redirect('users/cant_add');
                      }



                            
                            
          }}
      }
    }

     function add_job_vacancy(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 5){
              redirect('users/login');
            }else{
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('n1', 'n1', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/add_job_vacancy', $data);
                      $this->load->view('templateo/footer');
                } else {

                      $this->user_model->add_job_vacancy();
                        redirect('users/dashbord_analyses103');               
          }}
      }
    }




    function register_emp(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') != 3){
              redirect('users/login');
            }else{
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/register_emp', $data);
                      $this->load->view('templateo/footer');
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                              $enc_password = md5($this->input->post('password'));
                              $this->user_model->register($enc_password,$post_image);
      
            redirect('users/dashbord_analyses');
          }}
      }
    }


    function reg_emp(){
   $id=$this->session->userdata('type');

            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
             $id8=$this->input->post('id_number');
        
                      $data['title'] = 'اضافة مستخدم جديد';

                       $data['customers'] = $this->user_model->get_emp_candidate2255($id);
                      $this->form_validation->set_rules('name', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/reg_emp', $data);
                      $this->load->view('templateo/footer');
                } else {

                

                    //  $this->user_model->add_emp_candidate($id8);


                      $agree=$this->input->post('agree');
                      if ($agree == 2) {
                        redirect('users/finish_end');
                        
                      }else
                      $this->user_model->work_flow_update102($id8);
                       $id6=3;
                      // $id5= $this->user_model->max_emp_candidate();
                       $this->user_model->work_flow_update010($id8,$id6);

      
                    redirect('users/add_att1/'.$id8);
                 
                     
          }
       
    }




     function add_interview(){
   $id=$this->session->userdata('type');
     $data['id'] = $this->uri->segment(3,0);
     $id8=$this->input->post('id_number');
            $id = $data['id'];  
             $data['c'] = $this->user_model->get_id_insert_id_number101($id);
            
               $data['customers111'] = $this->user_model->get_emp_candidate_id_number_jobs($id);
        
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('id_number', 'id_number', 'required'); 
                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/add_interview', $data);
                      $this->load->view('templateo/footer');
                } else {

                   $id_number = $this->input->post('id_number');


                 



                   $data['customers'] = $this->user_model->get_emp_candidate_id_number($id_number);
$this->user_model->emp_update_status1010019999($id);

                   if ($data['customers']['id'] == "") {
                   
                      $this->user_model->add_interview();



                    
            




                      

                      
                      

      
      redirect('users/finish/'.$id8);
                      
                    
                   }else 
                    redirect('users/teaching/'.$id8);
                     
          }
       
    }


     function dashbord_report(){ 
            if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     
    
         $this->load->view('templateo/header'); 
         $this->load->view('templateo/dashbord_report',$data);
         $this->load->view('templateo/footer');  
      }
    }


      function add_report(){

          $data['id'] = $this->uri->segment(3,0);
          $id = $data['id'];
           $project=$this->session->userdata('project');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 10){
              redirect('users/login');
            }else{
               // $data['get_emkan'] = $this->user_model->get_emkan($id);
                 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/add_report', $data);
                      $this->load->view('templateo/footer');
                } else {
 
                          
                                
                               
                                          $this->user_model->add_type_report();   
                                        
                               
                             
                            
                          

                           

                           


           
            redirect('users/report_index');
          }
      }
      }
    }


     function inv1(){ 
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id']; 
             
              $data['get_customers77all_report'] = $this->user_model->get_customers77all_report($id);
              $from_date=$data['get_customers77all_report']['from_date'];
              $to_date=$data['get_customers77all_report']['to_date'];
            $data['get_customers77all_complaints11'] = $this->user_model->get_order_emkan_report1111($from_date,$to_date);

           
         
           $this->load->view('templateo/inv1', $data);  
      } 




    function report_index(){ 
         if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                     

            
          $data['customers'] = $this->user_model->get_report1();
        


                    
                     

                    
          
          $this->load->view('templateo/header');    
          $this->load->view('templateo/report_index', $data);
      }}






       function add_interview_update(){
     $id=$this->session->userdata('type');
     $data['id'] = $this->uri->segment(3,0);
     $id8=$this->input->post('id_number');
            $id = $data['id'];  
           //  $data['c'] = $this->user_model->get_id_insert_id_number101($id);
            
               $data['customers111'] = $this->user_model->get_emp_candidate_id_number_jobsemp_candidate($id);
        
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('id_number', 'id_number', 'required'); 
                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/add_interview_update', $data);
                      $this->load->view('templateo/footer');
                } else {

                   $id_number = $this->input->post('id_number');


                 



                   $data['customers'] = $this->user_model->get_emp_candidate_id_number($id_number);
$this->user_model->emp_update_status1010019999($id);

                   if ($data['customers']['id'] == "") {
                   
                      $this->user_model->add_interview();



                    
            




                      

                      
                      

      
      redirect('users/finish/'.$id8);
                      
                    
                   }else 
                    redirect('users/teaching/'.$id8);
                     
          }
       
    }




     function add_interviewf(){
   $id=$this->session->userdata('type');
     $data['id'] = $this->uri->segment(3,0);
     $id8=$this->input->post('id_number');
            $id = $data['id'];  
             $data['c'] = $this->user_model->get_id_insert_id_number101($id);
        
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('q1', 'q1', 'required'); 
                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/add_interviewf', $data);
                      $this->load->view('templateo/footer');
                } else {

                   $id_number = $this->input->post('id_number');


                   $data['customers'] = $this->user_model->get_emp_candidate_id_number($id_number);
                   if ($data['customers']['id'] == "") {
                   
                      $this->user_model->add_interviewf();
                      

      
       redirect('users/finish/'.$id8);
                      
                    
                   }else 
                    redirect('users/teaching');
                     
          }
       
    }



 public function add_att1(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id']; 

            $this->load->view('templateo/add_att1', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
               $id6=4;
               $this->user_model->work_flow_update010($id,$id6);
                redirect('users/add_att2/'.$id);
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                      
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment101($post_image,$id);
                       $id6=4;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                redirect('users/add_att2/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }


     public function add_att2(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $this->load->view('templateo/add_att2', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
                $id6=5;
                $this->user_model->work_flow_update010($id,$id6);
                redirect('users/add_att3/'.$id); 

              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment102($post_image,$id);
                  $id6=5;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                  redirect('users/add_att3/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }

     public function add_att3(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $this->load->view('templateo/add_att3', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
                $id6=6;
                $this->user_model->work_flow_update010($id,$id6);
                redirect('users/add_att4/'.$id); 
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment103($post_image,$id);
                   $id6=6;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                  redirect('users/add_att4/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }

       public function add_att4(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $this->load->view('templateo/add_att4', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
              $id6=7;
              $this->user_model->work_flow_update010($id,$id6);
              redirect('users/add_att5/'.$id); 
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment104($post_image,$id);
                  $id6=7;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                  redirect('users/add_att5/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }

       public function add_att5(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $this->load->view('templateo/add_att5', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
               $id6=8;
               $this->user_model->work_flow_update010($id,$id6);
               redirect('users/add_att6/'.$id); 
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment105($post_image,$id);
                  $id6=8;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                  redirect('users/add_att6/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }


      public function add_att6(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $this->load->view('templateo/add_att6', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
               $id6=9;
               $this->user_model->work_flow_update010($id,$id6);
               redirect('users/add_att7/'.$id);
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment106($post_image,$id);
                  $id6=9;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                  redirect('users/add_att7/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }


      public function add_att7(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $this->load->view('templateo/add_att7', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
              $id6=10;
              $this->user_model->work_flow_update010($id,$id6);
               redirect('users/add_att8/'.$id);
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment107($post_image,$id);
                  $id6=10;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                  redirect('users/add_att8/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }


      public function add_att8(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  

            $this->load->view('templateo/add_att8', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
               $id6=11;
               $this->user_model->work_flow_update010($id,$id6);
               redirect('users/add_att9/'.$id); 
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment108($post_image,$id);
                  $id6=11;
                        
                       $this->user_model->work_flow_update010($id,$id6);
                
              
            }

                  redirect('users/add_att9/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }



       public function add_att9(){
        
            $data['id'] = $this->uri->segment(3,0);
            $id1 = $data['id'];  
            $this->load->view('templateo/add_att9', $data);
            $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){
              $id6=12;
              $this->user_model->work_flow_update010($id1,$id6);
              redirect('users/finish'); 
              } elseif($formSubmit == 'formSave'){  
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  

                 $this->user_model->create_attachment109($post_image,$id1);
                  $id6=12;
                        
                       $this->user_model->work_flow_update010($id1,$id6);
                
              
            }

                  redirect('users/finish'); 


              }elseif($formSubmit == 'formSaveNew1'){
              }
 
       
     }


       function id_edit(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';
                      
                      $data['get_id_insert_selected'] = $this->user_model->get_id_insert_selected($id);
                      $id2= $data['get_id_insert_selected']['id'];

                      $data['customers'] = $this->user_model->get_userdata_star_targit($id);
                      $this->form_validation->set_rules('id_number', 'id_number', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/id_edit', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                             
                              
                              $this->user_model->id_number_update($id);


                         



                        
                             redirect('users/id_number/'.$id);
                           



       
          }
      }
    }



  function appointment(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected'] = $this->user_model->get_id_insert_selected($id);

               $data['get_id_insert_selected'] = $this->user_model->get_id_insert_selected($id);
                      $id2= $data['get_id_insert_selected']['id'];
                          $data['customers'] = $this->user_model->get_userdata_star_targit($id);
             $this->load->view('templateo/header');
              $this->load->view('templateo/appointment', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update($id);
                $data['get_users_otp'] =  $this->user_model->get_users_otp($id);
                 $id55= $data['get_users_otp']['n12'];


$data['get_users_otp_id_number'] =  $this->user_model->get_users_otp_id_number($id);
 $Date_of_the_personal_interview= $data['get_users_otp_id_number']['Date_of_the_personal_interview'];
  $Time_of_the_interview= $data['get_users_otp_id_number']['Time_of_the_interview'];
   

                  
              $otp= $data['get_users_otp']['otp'];
              $mobile= $data['get_users_otp_id_number']['mobile'];


          

 




                 

    
 
            }
                redirect('users/view_emp_data/'.$id);
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }


    function send_sms101() {
    $data['id'] = $this->uri->segment(3, 0);
    $id = $data['id'];
    
    $this->load->view('templateo/header');
    $this->load->view('templateo/send_sms101', $data);
    $this->load->view('templateo/footer');
    
    $formSubmit = $this->input->post('submitForm');
    
    if ($formSubmit == 'formSaveNew') {
        // Handle new form
    } elseif ($formSubmit == 'formSave') {
        $this->form_validation->set_rules('The_project', 'The_project', 'required');
        $this->form_validation->set_rules('userfile', 'userfile', 'required');
        
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['get_users_otp'] = $this->user_model->get_users_otp($id);
            $id55 = $data['get_users_otp']['n12'];
            
            $data['get_users_otp_id_number'] = $this->user_model->get_users_otp_id_number($id);
            $Date_of_the_personal_interview = $data['get_users_otp_id_number']['Date_of_the_personal_interview'];
            $Time_of_the_interview = $data['get_users_otp_id_number']['Time_of_the_interview'];
            
            $otp = $data['get_users_otp']['otp'];
            $mobile = $data['get_users_otp_id_number']['mobile'];
            
            $apiUrl = 'https://api.oursms.com/api-a/msgs';
            $username = 'marsoom';
            $token = 'zcTlmZcAI8JLK2Qsb2bs';
            $src = 'MARSOOM';
            $dests = $mobile;
            $body = 'تم تحديد موعد مقابلة بتاريخ ' . $Date_of_the_personal_interview . ' عند الساعة ' . $Time_of_the_interview . ' مرفق لكم رابط الموقع الجغرافي للشركة https://maps.app.goo.gl/fqqrhwna93miv96P6?g_st=com.google.maps.preview.copy - العقارية الثانية - بوابة 8- الدور السابع - مكتب 736';
            
            $queryParams = http_build_query([
                'username' => $username,
                'token' => $token,
                'src' => $src,
                'dests' => $dests,
                'body' => $body
            ]);
            
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $apiUrl . '?' . $queryParams,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_SSL_VERIFYPEER => false,
            ]);
            
            $response = curl_exec($ch);
            
            if ($response === false) {
                error_log('SMS error: ' . curl_error($ch));
                $this->session->set_flashdata('error_msg', 'فشل إرسال الرسالة: ' . curl_error($ch));
            } else {
                error_log('SMS sent: ' . $response);
                $this->session->set_flashdata('success_msg', 'تم إرسال الرسالة بنجاح');
            }
            
            curl_close($ch);
        }
        
        redirect('users/view_emp_data/' . $id);
    } elseif ($formSubmit == 'formSaveNew1') {
        // Handle other form
    }
}

/**
 * NEW: Send SMS for full form completion invitation
 */
function send_form_invitation($application_id) {
    // Only allow user 1526 or recruitment manager
    $current_user = $this->session->userdata('username');
    if (($current_user != '1526' && $current_user != '2200' && $current_user != '2439') && $this->session->userdata('role') != 'recruitment_manager') {
        $this->session->set_flashdata('error_msg', 'ليس لديك الصلاحية.');
        redirect('dashboard');
        return;
    }
    
    // Get application details
    $this->db->select('a.*, c.phone, c.full_name, j.job_title');
    $this->db->from('applications a');
    $this->db->join('candidates c', 'c.id = a.candidate_id');
    $this->db->join('job_postings j', 'j.id = a.job_id');
    $this->db->where('a.id', $application_id);
    $application = $this->db->get()->row_array();
    
    if (empty($application)) {
        $this->session->set_flashdata('error_msg', 'طلب التوظيف غير موجود.');
        redirect('dashboard');
        return;
    }
    
    // Generate unique token for full form
    $sms_token = bin2hex(random_bytes(16));
    
    // Save token to application
    $this->db->where('id', $application_id);
    $this->db->update('applications', [
        'sms_token' => $sms_token,
        'token_expires_at' => date('Y-m-d H:i:s', strtotime('+7 days')),
        'status' => 'مطلوب استكمال البيانات'
    ]);
    
    // Generate full form URL
    $full_form_url = base_url('simple_apply/full_form/' . $sms_token);
    
    // Create SMS message in Arabic
    $message = "عزيزي/عزيزتي {$application['full_name']}\n";
    $message .= "شكراً لتقديمك على وظيفة {$application['job_title']} في شركة مرسوم.\n";
    $message .= "يرجى إكمال باقي بيانات طلب التوظيف عبر الرابط التالي:\n";
    $message .= $full_form_url . "\n";
    $message .= "الرابط ساري لمدة 7 أيام\n";
    $message .= "شكراً لاهتمامكم";
    
    // Send SMS using your existing API
    $apiUrl = 'https://api.oursms.com/api-a/msgs';
    $username = 'marsoom';
    $token = 'zcTlmZcAI8JLK2Qsb2bs';
    $src = 'MARSOOM';
    $dests = $application['phone'];
    $body = $message;
    
    $queryParams = http_build_query([
        'username' => $username,
        'token' => $token,
        'src' => $src,
        'dests' => $dests,
        'body' => $body
    ]);
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $apiUrl . '?' . $queryParams,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    
    $response = curl_exec($ch);
    
    if ($response === false) {
        error_log('Form invitation SMS error: ' . curl_error($ch));
        $sms_status = 'failed';
        $this->session->set_flashdata('error_msg', 'فشل إرسال الرسالة: ' . curl_error($ch));
    } else {
        error_log('Form invitation SMS sent: ' . $response);
        $sms_status = 'sent';
        $this->session->set_flashdata('success_msg', 'تم إرسال رابط استكمال البيانات إلى ' . $application['phone']);
    }
    
    curl_close($ch);
    
    // Log SMS sending
    $sms_log = [
        'application_id' => $application_id,
        'phone' => $application['phone'],
        'token' => $sms_token,
        'sent_by_user_id' => $this->session->userdata('user_id'),
        'sent_at' => date('Y-m-d H:i:s'),
        'status' => $sms_status,
        'message_type' => 'form_invitation'
    ];
    
    $this->db->insert('application_sms_log', $sms_log);
    
    // Redirect back to candidate profile
    redirect('candidates/view/' . $application_id);
}
/**
 * Generate SMS message for form invitation
 */
private function _generate_form_invitation_sms($candidate_name, $job_title, $sms_token) {
    $full_form_url = base_url('simple_apply/full_form/' . $sms_token);
    
    $message = "عزيزي/عزيزتي {$candidate_name}\n";
    $message .= "شكراً لتقديمك على وظيفة {$job_title}\n";
    $message .= "يرجى إكمال بياناتك عبر الرابط:\n";
    $message .= $full_form_url . "\n";
    $message .= "الرابط ساري لمدة 7 أيام\n";
    $message .= "شركة مرسوم";
    
    return $message;
}

/**
 * Send SMS using existing API
 */
private function _send_sms_api($phone, $message) {
    $apiUrl = 'https://api.oursms.com/api-a/msgs';
    $username = 'marsoom';
    $token = 'zcTlmZcAI8JLK2Qsb2bs';
    $src = 'MARSOOM';
    $dests = $phone;
    $body = $message;
    
    $queryParams = http_build_query([
        'username' => $username,
        'token' => $token,
        'src' => $src,
        'dests' => $dests,
        'body' => $body
    ]);
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $apiUrl . '?' . $queryParams,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    
    $response = curl_exec($ch);
    
    if ($response === false) {
        error_log('SMS API error: ' . curl_error($ch));
        return ['success' => false, 'error' => curl_error($ch)];
    } else {
        error_log('SMS API response: ' . $response);
        return ['success' => true, 'response' => $response];
    }
    
    curl_close($ch);
}



       function send_sms10111(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

            $data['get_users_otp_id_number'] =  $this->user_model->get_users_otp_id_number5522211111($id);
 

                  
              $mobile= $data['get_users_otp_id_number']['n2'];

 
             $this->load->view('templateo/header');
              $this->load->view('templateo/send_sms10111', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {


                 


           $this->user_model->id_emp_pointment_update_jobs_jobs5555666771254($id);


                $apiUrl = 'https://api.oursms.com/api-a/msgs';

// API credentials and parameters
$username = 'marsoom';
$token = 'zcTlmZcAI8JLK2Qsb2bs';
$src = 'MARSOOM';
$dests = $mobile;
$body = 'مرحبًا بكم 

نحن في مرسوم مهتمون بمراجعة سيرتك الذاتية , يرجى إرسالها إلى البريد الإلكتروني (محدثة).

cv@marsoom.net

او التقديم عبر الرابط   (  https://services.marsoom.net/jobs/  )
';
 

// Build the query parameters
$queryParams = http_build_query([
    'username' => $username,
    'token' => $token,
    'src' => $src,
    'dests' => $dests,
    'body' => $body
]);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt_array($ch, [
    CURLOPT_URL => $apiUrl . '?' . $queryParams,
    CURLOPT_RETURNTRANSFER => true,  // Return response as a string
    CURLOPT_FOLLOWLOCATION => true,   // Follow redirects
    CURLOPT_MAXREDIRS => 10,          // Maximum number of redirects
    CURLOPT_SSL_VERIFYPEER => false,  // Disable SSL verification (for testing purposes)
]);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Output the response
    echo 'Response: ' . $response;
}

// Close cURL session
curl_close($ch);





                 

    
 
            }
                redirect('users/data_emp_part_new_jobs');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }



      function send_sms102(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

 
             $this->load->view('templateo/header');
              $this->load->view('templateo/send_sms102', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             
$link=$this->input->post('link');
              
                $data['get_users_otp'] =  $this->user_model->get_users_otp($id);
                 $id55= $data['get_users_otp']['n12'];


$data['get_users_otp_id_number'] =  $this->user_model->get_users_otp_id_number($id);
 $Date_of_the_personal_interview= $data['get_users_otp_id_number']['Date_of_the_personal_interview'];
  $Time_of_the_interview= $data['get_users_otp_id_number']['Time_of_the_interview'];
   

                  
              $otp= $data['get_users_otp']['otp'];
              $mobile= $data['get_users_otp_id_number']['mobile'];


          


                $apiUrl = 'https://api.oursms.com/api-a/msgs';

// API credentials and parameters
$username = 'marsoom';
$token = 'zcTlmZcAI8JLK2Qsb2bs';
$src = 'MARSOOM';
$dests = $mobile;
$body = '       مرفق لكم رابط المقابلة الوظيفية     '.$link.' وشكراً ';
 

// Build the query parameters
$queryParams = http_build_query([
    'username' => $username,
    'token' => $token,
    'src' => $src,
    'dests' => $dests,
    'body' => $body
]);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt_array($ch, [
    CURLOPT_URL => $apiUrl . '?' . $queryParams,
    CURLOPT_RETURNTRANSFER => true,  // Return response as a string
    CURLOPT_FOLLOWLOCATION => true,   // Follow redirects
    CURLOPT_MAXREDIRS => 10,          // Maximum number of redirects
    CURLOPT_SSL_VERIFYPEER => false,  // Disable SSL verification (for testing purposes)
]);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Output the response
    echo 'Response: ' . $response;
}

// Close cURL session
curl_close($ch);





                 

    
 
            }
                redirect('users/view_emp_data/'.$id);
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }


     function appointment11(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1111'] = $this->user_model->get_id_insert_selected1111($id);

              
             $this->load->view('templateo/header');
              $this->load->view('templateo/appointment', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->add_emp_candidate101($id);
               
   
 
            

          
 


                 

    
 
            }
                redirect('users/view_emp_data/'.$id);
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }



 function add_status(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected'] = $this->user_model->get_id_insert_selected1010($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs($id);
              




                 

    
 
            }
                redirect('users/dashbord_analyses102');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }


     function add_status111(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status111', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs5555($id);
              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }

      function add_status1113(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status1113', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('c1', 'c1', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs555533($id);
              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }

       function add_status555(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status555', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs555566($id);
              




                 

    
 
            }
                redirect('users/dashbord_analyses102');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }


      function add_status5556(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status5556', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('status5', 'status5', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs555566666($id);
              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }


      function add_status222(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status222', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('sms', 'sms', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs5555666($id);


$mobile=$this->input->POST('sms');

//                    $apiUrl = 'https://api.oursms.com/api-a/msgs';

// // API credentials and parameters
// $username = 'marsoom';
// $token = 'zcTlmZcAI8JLK2Qsb2bs';
// $src = 'MARSOOM';
// $dests = $mobile;
// $body = 'السلام عليكم ورحمة الله وبركاته

// نفيدكم بانه تم ترشيحكم للعمل في شركة مرسوم 
// وكما يرجى الرد على العرض الوظيفي المرسل عبر الايميل الشخصي .

// مع تمنياتنا لكم بالتوفيق ،،،

// إدارة التوظيف - شركة مرسوم';
 

// // Build the query parameters
// $queryParams = http_build_query([
//     'username' => $username,
//     'token' => $token,
//     'src' => $src,
//     'dests' => $dests,
//     'body' => $body
// ]);

// // Initialize cURL session
// $ch = curl_init();

// // Set the cURL options
// curl_setopt_array($ch, [
//     CURLOPT_URL => $apiUrl . '?' . $queryParams,
//     CURLOPT_RETURNTRANSFER => true,  // Return response as a string
//     CURLOPT_FOLLOWLOCATION => true,   // Follow redirects
//     CURLOPT_MAXREDIRS => 10,          // Maximum number of redirects
//     CURLOPT_SSL_VERIFYPEER => false,  // Disable SSL verification (for testing purposes)
// ]);

// // Execute the cURL request
// $response = curl_exec($ch);

// // Check for errors
// if ($response === false) {
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     // Output the response
//     echo 'Response: ' . $response;
// }

// // Close cURL session
// curl_close($ch);



              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }


      function add_status22233(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status22233', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('sms', 'sms', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs555566677($id);


$mobile=$this->input->POST('sms');

                   $apiUrl = 'https://api.oursms.com/api-a/msgs';

// API credentials and parameters
$username = 'marsoom';
$token = 'zcTlmZcAI8JLK2Qsb2bs';
$src = 'MARSOOM';
$dests = $mobile;
$body = '  نقدر اهتمامك  لحضور للمقابلة الوظيفية بشركة مرسوم ،نعدك بالتواصل مستقبلًا عندما تتاح لدينا فرص أخرى تتناسب مع مهاراتك وخبراتك. // نتمنى لك كل التوفيق . ';
 

// Build the query parameters
$queryParams = http_build_query([
    'username' => $username,
    'token' => $token,
    'src' => $src,
    'dests' => $dests,
    'body' => $body
]);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt_array($ch, [
    CURLOPT_URL => $apiUrl . '?' . $queryParams,
    CURLOPT_RETURNTRANSFER => true,  // Return response as a string
    CURLOPT_FOLLOWLOCATION => true,   // Follow redirects
    CURLOPT_MAXREDIRS => 10,          // Maximum number of redirects
    CURLOPT_SSL_VERIFYPEER => false,  // Disable SSL verification (for testing purposes)
]);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Output the response
    echo 'Response: ' . $response;
}

// Close cURL session
curl_close($ch);



              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }



      function add_status333(){

               $data['id'] = $this->uri->segment(3,0);
             $id = $data['id'];

$data['get_id_insert_selected1010555'] = $this->user_model->get_id_insert_selected1010555($id);

             
             $this->load->view('templateo/header');
              $this->load->view('templateo/add_status333', $data);
               $this->load->view('templateo/footer');
 
              $formSubmit = $this->input->post('submitForm');
              if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  
                   $this->form_validation->set_rules('sms', 'sms', 'required'); 
 
                  $this->form_validation->set_rules('userfile','userfile','required');
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             

               $this->user_model->id_emp_pointment_update_jobs_jobs555566655556666($id);


$mobile=$this->input->POST('sms');

//                    $apiUrl = 'https://api.oursms.com/api-a/msgs';

// // API credentials and parameters
// $username = 'marsoom';
// $token = 'zcTlmZcAI8JLK2Qsb2bs';
// $src = 'MARSOOM';
// $dests = $mobile;
// $body = 'السلام عليكم ورحمة الله وبركاته

// نفيدكم بانه تم ترشيحكم للعمل في شركة مرسوم 
// وكما يرجى الرد على العرض الوظيفي المرسل عبر الايميل الشخصي .

// مع تمنياتنا لكم بالتوفيق ،،،

// إدارة التوظيف - شركة مرسوم';
 

// // Build the query parameters
// $queryParams = http_build_query([
//     'username' => $username,
//     'token' => $token,
//     'src' => $src,
//     'dests' => $dests,
//     'body' => $body
// ]);

// // Initialize cURL session
// $ch = curl_init();

// // Set the cURL options
// curl_setopt_array($ch, [
//     CURLOPT_URL => $apiUrl . '?' . $queryParams,
//     CURLOPT_RETURNTRANSFER => true,  // Return response as a string
//     CURLOPT_FOLLOWLOCATION => true,   // Follow redirects
//     CURLOPT_MAXREDIRS => 10,          // Maximum number of redirects
//     CURLOPT_SSL_VERIFYPEER => false,  // Disable SSL verification (for testing purposes)
// ]);

// // Execute the cURL request
// $response = curl_exec($ch);

// // Check for errors
// if ($response === false) {
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     // Output the response
//     echo 'Response: ' . $response;
// }

// // Close cURL session
// curl_close($ch);



              




                 

    
 
            }
                redirect('users/data_emp_part_new_jobs10_done');
              }elseif($formSubmit == 'formSaveNew1'){
              } 
     }








    function computer_deg(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';
                      
                      $data['get_id_insert_selected'] = $this->user_model->get_id_insert_selected($id);
                      $id2= $data['get_id_insert_selected']['id'];

                      $data['customers'] = $this->user_model->get_userdata_star_targit($id);
                      $this->form_validation->set_rules('computer_deg', 'computer_deg', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/computer_deg', $data);
                      $this->load->view('templateo/footer');
                } else {
                            
                             
                              
                              $this->user_model->id_emp_pointment_update101($id);


                         



                        
                             redirect('users/data_emp_part3/'.$id);
                           



       
          }
      }
    }


    public function update_order101001($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001($dd);
        
        redirect('users/data_emp_part1');
         }

          public function update_order101001wait($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001wait($dd);
        
        redirect('users/data_emp_part1');
         }




          public function update_order1010011($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->emp_update_status101001($dd);
        
        redirect('users/data_emp_part1');
         }





     function view_emp(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';

                        $data['user'] = $this->user_model->get_customersid6();
 $data['customers1'] = $this->user_model->get_emp_candidate_admin102_user_id_id1421($id);
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_id($id);
                      $customers= $data['customers'];
                        $customers1= $data['customers']['id_number'];
                        $data['customers12'] = $this->user_model->get_id_insert_selected555($customers1);


                     
                    
                      $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_emp', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                                $id_user = $this->input->POST('useridfuture');
                               $data['get_userdata'] = $this->user_model->get_userdata1020($id_user);
                               $username= $data['get_userdata']['name'];
                               $useridfuturetype= $data['get_userdata']['type'];
                               $this->user_model->add_id_number5412($id);
                              $this->user_model->id_emp_view_emp_update_hrs($id,$username,$useridfuturetype);

 
sleep(1);
                        
                             redirect('users/data_emp_part_new_jobs555');
                           
 
       
          }
      }
    }


    function view_emp_data(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';

                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_id($id);
                      $customers= $data['customers'];
                        $customers1= $data['customers']['id_number'];
                        $data['customers12'] = $this->user_model->get_id_insert_selected555($customers1);


                     
                    
                      $this->form_validation->set_rules('expected_salary', 'expected_salary', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_emp_data', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                             
                              
                              $this->user_model->id_emp_view_emp_update($id);


                         



                        sleep(1);
                             redirect('users/data_emp_part1');
                           



       
          }
      }
    }




     function view_emp_hrm(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';

                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_id($id);
                      $customers= $data['customers'];
                        $customers1= $data['customers']['id_number'];
                        $data['customers12'] = $this->user_model->get_id_insert_selected555($customers1);
                         $data['get_id_insert_selected5559999'] = $this->user_model->get_id_insert_selected5559999($customers1);


                     
                    
                      $this->form_validation->set_rules('expected_salary', 'expected_salary', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_emp_hrm', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                             
                              
                              $this->user_model->id_emp_view_emp_update_hrm($id);


                         



                        sleep(1);
                             redirect('users/data_emp_part1');
                           



       
          }
      }
    }


     function view_emp_mang(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';

                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_id($id);
                      $data['customers1'] = $this->user_model->get_emp_candidate_admin102_user_id_id1421($id);
                      
                      $customers= $data['customers'];
                        $customers1= $data['customers']['id_number'];
                        $data['customers12'] = $this->user_model->get_id_insert_selected555($customers1);


                     
                    
                      $this->form_validation->set_rules('n1', 'n1', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_emp_mang', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                             
                              
                                $this->user_model->add_id_number5412($id);
                              $this->user_model->id_emp_view_emp_update_mang($id);


                         



                    sleep(1);    
                             redirect('users/data_emp_part1');
                           



       
          }
      }
    }


     function view_emp_hrs(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';

                        $data['user'] = $this->user_model->get_customersid6();
 $data['customers1'] = $this->user_model->get_emp_candidate_admin102_user_id_id1421($id);
                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_id($id);
                      $customers= $data['customers'];
                        $customers1= $data['customers']['id_number'];
                        $data['customers12'] = $this->user_model->get_id_insert_selected555($customers1);


                     
                    
                      $this->form_validation->set_rules('The_project', 'The_project', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_emp_hrs', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                                $id_user = $this->input->POST('useridfuture');
                               $data['get_userdata'] = $this->user_model->get_userdata1020($id_user);
                               $username= $data['get_userdata']['name'];
                               $useridfuturetype= $data['get_userdata']['type'];
                               $this->user_model->add_id_number5412($id);
                              $this->user_model->id_emp_view_emp_update_hrs($id,$username,$useridfuturetype);

 
sleep(1);
                        
                             redirect('users/data_emp_part_new_jobs555');
                           
 
       
          }
      }
    }




      function inv2222(){ 
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $data['get_customers77'] = $this->user_model->get_customers77($id);
         //    $data['ev_emp22'] = $this->user_model->ev_emp22($id);
          ////   $m4= $data['ev_emp22']['m5'];
          //   $data['ev_emp2255'] = $this->user_model->ev_emp2255($m4);
           // $data['get_ordersdetailes_202'] = $this->user_model->get_ordersdetailes_202($id);
           $this->load->view('templateo/inv2', $data);  
      }

      function inv2222_hr(){ 
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $data['get_customers77'] = $this->user_model->get_customers77($id);
         //    $data['ev_emp22'] = $this->user_model->ev_emp22($id);
          ////   $m4= $data['ev_emp22']['m5'];
          //   $data['ev_emp2255'] = $this->user_model->ev_emp2255($m4);
           // $data['get_ordersdetailes_202'] = $this->user_model->get_ordersdetailes_202($id);
           $this->load->view('templateo/inv2_hr', $data);  
      }


       function inv222255(){ 
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            $data['get_customers77'] = $this->user_model->get_customers77($id);
         //    $data['ev_emp22'] = $this->user_model->ev_emp22($id);
          ////   $m4= $data['ev_emp22']['m5'];
          //   $data['ev_emp2255'] = $this->user_model->ev_emp2255($m4);
           // $data['get_ordersdetailes_202'] = $this->user_model->get_ordersdetailes_202($id);
           $this->load->view('templateo/inv3', $data);  
      }







     function view_emp_don(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';

                        $data['user'] = $this->user_model->get_customersid6();

                      $data['customers'] = $this->user_model->get_emp_candidate_admin102_user_id_id($id);
                      $customers= $data['customers'];

                      $customers1= $data['customers']['id_number'];
                        $data['customers12'] = $this->user_model->get_id_insert_selected555($customers1);
                          $data['get_id_insert_selected5559999'] = $this->user_model->get_id_insert_selected5559999($customers1);

                     



                     
                    
                      $this->form_validation->set_rules('degree_hrs', 'degree_hrs', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_emp_don', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                                $id_user = $this->input->POST('useridfuture');
                               $data['get_userdata'] = $this->user_model->get_userdata1020($id_user);
                               $username= $data['get_userdata']['name'];
                               $useridfuturetype= $data['get_userdata']['type'];
                              
                              $this->user_model->id_emp_view_emp_update_hrs($id,$username,$useridfuturetype);

 
sleep(1);
                        
                             redirect('users/data_emp_part3');
                           
 
       
          }
      }
    }












      function redirection(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';
                       $data['user'] = $this->user_model->get_customersid6();
                     
                     
                      $this->form_validation->set_rules('useridfuture', 'useridfuture', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/redirection', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                            $id_user = $this->input->POST('useridfuture');
                               $data['get_userdata'] = $this->user_model->get_userdata1020($id_user);
                               $username= $data['get_userdata']['name'];
                                $email_to= $data['get_userdata']['email'];
                               
                               $useridfuturetype= $data['get_userdata']['type'];

                              $this->user_model->id_emp_pointment_redirection($id,$username,$useridfuturetype);

                               $from_email = "recruitment@marsoomhr.com";
        $to_email = $email_to;
        //Load email library
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.marsoomhr.com';
        $config['smtp_user'] = 'recruitment@marsoomhr.com';
        $config['smtp_pass'] = 'Saleh@123';
        $config['smtp_port'] = 587;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($from_email, 'RECRUITMENT NOTIFICATION');
        $this->email->to($to_email);
        $this->email->subject('إشعار توظيف');
        $this->email->message('الأستاذ/ــه '.$username.'  لديكم طلب جديد في بوابة التوظيف نأمل منكم التكرم بالدخول لحسابكم وإكمال اللازم حسب الصلاحية      ولكم جزيل الشكر والتقدير      رابط النظام   :  https://www.sadadjobs.com/sadad_hr/');

          $this->email->send();




                         



                        
                             redirect('users/dashbord_analyses102');
                           



       
          }
      }
    }


     function add_salary(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';
                       $data['user'] = $this->user_model->get_customersid6();
                     
                     
                      $this->form_validation->set_rules('salary_real', 'salary_real', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/add_salary', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                            $id_user = $this->input->POST('useridfuture');
                               $data['get_userdata'] = $this->user_model->get_userdata1020($id_user);
                               $username= $data['get_userdata']['name'];
                               $useridfuturetype= $data['get_userdata']['type'];

                              $this->user_model->salary_real($id);


                         



                        
                             redirect('users/data_emp_part_new');
                           



       
          }
      }
    }






 


     function check_id(){
   $id=$this->session->userdata('type');
          
           
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('id_number', 'id_number', 'required'); 
                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/check_id');
                   
                } else {
                           
      
              $id_number = $this->input->post('id_number');


                     $data['customers1'] = $this->user_model->get_id_insert_id_number($id_number);
                     if ($data['customers1']['id'] == "") {

                    
                      redirect('users/no_reg');
                    
                   }else{

                    $data['customers'] = $this->user_model->get_emp_candidate_id_number($id_number);
                   if ($data['customers']['work_flow2'] == 0) {


                      redirect('users/reg_emp/'.$id_number);
                    }
                      else{
                   if ($data['customers']['work_flow'] == 3) {
                      redirect('users/add_att1/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 4) {
                      redirect('users/add_att2/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 5) {
                      redirect('users/add_att3/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 6) {
                      redirect('users/add_att4/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 7) {
                      redirect('users/add_att5/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 8) {
                      redirect('users/add_att6/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 9) {
                      redirect('users/add_att7/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 10) {
                      redirect('users/add_att8/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 11) {
                      redirect('users/add_att9/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 12) {
                      redirect('users/teaching/'.$id_number);

                   }




                       // redirect('users/teaching');
                      }



                    // redirect('users/teaching');

                   } 
                   
          }

    }


      function check_id101(){
        
          
              $id4= $this->user_model->max_id_candidate();
              
               $data['customers11'] = $this->user_model->get_id_insert_id_number101($id4);


                      
 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('id_number', 'id_number', 'required'); 
                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/check_id101',$data);
                   
                } else {
                           
      
              $id_number = $this->input->post('id_number');


                     $data['customers1'] = $this->user_model->get_id_insert_id_number($id_number);
                      $id2=$data['customers1']['id'];
                    
                     if ($data['customers1']['id'] == "") {

                    
                      redirect('users/no_reg');
                    
                   }else{

                    $data['customers'] = $this->user_model->get_emp_candidate_id_number($id_number);
                   
                   if ($data['customers']['id'] == "") {

                     if ($data['customers1']['sex'] == "2") {
                       redirect('users/add_interviewf/'.$id2);

                     }else{
                      
                      redirect('users/add_interview/'.$id2);

                     }

                   

                    
      
                     

                    }
                      else{
                        redirect('users/teaching');
                      }


 

                   } 
                   
          }

    }


     function check_id102(){
   $id=$this->session->userdata('type');
          
           
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('id_number', 'id_number', 'required'); 
                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/check_id101');
                   
                } else {
                           
      
              $id_number = $this->input->post('id_number');


                     $data['customers1'] = $this->user_model->get_id_insert_id_number($id_number);
                      $id2=$data['customers1']['id'];
                    
                     if ($data['customers1']['id'] == "") {

                    
                      redirect('users/no_reg');
                    
                   }else{

                    $data['customers'] = $this->user_model->get_emp_candidate_id_number($id_number);
                   
                   if ($data['customers']['id'] == "") {

                   if ($data['customers']['work_flow'] == 0) {
                      redirect('users/reg_emp/'.$id2);

                   }elseif ($data['customers']['work_flow'] == 3) {
                      redirect('users/add_att1/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 4) {
                      redirect('users/add_att2/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 5) {
                      redirect('users/add_att3/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 6) {
                      redirect('users/add_att4/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 7) {
                      redirect('users/add_att5/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 8) {
                      redirect('users/add_att6/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 9) {
                      redirect('users/add_att7/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 10) {
                      redirect('users/add_att8/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 11) {
                      redirect('users/add_att9/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 12) {
                      redirect('users/finish/'.$id_number);

                   }
      
                     

                    }
                      else{
                         if ($data['customers']['work_flow'] == 0) {
                      redirect('users/reg_emp/'.$id2);

                   }elseif ($data['customers']['work_flow'] == 3) {
                      redirect('users/add_att1/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 4) {
                      redirect('users/add_att2/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 5) {
                      redirect('users/add_att3/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 6) {
                      redirect('users/add_att4/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 7) {
                      redirect('users/add_att5/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 8) {
                      redirect('users/add_att6/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 9) {
                      redirect('users/add_att7/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 10) {
                      redirect('users/add_att8/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 11) {
                      redirect('users/add_att9/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 12) {
                      redirect('users/finish/'.$id_number);

                   }elseif ($data['customers']['work_flow'] == 13) {
                      redirect('users/teaching');

                   }
                        //redirect('users/teaching');
                      }


 

                   } 
                   
          }

    }




     function finish(){
  
           $data['id'] = $this->uri->segment(3,0);
            $id6 = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 

                        $id5= $this->user_model->max_emp_candidate();
                        $id55= $this->user_model->max_emp_candidate101();
                        

                         $data['customers'] = $this->user_model->get_emp_candidate( $id5);
                          $data['customers101'] = $this->user_model->get_id_insert_id_number1515( $id6);
                         

                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/finish', $data);
                      $this->load->view('templateo/footer');
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                              $enc_password = md5($this->input->post('password'));
                              $this->user_model->register($enc_password,$post_image);
      
            redirect('users/dashbord_analyses');
          }

      
    }

      function sory(){
  
          
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 

                        $id5= $this->user_model->max_emp_candidate();

                         $data['customers'] = $this->user_model->get_emp_candidate( $id5);

                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/sory', $data);
                      $this->load->view('templateo/footer');
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                              $enc_password = md5($this->input->post('password'));
                              $this->user_model->register($enc_password,$post_image);
      
            redirect('users/dashbord_analyses');
          }

      
    }



      function finish_end(){
  
          
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 

                        $id5= $this->user_model->max_emp_candidate();

                         $data['customers'] = $this->user_model->get_emp_candidate( $id5);

                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/finish_end', $data);
                      $this->load->view('templateo/footer');
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                              $enc_password = md5($this->input->post('password'));
                              $this->user_model->register($enc_password,$post_image);
      
            redirect('users/dashbord_analyses');
          }

      
    }



      function no_reg(){
  
          
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 

                       

                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/no_reg', $data);
                    
                } else {
                           
      
            redirect('users/dashbord_analyses');
          }

      
    }


     function cant_add(){
  
          
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 

                       

                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/cant_add', $data);
                    
                } else {
                           
      
            redirect('users/dashbord_analyses');
          }

      
    }




     function teaching(){


          $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];
  
          
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 

                        

                         $data['customers'] = $this->user_model->get_emp_candidate( $id);

                      if($this->form_validation->run() === FALSE){
                     
                      $this->load->view('templateo/teaching', $data);
                      $this->load->view('templateo/footer');
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                              $enc_password = md5($this->input->post('password'));
                              $this->user_model->register($enc_password,$post_image);
      
            redirect('users/dashbord_analyses');
          }

      
    }








    function add_item(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 10){
              redirect('users/login');
            }else{
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/add_item', $data);
                      $this->load->view('templateo/footer');
                } else {

                      $this->user_model->add_item();
      
            redirect('users/items_index');
          }}
      }
    }


     function item_edit(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 10){
              redirect('users/login');
            }else{
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id']; 
                      $data['customers'] = $this->user_model->get_item_for_edit($id);
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('name', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/item_edit', $data);
                      $this->load->view('templateo/footer');
                } else {

                      $this->user_model->item_update($id);
      
            redirect('users/items_index');
          }}
      }
    }


     function add_new_order(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 10){
              redirect('users/login');
            }else{
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('Payment', 'Payment', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/add_new_order', $data);
                      $this->load->view('templateo/footer');
                } else {

          $Payment=$this->input->post('Payment');
          $user_data = array(
          'Payment' => $Payment
          
          );              
          $this->session->set_userdata($user_data);     
 
      
            redirect('users/new_order');
          }}
      }
    }


     public function add_attachment(){
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }elseif($this->session->userdata('type')!=10){
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            // $data['customers'] = $this->underwriter_model->get_customers($id);
             $data['get_attachment202'] = $this->user_model->get_attachment202($id);
             // $customers =  $data['customers'];
             $this->load->view('templateo/header');
             $this->load->view('templateo/add_attachment', $data);
             $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  

                  $this->form_validation->set_rules('Name','Name','required');
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment($post_image,$id);
                
               // $this->session->set_flashdata('Attachment_created', 'Attachment added successfully');
            }

                redirect('users/add_attachment/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }

        }

        else
        redirect('users/login');
       
     }


      public function traning(){
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }elseif($this->session->userdata('type')!=10){
            $data['id'] = $this->uri->segment(3,0);
            $id = $data['id'];  
            // $data['customers'] = $this->underwriter_model->get_customers($id);
             $data['get_attachment202'] = $this->user_model->get_attachment202($id);
             // $customers =  $data['customers'];
             $this->load->view('templateo/header');
             $this->load->view('templateo/traning', $data);
             $this->load->view('templateo/footer');
             $formSubmit = $this->input->post('submitForm');
             if( $formSubmit == 'formSaveNew' ){ 
              } elseif($formSubmit == 'formSave'){  

                  $this->form_validation->set_rules('Name','Name','required');
                  $this->form_validation->set_rules('userfile','userfile','required');
                     
                         // Upload Image
               
                         
                         if ($this->input->server('REQUEST_METHOD') == 'POST')
                         {
                             $filename  = time();
                           
                             $config['file_name'] = $filename;
                             
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '20000';

                             $this->load->library('upload',$config);

                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());         
                                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                 $this->user_model->create_attachment($post_image,$id);
                
               // $this->session->set_flashdata('Attachment_created', 'Attachment added successfully');
            }

                redirect('users/add_attachment/'.$id); 


              }elseif($formSubmit == 'formSaveNew1'){
              }

        }

        else
        redirect('users/login');
       
     }




    function new_order(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 10){
              redirect('users/login');
            }else{


                      $data['get_items1'] = $this->user_model->get_items1();
                      $data['get_items2'] = $this->user_model->get_items1();
                      $data['get_items3'] = $this->user_model->get_items1();
                      $data['get_items4'] = $this->user_model->get_items1();
                      $data['get_items5'] = $this->user_model->get_items1();
                      $data['get_items6'] = $this->user_model->get_items1();
                      $data['get_items7'] = $this->user_model->get_items1();
                      $data['get_items8'] = $this->user_model->get_items1();
                      $data['get_items9'] = $this->user_model->get_items1();
                      $data['get_items10'] = $this->user_model->get_items1();
                      $data['get_items11'] = $this->user_model->get_items1();
                      $data['get_items12'] = $this->user_model->get_items1();
                      $data['get_items13'] = $this->user_model->get_items1();
                      $data['get_items14'] = $this->user_model->get_items1();
                      $data['get_items15'] = $this->user_model->get_items1();
                      $data['get_items16'] = $this->user_model->get_items1();
                      $data['get_items17'] = $this->user_model->get_items1();
                      $data['get_items18'] = $this->user_model->get_items1();
                      $data['get_items19'] = $this->user_model->get_items1();
                      $data['get_items20'] = $this->user_model->get_items1();
                      $data['get_items21'] = $this->user_model->get_items1();
                      $data['get_items22'] = $this->user_model->get_items1();
                      $data['get_items23'] = $this->user_model->get_items1();
                      $data['get_items24'] = $this->user_model->get_items1();
                      $data['get_items25'] = $this->user_model->get_items1();
                      $data['get_items26'] = $this->user_model->get_items1();
                      $data['get_items27'] = $this->user_model->get_items1();
                      $data['get_items28'] = $this->user_model->get_items1();
                      $data['get_items29'] = $this->user_model->get_items1();
                      $data['get_items30'] = $this->user_model->get_items1();
                      $data['get_items31'] = $this->user_model->get_items1();
                      $data['get_items32'] = $this->user_model->get_items1();
                      $data['get_items33'] = $this->user_model->get_items1();
                      $data['get_items34'] = $this->user_model->get_items1();
                      $data['get_items35'] = $this->user_model->get_items1();
                      $data['get_items36'] = $this->user_model->get_items1();
                      $data['get_items37'] = $this->user_model->get_items1();
                      $data['get_items38'] = $this->user_model->get_items1();
                      $data['get_items39'] = $this->user_model->get_items1();
                      $data['get_items40'] = $this->user_model->get_items1();
                      $data['get_items41'] = $this->user_model->get_items1();
                      $data['get_items42'] = $this->user_model->get_items1();
                      $data['get_items43'] = $this->user_model->get_items1();
                      $data['get_items44'] = $this->user_model->get_items1();
                      $data['get_items45'] = $this->user_model->get_items1();
                      $data['get_items46'] = $this->user_model->get_items1();
                      $data['get_items47'] = $this->user_model->get_items1();
                      $data['get_items48'] = $this->user_model->get_items1();
                      $data['get_items49'] = $this->user_model->get_items1();
                      $data['get_items50'] = $this->user_model->get_items1();

                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('titel', 'titel', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/new_order', $data);
                      $this->load->view('templateo/footer');
                } else {
///////////////////////////////////////////////////////////////
                      
                          
                          $this->user_model->add_order();

                          $name=$this->session->userdata('name');
                          $op_name="اضافة طلب شراء جديد";
                          $this->user_model->add_watch($name,$op_name);    


                          ////////////// ////////////
      
                       $id5= $this->user_model->max_tran();
                       if ($this->input->post('quantity')!="" or $this->input->post('price')!="" ) {
                         $this->user_model->add_detaies_order($id5);
                       }
                       if ($this->input->post('quantity1')!="" or $this->input->post('price1')!="" ) {
                         $this->user_model->add_detaies_order1($id5);
                       }
                       if ($this->input->post('quantity2')!="" or $this->input->post('price2')!="" ) {
                         $this->user_model->add_detaies_order2($id5);
                       }
                       if ($this->input->post('quantity3')!="" or $this->input->post('price3')!="" ) {
                         $this->user_model->add_detaies_order3($id5);
                       }
                       if ($this->input->post('quantity4')!="" or $this->input->post('price4')!="" ) {
                         $this->user_model->add_detaies_order4($id5);
                       }
                       if ($this->input->post('quantity5')!="" or $this->input->post('price5')!="" ) {
                         $this->user_model->add_detaies_order5($id5);
                       }
                       if ($this->input->post('quantity6')!="" or $this->input->post('price6')!="" ) {
                         $this->user_model->add_detaies_order6($id5);
                       }
                       if ($this->input->post('quantity7')!="" or $this->input->post('price7')!="" ) {
                         $this->user_model->add_detaies_order7($id5);
                       }
                       if ($this->input->post('quantity8')!="" or $this->input->post('price8')!="" ) {
                         $this->user_model->add_detaies_order8($id5);
                       }
                       if ($this->input->post('quantity9')!="" or $this->input->post('price9')!="" ) {
                         $this->user_model->add_detaies_order9($id5);
                       }
                       if ($this->input->post('quantity10')!="" or $this->input->post('price10')!="" ) {
                         $this->user_model->add_detaies_order10($id5);
                       }
                       if ($this->input->post('quantity11')!="" or $this->input->post('price11')!="" ) {
                         $this->user_model->add_detaies_order11($id5);
                       }
                       if ($this->input->post('quantity12')!="" or $this->input->post('price12')!="" ) {
                         $this->user_model->add_detaies_order12($id5);
                       }
                       if ($this->input->post('quantity13')!="" or $this->input->post('price13')!="" ) {
                         $this->user_model->add_detaies_order13($id5);
                       }
                       if ($this->input->post('quantity14')!="" or $this->input->post('price14')!="" ) {
                         $this->user_model->add_detaies_order14($id5);
                       }
                       if ($this->input->post('quantity15')!="" or $this->input->post('price15')!="" ) {
                         $this->user_model->add_detaies_order15($id5);
                       }
                       if ($this->input->post('quantity16')!="" or $this->input->post('price16')!="" ) {
                         $this->user_model->add_detaies_order16($id5);
                       }
                       if ($this->input->post('quantity17')!="" or $this->input->post('price17')!="" ) {
                         $this->user_model->add_detaies_order17($id5);
                       }
                       if ($this->input->post('quantity18')!="" or $this->input->post('price18')!="" ) {
                         $this->user_model->add_detaies_order18($id5);
                       }
                       if ($this->input->post('quantity19')!="" or $this->input->post('price19')!="" ) {
                         $this->user_model->add_detaies_order19($id5);
                       }
                       if ($this->input->post('quantity20')!="" or $this->input->post('price20')!="" ) {
                         $this->user_model->add_detaies_order20($id5);
                       }
                       if ($this->input->post('quantity21')!="" or $this->input->post('price21')!="" ) {
                         $this->user_model->add_detaies_order21($id5);
                       }
                       if ($this->input->post('quantity22')!="" or $this->input->post('price22')!="" ) {
                         $this->user_model->add_detaies_order22($id5);
                       }
                       if ($this->input->post('quantity23')!="" or $this->input->post('price23')!="" ) {
                         $this->user_model->add_detaies_order23($id5);
                       }
                       if ($this->input->post('quantity24')!="" or $this->input->post('price24')!="" ) {
                         $this->user_model->add_detaies_order24($id5);
                       }
                       if ($this->input->post('quantity25')!="" or $this->input->post('price25')!="" ) {
                         $this->user_model->add_detaies_order25($id5);
                       }
                       if ($this->input->post('quantity26')!="" or $this->input->post('price26')!="" ) {
                         $this->user_model->add_detaies_order26($id5);
                       }
                       if ($this->input->post('quantity27')!="" or $this->input->post('price27')!="" ) {
                         $this->user_model->add_detaies_order27($id5);
                       }
                       if ($this->input->post('quantity28')!="" or $this->input->post('price28')!="" ) {
                         $this->user_model->add_detaies_order28($id5);
                       }
                       if ($this->input->post('quantity29')!="" or $this->input->post('price29')!="" ) {
                         $this->user_model->add_detaies_order29($id5);
                       }
                       if ($this->input->post('quantity30')!="" or $this->input->post('price30')!="" ) {
                         $this->user_model->add_detaies_order30($id5);
                       }
                       if ($this->input->post('quantity31')!="" or $this->input->post('price31')!="" ) {
                         $this->user_model->add_detaies_order31($id5);
                       }
                       if ($this->input->post('quantity32')!="" or $this->input->post('price32')!="" ) {
                         $this->user_model->add_detaies_order32($id5);
                       }
                       if ($this->input->post('quantity33')!="" or $this->input->post('price33')!="" ) {
                         $this->user_model->add_detaies_order33($id5);
                       }
                       if ($this->input->post('quantity34')!="" or $this->input->post('price34')!="" ) {
                         $this->user_model->add_detaies_order34($id5);
                       }
                       if ($this->input->post('quantity35')!="" or $this->input->post('price35')!="" ) {
                         $this->user_model->add_detaies_order35($id5);
                       }
                       if ($this->input->post('quantity36')!="" or $this->input->post('price36')!="" ) {
                         $this->user_model->add_detaies_order36($id5);
                       }
                       if ($this->input->post('quantity37')!="" or $this->input->post('price37')!="" ) {
                         $this->user_model->add_detaies_order37($id5);
                       }
                       if ($this->input->post('quantity38')!="" or $this->input->post('price38')!="" ) {
                         $this->user_model->add_detaies_order38($id5);
                       }
                       if ($this->input->post('quantity39')!="" or $this->input->post('price39')!="" ) {
                         $this->user_model->add_detaies_order39($id5);
                       }
                       if ($this->input->post('quantity40')!="" or $this->input->post('price40')!="" ) {
                         $this->user_model->add_detaies_order40($id5);
                       }
                       if ($this->input->post('quantity41')!="" or $this->input->post('price41')!="" ) {
                         $this->user_model->add_detaies_order41($id5);
                       }
                       if ($this->input->post('quantity42')!="" or $this->input->post('price42')!="" ) {
                         $this->user_model->add_detaies_order42($id5);
                       }
                       if ($this->input->post('quantity43')!="" or $this->input->post('price43')!="" ) {
                         $this->user_model->add_detaies_order43($id5);
                       }
                       if ($this->input->post('quantity44')!="" or $this->input->post('price44')!="" ) {
                         $this->user_model->add_detaies_order44($id5);
                       }
                       if ($this->input->post('quantity45')!="" or $this->input->post('price45')!="" ) {
                         $this->user_model->add_detaies_order45($id5);
                       }
                       if ($this->input->post('quantity46')!="" or $this->input->post('price46')!="" ) {
                         $this->user_model->add_detaies_order46($id5);
                       }
                       if ($this->input->post('quantity47')!="" or $this->input->post('price47')!="" ) {
                         $this->user_model->add_detaies_order47($id5);
                       }
                       if ($this->input->post('quantity48')!="" or $this->input->post('price48')!="" ) {
                         $this->user_model->add_detaies_order48($id5);
                       }
                       if ($this->input->post('quantity49')!="" or $this->input->post('price49')!="" ) {
                         $this->user_model->add_detaies_order49($id5);
                       }
                      


      
            redirect('users/view_orders/'.$id5);
          }}
      }
    }


     function detailes_order(){
   $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') != 1){
              redirect('users/login');
            }else{
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];

                      $data['get_items1'] = $this->user_model->get_items1();
                      $data['get_items2'] = $this->user_model->get_items1();
                      $data['get_items3'] = $this->user_model->get_items1();
                      $data['get_items4'] = $this->user_model->get_items1();
                      $data['get_items5'] = $this->user_model->get_items1();
                      $data['get_items6'] = $this->user_model->get_items1();
                      $data['get_items7'] = $this->user_model->get_items1();
                      $data['get_items8'] = $this->user_model->get_items1();
                      $data['get_items9'] = $this->user_model->get_items1();
                      $data['get_items10'] = $this->user_model->get_items1();
                      $data['get_orders202'] = $this->user_model->get_orders202($id);
                      $id2=$data['get_orders202']['number_items'];

 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('item_name', 'item_name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/detailes_order', $data);
                      $this->load->view('templateo/footer');
                } else {
                      $this->user_model->add_detaies_order($id);
                      if ($id2 >1) {
                        $this->user_model->add_detaies_order1($id);   
                      }
                      if ($id2 >2) {
                        $this->user_model->add_detaies_order2($id);   
                      }
                      if ($id2 >3) {
                        $this->user_model->add_detaies_order3($id);   
                      }
                      if ($id2 >4) {
                        $this->user_model->add_detaies_order4($id);   
                      }
                      if ($id2 >5) {
                        $this->user_model->add_detaies_order5($id);   
                      }
                      if ($id2 >6) {
                        $this->user_model->add_detaies_order6($id);   
                      }
                      if ($id2 >7) {
                        $this->user_model->add_detaies_order7($id);   
                      }
                      if ($id2 >8) {
                        $this->user_model->add_detaies_order8($id);   
                      }
                      if ($id2 >9) {
                        $this->user_model->add_detaies_order9($id);   
                      }


                      
      
            redirect('users/order_list');
          }}
      }
    }



   function view_orders(){
     $id=$this->session->userdata('type');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 10){
              redirect('users/login');
            }
            else{
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];

                      $data['get_items1'] = $this->user_model->get_items1();
                       $data['get_attachment202'] = $this->user_model->get_attachment202($id);
                     
                      $data['get_orders202'] = $this->user_model->get_orders202($id);
                      $data['get_ordersdetailes_202'] = $this->user_model->get_ordersdetailes_202($id);
                      
                      $id2=$data['get_orders202']['number_items'];

 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('item_name', 'item_name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/view_orders', $data);
                      $this->load->view('templateo/footer');
                } else {
                      $this->user_model->add_detaies_order($id);
               
            redirect('users/order_list');
          }}
      }
    }



      function id_insert(){

          $data['id'] = $this->uri->segment(3,0);
          $id = $data['id'];
           $project=$this->session->userdata('project');
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
          }else{ 
            if($this->session->userdata('type') == 10){
              redirect('users/login');
            }else{
              //  $data['get_emkan'] = $this->user_model->get_emkan($id);
                 // $data['get_type_com'] = $this->user_model->get_type_com();
                 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $this->form_validation->set_rules('n3', 'n3', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/id_insert', $data);
                      $this->load->view('templateo/footer');
                } else {


                       $n3=$this->input->post('n3');

                                   $data['get_customers77all_complaints'] = $this->user_model->get_customers77all_complaints9999($n3);
                                   $rr=$data['get_customers77all_complaints']['id'];
                                  if ($rr != "") {
                                    
                                      redirect('users/data_emp_part_new_jobs10_done12/'.$n3);
                                     
                                  }else{
                                           redirect('users/data_emp_part_new_jobs1/'.$n3);
                                       
                                  }



 
                             if ($this->session->userdata('type') == 6) {
                                
                                $project=$this->session->userdata('project');


                               


                                if ($this->input->post('n1')=="الرقم الموحد") {
                                    $bb="منخفضة";
                                }elseif($this->input->post('n1')=="جهة التمويل"){
                                     $bb="متوسطة";
                                }
                                      $n11=$this->input->post('n11');
                                     
                                         


  

  

  
                                         



     
                                      if ($project == 2) {
                                        $this->alahli_modle->create_order_emkan();      
                                     }elseif ($project == 3) {
                                        $this->alrajhi_model->create_order_emkan();
                                     }elseif ($project == 4) {
                                           $this->alenma_model->create_order_emkan();
                                     }elseif ($project == 5) {
                                          $this->alriyad_model->create_order_emkan();
                                     }
                               
                             }elseif ($this->session->userdata('type') == 2) {
                                echo "saleh";
                                exit;
                                 $project=$this->session->userdata('project');
                                     if ($project == 1) {
                                          $this->user_model->create_complaints_emkan();   
                                     }elseif ($project == 2) {
                                       $this->alahli_modle->create_order_emkan225();     
                                     }elseif ($project == 3) {
                                        $this->alrajhi_model->create_order_emkan225();
                                     }elseif ($project == 4) {
                                           $this->alenma_model->create_order_emkan225();
                                     }elseif ($project == 5) {
                                          $this->alriyad_model->create_order_emkan225();
                                     }

                                
                             }
                            
                          

                           

                           
$id=$this->input->post('n3');

           
            redirect('users/order_list1_id_insert/'.$id);
          }
      }
      }
    }







     public function delete($id){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->user_model->delete_attachment($id);
        // Set message
        $this->session->set_flashdata('customers_created', 'Your attachment has been deleted');
        redirect('users/add_attachment/'.$id);
         }


       public function delete555888888($id){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->user_model->delete_attachment5555555($id);
        // Set message
        $this->session->set_flashdata('customers_created', 'Your attachment has been deleted');
        redirect('users/data_emp_part_new_jobs10_done');
         }



        public function delete_detailes_order($id){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }

         $data['get_items_selected'] = $this->user_model->get_items_selected($id);
         $id2= $data['get_items_selected']['order_id'];


        $this->user_model->delete_detailes_order($id);
        // Set message
        $this->session->set_flashdata('customers_created', 'Your attachment has been deleted');
           $name=$this->session->userdata('name');
           $op_type=$id;
           $op_name="   حذف صنف من طلب  ";
           $this->user_model->add_watch101($name,$op_name,$op_type);

        redirect('users/view_orders/'.$id2);
         }


          public function delete_detailes_id_insert($id){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }

        

        $this->user_model->delete_detailes_id_insert($id);
        // Set message
      
          

        redirect('users/id_number');
         }




          public function update_order($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->order_update_status($dd);
        
        redirect('users/order_list');
         }

           public function update_order102($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->order_update_status102($dd);
        
        redirect('users/order_list');
         }



          public function update_order101($dd){
        // Check login
        if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->user_model->order_update_status101($dd);
        
        redirect('users/order_list');
         }








      function my_profile(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $data['customers'] = $this->user_model->get_userdata_star_update();
                      $this->form_validation->set_rules('name', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/my_profile', $data);
                      $this->load->view('templateo/footer');
                } else {
                             $filename  = time();   
                             $config['file_name'] = $filename;        
                             $config['upload_path'] = './assets/imeges/posts';
                             $config['allowed_types'] = 'jpg|docx|xlsx|png|gif|pdf';
                             $config['max_size'] = '500000';
                             $this->load->library('upload',$config);
                             if(!$this->upload->do_upload('userfile')){
                                 $errors = array('error' => $this->upload->display_errors());
                                 $post_image= 'no image.pdf';
                             }else{
                                 $data = array('upload_data' => $this->upload->data());                 
                                 $type= strstr($_FILES['userfile']['name'], '.');
                                 $post_image = $filename.$type;
                             }  
                             
                              
                              $this->user_model->my_profile_update($post_image);

                              if ($this->session->userdata('type') == 4) {
                                 redirect('users/dashbord_analyses102');
                              }elseif ($this->session->userdata('type') == 1) {
                                  redirect('users/dashbord_analyses102');
                              }elseif ($this->session->userdata('type') == 2) {
                                  redirect('users/dashbord_analyses103');
                              }elseif ($this->session->userdata('type') == 3) {
                                  redirect('users/dashbord_analyses102');
                              }elseif ($this->session->userdata('type') == 4) {
                                  redirect('users/dashbord_analyses103');
                              }elseif ($this->session->userdata('type') == 5) {
                                  redirect('users/dashbord_analyses102');
                              }elseif ($this->session->userdata('type') == 6) {
                                  redirect('users/dashbord_analyses102');
                              }elseif ($this->session->userdata('type') == 7) {
                                  redirect('users/dashbord_analyses102');
                              }


                              
      
          
          }
      }
    }


    function re_password(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{ 
                      $data['title'] = 'اضافة مستخدم جديد';
                      $data['customers'] = $this->user_model->get_userdata_star_update();
                      $this->form_validation->set_rules('password', 'name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/re_password', $data);
                      $this->load->view('templateo/footer');
                } else {
                              $password =MD5($this->input->post('password'));
                              
                              $this->user_model->my_password_update($password);
      
            redirect('users/logout');
          }
      }
    }


    function edit_order(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];

                      $data['get_items1'] = $this->user_model->get_items1();
                     
                      $data['get_orders202'] = $this->user_model->get_orders202($id);
                      $data['get_ordersdetailes_202'] = $this->user_model->get_ordersdetailes_202($id);
                      
                      $id2=$data['get_orders202']['number_items'];
                      $data['title'] = 'اضافة مستخدم جديد';
                       
                      $this->form_validation->set_rules('tragit_day', 'tragit_day', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/edit_order', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                             
                              
                              $this->user_model->my_targit_update($id);
      
            redirect('users/user_edit_targit');
          }
      }
    }


        function edite_user(){
            
                             
                             
                              
                              $this->user_model->my_user_update();
      
            redirect('users/users_index');
           
      
    }


     

    function targit_edit(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];
                     
                      $data['title'] = 'اضافة مستخدم جديد';
                      $data['customers'] = $this->user_model->get_userdata_star_targit($id);
                      $this->form_validation->set_rules('tragit_day', 'tragit_day', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/targit_edit', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                             
                              
                              $this->user_model->my_targit_update($id);
      
            redirect('users/user_edit_targit');
          }
      }
    }

      function order_edit(){
          if(!$this ->session->userdata('logged_in')){
            redirect('users/login');
                   }else{
 
                      $data['id'] = $this->uri->segment(3,0);
                      $id = $data['id'];  
                      $data['title'] = 'اضافة مستخدم جديد';
                      $data['get_items101'] = $this->user_model->get_items101();
                      $data['get_items_selected'] = $this->user_model->get_items_selected($id);
                      $id2= $data['get_items_selected']['order_id'];

                      $data['customers'] = $this->user_model->get_userdata_star_targit($id);
                      $this->form_validation->set_rules('item_name', 'item_name', 'required'); 
                      if($this->form_validation->run() === FALSE){
                      $this->load->view('templateo/header');
                      $this->load->view('templateo/order_edit', $data);
                      $this->load->view('templateo/footer');
                } else {
                             
                             
                              
                              $this->user_model->my_items_update($id);


                          $name=$this->session->userdata('name');
                          $op_type=$id;
                          $op_name="تعديل على الطلب";
                          $this->user_model->add_watch101($name,$op_name,$op_type);  

      
            redirect('users/view_orders/'.$id2);
          }
      }
    }


    public function logout(){
      // Unset user data
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');
       
      // Set message
      $this->session->set_flashdata('user_loggedout', 'You are now logged out');
      $name=$this->session->userdata('name');
      $id=$this->session->userdata('user_id2');
      $op_name="خروج من النظام";
       $this->user_model->user_update_conect_out($id);
      $this->user_model->add_watch($name,$op_name);    

      redirect('users/login');
    }









      public function login() {
    $data['title'] = 'شاشة الدخول';
    
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    
    if($this->form_validation->run() === FALSE) {    
        $this->load->view('templateo/login_page', $data);   
    } else {
        $username = $this->input->post('username');
        $password = MD5($this->input->post('password'));
        
        // Check login credentials
        $login_result = $this->user_model->login($username, $password);
        
        if(!$login_result) {
            // Login failed
            $this->session->set_flashdata('login_failed', 'اسم المستخدم أو كلمة المرور غير صحيحة');
            redirect('users/login');
            return;
        }
        
        // Get user data - pass the username (which is actually the ID)
        $user_data = $this->user_model->getmydata_by_username($username);
        
        if(!$user_data) {
            $this->session->set_flashdata('login_failed', 'بيانات المستخدم غير موجودة');
            redirect('users/login');
            return;
        }
        
        // Get user info
        $type = $user_data['type'];
        $name = $user_data['name'];
        $username_from_db = $user_data['username']; // This is 2803
        $db_id = $user_data['id']; // This is 79 (not used)
        $department = $user_data['department'] ?? '';
        
        // Determine role based on type
        $role = 'manager'; // Default role
        if ($type == 1 || $type == 20) {
            $role = 'ceo';
        } elseif ($type == 3 || $type == 7) {
            $role = 'recruitment_manager';
        }
        
        // Create session data - USE USERNAME AS USER_ID!
        $session_data = array(
            'user_id'     => $username_from_db,  // Use username (2803) as user_id
            'user_id2'    => $db_id,             // Keep db_id (79) as user_id2
            'username'    => $username_from_db,  // This is 2803
            'name'        => $name,
            'department'  => $department,
            'type'        => $type,
            'role'        => $role,
            'logged_in'   => true
        );
        
        $this->session->set_userdata($session_data);
        
        // Update connection status
        $this->user_model->user_update_conect($db_id);
        
        // Set success message
        $this->session->set_flashdata('user_loggedin', 'تم تسجيل الدخول بنجاح');
        
        // Redirect based on user type
        if($type == 1) { // CEO
            redirect('dashboard');
        } 
        elseif($type == 3 || $type == 6 || $type == 7) { // Recruitment managers
            redirect('dashboard');
        } 
        elseif($type == 20) { // Another CEO type
            redirect('users/dashbord_analyses106');
        } 
        elseif($type == 4 || $type == 2) { // Regular managers
            redirect('users/main');
        } 
        elseif($type == 5) { // Another type
            redirect('users/dashbord');
        } 
        else {
            // Default redirect
            redirect('dashboard');
        }
    }
}


            
	}
	?>