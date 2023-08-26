Creación de la base:

CREATE USER ProyectoWeb1 IDENTIFIED BY 1234
GRANT CONNECT, RESOURCE TO ProyectoWeb1
ALTER USER ProyectoWeb1 QUOTA unlimited ON USERS;
GRANT CREATE VIEW TO ProyectoWeb1;

Las tablas y los insert:

CREATE TABLE products (
    product_id NUMBER(11) NOT NULL,
    name VARCHAR2(255) NOT NULL,
    description VARCHAR2(255),
    price NUMBER(10, 3) NOT NULL,
    category_id NUMBER(11),
    image VARCHAR2(255) DEFAULT 'assets/no_image.png',
    PRIMARY KEY (product_id));

CREATE TABLE categories (
    category_id NUMBER(11) NOT NULL,
    name VARCHAR2(255) NOT NULL,
    PRIMARY KEY (category_id));

CREATE TABLE users (
    user_id NUMBER(11) NOT NULL,
    username VARCHAR2(50) NOT NULL,
    password VARCHAR2(255) NOT NULL,
    email VARCHAR2(255) NOT NULL,
    PRIMARY KEY (user_id));

CREATE TABLE carts (
    cart_id NUMBER(11) NOT NULL,
    user_id NUMBER(11) NOT NULL,
    PRIMARY KEY (cart_id));

CREATE TABLE cart_items (
    cart_item_id NUMBER(11) NOT NULL,
    cart_id NUMBER(11) NOT NULL,
    product_id NUMBER(11) NOT NULL,
    quantity NUMBER(11) NOT NULL,
    PRIMARY KEY (cart_item_id),
    FOREIGN KEY (cart_id) REFERENCES carts(cart_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id));

CREATE TABLE payment_methods (
    payment_method_id NUMBER(11) NOT NULL,
    name VARCHAR2(255) NOT NULL,
    PRIMARY KEY (payment_method_id));

CREATE TABLE contactenos (
    contactenos_id NUMBER(11) NOT NULL,
    nombre VARCHAR2(255) NOT NULL,
    apellidos VARCHAR2(255) NOT NULL,
    correo VARCHAR2(255) NOT NULL,
    ciudad VARCHAR2(255) NOT NULL,
    mensaje VARCHAR2(255) NOT NULL,
    PRIMARY KEY (contactenos_id));

CREATE TABLE factura (
    factura_id NUMBER PRIMARY KEY,
    nombre VARCHAR2(100),
    apellidos VARCHAR2(100),
    correo VARCHAR2(100),
    ciudad VARCHAR2(100),
    tarjeta VARCHAR2(16),
    codigo VARCHAR2(4),
    total NUMBER(10, 2));


ALTER TABLE products ADD CONSTRAINT fk_category_id FOREIGN KEY (category_id) REFERENCES categories(category_id);
ALTER TABLE carts ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(user_id);

-- Crear secuencias para las claves primarias
CREATE SEQUENCE categories_seq START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE users_seq START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE products_seq START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE contacts_seq START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE carts_seq START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE cart_items_seq START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE payment_methods_seq START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE factura_seq START WITH 1 INCREMENT BY 1;



-- insertar algunas categorías
INSERT INTO categories (category_id, name) VALUES (categories_seq.NEXTVAL, 'Hombres');
INSERT INTO categories (category_id, name) VALUES (categories_seq.NEXTVAL, 'Mujeres');
INSERT INTO categories (category_id, name) VALUES (categories_seq.NEXTVAL, 'Niños');

-- insertar algunos usuarios
INSERT INTO users (user_id, username, password, email) VALUES (users_seq.NEXTVAL, 'john', 'password1', 'john@example.com');
INSERT INTO users (user_id, username, password, email) VALUES (users_seq.NEXTVAL, 'jane', 'password2', 'jane@example.com');
INSERT INTO users (user_id, username, password, email) VALUES (users_seq.NEXTVAL, 'bob', 'password3', 'bob@example.com');

-- insertar algunos productos
INSERT INTO products (product_id, name, description, price, category_id) VALUES (products_seq.NEXTVAL, 'Camiseta para Hombre', '100% Algodón, Cuello Redondo, Manga Corta', 19.990, 1);
INSERT INTO products (product_id, name, description, price, category_id) VALUES (products_seq.NEXTVAL, 'Vestido para Mujer', 'Estampado Floral, Escote en V, Manga Larga', 39.990, 2);
INSERT INTO products (product_id, name, description, price, category_id) VALUES (products_seq.NEXTVAL, 'Jeans para Niños', 'Corte Ajustado, Cintura Ajustable, Cinco Bolsillos', 29.990, 3);
INSERT INTO products (product_id, name, description, price, category_id) VALUES (products_seq.NEXTVAL, 'Sudadera con Capucha para Hombre', 'Mezcla de Algodón/Poliéster, Capucha con Cordón, Bolsillo Canguro', 49.990, 1);
INSERT INTO products (product_id, name, description, price, category_id) VALUES (products_seq.NEXTVAL, 'Falda para Mujer', 'Denim, Corte A, Botones al Frente', 29.990, 2);
INSERT INTO products (product_id, name, description, price, category_id) VALUES (products_seq.NEXTVAL, 'Camiseta para Niños', 'Mezcla de Algodón/Poliéster, Cuello Redondo, Manga Corta', 14.990, 3);
INSERT INTO products (product_id, name, description, price, category_id) VALUES (products_seq.NEXTVAL, 'Jeans para Hombre', 'Corte Recto, Cinco Bolsillos, Cierre con Cremallera', 59.990, 1);

