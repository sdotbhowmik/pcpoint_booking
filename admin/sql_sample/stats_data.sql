-- =============================================
-- Check and Insert Stats Data
-- Run this in phpMyAdmin SQL tab
-- Database: cafpcpointdb
-- =============================================

-- Check existing data
SELECT * FROM tblstats;

-- Insert sample stats data (if table is empty)
INSERT INTO tblstats (label, value, icon, order_num) VALUES 
('Year Started', '2020', 'fa-calendar', 1),
('Awards Won', '3', 'fa-trophy', 2),
('Years Experience', '2', 'fa-briefcase', 3),
('Customers Served', '3000', 'fa-users', 4);

-- Verify
SELECT * FROM tblstats;
