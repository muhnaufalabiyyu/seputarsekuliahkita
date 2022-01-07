<?php
class M_Artikel extends CI_Model{

	function get($where = null, $limit = null){
        if($limit != null){
            $this->db->order_by('tgl_buat', 'desc');
            $this->db->limit($limit);
            
        }
        if($where == null){
            $this->db->order_by('tgl_buat', 'desc');
            return $this->db->get('artikel');
            
        }else{
            $this->db->order_by('tgl_buat', 'desc');
            return $this->db->get_where('artikel', $where);
        }
    }

    function up($data, $id){
        $this->db->update('artikel', $data, ['id' => $id]);
        if($this->db->affected_rows() == 0){
            return $this->db->error();
        }
        else {
            return $this->db->affected_rows();
        }
    }

    function add($data){
        $this->db->insert('artikel', $data);
    }

    function delete($id){
        $this->db->delete('artikel', $id);
    }
}
?>