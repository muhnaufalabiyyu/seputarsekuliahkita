<?php
class M_Pengaturan extends CI_Model{

	function get($where = null, $limit = null){
        if($limit != null){
            $this->db->limit($limit);
        }
        if($where == null){
            return $this->db->get('pengaturan');
        }else{
            return $this->db->get_where('pengaturan', $where);
        }
    }

    function up($data, $id){
        $this->db->update('pengaturan', $data, ['id' => $id]);
        if($this->db->affected_rows() == 0){
            return $this->db->error();
        }
        else {
            return $this->db->affected_rows();
        }
    }

    function add($data){
        $this->db->insert('pengaturan', $data);
    }

    function delete($id){
        $this->db->delete('pengaturan', $id);
    }
}
?>