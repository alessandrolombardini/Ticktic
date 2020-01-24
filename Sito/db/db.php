<?php
    class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getCategories(){
        $stmt = $this->db->prepare("SELECT * FROM CATEGORIA");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArtisti(){
        $stmt = $this->db->prepare("SELECT * FROM ARTISTA");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEvent($id){
        $stmt = $this->db->prepare("SELECT * FROM EVENTO WHERE IDEvento = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result[0];
    }

    public function getArtistsFromEvent($id){
        $stmt = $this->db->prepare("SELECT * FROM ARTISTA, ESEGUE WHERE IDArtista = IDArtista AND IDEvento = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertEvent($anteprima, $luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore){
        $query = "INSERT INTO EVENTO(Anteprima, Luogo, NumeroPosti, PrezzoBiglietto, ImmagineEvento, DataEvento, NoteEvento, DescrizioneEvento, NomeEvento, IDCategoria, IDOrganizzatore)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssidsssssii',$anteprima, $luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function insertArtistiOnEvent($IDArtista, $IDEvento){
        $queryartista = "INSERT INTO ESEGUE (IDEvento, IDArtista) VALUES (?,?)";
        $stmt = $this->db->prepare($queryartista);
        $stmt->bind_param('ii', $IDEvento, $IDAartista);
        $stmt->execute();

        return $stmt->insert_id;
    }
}
?>