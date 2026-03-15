-- =============================================
-- Insert Modal Content for Features
-- Run this in XAMPP MySQL (phpMyAdmin)
-- Database: cafpcpointdb
-- =============================================

-- CAF Services Modal Content
UPDATE tblfeatures SET modal_content = '[{"name": "Modello 730 / Unico", "desc": "Income tax return (Dichiarazione dei redditi)"}, {"name": "ISEE / ISEEU", "desc": "Financial status certificate"}, {"name": "IMU / TASI / TARI", "desc": "Property taxes"}, {"name": "Successioni / Volture", "desc": "Inheritance and name changes"}, {"name": "Cassetto Fiscale", "desc": "Tax folder access"}]' WHERE title = 'CAF';

-- Patronato Services Modal Content
UPDATE tblfeatures SET modal_content = '[{"name": "Pensioni INPS / Invalidita", "desc": "Pensions and disability benefits"}, {"name": "NASpI / Disoccupazione", "desc": "Unemployment benefits"}, {"name": "Assegno Unico Familiare", "desc": "Family and child support"}, {"name": "Maternita / Bonus", "desc": "Maternity allowance"}, {"name": "Prestazioni Sociali", "desc": "Social security benefits"}]' WHERE title = 'Patronato';

-- Immigration Services Modal Content
UPDATE tblfeatures SET modal_content = '[{"name": "Rinnovo Permesso Soggiorno", "desc": "Residence permit renewal"}, {"name": "Cittadinanza Italiana", "desc": "Italian citizenship application"}, {"name": "Ricongiungimento Famigliare", "desc": "Family reunification"}, {"name": "Visti d Ingresso", "desc": "Entry visas for Italy"}, {"name": "Conversioni Permessi", "desc": "Permit conversions"}]' WHERE title = 'Immigration';

-- Courses Modal Content
UPDATE tblfeatures SET modal_content = '[{"name": "Italian Language Courses", "desc": "Learn Italian from beginner to advanced"}, {"name": "Computer Training", "desc": "Basic and advanced computer skills"}, {"name": "Tax Preparation Classes", "desc": "Tax filing training"}, {"name": "Immigration Document Prep", "desc": "Document preparation"}, {"name": "Business Management", "desc": "Small business accounting"}]' WHERE title = 'Courses';

-- Verify
SELECT id, title, modal_content FROM tblfeatures;
