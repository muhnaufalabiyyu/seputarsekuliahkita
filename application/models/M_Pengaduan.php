<?php
class M_Pengaduan extends CI_Model{

	function get($where = null, $limit = null){
        if($limit != null){
            $this->db->order_by('tgl_buat', 'desc');
            $this->db->limit($limit);
        }
        if($where == null){
            $this->db->order_by('tgl_buat', 'desc');
            return $this->db->get('pengaduan');
        }else{
            $this->db->order_by('tgl_buat', 'desc');
            return $this->db->get_where('pengaduan', $where);
        }
    }

    function up($data, $id){
        $this->db->update('pengaduan', $data, ['id' => $id]);
        if($this->db->affected_rows() == 0){
            return $this->db->error();
        }
        else {
            return $this->db->affected_rows();
        }
    }

    function add($data){
        $this->db->insert('pengaduan', $data);
    }

    function delete($id){
        $this->db->delete('pengaduan', $id);
    }
}
?>