-- insertar algunos métodos de pago
INSERT INTO payment_methods (payment_method_id, name) VALUES (payment_methods_seq.NEXTVAL, 'Credit Card');
INSERT INTO payment_methods (payment_method_id, name) VALUES (payment_methods_seq.NEXTVAL, 'PayPal');



-- insertar algunos carritos de compras
INSERT INTO carts (cart_id, user_id) VALUES (carts_seq.NEXTVAL, 1);
INSERT INTO carts (cart_id, user_id) VALUES (carts_seq.NEXTVAL, 2);

 
-- insertar algunos elementos de carrito
INSERT INTO cart_items (cart_item_id, cart_id, product_id, quantity) VALUES (cart_items_seq.NEXTVAL, 1, 1, 1);
INSERT INTO cart_items (cart_item_id, cart_id, product_id, quantity) VALUES (cart_items_seq.NEXTVAL, 1, 4, 2);
INSERT INTO cart_items (cart_item_id, cart_id, product_id, quantity) VALUES (cart_items_seq.NEXTVAL, 2, 2, 1);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Camisa Polo de Hombre', 'Algodón, Tapeta de Dos Botones, Manga Corta', 24.990, 1);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Blusa de Mujer', 'Chifón, Estampado Floral, Escote en V, Sin Mangas', 34.990, 2);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Sudadera con Capucha para Niños', 'Mezcla de Algodón/Poliéster, Cierre de Cremallera, Bolsillo de Canguro', 24.990, 3);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Pantalón Corto de Hombre', 'Chino, Frente Plano, Cuatro Bolsillos', 39.990, 1);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Jeans de Mujer', 'Ajuste Ajustado, Cintura Alta, Cinco Bolsillos', 49.990, 2);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Vestido para Niños', 'Algodón, Estampado Floral, Cuello Redondo, Manga Corta', 19.990, 3);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Suéter de Hombre', 'Lana Merino, Escote en V, Manga Larga', 69.990, 1);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Cárdigan de Mujer', 'Algodón, Botones en la Parte Delantera, Manga Larga', 44.990, 2);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Pantalón Corto para Niños', 'Algodón, Cintura Elástica, Dos Bolsillos', 14.990, 3);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Blusa de Mujer', 'Seda, Cuello con Volantes, Manga Larga', 69.990, 2);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Sudadera con Capucha para Niños', 'Mezcla de Algodón/Poliéster, Cierre Completo de Cremallera, Bolsillo de Canguro', 24.990, 3);
INSERT INTO products (product_id, name, description, price, category_id)
VALUES (categories_seq.NEXTVAL, 'Jeans de Mujer', 'Ajuste Ajustado, Cintura Alta, Cinco Bolsillos', 49.990, 2);
 
UPDATE products
SET image = 
  CASE product_id
    WHEN 1 THEN 'assets/CamisetaparaHombre.jpg'
    WHEN 2 THEN 'assets/VestidoparaMujer.jpg'
    WHEN 3 THEN 'assets/JeansparaNiños.jpg'
    WHEN 4 THEN 'assets/SudaderaconCapuchaparaHombre.jpg'
    WHEN 5 THEN 'assets/FaldaparaMujer.jpg'
    WHEN 6 THEN 'assets/CamisetaparaNiños.jpg'
    WHEN 7 THEN 'assets/JeansparaHombre.jpg'
    WHEN 8 THEN 'assets/CamisaPolodeHombre.jpg'
    WHEN 9 THEN 'assets/BlusadeMujer.jpg'
    WHEN 10 THEN 'assets/SudaderaconCapuchaparaNiños.jpg'
    WHEN 11 THEN 'assets/PantalónCortodeHombre.jpg'
    WHEN 12 THEN 'assets/JeansdeMujer.jpg'
    WHEN 13 THEN 'assets/VestidoparaNiños.jpg'
    WHEN 14 THEN 'assets/SuéterdeHombre.jpg'
    WHEN 15 THEN 'assets/CárdigandeMujer.jpg'
    WHEN 16 THEN 'assets/PantalónCortoparaNiños.jpg'
    WHEN 17 THEN 'assets/BlusadeMujer2.jpg'
    WHEN 18 THEN 'assets/SudaderaconCapuchaparaNiños2.jpg'
    WHEN 19 THEN 'assets/JeansdeMujer2.jpg'
    ELSE 'assets/no_image.jpg'
  END; 
-- Identificador único para el producto
COMMENT ON COLUMN products.product_id IS 'Identificador único para el producto';
-- Nombre del producto
COMMENT ON COLUMN products.name IS 'Nombre del producto';
-- Descripción del producto
COMMENT ON COLUMN products.description IS 'Descripción del producto';
-- Precio del producto con 3 decimales
COMMENT ON COLUMN products.price IS 'Precio del producto con 3 decimales';
-- Clave externa que hace referencia a la categoría a la que pertenece el producto
COMMENT ON COLUMN products.category_id IS 'Clave externa que hace referencia a la categoría a la que pertenece el producto';
-- Ruta de la imagen del producto (valor por defecto si no hay imagen)
COMMENT ON COLUMN products.image IS 'Ruta de la imagen del producto (valor por defecto si no hay imagen)';

-- Identificador único para la categoría
COMMENT ON COLUMN categories.category_id IS 'Identificador único para la categoría';
-- Nombre de la categoría
COMMENT ON COLUMN categories.name IS 'Nombre de la categoría';

