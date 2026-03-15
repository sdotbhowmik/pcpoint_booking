-- Comprehensive Admin Dashboard Database Schema
-- For CAF PC POINT Booking System
-- Run this file in phpMyAdmin to install

-- Drop existing tables if they exist (optional - for fresh install)
-- DROP TABLE IF EXISTS tblsettings, tblthemes, tblhero_slides, tblfeatures, tblservice_categories, tblservice_items, tblstats, tblfaq, tblsocial, tblceo, tblfooter_content, tblnavbar_links;

-- ============================================
-- Settings Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblsettings (
  id INT(11) NOT NULL AUTO_INCREMENT,
  setting_key VARCHAR(100) NOT NULL,
  setting_value TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY setting_key (setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Themes Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblthemes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  theme_name VARCHAR(50) NOT NULL,
  primary_color VARCHAR(20) NOT NULL,
  secondary_color VARCHAR(20) NOT NULL,
  accent_color VARCHAR(20) NOT NULL,
  bg_dark VARCHAR(20) DEFAULT '#212529',
  bg_light VARCHAR(20) DEFAULT '#f8f9fa',
  text_dark VARCHAR(20) DEFAULT '#212529',
  text_light VARCHAR(20) DEFAULT '#ffffff',
  is_active TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Hero Slides Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblhero_slides (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(200) DEFAULT NULL,
  subtitle TEXT,
  cta_text VARCHAR(100) DEFAULT NULL,
  cta_link VARCHAR(200) DEFAULT '#',
  image VARCHAR(200) DEFAULT NULL,
  order_num INT(11) DEFAULT 0,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Features Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblfeatures (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) DEFAULT NULL,
  description VARCHAR(250) DEFAULT NULL,
  icon VARCHAR(50) DEFAULT 'fa-star',
  link VARCHAR(200) DEFAULT '#',
  order_num INT(11) DEFAULT 0,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Service Categories Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblservice_categories (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) DEFAULT NULL,
  name_bn VARCHAR(100) DEFAULT NULL,
  icon VARCHAR(50) DEFAULT 'fa-star',
  description TEXT,
  order_num INT(11) DEFAULT 0,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Service Items Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblservice_items (
  id INT(11) NOT NULL AUTO_INCREMENT,
  category_id INT(11) NOT NULL,
  name VARCHAR(150) DEFAULT NULL,
  name_bn VARCHAR(150) DEFAULT NULL,
  description VARCHAR(250) DEFAULT NULL,
  description_bn VARCHAR(250) DEFAULT NULL,
  order_num INT(11) DEFAULT 0,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Stats Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblstats (
  id INT(11) NOT NULL AUTO_INCREMENT,
  label VARCHAR(100) DEFAULT NULL,
  value VARCHAR(50) DEFAULT NULL,
  icon VARCHAR(50) DEFAULT 'fa-star',
  order_num INT(11) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- FAQ Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblfaq (
  id INT(11) NOT NULL AUTO_INCREMENT,
  question VARCHAR(300) DEFAULT NULL,
  answer TEXT,
  order_num INT(11) DEFAULT 0,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Social Links Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblsocial (
  id INT(11) NOT NULL AUTO_INCREMENT,
  platform VARCHAR(50) DEFAULT NULL,
  url VARCHAR(200) DEFAULT NULL,
  icon VARCHAR(50) DEFAULT 'fa-facebook',
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- CEO Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblceo (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) DEFAULT NULL,
  title VARCHAR(100) DEFAULT NULL,
  message TEXT,
  photo VARCHAR(200) DEFAULT NULL,
  signature VARCHAR(200) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Footer Content Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblfooter_content (
  id INT(11) NOT NULL AUTO_INCREMENT,
  about_text TEXT,
  about_text_bn TEXT,
  contact_address VARCHAR(250) DEFAULT NULL,
  contact_phone VARCHAR(50) DEFAULT NULL,
  contact_email VARCHAR(100) DEFAULT NULL,
  website VARCHAR(100) DEFAULT NULL,
  whatsapp VARCHAR(50) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Navbar Links Table
-- ============================================
CREATE TABLE IF NOT EXISTS tblnavbar_links (
  id INT(11) NOT NULL AUTO_INCREMENT,
  label VARCHAR(50) DEFAULT NULL,
  label_en VARCHAR(50) DEFAULT NULL,
  label_it VARCHAR(50) DEFAULT NULL,
  label_bn VARCHAR(50) DEFAULT NULL,
  url VARCHAR(100) DEFAULT NULL,
  order_num INT(11) DEFAULT 0,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- INSERT DEFAULT DATA
-- ============================================

-- Insert Themes
INSERT IGNORE INTO tblthemes (id, theme_name, primary_color, secondary_color, accent_color, bg_dark, bg_light, text_dark, text_light, is_active) VALUES
(1, 'Green', '#228B22', '#1a6b1a', '#FFD700', '#212529', '#f8f9fa', '#212529', '#ffffff', 1),
(2, 'Blue', '#0d6efd', '#0a58ca', '#ffc107', '#212529', '#f8f9fa', '#212529', '#ffffff', 0),
(3, 'Purple', '#6f42c1', '#5a32a3', '#20c997', '#212529', '#f8f9fa', '#212529', '#ffffff', 0),
(4, 'Orange', '#fd7e14', '#d96c00', '#20c997', '#212529', '#f8f9fa', '#212529', '#ffffff', 0),
(5, 'Red', '#dc3545', '#bb2d3b', '#ffc107', '#212529', '#f8f9fa', '#212529', '#ffffff', 0),
(6, 'Dark', '#343a40', '#212529', '#0dcaf0', '#1a1d20', '#2d3238', '#ffffff', '#adb5bd', 0);

-- Insert Settings
INSERT IGNORE INTO tblsettings (setting_key, setting_value) VALUES
('site_name', 'CAF PC POINT'),
('site_tagline', 'Your Trusted Partner for Italian Services'),
('site_email', 'info@cafpcpoint.it'),
('site_phone', '+39 068 788 0399'),
('site_address', 'Via Flavio Stilicone 11, 00175 Roma'),
('site_website', 'www.cafpcpoint.it'),
('contact_email', 'info@cafpcpoint.it'),
('whatsapp_number', '+390687880399'),
('default_language', 'it'),
('timezone', 'Europe/Rome'),
('date_format', 'Y-m-d'),
('time_format', 'H:i'),
('currency', 'EUR'),
('logo', ''),
('favicon', ''),
('footer_about_text', 'We are a group formed to provide citizens and businesses with a comprehensive range of administrative and contributory services.'),
('footer_about_text_bn', 'আমরা নাগরিক এবং প্রতিষ্ঠানগুলিকে প্রশাসনিক এবং অবদানকারী পরিষেবার একটি ব্যাপক পরিসর প্রদান করার জন্য একটি গঠন।'),
('booking_availability_start', '09:00'),
('booking_availability_end', '18:00'),
('booking_slot_duration', '30'),
('max_advance_booking_days', '30'),
('email_notifications', '1'),
('auto_approve_booking', '0');

-- Insert Hero Slides
INSERT IGNORE INTO tblhero_slides (id, title, subtitle, cta_text, cta_link, image, order_num, is_active) VALUES
(1, 'Your Trusted Partner for Italian Services', 'Professional assistance with CAF, Patronato, Tax Services, and Immigration support in Italy', 'Book Appointment', 'book.php', 'hero_image.jpeg', 1, 1),
(2, 'CAF Services Made Easy', 'Expert tax assistance and fiscal consulting for individuals and businesses', 'Learn More', '#services', 'hero_image_2.jpeg', 2, 1),
(3, 'Immigration Services', 'Complete support for permits, citizenship, and residency matters', 'Contact Us', '#contact', 'hero_image_3.jpeg', 3, 1),
(4, 'Patronato Social Services', 'Social welfare and pension assistance for all your needs', 'Get Started', '#contact', 'hero_image_4.jpeg', 4, 1);

-- Insert Features
INSERT IGNORE INTO tblfeatures (id, title, description, icon, link, order_num, is_active) VALUES
(1, 'CAF', 'Fiscal assistance and tax declaration services', 'fa-file-invoice-dollar', '#', 1, 1),
(2, 'Patronato', 'Social welfare and pension assistance', 'fa-handshake', '#', 2, 1),
(3, 'Immigration', 'Immigration and residency permit services', 'fa-passport', '#', 3, 1),
(4, 'Courses', 'Professional training and courses', 'fa-graduation-cap', 'https://corsi.cafpcpoint.it/', 4, 1);

-- Insert Service Categories
INSERT IGNORE INTO tblservice_categories (id, name, name_bn, icon, description, order_num, is_active) VALUES
(1, 'CAF - Centro Assistenza Fiscale', 'কর সহায়তা', 'fa-file-invoice-dollar', 'Fiscal assistance and tax declaration services', 1, 1),
(2, 'Consulenza del Lavoro', 'শ্রম পরামর্শ', 'fa-calculator', 'Labor consulting and employment services', 2, 1),
(3, 'Patronato', 'সামাজিক নিরাপত্তা', 'fa-handshake', 'Social welfare and pension assistance', 3, 1),
(4, 'Immigrazione', 'অভিবাসন', 'fa-passport', 'Immigration and residency permit services', 4, 1),
(5, 'Impresa - Commercialista', 'ব্যবসা পরিচালন', 'fa-briefcase', 'Business accounting and financial services', 5, 1),
(6, 'Geometra', 'কারিগরি সেবা', 'fa-ruler-combined', 'Technical and housing services', 6, 1),
(7, 'Avvocato', 'আইনজীবী', 'fa-gavel', 'Legal consultation services', 7, 1);

-- Insert Service Items
INSERT IGNORE INTO tblservice_items (id, category_id, name, name_bn, description, description_bn, order_num, is_active) VALUES
(1, 1, 'Modello 730 / Unico', 'আয়কর জমা', 'Income tax declaration', 'আয়কর সনদ', 1, 1),
(2, 1, 'ISEE / ISEEU', 'আর্থিক অবস্থার সনদ', 'Financial situation certificate', 'আর্থিক অবস্থা সার্টিফিকেট', 2, 1),
(3, 1, 'IMU / TASI / TARI', 'হাউজিং ট্যাক্স', 'Housing taxes', 'বাড়ির কর', 3, 1),
(4, 1, 'Successioni / Voltures', 'উত্তরাধিকার', 'Inheritance and name changes', 'উত্তরাধিকার ও নাম পরিবর্তন', 4, 1),
(5, 2, 'Payroll Management', 'বেতন ব্যবস্থাপনা', 'Employee payroll processing', 'কর্মচারী বেতন প্রক্রিয়াকরণ', 1, 1),
(6, 2, 'Contracts', 'চুক্তি', 'Employment contract management', 'কর্মচারী চুক্তি ব্যবস্থাপনা', 2, 1),
(7, 3, 'Pensioni INPS / Invalidità', 'পেনশন', 'Pension and disability benefits', 'পেনশন ও অক্ষমতা ভাতা', 1, 1),
(8, 3, 'NASpI / Disoccupazione', 'বেকার ভাতা', 'Unemployment benefits', 'বেকার ভাতা আবেদন', 2, 1),
(9, 3, 'Assegno Unico Familiare', 'পারিবারিক সহায়তা', 'Family allowance', 'পারিবারিক শিশু সহায়তা', 3, 1),
(10, 4, 'Rinnovo Permesso Soggiorno', 'সোজিনো নবায়ন', 'Residence permit renewal', 'বসবাসের অনুমতি নবায়ন', 1, 1),
(11, 4, 'Cittadinanza Italiana', 'ইতালীয় নাগরিকত্ব', 'Italian citizenship', 'ইতালীয় নাগরিকত্ব', 2, 1),
(12, 4, 'Ricongiungimento Famigliare', 'পরিবার পুনর্মিলন', 'Family reunification', 'পরিবার পুনর্মিলন', 3, 1),
(13, 5, 'Apertura Partita IVA', 'পার্টিতা ইভা', 'VAT number registration', 'ভ্যাট নম্বর নিবন্ধন', 1, 1),
(14, 5, 'SCIA / Licenze Comunali', 'ট্রেড লাইসেন্স', 'Business licenses', 'ব্যবসা লাইসেন্স', 2, 1),
(15, 5, 'Fatturazione Elettronica', 'ইলেকট্রনিক ইনভয়েস', 'Electronic invoicing', 'ইলেকট্রনিক চালান', 3, 1),
(16, 6, 'Catasto / Visures', 'জমি রেকর্ড', 'Land and property records', 'জমি ও সম্পত্তি রেকর্ড', 1, 1),
(17, 6, 'Certificazione APE', 'এনার্জি সনদ', 'Energy certificate', 'শক্তি সনদ', 2, 1),
(18, 7, 'Consulenza Legale', 'আইনি পরামর্শ', 'Legal consultation', 'আইনি পরামর্শ', 1, 1),
(19, 7, 'Diritto del Lavoro', 'শ্রমিক অধিকার', 'Labor law', 'শ্রম আইন', 2, 1);

-- Insert Stats
INSERT IGNORE INTO tblstats (id, label, value, icon, order_num) VALUES
(1, 'Year Started', '2020', 'fa-calendar', 1),
(2, 'Awards Won', '3', 'fa-trophy', 2),
(3, 'Years Experience', '2', 'fa-briefcase', 3),
(4, 'Customers Served', '3000', 'fa-users', 4);

-- Insert FAQ
INSERT IGNORE INTO tblfaq (id, question, answer, order_num, is_active) VALUES
(1, 'What services do you offer?', 'We provide CAF (Tax Assistance), Patronato (Social Services), Immigration Services, Accounting, and Legal Advice.', 1, 1),
(2, 'How do I book an appointment?', 'You can book an appointment directly through our online booking system or visit one of our offices.', 2, 1),
(3, 'What documents do I need for tax assistance?', 'Bring your ID, income documents, and any previous tax returns. Our staff will guide you through the process.', 3, 1),
(4, 'Do you offer immigration assistance?', 'Yes, we provide comprehensive immigration services including permit applications and renewals.', 4, 1),
(5, 'What are your working hours?', 'Monday - Friday: 9:00 AM - 6:00 PM | Saturday: 10:00 AM - 4:00 PM', 5, 1);

-- Insert Social Links
INSERT IGNORE INTO tblsocial (id, platform, url, icon, is_active) VALUES
(1, 'Facebook', 'https://facebook.com/cafpcpoint', 'fa-facebook-f', 1),
(2, 'WhatsApp', 'https://wa.me/390687880399', 'fa-whatsapp', 1),
(3, 'Phone', 'tel:+390687880399', 'fa-phone', 1);

-- Insert CEO Content
INSERT IGNORE INTO tblceo (id, name, title, message, photo, signature) VALUES
(1, 'Nibash Chakraborty', 'Chief Executive Officer', 'We are here to help immigrants and residents with important services in Italy. Our platform makes it easy for you to get professional help with CAF (Fiscal Assistance Centers) for tax and financial matters, as well as Patronato services for social welfare support. We also assist with immigration-related processes, making it easier for you to manage your legal and administrative tasks in Italy.', 'ceo-img (Custom).jpg', '');

-- Insert Footer Content
INSERT IGNORE INTO tblfooter_content (id, about_text, about_text_bn, contact_address, contact_phone, contact_email, website, whatsapp) VALUES
(1, 'We are a group formed to provide citizens and businesses with a comprehensive range of administrative and contributory services, ensuring a prompt and accurate response to requests ranging from tax assistance to accounting.', 'আমরা নাগরিক এবং প্রতিষ্ঠানগুলিকে প্রশাসনিক এবং অবদানকারী পরিষেবার একটি ব্যাপক পরিসর প্রদান করার জন্য একটি গঠন।', 'Via Flavio Stilicone 11, 00175 Roma', '+39 068 788 0399', 'info@cafpcpoint.it', 'www.cafpcpoint.it', '+390687880399');

-- Insert Navbar Links
INSERT IGNORE INTO tblnavbar_links (id, label, label_en, label_it, label_bn, url, order_num, is_active) VALUES
(1, 'Services', 'Services', 'Servizi', 'সেবা', '#services', 1, 1),
(2, 'Locations', 'Locations', 'Sedi', 'অবস্থান', '#locations', 2, 1),
(3, 'Contact', 'Contact', 'Contatti', 'যোগাযোগ', '#contact', 3, 1),
(4, 'Book Now', 'Book Now', 'Prenota', 'বুক করুন', 'book.php', 4, 1),
(5, 'Web Mail', 'Web Mail', 'Web Mail', 'ওয়েব মেইল', 'webmail.php', 5, 1);

-- Schema installation complete!
