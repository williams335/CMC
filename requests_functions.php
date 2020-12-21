<?php
    include 'connexion.php' ;

    $conn = new mysqli($server, $user, $pass,$db);
    mysqli_set_charset($conn,'utf8');
    if ($conn->connect_errno){
        echo "Echec de la connexion à la base de données".$conn->connect_error;
    }

    function getAllusers(){
        $sql = "SELECT DISTINCT `Utilisateur` FROM `transition`";
        $req= $conn->prepare($sql);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur'] );
        }
        $req->close();
        $conn->close();
        
        return $list_users;
    }


    function getConnexionFrequency($mois){
        $sql = "SELECT DISTINCT `Utilisateur`, count(*) as nbre_connexion FROM `transition`
        WHERE `Titre`='Connexion' and Date_FORMAT(date, '%m'=? group by `Utilisateur`";
        $req= $conn->prepare($sql);
        $req= $bin_param($mois);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        $list_nbre_connexion = array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur']);
            array_push($list_nbre_connexion,$donnees['nbre_connexion']);
        }
        $list_nbre_connexion_reglee($list_users,$list_nbre_connexion)
        $req->close();
        $conn->close();
    
        return $list_nbre_connexion;
    }

    function getNombrePostMessages($mois){
        $sql = "SELECT DISTINCT `Utilisateur`, count(*) as nbre_msg_post FROM `transition`
        WHERE `Titre`='Poster un nouveau message' and Date_FORMAT(date, '%m'=? group by `Utilisateur`";
        $req= $conn->prepare($sql);
        $req= $bin_param($mois);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        $list_nbre_msg_post = array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur']);
            array_push($list_nbre_msg_post,$donnees['nbre_msg_post']);
        }
        $list_nbre_msg_post_reglee($list_users,$list_nbre_msg_post)
        $req->close();
        $conn->close();
    
        return $list_nbre_msg_post;
    }

    function getMessagesContent($mois){
        $sql = "SELECT DISTINCT `Utilisateur`, count(*) as nbre_msg_content FROM `transition`
        WHERE `Titre` like '%Afficher le contenu un message' and Date_FORMAT(date, '%m'=? group by `Utilisateur`";
        $req= $conn->prepare($sql);
        $req= $bin_param($mois);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        $list_nbre_msg_content= array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur']);
            array_push($list_nbre_msg_content,$donnees['nbre_msg_content']);
        }
        $list_nbre_msg_content_reglee($list_users,$list_nbre_msg_content)
        $req->close();
        $conn->close();
    
        return $list_nbre_msg_content;
    }

    function getStructureCoursForum($mois){
        $sql = "SELECT DISTINCT `Utilisateur`, count(*) as nbre_structure_content_open FROM `transition`
        WHERE `Titre` like '%Afficher une structure (cours/forum)' and Date_FORMAT(date, '%m'=? group by `Utilisateur`";
        $req= $conn->prepare($sql);
        $req= $bin_param($mois);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        $list_nbre_structure_content_open= array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur']);
            array_push($list_nbre_structure_content_open,$donnees['nbre_structure_content_open']);
        }
        $list_nbre_structure_content_open_reglee($list_users,$list_nbre_structure_content_open)
        $req->close();
        $conn->close();
    
        return $list_nbre_structure_content_open;
    }

    function getBougerScrollbar($mois){
        $sql = "SELECT DISTINCT `Utilisateur`, count(*) as nbre_bouger_scrollbar FROM `transition`
        WHERE `Titre` like '%Bouger la ScrollBar' and Date_FORMAT(date, '%m'=? group by `Utilisateur`";
        $req= $conn->prepare($sql);
        $req= $bin_param($mois);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        $list_nbre_bouger_scrollbar= array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur']);
            array_push($list_nbre_bouger_scrollbar,$donnees['nbre_bouger_scrollbar']);
        }
        $list_nbre_bouger_scrollbar_reglee($list_users,$list_nbre_bouger_scrollbar)
        $req->close();
        $conn->close();
    
        return $list_nbre_bouger_scrollbar;
    }

    function getBougerScrollbarBas($mois){
        $sql = "SELECT DISTINCT `Utilisateur`, count(*) as nbre_bouger_scrollbar_en_bas FROM `transition`
        WHERE `Titre` like '%Bouger la Scrollbar en bas' and Date_FORMAT(date, '%m'=? group by `Utilisateur`";
        $req= $conn->prepare($sql);
        $req= $bin_param($mois);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        $list_nbre_bouger_scrollbar_en_bas= array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur']);
            array_push($list_nbre_bouger_scrollbar_en_bas,$donnees['nbre_bouger_scrollbar_en_bas']);
        }
        $list_nbre_bouger_scrollbar_en_bas_reglee($list_users,$list_nbre_bouger_scrollbar_en_bas)
        $req->close();
        $conn->close();
    
        return $list_nbre_bouger_scrollbar_en_bas;
    }

    function getPlierDeplierAborescence($mois){
        $sql = "SELECT DISTINCT `Utilisateur`, count(*) as nbre_plier_deplier_arborescence FROM `transition`
        WHERE `Titre` like '%Plier et deplier l'aborescence d'une structure' and Date_FORMAT(date, '%m'=? group by `Utilisateur`";
        $req= $conn->prepare($sql);
        $req= $bin_param($mois);
        $req->execute();
        $result = $req->get_result();
        $list_users = array();
        $list_nbre_plier_deplier_arborescence= array();
        while($donnees = $result->fetch_assoc()){
            array_push($list_users,$donnees['Utilisateur']);
            array_push($list_nbre_plier_deplier_arborescence,$donnees['nbre_plier_deplier_arborescence']);
        }
        $list_nbre_plier_deplier_arborescence_reglee($list_users,$list_nbre_plier_deplier_arborescence)
        $req->close();
        $conn->close();
    
        return $list_nbre_plier_deplier_arborescence;
    }
?>