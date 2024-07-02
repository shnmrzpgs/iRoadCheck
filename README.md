
# iRoadCheck

## Overview

iRoadCheck is a web-based and mobile application designed to improve the reporting and management of road maintenance issues in Tagum City. By leveraging community involvement and Geographic Information System (GIS) technology, iRoadCheck enables residents to report road conditions in real-time, ensuring quicker and more efficient maintenance responses.

## Features

### Mobile Application
- **User Registration**: Residents register using their phone numbers and are verified through an OTP (One-Time Password).
- **Report Submission**: Users can report road issues by capturing photos and automatically detecting the location via GPS.
- **Report Tracking**: Residents can track the status of their reports.
- **Notifications**: Users receive updates about their reported issues.

### Web Application
- **Admin Management**: Admins can manage user access and roles through an account management system.
- **GIS Integration**: Visualizes and prioritizes road maintenance issues based on geographical data and severity.
- **AI Image Analysis**: Authenticates the images submitted with reports.
- **Reporting**: Generates detailed maintenance issue reports.
- **Security**: Implements AES encryption for all sensitive data.
- **Logs**: Maintains admin and user logs for auditing purposes.
- **Notifications**: Alerts admins to new reports.

## Technology Stack

### Web Application
- **Framework**: Laravel (for backend)
- **Frontend**: Vue.js or React (for dynamic user interface)

### GIS and Real-Time Database
- **Firebase Firestore**: For real-time data management
- **Leaflet.js**: For interactive maps (or Google Maps API)

### Hosting and Cloud Services
- **Firebase Hosting**: For mobile app and static assets
- **Cloud Hosting (Heroku, DigitalOcean, etc.)**: For Laravel backend

## Installation and Setup

### Prerequisites
- Node.js and npm
- Composer

To install **iRoadCheck**, follow these steps:
1. `Clone` or `Download` the repository to your local machine:
   
   ```shell
   git clone https://github.com/piraticame/iRoadCheck.git
   ```
    
2. Install the project dependencies using `composer`:

   If you don't have `composer` installed, you may download it [here](https://getcomposer.org/download/).
   ```shell
   composer install
   ```

3. Install the project dependencies using `npm`:

    If you don't have `npm` installed, you may download it [here](https://nodejs.org/en/download/).
   ```shell
   npm install
   ```
    
4. Create a `.env` file in the root directory of the project and copy the contents of `.env.example` to it or just run the following command.
    
    ```shell
    copy .env.example .env
    ```
    
5. Generate a new `APP_KEY` using the following command:
   
   ```shell
   php artisan key:generate
   ```
   
6. Create a new database and update the `DB_DATABASE` value in the `.env` file with the name of the database you created. Then run the database migrations using the following command:
   
   ```shell
   php artisan migrate:fresh --seed
   ```
   
7. Link the Storage folder to the Public folder using the following command:
   
   ```shell
   php artisan storage:link
   ```