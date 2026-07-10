CREATE TABLE IF NOT EXISTS pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_title VARCHAR(100) NOT NULL,
    page_slug VARCHAR(100) NOT NULL UNIQUE,
    page_heading VARCHAR(150) NOT NULL,
    page_content TEXT NOT NULL,
    status ENUM('draft', 'published') NOT NULL DEFAULT 'published',
    created_by INT NULL,
    updated_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (created_by) REFERENCES users(id)
        ON DELETE SET NULL,

    FOREIGN KEY (updated_by) REFERENCES users(id)
        ON DELETE SET NULL
);