--AMAURIS SANTANA

--Adding category names in categories table
INSERT INTO categories (category_name) VALUES ('Food');
INSERT INTO categories (category_name) VALUES ('Clothes');

--Adding products in products table
INSERT INTO products (category_id, product_name, price, quantity_remaining, description, image)
VALUES (1, 'Special K Protein Bar', 2.74, 5, 'Each tasty bar is made with wholesome rolled oats, cereal flakes and granola. Made with wholesome rolled oats.', 'Special_K_Protein_Bar.jpg');

INSERT INTO products (category_id, product_name, price, quantity_remaining, description, image)
VALUES (1, 'Silk Pure Almond Vanilla Milk', 13.44, 3, 'Silk Pure Almond Vanilla All Natural Almond Milk.
50% more calcium than dairy milk.
90 calories per serving.
Non GMO project verified. 
nongmoproject.org.
Added vitamins and minerals.', 'Silk_Pure_Almond_Vanilla_Milk.jpg');

INSERT INTO products (category_id, product_name, price, quantity_remaining, description, image)
VALUES (2, 'Ralph Lauren Polo Shirt', 85.00, 7, 'Crafted from mercerized stretch cotton mesh and designed with genuine mother-of-pearl buttons, this lightweight trim-fitting polo shirt offers the ultimate in refined comfort. 97% Pima Cotton/ 3% Elastane. Machine wash. Imported.', 'Polo_Ralph_Lauren_Shirt.jpg');

INSERT INTO products (category_id, product_name, price, quantity_remaining, description, image)
VALUES (2, 'Calvin Klein Three-Pack Woven Boxer', 34.00, 12, '100% Cotton
Imported
Machine Wash
Three-pack classic boxers in assorted patterns and colors each featuring elasticized waistband and logo tag at waist', 'Calvin_Klein_Boxer.jpg');