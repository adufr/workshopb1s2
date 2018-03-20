#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: UTILISATEUR
#------------------------------------------------------------

CREATE TABLE UTILISATEUR(
        uti_id                 int (11) Auto_increment  NOT NULL ,
        uti_nom                Varchar (25) ,
        uti_prenom             Varchar (25) ,
        uti_classe             Varchar (25) ,
        uti_mail               Varchar (50) ,
        uti_sexe               Varchar (25) ,
        uti_mdp                Varchar (25) ,
        uti_campus             Varchar (25) ,
        uti_messages_envoyes   int (11) Auto_increment  ,
        uti_derniere_connexion Date ,
        uti_estadmin           Bool NOT NULL ,
        PRIMARY KEY (uti_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COMPETENCE
#------------------------------------------------------------

CREATE TABLE COMPETENCE(
        comp_id    int (11) Auto_increment  NOT NULL ,
        comp_nom   Varchar (25) ,
        comp_image Varchar (255) ,
        PRIMARY KEY (comp_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FORUM
#------------------------------------------------------------

CREATE TABLE FORUM(
        forum_id    int (11) Auto_increment  NOT NULL ,
        forum_sujet Varchar (25) ,
        PRIMARY KEY (forum_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: affecter
#------------------------------------------------------------

CREATE TABLE affecter(
        niv_competence Int ,
        comp_id        Int NOT NULL ,
        uti_id         Int NOT NULL ,
        PRIMARY KEY (comp_id ,uti_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: poster
#------------------------------------------------------------

CREATE TABLE poster(
        post     Varchar (500) ,
        forum_id Int NOT NULL ,
        uti_id   Int NOT NULL ,
        PRIMARY KEY (forum_id ,uti_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: messages
#------------------------------------------------------------

CREATE TABLE messages(
        uti_id             Int NOT NULL ,
        uti_id_UTILISATEUR Int NOT NULL ,
        PRIMARY KEY (uti_id ,uti_id_UTILISATEUR )
)ENGINE=InnoDB;

ALTER TABLE affecter ADD CONSTRAINT FK_affecter_comp_id FOREIGN KEY (comp_id) REFERENCES COMPETENCE(comp_id);
ALTER TABLE affecter ADD CONSTRAINT FK_affecter_uti_id FOREIGN KEY (uti_id) REFERENCES UTILISATEUR(uti_id);
ALTER TABLE poster ADD CONSTRAINT FK_poster_forum_id FOREIGN KEY (forum_id) REFERENCES FORUM(forum_id);
ALTER TABLE poster ADD CONSTRAINT FK_poster_uti_id FOREIGN KEY (uti_id) REFERENCES UTILISATEUR(uti_id);
ALTER TABLE messages ADD CONSTRAINT FK_messages_uti_id FOREIGN KEY (uti_id) REFERENCES UTILISATEUR(uti_id);
ALTER TABLE messages ADD CONSTRAINT FK_messages_uti_id_UTILISATEUR FOREIGN KEY (uti_id_UTILISATEUR) REFERENCES UTILISATEUR(uti_id);