-- Identificador único para el usuario
COMMENT ON COLUMN users.user_id IS 'Identificador único para el usuario';
-- Nombre de usuario del usuario
COMMENT ON COLUMN users.username IS 'Nombre de usuario del usuario';
-- Contraseña del usuario (hash o encriptada)
COMMENT ON COLUMN users.password IS 'Contraseña del usuario (hash o encriptada)';
-- Dirección de correo electrónico del usuario
COMMENT ON COLUMN users.email IS 'Dirección de correo electrónico del usuario'; 
-- Identificador único para el carrito
COMMENT ON COLUMN carts.cart_id IS 'Identificador único para el carrito';
-- Clave externa que hace referencia al usuario dueño del carrito
COMMENT ON COLUMN carts.user_id IS 'Clave externa que hace referencia al usuario dueño del carrito';

-- Identificador único para el elemento del carrito
COMMENT ON COLUMN cart_items.cart_item_id IS 'Identificador único para el elemento del carrito';
-- Clave externa que hace referencia al carrito al que pertenece el elemento
COMMENT ON COLUMN cart_items.cart_id IS 'Clave externa que hace referencia al carrito al que pertenece el elemento';
-- Clave externa que hace referencia al producto en el carrito
COMMENT ON COLUMN cart_items.product_id IS 'Clave externa que hace referencia al producto en el carrito';
-- Cantidad del producto en el carrito
COMMENT ON COLUMN cart_items.quantity IS 'Cantidad del producto en el carrito';

-- Identificador único para el método de pago
COMMENT ON COLUMN payment_methods.payment_method_id IS 'Identificador único para el método de pago';
-- Nombre del método de pago
COMMENT ON COLUMN payment_methods.name IS 'Nombre del método de pago';

-- Identificador único para el mensaje de contactenos
COMMENT ON COLUMN contactenos.contactenos_id IS 'Identificador único para el mensaje de contactenos';
-- Nombre del remitente del mensaje
COMMENT ON COLUMN contactenos.nombre IS 'Nombre del remitente del mensaje';
-- Apellidos del remitente del mensaje
COMMENT ON COLUMN contactenos.apellidos IS 'Apellidos del remitente del mensaje';
-- Dirección de correo del remitente
COMMENT ON COLUMN contactenos.correo IS 'Dirección de correo del remitente';
-- Ciudad del remitente
COMMENT ON COLUMN contactenos.ciudad IS 'Ciudad del remitente';
-- Contenido del mensaje enviado
COMMENT ON COLUMN contactenos.mensaje IS 'Contenido del mensaje enviado';

-- Identificador único para la factura
COMMENT ON COLUMN factura.factura_id IS 'Identificador único para la factura';
-- Nombre del cliente
COMMENT ON COLUMN factura.nombre IS 'Nombre del cliente';
-- Apellidos del cliente
COMMENT ON COLUMN factura.apellidos IS 'Apellidos del cliente';
-- Dirección de correo del cliente
COMMENT ON COLUMN factura.correo IS 'Dirección de correo del cliente';
-- Ciudad del cliente
COMMENT ON COLUMN factura.ciudad IS 'Ciudad del cliente';
-- Número de tarjeta de crédito/débito
COMMENT ON COLUMN factura.tarjeta IS 'Número de tarjeta de crédito/débito';
-- Código de seguridad de la tarjeta
COMMENT ON COLUMN factura.codigo IS 'Código de seguridad de la tarjeta';
-- Total de la factura
COMMENT ON COLUMN factura.total IS 'Total de la factura';


 
Procedimientos:

