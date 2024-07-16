# Thème

Plateforme de donations de type **_Litchi_** et de suivi des événements organisés par la plateforme.

# Utilisateurs

-   **Utillisateur normal**: Les utilisateurs qui s'inscrivent en tant que membre afin contribuer aux donations et d'être au courant des événements organisés par la plateforme.
-   **Administrateur**: Les utilisateurs qui administrent l'application. Ils peuvent publier des appels aux dons et les événements.

# Fonctionnalités

-   Inscription
-   Connexion
-   Déconnexion

## Par rapport à un utilisateur normal

-   Saisir les données d'un appel aux dons qu'il veut initier
-   Voir la liste des appels aux dons
-   Télécharger une version PDF des appels aux dons
-   Contribuer aux appels aux dons déjà éxistants
    -   Paiement (mock)
-   Voir les événements
-   Télécharger une version PDF des événements

## Par rapport à un administrateur

-   ... Tous ce que l'utilisateur normal peut faire
-   Approuver les données d'appels aux par les utilisateurs normaux
-   Ajout d'appels aux dons
-   Publication d'événements
-   Vue du dashboard de l'application
-   Vue des utilisateurs normaux
-   Vue des autres administrateurs

### Super Admin

-   Ajout de staffs (admins normal)

# Sections

## Front office (utilisateurs normaux)

### Page d'accueil

Ce qui est déjà là

### Page de liste d'appel aux dons

-   Liste des appels aux dons
-   Un appel au don:
    -   Photo
    -   Description
    -   Titre
    -   Montant collecté
    -   Montant requis
    -   Progrès du montant collecté (en %)
    -   Actions: Faire un don, Télécharger PDF

### Page de donation à un appel au dons

-   Contenu:
    -   Photo
    -   Titre
    -   Progrès (en %)
    -   Montant collecté et requis
-   Formulaire:
    -   Montant de la donation
    -   Méthode de paiement et numéros
    -   Information du donateur:
        -   Nom du compte
        -   Adresse email
        -   Contact
    -   Actions: Envoyer

### Page d'ajout appel aux dons (nouveau)

-   Formulaire:
    -   Photo
    -   Description
    -   Titre
    -   Montant requis
    -   Progrès du montant collecté (en %)
    -   Actions: Envoyer

### Page de liste d'événements

-   Liste d'événements
-   Evènement:
    -   Date de début
    -   Photo
    -   Titre
    -   Date et heure de début - Date et heure de fin
    -   Lieu
    -   Actions: Voir détails

### Page d'événement

-   Contenu:
    -   Photo
    -   Titre
    -   Description
    -   Dates à retenir
    -   Organization (Hello-Asso)
    -   Lieu
-   Actions: Télécharger PDF

## Authentification

### Page de connexion

-   Email
-   Mot de passe

### Page d'inscription

-   Nom
-   Prenom
-   Sexe
-   DDN
-   Email
-   Mot de passe
-   Adresse
-   Code postal
-   CIN - Délivré le
-   Profession
-   Num telephone
-   Accepter T&C
-   Actions: Envoyer

## Admin panel (Back-office pour les admins)

### Dashboard (à étudier ultérieurement)

### Gestion des utilisateurs

#### Page de liste des utilisateurs

-   Utilisateur:
    -   Photo de profil
    -   Nom et prénom
    -   Date de naissance
    -   Email
    -   Adresse
    -   Profession
    -   Téléphone
    -   Sexe
    -   Actions: Voir

### Gestion des administrateurs

#### Page de liste des administrateurs

-   Administrateur:
    -   Nom et Prénom
    -   Sexe
    -   Pivilège (Admin ou Super Admin)
    -   Email
    -   DDN
    -   Adresse
    -   CIN - délivré à

### Gestion des événements

#### Page de liste d'événements

-   Evènement:
    -   Date de début
    -   Photo
    -   Titre
    -   Date et heure de début - Date et heure de fin
    -   Lieu
    -   Actions: Voir, Modifier, Supprimer, Télécharger PDF

#### Page d'ajout d'événement:

-   Formulaire:
    -   Date de début
    -   Photo
    -   Titre
    -   Date et heure de début - Date et heure de fin
    -   Lieu
    -   Actions: Ajouter

#### Page d'affichage d'un événement

Contenu: - Date de début - Photo - Titre - Date et heure de début - Date et heure de fin - Lieu
Actions: - Télécharger en PDF - Modifier - Supprimer

#### Page de modification d'un événement

Formulaire: - Date de début - Photo - Titre - Date et heure de début - Date et heure de fin - Lieu - Actions: Enregistrer

### Gestion des donations

#### Page de liste des appels aux dons

Contenu:

-   Photo
-   Titre
-   Description
-   Date
-   Montant requis
-   Montant collecté
-   Actions: Voir, Modifier, Supprimer, Télécharger en PDF

#### Page de liste des demandes d'appels aux dons

Contenu:

-   Photo
-   Titre
-   Description
-   Date
-   Montant requis
-   Actions: Voir, Supprimer, Approuver

#### Page d'ajout d'un appel aux dons

Formulaire:

-   Titre
-   Description
-   Montant requis
-   Photo
-   Actions: Ajouter

#### Page de modification d'un appel aux dons

Formulaire:

-   Titre
-   Description
-   Montant requis
-   Photo
-   Actions: Enregistrer

#### Page d'affichage d'un appel aux dons

Appel aux dons:

-   Titre
-   Description
-   Montant requis
-   Montant collectés
-   Progès
-   Photo
    Actions:
-   Télécharger en PDF
-   Modifier
-   Supprimer

##### Liste des donateurs:

Donateur:

-   Nom complet (utilisateur)
-   Photo
-   Nom du compte
-   Contact
-   Email
-   Montant donné
