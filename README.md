# Application Moderation System
This project is a test implementation designed to manage and moderate user applications. The primary goal is to allow operators within a mobile operator company to review and manage user-submitted applications through an administrative interface.

## Features
- **User Application Submission**: Users can submit their applications via a simple and intuitive form.
- **CAPTCHA Protection**: To prevent spam and ensure genuine submissions, the form includes CAPTCHA validation.
- **Admin Panel for Moderation**: An administrative interface is provided where company operators can review, approve, or reject applications.
- **Scalable Architecture**: The project is built with scalability in mind, allowing for easy integration with other systems and future expansion.

## Technologies Used
- **Yii2 Framework**: The application is developed using the Yii2 PHP framework, known for its flexibility and power in building web applications.
- **Bootstrap 5**: The frontend is styled using Bootstrap to ensure a responsive and user-friendly interface.
- **MySQL 8**: All application data is stored securely in a MySQL database.
- **Captcha**: CAPTCHA integration to safeguard the application process against bots.

## Setup Instructions
1. **Clone the Repository**:
```bash
git clone https://github.com/specialist001/mobiuz-test.git
```
2. **Install Dependencies**:
```bash
composer install
```
3. **Init**
```bash
php init
```
4. **Create Database**:
5. **Run Migrations**:
```bash
php yii migrate
```
6. **Insert Admin User**:
```bash
php yii admin/insert
```