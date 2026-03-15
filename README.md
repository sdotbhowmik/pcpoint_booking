# PC Point Booking

A PHP & MySQL-based booking management system designed for PC points/internet cafes. The system provides a complete solution for managing table/PC reservations with both customer-facing frontend and admin backend.

## Overview

PC Point Booking allows customers to book time slots at PC service points, while administrators can manage bookings, tables, and sub-admins through a comprehensive dashboard. The system supports multiple service categories and provides booking status tracking.

## Features

### Frontend
- **Home Page**: Landing page with services overview, locations, and contact info
- **Book a PC/Table**: Reserve available PC slots by date and time
- **Search Results**: View available tables for selected date/time
- **Booking Details**: View booking confirmation and details
- **Check Status**: Track booking status (Pending/Accepted/Rejected)
- **Contact Form**: Send inquiries to admin
- **Webmail**: Access email client

### Admin Dashboard
- **Dashboard**: Overview with booking statistics, recent bookings, and charts
- **New Bookings**: View and manage pending booking requests
- **Accepted Bookings**: View confirmed bookings
- **Rejected Bookings**: View declined bookings
- **Manage Tables**: Add, edit, and delete PC/table entries
- **Manage Sub-admins**: Create and manage operator accounts
- **Date-wise Reports**: Generate booking reports by date range
- **Contact Messages**: View customer inquiries
- **Profile Management**: Update admin profile
- **Change Password**: Secure password updates
- **Settings**: Configure system settings

## Tech Stack

| Component | Technology |
|-----------|------------|
| Backend | PHP |
| Database | MySQL / MariaDB |
| Frontend | HTML5, CSS3, JavaScript |
| Design | Bootstrap 5 (CDN) |
| Charts | Chart.js |
| Maps | jQuery Mapael |

## Database Schema

The system uses 5 main tables:

| Table | Description |
|-------|-------------|
| `tbladmin` | Admin and sub-admin user accounts |
| `tblbookings` | Customer booking records |
| `tblrestables` | PC/Table configurations |
| `tblservicepoints` | Service point locations |
| `tblservices` | Available service categories |

### Key Fields (tblbookings)
- `bookingNo`: Unique booking reference number
- `fullName`, `emailId`, `phoneNumber`: Customer info
- `bookingDate`, `bookingTime`: Reserved slot
- `tableId`: Assigned PC/table
- `boookingStatus`: Accepted/Rejected/Pending
- `adminremark`: Admin notes on booking

## Project Structure

```
pcpoint_booking/
├── admin/                   # Admin panel
│   ├── includes/           # Header, sidebar, footer
│   ├── content/           # Content templates
│   ├── settings/          # Settings files
│   ├── index.php          # Admin login
│   ├── dashboard.php      # Main dashboard
│   ├── new-bookigs.php    # New bookings
│   ├── accepted-bookings.php
│   ├── rejected-bookings.php
│   ├── manage-tables.php  # Table management
│   ├── manage-subadmins.php
│   ├── bw-dates-report.php
│   └── *.php              # Other admin pages
│
├── includes/               # Frontend includes
│   ├── db.php             # Database connection
│   ├── header.php         # Page header
│   ├── navbar.php         # Navigation
│   ├── footer.php         # Page footer
│   ├── hero.php           # Hero section
│   ├── services.php       # Services listing
│   ├── ceo.php            # CEO message
│   ├── contact.php        # Contact info
│   ├── locations.php      # Location details
│   ├── features.php       # Features section
│   ├── stats.php          # Statistics
│   └── data/              # Data files
│
├── css/                    # Stylesheets
├── js/                     # JavaScript files
├── images/                 # Images and assets
├── db/                     # Database files
│   └── cafpcpointdb.sql  # Database dump
├── plugins/               # Third-party plugins
│
├── index.php              # Home page
├── book.php               # Booking page
├── search-result.php      # Search results
├── booking-details.php    # Booking details
├── check-status.php       # Status check
└── webmail.php           # Webmail
```

## Installation

### Prerequisites
- PHP 7.4+ or 8.x
- MySQL 5.7+ or MariaDB
- Apache/Nginx web server
- XAMPP, WAMP, or similar stack

### Setup Steps

1. **Database Setup**
   - Create a new database named `cafpcpointdb`
   - Import the SQL file: `db/cafpcpointdb.sql`

2. **Database Configuration**
   - Edit `includes/db.php`
   - Update connection details if needed:
   ```php
   $conn = mysqli_connect("localhost", "root", "", "cafpcpointdb");
   ```

3. **Web Server**
   - Place project in web root (e.g., `htdocs/pcpoint_booking`)
   - Ensure Apache/MySQL services are running

4. **Access URLs**
   - Frontend: `http://localhost/pcpoint_booking/`
   - Admin: `http://localhost/pcpoint_booking/admin/`

## Default Credentials

| Role | Username | Password | Email |
|------|----------|----------|-------|
| Super Admin | admin | admin123 | admin@cafpcpoint.it |
| Operator | operator1 | admin123 | operator1@cafpcpoint.it |
| Operator | operator2 | admin123 | operator2@cafpcpoint.it |

> **Note**: Default password is MD5 hashed: `0192023a7bbd73250516f069df18b500`

## User Roles

- **Super Admin (UserType=1)**: Full system access
- **Sub-admin (UserType=0)**: Limited access as assigned

## Booking Flow

1. Customer visits homepage
2. Selects date and time on booking page
3. System shows available tables
4. Customer fills booking form (name, email, phone, service type)
5. Booking is submitted with "Pending" status
6. Admin reviews and accepts/rejects with optional remark
7. Customer can check status via booking number

## Security Notes

- Passwords are stored as MD5 hashes
- SQL injection protection via prepared statements
- Session-based admin authentication
- Input validation on all forms

## Screenshots

No screenshots available - please refer to the live demo or run locally.

## License

MIT License

## Version

Current Version: 1.0.0

## Support

For issues or questions, contact the system administrator.