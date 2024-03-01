<?php


$id = $_SESSION['u_email'];

$sql = "SELECT * FROM users JOIN student_data ON student_data.u_email = users.u_email WHERE users.u_email = '$id'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) 
{
  $standard = $row['standard'];
}

   $exam_id = $_GET['exam_id'];

   $this->db->select('*');
   $this->db->from('exam_questions');
   $this->db->where('exam_id',$exam_id);
   $sql=$this->db->get();
   foreach($sql->result() as $user_data)
   {
     $subject=$user_data->subject;
   }


   $mark=0;
   for($i=1;$i<=$limit;$i++)
   {
      
      $answer='answer'.$i;
      $o_answer=$this->input->post($answer);

      $this->db->select('*');
      $this->db->from('exam_questions');
      $this->db->where('exam_id',$exam_id);
      $this->db->where('question_id',$i);
      $sql=$this->db->get();
      foreach($sql->result() as $exam_check)
      {
        if($o_answer==$exam_check->answer)
        {
          $mark++;
        }
      }
      

    }
    $my_mark=($mark*10)/$limit;

    $exam_data=array('student_id'=>$id,'mark_obtained'=>$my_mark,'exam_id'=>$exam_id,'sem'=>$s_sem,'course'=>$s_course,'subject'=>$subject);
    $this->db->insert('exam_marks',$exam_data);

    $this->session->set_flashdata('insert_success',"Sucessfully inserted");
    redirect('Student/exams','refresh');

?>