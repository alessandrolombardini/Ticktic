<?php
    class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $this->db->set_charset("utf8");
    }

    /******************************************************************************************************************************/
    /* Inserimento e Modifica Evento */
    public function getCategories(){
        $stmt = $this->db->prepare("SELECT * FROM CATEGORIA WHERE AutorizzataSN = 's' AND ValutataSN = 's'");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArtisti(){
        $stmt = $this->db->prepare("SELECT * FROM ARTISTA WHERE ValutatoSN = 's' AND AutorizzatoSN = 's'");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEvent($id){
        $stmt = $this->db->prepare("SELECT * FROM EVENTO WHERE IDEvento = ? AND EliminatoSN = ?");
        $eliminato = 'n';
        $stmt->bind_param('is', $id, $eliminato);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result[0];
    }

    public function getArtistsFromEvent($id){
        $stmt = $this->db->prepare("SELECT *
                                    FROM ESEGUE INNER JOIN ARTISTA ON ESEGUE.IDArtista = ARTISTA.IDArtista
                                    WHERE IDEvento = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertEvent($luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore){
        $query = "INSERT INTO EVENTO(Luogo, NumeroPosti, PrezzoBiglietto, ImmagineEvento, DataEvento, NoteEvento, DescrizioneEvento, NomeEvento, IDCategoria, IDOrganizzatore)
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sidsssssii', $luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function insertArtistiOnEvent($IDArtista, $IDEvento){
        $query= "INSERT INTO ESEGUE(IDArtista, IDEvento) VALUES (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $IDArtista, $IDEvento);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function deleteArtistiOnEvent($IDEvento){
        $queryartista = "DELETE FROM ESEGUE WHERE IDEvento = ?";
        $stmt = $this->db->prepare($queryartista);
        $stmt->bind_param('i', $IDEvento);
        $stmt->execute();  
    }

    public function insertArtistaNonValutato($pseudominoArtista, $descrizione, $immagine){
        $query = "INSERT INTO ARTISTA (PseudonimoArtista, Descrizione, ImmagineArtista, ValutatoSN, AutorizzatoSN) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $valutato = 'n';
        $stmt->bind_param('sssss', $pseudominoArtista, $descrizione, $immagine, $valutato, $valutato);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->insert_id;
    }

    public function updateEvent($luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore, $IDEvento){
        $query = "UPDATE EVENTO
                  SET Luogo = ?, NumeroPosti = ?, PrezzoBiglietto = ?, ImmagineEvento = ?,
                  DataEvento = ?, NoteEvento = ?, DescrizioneEvento = ?, NomeEvento = ?, IDCategoria = ?, IDOrganizzatore = ?
                  WHERE IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sidsssssiii', $luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore, $IDEvento);
        $stmt->execute();
    }

    /**************************************************************************************************************************** */
    /* Gestione categorie */
    public function insertCategoria($nome, $img){
        $query = "INSERT INTO CATEGORIA (NomeCategoria, ValutataSN, AutorizzataSN, ImmagineCategoria) VALUES (?,?,?,?)";
        $valutato = 's';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $nome, $valutato, $valutato, $img);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->insert_id;
    }

    public function insertCategoriaNonValutata($nome){
        $query = "INSERT INTO CATEGORIA (NomeCategoria, ValutataSN, AutorizzataSN) VALUES (?,?,?)";
        $valutato = 'n';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $nome, $valutato, $valutato);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->insert_id;
    }

    public function deleteCategoria($id){
        $query = "DELETE FROM CATEGORIA WHERE IDCategoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function getCategoria ($id){
        $stmt = $this->db->prepare("SELECT *
                                    FROM CATEGORIA
                                    WHERE IDCategoria = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();;
    }

    public function aggiornaInformazioniCategoria($id, $consensoSN){
        $query = "UPDATE CATEGORIA
                  SET AutorizzataSN = ?, ValutataSN = 's'
                  WHERE IDCategoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $consensoSN, $id);
        $stmt->execute();
    }

    public function pubblicaCategoriaConsigliata($id, $nome, $img){
        $query = "UPDATE CATEGORIA
                  SET AutorizzataSN = 's', ValutataSN = 's', ImmagineCategoria = ?
                  WHERE IDCategoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $img, $id);
        $stmt->execute();
    }
    /******************************************************************************************************************************/
    /* Carrello */

    public function getEventiCheDesideraAcquistare ($IDUtente){
        $stmt = $this->db->prepare("SELECT *
                                    FROM DESIDERA_ACQUISTARE INNER JOIN EVENTO ON DESIDERA_ACQUISTARE.IDEvento = EVENTO.IDEvento
                                    WHERE IDUtente = ?");
        $stmt->bind_param('i', $IDUtente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUtente($IDUtente){
        $stmt = $this->db->prepare("SELECT *
                                    FROM UTENTE
                                    WHERE IDUtente = ?");
        $stmt->bind_param('i', $IDUtente);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0];
    }

    public function updateBigliettiVenduti($IDEvento, $numerobiglietti){
        $query = "UPDATE EVENTO
                  SET BigliettiVenduti = ?
                  WHERE IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $numerobiglietti, $IDEvento);
        $stmt->execute();
    }

    public function insertOrdine($data, $IDUtente, $TotaleSpesa){
        $query = "INSERT INTO ORDINE (DataOrdine, IDUtente, TotaleSpesa) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sid', $data, $IDUtente, $TotaleSpesa);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->insert_id;
    }

    public function insertEventiOnOrdine($IDOrdine, $IDEvento, $numberobiglietti){
        $query = "INSERT INTO COMPRENDE (IDOrdine, IDEvento, NumeroBiglietti) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $IDOrdine, $IDEvento, $numberobiglietti);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->insert_id;
    }

    public function resetCarrello($IDUtente){
        $query = "DELETE FROM DESIDERA_ACQUISTARE WHERE IDUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $IDUtente);
        $stmt->execute();
    }

    public function aggiungiACarrelloEvento($IDEvento, $bigliettiDaAggiungere, $IDUtente){
        $result = $this->verificaPresenzaEventoInCarrelloDiUtente($IDEvento, $IDUtente);
        if($result->num_rows > 0){
            $numeroPrecedenteDiBiglietti = $result->fetch_assoc()["NumeroBiglietti"];
            $this->aggiungiBigliettiAdEventoInCarrello($IDEvento, $IDUtente, $numeroPrecedenteDiBiglietti, $bigliettiDaAggiungere);
        } else {
            $query = "INSERT INTO DESIDERA_ACQUISTARE(IDEvento, NumeroBiglietti, IDUtente)
                      VALUES (?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sss', $IDEvento, $bigliettiDaAggiungere, $IDUtente);
            $stmt->execute();
            return $stmt->insert_id;
        }
    }

    public function verificaPresenzaEventoInCarrelloDiUtente($IDEvento, $IDUtente){
        $query = "SELECT *
                  FROM DESIDERA_ACQUISTARE
                  WHERE IDEvento = ? AND IDUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $IDEvento, $IDUtente);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function aggiungiBigliettiAdEventoInCarrello($IDEvento, $IDUtente, $numeroPrecedenteDiBiglietti, $bigliettiDaAggiungere){
        $numeroBigliettiNuovo = $numeroPrecedenteDiBiglietti + $bigliettiDaAggiungere;
        $query = "UPDATE DESIDERA_ACQUISTARE
                  SET NumeroBiglietti = ?
                  WHERE IDEvento = ? AND IDUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $numeroBigliettiNuovo, $IDEvento, $IDUtente);
        $stmt->execute();
    }

    public function rimuoviEventoDalCarrello($IDEvento, $IDUtente){
        $query = "DELETE FROM DESIDERA_ACQUISTARE
                  WHERE IDEvento = ? AND IDUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $IDEvento, $IDUtente);
        $stmt->execute();
    }

    /******************************************************************************************************************************/
    /* Ordini */

    public function getOrdiniDiUtente($IDUtente){
        $query = "SELECT *
                  FROM ORDINE
                  WHERE IDUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $IDUtente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventiDiOrdine($IDOrdine){
        $query = "SELECT *
                  FROM COMPRENDE INNER JOIN EVENTO ON COMPRENDE.IDEvento = EVENTO.IDEvento
                  WHERE IDOrdine = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $IDOrdine);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /******************************************************************************************************************************/
    /* Prossimi Eventi Organizzatore */

    public function getEventiAttiviDiOrganizzatore($IDOrganizzatore){
        $query = "SELECT *
                  FROM EVENTO 
                  WHERE IDOrganizzatore = ? AND EliminatoSN = ?";
        $eliminato = 'n';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $IDOrganizzatore, $eliminato);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteEvent($IDEvento){
        $query = "UPDATE EVENTO
                  SET EliminatoSN = ?
                  WHERE IDEvento = ?";
        $eliminato = 's';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $eliminato, $IDEvento);
        $stmt->execute();
    }

    /******************************************************************************************************************************/
    /* Prossimi eventi utente */
    public function getEventiDiUtente($IDUtente){
        $query = "SELECT *
                  FROM UTENTE inner join ORDINE ON UTENTE.IDUtente = ORDINE.IDUtente
                              inner join COMPRENDE on ORDINE.IDOrdine = COMPRENDE.IDOrdine
                              inner join EVENTO on COMPRENDE.IDevento = EVENTO.IDEvento
                  WHERE UTENTE.IDUtente = ? AND EVENTO.EliminatoSN = 'n'";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $IDUtente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /******************************************************************************************************************************/
    /* Login */
    public function checkAmministratore($email, $password){
        if($this->controllaSeEsisteMailAmministratore($email) == 1){
            $hashed_password = $this->ottieniPasswordByEmailAmministratore($email);
            if(password_verify($password, $hashed_password)){
                return "OK";
            }
        }
        return "NOT OK";
    }

    public function checkOrganizzatore($email, $password){
        if($this->controllaSeEsisteMailOrganizzatore($email) == 1){
            $hashed_password = $this->ottieniPasswordByEmailOrganizzatore($email);
            if(password_verify($password, $hashed_password)){
                return "OK";
            }
        }
        return "NOT OK";
    }

    public function checkUtente($email, $password){
        if($this->controllaSeEsisteMailUtente($email) == 1){
            $hashed_password = $this->ottieniPasswordByEmailUtente($email);
            if(password_verify($password, $hashed_password)){
                return "OK";
            }
        }
        return "NOT OK";
    }

    public function controllaSeEsisteMailAmministratore($email){
        $query =   "SELECT IDAmministratore as ID
                    FROM AMMINISTRATORE
                    WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0 ? 1 : 0;
    }

    public function controllaSeEsisteMailOrganizzatore($email){
        $query =   "SELECT IDOrganizzatore as ID
                    FROM ORGANIZZATORE
                    WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0 ? 1 : 0;
    }

    public function controllaSeEsisteMailUtente($email){
        $query =   "SELECT IDUtente as ID
                    FROM UTENTE
                    WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0 ? 1 : 0;
    }

    public function ottieniPasswordByEmailAmministratore($email){
        $query = "SELECT Password
                  FROM AMMINISTRATORE
                  WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result["Password"];
    }


    public function ottieniPasswordByEmailOrganizzatore($email){
        $query = "SELECT Password
                  FROM ORGANIZZATORE
                  WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result["Password"];
    }

    public function ottieniPasswordByEmailUtente($email){
        $query = "SELECT Password
                  FROM UTENTE
                  WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result["Password"];
    }

    /******************************************************************************************************************************/
    /* Moodifica Informazioni Account*/

    public function updateUtente($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $IDUtente){
        $query = "UPDATE UTENTE
                  SET Email = ?, Sesso = ?, Nome = ?, Cognome = ?, DataNascita = ?, Indirizzo = ?, CAP = ?, Citta = ?
                  WHERE IDUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssssi', $email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $IDUtente);
        $stmt->execute();
    }

    public function updateOrganizzatore($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $IBAN, $id){
        $query = "UPDATE ORGANIZZATORE
                  SET Email = ?, Sesso = ?, Nome = ?, Cognome = ?, DataNascita = ?, Indirizzo = ?, CAP = ?, Citta = ?, IBAN = ?
                  WHERE IDOrganizzatore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssssssi', $email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $IBAN, $id);
        $stmt->execute();
    }

    public function updateAmministratore($email, $nome, $cognome, $id){
        $query = "UPDATE AMMINISTRATORE
                  SET Email = ?, Nome = ?, Cognome = ?
                  WHERE IDAmministratore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssi', $email, $nome, $cognome, $id);
        $stmt->execute();
    }

    public function updatePassword($newpassword, $tipoaccount, $id){
        $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
        if ($tipoaccount == 'UTENTE'){
            $query = "UPDATE UTENTE
                      SET Password = ?
                      WHERE IDUtente = ?";
        } else if ($tipoaccount == "AMMINISTRATORE") {
            $query = "UPDATE AMMINISTRATORE
                      SET Password = ?
                      WHERE IDAmministratore = ?";
        } else if ($tipoaccount == "ORGANIZZATORE") {
            $query = "UPDATE ORGANIZZATORE
                      SET Password = ?
                      WHERE IDOrganizzatore = ?";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $newpassword, $id);
        $stmt->execute();
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

    public function ottieniNotificheVisteByIDUtente($idUtente){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE NOTIFICA_PERSONALE.IDUtente = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 's'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('i', $idUtente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function ottieniNotificheVisteByIDOrganizzatore($idOrganizzatore){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE  NOTIFICA_PERSONALE.IDOrganizzatore = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 's'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('i', $idOrganizzatore);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function ottieniNotificheVisteByIDAmministratore($idAmministratore){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE  NOTIFICA_PERSONALE.IDAmministratore = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 's'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('i', $idAmministratore);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniNotificheNonVisteByIDUtente($idUtente){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE  NOTIFICA_PERSONALE.IDUtente = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 'n'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('i', $idUtente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniNotificheNonVisteByIDUtenteDaData($idUtente, $data){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE  NOTIFICA_PERSONALE.IDUtente = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 'n'
                                           AND NOTIFICA.DataNotifica > ?
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('is', $idUtente, $data);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniNotificheNonVisteByIDOrganizzatoreDaData($idOrganizzatore, $data){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE  NOTIFICA_PERSONALE.IDOrganizzatore = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 'n'
                                           AND NOTIFICA.DataNotifica > ?
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('is', $idOrganizzatore, $data);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniNotificheNonVisteByIDAmministratoreDaData($idAmministratore, $data){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE  NOTIFICA_PERSONALE.IDAmministratore = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 'n'
                                           AND NOTIFICA.DataNotifica > ?
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('is', $idAmministratore, $data);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniNotificheNonVisteByIDOrganizzatore($idOrganizzatore){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE NOTIFICA_PERSONALE.IDOrganizzatore = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 'n'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('i', $idOrganizzatore);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniNotificheNonVisteByIDAmministratore($idAmministratore){
        $stmt = $this->db->prepare("SELECT NOTIFICA.TestoNotifica, NOTIFICA.TitoloNotifica, NOTIFICA.DataNotifica,
                                           ORGANIZZATORE.Nome, ORGANIZZATORE.Cognome, ORGANIZZATORE.IDOrganizzatore,
                                           AMMINISTRATORE.Nome, AMMINISTRATORE.Cognome, AMMINISTRATORE.IDAmministratore,
                                           EVENTO.IDEvento, EVENTO.NomeEvento, EVENTO.DataEvento,
                                           NOTIFICA_PERSONALE.IDNotificaPersonale
                                    FROM NOTIFICA INNER JOIN NOTIFICA_PERSONALE ON NOTIFICA.IDNotifica = NOTIFICA_PERSONALE.IDNotifica
                                                  LEFT JOIN EVENTO ON NOTIFICA.IDEvento = EVENTO.IDEvento
                                                  LEFT JOIN AMMINISTRATORE ON NOTIFICA.IDAmministratore = AMMINISTRATORE.IDAmministratore
                                                  LEFT JOIN ORGANIZZATORE ON NOTIFICA.IDOrganizzatore = ORGANIZZATORE.IDOrganizzatore
                                    WHERE  NOTIFICA_PERSONALE.IDAmministratore = ?
                                           AND NOTIFICA_PERSONALE.VisualizzataSN = 'n'
                                    ORDER BY NOTIFICA.DataNotifica DESC");
        $stmt->bind_param('i', $idAmministratore);
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
        return $stmt->insert_id;
    }

    public function inserisciNotificaOrganizzatore($titolo, $testo, $idOrganizzatore, $idEvento){
        $query = "INSERT INTO NOTIFICA(TitoloNotifica, TestoNotifica, IDOrganizzatore, IDEvento)
                  VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $titolo, $testo, $idOrganizzatore, $idEvento);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function inserisciNotificaOrganizzatorePerArtistaECategorie($titolo, $testo, $idOrganizzatore){
        $query = "INSERT INTO NOTIFICA(TitoloNotifica, TestoNotifica, IDOrganizzatore)
                  VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $titolo, $testo, $idOrganizzatore);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function inserisciNotificaSistema($titolo, $testo, $idEvento){
        $query = "INSERT INTO NOTIFICA(TitoloNotifica, TestoNotifica, IDEvento)
                  VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $titolo, $testo, $idEvento);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function inserisciNotificaSistemaPerRegistrazione($titolo, $testo){
        $query = "INSERT INTO NOTIFICA(TitoloNotifica, TestoNotifica)
                  VALUES (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $titolo, $testo);
        $stmt->execute();
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

    public function ottieniAmministratori(){
        $query = "SELECT IDAmministratore
                  FROM AMMINISTRATORE";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function ottieniUtentiChePartecipanoAdUnEvento($IDEvento){
        $query = "SELECT UTENTE.IDUtente
                  FROM EVENTO INNER JOIN COMPRENDE ON EVENTO.IDEvento = COMPRENDE.IDEvento
                              INNER JOIN ORDINE ON COMPRENDE.IDOrdine = ORDINE.IDOrdine
                              INNER JOIN UTENTE ON ORDINE.IDUtente = UTENTE.IDUtente
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

    public function pubblicaNotificaATuttiGliAmministratori($IDNotifica){
        $amministratori = $this->ottieniAmministratori();
        foreach ($amministratori as $amministratore){
            $this->pubblicaNotificaAdAmministratore($amministratore["IDAmministratore"], $IDNotifica);
        }
    }

    public function pubblicaNotificaAdUtente($IDUtente, $IDNotifica){
        $query = "INSERT INTO NOTIFICA_PERSONALE(IDUtente, IDNotifica, VisualizzataSN)
                  VALUES (?,?,'n')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $IDUtente, $IDNotifica);
        $stmt->execute();
    }

    public function pubblicaNotificaAdOrganizzatore($IDOrganizzatore, $IDNotifica){
        $query = "INSERT INTO NOTIFICA_PERSONALE(IDOrganizzatore, IDNotifica, VisualizzataSN)
                  VALUES (?,?,'n')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $IDOrganizzatore, $IDNotifica);
        $stmt->execute();
    }

    public function pubblicaNotificaAdAmministratore($IDAmministratore, $IDNotifica){
        $query = "INSERT INTO NOTIFICA_PERSONALE(IDAmministratore, IDNotifica, VisualizzataSN)
                  VALUES (?,?,'n')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $IDAmministratore, $IDNotifica);
        $stmt->execute();
    }

    public function pubblicaNotificaATuttiGliUtentiDiUnEvento($IDNotifica, $IDEvento){
        $utenti = $this->ottieniUtentiChePartecipanoAdUnEvento($IDEvento);
        foreach ($utenti as $utente){
            $this->pubblicaNotificaAdUtente($utente["IDUtente"], $IDNotifica);
        }
    }

    public function checkNuoveNotificheOrganizzatore($idOrganizzatore){
        $nuovenotifiche = $this->ottieniNotificheNonVisteByIDOrganizzatore($idOrganizzatore);
        $numeronotifiche = count($nuovenotifiche);
        if ($numeronotifiche > 0){
            return true;
        } else {
            return false;
        }
    }

    /********************************************************************************************************************** */
    /* Eventi di interesse di un utente */
    public function ottieniEventiDiInteresseDiUnUtente($IDUtente){
        $query = "SELECT *
                  FROM EVENTO, INTERESSA
                  WHERE EVENTO.IDEvento = INTERESSA.IDEvento
                  AND IDUtente = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $IDUtente);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function inserisciInteressePerUtente($IDEvento, $IDUtente){
        $result = $this->ottieniEventiDiInteresseDiUnUtente($IDUtente);
        $trovato = false;
        foreach($result as $row){
            if($row["IDEvento"]==$IDEvento){
                $trovato = true;
            }
        }
        if($trovato == false){
            $query = "INSERT INTO INTERESSA(IDEvento, IDUtente)
                      VALUES (?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $IDEvento, $IDUtente);
            $stmt->execute();
        }
    }

    public function rimuoviInteressePerUtente($IDEvento, $IDUtente){
        $query = "DELETE FROM INTERESSA WHERE IDEvento = ? AND IDUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $IDEvento, $IDUtente);
        $stmt->execute();
    }

    public function checkInteresseAdEvento($IDEvento, $IDUtente) {
        $query = "SELECT *
                  FROM EVENTO, INTERESSA
                  WHERE EVENTO.IDEvento = INTERESSA.IDEvento
                  AND INTERESSA.IDUtente = ? AND EVENTO.IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $IDUtente, $IDEvento);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0 ? true : false;
    }
    
    /********************************************************************************************************************** */
    public function ottieniInformazioniDiUnEvento($IDEvento){
        $query = "SELECT *
                  FROM EVENTO
                  WHERE IDEvento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $IDEvento);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function inserisciNotificaInNoteDiUnEvento($titolo, $testo, $IDEvento){
        $notaBase = $this->ottieniInformazioniDiUnEvento($IDEvento)["NoteEvento"];
        $aggiunta = "Pubblicato in data ".date("Y-m-d h:i:sa")."<br/>".$titolo."<br/>".$testo;
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
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function ottieniInformazioniAmministratore($id){
        $query = "SELECT *
                  FROM AMMINISTRATORE
                  WHERE IDAmministratore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function ottieniInformazioniArtista($id){
        $query = "SELECT *
                  FROM ARTISTA
                  WHERE IDArtista = ?";
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

    public function aggiornaInformazioniArtista($id, $consensoSN){
        $query = "UPDATE ARTISTA
                  SET AutorizzatoSN = ?, ValutatoSN = 's'
                  WHERE IDArtista = ?";
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

    public function ottieniArtistiNonValutati(){
        $stmt = $this->db->prepare("SELECT PseudonimoArtista, IDArtista, Descrizione, ImmagineArtista
                                    FROM ARTISTA
                                    WHERE ValutatoSN = 'n'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ottieniCategorieNonValutate(){
        $stmt = $this->db->prepare("SELECT NomeCategoria, IDCategoria
                                    FROM CATEGORIA
                                    WHERE ValutataSN = 'n'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /********************************************************************************************************************** */
    /*Homepage*/

    public function getRandomCategories($n = 6){
        $stmt = $this->db->prepare("SELECT * FROM CATEGORIA WHERE AutorizzataSN = 's' AND ValutataSN = 's' ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventiSuggeriti(){
        $stmt = $this->db->prepare("SELECT * FROM EVENTO WHERE EliminatoSN = 'n' AND DataEvento >= CURDATE() ORDER BY RAND() LIMIT 10");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProssimiEventi(){
        $stmt = $this->db->prepare("SELECT * FROM EVENTO WHERE EliminatoSN = 'n' AND DataEvento >= CURDATE() ORDER BY DataEvento ASC LIMIT 10");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAcquisti($IDUtente){
        $stmt = $this->db->prepare("SELECT * FROM ORDINE 
                                        JOIN COMPRENDE ON ORDINE.IDOrdine = COMPRENDE.IDOrdine 
                                        JOIN EVENTO ON EVENTO.IDEvento = COMPRENDE.IDEvento
                                        WHERE ORDINE.IDUtente = ? AND DataEvento >= CURDATE()");
        $stmt->bind_param('i', $IDUtente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /********************************************************************************************************************** */
    /*Categorie*/

    public function getEventsFromIDCategoria($IDcat){
        $stmt = $this->db->prepare("SELECT * FROM EVENTO WHERE IDCategoria = ? AND EliminatoSN = 'n' AND DataEvento >= CURDATE()");
        $stmt->bind_param('i',$IDcat);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryName($IDcat){
        $stmt = $this->db->prepare("SELECT NomeCategoria FROM CATEGORIA WHERE IDCategoria = ? AND AutorizzataSN = 's' AND ValutataSN = 's'");
        $stmt->bind_param('i',$IDcat);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /********************************************************************************************************************** */
    /* Ricerca */

    public function cercaEventi($text){
        $param = "%{$text}%";
        $query = "SELECT * FROM EVENTO WHERE NomeEvento LIKE ? AND DataEvento >= CURDATE()";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function cercaArtisti($text){
        $param = "%{$text}%";
        $query = "SELECT * FROM ARTISTA WHERE PseudonimoArtista LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function cercaCategorie($text){
        $param = "%{$text}%";
        $query = "SELECT * FROM CATEGORIA WHERE NomeCategoria LIKE ? AND AutorizzataSN = 's' AND ValutataSN = 's'";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /********************************************************************************************************************** */
    /*Artisti*/

    public function getArtistFromID($ID){
        $stmt = $this->db->prepare("SELECT * FROM ARTISTA WHERE ValutatoSN = 's' AND AutorizzatoSN = 's' AND IDArtista = ?");
        $stmt->bind_param('i',$ID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventsFromIDArtista($ID){
        $stmt = $this->db->prepare("SELECT * FROM EVENTO JOIN ESEGUE ON EVENTO.IDEvento = ESEGUE.IDEvento WHERE IDArtista = ? AND EliminatoSN = 'n' AND DataEvento >= CURDATE()");
        $stmt->bind_param('i',$ID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /********************************************************************************************************************** */
    /*Eventi*/

    public function getAllEvents(){
        $stmt = $this->db->prepare("SELECT * FROM EVENTO WHERE EliminatoSN = 'n' AND DataEvento >= CURDATE()");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>
