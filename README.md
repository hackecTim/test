# Discoverly 
Discover hidden gems in your chosen town — cozy spots, lesser-known attractions, and local favorites.

> Live demo: https://discoverly.itnet.si/

## What is Discoverly?
**Discoverly** is a PHP-based web app for exploring “hidden gem” places in a town/city.  
It includes authentication pages so users can log in, save favorite places and leave reviews.  

## Key Features
- **Browse featured places** on the homepage
- **User authentication**
  - Login page
  - Signup / account creation
- **Places content + uploads**
  - Includes a dedicated folder for place uploads/images
- **Client-side filtering/search**
  - Includes a `filter-search.js` script in the project root

## Tech Stack
- **Backend:** PHP  
- **Frontend:** HTML + CSS + JavaScript  
- **Database:** Included in `/database` (schema/scripts live in the repo)

## Project Structure
High-level layout (based on the repository folders):
- `Sites/` — site pages 
- `css/` — styling
- `partials/` — reusable UI fragments (headers, nav, footer, etc.)
- `pages-layout/` — layout templates
- `database/` — database schema/scripts/config
- `uploads_places/` — uploaded place images/files
- `day-trips/` — content/pages related to day trips
- `Scripts/` — helper scripts/utilities
- `index.php` — app entry/home page
- `filter-search.js` — front-end filtering/search logic

## Getting Started (Local Setup)

### Prerequisites
- PHP (recommended: PHP 8+)
- A local web server (Apache/Nginx) or a PHP dev server
- MySQL/MariaDB (or whichever DB your schema targets)

### 1) Clone the repository
```bash
git clone https://github.com/hackecTim/Discoverly.git
cd Discoverly

### 2) Set up the database

Look inside the database/ folder for a .sql schema or setup scripts. Import the schema.

### 3) Run the app
Option A: PHP built-in server (simple dev mode)
php -S localhost:8000


Then open: http://localhost:8000

Option B: Apache/Nginx

Point your web root to the project folder and load:
http://localhost/index.php

### screenshots

<img width="1919" height="944" alt="3" src="https://github.com/user-attachments/assets/c10a1615-139e-4e8d-b866-59f83ac5e3c3" />
<img width="1919" height="946" alt="2" src="https://github.com/user-attachments/assets/8ff60731-b33c-4612-88cd-54fe4f56f384" />
<img width="1919" height="949" alt="1" src="https://github.com/user-attachments/assets/5e493865-e62e-4372-8772-f3a0b248a6c4" />
<img width="1919" height="947" alt="6" src="https://github.com/user-attachments/assets/d49161e1-709f-40ad-af02-1a0363b43ffe" />
<img width="1919" height="945" alt="5" src="https://github.com/user-attachments/assets/817138c3-d5bf-4406-8363-e9a69c7bda67" />
<img width="1919" height="946" alt="4" src="https://github.com/user-attachments/assets/1ea6561f-b079-4ca4-9b4f-73e6b61fb15d" />


## Contributors

This project was developed by:

- **Tim Pristavec Žlindra** — [@hackecTim](https://github.com/hackecTim)
- **Andraž Jug** — [@aj91854](https://github.com/aj91854)
- **Stefanija Atanasova** — [@Stefanijaaaa](https://github.com/Stefanijaaaa)
- **Žan Luka Hojnik** — [@Hojnik15](https://github.com/Hojnik15)
- **Luka Marinko** — [@Looka550](https://github.com/Looka550)
- **Žan Vincent Božič** — [@KekecD](https://github.com/KekecD)

