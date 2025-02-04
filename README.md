<p align="center"><img src="public/img/KdG_H_Closed_Black_sRGB.png" width="200" alt="Logo"></p>

<h1 align="center">Stagebedrijven website</h1>

## ℹ️ Info

Momenteel is het vrij moeilijk voor studenten om een overzicht te krijgen van alle bedrijven die op zoek zijn naar 
stagiairs. De bedoeling is om een simpel, maar overzichtelijk platform te bouwen waar bedrijven zich kunnen aanmelden. 
Tijdens de aanmelding kunnen ze duidelijk aangeven in welke sector ze werken en naar welke skillsets ze op zoek zijn.

Studenten kunnen op het platform filteren op hun skills (Front-end, Back-end, UX/UI, …) en krijgen dan de beschikbare 
stageplekken te zien. Bij het klikken op een stageplek krijg je al een kleine omschrijving van je 
mogelijke opdrachten/verantwoordelijkheden tijdens je stage.

Ten slotte moet er ook een duidelijk overzicht zijn van de contactgegevens, om het sollicitatiegesprek zo vlot mogelijk 
te laten verlopen.

## 🔗 Links
- **[Figma](https://www.figma.com/files/project/110303495/Stagebedrijven-site?fuid=1185143655152052833)**
- **[Miro](https://miro.com/app/board/uXjVNeB1xm0=/?share_link_id=404024392)**
- **[Trello](https://trello.com/b/LZTfJ95C/stagebedrijven-site)**
- **[Google Drive](https://drive.google.com/drive/folders/0AHD_Ps4I-Pi6Uk9PVA)**

## 💾 ERD
<p><img src="public/img/ERD.png" alt="ERD"></p>

## ⚙️ Installation

1. Repo clonen:
```bash
git clone git@github.com:mctantwerp/kdg-stage.mctantwerp.be.git
cd kdg-stage.mctantwerp.be
```
2. Installeren:
```bash
composer install
cp .env.example .env
php artisan key:generate
```

3. Environment credentials invullen:
```env
APP_NAME="Stage"
APP_ENV=
APP_KEY=
APP_DEBUG=
APP_URL=
```
```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

```env
MICROSOFT_CLIENT_ID=
MICROSOFT_CLIENT_SECRET=
MICROSOFT_TENANT_ID=
MICROSOFT_TENANT_NAME=studentkdg.onmicrosoft.com

GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=

TURNSTILE_SECRET_KEY=

NOVA_LICENSE_KEY=
```

```env
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS="stage@studentsandmore.be"
MAIL_FROM_NAME="${APP_NAME}"
```

4. Database + tables aanmaken: 
```bash
php artisan migrate
```

5. NPM packages installeren + builden: 
```bash
npm install
npm run build
```

6. ❗️Wanneer de app environment (.env) in production staat, moet een user admin role hebben om toegang te krijgen tot
    Nova. Gebruik een databasetool om manueel de role aan een user te geven. Daarna kunnen extra admin roles toegewezen
    worden via Nova.

## ☎️ Contact
[Sam Serrien](https://github.com/sam-kdg)

