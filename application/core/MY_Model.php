<?php
 /**
  *
  */
class MY_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public $table;

    public $fillable = [];

    public $rules = [];

    public function save($data, $id = null)
    {
        return ($id)
            ? $this->db->update($this->table, $data, ['id' => $id])
            : $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, ['id' => $id], 1)->row();
    }

    public function get($limit = null, $offset = null)
    {
        return $this->db->get($this->table, $limit, $offset);
    }
}
