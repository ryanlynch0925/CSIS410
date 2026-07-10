INSERT INTO users (
    first_name,
    last_name,
    username,
    email,
    password_hash,
    role
)
VALUES
(
    'Admin',
    'User',
    'admin',
    'admin@example.com',
    '$2y$12$5MXutRLzH1QVvEJkj7Qeu.pLSmeBWccNKc5USiQeT3PeRiSEG315O',
    'administrator'
),
(
    'Publisher',
    'User',
    'publisher',
    'publisher@example.com',
    '$2y$12$0VjCZRVECp7XMd8jmJefYuiEJkFM8NFxk1UDKgM7I8DJvT02dYQFe',
    'publisher'
),
(
    'Customer',
    'User',
    'customer',
    'customer@example.com',
    '$2y$12$Z/qlKsEIWTnxs6vxrJKU0.p/sO5u.uD5JR.KfYFOlIYg98c5pXYjG',
    'customer'
)
ON DUPLICATE KEY UPDATE
    first_name = VALUES(first_name),
    last_name = VALUES(last_name),
    email = VALUES(email),
    password_hash = VALUES(password_hash),
    role = VALUES(role);