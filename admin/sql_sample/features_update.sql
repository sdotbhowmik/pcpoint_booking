-- =============================================
-- Features Table Schema Update & Sample Data
-- For CAF PC POINT Booking System
-- Run this in XAMPP MySQL (phpMyAdmin or command line)
-- Database: cafpcpointdb
-- =============================================

-- Step 1: Add new columns to tblfeatures table
ALTER TABLE tblfeatures 
ADD COLUMN title_bn VARCHAR(100) DEFAULT NULL AFTER title,
ADD COLUMN title_it VARCHAR(100) DEFAULT NULL AFTER title_bn,
ADD COLUMN description_bn VARCHAR(250) DEFAULT NULL AFTER description,
ADD COLUMN description_it VARCHAR(250) DEFAULT NULL AFTER description_bn,
ADD COLUMN modal_content TEXT DEFAULT NULL AFTER description_it;

-- Step 2: Insert/Update sample data for features
-- CAF Services
INSERT INTO tblfeatures (id, title, title_bn, title_it, description, description_bn, description_it, icon, modal_content, link, order_num, is_active) 
VALUES (1, 'CAF', 'CAF সেবা', 'Servizi CAF', 'CAF Services', 'CAF সেবাসমূহ', 'Servizi CAF', 'fa-file-invoice-dollar', 
'[{"name": "Modello 730 / Unico", "desc": "Income tax return (Dichiarazione dei redditi)"}, {"name": "ISEE / ISEEU", "desc": "Financial status certificate (Indicatore situazione economica)"}, {"name": "IMU / TASI / TARI", "desc": "Property taxes (Tasse sugli immobili)"}, {"name": "Successioni / Volture", "desc": "Inheritance and name changes (Eredità e registri)"}, {"name": "Cassetto Fiscale", "desc": "Tax folder access and management"}]',
'#', 1, 1)
ON DUPLICATE KEY UPDATE title=VALUES(title), title_bn=VALUES(title_bn), title_it=VALUES(title_it), description=VALUES(description), description_bn=VALUES(description_bn), description_it=VALUES(description_it), modal_content=VALUES(modal_content);

-- Patronato Services
INSERT INTO tblfeatures (id, title, title_bn, title_it, description, description_bn, description_it, icon, modal_content, link, order_num, is_active) 
VALUES (2, 'Patronato', 'সামাজিক নিরাপত্তা', 'Servizi Patronato', 'Social Services', 'সামাজিক নিরাপত্তা সেবা', 'Servizi di Previdenza Sociale', 'fa-handshake',
'[{"name": "Pensioni INPS / Invalidità", "desc": "Pensions and disability benefits (Pensione e disabilità)"}, {"name": "NASpI / Disoccupazione", "desc": "Unemployment benefits (Sussidio di disoccupazione)"}, {"name": "Assegno Unico Familiare", "desc": "Family and child support (Sostegno per i figli)"}, {"name": "Maternità / Bonus", "desc": "Maternity allowance (Indennità di maternità)"}, {"name": "Prestazioni Sociali", "desc": "Social security benefits and assistance"}]',
'#', 2, 1)
ON DUPLICATE KEY UPDATE title=VALUES(title), title_bn=VALUES(title_bn), title_it=VALUES(title_it), description=VALUES(description), description_bn=VALUES(description_bn), description_it=VALUES(description_it), modal_content=VALUES(modal_content);

-- Immigration Services
INSERT INTO tblfeatures (id, title, title_bn, title_it, description, description_bn, description_it, icon, modal_content, link, order_num, is_active) 
VALUES (3, 'Immigration', 'অভিবাসন', 'Servizi di Immigrazione', 'Immigration Services', 'অভিবাসন সেবা', 'Servizi di Immigrazione', 'fa-passport',
'[{"name": "Rinnovo Permesso Soggiorno", "desc": "Residence permit renewal (Rinnovo carta e permesso)"}, {"name": "Cittadinanza Italiana", "desc": "Italian citizenship application (Richiesta cittadinanza)"}, {"name": "Ricongiungimento Famigliare", "desc": "Family reunification (Nulla Osta per famiglia)"}, {"name": "Visti d''Ingresso", "desc": "Entry visas for Italy (Visti per l''Italia)"}, {"name": "Conversioni Permessi", "desc": "Permit conversions and updates"}]',
'#', 3, 1)
ON DUPLICATE KEY UPDATE title=VALUES(title), title_bn=VALUES(title_bn), title_it=VALUES(title_it), description=VALUES(description), description_bn=VALUES(description_bn), description_it=VALUES(description_it), modal_content=VALUES(modal_content);

-- Courses
INSERT INTO tblfeatures (id, title, title_bn, title_it, description, description_bn, description_it, icon, modal_content, link, order_num, is_active) 
VALUES (4, 'Courses', 'কোর্সসমূহ', 'Corsi', 'Professional Courses', 'পেশাদার কোর্স', 'Corsi Professionali', 'fa-graduation-cap',
'[{"name": "Italian Language Courses", "desc": "Learn Italian from beginner to advanced level"}, {"name": "Computer Training", "desc": "Basic and advanced computer skills"}, {"name": "Tax Preparation Classes", "desc": "Tax filing and preparation training"}, {"name": "Immigration Document Prep", "desc": "Document preparation for immigration"}, {"name": "Business Management", "desc": "Small business management and accounting"}]',
'https://corsi.cafpcpoint.it/', 4, 1)
ON DUPLICATE KEY UPDATE title=VALUES(title), title_bn=VALUES(title_bn), title_it=VALUES(title_it), description=VALUES(description), description_bn=VALUES(description_bn), description_it=VALUES(description_it), modal_content=VALUES(modal_content);

-- Verify the data
SELECT id, title, title_bn, title_it, icon, is_active FROM tblfeatures;
