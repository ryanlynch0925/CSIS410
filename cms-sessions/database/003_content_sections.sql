CREATE TABLE IF NOT EXISTS content_sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_id INT NOT NULL,
    section_key VARCHAR(100) NOT NULL,
    section_title VARCHAR(150) NOT NULL,
    section_body TEXT NOT NULL,
    section_type ENUM('text', 'verse', 'callout', 'image', 'button') NOT NULL DEFAULT 'text',
    image_url VARCHAR(255) NULL,
    button_text VARCHAR(100) NULL,
    button_link VARCHAR(255) NULL,
    display_order INT NOT NULL DEFAULT 0,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_by INT NULL,
    updated_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    UNIQUE KEY unique_page_section (page_id, section_key),

    FOREIGN KEY (page_id) REFERENCES pages(id) 
        ON DELETE CASCADE,
    
    FOREIGN KEY (created_by) REFERENCES users(id)
        ON DELETE SET NULL,
    
    FOREIGN KEY (updated_by) REFERENCES users(id)
        ON DELETE SET NULL
);