<?php


class Thenews
{
    // cet attribut est ajouté depuis la table theuser, il sera utile pour instancier des news lorsqu'on aura besoin du le login de l'utilisateur, ceci pour permettre les jointures dans les méthodes de ThenewManager sans à avoir à utiliser des sous-requêtes
    private string $theUserLogin;

    // EXERCICE créez les autres attributs (noms des champs dans le table "thenews")


    // EXERCICE créez le constructeur


    // EXERCICE créez l'hydratateur


    // EXERCICE créez les getters et setters des attributs propre à cette table, n'oubliez pas de protéger les champs avec les setters !


    // Getters et Setters utiles pour theUserLogin
    /**
     * $theUserLogin's getter
     * @return string
     */
    public function getTheUserLogin(): string
    {
        return $this->theUserLogin;
    }

    /**
     * $theUserLogin's setter
     * @param string $theUserLogin
     */
    public function setTheUserLogin(string $theUserLogin): void
    {
        $theUserLogin = strip_tags(trim($theUserLogin));
        if(strlen($theUserLogin)<3 || strlen($theUserLogin)>60){
            trigger_error("Le login doit être plus grand que 2 et plus petit que 60 caractères!",E_USER_NOTICE );
        }else {
            $this->theUserLogin = $theUserLogin;
        }
    }
}