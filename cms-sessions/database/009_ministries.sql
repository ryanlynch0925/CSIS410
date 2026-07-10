CREATE TABLE IF NOT EXISTS ministries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ministry_name VARCHAR(150) NOT NULL,
    ministry_description TEXT NOT NULL,
    scripture VARCHAR(255) NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_by INT NULL,
    updated_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (created_by) REFERENCES users(id)
        ON DELETE SET NULL,

    FOREIGN KEY (updated_by) REFERENCES users(id)
        ON DELETE SET NULL
);