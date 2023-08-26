--------------------------------------------------------
--  File created - Saturday-August-26-2023   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Sequence CARTS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."CARTS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence CART_ITEMS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."CART_ITEMS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence CATEGORIES_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."CATEGORIES_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence CONTACTS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."CONTACTS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence FACTURA_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."FACTURA_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence PAYMENT_METHODS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."PAYMENT_METHODS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence PRODUCTS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."PRODUCTS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Sequence USERS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "PROYECTOWEB1"."USERS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE  NOKEEP  NOSCALE  GLOBAL ;
--------------------------------------------------------
--  DDL for Table CARTS
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."CARTS" 
   (	"CART_ID" NUMBER(11,0), 
	"USER_ID" NUMBER(11,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."CARTS"."CART_ID" IS 'Identificador único para el carrito';
   COMMENT ON COLUMN "PROYECTOWEB1"."CARTS"."USER_ID" IS 'Clave externa que hace referencia al usuario dueño del carrito';
--------------------------------------------------------
--  DDL for Table CART_ITEMS
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."CART_ITEMS" 
   (	"CART_ITEM_ID" NUMBER(11,0), 
	"CART_ID" NUMBER(11,0), 
	"PRODUCT_ID" NUMBER(11,0), 
	"QUANTITY" NUMBER(11,0)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."CART_ITEMS"."CART_ITEM_ID" IS 'Identificador único para el elemento del carrito';
   COMMENT ON COLUMN "PROYECTOWEB1"."CART_ITEMS"."CART_ID" IS 'Clave externa que hace referencia al carrito al que pertenece el elemento';
   COMMENT ON COLUMN "PROYECTOWEB1"."CART_ITEMS"."PRODUCT_ID" IS 'Clave externa que hace referencia al producto en el carrito';
   COMMENT ON COLUMN "PROYECTOWEB1"."CART_ITEMS"."QUANTITY" IS 'Cantidad del producto en el carrito';
--------------------------------------------------------
--  DDL for Table CATEGORIES
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."CATEGORIES" 
   (	"CATEGORY_ID" NUMBER(11,0), 
	"NAME" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."CATEGORIES"."CATEGORY_ID" IS 'Identificador único para la categoría';
   COMMENT ON COLUMN "PROYECTOWEB1"."CATEGORIES"."NAME" IS 'Nombre de la categoría';
--------------------------------------------------------
--  DDL for Table CONTACTENOS
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."CONTACTENOS" 
   (	"CONTACTENOS_ID" NUMBER(11,0), 
	"NOMBRE" VARCHAR2(255 BYTE), 
	"APELLIDOS" VARCHAR2(255 BYTE), 
	"CORREO" VARCHAR2(255 BYTE), 
	"CIUDAD" VARCHAR2(255 BYTE), 
	"MENSAJE" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."CONTACTENOS"."CONTACTENOS_ID" IS 'Identificador único para el mensaje de contactenos';
   COMMENT ON COLUMN "PROYECTOWEB1"."CONTACTENOS"."NOMBRE" IS 'Nombre del remitente del mensaje';
   COMMENT ON COLUMN "PROYECTOWEB1"."CONTACTENOS"."APELLIDOS" IS 'Apellidos del remitente del mensaje';
   COMMENT ON COLUMN "PROYECTOWEB1"."CONTACTENOS"."CORREO" IS 'Dirección de correo del remitente';
   COMMENT ON COLUMN "PROYECTOWEB1"."CONTACTENOS"."CIUDAD" IS 'Ciudad del remitente';
   COMMENT ON COLUMN "PROYECTOWEB1"."CONTACTENOS"."MENSAJE" IS 'Contenido del mensaje enviado';
--------------------------------------------------------
--  DDL for Table FACTURA
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."FACTURA" 
   (	"FACTURA_ID" NUMBER, 
	"NOMBRE" VARCHAR2(100 BYTE), 
	"APELLIDOS" VARCHAR2(100 BYTE), 
	"CORREO" VARCHAR2(100 BYTE), 
	"CIUDAD" VARCHAR2(100 BYTE), 
	"TARJETA" VARCHAR2(16 BYTE), 
	"CODIGO" VARCHAR2(4 BYTE), 
	"TOTAL" NUMBER(10,2)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."FACTURA_ID" IS 'Identificador único para la factura';
   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."NOMBRE" IS 'Nombre del cliente';
   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."APELLIDOS" IS 'Apellidos del cliente';
   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."CORREO" IS 'Dirección de correo del cliente';
   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."CIUDAD" IS 'Ciudad del cliente';
   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."TARJETA" IS 'Número de tarjeta de crédito/débito';
   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."CODIGO" IS 'Código de seguridad de la tarjeta';
   COMMENT ON COLUMN "PROYECTOWEB1"."FACTURA"."TOTAL" IS 'Total de la factura';
--------------------------------------------------------
--  DDL for Table PAYMENT_METHODS
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."PAYMENT_METHODS" 
   (	"PAYMENT_METHOD_ID" NUMBER(11,0), 
	"NAME" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."PAYMENT_METHODS"."PAYMENT_METHOD_ID" IS 'Identificador único para el método de pago';
   COMMENT ON COLUMN "PROYECTOWEB1"."PAYMENT_METHODS"."NAME" IS 'Nombre del método de pago';
--------------------------------------------------------
--  DDL for Table PRODUCTS
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."PRODUCTS" 
   (	"PRODUCT_ID" NUMBER(11,0), 
	"NAME" VARCHAR2(255 BYTE), 
	"DESCRIPTION" VARCHAR2(255 BYTE), 
	"PRICE" NUMBER(10,3), 
	"CATEGORY_ID" NUMBER(11,0), 
	"IMAGE" VARCHAR2(255 BYTE) DEFAULT 'assets/no_image.png'
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."PRODUCTS"."PRODUCT_ID" IS 'Identificador único para el producto';
   COMMENT ON COLUMN "PROYECTOWEB1"."PRODUCTS"."NAME" IS 'Nombre del producto';
   COMMENT ON COLUMN "PROYECTOWEB1"."PRODUCTS"."DESCRIPTION" IS 'Descripción del producto';
   COMMENT ON COLUMN "PROYECTOWEB1"."PRODUCTS"."PRICE" IS 'Precio del producto con 3 decimales';
   COMMENT ON COLUMN "PROYECTOWEB1"."PRODUCTS"."CATEGORY_ID" IS 'Clave externa que hace referencia a la categoría a la que pertenece el producto';
   COMMENT ON COLUMN "PROYECTOWEB1"."PRODUCTS"."IMAGE" IS 'Ruta de la imagen del producto (valor por defecto si no hay imagen)';
--------------------------------------------------------
--  DDL for Table USERS
--------------------------------------------------------

  CREATE TABLE "PROYECTOWEB1"."USERS" 
   (	"USER_ID" NUMBER(11,0), 
	"USERNAME" VARCHAR2(50 BYTE), 
	"PASSWORD" VARCHAR2(255 BYTE), 
	"EMAIL" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;

   COMMENT ON COLUMN "PROYECTOWEB1"."USERS"."USER_ID" IS 'Identificador único para el usuario';
   COMMENT ON COLUMN "PROYECTOWEB1"."USERS"."USERNAME" IS 'Nombre de usuario del usuario';
   COMMENT ON COLUMN "PROYECTOWEB1"."USERS"."PASSWORD" IS 'Contraseña del usuario (hash o encriptada)';
   COMMENT ON COLUMN "PROYECTOWEB1"."USERS"."EMAIL" IS 'Dirección de correo electrónico del usuario';
--------------------------------------------------------
--  DDL for View ALL_CATEGORIES_VIEW
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."ALL_CATEGORIES_VIEW" ("CATEGORY_ID", "NAME") AS 
  SELECT "CATEGORY_ID","NAME" FROM categories
;
--------------------------------------------------------
--  DDL for View CATEGORIES_VIEW
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."CATEGORIES_VIEW" ("CATEGORY_ID", "CATEGORY_NAME") AS 
  SELECT c.category_id, c.name AS category_name
FROM categories c
;
--------------------------------------------------------
--  DDL for View CONTACTENOS_VW
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."CONTACTENOS_VW" ("CONTACTENOS_ID", "NOMBRE", "APELLIDOS", "CORREO", "CIUDAD", "MENSAJE") AS 
  SELECT contactenos_id, nombre, apellidos, correo, ciudad, mensaje
FROM contactenos
;
--------------------------------------------------------
--  DDL for View FACTURA_VW
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."FACTURA_VW" ("FACTURA_ID", "NOMBRE", "APELLIDOS", "CORREO", "CIUDAD", "TARJETA", "CODIGO", "TOTAL") AS 
  SELECT factura_id, nombre, apellidos, correo, ciudad, tarjeta, codigo, total
FROM factura
;
--------------------------------------------------------
--  DDL for View PRODUCTS_BY_CATEGORY
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."PRODUCTS_BY_CATEGORY" ("PRODUCT_ID", "NAME", "DESCRIPTION", "PRICE", "CATEGORY_ID", "IMAGE", "CATEGORY_NAME") AS 
  SELECT p."PRODUCT_ID",p."NAME",p."DESCRIPTION",p."PRICE",p."CATEGORY_ID",p."IMAGE", c.name AS category_name
FROM products p
JOIN categories c ON p.category_id = c.category_id
;
--------------------------------------------------------
--  DDL for View PRODUCTS_VW
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."PRODUCTS_VW" ("PRODUCT_ID", "NAME", "DESCRIPTION", "PRICE") AS 
  SELECT product_id, name, description, price
FROM products
;
--------------------------------------------------------
--  DDL for View USERS_VW
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."USERS_VW" ("USER_ID", "USERNAME", "EMAIL") AS 
  SELECT user_id, username, email
FROM users
;
--------------------------------------------------------
--  DDL for View V_CART_DETAILS
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_CART_DETAILS" ("CART_ITEM_ID", "CART_ID", "PRODUCT_NAME", "QUANTITY", "PRICE") AS 
  SELECT ci.cart_item_id, c.cart_id, p.name AS product_name, ci.quantity, p.price
FROM cart_items ci
JOIN products p ON ci.product_id = p.product_id
JOIN carts c ON ci.cart_id = c.cart_id
;
--------------------------------------------------------
--  DDL for View V_CART_PRODUCTS
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_CART_PRODUCTS" ("CART_ID", "PRODUCT_NAME", "QUANTITY", "PRICE") AS 
  SELECT c.cart_id, p.name AS product_name, ci.quantity, p.price
FROM cart_items ci
JOIN products p ON ci.product_id = p.product_id
JOIN carts c ON ci.cart_id = c.cart_id
;
--------------------------------------------------------
--  DDL for View V_PAYMENT_METHODS
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_PAYMENT_METHODS" ("PAYMENT_METHOD_ID", "NAME") AS 
  SELECT payment_method_id, name
FROM payment_methods
;
--------------------------------------------------------
--  DDL for View V_POPULAR_PRODUCTS
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_POPULAR_PRODUCTS" ("PRODUCT_ID", "PRODUCT_NAME", "PURCHASE_COUNT") AS 
  SELECT p.product_id, p.name AS product_name, COUNT(ci.cart_item_id) AS purchase_count
FROM products p
LEFT JOIN cart_items ci ON p.product_id = ci.product_id
GROUP BY p.product_id, p.name
ORDER BY purchase_count DESC
;
--------------------------------------------------------
--  DDL for View V_PRODUCT_CATEGORIES_PAYMENT
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_PRODUCT_CATEGORIES_PAYMENT" ("PRODUCT_ID", "PRODUCT_NAME", "CATEGORY_NAME", "PAYMENT_METHOD") AS 
  SELECT p.product_id, p.name AS product_name, c.name AS category_name, pm.name AS payment_method
FROM products p
JOIN categories c ON p.category_id = c.category_id
CROSS JOIN payment_methods pm
;
--------------------------------------------------------
--  DDL for View V_PRODUCT_CATEGORY
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_PRODUCT_CATEGORY" ("PRODUCT_ID", "PRODUCT_NAME", "DESCRIPTION", "PRICE", "CATEGORY_NAME") AS 
  SELECT p.product_id, p.name AS product_name, p.description, p.price, c.name AS category_name
FROM products p
JOIN categories c ON p.category_id = c.category_id
;
--------------------------------------------------------
--  DDL for View V_USER_CARTS
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_USER_CARTS" ("USER_ID", "USERNAME", "CART_ID") AS 
  SELECT u.user_id, u.username, c.cart_id
FROM users u
LEFT JOIN carts c ON u.user_id = c.user_id
;
--------------------------------------------------------
--  DDL for View V_USER_CART_PRODUCTS
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_USER_CART_PRODUCTS" ("USERNAME", "PRODUCT_NAME", "QUANTITY", "PRICE") AS 
  SELECT u.username, p.name AS product_name, ci.quantity, p.price
FROM users u
JOIN carts c ON u.user_id = c.user_id
JOIN cart_items ci ON c.cart_id = ci.cart_id
JOIN products p ON ci.product_id = p.product_id
;
--------------------------------------------------------
--  DDL for View V_USER_TOTAL_SPENT
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_USER_TOTAL_SPENT" ("USER_ID", "USERNAME", "TOTAL_SPENT") AS 
  SELECT u.user_id, u.username, SUM(p.price * ci.quantity) AS total_spent
FROM users u
LEFT JOIN carts c ON u.user_id = c.user_id
LEFT JOIN cart_items ci ON c.cart_id = ci.cart_id
LEFT JOIN products p ON ci.product_id = p.product_id
GROUP BY u.user_id, u.username
;
--------------------------------------------------------
--  DDL for View V_WOMEN_PRODUCTS
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "PROYECTOWEB1"."V_WOMEN_PRODUCTS" ("PRODUCT_ID", "PRODUCT_NAME", "DESCRIPTION", "PRICE") AS 
  SELECT p.product_id, p.name AS product_name, p.description, p.price
FROM products p
JOIN categories c ON p.category_id = c.category_id
WHERE c.name = 'Mujeres'
;
REM INSERTING into PROYECTOWEB1.CARTS
SET DEFINE OFF;
REM INSERTING into PROYECTOWEB1.CART_ITEMS
SET DEFINE OFF;
REM INSERTING into PROYECTOWEB1.CATEGORIES
SET DEFINE OFF;
REM INSERTING into PROYECTOWEB1.CONTACTENOS
SET DEFINE OFF;
REM INSERTING into PROYECTOWEB1.FACTURA
SET DEFINE OFF;
REM INSERTING into PROYECTOWEB1.PAYMENT_METHODS
SET DEFINE OFF;
REM INSERTING into PROYECTOWEB1.PRODUCTS
SET DEFINE OFF;
REM INSERTING into PROYECTOWEB1.USERS
SET DEFINE OFF;
--------------------------------------------------------
--  DDL for Trigger PREVENT_CATEGORY_DELETION
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."PREVENT_CATEGORY_DELETION" 
BEFORE DELETE ON categories
FOR EACH ROW
DECLARE
    product_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO product_count FROM products WHERE category_id = :OLD.category_id;
    IF product_count > 0 THEN
        RAISE_APPLICATION_ERROR(-20005, 'No se puede eliminar una categoría con productos asociados.');
    END IF;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."PREVENT_CATEGORY_DELETION" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_CARTS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_CARTS" 
BEFORE INSERT ON carts
FOR EACH ROW
BEGIN
    SELECT carts_seq.NEXTVAL INTO :NEW.cart_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_CARTS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_CART_ITEMS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_CART_ITEMS" 
BEFORE INSERT ON cart_items
FOR EACH ROW
BEGIN
    SELECT cart_items_seq.NEXTVAL INTO :NEW.cart_item_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_CART_ITEMS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_CATEGORIES
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_CATEGORIES" 
BEFORE INSERT ON categories
FOR EACH ROW
BEGIN
    SELECT categories_seq.NEXTVAL INTO :NEW.category_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_CATEGORIES" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_CONTACTENOS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_CONTACTENOS" 
BEFORE INSERT ON contactenos
FOR EACH ROW
BEGIN
    SELECT contacts_seq.NEXTVAL INTO :NEW.contactenos_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_CONTACTENOS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_FACTURA
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_FACTURA" 
BEFORE INSERT ON factura
FOR EACH ROW
BEGIN
    SELECT factura_seq.NEXTVAL INTO :NEW.factura_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_FACTURA" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_PAYMENT_METHODS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_PAYMENT_METHODS" 
BEFORE INSERT ON payment_methods
FOR EACH ROW
BEGIN
    SELECT payment_methods_seq.NEXTVAL INTO :NEW.payment_method_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_PAYMENT_METHODS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_PRODUCTS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_PRODUCTS" 
BEFORE INSERT ON products
FOR EACH ROW
BEGIN
    SELECT products_seq.NEXTVAL INTO :NEW.product_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_PRODUCTS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_USERS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."TR_USERS" 
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    SELECT users_seq.NEXTVAL INTO :NEW.user_id FROM dual;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."TR_USERS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger UPDATE_AVG_PRICE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."UPDATE_AVG_PRICE" 
AFTER INSERT ON cart_items
    FOR EACH ROW
    DECLARE 
    v_total_price NUMBER;
BEGIN    
    SELECT SUM(price * :NEW.quantity)
    INTO v_total_price     FROM products     WHERE product_id = :NEW.product_id;
UPDATE products
    SET price = v_total_price /
    (SELECT SUM(quantity) FROM cart_items WHERE product_id = :NEW.product_id)
    WHERE product_id = :NEW.product_id;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."UPDATE_AVG_PRICE" ENABLE;
--------------------------------------------------------
--  DDL for Trigger VALIDATE_CART_ITEMS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."VALIDATE_CART_ITEMS" 
BEFORE INSERT OR UPDATE ON cart_items
FOR EACH ROW
DECLARE
    max_items_per_cart CONSTANT NUMBER := 10;
BEGIN
    IF :NEW.quantity > max_items_per_cart THEN
        RAISE_APPLICATION_ERROR(-20001, 'No se puede agregar más de ' || max_items_per_cart || ' elementos en un carrito.');
    END IF;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."VALIDATE_CART_ITEMS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger VALIDATE_MIN_PRICE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE TRIGGER "PROYECTOWEB1"."VALIDATE_MIN_PRICE" 
BEFORE 
    INSERT ON products
    FOR EACH ROW
BEGIN    
    IF :NEW.price < 0 
    THEN  RAISE_APPLICATION_ERROR(-20001, 'El precio no puede ser negativo.');    
END IF;
END;
/
ALTER TRIGGER "PROYECTOWEB1"."VALIDATE_MIN_PRICE" ENABLE;
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_CONTACTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ACTUALIZAR_CONTACTO" (
    p_contactenos_id IN NUMBER,
    p_nombre IN VARCHAR2,
    p_apellidos IN VARCHAR2,
    p_correo IN VARCHAR2,
    p_ciudad IN VARCHAR2,
    p_mensaje IN VARCHAR2
) AS
BEGIN
    UPDATE contactenos SET
        nombre = p_nombre,
        apellidos = p_apellidos,
        correo = p_correo,
        ciudad = p_ciudad,
        mensaje = p_mensaje
    WHERE contactenos_id = p_contactenos_id;
    COMMIT;
END ACTUALIZAR_CONTACTO;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_FACTURA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ACTUALIZAR_FACTURA" (
    p_factura_id IN NUMBER,
    p_nombre IN VARCHAR2,
    p_apellidos IN VARCHAR2,
    p_correo IN VARCHAR2,
    p_ciudad IN VARCHAR2,
    p_tarjeta IN VARCHAR2,
    p_codigo IN VARCHAR2,
    p_total IN NUMBER
) IS
BEGIN
    UPDATE factura
    SET nombre = p_nombre,
        apellidos = p_apellidos,
        correo = p_correo,
        ciudad = p_ciudad,
        tarjeta = p_tarjeta,
        codigo = p_codigo,
        total = p_total
    WHERE factura_id = p_factura_id;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END actualizar_factura;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_PRODUCTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ACTUALIZAR_PRODUCTO" (
    p_product_id IN NUMBER,
    p_name IN VARCHAR2,
    p_description IN VARCHAR2,
    p_price IN NUMBER,
    p_category_id IN NUMBER,
    p_image IN VARCHAR2
) IS
BEGIN
    UPDATE products
    SET name = p_name,
        description = p_description,
        price = p_price,
        category_id = p_category_id,
        image = p_image
    WHERE product_id = p_product_id;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END actualizar_producto;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_USUARIO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ACTUALIZAR_USUARIO" (
    p_user_id IN NUMBER,
    p_username IN VARCHAR2,
    p_password IN VARCHAR2,
    p_email IN VARCHAR2
) IS
BEGIN
    UPDATE users
    SET username = p_username,
        password = p_password,
        email = p_email
    WHERE user_id = p_user_id;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END actualizar_usuario;

/
--------------------------------------------------------
--  DDL for Procedure CREATE_CART_PROC
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."CREATE_CART_PROC" (p_user_id NUMBER, p_cart_id OUT NUMBER) AS
BEGIN
    INSERT INTO carts (cart_id, user_id) VALUES (carts_seq.NEXTVAL, p_user_id) RETURNING cart_id INTO p_cart_id;
    COMMIT;
END create_cart_proc;

/
--------------------------------------------------------
--  DDL for Procedure DELETE_CART_ITEMS
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."DELETE_CART_ITEMS" (p_cart_id IN NUMBER) IS
BEGIN
    DELETE FROM cart_items WHERE cart_id = p_cart_id;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END DELETE_CART_ITEMS;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINACONTACTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ELIMINACONTACTO" (pIdDato IN NUMBER) AS
BEGIN
    DELETE FROM contactenos WHERE contactenos_id = pIdDato;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaContacto;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAFACTURA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ELIMINAFACTURA" (pIdDato IN NUMBER) AS
BEGIN
    DELETE FROM factura WHERE factura_id = pIdDato;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaFactura;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAPRODUCTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ELIMINAPRODUCTO" (pProductoId IN NUMBER) AS
BEGIN
    DELETE FROM products WHERE product_id = pProductoId;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaProducto;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAUSUARIO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."ELIMINAUSUARIO" (pUserId IN NUMBER) AS
BEGIN
    DELETE FROM users WHERE user_id = pUserId;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaUsuario;

/
--------------------------------------------------------
--  DDL for Procedure FILTERPRODUCTSBYNAMEPROC
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."FILTERPRODUCTSBYNAMEPROC" (
    p_name IN VARCHAR2,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM products WHERE name LIKE '%' || p_name || '%' AND ROWNUM <= 1;
END;

/
--------------------------------------------------------
--  DDL for Procedure GETCARTITEMSBYCARTID
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."GETCARTITEMSBYCARTID" (
    p_cart_id IN NUMBER,
    p_cursor OUT SYS_REFCURSOR )
IS
BEGIN
    OPEN p_cursor FOR
    SELECT products.product_id, products.name, products.description, products.price, cart_items.quantity
    FROM cart_items
    JOIN products ON cart_items.product_id = products.product_id
    WHERE cart_items.cart_id = p_cart_id;
END;

/
--------------------------------------------------------
--  DDL for Procedure GETPRODUCTBYIDPROC
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."GETPRODUCTBYIDPROC" (
    p_id IN NUMBER,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM products WHERE product_id = p_id;
END;

/
--------------------------------------------------------
--  DDL for Procedure GETPRODUCTSBYCARTIDPROC
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."GETPRODUCTSBYCARTIDPROC" (
    p_id IN NUMBER,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT products.*
    FROM products
    JOIN cart_items ON cart_items.product_id = products.product_id
    WHERE cart_items.cart_id = p_id;
END;

/
--------------------------------------------------------
--  DDL for Procedure GETPRODUCTSBYCATEGORYPROC
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."GETPRODUCTSBYCATEGORYPROC" (
    p_category_id IN NUMBER,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM products WHERE category_id = p_category_id;
END;

/
--------------------------------------------------------
--  DDL for Procedure GET_ALL_CATEGORIES_PROC
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."GET_ALL_CATEGORIES_PROC" (p_result OUT SYS_REFCURSOR) AS
BEGIN
    OPEN p_result FOR
    SELECT * FROM all_categories_view;
END get_all_categories_proc;

/
--------------------------------------------------------
--  DDL for Procedure GET_ALL_PRODUCTS
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."GET_ALL_PRODUCTS" (
    p_result OUT SYS_REFCURSOR )
IS
BEGIN
    OPEN p_result FOR
    SELECT * FROM products;
    -- DECLARE
    --     p_cursor SYS_REFCURSOR;
    -- BEGIN
    --     get_all_products(p_cursor);
    -- END;
EXCEPTION
    WHEN OTHERS THEN
        NULL; 
END;

/
--------------------------------------------------------
--  DDL for Procedure GET_CART_ID_PROC
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."GET_CART_ID_PROC" (
    p_user_id IN NUMBER,
    p_cart_id OUT NUMBER ) AS
BEGIN
    SELECT cart_id INTO p_cart_id FROM carts WHERE user_id = p_user_id;
EXCEPTION
    WHEN NO_DATA_FOUND THEN
        p_cart_id := NULL; -- Handle case where no cart is found for the user
END GET_CART_ID_PROC;

/
--------------------------------------------------------
--  DDL for Procedure INGRESAFACTURA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."INGRESAFACTURA" (
    pNombre IN VARCHAR2,
    pApellidos IN VARCHAR2,
    pCorreo IN VARCHAR2,
    pCiudad IN VARCHAR2,
    pTarjeta IN VARCHAR2,
    pCodigo IN NUMBER,
    pTotal IN NUMBER ) AS
BEGIN
    INSERT INTO factura(nombre, apellidos, correo, ciudad, tarjeta, codigo, total)
    VALUES (pNombre, pApellidos, pCorreo, pCiudad, pTarjeta, pCodigo, pTotal);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END IngresaFactura;

/
--------------------------------------------------------
--  DDL for Procedure INSERTACONTACTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."INSERTACONTACTO" (
    pNombre IN VARCHAR2,
    pApellidos IN VARCHAR2,
    pCorreo IN VARCHAR2,
    pCiudad IN VARCHAR2,
    pMensaje IN VARCHAR2) AS
BEGIN
    INSERT INTO contactenos(nombre, apellidos, correo, ciudad, mensaje)
    VALUES (pNombre, pApellidos, pCorreo, pCiudad, pMensaje);
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END InsertaContacto;

/
--------------------------------------------------------
--  DDL for Procedure INSERT_CART_ITEM
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."INSERT_CART_ITEM" (
    p_cart_id IN NUMBER,
    p_product_id IN NUMBER,
    p_quantity IN NUMBER ) AS
    v_cart_item_id NUMBER;
    v_response BOOLEAN := FALSE;
BEGIN
    -- Obtener el siguiente valor de la secuencia para CART_ITEM_ID
    SELECT cart_items_seq.NEXTVAL INTO v_cart_item_id FROM DUAL;
    INSERT INTO cart_items (cart_item_id, cart_id, product_id, quantity) 
    VALUES (v_cart_item_id, p_cart_id, p_product_id, p_quantity);
    COMMIT; -- Confirmar la transacción para asegurar que la inserción se aplique
    v_response := TRUE;
    DBMS_OUTPUT.PUT_LINE('Item inserted successfully.');
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK; -- Revertir la transacción en caso de error
        DBMS_OUTPUT.PUT_LINE('Error: ' || SQLERRM);
END INSERT_CART_ITEM;

/
--------------------------------------------------------
--  DDL for Procedure LOGIN_PROCEDURE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."LOGIN_PROCEDURE" (
    p_email IN VARCHAR2,
    p_password IN VARCHAR2,
    p_cursor OUT SYS_REFCURSOR
) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM users WHERE email = p_email AND password = p_password;
END LOGIN_PROCEDURE;

/
--------------------------------------------------------
--  DDL for Procedure REGISTARUSUARIO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."REGISTARUSUARIO" (
    pUsername IN VARCHAR2,
    pPassword IN VARCHAR2,
    pEmail IN VARCHAR2 ) AS
BEGIN
    -- Check if the user with this email already exists
    DECLARE
        vUserId NUMBER;
    BEGIN
        SELECT COUNT(*) INTO vUserId FROM users WHERE email = pEmail;
        IF vUserId = 0 THEN
            -- Insert the new user data into the database
            INSERT INTO users (username, password, email)
            VALUES (pUsername, pPassword, pEmail);
            COMMIT;
        END IF;
    END;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END RegistarUsuario;

/
--------------------------------------------------------
--  DDL for Procedure UPDATE_CART_ITEM
--------------------------------------------------------
set define off;

  CREATE OR REPLACE EDITIONABLE PROCEDURE "PROYECTOWEB1"."UPDATE_CART_ITEM" (
    p_cart_id IN NUMBER,
    p_product_id IN NUMBER,
    p_quantity IN NUMBER,
    p_result OUT NUMBER ) AS
BEGIN
    UPDATE cart_items
    SET quantity = p_quantity
    WHERE cart_id = p_cart_id AND product_id = p_product_id;
    p_result := SQL%ROWCOUNT; -- Número de filas afectadas
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        p_result := 0; -- Indicador de error
END;

/
--------------------------------------------------------
--  DDL for Package FINANCIAL_PACKAGE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE PACKAGE "PROYECTOWEB1"."FINANCIAL_PACKAGE" AS
    FUNCTION calculate_interest(principal NUMBER, rate NUMBER, years NUMBER) RETURN NUMBER;
    FUNCTION calculate_monthly_payment(principal NUMBER, rate NUMBER, months NUMBER) RETURN NUMBER;
    FUNCTION calculate_total_amount(principal NUMBER, rate NUMBER, years NUMBER) RETURN NUMBER;
END financial_package;

/
--------------------------------------------------------
--  DDL for Package PRODUCT_PACKAGE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE PACKAGE "PROYECTOWEB1"."PRODUCT_PACKAGE" AS
    FUNCTION get_product_details(product_id NUMBER) RETURN SYS_REFCURSOR;
    PROCEDURE update_product_price(product_id NUMBER, new_price NUMBER);
    FUNCTION get_products_in_category(category_id NUMBER) RETURN SYS_REFCURSOR;
    FUNCTION search_products(keyword VARCHAR2) RETURN SYS_REFCURSOR;
END product_package;

/
--------------------------------------------------------
--  DDL for Package Body FINANCIAL_PACKAGE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE PACKAGE BODY "PROYECTOWEB1"."FINANCIAL_PACKAGE" AS
    FUNCTION calculate_interest(principal NUMBER, rate NUMBER, years NUMBER) RETURN NUMBER IS
    BEGIN
        RETURN (principal * rate * years) / 100;
    END calculate_interest;
    FUNCTION calculate_monthly_payment(principal NUMBER, rate NUMBER, months NUMBER) RETURN NUMBER IS
    BEGIN
        RETURN (principal * rate / 12 * months) / (1 - POWER(1 + rate / 12, -months));
    END calculate_monthly_payment;
    FUNCTION calculate_total_amount(principal NUMBER, rate NUMBER, years NUMBER) RETURN NUMBER IS
    BEGIN
        RETURN principal + calculate_interest(principal, rate, years);
    END calculate_total_amount;
END financial_package;

/
--------------------------------------------------------
--  DDL for Package Body PRODUCT_PACKAGE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE PACKAGE BODY "PROYECTOWEB1"."PRODUCT_PACKAGE" AS
    FUNCTION get_product_details(product_id NUMBER) RETURN SYS_REFCURSOR IS
        product_cursor SYS_REFCURSOR;
    BEGIN
        OPEN product_cursor FOR
            SELECT * FROM products WHERE product_id = product_id;
        RETURN product_cursor;
    END get_product_details;
    PROCEDURE update_product_price(product_id NUMBER, new_price NUMBER) IS
    BEGIN
        UPDATE products SET price = new_price WHERE product_id = product_id;
    END update_product_price;
    FUNCTION get_products_in_category(category_id NUMBER) RETURN SYS_REFCURSOR IS
        products_cursor SYS_REFCURSOR;
    BEGIN
        OPEN products_cursor FOR
            SELECT * FROM products WHERE category_id = category_id;
        RETURN products_cursor;
    END get_products_in_category;
    FUNCTION search_products(keyword VARCHAR2) RETURN SYS_REFCURSOR IS
        search_cursor SYS_REFCURSOR;
    BEGIN
        OPEN search_cursor FOR
            SELECT * FROM products WHERE LOWER(name) LIKE '%' || LOWER(keyword) || '%';
        RETURN search_cursor;
    END search_products;
END product_package;

/
--------------------------------------------------------
--  DDL for Function CALCULATE_AVERAGE_PRICE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."CALCULATE_AVERAGE_PRICE" RETURN NUMBER IS
    avg_price NUMBER(10, 2);
BEGIN
    SELECT AVG(price) INTO avg_price FROM products;
    RETURN avg_price;
END;
SELECT calculate_average_price() AS average_price FROM dual;

/
--------------------------------------------------------
--  DDL for Function CALCULATE_AVG_ITEMS_PER_CART
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."CALCULATE_AVG_ITEMS_PER_CART" RETURN NUMBER IS
    avg_items NUMBER(10, 2);
BEGIN
    SELECT AVG(items_per_cart) INTO avg_items
    FROM (SELECT COUNT(*) AS items_per_cart FROM cart_items GROUP BY cart_id);
    RETURN avg_items;
END;

/
--------------------------------------------------------
--  DDL for Function CALCULATE_CART_SUBTOTAL
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."CALCULATE_CART_SUBTOTAL" (cart_id NUMBER) RETURN NUMBER IS
    subtotal NUMBER(10, 2);
BEGIN
    SELECT SUM(p.price * ci.quantity) INTO subtotal
    FROM cart_items ci
    JOIN products p ON ci.product_id = p.product_id
    WHERE ci.cart_id = cart_id;
    RETURN subtotal;
END;
SELECT cart_id, calculate_cart_subtotal(cart_id) AS subtotal
FROM carts;

/
--------------------------------------------------------
--  DDL for Function CALCULATE_DISCOUNTED_PRICE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."CALCULATE_DISCOUNTED_PRICE" (original_price NUMBER, discount_percent NUMBER) RETURN NUMBER IS
    discounted_price NUMBER(10, 2);
BEGIN
    discounted_price := original_price - (original_price * (discount_percent / 100));
    RETURN discounted_price;
END;
SELECT product_id, name, calculate_discounted_price(price, 10) AS discounted_price
FROM products;

/
--------------------------------------------------------
--  DDL for Function CALCULATE_TOTAL_REVENUE
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."CALCULATE_TOTAL_REVENUE" RETURN NUMBER IS
    total_revenue NUMBER(10, 2);
BEGIN
    SELECT SUM(p.price * ci.quantity) INTO total_revenue
    FROM cart_items ci
    JOIN products p ON ci.product_id = p.product_id;
    RETURN total_revenue;
END;
SELECT calculate_total_revenue() AS total_revenue FROM dual;

/
--------------------------------------------------------
--  DDL for Function GET_CART_ITEM_COUNT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_CART_ITEM_COUNT" (cart_id NUMBER) RETURN NUMBER IS
    item_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO item_count FROM cart_items WHERE cart_id = cart_id;
    RETURN item_count;
END;
SELECT cart_id, get_cart_item_count(cart_id) AS item_count
FROM carts;

/
--------------------------------------------------------
--  DDL for Function GET_CART_TOTAL
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_CART_TOTAL" (cart_id NUMBER) RETURN NUMBER IS
    total_amount NUMBER(10, 2);
BEGIN
    SELECT SUM(p.price * ci.quantity) INTO total_amount
    FROM cart_items ci
    JOIN products p ON ci.product_id = p.product_id
    WHERE ci.cart_id = cart_id;
    RETURN total_amount;
END;
SELECT cart_id, get_cart_total(cart_id) AS total_amount
FROM carts;

/
--------------------------------------------------------
--  DDL for Function GET_CONTACT_COUNT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_CONTACT_COUNT" RETURN NUMBER IS
    contact_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO contact_count FROM contactenos;
    RETURN contact_count;
END;
SELECT get_contact_count() AS total_contacts FROM dual;

/
--------------------------------------------------------
--  DDL for Function GET_MOST_EXPENSIVE_PRODUCT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_MOST_EXPENSIVE_PRODUCT" RETURN VARCHAR2 IS
    product_name VARCHAR2(255);
BEGIN
    SELECT name INTO product_name FROM products
    WHERE price = (SELECT MAX(price) FROM products);
    RETURN product_name;
END;
SELECT get_most_expensive_product() AS most_expensive_product FROM dual;

/
--------------------------------------------------------
--  DDL for Function GET_PAYMENT_METHOD_ID
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_PAYMENT_METHOD_ID" (payment_name VARCHAR2) RETURN NUMBER IS
    method_id NUMBER;
BEGIN
    SELECT payment_method_id INTO method_id FROM payment_methods WHERE name = payment_name;
    RETURN method_id;
END;
SELECT name, get_payment_method_id(name) AS payment_method_id
FROM payment_methods;

/
--------------------------------------------------------
--  DDL for Function GET_PRODUCTS_PER_CATEGORY
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_PRODUCTS_PER_CATEGORY" (category_id NUMBER) RETURN NUMBER IS
    product_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO product_count FROM products WHERE category_id = category_id;
    RETURN product_count;
END;
SELECT category_id, get_products_per_category(category_id) AS product_count
FROM categories;

/
--------------------------------------------------------
--  DDL for Function GET_PRODUCT_INFO
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_PRODUCT_INFO" (product_name VARCHAR2) RETURN VARCHAR2 IS
    product_info VARCHAR2(500);
BEGIN
    SELECT 'Name: ' || name || ', Description: ' || description || ', Price: ' || price
    INTO product_info
    FROM products WHERE name = product_name;
    RETURN product_info;
END;

/
--------------------------------------------------------
--  DDL for Function GET_TOTAL_CART_ITEMS
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_TOTAL_CART_ITEMS" (cart_id NUMBER) RETURN NUMBER IS
    total_items NUMBER;
BEGIN
    SELECT SUM(quantity) INTO total_items FROM cart_items WHERE cart_id = cart_id;
    RETURN total_items;
END;
SELECT cart_id, get_total_cart_items(cart_id) AS total_items
FROM carts;

/
--------------------------------------------------------
--  DDL for Function GET_TOTAL_CATEGORY_COUNT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_TOTAL_CATEGORY_COUNT" RETURN NUMBER IS
    total_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO total_count FROM categories;
    RETURN total_count;
END;
SELECT get_total_category_count() AS total_categories FROM dual;

/
--------------------------------------------------------
--  DDL for Function GET_TOTAL_PRODUCT_COUNT
--------------------------------------------------------

  CREATE OR REPLACE EDITIONABLE FUNCTION "PROYECTOWEB1"."GET_TOTAL_PRODUCT_COUNT" RETURN NUMBER IS
    total_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO total_count FROM products;
    RETURN total_count;
END;
SELECT get_total_product_count() AS total_products FROM dual;

/
--------------------------------------------------------
--  Constraints for Table CATEGORIES
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."CATEGORIES" MODIFY ("CATEGORY_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CATEGORIES" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CATEGORIES" ADD PRIMARY KEY ("CATEGORY_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table CART_ITEMS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."CART_ITEMS" MODIFY ("CART_ITEM_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CART_ITEMS" MODIFY ("CART_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CART_ITEMS" MODIFY ("PRODUCT_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CART_ITEMS" MODIFY ("QUANTITY" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CART_ITEMS" ADD PRIMARY KEY ("CART_ITEM_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PAYMENT_METHODS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."PAYMENT_METHODS" MODIFY ("PAYMENT_METHOD_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."PAYMENT_METHODS" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."PAYMENT_METHODS" ADD PRIMARY KEY ("PAYMENT_METHOD_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table USERS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."USERS" MODIFY ("USER_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."USERS" MODIFY ("USERNAME" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."USERS" MODIFY ("PASSWORD" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."USERS" MODIFY ("EMAIL" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."USERS" ADD PRIMARY KEY ("USER_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table CARTS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."CARTS" MODIFY ("CART_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CARTS" MODIFY ("USER_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CARTS" ADD PRIMARY KEY ("CART_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table FACTURA
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."FACTURA" ADD PRIMARY KEY ("FACTURA_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table CONTACTENOS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."CONTACTENOS" MODIFY ("CONTACTENOS_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CONTACTENOS" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CONTACTENOS" MODIFY ("APELLIDOS" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CONTACTENOS" MODIFY ("CORREO" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CONTACTENOS" MODIFY ("CIUDAD" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CONTACTENOS" MODIFY ("MENSAJE" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."CONTACTENOS" ADD PRIMARY KEY ("CONTACTENOS_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PRODUCTS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."PRODUCTS" MODIFY ("PRODUCT_ID" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."PRODUCTS" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."PRODUCTS" MODIFY ("PRICE" NOT NULL ENABLE);
  ALTER TABLE "PROYECTOWEB1"."PRODUCTS" ADD PRIMARY KEY ("PRODUCT_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table CARTS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."CARTS" ADD CONSTRAINT "FK_USER_ID" FOREIGN KEY ("USER_ID")
	  REFERENCES "PROYECTOWEB1"."USERS" ("USER_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table CART_ITEMS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."CART_ITEMS" ADD FOREIGN KEY ("CART_ID")
	  REFERENCES "PROYECTOWEB1"."CARTS" ("CART_ID") ENABLE;
  ALTER TABLE "PROYECTOWEB1"."CART_ITEMS" ADD FOREIGN KEY ("PRODUCT_ID")
	  REFERENCES "PROYECTOWEB1"."PRODUCTS" ("PRODUCT_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PRODUCTS
--------------------------------------------------------

  ALTER TABLE "PROYECTOWEB1"."PRODUCTS" ADD CONSTRAINT "FK_CATEGORY_ID" FOREIGN KEY ("CATEGORY_ID")
	  REFERENCES "PROYECTOWEB1"."CATEGORIES" ("CATEGORY_ID") ENABLE;
