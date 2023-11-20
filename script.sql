INSERT INTO categories (id,name) VALUES
(DEFAULT,'mobilier'),
(DEFAULT,'fourniture de bureau');

INSERT INTO products (id,name,category_id) VALUES
(DEFAULT,'Chaise',1),
(DEFAULT,'Stylo',2),
(DEFAULT,'Cahier',2);

INSERT INTO services (id,name,created_at,updated_at) VALUES
(DEFAULT,'Securite',current_timestamp,current_timestamp),  
(DEFAULT,'Comptabilite',current_timestamp,current_timestamp);  


INSERT INTO besoins (id,quantity,product_id,service_id,etat,created_at,updated_at) VALUES 
(DEFAULT,10,2,1,1,current_timestamp,current_timestamp),
(DEFAULT,5,3,1,1,current_timestamp,current_timestamp);
INSERT INTO besoins (id,quantity,product_id,service_id,etat,created_at,updated_at) VALUES 
(DEFAULT,20,1,1,0,current_timestamp,current_timestamp);

INSERT INTO fournisseurs (id,nom,adresse,created_at,updated_at) VALUES
(DEFAULT,'JB','Lot III Analakely Antananarivo 101',current_timestamp,current_timestamp),
(DEFAULT,'ABC Corp','Lot IV Antanimena Antananarivo 101',current_timestamp,current_timestamp);

INSERT INTO users (id,name,email,password,profil,auth_level,created_at,updated_at) VALUES
(DEFAULT,'John','John.test@test.com','1234',2,1,current_timestamp,current_timestamp),
(DEFAULT,'Test','Test.test@test.com','root',1,1,current_timestamp,current_timestamp);

INSERT INTO  detail_founisseurs (id,fournisseur_id,user_id,created_at,updated_at) VALUES
(DEFAULT,1,2,current_timestamp,current_timestamp);