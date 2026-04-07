<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Job_titles_model extends CI_Model
{
    private $table = 'job_postings';

    public function get_list($q = '', $limit = 200)
    {
        $q = trim((string)$q);

        $this->db->select('id, job_title, created_at', false);
        $this->db->from($this->table);

        if ($q !== '') {
            $this->db->like('job_title', $q, 'both');
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit((int)$limit);

        return $this->db->get()->result();
    }

    public function insert(array $data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, array $data)
    {
        $this->db->where('id', (int)$id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', (int)$id);
        return $this->db->delete($this->table);
    }

    public function get_one($id)
    {
        $this->db->select('id, job_title, created_at', false);
        $this->db->from($this->table);
        $this->db->where('id', (int)$id);
        return $this->db->get()->row();
    }
}
