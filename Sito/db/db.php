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

    /******************************************************************************************************************************/
    /* Login */

    public function checkOrganizzatore($email, $password){
        if($this->controllaSeEsisteMail($email) == 1){
            $hashed_password = $this->ottieniPasswordByEmail($email);
            if(password_verify($password, $hashed_password)){
                return "OK";
            }
        }
        return "NOT OK";
    }
    
    public function checkAmministratore($email, $password){
        if($this->controllaSeEsisteMail($email) == 1){
            $hashed_password = $this->ottieniPasswordByEmail($email);
            if(password_verify($password, $hashed_password)){
                return "OK";
            }
        }
        return "NOT OK";
    }

    public function checkUtente($email, $password){
        if($this->controllaSeEsisteMail($email) == 1){
            $hashed_password = $this->ottieniPasswordByEmail($email);
            if(password_verify($password, $hashed_password)){
                return "OK";
            }
        }
        return "NOT OK";
    }

    public function controllaSeEsisteMail($email){
        $query =   "SELECT IDAmministratore as ID
                    FROM AMMINISTRATORE
                    WHERE Email = ?
                    UNION
                    SELECT IDOrganizzatore as ID
                    FROM ORGANIZZATORE
                    WHERE Email = ?
                    UNION
                    SELECT IDUtente as ID
                    FROM UTENTE
                    WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $email, $email, $email);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0 ? 1 : 0;
    }

    public function ottieniPasswordByEmail($email){
        $query = "SELECT Password
                  FROM AMMINISTRATORE
                  WHERE Email = ?
                  UNION
                  SELECT Password
                  FROM ORGANIZZATORE
                  WHERE Email = ?
                  UNION
                  SELECT Password
                  FROM UTENTE
                  WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $email, $email, $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0]["Password"];
    }

    /******************************************************************************************************************************/
    /* Registrazione */

    public function inserisciNuovoUtente($email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO UTENTE(Email, Sesso, Password, Nome, Cognome, DataNascita, Indirizzo, CAP, Citta)
                  VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssssss', $email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function inserisciNuovoOrganizzatore($email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $iban){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO ORGANIZZATORE(Email, Sesso, Password, Nome, Cognome, DataNascita, Indirizzo, CAP, Citta, IBAN, ValutatoSN, AutorizzatoSN)
                  VALUES (?,?,?,?,?,?,?,?,?,?,'n','n')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssssss', $email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $iban);
        $stmt->execute();
        return $stmt->insert_id;
    }

    /********************************************************************************************************************** */
    /* Notifiche */

    public function ottieniNotificheVisteByIDPersona($idPersona){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica, 
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore, 
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica	
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE (NOTIFICA_PERSONALE.IDOrganizzatore = ? OR
                                           NOTIFICA_PERSONALE.IDUtente = ? OR
                                           NOTIFICA_PERSONALE.IDAmministratore = ?)
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 's'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('iii', $idPersona, $idPersona, $idPersona);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniNotificheNonVisteByIDPersona($idPersona){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica, 
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica	
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE (NOTIFICA_PERSONALE.IDOrganizzatore = ? OR
                                           NOTIFICA_PERSONALE.IDUtente = ? OR
                                           NOTIFICA_PERSONALE.IDAmministratore = ?)
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 'n'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('iii', $idPersona, $idPersona, $idPersona);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function segnaNotificaPersonaComeVisualizzata($idNotificaPersonale){
        $query = "UPDATE NOTIFICA_PERSONALE
                  SET VisualizzataSN = 's'
                  WHERE IDNotificaPersonale = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idNotificaPersonale);
        $stmt->execute();
    }

    public function inserisciNotificaAmministratore($titolo, $testo, $idAmministratore){
        $query = "INSERT INTO NOTIFICA(TitoloNotifica, TestoNotifica, IDAmministratore)
                  VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        /*var_dump(date("Y-m-d h:i:sa"));*/
        $stmt->bind_param('sss', $titolo, $testo, $idAmministratore);
        $stmt->execute();
        var_dump($stmt->insert_id);
        return $stmt->insert_id;
    }
    
    public function inserisciNotificaOrganizzatore($titolo, $testo, $idOrganizzatore, $idEvento){
        $query = "INSERT INTO NOTIFICA(TitoloNotifica, TestoNotifica, IDOrganizzatore, IDEvento)
                  VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $titolo, $testo, $idOrganizzatore, $idEvento);
        $stmt->execute();
        var_dump($stmt->insert_id);
        return $stmt->insert_id;
    }
    
    public function ottieniIDPersona($email){
        $query = "SELECT IDAmministratore as ID
                  FROM AMMINISTRATORE
                  WHERE Email = ?
                  UNION
                  SELECT IDOrganizzatore as ID
                  FROM ORGANIZZATORE
                  WHERE Email = ?
                  UNION
                  SELECT IDUtente as ID
                  FROM UTENTE
                  WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $email,$email,$email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0]["ID"];
    }

    public function ottieniUtenti(){
        $query = "SELECT IDUtente
                  FROM UTENTE";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function ottieniOrganizzatori(){
        $query = "SELECT IDOrganizzatore
                  FROM ORGANIZZATORE";       
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function ottieniUtentiChePartecipanoAdUnEvento($IDEvento){
        $query = "SELECT UTENTE.IDUtente
                  FROM EVENTO INNER JOIN COMPRENDE ON Evento.IDEvento = COMPRENDE.IDEvento
                              INNER JOIN ORDINE ON COMPRENDE.IDOrdine = ORDINE.IDOrdine
                              INNER JOIN UTENTE ON ORDINE.Utente = UTENTE.IDUtente
                  WHERE EVENTO.IDEvento = ?";       
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $IDEvento);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function pubblicaNotificaATuttiGliUtenti($IDNotifica){
        $utenti = $this->ottieniUtenti();
        foreach ($utenti as $utente){
            $this->pubblicaNotificaAdUtente($utente["IDUtente"], $IDNotifica);
        }
    }
    
    public function pubblicaNotificaATuttiGliOrganizzatori($IDNotifica){
        $organizzatori = $this->ottieniOrganizzatori();
        foreach ($organizzatori as $organizzatore){
            $this->pubblicaNotificaAdOrganizzatore($organizzatore["IDOrganizzatore"], $IDNotifica);
        }
    }

    public function pubblicaNotificaAdUtente($IDUtente, $IDNotifica){
        $query = "INSERT INTO NOTIFICA_PERSONALE(IDUtente, IDNotifica, VisualizzataSN)
                  VALUES (?,?,'n')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $IDUtente, $IDNotifica);
        $stmt->execute();
    }   

    public function pubblicaNotificaAdOrganizzatore($IDNotifica, $IDOrganizzatore){
        $query = "INSERT INTO NOTIFICA_PERSONALE(IDOrganizzatore, IDNotifica, VisualizzataSN)
                  VALUES (?,?,'n')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $IDOrganizzatore, $IDNotifica);
        $stmt->execute();
    }

    public function pubblicaNotificaATuttiGliUtentiDiUnEvento($IDNotifica, $IDEvento){
        $utenti = $this->ottieniUtentiChePartecipanoAdUnEvento($IDEvento);
        foreach ($utenti as $utente){
            $this->pubblicaNotificaAdUtente($utente["IDUtente"], $IDNotifica);
        }
    }

    /********************************************************************************************************************** */

    public function ottieniInformazioniDiUnEvento($IDEvento){
        $query = "SELECT *
                  FROM EVENTO
                  WHERE IDOrganizzatore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function inserisciNotificaInNoteDiUnEvento($titolo, $testo, $IDEvento){
        $notaBase = $this->db->ottieniInformazioniDiUnEvento($IDEvento)[0]["NoteEvento"];
        $aggiunta = $titolo."(".date("Y-m-d h:i:sa").")\n".$testo;
        $finale = $notaBase."\n\n".$aggiunta;
        $query = "UPDATE EVENTO
                  SET NoteEvento = ?
                  WHERE IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $finale, $IDEvento);
        $stmt->execute();
    }



    public function ottieniInformazioniOrganizzatore($id){
        $query = "SELECT *
                  FROM ORGANIZZATORE
                  WHERE IDOrganizzatore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function aggiornaInformazioniOrganizzatore($id, $consensoSN){
        $query = "UPDATE ORGANIZZATORE
                  SET AutorizzatoSN = ?, ValutatoSN = 's'
                  WHERE IDOrganizzatore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $consensoSN, $id);
        $stmt->execute();
    }

    public function ottieniOrganizzatoriNonValutati(){
        $stmt = $this->db->prepare("SELECT Nome, Cognome, IDOrganizzatore
                                    FROM ORGANIZZATORE
                                    WHERE ValutatoSN = 'n'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>