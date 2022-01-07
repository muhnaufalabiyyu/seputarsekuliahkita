<?php
class M_Event extends CI_Model{

	function get($where = null, $limit = null){
        if($limit != null){
            $this->db->order_by('tgl_buat', 'desc');
            $this->db->limit($limit);
            
        }
        if($where == null){
            $this->db->order_by('tgl_buat', 'desc');
            return $this->db->get('event');
        }else{
            $this->db->order_by('tgl_buat', 'desc');
            return $this->db->get_where('event', $where);
        }
    }

    function up($data, $id){
        $this->db->update('event', $data, ['id' => $id]);
        if($this->db->affected_rows() == 0){
            return $this->db->error();
        }
        else {
            return $this->db->affected_rows();
        }
    }

    function add($data){
        $this->db->insert('event', $data);
    }

    function delete($id){
        $this->db->delete('event', $id);
    }
}
?>