<?php
class find_most extends Database
{
    private $_bdd;
    private $_most_notes;
    private $_most_recent;

    public function __construct()
    {
        $toto = new Database();
        if (($toto->try_connection()) != FALSE)
            $this->_bdd =  $toto->try_connection();
        else
            $this->_bdd=FALSE;
        $this->_most_notes = $this->search_notes();
        $this->_most_recent = $this->search_recent();
    }

    public function search_notes()
    {
		$sql = "SELECT A.moyenne, A.id_recipe FROM (SELECT AVG(B.note) AS moyenne, B.id_recipe FROM notes B GROUP BY B.id_recipe) A ORDER BY A.moyenne LIMIT 8";
		$id_recipe = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		return $this->organize_recipe($id_recipe);
	}

    public function search_recent()
    {
        $sql = "SELECT id_recette as id_recipe FROM recipe ORDER BY date_create DESC LIMIT 8";
        $id_recipe = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		return $this->organize_recipe($id_recipe);
	}

    public function organize_recipe($tab)
    {
        $result=array();
        for ($i=0; $i<sizeof($tab); $i++)
        {
            $tmp = $tab[$i];
            $sql = "SELECT A.name_recette, A.picture, A.id_recette, B.pseudo FROM recipe A, creator B WHERE A.id_recette='".$tmp['id_recipe']."' AND A.id_creator=B.id_creator";
            $tmp2 = $this->_bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$result[$i] = $tmp2[0];
			if (isset($tmp['moyenne']))
                $result[$i]['moyenne'] = $tmp['moyenne'];
		}
        return $result;
    }

    public function show_notes()
    {
        if ($this->_bdd == FALSE)
            return FALSE;
        else
            return $this->_most_notes;
    }

    public function show_recent()
    {
        if ($this->_bdd == FALSE)
            return FALSE;
        else
            return $this->_most_recent;
    }
}
?>