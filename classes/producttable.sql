CREATE TABLE natives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL,
    product_quantity INT NOT NULL,
    product_description TEXT,
    productImage_path VARCHAR(255) NOT NULL,
    product_size VARCHAR(50),
    product_color VARCHAR(50),
    product_brand VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
