<?php
class DB{
    private string $host = 'localhost';
    private string $db = 'tchat';
    private string $user = 'root';
    private string $password = '';
    private ?PDO $dbLink;

    /**
     * Addition of the return of the PDO connection in the dbLink variable
     * Ajout du retour de la connexion PDO dans la variable dbLink
     */
    public function __construct()
    {
        $this->dbLink = $this->connect();
    }

    /**
     * @return PDO Returns the PDO connection
     */
    public function connect(): PDO{
        try {
            $db = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            echo $Exception->getMessage();
        }

        return $db;
    }

    /**
     * Checking if the $dbLink variable is empty and returning it
     * Vérifier si la variable $ dbLink est vide et la renvoyer
     * @return PDO|null return of the dbLink variable
     */
    public function getDbLink(): ?PDO{
        if(is_null($this->dbLink)){
            $this->dbLink = $this->connect();
        }

        return $this->dbLink;
    }

    /**
     * We prevent letting other developers clone the object
     * to make sure that we only have one instance of the db connection.
     *
     * Nous évitons de laisser d'autres développeurs cloner l'objet
     * pour nous assurer que nous n'avons qu'une seule instance de la connexion db.
     */
    public function __clone() {}
}