-- Descripción: Procedimiento almacenado para obtener todos los productos de la tabla "products".
--   - p_result: Cursor de referencia de salida que contendrá los resultados de la consulta.
CREATE OR REPLACE PROCEDURE get_all_products(
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


CREATE OR REPLACE PROCEDURE InsertaContacto(
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

CREATE OR REPLACE PROCEDURE IngresaFactura(
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

 
CREATE OR REPLACE PROCEDURE EliminaContacto(pIdDato IN NUMBER) AS
BEGIN
    DELETE FROM contactenos WHERE contactenos_id = pIdDato;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaContacto;


CREATE OR REPLACE PROCEDURE EliminaFactura(pIdDato IN NUMBER) AS
BEGIN
    DELETE FROM factura WHERE factura_id = pIdDato;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaFactura;

CREATE OR REPLACE PROCEDURE RegistarUsuario(
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
CREATE OR REPLACE PROCEDURE EliminaUsuario(pUserId IN NUMBER) AS
BEGIN
    DELETE FROM users WHERE user_id = pUserId;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaUsuario;

CREATE OR REPLACE PROCEDURE EliminaProducto(pProductoId IN NUMBER) AS
BEGIN
    DELETE FROM products WHERE product_id = pProductoId;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END EliminaProducto;

CREATE OR REPLACE PROCEDURE INSERT_CART_ITEM(
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
 
CREATE OR REPLACE PROCEDURE update_cart_item(
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

CREATE OR REPLACE PROCEDURE create_cart_proc(p_user_id NUMBER, p_cart_id OUT NUMBER) AS
BEGIN
    INSERT INTO carts (cart_id, user_id) VALUES (carts_seq.NEXTVAL, p_user_id) RETURNING cart_id INTO p_cart_id;
    COMMIT;
END create_cart_proc;

CREATE OR REPLACE PROCEDURE GetCartItemsByCartId(
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

 
CREATE OR REPLACE PROCEDURE GET_CART_ID_PROC (
    p_user_id IN NUMBER,
    p_cart_id OUT NUMBER ) AS
BEGIN
    SELECT cart_id INTO p_cart_id FROM carts WHERE user_id = p_user_id;
EXCEPTION
    WHEN NO_DATA_FOUND THEN
        p_cart_id := NULL; -- Handle case where no cart is found for the user
END GET_CART_ID_PROC;

CREATE OR REPLACE PROCEDURE DELETE_CART_ITEMS(p_cart_id IN NUMBER) IS
BEGIN
    DELETE FROM cart_items WHERE cart_id = p_cart_id;
    COMMIT;
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE;
END DELETE_CART_ITEMS;
CREATE OR REPLACE PROCEDURE get_all_categories_proc(p_result OUT SYS_REFCURSOR) AS
BEGIN
    OPEN p_result FOR
    SELECT * FROM all_categories_view;
END get_all_categories_proc;

CREATE OR REPLACE PROCEDURE GetProductsByCategoryProc (
    p_category_id IN NUMBER,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM products WHERE category_id = p_category_id;
END;

CREATE OR REPLACE PROCEDURE GetProductByIdProc (
    p_id IN NUMBER,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM products WHERE product_id = p_id;
END;
 
CREATE OR REPLACE PROCEDURE FilterProductsByNameProc (
    p_name IN VARCHAR2,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM products WHERE name LIKE '%' || p_name || '%' AND ROWNUM <= 1;
END;

CREATE OR REPLACE PROCEDURE GetProductsByCartIdProc (
    p_id IN NUMBER,
    p_cursor OUT SYS_REFCURSOR ) AS
BEGIN
    OPEN p_cursor FOR
    SELECT products.*
    FROM products
    JOIN cart_items ON cart_items.product_id = products.product_id
    WHERE cart_items.cart_id = p_id;
END;

CREATE OR REPLACE PROCEDURE LOGIN_PROCEDURE (
    p_email IN VARCHAR2,
    p_password IN VARCHAR2,
    p_cursor OUT SYS_REFCURSOR
) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM users WHERE email = p_email AND password = p_password;
END LOGIN_PROCEDURE;

CREATE OR REPLACE PROCEDURE ACTUALIZAR_CONTACTO (
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




CREATE OR REPLACE PROCEDURE actualizar_factura(
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



CREATE OR REPLACE PROCEDURE actualizar_producto(
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



CREATE OR REPLACE PROCEDURE actualizar_usuario(
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

CREATE OR REPLACE PROCEDURE LOGIN_PROCEDURE (
    p_email IN VARCHAR2,
    p_password IN VARCHAR2,
    p_cursor OUT SYS_REFCURSOR
) AS
BEGIN
    OPEN p_cursor FOR
    SELECT * FROM users WHERE email = p_email AND password = p_password;
END LOGIN_PROCEDURE;

CREATE OR REPLACE PROCEDURE ACTUALIZAR_CONTACTO (
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




CREATE OR REPLACE PROCEDURE actualizar_factura(
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



CREATE OR REPLACE PROCEDURE actualizar_producto(
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



CREATE OR REPLACE PROCEDURE actualizar_usuario(
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


Trigger:

CREATE OR REPLACE TRIGGER tr_contactenos
BEFORE INSERT ON contactenos
FOR EACH ROW
BEGIN
    SELECT contacts_seq.NEXTVAL INTO :NEW.contactenos_id FROM dual;
END;


CREATE OR REPLACE TRIGGER tr_users
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    SELECT users_seq.NEXTVAL INTO :NEW.user_id FROM dual;
END;

create or replace TRIGGER tr_factura
BEFORE INSERT ON factura
FOR EACH ROW
BEGIN
    SELECT factura_seq.NEXTVAL INTO :NEW.factura_id FROM dual;
END;

CREATE OR REPLACE TRIGGER tr_categories
BEFORE INSERT ON categories
FOR EACH ROW
BEGIN
    SELECT categories_seq.NEXTVAL INTO :NEW.category_id FROM dual;
END;


CREATE OR REPLACE TRIGGER tr_products
BEFORE INSERT ON products
FOR EACH ROW
BEGIN
    SELECT products_seq.NEXTVAL INTO :NEW.product_id FROM dual;
END;

CREATE OR REPLACE TRIGGER tr_carts
BEFORE INSERT ON carts
FOR EACH ROW
BEGIN
    SELECT carts_seq.NEXTVAL INTO :NEW.cart_id FROM dual;
END;

CREATE OR REPLACE TRIGGER tr_cart_items
BEFORE INSERT ON cart_items
FOR EACH ROW
BEGIN
    SELECT cart_items_seq.NEXTVAL INTO :NEW.cart_item_id FROM dual;
END;

CREATE OR REPLACE TRIGGER tr_payment_methods
BEFORE INSERT ON payment_methods
FOR EACH ROW
BEGIN
    SELECT payment_methods_seq.NEXTVAL INTO :NEW.payment_method_id FROM dual;
END;
 
VISTAS

CREATE OR REPLACE VIEW contactenos_vw AS
SELECT contactenos_id, nombre, apellidos, correo, ciudad, mensaje
FROM contactenos;


CREATE OR REPLACE VIEW factura_vw AS
SELECT factura_id, nombre, apellidos, correo, ciudad, tarjeta, codigo, total
FROM factura;


CREATE OR REPLACE VIEW users_vw AS
SELECT user_id, username, email
FROM users;


CREATE OR REPLACE VIEW products_vw AS
SELECT product_id, name, description, price
FROM products;

CREATE OR REPLACE VIEW categories_view AS
SELECT c.category_id, c.name AS category_name
FROM categories c;

CREATE OR REPLACE VIEW products_by_category AS
SELECT p.*, c.name AS category_name
FROM products p
JOIN categories c ON p.category_id = c.category_id;

CREATE VIEW all_categories_view AS
SELECT * FROM categories;

CREATE VIEW v_product_category AS
SELECT p.product_id, p.name AS product_name, p.description, p.price, c.name AS category_name
FROM products p
JOIN categories c ON p.category_id = c.category_id;
SELECT * FROM v_product_category;

CREATE VIEW v_user_carts AS
SELECT u.user_id, u.username, c.cart_id
FROM users u
LEFT JOIN carts c ON u.user_id = c.user_id;
SELECT * FROM v_user_carts;

CREATE VIEW v_cart_details AS
SELECT ci.cart_item_id, c.cart_id, p.name AS product_name, ci.quantity, p.price
FROM cart_items ci
JOIN products p ON ci.product_id = p.product_id
JOIN carts c ON ci.cart_id = c.cart_id;
SELECT * FROM v_cart_details;

CREATE VIEW v_payment_methods AS
SELECT payment_method_id, name
FROM payment_methods;
SELECT * FROM v_payment_methods;

CREATE VIEW v_cart_products AS
SELECT c.cart_id, p.name AS product_name, ci.quantity, p.price
FROM cart_items ci
JOIN products p ON ci.product_id = p.product_id
JOIN carts c ON ci.cart_id = c.cart_id;
SELECT * FROM v_cart_products;

CREATE VIEW v_popular_products AS
SELECT p.product_id, p.name AS product_name, COUNT(ci.cart_item_id) AS purchase_count
FROM products p
LEFT JOIN cart_items ci ON p.product_id = ci.product_id
GROUP BY p.product_id, p.name
ORDER BY purchase_count DESC;
SELECT * FROM v_popular_products;

CREATE VIEW v_user_total_spent AS
SELECT u.user_id, u.username, SUM(p.price * ci.quantity) AS total_spent
FROM users u
LEFT JOIN carts c ON u.user_id = c.user_id
LEFT JOIN cart_items ci ON c.cart_id = ci.cart_id
LEFT JOIN products p ON ci.product_id = p.product_id
GROUP BY u.user_id, u.username;
SELECT * FROM v_user_total_spent;

CREATE VIEW v_women_products AS
SELECT p.product_id, p.name AS product_name, p.description, p.price
FROM products p
JOIN categories c ON p.category_id = c.category_id
WHERE c.name = 'Mujeres';
SELECT * FROM v_women_products;

CREATE VIEW v_product_categories_payment AS
SELECT p.product_id, p.name AS product_name, c.name AS category_name, pm.name AS payment_method
FROM products p
JOIN categories c ON p.category_id = c.category_id
CROSS JOIN payment_methods pm;
SELECT * FROM v_product_categories_payment;

CREATE VIEW v_user_cart_products AS
SELECT u.username, p.name AS product_name, ci.quantity, p.price
FROM users u
JOIN carts c ON u.user_id = c.user_id
JOIN cart_items ci ON c.cart_id = ci.cart_id
JOIN products p ON ci.product_id = p.product_id;
SELECT * FROM v_user_cart_products;


 
FUNCIONES

CREATE OR REPLACE FUNCTION get_cart_total(cart_id NUMBER) RETURN NUMBER IS
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


CREATE OR REPLACE FUNCTION calculate_average_price RETURN NUMBER IS
    avg_price NUMBER(10, 2);
BEGIN
    SELECT AVG(price) INTO avg_price FROM products;
    RETURN avg_price;
END;
SELECT calculate_average_price() AS average_price FROM dual;


CREATE OR REPLACE FUNCTION calculate_discounted_price(original_price NUMBER, discount_percent NUMBER) RETURN NUMBER IS
    discounted_price NUMBER(10, 2);
BEGIN
    discounted_price := original_price - (original_price * (discount_percent / 100));
    RETURN discounted_price;
END;
SELECT product_id, name, calculate_discounted_price(price, 10) AS discounted_price
FROM products;


CREATE OR REPLACE FUNCTION get_cart_item_count(cart_id NUMBER) RETURN NUMBER IS
    item_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO item_count FROM cart_items WHERE cart_id = cart_id;
    RETURN item_count;
END;
SELECT cart_id, get_cart_item_count(cart_id) AS item_count
FROM carts;

CREATE OR REPLACE FUNCTION calculate_total_revenue RETURN NUMBER IS
    total_revenue NUMBER(10, 2);
BEGIN
    SELECT SUM(p.price * ci.quantity) INTO total_revenue
    FROM cart_items ci
    JOIN products p ON ci.product_id = p.product_id;
    RETURN total_revenue;
END;
SELECT calculate_total_revenue() AS total_revenue FROM dual;


CREATE OR REPLACE FUNCTION get_products_per_category(category_id NUMBER) RETURN NUMBER IS
    product_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO product_count FROM products WHERE category_id = category_id;
    RETURN product_count;
END;
SELECT category_id, get_products_per_category(category_id) AS product_count
FROM categories;


CREATE OR REPLACE FUNCTION get_total_product_count RETURN NUMBER IS
    total_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO total_count FROM products;
    RETURN total_count;
END;
SELECT get_total_product_count() AS total_products FROM dual;


CREATE OR REPLACE FUNCTION get_total_cart_items(cart_id NUMBER) RETURN NUMBER IS
    total_items NUMBER;
BEGIN
    SELECT SUM(quantity) INTO total_items FROM cart_items WHERE cart_id = cart_id;
    RETURN total_items;
END;
SELECT cart_id, get_total_cart_items(cart_id) AS total_items
FROM carts;

 
CREATE OR REPLACE FUNCTION get_payment_method_id(payment_name VARCHAR2) RETURN NUMBER IS
    method_id NUMBER;
BEGIN
    SELECT payment_method_id INTO method_id FROM payment_methods WHERE name = payment_name;
    RETURN method_id;
END;
SELECT name, get_payment_method_id(name) AS payment_method_id
FROM payment_methods;

CREATE OR REPLACE FUNCTION get_total_category_count RETURN NUMBER IS
    total_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO total_count FROM categories;
    RETURN total_count;
END;
SELECT get_total_category_count() AS total_categories FROM dual;


CREATE OR REPLACE FUNCTION calculate_cart_subtotal(cart_id NUMBER) RETURN NUMBER IS
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


CREATE OR REPLACE FUNCTION get_most_expensive_product RETURN VARCHAR2 IS
    product_name VARCHAR2(255);
BEGIN
    SELECT name INTO product_name FROM products
    WHERE price = (SELECT MAX(price) FROM products);
    RETURN product_name;
END;
SELECT get_most_expensive_product() AS most_expensive_product FROM dual;

 
CREATE OR REPLACE FUNCTION get_contact_count RETURN NUMBER IS
    contact_count NUMBER;
BEGIN
    SELECT COUNT(*) INTO contact_count FROM contactenos;
    RETURN contact_count;
END;
SELECT get_contact_count() AS total_contacts FROM dual;


CREATE OR REPLACE FUNCTION calculate_avg_items_per_cart RETURN NUMBER IS
    avg_items NUMBER(10, 2);
BEGIN
    SELECT AVG(items_per_cart) INTO avg_items
    FROM (SELECT COUNT(*) AS items_per_cart FROM cart_items GROUP BY cart_id);
    RETURN avg_items;
END;
SELECT calculate_avg_items_per_cart() AS avg_items_per_cart FROM dual;


CREATE OR REPLACE FUNCTION get_product_info(product_name VARCHAR2) RETURN VARCHAR2 IS
    product_info VARCHAR2(500);
BEGIN
    SELECT 'Name: ' || name || ', Description: ' || description || ', Price: ' || price
    INTO product_info
    FROM products WHERE name = product_name;
    RETURN product_info;
END;
SELECT get_product_info('Camiseta para Hombre') AS product_information FROM dual;



TRIGGERS

CREATE OR REPLACE TRIGGER contactenos_trigger
BEFORE INSERT ON contactenos
FOR EACH ROW
BEGIN
    :NEW.contactenos_id := contacts_seq.NEXTVAL;
END;
INSERT INTO contactenos (nombre, apellidos, correo, ciudad, mensaje)
VALUES ('Juan', 'Pérez', 'juan@example.com', 'Ciudad', 'Mensaje de prueba');
SELECT * FROM contactenos WHERE correo = 'juan@example.com';
CREATE OR REPLACE TRIGGER validate_cart_items
BEFORE INSERT OR UPDATE ON cart_items
FOR EACH ROW
DECLARE
    max_items_per_cart CONSTANT NUMBER := 10;
BEGIN
    IF :NEW.quantity > max_items_per_cart THEN
        RAISE_APPLICATION_ERROR(-20001, 'No se puede agregar más de ' || max_items_per_cart || ' elementos en un carrito.');
    END IF;
END;
INSERT INTO cart_items (cart_item_id, cart_id, product_id, quantity)
VALUES (cart_items_seq.NEXTVAL, 1, 2, 9);
SELECT * FROM cart_items;

--Actualiza precio promedio de productos después de una compra
CREATE OR REPLACE TRIGGER update_avg_price
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
SELECT * FROM products WHERE product_id = 1; 

CREATE OR REPLACE TRIGGER prevent_category_deletion
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
SELECT * FROM categories;
--Precio mínimo de productos en una inserción
CREATE OR REPLACE TRIGGER validate_min_price 
BEFORE 
    INSERT ON products
    FOR EACH ROW
BEGIN    
    IF :NEW.price < 0 
    THEN  RAISE_APPLICATION_ERROR(-20001, 'El precio no puede ser negativo.');    
END IF;
END;
-- Intentar insertar un producto con precio negativo
    INSERT INTO products (product_id, name, description, price, category_id) 
    VALUES (products_seq.NEXTVAL, 'Producto Invalido', 'Este producto tiene precio negativo', -10, 1); 
-- Insertar un producto válido
INSERT INTO products (product_id, name, description, price, category_id) 
    VALUES (products_seq.NEXTVAL, 'Producto Valido', 'Este producto tiene precio positivo', 50, 1);
SELECT * FROM products;
 
PAQUETES

CREATE OR REPLACE PACKAGE financial_package AS
    FUNCTION calculate_interest(principal NUMBER, rate NUMBER, years NUMBER) RETURN NUMBER;
    FUNCTION calculate_monthly_payment(principal NUMBER, rate NUMBER, months NUMBER) RETURN NUMBER;
    FUNCTION calculate_total_amount(principal NUMBER, rate NUMBER, years NUMBER) RETURN NUMBER;
END financial_package;
CREATE OR REPLACE PACKAGE BODY financial_package AS
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

SELECT financial_package.calculate_interest(1000, 5, 2) AS interest FROM dual;
-- Calcular pago mensual
SELECT financial_package.calculate_monthly_payment(10000, 6, 24) AS monthly_payment FROM dual;
-- Calcular monto total
SELECT financial_package.calculate_total_amount(5000, 4, 3) AS total_amount FROM dual;

 
CREATE OR REPLACE PACKAGE product_package AS
    FUNCTION get_product_details(product_id NUMBER) RETURN SYS_REFCURSOR;
    PROCEDURE update_product_price(product_id NUMBER, new_price NUMBER);
    FUNCTION get_products_in_category(category_id NUMBER) RETURN SYS_REFCURSOR;
    FUNCTION search_products(keyword VARCHAR2) RETURN SYS_REFCURSOR;
END product_package;
CREATE OR REPLACE PACKAGE BODY product_package AS
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

 
CURSORES

DECLARE
    CURSOR user_cursor IS
        SELECT * FROM users;
    user_record users%ROWTYPE;
BEGIN
    OPEN user_cursor;
    LOOP
        FETCH user_cursor INTO user_record;
        EXIT WHEN user_cursor%NOTFOUND;
        DBMS_OUTPUT.PUT_LINE('User ID: ' || user_record.user_id || ', Username: ' || user_record.username);
    END LOOP;
    CLOSE user_cursor;
END;


DECLARE
    CURSOR category_cursor IS
        SELECT * FROM categories;
    category_record categories%ROWTYPE;
    product_count NUMBER;
BEGIN
    OPEN category_cursor;
    LOOP
        FETCH category_cursor INTO category_record;
        EXIT WHEN category_cursor%NOTFOUND;
        SELECT COUNT(*) INTO product_count FROM products WHERE category_id = category_record.category_id;
        DBMS_OUTPUT.PUT_LINE('Category: ' || category_record.name || ', Product Count: ' || product_count);
    END LOOP;
    CLOSE category_cursor;
END;

 
DECLARE
    CURSOR category_products_cursor(category_id NUMBER) IS
        SELECT * FROM products WHERE category_id = category_id;
    product_record products%ROWTYPE;
BEGIN
    OPEN category_products_cursor(1);
    LOOP
        FETCH category_products_cursor INTO product_record;
        EXIT WHEN category_products_cursor%NOTFOUND;
        DBMS_OUTPUT.PUT_LINE('Product: ' || product_record.name || ', Price: ' || product_record.price);
    END LOOP;
    CLOSE category_products_cursor;
END;


DECLARE
    CURSOR user_cart_cursor IS
        SELECT u.user_id, u.username, c.cart_id
        FROM users u
        JOIN carts c ON u.user_id = c.user_id;
    user_cart_record user_cart_cursor%ROWTYPE;
BEGIN
    OPEN user_cart_cursor;
    LOOP
        FETCH user_cart_cursor INTO user_cart_record;
        EXIT WHEN user_cart_cursor%NOTFOUND;
        DBMS_OUTPUT.PUT_LINE('User ID: ' || user_cart_record.user_id || ', Username: ' || user_cart_record.username || ', Cart ID: ' || user_cart_record.cart_id);
    END LOOP;
    CLOSE user_cart_cursor;
END;


DECLARE
    CURSOR price_range_cursor(min_price NUMBER, max_price NUMBER) IS
        SELECT * FROM products WHERE price BETWEEN min_price AND max_price;
    product_price_record products%ROWTYPE;
BEGIN
    FOR product_price_record IN price_range_cursor(20, 50) LOOP
        DBMS_OUTPUT.PUT_LINE('Product: ' || product_price_record.name || ', Price: ' || product_price_record.price);
    END LOOP;
END;
DECLARE
    CURSOR empty_cart_users_cursor IS
        SELECT u.*, c.cart_id
        FROM users u
        LEFT JOIN carts c ON u.user_id = c.user_id
        WHERE c.cart_id IS NULL;
    empty_cart_user_record empty_cart_users_cursor%ROWTYPE;
BEGIN
    OPEN empty_cart_users_cursor;
    LOOP
        FETCH empty_cart_users_cursor INTO empty_cart_user_record;
        EXIT WHEN empty_cart_users_cursor%NOTFOUND;
        DBMS_OUTPUT.PUT_LINE('User: ' || empty_cart_user_record.username || ', Cart ID: ' || empty_cart_user_record.cart_id);
    END LOOP;
    CLOSE empty_cart_users_cursor;
END;


DECLARE
    CURSOR product_by_name_cursor(product_name VARCHAR2) IS
        SELECT * FROM products WHERE name LIKE '%' || product_name || '%';
    product_by_name_record product_by_name_cursor%ROWTYPE;
BEGIN
    FOR product_by_name_record IN product_by_name_cursor('Jeans') LOOP
        DBMS_OUTPUT.PUT_LINE('Product: ' || product_by_name_record.name || ', Price: ' || product_by_name_record.price);
    END LOOP;
END;

DECLARE
    CURSOR cart_user_products_cursor(user_id NUMBER) IS
        SELECT p.name, ci.quantity
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.product_id
        JOIN carts c ON ci.cart_id = c.cart_id
        WHERE c.user_id = user_id;
    cart_user_product_record cart_user_products_cursor%ROWTYPE;
BEGIN
    FOR cart_user_product_record IN cart_user_products_cursor(1) LOOP
        DBMS_OUTPUT.PUT_LINE('Product: ' || cart_user_product_record.name || ', Quantity: ' || cart_user_product_record.quantity);
    END LOOP;
END;
DECLARE
    CURSOR cart_products_by_quantity_cursor(min_quantity NUMBER, max_quantity NUMBER) IS
        SELECT p.name, ci.quantity
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.product_id
        WHERE ci.quantity BETWEEN min_quantity AND max_quantity;
    cart_product_by_quantity_record cart_products_by_quantity_cursor%ROWTYPE;
BEGIN
    FOR cart_product_by_quantity_record IN cart_products_by_quantity_cursor(1, 5) LOOP
        DBMS_OUTPUT.PUT_LINE('Product: ' || cart_product_by_quantity_record.name || ', Quantity: ' || cart_product_by_quantity_record.quantity);
    END LOOP;
END;


DECLARE
    CURSOR users_by_email_cursor(email VARCHAR2) IS
        SELECT * FROM users WHERE email = email;
    user_by_email_record users%ROWTYPE;
BEGIN
    OPEN users_by_email_cursor('john@example.com');
    FETCH users_by_email_cursor INTO user_by_email_record;
    IF users_by_email_cursor%FOUND THEN
        DBMS_OUTPUT.PUT_LINE('User ID: ' || user_by_email_record.user_id || ', Username: ' || user_by_email_record.username);
    ELSE
        DBMS_OUTPUT.PUT_LINE('User not found.');
    END IF;
    CLOSE users_by_email_cursor;
END;


DECLARE
    CURSOR products_by_price_cursor(min_price NUMBER, max_price NUMBER) IS
        SELECT * FROM products WHERE price BETWEEN min_price AND max_price;
    product_by_price_record products%ROWTYPE;
BEGIN
    FOR product_by_price_record IN products_by_price_cursor(20, 50) LOOP
        DBMS_OUTPUT.PUT_LINE('Product: ' || product_by_price_record.name || ', Price: ' || product_by_price_record.price);
    END LOOP;
END;
 
DECLARE
    CURSOR products_by_keyword_and_price_cursor(keyword VARCHAR2, max_price NUMBER) IS
        SELECT * FROM products WHERE LOWER(name) LIKE '%' || LOWER(keyword) || '%' AND price <= max_price;
    product_by_keyword_and_price_record products%ROWTYPE;
BEGIN
    FOR product_by_keyword_and_price_record IN products_by_keyword_and_price_cursor('Jeans', 40) LOOP
        DBMS_OUTPUT.PUT_LINE('Product: ' || product_by_keyword_and_price_record.name || ', Price: ' || product_by_keyword_and_price_record.price);
    END LOOP;
END;


DECLARE
    CURSOR cart_with_details_cursor(user_id NUMBER) IS
        SELECT c.cart_id, p.name, ci.quantity
        FROM carts c
        JOIN cart_items ci ON c.cart_id = ci.cart_id
        JOIN products p ON ci.product_id = p.product_id
        WHERE c.user_id = user_id;
    cart_with_details_record cart_with_details_cursor%ROWTYPE;
BEGIN
    FOR cart_with_details_record IN cart_with_details_cursor(1) LOOP
        DBMS_OUTPUT.PUT_LINE('Cart ID: ' || cart_with_details_record.cart_id || ', Product: ' || cart_with_details_record.name || ', Quantity: ' || cart_with_details_record.quantity);
    END LOOP;
END;


DECLARE
    CURSOR users_with_empty_carts_cursor IS
        SELECT u.user_id, u.username
        FROM users u
        LEFT JOIN carts c ON u.user_id = c.user_id
        WHERE c.cart_id IS NULL;
    user_with_empty_cart_record users_with_empty_carts_cursor%ROWTYPE;
BEGIN
    FOR user_with_empty_cart_record IN users_with_empty_carts_cursor LOOP
        DBMS_OUTPUT.PUT_LINE('User ID: ' || user_with_empty_cart_record.user_id || ', Username: ' || user_with_empty_cart_record.username);
    END LOOP;
END;
 
DECLARE
    CURSOR most_expensive_products_cursor(category_id NUMBER) IS
        SELECT p.*
        FROM products p
        WHERE p.price = (SELECT MAX(price) FROM products WHERE category_id = p.category_id)
          AND p.category_id = category_id;
    most_expensive_product_record most_expensive_products_cursor%ROWTYPE;
BEGIN
    FOR most_expensive_product_record IN most_expensive_products_cursor(1) LOOP
        DBMS_OUTPUT.PUT_LINE('Product: ' || most_expensive_product_record.name || ', Price: ' || most_expensive_product_record.price);
    END LOOP;
END;


DECLARE
    CURSOR products_without_image_cursor IS
        SELECT * FROM products WHERE image = 'assets/no_image.png';
    product_without_image_record products_without_image_cursor%ROWTYPE;
BEGIN
    OPEN products_without_image_cursor;
    LOOP
        FETCH products_without_image_cursor INTO product_without_image_record;
        EXIT WHEN products_without_image_cursor%NOTFOUND;
        DBMS_OUTPUT.PUT_LINE('Product: ' || product_without_image_record.name);
    END LOOP;
    CLOSE products_without_image_cursor;
END;



