<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Member_Model extends CI_Model
{


    public function __construct()
    {
    // Call the CI_Model constructor
    parent::__construct();
       $this->load->database();

    }


    public function get()
    {       $this->db->select(['id','parent_id','first_name']);
            $query = $this->db->get('members');
            return $query->result_array();
    }
    public function get_where($id)
    {
        $this->db->select(['id','first_name','image','active','privacy','points','reference_link','GetParentIDByID(id)','GetAncestry(id)','GetFamilyTree(id)']);
        $query = $this->db->get_where('members',['id'=>$id]);
        return $query->result_array();
    }
    public function total_referel($child){
        $this->db->select(['id','parent_id','first_name']);
        $this->db->where_in('id',$child);
        $query = $this->db->get('members');
        return $query->result_array();

    }
    public function total_indirect_referel($id){
        $this->db->select(['GetFamilyTree(id)']);

        $this->db->where('id',$id);
        $query = $this->db->get('members');
        return $query->result_array();

    }
    public function total_direct_referel($id){
        $this->db->select(['count(id)']);

        $this->db->where('parent_id',$id);
        $query = $this->db->get('members');
        return $query->result_array();

    }

    public function get_parent_id($id){
        $this->db->select(['parent_id']);
        $this->db->where('id',$id);
        $query = $this->db->get('members');
        return $query->result_array();

    }
    public function ten_level_table($id){
              $query=  $this->db->query("SELECT
        p.id as parent_id,
        p.first_name as parent_name,
         c1.id as child_id_1,
         c1.first_name as child_name_1,
        c2.id as child_id_2,
         c2.first_name as child_name_2,
        c3.id as child_id_3,
         c3.first_name as child_name_3,
        c4.id as child_id_4,
         c4.first_name as child_name_4,
        c5.id as child_id_5,
         c5.first_name as child_name_5,
        c6.id as child_id_6,
         c6.first_name as child_name_6,
        c7.id as child_id_7,
         c7.first_name as child_name_7,
        c8.id as child_id_8,
         c8.first_name as child_name_8,
        c9.id as child_id_9,
         c9.first_name as child_name_9,
        c10.id as child_id_10,
         c10.first_name as child_name_10
        FROM members p
        LEFT JOIN members c1
        ON c1.parent_id = p.id
        LEFT JOIN members c2
            ON c2.parent_id = c1.id
        LEFT JOIN members c3
            ON c3.parent_id = c2.id
        LEFT JOIN members c4
            ON c4.parent_id = c3.id
        LEFT JOIN members c5
            ON c5.parent_id = c4.id
        LEFT JOIN members c6
            ON c6.parent_id = c5.id
        LEFT JOIN members c7
            ON c7.parent_id = c6.id
        LEFT JOIN members c8
            ON c8.parent_id = c7.id
        LEFT JOIN members c9
            ON c9.parent_id = c8.id
        LEFT JOIN members c10
            ON c10.parent_id = c9.id
        WHERE p.id=$id" );

        return $query->result_array();

    }

    public function get_parent_hierarchy($id){
        $this->db->select(['GetAncestry(id)']);
        $query = $this->db->get_where('members',['id'=>$id]);
        return $query->result_array();

    }
    public function update_points_parent_hierarchy($ids,$points){

          $this->db->query("update members set points =points+$points where id in($ids)");


    }
    public function get_points($id){
        $this->db->select(['points']);
        $query = $this->db->get_where('members',['id'=>$id]);
        return $query->result_array();
    }
    public function members_insert_detail($data=array()){


        $query =  $this->db->insert('members', $data);
        return $query->update_batch();
    }
    public function update_members_profile($id,$data=array()){


        $this->db->where('id', $id);
        $this->db->update('members', $data);

    }
    public function debit_points($id,$points){

        $this->db->query("update members set points = points-$points where id=$id");

    }
    public function update_reference_link($id,$reference_link){
        $this->db->set('reference_link', $reference_link);
        $this->db->where('id', $id);
        $this->db->update('members');

    }
    public function get_email($id)
    {   $this->db->select(['email']);
        $query = $this->db->get_where('members',['id'=>$id]);
        return $query->result_array();
    }
    public function get_id($email)
    {   $this->db->select(['id']);
        $query = $this->db->get_where('members',['email'=>$email]);
        return $query->result_array();
    }
    public function search_friends($key1,$key2)
    {  $query= $this->db->query("SELECT `first_name`,`last_name`,`id` from `members` where `first_name` LIKE $key1 OR last_name Like $key2");
        return $query->result_array();
    }
    public function search_friend($key1,$key2,$start,$limit,$user_id)
    {
//        $query= $this->db->query("SELECT `first_name`,`last_name`,`id`,`image` from `members` where first_name LIKE $key1 OR last_name Like $key2 Limit $start,$limit");
        $query= $this->db->query("SELECT members.first_name,members.last_name,members.id,members.image, friends.status,friends.friend_one from members LEFT join friends on friends.friend_one=$user_id and friends.friend_two=members.id  or friends.friend_one=members.id and friends.friend_two=$user_id  WHERE members.first_name LIKE $key1 AND members.last_name  LIKE $key2 Group by members.id Limit $start,$limit");
        return $query->result_array();
    }
    public function count_search_friend($key1,$key2)
    {  $query= $this->db->query("SELECT count(id) from `members` where first_name LIKE $key1 OR last_name Like $key2");
        return $query->num_rows();
    }
    public function friend_requests($data)
    {  $this->db->insert('friends',$data);
        return $this->db->insert_id();
    }
    public function friend_list($user_id)
    {$query= $this->db->query("SELECT F.status,M.id, M.first_name,M.last_name,M.image
                            FROM members M, friends F WHERE CASE
                            WHEN F.friend_one = '$user_id'
                            THEN F.friend_two = M.id
                            WHEN F.friend_two= '$user_id'
                            THEN F.friend_one= M.id
                            END
                            AND
                            F.status='2'");
        return $query->result_array();
    }
    public function friend_request_recieved($user_id)
    {$query= $this->db->query("SELECT F.status,M.id, M.first_name,M.last_name,M.image
                            FROM members M, friends F WHERE CASE
                            WHEN F.friend_two= '$user_id'
                            THEN F.friend_one= M.id
                            END
                            AND
                            F.status='1'");
        return $query->result_array();
    }

    public function acceptfriendrequest($friend_id,$user_id){

       $this->db->query("update friends set status=2 where friend_one=$friend_id and friend_two = $user_id LIMIT 1");
    }
    public function deletefriendrequest($friend_id,$user_id){
        $this->db->query("delete from friends where friend_one=$friend_id and friend_two = $user_id LIMIT 1");
    }
   public function deletefriend($friend_id,$user_id){
        $this->db->query("delete from friends where friend_one=$friend_id and friend_two= $user_id or friend_one = $user_id and friend_two=$friend_id and status=2 LIMIT 1 ");
    }



}