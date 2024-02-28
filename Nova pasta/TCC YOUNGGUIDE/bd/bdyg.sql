DROP DATABASE youngguide;
CREATE DATABASE youngguide;
USE youngguide;

CREATE TABLE usuario (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(15),
    senha VARCHAR(255),
	 conta VARCHAR(1));
	 
   CREATE TABLE especialista (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(15),
    senha VARCHAR(255),
	 conta VARCHAR(1)); 
    
CREATE TABLE artigos(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR (220),
    conteudo TEXT,
	 permissao VARCHAR (1),
	 id_usu INT,
	 id_esp INT,
	 likes INT DEFAULT 0,
	 FOREIGN KEY (id_usu) REFERENCES usuario(id),
	 FOREIGN KEY (id_esp) REFERENCES especialista(id));
	   
CREATE TABLE adm (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR (10),
    senha VARCHAR (255),
	 conta VARCHAR(1));
      
CREATE TABLE fotos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	PATH VARCHAR(100),
	id_esp INT,
	id_usu INT,
	FOREIGN KEY (id_usu) REFERENCES usuario(id),
	FOREIGN KEY (id_esp) REFERENCES especialista(id));
	
	 CREATE TABLE postagens(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR (220),
    conteudo TEXT,
	 permissao VARCHAR (1),
	 id_esp INT,
	 id_adm INT,
	 usuario VARCHAR(15),
	 likes INT DEFAULT 0,
	 FOREIGN KEY (id_esp) REFERENCES especialista(id));
	  
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    esp_id INT,
    FOREIGN KEY (esp_id) REFERENCES especialista(id),
    FOREIGN KEY (user_id) REFERENCES usuario(id),
    FOREIGN KEY (post_id) REFERENCES postagens(id));

CREATE TABLE salva (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    esp_id  INT,
    FOREIGN KEY (esp_id) REFERENCES especialista(id),
    FOREIGN KEY (user_id) REFERENCES usuario(id),
    FOREIGN KEY (post_id) REFERENCES postagens(id));
    
    CREATE TABLE comentarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    comentario VARCHAR (255),
    user_id INT,
    post_id INT,
	 esp_id  INT,
	 adm_id  INT,
     FOREIGN KEY (user_id) REFERENCES usuario(id),
    FOREIGN KEY (post_id) REFERENCES postagens(id),
    FOREIGN KEY (esp_id) REFERENCES especialista(id),
	  FOREIGN KEY (adm_id) REFERENCES adm(id));
	  
    CREATE TABLE chat(
    id INT AUTO_INCREMENT PRIMARY KEY,
    comentario VARCHAR (255),
    user_id INT,
	 perfil_id INT,
	 esp_id  INT,
	 adm_id  INT,
     FOREIGN KEY (user_id) REFERENCES usuario(id),
    FOREIGN KEY (perfil_id) REFERENCES especialista(id),
    FOREIGN KEY (esp_id) REFERENCES especialista(id),
	  FOREIGN KEY (adm_id) REFERENCES adm(id));
	  
	 CREATE TABLE curriculo (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome_completo VARCHAR(100),
	idade VARCHAR(2),
	email VARCHAR(100),
	profissao VARCHAR(100),
	PATH VARCHAR(100),
	resultado VARCHAR (1),
	id_usu INT,
	FOREIGN KEY (id_usu) REFERENCES usuario(id)); 
SELECT p.titulo, u.usuario AS usuario 
                        FROM postagens p
                        INNER JOIN likes l ON p.id = l.post_id
                        INNER JOIN usuario u ON l.user_id = u.id
                        WHERE l.user_id = 2